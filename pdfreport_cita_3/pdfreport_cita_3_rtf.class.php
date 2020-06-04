<?php

class pdfreport_cita_3_rtf
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
      require_once($this->Ini->path_aplicacao . "pdfreport_cita_3_total.class.php"); 
      $this->Tot      = new pdfreport_cita_3_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_cita_3']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdfreport_cita_3";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_cita_3.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['rtf_name']);
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idviaje = $Busca_temp['idviaje']; 
          $tmp_pos = strpos($this->idviaje, "##@@");
          if ($tmp_pos !== false && !is_array($this->idviaje))
          {
              $this->idviaje = substr($this->idviaje, 0, $tmp_pos);
          }
          $this->idcita = $Busca_temp['idcita']; 
          $tmp_pos = strpos($this->idcita, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcita))
          {
              $this->idcita = substr($this->idcita, 0, $tmp_pos);
          }
          $this->codigo_cita = $Busca_temp['codigo_cita']; 
          $tmp_pos = strpos($this->codigo_cita, "##@@");
          if ($tmp_pos !== false && !is_array($this->codigo_cita))
          {
              $this->codigo_cita = substr($this->codigo_cita, 0, $tmp_pos);
          }
          $this->contenedorimport = $Busca_temp['contenedorimport']; 
          $tmp_pos = strpos($this->contenedorimport, "##@@");
          if ($tmp_pos !== false && !is_array($this->contenedorimport))
          {
              $this->contenedorimport = substr($this->contenedorimport, 0, $tmp_pos);
          }
          $this->contenedorexport = $Busca_temp['contenedorexport']; 
          $tmp_pos = strpos($this->contenedorexport, "##@@");
          if ($tmp_pos !== false && !is_array($this->contenedorexport))
          {
              $this->contenedorexport = substr($this->contenedorexport, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['pdfreport_cita_3']['contr_erro'] = 'on';
if (!isset($_SESSION['codigo_cita'])) {$_SESSION['codigo_cita'] = "";}
if (!isset($this->sc_temp_codigo_cita)) {$this->sc_temp_codigo_cita = (isset($_SESSION['codigo_cita'])) ? $_SESSION['codigo_cita'] : "";}
 $this->nm_where_dinamico =" WHERE codigo_cita='".$this->sc_temp_codigo_cita."'";
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['where_dinamico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['where_dinamico'] != $this->nm_where_dinamico) {
    $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['where_dinamico'] = $this->nm_where_dinamico;
    unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['inicio']);
}

if (isset($this->sc_temp_codigo_cita)) {$_SESSION['codigo_cita'] = $this->sc_temp_codigo_cita;}
$_SESSION['scriptcase']['pdfreport_cita_3']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['idcita'])) ? $this->New_label['idcita'] : "Id Cita"; 
          if ($Cada_col == "idcita" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigo_cita'])) ? $this->New_label['codigo_cita'] : "Codigo Cita"; 
          if ($Cada_col == "codigo_cita" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['contenedorimport'])) ? $this->New_label['contenedorimport'] : "Contenedorimport"; 
          if ($Cada_col == "contenedorimport" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['contenedorexport'])) ? $this->New_label['contenedorexport'] : "Contenedor Export"; 
          if ($Cada_col == "contenedorexport" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
          if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechainicio'])) ? $this->New_label['fechainicio'] : "Fecha Inicio"; 
          if ($Cada_col == "fechainicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['chasis'])) ? $this->New_label['chasis'] : "Chasis"; 
          if ($Cada_col == "chasis" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idnaviera'])) ? $this->New_label['idnaviera'] : "Id Naviera"; 
          if ($Cada_col == "idnaviera" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idtipodecarga'])) ? $this->New_label['idtipodecarga'] : "Idtipodecarga"; 
          if ($Cada_col == "idtipodecarga" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idestado'])) ? $this->New_label['idestado'] : "Idestado"; 
          if ($Cada_col == "idestado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idpiloto'])) ? $this->New_label['idpiloto'] : "Idpiloto"; 
          if ($Cada_col == "idpiloto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idcabezal'])) ? $this->New_label['idcabezal'] : "Idcabezal"; 
          if ($Cada_col == "idcabezal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idselectivo'])) ? $this->New_label['idselectivo'] : "Idselectivo"; 
          if ($Cada_col == "idselectivo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idyarda'])) ? $this->New_label['idyarda'] : "Idyarda"; 
          if ($Cada_col == "idyarda" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idtipomovimiento'])) ? $this->New_label['idtipomovimiento'] : "Idtipo Movimiento"; 
          if ($Cada_col == "idtipomovimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idviaje'])) ? $this->New_label['idviaje'] : "Idviaje"; 
          if ($Cada_col == "idviaje" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT idCita, codigo_cita, contenedorimport, contenedorExport, observaciones, str_replace (convert(char(10),fechaInicio,102), '.', '-') + ' ' + convert(char(8),fechaInicio,20), chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idCita, codigo_cita, contenedorimport, contenedorExport, observaciones, fechaInicio, chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idCita, codigo_cita, contenedorimport, contenedorExport, observaciones, fechaInicio, chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['order_grid'];
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
      $rs = $this->Db->Execute($nmgp_select);
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
         $this->idcita = $rs->fields[0] ;  
         $this->idcita = (string)$this->idcita;
         $this->codigo_cita = $rs->fields[1] ;  
         $this->contenedorimport = $rs->fields[2] ;  
         $this->contenedorexport = $rs->fields[3] ;  
         $this->observaciones = $rs->fields[4] ;  
         $this->fechainicio = $rs->fields[5] ;  
         $this->chasis = $rs->fields[6] ;  
         $this->idnaviera = $rs->fields[7] ;  
         $this->idnaviera = (string)$this->idnaviera;
         $this->idtipodecarga = $rs->fields[8] ;  
         $this->idtipodecarga = (string)$this->idtipodecarga;
         $this->idestado = $rs->fields[9] ;  
         $this->idestado = (string)$this->idestado;
         $this->idpiloto = $rs->fields[10] ;  
         $this->idpiloto = (string)$this->idpiloto;
         $this->idcabezal = $rs->fields[11] ;  
         $this->idcabezal = (string)$this->idcabezal;
         $this->idselectivo = $rs->fields[12] ;  
         $this->idselectivo = (string)$this->idselectivo;
         $this->idyarda = $rs->fields[13] ;  
         $this->idyarda = (string)$this->idyarda;
         $this->idtipomovimiento = $rs->fields[14] ;  
         $this->idtipomovimiento = (string)$this->idtipomovimiento;
         $this->idviaje = $rs->fields[15] ;  
         $this->idviaje = (string)$this->idviaje;
         //----- lookup - idnaviera
         $this->look_idnaviera = $this->idnaviera; 
         $this->Lookup->lookup_idnaviera($this->look_idnaviera, $this->idnaviera) ; 
         $this->look_idnaviera = ($this->look_idnaviera == "&nbsp;") ? "" : $this->look_idnaviera; 
         //----- lookup - idtipodecarga
         $this->look_idtipodecarga = $this->idtipodecarga; 
         $this->Lookup->lookup_idtipodecarga($this->look_idtipodecarga, $this->idtipodecarga) ; 
         $this->look_idtipodecarga = ($this->look_idtipodecarga == "&nbsp;") ? "" : $this->look_idtipodecarga; 
         //----- lookup - idestado
         $this->look_idestado = $this->idestado; 
         $this->Lookup->lookup_idestado($this->look_idestado, $this->idestado) ; 
         $this->look_idestado = ($this->look_idestado == "&nbsp;") ? "" : $this->look_idestado; 
         //----- lookup - idpiloto
         $this->look_idpiloto = $this->idpiloto; 
         $this->Lookup->lookup_idpiloto($this->look_idpiloto, $this->idpiloto) ; 
         $this->look_idpiloto = ($this->look_idpiloto == "&nbsp;") ? "" : $this->look_idpiloto; 
         //----- lookup - idcabezal
         $this->look_idcabezal = $this->idcabezal; 
         $this->Lookup->lookup_idcabezal($this->look_idcabezal, $this->idcabezal) ; 
         $this->look_idcabezal = ($this->look_idcabezal == "&nbsp;") ? "" : $this->look_idcabezal; 
         //----- lookup - idselectivo
         $this->look_idselectivo = $this->idselectivo; 
         $this->Lookup->lookup_idselectivo($this->look_idselectivo, $this->idselectivo) ; 
         $this->look_idselectivo = ($this->look_idselectivo == "&nbsp;") ? "" : $this->look_idselectivo; 
         //----- lookup - idtipomovimiento
         $this->look_idtipomovimiento = $this->idtipomovimiento; 
         $this->Lookup->lookup_idtipomovimiento($this->look_idtipomovimiento, $this->idtipomovimiento) ; 
         $this->look_idtipomovimiento = ($this->look_idtipomovimiento == "&nbsp;") ? "" : $this->look_idtipomovimiento; 
         //----- lookup - idviaje
         $this->look_idviaje = $this->idviaje; 
         $this->Lookup->lookup_idviaje($this->look_idviaje, $this->idviaje) ; 
         $this->look_idviaje = ($this->look_idviaje == "&nbsp;") ? "" : $this->look_idviaje; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- idcita
   function NM_export_idcita()
   {
         nmgp_Form_Num_Val($this->idcita, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->idcita))
         {
             $this->idcita = sc_convert_encoding($this->idcita, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->idcita = str_replace('<', '&lt;', $this->idcita);
         $this->idcita = str_replace('>', '&gt;', $this->idcita);
         $this->Texto_tag .= "<td>" . $this->idcita . "</td>\r\n";
   }
   //----- codigo_cita
   function NM_export_codigo_cita()
   {
         if (!NM_is_utf8($this->codigo_cita))
         {
             $this->codigo_cita = sc_convert_encoding($this->codigo_cita, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->codigo_cita = str_replace('<', '&lt;', $this->codigo_cita);
         $this->codigo_cita = str_replace('>', '&gt;', $this->codigo_cita);
         $this->Texto_tag .= "<td>" . $this->codigo_cita . "</td>\r\n";
   }
   //----- contenedorimport
   function NM_export_contenedorimport()
   {
         $this->contenedorimport = html_entity_decode($this->contenedorimport, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->contenedorimport = strip_tags($this->contenedorimport);
         if (!NM_is_utf8($this->contenedorimport))
         {
             $this->contenedorimport = sc_convert_encoding($this->contenedorimport, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->contenedorimport = str_replace('<', '&lt;', $this->contenedorimport);
         $this->contenedorimport = str_replace('>', '&gt;', $this->contenedorimport);
         $this->Texto_tag .= "<td>" . $this->contenedorimport . "</td>\r\n";
   }
   //----- contenedorexport
   function NM_export_contenedorexport()
   {
         $this->contenedorexport = html_entity_decode($this->contenedorexport, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->contenedorexport = strip_tags($this->contenedorexport);
         if (!NM_is_utf8($this->contenedorexport))
         {
             $this->contenedorexport = sc_convert_encoding($this->contenedorexport, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->contenedorexport = str_replace('<', '&lt;', $this->contenedorexport);
         $this->contenedorexport = str_replace('>', '&gt;', $this->contenedorexport);
         $this->Texto_tag .= "<td>" . $this->contenedorexport . "</td>\r\n";
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = strip_tags($this->observaciones);
         if (!NM_is_utf8($this->observaciones))
         {
             $this->observaciones = sc_convert_encoding($this->observaciones, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->observaciones = str_replace('<', '&lt;', $this->observaciones);
         $this->observaciones = str_replace('>', '&gt;', $this->observaciones);
         $this->Texto_tag .= "<td>" . $this->observaciones . "</td>\r\n";
   }
   //----- fechainicio
   function NM_export_fechainicio()
   {
         if (substr($this->fechainicio, 10, 1) == "-") 
         { 
             $this->fechainicio = substr($this->fechainicio, 0, 10) . " " . substr($this->fechainicio, 11);
         } 
         if (substr($this->fechainicio, 13, 1) == ".") 
         { 
            $this->fechainicio = substr($this->fechainicio, 0, 13) . ":" . substr($this->fechainicio, 14, 2) . ":" . substr($this->fechainicio, 17);
         } 
         $conteudo_x =  $this->fechainicio;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechainicio, "YYYY-MM-DD HH:II:SS  ");
             $this->fechainicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->fechainicio))
         {
             $this->fechainicio = sc_convert_encoding($this->fechainicio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fechainicio = str_replace('<', '&lt;', $this->fechainicio);
         $this->fechainicio = str_replace('>', '&gt;', $this->fechainicio);
         $this->Texto_tag .= "<td>" . $this->fechainicio . "</td>\r\n";
   }
   //----- chasis
   function NM_export_chasis()
   {
         $this->chasis = html_entity_decode($this->chasis, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->chasis = strip_tags($this->chasis);
         if (!NM_is_utf8($this->chasis))
         {
             $this->chasis = sc_convert_encoding($this->chasis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->chasis = str_replace('<', '&lt;', $this->chasis);
         $this->chasis = str_replace('>', '&gt;', $this->chasis);
         $this->Texto_tag .= "<td>" . $this->chasis . "</td>\r\n";
   }
   //----- idnaviera
   function NM_export_idnaviera()
   {
         nmgp_Form_Num_Val($this->look_idnaviera, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idnaviera))
         {
             $this->look_idnaviera = sc_convert_encoding($this->look_idnaviera, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idnaviera = str_replace('<', '&lt;', $this->look_idnaviera);
         $this->look_idnaviera = str_replace('>', '&gt;', $this->look_idnaviera);
         $this->Texto_tag .= "<td>" . $this->look_idnaviera . "</td>\r\n";
   }
   //----- idtipodecarga
   function NM_export_idtipodecarga()
   {
         nmgp_Form_Num_Val($this->look_idtipodecarga, ",", "", "0", "S", "2", "", "N:1", "-") ; 
         if (!NM_is_utf8($this->look_idtipodecarga))
         {
             $this->look_idtipodecarga = sc_convert_encoding($this->look_idtipodecarga, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idtipodecarga = str_replace('<', '&lt;', $this->look_idtipodecarga);
         $this->look_idtipodecarga = str_replace('>', '&gt;', $this->look_idtipodecarga);
         $this->Texto_tag .= "<td>" . $this->look_idtipodecarga . "</td>\r\n";
   }
   //----- idestado
   function NM_export_idestado()
   {
         nmgp_Form_Num_Val($this->look_idestado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idestado))
         {
             $this->look_idestado = sc_convert_encoding($this->look_idestado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idestado = str_replace('<', '&lt;', $this->look_idestado);
         $this->look_idestado = str_replace('>', '&gt;', $this->look_idestado);
         $this->Texto_tag .= "<td>" . $this->look_idestado . "</td>\r\n";
   }
   //----- idpiloto
   function NM_export_idpiloto()
   {
         nmgp_Form_Num_Val($this->look_idpiloto, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idpiloto))
         {
             $this->look_idpiloto = sc_convert_encoding($this->look_idpiloto, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idpiloto = str_replace('<', '&lt;', $this->look_idpiloto);
         $this->look_idpiloto = str_replace('>', '&gt;', $this->look_idpiloto);
         $this->Texto_tag .= "<td>" . $this->look_idpiloto . "</td>\r\n";
   }
   //----- idcabezal
   function NM_export_idcabezal()
   {
         nmgp_Form_Num_Val($this->look_idcabezal, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idcabezal))
         {
             $this->look_idcabezal = sc_convert_encoding($this->look_idcabezal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idcabezal = str_replace('<', '&lt;', $this->look_idcabezal);
         $this->look_idcabezal = str_replace('>', '&gt;', $this->look_idcabezal);
         $this->Texto_tag .= "<td>" . $this->look_idcabezal . "</td>\r\n";
   }
   //----- idselectivo
   function NM_export_idselectivo()
   {
         nmgp_Form_Num_Val($this->look_idselectivo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idselectivo))
         {
             $this->look_idselectivo = sc_convert_encoding($this->look_idselectivo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idselectivo = str_replace('<', '&lt;', $this->look_idselectivo);
         $this->look_idselectivo = str_replace('>', '&gt;', $this->look_idselectivo);
         $this->Texto_tag .= "<td>" . $this->look_idselectivo . "</td>\r\n";
   }
   //----- idyarda
   function NM_export_idyarda()
   {
         nmgp_Form_Num_Val($this->idyarda, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->idyarda))
         {
             $this->idyarda = sc_convert_encoding($this->idyarda, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->idyarda = str_replace('<', '&lt;', $this->idyarda);
         $this->idyarda = str_replace('>', '&gt;', $this->idyarda);
         $this->Texto_tag .= "<td>" . $this->idyarda . "</td>\r\n";
   }
   //----- idtipomovimiento
   function NM_export_idtipomovimiento()
   {
         nmgp_Form_Num_Val($this->look_idtipomovimiento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idtipomovimiento))
         {
             $this->look_idtipomovimiento = sc_convert_encoding($this->look_idtipomovimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idtipomovimiento = str_replace('<', '&lt;', $this->look_idtipomovimiento);
         $this->look_idtipomovimiento = str_replace('>', '&gt;', $this->look_idtipomovimiento);
         $this->Texto_tag .= "<td>" . $this->look_idtipomovimiento . "</td>\r\n";
   }
   //----- idviaje
   function NM_export_idviaje()
   {
         nmgp_Form_Num_Val($this->look_idviaje, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idviaje))
         {
             $this->look_idviaje = sc_convert_encoding($this->look_idviaje, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idviaje = str_replace('<', '&lt;', $this->look_idviaje);
         $this->look_idviaje = str_replace('>', '&gt;', $this->look_idviaje);
         $this->Texto_tag .= "<td>" . $this->look_idviaje . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_title'] ?> cita :: RTF</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_cita_3_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_cita_3"> 
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
