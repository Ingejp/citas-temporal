<?php
   include_once('Reporte_Revision_Tiempos_session.php');
   session_start();
   $_SESSION['scriptcase']['Reporte_Revision_Tiempos']['glo_nm_path_imag_temp']  = "";
   //check tmp
   if(empty($_SESSION['scriptcase']['Reporte_Revision_Tiempos']['glo_nm_path_imag_temp']))
   {
       $str_path_apl_url = $_SERVER['PHP_SELF'];
       $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
       /*check tmp*/$_SESSION['scriptcase']['Reporte_Revision_Tiempos']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   if (!isset($_SESSION['sc_session']))
   {
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
           $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
           $str_path_sys  = str_replace("\\", '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       $str_path_web    = $_SERVER['PHP_SELF'];
       $str_path_web    = str_replace("\\", '/', $str_path_web);
       $str_path_web    = str_replace('//', '/', $str_path_web);
       $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
       if (is_file($root . $_SESSION['scriptcase']['Reporte_Revision_Tiempos']['glo_nm_path_imag_temp'] . "/sc_apl_default_CITASPB.txt"))
       {
?>
           <script language="javascript">
            nm_move();
           </script>
<?php
           exit;
       }
   }
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   $Ord_Cmp = new Reporte_Revision_Tiempos_Ord_cmp(); 
   $Ord_Cmp->Ord_cmp_init();
   
class Reporte_Revision_Tiempos_Ord_cmp
{
function Ord_cmp_init()
{
  global $sc_init, $path_img, $path_btn, $use_alias, $tab_ger_campos, $tab_def_campos, $tab_def_seq, $tab_labels, $embbed, $tbar_pos, $_POST, $_GET;
   if (isset($_POST['script_case_init']))
   {
       $sc_init    = filter_input(INPUT_POST, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img   = filter_input(INPUT_POST, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn   = filter_input(INPUT_POST, 'path_btn', FILTER_SANITIZE_STRING);
       $use_alias  = (isset($_POST['use_alias']))  ? filter_input(INPUT_POST, 'use_alias', FILTER_SANITIZE_STRING)  : "S";
       $fsel_ok    = filter_input(INPUT_POST, 'fsel_ok', FILTER_SANITIZE_STRING);
       $campos_sel = filter_input(INPUT_POST, 'campos_sel', FILTER_SANITIZE_STRING);
       $sel_regra  = filter_input(INPUT_POST, 'sel_regra', FILTER_SANITIZE_STRING);
       $embbed     = isset($_POST['embbed_groupby']) && 'Y' == $_POST['embbed_groupby'];
       $tbar_pos   = filter_input(INPUT_POST, 'toolbar_pos', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   elseif (isset($_GET['script_case_init']))
   {
       $sc_init    = filter_input(INPUT_GET, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img   = filter_input(INPUT_GET, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn   = filter_input(INPUT_GET, 'path_btn', FILTER_SANITIZE_STRING);
       $use_alias  = (isset($_GET['use_alias']))  ? filter_input(INPUT_GET, 'use_alias', FILTER_SANITIZE_STRING)  : "S";
       $fsel_ok    = filter_input(INPUT_GET, 'fsel_ok', FILTER_SANITIZE_STRING);
       $campos_sel = filter_input(INPUT_GET, 'campos_sel', FILTER_SANITIZE_STRING);
       $sel_regra  = filter_input(INPUT_GET, 'sel_regra', FILTER_SANITIZE_STRING);
       $embbed     = isset($_GET['embbed_groupby']) && 'Y' == $_GET['embbed_groupby'];
       $tbar_pos   = filter_input(INPUT_GET, 'toolbar_pos', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "en_us";
   $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
   $this->Nm_lang = array();
   if (is_file($NM_arq_lang))
   {
       include_once($NM_arq_lang);
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select_orig']))
   {
       $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select_orig'] = array();
   }
   $this->restore = isset($_POST['restore']) ? true : false;
   if ($this->restore && !class_exists('Services_JSON')) {
       include_once("Reporte_Revision_Tiempos_json.php");
   }
   $this->Arr_result = array();
   
   $tab_ger_campos = array();
   $tab_def_campos = array();
   $tab_labels     = array();
   $tab_ger_campos['rev_codigo_revision'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['rev_codigo_revision'] = "rev_codigo_revision";
   }
   else
   {
       $tab_def_campos['rev_codigo_revision'] = "rev.codigo_revision";
   }
   $tab_labels["rev_codigo_revision"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_codigo_revision"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_codigo_revision"] : "TURNO";
   $tab_ger_campos['nav_naviera'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['nav_naviera'] = "nav_naviera";
   }
   else
   {
       $tab_def_campos['nav_naviera'] = "nav.naviera";
   }
   $tab_labels["nav_naviera"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["nav_naviera"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["nav_naviera"] : "NAVIERA";
   $tab_ger_campos['buq_buque'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['buq_buque'] = "buq_buque";
   }
   else
   {
       $tab_def_campos['buq_buque'] = "buq.buque";
   }
   $tab_labels["buq_buque"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["buq_buque"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["buq_buque"] : "BUQUE";
   $tab_ger_campos['viaje'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['viaje'] = "viaje";
   }
   else
   {
       $tab_def_campos['viaje'] = "via.codigo";
   }
   $tab_labels["viaje"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["viaje"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["viaje"] : "VIAJE";
   $tab_ger_campos['rev_contenedor'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['rev_contenedor'] = "rev_contenedor";
   }
   else
   {
       $tab_def_campos['rev_contenedor'] = "rev.contenedor";
   }
   $tab_labels["rev_contenedor"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_contenedor"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_contenedor"] : "CONTENEDOR";
   $tab_ger_campos['med_descripcion'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['med_descripcion'] = "med_descripcion";
   }
   else
   {
       $tab_def_campos['med_descripcion'] = "med.descripcion";
   }
   $tab_labels["med_descripcion"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["med_descripcion"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["med_descripcion"] : "MED";
   $tab_ger_campos['tcar_descripcion'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['tcar_descripcion'] = "tcar_descripcion";
   }
   else
   {
       $tab_def_campos['tcar_descripcion'] = "tcar.descripcion";
   }
   $tab_labels["tcar_descripcion"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["tcar_descripcion"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["tcar_descripcion"] : "TIPO_CARGA";
   $tab_ger_campos['consignatario'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['consignatario'] = "consignatario";
   }
   else
   {
       $tab_def_campos['consignatario'] = "consig.nombre";
   }
   $tab_labels["consignatario"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["consignatario"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["consignatario"] : "CONSIGNATARIO";
   $tab_ger_campos['rev_bl'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['rev_bl'] = "rev_bl";
   }
   else
   {
       $tab_def_campos['rev_bl'] = "rev.bl";
   }
   $tab_labels["rev_bl"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_bl"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_bl"] : "BL";
   $tab_ger_campos['contenido'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['contenido'] = "contenido";
   }
   else
   {
       $tab_def_campos['contenido'] = "cont.descripcion";
   }
   $tab_labels["contenido"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["contenido"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["contenido"] : "CONTENIDO";
   $tab_ger_campos['entidad'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['entidad'] = "entidad";
   }
   else
   {
       $tab_def_campos['entidad'] = "ede.descripcion";
   }
   $tab_labels["entidad"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["entidad"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["entidad"] : "ENTIDAD";
   $tab_ger_campos['maga'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['maga'] = "maga";
   }
   else
   {
       $tab_def_campos['maga'] = "IF(rev.maga=\"1\",\"SI\",\"NO\")";
   }
   $tab_labels["maga"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["maga"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["maga"] : "MAGA";
   $tab_ger_campos['sat'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['sat'] = "sat";
   }
   else
   {
       $tab_def_campos['sat'] = "IF(rev.sat=\"1\",\"SI\",\"NO\")";
   }
   $tab_labels["sat"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["sat"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["sat"] : "SAT";
   $tab_ger_campos['sgaia'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['sgaia'] = "sgaia";
   }
   else
   {
       $tab_def_campos['sgaia'] = "IF(rev.sgaia=\"1\",\"SI\",\"NO\")";
   }
   $tab_labels["sgaia"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["sgaia"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["sgaia"] : "SGAIA";
   $tab_ger_campos['dipa'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['dipa'] = "dipa";
   }
   else
   {
       $tab_def_campos['dipa'] = "IF(rev.dipafront=\"1\",\"SI\",\"NO\")";
   }
   $tab_labels["dipa"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["dipa"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["dipa"] : "DIPA";
   $tab_ger_campos['ucc'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['ucc'] = "ucc";
   }
   else
   {
       $tab_def_campos['ucc'] = "IF(rev.ucc=\"1\",\"SI\",\"NO\")";
   }
   $tab_labels["ucc"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["ucc"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["ucc"] : "UCC";
   $tab_ger_campos['rev_fecha_solicitud'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['rev_fecha_solicitud'] = "rev_fecha_solicitud";
   }
   else
   {
       $tab_def_campos['rev_fecha_solicitud'] = "rev.fecha_solicitud";
   }
   $tab_labels["rev_fecha_solicitud"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_fecha_solicitud"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_fecha_solicitud"] : "FECHA";
   $tab_ger_campos['estado'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['estado'] = "estado";
   }
   else
   {
       $tab_def_campos['estado'] = "est.descripcion";
   }
   $tab_labels["estado"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["estado"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["estado"] : "ESTADO";
   $tab_ger_campos['rev_observaciones'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['rev_observaciones'] = "rev_observaciones";
   }
   else
   {
       $tab_def_campos['rev_observaciones'] = "rev.observaciones";
   }
   $tab_labels["rev_observaciones"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_observaciones"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_observaciones"] : "COMMENT";
   $tab_ger_campos['funcionario'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['funcionario'] = "funcionario";
   }
   else
   {
       $tab_def_campos['funcionario'] = "f.nombre";
   }
   $tab_labels["funcionario"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["funcionario"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["funcionario"] : "FUNCIONARIO";
   $tab_ger_campos['telefono_gestor'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['telefono_gestor'] = "telefono_gestor";
   }
   else
   {
       $tab_def_campos['telefono_gestor'] = "concat(gest.telefono1,gest.telefono2)";
   }
   $tab_labels["telefono_gestor"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["telefono_gestor"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["telefono_gestor"] : "TELEFONO GESTOR";
   $tab_ger_campos['gestor'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['gestor'] = "gestor";
   }
   else
   {
       $tab_def_campos['gestor'] = "gest.nombre";
   }
   $tab_labels["gestor"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["gestor"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["gestor"] : "GESTOR";
   $tab_ger_campos['cantidad_por_bl'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['cantidad_por_bl'] = "cantidad_por_bl";
   }
   else
   {
       $tab_def_campos['cantidad_por_bl'] = "rev.cantidad_por_bl";
   }
   $tab_labels["cantidad_por_bl"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["cantidad_por_bl"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["cantidad_por_bl"] : "CANTIDAD POR BL";
   $tab_ger_campos['ramp_descripcion'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['ramp_descripcion'] = "ramp_descripcion";
   }
   else
   {
       $tab_def_campos['ramp_descripcion'] = "ramp.descripcion";
   }
   $tab_labels["ramp_descripcion"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["ramp_descripcion"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["ramp_descripcion"] : "RAMPA";
   $tab_ger_campos['tipo_movimiento'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['tipo_movimiento'] = "tipo_movimiento";
   }
   else
   {
       $tab_def_campos['tipo_movimiento'] = "tmov.descripcion";
   }
   $tab_labels["tipo_movimiento"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["tipo_movimiento"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["tipo_movimiento"] : "TIPO MOVIMIENTO";
   $tab_ger_campos['cab_placa'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['cab_placa'] = "cab_placa";
   }
   else
   {
       $tab_def_campos['cab_placa'] = "cab.placa";
   }
   $tab_labels["cab_placa"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["cab_placa"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["cab_placa"] : "PLACA";
   $tab_ger_campos['rev_porcentaje_intrusion'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['rev_porcentaje_intrusion'] = "rev_porcentaje_intrusion";
   }
   else
   {
       $tab_def_campos['rev_porcentaje_intrusion'] = "rev.porcentaje_intrusion";
   }
   $tab_labels["rev_porcentaje_intrusion"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_porcentaje_intrusion"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["rev_porcentaje_intrusion"] : "% INTRUSION";
   $tab_ger_campos['sel_selectivo'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['sel_selectivo'] = "sel_selectivo";
   }
   else
   {
       $tab_def_campos['sel_selectivo'] = "sel.selectivo";
   }
   $tab_labels["sel_selectivo"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["sel_selectivo"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["sel_selectivo"] : "SELECTIVO";
   $tab_ger_campos['destino'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['destino'] = "destino";
   }
   else
   {
       $tab_def_campos['destino'] = "d.descripcion";
   }
   $tab_labels["destino"]   = (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["destino"])) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['labels']["destino"] : "DESTINO";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['Reporte_Revision_Tiempos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Reporte_Revision_Tiempos']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['Reporte_Revision_Tiempos']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select']))
   {
       $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select'] = array();
   }
   
   if ($fsel_ok == "cmp" && !$this->restore)
   {
       $this->Sel_processa_out_sel($campos_sel);
   }
   else
   {
       if ($embbed)
       {
           ob_start();
           $this->Sel_processa_form();
           $Temp = ob_get_clean();
           echo NM_charset_to_utf8($Temp);
       }
       else
       {
           if ($this->restore)
           {
               ob_start();
           }
           $this->Sel_processa_form();
       }
   }
   exit;
   
}
function Sel_processa_out_sel($campos_sel)
{
   global $tab_ger_campos, $sc_init, $tab_def_campos, $embbed;
   $arr_temp = array();
   $campos_sel = explode("@?@", $campos_sel);
   $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select'] = array();
   $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_grid']   = "";
   $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_cmp']    = "";
   foreach ($campos_sel as $campo_sort)
   {
       $ordem = (substr($campo_sort, 0, 1) == "+") ? "asc" : "desc";
       $campo = substr($campo_sort, 1);
       if (isset($tab_def_campos[$campo]))
       {
           $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select'][$tab_def_campos[$campo]] = $ordem;
       }
   }
?>
    <script language="javascript"> 
<?php
   if (!$embbed)
   {
?>
      self.parent.tb_remove(); 
      parent.nm_gp_submit_ajax('inicio', ''); 
<?php
   }
   else
   {
?>
      nm_gp_submit_ajax('inicio', ''); 
<?php
   }
?>
   </script>
<?php
}
   
function Sel_processa_form()
{
  global $sc_init, $path_img, $path_btn, $use_alias, $tab_ger_campos, $tab_def_campos, $tab_labels, $embbed, $tbar_pos;
   $size = 10;
   $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
   foreach ($this->Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
      {
          $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
          $this->Nm_lang[$ind] = $dados;
      }
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
   $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Citas_tema_nuevo/Citas_tema_nuevo";
   include("../_lib/css/" . $str_schema_all . "_grid.php");
   $Str_btn_grid = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
   include("../_lib/buttons/" . $Str_btn_grid);
   if (!function_exists("nmButtonOutput"))
   {
       include_once("../_lib/lib/php/nm_gp_config_btn.php");
   }
   if (!$embbed)
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Reporte de Revisiones </TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_dir'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div_dir'] ?>" /> 
 <?php
 if(isset($_SESSION['scriptcase']['str_google_fonts']) && !empty($_SESSION['scriptcase']['str_google_fonts']))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['str_google_fonts'] ?>" />
 <?php
 }
 ?>
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" /> 
</HEAD>
<BODY class="scGridPage" style="margin: 0px; overflow-x: hidden">
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery-ui.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['sc_session']['path_third'] ?>/font-awesome/css/all.min.css" />
<?php
   }
?>
<script language="javascript"> 
<?php
if ($embbed)
{
?>
  function scSubmitOrderCampos(sPos, sType) {
    $("#id_fsel_ok_sel_ord").val(sType);
    if(sType == 'cmp')
    {
       scPackSelectedOrd();
    }
   return new Promise(function(resolve, reject) {$.ajax({
    type: "POST",
    url: "Reporte_Revision_Tiempos_order_campos.php",
    data: {
     script_case_init: $("#id_script_case_init_sel_ord").val(),
     script_case_session: $("#id_script_case_session_sel_ord").val(),
     path_img: $("#id_path_img_sel_ord").val(),
     path_btn: $("#id_path_btn_sel_ord").val(),
     use_alias: $("#id_use_alias").val(),
     campos_sel: $("#id_campos_sel_sel_ord").val(),
     sel_regra: $("#id_sel_regra_sel_ord").val(),
     fsel_ok: $("#id_fsel_ok_sel_ord").val(),
     embbed_groupby: 'Y'
    }
   }).done(function(data) {
    scBtnOrderCamposHide(sPos);
    buttonunselectedOF();
    $("#sc_id_order_campos_placeholder_" + sPos).find("td").html("");
    var execString = data.toString().replace(/(\<.*?\>)/g, '');
    eval(execString).then(function(){resolve()});
   });});
  }
<?php
}
?>
 // Submeter o formularior
 //-------------------------------------
 function submit_form_Fsel_ord()
 {
     scPackSelectedOrd();
      buttonunselectedOF();
      document.Fsel_ord.submit();
 }
 function scPackSelectedOrd() {
  var fieldList, fieldName, i, selectedFields = new Array;
 fieldList = $("#sc_id_fldord_selected").sortable("toArray");
 for (i = 0; i < fieldList.length; i++) {
  fieldName  = fieldList[i].substr(14);
  selectedFields.push($("#sc_id_class_" + fieldName).val() + fieldName);
 }
 $("#id_campos_sel_sel_ord").val( selectedFields.join("@?@") );
 }
 </script>
<FORM name="Fsel_ord" method="POST">
  <INPUT type="hidden" name="script_case_init"    id="id_script_case_init_sel_ord"    value="<?php echo NM_encode_input($sc_init); ?>"> 
  <INPUT type="hidden" name="script_case_session" id="id_script_case_session_sel_ord" value="<?php echo NM_encode_input(session_id()); ?>"> 
  <INPUT type="hidden" name="path_img"            id="id_path_img_sel_ord"            value="<?php echo NM_encode_input($path_img); ?>"> 
  <INPUT type="hidden" name="path_btn"            id="id_path_btn_sel_ord"            value="<?php echo NM_encode_input($path_btn); ?>"> 
  <INPUT type="hidden" name="use_alias"           id="id_use_alias"                   value="<?php echo NM_encode_input($use_alias); ?>"> 
  <INPUT type="hidden" name="fsel_ok"             id="id_fsel_ok_sel_ord"             value=""> 
<?php
if ($embbed)
{
    echo "<div class='scAppDivMoldura'>";
    echo "<table id=\"main_table\" style=\"width: 100%\" cellspacing=0 cellpadding=0>";
}
elseif ($_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'")
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; right: 20px\">";
}
else
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; left: 20px\">";
}
?>
<?php
if (!$embbed)
{
?>
<tr>
<td>
<div class="scGridBorder">
<table width='100%' cellspacing=0 cellpadding=0>
<?php
}
?>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivHeader scAppDivHeaderText':'scGridLabelVert'; ?>">
   <?php echo $this->Nm_lang['lang_btns_sort_hint']; ?>
  </td>
 </tr>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivContent css_scAppDivContentText':'scGridTabelaTd'; ?>">
   <table class="<?php echo ($embbed)? '':'scGridTabela'; ?>" style="border-width: 0; border-collapse: collapse; width:100%;" cellspacing=0 cellpadding=0>
    <tr class="<?php echo ($embbed)? '':'scGridFieldOddVert'; ?>">
     <td style="vertical-align: top">
     <table>
   <tr><td style="vertical-align: top">
 <script language="javascript" type="text/javascript">
  $(function() {
   $(".sc_ui_litem").mouseover(function() {
    $(this).css("cursor", "all-scroll");
   });
   $("#sc_id_fldord_available").sortable({
    connectWith: ".sc_ui_fldord_selected",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    remove: function(event, ui) {
     var fieldName = $(ui.item[0]).find("select").attr("id");
     $("#" + fieldName).show();
     $('#f_sel_sub').css('display', 'inline-block');
    }
   }).disableSelection();
   $("#sc_id_fldord_selected").sortable({
    connectWith: ".sc_ui_fldord_available",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    remove: function(event, ui) {
     var fieldName = $(ui.item[0]).find("select").attr("id");
     $("#" + fieldName).hide();
     $('#f_sel_sub').css('display', 'inline-block');
     display_btn_restore_ord();
    },
    change: function( event, ui ) {
     $('#f_sel_sub').css('display', 'inline-block');
      display_btn_restore_ord();
    },
    receive: function( event, ui ) {
     $('#f_sel_sub').css('display', 'inline-block');
     display_btn_restore_ord();
    }
   });
   scUpdateListHeight();
  });
  function scUpdateListHeight() {
   $("#sc_id_fldord_available").css("min-height", "<?php echo sizeof($tab_ger_campos) * 26 ?>px");
   $("#sc_id_fldord_selected").css("min-height", "<?php echo sizeof($tab_ger_campos) * 26 ?>px");
  }
 </script>
 <style type="text/css">
  .sc_ui_sortable_ord {
   list-style-type: none;
   margin: 0;
   min-width: 225px;
  }
  .sc_ui_sortable_ord li {
   margin: 0 3px 3px 3px;
   padding: 1px 3px 1px 15px;
   min-height: 18px;
  }
  .sc_ui_sortable_ord li span {
   position: absolute;
   margin-left: -1.3em;
  }
 </style>
    <ul class="sc_ui_sort_groupby sc_ui_sortable_ord sc_ui_fldord_available scAppDivSelectFields" id="sc_id_fldord_available">
<?php
   if ($this->restore) {
        ob_end_clean();
        ob_start();
   }
   $arr_order = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select_orig'] : $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select'];
   foreach ($tab_ger_campos as $NM_cada_field => $NM_cada_opc)
   {
       if ($NM_cada_opc != "none")
       {
           if (!isset($arr_order[$tab_def_campos[$NM_cada_field]]))
           {
?>
     <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_itemord_<?php echo NM_encode_input($NM_cada_field); ?>">
      <?php echo $tab_labels[$NM_cada_field]; ?>
      <select id="sc_id_class_<?php echo NM_encode_input($NM_cada_field); ?>" class="scAppDivToolbarInput" style="display: none" onchange="display_btn_restore_ord();">
       <option value="+">Asc</option>
       <option value="-">Desc</option>
      </select><br/>
     </li>
<?php
           }
       }
   }
   if ($this->restore) {
       $this->Arr_result['fldord_available'] = NM_charset_to_utf8(ob_get_clean());
   }
?>
    </ul>
   </td>
   <td style="vertical-align: top">
    <ul class="sc_ui_sort_groupby sc_ui_sortable_ord sc_ui_fldord_selected scAppDivSelectFields" id="sc_id_fldord_selected">
<?php
   if ($this->restore) {
       ob_end_clean();
       ob_start();
   }
   $arr_order = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select_orig'] : $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select'];
   foreach ($tab_ger_campos as $NM_cada_field => $NM_cada_opc)
   {
       if ($NM_cada_opc != "none")
       {
           if (isset($arr_order[$tab_def_campos[$NM_cada_field]]))
           {
               $sAscSelected  = " selected";
               $sDescSelected = "";
               if ($arr_order[$tab_def_campos[$NM_cada_field]] == "desc")
               {
                   $sAscSelected  = "";
                   $sDescSelected = " selected";
               }
?>
     <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_itemord_<?php echo $NM_cada_field; ?>">
      <?php echo $tab_labels[$NM_cada_field]; ?>
      <select id="sc_id_class_<?php echo NM_encode_input($NM_cada_field); ?>" class="scAppDivToolbarInput" onchange="$('#f_sel_sub').css('display', 'inline-block');display_btn_restore_ord();">
       <option value="+"<?php echo $sAscSelected; ?>>Asc</option>
       <option value="-"<?php echo $sDescSelected; ?>>Desc</option>
      </select>
     </li>
<?php
          }
       }
   }
   if ($this->restore) {
       $this->Arr_result['fldord_selected'] = NM_charset_to_utf8(ob_get_clean());
       $oJson = new Services_JSON();
       echo $oJson->encode($this->Arr_result);
       exit;
   }
?>
    </ul>
    <input type="hidden" name="campos_sel" id="id_campos_sel_sel_ord" value="">
   </td>
   </tr>
   </table>
   </td>
   </tr>
   </table>
  </td>
 </tr>
   <tr><td class="<?php echo ($embbed)? 'scAppDivToolbar':'scGridToolbar'; ?>">
<?php
  $disp_rest = "none";
  if (isset($_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select']) && $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select'] != $_SESSION['sc_session'][$sc_init]['Reporte_Revision_Tiempos']['ordem_select_orig']) {
      $disp_rest = "";
  }
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bok_appdiv", "document.Fsel_ord.fsel_ok.value='cmp';proc_btn_ord('f_sel_sub','submit_form_Fsel_ord()')", "document.Fsel_ord.fsel_ok.value='cmp';proc_btn_ord('f_sel_sub','submit_form_Fsel_ord()')", "f_sel_sub", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bapply_appdiv", "proc_btn_ord('f_sel_sub','scSubmitOrderCampos(\\'" . NM_encode_input($tbar_pos) . "\\', \\'cmp\\')')", "proc_btn_ord('f_sel_sub','scSubmitOrderCampos(\\'" . NM_encode_input($tbar_pos) . "\\', \\'cmp\\')')", "f_sel_sub", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
  &nbsp;&nbsp;&nbsp;
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "brestore_appdiv", "proc_btn_ord('Brestore_ord','restore_ord()')", "proc_btn_ord('Brestore_ord','restore_ord()')", "Brestore_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "brestore_appdiv", "proc_btn_ord('Brestore_ord','restore_ord()')", "proc_btn_ord('Brestore_ord','restore_ord()')", "Brestore_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
  &nbsp;&nbsp;&nbsp;
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bsair_appdiv", "self.parent.tb_remove(); buttonunselectedOF();", "self.parent.tb_remove(); buttonunselectedOF();", "Bsair_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "'); buttonunselectedOF();", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "'); buttonunselectedOF();", "Bsair_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
   </td>
   </tr>
<?php
if (!$embbed)
{
?>
</table>
</div>
</td>
</tr>
<?php
}
?>
</table>
<?php
if ($embbed)
{
?>
    </div>
<?php
}
?>
</FORM>
<script language="javascript"> 
function buttonDisable_ord(buttonId) {
    $("#" + buttonId).prop("disabled", true).addClass("disabled");
}
function buttonEnable_ord(buttonId) {
    $("#" + buttonId).prop("disabled", false).removeClass("disabled");
}
function restore_ord() {
    $.ajax({
        type: 'POST',
        url: "Reporte_Revision_Tiempos_order_campos.php",
        data: {
           script_case_init: $("#id_script_case_init_sel_ord").val(),
           script_case_session: $("#id_script_case_session_sel_ord").val(),
           restore: 'ok',
        }
    })
    .done(function(retcombos) {
       eval("Combos = " + retcombos);
       $("#sc_id_fldord_available").html(Combos["fldord_available"]);
       $("#sc_id_fldord_selected").html(Combos["fldord_selected"]);
       buttonDisable_ord("Brestore_ord");
       buttonEnable_ord("f_sel_sub");
       $('#f_sel_sub').css('display', 'inline-block');
    });
}
function buttonSelectedOF() {
   $("#ordcmp_top").addClass("selected");
   $("#ordcmp_bottom").addClass("selected");
}
function buttonunselectedOF() {
   $("#ordcmp_top").removeClass("selected");
   $("#ordcmp_bottom").removeClass("selected");
}
function display_btn_restore_ord() {
    buttonEnable_ord("Brestore_ord");
    buttonEnable_ord("f_sel_sub");
}
function proc_btn_ord(btn, proc) {
    if ($("#" + btn).prop("disabled") == true) {
        return;
    }
    eval (proc);
}
$( document ).ready(function() {
   buttonDisable_ord("f_sel_sub");
   buttonSelectedOF();
<?php
   if ($disp_rest == "none") {
?>
   buttonDisable_ord("Brestore_ord");
<?php
   }
?>
});
var bFixed = false;
function ajusta_window_Fsel_ord()
{
<?php
   if ($embbed)
   {
?>
  return false;
<?php
   }
?>
  var mt = $(document.getElementById("main_table"));
  if (0 == mt.width() || 0 == mt.height())
  {
    setTimeout("ajusta_window_Fsel_ord()", 50);
    return;
  }
  else if(!bFixed)
  {
    var oOrig = $(document.Fsel_ord.sel_orig),
        oDest = $(document.Fsel_ord.sel_dest),
        mHeight = Math.max(oOrig.height(), oDest.height()),
        mWidth = Math.max(oOrig.width() + 5, oDest.width() + 5);
    oOrig.height(mHeight);
    oOrig.width(mWidth);
    oDest.height(mHeight);
    oDest.width(mWidth + 15);
    bFixed = true;
    if (navigator.userAgent.indexOf("Chrome/") > 0)
    {
      strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
      self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
      setTimeout("ajusta_window_Fsel_ord()", 50);
      return;
    }
  }
  strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
  self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
}
$( document ).ready(function() {
   ajusta_window_Fsel_ord();
});
</script>
<script>
    ajusta_window_Fsel_ord();
</script>
</BODY>
</HTML>
<?php
}
}
