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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("DESPACHO DE CAMIONES DE " . $_SESSION['yarda_desc'] . ""); } ?></TITLE>
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['embutida_pdf']))
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
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>Despachos/Despachos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("Despachos_sajax_js.php");
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
<?php

include_once('Despachos_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

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
   });
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("Despachos_js0.php");
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
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
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
$_SESSION['scriptcase']['error_span_title']['Despachos'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['Despachos'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="80%%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "DESPACHO DE CAMIONES DE " . $_SESSION['yarda_desc'] . ""; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 

<?php
           if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "scBtnFn_sc_btn_0()", "scBtnFn_sc_btn_0()", "sc_sc_btn_0_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idcita']))
   {
       $this->nmgp_cmp_hidden['idcita'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['placa']))
           {
               $this->nmgp_cmp_readonly['placa'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['codigo_cita']))
    {
        $this->nm_new_label['codigo_cita'] = "LEER QR  -  CODIGO CITA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_cita = $this->codigo_cita;
   $sStyleHidden_codigo_cita = '';
   if (isset($this->nmgp_cmp_hidden['codigo_cita']) && $this->nmgp_cmp_hidden['codigo_cita'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_cita']);
       $sStyleHidden_codigo_cita = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_cita = 'display: none;';
   $sStyleReadInp_codigo_cita = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_cita']) && $this->nmgp_cmp_readonly['codigo_cita'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_cita']);
       $sStyleReadLab_codigo_cita = '';
       $sStyleReadInp_codigo_cita = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_cita']) && $this->nmgp_cmp_hidden['codigo_cita'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_cita" value="<?php echo $this->form_encode_input($codigo_cita) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_cita_line" id="hidden_field_data_codigo_cita" style="<?php echo $sStyleHidden_codigo_cita; ?>"> <span class="scFormLabelOddFormat css_codigo_cita_label"><span id="id_label_codigo_cita"><?php echo $this->nm_new_label['codigo_cita']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_cita"]) &&  $this->nmgp_cmp_readonly["codigo_cita"] == "on") { 

 ?>
<input type="hidden" name="codigo_cita" value="<?php echo $this->form_encode_input($codigo_cita) . "\">" . $codigo_cita . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_cita" class="sc-ui-readonly-codigo_cita css_codigo_cita_line" style="<?php echo $sStyleReadLab_codigo_cita; ?>"><?php echo $this->codigo_cita; ?></span><span id="id_read_off_codigo_cita" class="css_read_off_codigo_cita" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_cita; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_cita_obj" style="" id="id_sc_field_codigo_cita" type=text name="codigo_cita" value="<?php echo $this->form_encode_input($codigo_cita) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['atc']))
    {
        $this->nm_new_label['atc'] = "ATC";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $atc = $this->atc;
   $sStyleHidden_atc = '';
   if (isset($this->nmgp_cmp_hidden['atc']) && $this->nmgp_cmp_hidden['atc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['atc']);
       $sStyleHidden_atc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_atc = 'display: none;';
   $sStyleReadInp_atc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['atc']) && $this->nmgp_cmp_readonly['atc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['atc']);
       $sStyleReadLab_atc = '';
       $sStyleReadInp_atc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['atc']) && $this->nmgp_cmp_hidden['atc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="atc" value="<?php echo $this->form_encode_input($atc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_atc_line" id="hidden_field_data_atc" style="<?php echo $sStyleHidden_atc; ?>"> <span class="scFormLabelOddFormat css_atc_label"><span id="id_label_atc"><?php echo $this->nm_new_label['atc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['php_cmp_required']['atc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['php_cmp_required']['atc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["atc"]) &&  $this->nmgp_cmp_readonly["atc"] == "on") { 

 ?>
<input type="hidden" name="atc" value="<?php echo $this->form_encode_input($atc) . "\">" . $atc . ""; ?>
<?php } else { ?>
<span id="id_read_on_atc" class="sc-ui-readonly-atc css_atc_line" style="<?php echo $sStyleReadLab_atc; ?>"><?php echo $this->atc; ?></span><span id="id_read_off_atc" class="css_read_off_atc" style="white-space: nowrap;<?php echo $sStyleReadInp_atc; ?>">
 <input class="sc-js-input scFormObjectOdd css_atc_obj" style="" id="id_sc_field_atc" type=text name="atc" value="<?php echo $this->form_encode_input($atc) ?>"
 size=15 maxlength=20 alt="{datatype: 'integer', maxLength: 20, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['atc']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['atc']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['sc_field_0']))
    {
        $this->nm_new_label['sc_field_0'] = "MARCHAMO DESPACHO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sc_field_0 = $this->sc_field_0;
   $sStyleHidden_sc_field_0 = '';
   if (isset($this->nmgp_cmp_hidden['sc_field_0']) && $this->nmgp_cmp_hidden['sc_field_0'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sc_field_0']);
       $sStyleHidden_sc_field_0 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sc_field_0 = 'display: none;';
   $sStyleReadInp_sc_field_0 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sc_field_0']) && $this->nmgp_cmp_readonly['sc_field_0'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sc_field_0']);
       $sStyleReadLab_sc_field_0 = '';
       $sStyleReadInp_sc_field_0 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sc_field_0']) && $this->nmgp_cmp_hidden['sc_field_0'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_0_line" id="hidden_field_data_sc_field_0" style="<?php echo $sStyleHidden_sc_field_0; ?>"> <span class="scFormLabelOddFormat css_sc_field_0_label"><span id="id_label_sc_field_0"><?php echo $this->nm_new_label['sc_field_0']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['php_cmp_required']['sc_field_0']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['php_cmp_required']['sc_field_0'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0"]) &&  $this->nmgp_cmp_readonly["sc_field_0"] == "on") { 

 ?>
<input type="hidden" name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) . "\">" . $sc_field_0 . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_0" class="sc-ui-readonly-sc_field_0 css_sc_field_0_line" style="<?php echo $sStyleReadLab_sc_field_0; ?>"><?php echo $this->sc_field_0; ?></span><span id="id_read_off_sc_field_0" class="css_read_off_sc_field_0" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_0; ?>">
 <input class="sc-js-input scFormObjectOdd css_sc_field_0_obj" style="" id="id_sc_field_sc_field_0" type=text name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) ?>"
 size=15 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['destino']))
   {
       $this->nm_new_label['destino'] = "DESTINO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $destino = $this->destino;
   $sStyleHidden_destino = '';
   if (isset($this->nmgp_cmp_hidden['destino']) && $this->nmgp_cmp_hidden['destino'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['destino']);
       $sStyleHidden_destino = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_destino = 'display: none;';
   $sStyleReadInp_destino = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['destino']) && $this->nmgp_cmp_readonly['destino'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['destino']);
       $sStyleReadLab_destino = '';
       $sStyleReadInp_destino = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['destino']) && $this->nmgp_cmp_hidden['destino'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="destino" value="<?php echo $this->form_encode_input($this->destino) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_destino_line" id="hidden_field_data_destino" style="<?php echo $sStyleHidden_destino; ?>"> <span class="scFormLabelOddFormat css_destino_label"><span id="id_label_destino"><?php echo $this->nm_new_label['destino']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["destino"]) &&  $this->nmgp_cmp_readonly["destino"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['Lookup_destino']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['Lookup_destino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['Lookup_destino']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['Lookup_destino'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['Lookup_destino']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['Lookup_destino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['Lookup_destino']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['Lookup_destino'] = array(); 
    }

   $old_value_atc = $this->atc;
   $this->nm_tira_formatacao();


   $unformatted_value_atc = $this->atc;

   $nm_comando = "SELECT idyarda, descripcion_yarda  FROM yarda  WHERE idyarda<>" . $_SESSION['idyarda'] . " ORDER BY descripcion_yarda";

   $this->atc = $old_value_atc;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['Lookup_destino'][] = $rs->fields[0];
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
   $x = 0; 
   $destino_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->destino_1))
          {
              foreach ($this->destino_1 as $tmp_destino)
              {
                  if (trim($tmp_destino) === trim($cadaselect[1])) { $destino_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->destino) === trim($cadaselect[1])) { $destino_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="destino" value="<?php echo $this->form_encode_input($destino) . "\">" . $destino_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_destino();
   $x = 0 ; 
   $destino_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->destino_1))
          {
              foreach ($this->destino_1 as $tmp_destino)
              {
                  if (trim($tmp_destino) === trim($cadaselect[1])) { $destino_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->destino) === trim($cadaselect[1])) { $destino_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($destino_look))
          {
              $destino_look = $this->destino;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_destino\" class=\"css_destino_line\" style=\"" .  $sStyleReadLab_destino . "\">" . $this->form_encode_input($destino_look) . "</span><span id=\"id_read_off_destino\" class=\"css_read_off_destino\" style=\"white-space: nowrap; " . $sStyleReadInp_destino . "\">";
   echo " <span id=\"idAjaxSelect_destino\"><select class=\"sc-js-input scFormObjectOdd css_destino_obj\" style=\"\" id=\"id_sc_field_destino\" name=\"destino\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->destino) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->destino)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_codigo_cita_dumb = ('' == $sStyleHidden_codigo_cita) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_codigo_cita_dumb" style="<?php echo $sStyleHidden_codigo_cita_dumb; ?>"></TD>
<?php $sStyleHidden_atc_dumb = ('' == $sStyleHidden_atc) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_atc_dumb" style="<?php echo $sStyleHidden_atc_dumb; ?>"></TD>
<?php $sStyleHidden_sc_field_0_dumb = ('' == $sStyleHidden_sc_field_0) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_sc_field_0_dumb" style="<?php echo $sStyleHidden_sc_field_0_dumb; ?>"></TD>
<?php $sStyleHidden_destino_dumb = ('' == $sStyleHidden_destino) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_destino_dumb" style="<?php echo $sStyleHidden_destino_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['chasis']))
           {
               $this->nmgp_cmp_readonly['chasis'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['naviera']))
           {
               $this->nmgp_cmp_readonly['naviera'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['contenedor_exp']))
           {
               $this->nmgp_cmp_readonly['contenedor_exp'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['contenedor_imp']))
           {
               $this->nmgp_cmp_readonly['contenedor_imp'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['placa']))
    {
        $this->nm_new_label['placa'] = "PLACA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $placa = $this->placa;
   $sStyleHidden_placa = '';
   if (isset($this->nmgp_cmp_hidden['placa']) && $this->nmgp_cmp_hidden['placa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['placa']);
       $sStyleHidden_placa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_placa = 'display: none;';
   $sStyleReadInp_placa = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["placa"]) &&  $this->nmgp_cmp_readonly["placa"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['placa']);
       $sStyleReadLab_placa = '';
       $sStyleReadInp_placa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['placa']) && $this->nmgp_cmp_hidden['placa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="placa" value="<?php echo $this->form_encode_input($placa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_placa_line" id="hidden_field_data_placa" style="<?php echo $sStyleHidden_placa; ?>"> <span class="scFormLabelOddFormat css_placa_label"><span id="id_label_placa"><?php echo $this->nm_new_label['placa']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["placa"]) &&  $this->nmgp_cmp_readonly["placa"] == "on")) { 

 ?>
<input type="hidden" name="placa" value="<?php echo $this->form_encode_input($placa) . "\"><span id=\"id_ajax_label_placa\">" . $placa . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_placa" class="sc-ui-readonly-placa css_placa_line" style="<?php echo $sStyleReadLab_placa; ?>"><?php echo $this->placa; ?></span><span id="id_read_off_placa" class="css_read_off_placa" style="white-space: nowrap;<?php echo $sStyleReadInp_placa; ?>">
 <input class="sc-js-input scFormObjectOdd css_placa_obj" style="" id="id_sc_field_placa" type=text name="placa" value="<?php echo $this->form_encode_input($placa) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['chasis']))
    {
        $this->nm_new_label['chasis'] = "CHASIS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $chasis = $this->chasis;
   $sStyleHidden_chasis = '';
   if (isset($this->nmgp_cmp_hidden['chasis']) && $this->nmgp_cmp_hidden['chasis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['chasis']);
       $sStyleHidden_chasis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_chasis = 'display: none;';
   $sStyleReadInp_chasis = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["chasis"]) &&  $this->nmgp_cmp_readonly["chasis"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['chasis']);
       $sStyleReadLab_chasis = '';
       $sStyleReadInp_chasis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['chasis']) && $this->nmgp_cmp_hidden['chasis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="chasis" value="<?php echo $this->form_encode_input($chasis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_chasis_line" id="hidden_field_data_chasis" style="<?php echo $sStyleHidden_chasis; ?>"> <span class="scFormLabelOddFormat css_chasis_label"><span id="id_label_chasis"><?php echo $this->nm_new_label['chasis']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["chasis"]) &&  $this->nmgp_cmp_readonly["chasis"] == "on")) { 

 ?>
<input type="hidden" name="chasis" value="<?php echo $this->form_encode_input($chasis) . "\"><span id=\"id_ajax_label_chasis\">" . $chasis . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_chasis" class="sc-ui-readonly-chasis css_chasis_line" style="<?php echo $sStyleReadLab_chasis; ?>"><?php echo $this->chasis; ?></span><span id="id_read_off_chasis" class="css_read_off_chasis" style="white-space: nowrap;<?php echo $sStyleReadInp_chasis; ?>">
 <input class="sc-js-input scFormObjectOdd css_chasis_obj" style="" id="id_sc_field_chasis" type=text name="chasis" value="<?php echo $this->form_encode_input($chasis) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['naviera']))
    {
        $this->nm_new_label['naviera'] = "NAVIERA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $naviera = $this->naviera;
   $sStyleHidden_naviera = '';
   if (isset($this->nmgp_cmp_hidden['naviera']) && $this->nmgp_cmp_hidden['naviera'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['naviera']);
       $sStyleHidden_naviera = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_naviera = 'display: none;';
   $sStyleReadInp_naviera = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["naviera"]) &&  $this->nmgp_cmp_readonly["naviera"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['naviera']);
       $sStyleReadLab_naviera = '';
       $sStyleReadInp_naviera = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['naviera']) && $this->nmgp_cmp_hidden['naviera'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="naviera" value="<?php echo $this->form_encode_input($naviera) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_naviera_line" id="hidden_field_data_naviera" style="<?php echo $sStyleHidden_naviera; ?>"> <span class="scFormLabelOddFormat css_naviera_label"><span id="id_label_naviera"><?php echo $this->nm_new_label['naviera']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["naviera"]) &&  $this->nmgp_cmp_readonly["naviera"] == "on")) { 

 ?>
<input type="hidden" name="naviera" value="<?php echo $this->form_encode_input($naviera) . "\"><span id=\"id_ajax_label_naviera\">" . $naviera . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_naviera" class="sc-ui-readonly-naviera css_naviera_line" style="<?php echo $sStyleReadLab_naviera; ?>"><?php echo $this->naviera; ?></span><span id="id_read_off_naviera" class="css_read_off_naviera" style="white-space: nowrap;<?php echo $sStyleReadInp_naviera; ?>">
 <input class="sc-js-input scFormObjectOdd css_naviera_obj" style="" id="id_sc_field_naviera" type=text name="naviera" value="<?php echo $this->form_encode_input($naviera) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['contenedor_exp']))
    {
        $this->nm_new_label['contenedor_exp'] = "CONTENEDOR EXP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contenedor_exp = $this->contenedor_exp;
   $sStyleHidden_contenedor_exp = '';
   if (isset($this->nmgp_cmp_hidden['contenedor_exp']) && $this->nmgp_cmp_hidden['contenedor_exp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contenedor_exp']);
       $sStyleHidden_contenedor_exp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contenedor_exp = 'display: none;';
   $sStyleReadInp_contenedor_exp = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["contenedor_exp"]) &&  $this->nmgp_cmp_readonly["contenedor_exp"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contenedor_exp']);
       $sStyleReadLab_contenedor_exp = '';
       $sStyleReadInp_contenedor_exp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contenedor_exp']) && $this->nmgp_cmp_hidden['contenedor_exp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contenedor_exp" value="<?php echo $this->form_encode_input($contenedor_exp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contenedor_exp_line" id="hidden_field_data_contenedor_exp" style="<?php echo $sStyleHidden_contenedor_exp; ?>"> <span class="scFormLabelOddFormat css_contenedor_exp_label"><span id="id_label_contenedor_exp"><?php echo $this->nm_new_label['contenedor_exp']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["contenedor_exp"]) &&  $this->nmgp_cmp_readonly["contenedor_exp"] == "on")) { 

 ?>
<input type="hidden" name="contenedor_exp" value="<?php echo $this->form_encode_input($contenedor_exp) . "\"><span id=\"id_ajax_label_contenedor_exp\">" . $contenedor_exp . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_contenedor_exp" class="sc-ui-readonly-contenedor_exp css_contenedor_exp_line" style="<?php echo $sStyleReadLab_contenedor_exp; ?>"><?php echo $this->contenedor_exp; ?></span><span id="id_read_off_contenedor_exp" class="css_read_off_contenedor_exp" style="white-space: nowrap;<?php echo $sStyleReadInp_contenedor_exp; ?>">
 <input class="sc-js-input scFormObjectOdd css_contenedor_exp_obj" style="" id="id_sc_field_contenedor_exp" type=text name="contenedor_exp" value="<?php echo $this->form_encode_input($contenedor_exp) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['contenedor_imp']))
    {
        $this->nm_new_label['contenedor_imp'] = "CONTENEDOR IMP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contenedor_imp = $this->contenedor_imp;
   $sStyleHidden_contenedor_imp = '';
   if (isset($this->nmgp_cmp_hidden['contenedor_imp']) && $this->nmgp_cmp_hidden['contenedor_imp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contenedor_imp']);
       $sStyleHidden_contenedor_imp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contenedor_imp = 'display: none;';
   $sStyleReadInp_contenedor_imp = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["contenedor_imp"]) &&  $this->nmgp_cmp_readonly["contenedor_imp"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contenedor_imp']);
       $sStyleReadLab_contenedor_imp = '';
       $sStyleReadInp_contenedor_imp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contenedor_imp']) && $this->nmgp_cmp_hidden['contenedor_imp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contenedor_imp" value="<?php echo $this->form_encode_input($contenedor_imp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contenedor_imp_line" id="hidden_field_data_contenedor_imp" style="<?php echo $sStyleHidden_contenedor_imp; ?>"> <span class="scFormLabelOddFormat css_contenedor_imp_label"><span id="id_label_contenedor_imp"><?php echo $this->nm_new_label['contenedor_imp']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["contenedor_imp"]) &&  $this->nmgp_cmp_readonly["contenedor_imp"] == "on")) { 

 ?>
<input type="hidden" name="contenedor_imp" value="<?php echo $this->form_encode_input($contenedor_imp) . "\"><span id=\"id_ajax_label_contenedor_imp\">" . $contenedor_imp . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_contenedor_imp" class="sc-ui-readonly-contenedor_imp css_contenedor_imp_line" style="<?php echo $sStyleReadLab_contenedor_imp; ?>"><?php echo $this->contenedor_imp; ?></span><span id="id_read_off_contenedor_imp" class="css_read_off_contenedor_imp" style="white-space: nowrap;<?php echo $sStyleReadInp_contenedor_imp; ?>">
 <input class="sc-js-input scFormObjectOdd css_contenedor_imp_obj" style="" id="id_sc_field_contenedor_imp" type=text name="contenedor_imp" value="<?php echo $this->form_encode_input($contenedor_imp) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_placa_dumb = ('' == $sStyleHidden_placa) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_placa_dumb" style="<?php echo $sStyleHidden_placa_dumb; ?>"></TD>
<?php $sStyleHidden_chasis_dumb = ('' == $sStyleHidden_chasis) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_chasis_dumb" style="<?php echo $sStyleHidden_chasis_dumb; ?>"></TD>
<?php $sStyleHidden_naviera_dumb = ('' == $sStyleHidden_naviera) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_naviera_dumb" style="<?php echo $sStyleHidden_naviera_dumb; ?>"></TD>
<?php $sStyleHidden_contenedor_exp_dumb = ('' == $sStyleHidden_contenedor_exp) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_contenedor_exp_dumb" style="<?php echo $sStyleHidden_contenedor_exp_dumb; ?>"></TD>
<?php $sStyleHidden_contenedor_imp_dumb = ('' == $sStyleHidden_contenedor_imp) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_contenedor_imp_dumb" style="<?php echo $sStyleHidden_contenedor_imp_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idcita']))
    {
        $this->nm_new_label['idcita'] = "IDCITA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcita = $this->idcita;
   if (!isset($this->nmgp_cmp_hidden['idcita']))
   {
       $this->nmgp_cmp_hidden['idcita'] = 'off';
   }
   $sStyleHidden_idcita = '';
   if (isset($this->nmgp_cmp_hidden['idcita']) && $this->nmgp_cmp_hidden['idcita'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcita']);
       $sStyleHidden_idcita = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcita = 'display: none;';
   $sStyleReadInp_idcita = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idcita']) && $this->nmgp_cmp_readonly['idcita'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcita']);
       $sStyleReadLab_idcita = '';
       $sStyleReadInp_idcita = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcita']) && $this->nmgp_cmp_hidden['idcita'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcita" value="<?php echo $this->form_encode_input($idcita) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idcita_line" id="hidden_field_data_idcita" style="<?php echo $sStyleHidden_idcita; ?>"> <span class="scFormLabelOddFormat css_idcita_label"><span id="id_label_idcita"><?php echo $this->nm_new_label['idcita']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcita"]) &&  $this->nmgp_cmp_readonly["idcita"] == "on") { 

 ?>
<input type="hidden" name="idcita" value="<?php echo $this->form_encode_input($idcita) . "\">" . $idcita . ""; ?>
<?php } else { ?>
<span id="id_read_on_idcita" class="sc-ui-readonly-idcita css_idcita_line" style="<?php echo $sStyleReadLab_idcita; ?>"><?php echo $this->idcita; ?></span><span id="id_read_off_idcita" class="css_read_off_idcita" style="white-space: nowrap;<?php echo $sStyleReadInp_idcita; ?>">
 <input class="sc-js-input scFormObjectOdd css_idcita_obj" style="" id="id_sc_field_idcita" type=text name="idcita" value="<?php echo $this->form_encode_input($idcita) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['piloto']))
    {
        $this->nm_new_label['piloto'] = "PILOTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $piloto = $this->piloto;
   $sStyleHidden_piloto = '';
   if (isset($this->nmgp_cmp_hidden['piloto']) && $this->nmgp_cmp_hidden['piloto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['piloto']);
       $sStyleHidden_piloto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_piloto = 'display: none;';
   $sStyleReadInp_piloto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['piloto']) && $this->nmgp_cmp_readonly['piloto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['piloto']);
       $sStyleReadLab_piloto = '';
       $sStyleReadInp_piloto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['piloto']) && $this->nmgp_cmp_hidden['piloto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="piloto" value="<?php echo $this->form_encode_input($piloto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_piloto_line" id="hidden_field_data_piloto" style="<?php echo $sStyleHidden_piloto; ?>"> <span class="scFormLabelOddFormat css_piloto_label"><span id="id_label_piloto"><?php echo $this->nm_new_label['piloto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["piloto"]) &&  $this->nmgp_cmp_readonly["piloto"] == "on") { 

 ?>
<input type="hidden" name="piloto" value="<?php echo $this->form_encode_input($piloto) . "\">" . $piloto . ""; ?>
<?php } else { ?>
<span id="id_read_on_piloto" class="sc-ui-readonly-piloto css_piloto_line" style="<?php echo $sStyleReadLab_piloto; ?>"><?php echo $this->piloto; ?></span><span id="id_read_off_piloto" class="css_read_off_piloto" style="white-space: nowrap;<?php echo $sStyleReadInp_piloto; ?>">
 <input class="sc-js-input scFormObjectOdd css_piloto_obj" style="" id="id_sc_field_piloto" type=text name="piloto" value="<?php echo $this->form_encode_input($piloto) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['viaje']))
    {
        $this->nm_new_label['viaje'] = "BUQUE Y VIAJE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $viaje = $this->viaje;
   $sStyleHidden_viaje = '';
   if (isset($this->nmgp_cmp_hidden['viaje']) && $this->nmgp_cmp_hidden['viaje'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['viaje']);
       $sStyleHidden_viaje = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_viaje = 'display: none;';
   $sStyleReadInp_viaje = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['viaje']) && $this->nmgp_cmp_readonly['viaje'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['viaje']);
       $sStyleReadLab_viaje = '';
       $sStyleReadInp_viaje = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['viaje']) && $this->nmgp_cmp_hidden['viaje'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="viaje" value="<?php echo $this->form_encode_input($viaje) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_viaje_line" id="hidden_field_data_viaje" style="<?php echo $sStyleHidden_viaje; ?>"> <span class="scFormLabelOddFormat css_viaje_label"><span id="id_label_viaje"><?php echo $this->nm_new_label['viaje']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["viaje"]) &&  $this->nmgp_cmp_readonly["viaje"] == "on") { 

 ?>
<input type="hidden" name="viaje" value="<?php echo $this->form_encode_input($viaje) . "\">" . $viaje . ""; ?>
<?php } else { ?>
<span id="id_read_on_viaje" class="sc-ui-readonly-viaje css_viaje_line" style="<?php echo $sStyleReadLab_viaje; ?>"><?php echo $this->viaje; ?></span><span id="id_read_off_viaje" class="css_read_off_viaje" style="white-space: nowrap;<?php echo $sStyleReadInp_viaje; ?>">
 <input class="sc-js-input scFormObjectOdd css_viaje_obj" style="" id="id_sc_field_viaje" type=text name="viaje" value="<?php echo $this->form_encode_input($viaje) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
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
  $nm_sc_blocos_da_pag = array(0,1);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("Despachos");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("Despachos");
 parent.scAjaxDetailHeight("Despachos", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("Despachos", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("Despachos", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['sc_modal'])
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
	function scBtnFn_sc_btn_0() {
		if ($("#sc_sc_btn_0_top").length && $("#sc_sc_btn_0_top").is(":visible")) {
			sc_btn_sc_btn_0()
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
$_SESSION['sc_session'][$this->Ini->sc_page]['Despachos']['buttonStatus'] = $this->nmgp_botoes;
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
