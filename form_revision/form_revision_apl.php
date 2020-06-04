<?php
//
class form_revision_apl
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
   var $codigo_revision;
   var $fecha_solicitud;
   var $fecha_solicitud_hora;
   var $maga;
   var $maga_1;
   var $sgaia;
   var $sgaia_1;
   var $sat;
   var $sat_1;
   var $dipafront;
   var $dipafront_1;
   var $ucc;
   var $ucc_1;
   var $idnaviera;
   var $idnaviera_1;
   var $contenedor;
   var $bl;
   var $observaciones;
   var $idcabezal;
   var $idgestor_aduanal;
   var $idrampa;
   var $idrampa_1;
   var $idconsignatario;
   var $idcontenido;
   var $idestado_revision;
   var $idestado_revision_1;
   var $cantidad_por_bl;
   var $idmedida;
   var $idmedida_1;
   var $idselectivo;
   var $idselectivo_1;
   var $idtipodecarga;
   var $idtipodecarga_1;
   var $sec_users_login;
   var $factura_revision;
   var $factura_acople;
   var $ubicacion;
   var $idfuncionario;
   var $idviaje_importacion;
   var $idregimen_aduanero;
   var $idregimen_aduanero_1;
   var $iddestino;
   var $iddestino_1;
   var $turno;
   var $idestado;
   var $termonebulizacion;
   var $termonebulizacion_1;
   var $porcentaje_intrusion;
   var $idoperador;
   var $idtipoderevision;
   var $idtipoderevision_1;
   var $idtipo_movilizacion;
   var $idtipo_movilizacion_1;
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
          if (isset($this->NM_ajax_info['param']['bl']))
          {
              $this->bl = $this->NM_ajax_info['param']['bl'];
          }
          if (isset($this->NM_ajax_info['param']['cantidad_por_bl']))
          {
              $this->cantidad_por_bl = $this->NM_ajax_info['param']['cantidad_por_bl'];
          }
          if (isset($this->NM_ajax_info['param']['codigo_revision']))
          {
              $this->codigo_revision = $this->NM_ajax_info['param']['codigo_revision'];
          }
          if (isset($this->NM_ajax_info['param']['contenedor']))
          {
              $this->contenedor = $this->NM_ajax_info['param']['contenedor'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['dipafront']))
          {
              $this->dipafront = $this->NM_ajax_info['param']['dipafront'];
          }
          if (isset($this->NM_ajax_info['param']['factura_acople']))
          {
              $this->factura_acople = $this->NM_ajax_info['param']['factura_acople'];
          }
          if (isset($this->NM_ajax_info['param']['factura_revision']))
          {
              $this->factura_revision = $this->NM_ajax_info['param']['factura_revision'];
          }
          if (isset($this->NM_ajax_info['param']['fecha_solicitud']))
          {
              $this->fecha_solicitud = $this->NM_ajax_info['param']['fecha_solicitud'];
          }
          if (isset($this->NM_ajax_info['param']['idcabezal']))
          {
              $this->idcabezal = $this->NM_ajax_info['param']['idcabezal'];
          }
          if (isset($this->NM_ajax_info['param']['idconsignatario']))
          {
              $this->idconsignatario = $this->NM_ajax_info['param']['idconsignatario'];
          }
          if (isset($this->NM_ajax_info['param']['idcontenido']))
          {
              $this->idcontenido = $this->NM_ajax_info['param']['idcontenido'];
          }
          if (isset($this->NM_ajax_info['param']['iddestino']))
          {
              $this->iddestino = $this->NM_ajax_info['param']['iddestino'];
          }
          if (isset($this->NM_ajax_info['param']['idestado']))
          {
              $this->idestado = $this->NM_ajax_info['param']['idestado'];
          }
          if (isset($this->NM_ajax_info['param']['idestado_revision']))
          {
              $this->idestado_revision = $this->NM_ajax_info['param']['idestado_revision'];
          }
          if (isset($this->NM_ajax_info['param']['idfuncionario']))
          {
              $this->idfuncionario = $this->NM_ajax_info['param']['idfuncionario'];
          }
          if (isset($this->NM_ajax_info['param']['idgestor_aduanal']))
          {
              $this->idgestor_aduanal = $this->NM_ajax_info['param']['idgestor_aduanal'];
          }
          if (isset($this->NM_ajax_info['param']['idmedida']))
          {
              $this->idmedida = $this->NM_ajax_info['param']['idmedida'];
          }
          if (isset($this->NM_ajax_info['param']['idnaviera']))
          {
              $this->idnaviera = $this->NM_ajax_info['param']['idnaviera'];
          }
          if (isset($this->NM_ajax_info['param']['idrampa']))
          {
              $this->idrampa = $this->NM_ajax_info['param']['idrampa'];
          }
          if (isset($this->NM_ajax_info['param']['idregimen_aduanero']))
          {
              $this->idregimen_aduanero = $this->NM_ajax_info['param']['idregimen_aduanero'];
          }
          if (isset($this->NM_ajax_info['param']['idselectivo']))
          {
              $this->idselectivo = $this->NM_ajax_info['param']['idselectivo'];
          }
          if (isset($this->NM_ajax_info['param']['idtipo_movilizacion']))
          {
              $this->idtipo_movilizacion = $this->NM_ajax_info['param']['idtipo_movilizacion'];
          }
          if (isset($this->NM_ajax_info['param']['idtipodecarga']))
          {
              $this->idtipodecarga = $this->NM_ajax_info['param']['idtipodecarga'];
          }
          if (isset($this->NM_ajax_info['param']['idviaje_importacion']))
          {
              $this->idviaje_importacion = $this->NM_ajax_info['param']['idviaje_importacion'];
          }
          if (isset($this->NM_ajax_info['param']['maga']))
          {
              $this->maga = $this->NM_ajax_info['param']['maga'];
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
          if (isset($this->NM_ajax_info['param']['observaciones']))
          {
              $this->observaciones = $this->NM_ajax_info['param']['observaciones'];
          }
          if (isset($this->NM_ajax_info['param']['sat']))
          {
              $this->sat = $this->NM_ajax_info['param']['sat'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sec_users_login']))
          {
              $this->sec_users_login = $this->NM_ajax_info['param']['sec_users_login'];
          }
          if (isset($this->NM_ajax_info['param']['sgaia']))
          {
              $this->sgaia = $this->NM_ajax_info['param']['sgaia'];
          }
          if (isset($this->NM_ajax_info['param']['ubicacion']))
          {
              $this->ubicacion = $this->NM_ajax_info['param']['ubicacion'];
          }
          if (isset($this->NM_ajax_info['param']['ucc']))
          {
              $this->ucc = $this->NM_ajax_info['param']['ucc'];
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
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_revision']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_revision']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_revision']['embutida_parms']);
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
                 nm_limpa_str_form_revision($cadapar[1]);
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
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_revision']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_revision']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_revision']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_revision']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_revision']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_revision']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_revision']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fecha_solicitud);
          $this->fecha_solicitud      = $aDtParts[0];
          $this->fecha_solicitud_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_revision']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_revision']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_revision']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_revision']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_revision']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_revision']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_revision']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_revision_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['initialize'])
          {
              $_SESSION['scriptcase']['form_revision']['contr_erro'] = 'on';
 $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['start'] = 'new';
$_SESSION['scriptcase']['form_revision']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_revision']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_revision']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_revision'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_revision']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_revision']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_revision') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_revision']['label'] = "INGRESO DE CONTENEDORES PARA REVISIÓN";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_revision")
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



      $_SESSION['scriptcase']['error_icon']['form_revision']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_revision'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "off";
      $this->nmgp_botoes['delete'] = "off";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_revision']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_revision'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_revision'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dados_form'];
          if (!isset($this->turno)){$this->turno = $this->nmgp_dados_form['turno'];} 
          if (!isset($this->termonebulizacion)){$this->termonebulizacion = $this->nmgp_dados_form['termonebulizacion'];} 
          if (!isset($this->porcentaje_intrusion)){$this->porcentaje_intrusion = $this->nmgp_dados_form['porcentaje_intrusion'];} 
          if (!isset($this->idoperador)){$this->idoperador = $this->nmgp_dados_form['idoperador'];} 
          if (!isset($this->idtipoderevision)){$this->idtipoderevision = $this->nmgp_dados_form['idtipoderevision'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_revision", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_revision/form_revision_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_revision_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_revision_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_revision_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_revision/form_revision_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_revision_erro.class.php"); 
      }
      $this->Erro      = new form_revision_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opcao']))
         { 
             if ($this->codigo_revision != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_revision']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_revision']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->codigo_revision)) { $this->nm_limpa_alfa($this->codigo_revision); }
      if (isset($this->maga)) { $this->nm_limpa_alfa($this->maga); }
      if (isset($this->sgaia)) { $this->nm_limpa_alfa($this->sgaia); }
      if (isset($this->sat)) { $this->nm_limpa_alfa($this->sat); }
      if (isset($this->dipafront)) { $this->nm_limpa_alfa($this->dipafront); }
      if (isset($this->ucc)) { $this->nm_limpa_alfa($this->ucc); }
      if (isset($this->idnaviera)) { $this->nm_limpa_alfa($this->idnaviera); }
      if (isset($this->contenedor)) { $this->nm_limpa_alfa($this->contenedor); }
      if (isset($this->bl)) { $this->nm_limpa_alfa($this->bl); }
      if (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
      if (isset($this->idcabezal)) { $this->nm_limpa_alfa($this->idcabezal); }
      if (isset($this->idgestor_aduanal)) { $this->nm_limpa_alfa($this->idgestor_aduanal); }
      if (isset($this->idrampa)) { $this->nm_limpa_alfa($this->idrampa); }
      if (isset($this->idconsignatario)) { $this->nm_limpa_alfa($this->idconsignatario); }
      if (isset($this->idcontenido)) { $this->nm_limpa_alfa($this->idcontenido); }
      if (isset($this->idestado_revision)) { $this->nm_limpa_alfa($this->idestado_revision); }
      if (isset($this->cantidad_por_bl)) { $this->nm_limpa_alfa($this->cantidad_por_bl); }
      if (isset($this->idmedida)) { $this->nm_limpa_alfa($this->idmedida); }
      if (isset($this->idselectivo)) { $this->nm_limpa_alfa($this->idselectivo); }
      if (isset($this->idtipodecarga)) { $this->nm_limpa_alfa($this->idtipodecarga); }
      if (isset($this->sec_users_login)) { $this->nm_limpa_alfa($this->sec_users_login); }
      if (isset($this->factura_revision)) { $this->nm_limpa_alfa($this->factura_revision); }
      if (isset($this->factura_acople)) { $this->nm_limpa_alfa($this->factura_acople); }
      if (isset($this->ubicacion)) { $this->nm_limpa_alfa($this->ubicacion); }
      if (isset($this->idfuncionario)) { $this->nm_limpa_alfa($this->idfuncionario); }
      if (isset($this->idviaje_importacion)) { $this->nm_limpa_alfa($this->idviaje_importacion); }
      if (isset($this->idregimen_aduanero)) { $this->nm_limpa_alfa($this->idregimen_aduanero); }
      if (isset($this->iddestino)) { $this->nm_limpa_alfa($this->iddestino); }
      if (isset($this->idestado)) { $this->nm_limpa_alfa($this->idestado); }
      if (isset($this->idtipo_movilizacion)) { $this->nm_limpa_alfa($this->idtipo_movilizacion); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- fecha_solicitud
      $this->field_config['fecha_solicitud']                 = array();
      $this->field_config['fecha_solicitud']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_solicitud']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_solicitud']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_solicitud']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_solicitud');
      //-- cantidad_por_bl
      $this->field_config['cantidad_por_bl']               = array();
      $this->field_config['cantidad_por_bl']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidad_por_bl']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidad_por_bl']['symbol_dec'] = '';
      $this->field_config['cantidad_por_bl']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidad_por_bl']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- codigo_revision
      $this->field_config['codigo_revision']               = array();
      $this->field_config['codigo_revision']['symbol_grp'] = '';
      $this->field_config['codigo_revision']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['codigo_revision']['symbol_dec'] = '';
      $this->field_config['codigo_revision']['symbol_neg'] = '-';
      $this->field_config['codigo_revision']['format_neg'] = '2';
      //-- turno
      $this->field_config['turno']               = array();
      $this->field_config['turno']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['turno']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['turno']['symbol_dec'] = '';
      $this->field_config['turno']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['turno']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- porcentaje_intrusion
      $this->field_config['porcentaje_intrusion']               = array();
      $this->field_config['porcentaje_intrusion']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['porcentaje_intrusion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['porcentaje_intrusion']['symbol_dec'] = '';
      $this->field_config['porcentaje_intrusion']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['porcentaje_intrusion']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idoperador
      $this->field_config['idoperador']               = array();
      $this->field_config['idoperador']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idoperador']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idoperador']['symbol_dec'] = '';
      $this->field_config['idoperador']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idoperador']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_fecha_solicitud' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha_solicitud');
          }
          if ('validate_idestado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idestado');
          }
          if ('validate_factura_revision' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'factura_revision');
          }
          if ('validate_factura_acople' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'factura_acople');
          }
          if ('validate_idtipo_movilizacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idtipo_movilizacion');
          }
          if ('validate_idregimen_aduanero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idregimen_aduanero');
          }
          if ('validate_maga' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'maga');
          }
          if ('validate_sgaia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sgaia');
          }
          if ('validate_sat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sat');
          }
          if ('validate_dipafront' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dipafront');
          }
          if ('validate_ucc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ucc');
          }
          if ('validate_observaciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones');
          }
          if ('validate_idcabezal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idcabezal');
          }
          if ('validate_contenedor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contenedor');
          }
          if ('validate_idmedida' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idmedida');
          }
          if ('validate_idnaviera' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idnaviera');
          }
          if ('validate_idselectivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idselectivo');
          }
          if ('validate_idtipodecarga' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idtipodecarga');
          }
          if ('validate_idconsignatario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idconsignatario');
          }
          if ('validate_idcontenido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idcontenido');
          }
          if ('validate_bl' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bl');
          }
          if ('validate_cantidad_por_bl' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidad_por_bl');
          }
          if ('validate_idviaje_importacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idviaje_importacion');
          }
          if ('validate_iddestino' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iddestino');
          }
          if ('validate_ubicacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ubicacion');
          }
          if ('validate_idrampa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idrampa');
          }
          if ('validate_idfuncionario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfuncionario');
          }
          if ('validate_idgestor_aduanal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idgestor_aduanal');
          }
          if ('validate_idestado_revision' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idestado_revision');
          }
          if ('validate_sec_users_login' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sec_users_login');
          }
          if ('validate_codigo_revision' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo_revision');
          }
          form_revision_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE placa LIKE '%" . substr($this->Db->qstr($this->idcabezal), 1, -1) . "%' ORDER BY idcabezal";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'][] = $rs->fields[0];
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
          if ('autocomp_idgestor_aduanal' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idgestor_aduanal = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idgestor_aduanal = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idgestor_aduanal, nombre FROM gestor_aduanal WHERE nombre LIKE '%" . substr($this->Db->qstr($this->idgestor_aduanal), 1, -1) . "%' ORDER BY idgestor_aduanal";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'][] = $rs->fields[0];
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
          if ('autocomp_idconsignatario' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idconsignatario = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idconsignatario = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idconsignatario, nombre FROM consignatario WHERE nombre LIKE '%" . substr($this->Db->qstr($this->idconsignatario), 1, -1) . "%' ORDER BY nombre";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'][] = $rs->fields[0];
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
          if ('autocomp_idcontenido' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idcontenido = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idcontenido = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idcontenido, descripcion FROM contenido WHERE descripcion LIKE '%" . substr($this->Db->qstr($this->idcontenido), 1, -1) . "%' ORDER BY idcontenido";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'][] = $rs->fields[0];
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
          if ('autocomp_idfuncionario' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idfuncionario = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idfuncionario = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idfuncionario, nombre FROM funcionario WHERE nombre LIKE '%" . substr($this->Db->qstr($this->idfuncionario), 1, -1) . "%' ORDER BY nombre";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'][] = $rs->fields[0];
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
          if ('autocomp_idviaje_importacion' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idviaje_importacion = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idviaje_importacion = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idviaje_importacion, codigo FROM viaje_importacion WHERE codigo LIKE '%" . substr($this->Db->qstr($this->idviaje_importacion), 1, -1) . "%' ORDER BY codigo";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'][] = $rs->fields[0];
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
          form_revision_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->maga))
          {
              $x = 0; 
              $this->maga_1 = $this->maga;
              $this->maga = ""; 
              if ($this->maga_1 != "") 
              { 
                  foreach ($this->maga_1 as $dados_maga_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->maga .= ";";
                      } 
                      $this->maga .= $dados_maga_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->sgaia))
          {
              $x = 0; 
              $this->sgaia_1 = $this->sgaia;
              $this->sgaia = ""; 
              if ($this->sgaia_1 != "") 
              { 
                  foreach ($this->sgaia_1 as $dados_sgaia_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->sgaia .= ";";
                      } 
                      $this->sgaia .= $dados_sgaia_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->sat))
          {
              $x = 0; 
              $this->sat_1 = $this->sat;
              $this->sat = ""; 
              if ($this->sat_1 != "") 
              { 
                  foreach ($this->sat_1 as $dados_sat_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->sat .= ";";
                      } 
                      $this->sat .= $dados_sat_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->dipafront))
          {
              $x = 0; 
              $this->dipafront_1 = $this->dipafront;
              $this->dipafront = ""; 
              if ($this->dipafront_1 != "") 
              { 
                  foreach ($this->dipafront_1 as $dados_dipafront_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->dipafront .= ";";
                      } 
                      $this->dipafront .= $dados_dipafront_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ucc))
          {
              $x = 0; 
              $this->ucc_1 = $this->ucc;
              $this->ucc = ""; 
              if ($this->ucc_1 != "") 
              { 
                  foreach ($this->ucc_1 as $dados_ucc_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ucc .= ";";
                      } 
                      $this->ucc .= $dados_ucc_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->termonebulizacion))
          {
              $x = 0; 
              $this->termonebulizacion_1 = $this->termonebulizacion;
              $this->termonebulizacion = ""; 
              if ($this->termonebulizacion_1 != "") 
              { 
                  foreach ($this->termonebulizacion_1 as $dados_termonebulizacion_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->termonebulizacion .= ";";
                      } 
                      $this->termonebulizacion .= $dados_termonebulizacion_1;
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
              form_revision_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_revision']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_revision_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_redir_atualiz'] == "ok")
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
          form_revision_pack_ajax_response();
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
          form_revision_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_revision.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("INGRESO DE CONTENEDORES PARA REVISIÓN") ?></TITLE>
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
<form name="Fdown" method="get" action="form_revision_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_revision"> 
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
           case 'fecha_solicitud':
               return "FECHA SOLICITUD";
               break;
           case 'idestado':
               return "ESTADO";
               break;
           case 'factura_revision':
               return "FACTURA REVISION";
               break;
           case 'factura_acople':
               return "FACTURA ACOPLE";
               break;
           case 'idtipo_movilizacion':
               return "TIPO MOVILIZACION";
               break;
           case 'idregimen_aduanero':
               return "REGIMEN ADUANERO";
               break;
           case 'maga':
               return "MAGA";
               break;
           case 'sgaia':
               return "SGAIA";
               break;
           case 'sat':
               return "SAT";
               break;
           case 'dipafront':
               return "DIPA";
               break;
           case 'ucc':
               return "UCC";
               break;
           case 'observaciones':
               return "OBSERVACIONES";
               break;
           case 'idcabezal':
               return "PLACA";
               break;
           case 'contenedor':
               return "CONTENEDOR";
               break;
           case 'idmedida':
               return "MEDIDA";
               break;
           case 'idnaviera':
               return "NAVIERA";
               break;
           case 'idselectivo':
               return "SELECTIVO";
               break;
           case 'idtipodecarga':
               return "TIPO DE CARGA";
               break;
           case 'idconsignatario':
               return "CONSIGNATARIO";
               break;
           case 'idcontenido':
               return "MERCADERIA";
               break;
           case 'bl':
               return "BL";
               break;
           case 'cantidad_por_bl':
               return "CANTIDAD POR BL";
               break;
           case 'idviaje_importacion':
               return "VIAJE IMPORT";
               break;
           case 'iddestino':
               return "DESTINO";
               break;
           case 'ubicacion':
               return "UBICACION EN YARDA";
               break;
           case 'idrampa':
               return "RAMPA";
               break;
           case 'idfuncionario':
               return "FUNCIONARIO";
               break;
           case 'idgestor_aduanal':
               return "GESTOR ADUANAL";
               break;
           case 'idestado_revision':
               return "ESTADO DE LA REVISION";
               break;
           case 'sec_users_login':
               return "Sec Users Login";
               break;
           case 'codigo_revision':
               return "CODIGO REVISION";
               break;
           case 'turno':
               return "TURNO";
               break;
           case 'termonebulizacion':
               return "TERMO";
               break;
           case 'porcentaje_intrusion':
               return "% INTRUSION";
               break;
           case 'idoperador':
               return "OPERADOR";
               break;
           case 'idtipoderevision':
               return "TIPO DE REVISION";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_revision']) || !is_array($this->NM_ajax_info['errList']['geral_form_revision']))
              {
                  $this->NM_ajax_info['errList']['geral_form_revision'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_revision'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'fecha_solicitud' == $filtro)
        $this->ValidateField_fecha_solicitud($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idestado' == $filtro)
        $this->ValidateField_idestado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'factura_revision' == $filtro)
        $this->ValidateField_factura_revision($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'factura_acople' == $filtro)
        $this->ValidateField_factura_acople($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idtipo_movilizacion' == $filtro)
        $this->ValidateField_idtipo_movilizacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idregimen_aduanero' == $filtro)
        $this->ValidateField_idregimen_aduanero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'maga' == $filtro)
        $this->ValidateField_maga($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sgaia' == $filtro)
        $this->ValidateField_sgaia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sat' == $filtro)
        $this->ValidateField_sat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dipafront' == $filtro)
        $this->ValidateField_dipafront($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ucc' == $filtro)
        $this->ValidateField_ucc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'observaciones' == $filtro)
        $this->ValidateField_observaciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idcabezal' == $filtro)
        $this->ValidateField_idcabezal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contenedor' == $filtro)
        $this->ValidateField_contenedor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idmedida' == $filtro)
        $this->ValidateField_idmedida($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idnaviera' == $filtro)
        $this->ValidateField_idnaviera($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idselectivo' == $filtro)
        $this->ValidateField_idselectivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idtipodecarga' == $filtro)
        $this->ValidateField_idtipodecarga($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idconsignatario' == $filtro)
        $this->ValidateField_idconsignatario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idcontenido' == $filtro)
        $this->ValidateField_idcontenido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bl' == $filtro)
        $this->ValidateField_bl($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cantidad_por_bl' == $filtro)
        $this->ValidateField_cantidad_por_bl($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idviaje_importacion' == $filtro)
        $this->ValidateField_idviaje_importacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'iddestino' == $filtro)
        $this->ValidateField_iddestino($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ubicacion' == $filtro)
        $this->ValidateField_ubicacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idrampa' == $filtro)
        $this->ValidateField_idrampa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idfuncionario' == $filtro)
        $this->ValidateField_idfuncionario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idgestor_aduanal' == $filtro)
        $this->ValidateField_idgestor_aduanal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idestado_revision' == $filtro)
        $this->ValidateField_idestado_revision($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sec_users_login' == $filtro)
        $this->ValidateField_sec_users_login($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'codigo_revision' == $filtro)
        $this->ValidateField_codigo_revision($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_fecha_solicitud(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecha_solicitud, $this->field_config['fecha_solicitud']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecha_solicitud']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecha_solicitud']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecha_solicitud']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecha_solicitud']['date_sep']) ; 
          if (trim($this->fecha_solicitud) != "")  
          { 
              if ($teste_validade->Data($this->fecha_solicitud, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA SOLICITUD; " ; 
                  if (!isset($Campos_Erros['fecha_solicitud']))
                  {
                      $Campos_Erros['fecha_solicitud'] = array();
                  }
                  $Campos_Erros['fecha_solicitud'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecha_solicitud']) || !is_array($this->NM_ajax_info['errList']['fecha_solicitud']))
                  {
                      $this->NM_ajax_info['errList']['fecha_solicitud'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha_solicitud'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['fecha_solicitud']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['fecha_solicitud'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "FECHA SOLICITUD" ; 
              if (!isset($Campos_Erros['fecha_solicitud']))
              {
                  $Campos_Erros['fecha_solicitud'] = array();
              }
              $Campos_Erros['fecha_solicitud'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fecha_solicitud']) || !is_array($this->NM_ajax_info['errList']['fecha_solicitud']))
                  {
                      $this->NM_ajax_info['errList']['fecha_solicitud'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha_solicitud'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['fecha_solicitud']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecha_solicitud';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fecha_solicitud_hora, $this->field_config['fecha_solicitud_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fecha_solicitud_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fecha_solicitud_hora']['time_sep']) ; 
          if (trim($this->fecha_solicitud_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fecha_solicitud_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA SOLICITUD; " ; 
                  if (!isset($Campos_Erros['fecha_solicitud_hora']))
                  {
                      $Campos_Erros['fecha_solicitud_hora'] = array();
                  }
                  $Campos_Erros['fecha_solicitud_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecha_solicitud']) || !is_array($this->NM_ajax_info['errList']['fecha_solicitud']))
                  {
                      $this->NM_ajax_info['errList']['fecha_solicitud'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha_solicitud'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['fecha_solicitud_hora']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['fecha_solicitud_hora'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "FECHA SOLICITUD" ; 
              if (!isset($Campos_Erros['fecha_solicitud_hora']))
              {
                  $Campos_Erros['fecha_solicitud_hora'] = array();
              }
              $Campos_Erros['fecha_solicitud_hora'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fecha_solicitud']) || !is_array($this->NM_ajax_info['errList']['fecha_solicitud']))
                  {
                      $this->NM_ajax_info['errList']['fecha_solicitud'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha_solicitud'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
      if (isset($Campos_Erros['fecha_solicitud']) && isset($Campos_Erros['fecha_solicitud_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fecha_solicitud'], $Campos_Erros['fecha_solicitud_hora']);
          if (empty($Campos_Erros['fecha_solicitud_hora']))
          {
              unset($Campos_Erros['fecha_solicitud_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fecha_solicitud']))
          {
              $this->NM_ajax_info['errList']['fecha_solicitud'] = array_unique($this->NM_ajax_info['errList']['fecha_solicitud']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecha_solicitud_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecha_solicitud_hora

    function ValidateField_idestado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->idestado = sc_strtoupper($this->idestado); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idestado) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "ESTADO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idestado']))
              {
                  $Campos_Erros['idestado'] = array();
              }
              $Campos_Erros['idestado'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idestado']) || !is_array($this->NM_ajax_info['errList']['idestado']))
              {
                  $this->NM_ajax_info['errList']['idestado'] = array();
              }
              $this->NM_ajax_info['errList']['idestado'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
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

    function ValidateField_factura_revision(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->factura_revision = sc_strtoupper($this->factura_revision); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->factura_revision) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "FACTURA REVISION " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['factura_revision']))
              {
                  $Campos_Erros['factura_revision'] = array();
              }
              $Campos_Erros['factura_revision'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['factura_revision']) || !is_array($this->NM_ajax_info['errList']['factura_revision']))
              {
                  $this->NM_ajax_info['errList']['factura_revision'] = array();
              }
              $this->NM_ajax_info['errList']['factura_revision'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'factura_revision';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_factura_revision

    function ValidateField_factura_acople(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->factura_acople = sc_strtoupper($this->factura_acople); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->factura_acople) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "FACTURA ACOPLE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['factura_acople']))
              {
                  $Campos_Erros['factura_acople'] = array();
              }
              $Campos_Erros['factura_acople'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['factura_acople']) || !is_array($this->NM_ajax_info['errList']['factura_acople']))
              {
                  $this->NM_ajax_info['errList']['factura_acople'] = array();
              }
              $this->NM_ajax_info['errList']['factura_acople'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'factura_acople';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_factura_acople

    function ValidateField_idtipo_movilizacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idtipo_movilizacion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']) && !in_array($this->idtipo_movilizacion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idtipo_movilizacion']))
                   {
                       $Campos_Erros['idtipo_movilizacion'] = array();
                   }
                   $Campos_Erros['idtipo_movilizacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idtipo_movilizacion']) || !is_array($this->NM_ajax_info['errList']['idtipo_movilizacion']))
                   {
                       $this->NM_ajax_info['errList']['idtipo_movilizacion'] = array();
                   }
                   $this->NM_ajax_info['errList']['idtipo_movilizacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idtipo_movilizacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idtipo_movilizacion

    function ValidateField_idregimen_aduanero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idregimen_aduanero == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idregimen_aduanero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idregimen_aduanero'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "REGIMEN ADUANERO" ; 
          if (!isset($Campos_Erros['idregimen_aduanero']))
          {
              $Campos_Erros['idregimen_aduanero'] = array();
          }
          $Campos_Erros['idregimen_aduanero'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idregimen_aduanero']) || !is_array($this->NM_ajax_info['errList']['idregimen_aduanero']))
          {
              $this->NM_ajax_info['errList']['idregimen_aduanero'] = array();
          }
          $this->NM_ajax_info['errList']['idregimen_aduanero'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idregimen_aduanero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']) && !in_array($this->idregimen_aduanero, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['idregimen_aduanero']))
              {
                  $Campos_Erros['idregimen_aduanero'] = array();
              }
              $Campos_Erros['idregimen_aduanero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['idregimen_aduanero']) || !is_array($this->NM_ajax_info['errList']['idregimen_aduanero']))
              {
                  $this->NM_ajax_info['errList']['idregimen_aduanero'] = array();
              }
              $this->NM_ajax_info['errList']['idregimen_aduanero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idregimen_aduanero';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idregimen_aduanero

    function ValidateField_maga(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->maga == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->maga))
          {
              $x = 0; 
              $this->maga_1 = array(); 
              foreach ($this->maga as $ind => $dados_maga_1 ) 
              {
                  if ($dados_maga_1 != "") 
                  {
                      $this->maga_1[] = $dados_maga_1;
                  } 
              } 
              $this->maga = ""; 
              foreach ($this->maga_1 as $dados_maga_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->maga .= ";";
                   } 
                   $this->maga .= $dados_maga_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->maga === "" || is_null($this->maga))  
      { 
          $this->maga = 0;
          $this->sc_force_zero[] = 'maga';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'maga';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_maga

    function ValidateField_sgaia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->sgaia == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->sgaia))
          {
              $x = 0; 
              $this->sgaia_1 = array(); 
              foreach ($this->sgaia as $ind => $dados_sgaia_1 ) 
              {
                  if ($dados_sgaia_1 != "") 
                  {
                      $this->sgaia_1[] = $dados_sgaia_1;
                  } 
              } 
              $this->sgaia = ""; 
              foreach ($this->sgaia_1 as $dados_sgaia_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->sgaia .= ";";
                   } 
                   $this->sgaia .= $dados_sgaia_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->sgaia === "" || is_null($this->sgaia))  
      { 
          $this->sgaia = 0;
          $this->sc_force_zero[] = 'sgaia';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sgaia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sgaia

    function ValidateField_sat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->sat == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->sat))
          {
              $x = 0; 
              $this->sat_1 = array(); 
              foreach ($this->sat as $ind => $dados_sat_1 ) 
              {
                  if ($dados_sat_1 != "") 
                  {
                      $this->sat_1[] = $dados_sat_1;
                  } 
              } 
              $this->sat = ""; 
              foreach ($this->sat_1 as $dados_sat_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->sat .= ";";
                   } 
                   $this->sat .= $dados_sat_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->sat === "" || is_null($this->sat))  
      { 
          $this->sat = 0;
          $this->sc_force_zero[] = 'sat';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sat

    function ValidateField_dipafront(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->dipafront == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->dipafront))
          {
              $x = 0; 
              $this->dipafront_1 = array(); 
              foreach ($this->dipafront as $ind => $dados_dipafront_1 ) 
              {
                  if ($dados_dipafront_1 != "") 
                  {
                      $this->dipafront_1[] = $dados_dipafront_1;
                  } 
              } 
              $this->dipafront = ""; 
              foreach ($this->dipafront_1 as $dados_dipafront_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->dipafront .= ";";
                   } 
                   $this->dipafront .= $dados_dipafront_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->dipafront === "" || is_null($this->dipafront))  
      { 
          $this->dipafront = 0;
          $this->sc_force_zero[] = 'dipafront';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dipafront';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dipafront

    function ValidateField_ucc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ucc == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->ucc))
          {
              $x = 0; 
              $this->ucc_1 = array(); 
              foreach ($this->ucc as $ind => $dados_ucc_1 ) 
              {
                  if ($dados_ucc_1 != "") 
                  {
                      $this->ucc_1[] = $dados_ucc_1;
                  } 
              } 
              $this->ucc = ""; 
              foreach ($this->ucc_1 as $dados_ucc_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ucc .= ";";
                   } 
                   $this->ucc .= $dados_ucc_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->ucc === "" || is_null($this->ucc))  
      { 
          $this->ucc = 0;
          $this->sc_force_zero[] = 'ucc';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ucc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ucc

    function ValidateField_observaciones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->observaciones) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "OBSERVACIONES " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observaciones']))
              {
                  $Campos_Erros['observaciones'] = array();
              }
              $Campos_Erros['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observaciones']) || !is_array($this->NM_ajax_info['errList']['observaciones']))
              {
                  $this->NM_ajax_info['errList']['observaciones'] = array();
              }
              $this->NM_ajax_info['errList']['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_idcabezal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->idcabezal = sc_strtoupper($this->idcabezal); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idcabezal) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "PLACA " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idcabezal']))
              {
                  $Campos_Erros['idcabezal'] = array();
              }
              $Campos_Erros['idcabezal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idcabezal']) || !is_array($this->NM_ajax_info['errList']['idcabezal']))
              {
                  $this->NM_ajax_info['errList']['idcabezal'] = array();
              }
              $this->NM_ajax_info['errList']['idcabezal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_contenedor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->contenedor = sc_strtoupper($this->contenedor); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['contenedor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['contenedor'] == "on")) 
      { 
          if ($this->contenedor == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CONTENEDOR" ; 
              if (!isset($Campos_Erros['contenedor']))
              {
                  $Campos_Erros['contenedor'] = array();
              }
              $Campos_Erros['contenedor'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['contenedor']) || !is_array($this->NM_ajax_info['errList']['contenedor']))
                  {
                      $this->NM_ajax_info['errList']['contenedor'] = array();
                  }
                  $this->NM_ajax_info['errList']['contenedor'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contenedor) > 12) 
          { 
              $hasError = true;
              $Campos_Crit .= "CONTENEDOR " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contenedor']))
              {
                  $Campos_Erros['contenedor'] = array();
              }
              $Campos_Erros['contenedor'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contenedor']) || !is_array($this->NM_ajax_info['errList']['contenedor']))
              {
                  $this->NM_ajax_info['errList']['contenedor'] = array();
              }
              $this->NM_ajax_info['errList']['contenedor'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->contenedor ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->contenedor, $_SESSION['scriptcase']['charset']); $x++) 
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
              if (!isset($Campos_Erros['contenedor']))
              {
                  $Campos_Erros['contenedor'] = array();
              }
              $Campos_Erros['contenedor'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['contenedor']) || !is_array($this->NM_ajax_info['errList']['contenedor']))
              {
                  $this->NM_ajax_info['errList']['contenedor'] = array();
              }
              $this->NM_ajax_info['errList']['contenedor'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contenedor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contenedor

    function ValidateField_idmedida(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idmedida == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idmedida']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idmedida'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "MEDIDA" ; 
          if (!isset($Campos_Erros['idmedida']))
          {
              $Campos_Erros['idmedida'] = array();
          }
          $Campos_Erros['idmedida'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idmedida']) || !is_array($this->NM_ajax_info['errList']['idmedida']))
          {
              $this->NM_ajax_info['errList']['idmedida'] = array();
          }
          $this->NM_ajax_info['errList']['idmedida'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idmedida) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']) && !in_array($this->idmedida, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['idmedida']))
              {
                  $Campos_Erros['idmedida'] = array();
              }
              $Campos_Erros['idmedida'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['idmedida']) || !is_array($this->NM_ajax_info['errList']['idmedida']))
              {
                  $this->NM_ajax_info['errList']['idmedida'] = array();
              }
              $this->NM_ajax_info['errList']['idmedida'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idmedida';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idmedida

    function ValidateField_idnaviera(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idnaviera == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idnaviera']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idnaviera'] == "on"))
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
          if (!empty($this->idnaviera) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']) && !in_array($this->idnaviera, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']))
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

    function ValidateField_idselectivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idselectivo == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idselectivo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idselectivo'] == "on"))
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
          if (!empty($this->idselectivo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']) && !in_array($this->idselectivo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']))
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

    function ValidateField_idtipodecarga(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idtipodecarga == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idtipodecarga']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idtipodecarga'] == "on"))
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
          if (!empty($this->idtipodecarga) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']) && !in_array($this->idtipodecarga, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']))
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

    function ValidateField_idconsignatario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idconsignatario']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idconsignatario'] == "on")) 
      { 
          if ($this->idconsignatario == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CONSIGNATARIO" ; 
              if (!isset($Campos_Erros['idconsignatario']))
              {
                  $Campos_Erros['idconsignatario'] = array();
              }
              $Campos_Erros['idconsignatario'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idconsignatario']) || !is_array($this->NM_ajax_info['errList']['idconsignatario']))
                  {
                      $this->NM_ajax_info['errList']['idconsignatario'] = array();
                  }
                  $this->NM_ajax_info['errList']['idconsignatario'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idconsignatario) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "CONSIGNATARIO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idconsignatario']))
              {
                  $Campos_Erros['idconsignatario'] = array();
              }
              $Campos_Erros['idconsignatario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idconsignatario']) || !is_array($this->NM_ajax_info['errList']['idconsignatario']))
              {
                  $this->NM_ajax_info['errList']['idconsignatario'] = array();
              }
              $this->NM_ajax_info['errList']['idconsignatario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idconsignatario';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idconsignatario

    function ValidateField_idcontenido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->idcontenido = sc_strtoupper($this->idcontenido); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idcontenido']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idcontenido'] == "on")) 
      { 
          if ($this->idcontenido == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "MERCADERIA" ; 
              if (!isset($Campos_Erros['idcontenido']))
              {
                  $Campos_Erros['idcontenido'] = array();
              }
              $Campos_Erros['idcontenido'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idcontenido']) || !is_array($this->NM_ajax_info['errList']['idcontenido']))
                  {
                      $this->NM_ajax_info['errList']['idcontenido'] = array();
                  }
                  $this->NM_ajax_info['errList']['idcontenido'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idcontenido) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "MERCADERIA " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idcontenido']))
              {
                  $Campos_Erros['idcontenido'] = array();
              }
              $Campos_Erros['idcontenido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idcontenido']) || !is_array($this->NM_ajax_info['errList']['idcontenido']))
              {
                  $this->NM_ajax_info['errList']['idcontenido'] = array();
              }
              $this->NM_ajax_info['errList']['idcontenido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idcontenido';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idcontenido

    function ValidateField_bl(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->bl = sc_strtoupper($this->bl); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['bl']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['bl'] == "on")) 
      { 
          if ($this->bl == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "BL" ; 
              if (!isset($Campos_Erros['bl']))
              {
                  $Campos_Erros['bl'] = array();
              }
              $Campos_Erros['bl'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['bl']) || !is_array($this->NM_ajax_info['errList']['bl']))
                  {
                      $this->NM_ajax_info['errList']['bl'] = array();
                  }
                  $this->NM_ajax_info['errList']['bl'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bl) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "BL " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bl']))
              {
                  $Campos_Erros['bl'] = array();
              }
              $Campos_Erros['bl'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bl']) || !is_array($this->NM_ajax_info['errList']['bl']))
              {
                  $this->NM_ajax_info['errList']['bl'] = array();
              }
              $this->NM_ajax_info['errList']['bl'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bl';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bl

    function ValidateField_cantidad_por_bl(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->cantidad_por_bl, $this->field_config['cantidad_por_bl']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidad_por_bl != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->cantidad_por_bl) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "CANTIDAD POR BL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidad_por_bl']))
                  {
                      $Campos_Erros['cantidad_por_bl'] = array();
                  }
                  $Campos_Erros['cantidad_por_bl'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidad_por_bl']) || !is_array($this->NM_ajax_info['errList']['cantidad_por_bl']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_por_bl'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_por_bl'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidad_por_bl, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "CANTIDAD POR BL; " ; 
                  if (!isset($Campos_Erros['cantidad_por_bl']))
                  {
                      $Campos_Erros['cantidad_por_bl'] = array();
                  }
                  $Campos_Erros['cantidad_por_bl'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidad_por_bl']) || !is_array($this->NM_ajax_info['errList']['cantidad_por_bl']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_por_bl'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_por_bl'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['cantidad_por_bl']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['cantidad_por_bl'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "CANTIDAD POR BL" ; 
              if (!isset($Campos_Erros['cantidad_por_bl']))
              {
                  $Campos_Erros['cantidad_por_bl'] = array();
              }
              $Campos_Erros['cantidad_por_bl'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cantidad_por_bl']) || !is_array($this->NM_ajax_info['errList']['cantidad_por_bl']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_por_bl'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_por_bl'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cantidad_por_bl';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cantidad_por_bl

    function ValidateField_idviaje_importacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idviaje_importacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idviaje_importacion'] == "on")) 
      { 
          if ($this->idviaje_importacion == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VIAJE IMPORT" ; 
              if (!isset($Campos_Erros['idviaje_importacion']))
              {
                  $Campos_Erros['idviaje_importacion'] = array();
              }
              $Campos_Erros['idviaje_importacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idviaje_importacion']) || !is_array($this->NM_ajax_info['errList']['idviaje_importacion']))
                  {
                      $this->NM_ajax_info['errList']['idviaje_importacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['idviaje_importacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idviaje_importacion) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "VIAJE IMPORT " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idviaje_importacion']))
              {
                  $Campos_Erros['idviaje_importacion'] = array();
              }
              $Campos_Erros['idviaje_importacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idviaje_importacion']) || !is_array($this->NM_ajax_info['errList']['idviaje_importacion']))
              {
                  $this->NM_ajax_info['errList']['idviaje_importacion'] = array();
              }
              $this->NM_ajax_info['errList']['idviaje_importacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "abcdefghijklmnopqrstuvwxyz0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->idviaje_importacion ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->idviaje_importacion, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "VIAJE IMPORT " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['idviaje_importacion']))
              {
                  $Campos_Erros['idviaje_importacion'] = array();
              }
              $Campos_Erros['idviaje_importacion'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['idviaje_importacion']) || !is_array($this->NM_ajax_info['errList']['idviaje_importacion']))
              {
                  $this->NM_ajax_info['errList']['idviaje_importacion'] = array();
              }
              $this->NM_ajax_info['errList']['idviaje_importacion'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idviaje_importacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idviaje_importacion

    function ValidateField_iddestino(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->iddestino == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['iddestino']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['iddestino'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "DESTINO" ; 
          if (!isset($Campos_Erros['iddestino']))
          {
              $Campos_Erros['iddestino'] = array();
          }
          $Campos_Erros['iddestino'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['iddestino']) || !is_array($this->NM_ajax_info['errList']['iddestino']))
          {
              $this->NM_ajax_info['errList']['iddestino'] = array();
          }
          $this->NM_ajax_info['errList']['iddestino'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->iddestino) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']) && !in_array($this->iddestino, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['iddestino']))
              {
                  $Campos_Erros['iddestino'] = array();
              }
              $Campos_Erros['iddestino'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['iddestino']) || !is_array($this->NM_ajax_info['errList']['iddestino']))
              {
                  $this->NM_ajax_info['errList']['iddestino'] = array();
              }
              $this->NM_ajax_info['errList']['iddestino'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'iddestino';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_iddestino

    function ValidateField_ubicacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ubicacion) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "UBICACION EN YARDA " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ubicacion']))
              {
                  $Campos_Erros['ubicacion'] = array();
              }
              $Campos_Erros['ubicacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ubicacion']) || !is_array($this->NM_ajax_info['errList']['ubicacion']))
              {
                  $this->NM_ajax_info['errList']['ubicacion'] = array();
              }
              $this->NM_ajax_info['errList']['ubicacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ubicacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ubicacion

    function ValidateField_idrampa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idrampa) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']) && !in_array($this->idrampa, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idrampa']))
                   {
                       $Campos_Erros['idrampa'] = array();
                   }
                   $Campos_Erros['idrampa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idrampa']) || !is_array($this->NM_ajax_info['errList']['idrampa']))
                   {
                       $this->NM_ajax_info['errList']['idrampa'] = array();
                   }
                   $this->NM_ajax_info['errList']['idrampa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idrampa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idrampa

    function ValidateField_idfuncionario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idfuncionario) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "FUNCIONARIO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idfuncionario']))
              {
                  $Campos_Erros['idfuncionario'] = array();
              }
              $Campos_Erros['idfuncionario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idfuncionario']) || !is_array($this->NM_ajax_info['errList']['idfuncionario']))
              {
                  $this->NM_ajax_info['errList']['idfuncionario'] = array();
              }
              $this->NM_ajax_info['errList']['idfuncionario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "abcdefghijklmnopqrstuvwxyz0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->idfuncionario ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->idfuncionario, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "FUNCIONARIO " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['idfuncionario']))
              {
                  $Campos_Erros['idfuncionario'] = array();
              }
              $Campos_Erros['idfuncionario'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['idfuncionario']) || !is_array($this->NM_ajax_info['errList']['idfuncionario']))
              {
                  $this->NM_ajax_info['errList']['idfuncionario'] = array();
              }
              $this->NM_ajax_info['errList']['idfuncionario'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idfuncionario';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idfuncionario

    function ValidateField_idgestor_aduanal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idgestor_aduanal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idgestor_aduanal'] == "on")) 
      { 
          if ($this->idgestor_aduanal == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "GESTOR ADUANAL" ; 
              if (!isset($Campos_Erros['idgestor_aduanal']))
              {
                  $Campos_Erros['idgestor_aduanal'] = array();
              }
              $Campos_Erros['idgestor_aduanal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idgestor_aduanal']) || !is_array($this->NM_ajax_info['errList']['idgestor_aduanal']))
                  {
                      $this->NM_ajax_info['errList']['idgestor_aduanal'] = array();
                  }
                  $this->NM_ajax_info['errList']['idgestor_aduanal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idgestor_aduanal) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "GESTOR ADUANAL " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idgestor_aduanal']))
              {
                  $Campos_Erros['idgestor_aduanal'] = array();
              }
              $Campos_Erros['idgestor_aduanal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idgestor_aduanal']) || !is_array($this->NM_ajax_info['errList']['idgestor_aduanal']))
              {
                  $this->NM_ajax_info['errList']['idgestor_aduanal'] = array();
              }
              $this->NM_ajax_info['errList']['idgestor_aduanal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idgestor_aduanal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idgestor_aduanal

    function ValidateField_idestado_revision(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idestado_revision) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']) && !in_array($this->idestado_revision, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idestado_revision']))
                   {
                       $Campos_Erros['idestado_revision'] = array();
                   }
                   $Campos_Erros['idestado_revision'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idestado_revision']) || !is_array($this->NM_ajax_info['errList']['idestado_revision']))
                   {
                       $this->NM_ajax_info['errList']['idestado_revision'] = array();
                   }
                   $this->NM_ajax_info['errList']['idestado_revision'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idestado_revision';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idestado_revision

    function ValidateField_sec_users_login(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sec_users_login) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Sec Users Login " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sec_users_login']))
              {
                  $Campos_Erros['sec_users_login'] = array();
              }
              $Campos_Erros['sec_users_login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sec_users_login']) || !is_array($this->NM_ajax_info['errList']['sec_users_login']))
              {
                  $this->NM_ajax_info['errList']['sec_users_login'] = array();
              }
              $this->NM_ajax_info['errList']['sec_users_login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_codigo_revision(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->codigo_revision === "" || is_null($this->codigo_revision))  
      { 
          $this->codigo_revision = 0;
      } 
      nm_limpa_numero($this->codigo_revision, $this->field_config['codigo_revision']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->codigo_revision != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->codigo_revision) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "CODIGO REVISION: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['codigo_revision']))
                  {
                      $Campos_Erros['codigo_revision'] = array();
                  }
                  $Campos_Erros['codigo_revision'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['codigo_revision']) || !is_array($this->NM_ajax_info['errList']['codigo_revision']))
                  {
                      $this->NM_ajax_info['errList']['codigo_revision'] = array();
                  }
                  $this->NM_ajax_info['errList']['codigo_revision'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->codigo_revision, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "CODIGO REVISION; " ; 
                  if (!isset($Campos_Erros['codigo_revision']))
                  {
                      $Campos_Erros['codigo_revision'] = array();
                  }
                  $Campos_Erros['codigo_revision'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['codigo_revision']) || !is_array($this->NM_ajax_info['errList']['codigo_revision']))
                  {
                      $this->NM_ajax_info['errList']['codigo_revision'] = array();
                  }
                  $this->NM_ajax_info['errList']['codigo_revision'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigo_revision';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigo_revision

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
    $this->nmgp_dados_form['fecha_solicitud'] = (strlen(trim($this->fecha_solicitud)) > 19) ? str_replace(".", ":", $this->fecha_solicitud) : trim($this->fecha_solicitud);
    $this->nmgp_dados_form['idestado'] = $this->idestado;
    $this->nmgp_dados_form['factura_revision'] = $this->factura_revision;
    $this->nmgp_dados_form['factura_acople'] = $this->factura_acople;
    $this->nmgp_dados_form['idtipo_movilizacion'] = $this->idtipo_movilizacion;
    $this->nmgp_dados_form['idregimen_aduanero'] = $this->idregimen_aduanero;
    $this->nmgp_dados_form['maga'] = $this->maga;
    $this->nmgp_dados_form['sgaia'] = $this->sgaia;
    $this->nmgp_dados_form['sat'] = $this->sat;
    $this->nmgp_dados_form['dipafront'] = $this->dipafront;
    $this->nmgp_dados_form['ucc'] = $this->ucc;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['idcabezal'] = $this->idcabezal;
    $this->nmgp_dados_form['contenedor'] = $this->contenedor;
    $this->nmgp_dados_form['idmedida'] = $this->idmedida;
    $this->nmgp_dados_form['idnaviera'] = $this->idnaviera;
    $this->nmgp_dados_form['idselectivo'] = $this->idselectivo;
    $this->nmgp_dados_form['idtipodecarga'] = $this->idtipodecarga;
    $this->nmgp_dados_form['idconsignatario'] = $this->idconsignatario;
    $this->nmgp_dados_form['idcontenido'] = $this->idcontenido;
    $this->nmgp_dados_form['bl'] = $this->bl;
    $this->nmgp_dados_form['cantidad_por_bl'] = $this->cantidad_por_bl;
    $this->nmgp_dados_form['idviaje_importacion'] = $this->idviaje_importacion;
    $this->nmgp_dados_form['iddestino'] = $this->iddestino;
    $this->nmgp_dados_form['ubicacion'] = $this->ubicacion;
    $this->nmgp_dados_form['idrampa'] = $this->idrampa;
    $this->nmgp_dados_form['idfuncionario'] = $this->idfuncionario;
    $this->nmgp_dados_form['idgestor_aduanal'] = $this->idgestor_aduanal;
    $this->nmgp_dados_form['idestado_revision'] = $this->idestado_revision;
    $this->nmgp_dados_form['sec_users_login'] = $this->sec_users_login;
    $this->nmgp_dados_form['codigo_revision'] = $this->codigo_revision;
    $this->nmgp_dados_form['turno'] = $this->turno;
    $this->nmgp_dados_form['termonebulizacion'] = $this->termonebulizacion;
    $this->nmgp_dados_form['porcentaje_intrusion'] = $this->porcentaje_intrusion;
    $this->nmgp_dados_form['idoperador'] = $this->idoperador;
    $this->nmgp_dados_form['idtipoderevision'] = $this->idtipoderevision;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['fecha_solicitud'] = $this->fecha_solicitud;
      nm_limpa_data($this->fecha_solicitud, $this->field_config['fecha_solicitud']['date_sep']) ; 
      nm_limpa_hora($this->fecha_solicitud_hora, $this->field_config['fecha_solicitud']['time_sep']) ; 
      $this->Before_unformat['cantidad_por_bl'] = $this->cantidad_por_bl;
      nm_limpa_numero($this->cantidad_por_bl, $this->field_config['cantidad_por_bl']['symbol_grp']) ; 
      $this->Before_unformat['codigo_revision'] = $this->codigo_revision;
      nm_limpa_numero($this->codigo_revision, $this->field_config['codigo_revision']['symbol_grp']) ; 
      $this->Before_unformat['turno'] = $this->turno;
      nm_limpa_numero($this->turno, $this->field_config['turno']['symbol_grp']) ; 
      $this->Before_unformat['porcentaje_intrusion'] = $this->porcentaje_intrusion;
      nm_limpa_numero($this->porcentaje_intrusion, $this->field_config['porcentaje_intrusion']['symbol_grp']) ; 
      $this->Before_unformat['idoperador'] = $this->idoperador;
      nm_limpa_numero($this->idoperador, $this->field_config['idoperador']['symbol_grp']) ; 
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
      if ($Nome_Campo == "cantidad_por_bl")
      {
          nm_limpa_numero($this->cantidad_por_bl, $this->field_config['cantidad_por_bl']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "codigo_revision")
      {
          nm_limpa_numero($this->codigo_revision, $this->field_config['codigo_revision']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "turno")
      {
          nm_limpa_numero($this->turno, $this->field_config['turno']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "porcentaje_intrusion")
      {
          nm_limpa_numero($this->porcentaje_intrusion, $this->field_config['porcentaje_intrusion']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idoperador")
      {
          nm_limpa_numero($this->idoperador, $this->field_config['idoperador']['symbol_grp']) ; 
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
      if ((!empty($this->fecha_solicitud) && 'null' != $this->fecha_solicitud) || (!empty($format_fields) && isset($format_fields['fecha_solicitud'])))
      {
          $nm_separa_data = strpos($this->field_config['fecha_solicitud']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fecha_solicitud']['date_format'];
          $this->field_config['fecha_solicitud']['date_format'] = substr($this->field_config['fecha_solicitud']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fecha_solicitud, " ") ; 
          $this->fecha_solicitud_hora = substr($this->fecha_solicitud, $separador + 1) ; 
          $this->fecha_solicitud = substr($this->fecha_solicitud, 0, $separador) ; 
          nm_volta_data($this->fecha_solicitud, $this->field_config['fecha_solicitud']['date_format']) ; 
          nmgp_Form_Datas($this->fecha_solicitud, $this->field_config['fecha_solicitud']['date_format'], $this->field_config['fecha_solicitud']['date_sep']) ;  
          $this->field_config['fecha_solicitud']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fecha_solicitud_hora, $this->field_config['fecha_solicitud']['date_format']) ; 
          nmgp_Form_Hora($this->fecha_solicitud_hora, $this->field_config['fecha_solicitud']['date_format'], $this->field_config['fecha_solicitud']['time_sep']) ;  
          $this->field_config['fecha_solicitud']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fecha_solicitud || '' == $this->fecha_solicitud)
      {
          $this->fecha_solicitud_hora = '';
          $this->fecha_solicitud = '';
      }
      if ('' !== $this->cantidad_por_bl || (!empty($format_fields) && isset($format_fields['cantidad_por_bl'])))
      {
          nmgp_Form_Num_Val($this->cantidad_por_bl, $this->field_config['cantidad_por_bl']['symbol_grp'], $this->field_config['cantidad_por_bl']['symbol_dec'], "0", "S", $this->field_config['cantidad_por_bl']['format_neg'], "", "", "-", $this->field_config['cantidad_por_bl']['symbol_fmt']) ; 
      }
      if ('' !== $this->codigo_revision || (!empty($format_fields) && isset($format_fields['codigo_revision'])))
      {
          nmgp_Form_Num_Val($this->codigo_revision, $this->field_config['codigo_revision']['symbol_grp'], $this->field_config['codigo_revision']['symbol_dec'], "0", "S", $this->field_config['codigo_revision']['format_neg'], "", "", "-", $this->field_config['codigo_revision']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['fecha_solicitud']['date_format'];
      if ($this->fecha_solicitud != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fecha_solicitud']['date_format'], ";") ;
          $this->field_config['fecha_solicitud']['date_format'] = substr($this->field_config['fecha_solicitud']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fecha_solicitud, $this->field_config['fecha_solicitud']['date_format']) ; 
          $this->field_config['fecha_solicitud']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fecha_solicitud_hora, $this->field_config['fecha_solicitud']['date_format']) ; 
          if ($this->fecha_solicitud_hora == "" )  
          { 
              $this->fecha_solicitud_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fecha_solicitud_hora = substr($this->fecha_solicitud_hora, 0, -4) . "." . substr($this->fecha_solicitud_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecha_solicitud_hora = substr($this->fecha_solicitud_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecha_solicitud_hora = substr($this->fecha_solicitud_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecha_solicitud_hora = substr($this->fecha_solicitud_hora, 0, -4);
          }
          if ($this->fecha_solicitud != "")  
          { 
              $this->fecha_solicitud .= " " . $this->fecha_solicitud_hora ; 
          }
      } 
      if ($this->fecha_solicitud == "" && $use_null)  
      { 
          $this->fecha_solicitud = "null" ; 
      } 
      $this->field_config['fecha_solicitud']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_fecha_solicitud();
          $this->ajax_return_values_idestado();
          $this->ajax_return_values_factura_revision();
          $this->ajax_return_values_factura_acople();
          $this->ajax_return_values_idtipo_movilizacion();
          $this->ajax_return_values_idregimen_aduanero();
          $this->ajax_return_values_maga();
          $this->ajax_return_values_sgaia();
          $this->ajax_return_values_sat();
          $this->ajax_return_values_dipafront();
          $this->ajax_return_values_ucc();
          $this->ajax_return_values_observaciones();
          $this->ajax_return_values_idcabezal();
          $this->ajax_return_values_contenedor();
          $this->ajax_return_values_idmedida();
          $this->ajax_return_values_idnaviera();
          $this->ajax_return_values_idselectivo();
          $this->ajax_return_values_idtipodecarga();
          $this->ajax_return_values_idconsignatario();
          $this->ajax_return_values_idcontenido();
          $this->ajax_return_values_bl();
          $this->ajax_return_values_cantidad_por_bl();
          $this->ajax_return_values_idviaje_importacion();
          $this->ajax_return_values_iddestino();
          $this->ajax_return_values_ubicacion();
          $this->ajax_return_values_idrampa();
          $this->ajax_return_values_idfuncionario();
          $this->ajax_return_values_idgestor_aduanal();
          $this->ajax_return_values_idestado_revision();
          $this->ajax_return_values_sec_users_login();
          $this->ajax_return_values_codigo_revision();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['codigo_revision']['keyVal'] = form_revision_pack_protect_string($this->nmgp_dados_form['codigo_revision']);
          }
   } // ajax_return_values

          //----- fecha_solicitud
   function ajax_return_values_fecha_solicitud($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha_solicitud", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha_solicitud);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecha_solicitud'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->fecha_solicitud . ' ' . $this->fecha_solicitud_hora),
              );
          }
   }

          //----- idestado
   function ajax_return_values_idestado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idestado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idestado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idestado'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- factura_revision
   function ajax_return_values_factura_revision($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("factura_revision", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->factura_revision);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['factura_revision'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- factura_acople
   function ajax_return_values_factura_acople($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("factura_acople", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->factura_acople);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['factura_acople'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idtipo_movilizacion
   function ajax_return_values_idtipo_movilizacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idtipo_movilizacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idtipo_movilizacion);
              $aLookup = array();
              $this->_tmp_lookup_idtipo_movilizacion = $this->idtipo_movilizacion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array(); 
}
$aLookup[] = array(form_revision_pack_protect_string('') => form_revision_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idtipo_movilizacion, descripcion  FROM tipo_movilizacion  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idtipo_movilizacion\"";
          if (isset($this->NM_ajax_info['select_html']['idtipo_movilizacion']) && !empty($this->NM_ajax_info['select_html']['idtipo_movilizacion']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idtipo_movilizacion'];
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

                  if ($this->idtipo_movilizacion == $sValue)
                  {
                      $this->_tmp_lookup_idtipo_movilizacion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idtipo_movilizacion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idtipo_movilizacion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idtipo_movilizacion']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idtipo_movilizacion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idtipo_movilizacion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idtipo_movilizacion']['labList'] = $aLabel;
          }
   }

          //----- idregimen_aduanero
   function ajax_return_values_idregimen_aduanero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idregimen_aduanero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idregimen_aduanero);
              $aLookup = array();
              $this->_tmp_lookup_idregimen_aduanero = $this->idregimen_aduanero;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array(); 
}
$aLookup[] = array(form_revision_pack_protect_string('') => form_revision_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idregimen_aduanero, descripcion  FROM regimen_aduanero  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idregimen_aduanero\"";
          if (isset($this->NM_ajax_info['select_html']['idregimen_aduanero']) && !empty($this->NM_ajax_info['select_html']['idregimen_aduanero']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idregimen_aduanero'];
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

                  if ($this->idregimen_aduanero == $sValue)
                  {
                      $this->_tmp_lookup_idregimen_aduanero = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idregimen_aduanero'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idregimen_aduanero']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idregimen_aduanero']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idregimen_aduanero']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idregimen_aduanero']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idregimen_aduanero']['labList'] = $aLabel;
          }
   }

          //----- maga
   function ajax_return_values_maga($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("maga", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->maga);
              $aLookup = array();
              $this->_tmp_lookup_maga = $this->maga;

$aLookup[] = array(form_revision_pack_protect_string('1') => form_revision_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_maga'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['maga']) && !empty($this->NM_ajax_info['select_html']['maga']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['maga'];
          }
          $this->NM_ajax_info['fldList']['maga'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-maga',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['maga']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['maga']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['maga']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['maga']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['maga']['labList'] = $aLabel;
          }
   }

          //----- sgaia
   function ajax_return_values_sgaia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sgaia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sgaia);
              $aLookup = array();
              $this->_tmp_lookup_sgaia = $this->sgaia;

$aLookup[] = array(form_revision_pack_protect_string('1') => form_revision_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_sgaia'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['sgaia']) && !empty($this->NM_ajax_info['select_html']['sgaia']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['sgaia'];
          }
          $this->NM_ajax_info['fldList']['sgaia'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-sgaia',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sgaia']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sgaia']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sgaia']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sgaia']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sgaia']['labList'] = $aLabel;
          }
   }

          //----- sat
   function ajax_return_values_sat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sat);
              $aLookup = array();
              $this->_tmp_lookup_sat = $this->sat;

$aLookup[] = array(form_revision_pack_protect_string('1') => form_revision_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_sat'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['sat']) && !empty($this->NM_ajax_info['select_html']['sat']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['sat'];
          }
          $this->NM_ajax_info['fldList']['sat'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-sat',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sat']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sat']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sat']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sat']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sat']['labList'] = $aLabel;
          }
   }

          //----- dipafront
   function ajax_return_values_dipafront($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dipafront", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dipafront);
              $aLookup = array();
              $this->_tmp_lookup_dipafront = $this->dipafront;

$aLookup[] = array(form_revision_pack_protect_string('1') => form_revision_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_dipafront'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['dipafront']) && !empty($this->NM_ajax_info['select_html']['dipafront']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['dipafront'];
          }
          $this->NM_ajax_info['fldList']['dipafront'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-dipafront',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['dipafront']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['dipafront']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['dipafront']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['dipafront']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['dipafront']['labList'] = $aLabel;
          }
   }

          //----- ucc
   function ajax_return_values_ucc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ucc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ucc);
              $aLookup = array();
              $this->_tmp_lookup_ucc = $this->ucc;

