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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("HORARIO MODULISTAS DE DESPACHO"); } else { echo strip_tags("HORARIO MODULISTAS DE DESPACHO"); } ?></TITLE>
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
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_fecharegistro button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechamodificacion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rangoinicial button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rangofinal button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>CALEN_MODULISTA_DESPACHO/CALEN_MODULISTA_DESPACHO_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("CALEN_MODULISTA_DESPACHO_sajax_js.php");
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

 function sc_calendar_all_day_click() {
  var allDayField = $("input[name='__calend_all_day__[]']");
  if (allDayField.length) {
     if (allDayField.prop("checked")) {
      scAjaxElementDisplay('hidden_field_label_horainicio', 'off');
      scAjaxElementDisplay('hidden_field_data_horainicio', 'off');
      scAjaxElementDisplay('hidden_field_label_horafin', 'off');
      scAjaxElementDisplay('hidden_field_data_horafin', 'off');
     }
     else {
      scAjaxElementDisplay('hidden_field_label_horainicio', 'on');
      scAjaxElementDisplay('hidden_field_data_horainicio', 'on');
      scAjaxElementDisplay('hidden_field_label_horafin', 'on');
      scAjaxElementDisplay('hidden_field_data_horafin', 'on');
     }
    }
 } // sc_calendar_all_day_click

 function sc_calendar_recurrence_change() {
          var recurField = $("#id_sc_field_reaparicion");
          if ("N" == recurField.val()) {
                  scAjaxElementDisplay("hidden_field_label_periodo", "off");
                  scAjaxElementDisplay("hidden_field_data_periodo", "off");
                  scAjaxElementDisplay("hidden_field_label_recur_info", "off");
                  scAjaxElementDisplay("hidden_field_data_recur_info", "off");
          }
          else {
                  scAjaxElementDisplay("hidden_field_label_periodo", "on");
                  scAjaxElementDisplay("hidden_field_data_periodo", "on");
                  scAjaxElementDisplay("hidden_field_label_recur_info", "on");
                  scAjaxElementDisplay("hidden_field_data_recur_info", "on");
          }
  
 } // sc_calendar_recurrence_change
<?php

