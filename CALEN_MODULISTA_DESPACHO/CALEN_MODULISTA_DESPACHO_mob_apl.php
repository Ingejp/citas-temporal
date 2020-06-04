<?php
//
class CALEN_MODULISTA_DESPACHO_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $idasignacionmodulista;
   var $cantidadmodulistas;
   var $rangoinicial;
   var $rangofinal;
   var $fecharegistro;
   var $fecharegistro_hora;
   var $fechamodificacion;
   var $horainicio;
   var $horafin;
   var $periodo;
   var $periodo_1;
   var $reaparicion;
   var $reaparicion_1;
   var $id_api;
   var $id_event_google;
   var $recur_info;
   var $event_color;
   var $creator;
   var $reminder;
   var $idtipodemodulista;
   var $idtipodemodulista_1;
   var $category;
   var $category_1;
   var $__calend_all_day__;
   var $__calend_all_day___1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = true;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cantidadmodulistas']))
          {
              $this->cantidadmodulistas = $this->NM_ajax_info['param']['cantidadmodulistas'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['fechamodificacion']))
          {
              $this->fechamodificacion = $this->NM_ajax_info['param']['fechamodificacion'];
          }
          if (isset($this->NM_ajax_info['param']['fecharegistro']))
          {
              $this->fecharegistro = $this->NM_ajax_info['param']['fecharegistro'];
          }
          if (isset($this->NM_ajax_info['param']['horafin']))
          {
              $this->horafin = $this->NM_ajax_info['param']['horafin'];
          }
          if (isset($this->NM_ajax_info['param']['horainicio']))
          {
              $this->horainicio = $this->NM_ajax_info['param']['horainicio'];
          }
          if (isset($this->NM_ajax_info['param']['idasignacionmodulista']))
          {
              $this->idasignacionmodulista = $this->NM_ajax_info['param']['idasignacionmodulista'];
          }
          if (isset($this->NM_ajax_info['param']['idtipodemodulista']))
          {
              $this->idtipodemodulista = $this->NM_ajax_info['param']['idtipodemodulista'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['rangofinal']))
          {
              $this->rangofinal = $this->NM_ajax_info['param']['rangofinal'];
          }
          if (isset($this->NM_ajax_info['param']['rangoinicial']))
          {
              $this->rangoinicial = $this->NM_ajax_info['param']['rangoinicial'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_CALEN_MODULISTA_DESPACHO_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['nm_run_menu'] = 1;
      } 
      if (isset($this->nmgp_opcao) && 'igual_calendar' == $this->nmgp_opcao) {
          $this->nmgp_opcao = 'igual';
          $this->idasignacionmodulista = $this->__orig_idasignacionmodulista;
      }

      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fecharegistro);
          $this->fecharegistro      = $aDtParts[0];
          $this->fecharegistro_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      if ('' == $this->nmgp_opcao && !$this->NM_ajax_flag)
      {
          $this->nmgp_opcao = 'calendar';
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new CALEN_MODULISTA_DESPACHO_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['CALEN_MODULISTA_DESPACHO_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['CALEN_MODULISTA_DESPACHO_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['CALEN_MODULISTA_DESPACHO_mob'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['CALEN_MODULISTA_DESPACHO_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['CALEN_MODULISTA_DESPACHO_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('CALEN_MODULISTA_DESPACHO_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['CALEN_MODULISTA_DESPACHO_mob']['label'] = "HORARIO MODULISTAS DE DESPACHO";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "CALEN_MODULISTA_DESPACHO_mob")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';



      $_SESSION['scriptcase']['error_icon']['CALEN_MODULISTA_DESPACHO_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['CALEN_MODULISTA_DESPACHO_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['CALEN_MODULISTA_DESPACHO_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['CALEN_MODULISTA_DESPACHO_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['CALEN_MODULISTA_DESPACHO_mob'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }

      $this->nmgp_botoes['first']   = "off";
      $this->nmgp_botoes['back']    = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last']    = "off";

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dados_form'];
          if (!isset($this->idasignacionmodulista)){$this->idasignacionmodulista = $this->nmgp_dados_form['idasignacionmodulista'];} 
          if (!isset($this->periodo)){$this->periodo = $this->nmgp_dados_form['periodo'];} 
          if (!isset($this->reaparicion)){$this->reaparicion = $this->nmgp_dados_form['reaparicion'];} 
          if (!isset($this->id_api)){$this->id_api = $this->nmgp_dados_form['id_api'];} 
          if (!isset($this->id_event_google)){$this->id_event_google = $this->nmgp_dados_form['id_event_google'];} 
          if (!isset($this->recur_info)){$this->recur_info = $this->nmgp_dados_form['recur_info'];} 
          if (!isset($this->event_color)){$this->event_color = $this->nmgp_dados_form['event_color'];} 
          if (!isset($this->creator)){$this->creator = $this->nmgp_dados_form['creator'];} 
          if (!isset($this->reminder)){$this->reminder = $this->nmgp_dados_form['reminder'];} 
          if (!isset($this->category)){$this->category = $this->nmgp_dados_form['category'];} 
          if (!isset($this->__calend_all_day__)){$this->__calend_all_day__ = $this->nmgp_dados_form['__calend_all_day__'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("CALEN_MODULISTA_DESPACHO_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_cores']['paleta']  = $this->Ini->Nm_lang['lang_othr_cplt_titl'];
      $_SESSION['scriptcase']['sc_tab_cores']['setacor'] = $this->Ini->Nm_lang['lang_othr_cplt_defn'];
      $_SESSION['scriptcase']['sc_tab_cores']['atualiz'] = $this->Ini->Nm_lang['lang_btns_colr_updt_hint'];
      $_SESSION['scriptcase']['sc_tab_cores']['cancela'] = $this->Ini->Nm_lang['lang_btns_colr_cncl_hint'];
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'CALEN_MODULISTA_DESPACHO/CALEN_MODULISTA_DESPACHO_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'CALEN_MODULISTA_DESPACHO_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'CALEN_MODULISTA_DESPACHO_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'CALEN_MODULISTA_DESPACHO_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'CALEN_MODULISTA_DESPACHO/CALEN_MODULISTA_DESPACHO_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "CALEN_MODULISTA_DESPACHO_mob_erro.class.php"); 
      }
      $this->Erro      = new CALEN_MODULISTA_DESPACHO_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['CALEN_MODULISTA_DESPACHO_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->cantidadmodulistas)) { $this->nm_limpa_alfa($this->cantidadmodulistas); }
      if (isset($this->idtipodemodulista)) { $this->nm_limpa_alfa($this->idtipodemodulista); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- cantidadmodulistas
      $this->field_config['cantidadmodulistas']               = array();
      $this->field_config['cantidadmodulistas']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidadmodulistas']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidadmodulistas']['symbol_dec'] = '';
      $this->field_config['cantidadmodulistas']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidadmodulistas']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecharegistro
      $this->field_config['fecharegistro']                 = array();
      $this->field_config['fecharegistro']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecharegistro']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecharegistro']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecharegistro']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecharegistro');
      //-- fechamodificacion
      $this->field_config['fechamodificacion']                 = array();
      $this->field_config['fechamodificacion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechamodificacion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechamodificacion']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechamodificacion');
      //-- rangoinicial
      $this->field_config['rangoinicial']                 = array();
      $this->field_config['rangoinicial']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['rangoinicial']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['rangoinicial']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'rangoinicial');
      //-- rangofinal
      $this->field_config['rangofinal']                 = array();
      $this->field_config['rangofinal']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['rangofinal']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['rangofinal']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'rangofinal');
      //-- horainicio
      $this->field_config['horainicio']                 = array();
      $this->field_config['horainicio']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['horainicio']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['horainicio']['date_display'] = "hh";
      $this->new_date_format('HH', 'horainicio');
      //-- horafin
      $this->field_config['horafin']                 = array();
      $this->field_config['horafin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['horafin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['horafin']['date_display'] = "hh";
      $this->new_date_format('HH', 'horafin');
      //-- idasignacionmodulista
      $this->field_config['idasignacionmodulista']               = array();
      $this->field_config['idasignacionmodulista']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idasignacionmodulista']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idasignacionmodulista']['symbol_dec'] = '';
      $this->field_config['idasignacionmodulista']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idasignacionmodulista']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- __calend_all_day__
      $this->field_config['__calendar_recur_info__']                 = array();
      $this->field_config['__calendar_recur_info__']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['__calendar_recur_info__']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['__calendar_recur_info__']['date_display'] = 'ddmmaaaa';
      $this->field_config['__calendar_recur_info__']['symbol_grp']   = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['__calendar_recur_info__']['symbol_fmt']   = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->new_date_format('DT', '__calendar_recur_info__');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      $this->calendarConfigValues = array(
          'insert'           => 'on' == $this->nmgp_botoes['insert'],
          'update'           => 'on' == $this->nmgp_botoes['update'],
          'delete'           => 'on' == $this->nmgp_botoes['delete'],
          'eventColorPast'   => 'scCalendarEventPast',
          'eventColorToday'  => 'scCalendarEventOnDay',
          'eventColorFuture' => 'scCalendarEventFuture',
      );
      if ('calendar' == $this->nmgp_opcao)
      {
          $this->calendarOutputDisplay();
          exit;
      }
      elseif ('importGoogleCalendarEvents' == $this->nmgp_opcao)
      {
         $this->calendarOutputImportGoogleCalendarEvents();
         exit;
      }
      elseif ('importGoogle' == $this->nmgp_opcao)
      {
         $this->calendarOutputImportGoogleDisplay();
         exit;
      }
      elseif ('exportGoogleCalendarEvents' == $this->nmgp_opcao)
      {
         $this->calendarExportEventsToGoogle();
         exit;
      }
      elseif ('exportGoogle' == $this->nmgp_opcao)
      {
         $this->calendarOutputExportEventsToGoogle();
         exit;
      }
      elseif ('calendar_fetch' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents();
          $this->calendarOutputJson($this->calendarNormalizeEvents($aEvents));
          exit;
      }
      elseif ('calendar_drop' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarDragDrop());
          exit;
      }
      elseif ('calendar_resize' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarResize());
          exit;
      }
      elseif ('calendar_print' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents('', true);
          $this->calendarOutputJson($this->calendarPrintEvents($this->calendarNormalizeEvents($aEvents)));
          exit;
      }

      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_idtipodemodulista' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idtipodemodulista');
          }
          if ('validate_cantidadmodulistas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidadmodulistas');
          }
          if ('validate_fecharegistro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecharegistro');
          }
          if ('validate_fechamodificacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechamodificacion');
          }
          if ('validate_rangoinicial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rangoinicial');
          }
          if ('validate_rangofinal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rangofinal');
          }
          if ('validate_horainicio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'horainicio');
          }
          if ('validate_horafin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'horafin');
          }
          CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_horainicio_onblur' == $this->NM_ajax_opcao)
          {
              $this->horaInicio_onBlur();
          }
          CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->__calend_all_day__))
          {
              $x = 0; 
              $this->__calend_all_day___1 = $this->__calend_all_day__;
              $this->__calend_all_day__ = ""; 
              if ($this->__calend_all_day___1 != "") 
              { 
                  foreach ($this->__calend_all_day___1 as $dados___calend_all_day___1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->__calend_all_day__ .= ";";
                      } 
                      $this->__calend_all_day__ .= $dados___calend_all_day___1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['CALEN_MODULISTA_DESPACHO_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "CALEN_MODULISTA_DESPACHO_mob.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
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
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
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
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
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
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("HORARIO MODULISTAS DE DESPACHO") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="CALEN_MODULISTA_DESPACHO_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="CALEN_MODULISTA_DESPACHO_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="CALEN_MODULISTA_DESPACHO_mob.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'idtipodemodulista':
               return "Tipo de Modulista";
               break;
           case 'cantidadmodulistas':
               return "Cantidad Modulistas";
               break;
           case 'fecharegistro':
               return "Fecha Registro";
               break;
           case 'fechamodificacion':
               return "Fecha Modificacion";
               break;
           case 'rangoinicial':
               return "Rango Inicial";
               break;
           case 'rangofinal':
               return "Rango Final";
               break;
           case 'horainicio':
               return "Hora Inicio";
               break;
           case 'horafin':
               return "Hora Fin";
               break;
           case 'idasignacionmodulista':
               return "Idasignacion Modulista";
               break;
           case 'periodo':
               return "Periodo";
               break;
           case 'reaparicion':
               return "Reaparicion";
               break;
           case 'id_api':
               return "Id Api";
               break;
           case 'id_event_google':
               return "Id Event Google";
               break;
           case 'recur_info':
               return "Recur Info";
               break;
           case 'event_color':
               return "Event Color";
               break;
           case 'creator':
               return "Creator";
               break;
           case 'reminder':
               return "Reminder";
               break;
           case 'category':
               return "Category";
               break;
           case '__calend_all_day__':
               return "" . $this->Ini->Nm_lang['lang_per_allday'] . "";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_CALEN_MODULISTA_DESPACHO_mob']) || !is_array($this->NM_ajax_info['errList']['geral_CALEN_MODULISTA_DESPACHO_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_CALEN_MODULISTA_DESPACHO_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_CALEN_MODULISTA_DESPACHO_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['bypass_required_time']['horainicio'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['bypass_required_time']['horafin'] = true;
      }
      if ('' == $filtro || 'idtipodemodulista' == $filtro)
        $this->ValidateField_idtipodemodulista($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "idtipodemodulista";

      if ('' == $filtro || 'cantidadmodulistas' == $filtro)
        $this->ValidateField_cantidadmodulistas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "cantidadmodulistas";

      if ('' == $filtro || 'fecharegistro' == $filtro)
        $this->ValidateField_fecharegistro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "fecharegistro";

      if ('' == $filtro || 'fechamodificacion' == $filtro)
        $this->ValidateField_fechamodificacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "fechamodificacion";

      if ('' == $filtro || 'rangoinicial' == $filtro)
        $this->ValidateField_rangoinicial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "rangoinicial";

      if ('' == $filtro || 'rangofinal' == $filtro)
        $this->ValidateField_rangofinal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "rangofinal";

      if ('' == $filtro || 'horainicio' == $filtro)
        $this->ValidateField_horainicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "horainicio";

      if ('' == $filtro || 'horafin' == $filtro)
        $this->ValidateField_horafin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "horafin";

      $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['bypass_required_time']['horainicio'] = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['bypass_required_time']['horafin'] = false;

      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $this->horainicio = '';
          $this->horafin = '';
      }

//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_idtipodemodulista(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idtipodemodulista) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista']) && !in_array($this->idtipodemodulista, $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idtipodemodulista']))
                   {
                       $Campos_Erros['idtipodemodulista'] = array();
                   }
                   $Campos_Erros['idtipodemodulista'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idtipodemodulista']) || !is_array($this->NM_ajax_info['errList']['idtipodemodulista']))
                   {
                       $this->NM_ajax_info['errList']['idtipodemodulista'] = array();
                   }
                   $this->NM_ajax_info['errList']['idtipodemodulista'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idtipodemodulista';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idtipodemodulista

    function ValidateField_cantidadmodulistas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->cantidadmodulistas, $this->field_config['cantidadmodulistas']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidadmodulistas != '')  
          { 
              $iTestSize = 2;
              if (strlen($this->cantidadmodulistas) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad Modulistas: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidadmodulistas']))
                  {
                      $Campos_Erros['cantidadmodulistas'] = array();
                  }
                  $Campos_Erros['cantidadmodulistas'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidadmodulistas']) || !is_array($this->NM_ajax_info['errList']['cantidadmodulistas']))
                  {
                      $this->NM_ajax_info['errList']['cantidadmodulistas'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidadmodulistas'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidadmodulistas, 2, 0, -0, 99, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad Modulistas; " ; 
                  if (!isset($Campos_Erros['cantidadmodulistas']))
                  {
                      $Campos_Erros['cantidadmodulistas'] = array();
                  }
                  $Campos_Erros['cantidadmodulistas'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidadmodulistas']) || !is_array($this->NM_ajax_info['errList']['cantidadmodulistas']))
                  {
                      $this->NM_ajax_info['errList']['cantidadmodulistas'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidadmodulistas'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['cantidadmodulistas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['cantidadmodulistas'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Cantidad Modulistas" ; 
              if (!isset($Campos_Erros['cantidadmodulistas']))
              {
                  $Campos_Erros['cantidadmodulistas'] = array();
              }
              $Campos_Erros['cantidadmodulistas'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cantidadmodulistas']) || !is_array($this->NM_ajax_info['errList']['cantidadmodulistas']))
                  {
                      $this->NM_ajax_info['errList']['cantidadmodulistas'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidadmodulistas'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cantidadmodulistas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cantidadmodulistas

    function ValidateField_fecharegistro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecharegistro, $this->field_config['fecharegistro']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecharegistro']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecharegistro']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecharegistro']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecharegistro']['date_sep']) ; 
          if (trim($this->fecharegistro) != "")  
          { 
              if ($teste_validade->Data($this->fecharegistro, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Registro; " ; 
                  if (!isset($Campos_Erros['fecharegistro']))
                  {
                      $Campos_Erros['fecharegistro'] = array();
                  }
                  $Campos_Erros['fecharegistro'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecharegistro']) || !is_array($this->NM_ajax_info['errList']['fecharegistro']))
                  {
                      $this->NM_ajax_info['errList']['fecharegistro'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecharegistro'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['fecharegistro']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['fecharegistro'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Fecha Registro" ; 
              if (!isset($Campos_Erros['fecharegistro']))
              {
                  $Campos_Erros['fecharegistro'] = array();
              }
              $Campos_Erros['fecharegistro'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fecharegistro']) || !is_array($this->NM_ajax_info['errList']['fecharegistro']))
                  {
                      $this->NM_ajax_info['errList']['fecharegistro'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecharegistro'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['fecharegistro']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecharegistro';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fecharegistro_hora, $this->field_config['fecharegistro_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fecharegistro_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fecharegistro_hora']['time_sep']) ; 
          if (trim($this->fecharegistro_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fecharegistro_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Registro; " ; 
                  if (!isset($Campos_Erros['fecharegistro_hora']))
                  {
                      $Campos_Erros['fecharegistro_hora'] = array();
                  }
                  $Campos_Erros['fecharegistro_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecharegistro']) || !is_array($this->NM_ajax_info['errList']['fecharegistro']))
                  {
                      $this->NM_ajax_info['errList']['fecharegistro'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecharegistro'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['fecharegistro_hora']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['fecharegistro_hora'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Fecha Registro" ; 
              if (!isset($Campos_Erros['fecharegistro_hora']))
              {
                  $Campos_Erros['fecharegistro_hora'] = array();
              }
              $Campos_Erros['fecharegistro_hora'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fecharegistro']) || !is_array($this->NM_ajax_info['errList']['fecharegistro']))
                  {
                      $this->NM_ajax_info['errList']['fecharegistro'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecharegistro'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
      if (isset($Campos_Erros['fecharegistro']) && isset($Campos_Erros['fecharegistro_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fecharegistro'], $Campos_Erros['fecharegistro_hora']);
          if (empty($Campos_Erros['fecharegistro_hora']))
          {
              unset($Campos_Erros['fecharegistro_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fecharegistro']))
          {
              $this->NM_ajax_info['errList']['fecharegistro'] = array_unique($this->NM_ajax_info['errList']['fecharegistro']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecharegistro_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecharegistro_hora

    function ValidateField_fechamodificacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechamodificacion, $this->field_config['fechamodificacion']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechamodificacion']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechamodificacion']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechamodificacion']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechamodificacion']['date_sep']) ; 
          if (trim($this->fechamodificacion) != "")  
          { 
              if ($teste_validade->Data($this->fechamodificacion, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Modificacion; " ; 
                  if (!isset($Campos_Erros['fechamodificacion']))
                  {
                      $Campos_Erros['fechamodificacion'] = array();
                  }
                  $Campos_Erros['fechamodificacion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechamodificacion']) || !is_array($this->NM_ajax_info['errList']['fechamodificacion']))
                  {
                      $this->NM_ajax_info['errList']['fechamodificacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechamodificacion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['fechamodificacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['fechamodificacion'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Fecha Modificacion" ; 
              if (!isset($Campos_Erros['fechamodificacion']))
              {
                  $Campos_Erros['fechamodificacion'] = array();
              }
              $Campos_Erros['fechamodificacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fechamodificacion']) || !is_array($this->NM_ajax_info['errList']['fechamodificacion']))
                  {
                      $this->NM_ajax_info['errList']['fechamodificacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechamodificacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['fechamodificacion']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechamodificacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechamodificacion

    function ValidateField_rangoinicial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->rangoinicial, $this->field_config['rangoinicial']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['rangoinicial']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['rangoinicial']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['rangoinicial']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['rangoinicial']['date_sep']) ; 
          if (trim($this->rangoinicial) != "")  
          { 
              if ($teste_validade->Data($this->rangoinicial, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rango Inicial; " ; 
                  if (!isset($Campos_Erros['rangoinicial']))
                  {
                      $Campos_Erros['rangoinicial'] = array();
                  }
                  $Campos_Erros['rangoinicial'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['rangoinicial']) || !is_array($this->NM_ajax_info['errList']['rangoinicial']))
                  {
                      $this->NM_ajax_info['errList']['rangoinicial'] = array();
                  }
                  $this->NM_ajax_info['errList']['rangoinicial'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['rangoinicial']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['rangoinicial'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Rango Inicial" ; 
              if (!isset($Campos_Erros['rangoinicial']))
              {
                  $Campos_Erros['rangoinicial'] = array();
              }
              $Campos_Erros['rangoinicial'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['rangoinicial']) || !is_array($this->NM_ajax_info['errList']['rangoinicial']))
                  {
                      $this->NM_ajax_info['errList']['rangoinicial'] = array();
                  }
                  $this->NM_ajax_info['errList']['rangoinicial'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['rangoinicial']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rangoinicial';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rangoinicial

    function ValidateField_rangofinal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->rangofinal, $this->field_config['rangofinal']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['rangofinal']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['rangofinal']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['rangofinal']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['rangofinal']['date_sep']) ; 
          if (trim($this->rangofinal) != "")  
          { 
              if ($teste_validade->Data($this->rangofinal, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rango Final; " ; 
                  if (!isset($Campos_Erros['rangofinal']))
                  {
                      $Campos_Erros['rangofinal'] = array();
                  }
                  $Campos_Erros['rangofinal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['rangofinal']) || !is_array($this->NM_ajax_info['errList']['rangofinal']))
                  {
                      $this->NM_ajax_info['errList']['rangofinal'] = array();
                  }
                  $this->NM_ajax_info['errList']['rangofinal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['rangofinal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['rangofinal'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Rango Final" ; 
              if (!isset($Campos_Erros['rangofinal']))
              {
                  $Campos_Erros['rangofinal'] = array();
              }
              $Campos_Erros['rangofinal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['rangofinal']) || !is_array($this->NM_ajax_info['errList']['rangofinal']))
                  {
                      $this->NM_ajax_info['errList']['rangofinal'] = array();
                  }
                  $this->NM_ajax_info['errList']['rangofinal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['rangofinal']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rangofinal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rangofinal

    function ValidateField_horainicio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->horainicio, $this->field_config['horainicio']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['horainicio']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['horainicio']['time_sep']) ; 
          if (trim($this->horainicio) != "")  
          { 
              if ($teste_validade->Hora($this->horainicio, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Inicio; " ; 
                  if (!isset($Campos_Erros['horainicio']))
                  {
                      $Campos_Erros['horainicio'] = array();
                  }
                  $Campos_Erros['horainicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['horainicio']) || !is_array($this->NM_ajax_info['errList']['horainicio']))
                  {
                      $this->NM_ajax_info['errList']['horainicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['horainicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['horainicio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['horainicio'] == "on") 
           { 
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['bypass_required_time']['horainicio']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['bypass_required_time']['horainicio'])
              {
              $hasError = true;
              $Campos_Falta[] = "Hora Inicio" ; 
              if (!isset($Campos_Erros['horainicio']))
              {
                  $Campos_Erros['horainicio'] = array();
              }
              $Campos_Erros['horainicio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['horainicio']) || !is_array($this->NM_ajax_info['errList']['horainicio']))
                  {
                      $this->NM_ajax_info['errList']['horainicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['horainicio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
              }
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'horainicio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_horainicio

    function ValidateField_horafin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->horafin, $this->field_config['horafin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['horafin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['horafin']['time_sep']) ; 
          if (trim($this->horafin) != "")  
          { 
              if ($teste_validade->Hora($this->horafin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Fin; " ; 
                  if (!isset($Campos_Erros['horafin']))
                  {
                      $Campos_Erros['horafin'] = array();
                  }
                  $Campos_Erros['horafin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['horafin']) || !is_array($this->NM_ajax_info['errList']['horafin']))
                  {
                      $this->NM_ajax_info['errList']['horafin'] = array();
                  }
                  $this->NM_ajax_info['errList']['horafin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['horafin']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['php_cmp_required']['horafin'] == "on") 
           { 
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['bypass_required_time']['horafin']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['bypass_required_time']['horafin'])
              {
              $hasError = true;
              $Campos_Falta[] = "Hora Fin" ; 
              if (!isset($Campos_Erros['horafin']))
              {
                  $Campos_Erros['horafin'] = array();
              }
              $Campos_Erros['horafin'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['horafin']) || !is_array($this->NM_ajax_info['errList']['horafin']))
                  {
                      $this->NM_ajax_info['errList']['horafin'] = array();
                  }
                  $this->NM_ajax_info['errList']['horafin'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
              }
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'horafin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_horafin

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['idtipodemodulista'] = $this->idtipodemodulista;
    $this->nmgp_dados_form['cantidadmodulistas'] = $this->cantidadmodulistas;
    $this->nmgp_dados_form['fecharegistro'] = (strlen(trim($this->fecharegistro)) > 19) ? str_replace(".", ":", $this->fecharegistro) : trim($this->fecharegistro);
    $this->nmgp_dados_form['fechamodificacion'] = (strlen(trim($this->fechamodificacion)) > 19) ? str_replace(".", ":", $this->fechamodificacion) : trim($this->fechamodificacion);
    $this->nmgp_dados_form['rangoinicial'] = (strlen(trim($this->rangoinicial)) > 19) ? str_replace(".", ":", $this->rangoinicial) : trim($this->rangoinicial);
    $this->nmgp_dados_form['rangofinal'] = (strlen(trim($this->rangofinal)) > 19) ? str_replace(".", ":", $this->rangofinal) : trim($this->rangofinal);
    $this->nmgp_dados_form['horainicio'] = (strlen(trim($this->horainicio)) > 19) ? str_replace(".", ":", $this->horainicio) : trim($this->horainicio);
    $this->nmgp_dados_form['horafin'] = (strlen(trim($this->horafin)) > 19) ? str_replace(".", ":", $this->horafin) : trim($this->horafin);
    $this->nmgp_dados_form['idasignacionmodulista'] = $this->idasignacionmodulista;
    $this->nmgp_dados_form['periodo'] = $this->periodo;
    $this->nmgp_dados_form['reaparicion'] = $this->reaparicion;
    $this->nmgp_dados_form['id_api'] = $this->id_api;
    $this->nmgp_dados_form['id_event_google'] = $this->id_event_google;
    $this->nmgp_dados_form['recur_info'] = $this->recur_info;
    $this->nmgp_dados_form['event_color'] = $this->event_color;
    $this->nmgp_dados_form['creator'] = $this->creator;
    $this->nmgp_dados_form['reminder'] = $this->reminder;
    $this->nmgp_dados_form['category'] = $this->category;
    $this->nmgp_dados_form['__calend_all_day__'] = $this->__calend_all_day__;
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['cantidadmodulistas'] = $this->cantidadmodulistas;
      nm_limpa_numero($this->cantidadmodulistas, $this->field_config['cantidadmodulistas']['symbol_grp']) ; 
      $this->Before_unformat['fecharegistro'] = $this->fecharegistro;
      nm_limpa_data($this->fecharegistro, $this->field_config['fecharegistro']['date_sep']) ; 
      nm_limpa_hora($this->fecharegistro_hora, $this->field_config['fecharegistro']['time_sep']) ; 
      $this->Before_unformat['fechamodificacion'] = $this->fechamodificacion;
      nm_limpa_data($this->fechamodificacion, $this->field_config['fechamodificacion']['date_sep']) ; 
      $this->Before_unformat['rangoinicial'] = $this->rangoinicial;
      nm_limpa_data($this->rangoinicial, $this->field_config['rangoinicial']['date_sep']) ; 
      $this->Before_unformat['rangofinal'] = $this->rangofinal;
      nm_limpa_data($this->rangofinal, $this->field_config['rangofinal']['date_sep']) ; 
      $this->Before_unformat['horainicio'] = $this->horainicio;
      nm_limpa_hora($this->horainicio, $this->field_config['horainicio']['time_sep']) ; 
      $this->Before_unformat['horafin'] = $this->horafin;
      nm_limpa_hora($this->horafin, $this->field_config['horafin']['time_sep']) ; 
      $this->Before_unformat['idasignacionmodulista'] = $this->idasignacionmodulista;
      nm_limpa_numero($this->idasignacionmodulista, $this->field_config['idasignacionmodulista']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "cantidadmodulistas")
      {
          nm_limpa_numero($this->cantidadmodulistas, $this->field_config['cantidadmodulistas']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idasignacionmodulista")
      {
          nm_limpa_numero($this->idasignacionmodulista, $this->field_config['idasignacionmodulista']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->cantidadmodulistas || (!empty($format_fields) && isset($format_fields['cantidadmodulistas'])))
      {
          nmgp_Form_Num_Val($this->cantidadmodulistas, $this->field_config['cantidadmodulistas']['symbol_grp'], $this->field_config['cantidadmodulistas']['symbol_dec'], "0", "S", $this->field_config['cantidadmodulistas']['format_neg'], "", "", "-", $this->field_config['cantidadmodulistas']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecharegistro) && 'null' != $this->fecharegistro) || (!empty($format_fields) && isset($format_fields['fecharegistro'])))
      {
          $nm_separa_data = strpos($this->field_config['fecharegistro']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fecharegistro']['date_format'];
          $this->field_config['fecharegistro']['date_format'] = substr($this->field_config['fecharegistro']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fecharegistro, " ") ; 
          $this->fecharegistro_hora = substr($this->fecharegistro, $separador + 1) ; 
          $this->fecharegistro = substr($this->fecharegistro, 0, $separador) ; 
          nm_volta_data($this->fecharegistro, $this->field_config['fecharegistro']['date_format']) ; 
          nmgp_Form_Datas($this->fecharegistro, $this->field_config['fecharegistro']['date_format'], $this->field_config['fecharegistro']['date_sep']) ;  
          $this->field_config['fecharegistro']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fecharegistro_hora, $this->field_config['fecharegistro']['date_format']) ; 
          nmgp_Form_Hora($this->fecharegistro_hora, $this->field_config['fecharegistro']['date_format'], $this->field_config['fecharegistro']['time_sep']) ;  
          $this->field_config['fecharegistro']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fecharegistro || '' == $this->fecharegistro)
      {
          $this->fecharegistro_hora = '';
          $this->fecharegistro = '';
      }
      if ((!empty($this->fechamodificacion) && 'null' != $this->fechamodificacion) || (!empty($format_fields) && isset($format_fields['fechamodificacion'])))
      {
          nm_volta_data($this->fechamodificacion, $this->field_config['fechamodificacion']['date_format']) ; 
          nmgp_Form_Datas($this->fechamodificacion, $this->field_config['fechamodificacion']['date_format'], $this->field_config['fechamodificacion']['date_sep']) ;  
      }
      elseif ('null' == $this->fechamodificacion || '' == $this->fechamodificacion)
      {
          $this->fechamodificacion = '';
      }
      if ((!empty($this->rangoinicial) && 'null' != $this->rangoinicial) || (!empty($format_fields) && isset($format_fields['rangoinicial'])))
      {
          nm_volta_data($this->rangoinicial, $this->field_config['rangoinicial']['date_format']) ; 
          nmgp_Form_Datas($this->rangoinicial, $this->field_config['rangoinicial']['date_format'], $this->field_config['rangoinicial']['date_sep']) ;  
      }
      elseif ('null' == $this->rangoinicial || '' == $this->rangoinicial)
      {
          $this->rangoinicial = '';
      }
      if ((!empty($this->rangofinal) && 'null' != $this->rangofinal) || (!empty($format_fields) && isset($format_fields['rangofinal'])))
      {
          nm_volta_data($this->rangofinal, $this->field_config['rangofinal']['date_format']) ; 
          nmgp_Form_Datas($this->rangofinal, $this->field_config['rangofinal']['date_format'], $this->field_config['rangofinal']['date_sep']) ;  
      }
      elseif ('null' == $this->rangofinal || '' == $this->rangofinal)
      {
          $this->rangofinal = '';
      }
      if ((!empty($this->horainicio) && 'null' != $this->horainicio) || (!empty($format_fields) && isset($format_fields['horainicio'])))
      {
          nm_volta_hora($this->horainicio, $this->field_config['horainicio']['date_format']) ; 
          nmgp_Form_Hora($this->horainicio, $this->field_config['horainicio']['date_format'], $this->field_config['horainicio']['time_sep']) ;  
      }
      elseif ('null' == $this->horainicio || '' == $this->horainicio)
      {
          $this->horainicio = '';
      }
      if ((!empty($this->horafin) && 'null' != $this->horafin) || (!empty($format_fields) && isset($format_fields['horafin'])))
      {
          nm_volta_hora($this->horafin, $this->field_config['horafin']['date_format']) ; 
          nmgp_Form_Hora($this->horafin, $this->field_config['horafin']['date_format'], $this->field_config['horafin']['time_sep']) ;  
      }
      elseif ('null' == $this->horafin || '' == $this->horafin)
      {
          $this->horafin = '';
      }
      if ($this->recur_info != '')
      {
          $tmpRecurInfo = json_decode($this->recur_info, true);
          if ($tmpRecurInfo['endin'] != '')
          {
              nm_volta_data($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_format']);
              nmgp_Form_Datas($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_format'], $this->field_config['__calendar_recur_info__']['date_sep']);
              $this->recur_info = json_encode($tmpRecurInfo);
          }
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['fecharegistro']['date_format'];
      if ($this->fecharegistro != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fecharegistro']['date_format'], ";") ;
          $this->field_config['fecharegistro']['date_format'] = substr($this->field_config['fecharegistro']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fecharegistro, $this->field_config['fecharegistro']['date_format']) ; 
          $this->field_config['fecharegistro']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fecharegistro_hora, $this->field_config['fecharegistro']['date_format']) ; 
          if ($this->fecharegistro_hora == "" )  
          { 
              $this->fecharegistro_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fecharegistro_hora = substr($this->fecharegistro_hora, 0, -4) . "." . substr($this->fecharegistro_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecharegistro_hora = substr($this->fecharegistro_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecharegistro_hora = substr($this->fecharegistro_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecharegistro_hora = substr($this->fecharegistro_hora, 0, -4);
          }
          if ($this->fecharegistro != "")  
          { 
              $this->fecharegistro .= " " . $this->fecharegistro_hora ; 
          }
      } 
      if ($this->fecharegistro == "" && $use_null)  
      { 
          $this->fecharegistro = "null" ; 
      } 
      $this->field_config['fecharegistro']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fechamodificacion']['date_format'];
      if ($this->fechamodificacion != "")  
      { 
          nm_conv_data($this->fechamodificacion, $this->field_config['fechamodificacion']['date_format']) ; 
          $this->fechamodificacion_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechamodificacion_hora = substr($this->fechamodificacion_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechamodificacion_hora = substr($this->fechamodificacion_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechamodificacion_hora = substr($this->fechamodificacion_hora, 0, -4);
          }
          $this->fechamodificacion .= " " . $this->fechamodificacion_hora ; 
      } 
      if ($this->fechamodificacion == "" && $use_null)  
      { 
          $this->fechamodificacion = "null" ; 
      } 
      $this->field_config['fechamodificacion']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['rangoinicial']['date_format'];
      if ($this->rangoinicial != "")  
      { 
          nm_conv_data($this->rangoinicial, $this->field_config['rangoinicial']['date_format']) ; 
          $this->rangoinicial_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->rangoinicial_hora = substr($this->rangoinicial_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->rangoinicial_hora = substr($this->rangoinicial_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->rangoinicial_hora = substr($this->rangoinicial_hora, 0, -4);
          }
          $this->rangoinicial .= " " . $this->rangoinicial_hora ; 
      } 
      if ($this->rangoinicial == "" && $use_null)  
      { 
          $this->rangoinicial = "null" ; 
      } 
      $this->field_config['rangoinicial']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['rangofinal']['date_format'];
      if ($this->rangofinal != "")  
      { 
          nm_conv_data($this->rangofinal, $this->field_config['rangofinal']['date_format']) ; 
          $this->rangofinal_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->rangofinal_hora = substr($this->rangofinal_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->rangofinal_hora = substr($this->rangofinal_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->rangofinal_hora = substr($this->rangofinal_hora, 0, -4);
          }
          $this->rangofinal .= " " . $this->rangofinal_hora ; 
      } 
      if ($this->rangofinal == "" && $use_null)  
      { 
          $this->rangofinal = "null" ; 
      } 
      $this->field_config['rangofinal']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['horainicio']['date_format'];
      if ($this->horainicio != "")  
      { 
          $this->horainicio_hora = $this->horainicio;
          $this->horainicio = "1900-01-01";
          nm_conv_hora($this->horainicio_hora, $this->field_config['horainicio']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->horainicio_hora = substr($this->horainicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->horainicio_hora = substr($this->horainicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->horainicio_hora = substr($this->horainicio_hora, 0, -4);
          }
          $this->horainicio = $this->horainicio_hora;
      } 
      if ($this->horainicio == "" && $use_null)  
      { 
          $this->horainicio = "null" ; 
      } 
      $this->field_config['horainicio']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['horafin']['date_format'];
      if ($this->horafin != "")  
      { 
          $this->horafin_hora = $this->horafin;
          $this->horafin = "1900-01-01";
          nm_conv_hora($this->horafin_hora, $this->field_config['horafin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->horafin_hora = substr($this->horafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->horafin_hora = substr($this->horafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->horafin_hora = substr($this->horafin_hora, 0, -4);
          }
          $this->horafin = $this->horafin_hora;
      } 
      if ($this->horafin == "" && $use_null)  
      { 
          $this->horafin = "null" ; 
      } 
      $this->field_config['horafin']['date_format'] = $guarda_format_hora;
      if ($this->recur_info != '')
      {
          $tmpRecurInfo = json_decode($this->recur_info, true);
          if ($tmpRecurInfo['endin'] != '')
          {
              nm_conv_data($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_format']);
              $this->recur_info = json_encode($tmpRecurInfo);
          }
      }
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_idtipodemodulista();
          $this->ajax_return_values_cantidadmodulistas();
          $this->ajax_return_values_fecharegistro();
          $this->ajax_return_values_fechamodificacion();
          $this->ajax_return_values_rangoinicial();
          $this->ajax_return_values_rangofinal();
          $this->ajax_return_values_horainicio();
          $this->ajax_return_values_horafin();
          $this->ajax_return_values_idasignacionmodulista();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idasignacionmodulista']['keyVal'] = CALEN_MODULISTA_DESPACHO_mob_pack_protect_string($this->nmgp_dados_form['idasignacionmodulista']);
          }
   } // ajax_return_values

          //----- idtipodemodulista
   function ajax_return_values_idtipodemodulista($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idtipodemodulista", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idtipodemodulista);
              $aLookup = array();
              $this->_tmp_lookup_idtipodemodulista = $this->idtipodemodulista;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cantidadmodulistas = $this->cantidadmodulistas;
   $old_value_fecharegistro = $this->fecharegistro;
   $old_value_fecharegistro_hora = $this->fecharegistro_hora;
   $old_value_fechamodificacion = $this->fechamodificacion;
   $old_value_rangoinicial = $this->rangoinicial;
   $old_value_rangofinal = $this->rangofinal;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidadmodulistas = $this->cantidadmodulistas;
   $unformatted_value_fecharegistro = $this->fecharegistro;
   $unformatted_value_fecharegistro_hora = $this->fecharegistro_hora;
   $unformatted_value_fechamodificacion = $this->fechamodificacion;
   $unformatted_value_rangoinicial = $this->rangoinicial;
   $unformatted_value_rangofinal = $this->rangofinal;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idtipodeModulista, tipoModulista  FROM tipodemodulista  ORDER BY tipoModulista";

   $this->cantidadmodulistas = $old_value_cantidadmodulistas;
   $this->fecharegistro = $old_value_fecharegistro;
   $this->fecharegistro_hora = $old_value_fecharegistro_hora;
   $this->fechamodificacion = $old_value_fechamodificacion;
   $this->rangoinicial = $old_value_rangoinicial;
   $this->rangofinal = $old_value_rangofinal;
   $this->horainicio = $old_value_horainicio;
   $this->horafin = $old_value_horafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(CALEN_MODULISTA_DESPACHO_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', CALEN_MODULISTA_DESPACHO_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"idtipodemodulista\"";
          if (isset($this->NM_ajax_info['select_html']['idtipodemodulista']) && !empty($this->NM_ajax_info['select_html']['idtipodemodulista']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idtipodemodulista'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->idtipodemodulista == $sValue)
                  {
                      $this->_tmp_lookup_idtipodemodulista = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idtipodemodulista'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idtipodemodulista']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idtipodemodulista']['valList'][$i] = CALEN_MODULISTA_DESPACHO_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idtipodemodulista']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idtipodemodulista']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idtipodemodulista']['labList'] = $aLabel;
          }
   }

          //----- cantidadmodulistas
   function ajax_return_values_cantidadmodulistas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidadmodulistas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cantidadmodulistas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cantidadmodulistas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fecharegistro
   function ajax_return_values_fecharegistro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecharegistro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecharegistro);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecharegistro'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fecharegistro . ' ' . $this->fecharegistro_hora),
              );
          }
   }

          //----- fechamodificacion
   function ajax_return_values_fechamodificacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechamodificacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechamodificacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechamodificacion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- rangoinicial
   function ajax_return_values_rangoinicial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rangoinicial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rangoinicial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rangoinicial'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- rangofinal
   function ajax_return_values_rangofinal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rangofinal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rangofinal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rangofinal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- horainicio
   function ajax_return_values_horainicio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("horainicio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->horainicio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['horainicio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- horafin
   function ajax_return_values_horafin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("horafin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->horafin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['horafin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idasignacionmodulista
   function ajax_return_values_idasignacionmodulista($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idasignacionmodulista", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idasignacionmodulista);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idasignacionmodulista'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total']))
          {
               $sc_where_pos = " WHERE ((idasignacionModulista < $this->idasignacionmodulista))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->idasignacionmodulista)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opcao'] = '';

   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['CALEN_MODULISTA_DESPACHO_mob']['contr_erro'] = 'on';
              /* disponibilidadcitas */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM disponibilidadcitas WHERE idasignacionModulista = " . $this->idasignacionmodulista ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM disponibilidadcitas WHERE idasignacionModulista = " . $this->idasignacionmodulista ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_disponibilidadcitas = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_disponibilidadcitas[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_disponibilidadcitas = false;
          $this->dataset_disponibilidadcitas_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_disponibilidadcitas[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_CALEN_MODULISTA_DESPACHO_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['CALEN_MODULISTA_DESPACHO_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['idtipodemodulista'] = $this->idtipodemodulista;
      $NM_val_form['cantidadmodulistas'] = $this->cantidadmodulistas;
      $NM_val_form['fecharegistro'] = $this->fecharegistro;
      $NM_val_form['fechamodificacion'] = $this->fechamodificacion;
      $NM_val_form['rangoinicial'] = $this->rangoinicial;
      $NM_val_form['rangofinal'] = $this->rangofinal;
      $NM_val_form['horainicio'] = $this->horainicio;
      $NM_val_form['horafin'] = $this->horafin;
      $NM_val_form['idasignacionmodulista'] = $this->idasignacionmodulista;
      $NM_val_form['periodo'] = $this->periodo;
      $NM_val_form['reaparicion'] = $this->reaparicion;
      $NM_val_form['id_api'] = $this->id_api;
      $NM_val_form['id_event_google'] = $this->id_event_google;
      $NM_val_form['recur_info'] = $this->recur_info;
      $NM_val_form['event_color'] = $this->event_color;
      $NM_val_form['creator'] = $this->creator;
      $NM_val_form['reminder'] = $this->reminder;
      $NM_val_form['category'] = $this->category;
      $NM_val_form['__calend_all_day__'] = $this->__calend_all_day__;
      if ($this->idasignacionmodulista === "" || is_null($this->idasignacionmodulista))  
      { 
          $this->idasignacionmodulista = 0;
      } 
      if ($this->cantidadmodulistas === "" || is_null($this->cantidadmodulistas))  
      { 
          $this->cantidadmodulistas = 0;
          $this->sc_force_zero[] = 'cantidadmodulistas';
      } 
      if ($this->idtipodemodulista === "" || is_null($this->idtipodemodulista))  
      { 
          $this->idtipodemodulista = 0;
          $this->sc_force_zero[] = 'idtipodemodulista';
      } 
      if ($this->category === "" || is_null($this->category))  
      { 
          $this->category = 0;
          $this->sc_force_zero[] = 'category';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_ibase, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->rangoinicial == "")  
          { 
              $this->rangoinicial = "null"; 
              $NM_val_null[] = "rangoinicial";
          } 
          if ($this->rangofinal == "")  
          { 
              $this->rangofinal = "null"; 
              $NM_val_null[] = "rangofinal";
          } 
          if ($this->fecharegistro == "")  
          { 
              $this->fecharegistro = "null"; 
              $NM_val_null[] = "fecharegistro";
          } 
          if ($this->fechamodificacion == "")  
          { 
              $this->fechamodificacion = "null"; 
              $NM_val_null[] = "fechamodificacion";
          } 
          if ($this->horainicio == "")  
          { 
              $this->horainicio = "null"; 
              $NM_val_null[] = "horainicio";
          } 
          if ($this->horafin == "")  
          { 
              $this->horafin = "null"; 
              $NM_val_null[] = "horafin";
          } 
          $this->periodo_before_qstr = $this->periodo;
          $this->periodo = substr($this->Db->qstr($this->periodo), 1, -1); 
          if ($this->periodo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->periodo = "null"; 
              $NM_val_null[] = "periodo";
          } 
          $this->reaparicion_before_qstr = $this->reaparicion;
          $this->reaparicion = substr($this->Db->qstr($this->reaparicion), 1, -1); 
          if ($this->reaparicion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->reaparicion = "null"; 
              $NM_val_null[] = "reaparicion";
          } 
          $this->id_api_before_qstr = $this->id_api;
          $this->id_api = substr($this->Db->qstr($this->id_api), 1, -1); 
          if ($this->id_api == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->id_api = "null"; 
              $NM_val_null[] = "id_api";
          } 
          $this->id_event_google_before_qstr = $this->id_event_google;
          $this->id_event_google = substr($this->Db->qstr($this->id_event_google), 1, -1); 
          if ($this->id_event_google == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->id_event_google = "null"; 
              $NM_val_null[] = "id_event_google";
          } 
          $this->recur_info_before_qstr = $this->recur_info;
          $this->recur_info = substr($this->Db->qstr($this->recur_info), 1, -1); 
          if ($this->recur_info == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->recur_info = "null"; 
              $NM_val_null[] = "recur_info";
          } 
          $this->event_color_before_qstr = $this->event_color;
          $this->event_color = substr($this->Db->qstr($this->event_color), 1, -1); 
          if ($this->event_color == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->event_color = "null"; 
              $NM_val_null[] = "event_color";
          } 
          $this->creator_before_qstr = $this->creator;
          $this->creator = substr($this->Db->qstr($this->creator), 1, -1); 
          if ($this->creator == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->creator = "null"; 
              $NM_val_null[] = "creator";
          } 
          $this->reminder_before_qstr = $this->reminder;
          $this->reminder = substr($this->Db->qstr($this->reminder), 1, -1); 
          if ($this->reminder == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->reminder = "null"; 
              $NM_val_null[] = "reminder";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cantidadModulistas = $this->cantidadmodulistas, rangoInicial = #$this->rangoinicial#, rangoFinal = #$this->rangofinal#, fechaRegistro = #$this->fecharegistro#, fechaModificacion = #$this->fechamodificacion#, horaInicio = #$this->horainicio#, horaFin = #$this->horafin#, idtipodeModulista = $this->idtipodemodulista"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cantidadModulistas = $this->cantidadmodulistas, rangoInicial = " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", rangoFinal = " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", fechaRegistro = " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ", fechaModificacion = " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", horaInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", horaFin = " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", idtipodeModulista = $this->idtipodemodulista"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cantidadModulistas = $this->cantidadmodulistas, rangoInicial = " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", rangoFinal = " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", fechaRegistro = " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ", fechaModificacion = " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", horaInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", horaFin = " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", idtipodeModulista = $this->idtipodemodulista"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cantidadModulistas = $this->cantidadmodulistas, rangoInicial = " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", rangoFinal = " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", fechaRegistro = " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ", fechaModificacion = " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", horaInicio = " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", horaFin = " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", idtipodeModulista = $this->idtipodemodulista"; 
              } 
              if (isset($NM_val_form['periodo']) && $NM_val_form['periodo'] != $this->nmgp_dados_select['periodo']) 
              { 
                  $SC_fields_update[] = "periodo = '$this->periodo'"; 
              } 
              if (isset($NM_val_form['reaparicion']) && $NM_val_form['reaparicion'] != $this->nmgp_dados_select['reaparicion']) 
              { 
                  $SC_fields_update[] = "reaparicion = '$this->reaparicion'"; 
              } 
              if (isset($NM_val_form['id_api']) && $NM_val_form['id_api'] != $this->nmgp_dados_select['id_api']) 
              { 
                  $SC_fields_update[] = "id_api = '$this->id_api'"; 
              } 
              if (isset($NM_val_form['id_event_google']) && $NM_val_form['id_event_google'] != $this->nmgp_dados_select['id_event_google']) 
              { 
                  $SC_fields_update[] = "id_event_google = '$this->id_event_google'"; 
              } 
              if (isset($NM_val_form['recur_info']) && $NM_val_form['recur_info'] != $this->nmgp_dados_select['recur_info']) 
              { 
                  $SC_fields_update[] = "recur_info = '$this->recur_info'"; 
              } 
              if (isset($NM_val_form['event_color']) && $NM_val_form['event_color'] != $this->nmgp_dados_select['event_color']) 
              { 
                  $SC_fields_update[] = "event_color = '$this->event_color'"; 
              } 
              if (isset($NM_val_form['creator']) && $NM_val_form['creator'] != $this->nmgp_dados_select['creator']) 
              { 
                  $SC_fields_update[] = "creator = '$this->creator'"; 
              } 
              if (isset($NM_val_form['reminder']) && $NM_val_form['reminder'] != $this->nmgp_dados_select['reminder']) 
              { 
                  $SC_fields_update[] = "reminder = '$this->reminder'"; 
              } 
              if (isset($NM_val_form['category']) && $NM_val_form['category'] != $this->nmgp_dados_select['category']) 
              { 
                  $SC_fields_update[] = "category = $this->category"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idasignacionModulista = $this->idasignacionmodulista ";  
              }  
              else  
              {
                  $comando .= " WHERE idasignacionModulista = $this->idasignacionmodulista ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->periodo = $this->periodo_before_qstr;
              $this->reaparicion = $this->reaparicion_before_qstr;
              $this->id_api = $this->id_api_before_qstr;
              $this->id_event_google = $this->id_event_google_before_qstr;
              $this->recur_info = $this->recur_info_before_qstr;
              $this->event_color = $this->event_color_before_qstr;
              $this->creator = $this->creator_before_qstr;
              $this->reminder = $this->reminder_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['db_changed'] = true;

              $this->NM_ajax_info['calendarReload'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['idasignacionmodulista'])) { $this->idasignacionmodulista = $NM_val_form['idasignacionmodulista']; }
              elseif (isset($this->idasignacionmodulista)) { $this->nm_limpa_alfa($this->idasignacionmodulista); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidadmodulistas'])) { $this->cantidadmodulistas = $NM_val_form['cantidadmodulistas']; }
              elseif (isset($this->cantidadmodulistas)) { $this->nm_limpa_alfa($this->cantidadmodulistas); }
              if     (isset($NM_val_form) && isset($NM_val_form['idtipodemodulista'])) { $this->idtipodemodulista = $NM_val_form['idtipodemodulista']; }
              elseif (isset($this->idtipodemodulista)) { $this->nm_limpa_alfa($this->idtipodemodulista); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idtipodemodulista', 'cantidadmodulistas', 'fecharegistro', 'fechamodificacion', 'rangoinicial', 'rangofinal', 'horainicio', 'horafin'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idasignacionModulista, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($this->google_calendar_insert) || !$this->google_calendar_insert)
          {
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, horaInicio, horaFin, periodo, reaparicion, id_api, id_event_google, recur_info, event_color, creator, reminder, idtipodeModulista, category) VALUES ($this->cantidadmodulistas, #$this->rangoinicial#, #$this->rangofinal#, #$this->fecharegistro#, #$this->fechamodificacion#, #$this->horainicio#, #$this->horafin#, '$this->periodo', '$this->reaparicion', '$this->id_api', '$this->id_event_google', '$this->recur_info', '$this->event_color', '$this->creator', '$this->reminder', $this->idtipodemodulista, $this->category)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, horaInicio, horaFin, periodo, reaparicion, id_api, id_event_google, recur_info, event_color, creator, reminder, idtipodeModulista, category) VALUES (" . $NM_seq_auto . "$this->cantidadmodulistas, " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->periodo', '$this->reaparicion', '$this->id_api', '$this->id_event_google', '$this->recur_info', '$this->event_color', '$this->creator', '$this->reminder', $this->idtipodemodulista, $this->category)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, horaInicio, horaFin, periodo, reaparicion, id_api, id_event_google, recur_info, event_color, creator, reminder, idtipodeModulista, category) VALUES (" . $NM_seq_auto . "$this->cantidadmodulistas, " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->periodo', '$this->reaparicion', '$this->id_api', '$this->id_event_google', '$this->recur_info', '$this->event_color', '$this->creator', '$this->reminder', $this->idtipodemodulista, $this->category)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, horaInicio, horaFin, periodo, reaparicion, id_api, id_event_google, recur_info, event_color, creator, reminder, idtipodeModulista, category) VALUES (" . $NM_seq_auto . "$this->cantidadmodulistas, " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horainicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horafin . $this->Ini->date_delim1 . ", '$this->periodo', '$this->reaparicion', '$this->id_api', '$this->id_event_google', '$this->recur_info', '$this->event_color', '$this->creator', '$this->reminder', $this->idtipodemodulista, $this->category)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idasignacionmodulista =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idasignacionmodulista = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idasignacionmodulista = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idasignacionmodulista = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idasignacionmodulista = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

              $this->sc_evento = "insert"; 
              $this->periodo = $this->periodo_before_qstr;
              $this->reaparicion = $this->reaparicion_before_qstr;
              $this->id_api = $this->id_api_before_qstr;
              $this->id_event_google = $this->id_event_google_before_qstr;
              $this->recur_info = $this->recur_info_before_qstr;
              $this->event_color = $this->event_color_before_qstr;
              $this->creator = $this->creator_before_qstr;
              $this->reminder = $this->reminder_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idasignacionmodulista = substr($this->Db->qstr($this->idasignacionmodulista), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idasignacionModulista = $this->idasignacionmodulista "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['parms'] = "idasignacionmodulista?#?$this->idasignacionmodulista?@?"; 
      }
      $this->NM_commit_db(); 
      if (isset($this->google_calendar_insert) && $this->google_calendar_insert)
      {
          return;
      }
      if (('insert' == $this->sc_evento && 1 != $GLOBALS["erro_incl"]) || 'delete' == $this->sc_evento)
      {
          $this->calendarOutputReload();
          exit;
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idasignacionmodulista = null === $this->idasignacionmodulista ? null : substr($this->Db->qstr($this->idasignacionmodulista), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idasignacionModulista, cantidadModulistas, str_replace (convert(char(10),rangoInicial,102), '.', '-') + ' ' + convert(char(8),rangoInicial,20), str_replace (convert(char(10),rangoFinal,102), '.', '-') + ' ' + convert(char(8),rangoFinal,20), str_replace (convert(char(10),fechaRegistro,102), '.', '-') + ' ' + convert(char(8),fechaRegistro,20), str_replace (convert(char(10),fechaModificacion,102), '.', '-') + ' ' + convert(char(8),fechaModificacion,20), str_replace (convert(char(10),horaInicio,102), '.', '-') + ' ' + convert(char(8),horaInicio,20), str_replace (convert(char(10),horaFin,102), '.', '-') + ' ' + convert(char(8),horaFin,20), periodo, reaparicion, id_api, id_event_google, recur_info, event_color, creator, reminder, idtipodeModulista, category from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idasignacionModulista, cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, horaInicio, horaFin, periodo, reaparicion, id_api, id_event_google, recur_info, event_color, creator, reminder, idtipodeModulista, category from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idasignacionModulista = $this->idasignacionmodulista"; 
              }  
              else  
              {
                  $aWhere[] = "idasignacionModulista = $this->idasignacionmodulista"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "idasignacionModulista";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->idasignacionmodulista = $rs->fields[0] ; 
              $this->nmgp_dados_select['idasignacionmodulista'] = $this->idasignacionmodulista;
              $this->cantidadmodulistas = $rs->fields[1] ; 
              $this->nmgp_dados_select['cantidadmodulistas'] = $this->cantidadmodulistas;
              $this->rangoinicial = $rs->fields[2] ; 
              if (substr($this->rangoinicial, 10, 1) == "-") 
              { 
                 $this->rangoinicial = substr($this->rangoinicial, 0, 10) . " " . substr($this->rangoinicial, 11);
              } 
              if (substr($this->rangoinicial, 13, 1) == ".") 
              { 
                 $this->rangoinicial = substr($this->rangoinicial, 0, 13) . ":" . substr($this->rangoinicial, 14, 2) . ":" . substr($this->rangoinicial, 17);
              } 
              $this->nmgp_dados_select['rangoinicial'] = $this->rangoinicial;
              $this->rangofinal = $rs->fields[3] ; 
              if (substr($this->rangofinal, 10, 1) == "-") 
              { 
                 $this->rangofinal = substr($this->rangofinal, 0, 10) . " " . substr($this->rangofinal, 11);
              } 
              if (substr($this->rangofinal, 13, 1) == ".") 
              { 
                 $this->rangofinal = substr($this->rangofinal, 0, 13) . ":" . substr($this->rangofinal, 14, 2) . ":" . substr($this->rangofinal, 17);
              } 
              $this->nmgp_dados_select['rangofinal'] = $this->rangofinal;
              $this->fecharegistro = $rs->fields[4] ; 
              if (substr($this->fecharegistro, 10, 1) == "-") 
              { 
                 $this->fecharegistro = substr($this->fecharegistro, 0, 10) . " " . substr($this->fecharegistro, 11);
              } 
              if (substr($this->fecharegistro, 13, 1) == ".") 
              { 
                 $this->fecharegistro = substr($this->fecharegistro, 0, 13) . ":" . substr($this->fecharegistro, 14, 2) . ":" . substr($this->fecharegistro, 17);
              } 
              $this->nmgp_dados_select['fecharegistro'] = $this->fecharegistro;
              $this->fechamodificacion = $rs->fields[5] ; 
              if (substr($this->fechamodificacion, 10, 1) == "-") 
              { 
                 $this->fechamodificacion = substr($this->fechamodificacion, 0, 10) . " " . substr($this->fechamodificacion, 11);
              } 
              if (substr($this->fechamodificacion, 13, 1) == ".") 
              { 
                 $this->fechamodificacion = substr($this->fechamodificacion, 0, 13) . ":" . substr($this->fechamodificacion, 14, 2) . ":" . substr($this->fechamodificacion, 17);
              } 
              $this->nmgp_dados_select['fechamodificacion'] = $this->fechamodificacion;
              $this->horainicio = $rs->fields[6] ; 
              $this->nmgp_dados_select['horainicio'] = $this->horainicio;
              $this->horafin = $rs->fields[7] ; 
              $this->nmgp_dados_select['horafin'] = $this->horafin;
              $this->periodo = $rs->fields[8] ; 
              $this->nmgp_dados_select['periodo'] = $this->periodo;
              $this->reaparicion = $rs->fields[9] ; 
              $this->nmgp_dados_select['reaparicion'] = $this->reaparicion;
              $this->id_api = $rs->fields[10] ; 
              $this->nmgp_dados_select['id_api'] = $this->id_api;
              $this->id_event_google = $rs->fields[11] ; 
              $this->nmgp_dados_select['id_event_google'] = $this->id_event_google;
              $this->recur_info = $rs->fields[12] ; 
              $this->nmgp_dados_select['recur_info'] = $this->recur_info;
              $this->event_color = $rs->fields[13] ; 
              $this->nmgp_dados_select['event_color'] = $this->event_color;
              $this->creator = $rs->fields[14] ; 
              $this->nmgp_dados_select['creator'] = $this->creator;
              $this->reminder = $rs->fields[15] ; 
              $this->nmgp_dados_select['reminder'] = $this->reminder;
              $this->idtipodemodulista = $rs->fields[16] ; 
              $this->nmgp_dados_select['idtipodemodulista'] = $this->idtipodemodulista;
              $this->category = $rs->fields[17] ; 
              $this->nmgp_dados_select['category'] = $this->category;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->idasignacionmodulista = (string)$this->idasignacionmodulista; 
              $this->cantidadmodulistas = (string)$this->cantidadmodulistas; 
              $this->idtipodemodulista = (string)$this->idtipodemodulista; 
              $this->category = (string)$this->category; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['parms'] = "idasignacionmodulista?#?$this->idasignacionmodulista?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->idasignacionmodulista = "";  
              $this->nmgp_dados_form["idasignacionmodulista"] = $this->idasignacionmodulista;
              $this->cantidadmodulistas = "";  
              $this->nmgp_dados_form["cantidadmodulistas"] = $this->cantidadmodulistas;
              $this->rangoinicial = "";  
              $this->rangoinicial_hora = "" ;  
              $this->nmgp_dados_form["rangoinicial"] = $this->rangoinicial;
              $this->rangofinal = "";  
              $this->rangofinal_hora = "" ;  
              $this->nmgp_dados_form["rangofinal"] = $this->rangofinal;
              $this->fecharegistro =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->fecharegistro_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["fecharegistro"] = $this->fecharegistro;
              $this->fechamodificacion =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["fechamodificacion"] = $this->fechamodificacion;
              $this->horainicio = "";  
              $this->horainicio_hora = "" ;  
              $this->nmgp_dados_form["horainicio"] = $this->horainicio;
              $this->horafin = "";  
              $this->horafin_hora = "" ;  
              $this->nmgp_dados_form["horafin"] = $this->horafin;
              $this->periodo = "";  
              $this->nmgp_dados_form["periodo"] = $this->periodo;
              $this->reaparicion = "";  
              $this->nmgp_dados_form["reaparicion"] = $this->reaparicion;
              $this->id_api = "";  
              $this->nmgp_dados_form["id_api"] = $this->id_api;
              $this->id_event_google = "";  
              $this->nmgp_dados_form["id_event_google"] = $this->id_event_google;
              $this->recur_info = "";  
              $this->nmgp_dados_form["recur_info"] = $this->recur_info;
              $this->event_color = "";  
              $this->nmgp_dados_form["event_color"] = $this->event_color;
              $this->creator = "";  
              $this->nmgp_dados_form["creator"] = $this->creator;
              $this->reminder = "";  
              $this->nmgp_dados_form["reminder"] = $this->reminder;
              $this->idtipodemodulista = "";  
              $this->nmgp_dados_form["idtipodemodulista"] = $this->idtipodemodulista;
              $this->category = "";  
              $this->nmgp_dados_form["category"] = $this->category;
              $this->__calend_all_day__ = "";  
              $this->nmgp_dados_form["__calend_all_day__"] = $this->__calend_all_day__;
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }

          if (isset($this->sc_cal_click_date) && isset($this->sc_cal_click_time))
          {
              list($iTimestampIni, $iTimestampEnd) = $this->calendarInitTimestamp();

              $sTimeFormat1 = 'true' == $this->sc_cal_click_allday ? ''          : 'H:i:s';
              $sTimeFormat2 = 'true' == $this->sc_cal_click_allday ? ' 00:00:00' : ' H:i:s';

              $this->rangoinicial = date('Y-m-d', $iTimestampIni);
              $this->horainicio = date($sTimeFormat1, $iTimestampIni);
              $this->rangofinal = date('Y-m-d', $iTimestampEnd);
              $this->horafin = date($sTimeFormat1, $iTimestampEnd);
          }

          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function horaInicio_onBlur()
{
$_SESSION['scriptcase']['CALEN_MODULISTA_DESPACHO_mob']['contr_erro'] = 'on';
  
$original_horafin = $this->horafin;
$original_horainicio = $this->horainicio;

if ($this->horafin =="" or $this->horafin =="null"){
	$this->horafin  = date ('H:i', strtotime($this->horainicio .' + 60 minutes') );
}




$modificado_horafin = $this->horafin;
$modificado_horainicio = $this->horainicio;
$this->nm_formatar_campos('horafin', 'horainicio');
if ($original_horafin !== $modificado_horafin || isset($this->nmgp_cmp_readonly['horafin']) || (isset($bFlagRead_horafin) && $bFlagRead_horafin))
{
    $this->ajax_return_values_horafin(true);
}
if ($original_horainicio !== $modificado_horainicio || isset($this->nmgp_cmp_readonly['horainicio']) || (isset($bFlagRead_horainicio) && $bFlagRead_horainicio))
{
    $this->ajax_return_values_horainicio(true);
}
$this->NM_ajax_info['event_field'] = 'horaInicio';
CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['CALEN_MODULISTA_DESPACHO_mob']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();

    if (('' == $this->horainicio || '00:00:00' == $this->horainicio) && ('' == $this->horafin || '00:00:00' == $this->horafin))
    {
        $this->__calend_all_day__ = 'Y';
    }

    include_once("CALEN_MODULISTA_DESPACHO_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function calendarOutputDisplay()
   {
       if (isset($_SESSION['scriptcase']['reg_conf']['date_format']) && '' != $_SESSION['scriptcase']['reg_conf']['date_format'])
       {
           $iPosDay     = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'd');
           $iPosMonth   = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'm');
           $sCalDateCol = (false !== $iPosDay && false !== $iPosMonth && $iPosDay > $iPosMonth) ? 'M/D' : 'D/M';
       }
       else
       {
           $sCalDateCol = 'M/D';
       }

       $appReturn = '';
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['sc_outra_jan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['sc_outra_jan'] != 'CALEN_MODULISTA_DESPACHO_mob')) {
           global $nm_url_saida, $nm_apl_dependente;
           if ((!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] == "R" || $this->aba_iframe) && ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['run_iframe'] != "F") && ($nm_apl_dependente == 1)) {
               $appReturn = $nm_url_saida;
           }
           else {
           }
       }

       $iFirstDay = isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && '' != $_SESSION['scriptcase']['reg_conf']['date_week_ini'] ? array_search($_SESSION['scriptcase']['reg_conf']['date_week_ini'], array('SU', 'MO', 'TU', 'WE', 'TH', 'FR', 'SA')) : false;
       $iFirstDay = false === $iFirstDay ? 0 : $iFirstDay;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <title></title>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/fullcalendar.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <script type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/lib/moment.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/fullcalendar.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/gcal.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<script type="text/javascript">
  function calendarGoBack() {
    document.F6.action = "<?php echo $appReturn; ?>";
    document.F6.submit();
  }
</script>
<style type="text/css">

@media (max-width: 1200px) {
    .fc-toolbar .fc-center{
        display:none;
    }
}

@media (max-width: 1150px) {
    .fc-toolbar .fc-center{
        display:inline-block !important;
    }

    button.fc-today-button,
    button.fc-print-button,
    button.fc-importGoogle-button,
    button.fc-exportGoogle-button,
    button.fc-month-button,
    button.fc-agendaWeek-button,
    button.fc-agendaDay-button,
    button.fc-listMonth-button {
        background-repeat: no-repeat;
        background-size: 24px;
        background-position: center;
        text-indent: -9999px;
    }

    button.fc-today-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_today.png)!important;
    }

    button.fc-print-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_print.png)!important;
    }

    button.fc-importGoogle-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_down.png)!important;
    }

    button.fc-exportGoogle-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_up.png)!important;
    }

    button.fc-month-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_month.png)!important;
    }

    button.fc-agendaWeek-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_week.png)!important;
    }

    button.fc-agendaDay-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_day.png)!important;
    }

    button.fc-listMonth-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_list.png)!important;
    }
}

@media (max-width: 670px) {
    button.fc-print-button{
        display:none !important;
    }
}

@media (max-width: 853px) {
    .fc-toolbar .fc-center{
        display:none !important;
    }
    button.fc-prev-button,
    button.fc-next-button{
        padding: 2px 5px!important;
    }
}
</style>
 <script type="text/javascript">
  function sc_session_redir(url_redir)
  {
      if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
      {
          window.parent.sc_session_redir(url_redir);
      }
      else
      {
          if (window.opener && typeof window.opener.sc_session_redir === 'function')
          {
              window.close();
              window.opener.sc_session_redir(url_redir);
          }
          else
          {
              window.location = url_redir;
          }
      }
  }
  function calendar_reload() {
    $('#calendar').fullCalendar('refetchEvents');
  }
  function calendar_print() {
      $.ajax({
          url: 'CALEN_MODULISTA_DESPACHO_mob.php',
          type: 'GET',
          dataType: 'json',
          data: {
              nmgp_opcao: 'calendar_print',
              category: getCategory(true),
              start: $('#calendar').fullCalendar('getView').start.format(),
              end: $('#calendar').fullCalendar('getView').end.format()
          }
      }).done(function(data) {
          if ('html' == data.outputFormat) {
              var newWindow = window.open('');
              newWindow.document.write(data.printHtml);
              newWindow.document.close();
              newWindow.focus();
          }
          else {
              var newWindow = window.open(data.fileHtml);
          }
          //newWindow.print();
      });
  }
  $(document).ready(function() {
    $('#calendar_mini').fullCalendar({
        monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
        monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
        dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
        dayNamesShort: ["<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
        buttonText: {
          today: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        },
    firstDay: <?php echo $iFirstDay; ?>,
        header: {
            left: 'prev,next today',
            center: 'title',
            right:'',
        },
        dayClick: function(date, jsEvent, view) {
          $('#calendar').fullCalendar( 'gotoDate', date );
        },
        defaultView: 'month',
    });
    $('#calendar').fullCalendar({
      height: ($( document ).height()-10),
      monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
      monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
      dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
      dayNamesShort: ["<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
      allDayText: "<?php       echo html_entity_decode($this->Ini->Nm_lang["lang_per_allday"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);     ?>",
      allDayHtml: "<?php       echo html_entity_decode($this->Ini->Nm_lang["lang_per_allday"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);     ?>",
      noEventsMessage: "<?php       echo html_entity_decode($this->Ini->Nm_lang["lang_per_nevent"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);     ?>",
      buttonText: {
        today: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        month: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_month"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        week: "<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_per_week"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);        ?>",
        day: "<?php    echo html_entity_decode($this->Ini->Nm_lang["lang_per_day"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);         ?>",
        agenda: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
        print: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);  ?>",
        listMonth: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);  ?>",
      },
      views: {
        month: {titleFormat: 'MMMM YYYY', columnFormat: 'ddd', timeFormat: 'H:mm',slotLabelFormat: ['ddd','H:mm'],},
        week: {titleFormat: 'MMM D YYYY', columnFormat: 'ddd <?php echo $sCalDateCol; ?>', timeFormat: 'H:mm',slotLabelFormat: ['ddd <?php echo $sCalDateCol; ?>','H:mm'],},
        day: {titleFormat: 'dddd[,] MMM D[,] YYYY', columnFormat: 'dddd <?php echo $sCalDateCol; ?>', timeFormat: 'H:mm',slotLabelFormat: ['dddd <?php echo $sCalDateCol; ?>','H:mm'],},
      },
      firstDay: <?php echo $iFirstDay; ?>,
      header: {
        left: 'prev,next today print',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth<?php if ('' != $appReturn) { echo ' goBack'; } ?>'
      },
      customButtons: {
        goBack: {
          text: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_back"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
          click: function() {
            calendarGoBack();
          }
        },
        print: {
          text: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);  ?>",
          click: function() {
            calendar_print();
          }
        }
      },
      editable: <?php echo ($this->calendarConfigValues['update'] ? 'true' : 'false'); ?>,
      slotDuration: "00:30:00",
      snapDuration: "00:05:00",
      nextDayThreshold: "00:00:00",
      eventStartEditable: false,
      allDaySlot: true,
<?php
       if (isset($this->Ini->Nm_lang["lang_calendar_no_events"]) && '' != $this->Ini->Nm_lang["lang_calendar_no_events"]) {
?>
      noEventsMessage: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_no_events"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
<?php
       }
?>
      events: 'CALEN_MODULISTA_DESPACHO_mob.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false),
      eventRender: function (event, element, view) {
        if(event.hasOwnProperty('description') && event.description != '')
        {
            element.find('.fc-title').append('<div class="hr-line-solid-no-margin"></div><span style="font-size: 80%;">'+event.description+'</span></div>');
        }
      },
      dayClick: function(date, jsEvent, view) {
<?php
       if ($this->calendarConfigValues['insert'])
       {
?>
        var sDate = date.format(), sTime = '00:00:00', allDay = false;
        if (sDate.indexOf('T') > 0)
        {
            dateParts = date.format().split('T');
            sDate = dateParts[0], sTime = dateParts[1];
        }
        else if ('month' == view.type)
        {
            sTime = '06:00:00';
        }
        else
        {
            allDay = true;
        }
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
        scAddNewEvent(sDate, sTime, allDay);
<?php
}
else
{
?>
        tb_show('', 'CALEN_MODULISTA_DESPACHO_mob.php?nmgp_opcao=edit_novo&sc_cal_click_date=' + sDate + '&sc_cal_click_time=' + sTime + '&sc_cal_click_allday=' + allDay + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
<?php
}

?>
<?php
       }
?>
      },
      eventClick: function(calEvent, jsEvent, view) {
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
        scEditEvent(calEvent.id);
<?php
}
else
{
?>
        tb_show('', 'CALEN_MODULISTA_DESPACHO_mob.php?nmgp_opcao=igual_calendar&idasignacionmodulista=' + calEvent.id + '&__orig_idasignacionmodulista=' + calEvent.id + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
<?php
}

?>
      },
      eventDrop: function(event, delta, revertFunc) {
        $.ajax({
          url: 'CALEN_MODULISTA_DESPACHO_mob.php',
          type: 'POST',
          dataType: 'json',
          data: { 'script_case_init': '<?php echo $this->Ini->sc_page ?>', 'nmgp_opcao': 'calendar_drop', 'sc_event_id': event.id, 'sc_day_delta': delta._data.days, 'sc_time_delta': (delta._data.hours * 60) + delta._data.minutes, 'sc_all_day': event.allDay, 'sc_fullcal_start': (event._start && event._start._d ? event._start._d.toISOString() : ''), 'sc_fullcal_end': (event._end && event._end._d ? event._end._d.toISOString() : '') },
          originalEvent: event,
          success: function(data) {
            var bChanged = false;
            if (false == data['status']) {
              revertFunc();
            }
            else {
              if ('' != data['backgroundColor']) {
                if (this.originalEvent.backgroundColor != data['backgroundColor']) {
                  bChanged = true;
                }
                this.originalEvent.backgroundColor = data['backgroundColor'];
              }
              if ('' != data['borderColor']) {
                if (this.originalEvent.borderColor != data['borderColor']) {
                  bChanged = true;
                }
                this.originalEvent.borderColor = data['borderColor'];
              }
              if (this.originalEvent.allDay || this.originalEvent.originalAllDay || bChanged) {
                $('#calendar').fullCalendar('refetchEvents');
              }
              else {
                $('#calendar').fullCalendar('updateEvent', this.originalEvent);
              }
            }
            if ('' != data['message']) {
              alert(data['message']);
            }
          }
        });
      },
      eventResize: function(event, delta, revertFunc) {
        $.post(
          'CALEN_MODULISTA_DESPACHO_mob.php',
          { 'script_case_init': '<?php echo $this->Ini->sc_page ?>', 'nmgp_opcao': 'calendar_resize', 'sc_event_id': event.id, 'sc_day_delta': delta._data.days, 'sc_time_delta': (delta._data.hours * 60) + delta._data.minutes, 'sc_fullcal_start': (event._start && event._start._d ? event._start._d.toISOString() : ''), 'sc_fullcal_end': (event._end && event._end._d ? event._end._d.toISOString() : '') },
          function(data) {
            if (false == data['status']) {
              revertFunc();
            }
            if ('' != data['message']) {
              alert(data['message']);
            }
          },
          'json'
        );
      },
      defaultView: 'agendaWeek',
    });
  });
  function scAddNewEvent(sDate, sTime, allDay) {
    $("#sc-ui-nmgp_opcao").val("edit_novo");
    $("#sc-ui-click-date").val(sDate);
    $("#sc-ui-click-time").val(sTime);
    $("#sc-ui-click-allday").val(allDay);
    $("#sc-ui-form").submit();
  }
  function scEditEvent(sEventId) {
    $("#sc-ui-nmgp_opcao").val("igual");
    $("#sc-ui-event-id").val(sEventId);
    $("#sc-ui-form").submit();
  }

        function filterCategory(category) {
                if ($("#id_calendar_category_" + category).hasClass('scCalendarCategoryItemActive')) {
                        $("#id_calendar_category_" + category).removeClass('scCalendarCategoryItemActive');
                }
                else {
                        $("#id_calendar_category_" + category).addClass('scCalendarCategoryItemActive');
                }

                refreshFilterCategories();
        }

        function refreshFilterCategories() {
                $('#calendar').fullCalendar('removeEventSource', 'CALEN_MODULISTA_DESPACHO_mob.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false));

                setCategory();

                $('#calendar').fullCalendar('addEventSource', 'CALEN_MODULISTA_DESPACHO_mob.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false));
        }

        function setCategory() {
                var selectedCategories = $(".scCalendarCategoryItemActive"), categoryList = new Array(), i;

                for (i = 0; i < selectedCategories.length; i++) {
                        categoryList.push($(selectedCategories[i]).attr("id").substr(21));
                }

                $("#category_filter").val(categoryList.join(")SCCL)"))
        }

        function getCategory(isPrint) {
                var categoryFilter = $("#category_filter");

                if (!categoryFilter.length) {
                        return "";
                }
                else if (isPrint) {
                        return categoryFilter.val();
                }
                else {
                        return "&category=" + categoryFilter.val();
                }
        }
 </script>
</head>
<body class="scAppCalendarPage" style="">
<div class='scCalendarBorder'>
    <?php
if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dashboard_info']['under_dashboard']) {
?>
<style type="text/css">
BODY { margin: 0 !important }
</style>
<?php
}
?>
<div style="width: 260px; display: inline-block;">
<div id="calendar_mini"></div>
     </div>

    <div id="calendar" style="width: calc(100% - 280px); min-width: 260px; display:inline-block; margin-left:4px; vertical-align: top;"></div>
</div>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
<form name="F1" id="sc-ui-form" method="post"
      action="CALEN_MODULISTA_DESPACHO.php"
      target="_self">
 <input type="hidden" name="nm_form_submit" value="1" />
 <input type="hidden" name="nmgp_url_saida" value="" />
 <input type="hidden" name="nmgp_opcao" id="sc-ui-nmgp_opcao" value="" />
 <input type="hidden" name="nmgp_parms" value="" />
 <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
 <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>" />
 <input type="hidden" name="sc_cal_click_date" id="sc-ui-click-date" value="" />
 <input type="hidden" name="sc_cal_click_time" id="sc-ui-click-time" value="" />
 <input type="hidden" name="sc_cal_click_allday" id="sc-ui-click-allday" value="" />
 <input type="hidden" name="idasignacionmodulista" id="sc-ui-event-id" value="" />
</form>
<?php
}

?>
<form name="F6" method="post" action="./" target="_self">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>" />
</form>
</body>
</html>
<?php
   } // calendarOutputDisplay

   function calendarOutputJson($events)
   {
       if (!isset($_GET['nmgp_opcao']) || ($_GET['nmgp_opcao'] != 'igual' && $_GET['nmgp_opcao'] != 'edit_novo'))
       {
            $Temp = ob_get_clean();
       }
       $oJson = new Services_JSON();
       echo $oJson->encode($events);
   } // calendarOutputJson

   function calendarOutputReload()
   {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
 <script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></script>
<form name="fsai" method="post" action="<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>">
<input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($script_case_init); ?>"> 
<input type=hidden name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
</form>
<SCRIPT LANGUAGE="Javascript">
   nm_ver_saida = "<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>";
   nm_ver_saida = nm_ver_saida.toLowerCase();
   if (nm_ver_saida.substr(0, 4) != ".php" && (nm_ver_saida.substr(0, 7) == "http://" || nm_ver_saida.substr(0, 8) == "https://" || nm_ver_saida.substr(0, 3) == "../")) 
   { 
       window.location = ("<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>"); 
   } 
   else 
   { 
       document.fsai.submit();
   } 
</SCRIPT>
</head>
<body>
</body>
</html>
<?php
   } // calendarOutputReload

   function calendarFetchEvents($sId = '', $bPrintCalendar = false)
   {
       $aEvents = array_merge($this->calendarFetchNormalEvents($sId, $bPrintCalendar), $this->calendarFetchRecurrentEvents($sId));

       foreach ($aEvents as $iEvent => $aEventData)
       {
           if (isset($aEventData['event_color']))
           {
               $aEvents[$iEvent]['backgroundColor'] = $aEventData['event_color'];
               $aEvents[$iEvent]['borderColor']     = $aEventData['event_color'];
           }
           if ($aEventData['start'] < date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorPast'];
           }
           elseif ($aEventData['start'] > date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorFuture'];
           }
           else
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorToday'];
           }
       }

       return $aEvents;
   } // calendarFetchEvents

   function calendarFetchNormalEvents($sId, $bPrintCalendar = false, $filter = null)
   {
       $aSelect = $this->calendarFetchSelect(null !== $filter);

       $whereClause = $this->calendarWhere($sId, false, $bPrintCalendar, $filter);
       if (false === $whereClause) {
           return array();
       }

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $whereClause;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array();

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName || 'description' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           $aEvents[] = $aEvent;

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchNormalEvents

   function calendarFetchRecurrentEvents($sId, $bPrintCalendar = false)
   {
       if ('' != $sId)
       {
           return array();
       }

       $aSelect = $this->calendarFetchSelect();

       $whereClause = $this->calendarWhere($sId, true, $bPrintCalendar);
       if (false === $whereClause) {
           return array();
       }

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $whereClause;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

           $calendarDisplayStart = isset($_GET['start']) && '' != $_GET['start'] ? str_replace('-', '', $_GET['start']) : '';
           $calendarDisplayEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? str_replace('-', '', $_GET['end'])   : '';

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array('recur_info' => null);

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
               }
               elseif ('recur_info' == $sFldName)
               {
                   $aEvent[$sFldName] = json_decode($oRs->fields[$iSql]);
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           switch ($aEvent['period'])
           {
               case 'D':
                   $this->calendarRecurrentDay($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case 'W':
                   $this->calendarRecurrentWeek($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case 'M':
                   $this->calendarRecurrentMonth($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case 'A':
                   $this->calendarRecurrentYear($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;
           }

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchRecurrentEvents

   function calendarFetchSelect($googleInfo = false)
   {
       $aSelect = array();

       $aSelect['id'] = "idasignacionModulista";

       $aSelect['title'] = "cantidadModulistas";

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start'] = "convert(char(23),rangoInicial,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start'] = "str_replace(convert(char(10),rangoInicial,102), '.', '-') + ' ' + convert(char(8),rangoInicial,20)";
       }
       else
       {
           $aSelect['start'] = "rangoInicial";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end'] = "convert(char(23),rangoFinal,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end'] = "str_replace(convert(char(10),rangoFinal,102), '.', '-') + ' ' + convert(char(8),rangoFinal,20)";
       }
       else
       {
           $aSelect['end'] = "rangoFinal";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start_time'] = "convert(char(8),horaInicio,108)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start_time'] = "str_replace(convert(char(10),horaInicio,102), '.', '-') + ' ' + convert(char(8),horaInicio,20)";
       }
       else
       {
           $aSelect['start_time'] = "horaInicio";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end_time'] = "convert(char(8),horaFin,108)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end_time'] = "str_replace(convert(char(10),horaFin,102), '.', '-') + ' ' + convert(char(8),horaFin,20)";
       }
       else
       {
           $aSelect['end_time'] = "horaFin";
       }

       $aSelect['event_color'] = "event_color";

       $aSelect['category'] = "category";

       $aSelect['recurrence'] = "reaparicion";
       $aSelect['period'] = "periodo";
       $aSelect['recur_info'] = "recur_info";

       if ($googleInfo) {
           $aSelect['google_calendar'] = "id_api";
           $aSelect['google_event'] = "id_event_google";
       }

       return $aSelect;
   } // calendarFetchSelect

   function calendarWhere($sId, $bRecur, $bPrintCalendar = false, $filter = null)
   {
       if ('' != $sId)
       {
           return " WHERE idasignacionModulista = '" . $sId . "'";
       }

       $aWhere = array();

       if (null === $filter) {
           $sStart      = isset($_GET['start'])    && '' != $_GET['start']    ? $_GET['start']    : '';
           $sEnd        = isset($_GET['end'])      && '' != $_GET['end']      ? $_GET['end']      : '';
           $sCategory   = isset($_GET['category']) && '' != $_GET['category'] ? $_GET['category'] : '';

           if ('' != $sStart && '' != $sEnd)
           {
               $s_Ini_StartFormat = $sStart;
               $s_Ini_EndFormat   = $sEnd;
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
               {
                   $aWhere[] = "convert(char(23),rangoInicial,121) >= '" . $s_Ini_StartFormat . "' AND convert(char(23),rangoInicial,121) <= '" . $s_Ini_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
               {
                   $aWhere[] = "str_replace(convert(char(10),rangoInicial,102), '.', '-') + ' ' + convert(char(8),rangoInicial,20) >= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),rangoInicial,102), '.', '-') + ' ' + convert(char(8),rangoInicial,20) <= '" . $s_Ini_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
               {
                   $aWhere[] = "rangoInicial >= #" . $s_Ini_StartFormat . "# AND rangoInicial <= #" . $s_Ini_EndFormat . "#";
               }
               else
               {
                   $aWhere[] = "rangoInicial >= '" . $s_Ini_StartFormat . "' AND rangoInicial <= '" . $s_Ini_EndFormat . "'";
               }

               if (!$bPrintCalendar)
               {
                   $s_Fin_StartFormat = date('Y-m-d', $sStart);
                   $s_Fin_EndFormat   = date('Y-m-d', $sEnd);
               }
               else
               {
                   $s_Fin_StartFormat = $sStart;
                   $s_Fin_EndFormat   = $sEnd;
               }
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
               {
                   $aWhere[] = "convert(char(23),rangoFinal,121) >= '" . $s_Fin_StartFormat . "' AND convert(char(23),rangoFinal,121) <= '" . $s_Fin_EndFormat . "'";
                   $aWhere[] = "convert(char(23),rangoInicial,121) <= '" . $s_Ini_StartFormat . "' AND convert(char(23),rangoFinal,121) >= '" . $s_Fin_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
               {
                   $aWhere[] = "str_replace(convert(char(10),rangoFinal,102), '.', '-') + ' ' + convert(char(8),rangoFinal,20) >= '" . $s_Fin_StartFormat . "' AND str_replace(convert(char(10),rangoFinal,102), '.', '-') + ' ' + convert(char(8),rangoFinal,20) <= '" . $s_Fin_EndFormat . "'";
                   $aWhere[] = "str_replace(convert(char(10),rangoInicial,102), '.', '-') + ' ' + convert(char(8),rangoInicial,20) <= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),rangoFinal,102), '.', '-') + ' ' + convert(char(8),rangoFinal,20) >= '" . $s_Fin_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
               {
                   $aWhere[] = "rangoFinal >= #" . $s_Fin_StartFormat . "# AND rangoFinal <= #" . $s_Fin_EndFormat . "#";
                   $aWhere[] = "rangoInicial <= #" . $s_Ini_StartFormat . "# AND rangoFinal >= #" . $s_Fin_EndFormat . "#";
               }
               else
               {
                   $aWhere[] = "rangoFinal >= '" . $s_Fin_StartFormat . "' AND rangoFinal <= '" . $s_Fin_EndFormat . "'";
                   $aWhere[] = "rangoInicial <= '" . $s_Ini_StartFormat . "' AND rangoFinal >= '" . $s_Fin_EndFormat . "'";
               }
           }

           $aFinal = array('(' . implode(') OR (', $aWhere) . ')');
           $aFinal[] = "reaparicion " . ($bRecur ? "=" : "<>") . " 'Y'";
       }
       else {
           $aRules = array();
           if (!$filter['_sc_evt_all'] && $filter['_sc_evt_empty']) {
               $aRules[] = "id_api = ''";
           }
           if (!$filter['_sc_evt_all'] && $filter['_sc_evt_google']) {
               $aRules[] = "id_api = '" . $_POST['sc_calendar_id'] . "'";
           }

           $aFinal = !empty($aRules) ? array('(' . implode(') OR (', $aRules) . ')') : array();
       }

       $cWhere = array();
       $sc_where_filter = '';
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form'])
       {
           $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'])
       {
           if (empty($sc_where_filter))
           {
               $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'];
           }
           else
           {
               $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'] . ")";
           }
       }
       $cWhere[] = $sc_where_filter;
       $wUsr     = $this->returnWhere($cWhere);
       if (!empty($wUsr))
       {
           $aFinal[] = substr(trim($wUsr), 5);
       }

       return empty($aFinal) ? '' : ' WHERE (' . implode(') AND (', $aFinal) . ')';
   } // calendarWhere

    function calendarRecurrentDay(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'daily')
        );
    } // calendarRecurrentDay

    function calendarRecurrentWeek(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'weekly')
        );
    } // calendarRecurrentWeek

    function calendarRecurrentMonth(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'monthly')
        );
    } // calendarRecurrentMonth

    function calendarRecurrentYear(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'yearly')
        );
    } // calendarRecurrentYear

    function calendarRecurrence(&$eventsToDisplay, $thisEvent, $params) {
        if (isset($thisEvent['recur_info'])) {
            switch ($thisEvent['recur_info']->endon) {
                case 'N': // never
                    $this->calendarRecurrenceNever($eventsToDisplay, $thisEvent, $params);
                    return;

                case 'A': // after X occurrences
                    $this->calendarRecurrenceAfterOccurrences($eventsToDisplay, $thisEvent, $params);
                    return;

                case 'I': // in X date
                    $this->calendarRecurrenceInDate($eventsToDisplay, $thisEvent, $params);
                    return;
            }
        }

        $this->calendarRecurrenceOnEvent($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrence

    function calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, $period) {
        $startTimestamp = $this->calendarStartToTimestamp($thisEvent);
        $startDate      = date('Ymd', $startTimestamp);
        $startTime      = date('His', $startTimestamp);

        $endTimestamp = $this->calendarEndToTimestamp($thisEvent);
        if (false === $endTimestamp) {
            $endTimestamp = $startTimestamp;
        }
        $endDate = date('Ymd', $endTimestamp);
        $endTime = date('His', $endTimestamp);

        $params = array(
            'displayStartDate' => $calendarDisplayStart,
            'displayEndDate'   => $calendarDisplayEnd,
            'startDate'        => $startDate,
            'startTime'        => $startTime,
            'endDate'          => $endDate,
            'testEndDate'      => $endDate,
            'endTime'          => $endTime,
            'period'           => $period,
            'repeat'           => !isset($thisEvent['recur_info']) ? 1  : $thisEvent['recur_info']->repeat,
            'endafter'         => !isset($thisEvent['recur_info']) ? '' : $thisEvent['recur_info']->endafter,
            'endin'            => !isset($thisEvent['recur_info']) ? '' : str_replace('-', '', $thisEvent['recur_info']->endin),
            'daysToAdd'        => array(),
            'forceEndToStart'  => false
        );

        if (isset($thisEvent['recur_info']) && 'weekly' == $period && '' != $thisEvent['recur_info']->repeatin) {
            $params['daysToAdd'] = explode(';', $thisEvent['recur_info']->repeatin);
        }

        return $params;
    } // calendarRecurrenceParams

    function calendarRecurrenceOnEvent(&$eventsToDisplay, $thisEvent, $params) {
        $params['endafter']        = 0;
        $params['forceEndToStart'] = true;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceOnEvent

    function calendarRecurrenceNever(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate']  = $params['displayEndDate'];
        $params['endafter'] = 0;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceNever

    function calendarRecurrenceAfterOccurrences(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate'] = $params['displayEndDate'];

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceAfterOccurrences

    function calendarRecurrenceInDate(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate']  = $params['endin'];
        $params['endafter'] = 0;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceInDate

    function calendarRecurrenceGetEvents(&$eventsToDisplay, $thisEvent, $params) {
    $params['displayStartDate'] = $this->calendarGetDateOnly($params['displayStartDate']);
    $params['displayEndDate']   = $this->calendarGetDateOnly($params['displayEndDate']);
    $params['startDate']        = $this->calendarGetDateOnly($params['startDate']);
    $params['endDate']          = $this->calendarGetDateOnly($params['endDate']);

        $thisStartDate  = $params['startDate'];
        $thisEndDate    = $params['testEndDate'];
        $periodCount    = 1;
        $skip           = 0;
        $occurences     = 0;
        $daysCorrection = array('SU' => 0, 'MO' => 1, 'TU' => 2, 'WE' => 3, 'TH' => 4, 'FR' => 5, 'SA' => 6);

        while ($thisStartDate < $params['displayEndDate']) {
            if ($thisStartDate <= $params['endDate']) {
                $addEvent = true;

                if (1 < $params['repeat']) {
                    $skip++;

                    if (1 < $skip) {
                        if ($skip == $params['repeat']) {
                            $skip  = 0;
                        }

                        $addEvent = false;
                    }
                }

                if ($addEvent) {
                    // add date only
                    if (empty($params['daysToAdd'])) {
                        if ($params['displayStartDate'] <= $thisStartDate) {
                            $newEvent = $thisEvent;
                            $this->calendarTimestampToStart($newEvent, $this->calendarGetMktime($thisStartDate, $params['startTime']), $newEvent['allDay']);
                            if ($params['forceEndToStart']) {
                                $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($thisStartDate, $params['endTime']), $newEvent['allDay']);
                            }
                            else {
                                $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($thisEndDate, $params['endTime']), $newEvent['allDay']);
                            }

                            $eventsToDisplay[] = $newEvent;
                        }

                        $occurences++;

                        if (0 < $params['endafter'] && $occurences >= $params['endafter']) {
                            break;
                        }
                    }
                    // add specific week days based on date
                    else {
                        $diffToSunday = date('w', strtotime($thisStartDate));
                        $sundayDate   = $this->calendarRecurrentAddDay($thisStartDate, $diffToSunday * -1);

                        foreach ($params['daysToAdd'] as $newDay) {
                            $newDate = $this->calendarRecurrentAddDay($sundayDate, $daysCorrection[$newDay]);

                            if ($params['displayEndDate'] > $newDate && $newDate <= $params['endDate']) {
                                if ($params['displayStartDate'] <= $newDate) {
                                    $newEvent = $thisEvent;
                                    $this->calendarTimestampToStart($newEvent, $this->calendarGetMktime($newDate, $params['startTime']), $newEvent['allDay']);
                                    $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($newDate, $params['endTime']), $newEvent['allDay']);

                                    $eventsToDisplay[] = $newEvent;
                                }

                                $occurences++;

                                if (0 < $params['endafter'] && $occurences >= $params['endafter']) {
                                    break 2;
                                }
                            }
                        }
                    }
                }
            }

            $this->calendarRecurrenceAddPeriod($params['period'], $periodCount, $thisStartDate, $thisEndDate, $params['startDate'], $params['testEndDate']);

            $periodCount++;
        }
    } // calendarRecurrenceGetEvents

    function calendarGetDateOnly($date) {
    if (false !== strpos($date, 'T')) {
      $parts = explode('T', $date);
      return $parts[0];
    }

    return $date;
    } // calendarGetDateOnly

    function calendarRecurrenceAddPeriod($period, $periodCount, &$thisStart, &$thisEnd, $start, $end) {
        switch ($period) {
            case 'daily':
                $thisStart = $this->calendarRecurrentAddDay($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddDay($end, $periodCount);
                break;

            case 'weekly':
                $thisStart = $this->calendarRecurrentAddDay($start, $periodCount * 7);
                $thisEnd   = $this->calendarRecurrentAddDay($end, $periodCount * 7);
                break;

            case 'monthly':
                $thisStart = $this->calendarRecurrentAddMonth($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddMonth($end, $periodCount);
                break;

            case 'yearly':
                $thisStart = $this->calendarRecurrentAddYear($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddYear($end, $periodCount);
                break;
        }
    } // calendarRecurrenceAddPeriod

   function calendarRecurrentAddDay($sDate, $iAdd)
   {
       $iDate = $this->calendarGetMktime($sDate, '000000', $iAdd);

       return date('Ymd', $iDate);
   } // calendarRecurrentAddDay

   function calendarRecurrentAddMonth($sDate, $iAdd)
   {
       $iYear  = (integer) substr($sDate, 0, 4);
       $iMonth = (integer) substr($sDate, 4, 2) + $iAdd;
       $iDay   = (integer) substr($sDate, 6, 2);

       while (12 < $iMonth)
       {
           $iMonth -= 12;
           $iYear++;
       }

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 28 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (2 == $iMonth && $this->calendarIsLeapYear($iYear) && 29 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (in_array($iMonth, array(4, 6, 9, 11)) && 31 == $iDay)
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . '30';
       }
       else
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . substr($sDate, 6);
       }

       return $sDate;
   } // calendarRecurrentAddMonth

   function calendarRecurrentAddYear($sDate, $iAdd)
   {
       $iYear  = substr($sDate, 0, 4) + $iAdd;
       $iMonth = (integer) substr($sDate, 4, 2);
       $iDay   = (integer) substr($sDate, 6, 2);

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 29 == $iDay)
       {
           $sDate = $iYear . '0228';
       }
       else
       {
           $sDate = $iYear . substr($sDate, 4);
       }

       return $sDate;
   } // calendarRecurrentAddYear

   function calendarIsLeapYear(&$iYear)
   {
       if ($iYear % 4 != 0)
       {
           return false;
       }
       else
       {
           if ($iYear % 100 != 0)
           {
               return true;
           }
           else
           {
               if ($iYear % 400 != 0)
               {
                   return false;
               }
               else
               {
                   return true;
               }
           }
       }
   } // calendarIsLeapYear

   function calendarHandleEvents($aEvents)
   {
       foreach ($aEvents as $i => $aEventData)
       {
           if (false !== strpos($aEventData['start'], ' '))
           {
               $aTemp               = explode(' ', $aEventData['start']);
               $aEventData['start'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['start_time'], ' '))
           {
               $aTemp                    = explode(' ', $aEventData['start_time']);
               $aEventData['start_time'] = $aTemp[1];
           }
           if (8 < strlen($aEventData['start_time']))
           {
               $aEventData['start_time'] = substr($aEventData['start_time'], 0, 8);
           }
           if (false !== strpos($aEventData['end'], ' '))
           {
               $aTemp             = explode(' ', $aEventData['end']);
               $aEventData['end'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['end_time'], ' '))
           {
               $aTemp                  = explode(' ', $aEventData['end_time']);
               $aEventData['end_time'] = $aTemp[1];
           }
           if (8 < strlen($aEventData['end_time']))
           {
               $aEventData['end_time'] = substr($aEventData['end_time'], 0, 8);
           }

           $aEvents[$i] = $aEventData;
       }

       return $aEvents;
   } // calendarHandleEvents

   function calendarNormalizeEvents($aEvents)
   {
       $aEvents = $this->calendarHandleEvents($aEvents);

       foreach ($aEvents as $i => $aEventData)
       {
           if ((isset($aEventData['id']) && '' == $aEventData['id']) || (isset($aEventData['title']) && '' == $aEventData['title']) || (isset($aEventData['start']) && '' == $aEventData['start']))
           {
               unset($aEvents[$i]);
           }
           else
           {

               $bStartTime = false;
               $bEndTime   = false;

               if (isset($aEventData['start_time']) && '' == $aEventData['start_time'])
               {
                   unset($aEventData['start_time']);
               }

               if (isset($aEventData['end']) && '' == $aEventData['end'])
               {
                   unset($aEventData['end']);
                   unset($aEventData['end_time']);
               }
               elseif (isset($aEventData['end_time']) && '' == $aEventData['end_time'])
               {
                   unset($aEventData['end_time']);
               }

               if ((isset($aEventData['start_time']) && ('' == $aEventData['start_time'] || '00:00:00' == $aEventData['start_time'])) && (isset($aEventData['end_time']) && ('' == $aEventData['end_time'] || '00:00:00' == $aEventData['end_time'])))
               {
                   unset($aEventData['start_time']);
                   unset($aEventData['end_time']);
               }


               if (isset($aEventData['start']) && isset($aEventData['start_time']))
               {
                   $aEventData['start'] .= ' ' . $aEventData['start_time'];
                   unset($aEventData['start_time']);
                   $bStartTime = true;
               }
               if (isset($aEventData['end']) && isset($aEventData['end_time']))
               {
                   $aEventData['end'] .= ' ' . $aEventData['end_time'];
                   unset($aEventData['end_time']);
                   $bEndTime = true;
               }

               if ($bStartTime)
               {
                   $aEventData['allDay'] = false;
               }
               else
               {
                   $aEventData['allDay'] = true;
               }

               if ($aEventData['allDay'] && isset($aEventData['end']) && '' != $aEventData['end'] && $aEventData['start'] < $aEventData['end'])
               {
                   $mktime = mktime(0, 0, 0,
                       (integer) substr($aEventData['end'], 5, 2),
                       ((integer) substr($aEventData['end'], 8, 2)) + 1,
                       (integer) substr($aEventData['end'], 0, 4));
                   $aEventData['end'] = date('Y-m-d', $mktime);
               }

               $aEvents[$i] = $aEventData;
           }
       }

       return $aEvents;
   } // calendarNormalizeEvents

   function calendarPrintEvents($aEvents)
   {
       $aEventHtml = array();
       $sPrintHtml = '';
       $sLastDay   = '';

       $sPrintHtml .= "<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\n";
       $sPrintHtml .= "<head>\n";
       $sPrintHtml .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar.css\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" />\n";
       $sPrintHtml .= "<style type=\"text/css\">\n";
       $sPrintHtml .= ".sc-ui-cal-time { padding-left: 20px }\n";
       $sPrintHtml .= ".sc-ui-cal-event { padding-left: 35px }\n";
       $sPrintHtml .= "</style>\n";
       $sPrintHtml .= "</head>\n";
       $sPrintHtml .= "<body>\n";

       $sPrintHtml .= "" . $this->Ini->Nm_lang['lang_events_order'] . "<hr style=\"border-style: solid; border-width: 1px 0 0 0\"/><br />\n";
       foreach ($this->calendarPrintSort($aEvents) as $aEventData)
       {
           $aStartInfo = explode(' ', $aEventData['start']);
           $aEndInfo   = explode(' ', $aEventData['end']);
           if (!isset($aStartInfo[1]))
           {
               $aStartInfo[1] = '';
           }
           if (!isset($aEndInfo[1]))
           {
               $aEndInfo[1] = '';
           }

           $sEventHtml = '';

           if ('' == $sLastDay || $aStartInfo[0] != $sLastDay)
           {
               $sEventHtml .= '<div class="scCalendarPrintDate">' . sc_convert_encoding($this->calendarPrintFormatDate($aStartInfo[0]), 'UTF-8', $_SESSION['scriptcase']['charset']) . "</div>\n";
               $sLastDay = $aStartInfo[0];
           }
           $sEventHtml .= '<div class="scCalendarPrintTime sc-ui-cal-time">';
           if ('' == $aStartInfo[1])
           {
               $sEventHtml .= sc_convert_encoding($this->Ini->Nm_lang['lang_per_allday'], 'UTF-8', $_SESSION['scriptcase']['charset']);
           }
           elseif ($aEventData['start'] == $aEventData['end'])
           {
               $sEventHtml .= $aStartInfo[1];
           }
           else
           {
               $sEventHtml .= $aStartInfo[1] . ' ' . sc_convert_encoding($this->Ini->Nm_lang['lang_othr_txto'], 'UTF-8', $_SESSION['scriptcase']['charset']) . ' ' . $aEndInfo[1];
           }
           $sEventHtml .= "</div>\n";
           $sEventHtml .= '<div class="scCalendarPrintEvent sc-ui-cal-event">';
           $sEventHtml .= $aEventData['title'];
           $sEventHtml .= "</div>\n";

           $aEventHtml[] = $sEventHtml;
       }

       $sPrintHtml .= implode('<br />', $aEventHtml);

       $sPrintHtml .= "</body>\n";
       $sPrintHtml .= "</html>\n";

       $sTmpFile  = $this->Ini->path_imag_temp . '/sc_cal_print' . md5(session_id() . microtime()) . '.html';
       $rHtmlFile = @fopen($this->Ini->root . $sTmpFile, 'w');
       if ($rHtmlFile)
       {
           @fwrite($rHtmlFile, $sPrintHtml);
           @fclose($rHtmlFile);
           return array('outputFormat' => 'file', 'fileHtml' => $sTmpFile);
       }
       else
       {
           return array('outputFormat' => 'html', 'printHtml' => $sPrintHtml);
       }
   } // calendarPrintEvents

   function calendarPrintSort($aEvents)
   {
       $aUnsortedEvents = array();
       $aSortedEvents   = array();

       foreach ($aEvents as $aEventData)
       {
           if (!isset($aUnsortedEvents[ $aEventData['start'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ] = array();
           }
           if (!isset($aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ] = array();
           }
           $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ][] = $aEventData;
       }

       ksort($aUnsortedEvents);
       foreach ($aUnsortedEvents as $aEventsEnd)
       {
           ksort($aEventsEnd);
           foreach ($aEventsEnd as $aEventList)
           {
               foreach ($aEventList as $aEventData)
               {
                   $aSortedEvents[] = $aEventData;
               }
           }
       }

       return $aSortedEvents;
   } // calendarPrintSort

   function calendarPrintFormatDate($sDate)
   {
       $aDateTime     = explode(' ', $sDate);
       $aDateParts    = explode('-', $aDateTime[0]);
       $iMktime       = mktime(0, 0, 0, $aDateParts[1], $aDateParts[2], $aDateParts[0]);
       $sFormatString = "l, F j";
       $sFormatted    = '';
       $bSlash        = false;

       for ($i = 0; $i < strlen($sFormatString); $i++)
       {
           $sFormatChar = $sFormatString[$i];
           if (!$bSlash && "\\" == $sFormatChar)
           {
               $bSlash = true;
           }
           elseif ($bSlash)
           {
               $bSlash      = false;
               $sFormatChar = "\\" . $sFormatString[$i];
           }
           if ($bSlash)
           {
               continue;
           }
           elseif ('D' == $sFormatChar || 'l' == $sFormatChar)
           {
               $sWeekDay = date('w', $iMktime);
               $sShort   = 'D' == $sFormatChar ? 'shrt_' : '';
               switch ($sWeekDay)
               {
                   case '0':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '1':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           elseif ('F' == $sFormatChar || 'M' == $sFormatChar)
           {
               $sShort = 'M' == $sFormatChar ? 'shrt_' : '';
               switch ($aDateParts[1])
               {
                   case '1':
                   case '01':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                   case '02':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                   case '03':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                   case '04':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                   case '05':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                   case '06':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '7':
                   case '07':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '8':
                   case '08':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '9':
                   case '09':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '10':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '11':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '12':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           else
           {
               $sFormatted .= date($sFormatChar, $iMktime);
           }
       }

       return $sFormatted;
   } // calendarPrintFormatDate

   function calendarUpdateEvent($sOp, $sId, $iDays, $iMinutes, $bAllDay, $fullcalendarStart, $fullcalendarEnd)
   {
       $aEvents = $this->calendarFetchEvents($sId);
       if (1 != sizeof($aEvents))
       {
           return array('status' => false, 'message' => 'Erro ao recuperar informacoes do evento');
       }
       $aEvent = $aEvents[0];

       $iStart = $this->calendarStartToTimestamp($aEvent);
       $iEnd   = $this->calendarEndToTimestamp($aEvent);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data inicial');
       }
       elseif (false === $iEnd)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data final');
       }

       if ('move' == $sOp) {
           $iStart += ($iDays * 86400) + ($iMinutes * 60);
       }
       $iEnd += ($iDays * 86400) + ($iMinutes * 60);

       $this->calendarTimestampToStart($aEvent, $iStart, $bAllDay);
       $this->calendarTimestampToEnd($aEvent, $iEnd, $bAllDay);

       if ('' == $aEvent['start'])
       {
           $aEvent['start'] = 'null';
       }
       if ('' == $aEvent['start_time'])
       {
           $aEvent['start_time'] = 'null';
       }
       if ('' == $aEvent['end'])
       {
           $aEvent['end'] = 'null';
       }
       if ('' == $aEvent['end_time'])
       {
           $aEvent['end_time'] = 'null';
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET rangoInicial = #" . $aEvent['start'] . "#, horaInicio = #" . $aEvent['start_time'] . "#, rangoFinal = #" . $aEvent['end'] . "#, horaFin = #" . $aEvent['end_time'] . "#" . $this->calendarWhere($sId);
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET rangoInicial = EXTEND(rangoInicial, YEAR TO FRACTION), rangoFinal = EXTEND(rangoFinal, YEAR TO FRACTION)" . $this->calendarWhere($sId);
       }
       else
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET rangoInicial = '" . $aEvent['start'] . "', horaInicio = '" . $aEvent['start_time'] . "', rangoFinal = '" . $aEvent['end'] . "', horaFin = '" . $aEvent['end_time'] . "'" . $this->calendarWhere($sId);
       }

       $sSql = str_replace(array('#null#', "'null'"), array('null', 'null'), $sSql);

       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na atualizacao do evento');
       }

       $aReturn = array('status' => true, 'message' => '');

       if ($aEvent['start_only'] < date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorPast'];
       }
       elseif ($aEvent['start_only'] > date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorFuture'];
       }
       else
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorToday'];
       }

       return $aReturn;
   } // calendarUpdateEvent

   function calendarStartToTimestamp($aEvent)
   {
       if (!isset($aEvent['start']) || '' == $aEvent['start'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['start'], 0, 4);
       $iMonth = (integer) substr($aEvent['start'], 5, 2);
       $iDay   = (integer) substr($aEvent['start'], 8, 2);

       if (!isset($aEvent['start_time']) || '' == $aEvent['start_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['start_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['start_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['start_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarEndToTimestamp($aEvent)
   {
       if (!isset($aEvent['end']) || '' == $aEvent['end'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['end'], 0, 4);
       $iMonth = (integer) substr($aEvent['end'], 5, 2);
       $iDay   = (integer) substr($aEvent['end'], 8, 2);

       if (!isset($aEvent['end_time']) || '' == $aEvent['end_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['end_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['end_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['end_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarEndToTimestamp

   function calendarFullcalendarToTimestamp($dateTime)
   {
       $iYear   = (integer) substr($dateTime, 0, 4);
       $iMonth  = (integer) substr($dateTime, 5, 2);
       $iDay    = (integer) substr($dateTime, 8, 2);
       $iHour   = (integer) substr($dateTime, 11, 2);
       $iMinute = (integer) substr($dateTime, 14, 2);
       $iSecond = (integer) substr($dateTime, 17, 2);

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarTimestampToStart(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['start_only'] = date('Y-m-d', $iTimestamp);
       $aEvent['start']      = date('Y-m-d', $iTimestamp);
       $aEvent['start_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToStart

   function calendarTimestampToEnd(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['end']      = date('Y-m-d', $iTimestamp);
       $aEvent['end_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToEnd

   function calendarGetMktime($sDate, $sTime, $iAddDay = 0)
   {
       return mktime( (integer) substr($sTime, 0, 2),
                      (integer) substr($sTime, 2, 2),
                      (integer) substr($sTime, 4, 2),
                      (integer) substr($sDate, 4, 2),
                     ((integer) substr($sDate, 6, 2)) + $iAddDay,
                      (integer) substr($sDate, 0, 4));
   } // calendarGetMktime

   function calendarDragDrop()
   {
       return $this->calendarUpdateEvent('move', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, 'true' == $this->sc_all_day, $this->sc_fullcal_start, $this->sc_fullcal_end);
   } // calendarDragDrop

   function calendarResize()
   {
       return $this->calendarUpdateEvent('resize', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, false, $this->sc_fullcal_start, $this->sc_fullcal_end);
   } // calendarDragDrop

   function calendarRemoveTime(&$iTimestamp)
   {
       $iTimestamp = mktime(0, 0, 0, date('m', $iTimestamp), date('d', $iTimestamp), date('Y', $iTimestamp));
   } // calendarRemoveTime

   function calendarInitTimestamp()
   {
       $aDate = explode('-', $this->sc_cal_click_date);
       $aTime = 'true' == $this->sc_cal_click_allday ? array(0, 0, 0) : explode(':', $this->sc_cal_click_time);

       $iInit = mktime($aTime[0], $aTime[1], $aTime[2], $aDate[1], $aDate[2], $aDate[0]);
       $iEnd  = 'true' == $this->sc_cal_click_allday ? $iInit : $iInit + 7200;

       return array($iInit, $iEnd);
   } // calendarInitTimestamp

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_idtipodemodulista()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista'] = array(); 
    }

   $old_value_cantidadmodulistas = $this->cantidadmodulistas;
   $old_value_fecharegistro = $this->fecharegistro;
   $old_value_fecharegistro_hora = $this->fecharegistro_hora;
   $old_value_fechamodificacion = $this->fechamodificacion;
   $old_value_rangoinicial = $this->rangoinicial;
   $old_value_rangofinal = $this->rangofinal;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidadmodulistas = $this->cantidadmodulistas;
   $unformatted_value_fecharegistro = $this->fecharegistro;
   $unformatted_value_fecharegistro_hora = $this->fecharegistro_hora;
   $unformatted_value_fechamodificacion = $this->fechamodificacion;
   $unformatted_value_rangoinicial = $this->rangoinicial;
   $unformatted_value_rangofinal = $this->rangofinal;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idtipodeModulista, tipoModulista  FROM tipodemodulista  ORDER BY tipoModulista";

   $this->cantidadmodulistas = $old_value_cantidadmodulistas;
   $this->fecharegistro = $old_value_fecharegistro;
   $this->fecharegistro_hora = $old_value_fecharegistro_hora;
   $this->fechamodificacion = $old_value_fechamodificacion;
   $this->rangoinicial = $old_value_rangoinicial;
   $this->rangofinal = $old_value_rangofinal;
   $this->horainicio = $old_value_horainicio;
   $this->horafin = $old_value_horafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['Lookup_idtipodemodulista'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_CALEN_MODULISTA_DESPACHO_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['total'] = $qt_geral_reg_CALEN_MODULISTA_DESPACHO_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "idasignacionmodulista";$nm_numeric[] = "cantidadmodulistas";$nm_numeric[] = "idtipodemodulista";$nm_numeric[] = "category";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['rangoinicial'] = "datetime";$Nm_datas['rangofinal'] = "datetime";$Nm_datas['fecharegistro'] = "datetime";$Nm_datas['fechamodificacion'] = "datetime";$Nm_datas['horainicio'] = "time";$Nm_datas['horafin'] = "time";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "CALEN_MODULISTA_DESPACHO_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "CALEN_MODULISTA_DESPACHO_mob_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       CALEN_MODULISTA_DESPACHO_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO_mob']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
