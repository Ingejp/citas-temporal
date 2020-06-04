<?php
class pdfreport_cita_3_restore_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $idcita = array();
   var $codigo_cita = array();
   var $contenedorimport = array();
   var $contenedorexport = array();
   var $observaciones = array();
   var $fechainicio = array();
   var $chasis = array();
   var $idnaviera = array();
   var $idtipodecarga = array();
   var $idestado = array();
   var $idpiloto = array();
   var $idcabezal = array();
   var $idselectivo = array();
   var $idyarda = array();
   var $idtipomovimiento = array();
   var $idviaje = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("en_us");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "LETTER";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_cita_3_restore']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'cm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_cita_3_restore", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->idcita[0] = $Busca_temp['idcita']; 
       $tmp_pos = strpos($this->idcita[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idcita[0]))
       {
           $this->idcita[0] = substr($this->idcita[0], 0, $tmp_pos);
       }
       $this->codigo_cita[0] = $Busca_temp['codigo_cita']; 
       $tmp_pos = strpos($this->codigo_cita[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->codigo_cita[0]))
       {
           $this->codigo_cita[0] = substr($this->codigo_cita[0], 0, $tmp_pos);
       }
       $this->contenedorimport[0] = $Busca_temp['contenedorimport']; 
       $tmp_pos = strpos($this->contenedorimport[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->contenedorimport[0]))
       {
           $this->contenedorimport[0] = substr($this->contenedorimport[0], 0, $tmp_pos);
       }
       $this->contenedorexport[0] = $Busca_temp['contenedorexport']; 
       $tmp_pos = strpos($this->contenedorexport[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->contenedorexport[0]))
       {
           $this->contenedorexport[0] = substr($this->contenedorexport[0], 0, $tmp_pos);
       }
       $this->idviaje[0] = $Busca_temp['idviaje']; 
       $tmp_pos = strpos($this->idviaje[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idviaje[0]))
       {
           $this->idviaje[0] = substr($this->idviaje[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_cita_3_restore']['contr_erro'] = 'on';
if (!isset($_SESSION['codigo_cita'])) {$_SESSION['codigo_cita'] = "";}
if (!isset($this->sc_temp_codigo_cita)) {$this->sc_temp_codigo_cita = (isset($_SESSION['codigo_cita'])) ? $_SESSION['codigo_cita'] : "";}
 $this->nm_where_dinamico =" WHERE codigo_cita='".$this->sc_temp_codigo_cita."'";
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_dinamico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_dinamico'] != $this->nm_where_dinamico) {
    $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_dinamico'] = $this->nm_where_dinamico;
    unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['inicio']);
}

if (isset($this->sc_temp_codigo_cita)) {$_SESSION['codigo_cita'] = $this->sc_temp_codigo_cita;}
$_SESSION['scriptcase']['pdfreport_cita_3_restore']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_cita_3_restore']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_cita_3_restore']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_cita_3_restore']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_cita_3_restore']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq'];  
//----- 
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
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/usr__NM__bg__NM__TICKET.jpg", "2.000000", "2.000000", "18", "12", '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idcita'] = "Id Cita";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['codigo_cita'] = "Codigo Cita";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['contenedorimport'] = "Contenedorimport";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['contenedorexport'] = "Contenedor Export";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['observaciones'] = "Observaciones";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['fechainicio'] = "Fecha Inicio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['chasis'] = "Chasis";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idnaviera'] = "Id Naviera";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idtipodecarga'] = "Idtipodecarga";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idestado'] = "Idestado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idpiloto'] = "Idpiloto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idcabezal'] = "Idcabezal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idselectivo'] = "Idselectivo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idyarda'] = "Idyarda";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idtipomovimiento'] = "Idtipo Movimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['labels']['idviaje'] = "Idviaje";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_cita_3_restore']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_cita_3_restore']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_cita_3_restore']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(0.000000, 0.000000, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_cita_3_restore']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idcita[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->idcita[$this->nm_grid_colunas] = (string)$this->idcita[$this->nm_grid_colunas];
          $this->codigo_cita[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->contenedorimport[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->contenedorexport[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->observaciones[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->fechainicio[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->chasis[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->idnaviera[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->idnaviera[$this->nm_grid_colunas] = (string)$this->idnaviera[$this->nm_grid_colunas];
          $this->idtipodecarga[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->idtipodecarga[$this->nm_grid_colunas] = (string)$this->idtipodecarga[$this->nm_grid_colunas];
          $this->idestado[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->idestado[$this->nm_grid_colunas] = (string)$this->idestado[$this->nm_grid_colunas];
          $this->idpiloto[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->idpiloto[$this->nm_grid_colunas] = (string)$this->idpiloto[$this->nm_grid_colunas];
          $this->idcabezal[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->idcabezal[$this->nm_grid_colunas] = (string)$this->idcabezal[$this->nm_grid_colunas];
          $this->idselectivo[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->idselectivo[$this->nm_grid_colunas] = (string)$this->idselectivo[$this->nm_grid_colunas];
          $this->idyarda[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->idyarda[$this->nm_grid_colunas] = (string)$this->idyarda[$this->nm_grid_colunas];
          $this->idtipomovimiento[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->idtipomovimiento[$this->nm_grid_colunas] = (string)$this->idtipomovimiento[$this->nm_grid_colunas];
          $this->idviaje[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->idviaje[$this->nm_grid_colunas] = (string)$this->idviaje[$this->nm_grid_colunas];
          $this->idcita[$this->nm_grid_colunas] = sc_strip_script($this->idcita[$this->nm_grid_colunas]);
          if ($this->idcita[$this->nm_grid_colunas] === "") 
          { 
              $this->idcita[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idcita[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idcita[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idcita[$this->nm_grid_colunas]);
          $this->codigo_cita[$this->nm_grid_colunas] = $this->codigo_cita[$this->nm_grid_colunas]; 
          if (empty($this->codigo_cita[$this->nm_grid_colunas]) || $this->codigo_cita[$this->nm_grid_colunas] == "none" || $this->codigo_cita[$this->nm_grid_colunas] == "*nm*") 
          { 
              $this->codigo_cita[$this->nm_grid_colunas] = "" ;  
              $out_codigo_cita = "" ; 
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $this->codigo_cita[$this->nm_grid_colunas] = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
              $out_codigo_cita = "" ; 
          } 
          else   
          { 
              $out_codigo_cita = $this->Ini->path_imag_temp . "/sc_codigo_cita_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".png";   
              QRcode::png($this->codigo_cita[$this->nm_grid_colunas], $this->Ini->root . $out_codigo_cita, 3,5,1);
              $_SESSION['scriptcase']['sc_num_img']++;
          } 
              $this->codigo_cita[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_codigo_cita;
          $this->codigo_cita[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->codigo_cita[$this->nm_grid_colunas]);
          $this->contenedorimport[$this->nm_grid_colunas] = sc_strip_script($this->contenedorimport[$this->nm_grid_colunas]);
          if ($this->contenedorimport[$this->nm_grid_colunas] === "") 
          { 
              $this->contenedorimport[$this->nm_grid_colunas] = "" ;  
          } 
          $this->contenedorimport[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->contenedorimport[$this->nm_grid_colunas]);
          $this->contenedorexport[$this->nm_grid_colunas] = sc_strip_script($this->contenedorexport[$this->nm_grid_colunas]);
          if ($this->contenedorexport[$this->nm_grid_colunas] === "") 
          { 
              $this->contenedorexport[$this->nm_grid_colunas] = "" ;  
          } 
          $this->contenedorexport[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->contenedorexport[$this->nm_grid_colunas]);
          $this->observaciones[$this->nm_grid_colunas] = sc_strip_script($this->observaciones[$this->nm_grid_colunas]);
          if ($this->observaciones[$this->nm_grid_colunas] === "") 
          { 
              $this->observaciones[$this->nm_grid_colunas] = "" ;  
          } 
          $this->observaciones[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->observaciones[$this->nm_grid_colunas]);
          $this->fechainicio[$this->nm_grid_colunas] = sc_strip_script($this->fechainicio[$this->nm_grid_colunas]);
          if ($this->fechainicio[$this->nm_grid_colunas] === "") 
          { 
              $this->fechainicio[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->fechainicio[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->fechainicio[$this->nm_grid_colunas] = substr($this->fechainicio[$this->nm_grid_colunas], 0, 10) . " " . substr($this->fechainicio[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->fechainicio[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->fechainicio[$this->nm_grid_colunas] = substr($this->fechainicio[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->fechainicio[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->fechainicio[$this->nm_grid_colunas], 17);
               } 
               $fechainicio_x =  $this->fechainicio[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fechainicio_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($fechainicio_x) && strlen($fechainicio_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fechainicio[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->fechainicio[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fechainicio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechainicio[$this->nm_grid_colunas]);
          $this->chasis[$this->nm_grid_colunas] = sc_strip_script($this->chasis[$this->nm_grid_colunas]);
          if ($this->chasis[$this->nm_grid_colunas] === "") 
          { 
              $this->chasis[$this->nm_grid_colunas] = "" ;  
          } 
          $this->chasis[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->chasis[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idnaviera($this->idnaviera[$this->nm_grid_colunas] , $this->idnaviera[$this->nm_grid_colunas]) ; 
          $this->idnaviera[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idnaviera[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idtipodecarga($this->idtipodecarga[$this->nm_grid_colunas] , $this->idtipodecarga[$this->nm_grid_colunas]) ; 
          $this->idtipodecarga[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idtipodecarga[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idestado($this->idestado[$this->nm_grid_colunas] , $this->idestado[$this->nm_grid_colunas]) ; 
          $this->idestado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idestado[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idpiloto($this->idpiloto[$this->nm_grid_colunas] , $this->idpiloto[$this->nm_grid_colunas]) ; 
          $this->idpiloto[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idpiloto[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idcabezal($this->idcabezal[$this->nm_grid_colunas] , $this->idcabezal[$this->nm_grid_colunas]) ; 
          $this->idcabezal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idcabezal[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idselectivo($this->idselectivo[$this->nm_grid_colunas] , $this->idselectivo[$this->nm_grid_colunas]) ; 
          $this->idselectivo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idselectivo[$this->nm_grid_colunas]);
          $this->idyarda[$this->nm_grid_colunas] = sc_strip_script($this->idyarda[$this->nm_grid_colunas]);
          if ($this->idyarda[$this->nm_grid_colunas] === "") 
          { 
              $this->idyarda[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idyarda[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idyarda[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idyarda[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idtipomovimiento($this->idtipomovimiento[$this->nm_grid_colunas] , $this->idtipomovimiento[$this->nm_grid_colunas]) ; 
          $this->idtipomovimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idtipomovimiento[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idviaje($this->idviaje[$this->nm_grid_colunas] , $this->idviaje[$this->nm_grid_colunas]) ; 
          $this->idviaje[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idviaje[$this->nm_grid_colunas]);
            $cell_codigo_cita = array('posx' => '2.3002345833330438', 'posy' => '6.796907708332477', 'data' => $this->codigo_cita[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_contenedorimport = array('posx' => '6.718776249999153', 'posy' => '10.39399749999869', 'data' => $this->contenedorimport[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_contenedorExport = array('posx' => '10.475859583332014', 'posy' => '10.42458333333202', 'data' => $this->contenedorexport[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_observaciones = array('posx' => '5.951484583332583', 'posy' => '13.01749999999836', 'data' => $this->observaciones[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fechaInicio = array('posx' => '9.973151249998743', 'posy' => '5.05354166666603', 'data' => $this->fechainicio[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => '14', 'color_r'    => '255', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_chasis = array('posx' => '17.11690124999784', 'posy' => '8.78416666666556', 'data' => $this->chasis[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idNaviera = array('posx' => '10.555234583332004', 'posy' => '8.78416666666556', 'data' => $this->idnaviera[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idpiloto = array('posx' => '6.718776249999153', 'posy' => '7.32895833333241', 'data' => $this->idpiloto[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idcabezal = array('posx' => '14.127109583331553', 'posy' => '8.75770833333223', 'data' => $this->idcabezal[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idselectivo = array('posx' => '6.771692916665813', 'posy' => '8.81062499999889', 'data' => $this->idselectivo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idviaje = array('posx' => '14.206484583331543', 'posy' => '10.42458333333202', 'data' => $this->idviaje[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);

            if (isset($cell_codigo_cita['data']) && !empty($cell_codigo_cita['data']) && is_file($cell_codigo_cita['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_codigo_cita['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_codigo_cita['data'], $cell_codigo_cita['posx'], $cell_codigo_cita['posy'], 0, 0);
                }
            }

            $this->Pdf->SetFont($cell_contenedorimport['font_type'], $cell_contenedorimport['font_style'], $cell_contenedorimport['font_size']);
            $this->pdf_text_color($cell_contenedorimport['data'], $cell_contenedorimport['color_r'], $cell_contenedorimport['color_g'], $cell_contenedorimport['color_b']);
            if (!empty($cell_contenedorimport['posx']) && !empty($cell_contenedorimport['posy']))
            {
                $this->Pdf->SetXY($cell_contenedorimport['posx'], $cell_contenedorimport['posy']);
            }
            elseif (!empty($cell_contenedorimport['posx']))
            {
                $this->Pdf->SetX($cell_contenedorimport['posx']);
            }
            elseif (!empty($cell_contenedorimport['posy']))
            {
                $this->Pdf->SetY($cell_contenedorimport['posy']);
            }
            $this->Pdf->Cell($cell_contenedorimport['width'], 0, $cell_contenedorimport['data'], 0, 0, $cell_contenedorimport['align']);

            $this->Pdf->SetFont($cell_contenedorExport['font_type'], $cell_contenedorExport['font_style'], $cell_contenedorExport['font_size']);
            $this->pdf_text_color($cell_contenedorExport['data'], $cell_contenedorExport['color_r'], $cell_contenedorExport['color_g'], $cell_contenedorExport['color_b']);
            if (!empty($cell_contenedorExport['posx']) && !empty($cell_contenedorExport['posy']))
            {
                $this->Pdf->SetXY($cell_contenedorExport['posx'], $cell_contenedorExport['posy']);
            }
            elseif (!empty($cell_contenedorExport['posx']))
            {
                $this->Pdf->SetX($cell_contenedorExport['posx']);
            }
            elseif (!empty($cell_contenedorExport['posy']))
            {
                $this->Pdf->SetY($cell_contenedorExport['posy']);
            }
            $this->Pdf->Cell($cell_contenedorExport['width'], 0, $cell_contenedorExport['data'], 0, 0, $cell_contenedorExport['align']);

            $this->Pdf->SetFont($cell_observaciones['font_type'], $cell_observaciones['font_style'], $cell_observaciones['font_size']);
            $this->pdf_text_color($cell_observaciones['data'], $cell_observaciones['color_r'], $cell_observaciones['color_g'], $cell_observaciones['color_b']);
            if (!empty($cell_observaciones['posx']) && !empty($cell_observaciones['posy']))
            {
                $this->Pdf->SetXY($cell_observaciones['posx'], $cell_observaciones['posy']);
            }
            elseif (!empty($cell_observaciones['posx']))
            {
                $this->Pdf->SetX($cell_observaciones['posx']);
            }
            elseif (!empty($cell_observaciones['posy']))
            {
                $this->Pdf->SetY($cell_observaciones['posy']);
            }
            $this->Pdf->Cell($cell_observaciones['width'], 0, $cell_observaciones['data'], 0, 0, $cell_observaciones['align']);

            $this->Pdf->SetFont($cell_fechaInicio['font_type'], $cell_fechaInicio['font_style'], $cell_fechaInicio['font_size']);
            $this->pdf_text_color($cell_fechaInicio['data'], $cell_fechaInicio['color_r'], $cell_fechaInicio['color_g'], $cell_fechaInicio['color_b']);
            if (!empty($cell_fechaInicio['posx']) && !empty($cell_fechaInicio['posy']))
            {
                $this->Pdf->SetXY($cell_fechaInicio['posx'], $cell_fechaInicio['posy']);
            }
            elseif (!empty($cell_fechaInicio['posx']))
            {
                $this->Pdf->SetX($cell_fechaInicio['posx']);
            }
            elseif (!empty($cell_fechaInicio['posy']))
            {
                $this->Pdf->SetY($cell_fechaInicio['posy']);
            }
            $this->Pdf->Cell($cell_fechaInicio['width'], 0, $cell_fechaInicio['data'], 0, 0, $cell_fechaInicio['align']);

            $this->Pdf->SetFont($cell_chasis['font_type'], $cell_chasis['font_style'], $cell_chasis['font_size']);
            $this->pdf_text_color($cell_chasis['data'], $cell_chasis['color_r'], $cell_chasis['color_g'], $cell_chasis['color_b']);
            if (!empty($cell_chasis['posx']) && !empty($cell_chasis['posy']))
            {
                $this->Pdf->SetXY($cell_chasis['posx'], $cell_chasis['posy']);
            }
            elseif (!empty($cell_chasis['posx']))
            {
                $this->Pdf->SetX($cell_chasis['posx']);
            }
            elseif (!empty($cell_chasis['posy']))
            {
                $this->Pdf->SetY($cell_chasis['posy']);
            }
            $this->Pdf->Cell($cell_chasis['width'], 0, $cell_chasis['data'], 0, 0, $cell_chasis['align']);

            $this->Pdf->SetFont($cell_idNaviera['font_type'], $cell_idNaviera['font_style'], $cell_idNaviera['font_size']);
            $this->pdf_text_color($cell_idNaviera['data'], $cell_idNaviera['color_r'], $cell_idNaviera['color_g'], $cell_idNaviera['color_b']);
            if (!empty($cell_idNaviera['posx']) && !empty($cell_idNaviera['posy']))
            {
                $this->Pdf->SetXY($cell_idNaviera['posx'], $cell_idNaviera['posy']);
            }
            elseif (!empty($cell_idNaviera['posx']))
            {
                $this->Pdf->SetX($cell_idNaviera['posx']);
            }
            elseif (!empty($cell_idNaviera['posy']))
            {
                $this->Pdf->SetY($cell_idNaviera['posy']);
            }
            $this->Pdf->Cell($cell_idNaviera['width'], 0, $cell_idNaviera['data'], 0, 0, $cell_idNaviera['align']);

            $this->Pdf->SetFont($cell_idpiloto['font_type'], $cell_idpiloto['font_style'], $cell_idpiloto['font_size']);
            $this->pdf_text_color($cell_idpiloto['data'], $cell_idpiloto['color_r'], $cell_idpiloto['color_g'], $cell_idpiloto['color_b']);
            if (!empty($cell_idpiloto['posx']) && !empty($cell_idpiloto['posy']))
            {
                $this->Pdf->SetXY($cell_idpiloto['posx'], $cell_idpiloto['posy']);
            }
            elseif (!empty($cell_idpiloto['posx']))
            {
                $this->Pdf->SetX($cell_idpiloto['posx']);
            }
            elseif (!empty($cell_idpiloto['posy']))
            {
                $this->Pdf->SetY($cell_idpiloto['posy']);
            }
            $this->Pdf->Cell($cell_idpiloto['width'], 0, $cell_idpiloto['data'], 0, 0, $cell_idpiloto['align']);

            $this->Pdf->SetFont($cell_idcabezal['font_type'], $cell_idcabezal['font_style'], $cell_idcabezal['font_size']);
            $this->pdf_text_color($cell_idcabezal['data'], $cell_idcabezal['color_r'], $cell_idcabezal['color_g'], $cell_idcabezal['color_b']);
            if (!empty($cell_idcabezal['posx']) && !empty($cell_idcabezal['posy']))
            {
                $this->Pdf->SetXY($cell_idcabezal['posx'], $cell_idcabezal['posy']);
            }
            elseif (!empty($cell_idcabezal['posx']))
            {
                $this->Pdf->SetX($cell_idcabezal['posx']);
            }
            elseif (!empty($cell_idcabezal['posy']))
            {
                $this->Pdf->SetY($cell_idcabezal['posy']);
            }
            $this->Pdf->Cell($cell_idcabezal['width'], 0, $cell_idcabezal['data'], 0, 0, $cell_idcabezal['align']);

            $this->Pdf->SetFont($cell_idselectivo['font_type'], $cell_idselectivo['font_style'], $cell_idselectivo['font_size']);
            $this->pdf_text_color($cell_idselectivo['data'], $cell_idselectivo['color_r'], $cell_idselectivo['color_g'], $cell_idselectivo['color_b']);
            if (!empty($cell_idselectivo['posx']) && !empty($cell_idselectivo['posy']))
            {
                $this->Pdf->SetXY($cell_idselectivo['posx'], $cell_idselectivo['posy']);
            }
            elseif (!empty($cell_idselectivo['posx']))
            {
                $this->Pdf->SetX($cell_idselectivo['posx']);
            }
            elseif (!empty($cell_idselectivo['posy']))
            {
                $this->Pdf->SetY($cell_idselectivo['posy']);
            }
            $this->Pdf->Cell($cell_idselectivo['width'], 0, $cell_idselectivo['data'], 0, 0, $cell_idselectivo['align']);

            $this->Pdf->SetFont($cell_idviaje['font_type'], $cell_idviaje['font_style'], $cell_idviaje['font_size']);
            $this->pdf_text_color($cell_idviaje['data'], $cell_idviaje['color_r'], $cell_idviaje['color_g'], $cell_idviaje['color_b']);
            if (!empty($cell_idviaje['posx']) && !empty($cell_idviaje['posy']))
            {
                $this->Pdf->SetXY($cell_idviaje['posx'], $cell_idviaje['posy']);
            }
            elseif (!empty($cell_idviaje['posx']))
            {
                $this->Pdf->SetX($cell_idviaje['posx']);
            }
            elseif (!empty($cell_idviaje['posy']))
            {
                $this->Pdf->SetY($cell_idviaje['posy']);
            }
            $this->Pdf->Cell($cell_idviaje['width'], 0, $cell_idviaje['data'], 0, 0, $cell_idviaje['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
