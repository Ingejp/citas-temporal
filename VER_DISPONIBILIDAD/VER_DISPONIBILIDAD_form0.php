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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - asignacionmodulista"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - asignacionmodulista"); } ?></TITLE>
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
.css_read_off_rangofinal button {
	background-color: transparent;
	border: 0;
	padding: 0
}
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
</style>
<?php
}
?>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>VER_DISPONIBILIDAD/VER_DISPONIBILIDAD_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("VER_DISPONIBILIDAD_sajax_js.php");
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
      scAjaxElementDisplay('id_read_off_horafin_hora', 'off');
     }
     else {
      scAjaxElementDisplay('hidden_field_label_horainicio', 'on');
      scAjaxElementDisplay('hidden_field_data_horainicio', 'on');
      scAjaxElementDisplay('id_read_off_horafin_hora', 'on');
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

include_once('VER_DISPONIBILIDAD_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("VER_DISPONIBILIDAD_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['VER_DISPONIBILIDAD'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['VER_DISPONIBILIDAD'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - asignacionmodulista"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - asignacionmodulista"; } ?></div>
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idasignacionmodulista']))
           {
               $this->nmgp_cmp_readonly['idasignacionmodulista'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idasignacionmodulista']))
    {
        $this->nm_new_label['idasignacionmodulista'] = "Idasignacion Modulista";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idasignacionmodulista = $this->idasignacionmodulista;
   $sStyleHidden_idasignacionmodulista = '';
   if (isset($this->nmgp_cmp_hidden['idasignacionmodulista']) && $this->nmgp_cmp_hidden['idasignacionmodulista'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idasignacionmodulista']);
       $sStyleHidden_idasignacionmodulista = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idasignacionmodulista = 'display: none;';
   $sStyleReadInp_idasignacionmodulista = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idasignacionmodulista"]) &&  $this->nmgp_cmp_readonly["idasignacionmodulista"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idasignacionmodulista']);
       $sStyleReadLab_idasignacionmodulista = '';
       $sStyleReadInp_idasignacionmodulista = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idasignacionmodulista']) && $this->nmgp_cmp_hidden['idasignacionmodulista'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idasignacionmodulista" value="<?php echo $this->form_encode_input($idasignacionmodulista) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idasignacionmodulista_label" id="hidden_field_label_idasignacionmodulista" style="<?php echo $sStyleHidden_idasignacionmodulista; ?>"><span id="id_label_idasignacionmodulista"><?php echo $this->nm_new_label['idasignacionmodulista']; ?></span></TD>
    <TD class="scFormDataOdd css_idasignacionmodulista_line" id="hidden_field_data_idasignacionmodulista" style="<?php echo $sStyleHidden_idasignacionmodulista; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idasignacionmodulista_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idasignacionmodulista" class="css_idasignacionmodulista_line" style="<?php echo $sStyleReadLab_idasignacionmodulista; ?>"><?php echo $this->form_encode_input($this->idasignacionmodulista); ?></span><span id="id_read_off_idasignacionmodulista" class="css_read_off_idasignacionmodulista" style="<?php echo $sStyleReadInp_idasignacionmodulista; ?>"><input type="hidden" name="idasignacionmodulista" value="<?php echo $this->form_encode_input($idasignacionmodulista) . "\">"?><span id="id_ajax_label_idasignacionmodulista"><?php echo nl2br($idasignacionmodulista); ?></span>
</span></span></td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_idasignacionmodulista_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idasignacionmodulista_text"></span></td></tr></table></td></tr></table></TD>
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
    if (!isset($this->nm_new_label['descripcion']))
    {
        $this->nm_new_label['descripcion'] = "Descripcion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descripcion = $this->descripcion;
   $sStyleHidden_descripcion = '';
   if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descripcion']);
       $sStyleHidden_descripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descripcion = 'display: none;';
   $sStyleReadInp_descripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descripcion']) && $this->nmgp_cmp_readonly['descripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descripcion']);
       $sStyleReadLab_descripcion = '';
       $sStyleReadInp_descripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descripcion" value="<?php echo $this->form_encode_input($descripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descripcion_label" id="hidden_field_label_descripcion" style="<?php echo $sStyleHidden_descripcion; ?>"><span id="id_label_descripcion"><?php echo $this->nm_new_label['descripcion']; ?></span></TD>
    <TD class="scFormDataOdd css_descripcion_line" id="hidden_field_data_descripcion" style="<?php echo $sStyleHidden_descripcion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descripcion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descripcion"]) &&  $this->nmgp_cmp_readonly["descripcion"] == "on") { 

 ?>
<input type="hidden" name="descripcion" value="<?php echo $this->form_encode_input($descripcion) . "\">" . $descripcion . ""; ?>
<?php } else { ?>
<span id="id_read_on_descripcion" class="sc-ui-readonly-descripcion css_descripcion_line" style="<?php echo $sStyleReadLab_descripcion; ?>"><?php echo $this->descripcion; ?></span><span id="id_read_off_descripcion" class="css_read_off_descripcion" style="white-space: nowrap;<?php echo $sStyleReadInp_descripcion; ?>">
 <input class="sc-js-input scFormObjectOdd css_descripcion_obj" style="" id="id_sc_field_descripcion" type=text name="descripcion" value="<?php echo $this->form_encode_input($descripcion) ?>"
 size=50 maxlength=145 alt="{datatype: 'text', maxLength: 145, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_descripcion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descripcion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cantidadmodulistas_label" id="hidden_field_label_cantidadmodulistas" style="<?php echo $sStyleHidden_cantidadmodulistas; ?>"><span id="id_label_cantidadmodulistas"><?php echo $this->nm_new_label['cantidadmodulistas']; ?></span></TD>
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
    if (!isset($this->nm_new_label['rangofinal']))
    {
        $this->nm_new_label['rangofinal'] = "Rango Final";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_rangofinal = $this->rangofinal;
   if (strlen($this->rangofinal_hora) > 8 ) {$this->rangofinal_hora = substr($this->rangofinal_hora, 0, 8);}
   $this->rangofinal .= ' ' . $this->rangofinal_hora;
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rangofinal_label" id="hidden_field_label_rangofinal" style="<?php echo $sStyleHidden_rangofinal; ?>"><span id="id_label_rangofinal"><?php echo $this->nm_new_label['rangofinal']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['rangofinal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['rangofinal'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['rangofinal']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rangofinal']['date_format']; ?>', timeSep: '<?php echo $this->field_config['rangofinal']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
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
<?php
   $this->rangofinal = $old_dt_rangofinal;
?>

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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecharegistro_label" id="hidden_field_label_fecharegistro" style="<?php echo $sStyleHidden_fecharegistro; ?>"><span id="id_label_fecharegistro"><?php echo $this->nm_new_label['fecharegistro']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['fecharegistro']) || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['fecharegistro'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechamodificacion']))
    {
        $this->nm_new_label['fechamodificacion'] = "Fecha Modificacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fechamodificacion = $this->fechamodificacion;
   if (strlen($this->fechamodificacion_hora) > 8 ) {$this->fechamodificacion_hora = substr($this->fechamodificacion_hora, 0, 8);}
   $this->fechamodificacion .= ' ' . $this->fechamodificacion_hora;
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechamodificacion_label" id="hidden_field_label_fechamodificacion" style="<?php echo $sStyleHidden_fechamodificacion; ?>"><span id="id_label_fechamodificacion"><?php echo $this->nm_new_label['fechamodificacion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['fechamodificacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['fechamodificacion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fechamodificacion']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechamodificacion']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fechamodificacion']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
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
<?php
   $this->fechamodificacion = $old_dt_fechamodificacion;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_api']))
    {
        $this->nm_new_label['id_api'] = "Id Api";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_api = $this->id_api;
   $sStyleHidden_id_api = '';
   if (isset($this->nmgp_cmp_hidden['id_api']) && $this->nmgp_cmp_hidden['id_api'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_api']);
       $sStyleHidden_id_api = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_api = 'display: none;';
   $sStyleReadInp_id_api = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_api']) && $this->nmgp_cmp_readonly['id_api'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_api']);
       $sStyleReadLab_id_api = '';
       $sStyleReadInp_id_api = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_api']) && $this->nmgp_cmp_hidden['id_api'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_api" value="<?php echo $this->form_encode_input($id_api) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_api_label" id="hidden_field_label_id_api" style="<?php echo $sStyleHidden_id_api; ?>"><span id="id_label_id_api"><?php echo $this->nm_new_label['id_api']; ?></span></TD>
    <TD class="scFormDataOdd css_id_api_line" id="hidden_field_data_id_api" style="<?php echo $sStyleHidden_id_api; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_api_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_api" style="<?php echo $sStyleReadLab_id_api; ?>"></span><span id="id_read_off_id_api" class="css_read_off_id_api" style="<?php echo $sStyleReadInp_id_api; ?>"><input type="hidden" name="id_api" id="id_sc_field_id_api" value="<?php echo $this->form_encode_input($this->id_api) ?>" />
<?php echo $this->form_encode_input($this->id_api); ?>
</span></td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_id_api_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_api_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['event_color']))
    {
        $this->nm_new_label['event_color'] = "Event Color";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $event_color = $this->event_color;
   $sStyleHidden_event_color = '';
   if (isset($this->nmgp_cmp_hidden['event_color']) && $this->nmgp_cmp_hidden['event_color'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['event_color']);
       $sStyleHidden_event_color = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_event_color = 'display: none;';
   $sStyleReadInp_event_color = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['event_color']) && $this->nmgp_cmp_readonly['event_color'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['event_color']);
       $sStyleReadLab_event_color = '';
       $sStyleReadInp_event_color = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['event_color']) && $this->nmgp_cmp_hidden['event_color'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="event_color" value="<?php echo $this->form_encode_input($event_color) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_event_color_label" id="hidden_field_label_event_color" style="<?php echo $sStyleHidden_event_color; ?>"><span id="id_label_event_color"><?php echo $this->nm_new_label['event_color']; ?></span></TD>
    <TD class="scFormDataOdd css_event_color_line" id="hidden_field_data_event_color" style="<?php echo $sStyleHidden_event_color; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_event_color_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["event_color"]) &&  $this->nmgp_cmp_readonly["event_color"] == "on") { 

 ?>
<input type="hidden" name="event_color" value="<?php echo $this->form_encode_input($event_color) . "\">" . $event_color . ""; ?>
<?php } else { ?>
<span id="id_read_on_event_color" class="sc-ui-readonly-event_color css_event_color_line" style="<?php echo $sStyleReadLab_event_color; ?>"><?php echo $this->event_color; ?></span><span id="id_read_off_event_color" class="css_read_off_event_color" style="white-space: nowrap;<?php echo $sStyleReadInp_event_color; ?>">
 <input class="sc-js-input scFormObjectOdd css_event_color_obj" style="display: none;" id="id_sc_field_event_color" type=text name="event_color" value="<?php echo $this->form_encode_input($event_color) ?>"
 size=50 maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#9a9cff')?'scFormColorPaleteItemChecked':'' ?>' valor='#9a9cff' onclick='setaCorPaleta("event_color", "#9a9cff")' style='border-color:#9a9cff;background-color:#9a9cff; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#5484ed')?'scFormColorPaleteItemChecked':'' ?>' valor='#5484ed' onclick='setaCorPaleta("event_color", "#5484ed")' style='border-color:#5484ed;background-color:#5484ed; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#a4bdfc')?'scFormColorPaleteItemChecked':'' ?>' valor='#a4bdfc' onclick='setaCorPaleta("event_color", "#a4bdfc")' style='border-color:#a4bdfc;background-color:#a4bdfc; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#46d6db')?'scFormColorPaleteItemChecked':'' ?>' valor='#46d6db' onclick='setaCorPaleta("event_color", "#46d6db")' style='border-color:#46d6db;background-color:#46d6db; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#7ae7bf')?'scFormColorPaleteItemChecked':'' ?>' valor='#7ae7bf' onclick='setaCorPaleta("event_color", "#7ae7bf")' style='border-color:#7ae7bf;background-color:#7ae7bf; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#51b749')?'scFormColorPaleteItemChecked':'' ?>' valor='#51b749' onclick='setaCorPaleta("event_color", "#51b749")' style='border-color:#51b749;background-color:#51b749; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#fbd75b')?'scFormColorPaleteItemChecked':'' ?>' valor='#fbd75b' onclick='setaCorPaleta("event_color", "#fbd75b")' style='border-color:#fbd75b;background-color:#fbd75b; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#ffb878')?'scFormColorPaleteItemChecked':'' ?>' valor='#ffb878' onclick='setaCorPaleta("event_color", "#ffb878")' style='border-color:#ffb878;background-color:#ffb878; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#ff887c')?'scFormColorPaleteItemChecked':'' ?>' valor='#ff887c' onclick='setaCorPaleta("event_color", "#ff887c")' style='border-color:#ff887c;background-color:#ff887c; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#dc2127')?'scFormColorPaleteItemChecked':'' ?>' valor='#dc2127' onclick='setaCorPaleta("event_color", "#dc2127")' style='border-color:#dc2127;background-color:#dc2127; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#dbadff')?'scFormColorPaleteItemChecked':'' ?>' valor='#dbadff' onclick='setaCorPaleta("event_color", "#dbadff")' style='border-color:#dbadff;background-color:#dbadff; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '#e1e1e1')?'scFormColorPaleteItemChecked':'' ?>' valor='#e1e1e1' onclick='setaCorPaleta("event_color", "#e1e1e1")' style='border-color:#e1e1e1;background-color:#e1e1e1; '></div><div class='colors_event_color scFormColorPaleteItem <?php echo ($this->form_encode_input($this->event_color) == '')?'scFormColorPaleteItemChecked':'' ?>' valor='' onclick='setaCorPaleta("event_color", "")' style='border-style:dotted;background-color:#fff; '></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_event_color_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_event_color_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idtipodemodulista']))
   {
       $this->nm_new_label['idtipodemodulista'] = "Idtipode Modulista";
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_idtipodemodulista']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_idtipodemodulista']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_idtipodemodulista'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_idtipodemodulista']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_idtipodemodulista'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_idtipodemodulista']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_idtipodemodulista'] = array(); 
    }

   $old_value_idasignacionmodulista = $this->idasignacionmodulista;
   $old_value_cantidadmodulistas = $this->cantidadmodulistas;
   $old_value_rangofinal = $this->rangofinal;
   $old_value_rangofinal_hora = $this->rangofinal_hora;
   $old_value_fecharegistro = $this->fecharegistro;
   $old_value_fecharegistro_hora = $this->fecharegistro_hora;
   $old_value_fechamodificacion = $this->fechamodificacion;
   $old_value_fechamodificacion_hora = $this->fechamodificacion_hora;
   $old_value_citas_disponibles = $this->citas_disponibles;
   $old_value_citas_reservadas = $this->citas_reservadas;
   $old_value_rangoinicial = $this->rangoinicial;
   $old_value_rangoinicial_hora = $this->rangoinicial_hora;
   $old_value_horafin = $this->horafin;
   $old_value_horainicio = $this->horainicio;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idasignacionmodulista = $this->idasignacionmodulista;
   $unformatted_value_cantidadmodulistas = $this->cantidadmodulistas;
   $unformatted_value_rangofinal = $this->rangofinal;
   $unformatted_value_rangofinal_hora = $this->rangofinal_hora;
   $unformatted_value_fecharegistro = $this->fecharegistro;
   $unformatted_value_fecharegistro_hora = $this->fecharegistro_hora;
   $unformatted_value_fechamodificacion = $this->fechamodificacion;
   $unformatted_value_fechamodificacion_hora = $this->fechamodificacion_hora;
   $unformatted_value_citas_disponibles = $this->citas_disponibles;
   $unformatted_value_citas_reservadas = $this->citas_reservadas;
   $unformatted_value_rangoinicial = $this->rangoinicial;
   $unformatted_value_rangoinicial_hora = $this->rangoinicial_hora;
   $unformatted_value_horafin = $this->horafin;
   $unformatted_value_horainicio = $this->horainicio;

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
   $nm_comando = "SELECT idtipodeModulista, idtipodeModulista FROM tipodemodulista ORDER BY idtipodeModulista";

   $this->idasignacionmodulista = $old_value_idasignacionmodulista;
   $this->cantidadmodulistas = $old_value_cantidadmodulistas;
   $this->rangofinal = $old_value_rangofinal;
   $this->rangofinal_hora = $old_value_rangofinal_hora;
   $this->fecharegistro = $old_value_fecharegistro;
   $this->fecharegistro_hora = $old_value_fecharegistro_hora;
   $this->fechamodificacion = $old_value_fechamodificacion;
   $this->fechamodificacion_hora = $old_value_fechamodificacion_hora;
   $this->citas_disponibles = $old_value_citas_disponibles;
   $this->citas_reservadas = $old_value_citas_reservadas;
   $this->rangoinicial = $old_value_rangoinicial;
   $this->rangoinicial_hora = $old_value_rangoinicial_hora;
   $this->horafin = $old_value_horafin;
   $this->horainicio = $old_value_horainicio;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_idtipodemodulista'][] = $rs->fields[0];
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

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['category']))
   {
       $this->nm_new_label['category'] = "Category";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $category = $this->category;
   $sStyleHidden_category = '';
   if (isset($this->nmgp_cmp_hidden['category']) && $this->nmgp_cmp_hidden['category'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['category']);
       $sStyleHidden_category = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_category = 'display: none;';
   $sStyleReadInp_category = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['category']) && $this->nmgp_cmp_readonly['category'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['category']);
       $sStyleReadLab_category = '';
       $sStyleReadInp_category = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['category']) && $this->nmgp_cmp_hidden['category'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="category" value="<?php echo $this->form_encode_input($this->category) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_category_label" id="hidden_field_label_category" style="<?php echo $sStyleHidden_category; ?>"><span id="id_label_category"><?php echo $this->nm_new_label['category']; ?></span></TD>
    <TD class="scFormDataOdd css_category_line" id="hidden_field_data_category" style="<?php echo $sStyleHidden_category; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_category_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["category"]) &&  $this->nmgp_cmp_readonly["category"] == "on") { 

$category_look = "";
 if ($this->category == "1") { $category_look .= "" . $this->Ini->Nm_lang['lang_category_personal'] . "" ;} 
 if ($this->category == "2") { $category_look .= "" . $this->Ini->Nm_lang['lang_category_work'] . "" ;} 
 if ($this->category == "3") { $category_look .= "" . $this->Ini->Nm_lang['lang_category_family'] . "" ;} 
 if ($this->category == "4") { $category_look .= "" . $this->Ini->Nm_lang['lang_category_friends'] . "" ;} 
 if ($this->category == "5") { $category_look .= "" . $this->Ini->Nm_lang['lang_category_others'] . "" ;} 
 if (empty($category_look)) { $category_look = $this->category; }
?>
<input type="hidden" name="category" value="<?php echo $this->form_encode_input($category) . "\">" . $category_look . ""; ?>
<?php } else { ?>
<?php

$categoryLookup = array(
        array(
                'label'   => "",
                'value'   => "",
                'default' => false,
                'color'   => false
        )
);

$categoryLookup[] = array(
        'label'   => "" . $this->Ini->Nm_lang['lang_category_personal'] . "",
        'value'   => "1",
        'default' => false,
        'color'   => '#a4bdfc'
);
$categoryLookup[] = array(
        'label'   => "" . $this->Ini->Nm_lang['lang_category_work'] . "",
        'value'   => "2",
        'default' => false,
        'color'   => '#e1e1e1'
);
$categoryLookup[] = array(
        'label'   => "" . $this->Ini->Nm_lang['lang_category_family'] . "",
        'value'   => "3",
        'default' => false,
        'color'   => '#7ae7bf'
);
$categoryLookup[] = array(
        'label'   => "" . $this->Ini->Nm_lang['lang_category_friends'] . "",
        'value'   => "4",
        'default' => false,
        'color'   => '#9a9cff'
);
$categoryLookup[] = array(
        'label'   => "" . $this->Ini->Nm_lang['lang_category_others'] . "",
        'value'   => "5",
        'default' => false,
        'color'   => '#FF887C'
);

?>
<script type="text/javascript">
$(function() {
        $("#id-cat-label-category").on("click", function() {
                var inputOffset = $(this).offset();
                $(this).addClass("scFormObjectFocusOdd");
                $("#id-cat-dropdown-category").css({"display": "inline-block", "left": inputOffset.left, "top": inputOffset.top + $(this).outerHeight()}).show();
        });

        $("#id-cat-label-desc-category").on("mouseenter", function() {
                $(this).css("cursor", "default");
        });

        $(".sc-cal-categ-item-category").on("click", function() {
                var oldValue = $("#id_sc_field_category").val();

                $("#id_sc_field_category").val($(this).data("value"));
                $("#id-cat-label-desc-category").html($(this).data("label"));

                if ("" == $(this).data("color")) {
                        $("#id-cat-label-color-category").hide();
                }
                else {
                        $("#id-cat-label-color-category").css("background-color", $(this).data("color")).show();
                }

                $("#id-cat-dropdown-category").hide();
                if ('' == $("#id_sc_field_category").val()) {
                        $("#id-cat-label-empty-category").show();
                        $("#id-cat-label-info-category").hide();
                }
                else {
                        $("#id-cat-label-empty-category").hide();
                        $("#id-cat-label-info-category").show();
                }
        }).on("mouseenter", function() {
                $(".sc-cal-categ-item-category").removeClass("sc-cal-categ-selected");
                $(this).addClass("sc-cal-categ-selected").css("cursor", "default");
        });

        $(document).on("mouseup", function(e) {
                var container = $("#id-cat-dropdown-category");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                        container.hide();
                        $("#id-cat-label-category").removeClass("scFormObjectFocusOdd");
                }
        });

        var maxWidth = Math.max($("#id-cat-label-category").outerWidth(), $("#id-cat-dropdown-category").outerWidth());
        $("#id-cat-label-category").css("width", maxWidth);
        $("#id-cat-dropdown-category").css("width", maxWidth);
});
</script>

<input type="hidden" name="category" id="id_sc_field_category" value="<?php echo $this->form_encode_input($this->category); ?>" />
<?php

$calCategoryColor  = '';
$calCategoryLabel  = '';
if ('' != $this->category) {
	$displayLabelEmpty = ' style="display: none"';
	$displayLabelDesc  = '';
	foreach ($categoryLookup as $categoryInfo) {
		if (($this->category == $categoryInfo['value'] || $categoryInfo['default'])) {
			$calCategoryColor = ' style="background-color: ' . $categoryInfo['color'] . '"';
			$calCategoryLabel = $categoryInfo['label'];
			break;
		}
	}
}
else {
	$displayLabelEmpty = '';
	$displayLabelDesc  = ' style="display: none"';
	foreach ($categoryLookup as $categoryInfo) {
		if ($categoryInfo['default']) {
			$displayLabelEmpty = ' style="display: none"';
			$displayLabelDesc  = '';
			$calCategoryColor  = ' style="background-color: ' . $categoryInfo['color'] . '"';
			$calCategoryLabel  = $categoryInfo['label'];
			break;
		}
	}
}

?>
<div class="sc-cal-categ">
	<div class="sc-cal-categ-input scFormObjectOdd" id="id-cat-label-category">
		<div class="sc-cal-categ-input-content">
			<span id="id-cat-label-empty-category"<?php echo $displayLabelEmpty; ?>>&nbsp;</span>
			<span id="id-cat-label-info-category"<?php echo $displayLabelDesc; ?>>
				<div class="sc-cal-categ-colorbox" id="id-cat-label-color-category"<?php echo $calCategoryColor; ?>></div>
				<span id="id-cat-label-desc-category"><?php echo $calCategoryLabel; ?></span>
			</span>
		</div>
		<div class="sc-cal-categ-input-caret">&#x25BC;</div>
	</div>
	<div class="sc-cal-categ-dropdown" id="id-cat-dropdown-category">
<?php

$hasSelectedItem = false;
foreach ($categoryLookup as $categoryInfo) {
        $categoryClass = '';
        if (!$hasSelectedItem && ($this->category == $categoryInfo['value'] || $categoryInfo['default'])) {
                $categoryClass   = ' sc-cal-categ-selected';
                $hasSelectedItem = true;
        }
?>
                <div id="id-cat-item-category-<?php echo $categoryInfo['value']; ?>" class="sc-cal-categ-item sc-cal-categ-item-category<?php echo $categoryClass; ?>" data-value="<?php echo $categoryInfo['value']; ?>" data-label="<?php echo $categoryInfo['label']; ?>" data-color="<?php echo $categoryInfo['color']; ?>">
<?php
        if (false !== $categoryInfo['color']) {
?>
                        <div class="sc-cal-categ-colorbox" style="background-color: <?php echo $categoryInfo['color']; ?>"></div>
<?php
        }
?>
                        <?php echo $this->form_encode_input($categoryInfo['label']); ?>
                </div>
<?php
}

?>
        </div>
</div>
<?php  }?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_category_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_category_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['citas_disponibles']))
    {
        $this->nm_new_label['citas_disponibles'] = "Citas Disponibles";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $citas_disponibles = $this->citas_disponibles;
   $sStyleHidden_citas_disponibles = '';
   if (isset($this->nmgp_cmp_hidden['citas_disponibles']) && $this->nmgp_cmp_hidden['citas_disponibles'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['citas_disponibles']);
       $sStyleHidden_citas_disponibles = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_citas_disponibles = 'display: none;';
   $sStyleReadInp_citas_disponibles = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['citas_disponibles']) && $this->nmgp_cmp_readonly['citas_disponibles'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['citas_disponibles']);
       $sStyleReadLab_citas_disponibles = '';
       $sStyleReadInp_citas_disponibles = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['citas_disponibles']) && $this->nmgp_cmp_hidden['citas_disponibles'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="citas_disponibles" value="<?php echo $this->form_encode_input($citas_disponibles) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_citas_disponibles_label" id="hidden_field_label_citas_disponibles" style="<?php echo $sStyleHidden_citas_disponibles; ?>"><span id="id_label_citas_disponibles"><?php echo $this->nm_new_label['citas_disponibles']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['citas_disponibles']) || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['citas_disponibles'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_citas_disponibles_line" id="hidden_field_data_citas_disponibles" style="<?php echo $sStyleHidden_citas_disponibles; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_citas_disponibles_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["citas_disponibles"]) &&  $this->nmgp_cmp_readonly["citas_disponibles"] == "on") { 

 ?>
<input type="hidden" name="citas_disponibles" value="<?php echo $this->form_encode_input($citas_disponibles) . "\">" . $citas_disponibles . ""; ?>
<?php } else { ?>
<span id="id_read_on_citas_disponibles" class="sc-ui-readonly-citas_disponibles css_citas_disponibles_line" style="<?php echo $sStyleReadLab_citas_disponibles; ?>"><?php echo $this->citas_disponibles; ?></span><span id="id_read_off_citas_disponibles" class="css_read_off_citas_disponibles" style="white-space: nowrap;<?php echo $sStyleReadInp_citas_disponibles; ?>">
 <input class="sc-js-input scFormObjectOdd css_citas_disponibles_obj" style="" id="id_sc_field_citas_disponibles" type=text name="citas_disponibles" value="<?php echo $this->form_encode_input($citas_disponibles) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['citas_disponibles']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['citas_disponibles']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['citas_disponibles']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_citas_disponibles_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_citas_disponibles_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['citas_reservadas']))
    {
        $this->nm_new_label['citas_reservadas'] = "Citas Reservadas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $citas_reservadas = $this->citas_reservadas;
   $sStyleHidden_citas_reservadas = '';
   if (isset($this->nmgp_cmp_hidden['citas_reservadas']) && $this->nmgp_cmp_hidden['citas_reservadas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['citas_reservadas']);
       $sStyleHidden_citas_reservadas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_citas_reservadas = 'display: none;';
   $sStyleReadInp_citas_reservadas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['citas_reservadas']) && $this->nmgp_cmp_readonly['citas_reservadas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['citas_reservadas']);
       $sStyleReadLab_citas_reservadas = '';
       $sStyleReadInp_citas_reservadas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['citas_reservadas']) && $this->nmgp_cmp_hidden['citas_reservadas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="citas_reservadas" value="<?php echo $this->form_encode_input($citas_reservadas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_citas_reservadas_label" id="hidden_field_label_citas_reservadas" style="<?php echo $sStyleHidden_citas_reservadas; ?>"><span id="id_label_citas_reservadas"><?php echo $this->nm_new_label['citas_reservadas']; ?></span></TD>
    <TD class="scFormDataOdd css_citas_reservadas_line" id="hidden_field_data_citas_reservadas" style="<?php echo $sStyleHidden_citas_reservadas; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_citas_reservadas_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["citas_reservadas"]) &&  $this->nmgp_cmp_readonly["citas_reservadas"] == "on") { 

 ?>
<input type="hidden" name="citas_reservadas" value="<?php echo $this->form_encode_input($citas_reservadas) . "\">" . $citas_reservadas . ""; ?>
<?php } else { ?>
<span id="id_read_on_citas_reservadas" class="sc-ui-readonly-citas_reservadas css_citas_reservadas_line" style="<?php echo $sStyleReadLab_citas_reservadas; ?>"><?php echo $this->citas_reservadas; ?></span><span id="id_read_off_citas_reservadas" class="css_read_off_citas_reservadas" style="white-space: nowrap;<?php echo $sStyleReadInp_citas_reservadas; ?>">
 <input class="sc-js-input scFormObjectOdd css_citas_reservadas_obj" style="" id="id_sc_field_citas_reservadas" type=text name="citas_reservadas" value="<?php echo $this->form_encode_input($citas_reservadas) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['citas_reservadas']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['citas_reservadas']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['citas_reservadas']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_citas_reservadas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_citas_reservadas_text"></span></td></tr></table></td></tr></table></TD>
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
   $old_dt_rangoinicial = $this->rangoinicial;
   if (strlen($this->rangoinicial_hora) > 8 ) {$this->rangoinicial_hora = substr($this->rangoinicial_hora, 0, 8);}
   $this->rangoinicial .= ' ' . $this->rangoinicial_hora;
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rangoinicial_label" id="hidden_field_label_rangoinicial" style="<?php echo $sStyleHidden_rangoinicial; ?>"><span id="id_label_rangoinicial"><?php echo $this->nm_new_label['rangoinicial']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['rangoinicial']) || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['rangoinicial'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['rangoinicial']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rangoinicial']['date_format']; ?>', timeSep: '<?php echo $this->field_config['rangoinicial']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
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
   $this->rangoinicial = $old_dt_rangoinicial;
?>

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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_horafin_label" id="hidden_field_label_horafin" style="<?php echo $sStyleHidden_horafin; ?>"><span id="id_label_horafin"><?php echo $this->nm_new_label['horafin']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['horafin']) || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['horafin'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_horainicio_label" id="hidden_field_label_horainicio" style="<?php echo $sStyleHidden_horainicio; ?>"><span id="id_label_horainicio"><?php echo $this->nm_new_label['horainicio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['horainicio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['php_cmp_required']['horainicio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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
   if (!isset($this->nm_new_label['__calend_all_day__']))
   {
       $this->nm_new_label['__calend_all_day__'] = "" . $this->Ini->Nm_lang['lang_per_allday'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $__calend_all_day__ = $this->__calend_all_day__;
   $sStyleHidden___calend_all_day__ = '';
   if (isset($this->nmgp_cmp_hidden['__calend_all_day__']) && $this->nmgp_cmp_hidden['__calend_all_day__'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['__calend_all_day__']);
       $sStyleHidden___calend_all_day__ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab___calend_all_day__ = 'display: none;';
   $sStyleReadInp___calend_all_day__ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['__calend_all_day__']) && $this->nmgp_cmp_readonly['__calend_all_day__'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['__calend_all_day__']);
       $sStyleReadLab___calend_all_day__ = '';
       $sStyleReadInp___calend_all_day__ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['__calend_all_day__']) && $this->nmgp_cmp_hidden['__calend_all_day__'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="__calend_all_day__" value="<?php echo $this->form_encode_input($this->__calend_all_day__) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->__calend_all_day___1 = explode(";", trim($this->__calend_all_day__));
  } 
  else
  {
      if (empty($this->__calend_all_day__))
      {
          $this->__calend_all_day___1= array(); 
          $this->__calend_all_day__= "";
      } 
      else
      {
          $this->__calend_all_day___1= $this->__calend_all_day__; 
          $this->__calend_all_day__= ""; 
          foreach ($this->__calend_all_day___1 as $cada___calend_all_day__)
          {
             if (!empty($__calend_all_day__))
             {
                 $this->__calend_all_day__.= ";"; 
             } 
             $this->__calend_all_day__.= $cada___calend_all_day__; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css___calend_all_day___label" id="hidden_field_label___calend_all_day__" style="<?php echo $sStyleHidden___calend_all_day__; ?>"><span id="id_label___calend_all_day__"><?php echo $this->nm_new_label['__calend_all_day__']; ?></span></TD>
    <TD class="scFormDataOdd css___calend_all_day___line" id="hidden_field_data___calend_all_day__" style="<?php echo $sStyleHidden___calend_all_day__; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css___calend_all_day___line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["__calend_all_day__"]) &&  $this->nmgp_cmp_readonly["__calend_all_day__"] == "on") { 

$__calend_all_day___look = "";
 if ($this->__calend_all_day__ == "Y") { $__calend_all_day___look .= "" . $this->Ini->Nm_lang['lang_per_allday'] . "" ;} 
 if (empty($__calend_all_day___look)) { $__calend_all_day___look = $this->__calend_all_day__; }
?>
<input type="hidden" name="__calend_all_day__" value="<?php echo $this->form_encode_input($__calend_all_day__) . "\">" . $__calend_all_day___look . ""; ?>
<?php } else { ?>

<?php

$__calend_all_day___look = "";
 if ($this->__calend_all_day__ == "Y") { $__calend_all_day___look .= "" . $this->Ini->Nm_lang['lang_per_allday'] . "" ;} 
 if (empty($__calend_all_day___look)) { $__calend_all_day___look = $this->__calend_all_day__; }
?>
<span id="id_read_on___calend_all_day__" class="css___calend_all_day___line" style="<?php echo $sStyleReadLab___calend_all_day__; ?>"><?php echo $this->form_encode_input($__calend_all_day___look); ?></span><span id="id_read_off___calend_all_day__" class="css_read_off___calend_all_day__ css___calend_all_day___line" style="<?php echo $sStyleReadInp___calend_all_day__; ?>"><?php echo "<div id=\"idAjaxCheckbox___calend_all_day__\" style=\"display: inline-block\" class=\"css___calend_all_day___line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css___calend_all_day___line"><?php $tempOptionId = "id-opt-__calend_all_day__" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-__calend_all_day__ sc-ui-checkbox-__calend_all_day__" name="__calend_all_day__[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup___calend_all_day__'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->__calend_all_day___1))  { echo " checked" ;} ?> onClick="sc___calend_all_day___onclick()"><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_per_allday']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display___calend_all_day___frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display___calend_all_day___text"></span></td></tr></table></td></tr></table></TD>
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
   if (!isset($this->nm_new_label['periodo']))
   {
       $this->nm_new_label['periodo'] = "Periodo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $periodo = $this->periodo;
   $sStyleHidden_periodo = '';
   if (isset($this->nmgp_cmp_hidden['periodo']) && $this->nmgp_cmp_hidden['periodo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['periodo']);
       $sStyleHidden_periodo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_periodo = 'display: none;';
   $sStyleReadInp_periodo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['periodo']) && $this->nmgp_cmp_readonly['periodo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['periodo']);
       $sStyleReadLab_periodo = '';
       $sStyleReadInp_periodo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['periodo']) && $this->nmgp_cmp_hidden['periodo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="periodo" value="<?php echo $this->form_encode_input($this->periodo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_periodo_label" id="hidden_field_label_periodo" style="<?php echo $sStyleHidden_periodo; ?>"><span id="id_label_periodo"><?php echo $this->nm_new_label['periodo']; ?></span></TD>
    <TD class="scFormDataOdd css_periodo_line" id="hidden_field_data_periodo" style="<?php echo $sStyleHidden_periodo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_periodo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["periodo"]) &&  $this->nmgp_cmp_readonly["periodo"] == "on") { 

$periodo_look = "";
 if ($this->periodo == "D") { $periodo_look .= "" . $this->Ini->Nm_lang['lang_recu_daily'] . "" ;} 
 if ($this->periodo == "W") { $periodo_look .= "" . $this->Ini->Nm_lang['lang_recu_weekly'] . "" ;} 
 if ($this->periodo == "M") { $periodo_look .= "" . $this->Ini->Nm_lang['lang_recu_monthly'] . "" ;} 
 if ($this->periodo == "A") { $periodo_look .= "" . $this->Ini->Nm_lang['lang_recu_annual'] . "" ;} 
 if (empty($periodo_look)) { $periodo_look = $this->periodo; }
?>
<input type="hidden" name="periodo" value="<?php echo $this->form_encode_input($periodo) . "\">" . $periodo_look . ""; ?>
<?php } else { ?>
<?php

$periodo_look = "";
 if ($this->periodo == "D") { $periodo_look .= "" . $this->Ini->Nm_lang['lang_recu_daily'] . "" ;} 
 if ($this->periodo == "W") { $periodo_look .= "" . $this->Ini->Nm_lang['lang_recu_weekly'] . "" ;} 
 if ($this->periodo == "M") { $periodo_look .= "" . $this->Ini->Nm_lang['lang_recu_monthly'] . "" ;} 
 if ($this->periodo == "A") { $periodo_look .= "" . $this->Ini->Nm_lang['lang_recu_annual'] . "" ;} 
 if (empty($periodo_look)) { $periodo_look = $this->periodo; }
?>
<span id="id_read_on_periodo" class="css_periodo_line"  style="<?php echo $sStyleReadLab_periodo; ?>"><?php echo $this->form_encode_input($periodo_look); ?></span><span id="id_read_off_periodo" class="css_read_off_periodo" style="white-space: nowrap; <?php echo $sStyleReadInp_periodo; ?>">
 <span id="idAjaxSelect_periodo"><select class="sc-js-input scFormObjectOdd css_periodo_obj" style="" id="id_sc_field_periodo" name="periodo" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="D" <?php  if ($this->periodo == "D") { echo " selected" ;} ?><?php  if (empty($this->periodo)) { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_recu_daily']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_periodo'][] = 'D'; ?>
 <option  value="W" <?php  if ($this->periodo == "W") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_recu_weekly']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_periodo'][] = 'W'; ?>
 <option  value="M" <?php  if ($this->periodo == "M") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_recu_monthly']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_periodo'][] = 'M'; ?>
 <option  value="A" <?php  if ($this->periodo == "A") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_recu_annual']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_periodo'][] = 'A'; ?>
 </select></span>
</span><?php  }?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_periodo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_periodo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['reaparicion']))
   {
       $this->nm_new_label['reaparicion'] = "Reaparicion";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $reaparicion = $this->reaparicion;
   $sStyleHidden_reaparicion = '';
   if (isset($this->nmgp_cmp_hidden['reaparicion']) && $this->nmgp_cmp_hidden['reaparicion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['reaparicion']);
       $sStyleHidden_reaparicion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_reaparicion = 'display: none;';
   $sStyleReadInp_reaparicion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['reaparicion']) && $this->nmgp_cmp_readonly['reaparicion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['reaparicion']);
       $sStyleReadLab_reaparicion = '';
       $sStyleReadInp_reaparicion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['reaparicion']) && $this->nmgp_cmp_hidden['reaparicion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="reaparicion" value="<?php echo $this->form_encode_input($this->reaparicion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_reaparicion_label" id="hidden_field_label_reaparicion" style="<?php echo $sStyleHidden_reaparicion; ?>"><span id="id_label_reaparicion"><?php echo $this->nm_new_label['reaparicion']; ?></span></TD>
    <TD class="scFormDataOdd css_reaparicion_line" id="hidden_field_data_reaparicion" style="<?php echo $sStyleHidden_reaparicion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_reaparicion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["reaparicion"]) &&  $this->nmgp_cmp_readonly["reaparicion"] == "on") { 

$reaparicion_look = "";
 if ($this->reaparicion == "Y") { $reaparicion_look .= "" . $this->Ini->Nm_lang['lang_peri_yes'] . "" ;} 
 if ($this->reaparicion == "N") { $reaparicion_look .= "" . $this->Ini->Nm_lang['lang_peri_no'] . "" ;} 
 if (empty($reaparicion_look)) { $reaparicion_look = $this->reaparicion; }
?>
<input type="hidden" name="reaparicion" value="<?php echo $this->form_encode_input($reaparicion) . "\">" . $reaparicion_look . ""; ?>
<?php } else { ?>
<?php

$reaparicion_look = "";
 if ($this->reaparicion == "Y") { $reaparicion_look .= "" . $this->Ini->Nm_lang['lang_peri_yes'] . "" ;} 
 if ($this->reaparicion == "N") { $reaparicion_look .= "" . $this->Ini->Nm_lang['lang_peri_no'] . "" ;} 
 if (empty($reaparicion_look)) { $reaparicion_look = $this->reaparicion; }
?>
<span id="id_read_on_reaparicion" class="css_reaparicion_line"  style="<?php echo $sStyleReadLab_reaparicion; ?>"><?php echo $this->form_encode_input($reaparicion_look); ?></span><span id="id_read_off_reaparicion" class="css_read_off_reaparicion" style="white-space: nowrap; <?php echo $sStyleReadInp_reaparicion; ?>">
 <span id="idAjaxSelect_reaparicion"><select class="sc-js-input scFormObjectOdd css_reaparicion_obj" style="" id="id_sc_field_reaparicion" name="reaparicion" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="Y" <?php  if ($this->reaparicion == "Y") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_peri_yes']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_reaparicion'][] = 'Y'; ?>
 <option  value="N" <?php  if ($this->reaparicion == "N") { echo " selected" ;} ?><?php  if (empty($this->reaparicion)) { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_peri_no']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['Lookup_reaparicion'][] = 'N'; ?>
 </select></span>
</span><?php  }?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_reaparicion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_reaparicion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['recur_info']))
    {
        $this->nm_new_label['recur_info'] = "Recur Info";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $recur_info = $this->recur_info;
   $sStyleHidden_recur_info = '';
   if (isset($this->nmgp_cmp_hidden['recur_info']) && $this->nmgp_cmp_hidden['recur_info'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['recur_info']);
       $sStyleHidden_recur_info = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_recur_info = 'display: none;';
   $sStyleReadInp_recur_info = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['recur_info']) && $this->nmgp_cmp_readonly['recur_info'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['recur_info']);
       $sStyleReadLab_recur_info = '';
       $sStyleReadInp_recur_info = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['recur_info']) && $this->nmgp_cmp_hidden['recur_info'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="recur_info" value="<?php echo $this->form_encode_input($recur_info) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_recur_info_label" id="hidden_field_label_recur_info" style="<?php echo $sStyleHidden_recur_info; ?>"><span id="id_label_recur_info"><?php echo $this->nm_new_label['recur_info']; ?></span></TD>
    <TD class="scFormDataOdd css_recur_info_line" id="hidden_field_data_recur_info" style="<?php echo $sStyleHidden_recur_info; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_recur_info_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_recur_info" style="<?php echo $sStyleReadLab_recur_info; ?>"></span><span id="id_read_off_recur_info" class="css_read_off_recur_info" style="<?php echo $sStyleReadInp_recur_info; ?>"><?php
$fieldData_recur_info = '' != $this->recur_info ? json_decode($this->recur_info) : null;
if (isset($fieldData_recur_info)) {
    $tmpRecurrenceInfo = array(
        'repeat'   => isset($fieldData_recur_info->repeat)   ? $fieldData_recur_info->repeat   : '1',
        'repeatin' => isset($fieldData_recur_info->repeatin) ? explode(';', $fieldData_recur_info->repeatin) : array(),
        'endon'    => isset($fieldData_recur_info->endon)    ? $fieldData_recur_info->endon    : 'E',
        'endafter' => isset($fieldData_recur_info->endafter) ? $fieldData_recur_info->endafter : '',
        'endin'    => isset($fieldData_recur_info->endin)    ? $fieldData_recur_info->endin    : '',
    );
}
else {
    $tmpRecurrenceInfo = array(
        'repeat'   => '1',
        'repeatin' => array(),
        'endon'    => 'N',
        'endafter' => '',
        'endin'    => '',
    );
}
if ('A' == $this->periodo) {
    $tmpRecerrenceRepeat          = $this->Ini->Nm_lang['lang_recur_repeat_years'];
    $tmpRecurrenceRepeatInDisplay = ' style="display: none"';
}
elseif ('M' == $this->periodo) {
    $tmpRecerrenceRepeat          = $this->Ini->Nm_lang['lang_recur_repeat_months'];
    $tmpRecurrenceRepeatInDisplay = ' style="display: none"';
}
elseif ('W' == $this->periodo) {
    $tmpRecerrenceRepeat          = $this->Ini->Nm_lang['lang_recur_repeat_weeks'];
    $tmpRecurrenceRepeatInDisplay = '';
}
else {
    $tmpRecerrenceRepeat          = $this->Ini->Nm_lang['lang_recur_repeat_days'];
    $tmpRecurrenceRepeatInDisplay = ' style="display: none"';
}
$tmp_form_data = $this->field_config['__calendar_recur_info__']['date_format'];
if('N' == 'S')
{
    $tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_srch_year'], $tmp_form_data);
    $tmp_form_data = str_replace('aaaa', $this->Ini->Nm_lang['lang_srch_year'], $tmp_form_data);
    $tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_srch_days'], $tmp_form_data);
    $tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_srch_mnth'], $tmp_form_data);
    $tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_srch_time'], $tmp_form_data);
    $tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_srch_mint'], $tmp_form_data);
    $tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_srch_scnd'], $tmp_form_data);
}
else
{
    $tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
    $tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
    $tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
    $tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
    $tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
    $tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
    $tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
}
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<input type="hidden" name="recur_info" id="id_sc_field_recur_info" value="<?php echo $this->form_encode_input($this->recur_info); ?>" />
<table class="recur_info_table">
    <tr>
        <td class="scFormDataFontOdd recur_info_cell recur_info_label"><?php echo $this->Ini->Nm_lang['lang_recur_repeat'] ?></td>
        <td class="scFormDataFontOdd recur_info_cell">
            <select class="scFormObjectOdd" id="id_rinf_repeat_recur_info">
                <option value="1"<?php if (1 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>1</option>
                <option value="2"<?php if (2 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>2</option>
                <option value="3"<?php if (3 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>3</option>
                <option value="4"<?php if (4 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>4</option>
                <option value="5"<?php if (5 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>5</option>
                <option value="6"<?php if (6 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>6</option>
                <option value="7"<?php if (7 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>7</option>
                <option value="8"<?php if (8 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>8</option>
                <option value="9"<?php if (9 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>9</option>
                <option value="10"<?php if (10 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>10</option>
                <option value="11"<?php if (11 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>11</option>
                <option value="12"<?php if (12 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>12</option>
                <option value="13"<?php if (13 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>13</option>
                <option value="14"<?php if (14 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>14</option>
                <option value="15"<?php if (15 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>15</option>
                <option value="16"<?php if (16 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>16</option>
                <option value="17"<?php if (17 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>17</option>
                <option value="18"<?php if (18 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>18</option>
                <option value="19"<?php if (19 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>19</option>
                <option value="20"<?php if (20 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>20</option>
                <option value="21"<?php if (21 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>21</option>
                <option value="22"<?php if (22 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>22</option>
                <option value="23"<?php if (23 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>23</option>
                <option value="24"<?php if (24 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>24</option>
                <option value="25"<?php if (25 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>25</option>
                <option value="26"<?php if (26 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>26</option>
                <option value="27"<?php if (27 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>27</option>
                <option value="28"<?php if (28 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>28</option>
                <option value="29"<?php if (29 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>29</option>
                <option value="30"<?php if (30 == $tmpRecurrenceInfo['repeat']) { echo ' selected'; } ?>>30</option>
            </select>
            <span id="id_rinf_repeat_label_recur_info"><?php echo $tmpRecerrenceRepeat; ?></span>
        </td>
    </tr>
    <tr id="id_rinf_repeatin_recur_info"<?php echo $tmpRecurrenceRepeatInDisplay; ?>>
        <td class="scFormDataFontOdd recur_info_cell recur_info_label"><?php echo $this->Ini->Nm_lang['lang_recur_repeatin'] ?></td>
        <td class="scFormDataFontOdd recur_info_cell">
            <input type="checkbox" value="SU" name="rinf_repeatin_recur_info" class="cl_rinf_repeatin_recur_info"<?php if (in_array('SU', $tmpRecurrenceInfo['repeatin'])) { echo ' checked'; } ?> /> <?php echo $this->Ini->Nm_lang['lang_onel_days_sund'] ?>
            <input type="checkbox" value="MO" name="rinf_repeatin_recur_info" class="cl_rinf_repeatin_recur_info"<?php if (in_array('MO', $tmpRecurrenceInfo['repeatin'])) { echo ' checked'; } ?> /> <?php echo $this->Ini->Nm_lang['lang_onel_days_mond'] ?>
            <input type="checkbox" value="TU" name="rinf_repeatin_recur_info" class="cl_rinf_repeatin_recur_info"<?php if (in_array('TU', $tmpRecurrenceInfo['repeatin'])) { echo ' checked'; } ?> /> <?php echo $this->Ini->Nm_lang['lang_onel_days_tued'] ?>
            <input type="checkbox" value="WE" name="rinf_repeatin_recur_info" class="cl_rinf_repeatin_recur_info"<?php if (in_array('WE', $tmpRecurrenceInfo['repeatin'])) { echo ' checked'; } ?> /> <?php echo $this->Ini->Nm_lang['lang_onel_days_wend'] ?>
            <input type="checkbox" value="TH" name="rinf_repeatin_recur_info" class="cl_rinf_repeatin_recur_info"<?php if (in_array('TH', $tmpRecurrenceInfo['repeatin'])) { echo ' checked'; } ?> /> <?php echo $this->Ini->Nm_lang['lang_onel_days_thud'] ?>
            <input type="checkbox" value="FR" name="rinf_repeatin_recur_info" class="cl_rinf_repeatin_recur_info"<?php if (in_array('FR', $tmpRecurrenceInfo['repeatin'])) { echo ' checked'; } ?> /> <?php echo $this->Ini->Nm_lang['lang_onel_days_frid'] ?>
            <input type="checkbox" value="SA" name="rinf_repeatin_recur_info" class="cl_rinf_repeatin_recur_info"<?php if (in_array('SA', $tmpRecurrenceInfo['repeatin'])) { echo ' checked'; } ?> /> <?php echo $this->Ini->Nm_lang['lang_onel_days_satd'] ?>
        </td>
    </tr>
    <tr>
        <td class="scFormDataFontOdd recur_info_cell recur_info_label"><?php echo $this->Ini->Nm_lang['lang_recur_endon'] ?></td>
        <td class="scFormDataFontOdd recur_info_cell">
            <input type="radio" name="rinf_endon_recur_info" value="E" class="cl_rinf_endon_recur_info"<?php if ('N' != $tmpRecurrenceInfo['endon'] && 'A' != $tmpRecurrenceInfo['endon'] && 'I' != $tmpRecurrenceInfo['endon']) { echo ' checked'; } ?> />
            <?php echo $this->Ini->Nm_lang['lang_recur_endon_event'] ?>
            <br />
            <input type="radio" name="rinf_endon_recur_info" value="N" class="cl_rinf_endon_recur_info"<?php if ('N' == $tmpRecurrenceInfo['endon']) { echo ' checked'; } ?> />
            <?php echo $this->Ini->Nm_lang['lang_recur_endon_never'] ?>
            <br />
            <input type="radio" name="rinf_endon_recur_info" value="A" class="cl_rinf_endon_recur_info"<?php if ('A' == $tmpRecurrenceInfo['endon']) { echo ' checked'; } ?> />
            <?php echo $this->Ini->Nm_lang['lang_recur_endon_after'] ?>
            <input type="text" class="sc-js-input scFormObjectOdd recur_info_after" id="id_rinf_endafter_recur_info" value="<?php echo $tmpRecurrenceInfo['endafter']; ?>" alt="{datatype: 'text', maxLength: 11, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" />
            <br />
            <input type="radio" name="rinf_endon_recur_info" value="I" class="cl_rinf_endon_recur_info"<?php if ('I' == $tmpRecurrenceInfo['endon']) { echo ' checked'; } ?> />
            <?php echo $this->Ini->Nm_lang['lang_recur_endon_in'] ?>
            <input type="text" class="sc-js-input scFormObjectOdd recur_info_in" id="id_rinf_endin_recur_info" value="<?php echo $tmpRecurrenceInfo['endin']; ?>" alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['__calendar_recur_info__']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['__calendar_recur_info__']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" /> <?php echo $tmp_form_data; ?>
        </td>
    </tr>
</table>
</span></td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_recur_info_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_recur_info_text"></span></td></tr></table></td></tr></table></TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "R")
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
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['run_iframe'] != "R")
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
  $nm_sc_blocos_da_pag = array(0,1,2);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("VER_DISPONIBILIDAD");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("VER_DISPONIBILIDAD");
 parent.scAjaxDetailHeight("VER_DISPONIBILIDAD", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("VER_DISPONIBILIDAD", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("VER_DISPONIBILIDAD", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['VER_DISPONIBILIDAD']['buttonStatus'] = $this->nmgp_botoes;
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
