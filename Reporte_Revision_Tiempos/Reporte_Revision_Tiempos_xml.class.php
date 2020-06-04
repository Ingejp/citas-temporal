<?php

class Reporte_Revision_Tiempos_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("en_us");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($this->Arr_result);
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = false;
      $this->Tem_xml_res = false;
      $this->Xml_password = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      if (isset($_REQUEST['nm_xml_label']) && !empty($_REQUEST['nm_xml_label']))
      {
          $this->Xml_tag_label = ($_REQUEST['nm_xml_label'] == "S") ? true : false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "Reporte_Revision_Tiempos_total.class.php"); 
      $this->Tot      = new Reporte_Revision_Tiempos_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['tot_geral'][1];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['Reporte_Revision_Tiempos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_return']);
          if ($this->Tem_xml_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data    = new nm_data("en_us");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_Reporte_Revision_Tiempos.zip";
      $this->Arquivo     .= "_Reporte_Revision_Tiempos";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "Reporte_Revision_Tiempos.xml";
      $this->Tit_zip      = "Reporte_Revision_Tiempos.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
   }

   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Reporte_Revision_Tiempos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Reporte_Revision_Tiempos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['Reporte_Revision_Tiempos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->rev_codigo_revision = $Busca_temp['rev_codigo_revision']; 
          $tmp_pos = strpos($this->rev_codigo_revision, "##@@");
          if ($tmp_pos !== false && !is_array($this->rev_codigo_revision))
          {
              $this->rev_codigo_revision = substr($this->rev_codigo_revision, 0, $tmp_pos);
          }
          $this->buq_buque = $Busca_temp['buq_buque']; 
          $tmp_pos = strpos($this->buq_buque, "##@@");
          if ($tmp_pos !== false && !is_array($this->buq_buque))
          {
              $this->buq_buque = substr($this->buq_buque, 0, $tmp_pos);
          }
          $this->horas = $Busca_temp['horas']; 
          $tmp_pos = strpos($this->horas, "##@@");
          if ($tmp_pos !== false && !is_array($this->horas))
          {
              $this->horas = substr($this->horas, 0, $tmp_pos);
          }
          $this->rev_ubicacion = $Busca_temp['rev_ubicacion']; 
          $tmp_pos = strpos($this->rev_ubicacion, "##@@");
          if ($tmp_pos !== false && !is_array($this->rev_ubicacion))
          {
              $this->rev_ubicacion = substr($this->rev_ubicacion, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['Reporte_Revision_Tiempos']['contr_erro'] = 'on';
if (!isset($_SESSION['idNaviera'])) {$_SESSION['idNaviera'] = "";}
if (!isset($this->sc_temp_idNaviera)) {$this->sc_temp_idNaviera = (isset($_SESSION['idNaviera'])) ? $_SESSION['idNaviera'] : "";}
if (!isset($_SESSION['USUARIO_MASTER'])) {$_SESSION['USUARIO_MASTER'] = "";}
if (!isset($this->sc_temp_USUARIO_MASTER)) {$this->sc_temp_USUARIO_MASTER = (isset($_SESSION['USUARIO_MASTER'])) ? $_SESSION['USUARIO_MASTER'] : "";}
if (!isset($_SESSION['USUARIO_BODEGA'])) {$_SESSION['USUARIO_BODEGA'] = "";}
if (!isset($this->sc_temp_USUARIO_BODEGA)) {$this->sc_temp_USUARIO_BODEGA = (isset($_SESSION['USUARIO_BODEGA'])) ? $_SESSION['USUARIO_BODEGA'] : "";}
if (!isset($_SESSION['idtipo_usuario'])) {$_SESSION['idtipo_usuario'] = "";}
if (!isset($this->sc_temp_idtipo_usuario)) {$this->sc_temp_idtipo_usuario = (isset($_SESSION['idtipo_usuario'])) ? $_SESSION['idtipo_usuario'] : "";}
 if($this->sc_temp_idtipo_usuario!=$this->sc_temp_USUARIO_BODEGA && $this->sc_temp_idtipo_usuario!=$this->sc_temp_USUARIO_MASTER){
	$this->nm_where_dinamico =" AND rev.idNaviera=$this->sc_temp_idNaviera";
}
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['where_dinamico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['where_dinamico'] != $this->nm_where_dinamico) {
    $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['where_dinamico'] = $this->nm_where_dinamico;
    unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['inicio']);
}

if (isset($this->sc_temp_idtipo_usuario)) {$_SESSION['idtipo_usuario'] = $this->sc_temp_idtipo_usuario;}
if (isset($this->sc_temp_USUARIO_BODEGA)) {$_SESSION['USUARIO_BODEGA'] = $this->sc_temp_USUARIO_BODEGA;}
if (isset($this->sc_temp_USUARIO_MASTER)) {$_SESSION['USUARIO_MASTER'] = $this->sc_temp_USUARIO_MASTER;}
if (isset($this->sc_temp_idNaviera)) {$_SESSION['idNaviera'] = $this->sc_temp_idNaviera;}
$_SESSION['scriptcase']['Reporte_Revision_Tiempos']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida'])
      { 
          $xml_charset = $_SESSION['scriptcase']['charset'];
          $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
          fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
          fwrite($xml_f, "<root>\r\n");
          if ($this->Grava_view)
          {
              $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
              $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
              fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
              fwrite($xml_v, "<root>\r\n");
          }
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT rev.codigo_revision as rev_codigo_revision, nav.naviera as nav_naviera, buq.buque as buq_buque, via.codigo as viaje, rev.contenedor as rev_contenedor, med.descripcion as med_descripcion, tcar.descripcion as tcar_descripcion, consig.nombre as consignatario, rev.bl as rev_bl, cont.descripcion as contenido, ede.descripcion as entidad, IF(rev.maga=\"1\",\"SI\",\"NO\") as maga, IF(rev.sat=\"1\",\"SI\",\"NO\") as sat, IF(rev.sgaia=\"1\",\"SI\",\"NO\") as sgaia, IF(rev.dipafront=\"1\",\"SI\",\"NO\") as dipa, IF(rev.ucc=\"1\",\"SI\",\"NO\") as ucc, str_replace (convert(char(10),rev.fecha_solicitud,102), '.', '-') + ' ' + convert(char(8),rev.fecha_solicitud,20) as rev_fecha_solicitud, est.descripcion as estado, rev.observaciones as rev_observaciones, f.nombre as funcionario, concat(gest.telefono1,gest.telefono2) as telefono_gestor, gest.nombre as gestor, rev.cantidad_por_bl as cantidad_por_bl, ramp.descripcion as ramp_descripcion, tmov.descripcion as tipo_movimiento, cab.placa as cab_placa, rev.porcentaje_intrusion as rev_porcentaje_intrusion, sel.selectivo as sel_selectivo, d.descripcion as destino, concat(rev.fecha_solicitud,rev.ubicacion) as horas, rev.ubicacion as rev_ubicacion from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT rev.codigo_revision as rev_codigo_revision, nav.naviera as nav_naviera, buq.buque as buq_buque, via.codigo as viaje, rev.contenedor as rev_contenedor, med.descripcion as med_descripcion, tcar.descripcion as tcar_descripcion, consig.nombre as consignatario, rev.bl as rev_bl, cont.descripcion as contenido, ede.descripcion as entidad, IF(rev.maga=\"1\",\"SI\",\"NO\") as maga, IF(rev.sat=\"1\",\"SI\",\"NO\") as sat, IF(rev.sgaia=\"1\",\"SI\",\"NO\") as sgaia, IF(rev.dipafront=\"1\",\"SI\",\"NO\") as dipa, IF(rev.ucc=\"1\",\"SI\",\"NO\") as ucc, rev.fecha_solicitud as rev_fecha_solicitud, est.descripcion as estado, rev.observaciones as rev_observaciones, f.nombre as funcionario, concat(gest.telefono1,gest.telefono2) as telefono_gestor, gest.nombre as gestor, rev.cantidad_por_bl as cantidad_por_bl, ramp.descripcion as ramp_descripcion, tmov.descripcion as tipo_movimiento, cab.placa as cab_placa, rev.porcentaje_intrusion as rev_porcentaje_intrusion, sel.selectivo as sel_selectivo, d.descripcion as destino, concat(rev.fecha_solicitud,rev.ubicacion) as horas, rev.ubicacion as rev_ubicacion from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT rev.codigo_revision as rev_codigo_revision, nav.naviera as nav_naviera, buq.buque as buq_buque, via.codigo as viaje, rev.contenedor as rev_contenedor, med.descripcion as med_descripcion, tcar.descripcion as tcar_descripcion, consig.nombre as consignatario, rev.bl as rev_bl, cont.descripcion as contenido, ede.descripcion as entidad, IF(rev.maga=\"1\",\"SI\",\"NO\") as maga, IF(rev.sat=\"1\",\"SI\",\"NO\") as sat, IF(rev.sgaia=\"1\",\"SI\",\"NO\") as sgaia, IF(rev.dipafront=\"1\",\"SI\",\"NO\") as dipa, IF(rev.ucc=\"1\",\"SI\",\"NO\") as ucc, rev.fecha_solicitud as rev_fecha_solicitud, est.descripcion as estado, rev.observaciones as rev_observaciones, f.nombre as funcionario, concat(gest.telefono1,gest.telefono2) as telefono_gestor, gest.nombre as gestor, rev.cantidad_por_bl as cantidad_por_bl, ramp.descripcion as ramp_descripcion, tmov.descripcion as tipo_movimiento, cab.placa as cab_placa, rev.porcentaje_intrusion as rev_porcentaje_intrusion, sel.selectivo as sel_selectivo, d.descripcion as destino, concat(rev.fecha_solicitud,rev.ubicacion) as horas, rev.ubicacion as rev_ubicacion from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->SelectLimit($nmgp_select, 3000, 0);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<Reporte_Revision_Tiempos>\r\n";
         }
         else
         {
             $this->xml_registro = "<Reporte_Revision_Tiempos";
         }
         $this->rev_codigo_revision = $rs->fields[0] ;  
         $this->rev_codigo_revision = (string)$this->rev_codigo_revision;
         $this->nav_naviera = $rs->fields[1] ;  
         $this->buq_buque = $rs->fields[2] ;  
         $this->viaje = $rs->fields[3] ;  
         $this->rev_contenedor = $rs->fields[4] ;  
         $this->med_descripcion = $rs->fields[5] ;  
         $this->tcar_descripcion = $rs->fields[6] ;  
         $this->consignatario = $rs->fields[7] ;  
         $this->rev_bl = $rs->fields[8] ;  
         $this->contenido = $rs->fields[9] ;  
         $this->entidad = $rs->fields[10] ;  
         $this->maga = $rs->fields[11] ;  
         $this->sat = $rs->fields[12] ;  
         $this->sgaia = $rs->fields[13] ;  
         $this->dipa = $rs->fields[14] ;  
         $this->ucc = $rs->fields[15] ;  
         $this->rev_fecha_solicitud = $rs->fields[16] ;  
         $this->estado = $rs->fields[17] ;  
         $this->rev_observaciones = $rs->fields[18] ;  
         $this->funcionario = $rs->fields[19] ;  
         $this->telefono_gestor = $rs->fields[20] ;  
         $this->gestor = $rs->fields[21] ;  
         $this->cantidad_por_bl = $rs->fields[22] ;  
         $this->cantidad_por_bl = (string)$this->cantidad_por_bl;
         $this->ramp_descripcion = $rs->fields[23] ;  
         $this->tipo_movimiento = $rs->fields[24] ;  
         $this->cab_placa = $rs->fields[25] ;  
         $this->rev_porcentaje_intrusion = $rs->fields[26] ;  
         $this->rev_porcentaje_intrusion = (string)$this->rev_porcentaje_intrusion;
         $this->sel_selectivo = $rs->fields[27] ;  
         $this->destino = $rs->fields[28] ;  
         $this->horas = $rs->fields[29] ;  
         $this->rev_ubicacion = $rs->fields[30] ;  
         $this->Orig_rev_codigo_revision = $this->rev_codigo_revision;
         $this->Orig_nav_naviera = $this->nav_naviera;
         $this->Orig_buq_buque = $this->buq_buque;
         $this->Orig_viaje = $this->viaje;
         $this->Orig_rev_contenedor = $this->rev_contenedor;
         $this->Orig_med_descripcion = $this->med_descripcion;
         $this->Orig_tcar_descripcion = $this->tcar_descripcion;
         $this->Orig_consignatario = $this->consignatario;
         $this->Orig_rev_bl = $this->rev_bl;
         $this->Orig_contenido = $this->contenido;
         $this->Orig_entidad = $this->entidad;
         $this->Orig_maga = $this->maga;
         $this->Orig_sat = $this->sat;
         $this->Orig_sgaia = $this->sgaia;
         $this->Orig_dipa = $this->dipa;
         $this->Orig_ucc = $this->ucc;
         $this->Orig_rev_fecha_solicitud = $this->rev_fecha_solicitud;
         $this->Orig_estado = $this->estado;
         $this->Orig_rev_observaciones = $this->rev_observaciones;
         $this->Orig_funcionario = $this->funcionario;
         $this->Orig_telefono_gestor = $this->telefono_gestor;
         $this->Orig_gestor = $this->gestor;
         $this->Orig_cantidad_por_bl = $this->cantidad_por_bl;
         $this->Orig_ramp_descripcion = $this->ramp_descripcion;
         $this->Orig_tipo_movimiento = $this->tipo_movimiento;
         $this->Orig_cab_placa = $this->cab_placa;
         $this->Orig_rev_porcentaje_intrusion = $this->rev_porcentaje_intrusion;
         $this->Orig_sel_selectivo = $this->sel_selectivo;
         $this->Orig_destino = $this->destino;
         $this->Orig_horas = $this->horas;
         $this->Orig_rev_ubicacion = $this->rev_ubicacion;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</Reporte_Revision_Tiempos>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['embutida'])
      { 
          if (!$this->New_Format)
          {
              $this->xml_registro = "";
          }
          $_SESSION['scriptcase']['export_return'] = $this->xml_registro;
      }
      else
      { 
          fwrite($xml_f, "</root>");
          fclose($xml_f);
          if ($this->Grava_view)
          {
             fwrite($xml_v, "</root>");
             fclose($xml_v);
          }
          if ($this->Tem_xml_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = $this->Ini->Nm_lang['lang_othr_prcs'];
                  $Mens_smry = $this->Ini->Nm_lang['lang_othr_smry_titl'];
                  if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                      $Mens_bar  = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
                      $Mens_smry = sc_convert_encoding($Mens_smry, "UTF-8", $_SESSION['scriptcase']['charset']);
                  }
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "Reporte_Revision_Tiempos_res_xml.class.php");
              $this->Res = new Reporte_Revision_Tiempos_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_res_grid'] = true;
              $this->Res->monta_xml();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = $this->Ini->Nm_lang['lang_btns_export_finished'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Xml_password != "" || $this->Tem_xml_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Xml_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Xml_f, ' ')) ? " \"" . $this->Xml_f . "\"" :  $this->Xml_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                  {
                      chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                  }
                  else
                  {
                      chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                  }
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Xml_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_xml_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_res_file']['xml'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_res_file']['xml']);
              }
              if ($this->Grava_view)
              {
                  $str_zip    = "";
                  $xml_view_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
                  $zip_view_f = str_replace(".zip", "_view.zip", $this->Zip_f);
                  $zip_arq_v  = str_replace(".zip", "_view.zip", $this->Arq_zip);
                  $Zip_f      = (FALSE !== strpos($zip_view_f, ' ')) ? " \"" . $zip_view_f . "\"" :  $zip_view_f;
                  $Arq_input  = (FALSE !== strpos($xml_view_ff, ' ')) ? " \"" . $xml_view_f . "\"" :  $xml_view_f;
                  if (is_file($Zip_f)) {
                      unlink($Zip_f);
                  }
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      chdir($this->Ini->path_third . "/zip/windows");
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                      {
                          chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                      }
                      else
                      {
                          chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                      }
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      chdir($this->Ini->path_third . "/zip/mac/bin");
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($Arq_input);
                  $this->Arquivo_view = $zip_arq_v;
                  if ($this->Tem_xml_res)
                  { 
                      $str_zip   = "";
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_res_file']['view'];
                      $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                      if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                      {
                          $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      if (!empty($str_zip)) {
                          exec($str_zip);
                      }
                      // ----- ZIP log
                      $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                      if ($fp)
                      {
                          @fwrite($fp, $str_zip . "\r\n\r\n");
                          @fclose($fp);
                      }
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- rev_codigo_revision
   function NM_export_rev_codigo_revision()
   {
         nmgp_Form_Num_Val($this->rev_codigo_revision, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->rev_codigo_revision))
         {
             $this->rev_codigo_revision = sc_convert_encoding($this->rev_codigo_revision, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['rev_codigo_revision'])) ? $this->New_label['rev_codigo_revision'] : "TURNO"; 
          }
          else
          {
              $SC_Label = "rev_codigo_revision"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->rev_codigo_revision) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->rev_codigo_revision) . "\"";
         }
   }
   //----- nav_naviera
   function NM_export_nav_naviera()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nav_naviera))
         {
             $this->nav_naviera = sc_convert_encoding($this->nav_naviera, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nav_naviera'])) ? $this->New_label['nav_naviera'] : "NAVIERA"; 
          }
          else
          {
              $SC_Label = "nav_naviera"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nav_naviera) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nav_naviera) . "\"";
         }
   }
   //----- buq_buque
   function NM_export_buq_buque()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->buq_buque))
         {
             $this->buq_buque = sc_convert_encoding($this->buq_buque, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['buq_buque'])) ? $this->New_label['buq_buque'] : "BUQUE"; 
          }
          else
          {
              $SC_Label = "buq_buque"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->buq_buque) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->buq_buque) . "\"";
         }
   }
   //----- viaje
   function NM_export_viaje()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->viaje))
         {
             $this->viaje = sc_convert_encoding($this->viaje, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['viaje'])) ? $this->New_label['viaje'] : "VIAJE"; 
          }
          else
          {
              $SC_Label = "viaje"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->viaje) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->viaje) . "\"";
         }
   }
   //----- rev_contenedor
   function NM_export_rev_contenedor()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->rev_contenedor))
         {
             $this->rev_contenedor = sc_convert_encoding($this->rev_contenedor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['rev_contenedor'])) ? $this->New_label['rev_contenedor'] : "CONTENEDOR"; 
          }
          else
          {
              $SC_Label = "rev_contenedor"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->rev_contenedor) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->rev_contenedor) . "\"";
         }
   }
   //----- med_descripcion
   function NM_export_med_descripcion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->med_descripcion))
         {
             $this->med_descripcion = sc_convert_encoding($this->med_descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['med_descripcion'])) ? $this->New_label['med_descripcion'] : "MED"; 
          }
          else
          {
              $SC_Label = "med_descripcion"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->med_descripcion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->med_descripcion) . "\"";
         }
   }
   //----- tcar_descripcion
   function NM_export_tcar_descripcion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tcar_descripcion))
         {
             $this->tcar_descripcion = sc_convert_encoding($this->tcar_descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['tcar_descripcion'])) ? $this->New_label['tcar_descripcion'] : "TIPO_CARGA"; 
          }
          else
          {
              $SC_Label = "tcar_descripcion"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tcar_descripcion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tcar_descripcion) . "\"";
         }
   }
   //----- consignatario
   function NM_export_consignatario()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->consignatario))
         {
             $this->consignatario = sc_convert_encoding($this->consignatario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['consignatario'])) ? $this->New_label['consignatario'] : "CONSIGNATARIO"; 
          }
          else
          {
              $SC_Label = "consignatario"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->consignatario) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->consignatario) . "\"";
         }
   }
   //----- rev_bl
   function NM_export_rev_bl()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->rev_bl))
         {
             $this->rev_bl = sc_convert_encoding($this->rev_bl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['rev_bl'])) ? $this->New_label['rev_bl'] : "BL"; 
          }
          else
          {
              $SC_Label = "rev_bl"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->rev_bl) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->rev_bl) . "\"";
         }
   }
   //----- contenido
   function NM_export_contenido()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->contenido))
         {
             $this->contenido = sc_convert_encoding($this->contenido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['contenido'])) ? $this->New_label['contenido'] : "CONTENIDO"; 
          }
          else
          {
              $SC_Label = "contenido"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->contenido) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->contenido) . "\"";
         }
   }
   //----- entidad
   function NM_export_entidad()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->entidad))
         {
             $this->entidad = sc_convert_encoding($this->entidad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['entidad'])) ? $this->New_label['entidad'] : "ENTIDAD"; 
          }
          else
          {
              $SC_Label = "entidad"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->entidad) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->entidad) . "\"";
         }
   }
   //----- maga
   function NM_export_maga()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->maga))
         {
             $this->maga = sc_convert_encoding($this->maga, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['maga'])) ? $this->New_label['maga'] : "MAGA"; 
          }
          else
          {
              $SC_Label = "maga"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->maga) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->maga) . "\"";
         }
   }
   //----- sat
   function NM_export_sat()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sat))
         {
             $this->sat = sc_convert_encoding($this->sat, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['sat'])) ? $this->New_label['sat'] : "SAT"; 
          }
          else
          {
              $SC_Label = "sat"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->sat) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->sat) . "\"";
         }
   }
   //----- sgaia
   function NM_export_sgaia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sgaia))
         {
             $this->sgaia = sc_convert_encoding($this->sgaia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['sgaia'])) ? $this->New_label['sgaia'] : "SGAIA"; 
          }
          else
          {
              $SC_Label = "sgaia"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->sgaia) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->sgaia) . "\"";
         }
   }
   //----- dipa
   function NM_export_dipa()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dipa))
         {
             $this->dipa = sc_convert_encoding($this->dipa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['dipa'])) ? $this->New_label['dipa'] : "DIPA"; 
          }
          else
          {
              $SC_Label = "dipa"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->dipa) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->dipa) . "\"";
         }
   }
   //----- ucc
   function NM_export_ucc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ucc))
         {
             $this->ucc = sc_convert_encoding($this->ucc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ucc'])) ? $this->New_label['ucc'] : "UCC"; 
          }
          else
          {
              $SC_Label = "ucc"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ucc) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ucc) . "\"";
         }
   }
   //----- rev_fecha_solicitud
   function NM_export_rev_fecha_solicitud()
   {
         if (substr($this->rev_fecha_solicitud, 10, 1) == "-") 
         { 
             $this->rev_fecha_solicitud = substr($this->rev_fecha_solicitud, 0, 10) . " " . substr($this->rev_fecha_solicitud, 11);
         } 
         if (substr($this->rev_fecha_solicitud, 13, 1) == ".") 
         { 
            $this->rev_fecha_solicitud = substr($this->rev_fecha_solicitud, 0, 13) . ":" . substr($this->rev_fecha_solicitud, 14, 2) . ":" . substr($this->rev_fecha_solicitud, 17);
         } 
         $conteudo_x =  $this->rev_fecha_solicitud;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->rev_fecha_solicitud, "YYYY-MM-DD HH:II:SS  ");
             $this->rev_fecha_solicitud = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->rev_fecha_solicitud))
         {
             $this->rev_fecha_solicitud = sc_convert_encoding($this->rev_fecha_solicitud, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['rev_fecha_solicitud'])) ? $this->New_label['rev_fecha_solicitud'] : "FECHA"; 
          }
          else
          {
              $SC_Label = "rev_fecha_solicitud"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->rev_fecha_solicitud) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->rev_fecha_solicitud) . "\"";
         }
   }
   //----- estado
   function NM_export_estado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->estado))
         {
             $this->estado = sc_convert_encoding($this->estado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "ESTADO"; 
          }
          else
          {
              $SC_Label = "estado"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->estado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->estado) . "\"";
         }
   }
   //----- rev_observaciones
   function NM_export_rev_observaciones()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->rev_observaciones))
         {
             $this->rev_observaciones = sc_convert_encoding($this->rev_observaciones, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['rev_observaciones'])) ? $this->New_label['rev_observaciones'] : "COMMENT"; 
          }
          else
          {
              $SC_Label = "rev_observaciones"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->rev_observaciones) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->rev_observaciones) . "\"";
         }
   }
   //----- funcionario
   function NM_export_funcionario()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->funcionario))
         {
             $this->funcionario = sc_convert_encoding($this->funcionario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['funcionario'])) ? $this->New_label['funcionario'] : "FUNCIONARIO"; 
          }
          else
          {
              $SC_Label = "funcionario"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->funcionario) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->funcionario) . "\"";
         }
   }
   //----- telefono_gestor
   function NM_export_telefono_gestor()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->telefono_gestor))
         {
             $this->telefono_gestor = sc_convert_encoding($this->telefono_gestor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['telefono_gestor'])) ? $this->New_label['telefono_gestor'] : "TELEFONO GESTOR"; 
          }
          else
          {
              $SC_Label = "telefono_gestor"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->telefono_gestor) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->telefono_gestor) . "\"";
         }
   }
   //----- gestor
   function NM_export_gestor()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->gestor))
         {
             $this->gestor = sc_convert_encoding($this->gestor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['gestor'])) ? $this->New_label['gestor'] : "GESTOR"; 
          }
          else
          {
              $SC_Label = "gestor"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->gestor) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->gestor) . "\"";
         }
   }
   //----- cantidad_por_bl
   function NM_export_cantidad_por_bl()
   {
         nmgp_Form_Num_Val($this->cantidad_por_bl, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cantidad_por_bl))
         {
             $this->cantidad_por_bl = sc_convert_encoding($this->cantidad_por_bl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['cantidad_por_bl'])) ? $this->New_label['cantidad_por_bl'] : "CANTIDAD POR BL"; 
          }
          else
          {
              $SC_Label = "cantidad_por_bl"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cantidad_por_bl) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cantidad_por_bl) . "\"";
         }
   }
   //----- ramp_descripcion
   function NM_export_ramp_descripcion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ramp_descripcion))
         {
             $this->ramp_descripcion = sc_convert_encoding($this->ramp_descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ramp_descripcion'])) ? $this->New_label['ramp_descripcion'] : "RAMPA"; 
          }
          else
          {
              $SC_Label = "ramp_descripcion"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ramp_descripcion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ramp_descripcion) . "\"";
         }
   }
   //----- tipo_movimiento
   function NM_export_tipo_movimiento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tipo_movimiento))
         {
             $this->tipo_movimiento = sc_convert_encoding($this->tipo_movimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['tipo_movimiento'])) ? $this->New_label['tipo_movimiento'] : "TIPO MOVIMIENTO"; 
          }
          else
          {
              $SC_Label = "tipo_movimiento"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tipo_movimiento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tipo_movimiento) . "\"";
         }
   }
   //----- cab_placa
   function NM_export_cab_placa()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cab_placa))
         {
             $this->cab_placa = sc_convert_encoding($this->cab_placa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['cab_placa'])) ? $this->New_label['cab_placa'] : "PLACA"; 
          }
          else
          {
              $SC_Label = "cab_placa"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cab_placa) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cab_placa) . "\"";
         }
   }
   //----- rev_porcentaje_intrusion
   function NM_export_rev_porcentaje_intrusion()
   {
         nmgp_Form_Num_Val($this->rev_porcentaje_intrusion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->rev_porcentaje_intrusion))
         {
             $this->rev_porcentaje_intrusion = sc_convert_encoding($this->rev_porcentaje_intrusion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['rev_porcentaje_intrusion'])) ? $this->New_label['rev_porcentaje_intrusion'] : "% INTRUSION"; 
          }
          else
          {
              $SC_Label = "rev_porcentaje_intrusion"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->rev_porcentaje_intrusion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->rev_porcentaje_intrusion) . "\"";
         }
   }
   //----- sel_selectivo
   function NM_export_sel_selectivo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sel_selectivo))
         {
             $this->sel_selectivo = sc_convert_encoding($this->sel_selectivo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['sel_selectivo'])) ? $this->New_label['sel_selectivo'] : "SELECTIVO"; 
          }
          else
          {
              $SC_Label = "sel_selectivo"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->sel_selectivo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->sel_selectivo) . "\"";
         }
   }
   //----- destino
   function NM_export_destino()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->destino))
         {
             $this->destino = sc_convert_encoding($this->destino, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['destino'])) ? $this->New_label['destino'] : "DESTINO"; 
          }
          else
          {
              $SC_Label = "destino"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->destino) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->destino) . "\"";
         }
   }
   //----- horas
   function NM_export_horas()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->horas))
         {
             $this->horas = sc_convert_encoding($this->horas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['horas'])) ? $this->New_label['horas'] : "Horas"; 
          }
          else
          {
              $SC_Label = "horas"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->horas) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->horas) . "\"";
         }
   }
   //----- rev_ubicacion
   function NM_export_rev_ubicacion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->rev_ubicacion))
         {
             $this->rev_ubicacion = sc_convert_encoding($this->rev_ubicacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['rev_ubicacion'])) ? $this->New_label['rev_ubicacion'] : "Ubicacion"; 
          }
          else
          {
              $SC_Label = "rev_ubicacion"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->rev_ubicacion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->rev_ubicacion) . "\"";
         }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function clear_tag(&$conteudo)
   {
      $out = (is_numeric(substr($conteudo, 0, 1)) || substr($conteudo, 0, 1) == "") ? "_" : "";
      $str_temp = "abcdefghijklmnopqrstuwxyz0123456789";
      for ($i = 0; $i < strlen($conteudo); $i++)
      {
          $char = substr($conteudo, $i, 1);
          $ok = false;
          for ($z = 0; $z < strlen($str_temp); $z++)
          {
              if (strtolower($char) == substr($str_temp, $z, 1))
              {
                  $ok = true;
                  break;
              }
          }
          $out .= ($ok) ? $char : "_";
      }
      $conteudo = $out;
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Reporte de Revisiones  :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XML</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="Reporte_Revision_Tiempos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="Reporte_Revision_Tiempos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['xml_return']); ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
