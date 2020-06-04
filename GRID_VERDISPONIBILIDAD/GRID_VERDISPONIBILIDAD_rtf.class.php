<?php

class GRID_VERDISPONIBILIDAD_rtf
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
      require_once($this->Ini->path_aplicacao . "GRID_VERDISPONIBILIDAD_total.class.php"); 
      $this->Tot      = new GRID_VERDISPONIBILIDAD_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['GRID_VERDISPONIBILIDAD']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_GRID_VERDISPONIBILIDAD";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "GRID_VERDISPONIBILIDAD.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['GRID_VERDISPONIBILIDAD']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['GRID_VERDISPONIBILIDAD']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['GRID_VERDISPONIBILIDAD']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idasignacionmodulista = $Busca_temp['idasignacionmodulista']; 
          $tmp_pos = strpos($this->idasignacionmodulista, "##@@");
          if ($tmp_pos !== false && !is_array($this->idasignacionmodulista))
          {
              $this->idasignacionmodulista = substr($this->idasignacionmodulista, 0, $tmp_pos);
          }
          $this->descripcion = $Busca_temp['descripcion']; 
          $tmp_pos = strpos($this->descripcion, "##@@");
          if ($tmp_pos !== false && !is_array($this->descripcion))
          {
              $this->descripcion = substr($this->descripcion, 0, $tmp_pos);
          }
          $this->cantidadmodulistas = $Busca_temp['cantidadmodulistas']; 
          $tmp_pos = strpos($this->cantidadmodulistas, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidadmodulistas))
          {
              $this->cantidadmodulistas = substr($this->cantidadmodulistas, 0, $tmp_pos);
          }
          $this->rangoinicial = $Busca_temp['rangoinicial']; 
          $tmp_pos = strpos($this->rangoinicial, "##@@");
          if ($tmp_pos !== false && !is_array($this->rangoinicial))
          {
              $this->rangoinicial = substr($this->rangoinicial, 0, $tmp_pos);
          }
          $this->rangoinicial_2 = $Busca_temp['rangoinicial_input_2']; 
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['rangoinicial'])) ? $this->New_label['rangoinicial'] : "FECHA"; 
          if ($Cada_col == "rangoinicial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['horainicio'])) ? $this->New_label['horainicio'] : "Hora Inicio"; 
          if ($Cada_col == "horainicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['citas_disponibles'])) ? $this->New_label['citas_disponibles'] : "Citas Disponibles"; 
          if ($Cada_col == "citas_disponibles" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estatus'])) ? $this->New_label['estatus'] : "ESTATUS"; 
          if ($Cada_col == "estatus" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idasignacionmodulista'])) ? $this->New_label['idasignacionmodulista'] : "Idasignacion Modulista"; 
          if ($Cada_col == "idasignacionmodulista" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['descripcion'])) ? $this->New_label['descripcion'] : "Descripcion"; 
          if ($Cada_col == "descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cantidadmodulistas'])) ? $this->New_label['cantidadmodulistas'] : "Cantidad Modulistas"; 
          if ($Cada_col == "cantidadmodulistas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rangofinal'])) ? $this->New_label['rangofinal'] : "Rango Final"; 
          if ($Cada_col == "rangofinal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecharegistro'])) ? $this->New_label['fecharegistro'] : "Fecha Registro"; 
          if ($Cada_col == "fecharegistro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT str_replace (convert(char(10),rangoInicial,102), '.', '-') + ' ' + convert(char(8),rangoInicial,20), str_replace (convert(char(10),horaInicio,102), '.', '-') + ' ' + convert(char(8),horaInicio,20), citas_disponibles, idasignacionModulista, descripcion, cantidadModulistas, str_replace (convert(char(10),rangoFinal,102), '.', '-') + ' ' + convert(char(8),rangoFinal,20), str_replace (convert(char(10),fechaRegistro,102), '.', '-') + ' ' + convert(char(8),fechaRegistro,20) from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT rangoInicial, horaInicio, citas_disponibles, idasignacionModulista, descripcion, cantidadModulistas, rangoFinal, fechaRegistro from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT rangoInicial, horaInicio, citas_disponibles, idasignacionModulista, descripcion, cantidadModulistas, rangoFinal, fechaRegistro from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['order_grid'];
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
         $this->rangoinicial = $rs->fields[0] ;  
         $this->horainicio = $rs->fields[1] ;  
         $this->citas_disponibles = $rs->fields[2] ;  
         $this->citas_disponibles = (string)$this->citas_disponibles;
         $this->idasignacionmodulista = $rs->fields[3] ;  
         $this->idasignacionmodulista = (string)$this->idasignacionmodulista;
         $this->descripcion = $rs->fields[4] ;  
         $this->cantidadmodulistas = $rs->fields[5] ;  
         $this->cantidadmodulistas = (string)$this->cantidadmodulistas;
         $this->rangofinal = $rs->fields[6] ;  
         $this->fecharegistro = $rs->fields[7] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['GRID_VERDISPONIBILIDAD']['contr_erro'] = 'on';
 if ($this->citas_disponibles  > 0) 
	{
	$this->estatus  = "DISPONIBLE";
		$this->NM_field_color["estatus"] = "#002DD5";
	}

else {
	$this->estatus  = "NO DISPONIBLE";
		$this->NM_field_color["estatus"] = "#FF0000";
	}
$_SESSION['scriptcase']['GRID_VERDISPONIBILIDAD']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- rangoinicial
   function NM_export_rangoinicial()
   {
         if (substr($this->rangoinicial, 10, 1) == "-") 
         { 
             $this->rangoinicial = substr($this->rangoinicial, 0, 10) . " " . substr($this->rangoinicial, 11);
         } 
         if (substr($this->rangoinicial, 13, 1) == ".") 
         { 
            $this->rangoinicial = substr($this->rangoinicial, 0, 13) . ":" . substr($this->rangoinicial, 14, 2) . ":" . substr($this->rangoinicial, 17);
         } 
         $conteudo_x =  $this->rangoinicial;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->rangoinicial, "YYYY-MM-DD HH:II:SS  ");
             $this->rangoinicial = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->rangoinicial))
         {
             $this->rangoinicial = sc_convert_encoding($this->rangoinicial, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rangoinicial = str_replace('<', '&lt;', $this->rangoinicial);
         $this->rangoinicial = str_replace('>', '&gt;', $this->rangoinicial);
         $this->Texto_tag .= "<td>" . $this->rangoinicial . "</td>\r\n";
   }
   //----- horainicio
   function NM_export_horainicio()
   {
         $conteudo_x =  $this->horainicio;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->horainicio, "HH:II:SS  ");
             $this->horainicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
         if (!NM_is_utf8($this->horainicio))
         {
             $this->horainicio = sc_convert_encoding($this->horainicio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->horainicio = str_replace('<', '&lt;', $this->horainicio);
         $this->horainicio = str_replace('>', '&gt;', $this->horainicio);
         $this->Texto_tag .= "<td>" . $this->horainicio . "</td>\r\n";
   }
   //----- citas_disponibles
   function NM_export_citas_disponibles()
   {
         nmgp_Form_Num_Val($this->citas_disponibles, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->citas_disponibles))
         {
             $this->citas_disponibles = sc_convert_encoding($this->citas_disponibles, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->citas_disponibles = str_replace('<', '&lt;', $this->citas_disponibles);
         $this->citas_disponibles = str_replace('>', '&gt;', $this->citas_disponibles);
         $this->Texto_tag .= "<td>" . $this->citas_disponibles . "</td>\r\n";
   }
   //----- estatus
   function NM_export_estatus()
   {
         $this->estatus = html_entity_decode($this->estatus, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estatus = strip_tags($this->estatus);
         if (!NM_is_utf8($this->estatus))
         {
             $this->estatus = sc_convert_encoding($this->estatus, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->estatus = str_replace('<', '&lt;', $this->estatus);
         $this->estatus = str_replace('>', '&gt;', $this->estatus);
         $this->Texto_tag .= "<td>" . $this->estatus . "</td>\r\n";
   }
   //----- idasignacionmodulista
   function NM_export_idasignacionmodulista()
   {
         nmgp_Form_Num_Val($this->idasignacionmodulista, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->idasignacionmodulista))
         {
             $this->idasignacionmodulista = sc_convert_encoding($this->idasignacionmodulista, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->idasignacionmodulista = str_replace('<', '&lt;', $this->idasignacionmodulista);
         $this->idasignacionmodulista = str_replace('>', '&gt;', $this->idasignacionmodulista);
         $this->Texto_tag .= "<td>" . $this->idasignacionmodulista . "</td>\r\n";
   }
   //----- descripcion
   function NM_export_descripcion()
   {
         $this->descripcion = html_entity_decode($this->descripcion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->descripcion = strip_tags($this->descripcion);
         if (!NM_is_utf8($this->descripcion))
         {
             $this->descripcion = sc_convert_encoding($this->descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->descripcion = str_replace('<', '&lt;', $this->descripcion);
         $this->descripcion = str_replace('>', '&gt;', $this->descripcion);
         $this->Texto_tag .= "<td>" . $this->descripcion . "</td>\r\n";
   }
   //----- cantidadmodulistas
   function NM_export_cantidadmodulistas()
   {
         nmgp_Form_Num_Val($this->cantidadmodulistas, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->cantidadmodulistas))
         {
             $this->cantidadmodulistas = sc_convert_encoding($this->cantidadmodulistas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cantidadmodulistas = str_replace('<', '&lt;', $this->cantidadmodulistas);
         $this->cantidadmodulistas = str_replace('>', '&gt;', $this->cantidadmodulistas);
         $this->Texto_tag .= "<td>" . $this->cantidadmodulistas . "</td>\r\n";
   }
   //----- rangofinal
   function NM_export_rangofinal()
   {
         if (substr($this->rangofinal, 10, 1) == "-") 
         { 
             $this->rangofinal = substr($this->rangofinal, 0, 10) . " " . substr($this->rangofinal, 11);
         } 
         if (substr($this->rangofinal, 13, 1) == ".") 
         { 
            $this->rangofinal = substr($this->rangofinal, 0, 13) . ":" . substr($this->rangofinal, 14, 2) . ":" . substr($this->rangofinal, 17);
         } 
         $conteudo_x =  $this->rangofinal;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->rangofinal, "YYYY-MM-DD HH:II:SS  ");
             $this->rangofinal = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->rangofinal))
         {
             $this->rangofinal = sc_convert_encoding($this->rangofinal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rangofinal = str_replace('<', '&lt;', $this->rangofinal);
         $this->rangofinal = str_replace('>', '&gt;', $this->rangofinal);
         $this->Texto_tag .= "<td>" . $this->rangofinal . "</td>\r\n";
   }
   //----- fecharegistro
   function NM_export_fecharegistro()
   {
         if (substr($this->fecharegistro, 10, 1) == "-") 
         { 
             $this->fecharegistro = substr($this->fecharegistro, 0, 10) . " " . substr($this->fecharegistro, 11);
         } 
         if (substr($this->fecharegistro, 13, 1) == ".") 
         { 
            $this->fecharegistro = substr($this->fecharegistro, 0, 13) . ":" . substr($this->fecharegistro, 14, 2) . ":" . substr($this->fecharegistro, 17);
         } 
         $conteudo_x =  $this->fecharegistro;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fecharegistro, "YYYY-MM-DD HH:II:SS  ");
             $this->fecharegistro = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->fecharegistro))
         {
             $this->fecharegistro = sc_convert_encoding($this->fecharegistro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fecharegistro = str_replace('<', '&lt;', $this->fecharegistro);
         $this->fecharegistro = str_replace('>', '&gt;', $this->fecharegistro);
         $this->Texto_tag .= "<td>" . $this->fecharegistro . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['GRID_VERDISPONIBILIDAD'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>CITAS DISPONIBLES :: RTF</TITLE>
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
<form name="Fdown" method="get" action="GRID_VERDISPONIBILIDAD_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="GRID_VERDISPONIBILIDAD"> 
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
