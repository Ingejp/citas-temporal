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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("ACTUALIZACION AL PROCESO DE INSPECCION"); } ?></TITLE>
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
.css_read_off_sc_field_0 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_sc_field_1 button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>Cambio_estatus_Rev/Cambio_estatus_Rev_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("Cambio_estatus_Rev_mob_sajax_js.php");
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

include_once('Cambio_estatus_Rev_mob_jquery.php');

?>

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
  scFocusField('turno');

<?php
}
?>
  addAutocomplete(this);

  $("#hidden_bloco_0,#hidden_bloco_1,#hidden_bloco_2").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
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
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
    "hidden_bloco_0": true,
    "hidden_bloco_1": true,
    "hidden_bloco_2": true
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

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-placa", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "placa" != sId ? sId.substr(5) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_Cambio_estatus_Rev_mob_event_placa_onchange) { do_ajax_Cambio_estatus_Rev_mob_event_placa_onchange(sRow); }
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
     url: "Cambio_estatus_Rev_mob.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_placa",
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
    var sId = $(this).attr("id").substr(6), sRow = 'placa' != sId ? sId.substr(5) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'placa' != sId ? sId.substr(5) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_placa", elem).on("focus", function() {
    $("#id_sc_field_placa").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_placa").trigger("blur");
  });

  $(".sc-ui-autocomp-operador", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "operador" != sId ? sId.substr(8) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_Cambio_estatus_Rev_mob_event_operador_onchange) { do_ajax_Cambio_estatus_Rev_mob_event_operador_onchange(sRow); }
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
     url: "Cambio_estatus_Rev_mob.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_operador",
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
    var sId = $(this).attr("id").substr(6), sRow = 'operador' != sId ? sId.substr(8) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'operador' != sId ? sId.substr(8) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_operador", elem).on("focus", function() {
    $("#id_sc_field_operador").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_operador").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['Cambio_estatus_Rev']['error_buffer']) && '' != $_SESSION['scriptcase']['Cambio_estatus_Rev']['error_buffer'])
{
    echo $_SESSION['scriptcase']['Cambio_estatus_Rev']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("Cambio_estatus_Rev_mob_js0.php");
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
               action="Cambio_estatus_Rev_mob.php" 
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
$_SESSION['scriptcase']['error_span_title']['Cambio_estatus_Rev_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['Cambio_estatus_Rev_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="85%%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "ACTUALIZACION AL PROCESO DE INSPECCION"; } ?></div>
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DATOS PRINCIPALES<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['turno']))
    {
        $this->nm_new_label['turno'] = "CONTENEDOR";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $turno = $this->turno;
   $sStyleHidden_turno = '';
   if (isset($this->nmgp_cmp_hidden['turno']) && $this->nmgp_cmp_hidden['turno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['turno']);
       $sStyleHidden_turno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_turno = 'display: none;';
   $sStyleReadInp_turno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['turno']) && $this->nmgp_cmp_readonly['turno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['turno']);
       $sStyleReadLab_turno = '';
       $sStyleReadInp_turno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['turno']) && $this->nmgp_cmp_hidden['turno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="turno" value="<?php echo $this->form_encode_input($turno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_turno_line" id="hidden_field_data_turno" style="<?php echo $sStyleHidden_turno; ?>"> <span class="scFormLabelOddFormat css_turno_label"><span id="id_label_turno"><?php echo $this->nm_new_label['turno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["turno"]) &&  $this->nmgp_cmp_readonly["turno"] == "on") { 

 ?>
<input type="hidden" name="turno" value="<?php echo $this->form_encode_input($turno) . "\">" . $turno . ""; ?>
<?php } else { ?>
<span id="id_read_on_turno" class="sc-ui-readonly-turno css_turno_line" style="<?php echo $sStyleReadLab_turno; ?>"><?php echo $this->turno; ?></span><span id="id_read_off_turno" class="css_read_off_turno" style="white-space: nowrap;<?php echo $sStyleReadInp_turno; ?>">
 <input class="sc-js-input scFormObjectOdd css_turno_obj" style="" id="id_sc_field_turno" type=text name="turno" value="<?php echo $this->form_encode_input($turno) ?>"
 size=12 maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fac_revision']))
    {
        $this->nm_new_label['fac_revision'] = "FACTURA REVISION";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fac_revision = $this->fac_revision;
   $sStyleHidden_fac_revision = '';
   if (isset($this->nmgp_cmp_hidden['fac_revision']) && $this->nmgp_cmp_hidden['fac_revision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fac_revision']);
       $sStyleHidden_fac_revision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fac_revision = 'display: none;';
   $sStyleReadInp_fac_revision = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fac_revision']) && $this->nmgp_cmp_readonly['fac_revision'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fac_revision']);
       $sStyleReadLab_fac_revision = '';
       $sStyleReadInp_fac_revision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fac_revision']) && $this->nmgp_cmp_hidden['fac_revision'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fac_revision" value="<?php echo $this->form_encode_input($fac_revision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fac_revision_line" id="hidden_field_data_fac_revision" style="<?php echo $sStyleHidden_fac_revision; ?>"> <span class="scFormLabelOddFormat css_fac_revision_label"><span id="id_label_fac_revision"><?php echo $this->nm_new_label['fac_revision']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['fac_revision']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['fac_revision'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fac_revision"]) &&  $this->nmgp_cmp_readonly["fac_revision"] == "on") { 

 ?>
<input type="hidden" name="fac_revision" value="<?php echo $this->form_encode_input($fac_revision) . "\">" . $fac_revision . ""; ?>
<?php } else { ?>
<span id="id_read_on_fac_revision" class="sc-ui-readonly-fac_revision css_fac_revision_line" style="<?php echo $sStyleReadLab_fac_revision; ?>"><?php echo $this->fac_revision; ?></span><span id="id_read_off_fac_revision" class="css_read_off_fac_revision" style="white-space: nowrap;<?php echo $sStyleReadInp_fac_revision; ?>">
 <input class="sc-js-input scFormObjectOdd css_fac_revision_obj" style="" id="id_sc_field_fac_revision" type=text name="fac_revision" value="<?php echo $this->form_encode_input($fac_revision) ?>"
 size=10 maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fac_acople']))
    {
        $this->nm_new_label['fac_acople'] = "FACTURA ACOPLE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fac_acople = $this->fac_acople;
   $sStyleHidden_fac_acople = '';
   if (isset($this->nmgp_cmp_hidden['fac_acople']) && $this->nmgp_cmp_hidden['fac_acople'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fac_acople']);
       $sStyleHidden_fac_acople = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fac_acople = 'display: none;';
   $sStyleReadInp_fac_acople = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fac_acople']) && $this->nmgp_cmp_readonly['fac_acople'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fac_acople']);
       $sStyleReadLab_fac_acople = '';
       $sStyleReadInp_fac_acople = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fac_acople']) && $this->nmgp_cmp_hidden['fac_acople'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fac_acople" value="<?php echo $this->form_encode_input($fac_acople) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fac_acople_line" id="hidden_field_data_fac_acople" style="<?php echo $sStyleHidden_fac_acople; ?>"> <span class="scFormLabelOddFormat css_fac_acople_label"><span id="id_label_fac_acople"><?php echo $this->nm_new_label['fac_acople']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['fac_acople']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['fac_acople'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fac_acople"]) &&  $this->nmgp_cmp_readonly["fac_acople"] == "on") { 

 ?>
<input type="hidden" name="fac_acople" value="<?php echo $this->form_encode_input($fac_acople) . "\">" . $fac_acople . ""; ?>
<?php } else { ?>
<span id="id_read_on_fac_acople" class="sc-ui-readonly-fac_acople css_fac_acople_line" style="<?php echo $sStyleReadLab_fac_acople; ?>"><?php echo $this->fac_acople; ?></span><span id="id_read_off_fac_acople" class="css_read_off_fac_acople" style="white-space: nowrap;<?php echo $sStyleReadInp_fac_acople; ?>">
 <input class="sc-js-input scFormObjectOdd css_fac_acople_obj" style="" id="id_sc_field_fac_acople" type=text name="fac_acople" value="<?php echo $this->form_encode_input($fac_acople) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['placa']) && $this->nmgp_cmp_readonly['placa'] == 'on')
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

    <TD class="scFormDataOdd css_placa_line" id="hidden_field_data_placa" style="<?php echo $sStyleHidden_placa; ?>"> <span class="scFormLabelOddFormat css_placa_label"><span id="id_label_placa"><?php echo $this->nm_new_label['placa']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['placa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['placa'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["placa"]) &&  $this->nmgp_cmp_readonly["placa"] == "on") { 

 ?>
<input type="hidden" name="placa" value="<?php echo $this->form_encode_input($placa) . "\">" . $placa . ""; ?>
<?php } else { ?>

<?php
$aRecData['placa'] = $this->placa;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = '" . substr($this->Db->qstr($this->placa), 1, -1) . "' ORDER BY placa";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->placa])) ? $aLookup[0][$this->placa] : $this->placa;
$placa_look = (isset($aLookup[0][$this->placa])) ? $aLookup[0][$this->placa] : $this->placa;
?>
<span id="id_read_on_placa" class="sc-ui-readonly-placa css_placa_line" style="<?php echo $sStyleReadLab_placa; ?>"><?php echo str_replace("<", "&lt;", $placa_look); ?></span><span id="id_read_off_placa" class="css_read_off_placa" style="white-space: nowrap;<?php echo $sStyleReadInp_placa; ?>">
 <input class="sc-js-input scFormObjectOdd css_placa_obj" style="display: none;" id="id_sc_field_placa" type=text name="placa" value="<?php echo $this->form_encode_input($placa) ?>"
 size=10 maxlength=10 style="display: none" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['placa'] = $this->placa;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = '" . substr($this->Db->qstr($this->placa), 1, -1) . "' ORDER BY placa";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_placa'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->placa])) ? $aLookup[0][$this->placa] : '';
$placa_look = (isset($aLookup[0][$this->placa])) ? $aLookup[0][$this->placa] : '';
?>
<input type="text" id="id_ac_placa" name="placa_autocomp" class="scFormObjectOdd sc-ui-autocomp-placa css_placa_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nuevo_estatus']))
   {
       $this->nm_new_label['nuevo_estatus'] = "NUEVO ESTATUS";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nuevo_estatus = $this->nuevo_estatus;
   $sStyleHidden_nuevo_estatus = '';
   if (isset($this->nmgp_cmp_hidden['nuevo_estatus']) && $this->nmgp_cmp_hidden['nuevo_estatus'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nuevo_estatus']);
       $sStyleHidden_nuevo_estatus = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nuevo_estatus = 'display: none;';
   $sStyleReadInp_nuevo_estatus = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nuevo_estatus']) && $this->nmgp_cmp_readonly['nuevo_estatus'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nuevo_estatus']);
       $sStyleReadLab_nuevo_estatus = '';
       $sStyleReadInp_nuevo_estatus = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nuevo_estatus']) && $this->nmgp_cmp_hidden['nuevo_estatus'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nuevo_estatus" value="<?php echo $this->form_encode_input($this->nuevo_estatus) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nuevo_estatus_line" id="hidden_field_data_nuevo_estatus" style="<?php echo $sStyleHidden_nuevo_estatus; ?>"> <span class="scFormLabelOddFormat css_nuevo_estatus_label"><span id="id_label_nuevo_estatus"><?php echo $this->nm_new_label['nuevo_estatus']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['nuevo_estatus']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['php_cmp_required']['nuevo_estatus'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nuevo_estatus"]) &&  $this->nmgp_cmp_readonly["nuevo_estatus"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idestado_revision, descripcion  FROM estado_revision  ORDER BY descripcion";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'][] = $rs->fields[0];
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
   $nuevo_estatus_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nuevo_estatus_1))
          {
              foreach ($this->nuevo_estatus_1 as $tmp_nuevo_estatus)
              {
                  if (trim($tmp_nuevo_estatus) === trim($cadaselect[1])) { $nuevo_estatus_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nuevo_estatus) === trim($cadaselect[1])) { $nuevo_estatus_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="nuevo_estatus" value="<?php echo $this->form_encode_input($nuevo_estatus) . "\">" . $nuevo_estatus_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_nuevo_estatus();
   $x = 0 ; 
   $nuevo_estatus_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nuevo_estatus_1))
          {
              foreach ($this->nuevo_estatus_1 as $tmp_nuevo_estatus)
              {
                  if (trim($tmp_nuevo_estatus) === trim($cadaselect[1])) { $nuevo_estatus_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nuevo_estatus) === trim($cadaselect[1])) { $nuevo_estatus_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($nuevo_estatus_look))
          {
              $nuevo_estatus_look = $this->nuevo_estatus;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_nuevo_estatus\" class=\"css_nuevo_estatus_line\" style=\"" .  $sStyleReadLab_nuevo_estatus . "\">" . $this->form_encode_input($nuevo_estatus_look) . "</span><span id=\"id_read_off_nuevo_estatus\" class=\"css_read_off_nuevo_estatus\" style=\"white-space: nowrap; " . $sStyleReadInp_nuevo_estatus . "\">";
   echo " <span id=\"idAjaxSelect_nuevo_estatus\"><select class=\"sc-js-input scFormObjectOdd css_nuevo_estatus_obj\" style=\"\" id=\"id_sc_field_nuevo_estatus\" name=\"nuevo_estatus\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_nuevo_estatus'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->nuevo_estatus) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->nuevo_estatus)) 
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
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sc_field_0']))
    {
        $this->nm_new_label['sc_field_0'] = "HORA INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_sc_field_0 = $this->sc_field_0;
   if (strlen($this->sc_field_0_hora) > 8 ) {$this->sc_field_0_hora = substr($this->sc_field_0_hora, 0, 8);}
   $this->sc_field_0 .= ' ' . $this->sc_field_0_hora;
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

    <TD class="scFormDataOdd css_sc_field_0_line" id="hidden_field_data_sc_field_0" style="<?php echo $sStyleHidden_sc_field_0; ?>"> <span class="scFormLabelOddFormat css_sc_field_0_label"><span id="id_label_sc_field_0"><?php echo $this->nm_new_label['sc_field_0']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0"]) &&  $this->nmgp_cmp_readonly["sc_field_0"] == "on") { 

 ?>
<input type="hidden" name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) . "\">" . $sc_field_0 . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_0" class="sc-ui-readonly-sc_field_0 css_sc_field_0_line" style="<?php echo $sStyleReadLab_sc_field_0; ?>"><?php echo $sc_field_0; ?></span><span id="id_read_off_sc_field_0" class="css_read_off_sc_field_0" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_0; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_sc_field_0_obj" style="" id="id_sc_field_sc_field_0" type=text name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) ?>"
 size=10 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['sc_field_0']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['sc_field_0']['date_format']; ?>', timeSep: '<?php echo $this->field_config['sc_field_0']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['sc_field_0']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
 </TD>
   <?php }?>
<?php
   $this->sc_field_0 = $old_dt_sc_field_0;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sc_field_1']))
    {
        $this->nm_new_label['sc_field_1'] = "HORA FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_sc_field_1 = $this->sc_field_1;
   if (strlen($this->sc_field_1_hora) > 8 ) {$this->sc_field_1_hora = substr($this->sc_field_1_hora, 0, 8);}
   $this->sc_field_1 .= ' ' . $this->sc_field_1_hora;
   $sc_field_1 = $this->sc_field_1;
   $sStyleHidden_sc_field_1 = '';
   if (isset($this->nmgp_cmp_hidden['sc_field_1']) && $this->nmgp_cmp_hidden['sc_field_1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sc_field_1']);
       $sStyleHidden_sc_field_1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sc_field_1 = 'display: none;';
   $sStyleReadInp_sc_field_1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sc_field_1']) && $this->nmgp_cmp_readonly['sc_field_1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sc_field_1']);
       $sStyleReadLab_sc_field_1 = '';
       $sStyleReadInp_sc_field_1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sc_field_1']) && $this->nmgp_cmp_hidden['sc_field_1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_1" value="<?php echo $this->form_encode_input($sc_field_1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_1_line" id="hidden_field_data_sc_field_1" style="<?php echo $sStyleHidden_sc_field_1; ?>"> <span class="scFormLabelOddFormat css_sc_field_1_label"><span id="id_label_sc_field_1"><?php echo $this->nm_new_label['sc_field_1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_1"]) &&  $this->nmgp_cmp_readonly["sc_field_1"] == "on") { 

 ?>
<input type="hidden" name="sc_field_1" value="<?php echo $this->form_encode_input($sc_field_1) . "\">" . $sc_field_1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_1" class="sc-ui-readonly-sc_field_1 css_sc_field_1_line" style="<?php echo $sStyleReadLab_sc_field_1; ?>"><?php echo $sc_field_1; ?></span><span id="id_read_off_sc_field_1" class="css_read_off_sc_field_1" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_1; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_sc_field_1_obj" style="" id="id_sc_field_sc_field_1" type=text name="sc_field_1" value="<?php echo $this->form_encode_input($sc_field_1) ?>"
 size=10 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['sc_field_1']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['sc_field_1']['date_format']; ?>', timeSep: '<?php echo $this->field_config['sc_field_1']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['sc_field_1']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
 </TD>
   <?php }?>
