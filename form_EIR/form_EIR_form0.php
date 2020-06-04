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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("REGISTRAR CONDICION"); } else { echo strip_tags("REGISTRAR CONDICION"); } ?></TITLE>
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
.css_read_off_fecha button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/jsignature/flashcanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/jsignature/jSignature.min.js"></script>
<style type="text/css">
	.sc.switch {
		position: relative;
		display: inline-flex;
	}

	.sc.switch span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.switch span {
		background: #DFDFDF;
		width: 22px;
		height: 14px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		padding: 0 3px;
		transition: all .2s linear;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.switch span:before {
		content: '\2713';
		display: inline-block;
		color: white;
		font-size: 10px;
		z-index: 0;
		position: absolute;
		top: 0;
		left: 4px;
	}

	.sc.switch span:after {
		content: '';
		background: white;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 1px;
		left: 1px;
		border-radius: 15px;
		transition: all .2s linear;
		z-index: 1;
	}

	.sc.switch input {
		margin-right: 10px;
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.switch input:disabled + span {
		opacity: 0.35;
	}

	.sc.switch input:checked + span {
		background: #66AFE9;
	}

	.sc.switch input:checked + span:after {
		left: calc(100% - 1px);
		transform: translateX(-100%);
	}

	.sc.radio {
		position: relative;
		display: inline-flex;
	}

	.sc.radio span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.radio span {
		background: #ffffff;
		border: 1px solid #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.radio span:after {
		content: '';
		background: #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		z-index: 1;
		transform: scale(0);
	}

	.sc.radio input {
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.radio input:disabled + span {
		opacity: 0.35;
	}

	.sc.radio input:checked + span {
		background: #66AFE9;
	}

	.sc.radio input:checked + span:after {
		transform: translateX(-100%);
		transform: scale(1);
	}
</style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['embutida_pdf']))
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
 <STYLE>
     .scTabLine li {
         display: inline-block !important;
         text-align: center !important;
         overflow: hidden !important;
         vertical-align:top !important;
         height: auto !important;
         min-width: 100 !important;
         max-width: 120 !important;
     }
 </STYLE>
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_EIR/form_EIR_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_EIR_sajax_js.php");
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

include_once('form_EIR_jquery.php');

?>
var applicationKeys = "";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
function process_hotkeys(hotkey)
{
    return false;
}

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('tipomovimiento_idtipomovimiento');

<?php
}
?>
  addAutocomplete(this);

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
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("form_detalle_condicion", "1000");
      if (typeof $("#nmsc_iframe_liga_form_detalle_condicion")[0].contentWindow.scQuickSearchInit === "function") {
        $("#nmsc_iframe_liga_form_detalle_condicion")[0].contentWindow.scQuickSearchInit(false, '');
      }
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-numero_contenedor", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "numero_contenedor" != sId ? sId.substr(17) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_EIR_event_numero_contenedor_onchange) { do_ajax_form_EIR_event_numero_contenedor_onchange(sRow); }
    }
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).autocomplete({
   minLength: 1,
   source: function (request, response) {
    $.ajax({
     url: "form_EIR.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_numero_contenedor",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      response(data);
     }
    });
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'numero_contenedor' != sId ? sId.substr(17) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'numero_contenedor' != sId ? sId.substr(17) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_numero_contenedor", elem).on("focus", function() {
    $("#id_sc_field_numero_contenedor").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_numero_contenedor").trigger("blur");
  });

  $(".sc-ui-autocomp-idcabezal", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idcabezal" != sId ? sId.substr(9) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_EIR_event_idcabezal_onchange) { do_ajax_form_EIR_event_idcabezal_onchange(sRow); }
    }
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).autocomplete({
   minLength: 3,
   source: function (request, response) {
    $.ajax({
     url: "form_EIR.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idcabezal",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      response(data);
     }
    });
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idcabezal' != sId ? sId.substr(9) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idcabezal' != sId ? sId.substr(9) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_idcabezal", elem).on("focus", function() {
    $("#id_sc_field_idcabezal").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_idcabezal").trigger("blur");
  });

  $(".sc-ui-autocomp-idtransporte", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idtransporte" != sId ? sId.substr(12) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_EIR_event_idtransporte_onchange) { do_ajax_form_EIR_event_idtransporte_onchange(sRow); }
    }
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).autocomplete({
   minLength: 3,
   source: function (request, response) {
    $.ajax({
     url: "form_EIR.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idtransporte",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      response(data);
     }
    });
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idtransporte' != sId ? sId.substr(12) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idtransporte' != sId ? sId.substr(12) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_idtransporte", elem).on("focus", function() {
    $("#id_sc_field_idtransporte").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_idtransporte").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_EIR_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_EIR'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_EIR'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "REGISTRAR CONDICION"; } else { echo "REGISTRAR CONDICION"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "R")
{
    $NM_btn = false;
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
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
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_EIR_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_EIR_form0' => array(
            'title' => "DATOS",
            'class' => empty($nmgp_num_form) || $nmgp_num_form == "form_EIR_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_EIR_form1' => array(
            'title' => "IMAGENES",
            'class' => $nmgp_num_form == "form_EIR_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('DATOS' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_EIR_form0']['class'] = 'scTabInactive';
                        }
                        if ('IMAGENES' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_EIR_form1']['class'] = 'scTabInactive';
                        }
                }
                $displayingPage = false;
                foreach ($this->tabCssClass as $pageInfo) {
                        if ('scTabActive' == $pageInfo['class']) {
                                $displayingPage = true;
                                break;
                        }
                }
                if (!$displayingPage) {
                        foreach ($this->tabCssClass as $pageForm => $pageInfo) {
                                if (!isset($this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) || 'off' != $this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) {
                                        $this->tabCssClass[$pageForm]['class'] = 'scTabActive';
                                        break;
                                }
                        }
                }
        }
?>
<?php
    $css_celula = $this->tabCssClass["form_EIR_form0"]['class'];
