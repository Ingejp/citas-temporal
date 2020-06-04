<?php

class Reporte_Placas_Yarda_Barrios_rtf
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
      require_once($this->Ini->path_aplicacao . "Reporte_Placas_Yarda_Barrios_total.class.php"); 
      $this->Tot      = new Reporte_Placas_Yarda_Barrios_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['Reporte_Placas_Yarda_Barrios']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_Reporte_Placas_Yarda_Barrios";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "Reporte_Placas_Yarda_Barrios.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Reporte_Placas_Yarda_Barrios']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Reporte_Placas_Yarda_Barrios']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['Reporte_Placas_Yarda_Barrios']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->turno = $Busca_temp['turno']; 
          $tmp_pos = strpos($this->turno, "##@@");
          if ($tmp_pos !== false && !is_array($this->turno))
          {
              $this->turno = substr($this->turno, 0, $tmp_pos);
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
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['fechamayor'])) ? $this->New_label['fechamayor'] : "INGRESO AL PUERTO"; 
          if ($Cada_col == "fechamayor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total_horas'])) ? $this->New_label['total_horas'] : "TOTAL HORAS"; 
          if ($Cada_col == "total_horas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['placa'])) ? $this->New_label['placa'] : "PLACA"; 
          if ($Cada_col == "placa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idtransporte'])) ? $this->New_label['idtransporte'] : "TRANSPORTE"; 
          if ($Cada_col == "idtransporte" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['contenedorimport'])) ? $this->New_label['contenedorimport'] : "CONT. IMP"; 
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
          $SC_Label = (isset($this->New_label['contenedorexport'])) ? $this->New_label['contenedorexport'] : "CONT. EXP"; 
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
          $SC_Label = (isset($this->New_label['naviera'])) ? $this->New_label['naviera'] : "NAVIERA"; 
          if ($Cada_col == "naviera" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "OBSERVACIONES"; 
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
          $SC_Label = (isset($this->New_label['codigo_cita'])) ? $this->New_label['codigo_cita'] : "CODIGO CITA"; 
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
          $SC_Label = (isset($this->New_label['turno'])) ? $this->New_label['turno'] : "Turno"; 
          if ($Cada_col == "turno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT cit.idCita AS Turno, cit.codigo_cita, cit.contenedorimport, cit.contenedorExport, cit.observaciones, cit.fechaInicio, cit.chasis, yard.descripcion_yarda AS YARDA, pil.licencia, pil.nombre AS PILOTO, pil.dpi, pil.huella, pil.foto, via.viaje AS VIAJE, via.fechaAtraque, via.fechaZarpe, via.descripcion as viaje2, cab.placa, cab.descripcion, cab.idTransporte, buq.buque, est.estado, nav.naviera, tipcar.descripcion AS TIPO_CARGA, tipmov.descripcion AS TIPO_MOVIMIENTO, (select MAX(b1.fecha) FROM bitacora_cita b1 where b1.cita_idcita=cit.idCita) as FechaMayor, (SELECT timediff(date_sub(NOW(), interval 6 hour), FechaMayor)) as Total_Horas FROM cita cit INNER JOIN yarda yard ON cit.idyarda = yard.idyarda INNER JOIN piloto pil ON cit.idpiloto = pil.idpiloto INNER JOIN viaje via ON cit.idviaje = via.idviaje INNER JOIN cabezal cab ON cit.idcabezal = cab.idcabezal INNER JOIN estado est ON cit.idestado = est.idestado INNER JOIN naviera nav ON cit.idNaviera = nav.idNaviera INNER JOIN tipodecarga tipcar ON cit.idtipodecarga = tipcar.idtipodecarga INNER JOIN tipomovimiento tipmov ON cit.idtipoMovimiento = tipmov.idtipoMovimiento, buque buq  WHERE via.idBuque=buq.idBuque AND cit.idyarda = 2 AND cit.idtipoMovimiento=1 AND cit.idestado=1 ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),FechaMayor,102), '.', '-') + ' ' + convert(char(8),FechaMayor,20), str_replace (convert(char(10),Total_Horas,102), '.', '-') + ' ' + convert(char(8),Total_Horas,20), placa, idTransporte, contenedorimport, contenedorExport, naviera, observaciones, codigo_cita, Turno, str_replace (convert(char(10),fechaInicio,102), '.', '-') + ' ' + convert(char(8),fechaInicio,20) from (SELECT cit.idCita AS Turno, cit.codigo_cita, cit.contenedorimport, cit.contenedorExport, cit.observaciones, cit.fechaInicio, cit.chasis, yard.descripcion_yarda AS YARDA, pil.licencia, pil.nombre AS PILOTO, pil.dpi, pil.huella, pil.foto, via.viaje AS VIAJE, via.fechaAtraque, via.fechaZarpe, via.descripcion as viaje2, cab.placa, cab.descripcion, cab.idTransporte, buq.buque, est.estado, nav.naviera, tipcar.descripcion AS TIPO_CARGA, tipmov.descripcion AS TIPO_MOVIMIENTO, (select MAX(b1.fecha) FROM bitacora_cita b1 where b1.cita_idcita=cit.idCita) as FechaMayor, (SELECT timediff(date_sub(NOW(), interval 6 hour), FechaMayor)) as Total_Horas FROM cita cit INNER JOIN yarda yard ON cit.idyarda = yard.idyarda INNER JOIN piloto pil ON cit.idpiloto = pil.idpiloto INNER JOIN viaje via ON cit.idviaje = via.idviaje INNER JOIN cabezal cab ON cit.idcabezal = cab.idcabezal INNER JOIN estado est ON cit.idestado = est.idestado INNER JOIN naviera nav ON cit.idNaviera = nav.idNaviera INNER JOIN tipodecarga tipcar ON cit.idtipodecarga = tipcar.idtipodecarga INNER JOIN tipomovimiento tipmov ON cit.idtipoMovimiento = tipmov.idtipoMovimiento, buque buq  WHERE via.idBuque=buq.idBuque AND cit.idyarda = 2 AND cit.idtipoMovimiento=1 AND cit.idestado=1 ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT FechaMayor, Total_Horas, placa, idTransporte, contenedorimport, contenedorExport, naviera, observaciones, codigo_cita, Turno, fechaInicio from (SELECT cit.idCita AS Turno, cit.codigo_cita, cit.contenedorimport, cit.contenedorExport, cit.observaciones, cit.fechaInicio, cit.chasis, yard.descripcion_yarda AS YARDA, pil.licencia, pil.nombre AS PILOTO, pil.dpi, pil.huella, pil.foto, via.viaje AS VIAJE, via.fechaAtraque, via.fechaZarpe, via.descripcion as viaje2, cab.placa, cab.descripcion, cab.idTransporte, buq.buque, est.estado, nav.naviera, tipcar.descripcion AS TIPO_CARGA, tipmov.descripcion AS TIPO_MOVIMIENTO, (select MAX(b1.fecha) FROM bitacora_cita b1 where b1.cita_idcita=cit.idCita) as FechaMayor, (SELECT timediff(date_sub(NOW(), interval 6 hour), FechaMayor)) as Total_Horas FROM cita cit INNER JOIN yarda yard ON cit.idyarda = yard.idyarda INNER JOIN piloto pil ON cit.idpiloto = pil.idpiloto INNER JOIN viaje via ON cit.idviaje = via.idviaje INNER JOIN cabezal cab ON cit.idcabezal = cab.idcabezal INNER JOIN estado est ON cit.idestado = est.idestado INNER JOIN naviera nav ON cit.idNaviera = nav.idNaviera INNER JOIN tipodecarga tipcar ON cit.idtipodecarga = tipcar.idtipodecarga INNER JOIN tipomovimiento tipmov ON cit.idtipoMovimiento = tipmov.idtipoMovimiento, buque buq  WHERE via.idBuque=buq.idBuque AND cit.idyarda = 2 AND cit.idtipoMovimiento=1 AND cit.idestado=1 ) nm_sel_esp"; 
      } 
      else 
      { 
          $nmgp_select = "SELECT FechaMayor, Total_Horas, placa, idTransporte, contenedorimport, contenedorExport, naviera, observaciones, codigo_cita, Turno, fechaInicio from (SELECT cit.idCita AS Turno, cit.codigo_cita, cit.contenedorimport, cit.contenedorExport, cit.observaciones, cit.fechaInicio, cit.chasis, yard.descripcion_yarda AS YARDA, pil.licencia, pil.nombre AS PILOTO, pil.dpi, pil.huella, pil.foto, via.viaje AS VIAJE, via.fechaAtraque, via.fechaZarpe, via.descripcion as viaje2, cab.placa, cab.descripcion, cab.idTransporte, buq.buque, est.estado, nav.naviera, tipcar.descripcion AS TIPO_CARGA, tipmov.descripcion AS TIPO_MOVIMIENTO, (select MAX(b1.fecha) FROM bitacora_cita b1 where b1.cita_idcita=cit.idCita) as FechaMayor, (SELECT timediff(date_sub(NOW(), interval 6 hour), FechaMayor)) as Total_Horas FROM cita cit INNER JOIN yarda yard ON cit.idyarda = yard.idyarda INNER JOIN piloto pil ON cit.idpiloto = pil.idpiloto INNER JOIN viaje via ON cit.idviaje = via.idviaje INNER JOIN cabezal cab ON cit.idcabezal = cab.idcabezal INNER JOIN estado est ON cit.idestado = est.idestado INNER JOIN naviera nav ON cit.idNaviera = nav.idNaviera INNER JOIN tipodecarga tipcar ON cit.idtipodecarga = tipcar.idtipodecarga INNER JOIN tipomovimiento tipmov ON cit.idtipoMovimiento = tipmov.idtipoMovimiento, buque buq  WHERE via.idBuque=buq.idBuque AND cit.idyarda = 2 AND cit.idtipoMovimiento=1 AND cit.idestado=1 ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['order_grid'];
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
         $this->fechamayor = $rs->fields[0] ;  
         $this->total_horas = $rs->fields[1] ;  
         $this->placa = $rs->fields[2] ;  
         $this->idtransporte = $rs->fields[3] ;  
         $this->idtransporte = (string)$this->idtransporte;
         $this->contenedorimport = $rs->fields[4] ;  
         $this->contenedorexport = $rs->fields[5] ;  
         $this->naviera = $rs->fields[6] ;  
         $this->observaciones = $rs->fields[7] ;  
         $this->codigo_cita = $rs->fields[8] ;  
         $this->turno = $rs->fields[9] ;  
         $this->turno = (string)$this->turno;
         $this->fechainicio = $rs->fields[10] ;  
         //----- lookup - idtransporte
         $this->look_idtransporte = $this->idtransporte; 
         $this->Lookup->lookup_idtransporte($this->look_idtransporte, $this->idtransporte) ; 
         $this->look_idtransporte = ($this->look_idtransporte == "&nbsp;") ? "" : $this->look_idtransporte; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- fechamayor
   function NM_export_fechamayor()
   {
         if (substr($this->fechamayor, 10, 1) == "-") 
         { 
             $this->fechamayor = substr($this->fechamayor, 0, 10) . " " . substr($this->fechamayor, 11);
         } 
         if (substr($this->fechamayor, 13, 1) == ".") 
         { 
            $this->fechamayor = substr($this->fechamayor, 0, 13) . ":" . substr($this->fechamayor, 14, 2) . ":" . substr($this->fechamayor, 17);
         } 
         $conteudo_x =  $this->fechamayor;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechamayor, "YYYY-MM-DD HH:II:SS  ");
             $this->fechamayor = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->fechamayor))
         {
             $this->fechamayor = sc_convert_encoding($this->fechamayor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fechamayor = str_replace('<', '&lt;', $this->fechamayor);
         $this->fechamayor = str_replace('>', '&gt;', $this->fechamayor);
         $this->Texto_tag .= "<td>" . $this->fechamayor . "</td>\r\n";
   }
   //----- total_horas
   function NM_export_total_horas()
   {
         $this->total_horas = html_entity_decode($this->total_horas, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->total_horas = strip_tags($this->total_horas);
         if (!NM_is_utf8($this->total_horas))
         {
             $this->total_horas = sc_convert_encoding($this->total_horas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->total_horas = str_replace('<', '&lt;', $this->total_horas);
         $this->total_horas = str_replace('>', '&gt;', $this->total_horas);
         $this->Texto_tag .= "<td>" . $this->total_horas . "</td>\r\n";
   }
   //----- placa
   function NM_export_placa()
   {
         $this->placa = html_entity_decode($this->placa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->placa = strip_tags($this->placa);
         if (!NM_is_utf8($this->placa))
         {
             $this->placa = sc_convert_encoding($this->placa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->placa = str_replace('<', '&lt;', $this->placa);
         $this->placa = str_replace('>', '&gt;', $this->placa);
         $this->Texto_tag .= "<td>" . $this->placa . "</td>\r\n";
   }
   //----- idtransporte
   function NM_export_idtransporte()
   {
         if ($this->look_idtransporte !== "&nbsp;") 
         { 
             $this->look_idtransporte = sc_strtoupper($this->look_idtransporte); 
         } 
         $this->look_idtransporte = html_entity_decode($this->look_idtransporte, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idtransporte = strip_tags($this->look_idtransporte);
         if (!NM_is_utf8($this->look_idtransporte))
         {
             $this->look_idtransporte = sc_convert_encoding($this->look_idtransporte, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idtransporte = str_replace('<', '&lt;', $this->look_idtransporte);
         $this->look_idtransporte = str_replace('>', '&gt;', $this->look_idtransporte);
         $this->Texto_tag .= "<td>" . $this->look_idtransporte . "</td>\r\n";
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
   //----- naviera
   function NM_export_naviera()
   {
         $this->naviera = html_entity_decode($this->naviera, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->naviera = strip_tags($this->naviera);
         if (!NM_is_utf8($this->naviera))
         {
             $this->naviera = sc_convert_encoding($this->naviera, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->naviera = str_replace('<', '&lt;', $this->naviera);
         $this->naviera = str_replace('>', '&gt;', $this->naviera);
         $this->Texto_tag .= "<td>" . $this->naviera . "</td>\r\n";
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
   //----- codigo_cita
   function NM_export_codigo_cita()
   {
         $this->codigo_cita = html_entity_decode($this->codigo_cita, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigo_cita = strip_tags($this->codigo_cita);
         if (!NM_is_utf8($this->codigo_cita))
         {
             $this->codigo_cita = sc_convert_encoding($this->codigo_cita, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->codigo_cita = str_replace('<', '&lt;', $this->codigo_cita);
         $this->codigo_cita = str_replace('>', '&gt;', $this->codigo_cita);
         $this->Texto_tag .= "<td>" . $this->codigo_cita . "</td>\r\n";
   }
   //----- turno
   function NM_export_turno()
   {
         nmgp_Form_Num_Val($this->turno, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->turno))
         {
             $this->turno = sc_convert_encoding($this->turno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->turno = str_replace('<', '&lt;', $this->turno);
         $this->turno = str_replace('>', '&gt;', $this->turno);
         $this->Texto_tag .= "<td>" . $this->turno . "</td>\r\n";
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
             $this->fechainicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->fechainicio))
         {
             $this->fechainicio = sc_convert_encoding($this->fechainicio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fechainicio = str_replace('<', '&lt;', $this->fechainicio);
         $this->fechainicio = str_replace('>', '&gt;', $this->fechainicio);
         $this->Texto_tag .= "<td>" . $this->fechainicio . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Reporte_Placas_Yarda_Barrios'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>PLACAS EN YARDA BARRIOS :: RTF</TITLE>
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
<form name="Fdown" method="get" action="Reporte_Placas_Yarda_Barrios_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="Reporte_Placas_Yarda_Barrios"> 
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