<?php
   $this->sc_field_1 = $old_dt_sc_field_1;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['operador']))
    {
        $this->nm_new_label['operador'] = "OPERADOR DE TORITO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $operador = $this->operador;
   $sStyleHidden_operador = '';
   if (isset($this->nmgp_cmp_hidden['operador']) && $this->nmgp_cmp_hidden['operador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['operador']);
       $sStyleHidden_operador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_operador = 'display: none;';
   $sStyleReadInp_operador = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['operador']) && $this->nmgp_cmp_readonly['operador'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['operador']);
       $sStyleReadLab_operador = '';
       $sStyleReadInp_operador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['operador']) && $this->nmgp_cmp_hidden['operador'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="operador" value="<?php echo $this->form_encode_input($operador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_operador_line" id="hidden_field_data_operador" style="<?php echo $sStyleHidden_operador; ?>"> <span class="scFormLabelOddFormat css_operador_label"><span id="id_label_operador"><?php echo $this->nm_new_label['operador']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["operador"]) &&  $this->nmgp_cmp_readonly["operador"] == "on") { 

 ?>
<input type="hidden" name="operador" value="<?php echo $this->form_encode_input($operador) . "\">" . $operador . ""; ?>
<?php } else { ?>

<?php
$aRecData['operador'] = $this->operador;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idoperador, nombre FROM operador WHERE idoperador = '" . substr($this->Db->qstr($this->operador), 1, -1) . "' ORDER BY nombre";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->operador])) ? $aLookup[0][$this->operador] : $this->operador;
$operador_look = (isset($aLookup[0][$this->operador])) ? $aLookup[0][$this->operador] : $this->operador;
?>
<span id="id_read_on_operador" class="sc-ui-readonly-operador css_operador_line" style="<?php echo $sStyleReadLab_operador; ?>"><?php echo str_replace("<", "&lt;", $operador_look); ?></span><span id="id_read_off_operador" class="css_read_off_operador" style="white-space: nowrap;<?php echo $sStyleReadInp_operador; ?>">
 <input class="sc-js-input scFormObjectOdd css_operador_obj" style="display: none;" id="id_sc_field_operador" type=text name="operador" value="<?php echo $this->form_encode_input($operador) ?>"
 size=10 maxlength=40 style="display: none" alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz ") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['operador'] = $this->operador;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idoperador, nombre FROM operador WHERE idoperador = '" . substr($this->Db->qstr($this->operador), 1, -1) . "' ORDER BY nombre";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_operador'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->operador])) ? $aLookup[0][$this->operador] : '';
$operador_look = (isset($aLookup[0][$this->operador])) ? $aLookup[0][$this->operador] : '';
?>
<input type="text" id="id_ac_operador" name="operador_autocomp" class="scFormObjectOdd sc-ui-autocomp-operador css_operador_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz ") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['rampa']))
   {
       $this->nm_new_label['rampa'] = "RAMPA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rampa = $this->rampa;
   $sStyleHidden_rampa = '';
   if (isset($this->nmgp_cmp_hidden['rampa']) && $this->nmgp_cmp_hidden['rampa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rampa']);
       $sStyleHidden_rampa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rampa = 'display: none;';
   $sStyleReadInp_rampa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rampa']) && $this->nmgp_cmp_readonly['rampa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rampa']);
       $sStyleReadLab_rampa = '';
       $sStyleReadInp_rampa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rampa']) && $this->nmgp_cmp_hidden['rampa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="rampa" value="<?php echo $this->form_encode_input($this->rampa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rampa_line" id="hidden_field_data_rampa" style="<?php echo $sStyleHidden_rampa; ?>"> <span class="scFormLabelOddFormat css_rampa_label"><span id="id_label_rampa"><?php echo $this->nm_new_label['rampa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rampa"]) &&  $this->nmgp_cmp_readonly["rampa"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idrampa, descripcion  FROM rampa  ORDER BY descripcion";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'][] = $rs->fields[0];
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
   $rampa_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->rampa_1))
          {
              foreach ($this->rampa_1 as $tmp_rampa)
              {
                  if (trim($tmp_rampa) === trim($cadaselect[1])) { $rampa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->rampa) === trim($cadaselect[1])) { $rampa_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="rampa" value="<?php echo $this->form_encode_input($rampa) . "\">" . $rampa_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_rampa();
   $x = 0 ; 
   $rampa_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->rampa_1))
          {
              foreach ($this->rampa_1 as $tmp_rampa)
              {
                  if (trim($tmp_rampa) === trim($cadaselect[1])) { $rampa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->rampa) === trim($cadaselect[1])) { $rampa_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($rampa_look))
          {
              $rampa_look = $this->rampa;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_rampa\" class=\"css_rampa_line\" style=\"" .  $sStyleReadLab_rampa . "\">" . $this->form_encode_input($rampa_look) . "</span><span id=\"id_read_off_rampa\" class=\"css_read_off_rampa\" style=\"white-space: nowrap; " . $sStyleReadInp_rampa . "\">";
   echo " <span id=\"idAjaxSelect_rampa\"><select class=\"sc-js-input scFormObjectOdd css_rampa_obj\" style=\"\" id=\"id_sc_field_rampa\" name=\"rampa\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_rampa'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->rampa) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->rampa)) 
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
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_revision']))
   {
       $this->nm_new_label['tipo_revision'] = "TIPO_REVISION";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_revision = $this->tipo_revision;
   $sStyleHidden_tipo_revision = '';
   if (isset($this->nmgp_cmp_hidden['tipo_revision']) && $this->nmgp_cmp_hidden['tipo_revision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_revision']);
       $sStyleHidden_tipo_revision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_revision = 'display: none;';
   $sStyleReadInp_tipo_revision = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_revision']) && $this->nmgp_cmp_readonly['tipo_revision'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_revision']);
       $sStyleReadLab_tipo_revision = '';
       $sStyleReadInp_tipo_revision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_revision']) && $this->nmgp_cmp_hidden['tipo_revision'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_revision" value="<?php echo $this->form_encode_input($this->tipo_revision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_revision_line" id="hidden_field_data_tipo_revision" style="<?php echo $sStyleHidden_tipo_revision; ?>"> <span class="scFormLabelOddFormat css_tipo_revision_label"><span id="id_label_tipo_revision"><?php echo $this->nm_new_label['tipo_revision']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_revision"]) &&  $this->nmgp_cmp_readonly["tipo_revision"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'] = array(); 
    }

   $old_value_sc_field_0 = $this->sc_field_0;
   $old_value_sc_field_0_hora = $this->sc_field_0_hora;
   $old_value_sc_field_1 = $this->sc_field_1;
   $old_value_sc_field_1_hora = $this->sc_field_1_hora;
   $old_value_intrusion = $this->intrusion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_sc_field_0 = $this->sc_field_0;
   $unformatted_value_sc_field_0_hora = $this->sc_field_0_hora;
   $unformatted_value_sc_field_1 = $this->sc_field_1;
   $unformatted_value_sc_field_1_hora = $this->sc_field_1_hora;
   $unformatted_value_intrusion = $this->intrusion;

   $nm_comando = "SELECT idtipoderevision, descripcion  FROM tipoderevision  ORDER BY descripcion";

   $this->sc_field_0 = $old_value_sc_field_0;
   $this->sc_field_0_hora = $old_value_sc_field_0_hora;
   $this->sc_field_1 = $old_value_sc_field_1;
   $this->sc_field_1_hora = $old_value_sc_field_1_hora;
   $this->intrusion = $old_value_intrusion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'][] = $rs->fields[0];
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
   $tipo_revision_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_revision_1))
          {
              foreach ($this->tipo_revision_1 as $tmp_tipo_revision)
              {
                  if (trim($tmp_tipo_revision) === trim($cadaselect[1])) { $tipo_revision_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_revision) === trim($cadaselect[1])) { $tipo_revision_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tipo_revision" value="<?php echo $this->form_encode_input($tipo_revision) . "\">" . $tipo_revision_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tipo_revision();
   $x = 0 ; 
   $tipo_revision_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_revision_1))
          {
              foreach ($this->tipo_revision_1 as $tmp_tipo_revision)
              {
                  if (trim($tmp_tipo_revision) === trim($cadaselect[1])) { $tipo_revision_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_revision) === trim($cadaselect[1])) { $tipo_revision_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tipo_revision_look))
          {
              $tipo_revision_look = $this->tipo_revision;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tipo_revision\" class=\"css_tipo_revision_line\" style=\"" .  $sStyleReadLab_tipo_revision . "\">" . $this->form_encode_input($tipo_revision_look) . "</span><span id=\"id_read_off_tipo_revision\" class=\"css_read_off_tipo_revision\" style=\"white-space: nowrap; " . $sStyleReadInp_tipo_revision . "\">";
   echo " <span id=\"idAjaxSelect_tipo_revision\"><select class=\"sc-js-input scFormObjectOdd css_tipo_revision_obj\" style=\"\" id=\"id_sc_field_tipo_revision\" name=\"tipo_revision\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['Lookup_tipo_revision'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tipo_revision) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tipo_revision)) 
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
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['intrusion']))
    {
        $this->nm_new_label['intrusion'] = "% INTRUSION";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $intrusion = $this->intrusion;
   $sStyleHidden_intrusion = '';
   if (isset($this->nmgp_cmp_hidden['intrusion']) && $this->nmgp_cmp_hidden['intrusion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['intrusion']);
       $sStyleHidden_intrusion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_intrusion = 'display: none;';
   $sStyleReadInp_intrusion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['intrusion']) && $this->nmgp_cmp_readonly['intrusion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['intrusion']);
       $sStyleReadLab_intrusion = '';
       $sStyleReadInp_intrusion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['intrusion']) && $this->nmgp_cmp_hidden['intrusion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="intrusion" value="<?php echo $this->form_encode_input($intrusion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_intrusion_line" id="hidden_field_data_intrusion" style="<?php echo $sStyleHidden_intrusion; ?>"> <span class="scFormLabelOddFormat css_intrusion_label"><span id="id_label_intrusion"><?php echo $this->nm_new_label['intrusion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["intrusion"]) &&  $this->nmgp_cmp_readonly["intrusion"] == "on") { 

 ?>
<input type="hidden" name="intrusion" value="<?php echo $this->form_encode_input($intrusion) . "\">" . $intrusion . ""; ?>
<?php } else { ?>
<span id="id_read_on_intrusion" class="sc-ui-readonly-intrusion css_intrusion_line" style="<?php echo $sStyleReadLab_intrusion; ?>"><?php echo $this->intrusion; ?></span><span id="id_read_off_intrusion" class="css_read_off_intrusion" style="white-space: nowrap;<?php echo $sStyleReadInp_intrusion; ?>">
 <input class="sc-js-input scFormObjectOdd css_intrusion_obj" style="" id="id_sc_field_intrusion" type=text name="intrusion" value="<?php echo $this->form_encode_input($intrusion) ?>"
 size=3 maxlength=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['intrusion']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['intrusion']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"> <span class="scFormLabelOddFormat css_observaciones_label"><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->observaciones; ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <input class="sc-js-input scFormObjectOdd css_observaciones_obj" style="" id="id_sc_field_observaciones" type=text name="observaciones" value="<?php echo $this->form_encode_input($observaciones) ?>"
 size=60 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789áéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ .,") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_observaciones_dumb = ('' == $sStyleHidden_observaciones) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_observaciones_dumb" style="<?php echo $sStyleHidden_observaciones_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DETALLE<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cliente']))
    {
        $this->nm_new_label['cliente'] = "CLIENTE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cliente = $this->cliente;
   $sStyleHidden_cliente = '';
   if (isset($this->nmgp_cmp_hidden['cliente']) && $this->nmgp_cmp_hidden['cliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cliente']);
       $sStyleHidden_cliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cliente = 'display: none;';
   $sStyleReadInp_cliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cliente']) && $this->nmgp_cmp_readonly['cliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cliente']);
       $sStyleReadLab_cliente = '';
       $sStyleReadInp_cliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cliente']) && $this->nmgp_cmp_hidden['cliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cliente" value="<?php echo $this->form_encode_input($cliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cliente_line" id="hidden_field_data_cliente" style="<?php echo $sStyleHidden_cliente; ?>"> <span class="scFormLabelOddFormat css_cliente_label"><span id="id_label_cliente"><?php echo $this->nm_new_label['cliente']; ?></span></span><br><span id="id_ajax_label_cliente"><?php echo $cliente?></span>
<input type="hidden" name="cliente" value="<?php echo $this->form_encode_input($cliente); ?>">
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contenedor']))
    {
        $this->nm_new_label['contenedor'] = "MERCADERIA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contenedor = $this->contenedor;
   $sStyleHidden_contenedor = '';
   if (isset($this->nmgp_cmp_hidden['contenedor']) && $this->nmgp_cmp_hidden['contenedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contenedor']);
       $sStyleHidden_contenedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contenedor = 'display: none;';
   $sStyleReadInp_contenedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contenedor']) && $this->nmgp_cmp_readonly['contenedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contenedor']);
       $sStyleReadLab_contenedor = '';
       $sStyleReadInp_contenedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contenedor']) && $this->nmgp_cmp_hidden['contenedor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contenedor" value="<?php echo $this->form_encode_input($contenedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contenedor_line" id="hidden_field_data_contenedor" style="<?php echo $sStyleHidden_contenedor; ?>"> <span class="scFormLabelOddFormat css_contenedor_label"><span id="id_label_contenedor"><?php echo $this->nm_new_label['contenedor']; ?></span></span><br><span id="id_ajax_label_contenedor"><?php echo $contenedor?></span>
<input type="hidden" name="contenedor" value="<?php echo $this->form_encode_input($contenedor); ?>">
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estatus']))
    {
        $this->nm_new_label['estatus'] = "ESTATUS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatus = $this->estatus;
   $sStyleHidden_estatus = '';
   if (isset($this->nmgp_cmp_hidden['estatus']) && $this->nmgp_cmp_hidden['estatus'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatus']);
       $sStyleHidden_estatus = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatus = 'display: none;';
   $sStyleReadInp_estatus = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatus']) && $this->nmgp_cmp_readonly['estatus'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatus']);
       $sStyleReadLab_estatus = '';
       $sStyleReadInp_estatus = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatus']) && $this->nmgp_cmp_hidden['estatus'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatus" value="<?php echo $this->form_encode_input($estatus) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatus_line" id="hidden_field_data_estatus" style="<?php echo $sStyleHidden_estatus; ?>"> <span class="scFormLabelOddFormat css_estatus_label"><span id="id_label_estatus"><?php echo $this->nm_new_label['estatus']; ?></span></span><br><span id="id_ajax_label_estatus"><?php echo $estatus?></span>
<input type="hidden" name="estatus" value="<?php echo $this->form_encode_input($estatus); ?>">
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ubicacion']))
    {
        $this->nm_new_label['ubicacion'] = "UBICACION";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ubicacion = $this->ubicacion;
   $sStyleHidden_ubicacion = '';
   if (isset($this->nmgp_cmp_hidden['ubicacion']) && $this->nmgp_cmp_hidden['ubicacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ubicacion']);
       $sStyleHidden_ubicacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ubicacion = 'display: none;';
   $sStyleReadInp_ubicacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ubicacion']) && $this->nmgp_cmp_readonly['ubicacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ubicacion']);
       $sStyleReadLab_ubicacion = '';
       $sStyleReadInp_ubicacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ubicacion']) && $this->nmgp_cmp_hidden['ubicacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ubicacion" value="<?php echo $this->form_encode_input($ubicacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ubicacion_line" id="hidden_field_data_ubicacion" style="<?php echo $sStyleHidden_ubicacion; ?>"> <span class="scFormLabelOddFormat css_ubicacion_label"><span id="id_label_ubicacion"><?php echo $this->nm_new_label['ubicacion']; ?></span></span><br><span id="id_ajax_label_ubicacion"><?php echo $ubicacion?></span>
<input type="hidden" name="ubicacion" value="<?php echo $this->form_encode_input($ubicacion); ?>">
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_ubicacion_dumb = ('' == $sStyleHidden_ubicacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ubicacion_dumb" style="<?php echo $sStyleHidden_ubicacion_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>GESTOR ADUANAL<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre']))
    {
        $this->nm_new_label['nombre'] = "NOMBRE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre = $this->nombre;
   $sStyleHidden_nombre = '';
   if (isset($this->nmgp_cmp_hidden['nombre']) && $this->nmgp_cmp_hidden['nombre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre']);
       $sStyleHidden_nombre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre = 'display: none;';
   $sStyleReadInp_nombre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre']) && $this->nmgp_cmp_readonly['nombre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre']);
       $sStyleReadLab_nombre = '';
       $sStyleReadInp_nombre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre']) && $this->nmgp_cmp_hidden['nombre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre" value="<?php echo $this->form_encode_input($nombre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_line" id="hidden_field_data_nombre" style="<?php echo $sStyleHidden_nombre; ?>"> <span class="scFormLabelOddFormat css_nombre_label"><span id="id_label_nombre"><?php echo $this->nm_new_label['nombre']; ?></span></span><br><span id="id_ajax_label_nombre"><?php echo $nombre?></span>
<input type="hidden" name="nombre" value="<?php echo $this->form_encode_input($nombre); ?>">
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefonos']))
    {
        $this->nm_new_label['telefonos'] = "TELEFONOS GESTOR";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefonos = $this->telefonos;
   $sStyleHidden_telefonos = '';
   if (isset($this->nmgp_cmp_hidden['telefonos']) && $this->nmgp_cmp_hidden['telefonos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefonos']);
       $sStyleHidden_telefonos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefonos = 'display: none;';
   $sStyleReadInp_telefonos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefonos']) && $this->nmgp_cmp_readonly['telefonos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefonos']);
       $sStyleReadLab_telefonos = '';
       $sStyleReadInp_telefonos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefonos']) && $this->nmgp_cmp_hidden['telefonos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefonos" value="<?php echo $this->form_encode_input($telefonos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telefonos_line" id="hidden_field_data_telefonos" style="<?php echo $sStyleHidden_telefonos; ?>"> <span class="scFormLabelOddFormat css_telefonos_label"><span id="id_label_telefonos"><?php echo $this->nm_new_label['telefonos']; ?></span></span><br><span id="id_ajax_label_telefonos"><?php echo $telefonos?></span>
<input type="hidden" name="telefonos" value="<?php echo $this->form_encode_input($telefonos); ?>">
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo']))
    {
        $this->nm_new_label['codigo'] = "CODIGO DE TURNO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo = $this->codigo;
   $sStyleHidden_codigo = '';
   if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo']);
       $sStyleHidden_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo = 'display: none;';
   $sStyleReadInp_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo']) && $this->nmgp_cmp_readonly['codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo']);
       $sStyleReadLab_codigo = '';
       $sStyleReadInp_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_line" id="hidden_field_data_codigo" style="<?php echo $sStyleHidden_codigo; ?>"> <span class="scFormLabelOddFormat css_codigo_label"><span id="id_label_codigo"><?php echo $this->nm_new_label['codigo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo"]) &&  $this->nmgp_cmp_readonly["codigo"] == "on") { 

 ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">" . $codigo . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo" class="sc-ui-readonly-codigo css_codigo_line" style="<?php echo $sStyleReadLab_codigo; ?>"><?php echo $this->codigo; ?></span><span id="id_read_off_codigo" class="css_read_off_codigo" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_obj" style="" id="id_sc_field_codigo" type=text name="codigo" value="<?php echo $this->form_encode_input($codigo) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





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
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bok", "scBtnFn_sys_format_ok()", "scBtnFn_sys_format_ok()", "sub_form_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
?>
       
<?php
           if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("Cambio_estatus_Rev_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("Cambio_estatus_Rev_mob");
 parent.scAjaxDetailHeight("Cambio_estatus_Rev_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("Cambio_estatus_Rev_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("Cambio_estatus_Rev_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['sc_modal'])
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
		if ($("#sc_sc_btn_0_bot").length && $("#sc_sc_btn_0_bot").is(":visible")) {
			sc_btn_sc_btn_0()
			 return;
		}
	}
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-1").length && $("#sub_form_b.sc-unique-btn-1").is(":visible")) {
			nm_atualiza('alterar');
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
		if ($("#Bsair_b.sc-unique-btn-2").length && $("#Bsair_b.sc-unique-btn-2").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-3").length && $("#Bsair_b.sc-unique-btn-3").is(":visible")) {
			nm_saida_glo(); return false;
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['Cambio_estatus_Rev_mob']['buttonStatus'] = $this->nmgp_botoes;
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
