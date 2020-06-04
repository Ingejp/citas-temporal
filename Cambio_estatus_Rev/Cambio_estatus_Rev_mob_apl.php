<?php
//
class Cambio_estatus_Rev_mob_apl
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
   var $turno;
   var $contenedor;
   var $cliente;
   var $estatus;
   var $rampa;
   var $rampa_1;
   var $nuevo_estatus;
   var $nuevo_estatus_1;
   var $ubicacion;
   var $fac_revision;
   var $fac_acople;
   var $telefonos;
   var $observaciones;
   var $nombre;
   var $placa;
   var $intrusion;
   var $sc_field_0;
   var $sc_field_0_hora;
   var $sc_field_1;
   var $sc_field_1_hora;
   var $operador;
   var $codigo;
   var $tipo_revision;
   var $tipo_revision_1;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cliente']))
          {
              $this->cliente = $this->NM_ajax_info['param']['cliente'];
          }
          if (isset($this->NM_ajax_info['param']['codigo']))
          {
              $this->codigo = $this->NM_ajax_info['param']['codigo'];
          }
          if (isset($this->NM_ajax_info['param']['contenedor']))
          {
              $this->contenedor = $this->NM_ajax_info['param']['contenedor'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['estatus']))
          {
              $this->estatus = $this->NM_ajax_info['param']['estatus'];
          }
          if (isset($this->NM_ajax_info['param']['fac_acople']))
          {
              $this->fac_acople = $this->NM_ajax_info['param']['fac_acople'];
          }
          if (isset($this->NM_ajax_info['param']['fac_revision']))
          {
              $this->fac_revision = $this->NM_ajax_info['param']['fac_revision'];
          }
          if (isset($this->NM_ajax_info['param']['intrusion']))
          {
              $this->intrusion = $this->NM_ajax_info['param']['intrusion'];
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
          if (isset($this->NM_ajax_info['param']['nombre']))
          {
              $this->nombre = $this->NM_ajax_info['param']['nombre'];
          }
          if (isset($this->NM_ajax_info['param']['nuevo_estatus']))
          {
              $this->nuevo_estatus = $this->NM_ajax_info['param']['nuevo_estatus'];
          }
          if (isset($this->NM_ajax_info['param']['observaciones']))
          {
              $this->observaciones = $this->NM_ajax_info['param']['observaciones'];
          }
          if (isset($this->NM_ajax_info['param']['operador']))
          {
              $this->operador = $this->NM_ajax_info['param']['operador'];
          }
          if (isset($this->NM_ajax_info['param']['placa']))
          {
              $this->placa = $this->NM_ajax_info['param']['placa'];
          }
          if (isset($this->NM_ajax_info['param']['rampa']))
          {
              $this->rampa = $this->NM_ajax_info['param']['rampa'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_0']))
          {
              $this->sc_field_0 = $this->NM_ajax_info['param']['sc_field_0'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_1']))
          {
              $this->sc_field_1 = $this->NM_ajax_info['param']['sc_field_1'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['telefonos']))
          {
              $this->telefonos = $this->NM_ajax_info['param']['telefonos'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_revision']))
          {
              $this->tipo_revision = $this->NM_ajax_info['param']['tipo_revision'];
          }
          if (isset($this->NM_ajax_info['param']['turno']))
          {
              $this->turno = $this->NM_ajax_info['param']['turno'];
          }
          if (isset($this->NM_ajax_info['param']['ubicacion']))
          {
              $this->ubicacion = $this->NM_ajax_info['param']['ubicacion'];
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
      $this->sc_conv_var['hora inicio'] = "sc_field_0";
      $this->sc_conv_var['hora fin'] = "sc_field_1";
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
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($this->VIGENTE) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['VIGENTE'] = $this->VIGENTE;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["VIGENTE"]) && isset($this->VIGENTE)) 
      {
          $_SESSION['VIGENTE'] = $this->VIGENTE;
      }
      if (!isset($_POST["VIGENTE"]) && isset($_POST["vigente"])) 
      {
          $_SESSION['VIGENTE'] = $this->vigente;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["VIGENTE"]) && isset($this->VIGENTE)) 
      {
          $_SESSION['VIGENTE'] = $this->VIGENTE;
      }
      if (!isset($_GET["VIGENTE"]) && isset($_GET["vigente"])) 
      {
          $_SESSION['VIGENTE'] = $this->vigente;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['embutida_parms']);
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
                 nm_limpa_str_Cambio_estatus_Rev_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (!isset($this->VIGENTE) && isset($this->vigente)) 
          {
              $this->VIGENTE = $this->vigente;
          }
          if (isset($this->VIGENTE)) 
          {
              $_SESSION['VIGENTE'] = $this->VIGENTE;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (!isset($this->VIGENTE) && isset($this->vigente)) 
          {
              $this->VIGENTE = $this->vigente;
          }
          if (isset($this->VIGENTE)) 
          {
              $_SESSION['VIGENTE'] = $this->VIGENTE;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->sc_field_0);
          $this->sc_field_0      = $aDtParts[0];
          $this->sc_field_0_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->sc_field_1);
          $this->sc_field_1      = $aDtParts[0];
          $this->sc_field_1_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new Cambio_estatus_Rev_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['Cambio_estatus_Rev_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['Cambio_estatus_Rev_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['Cambio_estatus_Rev_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['Cambio_estatus_Rev_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['Cambio_estatus_Rev_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('Cambio_estatus_Rev_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['Cambio_estatus_Rev_mob']['label'] = "ACTUALIZACION AL PROCESO DE INSPECCION";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "Cambio_estatus_Rev_mob")
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


      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "CAMBIAR DE ESTATUS";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['Cambio_estatus_Rev_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['Cambio_estatus_Rev_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['Cambio_estatus_Rev_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['Cambio_estatus_Rev_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['Cambio_estatus_Rev_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("Cambio_estatus_Rev_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'Cambio_estatus_Rev/Cambio_estatus_Rev_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'Cambio_estatus_Rev_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'Cambio_estatus_Rev_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'Cambio_estatus_Rev_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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
          require_once($this->Ini->path_embutida . 'Cambio_estatus_Rev/Cambio_estatus_Rev_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "Cambio_estatus_Rev_mob_erro.class.php"); 
      }
      $this->Erro      = new Cambio_estatus_Rev_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['Cambio_estatus_Rev_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sc_btn_0'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['botoes']['sc_btn_0'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "sc_btn_0")
          { 
              $this->sc_btn_sc_btn_0();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- sc_field_0
      $this->field_config['sc_field_0']                 = array();
      $this->field_config['sc_field_0']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['sc_field_0']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['sc_field_0']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['sc_field_0']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'sc_field_0');
      //-- sc_field_1
      $this->field_config['sc_field_1']                 = array();
      $this->field_config['sc_field_1']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['sc_field_1']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['sc_field_1']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['sc_field_1']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'sc_field_1');
      //-- intrusion
      $this->field_config['intrusion']               = array();
      $this->field_config['intrusion']['symbol_grp'] = '';
      $this->field_config['intrusion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['intrusion']['symbol_dec'] = '';
      $this->field_config['intrusion']['symbol_neg'] = '-';
      $this->field_config['intrusion']['format_neg'] = '2';
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


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
         $this->cliente = "";
         $this->contenedor = "";
         $this->estatus = "";
         $this->ubicacion = "";
         $this->nombre = "";
         $this->telefonos = "";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_turno' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'turno');
          }
          if ('validate_fac_revision' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fac_revision');
          }
          if ('validate_fac_acople' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fac_acople');
          }
          if ('validate_placa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'placa');
          }
          if ('validate_nuevo_estatus' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nuevo_estatus');
          }
          if ('validate_sc_field_0' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_0');
          }
          if ('validate_sc_field_1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_1');
          }
          if ('validate_operador' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'operador');
          }
          if ('validate_rampa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rampa');
          }
          if ('validate_tipo_revision' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_revision');
          }
          if ('validate_intrusion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'intrusion');
          }
          if ('validate_observaciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones');
          }
          if ('validate_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo');
          }
          Cambio_estatus_Rev_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_turno_onchange' == $this->NM_ajax_opcao)
          {
              $this->TURNO_onChange();
          }
          if ('event_scajaxbutton_sc_btn_0_onclick' == $this->NM_ajax_opcao)
          {
              $this->scajaxbutton_sc_btn_0_onClick();
          }
          Cambio_estatus_Rev_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_placa' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->placa = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->placa = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE placa LIKE '%" . substr($this->Db->qstr($this->placa), 1, -1) . "%' ORDER BY placa";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'][] = $rs->fields[0];
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
              $AjaxLim = 0;
              $aResponse = array();
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  $AjaxLim++;
                  if ($AjaxLim > 10)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('label' => $sLkpValue, 'value' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($aResponse);
              exit;
          }
          if ('autocomp_operador' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->operador = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->operador = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idoperador, nombre FROM operador WHERE nombre LIKE '%" . substr($this->Db->qstr($this->operador), 1, -1) . "%' ORDER BY nombre";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'][] = $rs->fields[0];
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
              $AjaxLim = 0;
              $aResponse = array();
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  $AjaxLim++;
                  if ($AjaxLim > 10)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('label' => $sLkpValue, 'value' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($aResponse);
              exit;
          }
          Cambio_estatus_Rev_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              Cambio_estatus_Rev_mob_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  Cambio_estatus_Rev_mob_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  Cambio_estatus_Rev_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->turno = "" ;  
          $this->contenedor = "" ;  
          $this->cliente = "" ;  
          $this->estatus = "" ;  
          $this->rampa = "" ;  
          $this->nuevo_estatus = "" ;  
          $this->ubicacion = "" ;  
          $this->fac_revision = "" ;  
          $this->fac_acople = "" ;  
          $this->telefonos = "" ;  
          $this->observaciones = "" ;  
          $this->nombre = "" ;  
          $this->placa = "" ;  
          $this->intrusion = "" ;  
              $this->sc_field_0 =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->sc_field_0_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              nm_conv_form_data_hora($this->sc_field_0, "aaaa-mm-dd hh:ii:ss", "AAAA/MM/DD HH:II:SS", array($this->field_config['sc_field_0']['date_sep'], $this->field_config['sc_field_0']['time_sep'])) ;  
              $this->sc_field_1 =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->sc_field_1_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              nm_conv_form_data_hora($this->sc_field_1, "aaaa-mm-dd hh:ii:ss", "AAAA/MM/DD HH:II:SS", array($this->field_config['sc_field_1']['date_sep'], $this->field_config['sc_field_1']['time_sep'])) ;  
          $this->operador = "" ;  
          $this->codigo = "" ;  
          $this->tipo_revision = "" ;  
          $this->cliente = "";
          $this->contenedor = "";
          $this->estatus = "";
          $this->ubicacion = "";
          $this->nombre = "";
          $this->telefonos = "";
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos']))
              { 
                  $turno = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][0]; 
                  $fac_revision = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][1]; 
                  $fac_acople = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][2]; 
                  $placa = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][3]; 
                  $nuevo_estatus = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][4]; 
                  $sc_field_0 = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][5]; 
                  $sc_field_1 = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][6]; 
                  $operador = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][7]; 
                  $rampa = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][8]; 
                  $tipo_revision = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][9]; 
                  $intrusion = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][10]; 
                  $observaciones = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][11]; 
                  $cliente = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][12]; 
                  $contenedor = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][13]; 
                  $estatus = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][14]; 
                  $ubicacion = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][15]; 
                  $nombre = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][16]; 
                  $telefonos = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][17]; 
                  $codigo = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][18]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][0] = $this->turno; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][1] = $this->fac_revision; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][2] = $this->fac_acople; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][3] = $this->placa; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][4] = $this->nuevo_estatus; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][5] = $this->sc_field_0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][6] = $this->sc_field_1; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][7] = $this->operador; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][8] = $this->rampa; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][9] = $this->tipo_revision; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][10] = $this->intrusion; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][11] = $this->observaciones; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][12] = $this->cliente; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][13] = $this->contenedor; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][14] = $this->estatus; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][15] = $this->ubicacion; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][16] = $this->nombre; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][17] = $this->telefonos; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['campos'][18] = $this->codigo; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("Cambio_estatus_Rev_mob", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("Cambio_estatus_Rev_mob_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              Cambio_estatus_Rev_mob_pack_ajax_response();
              exit;
          }
      }
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "Cambio_estatus_Rev_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("ACTUALIZACION AL PROCESO DE INSPECCION") ?></TITLE>
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
<form name="Fdown" method="get" action="Cambio_estatus_Rev_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="Cambio_estatus_Rev_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="Cambio_estatus_Rev_mob.php" target="_self" style="display: none"> 
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
           case 'turno':
               return "CONTENEDOR";
               break;
           case 'fac_revision':
               return "FACTURA REVISION";
               break;
           case 'fac_acople':
               return "FACTURA ACOPLE";
               break;
           case 'placa':
               return "PLACA";
               break;
           case 'nuevo_estatus':
               return "NUEVO ESTATUS";
               break;
           case 'sc_field_0':
               return "HORA INICIO";
               break;
           case 'sc_field_1':
               return "HORA FIN";
               break;
           case 'operador':
               return "OPERADOR DE TORITO";
               break;
           case 'rampa':
               return "RAMPA";
               break;
           case 'tipo_revision':
               return "TIPO_REVISION";
               break;
           case 'intrusion':
               return "% INTRUSION";
               break;
           case 'observaciones':
               return "OBSERVACIONES";
               break;
           case 'cliente':
               return "CLIENTE";
               break;
           case 'contenedor':
               return "MERCADERIA";
               break;
           case 'estatus':
               return "ESTATUS";
               break;
           case 'ubicacion':
               return "UBICACION";
               break;
           case 'nombre':
               return "NOMBRE";
               break;
           case 'telefonos':
               return "TELEFONOS GESTOR";
               break;
           case 'codigo':
               return "CODIGO DE TURNO";
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
              if (!isset($this->NM_ajax_info['errList']['geral_Cambio_estatus_Rev_mob']) || !is_array($this->NM_ajax_info['errList']['geral_Cambio_estatus_Rev_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_Cambio_estatus_Rev_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_Cambio_estatus_Rev_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'turno' == $filtro)
        $this->ValidateField_turno($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fac_revision' == $filtro)
        $this->ValidateField_fac_revision($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fac_acople' == $filtro)
        $this->ValidateField_fac_acople($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'placa' == $filtro)
        $this->ValidateField_placa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nuevo_estatus' == $filtro)
        $this->ValidateField_nuevo_estatus($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_0' == $filtro)
        $this->ValidateField_sc_field_0($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_1' == $filtro)
        $this->ValidateField_sc_field_1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'operador' == $filtro)
        $this->ValidateField_operador($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rampa' == $filtro)
        $this->ValidateField_rampa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_revision' == $filtro)
        $this->ValidateField_tipo_revision($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'intrusion' == $filtro)
        $this->ValidateField_intrusion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'observaciones' == $filtro)
        $this->ValidateField_observaciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'codigo' == $filtro)
        $this->ValidateField_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_turno(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->turno = sc_strtoupper($this->turno); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->turno) > 12) 
          { 
              $hasError = true;
              $Campos_Crit .= "CONTENEDOR " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['turno']))
              {
                  $Campos_Erros['turno'] = array();
              }
              $Campos_Erros['turno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['turno']) || !is_array($this->NM_ajax_info['errList']['turno']))
              {
                  $this->NM_ajax_info['errList']['turno'] = array();
              }
              $this->NM_ajax_info['errList']['turno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->turno ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->turno, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "CONTENEDOR " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['turno']))
              {
                  $Campos_Erros['turno'] = array();
              }
              $Campos_Erros['turno'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['turno']) || !is_array($this->NM_ajax_info['errList']['turno']))
              {
                  $this->NM_ajax_info['errList']['turno'] = array();
              }
              $this->NM_ajax_info['errList']['turno'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'turno';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_turno

    function ValidateField_fac_revision(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->fac_revision = sc_strtoupper($this->fac_revision); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['fac_revision']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['fac_revision'] == "on")) 
      { 
          if ($this->fac_revision == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "FACTURA REVISION" ; 
              if (!isset($Campos_Erros['fac_revision']))
              {
                  $Campos_Erros['fac_revision'] = array();
              }
              $Campos_Erros['fac_revision'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fac_revision']) || !is_array($this->NM_ajax_info['errList']['fac_revision']))
                  {
                      $this->NM_ajax_info['errList']['fac_revision'] = array();
                  }
                  $this->NM_ajax_info['errList']['fac_revision'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fac_revision) > 12) 
          { 
              $hasError = true;
              $Campos_Crit .= "FACTURA REVISION " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fac_revision']))
              {
                  $Campos_Erros['fac_revision'] = array();
              }
              $Campos_Erros['fac_revision'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fac_revision']) || !is_array($this->NM_ajax_info['errList']['fac_revision']))
              {
                  $this->NM_ajax_info['errList']['fac_revision'] = array();
              }
              $this->NM_ajax_info['errList']['fac_revision'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->fac_revision ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->fac_revision, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "FACTURA REVISION " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['fac_revision']))
              {
                  $Campos_Erros['fac_revision'] = array();
              }
              $Campos_Erros['fac_revision'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['fac_revision']) || !is_array($this->NM_ajax_info['errList']['fac_revision']))
              {
                  $this->NM_ajax_info['errList']['fac_revision'] = array();
              }
              $this->NM_ajax_info['errList']['fac_revision'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fac_revision';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fac_revision

    function ValidateField_fac_acople(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->fac_acople = sc_strtoupper($this->fac_acople); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['fac_acople']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['fac_acople'] == "on")) 
      { 
          if ($this->fac_acople == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "FACTURA ACOPLE" ; 
              if (!isset($Campos_Erros['fac_acople']))
              {
                  $Campos_Erros['fac_acople'] = array();
              }
              $Campos_Erros['fac_acople'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fac_acople']) || !is_array($this->NM_ajax_info['errList']['fac_acople']))
                  {
                      $this->NM_ajax_info['errList']['fac_acople'] = array();
                  }
                  $this->NM_ajax_info['errList']['fac_acople'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fac_acople) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "FACTURA ACOPLE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fac_acople']))
              {
                  $Campos_Erros['fac_acople'] = array();
              }
              $Campos_Erros['fac_acople'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fac_acople']) || !is_array($this->NM_ajax_info['errList']['fac_acople']))
              {
                  $this->NM_ajax_info['errList']['fac_acople'] = array();
              }
              $this->NM_ajax_info['errList']['fac_acople'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->fac_acople ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->fac_acople, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "FACTURA ACOPLE " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['fac_acople']))
              {
                  $Campos_Erros['fac_acople'] = array();
              }
              $Campos_Erros['fac_acople'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['fac_acople']) || !is_array($this->NM_ajax_info['errList']['fac_acople']))
              {
                  $this->NM_ajax_info['errList']['fac_acople'] = array();
              }
              $this->NM_ajax_info['errList']['fac_acople'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fac_acople';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fac_acople

    function ValidateField_placa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->placa = sc_strtoupper($this->placa); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['placa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['placa'] == "on")) 
      { 
          if ($this->placa == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "PLACA" ; 
              if (!isset($Campos_Erros['placa']))
              {
                  $Campos_Erros['placa'] = array();
              }
              $Campos_Erros['placa'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['placa']) || !is_array($this->NM_ajax_info['errList']['placa']))
                  {
                      $this->NM_ajax_info['errList']['placa'] = array();
                  }
                  $this->NM_ajax_info['errList']['placa'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->placa) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "PLACA " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['placa']))
              {
                  $Campos_Erros['placa'] = array();
              }
              $Campos_Erros['placa'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['placa']) || !is_array($this->NM_ajax_info['errList']['placa']))
              {
                  $this->NM_ajax_info['errList']['placa'] = array();
              }
              $this->NM_ajax_info['errList']['placa'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'placa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_placa

    function ValidateField_nuevo_estatus(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nuevo_estatus == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['nuevo_estatus']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['nuevo_estatus'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "NUEVO ESTATUS" ; 
          if (!isset($Campos_Erros['nuevo_estatus']))
          {
              $Campos_Erros['nuevo_estatus'] = array();
          }
          $Campos_Erros['nuevo_estatus'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['nuevo_estatus']) || !is_array($this->NM_ajax_info['errList']['nuevo_estatus']))
          {
              $this->NM_ajax_info['errList']['nuevo_estatus'] = array();
          }
          $this->NM_ajax_info['errList']['nuevo_estatus'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->nuevo_estatus) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']) && !in_array($this->nuevo_estatus, $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['nuevo_estatus']))
              {
                  $Campos_Erros['nuevo_estatus'] = array();
              }
              $Campos_Erros['nuevo_estatus'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['nuevo_estatus']) || !is_array($this->NM_ajax_info['errList']['nuevo_estatus']))
              {
                  $this->NM_ajax_info['errList']['nuevo_estatus'] = array();
              }
              $this->NM_ajax_info['errList']['nuevo_estatus'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nuevo_estatus';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nuevo_estatus

    function ValidateField_sc_field_0(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->sc_field_0, $this->field_config['sc_field_0']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['sc_field_0']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['sc_field_0']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['sc_field_0']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['sc_field_0']['date_sep']) ; 
          if (trim($this->sc_field_0) != "")  
          { 
              if ($teste_validade->Data($this->sc_field_0, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['sc_field_0']))
                  {
                      $Campos_Erros['sc_field_0'] = array();
                  }
                  $Campos_Erros['sc_field_0'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sc_field_0']) || !is_array($this->NM_ajax_info['errList']['sc_field_0']))
                  {
                      $this->NM_ajax_info['errList']['sc_field_0'] = array();
                  }
                  $this->NM_ajax_info['errList']['sc_field_0'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['sc_field_0']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sc_field_0';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->sc_field_0_hora, $this->field_config['sc_field_0_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['sc_field_0_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['sc_field_0_hora']['time_sep']) ; 
          if (trim($this->sc_field_0_hora) != "")  
          { 
              if ($teste_validade->Hora($this->sc_field_0_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['sc_field_0_hora']))
                  {
                      $Campos_Erros['sc_field_0_hora'] = array();
                  }
                  $Campos_Erros['sc_field_0_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sc_field_0']) || !is_array($this->NM_ajax_info['errList']['sc_field_0']))
                  {
                      $this->NM_ajax_info['errList']['sc_field_0'] = array();
                  }
                  $this->NM_ajax_info['errList']['sc_field_0'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['sc_field_0']) && isset($Campos_Erros['sc_field_0_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['sc_field_0'], $Campos_Erros['sc_field_0_hora']);
          if (empty($Campos_Erros['sc_field_0_hora']))
          {
              unset($Campos_Erros['sc_field_0_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['sc_field_0']))
          {
              $this->NM_ajax_info['errList']['sc_field_0'] = array_unique($this->NM_ajax_info['errList']['sc_field_0']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sc_field_0_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sc_field_0_hora

    function ValidateField_sc_field_1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->sc_field_1, $this->field_config['sc_field_1']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['sc_field_1']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['sc_field_1']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['sc_field_1']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['sc_field_1']['date_sep']) ; 
          if (trim($this->sc_field_1) != "")  
          { 
              if ($teste_validade->Data($this->sc_field_1, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FIN; " ; 
                  if (!isset($Campos_Erros['sc_field_1']))
                  {
                      $Campos_Erros['sc_field_1'] = array();
                  }
                  $Campos_Erros['sc_field_1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sc_field_1']) || !is_array($this->NM_ajax_info['errList']['sc_field_1']))
                  {
                      $this->NM_ajax_info['errList']['sc_field_1'] = array();
                  }
                  $this->NM_ajax_info['errList']['sc_field_1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['sc_field_1']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sc_field_1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->sc_field_1_hora, $this->field_config['sc_field_1_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['sc_field_1_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['sc_field_1_hora']['time_sep']) ; 
          if (trim($this->sc_field_1_hora) != "")  
          { 
              if ($teste_validade->Hora($this->sc_field_1_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FIN; " ; 
                  if (!isset($Campos_Erros['sc_field_1_hora']))
                  {
                      $Campos_Erros['sc_field_1_hora'] = array();
                  }
                  $Campos_Erros['sc_field_1_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sc_field_1']) || !is_array($this->NM_ajax_info['errList']['sc_field_1']))
                  {
                      $this->NM_ajax_info['errList']['sc_field_1'] = array();
                  }
                  $this->NM_ajax_info['errList']['sc_field_1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['sc_field_1']) && isset($Campos_Erros['sc_field_1_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['sc_field_1'], $Campos_Erros['sc_field_1_hora']);
          if (empty($Campos_Erros['sc_field_1_hora']))
          {
              unset($Campos_Erros['sc_field_1_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['sc_field_1']))
          {
              $this->NM_ajax_info['errList']['sc_field_1'] = array_unique($this->NM_ajax_info['errList']['sc_field_1']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sc_field_1_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sc_field_1_hora

    function ValidateField_operador(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->operador = sc_strtoupper($this->operador); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->operador) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "OPERADOR DE TORITO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['operador']))
              {
                  $Campos_Erros['operador'] = array();
              }
              $Campos_Erros['operador'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['operador']) || !is_array($this->NM_ajax_info['errList']['operador']))
              {
                  $this->NM_ajax_info['errList']['operador'] = array();
              }
              $this->NM_ajax_info['errList']['operador'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->operador ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->operador, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "OPERADOR DE TORITO " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['operador']))
              {
                  $Campos_Erros['operador'] = array();
              }
              $Campos_Erros['operador'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['operador']) || !is_array($this->NM_ajax_info['errList']['operador']))
              {
                  $this->NM_ajax_info['errList']['operador'] = array();
              }
              $this->NM_ajax_info['errList']['operador'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'operador';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_operador

    function ValidateField_rampa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->rampa) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']) && !in_array($this->rampa, $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['rampa']))
                   {
                       $Campos_Erros['rampa'] = array();
                   }
                   $Campos_Erros['rampa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['rampa']) || !is_array($this->NM_ajax_info['errList']['rampa']))
                   {
                       $this->NM_ajax_info['errList']['rampa'] = array();
                   }
                   $this->NM_ajax_info['errList']['rampa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rampa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rampa

    function ValidateField_tipo_revision(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->tipo_revision) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']) && !in_array($this->tipo_revision, $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['tipo_revision']))
                   {
                       $Campos_Erros['tipo_revision'] = array();
                   }
                   $Campos_Erros['tipo_revision'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['tipo_revision']) || !is_array($this->NM_ajax_info['errList']['tipo_revision']))
                   {
                       $this->NM_ajax_info['errList']['tipo_revision'] = array();
                   }
                   $this->NM_ajax_info['errList']['tipo_revision'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_revision';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_revision

    function ValidateField_intrusion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->intrusion === "" || is_null($this->intrusion))  
      { 
          $this->intrusion = 0;
          $this->sc_force_zero[] = 'intrusion';
      } 
      nm_limpa_numero($this->intrusion, $this->field_config['intrusion']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->intrusion != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->intrusion) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "% INTRUSION: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['intrusion']))
                  {
                      $Campos_Erros['intrusion'] = array();
                  }
                  $Campos_Erros['intrusion'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['intrusion']) || !is_array($this->NM_ajax_info['errList']['intrusion']))
                  {
                      $this->NM_ajax_info['errList']['intrusion'] = array();
                  }
                  $this->NM_ajax_info['errList']['intrusion'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->intrusion, 3, 0, -0, 999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "% INTRUSION; " ; 
                  if (!isset($Campos_Erros['intrusion']))
                  {
                      $Campos_Erros['intrusion'] = array();
                  }
                  $Campos_Erros['intrusion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['intrusion']) || !is_array($this->NM_ajax_info['errList']['intrusion']))
                  {
                      $this->NM_ajax_info['errList']['intrusion'] = array();
                  }
                  $this->NM_ajax_info['errList']['intrusion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'intrusion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_intrusion

    function ValidateField_observaciones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->observaciones = sc_strtoupper($this->observaciones); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observaciones) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "OBSERVACIONES " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observaciones']))
              {
                  $Campos_Erros['observaciones'] = array();
              }
              $Campos_Erros['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observaciones']) || !is_array($this->NM_ajax_info['errList']['observaciones']))
              {
                  $this->NM_ajax_info['errList']['observaciones'] = array();
              }
              $this->NM_ajax_info['errList']['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~ .,";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->observaciones ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->observaciones, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "OBSERVACIONES " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['observaciones']))
              {
                  $Campos_Erros['observaciones'] = array();
              }
              $Campos_Erros['observaciones'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['observaciones']) || !is_array($this->NM_ajax_info['errList']['observaciones']))
              {
                  $this->NM_ajax_info['errList']['observaciones'] = array();
              }
              $this->NM_ajax_info['errList']['observaciones'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'observaciones';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_observaciones

    function ValidateField_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codigo) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "CODIGO DE TURNO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codigo']))
              {
                  $Campos_Erros['codigo'] = array();
              }
              $Campos_Erros['codigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codigo']) || !is_array($this->NM_ajax_info['errList']['codigo']))
              {
                  $this->NM_ajax_info['errList']['codigo'] = array();
              }
              $this->NM_ajax_info['errList']['codigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigo

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
    $this->nmgp_dados_form['turno'] = $this->turno;
    $this->nmgp_dados_form['fac_revision'] = $this->fac_revision;
    $this->nmgp_dados_form['fac_acople'] = $this->fac_acople;
    $this->nmgp_dados_form['placa'] = $this->placa;
    $this->nmgp_dados_form['nuevo_estatus'] = $this->nuevo_estatus;
    $this->nmgp_dados_form['sc_field_0'] = $this->sc_field_0;
    $this->nmgp_dados_form['sc_field_1'] = $this->sc_field_1;
    $this->nmgp_dados_form['operador'] = $this->operador;
    $this->nmgp_dados_form['rampa'] = $this->rampa;
    $this->nmgp_dados_form['tipo_revision'] = $this->tipo_revision;
    $this->nmgp_dados_form['intrusion'] = $this->intrusion;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['cliente'] = $this->cliente;
    $this->nmgp_dados_form['contenedor'] = $this->contenedor;
    $this->nmgp_dados_form['estatus'] = $this->estatus;
    $this->nmgp_dados_form['ubicacion'] = $this->ubicacion;
    $this->nmgp_dados_form['nombre'] = $this->nombre;
    $this->nmgp_dados_form['telefonos'] = $this->telefonos;
    $this->nmgp_dados_form['codigo'] = $this->codigo;
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['sc_field_0'] = $this->sc_field_0;
      nm_limpa_data($this->sc_field_0, $this->field_config['sc_field_0']['date_sep']) ; 
      nm_limpa_hora($this->sc_field_0_hora, $this->field_config['sc_field_0']['time_sep']) ; 
      $this->Before_unformat['sc_field_1'] = $this->sc_field_1;
      nm_limpa_data($this->sc_field_1, $this->field_config['sc_field_1']['date_sep']) ; 
      nm_limpa_hora($this->sc_field_1_hora, $this->field_config['sc_field_1']['time_sep']) ; 
      $this->Before_unformat['intrusion'] = $this->intrusion;
      nm_limpa_numero($this->intrusion, $this->field_config['intrusion']['symbol_grp']) ; 
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
      if ($Nome_Campo == "intrusion")
      {
          nm_limpa_numero($this->intrusion, $this->field_config['intrusion']['symbol_grp']) ; 
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
      if (!empty($this->sc_field_0) || (!empty($format_fields) && isset($format_fields['sc_field_0'])))
      {
          $nm_separa_data = strpos($this->field_config['sc_field_0']['date_format'], ";") ;
          $form_data = substr($this->field_config['sc_field_0']['date_format'], 0, $nm_separa_data);
          $form_hora = substr($this->field_config['sc_field_0']['date_format'], $nm_separa_data + 1);
          $temp      = trim(strtolower("AAAA/MM/DD HH:II:SS"));
          $pos_hora  = strpos($temp, "h");
          $pos_min   = strpos($temp, "i");
          $pos_seg   = strpos($temp, "s");
          $pos_hora  = min($pos_hora, $pos_min, $pos_seg);
          $out_data  = trim(substr($temp, 0, $pos_hora));
          $out_hora  = trim(substr($temp, $pos_hora));
          $separador = strpos($this->sc_field_0, " ") ; 
          $this->sc_field_0_hora = substr($this->sc_field_0, $separador + 1) ; 
          $this->sc_field_0 = substr($this->sc_field_0, 0, $separador) ; 
          nm_conv_form_data($this->sc_field_0, $out_data, $form_data, array($this->field_config['sc_field_0']['date_sep'])) ;  
          nm_conv_form_hora($this->sc_field_0_hora, $out_hora, $form_hora, array($this->field_config['sc_field_0']['time_sep'])) ;  
      }
      if (!empty($this->sc_field_1) || (!empty($format_fields) && isset($format_fields['sc_field_1'])))
      {
          $nm_separa_data = strpos($this->field_config['sc_field_1']['date_format'], ";") ;
          $form_data = substr($this->field_config['sc_field_1']['date_format'], 0, $nm_separa_data);
          $form_hora = substr($this->field_config['sc_field_1']['date_format'], $nm_separa_data + 1);
          $temp      = trim(strtolower("AAAA/MM/DD HH:II:SS"));
          $pos_hora  = strpos($temp, "h");
          $pos_min   = strpos($temp, "i");
          $pos_seg   = strpos($temp, "s");
          $pos_hora  = min($pos_hora, $pos_min, $pos_seg);
          $out_data  = trim(substr($temp, 0, $pos_hora));
          $out_hora  = trim(substr($temp, $pos_hora));
          $separador = strpos($this->sc_field_1, " ") ; 
          $this->sc_field_1_hora = substr($this->sc_field_1, $separador + 1) ; 
          $this->sc_field_1 = substr($this->sc_field_1, 0, $separador) ; 
          nm_conv_form_data($this->sc_field_1, $out_data, $form_data, array($this->field_config['sc_field_1']['date_sep'])) ;  
          nm_conv_form_hora($this->sc_field_1_hora, $out_hora, $form_hora, array($this->field_config['sc_field_1']['time_sep'])) ;  
      }
      if ('' !== $this->intrusion || (!empty($format_fields) && isset($format_fields['intrusion'])))
      {
          nmgp_Form_Num_Val($this->intrusion, $this->field_config['intrusion']['symbol_grp'], $this->field_config['intrusion']['symbol_dec'], "0", "S", $this->field_config['intrusion']['format_neg'], "", "", "-", $this->field_config['intrusion']['symbol_fmt']) ; 
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
      if ($this->sc_field_0 != "")  
      {
              $this->sc_field_0 .= $this->sc_field_0_hora ; 
     nm_conv_form_data_hora($this->sc_field_0, $this->field_config['sc_field_0']['date_format'], "AAAA/MM/DD HH:II:SS", array($this->field_config['sc_field_0']['date_sep'], $this->field_config['sc_field_0']['time_sep'])) ;  
      }
      if ($this->sc_field_1 != "")  
      {
              $this->sc_field_1 .= $this->sc_field_1_hora ; 
     nm_conv_form_data_hora($this->sc_field_1, $this->field_config['sc_field_1']['date_format'], "AAAA/MM/DD HH:II:SS", array($this->field_config['sc_field_1']['date_sep'], $this->field_config['sc_field_1']['time_sep'])) ;  
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

   function ajax_return_values()
   {
          $this->ajax_return_values_turno();
          $this->ajax_return_values_fac_revision();
          $this->ajax_return_values_fac_acople();
          $this->ajax_return_values_placa();
          $this->ajax_return_values_nuevo_estatus();
          $this->ajax_return_values_sc_field_0();
          $this->ajax_return_values_sc_field_1();
          $this->ajax_return_values_operador();
          $this->ajax_return_values_rampa();
          $this->ajax_return_values_tipo_revision();
          $this->ajax_return_values_intrusion();
          $this->ajax_return_values_observaciones();
          $this->ajax_return_values_cliente();
          $this->ajax_return_values_contenedor();
          $this->ajax_return_values_estatus();
          $this->ajax_return_values_ubicacion();
          $this->ajax_return_values_nombre();
          $this->ajax_return_values_telefonos();
          $this->ajax_return_values_codigo();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- turno
   function ajax_return_values_turno($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("turno", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->turno);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['turno'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fac_revision
   function ajax_return_values_fac_revision($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fac_revision", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fac_revision);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fac_revision'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fac_acople
   function ajax_return_values_fac_acople($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fac_acople", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fac_acople);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fac_acople'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- placa
   function ajax_return_values_placa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("placa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->placa);
              $aLookup = array();
              $this->_tmp_lookup_placa = $this->placa;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = '" . substr($this->Db->qstr($this->placa), 1, -1) . "' ORDER BY placa";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['placa'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['placa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['placa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['placa']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($this->placa))]) ? $aLookup[0][Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($this->placa))] : "";
          $this->NM_ajax_info['fldList']['placa_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- nuevo_estatus
   function ajax_return_values_nuevo_estatus($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nuevo_estatus", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nuevo_estatus);
              $aLookup = array();
              $this->_tmp_lookup_nuevo_estatus = $this->nuevo_estatus;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array(); 
}
$aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string('') => Cambio_estatus_Rev_mob_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idestado_revision, descripcion  FROM estado_revision  ORDER BY descripcion";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'][] = $rs->fields[0];
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
          $sSelComp = "name=\"nuevo_estatus\"";
          if (isset($this->NM_ajax_info['select_html']['nuevo_estatus']) && !empty($this->NM_ajax_info['select_html']['nuevo_estatus']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['nuevo_estatus'];
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

                  if ($this->nuevo_estatus == $sValue)
                  {
                      $this->_tmp_lookup_nuevo_estatus = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['nuevo_estatus'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['nuevo_estatus']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['nuevo_estatus']['valList'][$i] = Cambio_estatus_Rev_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['nuevo_estatus']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['nuevo_estatus']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['nuevo_estatus']['labList'] = $aLabel;
          }
   }

          //----- sc_field_0
   function ajax_return_values_sc_field_0($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_0", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_0);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sc_field_0'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->sc_field_0 . ' ' . $this->sc_field_0_hora),
              );
          }
   }

          //----- sc_field_1
   function ajax_return_values_sc_field_1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sc_field_1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->sc_field_1 . ' ' . $this->sc_field_1_hora),
              );
          }
   }

          //----- operador
   function ajax_return_values_operador($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("operador", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->operador);
              $aLookup = array();
              $this->_tmp_lookup_operador = $this->operador;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idoperador, nombre FROM operador WHERE idoperador = '" . substr($this->Db->qstr($this->operador), 1, -1) . "' ORDER BY nombre";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['operador'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['operador']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['operador']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['operador']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($this->operador))]) ? $aLookup[0][Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($this->operador))] : "";
          $this->NM_ajax_info['fldList']['operador_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- rampa
   function ajax_return_values_rampa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rampa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rampa);
              $aLookup = array();
              $this->_tmp_lookup_rampa = $this->rampa;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array(); 
}
$aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string('') => Cambio_estatus_Rev_mob_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idrampa, descripcion  FROM rampa  ORDER BY descripcion";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'][] = $rs->fields[0];
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
          $sSelComp = "name=\"rampa\"";
          if (isset($this->NM_ajax_info['select_html']['rampa']) && !empty($this->NM_ajax_info['select_html']['rampa']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['rampa'];
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

                  if ($this->rampa == $sValue)
                  {
                      $this->_tmp_lookup_rampa = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['rampa'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['rampa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['rampa']['valList'][$i] = Cambio_estatus_Rev_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['rampa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['rampa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['rampa']['labList'] = $aLabel;
          }
   }

          //----- tipo_revision
   function ajax_return_values_tipo_revision($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_revision", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_revision);
              $aLookup = array();
              $this->_tmp_lookup_tipo_revision = $this->tipo_revision;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array(); 
}
$aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string('') => Cambio_estatus_Rev_mob_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idtipoderevision, descripcion  FROM tipoderevision  ORDER BY descripcion";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', Cambio_estatus_Rev_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'][] = $rs->fields[0];
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
          $sSelComp = "name=\"tipo_revision\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_revision']) && !empty($this->NM_ajax_info['select_html']['tipo_revision']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tipo_revision'];
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

                  if ($this->tipo_revision == $sValue)
                  {
                      $this->_tmp_lookup_tipo_revision = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_revision'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_revision']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_revision']['valList'][$i] = Cambio_estatus_Rev_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_revision']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_revision']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_revision']['labList'] = $aLabel;
          }
   }

          //----- intrusion
   function ajax_return_values_intrusion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("intrusion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->intrusion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['intrusion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- observaciones
   function ajax_return_values_observaciones($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observaciones", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->observaciones);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['observaciones'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cliente
   function ajax_return_values_cliente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cliente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cliente);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cliente'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- contenedor
   function ajax_return_values_contenedor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contenedor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contenedor);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contenedor'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estatus
   function ajax_return_values_estatus($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatus", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatus);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['estatus'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ubicacion
   function ajax_return_values_ubicacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ubicacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ubicacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ubicacion'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nombre
   function ajax_return_values_nombre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- telefonos
   function ajax_return_values_telefonos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telefonos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telefonos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['telefonos'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- codigo
   function ajax_return_values_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codigo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['upload_dir'][$fieldName][] = $newName;
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
//
function TURNO_onChange()
{
$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_VIGENTE)) {$this->sc_temp_VIGENTE = (isset($_SESSION['VIGENTE'])) ? $_SESSION['VIGENTE'] : "";}
  
$original_turno = $this->turno;
$original_contenedor = $this->contenedor;
$original_cliente = $this->cliente;
$original_estatus = $this->estatus;
$original_rampa = $this->rampa;
$original_fac_revision = $this->fac_revision;
$original_fac_acople = $this->fac_acople;
$original_ubicacion = $this->ubicacion;
$original_telefonos = $this->telefonos;
$original_nombre = $this->nombre;
$original_placa = $this->placa;
$original_codigo = $this->codigo;

$check_sql = "SELECT r.contenedor, c.nombre AS Consignatario, er.descripcion AS Estatus, r.idrampa, er.idestado_revision AS IDESTATUS, factura_revision, factura_acople, ubicacion, concat(ga.telefono1, ' / ', ga.telefono2), ga.nombre, r.idcabezal, r.idgestor_aduanal, r.codigo_revision"
   . " FROM revision r
		INNER JOIN consignatario c ON r.idconsignatario=c.idconsignatario
		INNER JOIN estado_revision er ON r.idestado_revision=er.idestado_revision
		LEFT JOIN rampa ramp ON r.idrampa=ramp.idrampa
		LEFT JOIN gestor_aduanal ga on r.idgestor_aduanal=ga.idgestor_aduanal"
   . " WHERE  r.contenedor = '" . $this->turno  . "' AND r.idestado='$this->sc_temp_VIGENTE'";



 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{

    $this->cliente  = $this->rs[0][1];
	$this->estatus  = $this->rs[0][2];
	$this->rampa  = $this->rs[0][3];
	$idestatus  = $this->rs[0][4];
	$this->fac_revision  = $this->rs[0][5];
	$this->fac_acople  = $this->rs[0][6];
	$this->ubicacion  = $this->rs[0][7];
	$this->telefonos  = $this->rs[0][8];
	$this->nombre  = $this->rs[0][9];
	$this->placa  = $this->rs[0][10];
	$this->codigo  = $this->rs[0][12];
}
		else     
{
		  $this->contenedor  = '0';
    		$this->cliente  = '0';
			$this->estatus  = '0';
			$this->rampa  = '0';
			$idestatus  ='0';
}



if (isset($this->sc_temp_VIGENTE)) { $_SESSION['VIGENTE'] = $this->sc_temp_VIGENTE;}
$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'off';
$modificado_turno = $this->turno;
$modificado_contenedor = $this->contenedor;
$modificado_cliente = $this->cliente;
$modificado_estatus = $this->estatus;
$modificado_rampa = $this->rampa;
$modificado_fac_revision = $this->fac_revision;
$modificado_fac_acople = $this->fac_acople;
$modificado_ubicacion = $this->ubicacion;
$modificado_telefonos = $this->telefonos;
$modificado_nombre = $this->nombre;
$modificado_placa = $this->placa;
$modificado_codigo = $this->codigo;
$this->nm_formatar_campos('turno', 'contenedor', 'cliente', 'estatus', 'rampa', 'fac_revision', 'fac_acople', 'ubicacion', 'telefonos', 'nombre', 'placa', 'codigo');
if ($original_turno !== $modificado_turno || isset($this->nmgp_cmp_readonly['turno']) || (isset($bFlagRead_turno) && $bFlagRead_turno))
{
    $this->ajax_return_values_turno(true);
}
if ($original_contenedor !== $modificado_contenedor || isset($this->nmgp_cmp_readonly['contenedor']) || (isset($bFlagRead_contenedor) && $bFlagRead_contenedor))
{
    $this->ajax_return_values_contenedor(true);
}
if ($original_cliente !== $modificado_cliente || isset($this->nmgp_cmp_readonly['cliente']) || (isset($bFlagRead_cliente) && $bFlagRead_cliente))
{
    $this->ajax_return_values_cliente(true);
}
if ($original_estatus !== $modificado_estatus || isset($this->nmgp_cmp_readonly['estatus']) || (isset($bFlagRead_estatus) && $bFlagRead_estatus))
{
    $this->ajax_return_values_estatus(true);
}
if ($original_rampa !== $modificado_rampa || isset($this->nmgp_cmp_readonly['rampa']) || (isset($bFlagRead_rampa) && $bFlagRead_rampa))
{
    $this->ajax_return_values_rampa(true);
}
if ($original_fac_revision !== $modificado_fac_revision || isset($this->nmgp_cmp_readonly['fac_revision']) || (isset($bFlagRead_fac_revision) && $bFlagRead_fac_revision))
{
    $this->ajax_return_values_fac_revision(true);
}
if ($original_fac_acople !== $modificado_fac_acople || isset($this->nmgp_cmp_readonly['fac_acople']) || (isset($bFlagRead_fac_acople) && $bFlagRead_fac_acople))
{
    $this->ajax_return_values_fac_acople(true);
}
if ($original_ubicacion !== $modificado_ubicacion || isset($this->nmgp_cmp_readonly['ubicacion']) || (isset($bFlagRead_ubicacion) && $bFlagRead_ubicacion))
{
    $this->ajax_return_values_ubicacion(true);
}
if ($original_telefonos !== $modificado_telefonos || isset($this->nmgp_cmp_readonly['telefonos']) || (isset($bFlagRead_telefonos) && $bFlagRead_telefonos))
{
    $this->ajax_return_values_telefonos(true);
}
if ($original_nombre !== $modificado_nombre || isset($this->nmgp_cmp_readonly['nombre']) || (isset($bFlagRead_nombre) && $bFlagRead_nombre))
{
    $this->ajax_return_values_nombre(true);
}
if ($original_placa !== $modificado_placa || isset($this->nmgp_cmp_readonly['placa']) || (isset($bFlagRead_placa) && $bFlagRead_placa))
{
    $this->ajax_return_values_placa(true);
}
if ($original_codigo !== $modificado_codigo || isset($this->nmgp_cmp_readonly['codigo']) || (isset($bFlagRead_codigo) && $bFlagRead_codigo))
{
    $this->ajax_return_values_codigo(true);
}
$this->NM_ajax_info['event_field'] = 'TURNO';
Cambio_estatus_Rev_mob_pack_ajax_response();
exit;
}
function actualizarRevision(){
$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  
	date_default_timezone_set('America/Guatemala');
$fecha=date('Y-m-d H:i:s');
	
	$update_fields = "idestado_revision = '$this->nuevo_estatus  ',
	 ubicacion = '$this->ubicacion  ',	 factura_revision = '$this->fac_revision  ',
	 factura_acople = '$this->fac_acople  ',
	 idrampa = '$this->rampa  ',		
	sec_users_login = '$this->sc_temp_usr_login'";
$update_table  = 'revision';      
$update_where  = "codigo_revision = '$this->codigo'"; 

if(strlen(trim($this->operador))>0){
	$update_fields = $update_fields . ", idoperador = '$this->operador' ";
}
	

if(strlen(trim($this->intrusion))>0){
	$update_fields = $update_fields . ", porcentaje_intrusion = '$this->intrusion  ' ";
}	
	
if(strlen(trim($this->tipo_revision ))>0){
	$update_fields = $update_fields . ", idtipoderevision = '$this->tipo_revision  ' ";
}
	
$update_sql = 'UPDATE ' . $update_table
    . ' SET '   .  $update_fields
    . ' WHERE ' . $update_where;
	

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                Cambio_estatus_Rev_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'off';
}
function limpiarCampos(){
$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'on';
  
	$this->turno ='';
	$this->fac_revision ='';
	$this->fac_acople ='';
	$this->placa ='';
	$this->nuevo_estatus ='';
	date_default_timezone_set('America/Guatemala');
	$fecha=date('Y-m-d H:i:s');
	$this->sc_field_0 =$fecha;
	$this->sc_field_1 =$fecha;
	$this->operador ='';
	$this->rampa ='';
	$this->tipo_revision ='';
	$this->intrusion ='';
	$this->observaciones ='';
	$this->cliente ='';
	$this->contenedor =''; 
	$this->estatus ='';
	$this->ubicacion ='';
	$this->nombre ='';
	$this->telefonos ='';	
	$this->codigo ='';
	

$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'off';
}
function actualizar_bitacora(){
$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  
	date_default_timezone_set('America/Guatemala');
	$fecha=date('Y-m-d H:i:s');

	$insert_table  = 'bitacora_revision';     
	$insert_fields = array(  
		 'fecha' => "'$fecha'",
		 'codigo_revision' => $this->codigo ,
		 'estatus_revision' => $this->nuevo_estatus ,	 
			'hora_inicio' => "'$this->sc_field_0'",
		 'hora_fin' => "'$this->sc_field_1'",
		 'correlativo_de_control' => "((SELECT b.correlativo_de_control FROM bitacora_revision b where b.codigo_revision='".$this->codigo ."' ORDER BY b.correlativo_de_control desc LIMIT 0,1 )+1)",
		 'usuario_modifica' => "'$this->sc_temp_usr_login'",
		'observaciones' =>"' $this->observaciones  '",
	 );

	$insert_sql = 'INSERT INTO ' . $insert_table
		. ' ('   . implode(', ', array_keys($insert_fields))   . ')'
		. ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';
	
     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                Cambio_estatus_Rev_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'off';
}
function scajaxbutton_sc_btn_0_onClick()
{
$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'on';
  
$original_operador = $this->operador;
$original_intrusion = $this->intrusion;
$original_nuevo_estatus = $this->nuevo_estatus;
$original_ubicacion = $this->ubicacion;
$original_fac_revision = $this->fac_revision;
$original_fac_acople = $this->fac_acople;
$original_rampa = $this->rampa;
$original_codigo = $this->codigo;
$original_tipo_revision = $this->tipo_revision;
$original_turno = $this->turno;
$original_placa = $this->placa;
$original_sc_field_0 = $this->sc_field_0;
$original_sc_field_1 = $this->sc_field_1;
$original_observaciones = $this->observaciones;
$original_cliente = $this->cliente;
$original_contenedor = $this->contenedor;
$original_estatus = $this->estatus;
$original_nombre = $this->nombre;
$original_telefonos = $this->telefonos;

$operador=$this->operador ;
$intrusion=$this->intrusion ;



$this->actualizarRevision();
$this->actualizar_bitacora();
$this->limpiarCampos();









$modificado_operador = $this->operador;
$modificado_intrusion = $this->intrusion;
$modificado_nuevo_estatus = $this->nuevo_estatus;
$modificado_ubicacion = $this->ubicacion;
$modificado_fac_revision = $this->fac_revision;
$modificado_fac_acople = $this->fac_acople;
$modificado_rampa = $this->rampa;
$modificado_codigo = $this->codigo;
$modificado_tipo_revision = $this->tipo_revision;
$modificado_turno = $this->turno;
$modificado_placa = $this->placa;
$modificado_sc_field_0 = $this->sc_field_0;
$modificado_sc_field_1 = $this->sc_field_1;
$modificado_observaciones = $this->observaciones;
$modificado_cliente = $this->cliente;
$modificado_contenedor = $this->contenedor;
$modificado_estatus = $this->estatus;
$modificado_nombre = $this->nombre;
$modificado_telefonos = $this->telefonos;
$this->nm_formatar_campos('operador', 'intrusion', 'nuevo_estatus', 'ubicacion', 'fac_revision', 'fac_acople', 'rampa', 'codigo', 'tipo_revision', 'turno', 'placa', 'sc_field_0', 'sc_field_1', 'observaciones', 'cliente', 'contenedor', 'estatus', 'nombre', 'telefonos');
if ($original_operador !== $modificado_operador || isset($this->nmgp_cmp_readonly['operador']) || (isset($bFlagRead_operador) && $bFlagRead_operador))
{
    $this->ajax_return_values_operador(true);
}
if ($original_intrusion !== $modificado_intrusion || isset($this->nmgp_cmp_readonly['intrusion']) || (isset($bFlagRead_intrusion) && $bFlagRead_intrusion))
{
    $this->ajax_return_values_intrusion(true);
}
if ($original_nuevo_estatus !== $modificado_nuevo_estatus || isset($this->nmgp_cmp_readonly['nuevo_estatus']) || (isset($bFlagRead_nuevo_estatus) && $bFlagRead_nuevo_estatus))
{
    $this->ajax_return_values_nuevo_estatus(true);
}
if ($original_ubicacion !== $modificado_ubicacion || isset($this->nmgp_cmp_readonly['ubicacion']) || (isset($bFlagRead_ubicacion) && $bFlagRead_ubicacion))
{
    $this->ajax_return_values_ubicacion(true);
}
if ($original_fac_revision !== $modificado_fac_revision || isset($this->nmgp_cmp_readonly['fac_revision']) || (isset($bFlagRead_fac_revision) && $bFlagRead_fac_revision))
{
    $this->ajax_return_values_fac_revision(true);
}
if ($original_fac_acople !== $modificado_fac_acople || isset($this->nmgp_cmp_readonly['fac_acople']) || (isset($bFlagRead_fac_acople) && $bFlagRead_fac_acople))
{
    $this->ajax_return_values_fac_acople(true);
}
if ($original_rampa !== $modificado_rampa || isset($this->nmgp_cmp_readonly['rampa']) || (isset($bFlagRead_rampa) && $bFlagRead_rampa))
{
    $this->ajax_return_values_rampa(true);
}
if ($original_codigo !== $modificado_codigo || isset($this->nmgp_cmp_readonly['codigo']) || (isset($bFlagRead_codigo) && $bFlagRead_codigo))
{
    $this->ajax_return_values_codigo(true);
}
if ($original_tipo_revision !== $modificado_tipo_revision || isset($this->nmgp_cmp_readonly['tipo_revision']) || (isset($bFlagRead_tipo_revision) && $bFlagRead_tipo_revision))
{
    $this->ajax_return_values_tipo_revision(true);
}
if ($original_turno !== $modificado_turno || isset($this->nmgp_cmp_readonly['turno']) || (isset($bFlagRead_turno) && $bFlagRead_turno))
{
    $this->ajax_return_values_turno(true);
}
if ($original_placa !== $modificado_placa || isset($this->nmgp_cmp_readonly['placa']) || (isset($bFlagRead_placa) && $bFlagRead_placa))
{
    $this->ajax_return_values_placa(true);
}
if ($original_sc_field_0 !== $modificado_sc_field_0 || isset($this->nmgp_cmp_readonly['sc_field_0']) || (isset($bFlagRead_sc_field_0) && $bFlagRead_sc_field_0))
{
    $this->ajax_return_values_sc_field_0(true);
}
if ($original_sc_field_1 !== $modificado_sc_field_1 || isset($this->nmgp_cmp_readonly['sc_field_1']) || (isset($bFlagRead_sc_field_1) && $bFlagRead_sc_field_1))
{
    $this->ajax_return_values_sc_field_1(true);
}
if ($original_observaciones !== $modificado_observaciones || isset($this->nmgp_cmp_readonly['observaciones']) || (isset($bFlagRead_observaciones) && $bFlagRead_observaciones))
{
    $this->ajax_return_values_observaciones(true);
}
if ($original_cliente !== $modificado_cliente || isset($this->nmgp_cmp_readonly['cliente']) || (isset($bFlagRead_cliente) && $bFlagRead_cliente))
{
    $this->ajax_return_values_cliente(true);
}
if ($original_contenedor !== $modificado_contenedor || isset($this->nmgp_cmp_readonly['contenedor']) || (isset($bFlagRead_contenedor) && $bFlagRead_contenedor))
{
    $this->ajax_return_values_contenedor(true);
}
if ($original_estatus !== $modificado_estatus || isset($this->nmgp_cmp_readonly['estatus']) || (isset($bFlagRead_estatus) && $bFlagRead_estatus))
{
    $this->ajax_return_values_estatus(true);
}
if ($original_nombre !== $modificado_nombre || isset($this->nmgp_cmp_readonly['nombre']) || (isset($bFlagRead_nombre) && $bFlagRead_nombre))
{
    $this->ajax_return_values_nombre(true);
}
if ($original_telefonos !== $modificado_telefonos || isset($this->nmgp_cmp_readonly['telefonos']) || (isset($bFlagRead_telefonos) && $bFlagRead_telefonos))
{
    $this->ajax_return_values_telefonos(true);
}
$this->NM_ajax_info['event_field'] = 'scajaxbutton';
Cambio_estatus_Rev_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['Cambio_estatus_Rev_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              Cambio_estatus_Rev_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    $this->nm_formatar_campos();
        $this->initFormPages();
    include_once("Cambio_estatus_Rev_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['csrf_token'];
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

   function Form_lookup_nuevo_estatus()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idestado_revision, descripcion  FROM estado_revision  ORDER BY descripcion";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'][] = $rs->fields[0];
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
   function Form_lookup_rampa()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idrampa, descripcion  FROM rampa  ORDER BY descripcion";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'][] = $rs->fields[0];
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
   function Form_lookup_tipo_revision()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idtipoderevision, descripcion  FROM tipoderevision  ORDER BY descripcion";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'][] = $rs->fields[0];
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
       $nmgp_saida_form = "Cambio_estatus_Rev_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "Cambio_estatus_Rev_mob_fim.php";
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
       Cambio_estatus_Rev_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue']);
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
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           Cambio_estatus_Rev_mob_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       }
       Cambio_estatus_Rev_mob_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
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
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
