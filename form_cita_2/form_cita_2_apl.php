<?php
//
class form_cita_2_apl
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
   var $idcita;
   var $codigo_cita;
   var $contenedorimport;
   var $contenedorexport;
   var $observaciones;
   var $fechainicio;
   var $fechainicio_hora;
   var $chasis;
   var $idnaviera;
   var $idnaviera_1;
   var $idtipodecarga;
   var $idtipodecarga_1;
   var $idestado;
   var $idestado_1;
   var $idpiloto;
   var $idcabezal;
   var $idselectivo;
   var $idselectivo_1;
   var $idyarda;
   var $idtipomovimiento;
   var $idtipomovimiento_1;
   var $idviaje;
   var $atc_ingreso;
   var $marchamo_ingreso;
   var $revision;
   var $atc_despacho;
   var $marchamo_despacho;
   var $sec_users_login;
   var $turno;
   var $piloto;
   var $tipo_qr;
   var $tipo_qr_1;
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
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['atc_despacho']))
          {
              $this->atc_despacho = $this->NM_ajax_info['param']['atc_despacho'];
          }
          if (isset($this->NM_ajax_info['param']['atc_ingreso']))
          {
              $this->atc_ingreso = $this->NM_ajax_info['param']['atc_ingreso'];
          }
          if (isset($this->NM_ajax_info['param']['chasis']))
          {
              $this->chasis = $this->NM_ajax_info['param']['chasis'];
          }
          if (isset($this->NM_ajax_info['param']['codigo_cita']))
          {
              $this->codigo_cita = $this->NM_ajax_info['param']['codigo_cita'];
          }
          if (isset($this->NM_ajax_info['param']['contenedorexport']))
          {
              $this->contenedorexport = $this->NM_ajax_info['param']['contenedorexport'];
          }
          if (isset($this->NM_ajax_info['param']['contenedorimport']))
          {
              $this->contenedorimport = $this->NM_ajax_info['param']['contenedorimport'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['fechainicio']))
          {
              $this->fechainicio = $this->NM_ajax_info['param']['fechainicio'];
          }
          if (isset($this->NM_ajax_info['param']['fechainicio_hora']))
          {
              $this->fechainicio_hora = $this->NM_ajax_info['param']['fechainicio_hora'];
          }
          if (isset($this->NM_ajax_info['param']['idcabezal']))
          {
              $this->idcabezal = $this->NM_ajax_info['param']['idcabezal'];
          }
          if (isset($this->NM_ajax_info['param']['idcita']))
          {
              $this->idcita = $this->NM_ajax_info['param']['idcita'];
          }
          if (isset($this->NM_ajax_info['param']['idestado']))
          {
              $this->idestado = $this->NM_ajax_info['param']['idestado'];
          }
          if (isset($this->NM_ajax_info['param']['idnaviera']))
          {
              $this->idnaviera = $this->NM_ajax_info['param']['idnaviera'];
          }
          if (isset($this->NM_ajax_info['param']['idpiloto']))
          {
              $this->idpiloto = $this->NM_ajax_info['param']['idpiloto'];
          }
          if (isset($this->NM_ajax_info['param']['idselectivo']))
          {
              $this->idselectivo = $this->NM_ajax_info['param']['idselectivo'];
          }
          if (isset($this->NM_ajax_info['param']['idtipodecarga']))
          {
              $this->idtipodecarga = $this->NM_ajax_info['param']['idtipodecarga'];
          }
          if (isset($this->NM_ajax_info['param']['idtipomovimiento']))
          {
              $this->idtipomovimiento = $this->NM_ajax_info['param']['idtipomovimiento'];
          }
          if (isset($this->NM_ajax_info['param']['idviaje']))
          {
              $this->idviaje = $this->NM_ajax_info['param']['idviaje'];
          }
          if (isset($this->NM_ajax_info['param']['idyarda']))
          {
              $this->idyarda = $this->NM_ajax_info['param']['idyarda'];
          }
          if (isset($this->NM_ajax_info['param']['marchamo_despacho']))
          {
              $this->marchamo_despacho = $this->NM_ajax_info['param']['marchamo_despacho'];
          }
          if (isset($this->NM_ajax_info['param']['marchamo_ingreso']))
          {
              $this->marchamo_ingreso = $this->NM_ajax_info['param']['marchamo_ingreso'];
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
          if (isset($this->NM_ajax_info['param']['piloto']))
          {
              $this->piloto = $this->NM_ajax_info['param']['piloto'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sec_users_login']))
          {
              $this->sec_users_login = $this->NM_ajax_info['param']['sec_users_login'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_qr']))
          {
              $this->tipo_qr = $this->NM_ajax_info['param']['tipo_qr'];
          }
          if (isset($this->NM_ajax_info['param']['turno']))
          {
              $this->turno = $this->NM_ajax_info['param']['turno'];
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
      if (isset($this->VIGENTE) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['VIGENTE'] = $this->VIGENTE;
      }
      if (isset($this->idyarda) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['idyarda'] = $this->idyarda;
      }
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
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
      if (isset($_POST["idyarda"]) && isset($this->idyarda)) 
      {
          $_SESSION['idyarda'] = $this->idyarda;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
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
      if (isset($_GET["idyarda"]) && isset($this->idyarda)) 
      {
          $_SESSION['idyarda'] = $this->idyarda;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cita_2']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_cita_2']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_cita_2']['embutida_parms']);
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
                 nm_limpa_str_form_cita_2($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->VIGENTE) && isset($this->vigente)) 
          {
              $this->VIGENTE = $this->vigente;
          }
          if (isset($this->VIGENTE)) 
          {
              $_SESSION['VIGENTE'] = $this->VIGENTE;
          }
          if (isset($this->idyarda)) 
          {
              $_SESSION['idyarda'] = $this->idyarda;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cita_2']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_cita_2']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cita_2']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cita_2']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->VIGENTE) && isset($this->vigente)) 
          {
              $this->VIGENTE = $this->vigente;
          }
          if (isset($this->VIGENTE)) 
          {
              $_SESSION['VIGENTE'] = $this->VIGENTE;
          }
          if (isset($this->idyarda)) 
          {
              $_SESSION['idyarda'] = $this->idyarda;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_cita_2']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_cita_2']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_cita_2']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_cita_2']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_cita_2']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_cita_2']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cita_2']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_cita_2']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_cita_2']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_cita_2']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_cita_2_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['initialize'])
          {
              $_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
  $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['start'] = 'new';
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_cita_2']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cita_2']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cita_2'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cita_2']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cita_2']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_cita_2') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cita_2']['label'] = "form_cita_2";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_cita_2")
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
      $this->arr_buttons['sc_btn_0']['value']            = "DESPACHO DE PREDIO";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "usr__NM__bg__NM__camion2.PNG";


      $_SESSION['scriptcase']['error_icon']['form_cita_2']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_cita_2'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "off";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cita_2']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_cita_2'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_cita_2'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dados_form'];
          if (!isset($this->idcita)){$this->idcita = $this->nmgp_dados_form['idcita'];} 
          if (!isset($this->observaciones)){$this->observaciones = $this->nmgp_dados_form['observaciones'];} 
          if (!isset($this->revision)){$this->revision = $this->nmgp_dados_form['revision'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_cita_2", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_cita_2/form_cita_2_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_cita_2_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_cita_2_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_cita_2_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_cita_2/form_cita_2_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_cita_2_erro.class.php"); 
      }
      $this->Erro      = new form_cita_2_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao']))
         { 
             if ($this->idcita != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_cita_2']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo" || empty($this->nmgp_opcao))  
      {
          $this->nmgp_botoes['sc_btn_0'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['botoes']['sc_btn_0'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->codigo_cita)) { $this->nm_limpa_alfa($this->codigo_cita); }
      if (isset($this->contenedorimport)) { $this->nm_limpa_alfa($this->contenedorimport); }
      if (isset($this->contenedorexport)) { $this->nm_limpa_alfa($this->contenedorexport); }
      if (isset($this->chasis)) { $this->nm_limpa_alfa($this->chasis); }
      if (isset($this->idnaviera)) { $this->nm_limpa_alfa($this->idnaviera); }
      if (isset($this->idtipodecarga)) { $this->nm_limpa_alfa($this->idtipodecarga); }
      if (isset($this->idestado)) { $this->nm_limpa_alfa($this->idestado); }
      if (isset($this->idpiloto)) { $this->nm_limpa_alfa($this->idpiloto); }
      if (isset($this->idcabezal)) { $this->nm_limpa_alfa($this->idcabezal); }
      if (isset($this->idselectivo)) { $this->nm_limpa_alfa($this->idselectivo); }
      if (isset($this->idyarda)) { $this->nm_limpa_alfa($this->idyarda); }
      if (isset($this->idtipomovimiento)) { $this->nm_limpa_alfa($this->idtipomovimiento); }
      if (isset($this->idviaje)) { $this->nm_limpa_alfa($this->idviaje); }
      if (isset($this->atc_ingreso)) { $this->nm_limpa_alfa($this->atc_ingreso); }
      if (isset($this->marchamo_ingreso)) { $this->nm_limpa_alfa($this->marchamo_ingreso); }
      if (isset($this->atc_despacho)) { $this->nm_limpa_alfa($this->atc_despacho); }
      if (isset($this->marchamo_despacho)) { $this->nm_limpa_alfa($this->marchamo_despacho); }
      if (isset($this->sec_users_login)) { $this->nm_limpa_alfa($this->sec_users_login); }
      if (isset($this->turno)) { $this->nm_limpa_alfa($this->turno); }
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- fechainicio
      $this->field_config['fechainicio']                 = array();
      $this->field_config['fechainicio']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechainicio']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechainicio']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechainicio']['date_display'] = "ddmmaaaa;hhii";
      $this->new_date_format('DH', 'fechainicio');
      //-- idpiloto
      $this->field_config['idpiloto']               = array();
      $this->field_config['idpiloto']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idpiloto']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idpiloto']['symbol_dec'] = '';
      $this->field_config['idpiloto']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idpiloto']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idcabezal
      $this->field_config['idcabezal']               = array();
      $this->field_config['idcabezal']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idcabezal']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idcabezal']['symbol_dec'] = '';
      $this->field_config['idcabezal']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idcabezal']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idyarda
      $this->field_config['idyarda']               = array();
      $this->field_config['idyarda']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idyarda']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idyarda']['symbol_dec'] = '';
      $this->field_config['idyarda']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idyarda']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- turno
      $this->field_config['turno']               = array();
      $this->field_config['turno']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['turno']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['turno']['symbol_dec'] = '';
      $this->field_config['turno']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['turno']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idcita
      $this->field_config['idcita']               = array();
      $this->field_config['idcita']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idcita']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idcita']['symbol_dec'] = '';
      $this->field_config['idcita']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idcita']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_codigo_cita' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo_cita');
          }
          if ('validate_tipo_qr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_qr');
          }
          if ('validate_fechainicio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechainicio');
          }
          if ('validate_idtipomovimiento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idtipomovimiento');
          }
          if ('validate_idestado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idestado');
          }
          if ('validate_sec_users_login' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sec_users_login');
          }
          if ('validate_idpiloto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpiloto');
          }
          if ('validate_piloto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'piloto');
          }
          if ('validate_idcabezal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idcabezal');
          }
          if ('validate_chasis' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'chasis');
          }
          if ('validate_idselectivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idselectivo');
          }
          if ('validate_idnaviera' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idnaviera');
          }
          if ('validate_contenedorexport' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contenedorexport');
          }
          if ('validate_contenedorimport' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contenedorimport');
          }
          if ('validate_idtipodecarga' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idtipodecarga');
          }
          if ('validate_idviaje' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idviaje');
          }
          if ('validate_idyarda' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idyarda');
          }
          if ('validate_atc_ingreso' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'atc_ingreso');
          }
          if ('validate_marchamo_ingreso' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'marchamo_ingreso');
          }
          if ('validate_atc_despacho' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'atc_despacho');
          }
          if ('validate_marchamo_despacho' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'marchamo_despacho');
          }
          if ('validate_turno' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'turno');
          }
          form_cita_2_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_tipo_qr_onchange' == $this->NM_ajax_opcao)
          {
              $this->TIPO_QR_onChange();
          }
          if ('event_idnaviera_onchange' == $this->NM_ajax_opcao)
          {
              $this->idNaviera_onChange();
          }
          if ('event_idpiloto_onchange' == $this->NM_ajax_opcao)
          {
              $this->idpiloto_onChange();
          }
          if ('event_scajaxbutton_sc_btn_0_onclick' == $this->NM_ajax_opcao)
          {
              $this->scajaxbutton_sc_btn_0_onClick();
          }
          form_cita_2_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_idpiloto' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idpiloto = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idpiloto = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->nm_clear_val("idpiloto");

   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idpiloto, licencia FROM piloto WHERE licencia LIKE '%" . substr($this->Db->qstr($this->idpiloto), 1, -1) . "%' ORDER BY licencia";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto'][] = $rs->fields[0];
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
          if ('autocomp_idcabezal' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idcabezal = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idcabezal = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->nm_clear_val("idcabezal");

   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE placa LIKE '%" . substr($this->Db->qstr($this->idcabezal), 1, -1) . "%' ORDER BY placa";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal'][] = $rs->fields[0];
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
          if ('autocomp_idviaje' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idviaje = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idviaje = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idviaje, viaje FROM viaje WHERE (idestado=1) AND viaje LIKE '%" . substr($this->Db->qstr($this->idviaje), 1, -1) . "%' ORDER BY viaje";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje'][] = $rs->fields[0];
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
          form_cita_2_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inline_form_seq'] = $this->sc_seq_row;
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
              form_cita_2_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_cita_2_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_redir_atualiz'] == "ok")
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
          form_cita_2_pack_ajax_response();
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
          form_cita_2_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_cita_2.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("") ?></TITLE>
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
<form name="Fdown" method="get" action="form_cita_2_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_cita_2"> 
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
           case 'codigo_cita':
               return "CODIGO TURNO";
               break;
           case 'tipo_qr':
               return "TIPO QR";
               break;
           case 'fechainicio':
               return "FECHA DE INGRESO";
               break;
           case 'idtipomovimiento':
               return "TIPO DE MOVIMIENTO";
               break;
           case 'idestado':
               return "ESTADO";
               break;
           case 'sec_users_login':
               return "USUARIO";
               break;
           case 'idpiloto':
               return "LICENCIA";
               break;
           case 'piloto':
               return "PILOTO";
               break;
           case 'idcabezal':
               return "PLACA";
               break;
           case 'chasis':
               return "CHASIS";
               break;
           case 'idselectivo':
               return "SELECTIVO";
               break;
           case 'idnaviera':
               return "NAVIERA";
               break;
           case 'contenedorexport':
               return "CONTENEDOR EXPORT";
               break;
           case 'contenedorimport':
               return "CONTENEDOR IMPORT";
               break;
           case 'idtipodecarga':
               return "TIPO DE CARGA";
               break;
           case 'idviaje':
               return "BUQUE Y VIAJE";
               break;
           case 'idyarda':
               return "Yarda";
               break;
           case 'atc_ingreso':
               return "Atc Ingreso";
               break;
           case 'marchamo_ingreso':
               return "Marchamo Ingreso";
               break;
           case 'atc_despacho':
               return "Atc Despacho";
               break;
           case 'marchamo_despacho':
               return "Marchamo Despacho";
               break;
           case 'turno':
               return "Turno";
               break;
           case 'idcita':
               return "Id Cita";
               break;
           case 'observaciones':
               return "Observaciones";
               break;
           case 'revision':
               return "Revision";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_cita_2']) || !is_array($this->NM_ajax_info['errList']['geral_form_cita_2']))
              {
                  $this->NM_ajax_info['errList']['geral_form_cita_2'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_cita_2'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'codigo_cita' == $filtro)
        $this->ValidateField_codigo_cita($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_qr' == $filtro)
        $this->ValidateField_tipo_qr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fechainicio' == $filtro)
        $this->ValidateField_fechainicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idtipomovimiento' == $filtro)
        $this->ValidateField_idtipomovimiento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idestado' == $filtro)
        $this->ValidateField_idestado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sec_users_login' == $filtro)
        $this->ValidateField_sec_users_login($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idpiloto' == $filtro)
        $this->ValidateField_idpiloto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'piloto' == $filtro)
        $this->ValidateField_piloto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idcabezal' == $filtro)
        $this->ValidateField_idcabezal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'chasis' == $filtro)
        $this->ValidateField_chasis($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idselectivo' == $filtro)
        $this->ValidateField_idselectivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idnaviera' == $filtro)
        $this->ValidateField_idnaviera($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contenedorexport' == $filtro)
        $this->ValidateField_contenedorexport($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contenedorimport' == $filtro)
        $this->ValidateField_contenedorimport($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idtipodecarga' == $filtro)
        $this->ValidateField_idtipodecarga($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idviaje' == $filtro)
        $this->ValidateField_idviaje($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idyarda' == $filtro)
        $this->ValidateField_idyarda($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'atc_ingreso' == $filtro)
        $this->ValidateField_atc_ingreso($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'marchamo_ingreso' == $filtro)
        $this->ValidateField_marchamo_ingreso($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'atc_despacho' == $filtro)
        $this->ValidateField_atc_despacho($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'marchamo_despacho' == $filtro)
        $this->ValidateField_marchamo_despacho($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'turno' == $filtro)
        $this->ValidateField_turno($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_codigo_cita(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->codigo_cita = sc_strtoupper($this->codigo_cita); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['codigo_cita']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['codigo_cita'] == "on")) 
      { 
          if ($this->codigo_cita == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CODIGO TURNO" ; 
              if (!isset($Campos_Erros['codigo_cita']))
              {
                  $Campos_Erros['codigo_cita'] = array();
              }
              $Campos_Erros['codigo_cita'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['codigo_cita']) || !is_array($this->NM_ajax_info['errList']['codigo_cita']))
                  {
                      $this->NM_ajax_info['errList']['codigo_cita'] = array();
                  }
                  $this->NM_ajax_info['errList']['codigo_cita'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codigo_cita) > 35) 
          { 
              $hasError = true;
              $Campos_Crit .= "CODIGO TURNO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 35 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codigo_cita']))
              {
                  $Campos_Erros['codigo_cita'] = array();
              }
              $Campos_Erros['codigo_cita'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 35 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codigo_cita']) || !is_array($this->NM_ajax_info['errList']['codigo_cita']))
              {
                  $this->NM_ajax_info['errList']['codigo_cita'] = array();
              }
              $this->NM_ajax_info['errList']['codigo_cita'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 35 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 .,:";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->codigo_cita ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->codigo_cita, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "CODIGO TURNO " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['codigo_cita']))
              {
                  $Campos_Erros['codigo_cita'] = array();
              }
              $Campos_Erros['codigo_cita'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['codigo_cita']) || !is_array($this->NM_ajax_info['errList']['codigo_cita']))
              {
                  $this->NM_ajax_info['errList']['codigo_cita'] = array();
              }
              $this->NM_ajax_info['errList']['codigo_cita'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigo_cita';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigo_cita

    function ValidateField_tipo_qr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo_qr == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_qr';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_qr

    function ValidateField_fechainicio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechainicio, $this->field_config['fechainicio']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechainicio']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechainicio']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechainicio']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechainicio']['date_sep']) ; 
          if (trim($this->fechainicio) != "")  
          { 
              if ($teste_validade->Data($this->fechainicio, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA DE INGRESO; " ; 
                  if (!isset($Campos_Erros['fechainicio']))
                  {
                      $Campos_Erros['fechainicio'] = array();
                  }
                  $Campos_Erros['fechainicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechainicio']) || !is_array($this->NM_ajax_info['errList']['fechainicio']))
                  {
                      $this->NM_ajax_info['errList']['fechainicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechainicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fechainicio']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechainicio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fechainicio_hora, $this->field_config['fechainicio_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fechainicio_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fechainicio_hora']['time_sep']) ; 
          if (trim($this->fechainicio_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fechainicio_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA DE INGRESO; " ; 
                  if (!isset($Campos_Erros['fechainicio_hora']))
                  {
                      $Campos_Erros['fechainicio_hora'] = array();
                  }
                  $Campos_Erros['fechainicio_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechainicio']) || !is_array($this->NM_ajax_info['errList']['fechainicio']))
                  {
                      $this->NM_ajax_info['errList']['fechainicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechainicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechainicio_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechainicio_hora

    function ValidateField_idtipomovimiento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idtipomovimiento) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento']) && !in_array($this->idtipomovimiento, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idtipomovimiento']))
                   {
                       $Campos_Erros['idtipomovimiento'] = array();
                   }
                   $Campos_Erros['idtipomovimiento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idtipomovimiento']) || !is_array($this->NM_ajax_info['errList']['idtipomovimiento']))
                   {
                       $this->NM_ajax_info['errList']['idtipomovimiento'] = array();
                   }
                   $this->NM_ajax_info['errList']['idtipomovimiento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idtipomovimiento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idtipomovimiento

    function ValidateField_idestado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idestado) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado']) && !in_array($this->idestado, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idestado']))
                   {
                       $Campos_Erros['idestado'] = array();
                   }
                   $Campos_Erros['idestado'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idestado']) || !is_array($this->NM_ajax_info['errList']['idestado']))
                   {
                       $this->NM_ajax_info['errList']['idestado'] = array();
                   }
                   $this->NM_ajax_info['errList']['idestado'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idestado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idestado

    function ValidateField_sec_users_login(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sec_users_login) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "USUARIO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sec_users_login']))
              {
                  $Campos_Erros['sec_users_login'] = array();
              }
              $Campos_Erros['sec_users_login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sec_users_login']) || !is_array($this->NM_ajax_info['errList']['sec_users_login']))
              {
                  $this->NM_ajax_info['errList']['sec_users_login'] = array();
              }
              $this->NM_ajax_info['errList']['sec_users_login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sec_users_login';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sec_users_login

    function ValidateField_idpiloto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->idpiloto, $this->field_config['idpiloto']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->idpiloto != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idpiloto) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "LICENCIA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idpiloto']))
                  {
                      $Campos_Erros['idpiloto'] = array();
                  }
                  $Campos_Erros['idpiloto'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idpiloto']) || !is_array($this->NM_ajax_info['errList']['idpiloto']))
                  {
                      $this->NM_ajax_info['errList']['idpiloto'] = array();
                  }
                  $this->NM_ajax_info['errList']['idpiloto'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idpiloto, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "LICENCIA; " ; 
                  if (!isset($Campos_Erros['idpiloto']))
                  {
                      $Campos_Erros['idpiloto'] = array();
                  }
                  $Campos_Erros['idpiloto'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idpiloto']) || !is_array($this->NM_ajax_info['errList']['idpiloto']))
                  {
                      $this->NM_ajax_info['errList']['idpiloto'] = array();
                  }
                  $this->NM_ajax_info['errList']['idpiloto'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idpiloto']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idpiloto'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "LICENCIA" ; 
              if (!isset($Campos_Erros['idpiloto']))
              {
                  $Campos_Erros['idpiloto'] = array();
              }
              $Campos_Erros['idpiloto'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idpiloto']) || !is_array($this->NM_ajax_info['errList']['idpiloto']))
                  {
                      $this->NM_ajax_info['errList']['idpiloto'] = array();
                  }
                  $this->NM_ajax_info['errList']['idpiloto'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idpiloto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idpiloto

    function ValidateField_piloto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->piloto = sc_strtoupper($this->piloto); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->piloto) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "PILOTO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['piloto']))
              {
                  $Campos_Erros['piloto'] = array();
              }
              $Campos_Erros['piloto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['piloto']) || !is_array($this->NM_ajax_info['errList']['piloto']))
              {
                  $this->NM_ajax_info['errList']['piloto'] = array();
              }
              $this->NM_ajax_info['errList']['piloto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'piloto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_piloto

    function ValidateField_idcabezal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->idcabezal, $this->field_config['idcabezal']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->idcabezal != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idcabezal) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PLACA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idcabezal']))
                  {
                      $Campos_Erros['idcabezal'] = array();
                  }
                  $Campos_Erros['idcabezal'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idcabezal']) || !is_array($this->NM_ajax_info['errList']['idcabezal']))
                  {
                      $this->NM_ajax_info['errList']['idcabezal'] = array();
                  }
                  $this->NM_ajax_info['errList']['idcabezal'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idcabezal, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PLACA; " ; 
                  if (!isset($Campos_Erros['idcabezal']))
                  {
                      $Campos_Erros['idcabezal'] = array();
                  }
                  $Campos_Erros['idcabezal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idcabezal']) || !is_array($this->NM_ajax_info['errList']['idcabezal']))
                  {
                      $this->NM_ajax_info['errList']['idcabezal'] = array();
                  }
                  $this->NM_ajax_info['errList']['idcabezal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idcabezal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idcabezal'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "PLACA" ; 
              if (!isset($Campos_Erros['idcabezal']))
              {
                  $Campos_Erros['idcabezal'] = array();
              }
              $Campos_Erros['idcabezal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idcabezal']) || !is_array($this->NM_ajax_info['errList']['idcabezal']))
                  {
                      $this->NM_ajax_info['errList']['idcabezal'] = array();
                  }
                  $this->NM_ajax_info['errList']['idcabezal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idcabezal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idcabezal

    function ValidateField_chasis(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->chasis = sc_strtoupper($this->chasis); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['chasis']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['chasis'] == "on")) 
      { 
          if ($this->chasis == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CHASIS" ; 
              if (!isset($Campos_Erros['chasis']))
              {
                  $Campos_Erros['chasis'] = array();
              }
              $Campos_Erros['chasis'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['chasis']) || !is_array($this->NM_ajax_info['errList']['chasis']))
                  {
                      $this->NM_ajax_info['errList']['chasis'] = array();
                  }
                  $this->NM_ajax_info['errList']['chasis'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->chasis) > 12) 
          { 
              $hasError = true;
              $Campos_Crit .= "CHASIS " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['chasis']))
              {
                  $Campos_Erros['chasis'] = array();
              }
              $Campos_Erros['chasis'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['chasis']) || !is_array($this->NM_ajax_info['errList']['chasis']))
              {
                  $this->NM_ajax_info['errList']['chasis'] = array();
              }
              $this->NM_ajax_info['errList']['chasis'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'chasis';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_chasis

    function ValidateField_idselectivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idselectivo == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idselectivo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idselectivo'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "SELECTIVO" ; 
          if (!isset($Campos_Erros['idselectivo']))
          {
              $Campos_Erros['idselectivo'] = array();
          }
          $Campos_Erros['idselectivo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idselectivo']) || !is_array($this->NM_ajax_info['errList']['idselectivo']))
          {
              $this->NM_ajax_info['errList']['idselectivo'] = array();
          }
          $this->NM_ajax_info['errList']['idselectivo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idselectivo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo']) && !in_array($this->idselectivo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['idselectivo']))
              {
                  $Campos_Erros['idselectivo'] = array();
              }
              $Campos_Erros['idselectivo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['idselectivo']) || !is_array($this->NM_ajax_info['errList']['idselectivo']))
              {
                  $this->NM_ajax_info['errList']['idselectivo'] = array();
              }
              $this->NM_ajax_info['errList']['idselectivo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idselectivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idselectivo

    function ValidateField_idnaviera(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idnaviera == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idnaviera']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idnaviera'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "NAVIERA" ; 
          if (!isset($Campos_Erros['idnaviera']))
          {
              $Campos_Erros['idnaviera'] = array();
          }
          $Campos_Erros['idnaviera'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idnaviera']) || !is_array($this->NM_ajax_info['errList']['idnaviera']))
          {
              $this->NM_ajax_info['errList']['idnaviera'] = array();
          }
          $this->NM_ajax_info['errList']['idnaviera'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idnaviera) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera']) && !in_array($this->idnaviera, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['idnaviera']))
              {
                  $Campos_Erros['idnaviera'] = array();
              }
              $Campos_Erros['idnaviera'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['idnaviera']) || !is_array($this->NM_ajax_info['errList']['idnaviera']))
              {
                  $this->NM_ajax_info['errList']['idnaviera'] = array();
              }
              $this->NM_ajax_info['errList']['idnaviera'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idnaviera';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idnaviera

    function ValidateField_contenedorexport(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contenedorexport) > 12) 
          { 
              $hasError = true;
              $Campos_Crit .= "CONTENEDOR EXPORT " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contenedorexport']))
              {
                  $Campos_Erros['contenedorexport'] = array();
              }
              $Campos_Erros['contenedorexport'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contenedorexport']) || !is_array($this->NM_ajax_info['errList']['contenedorexport']))
              {
                  $this->NM_ajax_info['errList']['contenedorexport'] = array();
              }
              $this->NM_ajax_info['errList']['contenedorexport'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contenedorexport';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contenedorexport

    function ValidateField_contenedorimport(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->contenedorimport = sc_strtoupper($this->contenedorimport); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contenedorimport) > 12) 
          { 
              $hasError = true;
              $Campos_Crit .= "CONTENEDOR IMPORT " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contenedorimport']))
              {
                  $Campos_Erros['contenedorimport'] = array();
              }
              $Campos_Erros['contenedorimport'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contenedorimport']) || !is_array($this->NM_ajax_info['errList']['contenedorimport']))
              {
                  $this->NM_ajax_info['errList']['contenedorimport'] = array();
              }
              $this->NM_ajax_info['errList']['contenedorimport'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contenedorimport';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contenedorimport

    function ValidateField_idtipodecarga(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idtipodecarga == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idtipodecarga']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['php_cmp_required']['idtipodecarga'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "TIPO DE CARGA" ; 
          if (!isset($Campos_Erros['idtipodecarga']))
          {
              $Campos_Erros['idtipodecarga'] = array();
          }
          $Campos_Erros['idtipodecarga'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idtipodecarga']) || !is_array($this->NM_ajax_info['errList']['idtipodecarga']))
          {
              $this->NM_ajax_info['errList']['idtipodecarga'] = array();
          }
          $this->NM_ajax_info['errList']['idtipodecarga'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idtipodecarga) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga']) && !in_array($this->idtipodecarga, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['idtipodecarga']))
              {
                  $Campos_Erros['idtipodecarga'] = array();
              }
              $Campos_Erros['idtipodecarga'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['idtipodecarga']) || !is_array($this->NM_ajax_info['errList']['idtipodecarga']))
              {
                  $this->NM_ajax_info['errList']['idtipodecarga'] = array();
              }
              $this->NM_ajax_info['errList']['idtipodecarga'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idtipodecarga';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idtipodecarga

    function ValidateField_idviaje(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idviaje) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "BUQUE Y VIAJE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idviaje']))
              {
                  $Campos_Erros['idviaje'] = array();
              }
              $Campos_Erros['idviaje'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idviaje']) || !is_array($this->NM_ajax_info['errList']['idviaje']))
              {
                  $this->NM_ajax_info['errList']['idviaje'] = array();
              }
              $this->NM_ajax_info['errList']['idviaje'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idviaje';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idviaje

    function ValidateField_idyarda(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idyarda === "" || is_null($this->idyarda))  
      { 
          $this->idyarda = 0;
          $this->sc_force_zero[] = 'idyarda';
      } 
      nm_limpa_numero($this->idyarda, $this->field_config['idyarda']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->idyarda != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idyarda) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Yarda: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idyarda']))
                  {
                      $Campos_Erros['idyarda'] = array();
                  }
                  $Campos_Erros['idyarda'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idyarda']) || !is_array($this->NM_ajax_info['errList']['idyarda']))
                  {
                      $this->NM_ajax_info['errList']['idyarda'] = array();
                  }
                  $this->NM_ajax_info['errList']['idyarda'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idyarda, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Yarda; " ; 
                  if (!isset($Campos_Erros['idyarda']))
                  {
                      $Campos_Erros['idyarda'] = array();
                  }
                  $Campos_Erros['idyarda'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idyarda']) || !is_array($this->NM_ajax_info['errList']['idyarda']))
                  {
                      $this->NM_ajax_info['errList']['idyarda'] = array();
                  }
                  $this->NM_ajax_info['errList']['idyarda'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idyarda';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idyarda

    function ValidateField_atc_ingreso(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->atc_ingreso) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Atc Ingreso " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['atc_ingreso']))
              {
                  $Campos_Erros['atc_ingreso'] = array();
              }
              $Campos_Erros['atc_ingreso'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['atc_ingreso']) || !is_array($this->NM_ajax_info['errList']['atc_ingreso']))
              {
                  $this->NM_ajax_info['errList']['atc_ingreso'] = array();
              }
              $this->NM_ajax_info['errList']['atc_ingreso'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'atc_ingreso';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_atc_ingreso

    function ValidateField_marchamo_ingreso(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->marchamo_ingreso) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Marchamo Ingreso " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['marchamo_ingreso']))
              {
                  $Campos_Erros['marchamo_ingreso'] = array();
              }
              $Campos_Erros['marchamo_ingreso'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['marchamo_ingreso']) || !is_array($this->NM_ajax_info['errList']['marchamo_ingreso']))
              {
                  $this->NM_ajax_info['errList']['marchamo_ingreso'] = array();
              }
              $this->NM_ajax_info['errList']['marchamo_ingreso'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'marchamo_ingreso';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_marchamo_ingreso

    function ValidateField_atc_despacho(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->atc_despacho) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Atc Despacho " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['atc_despacho']))
              {
                  $Campos_Erros['atc_despacho'] = array();
              }
              $Campos_Erros['atc_despacho'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['atc_despacho']) || !is_array($this->NM_ajax_info['errList']['atc_despacho']))
              {
                  $this->NM_ajax_info['errList']['atc_despacho'] = array();
              }
              $this->NM_ajax_info['errList']['atc_despacho'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'atc_despacho';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_atc_despacho

    function ValidateField_marchamo_despacho(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->marchamo_despacho) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Marchamo Despacho " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['marchamo_despacho']))
              {
                  $Campos_Erros['marchamo_despacho'] = array();
              }
              $Campos_Erros['marchamo_despacho'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['marchamo_despacho']) || !is_array($this->NM_ajax_info['errList']['marchamo_despacho']))
              {
                  $this->NM_ajax_info['errList']['marchamo_despacho'] = array();
              }
              $this->NM_ajax_info['errList']['marchamo_despacho'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'marchamo_despacho';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_marchamo_despacho

    function ValidateField_turno(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->turno === "" || is_null($this->turno))  
      { 
          $this->turno = 0;
          $this->sc_force_zero[] = 'turno';
      } 
      nm_limpa_numero($this->turno, $this->field_config['turno']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->turno != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->turno) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Turno: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['turno']))
                  {
                      $Campos_Erros['turno'] = array();
                  }
                  $Campos_Erros['turno'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['turno']) || !is_array($this->NM_ajax_info['errList']['turno']))
                  {
                      $this->NM_ajax_info['errList']['turno'] = array();
                  }
                  $this->NM_ajax_info['errList']['turno'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->turno, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Turno; " ; 
                  if (!isset($Campos_Erros['turno']))
                  {
                      $Campos_Erros['turno'] = array();
                  }
                  $Campos_Erros['turno'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['turno']) || !is_array($this->NM_ajax_info['errList']['turno']))
                  {
                      $this->NM_ajax_info['errList']['turno'] = array();
                  }
                  $this->NM_ajax_info['errList']['turno'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
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
    $this->nmgp_dados_form['codigo_cita'] = $this->codigo_cita;
    $this->nmgp_dados_form['tipo_qr'] = $this->tipo_qr;
    $this->nmgp_dados_form['fechainicio'] = (strlen(trim($this->fechainicio)) > 19) ? str_replace(".", ":", $this->fechainicio) : trim($this->fechainicio);
    $this->nmgp_dados_form['idtipomovimiento'] = $this->idtipomovimiento;
    $this->nmgp_dados_form['idestado'] = $this->idestado;
    $this->nmgp_dados_form['sec_users_login'] = $this->sec_users_login;
    $this->nmgp_dados_form['idpiloto'] = $this->idpiloto;
    $this->nmgp_dados_form['piloto'] = $this->piloto;
    $this->nmgp_dados_form['idcabezal'] = $this->idcabezal;
    $this->nmgp_dados_form['chasis'] = $this->chasis;
    $this->nmgp_dados_form['idselectivo'] = $this->idselectivo;
    $this->nmgp_dados_form['idnaviera'] = $this->idnaviera;
    $this->nmgp_dados_form['contenedorexport'] = $this->contenedorexport;
    $this->nmgp_dados_form['contenedorimport'] = $this->contenedorimport;
    $this->nmgp_dados_form['idtipodecarga'] = $this->idtipodecarga;
    $this->nmgp_dados_form['idviaje'] = $this->idviaje;
    $this->nmgp_dados_form['idyarda'] = $this->idyarda;
    $this->nmgp_dados_form['atc_ingreso'] = $this->atc_ingreso;
    $this->nmgp_dados_form['marchamo_ingreso'] = $this->marchamo_ingreso;
    $this->nmgp_dados_form['atc_despacho'] = $this->atc_despacho;
    $this->nmgp_dados_form['marchamo_despacho'] = $this->marchamo_despacho;
    $this->nmgp_dados_form['turno'] = $this->turno;
    $this->nmgp_dados_form['idcita'] = $this->idcita;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['revision'] = $this->revision;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['fechainicio'] = $this->fechainicio;
      nm_limpa_data($this->fechainicio, $this->field_config['fechainicio']['date_sep']) ; 
      nm_limpa_hora($this->fechainicio_hora, $this->field_config['fechainicio']['time_sep']) ; 
      $this->Before_unformat['idpiloto'] = $this->idpiloto;
      nm_limpa_numero($this->idpiloto, $this->field_config['idpiloto']['symbol_grp']) ; 
      $this->Before_unformat['idcabezal'] = $this->idcabezal;
      nm_limpa_numero($this->idcabezal, $this->field_config['idcabezal']['symbol_grp']) ; 
      $this->Before_unformat['idyarda'] = $this->idyarda;
      nm_limpa_numero($this->idyarda, $this->field_config['idyarda']['symbol_grp']) ; 
      $this->Before_unformat['turno'] = $this->turno;
      nm_limpa_numero($this->turno, $this->field_config['turno']['symbol_grp']) ; 
      $this->Before_unformat['idcita'] = $this->idcita;
      nm_limpa_numero($this->idcita, $this->field_config['idcita']['symbol_grp']) ; 
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
      if ($Nome_Campo == "idpiloto")
      {
          nm_limpa_numero($this->idpiloto, $this->field_config['idpiloto']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idcabezal")
      {
          nm_limpa_numero($this->idcabezal, $this->field_config['idcabezal']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idyarda")
      {
          nm_limpa_numero($this->idyarda, $this->field_config['idyarda']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "turno")
      {
          nm_limpa_numero($this->turno, $this->field_config['turno']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idcita")
      {
          nm_limpa_numero($this->idcita, $this->field_config['idcita']['symbol_grp']) ; 
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
      if ((!empty($this->fechainicio) && 'null' != $this->fechainicio) || (!empty($format_fields) && isset($format_fields['fechainicio'])))
      {
          $nm_separa_data = strpos($this->field_config['fechainicio']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fechainicio']['date_format'];
          $this->field_config['fechainicio']['date_format'] = substr($this->field_config['fechainicio']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fechainicio, " ") ; 
          $this->fechainicio_hora = substr($this->fechainicio, $separador + 1) ; 
          $this->fechainicio = substr($this->fechainicio, 0, $separador) ; 
          nm_volta_data($this->fechainicio, $this->field_config['fechainicio']['date_format']) ; 
          nmgp_Form_Datas($this->fechainicio, $this->field_config['fechainicio']['date_format'], $this->field_config['fechainicio']['date_sep']) ;  
          $this->field_config['fechainicio']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fechainicio_hora, $this->field_config['fechainicio']['date_format']) ; 
          nmgp_Form_Hora($this->fechainicio_hora, $this->field_config['fechainicio']['date_format'], $this->field_config['fechainicio']['time_sep']) ;  
          $this->field_config['fechainicio']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fechainicio || '' == $this->fechainicio)
      {
          $this->fechainicio_hora = '';
          $this->fechainicio = '';
      }
      if ('' !== $this->idpiloto || (!empty($format_fields) && isset($format_fields['idpiloto'])))
      {
          nmgp_Form_Num_Val($this->idpiloto, $this->field_config['idpiloto']['symbol_grp'], $this->field_config['idpiloto']['symbol_dec'], "0", "S", $this->field_config['idpiloto']['format_neg'], "", "", "-", $this->field_config['idpiloto']['symbol_fmt']) ; 
      }
      if ('' !== $this->idcabezal || (!empty($format_fields) && isset($format_fields['idcabezal'])))
      {
          nmgp_Form_Num_Val($this->idcabezal, $this->field_config['idcabezal']['symbol_grp'], $this->field_config['idcabezal']['symbol_dec'], "0", "S", $this->field_config['idcabezal']['format_neg'], "", "", "-", $this->field_config['idcabezal']['symbol_fmt']) ; 
      }
      if ('' !== $this->idyarda || (!empty($format_fields) && isset($format_fields['idyarda'])))
      {
          nmgp_Form_Num_Val($this->idyarda, $this->field_config['idyarda']['symbol_grp'], $this->field_config['idyarda']['symbol_dec'], "0", "S", $this->field_config['idyarda']['format_neg'], "", "", "-", $this->field_config['idyarda']['symbol_fmt']) ; 
      }
      if ('' !== $this->turno || (!empty($format_fields) && isset($format_fields['turno'])))
      {
          nmgp_Form_Num_Val($this->turno, $this->field_config['turno']['symbol_grp'], $this->field_config['turno']['symbol_dec'], "0", "S", $this->field_config['turno']['format_neg'], "", "", "-", $this->field_config['turno']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['fechainicio']['date_format'];
      if ($this->fechainicio != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fechainicio']['date_format'], ";") ;
          $this->field_config['fechainicio']['date_format'] = substr($this->field_config['fechainicio']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fechainicio, $this->field_config['fechainicio']['date_format']) ; 
          $this->field_config['fechainicio']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fechainicio_hora, $this->field_config['fechainicio']['date_format']) ; 
          if ($this->fechainicio_hora == "" )  
          { 
              $this->fechainicio_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fechainicio_hora = substr($this->fechainicio_hora, 0, -4) . "." . substr($this->fechainicio_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechainicio_hora = substr($this->fechainicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechainicio_hora = substr($this->fechainicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechainicio_hora = substr($this->fechainicio_hora, 0, -4);
          }
          if ($this->fechainicio != "")  
          { 
              $this->fechainicio .= " " . $this->fechainicio_hora ; 
          }
      } 
      if ($this->fechainicio == "" && $use_null)  
      { 
          $this->fechainicio = "null" ; 
      } 
      $this->field_config['fechainicio']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_codigo_cita();
          $this->ajax_return_values_tipo_qr();
          $this->ajax_return_values_fechainicio();
          $this->ajax_return_values_idtipomovimiento();
          $this->ajax_return_values_idestado();
          $this->ajax_return_values_sec_users_login();
          $this->ajax_return_values_idpiloto();
          $this->ajax_return_values_piloto();
          $this->ajax_return_values_idcabezal();
          $this->ajax_return_values_chasis();
          $this->ajax_return_values_idselectivo();
          $this->ajax_return_values_idnaviera();
          $this->ajax_return_values_contenedorexport();
          $this->ajax_return_values_contenedorimport();
          $this->ajax_return_values_idtipodecarga();
          $this->ajax_return_values_idviaje();
          $this->ajax_return_values_idyarda();
          $this->ajax_return_values_atc_ingreso();
          $this->ajax_return_values_marchamo_ingreso();
          $this->ajax_return_values_atc_despacho();
          $this->ajax_return_values_marchamo_despacho();
          $this->ajax_return_values_turno();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idcita']['keyVal'] = form_cita_2_pack_protect_string($this->nmgp_dados_form['idcita']);
          }
   } // ajax_return_values

          //----- codigo_cita
   function ajax_return_values_codigo_cita($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo_cita", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo_cita);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codigo_cita'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipo_qr
   function ajax_return_values_tipo_qr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_qr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_qr);
              $aLookup = array();
              $this->_tmp_lookup_tipo_qr = $this->tipo_qr;

$aLookup[] = array(form_cita_2_pack_protect_string('1') => form_cita_2_pack_protect_string("QR AUTOMATICO"));
$aLookup[] = array(form_cita_2_pack_protect_string('2') => form_cita_2_pack_protect_string("QR MANUAL"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_tipo_qr'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_tipo_qr'][] = '2';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_qr\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_qr']) && !empty($this->NM_ajax_info['select_html']['tipo_qr']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tipo_qr'];
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

                  if ($this->tipo_qr == $sValue)
                  {
                      $this->_tmp_lookup_tipo_qr = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_qr'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_qr']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_qr']['valList'][$i] = form_cita_2_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_qr']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_qr']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_qr']['labList'] = $aLabel;
          }
   }

          //----- fechainicio
   function ajax_return_values_fechainicio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechainicio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechainicio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechainicio'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['fechainicio_hora'] = array(
               'type'    => 'label',
               'valList' => array($this->fechainicio_hora),
              );
          }
   }

          //----- idtipomovimiento
   function ajax_return_values_idtipomovimiento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idtipomovimiento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idtipomovimiento);
              $aLookup = array();
              $this->_tmp_lookup_idtipomovimiento = $this->idtipomovimiento;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idtipoMovimiento, descripcion  FROM tipomovimiento  ORDER BY descripcion";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idtipomovimiento\"";
          if (isset($this->NM_ajax_info['select_html']['idtipomovimiento']) && !empty($this->NM_ajax_info['select_html']['idtipomovimiento']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idtipomovimiento'];
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

                  if ($this->idtipomovimiento == $sValue)
                  {
                      $this->_tmp_lookup_idtipomovimiento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idtipomovimiento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idtipomovimiento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idtipomovimiento']['valList'][$i] = form_cita_2_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idtipomovimiento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idtipomovimiento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idtipomovimiento']['labList'] = $aLabel;
          }
   }

          //----- idestado
   function ajax_return_values_idestado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idestado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idestado);
              $aLookup = array();
              $this->_tmp_lookup_idestado = $this->idestado;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idestado, estado  FROM estado  ORDER BY estado";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idestado\"";
          if (isset($this->NM_ajax_info['select_html']['idestado']) && !empty($this->NM_ajax_info['select_html']['idestado']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idestado'];
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

                  if ($this->idestado == $sValue)
                  {
                      $this->_tmp_lookup_idestado = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idestado'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idestado']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idestado']['valList'][$i] = form_cita_2_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idestado']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idestado']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idestado']['labList'] = $aLabel;
          }
   }

          //----- sec_users_login
   function ajax_return_values_sec_users_login($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sec_users_login", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sec_users_login);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sec_users_login'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idpiloto
   function ajax_return_values_idpiloto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idpiloto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idpiloto);
              $aLookup = array();
              $this->_tmp_lookup_idpiloto = $this->idpiloto;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->nm_clear_val("idpiloto");

   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idpiloto, licencia FROM piloto WHERE idpiloto = " . substr($this->Db->qstr($this->idpiloto), 1, -1) . " ORDER BY licencia";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   if ('' != $this->idpiloto)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idpiloto'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idpiloto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($unformatted_value_idpiloto),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idpiloto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idpiloto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idpiloto']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_cita_2_pack_protect_string(NM_charset_to_utf8($unformatted_value_idpiloto))]) ? $aLookup[0][form_cita_2_pack_protect_string(NM_charset_to_utf8($unformatted_value_idpiloto))] : "";
          $this->NM_ajax_info['fldList']['idpiloto_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- piloto
   function ajax_return_values_piloto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("piloto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->piloto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['piloto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idcabezal
   function ajax_return_values_idcabezal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idcabezal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idcabezal);
              $aLookup = array();
              $this->_tmp_lookup_idcabezal = $this->idcabezal;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->nm_clear_val("idcabezal");

   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = " . substr($this->Db->qstr($this->idcabezal), 1, -1) . " ORDER BY placa";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   if ('' != $this->idcabezal)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idcabezal'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idcabezal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($unformatted_value_idcabezal),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idcabezal']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idcabezal']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idcabezal']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_cita_2_pack_protect_string(NM_charset_to_utf8($unformatted_value_idcabezal))]) ? $aLookup[0][form_cita_2_pack_protect_string(NM_charset_to_utf8($unformatted_value_idcabezal))] : "";
          $this->NM_ajax_info['fldList']['idcabezal_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- chasis
   function ajax_return_values_chasis($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("chasis", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->chasis);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['chasis'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idselectivo
   function ajax_return_values_idselectivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idselectivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idselectivo);
              $aLookup = array();
              $this->_tmp_lookup_idselectivo = $this->idselectivo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo'] = array(); 
}
$aLookup[] = array(form_cita_2_pack_protect_string('') => form_cita_2_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idselectivo, selectivo  FROM selectivo  ORDER BY selectivo";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idselectivo\"";
          if (isset($this->NM_ajax_info['select_html']['idselectivo']) && !empty($this->NM_ajax_info['select_html']['idselectivo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idselectivo'];
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

                  if ($this->idselectivo == $sValue)
                  {
                      $this->_tmp_lookup_idselectivo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idselectivo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idselectivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idselectivo']['valList'][$i] = form_cita_2_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idselectivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idselectivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idselectivo']['labList'] = $aLabel;
          }
   }

          //----- idnaviera
   function ajax_return_values_idnaviera($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idnaviera", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idnaviera);
              $aLookup = array();
              $this->_tmp_lookup_idnaviera = $this->idnaviera;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera'] = array(); 
}
$aLookup[] = array(form_cita_2_pack_protect_string('') => form_cita_2_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idNaviera, naviera  FROM naviera  ORDER BY naviera";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idnaviera\"";
          if (isset($this->NM_ajax_info['select_html']['idnaviera']) && !empty($this->NM_ajax_info['select_html']['idnaviera']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idnaviera'];
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

                  if ($this->idnaviera == $sValue)
                  {
                      $this->_tmp_lookup_idnaviera = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idnaviera'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idnaviera']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idnaviera']['valList'][$i] = form_cita_2_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idnaviera']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idnaviera']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idnaviera']['labList'] = $aLabel;
          }
   }

          //----- contenedorexport
   function ajax_return_values_contenedorexport($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contenedorexport", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contenedorexport);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contenedorexport'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- contenedorimport
   function ajax_return_values_contenedorimport($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contenedorimport", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contenedorimport);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contenedorimport'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idtipodecarga
   function ajax_return_values_idtipodecarga($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idtipodecarga", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idtipodecarga);
              $aLookup = array();
              $this->_tmp_lookup_idtipodecarga = $this->idtipodecarga;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga'] = array(); 
}
$aLookup[] = array(form_cita_2_pack_protect_string('') => form_cita_2_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idtipodecarga, descripcion  FROM tipodecarga  ORDER BY descripcion";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idtipodecarga\"";
          if (isset($this->NM_ajax_info['select_html']['idtipodecarga']) && !empty($this->NM_ajax_info['select_html']['idtipodecarga']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idtipodecarga'];
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

                  if ($this->idtipodecarga == $sValue)
                  {
                      $this->_tmp_lookup_idtipodecarga = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idtipodecarga'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idtipodecarga']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idtipodecarga']['valList'][$i] = form_cita_2_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idtipodecarga']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idtipodecarga']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idtipodecarga']['labList'] = $aLabel;
          }
   }

          //----- idviaje
   function ajax_return_values_idviaje($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idviaje", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idviaje);
              $aLookup = array();
              $this->_tmp_lookup_idviaje = $this->idviaje;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idviaje, viaje FROM viaje WHERE (idestado=1) AND idviaje = " . substr($this->Db->qstr($this->idviaje), 1, -1) . " ORDER BY viaje";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   if ('' != $this->idviaje)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cita_2_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idviaje'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idviaje'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idviaje']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idviaje']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idviaje']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_cita_2_pack_protect_string(NM_charset_to_utf8($this->idviaje))]) ? $aLookup[0][form_cita_2_pack_protect_string(NM_charset_to_utf8($this->idviaje))] : "";
          $this->NM_ajax_info['fldList']['idviaje_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- idyarda
   function ajax_return_values_idyarda($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idyarda", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idyarda);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idyarda'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- atc_ingreso
   function ajax_return_values_atc_ingreso($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("atc_ingreso", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->atc_ingreso);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['atc_ingreso'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- marchamo_ingreso
   function ajax_return_values_marchamo_ingreso($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("marchamo_ingreso", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->marchamo_ingreso);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['marchamo_ingreso'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- atc_despacho
   function ajax_return_values_atc_despacho($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("atc_despacho", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->atc_despacho);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['atc_despacho'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- marchamo_despacho
   function ajax_return_values_marchamo_despacho($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("marchamo_despacho", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->marchamo_despacho);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['marchamo_despacho'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['upload_dir'][$fieldName][] = $newName;
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
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_codigo_cita = $this->codigo_cita;
    $original_idyarda = $this->idyarda;
    $original_sec_users_login = $this->sec_users_login;
}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
if (!isset($this->sc_temp_idyarda)) {$this->sc_temp_idyarda = (isset($_SESSION['idyarda'])) ? $_SESSION['idyarda'] : "";}
  $this->idyarda  = $this->sc_temp_idyarda;
$this->sec_users_login =$this->sc_temp_usr_login;
date_default_timezone_set('America/Guatemala');
$fecha=date("Y-m-d H:i:s");
$this->fechainicio =$fecha;
$this->sc_field_readonly("codigo_cita", 'on');
if (isset($this->sc_temp_idyarda)) { $_SESSION['idyarda'] = $this->sc_temp_idyarda;}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_codigo_cita != $this->codigo_cita || (isset($bFlagRead_codigo_cita) && $bFlagRead_codigo_cita)))
    {
        $this->ajax_return_values_codigo_cita(true);
    }
    if (($original_idyarda != $this->idyarda || (isset($bFlagRead_idyarda) && $bFlagRead_idyarda)))
    {
        $this->ajax_return_values_idyarda(true);
    }
    if (($original_sec_users_login != $this->sec_users_login || (isset($bFlagRead_sec_users_login) && $bFlagRead_sec_users_login)))
    {
        $this->ajax_return_values_sec_users_login(true);
    }
}
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off'; 
      }
      if (empty($this->fechainicio))
      {
          $this->fechainicio_hora = $this->fechainicio;
      }
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

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total']))
          {
               $sc_where_pos = " WHERE ((idCita < $this->idcita))";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->idcita)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opcao'] = '';

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
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_codigo_cita = $this->codigo_cita;
}
  $this->sc_field_readonly("codigo_cita", 'off');
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_codigo_cita != $this->codigo_cita || (isset($bFlagRead_codigo_cita) && $bFlagRead_codigo_cita)))
    {
        $this->ajax_return_values_codigo_cita(true);
    }
}
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off'; 
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
      $NM_val_form['codigo_cita'] = $this->codigo_cita;
      $NM_val_form['tipo_qr'] = $this->tipo_qr;
      $NM_val_form['fechainicio'] = $this->fechainicio;
      $NM_val_form['idtipomovimiento'] = $this->idtipomovimiento;
      $NM_val_form['idestado'] = $this->idestado;
      $NM_val_form['sec_users_login'] = $this->sec_users_login;
      $NM_val_form['idpiloto'] = $this->idpiloto;
      $NM_val_form['piloto'] = $this->piloto;
      $NM_val_form['idcabezal'] = $this->idcabezal;
      $NM_val_form['chasis'] = $this->chasis;
      $NM_val_form['idselectivo'] = $this->idselectivo;
      $NM_val_form['idnaviera'] = $this->idnaviera;
      $NM_val_form['contenedorexport'] = $this->contenedorexport;
      $NM_val_form['contenedorimport'] = $this->contenedorimport;
      $NM_val_form['idtipodecarga'] = $this->idtipodecarga;
      $NM_val_form['idviaje'] = $this->idviaje;
      $NM_val_form['idyarda'] = $this->idyarda;
      $NM_val_form['atc_ingreso'] = $this->atc_ingreso;
      $NM_val_form['marchamo_ingreso'] = $this->marchamo_ingreso;
      $NM_val_form['atc_despacho'] = $this->atc_despacho;
      $NM_val_form['marchamo_despacho'] = $this->marchamo_despacho;
      $NM_val_form['turno'] = $this->turno;
      $NM_val_form['idcita'] = $this->idcita;
      $NM_val_form['observaciones'] = $this->observaciones;
      $NM_val_form['revision'] = $this->revision;
      if ($this->idcita === "" || is_null($this->idcita))  
      { 
          $this->idcita = 0;
      } 
      if ($this->idnaviera === "" || is_null($this->idnaviera))  
      { 
          $this->idnaviera = 0;
          $this->sc_force_zero[] = 'idnaviera';
      } 
      if ($this->idtipodecarga === "" || is_null($this->idtipodecarga))  
      { 
          $this->idtipodecarga = 0;
          $this->sc_force_zero[] = 'idtipodecarga';
      } 
      if ($this->idestado === "" || is_null($this->idestado))  
      { 
          $this->idestado = 0;
          $this->sc_force_zero[] = 'idestado';
      } 
      if ($this->idpiloto === "" || is_null($this->idpiloto))  
      { 
          $this->idpiloto = 0;
          $this->sc_force_zero[] = 'idpiloto';
      } 
      if ($this->idcabezal === "" || is_null($this->idcabezal))  
      { 
          $this->idcabezal = 0;
          $this->sc_force_zero[] = 'idcabezal';
      } 
      if ($this->idselectivo === "" || is_null($this->idselectivo))  
      { 
          $this->idselectivo = 0;
          $this->sc_force_zero[] = 'idselectivo';
      } 
      if ($this->idyarda === "" || is_null($this->idyarda))  
      { 
          $this->idyarda = 0;
          $this->sc_force_zero[] = 'idyarda';
      } 
      if ($this->idtipomovimiento === "" || is_null($this->idtipomovimiento))  
      { 
          $this->idtipomovimiento = 0;
          $this->sc_force_zero[] = 'idtipomovimiento';
      } 
      if ($this->idviaje === "" || is_null($this->idviaje))  
      { 
          $this->idviaje = 0;
          $this->sc_force_zero[] = 'idviaje';
      } 
      if ($this->turno === "" || is_null($this->turno))  
      { 
          $this->turno = 0;
          $this->sc_force_zero[] = 'turno';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_ibase, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->codigo_cita_before_qstr = $this->codigo_cita;
          $this->codigo_cita = substr($this->Db->qstr($this->codigo_cita), 1, -1); 
          if ($this->codigo_cita == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigo_cita = "null"; 
              $NM_val_null[] = "codigo_cita";
          } 
          $this->contenedorimport_before_qstr = $this->contenedorimport;
          $this->contenedorimport = substr($this->Db->qstr($this->contenedorimport), 1, -1); 
          if ($this->contenedorimport == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contenedorimport = "null"; 
              $NM_val_null[] = "contenedorimport";
          } 
          $this->contenedorexport_before_qstr = $this->contenedorexport;
          $this->contenedorexport = substr($this->Db->qstr($this->contenedorexport), 1, -1); 
          if ($this->contenedorexport == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contenedorexport = "null"; 
              $NM_val_null[] = "contenedorexport";
          } 
          $this->observaciones_before_qstr = $this->observaciones;
          $this->observaciones = substr($this->Db->qstr($this->observaciones), 1, -1); 
          if ($this->observaciones == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones = "null"; 
              $NM_val_null[] = "observaciones";
          } 
          if ($this->fechainicio == "")  
          { 
              $this->fechainicio = "null"; 
              $NM_val_null[] = "fechainicio";
          } 
          $this->chasis_before_qstr = $this->chasis;
          $this->chasis = substr($this->Db->qstr($this->chasis), 1, -1); 
          if ($this->chasis == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->chasis = "null"; 
              $NM_val_null[] = "chasis";
          } 
          $this->atc_ingreso_before_qstr = $this->atc_ingreso;
          $this->atc_ingreso = substr($this->Db->qstr($this->atc_ingreso), 1, -1); 
          if ($this->atc_ingreso == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->atc_ingreso = "null"; 
              $NM_val_null[] = "atc_ingreso";
          } 
          $this->marchamo_ingreso_before_qstr = $this->marchamo_ingreso;
          $this->marchamo_ingreso = substr($this->Db->qstr($this->marchamo_ingreso), 1, -1); 
          if ($this->marchamo_ingreso == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->marchamo_ingreso = "null"; 
              $NM_val_null[] = "marchamo_ingreso";
          } 
          $this->revision_before_qstr = $this->revision;
          $this->revision = substr($this->Db->qstr($this->revision), 1, -1); 
          if ($this->revision == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->revision = "null"; 
              $NM_val_null[] = "revision";
          } 
          $this->atc_despacho_before_qstr = $this->atc_despacho;
          $this->atc_despacho = substr($this->Db->qstr($this->atc_despacho), 1, -1); 
          if ($this->atc_despacho == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->atc_despacho = "null"; 
              $NM_val_null[] = "atc_despacho";
          } 
          $this->marchamo_despacho_before_qstr = $this->marchamo_despacho;
          $this->marchamo_despacho = substr($this->Db->qstr($this->marchamo_despacho), 1, -1); 
          if ($this->marchamo_despacho == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->marchamo_despacho = "null"; 
              $NM_val_null[] = "marchamo_despacho";
          } 
          $this->sec_users_login_before_qstr = $this->sec_users_login;
          $this->sec_users_login = substr($this->Db->qstr($this->sec_users_login), 1, -1); 
          if ($this->sec_users_login == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sec_users_login = "null"; 
              $NM_val_null[] = "sec_users_login";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idCita = $this->idcita ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idCita = $this->idcita "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idCita = $this->idcita ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idCita = $this->idcita "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_cita_2_pack_ajax_response();
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
                  $SC_fields_update[] = "codigo_cita = '$this->codigo_cita', contenedorimport = '$this->contenedorimport', contenedorExport = '$this->contenedorexport', fechaInicio = #$this->fechainicio#, chasis = '$this->chasis', idNaviera = $this->idnaviera, idtipodecarga = $this->idtipodecarga, idestado = $this->idestado, idpiloto = $this->idpiloto, idcabezal = $this->idcabezal, idselectivo = $this->idselectivo, idyarda = $this->idyarda, idtipoMovimiento = $this->idtipomovimiento, idviaje = $this->idviaje, atc_ingreso = '$this->atc_ingreso', marchamo_ingreso = '$this->marchamo_ingreso', atc_despacho = '$this->atc_despacho', marchamo_despacho = '$this->marchamo_despacho', sec_users_login = '$this->sec_users_login', turno = $this->turno"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codigo_cita = '$this->codigo_cita', contenedorimport = '$this->contenedorimport', contenedorExport = '$this->contenedorexport', fechaInicio = " . $this->Ini->date_delim . $this->fechainicio . $this->Ini->date_delim1 . ", chasis = '$this->chasis', idNaviera = $this->idnaviera, idtipodecarga = $this->idtipodecarga, idestado = $this->idestado, idpiloto = $this->idpiloto, idcabezal = $this->idcabezal, idselectivo = $this->idselectivo, idyarda = $this->idyarda, idtipoMovimiento = $this->idtipomovimiento, idviaje = $this->idviaje, atc_ingreso = '$this->atc_ingreso', marchamo_ingreso = '$this->marchamo_ingreso', atc_despacho = '$this->atc_despacho', marchamo_despacho = '$this->marchamo_despacho', sec_users_login = '$this->sec_users_login', turno = $this->turno"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codigo_cita = '$this->codigo_cita', contenedorimport = '$this->contenedorimport', contenedorExport = '$this->contenedorexport', fechaInicio = " . $this->Ini->date_delim . $this->fechainicio . $this->Ini->date_delim1 . ", chasis = '$this->chasis', idNaviera = $this->idnaviera, idtipodecarga = $this->idtipodecarga, idestado = $this->idestado, idpiloto = $this->idpiloto, idcabezal = $this->idcabezal, idselectivo = $this->idselectivo, idyarda = $this->idyarda, idtipoMovimiento = $this->idtipomovimiento, idviaje = $this->idviaje, atc_ingreso = '$this->atc_ingreso', marchamo_ingreso = '$this->marchamo_ingreso', atc_despacho = '$this->atc_despacho', marchamo_despacho = '$this->marchamo_despacho', sec_users_login = '$this->sec_users_login', turno = $this->turno"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codigo_cita = '$this->codigo_cita', contenedorimport = '$this->contenedorimport', contenedorExport = '$this->contenedorexport', fechaInicio = " . $this->Ini->date_delim . $this->fechainicio . $this->Ini->date_delim1 . ", chasis = '$this->chasis', idNaviera = $this->idnaviera, idtipodecarga = $this->idtipodecarga, idestado = $this->idestado, idpiloto = $this->idpiloto, idcabezal = $this->idcabezal, idselectivo = $this->idselectivo, idyarda = $this->idyarda, idtipoMovimiento = $this->idtipomovimiento, idviaje = $this->idviaje, atc_ingreso = '$this->atc_ingreso', marchamo_ingreso = '$this->marchamo_ingreso', atc_despacho = '$this->atc_despacho', marchamo_despacho = '$this->marchamo_despacho', sec_users_login = '$this->sec_users_login', turno = $this->turno"; 
              } 
              if (isset($NM_val_form['observaciones']) && $NM_val_form['observaciones'] != $this->nmgp_dados_select['observaciones']) 
              { 
                  $SC_fields_update[] = "observaciones = '$this->observaciones'"; 
              } 
              if (isset($NM_val_form['revision']) && $NM_val_form['revision'] != $this->nmgp_dados_select['revision']) 
              { 
                  $SC_fields_update[] = "revision = '$this->revision'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idCita = $this->idcita ";  
              }  
              else  
              {
                  $comando .= " WHERE idCita = $this->idcita ";  
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
                                  form_cita_2_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->codigo_cita = $this->codigo_cita_before_qstr;
              $this->contenedorimport = $this->contenedorimport_before_qstr;
              $this->contenedorexport = $this->contenedorexport_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->chasis = $this->chasis_before_qstr;
              $this->atc_ingreso = $this->atc_ingreso_before_qstr;
              $this->marchamo_ingreso = $this->marchamo_ingreso_before_qstr;
              $this->revision = $this->revision_before_qstr;
              $this->atc_despacho = $this->atc_despacho_before_qstr;
              $this->marchamo_despacho = $this->marchamo_despacho_before_qstr;
              $this->sec_users_login = $this->sec_users_login_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['codigo_cita'])) { $this->codigo_cita = $NM_val_form['codigo_cita']; }
              elseif (isset($this->codigo_cita)) { $this->nm_limpa_alfa($this->codigo_cita); }
              if     (isset($NM_val_form) && isset($NM_val_form['contenedorimport'])) { $this->contenedorimport = $NM_val_form['contenedorimport']; }
              elseif (isset($this->contenedorimport)) { $this->nm_limpa_alfa($this->contenedorimport); }
              if     (isset($NM_val_form) && isset($NM_val_form['contenedorexport'])) { $this->contenedorexport = $NM_val_form['contenedorexport']; }
              elseif (isset($this->contenedorexport)) { $this->nm_limpa_alfa($this->contenedorexport); }
              if     (isset($NM_val_form) && isset($NM_val_form['chasis'])) { $this->chasis = $NM_val_form['chasis']; }
              elseif (isset($this->chasis)) { $this->nm_limpa_alfa($this->chasis); }
              if     (isset($NM_val_form) && isset($NM_val_form['idnaviera'])) { $this->idnaviera = $NM_val_form['idnaviera']; }
              elseif (isset($this->idnaviera)) { $this->nm_limpa_alfa($this->idnaviera); }
              if     (isset($NM_val_form) && isset($NM_val_form['idtipodecarga'])) { $this->idtipodecarga = $NM_val_form['idtipodecarga']; }
              elseif (isset($this->idtipodecarga)) { $this->nm_limpa_alfa($this->idtipodecarga); }
              if     (isset($NM_val_form) && isset($NM_val_form['idestado'])) { $this->idestado = $NM_val_form['idestado']; }
              elseif (isset($this->idestado)) { $this->nm_limpa_alfa($this->idestado); }
              if     (isset($NM_val_form) && isset($NM_val_form['idpiloto'])) { $this->idpiloto = $NM_val_form['idpiloto']; }
              elseif (isset($this->idpiloto)) { $this->nm_limpa_alfa($this->idpiloto); }
              if     (isset($NM_val_form) && isset($NM_val_form['idcabezal'])) { $this->idcabezal = $NM_val_form['idcabezal']; }
              elseif (isset($this->idcabezal)) { $this->nm_limpa_alfa($this->idcabezal); }
              if     (isset($NM_val_form) && isset($NM_val_form['idselectivo'])) { $this->idselectivo = $NM_val_form['idselectivo']; }
              elseif (isset($this->idselectivo)) { $this->nm_limpa_alfa($this->idselectivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['idyarda'])) { $this->idyarda = $NM_val_form['idyarda']; }
              elseif (isset($this->idyarda)) { $this->nm_limpa_alfa($this->idyarda); }
              if     (isset($NM_val_form) && isset($NM_val_form['idtipomovimiento'])) { $this->idtipomovimiento = $NM_val_form['idtipomovimiento']; }
              elseif (isset($this->idtipomovimiento)) { $this->nm_limpa_alfa($this->idtipomovimiento); }
              if     (isset($NM_val_form) && isset($NM_val_form['idviaje'])) { $this->idviaje = $NM_val_form['idviaje']; }
              elseif (isset($this->idviaje)) { $this->nm_limpa_alfa($this->idviaje); }
              if     (isset($NM_val_form) && isset($NM_val_form['atc_ingreso'])) { $this->atc_ingreso = $NM_val_form['atc_ingreso']; }
              elseif (isset($this->atc_ingreso)) { $this->nm_limpa_alfa($this->atc_ingreso); }
              if     (isset($NM_val_form) && isset($NM_val_form['marchamo_ingreso'])) { $this->marchamo_ingreso = $NM_val_form['marchamo_ingreso']; }
              elseif (isset($this->marchamo_ingreso)) { $this->nm_limpa_alfa($this->marchamo_ingreso); }
              if     (isset($NM_val_form) && isset($NM_val_form['atc_despacho'])) { $this->atc_despacho = $NM_val_form['atc_despacho']; }
              elseif (isset($this->atc_despacho)) { $this->nm_limpa_alfa($this->atc_despacho); }
              if     (isset($NM_val_form) && isset($NM_val_form['marchamo_despacho'])) { $this->marchamo_despacho = $NM_val_form['marchamo_despacho']; }
              elseif (isset($this->marchamo_despacho)) { $this->nm_limpa_alfa($this->marchamo_despacho); }
              if     (isset($NM_val_form) && isset($NM_val_form['sec_users_login'])) { $this->sec_users_login = $NM_val_form['sec_users_login']; }
              elseif (isset($this->sec_users_login)) { $this->nm_limpa_alfa($this->sec_users_login); }
              if     (isset($NM_val_form) && isset($NM_val_form['turno'])) { $this->turno = $NM_val_form['turno']; }
              elseif (isset($this->turno)) { $this->nm_limpa_alfa($this->turno); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('codigo_cita', 'tipo_qr', 'fechainicio', 'idtipomovimiento', 'idestado', 'sec_users_login', 'idpiloto', 'piloto', 'idcabezal', 'chasis', 'idselectivo', 'idnaviera', 'contenedorexport', 'contenedorimport', 'idtipodecarga', 'idviaje', 'idyarda', 'atc_ingreso', 'marchamo_ingreso', 'atc_despacho', 'marchamo_despacho', 'turno'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['foreign_key'] as $sFKName => $sFKValue)
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
              $NM_cmp_auto = "idCita, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_cita_2_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (codigo_cita, contenedorimport, contenedorExport, observaciones, fechaInicio, chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje, atc_ingreso, marchamo_ingreso, revision, atc_despacho, marchamo_despacho, sec_users_login, turno) VALUES ('$this->codigo_cita', '$this->contenedorimport', '$this->contenedorexport', '$this->observaciones', #$this->fechainicio#, '$this->chasis', $this->idnaviera, $this->idtipodecarga, $this->idestado, $this->idpiloto, $this->idcabezal, $this->idselectivo, $this->idyarda, $this->idtipomovimiento, $this->idviaje, '$this->atc_ingreso', '$this->marchamo_ingreso', '$this->revision', '$this->atc_despacho', '$this->marchamo_despacho', '$this->sec_users_login', $this->turno)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigo_cita, contenedorimport, contenedorExport, observaciones, fechaInicio, chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje, atc_ingreso, marchamo_ingreso, revision, atc_despacho, marchamo_despacho, sec_users_login, turno) VALUES (" . $NM_seq_auto . "'$this->codigo_cita', '$this->contenedorimport', '$this->contenedorexport', '$this->observaciones', " . $this->Ini->date_delim . $this->fechainicio . $this->Ini->date_delim1 . ", '$this->chasis', $this->idnaviera, $this->idtipodecarga, $this->idestado, $this->idpiloto, $this->idcabezal, $this->idselectivo, $this->idyarda, $this->idtipomovimiento, $this->idviaje, '$this->atc_ingreso', '$this->marchamo_ingreso', '$this->revision', '$this->atc_despacho', '$this->marchamo_despacho', '$this->sec_users_login', $this->turno)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigo_cita, contenedorimport, contenedorExport, observaciones, fechaInicio, chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje, atc_ingreso, marchamo_ingreso, revision, atc_despacho, marchamo_despacho, sec_users_login, turno) VALUES (" . $NM_seq_auto . "'$this->codigo_cita', '$this->contenedorimport', '$this->contenedorexport', '$this->observaciones', " . $this->Ini->date_delim . $this->fechainicio . $this->Ini->date_delim1 . ", '$this->chasis', $this->idnaviera, $this->idtipodecarga, $this->idestado, $this->idpiloto, $this->idcabezal, $this->idselectivo, $this->idyarda, $this->idtipomovimiento, $this->idviaje, '$this->atc_ingreso', '$this->marchamo_ingreso', '$this->revision', '$this->atc_despacho', '$this->marchamo_despacho', '$this->sec_users_login', $this->turno)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigo_cita, contenedorimport, contenedorExport, observaciones, fechaInicio, chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje, atc_ingreso, marchamo_ingreso, revision, atc_despacho, marchamo_despacho, sec_users_login, turno) VALUES (" . $NM_seq_auto . "'$this->codigo_cita', '$this->contenedorimport', '$this->contenedorexport', '$this->observaciones', " . $this->Ini->date_delim . $this->fechainicio . $this->Ini->date_delim1 . ", '$this->chasis', $this->idnaviera, $this->idtipodecarga, $this->idestado, $this->idpiloto, $this->idcabezal, $this->idselectivo, $this->idyarda, $this->idtipomovimiento, $this->idviaje, '$this->atc_ingreso', '$this->marchamo_ingreso', '$this->revision', '$this->atc_despacho', '$this->marchamo_despacho', '$this->sec_users_login', $this->turno)"; 
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
                              form_cita_2_pack_ajax_response();
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
                          form_cita_2_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idcita =  $rsy->fields[0];
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
                  $this->idcita = $rsy->fields[0];
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
                  $this->idcita = $rsy->fields[0];
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
                  $this->idcita = $rsy->fields[0];
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
                  $this->idcita = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->codigo_cita = $this->codigo_cita_before_qstr;
              $this->contenedorimport = $this->contenedorimport_before_qstr;
              $this->contenedorexport = $this->contenedorexport_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->chasis = $this->chasis_before_qstr;
              $this->atc_ingreso = $this->atc_ingreso_before_qstr;
              $this->marchamo_ingreso = $this->marchamo_ingreso_before_qstr;
              $this->revision = $this->revision_before_qstr;
              $this->atc_despacho = $this->atc_despacho_before_qstr;
              $this->marchamo_despacho = $this->marchamo_despacho_before_qstr;
              $this->sec_users_login = $this->sec_users_login_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['return_edit'] = "new";
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
          $this->idcita = substr($this->Db->qstr($this->idcita), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idCita = $this->idcita"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idCita = $this->idcita "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idCita = $this->idcita"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idCita = $this->idcita "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idCita = $this->idcita "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idCita = $this->idcita "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idCita = $this->idcita "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idCita = $this->idcita "); 
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
                          form_cita_2_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total']);
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
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_codigo_cita = $this->codigo_cita;
}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
if (!isset($this->sc_temp_idyarda)) {$this->sc_temp_idyarda = (isset($_SESSION['idyarda'])) ? $_SESSION['idyarda'] : "";}
  date_default_timezone_set('America/Guatemala');
$fecha=date('Y-m-d H:i:s');
$var=$this->codigo_cita ;

$insert_table  = 'bitacora_cita';     
$insert_fields = array(  
     'fecha' => "'$fecha'",
     'cita_idCita' => "(SELECT idCita FROM cita where codigo_cita='".$this->codigo_cita ."' ORDER BY idCita DESC limit 0,1)",
	 'yarda' => "$this->sc_temp_idyarda",
	 'idTipoMovimiento' => "$this->idtipomovimiento ",
	 'correlativo_de_control' => "1",
	 'usuario' => "'$this->sc_temp_usr_login'",
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
                form_cita_2_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_idyarda)) { $_SESSION['idyarda'] = $this->sc_temp_idyarda;}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_codigo_cita != $this->codigo_cita || (isset($bFlagRead_codigo_cita) && $bFlagRead_codigo_cita)))
    {
        $this->ajax_return_values_codigo_cita(true);
    }
}
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['parms'] = "idcita?#?$this->idcita?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idcita = null === $this->idcita ? null : substr($this->Db->qstr($this->idcita), 1, -1); 
      } 
      if ($this->nmgp_opcao != "nada") 
      {
          $this->nmgp_opcao = "novo"; 
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idCita, codigo_cita, contenedorimport, contenedorExport, observaciones, str_replace (convert(char(10),fechaInicio,102), '.', '-') + ' ' + convert(char(8),fechaInicio,20), chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje, atc_ingreso, marchamo_ingreso, revision, atc_despacho, marchamo_despacho, sec_users_login, turno from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idCita, codigo_cita, contenedorimport, contenedorExport, observaciones, fechaInicio, chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje, atc_ingreso, marchamo_ingreso, revision, atc_despacho, marchamo_despacho, sec_users_login, turno from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idCita = $this->idcita"; 
              }  
              else  
              {
                  $aWhere[] = "idCita = $this->idcita"; 
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
          $sc_order_by = "idCita";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['select'] = ""; 
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
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
              $this->idcita = $rs->fields[0] ; 
              $this->nmgp_dados_select['idcita'] = $this->idcita;
              $this->codigo_cita = $rs->fields[1] ; 
              $this->nmgp_dados_select['codigo_cita'] = $this->codigo_cita;
              $this->contenedorimport = $rs->fields[2] ; 
              $this->nmgp_dados_select['contenedorimport'] = $this->contenedorimport;
              $this->contenedorexport = $rs->fields[3] ; 
              $this->nmgp_dados_select['contenedorexport'] = $this->contenedorexport;
              $this->observaciones = $rs->fields[4] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->fechainicio = $rs->fields[5] ; 
              if (substr($this->fechainicio, 10, 1) == "-") 
              { 
                 $this->fechainicio = substr($this->fechainicio, 0, 10) . " " . substr($this->fechainicio, 11);
              } 
              if (substr($this->fechainicio, 13, 1) == ".") 
              { 
                 $this->fechainicio = substr($this->fechainicio, 0, 13) . ":" . substr($this->fechainicio, 14, 2) . ":" . substr($this->fechainicio, 17);
              } 
              $this->nmgp_dados_select['fechainicio'] = $this->fechainicio;
              $this->chasis = $rs->fields[6] ; 
              $this->nmgp_dados_select['chasis'] = $this->chasis;
              $this->idnaviera = $rs->fields[7] ; 
              $this->nmgp_dados_select['idnaviera'] = $this->idnaviera;
              $this->idtipodecarga = $rs->fields[8] ; 
              $this->nmgp_dados_select['idtipodecarga'] = $this->idtipodecarga;
              $this->idestado = $rs->fields[9] ; 
              $this->nmgp_dados_select['idestado'] = $this->idestado;
              $this->idpiloto = $rs->fields[10] ; 
              $this->nmgp_dados_select['idpiloto'] = $this->idpiloto;
              $this->idcabezal = $rs->fields[11] ; 
              $this->nmgp_dados_select['idcabezal'] = $this->idcabezal;
              $this->idselectivo = $rs->fields[12] ; 
              $this->nmgp_dados_select['idselectivo'] = $this->idselectivo;
              $this->idyarda = $rs->fields[13] ; 
              $this->nmgp_dados_select['idyarda'] = $this->idyarda;
              $this->idtipomovimiento = $rs->fields[14] ; 
              $this->nmgp_dados_select['idtipomovimiento'] = $this->idtipomovimiento;
              $this->idviaje = $rs->fields[15] ; 
              $this->nmgp_dados_select['idviaje'] = $this->idviaje;
              $this->atc_ingreso = $rs->fields[16] ; 
              $this->nmgp_dados_select['atc_ingreso'] = $this->atc_ingreso;
              $this->marchamo_ingreso = $rs->fields[17] ; 
              $this->nmgp_dados_select['marchamo_ingreso'] = $this->marchamo_ingreso;
              $this->revision = $rs->fields[18] ; 
              $this->nmgp_dados_select['revision'] = $this->revision;
              $this->atc_despacho = $rs->fields[19] ; 
              $this->nmgp_dados_select['atc_despacho'] = $this->atc_despacho;
              $this->marchamo_despacho = $rs->fields[20] ; 
              $this->nmgp_dados_select['marchamo_despacho'] = $this->marchamo_despacho;
              $this->sec_users_login = $rs->fields[21] ; 
              $this->nmgp_dados_select['sec_users_login'] = $this->sec_users_login;
              $this->turno = $rs->fields[22] ; 
              $this->nmgp_dados_select['turno'] = $this->turno;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->idcita = (string)$this->idcita; 
              $this->idnaviera = (string)$this->idnaviera; 
              $this->idtipodecarga = (string)$this->idtipodecarga; 
              $this->idestado = (string)$this->idestado; 
              $this->idpiloto = (string)$this->idpiloto; 
              $this->idcabezal = (string)$this->idcabezal; 
              $this->idselectivo = (string)$this->idselectivo; 
              $this->idyarda = (string)$this->idyarda; 
              $this->idtipomovimiento = (string)$this->idtipomovimiento; 
              $this->idviaje = (string)$this->idviaje; 
              $this->turno = (string)$this->turno; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['parms'] = "idcita?#?$this->idcita?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dados_select'] = $this->nmgp_dados_select;
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
              $this->idcita = "";  
              $this->nmgp_dados_form["idcita"] = $this->idcita;
              $this->codigo_cita = "###";  
              $this->nmgp_dados_form["codigo_cita"] = $this->codigo_cita;
              $this->contenedorimport = "";  
              $this->nmgp_dados_form["contenedorimport"] = $this->contenedorimport;
              $this->contenedorexport = "";  
              $this->nmgp_dados_form["contenedorexport"] = $this->contenedorexport;
              $this->observaciones = "";  
              $this->nmgp_dados_form["observaciones"] = $this->observaciones;
              $this->fechainicio = "";  
              $this->fechainicio_hora = "" ;  
              $this->nmgp_dados_form["fechainicio"] = $this->fechainicio;
              $this->chasis = "";  
              $this->nmgp_dados_form["chasis"] = $this->chasis;
              $this->idnaviera = "";  
              $this->nmgp_dados_form["idnaviera"] = $this->idnaviera;
              $this->idtipodecarga = "";  
              $this->nmgp_dados_form["idtipodecarga"] = $this->idtipodecarga;
              $this->idestado = "1";  
              $this->nmgp_dados_form["idestado"] = $this->idestado;
              $this->idpiloto = "";  
              $this->nmgp_dados_form["idpiloto"] = $this->idpiloto;
              $this->idcabezal = "";  
              $this->nmgp_dados_form["idcabezal"] = $this->idcabezal;
              $this->idselectivo = "";  
              $this->nmgp_dados_form["idselectivo"] = $this->idselectivo;
              $this->idyarda = "";  
              $this->nmgp_dados_form["idyarda"] = $this->idyarda;
              $this->idtipomovimiento = "1";  
              $this->nmgp_dados_form["idtipomovimiento"] = $this->idtipomovimiento;
              $this->idviaje = "";  
              $this->nmgp_dados_form["idviaje"] = $this->idviaje;
              $this->atc_ingreso = "";  
              $this->nmgp_dados_form["atc_ingreso"] = $this->atc_ingreso;
              $this->marchamo_ingreso = "";  
              $this->nmgp_dados_form["marchamo_ingreso"] = $this->marchamo_ingreso;
              $this->revision = "";  
              $this->nmgp_dados_form["revision"] = $this->revision;
              $this->atc_despacho = "";  
              $this->nmgp_dados_form["atc_despacho"] = $this->atc_despacho;
              $this->marchamo_despacho = "";  
              $this->nmgp_dados_form["marchamo_despacho"] = $this->marchamo_despacho;
              $this->sec_users_login = "";  
              $this->nmgp_dados_form["sec_users_login"] = $this->sec_users_login;
              $this->turno = "";  
              $this->nmgp_dados_form["turno"] = $this->turno;
              $this->piloto = "";  
              $this->nmgp_dados_form["piloto"] = $this->piloto;
              $this->tipo_qr = "1";  
              $this->nmgp_dados_form["tipo_qr"] = $this->tipo_qr;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['foreign_key'] as $sFKName => $sFKValue)
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function TIPO_QR_onChange()
{
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
  
$original_tipo_qr = $this->tipo_qr;
$original_codigo_cita = $this->codigo_cita;
$original_codigo_cita = $this->codigo_cita;

if($this->tipo_qr ==1){
	$this->sc_field_readonly("codigo_cita", 'on');
	$this->codigo_cita ='####';
}else{
	$this->sc_field_readonly("codigo_cita", 'off');
}

$modificado_tipo_qr = $this->tipo_qr;
$modificado_codigo_cita = $this->codigo_cita;
$modificado_codigo_cita = $this->codigo_cita;
$this->nm_formatar_campos('tipo_qr', 'codigo_cita');
if ($original_tipo_qr !== $modificado_tipo_qr || isset($this->nmgp_cmp_readonly['tipo_qr']) || (isset($bFlagRead_tipo_qr) && $bFlagRead_tipo_qr))
{
    $this->ajax_return_values_tipo_qr(true);
}
if ($original_codigo_cita !== $modificado_codigo_cita || isset($this->nmgp_cmp_readonly['codigo_cita']) || (isset($bFlagRead_codigo_cita) && $bFlagRead_codigo_cita))
{
    $this->ajax_return_values_codigo_cita(true);
}
if ($original_codigo_cita !== $modificado_codigo_cita || isset($this->nmgp_cmp_readonly['codigo_cita']) || (isset($bFlagRead_codigo_cita) && $bFlagRead_codigo_cita))
{
    $this->ajax_return_values_codigo_cita(true);
}
$this->NM_ajax_info['event_field'] = 'TIPO';
form_cita_2_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off';
}
function generarQR(){
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
  
	date_default_timezone_set('America/Guatemala');
	$fecha = new DateTime();
	$semana = $fecha->format('W');
	$fecha2=date("d H:i:s");
	$this->codigo_cita ='TFPB'. $semana .$fecha2. $this->idcabezal .$this->idnaviera ;

$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off';
}
function idNaviera_onChange()
{
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
  
$original_codigo_cita = $this->codigo_cita;
$original_idcabezal = $this->idcabezal;
$original_idnaviera = $this->idnaviera;
$original_idnaviera = $this->idnaviera;
$original_idyarda = $this->idyarda;
$original_idcabezal = $this->idcabezal;
$original_idpiloto = $this->idpiloto;

$this->generarQR();



$modificado_codigo_cita = $this->codigo_cita;
$modificado_idcabezal = $this->idcabezal;
$modificado_idnaviera = $this->idnaviera;
$modificado_idnaviera = $this->idnaviera;
$modificado_idyarda = $this->idyarda;
$modificado_idcabezal = $this->idcabezal;
$modificado_idpiloto = $this->idpiloto;
$this->nm_formatar_campos('codigo_cita', 'idcabezal', 'idnaviera');
if ($original_codigo_cita !== $modificado_codigo_cita || isset($this->nmgp_cmp_readonly['codigo_cita']) || (isset($bFlagRead_codigo_cita) && $bFlagRead_codigo_cita))
{
    $this->ajax_return_values_codigo_cita(true);
}
if ($original_idcabezal !== $modificado_idcabezal || isset($this->nmgp_cmp_readonly['idcabezal']) || (isset($bFlagRead_idcabezal) && $bFlagRead_idcabezal))
{
    $this->ajax_return_values_idcabezal(true);
}
if ($original_idnaviera !== $modificado_idnaviera || isset($this->nmgp_cmp_readonly['idnaviera']) || (isset($bFlagRead_idnaviera) && $bFlagRead_idnaviera))
{
    $this->ajax_return_values_idnaviera(true);
}
if ($original_idnaviera !== $modificado_idnaviera || isset($this->nmgp_cmp_readonly['idnaviera']) || (isset($bFlagRead_idnaviera) && $bFlagRead_idnaviera))
{
    $this->ajax_return_values_idnaviera(true);
}
if ($original_idyarda !== $modificado_idyarda || isset($this->nmgp_cmp_readonly['idyarda']) || (isset($bFlagRead_idyarda) && $bFlagRead_idyarda))
{
    $this->ajax_return_values_idyarda(true);
}
if ($original_idcabezal !== $modificado_idcabezal || isset($this->nmgp_cmp_readonly['idcabezal']) || (isset($bFlagRead_idcabezal) && $bFlagRead_idcabezal))
{
    $this->ajax_return_values_idcabezal(true);
}
if ($original_idpiloto !== $modificado_idpiloto || isset($this->nmgp_cmp_readonly['idpiloto']) || (isset($bFlagRead_idpiloto) && $bFlagRead_idpiloto))
{
    $this->ajax_return_values_idpiloto(true);
}
$this->NM_ajax_info['event_field'] = 'idNaviera';
form_cita_2_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off';
}
function validaPiloto(){
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
  
	$check_sql = "SELECT nombre"
	   . " FROM piloto"
	   . " WHERE idpiloto = '" . $this->idpiloto  . "'";
	 
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
		$this->piloto  = $this->rs[0][0];

	}
			else     
	{
				$this->piloto  = 'NO REGISTRADO';
	}
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off';
}
function validaTurno(){
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
if (!isset($this->sc_temp_VIGENTE)) {$this->sc_temp_VIGENTE = (isset($_SESSION['VIGENTE'])) ? $_SESSION['VIGENTE'] : "";}
  
	$check_sql = "SELECT codigo_cita"
   . " FROM cita"
   . " WHERE idestado = '$this->sc_temp_VIGENTE' and codigo_cita ='" . $this->codigo_cita  . "'";
 
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
		$this->codigo_cita  = 'ERROR - TURNO VIGENTE';
	}
if (isset($this->sc_temp_VIGENTE)) { $_SESSION['VIGENTE'] = $this->sc_temp_VIGENTE;}
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off';
}
function idpiloto_onChange()
{
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
  
$original_idpiloto = $this->idpiloto;
$original_piloto = $this->piloto;
$original_codigo_cita = $this->codigo_cita;

$this->validaPiloto();
$this->validaTurno();








$modificado_idpiloto = $this->idpiloto;
$modificado_piloto = $this->piloto;
$modificado_codigo_cita = $this->codigo_cita;
$this->nm_formatar_campos('idpiloto', 'piloto', 'codigo_cita');
if ($original_idpiloto !== $modificado_idpiloto || isset($this->nmgp_cmp_readonly['idpiloto']) || (isset($bFlagRead_idpiloto) && $bFlagRead_idpiloto))
{
    $this->ajax_return_values_idpiloto(true);
}
if ($original_piloto !== $modificado_piloto || isset($this->nmgp_cmp_readonly['piloto']) || (isset($bFlagRead_piloto) && $bFlagRead_piloto))
{
    $this->ajax_return_values_piloto(true);
}
if ($original_codigo_cita !== $modificado_codigo_cita || isset($this->nmgp_cmp_readonly['codigo_cita']) || (isset($bFlagRead_codigo_cita) && $bFlagRead_codigo_cita))
{
    $this->ajax_return_values_codigo_cita(true);
}
$this->NM_ajax_info['event_field'] = 'idpiloto';
form_cita_2_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off';
}
function scajaxbutton_sc_btn_0_onClick()
{
$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'on';
  
$original_codigo_cita = $this->codigo_cita;
$original_chasis = $this->chasis;





$modificado_codigo_cita = $this->codigo_cita;
$modificado_chasis = $this->chasis;
$this->nm_formatar_campos('codigo_cita', 'chasis');
if ($original_codigo_cita !== $modificado_codigo_cita || isset($this->nmgp_cmp_readonly['codigo_cita']) || (isset($bFlagRead_codigo_cita) && $bFlagRead_codigo_cita))
{
    $this->ajax_return_values_codigo_cita(true);
}
if ($original_chasis !== $modificado_chasis || isset($this->nmgp_cmp_readonly['chasis']) || (isset($bFlagRead_chasis) && $bFlagRead_chasis))
{
    $this->ajax_return_values_chasis(true);
}
$this->NM_ajax_info['event_field'] = 'scajaxbutton';
form_cita_2_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_cita_2']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_cita_2_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_cita_2_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['csrf_token'];
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

   function Form_lookup_tipo_qr()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "QR AUTOMATICO?#?1?#?N?@?";
       $nmgp_def_dados .= "QR MANUAL?#?2?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_idtipomovimiento()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idtipoMovimiento, descripcion  FROM tipomovimiento  ORDER BY descripcion";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipomovimiento'][] = $rs->fields[0];
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
   function Form_lookup_idestado()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idestado, estado  FROM estado  ORDER BY estado";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idestado'][] = $rs->fields[0];
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
   function Form_lookup_idselectivo()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idselectivo, selectivo  FROM selectivo  ORDER BY selectivo";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idselectivo'][] = $rs->fields[0];
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
   function Form_lookup_idnaviera()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idNaviera, naviera  FROM naviera  ORDER BY naviera";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idnaviera'][] = $rs->fields[0];
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
   function Form_lookup_idtipodecarga()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idtipodecarga, descripcion  FROM tipodecarga  ORDER BY descripcion";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['Lookup_idtipodecarga'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_cita_2_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "idCita", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "codigo_cita", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "contenedorimport", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idnaviera($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idNaviera", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idtipodecarga($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idtipodecarga", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idestado($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idestado", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idpiloto($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idpiloto", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idcabezal($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idcabezal", $arg_search, $data_lookup);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_cita_2 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['total'] = $qt_geral_reg_form_cita_2;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cita_2_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cita_2_pack_ajax_response();
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
      $nm_numeric[] = "idcita";$nm_numeric[] = "idnaviera";$nm_numeric[] = "idtipodecarga";$nm_numeric[] = "idestado";$nm_numeric[] = "idpiloto";$nm_numeric[] = "idcabezal";$nm_numeric[] = "idselectivo";$nm_numeric[] = "idyarda";$nm_numeric[] = "idtipomovimiento";$nm_numeric[] = "idviaje";$nm_numeric[] = "turno";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['decimal_db'] == ".")
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
      $Nm_datas['fechainicio'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['SC_sep_date1'];
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
   function SC_lookup_idnaviera($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT naviera, idNaviera FROM naviera WHERE (naviera LIKE '%$campo%')" ; 
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
   function SC_lookup_idtipodecarga($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT descripcion, idtipodecarga FROM tipodecarga WHERE (descripcion LIKE '%$campo%')" ; 
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
   function SC_lookup_idestado($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT estado, idestado FROM estado WHERE (estado LIKE '%$campo%')" ; 
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
   function SC_lookup_idpiloto($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT licencia, idpiloto FROM piloto WHERE (licencia LIKE '%$campo%')" ; 
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
   function SC_lookup_idcabezal($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT placa, idcabezal FROM cabezal WHERE (placa LIKE '%$campo%')" ; 
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
       $nmgp_saida_form = "form_cita_2_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_cita_2_fim.php";
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
       form_cita_2_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2']['masterValue']);
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
    function sc_field_readonly($sField, $sStatus, $iSeq = '')
    {
        if ('on' != $sStatus && 'off' != $sStatus)
        {
            return;
        }

        $sFieldDateTime = '';
        if ('fechainicio' == $sField)
        {
            $sFieldDateTime = $sField . '_hora';
        }

        $sFlagVar        = 'bFlagRead_' . $sField;
        $this->$sFlagVar = 'on' == $sStatus;

        $this->nmgp_cmp_readonly[$sField]                = $sStatus;
        $this->NM_ajax_info['readOnly'][$sField . $iSeq] = $sStatus;
        if ('' != $sFieldDateTime)
        {
            $this->NM_ajax_info['readOnly'][$sFieldDateTime . $iSeq] = $sStatus;
        }
    } // sc_field_readonly
}
?>