?>
   <li id="id_form_EIR_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_EIR_form0')">
     <img src="<?php echo $this->Ini->path_icones ?>/usr__NM__bg__NM__portapapeles (1).png" align="absmiddle">
     DATOS
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_EIR_form1"]['class'];
?>
   <li id="id_form_EIR_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_EIR_form1')">
     <img src="<?php echo $this->Ini->path_icones ?>/usr__NM__bg__NM__camera (1).png" align="absmiddle">
     IMAGENES
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_EIR_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100px" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_condicion']))
           {
               $this->nmgp_cmp_readonly['id_condicion'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_condicion']))
    {
        $this->nm_new_label['id_condicion'] = "CORRELATIVO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_condicion = $this->id_condicion;
   $sStyleHidden_id_condicion = '';
   if (isset($this->nmgp_cmp_hidden['id_condicion']) && $this->nmgp_cmp_hidden['id_condicion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_condicion']);
       $sStyleHidden_id_condicion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_condicion = 'display: none;';
   $sStyleReadInp_id_condicion = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_condicion"]) &&  $this->nmgp_cmp_readonly["id_condicion"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_condicion']);
       $sStyleReadLab_id_condicion = '';
       $sStyleReadInp_id_condicion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_condicion']) && $this->nmgp_cmp_hidden['id_condicion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_condicion" value="<?php echo $this->form_encode_input($id_condicion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_condicion_line" id="hidden_field_data_id_condicion" style="<?php echo $sStyleHidden_id_condicion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_condicion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_condicion_label"><span id="id_label_id_condicion"><?php echo $this->nm_new_label['id_condicion']; ?></span></span><br>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_id_condicion" css_id_condicion_line" style="<?php echo $sStyleReadLab_id_condicion; ?>"><?php echo $this->form_encode_input($this->id_condicion); ?></span><span id="id_read_off_id_condicion" class="css_read_off_id_condicion" style="<?php echo $sStyleReadInp_id_condicion; ?>"><input type="hidden" name="id_condicion" value="<?php echo $this->form_encode_input($id_condicion) . "\">"?><span id="id_ajax_label_id_condicion"><?php echo nl2br($id_condicion); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_condicion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_condicion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['sec_users_login']))
    {
        $this->nm_new_label['sec_users_login'] = "USUARIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sec_users_login = $this->sec_users_login;
   $sStyleHidden_sec_users_login = '';
   if (isset($this->nmgp_cmp_hidden['sec_users_login']) && $this->nmgp_cmp_hidden['sec_users_login'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sec_users_login']);
       $sStyleHidden_sec_users_login = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sec_users_login = 'display: none;';
   $sStyleReadInp_sec_users_login = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sec_users_login']) && $this->nmgp_cmp_readonly['sec_users_login'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sec_users_login']);
       $sStyleReadLab_sec_users_login = '';
       $sStyleReadInp_sec_users_login = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sec_users_login']) && $this->nmgp_cmp_hidden['sec_users_login'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sec_users_login" value="<?php echo $this->form_encode_input($sec_users_login) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sec_users_login_line" id="hidden_field_data_sec_users_login" style="<?php echo $sStyleHidden_sec_users_login; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sec_users_login_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sec_users_login_label"><span id="id_label_sec_users_login"><?php echo $this->nm_new_label['sec_users_login']; ?></span></span><br><input type="hidden" name="sec_users_login" value="<?php echo $this->form_encode_input($sec_users_login); ?>"><span id="id_ajax_label_sec_users_login"><?php echo nl2br($sec_users_login); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sec_users_login_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sec_users_login_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha']))
    {
        $this->nm_new_label['fecha'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecha = $this->fecha;
   if (strlen($this->fecha_hora) > 8 ) {$this->fecha_hora = substr($this->fecha_hora, 0, 8);}
   $this->fecha .= ' ' . $this->fecha_hora;
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

    <TD class="scFormDataOdd css_fecha_line" id="hidden_field_data_fecha" style="<?php echo $sStyleHidden_fecha; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_label"><span id="id_label_fecha"><?php echo $this->nm_new_label['fecha']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['fecha']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['fecha'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br><input type="hidden" name="fecha" value="<?php echo $this->form_encode_input($fecha); ?>"><span id="id_ajax_label_fecha"><?php echo nl2br($fecha); ?></span>
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
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fecha = $old_dt_fecha;
?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
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
   if (!isset($this->nm_new_label['tipomovimiento_idtipomovimiento']))
   {
       $this->nm_new_label['tipomovimiento_idtipomovimiento'] = "MOVIMIENTO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipomovimiento_idtipomovimiento = $this->tipomovimiento_idtipomovimiento;
   $sStyleHidden_tipomovimiento_idtipomovimiento = '';
   if (isset($this->nmgp_cmp_hidden['tipomovimiento_idtipomovimiento']) && $this->nmgp_cmp_hidden['tipomovimiento_idtipomovimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipomovimiento_idtipomovimiento']);
       $sStyleHidden_tipomovimiento_idtipomovimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipomovimiento_idtipomovimiento = 'display: none;';
   $sStyleReadInp_tipomovimiento_idtipomovimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipomovimiento_idtipomovimiento']) && $this->nmgp_cmp_readonly['tipomovimiento_idtipomovimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipomovimiento_idtipomovimiento']);
       $sStyleReadLab_tipomovimiento_idtipomovimiento = '';
       $sStyleReadInp_tipomovimiento_idtipomovimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipomovimiento_idtipomovimiento']) && $this->nmgp_cmp_hidden['tipomovimiento_idtipomovimiento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipomovimiento_idtipomovimiento" value="<?php echo $this->form_encode_input($this->tipomovimiento_idtipomovimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipomovimiento_idtipomovimiento_label" id="hidden_field_label_tipomovimiento_idtipomovimiento" style="<?php echo $sStyleHidden_tipomovimiento_idtipomovimiento; ?>"><span id="id_label_tipomovimiento_idtipomovimiento"><?php echo $this->nm_new_label['tipomovimiento_idtipomovimiento']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['tipomovimiento_idtipomovimiento']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['tipomovimiento_idtipomovimiento'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipomovimiento_idtipomovimiento_line" id="hidden_field_data_tipomovimiento_idtipomovimiento" style="<?php echo $sStyleHidden_tipomovimiento_idtipomovimiento; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipomovimiento_idtipomovimiento_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipomovimiento_idtipomovimiento"]) &&  $this->nmgp_cmp_readonly["tipomovimiento_idtipomovimiento"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento'] = array(); 
    }

   $old_value_id_condicion = $this->id_condicion;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_medida = $this->medida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_condicion = $this->id_condicion;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_medida = $this->medida;

   $cable_val_str = "''";
   if (!empty($this->cable))
   {
       if (is_array($this->cable))
       {
           $Tmp_array = $this->cable;
       }
       else
       {
           $Tmp_array = explode(";", $this->cable);
       }
       $cable_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cable_val_str)
          {
             $cable_val_str .= ", ";
          }
          $cable_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plug_val_str = "''";
   if (!empty($this->plug))
   {
       if (is_array($this->plug))
       {
           $Tmp_array = $this->plug;
       }
       else
       {
           $Tmp_array = explode(";", $this->plug);
       }
       $plug_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plug_val_str)
          {
             $plug_val_str .= ", ";
          }
          $plug_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idtipoMovimiento, descripcion  FROM tipomovimiento  ORDER BY descripcion";

   $this->id_condicion = $old_value_id_condicion;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->medida = $old_value_medida;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento'][] = $rs->fields[0];
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
   $tipomovimiento_idtipomovimiento_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipomovimiento_idtipomovimiento_1))
          {
              foreach ($this->tipomovimiento_idtipomovimiento_1 as $tmp_tipomovimiento_idtipomovimiento)
              {
                  if (trim($tmp_tipomovimiento_idtipomovimiento) === trim($cadaselect[1])) { $tipomovimiento_idtipomovimiento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipomovimiento_idtipomovimiento) === trim($cadaselect[1])) { $tipomovimiento_idtipomovimiento_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tipomovimiento_idtipomovimiento" value="<?php echo $this->form_encode_input($tipomovimiento_idtipomovimiento) . "\">" . $tipomovimiento_idtipomovimiento_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tipomovimiento_idtipomovimiento();
   $x = 0 ; 
   $tipomovimiento_idtipomovimiento_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipomovimiento_idtipomovimiento_1))
          {
              foreach ($this->tipomovimiento_idtipomovimiento_1 as $tmp_tipomovimiento_idtipomovimiento)
              {
                  if (trim($tmp_tipomovimiento_idtipomovimiento) === trim($cadaselect[1])) { $tipomovimiento_idtipomovimiento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipomovimiento_idtipomovimiento) === trim($cadaselect[1])) { $tipomovimiento_idtipomovimiento_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tipomovimiento_idtipomovimiento_look))
          {
              $tipomovimiento_idtipomovimiento_look = $this->tipomovimiento_idtipomovimiento;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tipomovimiento_idtipomovimiento\" class=\"css_tipomovimiento_idtipomovimiento_line\" style=\"" .  $sStyleReadLab_tipomovimiento_idtipomovimiento . "\">" . $this->form_encode_input($tipomovimiento_idtipomovimiento_look) . "</span><span id=\"id_read_off_tipomovimiento_idtipomovimiento\" class=\"css_read_off_tipomovimiento_idtipomovimiento\" style=\"white-space: nowrap; " . $sStyleReadInp_tipomovimiento_idtipomovimiento . "\">";
   echo " <span id=\"idAjaxSelect_tipomovimiento_idtipomovimiento\"><select class=\"sc-js-input scFormObjectOdd css_tipomovimiento_idtipomovimiento_obj\" style=\"\" id=\"id_sc_field_tipomovimiento_idtipomovimiento\" name=\"tipomovimiento_idtipomovimiento\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_tipomovimiento_idtipomovimiento'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tipomovimiento_idtipomovimiento) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tipomovimiento_idtipomovimiento)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipomovimiento_idtipomovimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipomovimiento_idtipomovimiento_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero_contenedor']))
    {
        $this->nm_new_label['numero_contenedor'] = "EQUIPO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_contenedor = $this->numero_contenedor;
   $sStyleHidden_numero_contenedor = '';
   if (isset($this->nmgp_cmp_hidden['numero_contenedor']) && $this->nmgp_cmp_hidden['numero_contenedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_contenedor']);
       $sStyleHidden_numero_contenedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_contenedor = 'display: none;';
   $sStyleReadInp_numero_contenedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_contenedor']) && $this->nmgp_cmp_readonly['numero_contenedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_contenedor']);
       $sStyleReadLab_numero_contenedor = '';
       $sStyleReadInp_numero_contenedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_contenedor']) && $this->nmgp_cmp_hidden['numero_contenedor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_contenedor" value="<?php echo $this->form_encode_input($numero_contenedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numero_contenedor_label" id="hidden_field_label_numero_contenedor" style="<?php echo $sStyleHidden_numero_contenedor; ?>"><span id="id_label_numero_contenedor"><?php echo $this->nm_new_label['numero_contenedor']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['numero_contenedor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['numero_contenedor'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_numero_contenedor_line" id="hidden_field_data_numero_contenedor" style="<?php echo $sStyleHidden_numero_contenedor; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_contenedor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_contenedor"]) &&  $this->nmgp_cmp_readonly["numero_contenedor"] == "on") { 

 ?>
<input type="hidden" name="numero_contenedor" value="<?php echo $this->form_encode_input($numero_contenedor) . "\">" . $numero_contenedor . ""; ?>
<?php } else { ?>

<?php
$aRecData['numero_contenedor'] = $this->numero_contenedor;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor'] = array(); 
    }

   $old_value_id_condicion = $this->id_condicion;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_medida = $this->medida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_condicion = $this->id_condicion;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_medida = $this->medida;

   $cable_val_str = "''";
   if (!empty($this->cable))
   {
       if (is_array($this->cable))
       {
           $Tmp_array = $this->cable;
       }
       else
       {
           $Tmp_array = explode(";", $this->cable);
       }
       $cable_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cable_val_str)
          {
             $cable_val_str .= ", ";
          }
          $cable_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plug_val_str = "''";
   if (!empty($this->plug))
   {
       if (is_array($this->plug))
       {
           $Tmp_array = $this->plug;
       }
       else
       {
           $Tmp_array = explode(";", $this->plug);
       }
       $plug_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plug_val_str)
          {
             $plug_val_str .= ", ";
          }
          $plug_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT numero_contenedor, numero_contenedor FROM master_equipo WHERE numero_contenedor = '" . substr($this->Db->qstr($this->numero_contenedor), 1, -1) . "' ORDER BY numero_contenedor";

   $this->id_condicion = $old_value_id_condicion;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->medida = $old_value_medida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->numero_contenedor])) ? $aLookup[0][$this->numero_contenedor] : $this->numero_contenedor;