$aLookup[] = array(form_revision_pack_protect_string('1') => form_revision_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_ucc'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ucc']) && !empty($this->NM_ajax_info['select_html']['ucc']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['ucc'];
          }
          $this->NM_ajax_info['fldList']['ucc'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ucc',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ucc']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ucc']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ucc']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ucc']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ucc']['labList'] = $aLabel;
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = " . substr($this->Db->qstr($this->idcabezal), 1, -1) . " ORDER BY idcabezal";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'][] = $rs->fields[0];
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
               'valList' => array($this->form_encode_input($sTmpValue)),
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
          $val_output = isset($aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idcabezal))]) ? $aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idcabezal))] : "";
          $this->NM_ajax_info['fldList']['idcabezal_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
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
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idmedida
   function ajax_return_values_idmedida($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idmedida", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idmedida);
              $aLookup = array();
              $this->_tmp_lookup_idmedida = $this->idmedida;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array(); 
}
$aLookup[] = array(form_revision_pack_protect_string('') => form_revision_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idmedida, descripcion  FROM medida  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idmedida\"";
          if (isset($this->NM_ajax_info['select_html']['idmedida']) && !empty($this->NM_ajax_info['select_html']['idmedida']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idmedida'];
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

                  if ($this->idmedida == $sValue)
                  {
                      $this->_tmp_lookup_idmedida = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idmedida'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idmedida']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idmedida']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idmedida']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idmedida']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idmedida']['labList'] = $aLabel;
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array(); 
}
$aLookup[] = array(form_revision_pack_protect_string('') => form_revision_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idNaviera, naviera FROM naviera ORDER BY idNaviera";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['idnaviera']['valList'][$i] = form_revision_pack_protect_string($v);
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

          //----- idselectivo
   function ajax_return_values_idselectivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idselectivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idselectivo);
              $aLookup = array();
              $this->_tmp_lookup_idselectivo = $this->idselectivo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array(); 
}
$aLookup[] = array(form_revision_pack_protect_string('') => form_revision_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idselectivo, selectivo  FROM selectivo  ORDER BY selectivo";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['idselectivo']['valList'][$i] = form_revision_pack_protect_string($v);
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

          //----- idtipodecarga
   function ajax_return_values_idtipodecarga($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idtipodecarga", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idtipodecarga);
              $aLookup = array();
              $this->_tmp_lookup_idtipodecarga = $this->idtipodecarga;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array(); 
}
$aLookup[] = array(form_revision_pack_protect_string('') => form_revision_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idtipodecarga, descripcion  FROM tipodecarga  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['idtipodecarga']['valList'][$i] = form_revision_pack_protect_string($v);
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

          //----- idconsignatario
   function ajax_return_values_idconsignatario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idconsignatario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idconsignatario);
              $aLookup = array();
              $this->_tmp_lookup_idconsignatario = $this->idconsignatario;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idconsignatario, nombre FROM consignatario WHERE idconsignatario = " . substr($this->Db->qstr($this->idconsignatario), 1, -1) . " ORDER BY nombre";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idconsignatario)
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
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['idconsignatario'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idconsignatario']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idconsignatario']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idconsignatario']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idconsignatario))]) ? $aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idconsignatario))] : "";
          $this->NM_ajax_info['fldList']['idconsignatario_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- idcontenido
   function ajax_return_values_idcontenido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idcontenido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idcontenido);
              $aLookup = array();
              $this->_tmp_lookup_idcontenido = $this->idcontenido;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idcontenido, descripcion FROM contenido WHERE idcontenido = " . substr($this->Db->qstr($this->idcontenido), 1, -1) . " ORDER BY idcontenido";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idcontenido)
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
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['idcontenido'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idcontenido']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idcontenido']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idcontenido']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idcontenido))]) ? $aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idcontenido))] : "";
          $this->NM_ajax_info['fldList']['idcontenido_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- bl
   function ajax_return_values_bl($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bl", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bl);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bl'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cantidad_por_bl
   function ajax_return_values_cantidad_por_bl($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidad_por_bl", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cantidad_por_bl);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cantidad_por_bl'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idviaje_importacion
   function ajax_return_values_idviaje_importacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idviaje_importacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idviaje_importacion);
              $aLookup = array();
              $this->_tmp_lookup_idviaje_importacion = $this->idviaje_importacion;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idviaje_importacion, codigo FROM viaje_importacion WHERE idviaje_importacion = " . substr($this->Db->qstr($this->idviaje_importacion), 1, -1) . " ORDER BY codigo";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idviaje_importacion)
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
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['idviaje_importacion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idviaje_importacion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idviaje_importacion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idviaje_importacion']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idviaje_importacion))]) ? $aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idviaje_importacion))] : "";
          $this->NM_ajax_info['fldList']['idviaje_importacion_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- iddestino
   function ajax_return_values_iddestino($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iddestino", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->iddestino);
              $aLookup = array();
              $this->_tmp_lookup_iddestino = $this->iddestino;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array(); 
}
$aLookup[] = array(form_revision_pack_protect_string('') => form_revision_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT iddestino, descripcion  FROM destino  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'][] = $rs->fields[0];
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
          $sSelComp = "name=\"iddestino\"";
          if (isset($this->NM_ajax_info['select_html']['iddestino']) && !empty($this->NM_ajax_info['select_html']['iddestino']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['iddestino'];
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

                  if ($this->iddestino == $sValue)
                  {
                      $this->_tmp_lookup_iddestino = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['iddestino'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['iddestino']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['iddestino']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['iddestino']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['iddestino']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['iddestino']['labList'] = $aLabel;
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
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idrampa
   function ajax_return_values_idrampa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idrampa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idrampa);
              $aLookup = array();
              $this->_tmp_lookup_idrampa = $this->idrampa;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array(); 
}
$aLookup[] = array(form_revision_pack_protect_string('') => form_revision_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idrampa, descripcion  FROM rampa  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idrampa\"";
          if (isset($this->NM_ajax_info['select_html']['idrampa']) && !empty($this->NM_ajax_info['select_html']['idrampa']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idrampa'];
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

                  if ($this->idrampa == $sValue)
                  {
                      $this->_tmp_lookup_idrampa = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idrampa'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idrampa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idrampa']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idrampa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idrampa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idrampa']['labList'] = $aLabel;
          }
   }

          //----- idfuncionario
   function ajax_return_values_idfuncionario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idfuncionario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idfuncionario);
              $aLookup = array();
              $this->_tmp_lookup_idfuncionario = $this->idfuncionario;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idfuncionario, nombre FROM funcionario WHERE idfuncionario = " . substr($this->Db->qstr($this->idfuncionario), 1, -1) . " ORDER BY nombre";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idfuncionario)
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
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['idfuncionario'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idfuncionario']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idfuncionario']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idfuncionario']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idfuncionario))]) ? $aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idfuncionario))] : "";
          $this->NM_ajax_info['fldList']['idfuncionario_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- idgestor_aduanal
   function ajax_return_values_idgestor_aduanal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idgestor_aduanal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idgestor_aduanal);
              $aLookup = array();
              $this->_tmp_lookup_idgestor_aduanal = $this->idgestor_aduanal;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idgestor_aduanal, nombre FROM gestor_aduanal WHERE idgestor_aduanal = " . substr($this->Db->qstr($this->idgestor_aduanal), 1, -1) . " ORDER BY idgestor_aduanal";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idgestor_aduanal)
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
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['idgestor_aduanal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idgestor_aduanal']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idgestor_aduanal']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idgestor_aduanal']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idgestor_aduanal))]) ? $aLookup[0][form_revision_pack_protect_string(NM_charset_to_utf8($this->idgestor_aduanal))] : "";
          $this->NM_ajax_info['fldList']['idgestor_aduanal_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- idestado_revision
   function ajax_return_values_idestado_revision($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idestado_revision", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idestado_revision);
              $aLookup = array();
              $this->_tmp_lookup_idestado_revision = $this->idestado_revision;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array(); 
}
$aLookup[] = array(form_revision_pack_protect_string('') => form_revision_pack_protect_string('-- SELECCIONE --'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idestado_revision, descripcion FROM estado_revision ORDER BY idestado_revision";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_revision_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idestado_revision\"";
          if (isset($this->NM_ajax_info['select_html']['idestado_revision']) && !empty($this->NM_ajax_info['select_html']['idestado_revision']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idestado_revision'];
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

                  if ($this->idestado_revision == $sValue)
                  {
                      $this->_tmp_lookup_idestado_revision = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idestado_revision'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idestado_revision']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idestado_revision']['valList'][$i] = form_revision_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idestado_revision']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idestado_revision']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idestado_revision']['labList'] = $aLabel;
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

          //----- codigo_revision
   function ajax_return_values_codigo_revision($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo_revision", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo_revision);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codigo_revision'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
      }
      else
      {
          if (!isset($this->nmgp_cmp_hidden["observaciones"]))
          {
              $this->nmgp_cmp_hidden["observaciones"] = "off"; $this->NM_ajax_info['fieldDisplay']['observaciones'] = 'off';
          }
      }
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
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_revision']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_idestado = $this->idestado;
    $original_sec_users_login = $this->sec_users_login;
}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
 $this->sec_users_login =$this->sc_temp_usr_login;
$this->idestado =1;






if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_idestado != $this->idestado || (isset($bFlagRead_idestado) && $bFlagRead_idestado)))
    {
        $this->ajax_return_values_idestado(true);
    }
    if (($original_sec_users_login != $this->sec_users_login || (isset($bFlagRead_sec_users_login) && $bFlagRead_sec_users_login)))
    {
        $this->ajax_return_values_sec_users_login(true);
    }
}
$_SESSION['scriptcase']['form_revision']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_revision']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_codigo_revision = $this->codigo_revision;
}
             /* bitacora_revisiones */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM bitacora_revisiones WHERE codigo_revision = " . $this->codigo_revision ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM bitacora_revisiones WHERE codigo_revision = " . $this->codigo_revision ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_bitacora_revisiones = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_bitacora_revisiones[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_bitacora_revisiones = false;
          $this->dataset_bitacora_revisiones_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_bitacora_revisiones[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_revision' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_codigo_revision != $this->codigo_revision || (isset($bFlagRead_codigo_revision) && $bFlagRead_codigo_revision)))
    {
        $this->ajax_return_values_codigo_revision(true);
    }
}
$_SESSION['scriptcase']['form_revision']['contr_erro'] = 'off'; 
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
      if ('incluir' == $this->nmgp_opcao && $this->idrampa == ""){$this->idrampa = "null"; $NM_val_null[] = "idrampa";}  
      if ('incluir' == $this->nmgp_opcao && empty($this->idestado)) {$this->idestado = ""; $NM_val_null[] = "idestado";}  
      if ('incluir' == $this->nmgp_opcao && $this->idoperador == ""){$this->idoperador = "null"; $NM_val_null[] = "idoperador";}  
      if ('incluir' == $this->nmgp_opcao && $this->idtipoderevision == ""){$this->idtipoderevision = "null"; $NM_val_null[] = "idtipoderevision";}  
      $NM_val_form['fecha_solicitud'] = $this->fecha_solicitud;
      $NM_val_form['idestado'] = $this->idestado;
      $NM_val_form['factura_revision'] = $this->factura_revision;
      $NM_val_form['factura_acople'] = $this->factura_acople;
      $NM_val_form['idtipo_movilizacion'] = $this->idtipo_movilizacion;
      $NM_val_form['idregimen_aduanero'] = $this->idregimen_aduanero;
      $NM_val_form['maga'] = $this->maga;
      $NM_val_form['sgaia'] = $this->sgaia;
      $NM_val_form['sat'] = $this->sat;
      $NM_val_form['dipafront'] = $this->dipafront;
      $NM_val_form['ucc'] = $this->ucc;
      $NM_val_form['observaciones'] = $this->observaciones;
      $NM_val_form['idcabezal'] = $this->idcabezal;
      $NM_val_form['contenedor'] = $this->contenedor;
      $NM_val_form['idmedida'] = $this->idmedida;
      $NM_val_form['idnaviera'] = $this->idnaviera;
      $NM_val_form['idselectivo'] = $this->idselectivo;
      $NM_val_form['idtipodecarga'] = $this->idtipodecarga;
      $NM_val_form['idconsignatario'] = $this->idconsignatario;
      $NM_val_form['idcontenido'] = $this->idcontenido;
      $NM_val_form['bl'] = $this->bl;
      $NM_val_form['cantidad_por_bl'] = $this->cantidad_por_bl;
      $NM_val_form['idviaje_importacion'] = $this->idviaje_importacion;
      $NM_val_form['iddestino'] = $this->iddestino;
      $NM_val_form['ubicacion'] = $this->ubicacion;
      $NM_val_form['idrampa'] = $this->idrampa;
      $NM_val_form['idfuncionario'] = $this->idfuncionario;
      $NM_val_form['idgestor_aduanal'] = $this->idgestor_aduanal;
      $NM_val_form['idestado_revision'] = $this->idestado_revision;
      $NM_val_form['sec_users_login'] = $this->sec_users_login;
      $NM_val_form['codigo_revision'] = $this->codigo_revision;
      $NM_val_form['turno'] = $this->turno;
      $NM_val_form['termonebulizacion'] = $this->termonebulizacion;
      $NM_val_form['porcentaje_intrusion'] = $this->porcentaje_intrusion;
      $NM_val_form['idoperador'] = $this->idoperador;
      $NM_val_form['idtipoderevision'] = $this->idtipoderevision;
      if ($this->codigo_revision === "" || is_null($this->codigo_revision))  
      { 
          $this->codigo_revision = 0;
      } 
      if ($this->maga === "" || is_null($this->maga))  
      { 
          $this->maga = 0;
          $this->sc_force_zero[] = 'maga';
      } 
      if ($this->sgaia === "" || is_null($this->sgaia))  
      { 
          $this->sgaia = 0;
          $this->sc_force_zero[] = 'sgaia';
      } 
      if ($this->sat === "" || is_null($this->sat))  
      { 
          $this->sat = 0;
          $this->sc_force_zero[] = 'sat';
      } 
      if ($this->dipafront === "" || is_null($this->dipafront))  
      { 
          $this->dipafront = 0;
          $this->sc_force_zero[] = 'dipafront';
      } 
      if ($this->ucc === "" || is_null($this->ucc))  
      { 
          $this->ucc = 0;
          $this->sc_force_zero[] = 'ucc';
      } 
      if ($this->idnaviera === "" || is_null($this->idnaviera))  
      { 
          $this->idnaviera = 0;
          $this->sc_force_zero[] = 'idnaviera';
      } 
      if ($this->idcabezal === "" || is_null($this->idcabezal))  
      { 
          $this->idcabezal = 0;
          $this->sc_force_zero[] = 'idcabezal';
      } 
      if ($this->idgestor_aduanal === "" || is_null($this->idgestor_aduanal))  
      { 
          $this->idgestor_aduanal = 0;
          $this->sc_force_zero[] = 'idgestor_aduanal';
      } 
      if ($this->idrampa === "" || is_null($this->idrampa))  
      { 
          $this->idrampa = 0;
          $this->sc_force_zero[] = 'idrampa';
      } 
      if ($this->idconsignatario === "" || is_null($this->idconsignatario))  
      { 
          $this->idconsignatario = 0;
          $this->sc_force_zero[] = 'idconsignatario';
      } 
      if ($this->idcontenido === "" || is_null($this->idcontenido))  
      { 
          $this->idcontenido = 0;
          $this->sc_force_zero[] = 'idcontenido';
      } 
      if ($this->idestado_revision === "" || is_null($this->idestado_revision))  
      { 
          $this->idestado_revision = 0;
          $this->sc_force_zero[] = 'idestado_revision';
      } 
      if ($this->cantidad_por_bl === "" || is_null($this->cantidad_por_bl))  
      { 
          $this->cantidad_por_bl = 0;
          $this->sc_force_zero[] = 'cantidad_por_bl';
      } 
      if ($this->idmedida === "" || is_null($this->idmedida))  
      { 
          $this->idmedida = 0;
          $this->sc_force_zero[] = 'idmedida';
      } 
      if ($this->idselectivo === "" || is_null($this->idselectivo))  
      { 
          $this->idselectivo = 0;
          $this->sc_force_zero[] = 'idselectivo';
      } 
      if ($this->idtipodecarga === "" || is_null($this->idtipodecarga))  
      { 
          $this->idtipodecarga = 0;
          $this->sc_force_zero[] = 'idtipodecarga';
      } 
      if ($this->idfuncionario === "" || is_null($this->idfuncionario))  
      { 
          $this->idfuncionario = 0;
          $this->sc_force_zero[] = 'idfuncionario';
      } 
      if ($this->idviaje_importacion === "" || is_null($this->idviaje_importacion))  
      { 
          $this->idviaje_importacion = 0;
          $this->sc_force_zero[] = 'idviaje_importacion';
      } 
      if ($this->idregimen_aduanero === "" || is_null($this->idregimen_aduanero))  
      { 
          $this->idregimen_aduanero = 0;
          $this->sc_force_zero[] = 'idregimen_aduanero';
      } 
      if ($this->iddestino === "" || is_null($this->iddestino))  
      { 
          $this->iddestino = 0;
          $this->sc_force_zero[] = 'iddestino';
      } 
      if ($this->turno === "" || is_null($this->turno))  
      { 
          $this->turno = 0;
          $this->sc_force_zero[] = 'turno';
      } 
      if ($this->idestado === "" || is_null($this->idestado))  
      { 
          $this->idestado = 0;
          $this->sc_force_zero[] = 'idestado';
      } 
      if ($this->termonebulizacion === "" || is_null($this->termonebulizacion))  
      { 
          $this->termonebulizacion = 0;
          $this->sc_force_zero[] = 'termonebulizacion';
      } 
      if ($this->porcentaje_intrusion === "" || is_null($this->porcentaje_intrusion))  
      { 
          $this->porcentaje_intrusion = 0;
          $this->sc_force_zero[] = 'porcentaje_intrusion';
      } 
      if ($this->idoperador === "" || is_null($this->idoperador))  
      { 
          $this->idoperador = 0;
          $this->sc_force_zero[] = 'idoperador';
      } 
      if ($this->idtipoderevision === "" || is_null($this->idtipoderevision))  
      { 
          $this->idtipoderevision = 0;
          $this->sc_force_zero[] = 'idtipoderevision';
      } 
      if ($this->idtipo_movilizacion === "" || is_null($this->idtipo_movilizacion))  
      { 
          $this->idtipo_movilizacion = 0;
          $this->sc_force_zero[] = 'idtipo_movilizacion';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_ibase, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->fecha_solicitud == "")  
          { 
              $this->fecha_solicitud = "null"; 
              $NM_val_null[] = "fecha_solicitud";
          } 
          $this->contenedor_before_qstr = $this->contenedor;
          $this->contenedor = substr($this->Db->qstr($this->contenedor), 1, -1); 
          if ($this->contenedor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contenedor = "null"; 
              $NM_val_null[] = "contenedor";
          } 
          $this->bl_before_qstr = $this->bl;
          $this->bl = substr($this->Db->qstr($this->bl), 1, -1); 
          if ($this->bl == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bl = "null"; 
              $NM_val_null[] = "bl";
          } 
          $this->observaciones_before_qstr = $this->observaciones;
          $this->observaciones = substr($this->Db->qstr($this->observaciones), 1, -1); 
          if ($this->observaciones == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones = "null"; 
              $NM_val_null[] = "observaciones";
          } 
          $this->sec_users_login_before_qstr = $this->sec_users_login;
          $this->sec_users_login = substr($this->Db->qstr($this->sec_users_login), 1, -1); 
          if ($this->sec_users_login == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sec_users_login = "null"; 
              $NM_val_null[] = "sec_users_login";
          } 
          $this->factura_revision_before_qstr = $this->factura_revision;
          $this->factura_revision = substr($this->Db->qstr($this->factura_revision), 1, -1); 
          if ($this->factura_revision == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->factura_revision = "null"; 
              $NM_val_null[] = "factura_revision";
          } 
          $this->factura_acople_before_qstr = $this->factura_acople;
          $this->factura_acople = substr($this->Db->qstr($this->factura_acople), 1, -1); 
          if ($this->factura_acople == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->factura_acople = "null"; 
              $NM_val_null[] = "factura_acople";
          } 
          $this->ubicacion_before_qstr = $this->ubicacion;
          $this->ubicacion = substr($this->Db->qstr($this->ubicacion), 1, -1); 
          if ($this->ubicacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ubicacion = "null"; 
              $NM_val_null[] = "ubicacion";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_revision_pack_ajax_response();
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
                  $SC_fields_update[] = "fecha_solicitud = #$this->fecha_solicitud#, maga = $this->maga, sgaia = $this->sgaia, sat = $this->sat, dipafront = $this->dipafront, ucc = $this->ucc, idNaviera = $this->idnaviera, contenedor = '$this->contenedor', bl = '$this->bl', idcabezal = $this->idcabezal, idgestor_aduanal = $this->idgestor_aduanal, idrampa = $this->idrampa, idconsignatario = $this->idconsignatario, idcontenido = $this->idcontenido, idestado_revision = $this->idestado_revision, cantidad_por_bl = $this->cantidad_por_bl, idmedida = $this->idmedida, idselectivo = $this->idselectivo, idtipodecarga = $this->idtipodecarga, sec_users_login = '$this->sec_users_login', factura_revision = '$this->factura_revision', factura_acople = '$this->factura_acople', ubicacion = '$this->ubicacion', idfuncionario = $this->idfuncionario, idviaje_importacion = $this->idviaje_importacion, idregimen_aduanero = $this->idregimen_aduanero, iddestino = $this->iddestino, idestado = $this->idestado, idtipo_movilizacion = $this->idtipo_movilizacion"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fecha_solicitud = " . $this->Ini->date_delim . $this->fecha_solicitud . $this->Ini->date_delim1 . ", maga = $this->maga, sgaia = $this->sgaia, sat = $this->sat, dipafront = $this->dipafront, ucc = $this->ucc, idNaviera = $this->idnaviera, contenedor = '$this->contenedor', bl = '$this->bl', idcabezal = $this->idcabezal, idgestor_aduanal = $this->idgestor_aduanal, idrampa = $this->idrampa, idconsignatario = $this->idconsignatario, idcontenido = $this->idcontenido, idestado_revision = $this->idestado_revision, cantidad_por_bl = $this->cantidad_por_bl, idmedida = $this->idmedida, idselectivo = $this->idselectivo, idtipodecarga = $this->idtipodecarga, sec_users_login = '$this->sec_users_login', factura_revision = '$this->factura_revision', factura_acople = '$this->factura_acople', ubicacion = '$this->ubicacion', idfuncionario = $this->idfuncionario, idviaje_importacion = $this->idviaje_importacion, idregimen_aduanero = $this->idregimen_aduanero, iddestino = $this->iddestino, idestado = $this->idestado, idtipo_movilizacion = $this->idtipo_movilizacion"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fecha_solicitud = " . $this->Ini->date_delim . $this->fecha_solicitud . $this->Ini->date_delim1 . ", maga = $this->maga, sgaia = $this->sgaia, sat = $this->sat, dipafront = $this->dipafront, ucc = $this->ucc, idNaviera = $this->idnaviera, contenedor = '$this->contenedor', bl = '$this->bl', idcabezal = $this->idcabezal, idgestor_aduanal = $this->idgestor_aduanal, idrampa = $this->idrampa, idconsignatario = $this->idconsignatario, idcontenido = $this->idcontenido, idestado_revision = $this->idestado_revision, cantidad_por_bl = $this->cantidad_por_bl, idmedida = $this->idmedida, idselectivo = $this->idselectivo, idtipodecarga = $this->idtipodecarga, sec_users_login = '$this->sec_users_login', factura_revision = '$this->factura_revision', factura_acople = '$this->factura_acople', ubicacion = '$this->ubicacion', idfuncionario = $this->idfuncionario, idviaje_importacion = $this->idviaje_importacion, idregimen_aduanero = $this->idregimen_aduanero, iddestino = $this->iddestino, idestado = $this->idestado, idtipo_movilizacion = $this->idtipo_movilizacion"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fecha_solicitud = " . $this->Ini->date_delim . $this->fecha_solicitud . $this->Ini->date_delim1 . ", maga = $this->maga, sgaia = $this->sgaia, sat = $this->sat, dipafront = $this->dipafront, ucc = $this->ucc, idNaviera = $this->idnaviera, contenedor = '$this->contenedor', bl = '$this->bl', idcabezal = $this->idcabezal, idgestor_aduanal = $this->idgestor_aduanal, idrampa = $this->idrampa, idconsignatario = $this->idconsignatario, idcontenido = $this->idcontenido, idestado_revision = $this->idestado_revision, cantidad_por_bl = $this->cantidad_por_bl, idmedida = $this->idmedida, idselectivo = $this->idselectivo, idtipodecarga = $this->idtipodecarga, sec_users_login = '$this->sec_users_login', factura_revision = '$this->factura_revision', factura_acople = '$this->factura_acople', ubicacion = '$this->ubicacion', idfuncionario = $this->idfuncionario, idviaje_importacion = $this->idviaje_importacion, idregimen_aduanero = $this->idregimen_aduanero, iddestino = $this->iddestino, idestado = $this->idestado, idtipo_movilizacion = $this->idtipo_movilizacion"; 
              } 
              if (isset($NM_val_form['observaciones']) && $NM_val_form['observaciones'] != $this->nmgp_dados_select['observaciones']) 
              { 
                  $SC_fields_update[] = "observaciones = '$this->observaciones'"; 
              } 
              if (isset($NM_val_form['turno']) && $NM_val_form['turno'] != $this->nmgp_dados_select['turno']) 
              { 
                  $SC_fields_update[] = "turno = $this->turno"; 
              } 
              if (isset($NM_val_form['termonebulizacion']) && $NM_val_form['termonebulizacion'] != $this->nmgp_dados_select['termonebulizacion']) 
              { 
                  $SC_fields_update[] = "termonebulizacion = $this->termonebulizacion"; 
              } 
              if (isset($NM_val_form['porcentaje_intrusion']) && $NM_val_form['porcentaje_intrusion'] != $this->nmgp_dados_select['porcentaje_intrusion']) 
              { 
                  $SC_fields_update[] = "porcentaje_intrusion = $this->porcentaje_intrusion"; 
              } 
              if (isset($NM_val_form['idoperador']) && $NM_val_form['idoperador'] != $this->nmgp_dados_select['idoperador']) 
              { 
                  $SC_fields_update[] = "idoperador = $this->idoperador"; 
              } 
              if (isset($NM_val_form['idtipoderevision']) && $NM_val_form['idtipoderevision'] != $this->nmgp_dados_select['idtipoderevision']) 
              { 
                  $SC_fields_update[] = "idtipoderevision = $this->idtipoderevision"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE codigo_revision = $this->codigo_revision ";  
              }  
              else  
              {
                  $comando .= " WHERE codigo_revision = $this->codigo_revision ";  
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
                                  form_revision_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->contenedor = $this->contenedor_before_qstr;
              $this->bl = $this->bl_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->sec_users_login = $this->sec_users_login_before_qstr;
              $this->factura_revision = $this->factura_revision_before_qstr;
              $this->factura_acople = $this->factura_acople_before_qstr;
              $this->ubicacion = $this->ubicacion_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['codigo_revision'])) { $this->codigo_revision = $NM_val_form['codigo_revision']; }
              elseif (isset($this->codigo_revision)) { $this->nm_limpa_alfa($this->codigo_revision); }
              if     (isset($NM_val_form) && isset($NM_val_form['maga'])) { $this->maga = $NM_val_form['maga']; }
              elseif (isset($this->maga)) { $this->nm_limpa_alfa($this->maga); }
              if     (isset($NM_val_form) && isset($NM_val_form['sgaia'])) { $this->sgaia = $NM_val_form['sgaia']; }
              elseif (isset($this->sgaia)) { $this->nm_limpa_alfa($this->sgaia); }
              if     (isset($NM_val_form) && isset($NM_val_form['sat'])) { $this->sat = $NM_val_form['sat']; }
              elseif (isset($this->sat)) { $this->nm_limpa_alfa($this->sat); }
              if     (isset($NM_val_form) && isset($NM_val_form['dipafront'])) { $this->dipafront = $NM_val_form['dipafront']; }
              elseif (isset($this->dipafront)) { $this->nm_limpa_alfa($this->dipafront); }
              if     (isset($NM_val_form) && isset($NM_val_form['ucc'])) { $this->ucc = $NM_val_form['ucc']; }
              elseif (isset($this->ucc)) { $this->nm_limpa_alfa($this->ucc); }
              if     (isset($NM_val_form) && isset($NM_val_form['idnaviera'])) { $this->idnaviera = $NM_val_form['idnaviera']; }
              elseif (isset($this->idnaviera)) { $this->nm_limpa_alfa($this->idnaviera); }
              if     (isset($NM_val_form) && isset($NM_val_form['contenedor'])) { $this->contenedor = $NM_val_form['contenedor']; }
              elseif (isset($this->contenedor)) { $this->nm_limpa_alfa($this->contenedor); }
              if     (isset($NM_val_form) && isset($NM_val_form['bl'])) { $this->bl = $NM_val_form['bl']; }
              elseif (isset($this->bl)) { $this->nm_limpa_alfa($this->bl); }
              if     (isset($NM_val_form) && isset($NM_val_form['observaciones'])) { $this->observaciones = $NM_val_form['observaciones']; }
              elseif (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
              if     (isset($NM_val_form) && isset($NM_val_form['idcabezal'])) { $this->idcabezal = $NM_val_form['idcabezal']; }
              elseif (isset($this->idcabezal)) { $this->nm_limpa_alfa($this->idcabezal); }
              if     (isset($NM_val_form) && isset($NM_val_form['idgestor_aduanal'])) { $this->idgestor_aduanal = $NM_val_form['idgestor_aduanal']; }
              elseif (isset($this->idgestor_aduanal)) { $this->nm_limpa_alfa($this->idgestor_aduanal); }
              if     (isset($NM_val_form) && isset($NM_val_form['idrampa'])) { $this->idrampa = $NM_val_form['idrampa']; }
              elseif (isset($this->idrampa)) { $this->nm_limpa_alfa($this->idrampa); }
              if     (isset($NM_val_form) && isset($NM_val_form['idconsignatario'])) { $this->idconsignatario = $NM_val_form['idconsignatario']; }
              elseif (isset($this->idconsignatario)) { $this->nm_limpa_alfa($this->idconsignatario); }
              if     (isset($NM_val_form) && isset($NM_val_form['idcontenido'])) { $this->idcontenido = $NM_val_form['idcontenido']; }
              elseif (isset($this->idcontenido)) { $this->nm_limpa_alfa($this->idcontenido); }
              if     (isset($NM_val_form) && isset($NM_val_form['idestado_revision'])) { $this->idestado_revision = $NM_val_form['idestado_revision']; }
              elseif (isset($this->idestado_revision)) { $this->nm_limpa_alfa($this->idestado_revision); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidad_por_bl'])) { $this->cantidad_por_bl = $NM_val_form['cantidad_por_bl']; }
              elseif (isset($this->cantidad_por_bl)) { $this->nm_limpa_alfa($this->cantidad_por_bl); }
              if     (isset($NM_val_form) && isset($NM_val_form['idmedida'])) { $this->idmedida = $NM_val_form['idmedida']; }
              elseif (isset($this->idmedida)) { $this->nm_limpa_alfa($this->idmedida); }
              if     (isset($NM_val_form) && isset($NM_val_form['idselectivo'])) { $this->idselectivo = $NM_val_form['idselectivo']; }
              elseif (isset($this->idselectivo)) { $this->nm_limpa_alfa($this->idselectivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['idtipodecarga'])) { $this->idtipodecarga = $NM_val_form['idtipodecarga']; }
              elseif (isset($this->idtipodecarga)) { $this->nm_limpa_alfa($this->idtipodecarga); }
              if     (isset($NM_val_form) && isset($NM_val_form['sec_users_login'])) { $this->sec_users_login = $NM_val_form['sec_users_login']; }
              elseif (isset($this->sec_users_login)) { $this->nm_limpa_alfa($this->sec_users_login); }
              if     (isset($NM_val_form) && isset($NM_val_form['factura_revision'])) { $this->factura_revision = $NM_val_form['factura_revision']; }
              elseif (isset($this->factura_revision)) { $this->nm_limpa_alfa($this->factura_revision); }
              if     (isset($NM_val_form) && isset($NM_val_form['factura_acople'])) { $this->factura_acople = $NM_val_form['factura_acople']; }
              elseif (isset($this->factura_acople)) { $this->nm_limpa_alfa($this->factura_acople); }
              if     (isset($NM_val_form) && isset($NM_val_form['ubicacion'])) { $this->ubicacion = $NM_val_form['ubicacion']; }
              elseif (isset($this->ubicacion)) { $this->nm_limpa_alfa($this->ubicacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['idfuncionario'])) { $this->idfuncionario = $NM_val_form['idfuncionario']; }
              elseif (isset($this->idfuncionario)) { $this->nm_limpa_alfa($this->idfuncionario); }
              if     (isset($NM_val_form) && isset($NM_val_form['idviaje_importacion'])) { $this->idviaje_importacion = $NM_val_form['idviaje_importacion']; }
              elseif (isset($this->idviaje_importacion)) { $this->nm_limpa_alfa($this->idviaje_importacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['idregimen_aduanero'])) { $this->idregimen_aduanero = $NM_val_form['idregimen_aduanero']; }
              elseif (isset($this->idregimen_aduanero)) { $this->nm_limpa_alfa($this->idregimen_aduanero); }
              if     (isset($NM_val_form) && isset($NM_val_form['iddestino'])) { $this->iddestino = $NM_val_form['iddestino']; }
              elseif (isset($this->iddestino)) { $this->nm_limpa_alfa($this->iddestino); }
              if     (isset($NM_val_form) && isset($NM_val_form['idestado'])) { $this->idestado = $NM_val_form['idestado']; }
              elseif (isset($this->idestado)) { $this->nm_limpa_alfa($this->idestado); }
              if     (isset($NM_val_form) && isset($NM_val_form['idtipo_movilizacion'])) { $this->idtipo_movilizacion = $NM_val_form['idtipo_movilizacion']; }
              elseif (isset($this->idtipo_movilizacion)) { $this->nm_limpa_alfa($this->idtipo_movilizacion); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('fecha_solicitud', 'idestado', 'factura_revision', 'factura_acople', 'idtipo_movilizacion', 'idregimen_aduanero', 'maga', 'sgaia', 'sat', 'dipafront', 'ucc', 'observaciones', 'idcabezal', 'contenedor', 'idmedida', 'idnaviera', 'idselectivo', 'idtipodecarga', 'idconsignatario', 'idcontenido', 'bl', 'cantidad_por_bl', 'idviaje_importacion', 'iddestino', 'ubicacion', 'idrampa', 'idfuncionario', 'idgestor_aduanal', 'idestado_revision', 'sec_users_login', 'codigo_revision'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['foreign_key'] as $sFKName => $sFKValue)
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
              $NM_cmp_auto = "codigo_revision, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_revision_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (fecha_solicitud, maga, sgaia, sat, dipafront, ucc, idNaviera, contenedor, bl, observaciones, idcabezal, idgestor_aduanal, idrampa, idconsignatario, idcontenido, idestado_revision, cantidad_por_bl, idmedida, idselectivo, idtipodecarga, sec_users_login, factura_revision, factura_acople, ubicacion, idfuncionario, idviaje_importacion, idregimen_aduanero, iddestino, turno, idestado, termonebulizacion, porcentaje_intrusion, idoperador, idtipoderevision, idtipo_movilizacion) VALUES (#$this->fecha_solicitud#, $this->maga, $this->sgaia, $this->sat, $this->dipafront, $this->ucc, $this->idnaviera, '$this->contenedor', '$this->bl', '$this->observaciones', $this->idcabezal, $this->idgestor_aduanal, $this->idrampa, $this->idconsignatario, $this->idcontenido, $this->idestado_revision, $this->cantidad_por_bl, $this->idmedida, $this->idselectivo, $this->idtipodecarga, '$this->sec_users_login', '$this->factura_revision', '$this->factura_acople', '$this->ubicacion', $this->idfuncionario, $this->idviaje_importacion, $this->idregimen_aduanero, $this->iddestino, $this->turno, $this->idestado, $this->termonebulizacion, $this->porcentaje_intrusion, $this->idoperador, $this->idtipoderevision, $this->idtipo_movilizacion)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fecha_solicitud, maga, sgaia, sat, dipafront, ucc, idNaviera, contenedor, bl, observaciones, idcabezal, idgestor_aduanal, idrampa, idconsignatario, idcontenido, idestado_revision, cantidad_por_bl, idmedida, idselectivo, idtipodecarga, sec_users_login, factura_revision, factura_acople, ubicacion, idfuncionario, idviaje_importacion, idregimen_aduanero, iddestino, turno, idestado, termonebulizacion, porcentaje_intrusion, idoperador, idtipoderevision, idtipo_movilizacion) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->fecha_solicitud . $this->Ini->date_delim1 . ", $this->maga, $this->sgaia, $this->sat, $this->dipafront, $this->ucc, $this->idnaviera, '$this->contenedor', '$this->bl', '$this->observaciones', $this->idcabezal, $this->idgestor_aduanal, $this->idrampa, $this->idconsignatario, $this->idcontenido, $this->idestado_revision, $this->cantidad_por_bl, $this->idmedida, $this->idselectivo, $this->idtipodecarga, '$this->sec_users_login', '$this->factura_revision', '$this->factura_acople', '$this->ubicacion', $this->idfuncionario, $this->idviaje_importacion, $this->idregimen_aduanero, $this->iddestino, $this->turno, $this->idestado, $this->termonebulizacion, $this->porcentaje_intrusion, $this->idoperador, $this->idtipoderevision, $this->idtipo_movilizacion)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fecha_solicitud, maga, sgaia, sat, dipafront, ucc, idNaviera, contenedor, bl, observaciones, idcabezal, idgestor_aduanal, idrampa, idconsignatario, idcontenido, idestado_revision, cantidad_por_bl, idmedida, idselectivo, idtipodecarga, sec_users_login, factura_revision, factura_acople, ubicacion, idfuncionario, idviaje_importacion, idregimen_aduanero, iddestino, turno, idestado, termonebulizacion, porcentaje_intrusion, idoperador, idtipoderevision, idtipo_movilizacion) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->fecha_solicitud . $this->Ini->date_delim1 . ", $this->maga, $this->sgaia, $this->sat, $this->dipafront, $this->ucc, $this->idnaviera, '$this->contenedor', '$this->bl', '$this->observaciones', $this->idcabezal, $this->idgestor_aduanal, $this->idrampa, $this->idconsignatario, $this->idcontenido, $this->idestado_revision, $this->cantidad_por_bl, $this->idmedida, $this->idselectivo, $this->idtipodecarga, '$this->sec_users_login', '$this->factura_revision', '$this->factura_acople', '$this->ubicacion', $this->idfuncionario, $this->idviaje_importacion, $this->idregimen_aduanero, $this->iddestino, $this->turno, $this->idestado, $this->termonebulizacion, $this->porcentaje_intrusion, $this->idoperador, $this->idtipoderevision, $this->idtipo_movilizacion)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fecha_solicitud, maga, sgaia, sat, dipafront, ucc, idNaviera, contenedor, bl, observaciones, idcabezal, idgestor_aduanal, idrampa, idconsignatario, idcontenido, idestado_revision, cantidad_por_bl, idmedida, idselectivo, idtipodecarga, sec_users_login, factura_revision, factura_acople, ubicacion, idfuncionario, idviaje_importacion, idregimen_aduanero, iddestino, turno, idestado, termonebulizacion, porcentaje_intrusion, idoperador, idtipoderevision, idtipo_movilizacion) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->fecha_solicitud . $this->Ini->date_delim1 . ", $this->maga, $this->sgaia, $this->sat, $this->dipafront, $this->ucc, $this->idnaviera, '$this->contenedor', '$this->bl', '$this->observaciones', $this->idcabezal, $this->idgestor_aduanal, $this->idrampa, $this->idconsignatario, $this->idcontenido, $this->idestado_revision, $this->cantidad_por_bl, $this->idmedida, $this->idselectivo, $this->idtipodecarga, '$this->sec_users_login', '$this->factura_revision', '$this->factura_acople', '$this->ubicacion', $this->idfuncionario, $this->idviaje_importacion, $this->idregimen_aduanero, $this->iddestino, $this->turno, $this->idestado, $this->termonebulizacion, $this->porcentaje_intrusion, $this->idoperador, $this->idtipoderevision, $this->idtipo_movilizacion)"; 
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
                              form_revision_pack_ajax_response();
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
                          form_revision_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->codigo_revision =  $rsy->fields[0];
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
                  $this->codigo_revision = $rsy->fields[0];
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
                  $this->codigo_revision = $rsy->fields[0];
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
                  $this->codigo_revision = $rsy->fields[0];
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
                  $this->codigo_revision = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->contenedor = $this->contenedor_before_qstr;
              $this->bl = $this->bl_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->sec_users_login = $this->sec_users_login_before_qstr;
              $this->factura_revision = $this->factura_revision_before_qstr;
              $this->factura_acople = $this->factura_acople_before_qstr;
              $this->ubicacion = $this->ubicacion_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['return_edit'] = "new";
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
          $this->codigo_revision = substr($this->Db->qstr($this->codigo_revision), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where codigo_revision = $this->codigo_revision "); 
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
                          form_revision_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total']);
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
        $_SESSION['scriptcase']['form_revision']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_codigo_revision = $this->codigo_revision;
}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
 