include_once('CALEN_MODULISTA_DESPACHO_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  mainForm = document.getElementById('main_table_form');
  formResize();

  sc_calendar_all_day_click();
  sc_calendar_recurrence_change();

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
 function formResize()
 {
    var formWidth = mainForm.clientWidth,
        formHeight = mainForm.clientHeight,
        windowHeight = $(window.parent).height();
    if (0 == formWidth || 0 == formHeight)
    {
        setTimeout("formResize()", 50);
    }
    else
    {
        if (formHeight > windowHeight - 100)
        {
            formHeight = windowHeight - 100;
        }
        self.parent.tb_resize(formHeight + 50, formWidth + 50);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("CALEN_MODULISTA_DESPACHO_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['CALEN_MODULISTA_DESPACHO'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['CALEN_MODULISTA_DESPACHO'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "HORARIO MODULISTAS DE DESPACHO"; } else { echo "HORARIO MODULISTAS DE DESPACHO"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idtipodemodulista']))
   {
       $this->nm_new_label['idtipodemodulista'] = "Tipo de Modulista";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idtipodemodulista = $this->idtipodemodulista;
   $sStyleHidden_idtipodemodulista = '';
   if (isset($this->nmgp_cmp_hidden['idtipodemodulista']) && $this->nmgp_cmp_hidden['idtipodemodulista'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idtipodemodulista']);
       $sStyleHidden_idtipodemodulista = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idtipodemodulista = 'display: none;';
   $sStyleReadInp_idtipodemodulista = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idtipodemodulista']) && $this->nmgp_cmp_readonly['idtipodemodulista'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idtipodemodulista']);
       $sStyleReadLab_idtipodemodulista = '';
       $sStyleReadInp_idtipodemodulista = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idtipodemodulista']) && $this->nmgp_cmp_hidden['idtipodemodulista'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idtipodemodulista" value="<?php echo $this->form_encode_input($this->idtipodemodulista) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idtipodemodulista_label" id="hidden_field_label_idtipodemodulista" style="<?php echo $sStyleHidden_idtipodemodulista; ?>"><span id="id_label_idtipodemodulista"><?php echo $this->nm_new_label['idtipodemodulista']; ?></span></TD>
    <TD class="scFormDataOdd css_idtipodemodulista_line" id="hidden_field_data_idtipodemodulista" style="<?php echo $sStyleHidden_idtipodemodulista; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idtipodemodulista_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idtipodemodulista"]) &&  $this->nmgp_cmp_readonly["idtipodemodulista"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['Lookup_idtipodemodulista']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['Lookup_idtipodemodulista']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['Lookup_idtipodemodulista'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['Lookup_idtipodemodulista']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['Lookup_idtipodemodulista']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['Lookup_idtipodemodulista'] = array(); 
    }

   $old_value_cantidadmodulistas = $this->cantidadmodulistas;
   $old_value_fecharegistro = $this->fecharegistro;
   $old_value_fecharegistro_hora = $this->fecharegistro_hora;
   $old_value_fechamodificacion = $this->fechamodificacion;
   $old_value_rangoinicial = $this->rangoinicial;
   $old_value_rangofinal = $this->rangofinal;
   $old_value_horainicio = $this->horainicio;
   $old_value_horafin = $this->horafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidadmodulistas = $this->cantidadmodulistas;
   $unformatted_value_fecharegistro = $this->fecharegistro;
   $unformatted_value_fecharegistro_hora = $this->fecharegistro_hora;
   $unformatted_value_fechamodificacion = $this->fechamodificacion;
   $unformatted_value_rangoinicial = $this->rangoinicial;
   $unformatted_value_rangofinal = $this->rangofinal;
   $unformatted_value_horainicio = $this->horainicio;
   $unformatted_value_horafin = $this->horafin;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idtipodeModulista, tipoModulista  FROM tipodemodulista  ORDER BY tipoModulista";

   $this->cantidadmodulistas = $old_value_cantidadmodulistas;
   $this->fecharegistro = $old_value_fecharegistro;
   $this->fecharegistro_hora = $old_value_fecharegistro_hora;
   $this->fechamodificacion = $old_value_fechamodificacion;
   $this->rangoinicial = $old_value_rangoinicial;
   $this->rangofinal = $old_value_rangofinal;
   $this->horainicio = $old_value_horainicio;
   $this->horafin = $old_value_horafin;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['Lookup_idtipodemodulista'][] = $rs->fields[0];
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
   $idtipodemodulista_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipodemodulista_1))
          {
              foreach ($this->idtipodemodulista_1 as $tmp_idtipodemodulista)
              {
                  if (trim($tmp_idtipodemodulista) === trim($cadaselect[1])) { $idtipodemodulista_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipodemodulista) === trim($cadaselect[1])) { $idtipodemodulista_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idtipodemodulista" value="<?php echo $this->form_encode_input($idtipodemodulista) . "\">" . $idtipodemodulista_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idtipodemodulista();
   $x = 0 ; 
   $idtipodemodulista_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipodemodulista_1))
          {
              foreach ($this->idtipodemodulista_1 as $tmp_idtipodemodulista)
              {
                  if (trim($tmp_idtipodemodulista) === trim($cadaselect[1])) { $idtipodemodulista_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipodemodulista) === trim($cadaselect[1])) { $idtipodemodulista_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idtipodemodulista_look))
          {
              $idtipodemodulista_look = $this->idtipodemodulista;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idtipodemodulista\" class=\"css_idtipodemodulista_line\" style=\"" .  $sStyleReadLab_idtipodemodulista . "\">" . $this->form_encode_input($idtipodemodulista_look) . "</span><span id=\"id_read_off_idtipodemodulista\" class=\"css_read_off_idtipodemodulista\" style=\"white-space: nowrap; " . $sStyleReadInp_idtipodemodulista . "\">";
   echo " <span id=\"idAjaxSelect_idtipodemodulista\"><select class=\"sc-js-input scFormObjectOdd css_idtipodemodulista_obj\" style=\"\" id=\"id_sc_field_idtipodemodulista\" name=\"idtipodemodulista\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idtipodemodulista) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idtipodemodulista)) 
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_idtipodemodulista_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idtipodemodulista_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cantidadmodulistas']))
    {
        $this->nm_new_label['cantidadmodulistas'] = "Cantidad Modulistas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidadmodulistas = $this->cantidadmodulistas;
   $sStyleHidden_cantidadmodulistas = '';
   if (isset($this->nmgp_cmp_hidden['cantidadmodulistas']) && $this->nmgp_cmp_hidden['cantidadmodulistas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidadmodulistas']);
       $sStyleHidden_cantidadmodulistas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidadmodulistas = 'display: none;';
   $sStyleReadInp_cantidadmodulistas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantidadmodulistas']) && $this->nmgp_cmp_readonly['cantidadmodulistas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidadmodulistas']);
       $sStyleReadLab_cantidadmodulistas = '';
       $sStyleReadInp_cantidadmodulistas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidadmodulistas']) && $this->nmgp_cmp_hidden['cantidadmodulistas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidadmodulistas" value="<?php echo $this->form_encode_input($cantidadmodulistas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cantidadmodulistas_label" id="hidden_field_label_cantidadmodulistas" style="<?php echo $sStyleHidden_cantidadmodulistas; ?>"><span id="id_label_cantidadmodulistas"><?php echo $this->nm_new_label['cantidadmodulistas']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['cantidadmodulistas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['cantidadmodulistas'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_cantidadmodulistas_line" id="hidden_field_data_cantidadmodulistas" style="<?php echo $sStyleHidden_cantidadmodulistas; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidadmodulistas_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidadmodulistas"]) &&  $this->nmgp_cmp_readonly["cantidadmodulistas"] == "on") { 

 ?>
<input type="hidden" name="cantidadmodulistas" value="<?php echo $this->form_encode_input($cantidadmodulistas) . "\">" . $cantidadmodulistas . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidadmodulistas" class="sc-ui-readonly-cantidadmodulistas css_cantidadmodulistas_line" style="<?php echo $sStyleReadLab_cantidadmodulistas; ?>"><?php echo $this->cantidadmodulistas; ?></span><span id="id_read_off_cantidadmodulistas" class="css_read_off_cantidadmodulistas" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidadmodulistas; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidadmodulistas_obj" style="" id="id_sc_field_cantidadmodulistas" type=text name="cantidadmodulistas" value="<?php echo $this->form_encode_input($cantidadmodulistas) ?>"
 size=2 alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidadmodulistas']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidadmodulistas']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidadmodulistas']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_cantidadmodulistas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidadmodulistas_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecharegistro']))
    {
        $this->nm_new_label['fecharegistro'] = "Fecha Registro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecharegistro = $this->fecharegistro;
   if (strlen($this->fecharegistro_hora) > 8 ) {$this->fecharegistro_hora = substr($this->fecharegistro_hora, 0, 8);}
   $this->fecharegistro .= ' ' . $this->fecharegistro_hora;
   $fecharegistro = $this->fecharegistro;
   $sStyleHidden_fecharegistro = '';
   if (isset($this->nmgp_cmp_hidden['fecharegistro']) && $this->nmgp_cmp_hidden['fecharegistro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecharegistro']);
       $sStyleHidden_fecharegistro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecharegistro = 'display: none;';
   $sStyleReadInp_fecharegistro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecharegistro']) && $this->nmgp_cmp_readonly['fecharegistro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecharegistro']);
       $sStyleReadLab_fecharegistro = '';
       $sStyleReadInp_fecharegistro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecharegistro']) && $this->nmgp_cmp_hidden['fecharegistro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecharegistro" value="<?php echo $this->form_encode_input($fecharegistro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecharegistro_label" id="hidden_field_label_fecharegistro" style="<?php echo $sStyleHidden_fecharegistro; ?>"><span id="id_label_fecharegistro"><?php echo $this->nm_new_label['fecharegistro']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['fecharegistro']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['fecharegistro'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fecharegistro_line" id="hidden_field_data_fecharegistro" style="<?php echo $sStyleHidden_fecharegistro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecharegistro_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecharegistro"]) &&  $this->nmgp_cmp_readonly["fecharegistro"] == "on") { 

 ?>
<input type="hidden" name="fecharegistro" value="<?php echo $this->form_encode_input($fecharegistro) . "\">" . $fecharegistro . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecharegistro" class="sc-ui-readonly-fecharegistro css_fecharegistro_line" style="<?php echo $sStyleReadLab_fecharegistro; ?>"><?php echo $fecharegistro; ?></span><span id="id_read_off_fecharegistro" class="css_read_off_fecharegistro" style="white-space: nowrap;<?php echo $sStyleReadInp_fecharegistro; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_fecharegistro_obj" style="" id="id_sc_field_fecharegistro" type=text name="fecharegistro" value="<?php echo $this->form_encode_input($fecharegistro) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecharegistro']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecharegistro']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecharegistro']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['fecharegistro']['date_format'];
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_fecharegistro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecharegistro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecharegistro = $old_dt_fecharegistro;
?>

   <?php
    if (!isset($this->nm_new_label['fechamodificacion']))
    {
        $this->nm_new_label['fechamodificacion'] = "Fecha Modificacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechamodificacion = $this->fechamodificacion;
   $sStyleHidden_fechamodificacion = '';
   if (isset($this->nmgp_cmp_hidden['fechamodificacion']) && $this->nmgp_cmp_hidden['fechamodificacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechamodificacion']);
       $sStyleHidden_fechamodificacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechamodificacion = 'display: none;';
   $sStyleReadInp_fechamodificacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechamodificacion']) && $this->nmgp_cmp_readonly['fechamodificacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechamodificacion']);
       $sStyleReadLab_fechamodificacion = '';
       $sStyleReadInp_fechamodificacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechamodificacion']) && $this->nmgp_cmp_hidden['fechamodificacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechamodificacion" value="<?php echo $this->form_encode_input($fechamodificacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechamodificacion_label" id="hidden_field_label_fechamodificacion" style="<?php echo $sStyleHidden_fechamodificacion; ?>"><span id="id_label_fechamodificacion"><?php echo $this->nm_new_label['fechamodificacion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['fechamodificacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['fechamodificacion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fechamodificacion_line" id="hidden_field_data_fechamodificacion" style="<?php echo $sStyleHidden_fechamodificacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechamodificacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechamodificacion"]) &&  $this->nmgp_cmp_readonly["fechamodificacion"] == "on") { 

 ?>
<input type="hidden" name="fechamodificacion" value="<?php echo $this->form_encode_input($fechamodificacion) . "\">" . $fechamodificacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechamodificacion" class="sc-ui-readonly-fechamodificacion css_fechamodificacion_line" style="<?php echo $sStyleReadLab_fechamodificacion; ?>"><?php echo $fechamodificacion; ?></span><span id="id_read_off_fechamodificacion" class="css_read_off_fechamodificacion" style="white-space: nowrap;<?php echo $sStyleReadInp_fechamodificacion; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_fechamodificacion_obj" style="" id="id_sc_field_fechamodificacion" type=text name="fechamodificacion" value="<?php echo $this->form_encode_input($fechamodificacion) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechamodificacion']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechamodificacion']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['fechamodificacion']['date_format'];
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_fechamodificacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechamodificacion_text"></span></td></tr></table></td></tr></table></TD>
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
    if (!isset($this->nm_new_label['rangoinicial']))
    {
        $this->nm_new_label['rangoinicial'] = "Rango Inicial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rangoinicial = $this->rangoinicial;
   $sStyleHidden_rangoinicial = '';
   if (isset($this->nmgp_cmp_hidden['rangoinicial']) && $this->nmgp_cmp_hidden['rangoinicial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rangoinicial']);
       $sStyleHidden_rangoinicial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rangoinicial = 'display: none;';
   $sStyleReadInp_rangoinicial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rangoinicial']) && $this->nmgp_cmp_readonly['rangoinicial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rangoinicial']);
       $sStyleReadLab_rangoinicial = '';
       $sStyleReadInp_rangoinicial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rangoinicial']) && $this->nmgp_cmp_hidden['rangoinicial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rangoinicial" value="<?php echo $this->form_encode_input($rangoinicial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rangoinicial_label" id="hidden_field_label_rangoinicial" style="<?php echo $sStyleHidden_rangoinicial; ?>"><span id="id_label_rangoinicial"><?php echo $this->nm_new_label['rangoinicial']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['rangoinicial']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['rangoinicial'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rangoinicial_line" id="hidden_field_data_rangoinicial" style="<?php echo $sStyleHidden_rangoinicial; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rangoinicial_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rangoinicial"]) &&  $this->nmgp_cmp_readonly["rangoinicial"] == "on") { 

 ?>
<input type="hidden" name="rangoinicial" value="<?php echo $this->form_encode_input($rangoinicial) . "\">" . $rangoinicial . ""; ?>
<?php } else { ?>
<span id="id_read_on_rangoinicial" class="sc-ui-readonly-rangoinicial css_rangoinicial_line" style="<?php echo $sStyleReadLab_rangoinicial; ?>"><?php echo $rangoinicial; ?></span><span id="id_read_off_rangoinicial" class="css_read_off_rangoinicial" style="white-space: nowrap;<?php echo $sStyleReadInp_rangoinicial; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_rangoinicial_obj" style="" id="id_sc_field_rangoinicial" type=text name="rangoinicial" value="<?php echo $this->form_encode_input($rangoinicial) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rangoinicial']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rangoinicial']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['rangoinicial']['date_format'];
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_rangoinicial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rangoinicial_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['rangofinal']))
    {
        $this->nm_new_label['rangofinal'] = "Rango Final";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rangofinal = $this->rangofinal;
   $sStyleHidden_rangofinal = '';
   if (isset($this->nmgp_cmp_hidden['rangofinal']) && $this->nmgp_cmp_hidden['rangofinal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rangofinal']);
       $sStyleHidden_rangofinal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rangofinal = 'display: none;';
   $sStyleReadInp_rangofinal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rangofinal']) && $this->nmgp_cmp_readonly['rangofinal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rangofinal']);
       $sStyleReadLab_rangofinal = '';
       $sStyleReadInp_rangofinal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rangofinal']) && $this->nmgp_cmp_hidden['rangofinal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rangofinal" value="<?php echo $this->form_encode_input($rangofinal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rangofinal_label" id="hidden_field_label_rangofinal" style="<?php echo $sStyleHidden_rangofinal; ?>"><span id="id_label_rangofinal"><?php echo $this->nm_new_label['rangofinal']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['rangofinal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['rangofinal'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rangofinal_line" id="hidden_field_data_rangofinal" style="<?php echo $sStyleHidden_rangofinal; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rangofinal_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rangofinal"]) &&  $this->nmgp_cmp_readonly["rangofinal"] == "on") { 

 ?>
<input type="hidden" name="rangofinal" value="<?php echo $this->form_encode_input($rangofinal) . "\">" . $rangofinal . ""; ?>
<?php } else { ?>
<span id="id_read_on_rangofinal" class="sc-ui-readonly-rangofinal css_rangofinal_line" style="<?php echo $sStyleReadLab_rangofinal; ?>"><?php echo $rangofinal; ?></span><span id="id_read_off_rangofinal" class="css_read_off_rangofinal" style="white-space: nowrap;<?php echo $sStyleReadInp_rangofinal; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_rangofinal_obj" style="" id="id_sc_field_rangofinal" type=text name="rangofinal" value="<?php echo $this->form_encode_input($rangofinal) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rangofinal']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rangofinal']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['rangofinal']['date_format'];
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_rangofinal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rangofinal_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['horainicio']))
    {
        $this->nm_new_label['horainicio'] = "Hora Inicio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $horainicio = $this->horainicio;
   $sStyleHidden_horainicio = '';
   if (isset($this->nmgp_cmp_hidden['horainicio']) && $this->nmgp_cmp_hidden['horainicio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['horainicio']);
       $sStyleHidden_horainicio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_horainicio = 'display: none;';
   $sStyleReadInp_horainicio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['horainicio']) && $this->nmgp_cmp_readonly['horainicio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['horainicio']);
       $sStyleReadLab_horainicio = '';
       $sStyleReadInp_horainicio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['horainicio']) && $this->nmgp_cmp_hidden['horainicio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="horainicio" value="<?php echo $this->form_encode_input($horainicio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_horainicio_label" id="hidden_field_label_horainicio" style="<?php echo $sStyleHidden_horainicio; ?>"><span id="id_label_horainicio"><?php echo $this->nm_new_label['horainicio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['horainicio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['horainicio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_horainicio_line" id="hidden_field_data_horainicio" style="<?php echo $sStyleHidden_horainicio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_horainicio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["horainicio"]) &&  $this->nmgp_cmp_readonly["horainicio"] == "on") { 

 ?>
<input type="hidden" name="horainicio" value="<?php echo $this->form_encode_input($horainicio) . "\">" . $horainicio . ""; ?>
<?php } else { ?>
<span id="id_read_on_horainicio" class="sc-ui-readonly-horainicio css_horainicio_line" style="<?php echo $sStyleReadLab_horainicio; ?>"><?php echo $horainicio; ?></span><span id="id_read_off_horainicio" class="css_read_off_horainicio" style="white-space: nowrap;<?php echo $sStyleReadInp_horainicio; ?>">
 <input class="sc-js-input scFormObjectOdd css_horainicio_obj" style="" id="id_sc_field_horainicio" type=text name="horainicio" value="<?php echo $this->form_encode_input($horainicio) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['horainicio']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['horainicio']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['horainicio']['date_format'];
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_horainicio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_horainicio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['horafin']))
    {
        $this->nm_new_label['horafin'] = "Hora Fin";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $horafin = $this->horafin;
   $sStyleHidden_horafin = '';
   if (isset($this->nmgp_cmp_hidden['horafin']) && $this->nmgp_cmp_hidden['horafin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['horafin']);
       $sStyleHidden_horafin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_horafin = 'display: none;';
   $sStyleReadInp_horafin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['horafin']) && $this->nmgp_cmp_readonly['horafin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['horafin']);
       $sStyleReadLab_horafin = '';
       $sStyleReadInp_horafin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['horafin']) && $this->nmgp_cmp_hidden['horafin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="horafin" value="<?php echo $this->form_encode_input($horafin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_horafin_label" id="hidden_field_label_horafin" style="<?php echo $sStyleHidden_horafin; ?>"><span id="id_label_horafin"><?php echo $this->nm_new_label['horafin']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['horafin']) || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['php_cmp_required']['horafin'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_horafin_line" id="hidden_field_data_horafin" style="<?php echo $sStyleHidden_horafin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_horafin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["horafin"]) &&  $this->nmgp_cmp_readonly["horafin"] == "on") { 

 ?>
<input type="hidden" name="horafin" value="<?php echo $this->form_encode_input($horafin) . "\">" . $horafin . ""; ?>
<?php } else { ?>
<span id="id_read_on_horafin" class="sc-ui-readonly-horafin css_horafin_line" style="<?php echo $sStyleReadLab_horafin; ?>"><?php echo $horafin; ?></span><span id="id_read_off_horafin" class="css_read_off_horafin" style="white-space: nowrap;<?php echo $sStyleReadInp_horafin; ?>">
 <input class="sc-js-input scFormObjectOdd css_horafin_obj" style="" id="id_sc_field_horafin" type=text name="horafin" value="<?php echo $this->form_encode_input($horafin) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['horafin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['horafin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['horafin']['date_format'];
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_horafin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_horafin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
       <?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if ($NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_1";
        echo "<img id=\"NM_sep_1\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['run_iframe'] != "R")
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("CALEN_MODULISTA_DESPACHO");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("CALEN_MODULISTA_DESPACHO");
 parent.scAjaxDetailHeight("CALEN_MODULISTA_DESPACHO", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("CALEN_MODULISTA_DESPACHO", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("CALEN_MODULISTA_DESPACHO", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['sc_modal'])
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
		if ($("#sc_b_new_b.sc-unique-btn-1").length && $("#sc_b_new_b.sc-unique-btn-1").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-2").length && $("#sc_b_ins_b.sc-unique-btn-2").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_b.sc-unique-btn-3").length && $("#sc_b_upd_b.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_b.sc-unique-btn-4").length && $("#sc_b_del_b.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-5").length && $("#sys_separator.sc-unique-btn-5").is(":visible")) {
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_b.sc-unique-btn-6").length && $("#sc_b_sai_b.sc-unique-btn-6").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-7").length && $("#sc_b_sai_b.sc-unique-btn-7").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-8").length && $("#sc_b_sai_b.sc-unique-btn-8").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['CALEN_MODULISTA_DESPACHO']['buttonStatus'] = $this->nmgp_botoes;
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