$numero_contenedor_look = (isset($aLookup[0][$this->numero_contenedor])) ? $aLookup[0][$this->numero_contenedor] : $this->numero_contenedor;
?>
<span id="id_read_on_numero_contenedor" class="sc-ui-readonly-numero_contenedor css_numero_contenedor_line" style="<?php echo $sStyleReadLab_numero_contenedor; ?>"><?php echo str_replace("<", "&lt;", $numero_contenedor_look); ?></span><span id="id_read_off_numero_contenedor" class="css_read_off_numero_contenedor" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_contenedor; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_contenedor_obj" style="display: none;" id="id_sc_field_numero_contenedor" type=text name="numero_contenedor" value="<?php echo $this->form_encode_input($numero_contenedor) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['numero_contenedor'] = $this->numero_contenedor;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor'] = array(); 
    }

   $old_value_id_condicion = $this->id_condicion;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_medida = $this->medida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_condicion = $this->id_condicion;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_medida = $this->medida;

   $cable_val_str = "''";
   if (!empty($this->cable))
   {
       if (is_array($this->cable))
       {
           $Tmp_array = $this->cable;
       }
       else
       {
           $Tmp_array = explode(";", $this->cable);
       }
       $cable_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cable_val_str)
          {
             $cable_val_str .= ", ";
          }
          $cable_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plug_val_str = "''";
   if (!empty($this->plug))
   {
       if (is_array($this->plug))
       {
           $Tmp_array = $this->plug;
       }
       else
       {
           $Tmp_array = explode(";", $this->plug);
       }
       $plug_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plug_val_str)
          {
             $plug_val_str .= ", ";
          }
          $plug_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT numero_contenedor, numero_contenedor FROM master_equipo WHERE numero_contenedor = '" . substr($this->Db->qstr($this->numero_contenedor), 1, -1) . "' ORDER BY numero_contenedor";

   $this->id_condicion = $old_value_id_condicion;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->medida = $old_value_medida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_numero_contenedor'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->numero_contenedor])) ? $aLookup[0][$this->numero_contenedor] : '';