date_default_timezone_set('America/Guatemala');
$fecha=date('Y-m-d H:i:s');

$insert_table  = 'bitacora_revision';     
$insert_fields = array(  
     'fecha' => "'$fecha'",
     'codigo_revision' => "(SELECT codigo_revision FROM revision where codigo_revision='".$this->codigo_revision ."' )",
	 'estatus_revision' => "1",	 
	 'correlativo_de_control' => "1",
	 'usuario_modifica' => "'$this->sc_temp_usr_login'",
	'observaciones' => "''",
	'hora_inicio' => "'$fecha'",
	'hora_fin' => "'$fecha'",
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
                form_revision_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_codigo_revision != $this->codigo_revision || (isset($bFlagRead_codigo_revision) && $bFlagRead_codigo_revision)))
    {
        $this->ajax_return_values_codigo_revision(true);
    }
}
$_SESSION['scriptcase']['form_revision']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['parms'] = "codigo_revision?#?$this->codigo_revision?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->codigo_revision = null === $this->codigo_revision ? null : substr($this->Db->qstr($this->codigo_revision), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->codigo_revision)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->codigo_revision) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_revision = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total'] = $qt_geral_reg_form_revision;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->codigo_revision))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "codigo_revision < $this->codigo_revision "; 
              }  
              else  
              {
                  $Key_Where = "codigo_revision < $this->codigo_revision "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_revision = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] > $qt_geral_reg_form_revision)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] = $qt_geral_reg_form_revision; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] = $qt_geral_reg_form_revision; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_revision) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT codigo_revision, str_replace (convert(char(10),fecha_solicitud,102), '.', '-') + ' ' + convert(char(8),fecha_solicitud,20), maga, sgaia, sat, dipafront, ucc, idNaviera, contenedor, bl, observaciones, idcabezal, idgestor_aduanal, idrampa, idconsignatario, idcontenido, idestado_revision, cantidad_por_bl, idmedida, idselectivo, idtipodecarga, sec_users_login, factura_revision, factura_acople, ubicacion, idfuncionario, idviaje_importacion, idregimen_aduanero, iddestino, turno, idestado, termonebulizacion, porcentaje_intrusion, idoperador, idtipoderevision, idtipo_movilizacion from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT codigo_revision, fecha_solicitud, maga, sgaia, sat, dipafront, ucc, idNaviera, contenedor, bl, observaciones, idcabezal, idgestor_aduanal, idrampa, idconsignatario, idcontenido, idestado_revision, cantidad_por_bl, idmedida, idselectivo, idtipodecarga, sec_users_login, factura_revision, factura_acople, ubicacion, idfuncionario, idviaje_importacion, idregimen_aduanero, iddestino, turno, idestado, termonebulizacion, porcentaje_intrusion, idoperador, idtipoderevision, idtipo_movilizacion from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "codigo_revision = $this->codigo_revision"; 
              }  
              else  
              {
                  $aWhere[] = "codigo_revision = $this->codigo_revision"; 
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
          $sc_order_by = "codigo_revision";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['empty_filter'] = true;
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
              $this->codigo_revision = $rs->fields[0] ; 
              $this->nmgp_dados_select['codigo_revision'] = $this->codigo_revision;
              $this->fecha_solicitud = $rs->fields[1] ; 
              if (substr($this->fecha_solicitud, 10, 1) == "-") 
              { 
                 $this->fecha_solicitud = substr($this->fecha_solicitud, 0, 10) . " " . substr($this->fecha_solicitud, 11);
              } 
              if (substr($this->fecha_solicitud, 13, 1) == ".") 
              { 
                 $this->fecha_solicitud = substr($this->fecha_solicitud, 0, 13) . ":" . substr($this->fecha_solicitud, 14, 2) . ":" . substr($this->fecha_solicitud, 17);
              } 
              $this->nmgp_dados_select['fecha_solicitud'] = $this->fecha_solicitud;
              $this->maga = $rs->fields[2] ; 
              $this->nmgp_dados_select['maga'] = $this->maga;
              $this->sgaia = $rs->fields[3] ; 
              $this->nmgp_dados_select['sgaia'] = $this->sgaia;
              $this->sat = $rs->fields[4] ; 
              $this->nmgp_dados_select['sat'] = $this->sat;
              $this->dipafront = $rs->fields[5] ; 
              $this->nmgp_dados_select['dipafront'] = $this->dipafront;
              $this->ucc = $rs->fields[6] ; 
              $this->nmgp_dados_select['ucc'] = $this->ucc;
              $this->idnaviera = $rs->fields[7] ; 
              $this->nmgp_dados_select['idnaviera'] = $this->idnaviera;
              $this->contenedor = $rs->fields[8] ; 
              $this->nmgp_dados_select['contenedor'] = $this->contenedor;
              $this->bl = $rs->fields[9] ; 
              $this->nmgp_dados_select['bl'] = $this->bl;
              $this->observaciones = $rs->fields[10] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->idcabezal = $rs->fields[11] ; 
              $this->nmgp_dados_select['idcabezal'] = $this->idcabezal;
              $this->idgestor_aduanal = $rs->fields[12] ; 
              $this->nmgp_dados_select['idgestor_aduanal'] = $this->idgestor_aduanal;
              $this->idrampa = $rs->fields[13] ; 
              $this->nmgp_dados_select['idrampa'] = $this->idrampa;
              $this->idconsignatario = $rs->fields[14] ; 
              $this->nmgp_dados_select['idconsignatario'] = $this->idconsignatario;
              $this->idcontenido = $rs->fields[15] ; 
              $this->nmgp_dados_select['idcontenido'] = $this->idcontenido;
              $this->idestado_revision = $rs->fields[16] ; 
              $this->nmgp_dados_select['idestado_revision'] = $this->idestado_revision;
              $this->cantidad_por_bl = $rs->fields[17] ; 
              $this->nmgp_dados_select['cantidad_por_bl'] = $this->cantidad_por_bl;
              $this->idmedida = $rs->fields[18] ; 
              $this->nmgp_dados_select['idmedida'] = $this->idmedida;
              $this->idselectivo = $rs->fields[19] ; 
              $this->nmgp_dados_select['idselectivo'] = $this->idselectivo;
              $this->idtipodecarga = $rs->fields[20] ; 
              $this->nmgp_dados_select['idtipodecarga'] = $this->idtipodecarga;
              $this->sec_users_login = $rs->fields[21] ; 
              $this->nmgp_dados_select['sec_users_login'] = $this->sec_users_login;
              $this->factura_revision = $rs->fields[22] ; 
              $this->nmgp_dados_select['factura_revision'] = $this->factura_revision;
              $this->factura_acople = $rs->fields[23] ; 
              $this->nmgp_dados_select['factura_acople'] = $this->factura_acople;
              $this->ubicacion = $rs->fields[24] ; 
              $this->nmgp_dados_select['ubicacion'] = $this->ubicacion;
              $this->idfuncionario = $rs->fields[25] ; 
              $this->nmgp_dados_select['idfuncionario'] = $this->idfuncionario;
              $this->idviaje_importacion = $rs->fields[26] ; 
              $this->nmgp_dados_select['idviaje_importacion'] = $this->idviaje_importacion;
              $this->idregimen_aduanero = $rs->fields[27] ; 
              $this->nmgp_dados_select['idregimen_aduanero'] = $this->idregimen_aduanero;
              $this->iddestino = $rs->fields[28] ; 
              $this->nmgp_dados_select['iddestino'] = $this->iddestino;
              $this->turno = $rs->fields[29] ; 
              $this->nmgp_dados_select['turno'] = $this->turno;
              $this->idestado = $rs->fields[30] ; 
              $this->nmgp_dados_select['idestado'] = $this->idestado;
              $this->termonebulizacion = $rs->fields[31] ; 
              $this->nmgp_dados_select['termonebulizacion'] = $this->termonebulizacion;
              $this->porcentaje_intrusion = $rs->fields[32] ; 
              $this->nmgp_dados_select['porcentaje_intrusion'] = $this->porcentaje_intrusion;
              $this->idoperador = $rs->fields[33] ; 
              $this->nmgp_dados_select['idoperador'] = $this->idoperador;
              $this->idtipoderevision = $rs->fields[34] ; 
              $this->nmgp_dados_select['idtipoderevision'] = $this->idtipoderevision;
              $this->idtipo_movilizacion = $rs->fields[35] ; 
              $this->nmgp_dados_select['idtipo_movilizacion'] = $this->idtipo_movilizacion;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->codigo_revision = (string)$this->codigo_revision; 
              $this->maga = (string)$this->maga; 
              $this->sgaia = (string)$this->sgaia; 
              $this->sat = (string)$this->sat; 
              $this->dipafront = (string)$this->dipafront; 
              $this->ucc = (string)$this->ucc; 
              $this->idnaviera = (string)$this->idnaviera; 
              $this->idcabezal = (string)$this->idcabezal; 
              $this->idgestor_aduanal = (string)$this->idgestor_aduanal; 
              $this->idrampa = (string)$this->idrampa; 
              $this->idconsignatario = (string)$this->idconsignatario; 
              $this->idcontenido = (string)$this->idcontenido; 
              $this->idestado_revision = (string)$this->idestado_revision; 
              $this->cantidad_por_bl = (string)$this->cantidad_por_bl; 
              $this->idmedida = (string)$this->idmedida; 
              $this->idselectivo = (string)$this->idselectivo; 
              $this->idtipodecarga = (string)$this->idtipodecarga; 
              $this->idfuncionario = (string)$this->idfuncionario; 
              $this->idviaje_importacion = (string)$this->idviaje_importacion; 
              $this->idregimen_aduanero = (string)$this->idregimen_aduanero; 
              $this->iddestino = (string)$this->iddestino; 
              $this->turno = (string)$this->turno; 
              $this->idestado = (string)$this->idestado; 
              $this->termonebulizacion = (string)$this->termonebulizacion; 
              $this->porcentaje_intrusion = (string)$this->porcentaje_intrusion; 
              $this->idoperador = (string)$this->idoperador; 
              $this->idtipoderevision = (string)$this->idtipoderevision; 
              $this->idtipo_movilizacion = (string)$this->idtipo_movilizacion; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['parms'] = "codigo_revision?#?$this->codigo_revision?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] < $qt_geral_reg_form_revision;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opcao']   = '';
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
              $this->codigo_revision = "";  
              $this->nmgp_dados_form["codigo_revision"] = $this->codigo_revision;
              $this->fecha_solicitud =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->fecha_solicitud_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["fecha_solicitud"] = $this->fecha_solicitud;
              $this->maga = "";  
              $this->nmgp_dados_form["maga"] = $this->maga;
              $this->sgaia = "";  
              $this->nmgp_dados_form["sgaia"] = $this->sgaia;
              $this->sat = "";  
              $this->nmgp_dados_form["sat"] = $this->sat;
              $this->dipafront = "";  
              $this->nmgp_dados_form["dipafront"] = $this->dipafront;
              $this->ucc = "";  
              $this->nmgp_dados_form["ucc"] = $this->ucc;
              $this->idnaviera = "";  
              $this->nmgp_dados_form["idnaviera"] = $this->idnaviera;
              $this->contenedor = "";  
              $this->nmgp_dados_form["contenedor"] = $this->contenedor;
              $this->bl = "";  
              $this->nmgp_dados_form["bl"] = $this->bl;
              $this->observaciones = "";  
              $this->nmgp_dados_form["observaciones"] = $this->observaciones;
              $this->idcabezal = "";  
              $this->nmgp_dados_form["idcabezal"] = $this->idcabezal;
              $this->idgestor_aduanal = "";  
              $this->nmgp_dados_form["idgestor_aduanal"] = $this->idgestor_aduanal;
              $this->idrampa = "";  
              $this->nmgp_dados_form["idrampa"] = $this->idrampa;
              $this->idconsignatario = "";  
              $this->nmgp_dados_form["idconsignatario"] = $this->idconsignatario;
              $this->idcontenido = "";  
              $this->nmgp_dados_form["idcontenido"] = $this->idcontenido;
              $this->idestado_revision = "1";  
              $this->nmgp_dados_form["idestado_revision"] = $this->idestado_revision;
              $this->cantidad_por_bl = "";  
              $this->nmgp_dados_form["cantidad_por_bl"] = $this->cantidad_por_bl;
              $this->idmedida = "";  
              $this->nmgp_dados_form["idmedida"] = $this->idmedida;
              $this->idselectivo = "";  
              $this->nmgp_dados_form["idselectivo"] = $this->idselectivo;
              $this->idtipodecarga = "";  
              $this->nmgp_dados_form["idtipodecarga"] = $this->idtipodecarga;
              $this->sec_users_login = "";  
              $this->nmgp_dados_form["sec_users_login"] = $this->sec_users_login;
              $this->factura_revision = "";  
              $this->nmgp_dados_form["factura_revision"] = $this->factura_revision;
              $this->factura_acople = "";  
              $this->nmgp_dados_form["factura_acople"] = $this->factura_acople;
              $this->ubicacion = "";  
              $this->nmgp_dados_form["ubicacion"] = $this->ubicacion;
              $this->idfuncionario = "";  
              $this->nmgp_dados_form["idfuncionario"] = $this->idfuncionario;
              $this->idviaje_importacion = "";  
              $this->nmgp_dados_form["idviaje_importacion"] = $this->idviaje_importacion;
              $this->idregimen_aduanero = "";  
              $this->nmgp_dados_form["idregimen_aduanero"] = $this->idregimen_aduanero;
              $this->iddestino = "";  
              $this->nmgp_dados_form["iddestino"] = $this->iddestino;
              $this->turno = "";  
              $this->nmgp_dados_form["turno"] = $this->turno;
              $this->idestado = "1";  
              $this->nmgp_dados_form["idestado"] = $this->idestado;
              $this->termonebulizacion = "";  
              $this->nmgp_dados_form["termonebulizacion"] = $this->termonebulizacion;
              $this->porcentaje_intrusion = "";  
              $this->nmgp_dados_form["porcentaje_intrusion"] = $this->porcentaje_intrusion;
              $this->idoperador = "";  
              $this->nmgp_dados_form["idoperador"] = $this->idoperador;
              $this->idtipoderevision = "";  
              $this->nmgp_dados_form["idtipoderevision"] = $this->idtipoderevision;
              $this->idtipo_movilizacion = "";  
              $this->nmgp_dados_form["idtipo_movilizacion"] = $this->idtipo_movilizacion;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['foreign_key'] as $sFKName => $sFKValue)
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codigo_revision) from " . $this->Ini->nm_tabela . " where codigo_revision < $this->codigo_revision" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codigo_revision) from " . $this->Ini->nm_tabela . " where codigo_revision < $this->codigo_revision" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codigo_revision) from " . $this->Ini->nm_tabela . " where codigo_revision < $this->codigo_revision" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codigo_revision) from " . $this->Ini->nm_tabela . " where codigo_revision < $this->codigo_revision" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->codigo_revision = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codigo_revision) from " . $this->Ini->nm_tabela . " where codigo_revision > $this->codigo_revision" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codigo_revision) from " . $this->Ini->nm_tabela . " where codigo_revision > $this->codigo_revision" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codigo_revision) from " . $this->Ini->nm_tabela . " where codigo_revision > $this->codigo_revision" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codigo_revision) from " . $this->Ini->nm_tabela . " where codigo_revision > $this->codigo_revision" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->codigo_revision = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codigo_revision) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codigo_revision) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codigo_revision) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codigo_revision) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->codigo_revision = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codigo_revision) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codigo_revision) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codigo_revision) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codigo_revision) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->codigo_revision = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_revision_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_revision_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['csrf_token'];
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

   function Form_lookup_idtipo_movilizacion()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idtipo_movilizacion, descripcion  FROM tipo_movilizacion  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'][] = $rs->fields[0];
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
   function Form_lookup_idregimen_aduanero()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idregimen_aduanero, descripcion  FROM regimen_aduanero  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'][] = $rs->fields[0];
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
   function Form_lookup_maga()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_sgaia()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_sat()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_dipafront()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ucc()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_idmedida()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idmedida, descripcion  FROM medida  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idNaviera, naviera FROM naviera ORDER BY idNaviera";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idselectivo, selectivo  FROM selectivo  ORDER BY selectivo";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idtipodecarga, descripcion  FROM tipodecarga  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'][] = $rs->fields[0];
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
   function Form_lookup_iddestino()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT iddestino, descripcion  FROM destino  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'][] = $rs->fields[0];
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
   function Form_lookup_idrampa()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idrampa, descripcion  FROM rampa  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'][] = $rs->fields[0];
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
   function Form_lookup_idestado_revision()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idestado_revision, descripcion FROM estado_revision ORDER BY idestado_revision";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_revision_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "codigo_revision", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_maga($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "maga", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_sgaia($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "sgaia", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_sat($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "sat", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_dipafront($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "dipafront", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_ucc($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ucc", $arg_search, $data_lookup);
          }
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
          $this->SC_monta_condicao($comando, "contenedor", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bl", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "observaciones", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idcabezal($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idcabezal", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idgestor_aduanal($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idgestor_aduanal", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idrampa($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idrampa", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idconsignatario($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idconsignatario", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idcontenido($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idcontenido", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idestado_revision($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idestado_revision", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cantidad_por_bl", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idmedida($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idmedida", $arg_search, $data_lookup);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_revision = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total'] = $qt_geral_reg_form_revision;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_revision_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_revision_pack_ajax_response();
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
      $nm_numeric[] = "codigo_revision";$nm_numeric[] = "maga";$nm_numeric[] = "sgaia";$nm_numeric[] = "sat";$nm_numeric[] = "dipafront";$nm_numeric[] = "ucc";$nm_numeric[] = "idnaviera";$nm_numeric[] = "idcabezal";$nm_numeric[] = "idgestor_aduanal";$nm_numeric[] = "idrampa";$nm_numeric[] = "idconsignatario";$nm_numeric[] = "idcontenido";$nm_numeric[] = "idestado_revision";$nm_numeric[] = "cantidad_por_bl";$nm_numeric[] = "idmedida";$nm_numeric[] = "idselectivo";$nm_numeric[] = "idtipodecarga";$nm_numeric[] = "idfuncionario";$nm_numeric[] = "idviaje_importacion";$nm_numeric[] = "idregimen_aduanero";$nm_numeric[] = "iddestino";$nm_numeric[] = "turno";$nm_numeric[] = "idestado";$nm_numeric[] = "termonebulizacion";$nm_numeric[] = "porcentaje_intrusion";$nm_numeric[] = "idoperador";$nm_numeric[] = "idtipoderevision";$nm_numeric[] = "idtipo_movilizacion";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['decimal_db'] == ".")
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
      $Nm_datas['fecha_solicitud'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['SC_sep_date1'];
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
   function SC_lookup_maga($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
   }
   function SC_lookup_sgaia($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
   }
   function SC_lookup_sat($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
   }
   function SC_lookup_dipafront($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
   }
   function SC_lookup_ucc($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
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
   function SC_lookup_idgestor_aduanal($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT nombre, idgestor_aduanal FROM gestor_aduanal WHERE (nombre LIKE '%$campo%')" ; 
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
   function SC_lookup_idrampa($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT descripcion, idrampa FROM rampa WHERE (descripcion LIKE '%$campo%')" ; 
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
   function SC_lookup_idconsignatario($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT nombre, idconsignatario FROM consignatario WHERE (nombre LIKE '%$campo%')" ; 
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
   function SC_lookup_idcontenido($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT descripcion, idcontenido FROM contenido WHERE (descripcion LIKE '%$campo%')" ; 
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
   function SC_lookup_idestado_revision($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT descripcion, idestado_revision FROM estado_revision WHERE (descripcion LIKE '%$campo%')" ; 
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
   function SC_lookup_idmedida($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT descripcion, idmedida FROM medida WHERE (descripcion LIKE '%$campo%')" ; 
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
       $nmgp_saida_form = "form_revision_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_revision_fim.php";
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
       form_revision_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue']);
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
