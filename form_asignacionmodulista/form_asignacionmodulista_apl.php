<?php
//
class form_asignacionmodulista_apl
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
                                'navSummary'        => array(),
                                'navPage'           => array(),
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
   var $rangoinicial_hora;
   var $rangofinal;
   var $rangofinal_hora;
   var $fecharegistro;
   var $fechamodificacion;
   var $idtipodemodulista;
   var $idtipodemodulista_1;
   var $inicio;
   var $inicio_hora;
   var $fin;
   var $fin_hora;
   var $horainicio;
   var $horafin;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
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
   var $is_calendar_app = false;
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
          if (isset($this->NM_ajax_info['param']['fin']))
          {
              $this->fin = $this->NM_ajax_info['param']['fin'];
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
          if (isset($this->NM_ajax_info['param']['inicio']))
          {
              $this->inicio = $this->NM_ajax_info['param']['inicio'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
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
      if (isset($_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['embutida_parms']);
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
                 nm_limpa_str_form_asignacionmodulista($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->rangoinicial);
          $this->rangoinicial      = $aDtParts[0];
          $this->rangoinicial_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->rangofinal);
          $this->rangofinal      = $aDtParts[0];
          $this->rangofinal_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->inicio);
          $this->inicio      = $aDtParts[0];
          $this->inicio_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fin);
          $this->fin      = $aDtParts[0];
          $this->fin_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_asignacionmodulista_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_asignacionmodulista']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_asignacionmodulista']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_asignacionmodulista'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_asignacionmodulista']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_asignacionmodulista']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_asignacionmodulista') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_asignacionmodulista']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - asignacionmodulista";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_asignacionmodulista")
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



      $_SESSION['scriptcase']['error_icon']['form_asignacionmodulista']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_asignacionmodulista'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_asignacionmodulista']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_asignacionmodulista'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_asignacionmodulista'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dados_form'];
          if (!isset($this->fecharegistro)){$this->fecharegistro = $this->nmgp_dados_form['fecharegistro'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_asignacionmodulista", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
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
              include_once($this->Ini->path_embutida . 'form_asignacionmodulista/form_asignacionmodulista_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_asignacionmodulista_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_asignacionmodulista_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_asignacionmodulista_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_asignacionmodulista/form_asignacionmodulista_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_asignacionmodulista_erro.class.php"); 
      }
      $this->Erro      = new form_asignacionmodulista_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opcao']))
         { 
             if ($this->idasignacionmodulista != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_asignacionmodulista']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->idasignacionmodulista)) { $this->nm_limpa_alfa($this->idasignacionmodulista); }
      if (isset($this->cantidadmodulistas)) { $this->nm_limpa_alfa($this->cantidadmodulistas); }
      if (isset($this->idtipodemodulista)) { $this->nm_limpa_alfa($this->idtipodemodulista); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idasignacionmodulista
      $this->field_config['idasignacionmodulista']               = array();
      $this->field_config['idasignacionmodulista']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idasignacionmodulista']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idasignacionmodulista']['symbol_dec'] = '';
      $this->field_config['idasignacionmodulista']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idasignacionmodulista']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cantidadmodulistas
      $this->field_config['cantidadmodulistas']               = array();
      $this->field_config['cantidadmodulistas']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidadmodulistas']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidadmodulistas']['symbol_dec'] = '';
      $this->field_config['cantidadmodulistas']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidadmodulistas']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- rangoinicial
      $this->field_config['rangoinicial']                 = array();
      $this->field_config['rangoinicial']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['rangoinicial']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['rangoinicial']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['rangoinicial']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DH', 'rangoinicial');
      //-- rangofinal
      $this->field_config['rangofinal']                 = array();
      $this->field_config['rangofinal']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['rangofinal']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['rangofinal']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['rangofinal']['date_display'] = "ddmmaaaa;hh";
      $this->new_date_format('DH', 'rangofinal');
      //-- fechamodificacion
      $this->field_config['fechamodificacion']                 = array();
      $this->field_config['fechamodificacion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechamodificacion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechamodificacion']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechamodificacion');
      //-- inicio
      $this->field_config['inicio']                 = array();
      $this->field_config['inicio']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['inicio']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['inicio']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['inicio']['date_display'] = "ddmmaaaa;hh";
      $this->new_date_format('DH', 'inicio');
      //-- fin
      $this->field_config['fin']                 = array();
      $this->field_config['fin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fin']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fin']['date_display'] = "ddmmyyyy;hhiiss";
      $this->new_date_format('DH', 'fin');
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
      //-- fecharegistro
      $this->field_config['fecharegistro']                 = array();
      $this->field_config['fecharegistro']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecharegistro']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecharegistro']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecharegistro');
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
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_idasignacionmodulista' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idasignacionmodulista');
          }
          if ('validate_cantidadmodulistas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidadmodulistas');
          }
          if ('validate_rangoinicial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rangoinicial');
          }
          if ('validate_rangofinal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rangofinal');
          }
          if ('validate_fechamodificacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechamodificacion');
          }
          if ('validate_idtipodemodulista' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idtipodemodulista');
          }
          if ('validate_inicio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'inicio');
          }
          if ('validate_fin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fin');
          }
          if ('validate_horainicio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'horainicio');
          }
          if ('validate_horafin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'horafin');
          }
          form_asignacionmodulista_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_inicio_onblur' == $this->NM_ajax_opcao)
          {
              $this->inicio_onBlur();
          }
          form_asignacionmodulista_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_asignacionmodulista_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_asignacionmodulista']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_asignacionmodulista_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_asignacionmodulista_pack_ajax_response();
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
          form_asignacionmodulista_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_asignacionmodulista.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - asignacionmodulista") ?></TITLE>
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
<form name="Fdown" method="get" action="form_asignacionmodulista_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_asignacionmodulista"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
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
           case 'idasignacionmodulista':
               return "Idasignacion Modulista";
               break;
           case 'cantidadmodulistas':
               return "Cantidad Modulistas";
               break;
           case 'rangoinicial':
               return "Rango Inicial";
               break;
           case 'rangofinal':
               return "Rango Final";
               break;
           case 'fechamodificacion':
               return "Fecha Modificacion";
               break;
           case 'idtipodemodulista':
               return "Tipo de Modulista";
               break;
           case 'inicio':
               return "inicio";
               break;
           case 'fin':
               return "fin";
               break;
           case 'horainicio':
               return "Hora Inicio";
               break;
           case 'horafin':
               return "Hora Fin";
               break;
           case 'fecharegistro':
               return "Fecha Registro";
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
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_asignacionmodulista']) || !is_array($this->NM_ajax_info['errList']['geral_form_asignacionmodulista']))
              {
                  $this->NM_ajax_info['errList']['geral_form_asignacionmodulista'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_asignacionmodulista'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'idasignacionmodulista' == $filtro)
        $this->ValidateField_idasignacionmodulista($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cantidadmodulistas' == $filtro)
        $this->ValidateField_cantidadmodulistas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rangoinicial' == $filtro)
        $this->ValidateField_rangoinicial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rangofinal' == $filtro)
        $this->ValidateField_rangofinal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fechamodificacion' == $filtro)
        $this->ValidateField_fechamodificacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idtipodemodulista' == $filtro)
        $this->ValidateField_idtipodemodulista($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'inicio' == $filtro)
        $this->ValidateField_inicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fin' == $filtro)
        $this->ValidateField_fin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'horainicio' == $filtro)
        $this->ValidateField_horainicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'horafin' == $filtro)
        $this->ValidateField_horafin($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_idasignacionmodulista(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idasignacionmodulista === "" || is_null($this->idasignacionmodulista))  
      { 
          $this->idasignacionmodulista = 0;
      } 
      nm_limpa_numero($this->idasignacionmodulista, $this->field_config['idasignacionmodulista']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idasignacionmodulista != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idasignacionmodulista) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idasignacion Modulista: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idasignacionmodulista']))
                  {
                      $Campos_Erros['idasignacionmodulista'] = array();
                  }
                  $Campos_Erros['idasignacionmodulista'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idasignacionmodulista']) || !is_array($this->NM_ajax_info['errList']['idasignacionmodulista']))
                  {
                      $this->NM_ajax_info['errList']['idasignacionmodulista'] = array();
                  }
                  $this->NM_ajax_info['errList']['idasignacionmodulista'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idasignacionmodulista, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idasignacion Modulista; " ; 
                  if (!isset($Campos_Erros['idasignacionmodulista']))
                  {
                      $Campos_Erros['idasignacionmodulista'] = array();
                  }
                  $Campos_Erros['idasignacionmodulista'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idasignacionmodulista']) || !is_array($this->NM_ajax_info['errList']['idasignacionmodulista']))
                  {
                      $this->NM_ajax_info['errList']['idasignacionmodulista'] = array();
                  }
                  $this->NM_ajax_info['errList']['idasignacionmodulista'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idasignacionmodulista';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idasignacionmodulista

    function ValidateField_cantidadmodulistas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cantidadmodulistas === "" || is_null($this->cantidadmodulistas))  
      { 
          $this->cantidadmodulistas = 0;
          $this->sc_force_zero[] = 'cantidadmodulistas';
      } 
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
              if ($teste_validade->Valor($this->cantidadmodulistas, 2, 0, 0, 0, "N") == false)  
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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['rangoinicial']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['rangoinicial'] == "on") 
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
      nm_limpa_hora($this->rangoinicial_hora, $this->field_config['rangoinicial_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['rangoinicial_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['rangoinicial_hora']['time_sep']) ; 
          if (trim($this->rangoinicial_hora) != "")  
          { 
              if ($teste_validade->Hora($this->rangoinicial_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rango Inicial; " ; 
                  if (!isset($Campos_Erros['rangoinicial_hora']))
                  {
                      $Campos_Erros['rangoinicial_hora'] = array();
                  }
                  $Campos_Erros['rangoinicial_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['rangoinicial']) || !is_array($this->NM_ajax_info['errList']['rangoinicial']))
                  {
                      $this->NM_ajax_info['errList']['rangoinicial'] = array();
                  }
                  $this->NM_ajax_info['errList']['rangoinicial'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['rangoinicial_hora']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['rangoinicial_hora'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Rango Inicial" ; 
              if (!isset($Campos_Erros['rangoinicial_hora']))
              {
                  $Campos_Erros['rangoinicial_hora'] = array();
              }
              $Campos_Erros['rangoinicial_hora'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['rangoinicial']) || !is_array($this->NM_ajax_info['errList']['rangoinicial']))
                  {
                      $this->NM_ajax_info['errList']['rangoinicial'] = array();
                  }
                  $this->NM_ajax_info['errList']['rangoinicial'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
      if (isset($Campos_Erros['rangoinicial']) && isset($Campos_Erros['rangoinicial_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['rangoinicial'], $Campos_Erros['rangoinicial_hora']);
          if (empty($Campos_Erros['rangoinicial_hora']))
          {
              unset($Campos_Erros['rangoinicial_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['rangoinicial']))
          {
              $this->NM_ajax_info['errList']['rangoinicial'] = array_unique($this->NM_ajax_info['errList']['rangoinicial']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rangoinicial_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rangoinicial_hora

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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['rangofinal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['rangofinal'] == "on") 
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
      nm_limpa_hora($this->rangofinal_hora, $this->field_config['rangofinal_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['rangofinal_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['rangofinal_hora']['time_sep']) ; 
          if (trim($this->rangofinal_hora) != "")  
          { 
              if ($teste_validade->Hora($this->rangofinal_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rango Final; " ; 
                  if (!isset($Campos_Erros['rangofinal_hora']))
                  {
                      $Campos_Erros['rangofinal_hora'] = array();
                  }
                  $Campos_Erros['rangofinal_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['rangofinal']) || !is_array($this->NM_ajax_info['errList']['rangofinal']))
                  {
                      $this->NM_ajax_info['errList']['rangofinal'] = array();
                  }
                  $this->NM_ajax_info['errList']['rangofinal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['rangofinal_hora']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['rangofinal_hora'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Rango Final" ; 
              if (!isset($Campos_Erros['rangofinal_hora']))
              {
                  $Campos_Erros['rangofinal_hora'] = array();
              }
              $Campos_Erros['rangofinal_hora'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['rangofinal']) || !is_array($this->NM_ajax_info['errList']['rangofinal']))
                  {
                      $this->NM_ajax_info['errList']['rangofinal'] = array();
                  }
                  $this->NM_ajax_info['errList']['rangofinal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
      if (isset($Campos_Erros['rangofinal']) && isset($Campos_Erros['rangofinal_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['rangofinal'], $Campos_Erros['rangofinal_hora']);
          if (empty($Campos_Erros['rangofinal_hora']))
          {
              unset($Campos_Erros['rangofinal_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['rangofinal']))
          {
              $this->NM_ajax_info['errList']['rangofinal'] = array_unique($this->NM_ajax_info['errList']['rangofinal']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rangofinal_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rangofinal_hora

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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['fechamodificacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['php_cmp_required']['fechamodificacion'] == "on") 
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

    function ValidateField_idtipodemodulista(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idtipodemodulista) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista']) && !in_array($this->idtipodemodulista, $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista']))
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

    function ValidateField_inicio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->inicio, $this->field_config['inicio']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['inicio']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['inicio']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['inicio']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['inicio']['date_sep']) ; 
          if (trim($this->inicio) != "")  
          { 
              if ($teste_validade->Data($this->inicio, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "inicio; " ; 
                  if (!isset($Campos_Erros['inicio']))
                  {
                      $Campos_Erros['inicio'] = array();
                  }
                  $Campos_Erros['inicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['inicio']) || !is_array($this->NM_ajax_info['errList']['inicio']))
                  {
                      $this->NM_ajax_info['errList']['inicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['inicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['inicio']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'inicio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->inicio_hora, $this->field_config['inicio_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['inicio_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['inicio_hora']['time_sep']) ; 
          if (trim($this->inicio_hora) != "")  
          { 
              if ($teste_validade->Hora($this->inicio_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "inicio; " ; 
                  if (!isset($Campos_Erros['inicio_hora']))
                  {
                      $Campos_Erros['inicio_hora'] = array();
                  }
                  $Campos_Erros['inicio_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['inicio']) || !is_array($this->NM_ajax_info['errList']['inicio']))
                  {
                      $this->NM_ajax_info['errList']['inicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['inicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['inicio']) && isset($Campos_Erros['inicio_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['inicio'], $Campos_Erros['inicio_hora']);
          if (empty($Campos_Erros['inicio_hora']))
          {
              unset($Campos_Erros['inicio_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['inicio']))
          {
              $this->NM_ajax_info['errList']['inicio'] = array_unique($this->NM_ajax_info['errList']['inicio']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'inicio_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_inicio_hora

    function ValidateField_fin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fin, $this->field_config['fin']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fin']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fin']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fin']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fin']['date_sep']) ; 
          if (trim($this->fin) != "")  
          { 
              if ($teste_validade->Data($this->fin, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "fin; " ; 
                  if (!isset($Campos_Erros['fin']))
                  {
                      $Campos_Erros['fin'] = array();
                  }
                  $Campos_Erros['fin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fin']) || !is_array($this->NM_ajax_info['errList']['fin']))
                  {
                      $this->NM_ajax_info['errList']['fin'] = array();
                  }
                  $this->NM_ajax_info['errList']['fin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fin']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fin_hora, $this->field_config['fin_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fin_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fin_hora']['time_sep']) ; 
          if (trim($this->fin_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fin_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "fin; " ; 
                  if (!isset($Campos_Erros['fin_hora']))
                  {
                      $Campos_Erros['fin_hora'] = array();
                  }
                  $Campos_Erros['fin_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fin']) || !is_array($this->NM_ajax_info['errList']['fin']))
                  {
                      $this->NM_ajax_info['errList']['fin'] = array();
                  }
                  $this->NM_ajax_info['errList']['fin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fin']) && isset($Campos_Erros['fin_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fin'], $Campos_Erros['fin_hora']);
          if (empty($Campos_Erros['fin_hora']))
          {
              unset($Campos_Erros['fin_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fin']))
          {
              $this->NM_ajax_info['errList']['fin'] = array_unique($this->NM_ajax_info['errList']['fin']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fin_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fin_hora

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
    $this->nmgp_dados_form['idasignacionmodulista'] = $this->idasignacionmodulista;
    $this->nmgp_dados_form['cantidadmodulistas'] = $this->cantidadmodulistas;
    $this->nmgp_dados_form['rangoinicial'] = (strlen(trim($this->rangoinicial)) > 19) ? str_replace(".", ":", $this->rangoinicial) : trim($this->rangoinicial);
    $this->nmgp_dados_form['rangofinal'] = (strlen(trim($this->rangofinal)) > 19) ? str_replace(".", ":", $this->rangofinal) : trim($this->rangofinal);
    $this->nmgp_dados_form['fechamodificacion'] = (strlen(trim($this->fechamodificacion)) > 19) ? str_replace(".", ":", $this->fechamodificacion) : trim($this->fechamodificacion);
    $this->nmgp_dados_form['idtipodemodulista'] = $this->idtipodemodulista;
    $this->nmgp_dados_form['inicio'] = $this->inicio;
    $this->nmgp_dados_form['fin'] = $this->fin;
    $this->nmgp_dados_form['horainicio'] = $this->horainicio;
    $this->nmgp_dados_form['horafin'] = $this->horafin;
    $this->nmgp_dados_form['fecharegistro'] = $this->fecharegistro;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['idasignacionmodulista'] = $this->idasignacionmodulista;
      nm_limpa_numero($this->idasignacionmodulista, $this->field_config['idasignacionmodulista']['symbol_grp']) ; 
      $this->Before_unformat['cantidadmodulistas'] = $this->cantidadmodulistas;
      nm_limpa_numero($this->cantidadmodulistas, $this->field_config['cantidadmodulistas']['symbol_grp']) ; 
      $this->Before_unformat['rangoinicial'] = $this->rangoinicial;
      nm_limpa_data($this->rangoinicial, $this->field_config['rangoinicial']['date_sep']) ; 
      nm_limpa_hora($this->rangoinicial_hora, $this->field_config['rangoinicial']['time_sep']) ; 
      $this->Before_unformat['rangofinal'] = $this->rangofinal;
      nm_limpa_data($this->rangofinal, $this->field_config['rangofinal']['date_sep']) ; 
      nm_limpa_hora($this->rangofinal_hora, $this->field_config['rangofinal']['time_sep']) ; 
      $this->Before_unformat['fechamodificacion'] = $this->fechamodificacion;
      nm_limpa_data($this->fechamodificacion, $this->field_config['fechamodificacion']['date_sep']) ; 
      $this->Before_unformat['inicio'] = $this->inicio;
      nm_limpa_data($this->inicio, $this->field_config['inicio']['date_sep']) ; 
      nm_limpa_hora($this->inicio_hora, $this->field_config['inicio']['time_sep']) ; 
      $this->Before_unformat['fin'] = $this->fin;
      nm_limpa_data($this->fin, $this->field_config['fin']['date_sep']) ; 
      nm_limpa_hora($this->fin_hora, $this->field_config['fin']['time_sep']) ; 
      $this->Before_unformat['horainicio'] = $this->horainicio;
      nm_limpa_hora($this->horainicio, $this->field_config['horainicio']['time_sep']) ; 
      $this->Before_unformat['horafin'] = $this->horafin;
      nm_limpa_hora($this->horafin, $this->field_config['horafin']['time_sep']) ; 
      $this->Before_unformat['fecharegistro'] = $this->fecharegistro;
      nm_limpa_data($this->fecharegistro, $this->field_config['fecharegistro']['date_sep']) ; 
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
      if ($Nome_Campo == "idasignacionmodulista")
      {
          nm_limpa_numero($this->idasignacionmodulista, $this->field_config['idasignacionmodulista']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cantidadmodulistas")
      {
          nm_limpa_numero($this->cantidadmodulistas, $this->field_config['cantidadmodulistas']['symbol_grp']) ; 
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
      if ('' !== $this->idasignacionmodulista || (!empty($format_fields) && isset($format_fields['idasignacionmodulista'])))
      {
          nmgp_Form_Num_Val($this->idasignacionmodulista, $this->field_config['idasignacionmodulista']['symbol_grp'], $this->field_config['idasignacionmodulista']['symbol_dec'], "0", "S", $this->field_config['idasignacionmodulista']['format_neg'], "", "", "-", $this->field_config['idasignacionmodulista']['symbol_fmt']) ; 
      }
      if ('' !== $this->cantidadmodulistas || (!empty($format_fields) && isset($format_fields['cantidadmodulistas'])))
      {
          nmgp_Form_Num_Val($this->cantidadmodulistas, $this->field_config['cantidadmodulistas']['symbol_grp'], $this->field_config['cantidadmodulistas']['symbol_dec'], "0", "S", $this->field_config['cantidadmodulistas']['format_neg'], "", "", "-", $this->field_config['cantidadmodulistas']['symbol_fmt']) ; 
      }
      if ((!empty($this->rangoinicial) && 'null' != $this->rangoinicial) || (!empty($format_fields) && isset($format_fields['rangoinicial'])))
      {
          $nm_separa_data = strpos($this->field_config['rangoinicial']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['rangoinicial']['date_format'];
          $this->field_config['rangoinicial']['date_format'] = substr($this->field_config['rangoinicial']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->rangoinicial, " ") ; 
          $this->rangoinicial_hora = substr($this->rangoinicial, $separador + 1) ; 
          $this->rangoinicial = substr($this->rangoinicial, 0, $separador) ; 
          nm_volta_data($this->rangoinicial, $this->field_config['rangoinicial']['date_format']) ; 
          nmgp_Form_Datas($this->rangoinicial, $this->field_config['rangoinicial']['date_format'], $this->field_config['rangoinicial']['date_sep']) ;  
          $this->field_config['rangoinicial']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->rangoinicial_hora, $this->field_config['rangoinicial']['date_format']) ; 
          nmgp_Form_Hora($this->rangoinicial_hora, $this->field_config['rangoinicial']['date_format'], $this->field_config['rangoinicial']['time_sep']) ;  
          $this->field_config['rangoinicial']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->rangoinicial || '' == $this->rangoinicial)
      {
          $this->rangoinicial_hora = '';
          $this->rangoinicial = '';
      }
      if ((!empty($this->rangofinal) && 'null' != $this->rangofinal) || (!empty($format_fields) && isset($format_fields['rangofinal'])))
      {
          $nm_separa_data = strpos($this->field_config['rangofinal']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['rangofinal']['date_format'];
          $this->field_config['rangofinal']['date_format'] = substr($this->field_config['rangofinal']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->rangofinal, " ") ; 
          $this->rangofinal_hora = substr($this->rangofinal, $separador + 1) ; 
          $this->rangofinal = substr($this->rangofinal, 0, $separador) ; 
          nm_volta_data($this->rangofinal, $this->field_config['rangofinal']['date_format']) ; 
          nmgp_Form_Datas($this->rangofinal, $this->field_config['rangofinal']['date_format'], $this->field_config['rangofinal']['date_sep']) ;  
          $this->field_config['rangofinal']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->rangofinal_hora, $this->field_config['rangofinal']['date_format']) ; 
          nmgp_Form_Hora($this->rangofinal_hora, $this->field_config['rangofinal']['date_format'], $this->field_config['rangofinal']['time_sep']) ;  
          $this->field_config['rangofinal']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->rangofinal || '' == $this->rangofinal)
      {
          $this->rangofinal_hora = '';
          $this->rangofinal = '';
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
      if (!empty($this->inicio) || (!empty($format_fields) && isset($format_fields['inicio'])))
      {
          $nm_separa_data = strpos($this->field_config['inicio']['date_format'], ";") ;
          $form_data = substr($this->field_config['inicio']['date_format'], 0, $nm_separa_data);
          $form_hora = substr($this->field_config['inicio']['date_format'], $nm_separa_data + 1);
          $temp      = trim(strtolower("AAAAMMDD HH:II"));
          $pos_hora  = strpos($temp, "h");
          $pos_min   = strpos($temp, "i");
          $pos_seg   = strpos($temp, "s");
          $pos_hora  = min($pos_hora, $pos_min, $pos_seg);
          $out_data  = trim(substr($temp, 0, $pos_hora));
          $out_hora  = trim(substr($temp, $pos_hora));
          $separador = strpos($this->inicio, " ") ; 
          $this->inicio_hora = substr($this->inicio, $separador + 1) ; 
          $this->inicio = substr($this->inicio, 0, $separador) ; 
          nm_conv_form_data($this->inicio, $out_data, $form_data, array($this->field_config['inicio']['date_sep'])) ;  
          nm_conv_form_hora($this->inicio_hora, $out_hora, $form_hora, array($this->field_config['inicio']['time_sep'])) ;  
      }
      if (!empty($this->fin) || (!empty($format_fields) && isset($format_fields['fin'])))
      {
          $nm_separa_data = strpos($this->field_config['fin']['date_format'], ";") ;
          $form_data = substr($this->field_config['fin']['date_format'], 0, $nm_separa_data);
          $form_hora = substr($this->field_config['fin']['date_format'], $nm_separa_data + 1);
          $temp      = trim(strtolower("AAAAMMDD HH:II:SS"));
          $pos_hora  = strpos($temp, "h");
          $pos_min   = strpos($temp, "i");
          $pos_seg   = strpos($temp, "s");
          $pos_hora  = min($pos_hora, $pos_min, $pos_seg);
          $out_data  = trim(substr($temp, 0, $pos_hora));
          $out_hora  = trim(substr($temp, $pos_hora));
          $separador = strpos($this->fin, " ") ; 
          $this->fin_hora = substr($this->fin, $separador + 1) ; 
          $this->fin = substr($this->fin, 0, $separador) ; 
          nm_conv_form_data($this->fin, $out_data, $form_data, array($this->field_config['fin']['date_sep'])) ;  
          nm_conv_form_hora($this->fin_hora, $out_hora, $form_hora, array($this->field_config['fin']['time_sep'])) ;  
      }
      $this->horainicio = trim($this->horainicio);
      if ($this->horainicio == "00000")
      {
          $this->horainicio = "";
      }
      if (!empty($this->horainicio) || (!empty($format_fields) && isset($format_fields['horainicio'])))
      {
          nm_conv_form_hora($this->horainicio, "HH:II", $this->field_config['horainicio']['date_format'], array($this->field_config['horainicio']['time_sep'])) ;  
      }
      $this->horafin = trim($this->horafin);
      if ($this->horafin == "00000")
      {
          $this->horafin = "";
      }
      if (!empty($this->horafin) || (!empty($format_fields) && isset($format_fields['horafin'])))
      {
          nm_conv_form_hora($this->horafin, "HH:II", $this->field_config['horafin']['date_format'], array($this->field_config['horafin']['time_sep'])) ;  
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
      $guarda_format_hora = $this->field_config['rangoinicial']['date_format'];
      if ($this->rangoinicial != "")  
      { 
          $nm_separa_data = strpos($this->field_config['rangoinicial']['date_format'], ";") ;
          $this->field_config['rangoinicial']['date_format'] = substr($this->field_config['rangoinicial']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->rangoinicial, $this->field_config['rangoinicial']['date_format']) ; 
          $this->field_config['rangoinicial']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->rangoinicial_hora, $this->field_config['rangoinicial']['date_format']) ; 
          if ($this->rangoinicial_hora == "" )  
          { 
              $this->rangoinicial_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->rangoinicial_hora = substr($this->rangoinicial_hora, 0, -4) . "." . substr($this->rangoinicial_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
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
          if ($this->rangoinicial != "")  
          { 
              $this->rangoinicial .= " " . $this->rangoinicial_hora ; 
          }
      } 
      if ($this->rangoinicial == "" && $use_null)  
      { 
          $this->rangoinicial = "null" ; 
      } 
      $this->field_config['rangoinicial']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['rangofinal']['date_format'];
      if ($this->rangofinal != "")  
      { 
          $nm_separa_data = strpos($this->field_config['rangofinal']['date_format'], ";") ;
          $this->field_config['rangofinal']['date_format'] = substr($this->field_config['rangofinal']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->rangofinal, $this->field_config['rangofinal']['date_format']) ; 
          $this->field_config['rangofinal']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->rangofinal_hora, $this->field_config['rangofinal']['date_format']) ; 
          if ($this->rangofinal_hora == "" )  
          { 
              $this->rangofinal_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->rangofinal_hora = substr($this->rangofinal_hora, 0, -4) . "." . substr($this->rangofinal_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
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
          if ($this->rangofinal != "")  
          { 
              $this->rangofinal .= " " . $this->rangofinal_hora ; 
          }
      } 
      if ($this->rangofinal == "" && $use_null)  
      { 
          $this->rangofinal = "null" ; 
      } 
      $this->field_config['rangofinal']['date_format'] = $guarda_format_hora;
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
      if ($this->inicio != "")  
      {
              $this->inicio .= $this->inicio_hora ; 
     nm_conv_form_data_hora($this->inicio, $this->field_config['inicio']['date_format'], "AAAAMMDD HH:II", array($this->field_config['inicio']['date_sep'], $this->field_config['inicio']['time_sep'])) ;  
      }
      if ($this->fin != "")  
      {
              $this->fin .= $this->fin_hora ; 
     nm_conv_form_data_hora($this->fin, $this->field_config['fin']['date_format'], "AAAAMMDD HH:II:SS", array($this->field_config['fin']['date_sep'], $this->field_config['fin']['time_sep'])) ;  
      }
      if ($this->horainicio != "")  
      {
      $form_conv = str_replace(":", "", $this->field_config['horainicio']['date_format']) ;
      nm_conv_form_hora($this->horainicio, $form_conv, $this->field_config['horainicio']['date_format'], array($this->field_config['horainicio']['time_sep'])) ;  
      }
      if ($this->horafin != "")  
      {
      $form_conv = str_replace(":", "", $this->field_config['horafin']['date_format']) ;
      nm_conv_form_hora($this->horafin, $form_conv, $this->field_config['horafin']['date_format'], array($this->field_config['horafin']['time_sep'])) ;  
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
          $this->ajax_return_values_idasignacionmodulista();
          $this->ajax_return_values_cantidadmodulistas();
          $this->ajax_return_values_rangoinicial();
          $this->ajax_return_values_rangofinal();
          $this->ajax_return_values_fechamodificacion();
          $this->ajax_return_values_idtipodemodulista();
          $this->ajax_return_values_inicio();
          $this->ajax_return_values_fin();
          $this->ajax_return_values_horainicio();
          $this->ajax_return_values_horafin();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idasignacionmodulista']['keyVal'] = form_asignacionmodulista_pack_protect_string($this->nmgp_dados_form['idasignacionmodulista']);
          }
   } // ajax_return_values

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
               'valList' => array($this->rangoinicial . ' ' . $this->rangoinicial_hora),
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
               'valList' => array($this->rangofinal . ' ' . $this->rangofinal_hora),
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

          //----- idtipodemodulista
   function ajax_return_values_idtipodemodulista($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idtipodemodulista", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idtipodemodulista);
              $aLookup = array();
              $this->_tmp_lookup_idtipodemodulista = $this->idtipodemodulista;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista'] = array(); 
}
$aLookup[] = array(form_asignacionmodulista_pack_protect_string('') => form_asignacionmodulista_pack_protect_string('Seleccione Tipo'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idasignacionmodulista = $this->idasignacionmodulista;
   $old_value_cantidadmodulistas = $this->cantidadmodulistas;
   $old_value_rangoinicial = $this->rangoinicial;
   $old_value_rangoinicial_hora = $this->rangoinicial_hora;
   $old_value_rangofinal = $this->rangofinal;
   $old_value_rangofinal_hora = $this->rangofinal_hora;
   $old_value_fechamodificacion = $this->fechamodificacion;
   $old_value_inicio = $this->inicio;
   $old_value_inicio_hora = $this->inicio_hora;
   $old_value_fin = $this->fin;
   $old_value_fin_hora = $this->fin_hora;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idasignacionmodulista = $this->idasignacionmodulista;
   $unformatted_value_cantidadmodulistas = $this->cantidadmodulistas;
   $unformatted_value_rangoinicial = $this->rangoinicial;
   $unformatted_value_rangoinicial_hora = $this->rangoinicial_hora;
   $unformatted_value_rangofinal = $this->rangofinal;
   $unformatted_value_rangofinal_hora = $this->rangofinal_hora;
   $unformatted_value_fechamodificacion = $this->fechamodificacion;
   $unformatted_value_inicio = $this->inicio;
   $unformatted_value_inicio_hora = $this->inicio_hora;
   $unformatted_value_fin = $this->fin;
   $unformatted_value_fin_hora = $this->fin_hora;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $nm_comando = "SELECT idtipodeModulista, tipoModulista  FROM tipodemodulista  ORDER BY tipoModulista";

   $this->idasignacionmodulista = $old_value_idasignacionmodulista;
   $this->cantidadmodulistas = $old_value_cantidadmodulistas;
   $this->rangoinicial = $old_value_rangoinicial;
   $this->rangoinicial_hora = $old_value_rangoinicial_hora;
   $this->rangofinal = $old_value_rangofinal;
   $this->rangofinal_hora = $old_value_rangofinal_hora;
   $this->fechamodificacion = $old_value_fechamodificacion;
   $this->inicio = $old_value_inicio;
   $this->inicio_hora = $old_value_inicio_hora;
   $this->fin = $old_value_fin;
   $this->fin_hora = $old_value_fin_hora;
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
              $aLookup[] = array(form_asignacionmodulista_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_asignacionmodulista_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['idtipodemodulista']['valList'][$i] = form_asignacionmodulista_pack_protect_string($v);
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

          //----- inicio
   function ajax_return_values_inicio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("inicio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->inicio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['inicio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->inicio . ' ' . $this->inicio_hora),
              );
          }
   }

          //----- fin
   function ajax_return_values_fin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fin . ' ' . $this->fin_hora),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['scriptcase']['form_asignacionmodulista']['contr_erro'] = 'on';
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
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_asignacionmodulista' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['form_asignacionmodulista']['contr_erro'] = 'off'; 
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
      if ('incluir' == $this->nmgp_opcao && empty($this->rangoinicial)) {$this->rangoinicial = "$this->inicio"; $NM_val_null[] = "rangoinicial";}  
      if ('incluir' == $this->nmgp_opcao && empty($this->rangofinal)) {$this->rangofinal = "$this->fin"; $NM_val_null[] = "rangofinal";}  
      $NM_val_form['idasignacionmodulista'] = $this->idasignacionmodulista;
      $NM_val_form['cantidadmodulistas'] = $this->cantidadmodulistas;
      $NM_val_form['rangoinicial'] = $this->rangoinicial;
      $NM_val_form['rangofinal'] = $this->rangofinal;
      $NM_val_form['fechamodificacion'] = $this->fechamodificacion;
      $NM_val_form['idtipodemodulista'] = $this->idtipodemodulista;
      $NM_val_form['inicio'] = $this->inicio;
      $NM_val_form['fin'] = $this->fin;
      $NM_val_form['horainicio'] = $this->horainicio;
      $NM_val_form['horafin'] = $this->horafin;
      $NM_val_form['fecharegistro'] = $this->fecharegistro;
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
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['foreign_key'] as $sFKName => $sFKValue)
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
                 form_asignacionmodulista_pack_ajax_response();
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
                  $SC_fields_update[] = "cantidadModulistas = $this->cantidadmodulistas, rangoInicial = #$this->rangoinicial#, rangoFinal = #$this->rangofinal#, fechaModificacion = #$this->fechamodificacion#, idtipodeModulista = $this->idtipodemodulista"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cantidadModulistas = $this->cantidadmodulistas, rangoInicial = " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", rangoFinal = " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", fechaModificacion = " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", idtipodeModulista = $this->idtipodemodulista"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cantidadModulistas = $this->cantidadmodulistas, rangoInicial = " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", rangoFinal = " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", fechaModificacion = " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", idtipodeModulista = $this->idtipodemodulista"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cantidadModulistas = $this->cantidadmodulistas, rangoInicial = " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", rangoFinal = " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", fechaModificacion = " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", idtipodeModulista = $this->idtipodemodulista"; 
              } 
              if (isset($NM_val_form['fecharegistro']) && $NM_val_form['fecharegistro'] != $this->nmgp_dados_select['fecharegistro']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fechaRegistro = #$this->fecharegistro#"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fechaRegistro = " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ""; 
                  } 
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
                                  form_asignacionmodulista_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['idasignacionmodulista'])) { $this->idasignacionmodulista = $NM_val_form['idasignacionmodulista']; }
              elseif (isset($this->idasignacionmodulista)) { $this->nm_limpa_alfa($this->idasignacionmodulista); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidadmodulistas'])) { $this->cantidadmodulistas = $NM_val_form['cantidadmodulistas']; }
              elseif (isset($this->cantidadmodulistas)) { $this->nm_limpa_alfa($this->cantidadmodulistas); }
              if     (isset($NM_val_form) && isset($NM_val_form['idtipodemodulista'])) { $this->idtipodemodulista = $NM_val_form['idtipodemodulista']; }
              elseif (isset($this->idtipodemodulista)) { $this->nm_limpa_alfa($this->idtipodemodulista); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idasignacionmodulista', 'cantidadmodulistas', 'rangoinicial', 'rangofinal', 'fechamodificacion', 'idtipodemodulista', 'inicio', 'fin', 'horainicio', 'horafin'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['foreign_key'] as $sFKName => $sFKValue)
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
              $this->fecharegistro =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->fecharegistro_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_asignacionmodulista_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, idtipodeModulista) VALUES ($this->cantidadmodulistas, #$this->rangoinicial#, #$this->rangofinal#, #$this->fecharegistro#, #$this->fechamodificacion#, $this->idtipodemodulista)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, idtipodeModulista) VALUES (" . $NM_seq_auto . "$this->cantidadmodulistas, " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", $this->idtipodemodulista)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, idtipodeModulista) VALUES (" . $NM_seq_auto . "$this->cantidadmodulistas, " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", $this->idtipodemodulista)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, idtipodeModulista) VALUES (" . $NM_seq_auto . "$this->cantidadmodulistas, " . $this->Ini->date_delim . $this->rangoinicial . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->rangofinal . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecharegistro . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechamodificacion . $this->Ini->date_delim1 . ", $this->idtipodemodulista)"; 
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
                              form_asignacionmodulista_pack_ajax_response();
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
                          form_asignacionmodulista_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['return_edit'] = "new";
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
                          form_asignacionmodulista_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total']);
              }

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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['parms'] = "idasignacionmodulista?#?$this->idasignacionmodulista?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idasignacionmodulista = null === $this->idasignacionmodulista ? null : substr($this->Db->qstr($this->idasignacionmodulista), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idasignacionmodulista)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->idasignacionmodulista) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_asignacionmodulista = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total'] = $qt_geral_reg_form_asignacionmodulista;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idasignacionmodulista))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "idasignacionModulista < $this->idasignacionmodulista "; 
              }  
              else  
              {
                  $Key_Where = "idasignacionModulista < $this->idasignacionmodulista "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_asignacionmodulista = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] > $qt_geral_reg_form_asignacionmodulista)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] = $qt_geral_reg_form_asignacionmodulista; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] = $qt_geral_reg_form_asignacionmodulista; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_asignacionmodulista) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idasignacionModulista, cantidadModulistas, str_replace (convert(char(10),rangoInicial,102), '.', '-') + ' ' + convert(char(8),rangoInicial,20), str_replace (convert(char(10),rangoFinal,102), '.', '-') + ' ' + convert(char(8),rangoFinal,20), str_replace (convert(char(10),fechaRegistro,102), '.', '-') + ' ' + convert(char(8),fechaRegistro,20), str_replace (convert(char(10),fechaModificacion,102), '.', '-') + ' ' + convert(char(8),fechaModificacion,20), idtipodeModulista from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idasignacionModulista, cantidadModulistas, rangoInicial, rangoFinal, fechaRegistro, fechaModificacion, idtipodeModulista from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start']) ;  
              } 
          } 
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['empty_filter'] = true;
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
              $this->idtipodemodulista = $rs->fields[6] ; 
              $this->nmgp_dados_select['idtipodemodulista'] = $this->idtipodemodulista;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->idasignacionmodulista = (string)$this->idasignacionmodulista; 
              $this->cantidadmodulistas = (string)$this->cantidadmodulistas; 
              $this->idtipodemodulista = (string)$this->idtipodemodulista; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['parms'] = "idasignacionmodulista?#?$this->idasignacionmodulista?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] < $qt_geral_reg_form_asignacionmodulista;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opcao']   = '';
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
              $this->fecharegistro =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["fecharegistro"] = $this->fecharegistro;
              $this->fechamodificacion = "";  
              $this->fechamodificacion_hora = "" ;  
              $this->nmgp_dados_form["fechamodificacion"] = $this->fechamodificacion;
              $this->idtipodemodulista = "";  
              $this->nmgp_dados_form["idtipodemodulista"] = $this->idtipodemodulista;
              $this->inicio = "";  
              $this->inicio_hora = "" ;  
              $this->nmgp_dados_form["inicio"] = $this->inicio;
              $this->fin = "";  
              $this->fin_hora = "" ;  
              $this->nmgp_dados_form["fin"] = $this->fin;
              $this->horainicio = "";  
              $this->nmgp_dados_form["horainicio"] = $this->horainicio;
              $this->horafin = "";  
              $this->nmgp_dados_form["horafin"] = $this->horafin;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['foreign_key'] as $sFKName => $sFKValue)
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
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idasignacionModulista) from " . $this->Ini->nm_tabela . " where idasignacionModulista < $this->idasignacionmodulista" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idasignacionModulista) from " . $this->Ini->nm_tabela . " where idasignacionModulista < $this->idasignacionmodulista" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idasignacionModulista) from " . $this->Ini->nm_tabela . " where idasignacionModulista < $this->idasignacionmodulista" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idasignacionModulista) from " . $this->Ini->nm_tabela . " where idasignacionModulista < $this->idasignacionmodulista" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idasignacionmodulista = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idasignacionModulista) from " . $this->Ini->nm_tabela . " where idasignacionModulista > $this->idasignacionmodulista" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idasignacionModulista) from " . $this->Ini->nm_tabela . " where idasignacionModulista > $this->idasignacionmodulista" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idasignacionModulista) from " . $this->Ini->nm_tabela . " where idasignacionModulista > $this->idasignacionmodulista" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idasignacionModulista) from " . $this->Ini->nm_tabela . " where idasignacionModulista > $this->idasignacionmodulista" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idasignacionmodulista = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idasignacionModulista) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idasignacionModulista) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idasignacionModulista) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idasignacionModulista) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idasignacionmodulista = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idasignacionModulista) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idasignacionModulista) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idasignacionModulista) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idasignacionModulista) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idasignacionmodulista = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['reg_start'] + 1;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function inicio_onBlur()
{
$_SESSION['scriptcase']['form_asignacionmodulista']['contr_erro'] = 'on';
  
$original_rangoinicial = $this->rangoinicial;
$original_horainicio = $this->horainicio;



$modificado_rangoinicial = $this->rangoinicial;
$modificado_horainicio = $this->horainicio;
$this->nm_formatar_campos();
if ($original_rangoinicial !== $modificado_rangoinicial || isset($this->nmgp_cmp_readonly['rangoinicial']) || (isset($bFlagRead_rangoinicial) && $bFlagRead_rangoinicial))
{
    $this->ajax_return_values_rangoinicial(true);
}
if ($original_horainicio !== $modificado_horainicio || isset($this->nmgp_cmp_readonly['horainicio']) || (isset($bFlagRead_horainicio) && $bFlagRead_horainicio))
{
    $this->ajax_return_values_horainicio(true);
}
$this->NM_ajax_info['event_field'] = 'inicio';
form_asignacionmodulista_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_asignacionmodulista']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_asignacionmodulista_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_asignacionmodulista_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['csrf_token'];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista'] = array(); 
    }

   $old_value_idasignacionmodulista = $this->idasignacionmodulista;
   $old_value_cantidadmodulistas = $this->cantidadmodulistas;
   $old_value_rangoinicial = $this->rangoinicial;
   $old_value_rangoinicial_hora = $this->rangoinicial_hora;
   $old_value_rangofinal = $this->rangofinal;
   $old_value_rangofinal_hora = $this->rangofinal_hora;
   $old_value_fechamodificacion = $this->fechamodificacion;
   $old_value_inicio = $this->inicio;
   $old_value_inicio_hora = $this->inicio_hora;
   $old_value_fin = $this->fin;
   $old_value_fin_hora = $this->fin_hora;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idasignacionmodulista = $this->idasignacionmodulista;
   $unformatted_value_cantidadmodulistas = $this->cantidadmodulistas;
   $unformatted_value_rangoinicial = $this->rangoinicial;
   $unformatted_value_rangoinicial_hora = $this->rangoinicial_hora;
   $unformatted_value_rangofinal = $this->rangofinal;
   $unformatted_value_rangofinal_hora = $this->rangofinal_hora;
   $unformatted_value_fechamodificacion = $this->fechamodificacion;
   $unformatted_value_inicio = $this->inicio;
   $unformatted_value_inicio_hora = $this->inicio_hora;
   $unformatted_value_fin = $this->fin;
   $unformatted_value_fin_hora = $this->fin_hora;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $nm_comando = "SELECT idtipodeModulista, tipoModulista  FROM tipodemodulista  ORDER BY tipoModulista";

   $this->idasignacionmodulista = $old_value_idasignacionmodulista;
   $this->cantidadmodulistas = $old_value_cantidadmodulistas;
   $this->rangoinicial = $old_value_rangoinicial;
   $this->rangoinicial_hora = $old_value_rangoinicial_hora;
   $this->rangofinal = $old_value_rangofinal;
   $this->rangofinal_hora = $old_value_rangofinal_hora;
   $this->fechamodificacion = $old_value_fechamodificacion;
   $this->inicio = $old_value_inicio;
   $this->inicio_hora = $old_value_inicio_hora;
   $this->fin = $old_value_fin;
   $this->fin_hora = $old_value_fin_hora;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['Lookup_idtipodemodulista'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_asignacionmodulista_pack_ajax_response();
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
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "idasignacionModulista", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cantidadModulistas", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idtipodemodulista($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idtipodeModulista", $arg_search, $data_lookup);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_asignacionmodulista = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['total'] = $qt_geral_reg_form_asignacionmodulista;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_asignacionmodulista_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_asignacionmodulista_pack_ajax_response();
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
      $nm_numeric[] = "idasignacionmodulista";$nm_numeric[] = "cantidadmodulistas";$nm_numeric[] = "idtipodemodulista";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['decimal_db'] == ".")
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
      $Nm_datas['rangoinicial'] = "datetime";$Nm_datas['rangofinal'] = "datetime";$Nm_datas['fecharegistro'] = "datetime";$Nm_datas['fechamodificacion'] = "datetime";$Nm_datas[''] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['SC_sep_date1'];
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
   function SC_lookup_idtipodemodulista($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT tipoModulista, idtipodeModulista FROM tipodemodulista WHERE (tipoModulista LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
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
       $nmgp_saida_form = "form_asignacionmodulista_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_asignacionmodulista_fim.php";
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
       form_asignacionmodulista_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_asignacionmodulista']['masterValue']);
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