$numero_contenedor_look = (isset($aLookup[0][$this->numero_contenedor])) ? $aLookup[0][$this->numero_contenedor] : '';
?>
<input type="text" id="id_ac_numero_contenedor" name="numero_contenedor_autocomp" class="scFormObjectOdd sc-ui-autocomp-numero_contenedor css_numero_contenedor_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_contenedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_contenedor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idnaviera']))
   {
       $this->nm_new_label['idnaviera'] = "NAVIERA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idnaviera = $this->idnaviera;
   $sStyleHidden_idnaviera = '';
   if (isset($this->nmgp_cmp_hidden['idnaviera']) && $this->nmgp_cmp_hidden['idnaviera'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idnaviera']);
       $sStyleHidden_idnaviera = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idnaviera = 'display: none;';
   $sStyleReadInp_idnaviera = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idnaviera']) && $this->nmgp_cmp_readonly['idnaviera'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idnaviera']);
       $sStyleReadLab_idnaviera = '';
       $sStyleReadInp_idnaviera = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idnaviera']) && $this->nmgp_cmp_hidden['idnaviera'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idnaviera" value="<?php echo $this->form_encode_input($this->idnaviera) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idnaviera_label" id="hidden_field_label_idnaviera" style="<?php echo $sStyleHidden_idnaviera; ?>"><span id="id_label_idnaviera"><?php echo $this->nm_new_label['idnaviera']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['idnaviera']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['idnaviera'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_idnaviera_line" id="hidden_field_data_idnaviera" style="<?php echo $sStyleHidden_idnaviera; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idnaviera_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idnaviera"]) &&  $this->nmgp_cmp_readonly["idnaviera"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera'] = array(); 
    }

   $old_value_id_condicion = $this->id_condicion;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_medida = $this->medida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_condicion = $this->id_condicion;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_medida = $this->medida;

   $cable_val_str = "''";
   if (!empty($this->cable))
   {
       if (is_array($this->cable))
       {
           $Tmp_array = $this->cable;
       }
       else
       {
           $Tmp_array = explode(";", $this->cable);
       }
       $cable_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cable_val_str)
          {
             $cable_val_str .= ", ";
          }
          $cable_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plug_val_str = "''";
   if (!empty($this->plug))
   {
       if (is_array($this->plug))
       {
           $Tmp_array = $this->plug;
       }
       else
       {
           $Tmp_array = explode(";", $this->plug);
       }
       $plug_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plug_val_str)
          {
             $plug_val_str .= ", ";
          }
          $plug_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idNaviera, naviera  FROM naviera  ORDER BY naviera";

   $this->id_condicion = $old_value_id_condicion;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->medida = $old_value_medida;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera'][] = $rs->fields[0];
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
   $idnaviera_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idnaviera_1))
          {
              foreach ($this->idnaviera_1 as $tmp_idnaviera)
              {
                  if (trim($tmp_idnaviera) === trim($cadaselect[1])) { $idnaviera_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idnaviera) === trim($cadaselect[1])) { $idnaviera_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idnaviera" value="<?php echo $this->form_encode_input($idnaviera) . "\">" . $idnaviera_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idnaviera();
   $x = 0 ; 
   $idnaviera_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idnaviera_1))
          {
              foreach ($this->idnaviera_1 as $tmp_idnaviera)
              {
                  if (trim($tmp_idnaviera) === trim($cadaselect[1])) { $idnaviera_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idnaviera) === trim($cadaselect[1])) { $idnaviera_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idnaviera_look))
          {
              $idnaviera_look = $this->idnaviera;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idnaviera\" class=\"css_idnaviera_line\" style=\"" .  $sStyleReadLab_idnaviera . "\">" . $this->form_encode_input($idnaviera_look) . "</span><span id=\"id_read_off_idnaviera\" class=\"css_read_off_idnaviera\" style=\"white-space: nowrap; " . $sStyleReadInp_idnaviera . "\">";
   echo " <span id=\"idAjaxSelect_idnaviera\"><select class=\"sc-js-input scFormObjectOdd css_idnaviera_obj\" style=\"\" id=\"id_sc_field_idnaviera\" name=\"idnaviera\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idnaviera'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idnaviera) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idnaviera)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idnaviera_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idnaviera_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idyarda']))
   {
       $this->nm_new_label['idyarda'] = "YARDA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idyarda = $this->idyarda;
   $sStyleHidden_idyarda = '';
   if (isset($this->nmgp_cmp_hidden['idyarda']) && $this->nmgp_cmp_hidden['idyarda'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idyarda']);
       $sStyleHidden_idyarda = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idyarda = 'display: none;';
   $sStyleReadInp_idyarda = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idyarda']) && $this->nmgp_cmp_readonly['idyarda'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idyarda']);
       $sStyleReadLab_idyarda = '';
       $sStyleReadInp_idyarda = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idyarda']) && $this->nmgp_cmp_hidden['idyarda'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idyarda" value="<?php echo $this->form_encode_input($this->idyarda) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idyarda_label" id="hidden_field_label_idyarda" style="<?php echo $sStyleHidden_idyarda; ?>"><span id="id_label_idyarda"><?php echo $this->nm_new_label['idyarda']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['idyarda']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['idyarda'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_idyarda_line" id="hidden_field_data_idyarda" style="<?php echo $sStyleHidden_idyarda; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idyarda_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idyarda"]) &&  $this->nmgp_cmp_readonly["idyarda"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda'] = array(); 
    }

   $old_value_id_condicion = $this->id_condicion;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_medida = $this->medida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_condicion = $this->id_condicion;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_medida = $this->medida;

   $cable_val_str = "''";
   if (!empty($this->cable))
   {
       if (is_array($this->cable))
       {
           $Tmp_array = $this->cable;
       }
       else
       {
           $Tmp_array = explode(";", $this->cable);
       }
       $cable_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cable_val_str)
          {
             $cable_val_str .= ", ";
          }
          $cable_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plug_val_str = "''";
   if (!empty($this->plug))
   {
       if (is_array($this->plug))
       {
           $Tmp_array = $this->plug;
       }
       else
       {
           $Tmp_array = explode(";", $this->plug);
       }
       $plug_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plug_val_str)
          {
             $plug_val_str .= ", ";
          }
          $plug_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idyarda, descripcion_yarda  FROM yarda  ORDER BY descripcion_yarda";

   $this->id_condicion = $old_value_id_condicion;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->medida = $old_value_medida;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda'][] = $rs->fields[0];
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
   $idyarda_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idyarda_1))
          {
              foreach ($this->idyarda_1 as $tmp_idyarda)
              {
                  if (trim($tmp_idyarda) === trim($cadaselect[1])) { $idyarda_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idyarda) === trim($cadaselect[1])) { $idyarda_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idyarda" value="<?php echo $this->form_encode_input($idyarda) . "\">" . $idyarda_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idyarda();
   $x = 0 ; 
   $idyarda_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idyarda_1))
          {
              foreach ($this->idyarda_1 as $tmp_idyarda)
              {
                  if (trim($tmp_idyarda) === trim($cadaselect[1])) { $idyarda_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idyarda) === trim($cadaselect[1])) { $idyarda_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idyarda_look))
          {
              $idyarda_look = $this->idyarda;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idyarda\" class=\"css_idyarda_line\" style=\"" .  $sStyleReadLab_idyarda . "\">" . $this->form_encode_input($idyarda_look) . "</span><span id=\"id_read_off_idyarda\" class=\"css_read_off_idyarda\" style=\"white-space: nowrap; " . $sStyleReadInp_idyarda . "\">";
   echo " <span id=\"idAjaxSelect_idyarda\"><select class=\"sc-js-input scFormObjectOdd css_idyarda_obj\" style=\"\" id=\"id_sc_field_idyarda\" name=\"idyarda\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idyarda'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idyarda) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idyarda)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idyarda_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idyarda_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idtransporte']))
    {
        $this->nm_new_label['idtransporte'] = "TRANSPORTE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idtransporte = $this->idtransporte;
   $sStyleHidden_idtransporte = '';
   if (isset($this->nmgp_cmp_hidden['idtransporte']) && $this->nmgp_cmp_hidden['idtransporte'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idtransporte']);
       $sStyleHidden_idtransporte = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idtransporte = 'display: none;';
   $sStyleReadInp_idtransporte = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idtransporte']) && $this->nmgp_cmp_readonly['idtransporte'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idtransporte']);
       $sStyleReadLab_idtransporte = '';
       $sStyleReadInp_idtransporte = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idtransporte']) && $this->nmgp_cmp_hidden['idtransporte'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idtransporte" value="<?php echo $this->form_encode_input($idtransporte) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idtransporte_label" id="hidden_field_label_idtransporte" style="<?php echo $sStyleHidden_idtransporte; ?>"><span id="id_label_idtransporte"><?php echo $this->nm_new_label['idtransporte']; ?></span></TD>
    <TD class="scFormDataOdd css_idtransporte_line" id="hidden_field_data_idtransporte" style="<?php echo $sStyleHidden_idtransporte; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idtransporte_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idtransporte"]) &&  $this->nmgp_cmp_readonly["idtransporte"] == "on") { 

 ?>
<input type="hidden" name="idtransporte" value="<?php echo $this->form_encode_input($idtransporte) . "\">" . $idtransporte . ""; ?>
<?php } else { ?>

<?php
$aRecData['idtransporte'] = $this->idtransporte;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte'] = array(); 
    }

   $old_value_id_condicion = $this->id_condicion;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_medida = $this->medida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_condicion = $this->id_condicion;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_medida = $this->medida;

   $cable_val_str = "''";
   if (!empty($this->cable))
   {
       if (is_array($this->cable))
       {
           $Tmp_array = $this->cable;
       }
       else
       {
           $Tmp_array = explode(";", $this->cable);
       }
       $cable_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cable_val_str)
          {
             $cable_val_str .= ", ";
          }
          $cable_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plug_val_str = "''";
   if (!empty($this->plug))
   {
       if (is_array($this->plug))
       {
           $Tmp_array = $this->plug;
       }
       else
       {
           $Tmp_array = explode(";", $this->plug);
       }
       $plug_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plug_val_str)
          {
             $plug_val_str .= ", ";
          }
          $plug_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idTransporte, transporte FROM transporte WHERE idTransporte = " . substr($this->Db->qstr($this->idtransporte), 1, -1) . " ORDER BY transporte";

   $this->id_condicion = $old_value_id_condicion;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->medida = $old_value_medida;

   if ('' != $this->idtransporte)
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
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idtransporte])) ? $aLookup[0][$this->idtransporte] : $this->idtransporte;
$idtransporte_look = (isset($aLookup[0][$this->idtransporte])) ? $aLookup[0][$this->idtransporte] : $this->idtransporte;
?>
<span id="id_read_on_idtransporte" class="sc-ui-readonly-idtransporte css_idtransporte_line" style="<?php echo $sStyleReadLab_idtransporte; ?>"><?php echo str_replace("<", "&lt;", $idtransporte_look); ?></span><span id="id_read_off_idtransporte" class="css_read_off_idtransporte" style="white-space: nowrap;<?php echo $sStyleReadInp_idtransporte; ?>">
 <input class="sc-js-input scFormObjectOdd css_idtransporte_obj" style="display: none;" id="id_sc_field_idtransporte" type=text name="idtransporte" value="<?php echo $this->form_encode_input($idtransporte) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 ") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idtransporte'] = $this->idtransporte;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte'] = array(); 
    }

   $old_value_id_condicion = $this->id_condicion;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_medida = $this->medida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_condicion = $this->id_condicion;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_medida = $this->medida;

   $cable_val_str = "''";
   if (!empty($this->cable))
   {
       if (is_array($this->cable))
       {
           $Tmp_array = $this->cable;
       }
       else
       {
           $Tmp_array = explode(";", $this->cable);
       }
       $cable_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cable_val_str)
          {
             $cable_val_str .= ", ";
          }
          $cable_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plug_val_str = "''";
   if (!empty($this->plug))
   {
       if (is_array($this->plug))
       {
           $Tmp_array = $this->plug;
       }
       else
       {
           $Tmp_array = explode(";", $this->plug);
       }
       $plug_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plug_val_str)
          {
             $plug_val_str .= ", ";
          }
          $plug_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idTransporte, transporte FROM transporte WHERE idTransporte = " . substr($this->Db->qstr($this->idtransporte), 1, -1) . " ORDER BY transporte";

   $this->id_condicion = $old_value_id_condicion;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->medida = $old_value_medida;

   if ('' != $this->idtransporte)
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
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idtransporte'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idtransporte])) ? $aLookup[0][$this->idtransporte] : '';
$idtransporte_look = (isset($aLookup[0][$this->idtransporte])) ? $aLookup[0][$this->idtransporte] : '';
?>
<input type="text" id="id_ac_idtransporte" name="idtransporte_autocomp" class="scFormObjectOdd sc-ui-autocomp-idtransporte css_idtransporte_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 ") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idtransporte_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idtransporte_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idcabezal']))
    {
        $this->nm_new_label['idcabezal'] = "PLACA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcabezal = $this->idcabezal;
   $sStyleHidden_idcabezal = '';
   if (isset($this->nmgp_cmp_hidden['idcabezal']) && $this->nmgp_cmp_hidden['idcabezal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcabezal']);
       $sStyleHidden_idcabezal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcabezal = 'display: none;';
   $sStyleReadInp_idcabezal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idcabezal']) && $this->nmgp_cmp_readonly['idcabezal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcabezal']);
       $sStyleReadLab_idcabezal = '';
       $sStyleReadInp_idcabezal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcabezal']) && $this->nmgp_cmp_hidden['idcabezal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcabezal" value="<?php echo $this->form_encode_input($idcabezal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idcabezal_label" id="hidden_field_label_idcabezal" style="<?php echo $sStyleHidden_idcabezal; ?>"><span id="id_label_idcabezal"><?php echo $this->nm_new_label['idcabezal']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['idcabezal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['php_cmp_required']['idcabezal'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_idcabezal_line" id="hidden_field_data_idcabezal" style="<?php echo $sStyleHidden_idcabezal; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcabezal_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcabezal"]) &&  $this->nmgp_cmp_readonly["idcabezal"] == "on") { 

 ?>
<input type="hidden" name="idcabezal" value="<?php echo $this->form_encode_input($idcabezal) . "\">" . $idcabezal . ""; ?>
<?php } else { ?>

<?php
$aRecData['idcabezal'] = $this->idcabezal;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal'] = array(); 
    }

   $old_value_id_condicion = $this->id_condicion;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_medida = $this->medida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_condicion = $this->id_condicion;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_medida = $this->medida;

   $cable_val_str = "''";
   if (!empty($this->cable))
   {
       if (is_array($this->cable))
       {
           $Tmp_array = $this->cable;
       }
       else
       {
           $Tmp_array = explode(";", $this->cable);
       }
       $cable_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cable_val_str)
          {
             $cable_val_str .= ", ";
          }
          $cable_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plug_val_str = "''";
   if (!empty($this->plug))
   {
       if (is_array($this->plug))
       {
           $Tmp_array = $this->plug;
       }
       else
       {
           $Tmp_array = explode(";", $this->plug);
       }
       $plug_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plug_val_str)
          {
             $plug_val_str .= ", ";
          }
          $plug_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = " . substr($this->Db->qstr($this->idcabezal), 1, -1) . " ORDER BY placa";

   $this->id_condicion = $old_value_id_condicion;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->medida = $old_value_medida;

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
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idcabezal])) ? $aLookup[0][$this->idcabezal] : $this->idcabezal;
$idcabezal_look = (isset($aLookup[0][$this->idcabezal])) ? $aLookup[0][$this->idcabezal] : $this->idcabezal;
?>
<span id="id_read_on_idcabezal" class="sc-ui-readonly-idcabezal css_idcabezal_line" style="<?php echo $sStyleReadLab_idcabezal; ?>"><?php echo str_replace("<", "&lt;", $idcabezal_look); ?></span><span id="id_read_off_idcabezal" class="css_read_off_idcabezal" style="white-space: nowrap;<?php echo $sStyleReadInp_idcabezal; ?>">
 <input class="sc-js-input scFormObjectOdd css_idcabezal_obj" style="display: none;" id="id_sc_field_idcabezal" type=text name="idcabezal" value="<?php echo $this->form_encode_input($idcabezal) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idcabezal'] = $this->idcabezal;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal'] = array(); 
    }

   $old_value_id_condicion = $this->id_condicion;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_medida = $this->medida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_condicion = $this->id_condicion;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_medida = $this->medida;

   $cable_val_str = "''";
   if (!empty($this->cable))
   {
       if (is_array($this->cable))
       {
           $Tmp_array = $this->cable;
       }
       else
       {
           $Tmp_array = explode(";", $this->cable);
       }
       $cable_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cable_val_str)
          {
             $cable_val_str .= ", ";
          }
          $cable_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plug_val_str = "''";
   if (!empty($this->plug))
   {
       if (is_array($this->plug))
       {
           $Tmp_array = $this->plug;
       }
       else
       {
           $Tmp_array = explode(";", $this->plug);
       }
       $plug_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plug_val_str)
          {
             $plug_val_str .= ", ";
          }
          $plug_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = " . substr($this->Db->qstr($this->idcabezal), 1, -1) . " ORDER BY placa";

   $this->id_condicion = $old_value_id_condicion;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->medida = $old_value_medida;

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
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_idcabezal'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idcabezal])) ? $aLookup[0][$this->idcabezal] : '';
$idcabezal_look = (isset($aLookup[0][$this->idcabezal])) ? $aLookup[0][$this->idcabezal] : '';
?>
<input type="text" id="id_ac_idcabezal" name="idcabezal_autocomp" class="scFormObjectOdd sc-ui-autocomp-idcabezal css_idcabezal_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcabezal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcabezal_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['cable']))
   {
       $this->nm_new_label['cable'] = "CABLE";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cable = $this->cable;
   $sStyleHidden_cable = '';
   if (isset($this->nmgp_cmp_hidden['cable']) && $this->nmgp_cmp_hidden['cable'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cable']);
       $sStyleHidden_cable = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cable = 'display: none;';
   $sStyleReadInp_cable = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cable']) && $this->nmgp_cmp_readonly['cable'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cable']);
       $sStyleReadLab_cable = '';
       $sStyleReadInp_cable = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cable']) && $this->nmgp_cmp_hidden['cable'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cable" value="<?php echo $this->form_encode_input($this->cable) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->cable_1 = explode(";", trim($this->cable));
  } 
  else
  {
      if (empty($this->cable))
      {
          $this->cable_1= array(); 
          $this->cable= "";
      } 
      else
      {
          $this->cable_1= $this->cable; 
          $this->cable= ""; 
          foreach ($this->cable_1 as $cada_cable)
          {
             if (!empty($cable))
             {
                 $this->cable.= ";"; 
             } 
             $this->cable.= $cada_cable; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cable_label" id="hidden_field_label_cable" style="<?php echo $sStyleHidden_cable; ?>"><span id="id_label_cable"><?php echo $this->nm_new_label['cable']; ?></span></TD>
    <TD class="scFormDataOdd css_cable_line" id="hidden_field_data_cable" style="<?php echo $sStyleHidden_cable; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cable_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cable"]) &&  $this->nmgp_cmp_readonly["cable"] == "on") { 

$cable_look = "";
 if ($this->cable == "SI") { $cable_look .= "SI" ;} 
 if (empty($cable_look)) { $cable_look = $this->cable; }
?>
<input type="hidden" name="cable" value="<?php echo $this->form_encode_input($cable) . "\">" . $cable_look . ""; ?>
<?php } else { ?>

<?php

$cable_look = "";
 if ($this->cable == "SI") { $cable_look .= "SI" ;} 
 if (empty($cable_look)) { $cable_look = $this->cable; }
?>
<span id="id_read_on_cable" class="css_cable_line" style="<?php echo $sStyleReadLab_cable; ?>"><?php echo $this->form_encode_input($cable_look); ?></span><span id="id_read_off_cable" class="css_read_off_cable css_cable_line" style="<?php echo $sStyleReadInp_cable; ?>"><?php echo "<div id=\"idAjaxCheckbox_cable\" style=\"display: inline-block\" class=\"css_cable_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_cable_line"><?php $tempOptionId = "id-opt-cable" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-cable sc-ui-checkbox-cable" name="cable[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_cable'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->cable_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cable_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cable_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['plug']))
   {
       $this->nm_new_label['plug'] = "PLUG";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $plug = $this->plug;
   $sStyleHidden_plug = '';
   if (isset($this->nmgp_cmp_hidden['plug']) && $this->nmgp_cmp_hidden['plug'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['plug']);
       $sStyleHidden_plug = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_plug = 'display: none;';
   $sStyleReadInp_plug = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['plug']) && $this->nmgp_cmp_readonly['plug'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['plug']);
       $sStyleReadLab_plug = '';
       $sStyleReadInp_plug = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['plug']) && $this->nmgp_cmp_hidden['plug'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="plug" value="<?php echo $this->form_encode_input($this->plug) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->plug_1 = explode(";", trim($this->plug));
  } 
  else
  {
      if (empty($this->plug))
      {
          $this->plug_1= array(); 
          $this->plug= "";
      } 
      else
      {
          $this->plug_1= $this->plug; 
          $this->plug= ""; 
          foreach ($this->plug_1 as $cada_plug)
          {
             if (!empty($plug))
             {
                 $this->plug.= ";"; 
             } 
             $this->plug.= $cada_plug; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_plug_label" id="hidden_field_label_plug" style="<?php echo $sStyleHidden_plug; ?>"><span id="id_label_plug"><?php echo $this->nm_new_label['plug']; ?></span></TD>
    <TD class="scFormDataOdd css_plug_line" id="hidden_field_data_plug" style="<?php echo $sStyleHidden_plug; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_plug_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["plug"]) &&  $this->nmgp_cmp_readonly["plug"] == "on") { 

$plug_look = "";
 if ($this->plug == "SI") { $plug_look .= "SI" ;} 
 if (empty($plug_look)) { $plug_look = $this->plug; }
?>
<input type="hidden" name="plug" value="<?php echo $this->form_encode_input($plug) . "\">" . $plug_look . ""; ?>
<?php } else { ?>

<?php

$plug_look = "";
 if ($this->plug == "SI") { $plug_look .= "SI" ;} 
 if (empty($plug_look)) { $plug_look = $this->plug; }
?>
<span id="id_read_on_plug" class="css_plug_line" style="<?php echo $sStyleReadLab_plug; ?>"><?php echo $this->form_encode_input($plug_look); ?></span><span id="id_read_off_plug" class="css_read_off_plug css_plug_line" style="<?php echo $sStyleReadInp_plug; ?>"><?php echo "<div id=\"idAjaxCheckbox_plug\" style=\"display: inline-block\" class=\"css_plug_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_plug_line"><?php $tempOptionId = "id-opt-plug" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-plug sc-ui-checkbox-plug" name="plug[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_EIR']['Lookup_plug'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->plug_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_plug_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_plug_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['medida']))
    {
        $this->nm_new_label['medida'] = "MEDIDA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $medida = $this->medida;
   $sStyleHidden_medida = '';
   if (isset($this->nmgp_cmp_hidden['medida']) && $this->nmgp_cmp_hidden['medida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['medida']);
       $sStyleHidden_medida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_medida = 'display: none;';
   $sStyleReadInp_medida = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['medida']) && $this->nmgp_cmp_readonly['medida'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['medida']);
       $sStyleReadLab_medida = '';
       $sStyleReadInp_medida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['medida']) && $this->nmgp_cmp_hidden['medida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="medida" value="<?php echo $this->form_encode_input($medida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_medida_label" id="hidden_field_label_medida" style="<?php echo $sStyleHidden_medida; ?>"><span id="id_label_medida"><?php echo $this->nm_new_label['medida']; ?></span></TD>
    <TD class="scFormDataOdd css_medida_line" id="hidden_field_data_medida" style="<?php echo $sStyleHidden_medida; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_medida_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["medida"]) &&  $this->nmgp_cmp_readonly["medida"] == "on") { 

 ?>
<input type="hidden" name="medida" value="<?php echo $this->form_encode_input($medida) . "\">" . $medida . ""; ?>
<?php } else { ?>
<span id="id_read_on_medida" class="sc-ui-readonly-medida css_medida_line" style="<?php echo $sStyleReadLab_medida; ?>"><?php echo $this->medida; ?></span><span id="id_read_off_medida" class="css_read_off_medida" style="white-space: nowrap;<?php echo $sStyleReadInp_medida; ?>">
 <input class="sc-js-input scFormObjectOdd css_medida_obj" style="" id="id_sc_field_medida" type=text name="medida" value="<?php echo $this->form_encode_input($medida) ?>"
 size=2 alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['medida']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['medida']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['medida']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_medida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_medida_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['observaciones']))
    {
        $this->nm_new_label['observaciones'] = "OBSERVACIONES";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $observaciones = $this->observaciones;
   $sStyleHidden_observaciones = '';
   if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['observaciones']);
       $sStyleHidden_observaciones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_observaciones = 'display: none;';
   $sStyleReadInp_observaciones = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['observaciones']) && $this->nmgp_cmp_readonly['observaciones'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['observaciones']);
       $sStyleReadLab_observaciones = '';
       $sStyleReadInp_observaciones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_observaciones_label" id="hidden_field_label_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></TD>
    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->observaciones; ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <input class="sc-js-input scFormObjectOdd css_observaciones_obj" style="" id="id_sc_field_observaciones" type=text name="observaciones" value="<?php echo $this->form_encode_input($observaciones) ?>"
 size=100 maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 ,") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fima']))
    {
        $this->nm_new_label['fima'] = "Fima";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fima = $this->fima;
   $sStyleHidden_fima = '';
   if (isset($this->nmgp_cmp_hidden['fima']) && $this->nmgp_cmp_hidden['fima'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fima']);
       $sStyleHidden_fima = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fima = 'display: none;';
   $sStyleReadInp_fima = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fima']) && $this->nmgp_cmp_readonly['fima'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fima']);
       $sStyleReadLab_fima = '';
       $sStyleReadInp_fima = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fima']) && $this->nmgp_cmp_hidden['fima'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fima" value="<?php echo $this->form_encode_input($fima) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fima_label" id="hidden_field_label_fima" style="<?php echo $sStyleHidden_fima; ?>"><span id="id_label_fima"><?php echo $this->nm_new_label['fima']; ?></span></TD>
    <TD class="scFormDataOdd css_fima_line" id="hidden_field_data_fima" style="<?php echo $sStyleHidden_fima; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fima_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_fima" style="<?php echo $sStyleReadLab_fima; ?>"><div id="sc-id-ronly-fima" style="width: 400px; height: 150px; background-color: #E0E0E0"><img style="border-width: 0" /></div>
</span><span id="id_read_off_fima" class="css_read_off_fima" style="<?php echo $sStyleReadInp_fima; ?>"><input type="hidden" name="fima" id="id_sc_field_fima" value="<?php echo $this->fima ?>" />
<div class="sc-ui-sign" id="sc-id-sign-fima" style="width: 400px; height: 150px; background-color: #E0E0E0"></div>
<div id="sc-id-disabled-fima" style="display: none; width: 400px; height: 150px; background-color: #E0E0E0"><img style="border-width: 0" /></div>
<br />
<?php echo nmButtonOutput($this->arr_buttons, "bclear", "scJQSignatureClear('fima')", "scJQSignatureClear('fima')", "btn_sign_clear_fima", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fima_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fima_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
