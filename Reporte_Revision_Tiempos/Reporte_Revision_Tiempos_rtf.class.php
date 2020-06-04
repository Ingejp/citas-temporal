<?php

class Reporte_Revision_Tiempos_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("en_us");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
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

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
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
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['Reporte_Revision_Tiempos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_Reporte_Revision_Tiempos";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "Reporte_Revision_Tiempos.rtf";
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
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['rtf_name']);
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

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['rev_codigo_revision'])) ? $this->New_label['rev_codigo_revision'] : "TURNO"; 
          if ($Cada_col == "rev_codigo_revision" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nav_naviera'])) ? $this->New_label['nav_naviera'] : "NAVIERA"; 
          if ($Cada_col == "nav_naviera" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['buq_buque'])) ? $this->New_label['buq_buque'] : "BUQUE"; 
          if ($Cada_col == "buq_buque" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['viaje'])) ? $this->New_label['viaje'] : "VIAJE"; 
          if ($Cada_col == "viaje" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rev_contenedor'])) ? $this->New_label['rev_contenedor'] : "CONTENEDOR"; 
          if ($Cada_col == "rev_contenedor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['med_descripcion'])) ? $this->New_label['med_descripcion'] : "MED"; 
          if ($Cada_col == "med_descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tcar_descripcion'])) ? $this->New_label['tcar_descripcion'] : "TIPO_CARGA"; 
          if ($Cada_col == "tcar_descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['consignatario'])) ? $this->New_label['consignatario'] : "CONSIGNATARIO"; 
          if ($Cada_col == "consignatario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rev_bl'])) ? $this->New_label['rev_bl'] : "BL"; 
          if ($Cada_col == "rev_bl" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['contenido'])) ? $this->New_label['contenido'] : "CONTENIDO"; 
          if ($Cada_col == "contenido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['entidad'])) ? $this->New_label['entidad'] : "ENTIDAD"; 
          if ($Cada_col == "entidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['maga'])) ? $this->New_label['maga'] : "MAGA"; 
          if ($Cada_col == "maga" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sat'])) ? $this->New_label['sat'] : "SAT"; 
          if ($Cada_col == "sat" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sgaia'])) ? $this->New_label['sgaia'] : "SGAIA"; 
          if ($Cada_col == "sgaia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dipa'])) ? $this->New_label['dipa'] : "DIPA"; 
          if ($Cada_col == "dipa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ucc'])) ? $this->New_label['ucc'] : "UCC"; 
          if ($Cada_col == "ucc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rev_fecha_solicitud'])) ? $this->New_label['rev_fecha_solicitud'] : "FECHA"; 
          if ($Cada_col == "rev_fecha_solicitud" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "ESTADO"; 
          if ($Cada_col == "estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rev_observaciones'])) ? $this->New_label['rev_observaciones'] : "COMMENT"; 
          if ($Cada_col == "rev_observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['funcionario'])) ? $this->New_label['funcionario'] : "FUNCIONARIO"; 
          if ($Cada_col == "funcionario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telefono_gestor'])) ? $this->New_label['telefono_gestor'] : "TELEFONO GESTOR"; 
          if ($Cada_col == "telefono_gestor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['gestor'])) ? $this->New_label['gestor'] : "GESTOR"; 
          if ($Cada_col == "gestor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cantidad_por_bl'])) ? $this->New_label['cantidad_por_bl'] : "CANTIDAD POR BL"; 
          if ($Cada_col == "cantidad_por_bl" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ramp_descripcion'])) ? $this->New_label['ramp_descripcion'] : "RAMPA"; 
          if ($Cada_col == "ramp_descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo_movimiento'])) ? $this->New_label['tipo_movimiento'] : "TIPO MOVIMIENTO"; 
          if ($Cada_col == "tipo_movimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cab_placa'])) ? $this->New_label['cab_placa'] : "PLACA"; 
          if ($Cada_col == "cab_placa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rev_porcentaje_intrusion'])) ? $this->New_label['rev_porcentaje_intrusion'] : "% INTRUSION"; 
          if ($Cada_col == "rev_porcentaje_intrusion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sel_selectivo'])) ? $this->New_label['sel_selectivo'] : "SELECTIVO"; 
          if ($Cada_col == "sel_selectivo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['destino'])) ? $this->New_label['destino'] : "DESTINO"; 
          if ($Cada_col == "destino" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['horas'])) ? $this->New_label['horas'] : "Horas"; 
          if ($Cada_col == "horas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rev_ubicacion'])) ? $this->New_label['rev_ubicacion'] : "Ubicacion"; 
          if ($Cada_col == "rev_ubicacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
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
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
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
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
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
         if (!NM_is_utf8($this->rev_codigo_revision))
         {
             $this->rev_codigo_revision = sc_convert_encoding($this->rev_codigo_revision, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rev_codigo_revision = str_replace('<', '&lt;', $this->rev_codigo_revision);
         $this->rev_codigo_revision = str_replace('>', '&gt;', $this->rev_codigo_revision);
         $this->Texto_tag .= "<td>" . $this->rev_codigo_revision . "</td>\r\n";
   }
   //----- nav_naviera
   function NM_export_nav_naviera()
   {
         $this->nav_naviera = html_entity_decode($this->nav_naviera, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nav_naviera = strip_tags($this->nav_naviera);
         if (!NM_is_utf8($this->nav_naviera))
         {
             $this->nav_naviera = sc_convert_encoding($this->nav_naviera, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nav_naviera = str_replace('<', '&lt;', $this->nav_naviera);
         $this->nav_naviera = str_replace('>', '&gt;', $this->nav_naviera);
         $this->Texto_tag .= "<td>" . $this->nav_naviera . "</td>\r\n";
   }
   //----- buq_buque
   function NM_export_buq_buque()
   {
         $this->buq_buque = html_entity_decode($this->buq_buque, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->buq_buque = strip_tags($this->buq_buque);
         if (!NM_is_utf8($this->buq_buque))
         {
             $this->buq_buque = sc_convert_encoding($this->buq_buque, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->buq_buque = str_replace('<', '&lt;', $this->buq_buque);
         $this->buq_buque = str_replace('>', '&gt;', $this->buq_buque);
         $this->Texto_tag .= "<td>" . $this->buq_buque . "</td>\r\n";
   }
   //----- viaje
   function NM_export_viaje()
   {
         $this->viaje = html_entity_decode($this->viaje, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->viaje = strip_tags($this->viaje);
         if (!NM_is_utf8($this->viaje))
         {
             $this->viaje = sc_convert_encoding($this->viaje, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->viaje = str_replace('<', '&lt;', $this->viaje);
         $this->viaje = str_replace('>', '&gt;', $this->viaje);
         $this->Texto_tag .= "<td>" . $this->viaje . "</td>\r\n";
   }
   //----- rev_contenedor
   function NM_export_rev_contenedor()
   {
         $this->rev_contenedor = html_entity_decode($this->rev_contenedor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rev_contenedor = strip_tags($this->rev_contenedor);
         if (!NM_is_utf8($this->rev_contenedor))
         {
             $this->rev_contenedor = sc_convert_encoding($this->rev_contenedor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rev_contenedor = str_replace('<', '&lt;', $this->rev_contenedor);
         $this->rev_contenedor = str_replace('>', '&gt;', $this->rev_contenedor);
         $this->Texto_tag .= "<td>" . $this->rev_contenedor . "</td>\r\n";
   }
   //----- med_descripcion
   function NM_export_med_descripcion()
   {
         $this->med_descripcion = html_entity_decode($this->med_descripcion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->med_descripcion = strip_tags($this->med_descripcion);
         if (!NM_is_utf8($this->med_descripcion))
         {
             $this->med_descripcion = sc_convert_encoding($this->med_descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->med_descripcion = str_replace('<', '&lt;', $this->med_descripcion);
         $this->med_descripcion = str_replace('>', '&gt;', $this->med_descripcion);
         $this->Texto_tag .= "<td>" . $this->med_descripcion . "</td>\r\n";
   }
   //----- tcar_descripcion
   function NM_export_tcar_descripcion()
   {
         $this->tcar_descripcion = html_entity_decode($this->tcar_descripcion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tcar_descripcion = strip_tags($this->tcar_descripcion);
         if (!NM_is_utf8($this->tcar_descripcion))
         {
             $this->tcar_descripcion = sc_convert_encoding($this->tcar_descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tcar_descripcion = str_replace('<', '&lt;', $this->tcar_descripcion);
         $this->tcar_descripcion = str_replace('>', '&gt;', $this->tcar_descripcion);
         $this->Texto_tag .= "<td>" . $this->tcar_descripcion . "</td>\r\n";
   }
   //----- consignatario
   function NM_export_consignatario()
   {
         $this->consignatario = html_entity_decode($this->consignatario, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->consignatario = strip_tags($this->consignatario);
         if (!NM_is_utf8($this->consignatario))
         {
             $this->consignatario = sc_convert_encoding($this->consignatario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->consignatario = str_replace('<', '&lt;', $this->consignatario);
         $this->consignatario = str_replace('>', '&gt;', $this->consignatario);
         $this->Texto_tag .= "<td>" . $this->consignatario . "</td>\r\n";
   }
   //----- rev_bl
   function NM_export_rev_bl()
   {
         $this->rev_bl = html_entity_decode($this->rev_bl, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rev_bl = strip_tags($this->rev_bl);
         if (!NM_is_utf8($this->rev_bl))
         {
             $this->rev_bl = sc_convert_encoding($this->rev_bl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rev_bl = str_replace('<', '&lt;', $this->rev_bl);
         $this->rev_bl = str_replace('>', '&gt;', $this->rev_bl);
         $this->Texto_tag .= "<td>" . $this->rev_bl . "</td>\r\n";
   }
   //----- contenido
   function NM_export_contenido()
   {
         $this->contenido = html_entity_decode($this->contenido, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->contenido = strip_tags($this->contenido);
         if (!NM_is_utf8($this->contenido))
         {
             $this->contenido = sc_convert_encoding($this->contenido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->contenido = str_replace('<', '&lt;', $this->contenido);
         $this->contenido = str_replace('>', '&gt;', $this->contenido);
         $this->Texto_tag .= "<td>" . $this->contenido . "</td>\r\n";
   }
   //----- entidad
   function NM_export_entidad()
   {
         $this->entidad = html_entity_decode($this->entidad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->entidad = strip_tags($this->entidad);
         if (!NM_is_utf8($this->entidad))
         {
             $this->entidad = sc_convert_encoding($this->entidad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->entidad = str_replace('<', '&lt;', $this->entidad);
         $this->entidad = str_replace('>', '&gt;', $this->entidad);
         $this->Texto_tag .= "<td>" . $this->entidad . "</td>\r\n";
   }
   //----- maga
   function NM_export_maga()
   {
         $this->maga = html_entity_decode($this->maga, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->maga = strip_tags($this->maga);
         if (!NM_is_utf8($this->maga))
         {
             $this->maga = sc_convert_encoding($this->maga, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->maga = str_replace('<', '&lt;', $this->maga);
         $this->maga = str_replace('>', '&gt;', $this->maga);
         $this->Texto_tag .= "<td>" . $this->maga . "</td>\r\n";
   }
   //----- sat
   function NM_export_sat()
   {
         $this->sat = html_entity_decode($this->sat, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sat = strip_tags($this->sat);
         if (!NM_is_utf8($this->sat))
         {
             $this->sat = sc_convert_encoding($this->sat, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sat = str_replace('<', '&lt;', $this->sat);
         $this->sat = str_replace('>', '&gt;', $this->sat);
         $this->Texto_tag .= "<td>" . $this->sat . "</td>\r\n";
   }
   //----- sgaia
   function NM_export_sgaia()
   {
         $this->sgaia = html_entity_decode($this->sgaia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sgaia = strip_tags($this->sgaia);
         if (!NM_is_utf8($this->sgaia))
         {
             $this->sgaia = sc_convert_encoding($this->sgaia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sgaia = str_replace('<', '&lt;', $this->sgaia);
         $this->sgaia = str_replace('>', '&gt;', $this->sgaia);
         $this->Texto_tag .= "<td>" . $this->sgaia . "</td>\r\n";
   }
   //----- dipa
   function NM_export_dipa()
   {
         $this->dipa = html_entity_decode($this->dipa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dipa = strip_tags($this->dipa);
         if (!NM_is_utf8($this->dipa))
         {
             $this->dipa = sc_convert_encoding($this->dipa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dipa = str_replace('<', '&lt;', $this->dipa);
         $this->dipa = str_replace('>', '&gt;', $this->dipa);
         $this->Texto_tag .= "<td>" . $this->dipa . "</td>\r\n";
   }
   //----- ucc
   function NM_export_ucc()
   {
         $this->ucc = html_entity_decode($this->ucc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ucc = strip_tags($this->ucc);
         if (!NM_is_utf8($this->ucc))
         {
             $this->ucc = sc_convert_encoding($this->ucc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ucc = str_replace('<', '&lt;', $this->ucc);
         $this->ucc = str_replace('>', '&gt;', $this->ucc);
         $this->Texto_tag .= "<td>" . $this->ucc . "</td>\r\n";
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
         if (!NM_is_utf8($this->rev_fecha_solicitud))
         {
             $this->rev_fecha_solicitud = sc_convert_encoding($this->rev_fecha_solicitud, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rev_fecha_solicitud = str_replace('<', '&lt;', $this->rev_fecha_solicitud);
         $this->rev_fecha_solicitud = str_replace('>', '&gt;', $this->rev_fecha_solicitud);
         $this->Texto_tag .= "<td>" . $this->rev_fecha_solicitud . "</td>\r\n";
   }
   //----- estado
   function NM_export_estado()
   {
         $this->estado = html_entity_decode($this->estado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estado = strip_tags($this->estado);
         if (!NM_is_utf8($this->estado))
         {
             $this->estado = sc_convert_encoding($this->estado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->estado = str_replace('<', '&lt;', $this->estado);
         $this->estado = str_replace('>', '&gt;', $this->estado);
         $this->Texto_tag .= "<td>" . $this->estado . "</td>\r\n";
   }
   //----- rev_observaciones
   function NM_export_rev_observaciones()
   {
         $this->rev_observaciones = html_entity_decode($this->rev_observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rev_observaciones = strip_tags($this->rev_observaciones);
         if (!NM_is_utf8($this->rev_observaciones))
         {
             $this->rev_observaciones = sc_convert_encoding($this->rev_observaciones, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rev_observaciones = str_replace('<', '&lt;', $this->rev_observaciones);
         $this->rev_observaciones = str_replace('>', '&gt;', $this->rev_observaciones);
         $this->Texto_tag .= "<td>" . $this->rev_observaciones . "</td>\r\n";
   }
   //----- funcionario
   function NM_export_funcionario()
   {
         $this->funcionario = html_entity_decode($this->funcionario, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->funcionario = strip_tags($this->funcionario);
         if (!NM_is_utf8($this->funcionario))
         {
             $this->funcionario = sc_convert_encoding($this->funcionario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->funcionario = str_replace('<', '&lt;', $this->funcionario);
         $this->funcionario = str_replace('>', '&gt;', $this->funcionario);
         $this->Texto_tag .= "<td>" . $this->funcionario . "</td>\r\n";
   }
   //----- telefono_gestor
   function NM_export_telefono_gestor()
   {
         $this->telefono_gestor = html_entity_decode($this->telefono_gestor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->telefono_gestor = strip_tags($this->telefono_gestor);
         if (!NM_is_utf8($this->telefono_gestor))
         {
             $this->telefono_gestor = sc_convert_encoding($this->telefono_gestor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->telefono_gestor = str_replace('<', '&lt;', $this->telefono_gestor);
         $this->telefono_gestor = str_replace('>', '&gt;', $this->telefono_gestor);
         $this->Texto_tag .= "<td>" . $this->telefono_gestor . "</td>\r\n";
   }
   //----- gestor
   function NM_export_gestor()
   {
         $this->gestor = html_entity_decode($this->gestor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->gestor = strip_tags($this->gestor);
         if (!NM_is_utf8($this->gestor))
         {
             $this->gestor = sc_convert_encoding($this->gestor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->gestor = str_replace('<', '&lt;', $this->gestor);
         $this->gestor = str_replace('>', '&gt;', $this->gestor);
         $this->Texto_tag .= "<td>" . $this->gestor . "</td>\r\n";
   }
   //----- cantidad_por_bl
   function NM_export_cantidad_por_bl()
   {
         nmgp_Form_Num_Val($this->cantidad_por_bl, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->cantidad_por_bl))
         {
             $this->cantidad_por_bl = sc_convert_encoding($this->cantidad_por_bl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cantidad_por_bl = str_replace('<', '&lt;', $this->cantidad_por_bl);
         $this->cantidad_por_bl = str_replace('>', '&gt;', $this->cantidad_por_bl);
         $this->Texto_tag .= "<td>" . $this->cantidad_por_bl . "</td>\r\n";
   }
   //----- ramp_descripcion
   function NM_export_ramp_descripcion()
   {
         $this->ramp_descripcion = html_entity_decode($this->ramp_descripcion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ramp_descripcion = strip_tags($this->ramp_descripcion);
         if (!NM_is_utf8($this->ramp_descripcion))
         {
             $this->ramp_descripcion = sc_convert_encoding($this->ramp_descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ramp_descripcion = str_replace('<', '&lt;', $this->ramp_descripcion);
         $this->ramp_descripcion = str_replace('>', '&gt;', $this->ramp_descripcion);
         $this->Texto_tag .= "<td>" . $this->ramp_descripcion . "</td>\r\n";
   }
   //----- tipo_movimiento
   function NM_export_tipo_movimiento()
   {
         $this->tipo_movimiento = html_entity_decode($this->tipo_movimiento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo_movimiento = strip_tags($this->tipo_movimiento);
         if (!NM_is_utf8($this->tipo_movimiento))
         {
             $this->tipo_movimiento = sc_convert_encoding($this->tipo_movimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tipo_movimiento = str_replace('<', '&lt;', $this->tipo_movimiento);
         $this->tipo_movimiento = str_replace('>', '&gt;', $this->tipo_movimiento);
         $this->Texto_tag .= "<td>" . $this->tipo_movimiento . "</td>\r\n";
   }
   //----- cab_placa
   function NM_export_cab_placa()
   {
         $this->cab_placa = html_entity_decode($this->cab_placa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cab_placa = strip_tags($this->cab_placa);
         if (!NM_is_utf8($this->cab_placa))
         {
             $this->cab_placa = sc_convert_encoding($this->cab_placa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cab_placa = str_replace('<', '&lt;', $this->cab_placa);
         $this->cab_placa = str_replace('>', '&gt;', $this->cab_placa);
         $this->Texto_tag .= "<td>" . $this->cab_placa . "</td>\r\n";
   }
   //----- rev_porcentaje_intrusion
   function NM_export_rev_porcentaje_intrusion()
   {
         nmgp_Form_Num_Val($this->rev_porcentaje_intrusion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->rev_porcentaje_intrusion))
         {
             $this->rev_porcentaje_intrusion = sc_convert_encoding($this->rev_porcentaje_intrusion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rev_porcentaje_intrusion = str_replace('<', '&lt;', $this->rev_porcentaje_intrusion);
         $this->rev_porcentaje_intrusion = str_replace('>', '&gt;', $this->rev_porcentaje_intrusion);
         $this->Texto_tag .= "<td>" . $this->rev_porcentaje_intrusion . "</td>\r\n";
   }
   //----- sel_selectivo
   function NM_export_sel_selectivo()
   {
         $this->sel_selectivo = html_entity_decode($this->sel_selectivo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sel_selectivo = strip_tags($this->sel_selectivo);
         if (!NM_is_utf8($this->sel_selectivo))
         {
             $this->sel_selectivo = sc_convert_encoding($this->sel_selectivo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sel_selectivo = str_replace('<', '&lt;', $this->sel_selectivo);
         $this->sel_selectivo = str_replace('>', '&gt;', $this->sel_selectivo);
         $this->Texto_tag .= "<td>" . $this->sel_selectivo . "</td>\r\n";
   }
   //----- destino
   function NM_export_destino()
   {
         $this->destino = html_entity_decode($this->destino, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->destino = strip_tags($this->destino);
         if (!NM_is_utf8($this->destino))
         {
             $this->destino = sc_convert_encoding($this->destino, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->destino = str_replace('<', '&lt;', $this->destino);
         $this->destino = str_replace('>', '&gt;', $this->destino);
         $this->Texto_tag .= "<td>" . $this->destino . "</td>\r\n";
   }
   //----- horas
   function NM_export_horas()
   {
         $this->horas = html_entity_decode($this->horas, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->horas = strip_tags($this->horas);
         if (!NM_is_utf8($this->horas))
         {
             $this->horas = sc_convert_encoding($this->horas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->horas = str_replace('<', '&lt;', $this->horas);
         $this->horas = str_replace('>', '&gt;', $this->horas);
         $this->Texto_tag .= "<td>" . $this->horas . "</td>\r\n";
   }
   //----- rev_ubicacion
   function NM_export_rev_ubicacion()
   {
         $this->rev_ubicacion = html_entity_decode($this->rev_ubicacion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rev_ubicacion = strip_tags($this->rev_ubicacion);
         if (!NM_is_utf8($this->rev_ubicacion))
         {
             $this->rev_ubicacion = sc_convert_encoding($this->rev_ubicacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rev_ubicacion = str_replace('<', '&lt;', $this->rev_ubicacion);
         $this->rev_ubicacion = str_replace('>', '&gt;', $this->rev_ubicacion);
         $this->Texto_tag .= "<td>" . $this->rev_ubicacion . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Revision_Tiempos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Reporte de Revisiones  :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="Reporte_Revision_Tiempos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="Reporte_Revision_Tiempos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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