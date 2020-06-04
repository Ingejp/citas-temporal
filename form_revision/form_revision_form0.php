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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("INGRESO DE CONTENEDORES PARA REVISIÓN"); } else { echo strip_tags("INGRESO DE CONTENEDORES PARA REVISIÓN"); } ?></TITLE>
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
.css_read_off_fecha_solicitud button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_revision/form_revision_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_revision_sajax_js.php");
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

include_once('form_revision_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

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


  $(".sc-ui-autocomp-idcabezal", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idcabezal" != sId ? sId.substr(9) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_revision_event_idcabezal_onchange) { do_ajax_form_revision_event_idcabezal_onchange(sRow); }
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
     url: "form_revision.php",
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

  $(".sc-ui-autocomp-idgestor_aduanal", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idgestor_aduanal" != sId ? sId.substr(16) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_revision_event_idgestor_aduanal_onchange) { do_ajax_form_revision_event_idgestor_aduanal_onchange(sRow); }
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
     url: "form_revision.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idgestor_aduanal",
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
    var sId = $(this).attr("id").substr(6), sRow = 'idgestor_aduanal' != sId ? sId.substr(16) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idgestor_aduanal' != sId ? sId.substr(16) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_idgestor_aduanal", elem).on("focus", function() {
    $("#id_sc_field_idgestor_aduanal").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_idgestor_aduanal").trigger("blur");
  });

  $(".sc-ui-autocomp-idconsignatario", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idconsignatario" != sId ? sId.substr(15) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_revision_event_idconsignatario_onchange) { do_ajax_form_revision_event_idconsignatario_onchange(sRow); }
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
     url: "form_revision.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idconsignatario",
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
    var sId = $(this).attr("id").substr(6), sRow = 'idconsignatario' != sId ? sId.substr(15) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idconsignatario' != sId ? sId.substr(15) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_idconsignatario", elem).on("focus", function() {
    $("#id_sc_field_idconsignatario").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_idconsignatario").trigger("blur");
  });

  $(".sc-ui-autocomp-idcontenido", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idcontenido" != sId ? sId.substr(11) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_revision_event_idcontenido_onchange) { do_ajax_form_revision_event_idcontenido_onchange(sRow); }
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
     url: "form_revision.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idcontenido",
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
    var sId = $(this).attr("id").substr(6), sRow = 'idcontenido' != sId ? sId.substr(11) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idcontenido' != sId ? sId.substr(11) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_idcontenido", elem).on("focus", function() {
    $("#id_sc_field_idcontenido").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_idcontenido").trigger("blur");
  });

  $(".sc-ui-autocomp-idfuncionario", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idfuncionario" != sId ? sId.substr(13) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_revision_event_idfuncionario_onchange) { do_ajax_form_revision_event_idfuncionario_onchange(sRow); }
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
     url: "form_revision.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idfuncionario",
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
    var sId = $(this).attr("id").substr(6), sRow = 'idfuncionario' != sId ? sId.substr(13) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idfuncionario' != sId ? sId.substr(13) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_idfuncionario", elem).on("focus", function() {
    $("#id_sc_field_idfuncionario").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_idfuncionario").trigger("blur");
  });

  $(".sc-ui-autocomp-idviaje_importacion", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idviaje_importacion" != sId ? sId.substr(19) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_revision_event_idviaje_importacion_onchange) { do_ajax_form_revision_event_idviaje_importacion_onchange(sRow); }
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
     url: "form_revision.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idviaje_importacion",
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
    var sId = $(this).attr("id").substr(6), sRow = 'idviaje_importacion' != sId ? sId.substr(19) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idviaje_importacion' != sId ? sId.substr(19) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_idviaje_importacion", elem).on("focus", function() {
    $("#id_sc_field_idviaje_importacion").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_idviaje_importacion").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_revision_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_revision'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_revision'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="85%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "INGRESO DE CONTENEDORES PARA REVISIÓN"; } else { echo "INGRESO DE CONTENEDORES PARA REVISIÓN"; } ?></div>
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idestado_revision']))
   {
       $this->nmgp_cmp_hidden['idestado_revision'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['sec_users_login']))
   {
       $this->nmgp_cmp_hidden['sec_users_login'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idestado']))
   {
       $this->nmgp_cmp_hidden['idestado'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="6" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DATOS GENERALES<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha_solicitud']))
    {
        $this->nm_new_label['fecha_solicitud'] = "FECHA SOLICITUD";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecha_solicitud = $this->fecha_solicitud;
   if (strlen($this->fecha_solicitud_hora) > 8 ) {$this->fecha_solicitud_hora = substr($this->fecha_solicitud_hora, 0, 8);}
   $this->fecha_solicitud .= ' ' . $this->fecha_solicitud_hora;
   $fecha_solicitud = $this->fecha_solicitud;
   $sStyleHidden_fecha_solicitud = '';
   if (isset($this->nmgp_cmp_hidden['fecha_solicitud']) && $this->nmgp_cmp_hidden['fecha_solicitud'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_solicitud']);
       $sStyleHidden_fecha_solicitud = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_solicitud = 'display: none;';
   $sStyleReadInp_fecha_solicitud = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_solicitud']) && $this->nmgp_cmp_readonly['fecha_solicitud'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_solicitud']);
       $sStyleReadLab_fecha_solicitud = '';
       $sStyleReadInp_fecha_solicitud = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_solicitud']) && $this->nmgp_cmp_hidden['fecha_solicitud'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_solicitud" value="<?php echo $this->form_encode_input($fecha_solicitud) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_solicitud_line" id="hidden_field_data_fecha_solicitud" style="<?php echo $sStyleHidden_fecha_solicitud; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_solicitud_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_solicitud_label"><span id="id_label_fecha_solicitud"><?php echo $this->nm_new_label['fecha_solicitud']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['fecha_solicitud']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['fecha_solicitud'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br><input type="hidden" name="fecha_solicitud" value="<?php echo $this->form_encode_input($fecha_solicitud); ?>"><span id="id_ajax_label_fecha_solicitud"><?php echo nl2br($fecha_solicitud); ?></span>
<?php
$tmp_form_data = $this->field_config['fecha_solicitud']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_solicitud_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_solicitud_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fecha_solicitud = $old_dt_fecha_solicitud;
?>

   <?php
    if (!isset($this->nm_new_label['idestado']))
    {
        $this->nm_new_label['idestado'] = "ESTADO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idestado = $this->idestado;
   if (!isset($this->nmgp_cmp_hidden['idestado']))
   {
       $this->nmgp_cmp_hidden['idestado'] = 'off';
   }
   $sStyleHidden_idestado = '';
   if (isset($this->nmgp_cmp_hidden['idestado']) && $this->nmgp_cmp_hidden['idestado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idestado']);
       $sStyleHidden_idestado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idestado = 'display: none;';
   $sStyleReadInp_idestado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idestado']) && $this->nmgp_cmp_readonly['idestado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idestado']);
       $sStyleReadLab_idestado = '';
       $sStyleReadInp_idestado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idestado']) && $this->nmgp_cmp_hidden['idestado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idestado" value="<?php echo $this->form_encode_input($idestado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idestado_line" id="hidden_field_data_idestado" style="<?php echo $sStyleHidden_idestado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idestado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idestado_label"><span id="id_label_idestado"><?php echo $this->nm_new_label['idestado']; ?></span></span><br><input type="hidden" name="idestado" value="<?php echo $this->form_encode_input($idestado); ?>"><span id="id_ajax_label_idestado"><?php echo nl2br($idestado); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idestado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idestado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['factura_revision']))
    {
        $this->nm_new_label['factura_revision'] = "FACTURA REVISION";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $factura_revision = $this->factura_revision;
   $sStyleHidden_factura_revision = '';
   if (isset($this->nmgp_cmp_hidden['factura_revision']) && $this->nmgp_cmp_hidden['factura_revision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['factura_revision']);
       $sStyleHidden_factura_revision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_factura_revision = 'display: none;';
   $sStyleReadInp_factura_revision = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['factura_revision']) && $this->nmgp_cmp_readonly['factura_revision'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['factura_revision']);
       $sStyleReadLab_factura_revision = '';
       $sStyleReadInp_factura_revision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['factura_revision']) && $this->nmgp_cmp_hidden['factura_revision'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="factura_revision" value="<?php echo $this->form_encode_input($factura_revision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_factura_revision_line" id="hidden_field_data_factura_revision" style="<?php echo $sStyleHidden_factura_revision; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_factura_revision_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_factura_revision_label"><span id="id_label_factura_revision"><?php echo $this->nm_new_label['factura_revision']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["factura_revision"]) &&  $this->nmgp_cmp_readonly["factura_revision"] == "on") { 

 ?>
<input type="hidden" name="factura_revision" value="<?php echo $this->form_encode_input($factura_revision) . "\">" . $factura_revision . ""; ?>
<?php } else { ?>
<span id="id_read_on_factura_revision" class="sc-ui-readonly-factura_revision css_factura_revision_line" style="<?php echo $sStyleReadLab_factura_revision; ?>"><?php echo $this->factura_revision; ?></span><span id="id_read_off_factura_revision" class="css_read_off_factura_revision" style="white-space: nowrap;<?php echo $sStyleReadInp_factura_revision; ?>">
 <input class="sc-js-input scFormObjectOdd css_factura_revision_obj" style="" id="id_sc_field_factura_revision" type=text name="factura_revision" value="<?php echo $this->form_encode_input($factura_revision) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_factura_revision_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_factura_revision_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['factura_acople']))
    {
        $this->nm_new_label['factura_acople'] = "FACTURA ACOPLE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $factura_acople = $this->factura_acople;
   $sStyleHidden_factura_acople = '';
   if (isset($this->nmgp_cmp_hidden['factura_acople']) && $this->nmgp_cmp_hidden['factura_acople'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['factura_acople']);
       $sStyleHidden_factura_acople = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_factura_acople = 'display: none;';
   $sStyleReadInp_factura_acople = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['factura_acople']) && $this->nmgp_cmp_readonly['factura_acople'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['factura_acople']);
       $sStyleReadLab_factura_acople = '';
       $sStyleReadInp_factura_acople = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['factura_acople']) && $this->nmgp_cmp_hidden['factura_acople'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="factura_acople" value="<?php echo $this->form_encode_input($factura_acople) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_factura_acople_line" id="hidden_field_data_factura_acople" style="<?php echo $sStyleHidden_factura_acople; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_factura_acople_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_factura_acople_label"><span id="id_label_factura_acople"><?php echo $this->nm_new_label['factura_acople']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["factura_acople"]) &&  $this->nmgp_cmp_readonly["factura_acople"] == "on") { 

 ?>
<input type="hidden" name="factura_acople" value="<?php echo $this->form_encode_input($factura_acople) . "\">" . $factura_acople . ""; ?>
<?php } else { ?>
<span id="id_read_on_factura_acople" class="sc-ui-readonly-factura_acople css_factura_acople_line" style="<?php echo $sStyleReadLab_factura_acople; ?>"><?php echo $this->factura_acople; ?></span><span id="id_read_off_factura_acople" class="css_read_off_factura_acople" style="white-space: nowrap;<?php echo $sStyleReadInp_factura_acople; ?>">
 <input class="sc-js-input scFormObjectOdd css_factura_acople_obj" style="" id="id_sc_field_factura_acople" type=text name="factura_acople" value="<?php echo $this->form_encode_input($factura_acople) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_factura_acople_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_factura_acople_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['idtipo_movilizacion']))
   {
       $this->nm_new_label['idtipo_movilizacion'] = "TIPO MOVILIZACION";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idtipo_movilizacion = $this->idtipo_movilizacion;
   $sStyleHidden_idtipo_movilizacion = '';
   if (isset($this->nmgp_cmp_hidden['idtipo_movilizacion']) && $this->nmgp_cmp_hidden['idtipo_movilizacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idtipo_movilizacion']);
       $sStyleHidden_idtipo_movilizacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idtipo_movilizacion = 'display: none;';
   $sStyleReadInp_idtipo_movilizacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idtipo_movilizacion']) && $this->nmgp_cmp_readonly['idtipo_movilizacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idtipo_movilizacion']);
       $sStyleReadLab_idtipo_movilizacion = '';
       $sStyleReadInp_idtipo_movilizacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idtipo_movilizacion']) && $this->nmgp_cmp_hidden['idtipo_movilizacion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idtipo_movilizacion" value="<?php echo $this->form_encode_input($this->idtipo_movilizacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idtipo_movilizacion_line" id="hidden_field_data_idtipo_movilizacion" style="<?php echo $sStyleHidden_idtipo_movilizacion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idtipo_movilizacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idtipo_movilizacion_label"><span id="id_label_idtipo_movilizacion"><?php echo $this->nm_new_label['idtipo_movilizacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idtipo_movilizacion"]) &&  $this->nmgp_cmp_readonly["idtipo_movilizacion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idtipo_movilizacion, descripcion  FROM tipo_movilizacion  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'][] = $rs->fields[0];
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
   $idtipo_movilizacion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipo_movilizacion_1))
          {
              foreach ($this->idtipo_movilizacion_1 as $tmp_idtipo_movilizacion)
              {
                  if (trim($tmp_idtipo_movilizacion) === trim($cadaselect[1])) { $idtipo_movilizacion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipo_movilizacion) === trim($cadaselect[1])) { $idtipo_movilizacion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idtipo_movilizacion" value="<?php echo $this->form_encode_input($idtipo_movilizacion) . "\">" . $idtipo_movilizacion_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idtipo_movilizacion();
   $x = 0 ; 
   $idtipo_movilizacion_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipo_movilizacion_1))
          {
              foreach ($this->idtipo_movilizacion_1 as $tmp_idtipo_movilizacion)
              {
                  if (trim($tmp_idtipo_movilizacion) === trim($cadaselect[1])) { $idtipo_movilizacion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipo_movilizacion) === trim($cadaselect[1])) { $idtipo_movilizacion_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idtipo_movilizacion_look))
          {
              $idtipo_movilizacion_look = $this->idtipo_movilizacion;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idtipo_movilizacion\" class=\"css_idtipo_movilizacion_line\" style=\"" .  $sStyleReadLab_idtipo_movilizacion . "\">" . $this->form_encode_input($idtipo_movilizacion_look) . "</span><span id=\"id_read_off_idtipo_movilizacion\" class=\"css_read_off_idtipo_movilizacion\" style=\"white-space: nowrap; " . $sStyleReadInp_idtipo_movilizacion . "\">";
   echo " <span id=\"idAjaxSelect_idtipo_movilizacion\"><select class=\"sc-js-input scFormObjectOdd css_idtipo_movilizacion_obj\" style=\"\" id=\"id_sc_field_idtipo_movilizacion\" name=\"idtipo_movilizacion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipo_movilizacion'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idtipo_movilizacion) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idtipo_movilizacion)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idtipo_movilizacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idtipo_movilizacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['idregimen_aduanero']))
   {
       $this->nm_new_label['idregimen_aduanero'] = "REGIMEN ADUANERO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idregimen_aduanero = $this->idregimen_aduanero;
   $sStyleHidden_idregimen_aduanero = '';
   if (isset($this->nmgp_cmp_hidden['idregimen_aduanero']) && $this->nmgp_cmp_hidden['idregimen_aduanero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idregimen_aduanero']);
       $sStyleHidden_idregimen_aduanero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idregimen_aduanero = 'display: none;';
   $sStyleReadInp_idregimen_aduanero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idregimen_aduanero']) && $this->nmgp_cmp_readonly['idregimen_aduanero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idregimen_aduanero']);
       $sStyleReadLab_idregimen_aduanero = '';
       $sStyleReadInp_idregimen_aduanero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idregimen_aduanero']) && $this->nmgp_cmp_hidden['idregimen_aduanero'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idregimen_aduanero" value="<?php echo $this->form_encode_input($this->idregimen_aduanero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idregimen_aduanero_line" id="hidden_field_data_idregimen_aduanero" style="<?php echo $sStyleHidden_idregimen_aduanero; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idregimen_aduanero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idregimen_aduanero_label"><span id="id_label_idregimen_aduanero"><?php echo $this->nm_new_label['idregimen_aduanero']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idregimen_aduanero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idregimen_aduanero'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idregimen_aduanero"]) &&  $this->nmgp_cmp_readonly["idregimen_aduanero"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idregimen_aduanero, descripcion  FROM regimen_aduanero  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'][] = $rs->fields[0];
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
   $idregimen_aduanero_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idregimen_aduanero_1))
          {
              foreach ($this->idregimen_aduanero_1 as $tmp_idregimen_aduanero)
              {
                  if (trim($tmp_idregimen_aduanero) === trim($cadaselect[1])) { $idregimen_aduanero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idregimen_aduanero) === trim($cadaselect[1])) { $idregimen_aduanero_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idregimen_aduanero" value="<?php echo $this->form_encode_input($idregimen_aduanero) . "\">" . $idregimen_aduanero_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idregimen_aduanero();
   $x = 0 ; 
   $idregimen_aduanero_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idregimen_aduanero_1))
          {
              foreach ($this->idregimen_aduanero_1 as $tmp_idregimen_aduanero)
              {
                  if (trim($tmp_idregimen_aduanero) === trim($cadaselect[1])) { $idregimen_aduanero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idregimen_aduanero) === trim($cadaselect[1])) { $idregimen_aduanero_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idregimen_aduanero_look))
          {
              $idregimen_aduanero_look = $this->idregimen_aduanero;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idregimen_aduanero\" class=\"css_idregimen_aduanero_line\" style=\"" .  $sStyleReadLab_idregimen_aduanero . "\">" . $this->form_encode_input($idregimen_aduanero_look) . "</span><span id=\"id_read_off_idregimen_aduanero\" class=\"css_read_off_idregimen_aduanero\" style=\"white-space: nowrap; " . $sStyleReadInp_idregimen_aduanero . "\">";
   echo " <span id=\"idAjaxSelect_idregimen_aduanero\"><select class=\"sc-js-input scFormObjectOdd css_idregimen_aduanero_obj\" style=\"\" id=\"id_sc_field_idregimen_aduanero\" name=\"idregimen_aduanero\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idregimen_aduanero'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idregimen_aduanero) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idregimen_aduanero)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idregimen_aduanero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idregimen_aduanero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fecha_solicitud_dumb = ('' == $sStyleHidden_fecha_solicitud) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_solicitud_dumb" style="<?php echo $sStyleHidden_fecha_solicitud_dumb; ?>"></TD>
<?php $sStyleHidden_idestado_dumb = ('' == $sStyleHidden_idestado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idestado_dumb" style="<?php echo $sStyleHidden_idestado_dumb; ?>"></TD>
<?php $sStyleHidden_factura_revision_dumb = ('' == $sStyleHidden_factura_revision) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_factura_revision_dumb" style="<?php echo $sStyleHidden_factura_revision_dumb; ?>"></TD>
<?php $sStyleHidden_factura_acople_dumb = ('' == $sStyleHidden_factura_acople) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_factura_acople_dumb" style="<?php echo $sStyleHidden_factura_acople_dumb; ?>"></TD>
<?php $sStyleHidden_idtipo_movilizacion_dumb = ('' == $sStyleHidden_idtipo_movilizacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idtipo_movilizacion_dumb" style="<?php echo $sStyleHidden_idtipo_movilizacion_dumb; ?>"></TD>
<?php $sStyleHidden_idregimen_aduanero_dumb = ('' == $sStyleHidden_idregimen_aduanero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idregimen_aduanero_dumb" style="<?php echo $sStyleHidden_idregimen_aduanero_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="6" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>REVISIONES<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['maga']))
   {
       $this->nm_new_label['maga'] = "MAGA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $maga = $this->maga;
   $sStyleHidden_maga = '';
   if (isset($this->nmgp_cmp_hidden['maga']) && $this->nmgp_cmp_hidden['maga'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['maga']);
       $sStyleHidden_maga = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_maga = 'display: none;';
   $sStyleReadInp_maga = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['maga']) && $this->nmgp_cmp_readonly['maga'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['maga']);
       $sStyleReadLab_maga = '';
       $sStyleReadInp_maga = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['maga']) && $this->nmgp_cmp_hidden['maga'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="maga" value="<?php echo $this->form_encode_input($this->maga) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->maga_1 = explode(";", trim($this->maga));
  } 
  else
  {
      if (empty($this->maga))
      {
          $this->maga_1= array(); 
      } 
      else
      {
          $this->maga_1= $this->maga; 
          $this->maga= ""; 
          foreach ($this->maga_1 as $cada_maga)
          {
             if (!empty($maga))
             {
                 $this->maga.= ";"; 
             } 
             $this->maga.= $cada_maga; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_maga_line" id="hidden_field_data_maga" style="<?php echo $sStyleHidden_maga; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_maga_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_maga_label"><span id="id_label_maga"><?php echo $this->nm_new_label['maga']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["maga"]) &&  $this->nmgp_cmp_readonly["maga"] == "on") { 

$maga_look = "";
 if (in_array("1", $this->maga_1))  { $maga_look .= "<br />";} 
?>
<input type="hidden" name="maga" value="<?php echo $this->form_encode_input($maga) . "\">" . $maga_look . ""; ?>
<?php } else { ?>

<?php

$maga_look = "";
 if (in_array("1", $this->maga_1))  { $maga_look .= "<br />";} 
?>
<span id="id_read_on_maga" class="css_maga_line" style="<?php echo $sStyleReadLab_maga; ?>"><?php echo $this->form_encode_input($maga_look); ?></span><span id="id_read_off_maga" class="css_read_off_maga css_maga_line" style="<?php echo $sStyleReadInp_maga; ?>"><?php echo "<div id=\"idAjaxCheckbox_maga\" style=\"display: inline-block\" class=\"css_maga_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_maga_line"><?php $tempOptionId = "id-opt-maga" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-maga sc-ui-checkbox-maga" name="maga[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_maga'][] = '1'; ?>
<?php  if (in_array("1", $this->maga_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_maga_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_maga_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['sgaia']))
   {
       $this->nm_new_label['sgaia'] = "SGAIA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sgaia = $this->sgaia;
   $sStyleHidden_sgaia = '';
   if (isset($this->nmgp_cmp_hidden['sgaia']) && $this->nmgp_cmp_hidden['sgaia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sgaia']);
       $sStyleHidden_sgaia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sgaia = 'display: none;';
   $sStyleReadInp_sgaia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sgaia']) && $this->nmgp_cmp_readonly['sgaia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sgaia']);
       $sStyleReadLab_sgaia = '';
       $sStyleReadInp_sgaia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sgaia']) && $this->nmgp_cmp_hidden['sgaia'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sgaia" value="<?php echo $this->form_encode_input($this->sgaia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->sgaia_1 = explode(";", trim($this->sgaia));
  } 
  else
  {
      if (empty($this->sgaia))
      {
          $this->sgaia_1= array(); 
      } 
      else
      {
          $this->sgaia_1= $this->sgaia; 
          $this->sgaia= ""; 
          foreach ($this->sgaia_1 as $cada_sgaia)
          {
             if (!empty($sgaia))
             {
                 $this->sgaia.= ";"; 
             } 
             $this->sgaia.= $cada_sgaia; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_sgaia_line" id="hidden_field_data_sgaia" style="<?php echo $sStyleHidden_sgaia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sgaia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sgaia_label"><span id="id_label_sgaia"><?php echo $this->nm_new_label['sgaia']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sgaia"]) &&  $this->nmgp_cmp_readonly["sgaia"] == "on") { 

$sgaia_look = "";
 if (in_array("1", $this->sgaia_1))  { $sgaia_look .= "<br />";} 
?>
<input type="hidden" name="sgaia" value="<?php echo $this->form_encode_input($sgaia) . "\">" . $sgaia_look . ""; ?>
<?php } else { ?>

<?php

$sgaia_look = "";
 if (in_array("1", $this->sgaia_1))  { $sgaia_look .= "<br />";} 
?>
<span id="id_read_on_sgaia" class="css_sgaia_line" style="<?php echo $sStyleReadLab_sgaia; ?>"><?php echo $this->form_encode_input($sgaia_look); ?></span><span id="id_read_off_sgaia" class="css_read_off_sgaia css_sgaia_line" style="<?php echo $sStyleReadInp_sgaia; ?>"><?php echo "<div id=\"idAjaxCheckbox_sgaia\" style=\"display: inline-block\" class=\"css_sgaia_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_sgaia_line"><?php $tempOptionId = "id-opt-sgaia" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-sgaia sc-ui-checkbox-sgaia" name="sgaia[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_sgaia'][] = '1'; ?>
<?php  if (in_array("1", $this->sgaia_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sgaia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sgaia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['sat']))
   {
       $this->nm_new_label['sat'] = "SAT";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sat = $this->sat;
   $sStyleHidden_sat = '';
   if (isset($this->nmgp_cmp_hidden['sat']) && $this->nmgp_cmp_hidden['sat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sat']);
       $sStyleHidden_sat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sat = 'display: none;';
   $sStyleReadInp_sat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sat']) && $this->nmgp_cmp_readonly['sat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sat']);
       $sStyleReadLab_sat = '';
       $sStyleReadInp_sat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sat']) && $this->nmgp_cmp_hidden['sat'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sat" value="<?php echo $this->form_encode_input($this->sat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->sat_1 = explode(";", trim($this->sat));
  } 
  else
  {
      if (empty($this->sat))
      {
          $this->sat_1= array(); 
      } 
      else
      {
          $this->sat_1= $this->sat; 
          $this->sat= ""; 
          foreach ($this->sat_1 as $cada_sat)
          {
             if (!empty($sat))
             {
                 $this->sat.= ";"; 
             } 
             $this->sat.= $cada_sat; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_sat_line" id="hidden_field_data_sat" style="<?php echo $sStyleHidden_sat; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sat_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sat_label"><span id="id_label_sat"><?php echo $this->nm_new_label['sat']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sat"]) &&  $this->nmgp_cmp_readonly["sat"] == "on") { 

$sat_look = "";
 if (in_array("1", $this->sat_1))  { $sat_look .= "<br />";} 
?>
<input type="hidden" name="sat" value="<?php echo $this->form_encode_input($sat) . "\">" . $sat_look . ""; ?>
<?php } else { ?>

<?php

$sat_look = "";
 if (in_array("1", $this->sat_1))  { $sat_look .= "<br />";} 
?>
<span id="id_read_on_sat" class="css_sat_line" style="<?php echo $sStyleReadLab_sat; ?>"><?php echo $this->form_encode_input($sat_look); ?></span><span id="id_read_off_sat" class="css_read_off_sat css_sat_line" style="<?php echo $sStyleReadInp_sat; ?>"><?php echo "<div id=\"idAjaxCheckbox_sat\" style=\"display: inline-block\" class=\"css_sat_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_sat_line"><?php $tempOptionId = "id-opt-sat" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-sat sc-ui-checkbox-sat" name="sat[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_sat'][] = '1'; ?>
<?php  if (in_array("1", $this->sat_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sat_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['dipafront']))
   {
       $this->nm_new_label['dipafront'] = "DIPA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dipafront = $this->dipafront;
   $sStyleHidden_dipafront = '';
   if (isset($this->nmgp_cmp_hidden['dipafront']) && $this->nmgp_cmp_hidden['dipafront'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dipafront']);
       $sStyleHidden_dipafront = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dipafront = 'display: none;';
   $sStyleReadInp_dipafront = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dipafront']) && $this->nmgp_cmp_readonly['dipafront'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dipafront']);
       $sStyleReadLab_dipafront = '';
       $sStyleReadInp_dipafront = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dipafront']) && $this->nmgp_cmp_hidden['dipafront'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="dipafront" value="<?php echo $this->form_encode_input($this->dipafront) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->dipafront_1 = explode(";", trim($this->dipafront));
  } 
  else
  {
      if (empty($this->dipafront))
      {
          $this->dipafront_1= array(); 
      } 
      else
      {
          $this->dipafront_1= $this->dipafront; 
          $this->dipafront= ""; 
          foreach ($this->dipafront_1 as $cada_dipafront)
          {
             if (!empty($dipafront))
             {
                 $this->dipafront.= ";"; 
             } 
             $this->dipafront.= $cada_dipafront; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_dipafront_line" id="hidden_field_data_dipafront" style="<?php echo $sStyleHidden_dipafront; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dipafront_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dipafront_label"><span id="id_label_dipafront"><?php echo $this->nm_new_label['dipafront']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dipafront"]) &&  $this->nmgp_cmp_readonly["dipafront"] == "on") { 

$dipafront_look = "";
 if (in_array("1", $this->dipafront_1))  { $dipafront_look .= "<br />";} 
?>
<input type="hidden" name="dipafront" value="<?php echo $this->form_encode_input($dipafront) . "\">" . $dipafront_look . ""; ?>
<?php } else { ?>

<?php

$dipafront_look = "";
 if (in_array("1", $this->dipafront_1))  { $dipafront_look .= "<br />";} 
?>
<span id="id_read_on_dipafront" class="css_dipafront_line" style="<?php echo $sStyleReadLab_dipafront; ?>"><?php echo $this->form_encode_input($dipafront_look); ?></span><span id="id_read_off_dipafront" class="css_read_off_dipafront css_dipafront_line" style="<?php echo $sStyleReadInp_dipafront; ?>"><?php echo "<div id=\"idAjaxCheckbox_dipafront\" style=\"display: inline-block\" class=\"css_dipafront_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_dipafront_line"><?php $tempOptionId = "id-opt-dipafront" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-dipafront sc-ui-checkbox-dipafront" name="dipafront[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_dipafront'][] = '1'; ?>
<?php  if (in_array("1", $this->dipafront_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dipafront_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dipafront_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['ucc']))
   {
       $this->nm_new_label['ucc'] = "UCC";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ucc = $this->ucc;
   $sStyleHidden_ucc = '';
   if (isset($this->nmgp_cmp_hidden['ucc']) && $this->nmgp_cmp_hidden['ucc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ucc']);
       $sStyleHidden_ucc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ucc = 'display: none;';
   $sStyleReadInp_ucc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ucc']) && $this->nmgp_cmp_readonly['ucc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ucc']);
       $sStyleReadLab_ucc = '';
       $sStyleReadInp_ucc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ucc']) && $this->nmgp_cmp_hidden['ucc'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ucc" value="<?php echo $this->form_encode_input($this->ucc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ucc_1 = explode(";", trim($this->ucc));
  } 
  else
  {
      if (empty($this->ucc))
      {
          $this->ucc_1= array(); 
      } 
      else
      {
          $this->ucc_1= $this->ucc; 
          $this->ucc= ""; 
          foreach ($this->ucc_1 as $cada_ucc)
          {
             if (!empty($ucc))
             {
                 $this->ucc.= ";"; 
             } 
             $this->ucc.= $cada_ucc; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ucc_line" id="hidden_field_data_ucc" style="<?php echo $sStyleHidden_ucc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ucc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ucc_label"><span id="id_label_ucc"><?php echo $this->nm_new_label['ucc']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ucc"]) &&  $this->nmgp_cmp_readonly["ucc"] == "on") { 

$ucc_look = "";
 if (in_array("1", $this->ucc_1))  { $ucc_look .= "<br />";} 
?>
<input type="hidden" name="ucc" value="<?php echo $this->form_encode_input($ucc) . "\">" . $ucc_look . ""; ?>
<?php } else { ?>

<?php

$ucc_look = "";
 if (in_array("1", $this->ucc_1))  { $ucc_look .= "<br />";} 
?>
<span id="id_read_on_ucc" class="css_ucc_line" style="<?php echo $sStyleReadLab_ucc; ?>"><?php echo $this->form_encode_input($ucc_look); ?></span><span id="id_read_off_ucc" class="css_read_off_ucc css_ucc_line" style="<?php echo $sStyleReadInp_ucc; ?>"><?php echo "<div id=\"idAjaxCheckbox_ucc\" style=\"display: inline-block\" class=\"css_ucc_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ucc_line"><?php $tempOptionId = "id-opt-ucc" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ucc sc-ui-checkbox-ucc" name="ucc[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_ucc'][] = '1'; ?>
<?php  if (in_array("1", $this->ucc_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ucc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ucc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_observaciones_label"><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->observaciones; ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <input class="sc-js-input scFormObjectOdd css_observaciones_obj" style="" id="id_sc_field_observaciones" type=text name="observaciones" value="<?php echo $this->form_encode_input($observaciones) ?>"
 size=60 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_maga_dumb = ('' == $sStyleHidden_maga) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_maga_dumb" style="<?php echo $sStyleHidden_maga_dumb; ?>"></TD>
<?php $sStyleHidden_sgaia_dumb = ('' == $sStyleHidden_sgaia) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_sgaia_dumb" style="<?php echo $sStyleHidden_sgaia_dumb; ?>"></TD>
<?php $sStyleHidden_sat_dumb = ('' == $sStyleHidden_sat) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_sat_dumb" style="<?php echo $sStyleHidden_sat_dumb; ?>"></TD>
<?php $sStyleHidden_dipafront_dumb = ('' == $sStyleHidden_dipafront) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dipafront_dumb" style="<?php echo $sStyleHidden_dipafront_dumb; ?>"></TD>
<?php $sStyleHidden_ucc_dumb = ('' == $sStyleHidden_ucc) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ucc_dumb" style="<?php echo $sStyleHidden_ucc_dumb; ?>"></TD>
<?php $sStyleHidden_observaciones_dumb = ('' == $sStyleHidden_observaciones) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_observaciones_dumb" style="<?php echo $sStyleHidden_observaciones_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DETALLE DE SOLICITUD<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
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

    <TD class="scFormDataOdd css_idcabezal_line" id="hidden_field_data_idcabezal" style="<?php echo $sStyleHidden_idcabezal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcabezal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idcabezal_label"><span id="id_label_idcabezal"><?php echo $this->nm_new_label['idcabezal']; ?></span></span><br>
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = " . substr($this->Db->qstr($this->idcabezal), 1, -1) . " ORDER BY idcabezal";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'][] = $rs->fields[0];
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
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idcabezal'] = $this->idcabezal;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = " . substr($this->Db->qstr($this->idcabezal), 1, -1) . " ORDER BY idcabezal";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcabezal'][] = $rs->fields[0];
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
<input type="text" id="id_ac_idcabezal" name="idcabezal_autocomp" class="scFormObjectOdd sc-ui-autocomp-idcabezal css_idcabezal_obj" size="12" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcabezal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcabezal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['contenedor']))
    {
        $this->nm_new_label['contenedor'] = "CONTENEDOR";
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

    <TD class="scFormDataOdd css_contenedor_line" id="hidden_field_data_contenedor" style="<?php echo $sStyleHidden_contenedor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contenedor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contenedor_label"><span id="id_label_contenedor"><?php echo $this->nm_new_label['contenedor']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['contenedor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['contenedor'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contenedor"]) &&  $this->nmgp_cmp_readonly["contenedor"] == "on") { 

 ?>
<input type="hidden" name="contenedor" value="<?php echo $this->form_encode_input($contenedor) . "\">" . $contenedor . ""; ?>
<?php } else { ?>
<span id="id_read_on_contenedor" class="sc-ui-readonly-contenedor css_contenedor_line" style="<?php echo $sStyleReadLab_contenedor; ?>"><?php echo $this->contenedor; ?></span><span id="id_read_off_contenedor" class="css_read_off_contenedor" style="white-space: nowrap;<?php echo $sStyleReadInp_contenedor; ?>">
 <input class="sc-js-input scFormObjectOdd css_contenedor_obj" style="" id="id_sc_field_contenedor" type=text name="contenedor" value="<?php echo $this->form_encode_input($contenedor) ?>"
 size=12 maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contenedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contenedor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['idmedida']))
   {
       $this->nm_new_label['idmedida'] = "MEDIDA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idmedida = $this->idmedida;
   $sStyleHidden_idmedida = '';
   if (isset($this->nmgp_cmp_hidden['idmedida']) && $this->nmgp_cmp_hidden['idmedida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idmedida']);
       $sStyleHidden_idmedida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idmedida = 'display: none;';
   $sStyleReadInp_idmedida = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idmedida']) && $this->nmgp_cmp_readonly['idmedida'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idmedida']);
       $sStyleReadLab_idmedida = '';
       $sStyleReadInp_idmedida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idmedida']) && $this->nmgp_cmp_hidden['idmedida'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idmedida" value="<?php echo $this->form_encode_input($this->idmedida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idmedida_line" id="hidden_field_data_idmedida" style="<?php echo $sStyleHidden_idmedida; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idmedida_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idmedida_label"><span id="id_label_idmedida"><?php echo $this->nm_new_label['idmedida']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idmedida']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idmedida'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idmedida"]) &&  $this->nmgp_cmp_readonly["idmedida"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idmedida, descripcion  FROM medida  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'][] = $rs->fields[0];
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
   $idmedida_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmedida_1))
          {
              foreach ($this->idmedida_1 as $tmp_idmedida)
              {
                  if (trim($tmp_idmedida) === trim($cadaselect[1])) { $idmedida_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmedida) === trim($cadaselect[1])) { $idmedida_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idmedida" value="<?php echo $this->form_encode_input($idmedida) . "\">" . $idmedida_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idmedida();
   $x = 0 ; 
   $idmedida_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmedida_1))
          {
              foreach ($this->idmedida_1 as $tmp_idmedida)
              {
                  if (trim($tmp_idmedida) === trim($cadaselect[1])) { $idmedida_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmedida) === trim($cadaselect[1])) { $idmedida_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idmedida_look))
          {
              $idmedida_look = $this->idmedida;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idmedida\" class=\"css_idmedida_line\" style=\"" .  $sStyleReadLab_idmedida . "\">" . $this->form_encode_input($idmedida_look) . "</span><span id=\"id_read_off_idmedida\" class=\"css_read_off_idmedida\" style=\"white-space: nowrap; " . $sStyleReadInp_idmedida . "\">";
   echo " <span id=\"idAjaxSelect_idmedida\"><select class=\"sc-js-input scFormObjectOdd css_idmedida_obj\" style=\"\" id=\"id_sc_field_idmedida\" name=\"idmedida\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idmedida'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idmedida) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idmedida)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idmedida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idmedida_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_idnaviera_line" id="hidden_field_data_idnaviera" style="<?php echo $sStyleHidden_idnaviera; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idnaviera_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idnaviera_label"><span id="id_label_idnaviera"><?php echo $this->nm_new_label['idnaviera']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idnaviera']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idnaviera'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idnaviera"]) &&  $this->nmgp_cmp_readonly["idnaviera"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idNaviera, naviera FROM naviera ORDER BY idNaviera";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idnaviera'][] = ''; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idnaviera_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idnaviera_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_idcabezal_dumb = ('' == $sStyleHidden_idcabezal) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idcabezal_dumb" style="<?php echo $sStyleHidden_idcabezal_dumb; ?>"></TD>
<?php $sStyleHidden_contenedor_dumb = ('' == $sStyleHidden_contenedor) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_contenedor_dumb" style="<?php echo $sStyleHidden_contenedor_dumb; ?>"></TD>
<?php $sStyleHidden_idmedida_dumb = ('' == $sStyleHidden_idmedida) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idmedida_dumb" style="<?php echo $sStyleHidden_idmedida_dumb; ?>"></TD>
<?php $sStyleHidden_idnaviera_dumb = ('' == $sStyleHidden_idnaviera) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idnaviera_dumb" style="<?php echo $sStyleHidden_idnaviera_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idselectivo']))
   {
       $this->nm_new_label['idselectivo'] = "SELECTIVO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idselectivo = $this->idselectivo;
   $sStyleHidden_idselectivo = '';
   if (isset($this->nmgp_cmp_hidden['idselectivo']) && $this->nmgp_cmp_hidden['idselectivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idselectivo']);
       $sStyleHidden_idselectivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idselectivo = 'display: none;';
   $sStyleReadInp_idselectivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idselectivo']) && $this->nmgp_cmp_readonly['idselectivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idselectivo']);
       $sStyleReadLab_idselectivo = '';
       $sStyleReadInp_idselectivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idselectivo']) && $this->nmgp_cmp_hidden['idselectivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idselectivo" value="<?php echo $this->form_encode_input($this->idselectivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idselectivo_line" id="hidden_field_data_idselectivo" style="<?php echo $sStyleHidden_idselectivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idselectivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idselectivo_label"><span id="id_label_idselectivo"><?php echo $this->nm_new_label['idselectivo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idselectivo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idselectivo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idselectivo"]) &&  $this->nmgp_cmp_readonly["idselectivo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idselectivo, selectivo  FROM selectivo  ORDER BY selectivo";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'][] = $rs->fields[0];
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
   $idselectivo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idselectivo_1))
          {
              foreach ($this->idselectivo_1 as $tmp_idselectivo)
              {
                  if (trim($tmp_idselectivo) === trim($cadaselect[1])) { $idselectivo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idselectivo) === trim($cadaselect[1])) { $idselectivo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idselectivo" value="<?php echo $this->form_encode_input($idselectivo) . "\">" . $idselectivo_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idselectivo();
   $x = 0 ; 
   $idselectivo_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idselectivo_1))
          {
              foreach ($this->idselectivo_1 as $tmp_idselectivo)
              {
                  if (trim($tmp_idselectivo) === trim($cadaselect[1])) { $idselectivo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idselectivo) === trim($cadaselect[1])) { $idselectivo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idselectivo_look))
          {
              $idselectivo_look = $this->idselectivo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idselectivo\" class=\"css_idselectivo_line\" style=\"" .  $sStyleReadLab_idselectivo . "\">" . $this->form_encode_input($idselectivo_look) . "</span><span id=\"id_read_off_idselectivo\" class=\"css_read_off_idselectivo\" style=\"white-space: nowrap; " . $sStyleReadInp_idselectivo . "\">";
   echo " <span id=\"idAjaxSelect_idselectivo\"><select class=\"sc-js-input scFormObjectOdd css_idselectivo_obj\" style=\"\" id=\"id_sc_field_idselectivo\" name=\"idselectivo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idselectivo'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idselectivo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idselectivo)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idselectivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idselectivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['idtipodecarga']))
   {
       $this->nm_new_label['idtipodecarga'] = "TIPO DE CARGA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idtipodecarga = $this->idtipodecarga;
   $sStyleHidden_idtipodecarga = '';
   if (isset($this->nmgp_cmp_hidden['idtipodecarga']) && $this->nmgp_cmp_hidden['idtipodecarga'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idtipodecarga']);
       $sStyleHidden_idtipodecarga = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idtipodecarga = 'display: none;';
   $sStyleReadInp_idtipodecarga = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idtipodecarga']) && $this->nmgp_cmp_readonly['idtipodecarga'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idtipodecarga']);
       $sStyleReadLab_idtipodecarga = '';
       $sStyleReadInp_idtipodecarga = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idtipodecarga']) && $this->nmgp_cmp_hidden['idtipodecarga'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idtipodecarga" value="<?php echo $this->form_encode_input($this->idtipodecarga) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idtipodecarga_line" id="hidden_field_data_idtipodecarga" style="<?php echo $sStyleHidden_idtipodecarga; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idtipodecarga_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idtipodecarga_label"><span id="id_label_idtipodecarga"><?php echo $this->nm_new_label['idtipodecarga']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idtipodecarga']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idtipodecarga'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idtipodecarga"]) &&  $this->nmgp_cmp_readonly["idtipodecarga"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idtipodecarga, descripcion  FROM tipodecarga  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'][] = $rs->fields[0];
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
   $idtipodecarga_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipodecarga_1))
          {
              foreach ($this->idtipodecarga_1 as $tmp_idtipodecarga)
              {
                  if (trim($tmp_idtipodecarga) === trim($cadaselect[1])) { $idtipodecarga_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipodecarga) === trim($cadaselect[1])) { $idtipodecarga_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idtipodecarga" value="<?php echo $this->form_encode_input($idtipodecarga) . "\">" . $idtipodecarga_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idtipodecarga();
   $x = 0 ; 
   $idtipodecarga_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipodecarga_1))
          {
              foreach ($this->idtipodecarga_1 as $tmp_idtipodecarga)
              {
                  if (trim($tmp_idtipodecarga) === trim($cadaselect[1])) { $idtipodecarga_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipodecarga) === trim($cadaselect[1])) { $idtipodecarga_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idtipodecarga_look))
          {
              $idtipodecarga_look = $this->idtipodecarga;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idtipodecarga\" class=\"css_idtipodecarga_line\" style=\"" .  $sStyleReadLab_idtipodecarga . "\">" . $this->form_encode_input($idtipodecarga_look) . "</span><span id=\"id_read_off_idtipodecarga\" class=\"css_read_off_idtipodecarga\" style=\"white-space: nowrap; " . $sStyleReadInp_idtipodecarga . "\">";
   echo " <span id=\"idAjaxSelect_idtipodecarga\"><select class=\"sc-js-input scFormObjectOdd css_idtipodecarga_obj\" style=\"\" id=\"id_sc_field_idtipodecarga\" name=\"idtipodecarga\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idtipodecarga'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idtipodecarga) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idtipodecarga)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idtipodecarga_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idtipodecarga_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['idconsignatario']))
    {
        $this->nm_new_label['idconsignatario'] = "CONSIGNATARIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idconsignatario = $this->idconsignatario;
   $sStyleHidden_idconsignatario = '';
   if (isset($this->nmgp_cmp_hidden['idconsignatario']) && $this->nmgp_cmp_hidden['idconsignatario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idconsignatario']);
       $sStyleHidden_idconsignatario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idconsignatario = 'display: none;';
   $sStyleReadInp_idconsignatario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idconsignatario']) && $this->nmgp_cmp_readonly['idconsignatario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idconsignatario']);
       $sStyleReadLab_idconsignatario = '';
       $sStyleReadInp_idconsignatario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idconsignatario']) && $this->nmgp_cmp_hidden['idconsignatario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idconsignatario" value="<?php echo $this->form_encode_input($idconsignatario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idconsignatario_line" id="hidden_field_data_idconsignatario" style="<?php echo $sStyleHidden_idconsignatario; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idconsignatario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idconsignatario_label"><span id="id_label_idconsignatario"><?php echo $this->nm_new_label['idconsignatario']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idconsignatario']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idconsignatario'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idconsignatario"]) &&  $this->nmgp_cmp_readonly["idconsignatario"] == "on") { 

 ?>
<input type="hidden" name="idconsignatario" value="<?php echo $this->form_encode_input($idconsignatario) . "\">" . $idconsignatario . ""; ?>
<?php } else { ?>

<?php
$aRecData['idconsignatario'] = $this->idconsignatario;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idconsignatario, nombre FROM consignatario WHERE idconsignatario = " . substr($this->Db->qstr($this->idconsignatario), 1, -1) . " ORDER BY nombre";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idconsignatario)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idconsignatario])) ? $aLookup[0][$this->idconsignatario] : $this->idconsignatario;
$idconsignatario_look = (isset($aLookup[0][$this->idconsignatario])) ? $aLookup[0][$this->idconsignatario] : $this->idconsignatario;
?>
<span id="id_read_on_idconsignatario" class="sc-ui-readonly-idconsignatario css_idconsignatario_line" style="<?php echo $sStyleReadLab_idconsignatario; ?>"><?php echo str_replace("<", "&lt;", $idconsignatario_look); ?></span><span id="id_read_off_idconsignatario" class="css_read_off_idconsignatario" style="white-space: nowrap;<?php echo $sStyleReadInp_idconsignatario; ?>">
 <input class="sc-js-input scFormObjectOdd css_idconsignatario_obj" style="display: none;" id="id_sc_field_idconsignatario" type=text name="idconsignatario" value="<?php echo $this->form_encode_input($idconsignatario) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idconsignatario'] = $this->idconsignatario;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idconsignatario, nombre FROM consignatario WHERE idconsignatario = " . substr($this->Db->qstr($this->idconsignatario), 1, -1) . " ORDER BY nombre";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idconsignatario)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idconsignatario'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idconsignatario])) ? $aLookup[0][$this->idconsignatario] : '';
$idconsignatario_look = (isset($aLookup[0][$this->idconsignatario])) ? $aLookup[0][$this->idconsignatario] : '';
?>
<input type="text" id="id_ac_idconsignatario" name="idconsignatario_autocomp" class="scFormObjectOdd sc-ui-autocomp-idconsignatario css_idconsignatario_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idconsignatario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idconsignatario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['idcontenido']))
    {
        $this->nm_new_label['idcontenido'] = "MERCADERIA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcontenido = $this->idcontenido;
   $sStyleHidden_idcontenido = '';
   if (isset($this->nmgp_cmp_hidden['idcontenido']) && $this->nmgp_cmp_hidden['idcontenido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcontenido']);
       $sStyleHidden_idcontenido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcontenido = 'display: none;';
   $sStyleReadInp_idcontenido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idcontenido']) && $this->nmgp_cmp_readonly['idcontenido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcontenido']);
       $sStyleReadLab_idcontenido = '';
       $sStyleReadInp_idcontenido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcontenido']) && $this->nmgp_cmp_hidden['idcontenido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcontenido" value="<?php echo $this->form_encode_input($idcontenido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idcontenido_line" id="hidden_field_data_idcontenido" style="<?php echo $sStyleHidden_idcontenido; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcontenido_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idcontenido_label"><span id="id_label_idcontenido"><?php echo $this->nm_new_label['idcontenido']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idcontenido']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idcontenido'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcontenido"]) &&  $this->nmgp_cmp_readonly["idcontenido"] == "on") { 

 ?>
<input type="hidden" name="idcontenido" value="<?php echo $this->form_encode_input($idcontenido) . "\">" . $idcontenido . ""; ?>
<?php } else { ?>

<?php
$aRecData['idcontenido'] = $this->idcontenido;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idcontenido, descripcion FROM contenido WHERE idcontenido = " . substr($this->Db->qstr($this->idcontenido), 1, -1) . " ORDER BY idcontenido";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idcontenido)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idcontenido])) ? $aLookup[0][$this->idcontenido] : $this->idcontenido;
$idcontenido_look = (isset($aLookup[0][$this->idcontenido])) ? $aLookup[0][$this->idcontenido] : $this->idcontenido;
?>
<span id="id_read_on_idcontenido" class="sc-ui-readonly-idcontenido css_idcontenido_line" style="<?php echo $sStyleReadLab_idcontenido; ?>"><?php echo str_replace("<", "&lt;", $idcontenido_look); ?></span><span id="id_read_off_idcontenido" class="css_read_off_idcontenido" style="white-space: nowrap;<?php echo $sStyleReadInp_idcontenido; ?>">
 <input class="sc-js-input scFormObjectOdd css_idcontenido_obj" style="display: none;" id="id_sc_field_idcontenido" type=text name="idcontenido" value="<?php echo $this->form_encode_input($idcontenido) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idcontenido'] = $this->idcontenido;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idcontenido, descripcion FROM contenido WHERE idcontenido = " . substr($this->Db->qstr($this->idcontenido), 1, -1) . " ORDER BY idcontenido";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idcontenido)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idcontenido'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idcontenido])) ? $aLookup[0][$this->idcontenido] : '';
$idcontenido_look = (isset($aLookup[0][$this->idcontenido])) ? $aLookup[0][$this->idcontenido] : '';
?>
<input type="text" id="id_ac_idcontenido" name="idcontenido_autocomp" class="scFormObjectOdd sc-ui-autocomp-idcontenido css_idcontenido_obj" size="12" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcontenido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcontenido_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_idselectivo_dumb = ('' == $sStyleHidden_idselectivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idselectivo_dumb" style="<?php echo $sStyleHidden_idselectivo_dumb; ?>"></TD>
<?php $sStyleHidden_idtipodecarga_dumb = ('' == $sStyleHidden_idtipodecarga) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idtipodecarga_dumb" style="<?php echo $sStyleHidden_idtipodecarga_dumb; ?>"></TD>
<?php $sStyleHidden_idconsignatario_dumb = ('' == $sStyleHidden_idconsignatario) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idconsignatario_dumb" style="<?php echo $sStyleHidden_idconsignatario_dumb; ?>"></TD>
<?php $sStyleHidden_idcontenido_dumb = ('' == $sStyleHidden_idcontenido) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idcontenido_dumb" style="<?php echo $sStyleHidden_idcontenido_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bl']))
    {
        $this->nm_new_label['bl'] = "BL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bl = $this->bl;
   $sStyleHidden_bl = '';
   if (isset($this->nmgp_cmp_hidden['bl']) && $this->nmgp_cmp_hidden['bl'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bl']);
       $sStyleHidden_bl = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bl = 'display: none;';
   $sStyleReadInp_bl = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bl']) && $this->nmgp_cmp_readonly['bl'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bl']);
       $sStyleReadLab_bl = '';
       $sStyleReadInp_bl = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bl']) && $this->nmgp_cmp_hidden['bl'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bl" value="<?php echo $this->form_encode_input($bl) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bl_line" id="hidden_field_data_bl" style="<?php echo $sStyleHidden_bl; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bl_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bl_label"><span id="id_label_bl"><?php echo $this->nm_new_label['bl']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['bl']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['bl'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bl"]) &&  $this->nmgp_cmp_readonly["bl"] == "on") { 

 ?>
<input type="hidden" name="bl" value="<?php echo $this->form_encode_input($bl) . "\">" . $bl . ""; ?>
<?php } else { ?>
<span id="id_read_on_bl" class="sc-ui-readonly-bl css_bl_line" style="<?php echo $sStyleReadLab_bl; ?>"><?php echo $this->bl; ?></span><span id="id_read_off_bl" class="css_read_off_bl" style="white-space: nowrap;<?php echo $sStyleReadInp_bl; ?>">
 <input class="sc-js-input scFormObjectOdd css_bl_obj" style="" id="id_sc_field_bl" type=text name="bl" value="<?php echo $this->form_encode_input($bl) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bl_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bl_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cantidad_por_bl']))
    {
        $this->nm_new_label['cantidad_por_bl'] = "CANTIDAD POR BL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidad_por_bl = $this->cantidad_por_bl;
   $sStyleHidden_cantidad_por_bl = '';
   if (isset($this->nmgp_cmp_hidden['cantidad_por_bl']) && $this->nmgp_cmp_hidden['cantidad_por_bl'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidad_por_bl']);
       $sStyleHidden_cantidad_por_bl = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidad_por_bl = 'display: none;';
   $sStyleReadInp_cantidad_por_bl = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantidad_por_bl']) && $this->nmgp_cmp_readonly['cantidad_por_bl'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidad_por_bl']);
       $sStyleReadLab_cantidad_por_bl = '';
       $sStyleReadInp_cantidad_por_bl = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidad_por_bl']) && $this->nmgp_cmp_hidden['cantidad_por_bl'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidad_por_bl" value="<?php echo $this->form_encode_input($cantidad_por_bl) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cantidad_por_bl_line" id="hidden_field_data_cantidad_por_bl" style="<?php echo $sStyleHidden_cantidad_por_bl; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidad_por_bl_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cantidad_por_bl_label"><span id="id_label_cantidad_por_bl"><?php echo $this->nm_new_label['cantidad_por_bl']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['cantidad_por_bl']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['cantidad_por_bl'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidad_por_bl"]) &&  $this->nmgp_cmp_readonly["cantidad_por_bl"] == "on") { 

 ?>
<input type="hidden" name="cantidad_por_bl" value="<?php echo $this->form_encode_input($cantidad_por_bl) . "\">" . $cantidad_por_bl . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidad_por_bl" class="sc-ui-readonly-cantidad_por_bl css_cantidad_por_bl_line" style="<?php echo $sStyleReadLab_cantidad_por_bl; ?>"><?php echo $this->cantidad_por_bl; ?></span><span id="id_read_off_cantidad_por_bl" class="css_read_off_cantidad_por_bl" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidad_por_bl; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidad_por_bl_obj" style="" id="id_sc_field_cantidad_por_bl" type=text name="cantidad_por_bl" value="<?php echo $this->form_encode_input($cantidad_por_bl) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_por_bl']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad_por_bl']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidad_por_bl']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidad_por_bl_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidad_por_bl_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['idviaje_importacion']))
    {
        $this->nm_new_label['idviaje_importacion'] = "VIAJE IMPORT";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idviaje_importacion = $this->idviaje_importacion;
   $sStyleHidden_idviaje_importacion = '';
   if (isset($this->nmgp_cmp_hidden['idviaje_importacion']) && $this->nmgp_cmp_hidden['idviaje_importacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idviaje_importacion']);
       $sStyleHidden_idviaje_importacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idviaje_importacion = 'display: none;';
   $sStyleReadInp_idviaje_importacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idviaje_importacion']) && $this->nmgp_cmp_readonly['idviaje_importacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idviaje_importacion']);
       $sStyleReadLab_idviaje_importacion = '';
       $sStyleReadInp_idviaje_importacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idviaje_importacion']) && $this->nmgp_cmp_hidden['idviaje_importacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idviaje_importacion" value="<?php echo $this->form_encode_input($idviaje_importacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idviaje_importacion_line" id="hidden_field_data_idviaje_importacion" style="<?php echo $sStyleHidden_idviaje_importacion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idviaje_importacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idviaje_importacion_label"><span id="id_label_idviaje_importacion"><?php echo $this->nm_new_label['idviaje_importacion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idviaje_importacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idviaje_importacion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idviaje_importacion"]) &&  $this->nmgp_cmp_readonly["idviaje_importacion"] == "on") { 

 ?>
<input type="hidden" name="idviaje_importacion" value="<?php echo $this->form_encode_input($idviaje_importacion) . "\">" . $idviaje_importacion . ""; ?>
<?php } else { ?>

<?php
$aRecData['idviaje_importacion'] = $this->idviaje_importacion;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idviaje_importacion, codigo FROM viaje_importacion WHERE idviaje_importacion = " . substr($this->Db->qstr($this->idviaje_importacion), 1, -1) . " ORDER BY codigo";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idviaje_importacion)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idviaje_importacion])) ? $aLookup[0][$this->idviaje_importacion] : $this->idviaje_importacion;
$idviaje_importacion_look = (isset($aLookup[0][$this->idviaje_importacion])) ? $aLookup[0][$this->idviaje_importacion] : $this->idviaje_importacion;
?>
<span id="id_read_on_idviaje_importacion" class="sc-ui-readonly-idviaje_importacion css_idviaje_importacion_line" style="<?php echo $sStyleReadLab_idviaje_importacion; ?>"><?php echo str_replace("<", "&lt;", $idviaje_importacion_look); ?></span><span id="id_read_off_idviaje_importacion" class="css_read_off_idviaje_importacion" style="white-space: nowrap;<?php echo $sStyleReadInp_idviaje_importacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_idviaje_importacion_obj" style="display: none;" id="id_sc_field_idviaje_importacion" type=text name="idviaje_importacion" value="<?php echo $this->form_encode_input($idviaje_importacion) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 ") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idviaje_importacion'] = $this->idviaje_importacion;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idviaje_importacion, codigo FROM viaje_importacion WHERE idviaje_importacion = " . substr($this->Db->qstr($this->idviaje_importacion), 1, -1) . " ORDER BY codigo";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idviaje_importacion)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idviaje_importacion'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idviaje_importacion])) ? $aLookup[0][$this->idviaje_importacion] : '';
$idviaje_importacion_look = (isset($aLookup[0][$this->idviaje_importacion])) ? $aLookup[0][$this->idviaje_importacion] : '';
?>
<input type="text" id="id_ac_idviaje_importacion" name="idviaje_importacion_autocomp" class="scFormObjectOdd sc-ui-autocomp-idviaje_importacion css_idviaje_importacion_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 ") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idviaje_importacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idviaje_importacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['iddestino']))
   {
       $this->nm_new_label['iddestino'] = "DESTINO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iddestino = $this->iddestino;
   $sStyleHidden_iddestino = '';
   if (isset($this->nmgp_cmp_hidden['iddestino']) && $this->nmgp_cmp_hidden['iddestino'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['iddestino']);
       $sStyleHidden_iddestino = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_iddestino = 'display: none;';
   $sStyleReadInp_iddestino = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['iddestino']) && $this->nmgp_cmp_readonly['iddestino'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['iddestino']);
       $sStyleReadLab_iddestino = '';
       $sStyleReadInp_iddestino = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['iddestino']) && $this->nmgp_cmp_hidden['iddestino'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="iddestino" value="<?php echo $this->form_encode_input($this->iddestino) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_iddestino_line" id="hidden_field_data_iddestino" style="<?php echo $sStyleHidden_iddestino; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_iddestino_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_iddestino_label"><span id="id_label_iddestino"><?php echo $this->nm_new_label['iddestino']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['iddestino']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['iddestino'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["iddestino"]) &&  $this->nmgp_cmp_readonly["iddestino"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT iddestino, descripcion  FROM destino  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'][] = $rs->fields[0];
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
   $iddestino_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->iddestino_1))
          {
              foreach ($this->iddestino_1 as $tmp_iddestino)
              {
                  if (trim($tmp_iddestino) === trim($cadaselect[1])) { $iddestino_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->iddestino) === trim($cadaselect[1])) { $iddestino_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="iddestino" value="<?php echo $this->form_encode_input($iddestino) . "\">" . $iddestino_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_iddestino();
   $x = 0 ; 
   $iddestino_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->iddestino_1))
          {
              foreach ($this->iddestino_1 as $tmp_iddestino)
              {
                  if (trim($tmp_iddestino) === trim($cadaselect[1])) { $iddestino_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->iddestino) === trim($cadaselect[1])) { $iddestino_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($iddestino_look))
          {
              $iddestino_look = $this->iddestino;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_iddestino\" class=\"css_iddestino_line\" style=\"" .  $sStyleReadLab_iddestino . "\">" . $this->form_encode_input($iddestino_look) . "</span><span id=\"id_read_off_iddestino\" class=\"css_read_off_iddestino\" style=\"white-space: nowrap; " . $sStyleReadInp_iddestino . "\">";
   echo " <span id=\"idAjaxSelect_iddestino\"><select class=\"sc-js-input scFormObjectOdd css_iddestino_obj\" style=\"\" id=\"id_sc_field_iddestino\" name=\"iddestino\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_iddestino'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->iddestino) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->iddestino)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iddestino_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iddestino_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_bl_dumb = ('' == $sStyleHidden_bl) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_bl_dumb" style="<?php echo $sStyleHidden_bl_dumb; ?>"></TD>
<?php $sStyleHidden_cantidad_por_bl_dumb = ('' == $sStyleHidden_cantidad_por_bl) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cantidad_por_bl_dumb" style="<?php echo $sStyleHidden_cantidad_por_bl_dumb; ?>"></TD>
<?php $sStyleHidden_idviaje_importacion_dumb = ('' == $sStyleHidden_idviaje_importacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idviaje_importacion_dumb" style="<?php echo $sStyleHidden_idviaje_importacion_dumb; ?>"></TD>
<?php $sStyleHidden_iddestino_dumb = ('' == $sStyleHidden_iddestino) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_iddestino_dumb" style="<?php echo $sStyleHidden_iddestino_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ubicacion']))
    {
        $this->nm_new_label['ubicacion'] = "UBICACION EN YARDA";
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

    <TD class="scFormDataOdd css_ubicacion_line" id="hidden_field_data_ubicacion" style="<?php echo $sStyleHidden_ubicacion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ubicacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ubicacion_label"><span id="id_label_ubicacion"><?php echo $this->nm_new_label['ubicacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ubicacion"]) &&  $this->nmgp_cmp_readonly["ubicacion"] == "on") { 

 ?>
<input type="hidden" name="ubicacion" value="<?php echo $this->form_encode_input($ubicacion) . "\">" . $ubicacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_ubicacion" class="sc-ui-readonly-ubicacion css_ubicacion_line" style="<?php echo $sStyleReadLab_ubicacion; ?>"><?php echo $this->ubicacion; ?></span><span id="id_read_off_ubicacion" class="css_read_off_ubicacion" style="white-space: nowrap;<?php echo $sStyleReadInp_ubicacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_ubicacion_obj" style="" id="id_sc_field_ubicacion" type=text name="ubicacion" value="<?php echo $this->form_encode_input($ubicacion) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ubicacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ubicacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['idrampa']))
   {
       $this->nm_new_label['idrampa'] = "RAMPA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idrampa = $this->idrampa;
   $sStyleHidden_idrampa = '';
   if (isset($this->nmgp_cmp_hidden['idrampa']) && $this->nmgp_cmp_hidden['idrampa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idrampa']);
       $sStyleHidden_idrampa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idrampa = 'display: none;';
   $sStyleReadInp_idrampa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idrampa']) && $this->nmgp_cmp_readonly['idrampa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idrampa']);
       $sStyleReadLab_idrampa = '';
       $sStyleReadInp_idrampa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idrampa']) && $this->nmgp_cmp_hidden['idrampa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idrampa" value="<?php echo $this->form_encode_input($this->idrampa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idrampa_line" id="hidden_field_data_idrampa" style="<?php echo $sStyleHidden_idrampa; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idrampa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idrampa_label"><span id="id_label_idrampa"><?php echo $this->nm_new_label['idrampa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idrampa"]) &&  $this->nmgp_cmp_readonly["idrampa"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idrampa, descripcion  FROM rampa  ORDER BY descripcion";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'][] = $rs->fields[0];
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
   $idrampa_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idrampa_1))
          {
              foreach ($this->idrampa_1 as $tmp_idrampa)
              {
                  if (trim($tmp_idrampa) === trim($cadaselect[1])) { $idrampa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idrampa) === trim($cadaselect[1])) { $idrampa_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idrampa" value="<?php echo $this->form_encode_input($idrampa) . "\">" . $idrampa_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idrampa();
   $x = 0 ; 
   $idrampa_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idrampa_1))
          {
              foreach ($this->idrampa_1 as $tmp_idrampa)
              {
                  if (trim($tmp_idrampa) === trim($cadaselect[1])) { $idrampa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idrampa) === trim($cadaselect[1])) { $idrampa_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idrampa_look))
          {
              $idrampa_look = $this->idrampa;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idrampa\" class=\"css_idrampa_line\" style=\"" .  $sStyleReadLab_idrampa . "\">" . $this->form_encode_input($idrampa_look) . "</span><span id=\"id_read_off_idrampa\" class=\"css_read_off_idrampa\" style=\"white-space: nowrap; " . $sStyleReadInp_idrampa . "\">";
   echo " <span id=\"idAjaxSelect_idrampa\"><select class=\"sc-js-input scFormObjectOdd css_idrampa_obj\" style=\"\" id=\"id_sc_field_idrampa\" name=\"idrampa\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idrampa'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idrampa) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idrampa)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idrampa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idrampa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['idfuncionario']))
    {
        $this->nm_new_label['idfuncionario'] = "FUNCIONARIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfuncionario = $this->idfuncionario;
   $sStyleHidden_idfuncionario = '';
   if (isset($this->nmgp_cmp_hidden['idfuncionario']) && $this->nmgp_cmp_hidden['idfuncionario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfuncionario']);
       $sStyleHidden_idfuncionario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfuncionario = 'display: none;';
   $sStyleReadInp_idfuncionario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfuncionario']) && $this->nmgp_cmp_readonly['idfuncionario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfuncionario']);
       $sStyleReadLab_idfuncionario = '';
       $sStyleReadInp_idfuncionario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfuncionario']) && $this->nmgp_cmp_hidden['idfuncionario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idfuncionario" value="<?php echo $this->form_encode_input($idfuncionario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idfuncionario_line" id="hidden_field_data_idfuncionario" style="<?php echo $sStyleHidden_idfuncionario; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfuncionario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idfuncionario_label"><span id="id_label_idfuncionario"><?php echo $this->nm_new_label['idfuncionario']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfuncionario"]) &&  $this->nmgp_cmp_readonly["idfuncionario"] == "on") { 

 ?>
<input type="hidden" name="idfuncionario" value="<?php echo $this->form_encode_input($idfuncionario) . "\">" . $idfuncionario . ""; ?>
<?php } else { ?>

<?php
$aRecData['idfuncionario'] = $this->idfuncionario;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idfuncionario, nombre FROM funcionario WHERE idfuncionario = " . substr($this->Db->qstr($this->idfuncionario), 1, -1) . " ORDER BY nombre";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idfuncionario)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idfuncionario])) ? $aLookup[0][$this->idfuncionario] : $this->idfuncionario;
$idfuncionario_look = (isset($aLookup[0][$this->idfuncionario])) ? $aLookup[0][$this->idfuncionario] : $this->idfuncionario;
?>
<span id="id_read_on_idfuncionario" class="sc-ui-readonly-idfuncionario css_idfuncionario_line" style="<?php echo $sStyleReadLab_idfuncionario; ?>"><?php echo str_replace("<", "&lt;", $idfuncionario_look); ?></span><span id="id_read_off_idfuncionario" class="css_read_off_idfuncionario" style="white-space: nowrap;<?php echo $sStyleReadInp_idfuncionario; ?>">
 <input class="sc-js-input scFormObjectOdd css_idfuncionario_obj" style="display: none;" id="id_sc_field_idfuncionario" type=text name="idfuncionario" value="<?php echo $this->form_encode_input($idfuncionario) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 ") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idfuncionario'] = $this->idfuncionario;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idfuncionario, nombre FROM funcionario WHERE idfuncionario = " . substr($this->Db->qstr($this->idfuncionario), 1, -1) . " ORDER BY nombre";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idfuncionario)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idfuncionario'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idfuncionario])) ? $aLookup[0][$this->idfuncionario] : '';
$idfuncionario_look = (isset($aLookup[0][$this->idfuncionario])) ? $aLookup[0][$this->idfuncionario] : '';
?>
<input type="text" id="id_ac_idfuncionario" name="idfuncionario_autocomp" class="scFormObjectOdd sc-ui-autocomp-idfuncionario css_idfuncionario_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 ") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfuncionario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfuncionario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['idgestor_aduanal']))
    {
        $this->nm_new_label['idgestor_aduanal'] = "GESTOR ADUANAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idgestor_aduanal = $this->idgestor_aduanal;
   $sStyleHidden_idgestor_aduanal = '';
   if (isset($this->nmgp_cmp_hidden['idgestor_aduanal']) && $this->nmgp_cmp_hidden['idgestor_aduanal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idgestor_aduanal']);
       $sStyleHidden_idgestor_aduanal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idgestor_aduanal = 'display: none;';
   $sStyleReadInp_idgestor_aduanal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idgestor_aduanal']) && $this->nmgp_cmp_readonly['idgestor_aduanal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idgestor_aduanal']);
       $sStyleReadLab_idgestor_aduanal = '';
       $sStyleReadInp_idgestor_aduanal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idgestor_aduanal']) && $this->nmgp_cmp_hidden['idgestor_aduanal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idgestor_aduanal" value="<?php echo $this->form_encode_input($idgestor_aduanal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idgestor_aduanal_line" id="hidden_field_data_idgestor_aduanal" style="<?php echo $sStyleHidden_idgestor_aduanal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idgestor_aduanal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idgestor_aduanal_label"><span id="id_label_idgestor_aduanal"><?php echo $this->nm_new_label['idgestor_aduanal']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idgestor_aduanal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['php_cmp_required']['idgestor_aduanal'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idgestor_aduanal"]) &&  $this->nmgp_cmp_readonly["idgestor_aduanal"] == "on") { 

 ?>
<input type="hidden" name="idgestor_aduanal" value="<?php echo $this->form_encode_input($idgestor_aduanal) . "\">" . $idgestor_aduanal . ""; ?>
<?php } else { ?>

<?php
$aRecData['idgestor_aduanal'] = $this->idgestor_aduanal;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idgestor_aduanal, nombre FROM gestor_aduanal WHERE idgestor_aduanal = " . substr($this->Db->qstr($this->idgestor_aduanal), 1, -1) . " ORDER BY idgestor_aduanal";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idgestor_aduanal)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idgestor_aduanal])) ? $aLookup[0][$this->idgestor_aduanal] : $this->idgestor_aduanal;
$idgestor_aduanal_look = (isset($aLookup[0][$this->idgestor_aduanal])) ? $aLookup[0][$this->idgestor_aduanal] : $this->idgestor_aduanal;
?>
<span id="id_read_on_idgestor_aduanal" class="sc-ui-readonly-idgestor_aduanal css_idgestor_aduanal_line" style="<?php echo $sStyleReadLab_idgestor_aduanal; ?>"><?php echo str_replace("<", "&lt;", $idgestor_aduanal_look); ?></span><span id="id_read_off_idgestor_aduanal" class="css_read_off_idgestor_aduanal" style="white-space: nowrap;<?php echo $sStyleReadInp_idgestor_aduanal; ?>">
 <input class="sc-js-input scFormObjectOdd css_idgestor_aduanal_obj" style="display: none;" id="id_sc_field_idgestor_aduanal" type=text name="idgestor_aduanal" value="<?php echo $this->form_encode_input($idgestor_aduanal) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idgestor_aduanal'] = $this->idgestor_aduanal;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idgestor_aduanal, nombre FROM gestor_aduanal WHERE idgestor_aduanal = " . substr($this->Db->qstr($this->idgestor_aduanal), 1, -1) . " ORDER BY idgestor_aduanal";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

   if ('' != $this->idgestor_aduanal)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idgestor_aduanal'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idgestor_aduanal])) ? $aLookup[0][$this->idgestor_aduanal] : '';
$idgestor_aduanal_look = (isset($aLookup[0][$this->idgestor_aduanal])) ? $aLookup[0][$this->idgestor_aduanal] : '';
?>
<input type="text" id="id_ac_idgestor_aduanal" name="idgestor_aduanal_autocomp" class="scFormObjectOdd sc-ui-autocomp-idgestor_aduanal css_idgestor_aduanal_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idgestor_aduanal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idgestor_aduanal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_ubicacion_dumb = ('' == $sStyleHidden_ubicacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ubicacion_dumb" style="<?php echo $sStyleHidden_ubicacion_dumb; ?>"></TD>
<?php $sStyleHidden_idrampa_dumb = ('' == $sStyleHidden_idrampa) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idrampa_dumb" style="<?php echo $sStyleHidden_idrampa_dumb; ?>"></TD>
<?php $sStyleHidden_idfuncionario_dumb = ('' == $sStyleHidden_idfuncionario) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idfuncionario_dumb" style="<?php echo $sStyleHidden_idfuncionario_dumb; ?>"></TD>
<?php $sStyleHidden_idgestor_aduanal_dumb = ('' == $sStyleHidden_idgestor_aduanal) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idgestor_aduanal_dumb" style="<?php echo $sStyleHidden_idgestor_aduanal_dumb; ?>"></TD>
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
   if (!isset($this->nm_new_label['idestado_revision']))
   {
       $this->nm_new_label['idestado_revision'] = "ESTADO DE LA REVISION";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idestado_revision = $this->idestado_revision;
   if (!isset($this->nmgp_cmp_hidden['idestado_revision']))
   {
       $this->nmgp_cmp_hidden['idestado_revision'] = 'off';
   }
   $sStyleHidden_idestado_revision = '';
   if (isset($this->nmgp_cmp_hidden['idestado_revision']) && $this->nmgp_cmp_hidden['idestado_revision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idestado_revision']);
       $sStyleHidden_idestado_revision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idestado_revision = 'display: none;';
   $sStyleReadInp_idestado_revision = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idestado_revision']) && $this->nmgp_cmp_readonly['idestado_revision'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idestado_revision']);
       $sStyleReadLab_idestado_revision = '';
       $sStyleReadInp_idestado_revision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idestado_revision']) && $this->nmgp_cmp_hidden['idestado_revision'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idestado_revision" value="<?php echo $this->form_encode_input($this->idestado_revision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idestado_revision_line" id="hidden_field_data_idestado_revision" style="<?php echo $sStyleHidden_idestado_revision; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idestado_revision_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idestado_revision_label"><span id="id_label_idestado_revision"><?php echo $this->nm_new_label['idestado_revision']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idestado_revision"]) &&  $this->nmgp_cmp_readonly["idestado_revision"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'] = array(); 
    }

   $old_value_fecha_solicitud = $this->fecha_solicitud;
   $old_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $old_value_cantidad_por_bl = $this->cantidad_por_bl;
   $old_value_codigo_revision = $this->codigo_revision;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_solicitud = $this->fecha_solicitud;
   $unformatted_value_fecha_solicitud_hora = $this->fecha_solicitud_hora;
   $unformatted_value_cantidad_por_bl = $this->cantidad_por_bl;
   $unformatted_value_codigo_revision = $this->codigo_revision;

   $maga_val_str = "";
   if (!empty($this->maga))
   {
       if (is_array($this->maga))
       {
           $Tmp_array = $this->maga;
       }
       else
       {
           $Tmp_array = explode(";", $this->maga);
       }
       $maga_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $maga_val_str)
          {
             $maga_val_str .= ", ";
          }
          $maga_val_str .= $Tmp_val_cmp;
       }
   }
   $sgaia_val_str = "";
   if (!empty($this->sgaia))
   {
       if (is_array($this->sgaia))
       {
           $Tmp_array = $this->sgaia;
       }
       else
       {
           $Tmp_array = explode(";", $this->sgaia);
       }
       $sgaia_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sgaia_val_str)
          {
             $sgaia_val_str .= ", ";
          }
          $sgaia_val_str .= $Tmp_val_cmp;
       }
   }
   $sat_val_str = "";
   if (!empty($this->sat))
   {
       if (is_array($this->sat))
       {
           $Tmp_array = $this->sat;
       }
       else
       {
           $Tmp_array = explode(";", $this->sat);
       }
       $sat_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sat_val_str)
          {
             $sat_val_str .= ", ";
          }
          $sat_val_str .= $Tmp_val_cmp;
       }
   }
   $dipafront_val_str = "";
   if (!empty($this->dipafront))
   {
       if (is_array($this->dipafront))
       {
           $Tmp_array = $this->dipafront;
       }
       else
       {
           $Tmp_array = explode(";", $this->dipafront);
       }
       $dipafront_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $dipafront_val_str)
          {
             $dipafront_val_str .= ", ";
          }
          $dipafront_val_str .= $Tmp_val_cmp;
       }
   }
   $ucc_val_str = "";
   if (!empty($this->ucc))
   {
       if (is_array($this->ucc))
       {
           $Tmp_array = $this->ucc;
       }
       else
       {
           $Tmp_array = explode(";", $this->ucc);
       }
       $ucc_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ucc_val_str)
          {
             $ucc_val_str .= ", ";
          }
          $ucc_val_str .= $Tmp_val_cmp;
       }
   }
   $termonebulizacion_val_str = "";
   if (!empty($this->termonebulizacion))
   {
       if (is_array($this->termonebulizacion))
       {
           $Tmp_array = $this->termonebulizacion;
       }
       else
       {
           $Tmp_array = explode(";", $this->termonebulizacion);
       }
       $termonebulizacion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $termonebulizacion_val_str)
          {
             $termonebulizacion_val_str .= ", ";
          }
          $termonebulizacion_val_str .= $Tmp_val_cmp;
       }
   }
   $nm_comando = "SELECT idestado_revision, descripcion FROM estado_revision ORDER BY idestado_revision";

   $this->fecha_solicitud = $old_value_fecha_solicitud;
   $this->fecha_solicitud_hora = $old_value_fecha_solicitud_hora;
   $this->cantidad_por_bl = $old_value_cantidad_por_bl;
   $this->codigo_revision = $old_value_codigo_revision;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'][] = $rs->fields[0];
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
   $idestado_revision_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idestado_revision_1))
          {
              foreach ($this->idestado_revision_1 as $tmp_idestado_revision)
              {
                  if (trim($tmp_idestado_revision) === trim($cadaselect[1])) { $idestado_revision_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idestado_revision) === trim($cadaselect[1])) { $idestado_revision_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idestado_revision" value="<?php echo $this->form_encode_input($idestado_revision) . "\">" . $idestado_revision_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idestado_revision();
   $x = 0 ; 
   $idestado_revision_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idestado_revision_1))
          {
              foreach ($this->idestado_revision_1 as $tmp_idestado_revision)
              {
                  if (trim($tmp_idestado_revision) === trim($cadaselect[1])) { $idestado_revision_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idestado_revision) === trim($cadaselect[1])) { $idestado_revision_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idestado_revision_look))
          {
              $idestado_revision_look = $this->idestado_revision;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idestado_revision\" class=\"css_idestado_revision_line\" style=\"" .  $sStyleReadLab_idestado_revision . "\">" . $this->form_encode_input($idestado_revision_look) . "</span><span id=\"id_read_off_idestado_revision\" class=\"css_read_off_idestado_revision\" style=\"white-space: nowrap; " . $sStyleReadInp_idestado_revision . "\">";
   echo " <span id=\"idAjaxSelect_idestado_revision\"><select class=\"sc-js-input scFormObjectOdd css_idestado_revision_obj\" style=\"\" id=\"id_sc_field_idestado_revision\" name=\"idestado_revision\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['Lookup_idestado_revision'][] = ''; 
   echo "  <option value=\"\">-- SELECCIONE --</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idestado_revision) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idestado_revision)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idestado_revision_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idestado_revision_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['codigo_revision']))
           {
               $this->nmgp_cmp_readonly['codigo_revision'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['sec_users_login']))
    {
        $this->nm_new_label['sec_users_login'] = "Sec Users Login";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sec_users_login = $this->sec_users_login;
   if (!isset($this->nmgp_cmp_hidden['sec_users_login']))
   {
       $this->nmgp_cmp_hidden['sec_users_login'] = 'off';
   }
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

    <TD class="scFormDataOdd css_sec_users_login_line" id="hidden_field_data_sec_users_login" style="<?php echo $sStyleHidden_sec_users_login; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sec_users_login_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sec_users_login_label"><span id="id_label_sec_users_login"><?php echo $this->nm_new_label['sec_users_login']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sec_users_login"]) &&  $this->nmgp_cmp_readonly["sec_users_login"] == "on") { 

 ?>
<input type="hidden" name="sec_users_login" value="<?php echo $this->form_encode_input($sec_users_login) . "\">" . $sec_users_login . ""; ?>
<?php } else { ?>
<span id="id_read_on_sec_users_login" class="sc-ui-readonly-sec_users_login css_sec_users_login_line" style="<?php echo $sStyleReadLab_sec_users_login; ?>"><?php echo $this->sec_users_login; ?></span><span id="id_read_off_sec_users_login" class="css_read_off_sec_users_login" style="white-space: nowrap;<?php echo $sStyleReadInp_sec_users_login; ?>">
 <input class="sc-js-input scFormObjectOdd css_sec_users_login_obj" style="" id="id_sc_field_sec_users_login" type=text name="sec_users_login" value="<?php echo $this->form_encode_input($sec_users_login) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sec_users_login_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sec_users_login_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_sec_users_login_dumb = ('' == $sStyleHidden_sec_users_login) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_sec_users_login_dumb" style="<?php echo $sStyleHidden_sec_users_login_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['codigo_revision']))
    {
        $this->nm_new_label['codigo_revision'] = "CODIGO REVISION";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_revision = $this->codigo_revision;
   $sStyleHidden_codigo_revision = '';
   if (isset($this->nmgp_cmp_hidden['codigo_revision']) && $this->nmgp_cmp_hidden['codigo_revision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_revision']);
       $sStyleHidden_codigo_revision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_revision = 'display: none;';
   $sStyleReadInp_codigo_revision = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["codigo_revision"]) &&  $this->nmgp_cmp_readonly["codigo_revision"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_revision']);
       $sStyleReadLab_codigo_revision = '';
       $sStyleReadInp_codigo_revision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_revision']) && $this->nmgp_cmp_hidden['codigo_revision'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_revision" value="<?php echo $this->form_encode_input($codigo_revision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_revision_line" id="hidden_field_data_codigo_revision" style="<?php echo $sStyleHidden_codigo_revision; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_revision_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_revision_label"><span id="id_label_codigo_revision"><?php echo $this->nm_new_label['codigo_revision']; ?></span></span><br>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_codigo_revision" css_codigo_revision_line" style="<?php echo $sStyleReadLab_codigo_revision; ?>"><?php echo $this->form_encode_input($this->codigo_revision); ?></span><span id="id_read_off_codigo_revision" class="css_read_off_codigo_revision" style="<?php echo $sStyleReadInp_codigo_revision; ?>"><input type="hidden" name="codigo_revision" value="<?php echo $this->form_encode_input($codigo_revision) . "\">"?><span id="id_ajax_label_codigo_revision"><?php echo nl2br($codigo_revision); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_revision_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_revision_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="3" >&nbsp;</TD>




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
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "R")
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_revision");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_revision");
 parent.scAjaxDetailHeight("form_revision", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_revision", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_revision", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['sc_modal'])
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
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-1").length && $("#sc_b_ini_b.sc-unique-btn-1").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-2").length && $("#sc_b_ret_b.sc-unique-btn-2").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-3").length && $("#sc_b_avc_b.sc-unique-btn-3").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-4").length && $("#sc_b_fim_b.sc-unique-btn-4").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_b.sc-unique-btn-5").length && $("#sc_b_new_b.sc-unique-btn-5").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-6").length && $("#sc_b_ins_b.sc-unique-btn-6").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_b.sc-unique-btn-7").length && $("#sc_b_sai_b.sc-unique-btn-7").is(":visible")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_revision']['buttonStatus'] = $this->nmgp_botoes;
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
