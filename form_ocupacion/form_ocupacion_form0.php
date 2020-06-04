<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - ocupacion"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - ocupacion"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php
header("X-XSS-Protection: 1; mode=block");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_fecha button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_ocupacion/form_ocupacion_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_ocupacion_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_ocupacion_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     scQuickSearchInit(false, '');
     if (document.getElementById('SC_fast_search_t')) {
         scQuickSearchKeyUp('t', null);
     }
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if (document.getElementById('SC_fast_search_t')) {
           if ('' == sPos || 't' == sPos) {
               scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
           }
       }
     }
   }
   var fixedQuickSearchSize = {};
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     if ("boolean" == typeof fixedQuickSearchSize[sIdInput] && fixedQuickSearchSize[sIdInput]) {
       return;
     }
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     if (0 != oInput.height()) {
       oInput.css({
         'height': Math.max(oInput.height(), 16) + 'px',
       });
     }
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     fixedQuickSearchSize[sIdInput] = true;
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_ocupacion_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_ocupacion'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_ocupacion'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - ocupacion"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - ocupacion"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idocupacion']))
           {
               $this->nmgp_cmp_readonly['idocupacion'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idocupacion']))
    {
        $this->nm_new_label['idocupacion'] = "Idocupacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idocupacion = $this->idocupacion;
   $sStyleHidden_idocupacion = '';
   if (isset($this->nmgp_cmp_hidden['idocupacion']) && $this->nmgp_cmp_hidden['idocupacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idocupacion']);
       $sStyleHidden_idocupacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idocupacion = 'display: none;';
   $sStyleReadInp_idocupacion = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idocupacion"]) &&  $this->nmgp_cmp_readonly["idocupacion"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idocupacion']);
       $sStyleReadLab_idocupacion = '';
       $sStyleReadInp_idocupacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idocupacion']) && $this->nmgp_cmp_hidden['idocupacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idocupacion" value="<?php echo $this->form_encode_input($idocupacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idocupacion_label" id="hidden_field_label_idocupacion" style="<?php echo $sStyleHidden_idocupacion; ?>"><span id="id_label_idocupacion"><?php echo $this->nm_new_label['idocupacion']; ?></span></TD>
    <TD class="scFormDataOdd css_idocupacion_line" id="hidden_field_data_idocupacion" style="<?php echo $sStyleHidden_idocupacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idocupacion_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idocupacion" class="css_idocupacion_line" style="<?php echo $sStyleReadLab_idocupacion; ?>"><?php echo $this->form_encode_input($this->idocupacion); ?></span><span id="id_read_off_idocupacion" class="css_read_off_idocupacion" style="<?php echo $sStyleReadInp_idocupacion; ?>"><input type="hidden" name="idocupacion" value="<?php echo $this->form_encode_input($idocupacion) . "\">"?><span id="id_ajax_label_idocupacion"><?php echo nl2br($idocupacion); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idocupacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idocupacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha']))
    {
        $this->nm_new_label['fecha'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha = $this->fecha;
   $sStyleHidden_fecha = '';
   if (isset($this->nmgp_cmp_hidden['fecha']) && $this->nmgp_cmp_hidden['fecha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha']);
       $sStyleHidden_fecha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha = 'display: none;';
   $sStyleReadInp_fecha = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha']) && $this->nmgp_cmp_readonly['fecha'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha']);
       $sStyleReadLab_fecha = '';
       $sStyleReadInp_fecha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha']) && $this->nmgp_cmp_hidden['fecha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha" value="<?php echo $this->form_encode_input($fecha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecha_label" id="hidden_field_label_fecha" style="<?php echo $sStyleHidden_fecha; ?>"><span id="id_label_fecha"><?php echo $this->nm_new_label['fecha']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['php_cmp_required']['fecha']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['php_cmp_required']['fecha'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fecha_line" id="hidden_field_data_fecha" style="<?php echo $sStyleHidden_fecha; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha"]) &&  $this->nmgp_cmp_readonly["fecha"] == "on") { 

 ?>
<input type="hidden" name="fecha" value="<?php echo $this->form_encode_input($fecha) . "\">" . $fecha . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha" class="sc-ui-readonly-fecha css_fecha_line" style="<?php echo $sStyleReadLab_fecha; ?>"><?php echo $fecha; ?></span><span id="id_read_off_fecha" class="css_read_off_fecha" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_fecha_obj" style="" id="id_sc_field_fecha" type=text name="fecha" value="<?php echo $this->form_encode_input($fecha) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['fecha']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ocupaciondry']))
    {
        $this->nm_new_label['ocupaciondry'] = "Ocupacion Dry";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ocupaciondry = $this->ocupaciondry;
   $sStyleHidden_ocupaciondry = '';
   if (isset($this->nmgp_cmp_hidden['ocupaciondry']) && $this->nmgp_cmp_hidden['ocupaciondry'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ocupaciondry']);
       $sStyleHidden_ocupaciondry = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ocupaciondry = 'display: none;';
   $sStyleReadInp_ocupaciondry = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ocupaciondry']) && $this->nmgp_cmp_readonly['ocupaciondry'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ocupaciondry']);
       $sStyleReadLab_ocupaciondry = '';
       $sStyleReadInp_ocupaciondry = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ocupaciondry']) && $this->nmgp_cmp_hidden['ocupaciondry'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ocupaciondry" value="<?php echo $this->form_encode_input($ocupaciondry) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ocupaciondry_label" id="hidden_field_label_ocupaciondry" style="<?php echo $sStyleHidden_ocupaciondry; ?>"><span id="id_label_ocupaciondry"><?php echo $this->nm_new_label['ocupaciondry']; ?></span></TD>
    <TD class="scFormDataOdd css_ocupaciondry_line" id="hidden_field_data_ocupaciondry" style="<?php echo $sStyleHidden_ocupaciondry; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ocupaciondry_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ocupaciondry"]) &&  $this->nmgp_cmp_readonly["ocupaciondry"] == "on") { 

 ?>
<input type="hidden" name="ocupaciondry" value="<?php echo $this->form_encode_input($ocupaciondry) . "\">" . $ocupaciondry . ""; ?>
<?php } else { ?>
<span id="id_read_on_ocupaciondry" class="sc-ui-readonly-ocupaciondry css_ocupaciondry_line" style="<?php echo $sStyleReadLab_ocupaciondry; ?>"><?php echo $this->ocupaciondry; ?></span><span id="id_read_off_ocupaciondry" class="css_read_off_ocupaciondry" style="white-space: nowrap;<?php echo $sStyleReadInp_ocupaciondry; ?>">
 <input class="sc-js-input scFormObjectOdd css_ocupaciondry_obj" style="" id="id_sc_field_ocupaciondry" type=text name="ocupaciondry" value="<?php echo $this->form_encode_input($ocupaciondry) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ocupaciondry']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ocupaciondry']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ocupaciondry']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ocupaciondry_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ocupaciondry_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['ocupacionreefer']))
    {
        $this->nm_new_label['ocupacionreefer'] = "Ocupacion Reefer";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ocupacionreefer = $this->ocupacionreefer;
   $sStyleHidden_ocupacionreefer = '';
   if (isset($this->nmgp_cmp_hidden['ocupacionreefer']) && $this->nmgp_cmp_hidden['ocupacionreefer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ocupacionreefer']);
       $sStyleHidden_ocupacionreefer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ocupacionreefer = 'display: none;';
   $sStyleReadInp_ocupacionreefer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ocupacionreefer']) && $this->nmgp_cmp_readonly['ocupacionreefer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ocupacionreefer']);
       $sStyleReadLab_ocupacionreefer = '';
       $sStyleReadInp_ocupacionreefer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ocupacionreefer']) && $this->nmgp_cmp_hidden['ocupacionreefer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ocupacionreefer" value="<?php echo $this->form_encode_input($ocupacionreefer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ocupacionreefer_label" id="hidden_field_label_ocupacionreefer" style="<?php echo $sStyleHidden_ocupacionreefer; ?>"><span id="id_label_ocupacionreefer"><?php echo $this->nm_new_label['ocupacionreefer']; ?></span></TD>
    <TD class="scFormDataOdd css_ocupacionreefer_line" id="hidden_field_data_ocupacionreefer" style="<?php echo $sStyleHidden_ocupacionreefer; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ocupacionreefer_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ocupacionreefer"]) &&  $this->nmgp_cmp_readonly["ocupacionreefer"] == "on") { 

 ?>
<input type="hidden" name="ocupacionreefer" value="<?php echo $this->form_encode_input($ocupacionreefer) . "\">" . $ocupacionreefer . ""; ?>
<?php } else { ?>
<span id="id_read_on_ocupacionreefer" class="sc-ui-readonly-ocupacionreefer css_ocupacionreefer_line" style="<?php echo $sStyleReadLab_ocupacionreefer; ?>"><?php echo $this->ocupacionreefer; ?></span><span id="id_read_off_ocupacionreefer" class="css_read_off_ocupacionreefer" style="white-space: nowrap;<?php echo $sStyleReadInp_ocupacionreefer; ?>">
 <input class="sc-js-input scFormObjectOdd css_ocupacionreefer_obj" style="" id="id_sc_field_ocupacionreefer" type=text name="ocupacionreefer" value="<?php echo $this->form_encode_input($ocupacionreefer) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ocupacionreefer']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ocupacionreefer']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ocupacionreefer']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ocupacionreefer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ocupacionreefer_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['ocupacionteu']))
    {
        $this->nm_new_label['ocupacionteu'] = "Ocupacion Teu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ocupacionteu = $this->ocupacionteu;
   $sStyleHidden_ocupacionteu = '';
   if (isset($this->nmgp_cmp_hidden['ocupacionteu']) && $this->nmgp_cmp_hidden['ocupacionteu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ocupacionteu']);
       $sStyleHidden_ocupacionteu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ocupacionteu = 'display: none;';
   $sStyleReadInp_ocupacionteu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ocupacionteu']) && $this->nmgp_cmp_readonly['ocupacionteu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ocupacionteu']);
       $sStyleReadLab_ocupacionteu = '';
       $sStyleReadInp_ocupacionteu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ocupacionteu']) && $this->nmgp_cmp_hidden['ocupacionteu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ocupacionteu" value="<?php echo $this->form_encode_input($ocupacionteu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ocupacionteu_label" id="hidden_field_label_ocupacionteu" style="<?php echo $sStyleHidden_ocupacionteu; ?>"><span id="id_label_ocupacionteu"><?php echo $this->nm_new_label['ocupacionteu']; ?></span></TD>
    <TD class="scFormDataOdd css_ocupacionteu_line" id="hidden_field_data_ocupacionteu" style="<?php echo $sStyleHidden_ocupacionteu; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ocupacionteu_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ocupacionteu"]) &&  $this->nmgp_cmp_readonly["ocupacionteu"] == "on") { 

 ?>
<input type="hidden" name="ocupacionteu" value="<?php echo $this->form_encode_input($ocupacionteu) . "\">" . $ocupacionteu . ""; ?>
<?php } else { ?>
<span id="id_read_on_ocupacionteu" class="sc-ui-readonly-ocupacionteu css_ocupacionteu_line" style="<?php echo $sStyleReadLab_ocupacionteu; ?>"><?php echo $this->ocupacionteu; ?></span><span id="id_read_off_ocupacionteu" class="css_read_off_ocupacionteu" style="white-space: nowrap;<?php echo $sStyleReadInp_ocupacionteu; ?>">
 <input class="sc-js-input scFormObjectOdd css_ocupacionteu_obj" style="" id="id_sc_field_ocupacionteu" type=text name="ocupacionteu" value="<?php echo $this->form_encode_input($ocupacionteu) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ocupacionteu']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ocupacionteu']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ocupacionteu']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ocupacionteu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ocupacionteu_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['totalocupacion']))
    {
        $this->nm_new_label['totalocupacion'] = "Total Ocupacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totalocupacion = $this->totalocupacion;
   $sStyleHidden_totalocupacion = '';
   if (isset($this->nmgp_cmp_hidden['totalocupacion']) && $this->nmgp_cmp_hidden['totalocupacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totalocupacion']);
       $sStyleHidden_totalocupacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totalocupacion = 'display: none;';
   $sStyleReadInp_totalocupacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['totalocupacion']) && $this->nmgp_cmp_readonly['totalocupacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totalocupacion']);
       $sStyleReadLab_totalocupacion = '';
       $sStyleReadInp_totalocupacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totalocupacion']) && $this->nmgp_cmp_hidden['totalocupacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totalocupacion" value="<?php echo $this->form_encode_input($totalocupacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_totalocupacion_label" id="hidden_field_label_totalocupacion" style="<?php echo $sStyleHidden_totalocupacion; ?>"><span id="id_label_totalocupacion"><?php echo $this->nm_new_label['totalocupacion']; ?></span></TD>
    <TD class="scFormDataOdd css_totalocupacion_line" id="hidden_field_data_totalocupacion" style="<?php echo $sStyleHidden_totalocupacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totalocupacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["totalocupacion"]) &&  $this->nmgp_cmp_readonly["totalocupacion"] == "on") { 

 ?>
<input type="hidden" name="totalocupacion" value="<?php echo $this->form_encode_input($totalocupacion) . "\">" . $totalocupacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_totalocupacion" class="sc-ui-readonly-totalocupacion css_totalocupacion_line" style="<?php echo $sStyleReadLab_totalocupacion; ?>"><?php echo $this->totalocupacion; ?></span><span id="id_read_off_totalocupacion" class="css_read_off_totalocupacion" style="white-space: nowrap;<?php echo $sStyleReadInp_totalocupacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_totalocupacion_obj" style="" id="id_sc_field_totalocupacion" type=text name="totalocupacion" value="<?php echo $this->form_encode_input($totalocupacion) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totalocupacion']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totalocupacion']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totalocupacion']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totalocupacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totalocupacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importdry']))
    {
        $this->nm_new_label['importdry'] = "Import Dry";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importdry = $this->importdry;
   $sStyleHidden_importdry = '';
   if (isset($this->nmgp_cmp_hidden['importdry']) && $this->nmgp_cmp_hidden['importdry'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importdry']);
       $sStyleHidden_importdry = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importdry = 'display: none;';
   $sStyleReadInp_importdry = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importdry']) && $this->nmgp_cmp_readonly['importdry'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importdry']);
       $sStyleReadLab_importdry = '';
       $sStyleReadInp_importdry = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importdry']) && $this->nmgp_cmp_hidden['importdry'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importdry" value="<?php echo $this->form_encode_input($importdry) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_importdry_label" id="hidden_field_label_importdry" style="<?php echo $sStyleHidden_importdry; ?>"><span id="id_label_importdry"><?php echo $this->nm_new_label['importdry']; ?></span></TD>
    <TD class="scFormDataOdd css_importdry_line" id="hidden_field_data_importdry" style="<?php echo $sStyleHidden_importdry; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_importdry_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importdry"]) &&  $this->nmgp_cmp_readonly["importdry"] == "on") { 

 ?>
<input type="hidden" name="importdry" value="<?php echo $this->form_encode_input($importdry) . "\">" . $importdry . ""; ?>
<?php } else { ?>
<span id="id_read_on_importdry" class="sc-ui-readonly-importdry css_importdry_line" style="<?php echo $sStyleReadLab_importdry; ?>"><?php echo $this->importdry; ?></span><span id="id_read_off_importdry" class="css_read_off_importdry" style="white-space: nowrap;<?php echo $sStyleReadInp_importdry; ?>">
 <input class="sc-js-input scFormObjectOdd css_importdry_obj" style="" id="id_sc_field_importdry" type=text name="importdry" value="<?php echo $this->form_encode_input($importdry) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importdry']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importdry']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importdry']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importdry_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importdry_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['importreefer']))
    {
        $this->nm_new_label['importreefer'] = "Import Reefer";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importreefer = $this->importreefer;
   $sStyleHidden_importreefer = '';
   if (isset($this->nmgp_cmp_hidden['importreefer']) && $this->nmgp_cmp_hidden['importreefer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importreefer']);
       $sStyleHidden_importreefer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importreefer = 'display: none;';
   $sStyleReadInp_importreefer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importreefer']) && $this->nmgp_cmp_readonly['importreefer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importreefer']);
       $sStyleReadLab_importreefer = '';
       $sStyleReadInp_importreefer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importreefer']) && $this->nmgp_cmp_hidden['importreefer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importreefer" value="<?php echo $this->form_encode_input($importreefer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_importreefer_label" id="hidden_field_label_importreefer" style="<?php echo $sStyleHidden_importreefer; ?>"><span id="id_label_importreefer"><?php echo $this->nm_new_label['importreefer']; ?></span></TD>
    <TD class="scFormDataOdd css_importreefer_line" id="hidden_field_data_importreefer" style="<?php echo $sStyleHidden_importreefer; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_importreefer_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importreefer"]) &&  $this->nmgp_cmp_readonly["importreefer"] == "on") { 

 ?>
<input type="hidden" name="importreefer" value="<?php echo $this->form_encode_input($importreefer) . "\">" . $importreefer . ""; ?>
<?php } else { ?>
<span id="id_read_on_importreefer" class="sc-ui-readonly-importreefer css_importreefer_line" style="<?php echo $sStyleReadLab_importreefer; ?>"><?php echo $this->importreefer; ?></span><span id="id_read_off_importreefer" class="css_read_off_importreefer" style="white-space: nowrap;<?php echo $sStyleReadInp_importreefer; ?>">
 <input class="sc-js-input scFormObjectOdd css_importreefer_obj" style="" id="id_sc_field_importreefer" type=text name="importreefer" value="<?php echo $this->form_encode_input($importreefer) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importreefer']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importreefer']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importreefer']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importreefer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importreefer_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['importteu']))
    {
        $this->nm_new_label['importteu'] = "Import Teu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importteu = $this->importteu;
   $sStyleHidden_importteu = '';
   if (isset($this->nmgp_cmp_hidden['importteu']) && $this->nmgp_cmp_hidden['importteu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importteu']);
       $sStyleHidden_importteu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importteu = 'display: none;';
   $sStyleReadInp_importteu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['importteu']) && $this->nmgp_cmp_readonly['importteu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importteu']);
       $sStyleReadLab_importteu = '';
       $sStyleReadInp_importteu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importteu']) && $this->nmgp_cmp_hidden['importteu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importteu" value="<?php echo $this->form_encode_input($importteu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_importteu_label" id="hidden_field_label_importteu" style="<?php echo $sStyleHidden_importteu; ?>"><span id="id_label_importteu"><?php echo $this->nm_new_label['importteu']; ?></span></TD>
    <TD class="scFormDataOdd css_importteu_line" id="hidden_field_data_importteu" style="<?php echo $sStyleHidden_importteu; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_importteu_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["importteu"]) &&  $this->nmgp_cmp_readonly["importteu"] == "on") { 

 ?>
<input type="hidden" name="importteu" value="<?php echo $this->form_encode_input($importteu) . "\">" . $importteu . ""; ?>
<?php } else { ?>
<span id="id_read_on_importteu" class="sc-ui-readonly-importteu css_importteu_line" style="<?php echo $sStyleReadLab_importteu; ?>"><?php echo $this->importteu; ?></span><span id="id_read_off_importteu" class="css_read_off_importteu" style="white-space: nowrap;<?php echo $sStyleReadInp_importteu; ?>">
 <input class="sc-js-input scFormObjectOdd css_importteu_obj" style="" id="id_sc_field_importteu" type=text name="importteu" value="<?php echo $this->form_encode_input($importteu) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importteu']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importteu']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importteu']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importteu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importteu_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['totalimport']))
    {
        $this->nm_new_label['totalimport'] = "Total Import";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totalimport = $this->totalimport;
   $sStyleHidden_totalimport = '';
   if (isset($this->nmgp_cmp_hidden['totalimport']) && $this->nmgp_cmp_hidden['totalimport'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totalimport']);
       $sStyleHidden_totalimport = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totalimport = 'display: none;';
   $sStyleReadInp_totalimport = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['totalimport']) && $this->nmgp_cmp_readonly['totalimport'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totalimport']);
       $sStyleReadLab_totalimport = '';
       $sStyleReadInp_totalimport = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totalimport']) && $this->nmgp_cmp_hidden['totalimport'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totalimport" value="<?php echo $this->form_encode_input($totalimport) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_totalimport_label" id="hidden_field_label_totalimport" style="<?php echo $sStyleHidden_totalimport; ?>"><span id="id_label_totalimport"><?php echo $this->nm_new_label['totalimport']; ?></span></TD>
    <TD class="scFormDataOdd css_totalimport_line" id="hidden_field_data_totalimport" style="<?php echo $sStyleHidden_totalimport; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totalimport_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["totalimport"]) &&  $this->nmgp_cmp_readonly["totalimport"] == "on") { 

 ?>
<input type="hidden" name="totalimport" value="<?php echo $this->form_encode_input($totalimport) . "\">" . $totalimport . ""; ?>
<?php } else { ?>
<span id="id_read_on_totalimport" class="sc-ui-readonly-totalimport css_totalimport_line" style="<?php echo $sStyleReadLab_totalimport; ?>"><?php echo $this->totalimport; ?></span><span id="id_read_off_totalimport" class="css_read_off_totalimport" style="white-space: nowrap;<?php echo $sStyleReadInp_totalimport; ?>">
 <input class="sc-js-input scFormObjectOdd css_totalimport_obj" style="" id="id_sc_field_totalimport" type=text name="totalimport" value="<?php echo $this->form_encode_input($totalimport) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totalimport']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totalimport']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totalimport']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totalimport_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totalimport_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['disponibledry']))
    {
        $this->nm_new_label['disponibledry'] = "Disponible Dry";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $disponibledry = $this->disponibledry;
   $sStyleHidden_disponibledry = '';
   if (isset($this->nmgp_cmp_hidden['disponibledry']) && $this->nmgp_cmp_hidden['disponibledry'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['disponibledry']);
       $sStyleHidden_disponibledry = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_disponibledry = 'display: none;';
   $sStyleReadInp_disponibledry = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['disponibledry']) && $this->nmgp_cmp_readonly['disponibledry'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['disponibledry']);
       $sStyleReadLab_disponibledry = '';
       $sStyleReadInp_disponibledry = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['disponibledry']) && $this->nmgp_cmp_hidden['disponibledry'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="disponibledry" value="<?php echo $this->form_encode_input($disponibledry) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_disponibledry_label" id="hidden_field_label_disponibledry" style="<?php echo $sStyleHidden_disponibledry; ?>"><span id="id_label_disponibledry"><?php echo $this->nm_new_label['disponibledry']; ?></span></TD>
    <TD class="scFormDataOdd css_disponibledry_line" id="hidden_field_data_disponibledry" style="<?php echo $sStyleHidden_disponibledry; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_disponibledry_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["disponibledry"]) &&  $this->nmgp_cmp_readonly["disponibledry"] == "on") { 

 ?>
<input type="hidden" name="disponibledry" value="<?php echo $this->form_encode_input($disponibledry) . "\">" . $disponibledry . ""; ?>
<?php } else { ?>
<span id="id_read_on_disponibledry" class="sc-ui-readonly-disponibledry css_disponibledry_line" style="<?php echo $sStyleReadLab_disponibledry; ?>"><?php echo $this->disponibledry; ?></span><span id="id_read_off_disponibledry" class="css_read_off_disponibledry" style="white-space: nowrap;<?php echo $sStyleReadInp_disponibledry; ?>">
 <input class="sc-js-input scFormObjectOdd css_disponibledry_obj" style="" id="id_sc_field_disponibledry" type=text name="disponibledry" value="<?php echo $this->form_encode_input($disponibledry) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['disponibledry']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['disponibledry']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['disponibledry']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_disponibledry_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_disponibledry_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['disponiblereefer']))
    {
        $this->nm_new_label['disponiblereefer'] = "Disponible Reefer";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $disponiblereefer = $this->disponiblereefer;
   $sStyleHidden_disponiblereefer = '';
   if (isset($this->nmgp_cmp_hidden['disponiblereefer']) && $this->nmgp_cmp_hidden['disponiblereefer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['disponiblereefer']);
       $sStyleHidden_disponiblereefer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_disponiblereefer = 'display: none;';
   $sStyleReadInp_disponiblereefer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['disponiblereefer']) && $this->nmgp_cmp_readonly['disponiblereefer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['disponiblereefer']);
       $sStyleReadLab_disponiblereefer = '';
       $sStyleReadInp_disponiblereefer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['disponiblereefer']) && $this->nmgp_cmp_hidden['disponiblereefer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="disponiblereefer" value="<?php echo $this->form_encode_input($disponiblereefer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_disponiblereefer_label" id="hidden_field_label_disponiblereefer" style="<?php echo $sStyleHidden_disponiblereefer; ?>"><span id="id_label_disponiblereefer"><?php echo $this->nm_new_label['disponiblereefer']; ?></span></TD>
    <TD class="scFormDataOdd css_disponiblereefer_line" id="hidden_field_data_disponiblereefer" style="<?php echo $sStyleHidden_disponiblereefer; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_disponiblereefer_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["disponiblereefer"]) &&  $this->nmgp_cmp_readonly["disponiblereefer"] == "on") { 

 ?>
<input type="hidden" name="disponiblereefer" value="<?php echo $this->form_encode_input($disponiblereefer) . "\">" . $disponiblereefer . ""; ?>
<?php } else { ?>
<span id="id_read_on_disponiblereefer" class="sc-ui-readonly-disponiblereefer css_disponiblereefer_line" style="<?php echo $sStyleReadLab_disponiblereefer; ?>"><?php echo $this->disponiblereefer; ?></span><span id="id_read_off_disponiblereefer" class="css_read_off_disponiblereefer" style="white-space: nowrap;<?php echo $sStyleReadInp_disponiblereefer; ?>">
 <input class="sc-js-input scFormObjectOdd css_disponiblereefer_obj" style="" id="id_sc_field_disponiblereefer" type=text name="disponiblereefer" value="<?php echo $this->form_encode_input($disponiblereefer) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['disponiblereefer']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['disponiblereefer']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['disponiblereefer']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_disponiblereefer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_disponiblereefer_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['disponibleteu']))
    {
        $this->nm_new_label['disponibleteu'] = "Disponible Teu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $disponibleteu = $this->disponibleteu;
   $sStyleHidden_disponibleteu = '';
   if (isset($this->nmgp_cmp_hidden['disponibleteu']) && $this->nmgp_cmp_hidden['disponibleteu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['disponibleteu']);
       $sStyleHidden_disponibleteu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_disponibleteu = 'display: none;';
   $sStyleReadInp_disponibleteu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['disponibleteu']) && $this->nmgp_cmp_readonly['disponibleteu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['disponibleteu']);
       $sStyleReadLab_disponibleteu = '';
       $sStyleReadInp_disponibleteu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['disponibleteu']) && $this->nmgp_cmp_hidden['disponibleteu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="disponibleteu" value="<?php echo $this->form_encode_input($disponibleteu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_disponibleteu_label" id="hidden_field_label_disponibleteu" style="<?php echo $sStyleHidden_disponibleteu; ?>"><span id="id_label_disponibleteu"><?php echo $this->nm_new_label['disponibleteu']; ?></span></TD>
    <TD class="scFormDataOdd css_disponibleteu_line" id="hidden_field_data_disponibleteu" style="<?php echo $sStyleHidden_disponibleteu; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_disponibleteu_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["disponibleteu"]) &&  $this->nmgp_cmp_readonly["disponibleteu"] == "on") { 

 ?>
<input type="hidden" name="disponibleteu" value="<?php echo $this->form_encode_input($disponibleteu) . "\">" . $disponibleteu . ""; ?>
<?php } else { ?>
<span id="id_read_on_disponibleteu" class="sc-ui-readonly-disponibleteu css_disponibleteu_line" style="<?php echo $sStyleReadLab_disponibleteu; ?>"><?php echo $this->disponibleteu; ?></span><span id="id_read_off_disponibleteu" class="css_read_off_disponibleteu" style="white-space: nowrap;<?php echo $sStyleReadInp_disponibleteu; ?>">
 <input class="sc-js-input scFormObjectOdd css_disponibleteu_obj" style="" id="id_sc_field_disponibleteu" type=text name="disponibleteu" value="<?php echo $this->form_encode_input($disponibleteu) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['disponibleteu']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['disponibleteu']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['disponibleteu']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_disponibleteu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_disponibleteu_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['totaldisponible']))
    {
        $this->nm_new_label['totaldisponible'] = "Total Disponible";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totaldisponible = $this->totaldisponible;
   $sStyleHidden_totaldisponible = '';
   if (isset($this->nmgp_cmp_hidden['totaldisponible']) && $this->nmgp_cmp_hidden['totaldisponible'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totaldisponible']);
       $sStyleHidden_totaldisponible = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totaldisponible = 'display: none;';
   $sStyleReadInp_totaldisponible = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['totaldisponible']) && $this->nmgp_cmp_readonly['totaldisponible'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totaldisponible']);
       $sStyleReadLab_totaldisponible = '';
       $sStyleReadInp_totaldisponible = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totaldisponible']) && $this->nmgp_cmp_hidden['totaldisponible'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totaldisponible" value="<?php echo $this->form_encode_input($totaldisponible) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_totaldisponible_label" id="hidden_field_label_totaldisponible" style="<?php echo $sStyleHidden_totaldisponible; ?>"><span id="id_label_totaldisponible"><?php echo $this->nm_new_label['totaldisponible']; ?></span></TD>
    <TD class="scFormDataOdd css_totaldisponible_line" id="hidden_field_data_totaldisponible" style="<?php echo $sStyleHidden_totaldisponible; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totaldisponible_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["totaldisponible"]) &&  $this->nmgp_cmp_readonly["totaldisponible"] == "on") { 

 ?>
<input type="hidden" name="totaldisponible" value="<?php echo $this->form_encode_input($totaldisponible) . "\">" . $totaldisponible . ""; ?>
<?php } else { ?>
<span id="id_read_on_totaldisponible" class="sc-ui-readonly-totaldisponible css_totaldisponible_line" style="<?php echo $sStyleReadLab_totaldisponible; ?>"><?php echo $this->totaldisponible; ?></span><span id="id_read_off_totaldisponible" class="css_read_off_totaldisponible" style="white-space: nowrap;<?php echo $sStyleReadInp_totaldisponible; ?>">
 <input class="sc-js-input scFormObjectOdd css_totaldisponible_obj" style="" id="id_sc_field_totaldisponible" type=text name="totaldisponible" value="<?php echo $this->form_encode_input($totaldisponible) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totaldisponible']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totaldisponible']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totaldisponible']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totaldisponible_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totaldisponible_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['exportdry']))
    {
        $this->nm_new_label['exportdry'] = "Export Dry";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $exportdry = $this->exportdry;
   $sStyleHidden_exportdry = '';
   if (isset($this->nmgp_cmp_hidden['exportdry']) && $this->nmgp_cmp_hidden['exportdry'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['exportdry']);
       $sStyleHidden_exportdry = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_exportdry = 'display: none;';
   $sStyleReadInp_exportdry = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['exportdry']) && $this->nmgp_cmp_readonly['exportdry'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['exportdry']);
       $sStyleReadLab_exportdry = '';
       $sStyleReadInp_exportdry = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['exportdry']) && $this->nmgp_cmp_hidden['exportdry'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="exportdry" value="<?php echo $this->form_encode_input($exportdry) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_exportdry_label" id="hidden_field_label_exportdry" style="<?php echo $sStyleHidden_exportdry; ?>"><span id="id_label_exportdry"><?php echo $this->nm_new_label['exportdry']; ?></span></TD>
    <TD class="scFormDataOdd css_exportdry_line" id="hidden_field_data_exportdry" style="<?php echo $sStyleHidden_exportdry; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_exportdry_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["exportdry"]) &&  $this->nmgp_cmp_readonly["exportdry"] == "on") { 

 ?>
<input type="hidden" name="exportdry" value="<?php echo $this->form_encode_input($exportdry) . "\">" . $exportdry . ""; ?>
<?php } else { ?>
<span id="id_read_on_exportdry" class="sc-ui-readonly-exportdry css_exportdry_line" style="<?php echo $sStyleReadLab_exportdry; ?>"><?php echo $this->exportdry; ?></span><span id="id_read_off_exportdry" class="css_read_off_exportdry" style="white-space: nowrap;<?php echo $sStyleReadInp_exportdry; ?>">
 <input class="sc-js-input scFormObjectOdd css_exportdry_obj" style="" id="id_sc_field_exportdry" type=text name="exportdry" value="<?php echo $this->form_encode_input($exportdry) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['exportdry']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['exportdry']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['exportdry']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_exportdry_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_exportdry_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['exportreefer']))
    {
        $this->nm_new_label['exportreefer'] = "Export Reefer";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $exportreefer = $this->exportreefer;
   $sStyleHidden_exportreefer = '';
   if (isset($this->nmgp_cmp_hidden['exportreefer']) && $this->nmgp_cmp_hidden['exportreefer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['exportreefer']);
       $sStyleHidden_exportreefer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_exportreefer = 'display: none;';
   $sStyleReadInp_exportreefer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['exportreefer']) && $this->nmgp_cmp_readonly['exportreefer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['exportreefer']);
       $sStyleReadLab_exportreefer = '';
       $sStyleReadInp_exportreefer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['exportreefer']) && $this->nmgp_cmp_hidden['exportreefer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="exportreefer" value="<?php echo $this->form_encode_input($exportreefer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_exportreefer_label" id="hidden_field_label_exportreefer" style="<?php echo $sStyleHidden_exportreefer; ?>"><span id="id_label_exportreefer"><?php echo $this->nm_new_label['exportreefer']; ?></span></TD>
    <TD class="scFormDataOdd css_exportreefer_line" id="hidden_field_data_exportreefer" style="<?php echo $sStyleHidden_exportreefer; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_exportreefer_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["exportreefer"]) &&  $this->nmgp_cmp_readonly["exportreefer"] == "on") { 

 ?>
<input type="hidden" name="exportreefer" value="<?php echo $this->form_encode_input($exportreefer) . "\">" . $exportreefer . ""; ?>
<?php } else { ?>
<span id="id_read_on_exportreefer" class="sc-ui-readonly-exportreefer css_exportreefer_line" style="<?php echo $sStyleReadLab_exportreefer; ?>"><?php echo $this->exportreefer; ?></span><span id="id_read_off_exportreefer" class="css_read_off_exportreefer" style="white-space: nowrap;<?php echo $sStyleReadInp_exportreefer; ?>">
 <input class="sc-js-input scFormObjectOdd css_exportreefer_obj" style="" id="id_sc_field_exportreefer" type=text name="exportreefer" value="<?php echo $this->form_encode_input($exportreefer) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['exportreefer']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['exportreefer']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['exportreefer']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_exportreefer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_exportreefer_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['exportteu']))
    {
        $this->nm_new_label['exportteu'] = "Export Teu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $exportteu = $this->exportteu;
   $sStyleHidden_exportteu = '';
   if (isset($this->nmgp_cmp_hidden['exportteu']) && $this->nmgp_cmp_hidden['exportteu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['exportteu']);
       $sStyleHidden_exportteu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_exportteu = 'display: none;';
   $sStyleReadInp_exportteu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['exportteu']) && $this->nmgp_cmp_readonly['exportteu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['exportteu']);
       $sStyleReadLab_exportteu = '';
       $sStyleReadInp_exportteu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['exportteu']) && $this->nmgp_cmp_hidden['exportteu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="exportteu" value="<?php echo $this->form_encode_input($exportteu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_exportteu_label" id="hidden_field_label_exportteu" style="<?php echo $sStyleHidden_exportteu; ?>"><span id="id_label_exportteu"><?php echo $this->nm_new_label['exportteu']; ?></span></TD>
    <TD class="scFormDataOdd css_exportteu_line" id="hidden_field_data_exportteu" style="<?php echo $sStyleHidden_exportteu; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_exportteu_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["exportteu"]) &&  $this->nmgp_cmp_readonly["exportteu"] == "on") { 

 ?>
<input type="hidden" name="exportteu" value="<?php echo $this->form_encode_input($exportteu) . "\">" . $exportteu . ""; ?>
<?php } else { ?>
<span id="id_read_on_exportteu" class="sc-ui-readonly-exportteu css_exportteu_line" style="<?php echo $sStyleReadLab_exportteu; ?>"><?php echo $this->exportteu; ?></span><span id="id_read_off_exportteu" class="css_read_off_exportteu" style="white-space: nowrap;<?php echo $sStyleReadInp_exportteu; ?>">
 <input class="sc-js-input scFormObjectOdd css_exportteu_obj" style="" id="id_sc_field_exportteu" type=text name="exportteu" value="<?php echo $this->form_encode_input($exportteu) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['exportteu']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['exportteu']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['exportteu']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_exportteu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_exportteu_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['totalexport']))
    {
        $this->nm_new_label['totalexport'] = "Totalexport";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totalexport = $this->totalexport;
   $sStyleHidden_totalexport = '';
   if (isset($this->nmgp_cmp_hidden['totalexport']) && $this->nmgp_cmp_hidden['totalexport'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totalexport']);
       $sStyleHidden_totalexport = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totalexport = 'display: none;';
   $sStyleReadInp_totalexport = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['totalexport']) && $this->nmgp_cmp_readonly['totalexport'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totalexport']);
       $sStyleReadLab_totalexport = '';
       $sStyleReadInp_totalexport = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totalexport']) && $this->nmgp_cmp_hidden['totalexport'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totalexport" value="<?php echo $this->form_encode_input($totalexport) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_totalexport_label" id="hidden_field_label_totalexport" style="<?php echo $sStyleHidden_totalexport; ?>"><span id="id_label_totalexport"><?php echo $this->nm_new_label['totalexport']; ?></span></TD>
    <TD class="scFormDataOdd css_totalexport_line" id="hidden_field_data_totalexport" style="<?php echo $sStyleHidden_totalexport; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totalexport_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["totalexport"]) &&  $this->nmgp_cmp_readonly["totalexport"] == "on") { 

 ?>
<input type="hidden" name="totalexport" value="<?php echo $this->form_encode_input($totalexport) . "\">" . $totalexport . ""; ?>
<?php } else { ?>
<span id="id_read_on_totalexport" class="sc-ui-readonly-totalexport css_totalexport_line" style="<?php echo $sStyleReadLab_totalexport; ?>"><?php echo $this->totalexport; ?></span><span id="id_read_off_totalexport" class="css_read_off_totalexport" style="white-space: nowrap;<?php echo $sStyleReadInp_totalexport; ?>">
 <input class="sc-js-input scFormObjectOdd css_totalexport_obj" style="" id="id_sc_field_totalexport" type=text name="totalexport" value="<?php echo $this->form_encode_input($totalexport) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totalexport']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totalexport']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totalexport']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totalexport_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totalexport_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['despachodry']))
    {
        $this->nm_new_label['despachodry'] = "Despacho Dry";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $despachodry = $this->despachodry;
   $sStyleHidden_despachodry = '';
   if (isset($this->nmgp_cmp_hidden['despachodry']) && $this->nmgp_cmp_hidden['despachodry'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['despachodry']);
       $sStyleHidden_despachodry = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_despachodry = 'display: none;';
   $sStyleReadInp_despachodry = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['despachodry']) && $this->nmgp_cmp_readonly['despachodry'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['despachodry']);
       $sStyleReadLab_despachodry = '';
       $sStyleReadInp_despachodry = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['despachodry']) && $this->nmgp_cmp_hidden['despachodry'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="despachodry" value="<?php echo $this->form_encode_input($despachodry) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_despachodry_label" id="hidden_field_label_despachodry" style="<?php echo $sStyleHidden_despachodry; ?>"><span id="id_label_despachodry"><?php echo $this->nm_new_label['despachodry']; ?></span></TD>
    <TD class="scFormDataOdd css_despachodry_line" id="hidden_field_data_despachodry" style="<?php echo $sStyleHidden_despachodry; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_despachodry_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["despachodry"]) &&  $this->nmgp_cmp_readonly["despachodry"] == "on") { 

 ?>
<input type="hidden" name="despachodry" value="<?php echo $this->form_encode_input($despachodry) . "\">" . $despachodry . ""; ?>
<?php } else { ?>
<span id="id_read_on_despachodry" class="sc-ui-readonly-despachodry css_despachodry_line" style="<?php echo $sStyleReadLab_despachodry; ?>"><?php echo $this->despachodry; ?></span><span id="id_read_off_despachodry" class="css_read_off_despachodry" style="white-space: nowrap;<?php echo $sStyleReadInp_despachodry; ?>">
 <input class="sc-js-input scFormObjectOdd css_despachodry_obj" style="" id="id_sc_field_despachodry" type=text name="despachodry" value="<?php echo $this->form_encode_input($despachodry) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['despachodry']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['despachodry']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['despachodry']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_despachodry_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_despachodry_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['despachoreefer']))
    {
        $this->nm_new_label['despachoreefer'] = "Despacho Reefer";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $despachoreefer = $this->despachoreefer;
   $sStyleHidden_despachoreefer = '';
   if (isset($this->nmgp_cmp_hidden['despachoreefer']) && $this->nmgp_cmp_hidden['despachoreefer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['despachoreefer']);
       $sStyleHidden_despachoreefer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_despachoreefer = 'display: none;';
   $sStyleReadInp_despachoreefer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['despachoreefer']) && $this->nmgp_cmp_readonly['despachoreefer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['despachoreefer']);
       $sStyleReadLab_despachoreefer = '';
       $sStyleReadInp_despachoreefer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['despachoreefer']) && $this->nmgp_cmp_hidden['despachoreefer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="despachoreefer" value="<?php echo $this->form_encode_input($despachoreefer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_despachoreefer_label" id="hidden_field_label_despachoreefer" style="<?php echo $sStyleHidden_despachoreefer; ?>"><span id="id_label_despachoreefer"><?php echo $this->nm_new_label['despachoreefer']; ?></span></TD>
    <TD class="scFormDataOdd css_despachoreefer_line" id="hidden_field_data_despachoreefer" style="<?php echo $sStyleHidden_despachoreefer; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_despachoreefer_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["despachoreefer"]) &&  $this->nmgp_cmp_readonly["despachoreefer"] == "on") { 

 ?>
<input type="hidden" name="despachoreefer" value="<?php echo $this->form_encode_input($despachoreefer) . "\">" . $despachoreefer . ""; ?>
<?php } else { ?>
<span id="id_read_on_despachoreefer" class="sc-ui-readonly-despachoreefer css_despachoreefer_line" style="<?php echo $sStyleReadLab_despachoreefer; ?>"><?php echo $this->despachoreefer; ?></span><span id="id_read_off_despachoreefer" class="css_read_off_despachoreefer" style="white-space: nowrap;<?php echo $sStyleReadInp_despachoreefer; ?>">
 <input class="sc-js-input scFormObjectOdd css_despachoreefer_obj" style="" id="id_sc_field_despachoreefer" type=text name="despachoreefer" value="<?php echo $this->form_encode_input($despachoreefer) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['despachoreefer']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['despachoreefer']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['despachoreefer']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_despachoreefer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_despachoreefer_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['despachoteu']))
    {
        $this->nm_new_label['despachoteu'] = "Despacho Teu";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $despachoteu = $this->despachoteu;
   $sStyleHidden_despachoteu = '';
   if (isset($this->nmgp_cmp_hidden['despachoteu']) && $this->nmgp_cmp_hidden['despachoteu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['despachoteu']);
       $sStyleHidden_despachoteu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_despachoteu = 'display: none;';
   $sStyleReadInp_despachoteu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['despachoteu']) && $this->nmgp_cmp_readonly['despachoteu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['despachoteu']);
       $sStyleReadLab_despachoteu = '';
       $sStyleReadInp_despachoteu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['despachoteu']) && $this->nmgp_cmp_hidden['despachoteu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="despachoteu" value="<?php echo $this->form_encode_input($despachoteu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_despachoteu_label" id="hidden_field_label_despachoteu" style="<?php echo $sStyleHidden_despachoteu; ?>"><span id="id_label_despachoteu"><?php echo $this->nm_new_label['despachoteu']; ?></span></TD>
    <TD class="scFormDataOdd css_despachoteu_line" id="hidden_field_data_despachoteu" style="<?php echo $sStyleHidden_despachoteu; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_despachoteu_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["despachoteu"]) &&  $this->nmgp_cmp_readonly["despachoteu"] == "on") { 

 ?>
<input type="hidden" name="despachoteu" value="<?php echo $this->form_encode_input($despachoteu) . "\">" . $despachoteu . ""; ?>
<?php } else { ?>
<span id="id_read_on_despachoteu" class="sc-ui-readonly-despachoteu css_despachoteu_line" style="<?php echo $sStyleReadLab_despachoteu; ?>"><?php echo $this->despachoteu; ?></span><span id="id_read_off_despachoteu" class="css_read_off_despachoteu" style="white-space: nowrap;<?php echo $sStyleReadInp_despachoteu; ?>">
 <input class="sc-js-input scFormObjectOdd css_despachoteu_obj" style="" id="id_sc_field_despachoteu" type=text name="despachoteu" value="<?php echo $this->form_encode_input($despachoteu) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['despachoteu']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['despachoteu']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['despachoteu']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_despachoteu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_despachoteu_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['totaldespacho']))
    {
        $this->nm_new_label['totaldespacho'] = "Total Despacho";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totaldespacho = $this->totaldespacho;
   $sStyleHidden_totaldespacho = '';
   if (isset($this->nmgp_cmp_hidden['totaldespacho']) && $this->nmgp_cmp_hidden['totaldespacho'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totaldespacho']);
       $sStyleHidden_totaldespacho = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totaldespacho = 'display: none;';
   $sStyleReadInp_totaldespacho = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['totaldespacho']) && $this->nmgp_cmp_readonly['totaldespacho'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totaldespacho']);
       $sStyleReadLab_totaldespacho = '';
       $sStyleReadInp_totaldespacho = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totaldespacho']) && $this->nmgp_cmp_hidden['totaldespacho'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totaldespacho" value="<?php echo $this->form_encode_input($totaldespacho) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_totaldespacho_label" id="hidden_field_label_totaldespacho" style="<?php echo $sStyleHidden_totaldespacho; ?>"><span id="id_label_totaldespacho"><?php echo $this->nm_new_label['totaldespacho']; ?></span></TD>
    <TD class="scFormDataOdd css_totaldespacho_line" id="hidden_field_data_totaldespacho" style="<?php echo $sStyleHidden_totaldespacho; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totaldespacho_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["totaldespacho"]) &&  $this->nmgp_cmp_readonly["totaldespacho"] == "on") { 

 ?>
<input type="hidden" name="totaldespacho" value="<?php echo $this->form_encode_input($totaldespacho) . "\">" . $totaldespacho . ""; ?>
<?php } else { ?>
<span id="id_read_on_totaldespacho" class="sc-ui-readonly-totaldespacho css_totaldespacho_line" style="<?php echo $sStyleReadLab_totaldespacho; ?>"><?php echo $this->totaldespacho; ?></span><span id="id_read_off_totaldespacho" class="css_read_off_totaldespacho" style="white-space: nowrap;<?php echo $sStyleReadInp_totaldespacho; ?>">
 <input class="sc-js-input scFormObjectOdd css_totaldespacho_obj" style="" id="id_sc_field_totaldespacho" type=text name="totaldespacho" value="<?php echo $this->form_encode_input($totaldespacho) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totaldespacho']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totaldespacho']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totaldespacho']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totaldespacho_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totaldespacho_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_ocupacion");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_ocupacion");
 parent.scAjaxDetailHeight("form_ocupacion", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_ocupacion", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_ocupacion", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['sc_modal'])
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ocupacion']['buttonStatus'] = $this->nmgp_botoes;
?>
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
</script>
</body> 
</html> 
