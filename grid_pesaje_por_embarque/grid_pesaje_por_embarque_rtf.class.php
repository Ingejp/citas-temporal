<?php

class grid_pesaje_por_embarque_rtf
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
      $this->nm_data   = new nm_data("es");
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
      require_once($this->Ini->path_aplicacao . "grid_pesaje_por_embarque_total.class.php"); 
      $this->Tot      = new grid_pesaje_por_embarque_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_pesaje_por_embarque']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_pesaje_por_embarque";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_pesaje_por_embarque.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_pesaje_por_embarque']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_pesaje_por_embarque']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_pesaje_por_embarque']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idweighing = $Busca_temp['idweighing']; 
          $tmp_pos = strpos($this->idweighing, "##@@");
          if ($tmp_pos !== false && !is_array($this->idweighing))
          {
              $this->idweighing = substr($this->idweighing, 0, $tmp_pos);
          }
          $this->container = $Busca_temp['container']; 
          $tmp_pos = strpos($this->container, "##@@");
          if ($tmp_pos !== false && !is_array($this->container))
          {
              $this->container = substr($this->container, 0, $tmp_pos);
          }
          $this->vessel = $Busca_temp['vessel']; 
          $tmp_pos = strpos($this->vessel, "##@@");
          if ($tmp_pos !== false && !is_array($this->vessel))
          {
              $this->vessel = substr($this->vessel, 0, $tmp_pos);
          }
          $this->shippingcompany = $Busca_temp['shippingcompany']; 
          $tmp_pos = strpos($this->shippingcompany, "##@@");
          if ($tmp_pos !== false && !is_array($this->shippingcompany))
          {
              $this->shippingcompany = substr($this->shippingcompany, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : "IMPRIMIR"; 
          if ($Cada_col == "imprimir" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['container'])) ? $this->New_label['container'] : "CONTENEDOR"; 
          if ($Cada_col == "container" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vessel'])) ? $this->New_label['vessel'] : "BUQUE"; 
          if ($Cada_col == "vessel" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['shippingcompany'])) ? $this->New_label['shippingcompany'] : "NAVIERA"; 
          if ($Cada_col == "shippingcompany" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['voyage'])) ? $this->New_label['voyage'] : "VIAJE"; 
          if ($Cada_col == "voyage" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['date'])) ? $this->New_label['date'] : "FECHA"; 
          if ($Cada_col == "date" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['commodity'])) ? $this->New_label['commodity'] : "PRODUCTO"; 
          if ($Cada_col == "commodity" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['grossweight'])) ? $this->New_label['grossweight'] : "PESO BRUTO"; 
          if ($Cada_col == "grossweight" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tarecontainer'])) ? $this->New_label['tarecontainer'] : "TARA CONTENEDOR"; 
          if ($Cada_col == "tarecontainer" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tarechassis'])) ? $this->New_label['tarechassis'] : "TARA CHASIS"; 
          if ($Cada_col == "tarechassis" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['netweight'])) ? $this->New_label['netweight'] : "PESO NETO"; 
          if ($Cada_col == "netweight" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vgm'])) ? $this->New_label['vgm'] : "VGM"; 
          if ($Cada_col == "vgm" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['typeoperation'])) ? $this->New_label['typeoperation'] : "TIPO"; 
          if ($Cada_col == "typeoperation" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idweighing'])) ? $this->New_label['idweighing'] : "ID"; 
          if ($Cada_col == "idweighing" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT container, vessel, shippingCompany, voyage, str_replace (convert(char(10),`date`,102), '.', '-') + ' ' + convert(char(8),`date`,20) as sc_def_col_1, commodity, grossWeight, tareContainer, tareChassis, netWeight, VGM, typeOperation, idweighing from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT container, vessel, shippingCompany, voyage, `date` as sc_def_col_1, commodity, grossWeight, tareContainer, tareChassis, netWeight, VGM, typeOperation, idweighing from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT container, vessel, shippingCompany, voyage, `date` as sc_def_col_1, commodity, grossWeight, tareContainer, tareChassis, netWeight, VGM, typeOperation, idweighing from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['order_grid'];
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
      $rs = $this->Db->SelectLimit($nmgp_select, 15000, 0);
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
         $this->container = $rs->fields[0] ;  
         $this->vessel = $rs->fields[1] ;  
         $this->shippingcompany = $rs->fields[2] ;  
         $this->voyage = $rs->fields[3] ;  
         $this->date = $rs->fields[4] ;  
         $this->commodity = $rs->fields[5] ;  
         $this->grossweight = $rs->fields[6] ;  
         $this->grossweight = (string)$this->grossweight;
         $this->tarecontainer = $rs->fields[7] ;  
         $this->tarecontainer = (string)$this->tarecontainer;
         $this->tarechassis = $rs->fields[8] ;  
         $this->tarechassis = (string)$this->tarechassis;
         $this->netweight = $rs->fields[9] ;  
         $this->netweight = (string)$this->netweight;
         $this->vgm = $rs->fields[10] ;  
         $this->vgm = (string)$this->vgm;
         $this->typeoperation = $rs->fields[11] ;  
         $this->idweighing = $rs->fields[12] ;  
         $this->idweighing = (string)$this->idweighing;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- imprimir
   function NM_export_imprimir()
   {
         if (!NM_is_utf8($this->imprimir))
         {
             $this->imprimir = sc_convert_encoding($this->imprimir, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->imprimir = str_replace('<', '&lt;', $this->imprimir);
         $this->imprimir = str_replace('>', '&gt;', $this->imprimir);
         $this->Texto_tag .= "<td>" . $this->imprimir . "</td>\r\n";
   }
   //----- container
   function NM_export_container()
   {
         $this->container = html_entity_decode($this->container, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->container = strip_tags($this->container);
         if (!NM_is_utf8($this->container))
         {
             $this->container = sc_convert_encoding($this->container, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->container = str_replace('<', '&lt;', $this->container);
         $this->container = str_replace('>', '&gt;', $this->container);
         $this->Texto_tag .= "<td>" . $this->container . "</td>\r\n";
   }
   //----- vessel
   function NM_export_vessel()
   {
         $this->vessel = html_entity_decode($this->vessel, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vessel = strip_tags($this->vessel);
         if (!NM_is_utf8($this->vessel))
         {
             $this->vessel = sc_convert_encoding($this->vessel, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->vessel = str_replace('<', '&lt;', $this->vessel);
         $this->vessel = str_replace('>', '&gt;', $this->vessel);
         $this->Texto_tag .= "<td>" . $this->vessel . "</td>\r\n";
   }
   //----- shippingcompany
   function NM_export_shippingcompany()
   {
         $this->shippingcompany = html_entity_decode($this->shippingcompany, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->shippingcompany = strip_tags($this->shippingcompany);
         if (!NM_is_utf8($this->shippingcompany))
         {
             $this->shippingcompany = sc_convert_encoding($this->shippingcompany, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->shippingcompany = str_replace('<', '&lt;', $this->shippingcompany);
         $this->shippingcompany = str_replace('>', '&gt;', $this->shippingcompany);
         $this->Texto_tag .= "<td>" . $this->shippingcompany . "</td>\r\n";
   }
   //----- voyage
   function NM_export_voyage()
   {
         $this->voyage = html_entity_decode($this->voyage, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->voyage = strip_tags($this->voyage);
         if (!NM_is_utf8($this->voyage))
         {
             $this->voyage = sc_convert_encoding($this->voyage, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->voyage = str_replace('<', '&lt;', $this->voyage);
         $this->voyage = str_replace('>', '&gt;', $this->voyage);
         $this->Texto_tag .= "<td>" . $this->voyage . "</td>\r\n";
   }
   //----- date
   function NM_export_date()
   {
         if (substr($this->date, 10, 1) == "-") 
         { 
             $this->date = substr($this->date, 0, 10) . " " . substr($this->date, 11);
         } 
         if (substr($this->date, 13, 1) == ".") 
         { 
            $this->date = substr($this->date, 0, 13) . ":" . substr($this->date, 14, 2) . ":" . substr($this->date, 17);
         } 
         $conteudo_x =  $this->date;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->date, "YYYY-MM-DD HH:II:SS  ");
             $this->date = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->date))
         {
             $this->date = sc_convert_encoding($this->date, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->date = str_replace('<', '&lt;', $this->date);
         $this->date = str_replace('>', '&gt;', $this->date);
         $this->Texto_tag .= "<td>" . $this->date . "</td>\r\n";
   }
   //----- commodity
   function NM_export_commodity()
   {
         $this->commodity = html_entity_decode($this->commodity, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->commodity = strip_tags($this->commodity);
         if (!NM_is_utf8($this->commodity))
         {
             $this->commodity = sc_convert_encoding($this->commodity, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->commodity = str_replace('<', '&lt;', $this->commodity);
         $this->commodity = str_replace('>', '&gt;', $this->commodity);
         $this->Texto_tag .= "<td>" . $this->commodity . "</td>\r\n";
   }
   //----- grossweight
   function NM_export_grossweight()
   {
         nmgp_Form_Num_Val($this->grossweight, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->grossweight))
         {
             $this->grossweight = sc_convert_encoding($this->grossweight, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->grossweight = str_replace('<', '&lt;', $this->grossweight);
         $this->grossweight = str_replace('>', '&gt;', $this->grossweight);
         $this->Texto_tag .= "<td>" . $this->grossweight . "</td>\r\n";
   }
   //----- tarecontainer
   function NM_export_tarecontainer()
   {
         nmgp_Form_Num_Val($this->tarecontainer, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->tarecontainer))
         {
             $this->tarecontainer = sc_convert_encoding($this->tarecontainer, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tarecontainer = str_replace('<', '&lt;', $this->tarecontainer);
         $this->tarecontainer = str_replace('>', '&gt;', $this->tarecontainer);
         $this->Texto_tag .= "<td>" . $this->tarecontainer . "</td>\r\n";
   }
   //----- tarechassis
   function NM_export_tarechassis()
   {
         nmgp_Form_Num_Val($this->tarechassis, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->tarechassis))
         {
             $this->tarechassis = sc_convert_encoding($this->tarechassis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tarechassis = str_replace('<', '&lt;', $this->tarechassis);
         $this->tarechassis = str_replace('>', '&gt;', $this->tarechassis);
         $this->Texto_tag .= "<td>" . $this->tarechassis . "</td>\r\n";
   }
   //----- netweight
   function NM_export_netweight()
   {
         nmgp_Form_Num_Val($this->netweight, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->netweight))
         {
             $this->netweight = sc_convert_encoding($this->netweight, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->netweight = str_replace('<', '&lt;', $this->netweight);
         $this->netweight = str_replace('>', '&gt;', $this->netweight);
         $this->Texto_tag .= "<td>" . $this->netweight . "</td>\r\n";
   }
   //----- vgm
   function NM_export_vgm()
   {
         nmgp_Form_Num_Val($this->vgm, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->vgm))
         {
             $this->vgm = sc_convert_encoding($this->vgm, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->vgm = str_replace('<', '&lt;', $this->vgm);
         $this->vgm = str_replace('>', '&gt;', $this->vgm);
         $this->Texto_tag .= "<td>" . $this->vgm . "</td>\r\n";
   }
   //----- typeoperation
   function NM_export_typeoperation()
   {
         $this->typeoperation = html_entity_decode($this->typeoperation, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->typeoperation = strip_tags($this->typeoperation);
         if (!NM_is_utf8($this->typeoperation))
         {
             $this->typeoperation = sc_convert_encoding($this->typeoperation, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->typeoperation = str_replace('<', '&lt;', $this->typeoperation);
         $this->typeoperation = str_replace('>', '&gt;', $this->typeoperation);
         $this->Texto_tag .= "<td>" . $this->typeoperation . "</td>\r\n";
   }
   //----- idweighing
   function NM_export_idweighing()
   {
         nmgp_Form_Num_Val($this->idweighing, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->idweighing))
         {
             $this->idweighing = sc_convert_encoding($this->idweighing, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->idweighing = str_replace('<', '&lt;', $this->idweighing);
         $this->idweighing = str_replace('>', '&gt;', $this->idweighing);
         $this->Texto_tag .= "<td>" . $this->idweighing . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pesaje_por_embarque'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>REPORTE VGM POR VIAJE :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_pesaje_por_embarque_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_pesaje_por_embarque"> 
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
