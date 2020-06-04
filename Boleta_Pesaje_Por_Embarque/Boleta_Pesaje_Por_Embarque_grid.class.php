<?php
class Boleta_Pesaje_Por_Embarque_grid
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
   var $idweighing = array();
   var $container = array();
   var $vessel = array();
   var $shippingcompany = array();
   var $voyage = array();
   var $date = array();
   var $commodity = array();
   var $tarechassis = array();
   var $tarecontainer = array();
   var $grossweight = array();
   var $netweight = array();
   var $packages = array();
   var $country = array();
   var $typeoperation = array();
   var $vgm = array();
   var $qr = array();
   var $codigo = array();
   var $exitticket = array();
   var $inticket = array();
   var $licenseplate = array();
   var $driverslicense = array();
   var $pilotname = array();
   var $transportname = array();
   var $chasis = array();
   var $machine = array();
   var $bl = array();
   var $out = array();
   var $in = array();
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
   $this->nm_data = new nm_data("es");
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
   $_SESSION['scriptcase']['Boleta_Pesaje_Por_Embarque']['default_font'] = $this->default_font;
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
           if (in_array("Boleta_Pesaje_Por_Embarque", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->idweighing[0] = $Busca_temp['idweighing']; 
       $tmp_pos = strpos($this->idweighing[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idweighing[0]))
       {
           $this->idweighing[0] = substr($this->idweighing[0], 0, $tmp_pos);
       }
       $this->container[0] = $Busca_temp['container']; 
       $tmp_pos = strpos($this->container[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->container[0]))
       {
           $this->container[0] = substr($this->container[0], 0, $tmp_pos);
       }
       $this->vessel[0] = $Busca_temp['vessel']; 
       $tmp_pos = strpos($this->vessel[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->vessel[0]))
       {
           $this->vessel[0] = substr($this->vessel[0], 0, $tmp_pos);
       }
       $this->shippingcompany[0] = $Busca_temp['shippingcompany']; 
       $tmp_pos = strpos($this->shippingcompany[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->shippingcompany[0]))
       {
           $this->shippingcompany[0] = substr($this->shippingcompany[0], 0, $tmp_pos);
       }
       $this->out[0] = $Busca_temp['out']; 
       $tmp_pos = strpos($this->out[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->out[0]))
       {
           $this->out[0] = substr($this->out[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['Boleta_Pesaje_Por_Embarque']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Boleta_Pesaje_Por_Embarque']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['Boleta_Pesaje_Por_Embarque']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['Boleta_Pesaje_Por_Embarque']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_select'] = array(); 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_select']['commodity'] = 'ASC'; 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_ant']  = "commodity ASC"; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_orig'] = " where voyage ='" . $_SESSION['VIAJE'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT idweighing, container, vessel, shippingCompany, voyage, str_replace (convert(char(10),`date`,102), '.', '-') + ' ' + convert(char(8),`date`,20) as sc_def_col_1, commodity, tareChassis, tareContainer, grossWeight, netWeight, packages, country, typeOperation, VGM, QR, QR as codigo, exitTicket, inTicket, licensePlate, driversLicense, pilotName, transportName, chasis, machine, bl, `out` as sc_def_col_2, `In` as sc_def_col_3 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idweighing, container, vessel, shippingCompany, voyage, `date` as sc_def_col_1, commodity, tareChassis, tareContainer, grossWeight, netWeight, packages, country, typeOperation, VGM, QR, QR as codigo, exitTicket, inTicket, licensePlate, driversLicense, pilotName, transportName, chasis, machine, bl, `out` as sc_def_col_2, `In` as sc_def_col_3 from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idweighing, container, vessel, shippingCompany, voyage, `date` as sc_def_col_1, commodity, tareChassis, tareContainer, grossWeight, netWeight, packages, country, typeOperation, VGM, QR, QR as codigo, exitTicket, inTicket, licensePlate, driversLicense, pilotName, transportName, chasis, machine, bl, `out` as sc_def_col_2, `In` as sc_def_col_3 from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 11, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 11);
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/usr__NM__bg__NM__TICKET BASCULA FINAL II.jpg", "1.000000", "2.000000", "20", "14", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['idweighing'] = "Idweighing";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['container'] = "Container";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['vessel'] = "Vessel";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['shippingcompany'] = "Shipping Company";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['voyage'] = "Voyage";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['date'] = "Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['commodity'] = "Commodity";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['tarechassis'] = "Tare Chassis";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['tarecontainer'] = "Tare Container";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['grossweight'] = "Gross Weight";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['netweight'] = "Net Weight";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['packages'] = "Packages";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['country'] = "Country";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['typeoperation'] = "Type Operation";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['vgm'] = "VGM";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['qr'] = "QR";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['codigo'] = "CODIGO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['exitticket'] = "Exit Ticket";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['inticket'] = "In Ticket";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['licenseplate'] = "License Plate";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['driverslicense'] = "Drivers License";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['pilotname'] = "Pilot Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['transportname'] = "Transport Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['chasis'] = "Chasis";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['machine'] = "Machine";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['bl'] = "Bl";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['out'] = "Out";
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['labels']['in'] = "In";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['Boleta_Pesaje_Por_Embarque']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['Boleta_Pesaje_Por_Embarque']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['Boleta_Pesaje_Por_Embarque']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['Boleta_Pesaje_Por_Embarque']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idweighing[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->idweighing[$this->nm_grid_colunas] = (string)$this->idweighing[$this->nm_grid_colunas];
          $this->container[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->vessel[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->shippingcompany[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->voyage[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->date[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->commodity[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->tarechassis[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->tarechassis[$this->nm_grid_colunas] = (string)$this->tarechassis[$this->nm_grid_colunas];
          $this->tarecontainer[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->tarecontainer[$this->nm_grid_colunas] = (string)$this->tarecontainer[$this->nm_grid_colunas];
          $this->grossweight[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->grossweight[$this->nm_grid_colunas] = (string)$this->grossweight[$this->nm_grid_colunas];
          $this->netweight[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->netweight[$this->nm_grid_colunas] = (string)$this->netweight[$this->nm_grid_colunas];
          $this->packages[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->packages[$this->nm_grid_colunas] = (string)$this->packages[$this->nm_grid_colunas];
          $this->country[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->typeoperation[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->vgm[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->vgm[$this->nm_grid_colunas] = (string)$this->vgm[$this->nm_grid_colunas];
          $this->qr[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->qr[$this->nm_grid_colunas] = (string)$this->qr[$this->nm_grid_colunas];
          $this->codigo[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->codigo[$this->nm_grid_colunas] = (string)$this->codigo[$this->nm_grid_colunas];
          $this->exitticket[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->inticket[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->licenseplate[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->driverslicense[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->driverslicense[$this->nm_grid_colunas] = (string)$this->driverslicense[$this->nm_grid_colunas];
          $this->pilotname[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->transportname[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->chasis[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->machine[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->machine[$this->nm_grid_colunas] = (string)$this->machine[$this->nm_grid_colunas];
          $this->bl[$this->nm_grid_colunas] = $this->rs_grid->fields[25] ;  
          $this->out[$this->nm_grid_colunas] = $this->rs_grid->fields[26] ;  
          $this->in[$this->nm_grid_colunas] = $this->rs_grid->fields[27] ;  
          $this->idweighing[$this->nm_grid_colunas] = sc_strip_script($this->idweighing[$this->nm_grid_colunas]);
          if ($this->idweighing[$this->nm_grid_colunas] === "") 
          { 
              $this->idweighing[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idweighing[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idweighing[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idweighing[$this->nm_grid_colunas]);
          $this->container[$this->nm_grid_colunas] = sc_strip_script($this->container[$this->nm_grid_colunas]);
          if ($this->container[$this->nm_grid_colunas] === "") 
          { 
              $this->container[$this->nm_grid_colunas] = "" ;  
          } 
          $this->container[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->container[$this->nm_grid_colunas]);
          $this->vessel[$this->nm_grid_colunas] = sc_strip_script($this->vessel[$this->nm_grid_colunas]);
          if ($this->vessel[$this->nm_grid_colunas] === "") 
          { 
              $this->vessel[$this->nm_grid_colunas] = "" ;  
          } 
          $this->vessel[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->vessel[$this->nm_grid_colunas]);
          $this->shippingcompany[$this->nm_grid_colunas] = sc_strip_script($this->shippingcompany[$this->nm_grid_colunas]);
          if ($this->shippingcompany[$this->nm_grid_colunas] === "") 
          { 
              $this->shippingcompany[$this->nm_grid_colunas] = "" ;  
          } 
          $this->shippingcompany[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->shippingcompany[$this->nm_grid_colunas]);
          $this->voyage[$this->nm_grid_colunas] = sc_strip_script($this->voyage[$this->nm_grid_colunas]);
          if ($this->voyage[$this->nm_grid_colunas] === "") 
          { 
              $this->voyage[$this->nm_grid_colunas] = "" ;  
          } 
          $this->voyage[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->voyage[$this->nm_grid_colunas]);
          $this->date[$this->nm_grid_colunas] = sc_strip_script($this->date[$this->nm_grid_colunas]);
          if ($this->date[$this->nm_grid_colunas] === "") 
          { 
              $this->date[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->date[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->date[$this->nm_grid_colunas] = substr($this->date[$this->nm_grid_colunas], 0, 10) . " " . substr($this->date[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->date[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->date[$this->nm_grid_colunas] = substr($this->date[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->date[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->date[$this->nm_grid_colunas], 17);
               } 
               $date_x =  $this->date[$this->nm_grid_colunas];
               nm_conv_limpa_dado($date_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($date_x) && strlen($date_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->date[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->date[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->date[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->date[$this->nm_grid_colunas]);
          $this->commodity[$this->nm_grid_colunas] = sc_strip_script($this->commodity[$this->nm_grid_colunas]);
          if ($this->commodity[$this->nm_grid_colunas] === "") 
          { 
              $this->commodity[$this->nm_grid_colunas] = "" ;  
          } 
          $this->commodity[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->commodity[$this->nm_grid_colunas]);
          $this->tarechassis[$this->nm_grid_colunas] = sc_strip_script($this->tarechassis[$this->nm_grid_colunas]);
          if ($this->tarechassis[$this->nm_grid_colunas] === "") 
          { 
              $this->tarechassis[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tarechassis[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tarechassis[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tarechassis[$this->nm_grid_colunas]);
          $this->tarecontainer[$this->nm_grid_colunas] = sc_strip_script($this->tarecontainer[$this->nm_grid_colunas]);
          if ($this->tarecontainer[$this->nm_grid_colunas] === "") 
          { 
              $this->tarecontainer[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tarecontainer[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tarecontainer[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tarecontainer[$this->nm_grid_colunas]);
          $this->grossweight[$this->nm_grid_colunas] = sc_strip_script($this->grossweight[$this->nm_grid_colunas]);
          if ($this->grossweight[$this->nm_grid_colunas] === "") 
          { 
              $this->grossweight[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->grossweight[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->grossweight[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->grossweight[$this->nm_grid_colunas]);
          $this->netweight[$this->nm_grid_colunas] = sc_strip_script($this->netweight[$this->nm_grid_colunas]);
          if ($this->netweight[$this->nm_grid_colunas] === "") 
          { 
              $this->netweight[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->netweight[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->netweight[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->netweight[$this->nm_grid_colunas]);
          $this->packages[$this->nm_grid_colunas] = sc_strip_script($this->packages[$this->nm_grid_colunas]);
          if ($this->packages[$this->nm_grid_colunas] === "") 
          { 
              $this->packages[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->packages[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->packages[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->packages[$this->nm_grid_colunas]);
          $this->country[$this->nm_grid_colunas] = sc_strip_script($this->country[$this->nm_grid_colunas]);
          if ($this->country[$this->nm_grid_colunas] === "") 
          { 
              $this->country[$this->nm_grid_colunas] = "" ;  
          } 
          $this->country[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->country[$this->nm_grid_colunas]);
          $this->typeoperation[$this->nm_grid_colunas] = sc_strip_script($this->typeoperation[$this->nm_grid_colunas]);
          if ($this->typeoperation[$this->nm_grid_colunas] === "") 
          { 
              $this->typeoperation[$this->nm_grid_colunas] = "" ;  
          } 
          $this->typeoperation[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->typeoperation[$this->nm_grid_colunas]);
          $this->vgm[$this->nm_grid_colunas] = sc_strip_script($this->vgm[$this->nm_grid_colunas]);
          if ($this->vgm[$this->nm_grid_colunas] === "") 
          { 
              $this->vgm[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->vgm[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->vgm[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->vgm[$this->nm_grid_colunas]);
          $this->qr[$this->nm_grid_colunas] = $this->qr[$this->nm_grid_colunas]; 
          if (empty($this->qr[$this->nm_grid_colunas]) || $this->qr[$this->nm_grid_colunas] == "none" || $this->qr[$this->nm_grid_colunas] == "*nm*") 
          { 
              $this->qr[$this->nm_grid_colunas] = "" ;  
              $out_qr = "" ; 
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $this->qr[$this->nm_grid_colunas] = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
              $out_qr = "" ; 
          } 
          else   
          { 
              $out_qr = $this->Ini->path_imag_temp . "/sc_qr_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".png";   
              QRcode::png($this->qr[$this->nm_grid_colunas], $this->Ini->root . $out_qr, 3,3,1);
              $_SESSION['scriptcase']['sc_num_img']++;
          } 
              $this->qr[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_qr;
          $this->qr[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->qr[$this->nm_grid_colunas]);
          $this->codigo[$this->nm_grid_colunas] = sc_strip_script($this->codigo[$this->nm_grid_colunas]);
          if ($this->codigo[$this->nm_grid_colunas] === "") 
          { 
              $this->codigo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->codigo[$this->nm_grid_colunas], "", "", "0", "S", "2", "", "N:4", "-") ; 
          } 
          $this->codigo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->codigo[$this->nm_grid_colunas]);
          $this->exitticket[$this->nm_grid_colunas] = sc_strip_script($this->exitticket[$this->nm_grid_colunas]);
          if ($this->exitticket[$this->nm_grid_colunas] === "") 
          { 
              $this->exitticket[$this->nm_grid_colunas] = "" ;  
          } 
          $this->exitticket[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->exitticket[$this->nm_grid_colunas]);
          $this->inticket[$this->nm_grid_colunas] = sc_strip_script($this->inticket[$this->nm_grid_colunas]);
          if ($this->inticket[$this->nm_grid_colunas] === "") 
          { 
              $this->inticket[$this->nm_grid_colunas] = "" ;  
          } 
          $this->inticket[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->inticket[$this->nm_grid_colunas]);
          $this->licenseplate[$this->nm_grid_colunas] = sc_strip_script($this->licenseplate[$this->nm_grid_colunas]);
          if ($this->licenseplate[$this->nm_grid_colunas] === "") 
          { 
              $this->licenseplate[$this->nm_grid_colunas] = "" ;  
          } 
          $this->licenseplate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->licenseplate[$this->nm_grid_colunas]);
          $this->driverslicense[$this->nm_grid_colunas] = sc_strip_script($this->driverslicense[$this->nm_grid_colunas]);
          if ($this->driverslicense[$this->nm_grid_colunas] === "") 
          { 
              $this->driverslicense[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->driverslicense[$this->nm_grid_colunas], "", "", "0", "S", "2", "", "N:1", "-") ; 
          } 
          $this->driverslicense[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->driverslicense[$this->nm_grid_colunas]);
          $this->pilotname[$this->nm_grid_colunas] = sc_strip_script($this->pilotname[$this->nm_grid_colunas]);
          if ($this->pilotname[$this->nm_grid_colunas] === "") 
          { 
              $this->pilotname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pilotname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pilotname[$this->nm_grid_colunas]);
          $this->transportname[$this->nm_grid_colunas] = sc_strip_script($this->transportname[$this->nm_grid_colunas]);
          if ($this->transportname[$this->nm_grid_colunas] === "") 
          { 
              $this->transportname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->transportname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->transportname[$this->nm_grid_colunas]);
          $this->chasis[$this->nm_grid_colunas] = sc_strip_script($this->chasis[$this->nm_grid_colunas]);
          if ($this->chasis[$this->nm_grid_colunas] === "") 
          { 
              $this->chasis[$this->nm_grid_colunas] = "" ;  
          } 
          $this->chasis[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->chasis[$this->nm_grid_colunas]);
          $this->machine[$this->nm_grid_colunas] = sc_strip_script($this->machine[$this->nm_grid_colunas]);
          if ($this->machine[$this->nm_grid_colunas] === "") 
          { 
              $this->machine[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->machine[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->machine[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->machine[$this->nm_grid_colunas]);
          $this->bl[$this->nm_grid_colunas] = sc_strip_script($this->bl[$this->nm_grid_colunas]);
          if ($this->bl[$this->nm_grid_colunas] === "") 
          { 
              $this->bl[$this->nm_grid_colunas] = "" ;  
          } 
          $this->bl[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->bl[$this->nm_grid_colunas]);
          $this->out[$this->nm_grid_colunas] = sc_strip_script($this->out[$this->nm_grid_colunas]);
          if ($this->out[$this->nm_grid_colunas] === "") 
          { 
              $this->out[$this->nm_grid_colunas] = "" ;  
          } 
          $this->out[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->out[$this->nm_grid_colunas]);
          $this->in[$this->nm_grid_colunas] = sc_strip_script($this->in[$this->nm_grid_colunas]);
          if ($this->in[$this->nm_grid_colunas] === "") 
          { 
              $this->in[$this->nm_grid_colunas] = "" ;  
          } 
          $this->in[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->in[$this->nm_grid_colunas]);
            $cell_container = array('posx' => '4.7031512499993834', 'posy' => '4.5021160416661065', 'data' => $this->container[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_vessel = array('posx' => '4.7031512499993834', 'posy' => '6.00837249999924', 'data' => $this->vessel[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_shippingCompany = array('posx' => '4.706510416666077', 'posy' => '6.707538958332481', 'data' => $this->shippingcompany[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_voyage = array('posx' => '14.302317916664863', 'posy' => '6.008802083332567', 'data' => $this->voyage[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_date = array('posx' => '14.305859583331533', 'posy' => '8.256119999998951', 'data' => $this->date[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_commodity = array('posx' => '14.308776249998192', 'posy' => '7.5084791665715', 'data' => $this->commodity[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tareChassis = array('posx' => '14.302317916664863', 'posy' => '11.313424583331908', 'data' => $this->tarechassis[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tareContainer = array('posx' => '14.502317916664863', 'posy' => '12.08854166666515', 'data' => $this->tarecontainer[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_grossWeight = array('posx' => '14.302317916664863', 'posy' => '10.543645833332004', 'data' => $this->grossweight[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_VGM = array('posx' => '14.490911666664841', 'posy' => '13.494173333331632', 'data' => $this->vgm[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_packages = array('posx' => '4.701484583332743', 'posy' => '9.006373749998856', 'data' => $this->packages[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_country = array('posx' => '4.707942916666073', 'posy' => '7.5062499999905', 'data' => $this->country[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_typeOperation = array('posx' => '14.308776249998192', 'posy' => '4.50916666666612', 'data' => $this->typeoperation[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_netWeight = array('posx' => '14.486360833331506', 'posy' => '12.801705833331722', 'data' => $this->netweight[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_QR = array('posx' => '16.95815124999786', 'posy' => '2.30187499999971', 'data' => $this->qr[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_exitTicket = array('posx' => '4.706692916666053', 'posy' => '5.25937499999935', 'data' => $this->exitticket[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_inTicket = array('posx' => '14.302317916664863', 'posy' => '5.20687499999931', 'data' => $this->inticket[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_licensePlate = array('posx' => '4.708567916666083', 'posy' => '9.758528749998762', 'data' => $this->licenseplate[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_driversLicense = array('posx' => '4.707942916666073', 'posy' => '11.315410208331906', 'data' => $this->driverslicense[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pilotName = array('posx' => '4.707942916666073', 'posy' => '10.543333333332', 'data' => $this->pilotname[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_transportName = array('posx' => '4.7044012499994035', 'posy' => '8.259192916665613', 'data' => $this->transportname[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_chasis = array('posx' => '14.305859583331533', 'posy' => '9.750241041665438', 'data' => $this->chasis[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_machine = array('posx' => '14.305859583331533', 'posy' => '9.001080833332191', 'data' => $this->machine[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_bl = array('posx' => '14.305859583331533', 'posy' => '6.702552291665827', 'data' => $this->bl[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_out = array('posx' => '5.121276249999353', 'posy' => '12.8285041666503', 'data' => $this->out[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_In = array('posx' => '5.1250262499994135', 'posy' => '12.0820833333179', 'data' => $this->in[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_CODIGO = array('posx' => '17.01270833333119', 'posy' => '4.02166666666616', 'data' => $this->codigo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_container['font_type'], $cell_container['font_style'], $cell_container['font_size']);
            $this->pdf_text_color($cell_container['data'], $cell_container['color_r'], $cell_container['color_g'], $cell_container['color_b']);
            if (!empty($cell_container['posx']) && !empty($cell_container['posy']))
            {
                $this->Pdf->SetXY($cell_container['posx'], $cell_container['posy']);
            }
            elseif (!empty($cell_container['posx']))
            {
                $this->Pdf->SetX($cell_container['posx']);
            }
            elseif (!empty($cell_container['posy']))
            {
                $this->Pdf->SetY($cell_container['posy']);
            }
            $this->Pdf->Cell($cell_container['width'], 0, $cell_container['data'], 0, 0, $cell_container['align']);

            $this->Pdf->SetFont($cell_vessel['font_type'], $cell_vessel['font_style'], $cell_vessel['font_size']);
            $this->pdf_text_color($cell_vessel['data'], $cell_vessel['color_r'], $cell_vessel['color_g'], $cell_vessel['color_b']);
            if (!empty($cell_vessel['posx']) && !empty($cell_vessel['posy']))
            {
                $this->Pdf->SetXY($cell_vessel['posx'], $cell_vessel['posy']);
            }
            elseif (!empty($cell_vessel['posx']))
            {
                $this->Pdf->SetX($cell_vessel['posx']);
            }
            elseif (!empty($cell_vessel['posy']))
            {
                $this->Pdf->SetY($cell_vessel['posy']);
            }
            $this->Pdf->Cell($cell_vessel['width'], 0, $cell_vessel['data'], 0, 0, $cell_vessel['align']);

            $this->Pdf->SetFont($cell_shippingCompany['font_type'], $cell_shippingCompany['font_style'], $cell_shippingCompany['font_size']);
            $this->pdf_text_color($cell_shippingCompany['data'], $cell_shippingCompany['color_r'], $cell_shippingCompany['color_g'], $cell_shippingCompany['color_b']);
            if (!empty($cell_shippingCompany['posx']) && !empty($cell_shippingCompany['posy']))
            {
                $this->Pdf->SetXY($cell_shippingCompany['posx'], $cell_shippingCompany['posy']);
            }
            elseif (!empty($cell_shippingCompany['posx']))
            {
                $this->Pdf->SetX($cell_shippingCompany['posx']);
            }
            elseif (!empty($cell_shippingCompany['posy']))
            {
                $this->Pdf->SetY($cell_shippingCompany['posy']);
            }
            $this->Pdf->Cell($cell_shippingCompany['width'], 0, $cell_shippingCompany['data'], 0, 0, $cell_shippingCompany['align']);

            $this->Pdf->SetFont($cell_voyage['font_type'], $cell_voyage['font_style'], $cell_voyage['font_size']);
            $this->pdf_text_color($cell_voyage['data'], $cell_voyage['color_r'], $cell_voyage['color_g'], $cell_voyage['color_b']);
            if (!empty($cell_voyage['posx']) && !empty($cell_voyage['posy']))
            {
                $this->Pdf->SetXY($cell_voyage['posx'], $cell_voyage['posy']);
            }
            elseif (!empty($cell_voyage['posx']))
            {
                $this->Pdf->SetX($cell_voyage['posx']);
            }
            elseif (!empty($cell_voyage['posy']))
            {
                $this->Pdf->SetY($cell_voyage['posy']);
            }
            $this->Pdf->Cell($cell_voyage['width'], 0, $cell_voyage['data'], 0, 0, $cell_voyage['align']);

            $this->Pdf->SetFont($cell_date['font_type'], $cell_date['font_style'], $cell_date['font_size']);
            $this->pdf_text_color($cell_date['data'], $cell_date['color_r'], $cell_date['color_g'], $cell_date['color_b']);
            if (!empty($cell_date['posx']) && !empty($cell_date['posy']))
            {
                $this->Pdf->SetXY($cell_date['posx'], $cell_date['posy']);
            }
            elseif (!empty($cell_date['posx']))
            {
                $this->Pdf->SetX($cell_date['posx']);
            }
            elseif (!empty($cell_date['posy']))
            {
                $this->Pdf->SetY($cell_date['posy']);
            }
            $this->Pdf->Cell($cell_date['width'], 0, $cell_date['data'], 0, 0, $cell_date['align']);

            $this->Pdf->SetFont($cell_commodity['font_type'], $cell_commodity['font_style'], $cell_commodity['font_size']);
            $this->pdf_text_color($cell_commodity['data'], $cell_commodity['color_r'], $cell_commodity['color_g'], $cell_commodity['color_b']);
            if (!empty($cell_commodity['posx']) && !empty($cell_commodity['posy']))
            {
                $this->Pdf->SetXY($cell_commodity['posx'], $cell_commodity['posy']);
            }
            elseif (!empty($cell_commodity['posx']))
            {
                $this->Pdf->SetX($cell_commodity['posx']);
            }
            elseif (!empty($cell_commodity['posy']))
            {
                $this->Pdf->SetY($cell_commodity['posy']);
            }
            $this->Pdf->Cell($cell_commodity['width'], 0, $cell_commodity['data'], 0, 0, $cell_commodity['align']);

            $this->Pdf->SetFont($cell_tareChassis['font_type'], $cell_tareChassis['font_style'], $cell_tareChassis['font_size']);
            $this->pdf_text_color($cell_tareChassis['data'], $cell_tareChassis['color_r'], $cell_tareChassis['color_g'], $cell_tareChassis['color_b']);
            if (!empty($cell_tareChassis['posx']) && !empty($cell_tareChassis['posy']))
            {
                $this->Pdf->SetXY($cell_tareChassis['posx'], $cell_tareChassis['posy']);
            }
            elseif (!empty($cell_tareChassis['posx']))
            {
                $this->Pdf->SetX($cell_tareChassis['posx']);
            }
            elseif (!empty($cell_tareChassis['posy']))
            {
                $this->Pdf->SetY($cell_tareChassis['posy']);
            }
            $this->Pdf->Cell($cell_tareChassis['width'], 0, $cell_tareChassis['data'], 0, 0, $cell_tareChassis['align']);

            $this->Pdf->SetFont($cell_tareContainer['font_type'], $cell_tareContainer['font_style'], $cell_tareContainer['font_size']);
            $this->pdf_text_color($cell_tareContainer['data'], $cell_tareContainer['color_r'], $cell_tareContainer['color_g'], $cell_tareContainer['color_b']);
            if (!empty($cell_tareContainer['posx']) && !empty($cell_tareContainer['posy']))
            {
                $this->Pdf->SetXY($cell_tareContainer['posx'], $cell_tareContainer['posy']);
            }
            elseif (!empty($cell_tareContainer['posx']))
            {
                $this->Pdf->SetX($cell_tareContainer['posx']);
            }
            elseif (!empty($cell_tareContainer['posy']))
            {
                $this->Pdf->SetY($cell_tareContainer['posy']);
            }
            $this->Pdf->Cell($cell_tareContainer['width'], 0, $cell_tareContainer['data'], 0, 0, $cell_tareContainer['align']);

            $this->Pdf->SetFont($cell_grossWeight['font_type'], $cell_grossWeight['font_style'], $cell_grossWeight['font_size']);
            $this->pdf_text_color($cell_grossWeight['data'], $cell_grossWeight['color_r'], $cell_grossWeight['color_g'], $cell_grossWeight['color_b']);
            if (!empty($cell_grossWeight['posx']) && !empty($cell_grossWeight['posy']))
            {
                $this->Pdf->SetXY($cell_grossWeight['posx'], $cell_grossWeight['posy']);
            }
            elseif (!empty($cell_grossWeight['posx']))
            {
                $this->Pdf->SetX($cell_grossWeight['posx']);
            }
            elseif (!empty($cell_grossWeight['posy']))
            {
                $this->Pdf->SetY($cell_grossWeight['posy']);
            }
            $this->Pdf->Cell($cell_grossWeight['width'], 0, $cell_grossWeight['data'], 0, 0, $cell_grossWeight['align']);

            $this->Pdf->SetFont($cell_VGM['font_type'], $cell_VGM['font_style'], $cell_VGM['font_size']);
            $this->pdf_text_color($cell_VGM['data'], $cell_VGM['color_r'], $cell_VGM['color_g'], $cell_VGM['color_b']);
            if (!empty($cell_VGM['posx']) && !empty($cell_VGM['posy']))
            {
                $this->Pdf->SetXY($cell_VGM['posx'], $cell_VGM['posy']);
            }
            elseif (!empty($cell_VGM['posx']))
            {
                $this->Pdf->SetX($cell_VGM['posx']);
            }
            elseif (!empty($cell_VGM['posy']))
            {
                $this->Pdf->SetY($cell_VGM['posy']);
            }
            $this->Pdf->Cell($cell_VGM['width'], 0, $cell_VGM['data'], 0, 0, $cell_VGM['align']);

            $this->Pdf->SetFont($cell_packages['font_type'], $cell_packages['font_style'], $cell_packages['font_size']);
            $this->pdf_text_color($cell_packages['data'], $cell_packages['color_r'], $cell_packages['color_g'], $cell_packages['color_b']);
            if (!empty($cell_packages['posx']) && !empty($cell_packages['posy']))
            {
                $this->Pdf->SetXY($cell_packages['posx'], $cell_packages['posy']);
            }
            elseif (!empty($cell_packages['posx']))
            {
                $this->Pdf->SetX($cell_packages['posx']);
            }
            elseif (!empty($cell_packages['posy']))
            {
                $this->Pdf->SetY($cell_packages['posy']);
            }
            $this->Pdf->Cell($cell_packages['width'], 0, $cell_packages['data'], 0, 0, $cell_packages['align']);

            $this->Pdf->SetFont($cell_country['font_type'], $cell_country['font_style'], $cell_country['font_size']);
            $this->pdf_text_color($cell_country['data'], $cell_country['color_r'], $cell_country['color_g'], $cell_country['color_b']);
            if (!empty($cell_country['posx']) && !empty($cell_country['posy']))
            {
                $this->Pdf->SetXY($cell_country['posx'], $cell_country['posy']);
            }
            elseif (!empty($cell_country['posx']))
            {
                $this->Pdf->SetX($cell_country['posx']);
            }
            elseif (!empty($cell_country['posy']))
            {
                $this->Pdf->SetY($cell_country['posy']);
            }
            $this->Pdf->Cell($cell_country['width'], 0, $cell_country['data'], 0, 0, $cell_country['align']);

            $this->Pdf->SetFont($cell_typeOperation['font_type'], $cell_typeOperation['font_style'], $cell_typeOperation['font_size']);
            $this->pdf_text_color($cell_typeOperation['data'], $cell_typeOperation['color_r'], $cell_typeOperation['color_g'], $cell_typeOperation['color_b']);
            if (!empty($cell_typeOperation['posx']) && !empty($cell_typeOperation['posy']))
            {
                $this->Pdf->SetXY($cell_typeOperation['posx'], $cell_typeOperation['posy']);
            }
            elseif (!empty($cell_typeOperation['posx']))
            {
                $this->Pdf->SetX($cell_typeOperation['posx']);
            }
            elseif (!empty($cell_typeOperation['posy']))
            {
                $this->Pdf->SetY($cell_typeOperation['posy']);
            }
            $this->Pdf->Cell($cell_typeOperation['width'], 0, $cell_typeOperation['data'], 0, 0, $cell_typeOperation['align']);

            $this->Pdf->SetFont($cell_netWeight['font_type'], $cell_netWeight['font_style'], $cell_netWeight['font_size']);
            $this->pdf_text_color($cell_netWeight['data'], $cell_netWeight['color_r'], $cell_netWeight['color_g'], $cell_netWeight['color_b']);
            if (!empty($cell_netWeight['posx']) && !empty($cell_netWeight['posy']))
            {
                $this->Pdf->SetXY($cell_netWeight['posx'], $cell_netWeight['posy']);
            }
            elseif (!empty($cell_netWeight['posx']))
            {
                $this->Pdf->SetX($cell_netWeight['posx']);
            }
            elseif (!empty($cell_netWeight['posy']))
            {
                $this->Pdf->SetY($cell_netWeight['posy']);
            }
            $this->Pdf->Cell($cell_netWeight['width'], 0, $cell_netWeight['data'], 0, 0, $cell_netWeight['align']);

            if (isset($cell_QR['data']) && !empty($cell_QR['data']) && is_file($cell_QR['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_QR['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_QR['data'], $cell_QR['posx'], $cell_QR['posy'], 0, 0);
                }
            }

            $this->Pdf->SetFont($cell_exitTicket['font_type'], $cell_exitTicket['font_style'], $cell_exitTicket['font_size']);
            $this->pdf_text_color($cell_exitTicket['data'], $cell_exitTicket['color_r'], $cell_exitTicket['color_g'], $cell_exitTicket['color_b']);
            if (!empty($cell_exitTicket['posx']) && !empty($cell_exitTicket['posy']))
            {
                $this->Pdf->SetXY($cell_exitTicket['posx'], $cell_exitTicket['posy']);
            }
            elseif (!empty($cell_exitTicket['posx']))
            {
                $this->Pdf->SetX($cell_exitTicket['posx']);
            }
            elseif (!empty($cell_exitTicket['posy']))
            {
                $this->Pdf->SetY($cell_exitTicket['posy']);
            }
            $this->Pdf->Cell($cell_exitTicket['width'], 0, $cell_exitTicket['data'], 0, 0, $cell_exitTicket['align']);

            $this->Pdf->SetFont($cell_inTicket['font_type'], $cell_inTicket['font_style'], $cell_inTicket['font_size']);
            $this->pdf_text_color($cell_inTicket['data'], $cell_inTicket['color_r'], $cell_inTicket['color_g'], $cell_inTicket['color_b']);
            if (!empty($cell_inTicket['posx']) && !empty($cell_inTicket['posy']))
            {
                $this->Pdf->SetXY($cell_inTicket['posx'], $cell_inTicket['posy']);
            }
            elseif (!empty($cell_inTicket['posx']))
            {
                $this->Pdf->SetX($cell_inTicket['posx']);
            }
            elseif (!empty($cell_inTicket['posy']))
            {
                $this->Pdf->SetY($cell_inTicket['posy']);
            }
            $this->Pdf->Cell($cell_inTicket['width'], 0, $cell_inTicket['data'], 0, 0, $cell_inTicket['align']);

            $this->Pdf->SetFont($cell_licensePlate['font_type'], $cell_licensePlate['font_style'], $cell_licensePlate['font_size']);
            $this->pdf_text_color($cell_licensePlate['data'], $cell_licensePlate['color_r'], $cell_licensePlate['color_g'], $cell_licensePlate['color_b']);
            if (!empty($cell_licensePlate['posx']) && !empty($cell_licensePlate['posy']))
            {
                $this->Pdf->SetXY($cell_licensePlate['posx'], $cell_licensePlate['posy']);
            }
            elseif (!empty($cell_licensePlate['posx']))
            {
                $this->Pdf->SetX($cell_licensePlate['posx']);
            }
            elseif (!empty($cell_licensePlate['posy']))
            {
                $this->Pdf->SetY($cell_licensePlate['posy']);
            }
            $this->Pdf->Cell($cell_licensePlate['width'], 0, $cell_licensePlate['data'], 0, 0, $cell_licensePlate['align']);

            $this->Pdf->SetFont($cell_driversLicense['font_type'], $cell_driversLicense['font_style'], $cell_driversLicense['font_size']);
            $this->pdf_text_color($cell_driversLicense['data'], $cell_driversLicense['color_r'], $cell_driversLicense['color_g'], $cell_driversLicense['color_b']);
            if (!empty($cell_driversLicense['posx']) && !empty($cell_driversLicense['posy']))
            {
                $this->Pdf->SetXY($cell_driversLicense['posx'], $cell_driversLicense['posy']);
            }
            elseif (!empty($cell_driversLicense['posx']))
            {
                $this->Pdf->SetX($cell_driversLicense['posx']);
            }
            elseif (!empty($cell_driversLicense['posy']))
            {
                $this->Pdf->SetY($cell_driversLicense['posy']);
            }
            $this->Pdf->Cell($cell_driversLicense['width'], 0, $cell_driversLicense['data'], 0, 0, $cell_driversLicense['align']);

            $this->Pdf->SetFont($cell_pilotName['font_type'], $cell_pilotName['font_style'], $cell_pilotName['font_size']);
            $this->pdf_text_color($cell_pilotName['data'], $cell_pilotName['color_r'], $cell_pilotName['color_g'], $cell_pilotName['color_b']);
            if (!empty($cell_pilotName['posx']) && !empty($cell_pilotName['posy']))
            {
                $this->Pdf->SetXY($cell_pilotName['posx'], $cell_pilotName['posy']);
            }
            elseif (!empty($cell_pilotName['posx']))
            {
                $this->Pdf->SetX($cell_pilotName['posx']);
            }
            elseif (!empty($cell_pilotName['posy']))
            {
                $this->Pdf->SetY($cell_pilotName['posy']);
            }
            $this->Pdf->Cell($cell_pilotName['width'], 0, $cell_pilotName['data'], 0, 0, $cell_pilotName['align']);

            $this->Pdf->SetFont($cell_transportName['font_type'], $cell_transportName['font_style'], $cell_transportName['font_size']);
            $this->pdf_text_color($cell_transportName['data'], $cell_transportName['color_r'], $cell_transportName['color_g'], $cell_transportName['color_b']);
            if (!empty($cell_transportName['posx']) && !empty($cell_transportName['posy']))
            {
                $this->Pdf->SetXY($cell_transportName['posx'], $cell_transportName['posy']);
            }
            elseif (!empty($cell_transportName['posx']))
            {
                $this->Pdf->SetX($cell_transportName['posx']);
            }
            elseif (!empty($cell_transportName['posy']))
            {
                $this->Pdf->SetY($cell_transportName['posy']);
            }
            $this->Pdf->Cell($cell_transportName['width'], 0, $cell_transportName['data'], 0, 0, $cell_transportName['align']);

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

            $this->Pdf->SetFont($cell_machine['font_type'], $cell_machine['font_style'], $cell_machine['font_size']);
            $this->pdf_text_color($cell_machine['data'], $cell_machine['color_r'], $cell_machine['color_g'], $cell_machine['color_b']);
            if (!empty($cell_machine['posx']) && !empty($cell_machine['posy']))
            {
                $this->Pdf->SetXY($cell_machine['posx'], $cell_machine['posy']);
            }
            elseif (!empty($cell_machine['posx']))
            {
                $this->Pdf->SetX($cell_machine['posx']);
            }
            elseif (!empty($cell_machine['posy']))
            {
                $this->Pdf->SetY($cell_machine['posy']);
            }
            $this->Pdf->Cell($cell_machine['width'], 0, $cell_machine['data'], 0, 0, $cell_machine['align']);

            $this->Pdf->SetFont($cell_bl['font_type'], $cell_bl['font_style'], $cell_bl['font_size']);
            $this->pdf_text_color($cell_bl['data'], $cell_bl['color_r'], $cell_bl['color_g'], $cell_bl['color_b']);
            if (!empty($cell_bl['posx']) && !empty($cell_bl['posy']))
            {
                $this->Pdf->SetXY($cell_bl['posx'], $cell_bl['posy']);
            }
            elseif (!empty($cell_bl['posx']))
            {
                $this->Pdf->SetX($cell_bl['posx']);
            }
            elseif (!empty($cell_bl['posy']))
            {
                $this->Pdf->SetY($cell_bl['posy']);
            }
            $this->Pdf->Cell($cell_bl['width'], 0, $cell_bl['data'], 0, 0, $cell_bl['align']);

            $this->Pdf->SetFont($cell_out['font_type'], $cell_out['font_style'], $cell_out['font_size']);
            $this->pdf_text_color($cell_out['data'], $cell_out['color_r'], $cell_out['color_g'], $cell_out['color_b']);
            if (!empty($cell_out['posx']) && !empty($cell_out['posy']))
            {
                $this->Pdf->SetXY($cell_out['posx'], $cell_out['posy']);
            }
            elseif (!empty($cell_out['posx']))
            {
                $this->Pdf->SetX($cell_out['posx']);
            }
            elseif (!empty($cell_out['posy']))
            {
                $this->Pdf->SetY($cell_out['posy']);
            }
            $this->Pdf->Cell($cell_out['width'], 0, $cell_out['data'], 0, 0, $cell_out['align']);

            $this->Pdf->SetFont($cell_In['font_type'], $cell_In['font_style'], $cell_In['font_size']);
            $this->pdf_text_color($cell_In['data'], $cell_In['color_r'], $cell_In['color_g'], $cell_In['color_b']);
            if (!empty($cell_In['posx']) && !empty($cell_In['posy']))
            {
                $this->Pdf->SetXY($cell_In['posx'], $cell_In['posy']);
            }
            elseif (!empty($cell_In['posx']))
            {
                $this->Pdf->SetX($cell_In['posx']);
            }
            elseif (!empty($cell_In['posy']))
            {
                $this->Pdf->SetY($cell_In['posy']);
            }
            $this->Pdf->Cell($cell_In['width'], 0, $cell_In['data'], 0, 0, $cell_In['align']);

            $this->Pdf->SetFont($cell_CODIGO['font_type'], $cell_CODIGO['font_style'], $cell_CODIGO['font_size']);
            $this->pdf_text_color($cell_CODIGO['data'], $cell_CODIGO['color_r'], $cell_CODIGO['color_g'], $cell_CODIGO['color_b']);
            if (!empty($cell_CODIGO['posx']) && !empty($cell_CODIGO['posy']))
            {
                $this->Pdf->SetXY($cell_CODIGO['posx'], $cell_CODIGO['posy']);
            }
            elseif (!empty($cell_CODIGO['posx']))
            {
                $this->Pdf->SetX($cell_CODIGO['posx']);
            }
            elseif (!empty($cell_CODIGO['posy']))
            {
                $this->Pdf->SetY($cell_CODIGO['posy']);
            }
            $this->Pdf->Cell($cell_CODIGO['width'], 0, $cell_CODIGO['data'], 0, 0, $cell_CODIGO['align']);

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
