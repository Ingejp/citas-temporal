<?php
class QR_PDF_II_BACKUP_grid
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
   var $codigo = array();
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
   $_SESSION['scriptcase']['QR_PDF_II_BACKUP']['default_font'] = $this->default_font;
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
           if (in_array("QR_PDF_II_BACKUP", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['campos_busca'];
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
       $this->codigo[0] = $Busca_temp['codigo']; 
       $tmp_pos = strpos($this->codigo[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->codigo[0]))
       {
           $this->codigo[0] = substr($this->codigo[0], 0, $tmp_pos);
       }
       $this->contenedorimport[0] = $Busca_temp['contenedorimport']; 
       $tmp_pos = strpos($this->contenedorimport[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->contenedorimport[0]))
       {
           $this->contenedorimport[0] = substr($this->contenedorimport[0], 0, $tmp_pos);
       }
       $this->idtipomovimiento[0] = $Busca_temp['idtipomovimiento']; 
       $tmp_pos = strpos($this->idtipomovimiento[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idtipomovimiento[0]))
       {
           $this->idtipomovimiento[0] = substr($this->idtipomovimiento[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq_filtro'];
   $_SESSION['scriptcase']['QR_PDF_II_BACKUP']['contr_erro'] = 'on';
if (!isset($_SESSION['codigo'])) {$_SESSION['codigo'] = "";}
if (!isset($this->sc_temp_codigo)) {$this->sc_temp_codigo = (isset($_SESSION['codigo'])) ? $_SESSION['codigo'] : "";}
 $this->nm_where_dinamico =" WHERE codigo_cita='".$this->sc_temp_codigo."'";
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_dinamico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_dinamico'] != $this->nm_where_dinamico) {
    $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_dinamico'] = $this->nm_where_dinamico;
    unset($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['inicio']);
}

if (isset($this->sc_temp_codigo)) {$_SESSION['codigo'] = $this->sc_temp_codigo;}
$_SESSION['scriptcase']['QR_PDF_II_BACKUP']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['QR_PDF_II_BACKUP']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['QR_PDF_II_BACKUP']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['QR_PDF_II_BACKUP']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['QR_PDF_II_BACKUP']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT idCita, codigo_cita, codigo, contenedorimport, contenedorExport, observaciones, str_replace (convert(char(10),fechaInicio,102), '.', '-') + ' ' + convert(char(8),fechaInicio,20), chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje from (SELECT  concat('TURNO: ', ( idCita - (SELECT turno FROM cita WHERE idcita=62) )) as idCita,     codigo_cita,     codigo_cita AS codigo,     contenedorimport,     contenedorExport,     observaciones,     fechaInicio,     chasis,     idNaviera,     idtipodecarga,     idestado,     idpiloto,     idcabezal,     idselectivo,     idyarda,     idtipoMovimiento,     idviaje FROM     cita) nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idCita, codigo_cita, codigo, contenedorimport, contenedorExport, observaciones, fechaInicio, chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje from (SELECT  concat('TURNO: ', ( idCita - (SELECT turno FROM cita WHERE idcita=62) )) as idCita,     codigo_cita,     codigo_cita AS codigo,     contenedorimport,     contenedorExport,     observaciones,     fechaInicio,     chasis,     idNaviera,     idtipodecarga,     idestado,     idpiloto,     idcabezal,     idselectivo,     idyarda,     idtipoMovimiento,     idviaje FROM     cita) nm_sel_esp"; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idCita, codigo_cita, codigo, contenedorimport, contenedorExport, observaciones, fechaInicio, chasis, idNaviera, idtipodecarga, idestado, idpiloto, idcabezal, idselectivo, idyarda, idtipoMovimiento, idviaje from (SELECT  concat('TURNO: ', ( idCita - (SELECT turno FROM cita WHERE idcita=62) )) as idCita,     codigo_cita,     codigo_cita AS codigo,     contenedorimport,     contenedorExport,     observaciones,     fechaInicio,     chasis,     idNaviera,     idtipodecarga,     idestado,     idpiloto,     idcabezal,     idselectivo,     idyarda,     idtipoMovimiento,     idviaje FROM     cita) nm_sel_esp"; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['order_grid'] = $nmgp_order_by;
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/usr__NM__bg__NM__QR V2.png", "2.000000", "1.500000", "18", "12", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idcita'] = "Id Cita";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['codigo_cita'] = "Codigo Cita";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['codigo'] = "Codigo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['contenedorimport'] = "Contenedorimport";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['contenedorexport'] = "Contenedor Export";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['observaciones'] = "Observaciones";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['fechainicio'] = "Fecha Inicio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['chasis'] = "Chasis";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idnaviera'] = "Id Naviera";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idtipodecarga'] = "Idtipodecarga";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idestado'] = "Idestado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idpiloto'] = "Idpiloto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idcabezal'] = "Idcabezal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idselectivo'] = "Idselectivo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idyarda'] = "Idyarda";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idtipomovimiento'] = "Idtipo Movimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['labels']['idviaje'] = "Idviaje";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['QR_PDF_II_BACKUP']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['QR_PDF_II_BACKUP']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['QR_PDF_II_BACKUP']['lig_edit'];
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
   $this->Pdf->Output('QR_REPORT.pdf', 'D');
       $this->grid_saida_html();
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['QR_PDF_II_BACKUP']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idcita[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->codigo_cita[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->codigo[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->contenedorimport[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->contenedorexport[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->observaciones[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->fechainicio[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->chasis[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->idnaviera[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->idnaviera[$this->nm_grid_colunas] = (string)$this->idnaviera[$this->nm_grid_colunas];
          $this->idtipodecarga[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->idtipodecarga[$this->nm_grid_colunas] = (string)$this->idtipodecarga[$this->nm_grid_colunas];
          $this->idestado[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->idestado[$this->nm_grid_colunas] = (string)$this->idestado[$this->nm_grid_colunas];
          $this->idpiloto[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->idpiloto[$this->nm_grid_colunas] = (string)$this->idpiloto[$this->nm_grid_colunas];
          $this->idcabezal[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->idcabezal[$this->nm_grid_colunas] = (string)$this->idcabezal[$this->nm_grid_colunas];
          $this->idselectivo[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->idselectivo[$this->nm_grid_colunas] = (string)$this->idselectivo[$this->nm_grid_colunas];
          $this->idyarda[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->idyarda[$this->nm_grid_colunas] = (string)$this->idyarda[$this->nm_grid_colunas];
          $this->idtipomovimiento[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->idtipomovimiento[$this->nm_grid_colunas] = (string)$this->idtipomovimiento[$this->nm_grid_colunas];
          $this->idviaje[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
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
          $this->codigo[$this->nm_grid_colunas] = sc_strip_script($this->codigo[$this->nm_grid_colunas]);
          if ($this->codigo[$this->nm_grid_colunas] === "") 
          { 
              $this->codigo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->codigo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->codigo[$this->nm_grid_colunas]);
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
                   $this->fechainicio[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
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
            $cell_idCita = array('posx' => '15.741067916664683', 'posy' => '4.072942916666153', 'data' => $this->idcita[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_codigo_cita = array('posx' => '2.776484583332983', 'posy' => '1.7429427083331137', 'data' => $this->codigo_cita[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_contenedorimport = array('posx' => '6.189609583332553', 'posy' => '9.2562891666655', 'data' => $this->contenedorimport[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '16', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_contenedorExport = array('posx' => '10.211276249998713', 'posy' => '9.28687499999883', 'data' => $this->contenedorexport[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '16', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_observaciones = array('posx' => '10.105442916665393', 'posy' => '11.19187499999859', 'data' => $this->observaciones[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_fechaInicio = array('posx' => '9.54939458333213', 'posy' => '4.15395833333281', 'data' => $this->fechainicio[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => '14', 'color_r'    => '255', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_chasis = array('posx' => '13.968359583331573', 'posy' => '9.28687499999883', 'data' => $this->chasis[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '16', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_idNaviera = array('posx' => '2.776484583332983', 'posy' => '9.260416666665499', 'data' => $this->idnaviera[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '16', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_idpiloto = array('posx' => '2.935234583332963', 'posy' => '7.01145833333245', 'data' => $this->idpiloto[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'freeserif', 'font_size'  => '16', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_idcabezal = array('posx' => '16.32315124999794', 'posy' => '7.06437499999911', 'data' => $this->idcabezal[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '18', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_idselectivo = array('posx' => '16.772942916664555', 'posy' => '9.23395833333217', 'data' => $this->idselectivo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '16', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_idviaje = array('posx' => '2.988151249999623', 'posy' => '11.16541666666526', 'data' => $this->idviaje[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_codigo = array('posx' => '2.988151249999623', 'posy' => '5.386757916665988', 'data' => $this->codigo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_idCita['font_type'], $cell_idCita['font_style'], $cell_idCita['font_size']);
            $this->pdf_text_color($cell_idCita['data'], $cell_idCita['color_r'], $cell_idCita['color_g'], $cell_idCita['color_b']);
            if (!empty($cell_idCita['posx']) && !empty($cell_idCita['posy']))
            {
                $this->Pdf->SetXY($cell_idCita['posx'], $cell_idCita['posy']);
            }
            elseif (!empty($cell_idCita['posx']))
            {
                $this->Pdf->SetX($cell_idCita['posx']);
            }
            elseif (!empty($cell_idCita['posy']))
            {
                $this->Pdf->SetY($cell_idCita['posy']);
            }
            $this->Pdf->Cell($cell_idCita['width'], 0, $cell_idCita['data'], 0, 0, $cell_idCita['align']);

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

            $this->Pdf->SetFont($cell_codigo['font_type'], $cell_codigo['font_style'], $cell_codigo['font_size']);
            $this->pdf_text_color($cell_codigo['data'], $cell_codigo['color_r'], $cell_codigo['color_g'], $cell_codigo['color_b']);
            if (!empty($cell_codigo['posx']) && !empty($cell_codigo['posy']))
            {
                $this->Pdf->SetXY($cell_codigo['posx'], $cell_codigo['posy']);
            }
            elseif (!empty($cell_codigo['posx']))
            {
                $this->Pdf->SetX($cell_codigo['posx']);
            }
            elseif (!empty($cell_codigo['posy']))
            {
                $this->Pdf->SetY($cell_codigo['posy']);
            }
            $this->Pdf->Cell($cell_codigo['width'], 0, $cell_codigo['data'], 0, 0, $cell_codigo['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output('QR_REPORT.pdf', 'D');
   $this->grid_saida_html();
 }
 function grid_saida_html()
 {
   echo "<HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n";
   echo "<HEAD>\r\n";
   echo " <TITLE>" . $this->Ini->Nm_lang['lang_othr_chart_title'] . " cita</TITLE>\r\n";
   echo " <META http-equiv=\"Content-Type\" content=\"text/html; charset=" .  $_SESSION['scriptcase']['charset_html']  . "\" />\r\n";
   if ($_SESSION['scriptcase']['proc_mobile'])
   {
       echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />";
   }
   echo "<link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
   echo "</HEAD>\r\n";
   echo "<BODY>\r\n";
   echo $this->Ini->Ajax_result_set;
   echo " <TABLE border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n";
   echo "  <TR>\r\n";
   echo "   <TD align=\"center\"><B>" . $this->Ini->Nm_lang['lang_pdff_fnsh'] . "</B></TD>\r\n";
   echo "  </TR>\r\n";
   echo "  <TR>\r\n";
   echo "   <TD align=\"center\">&nbsp;</TD>\r\n";
   echo "  </TR>\r\n";
   echo "  <TR>\r\n";
   if (!$this->aba_iframe)
   {
       echo "   <TD align=\"center\"> <A  HREF=\"javascript:document.F3.submit()\">" . $this->Ini->Nm_lang['lang_btns_rtrn_hint'] . "</A></TD>\r\n";
   }
   echo "  </TR>\r\n";
   echo " </TABLE>\r\n";
   echo "<form name=\"F3\" method=\"post\"\r\n"; 
   echo "                  action=\"QR_PDF_II_BACKUP_fim.php\"\r\n"; 
   echo "                  target=\"_self\">\r\n"; 
   echo "    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\">\r\n"; 
   echo "    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\">\r\n"; 
   echo "    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\">\r\n"; 
   echo "    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\">\r\n"; 
   echo "   </form>\r\n"; 
   echo "</BODY>\r\n";
   echo "</HTML>\r\n";
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
