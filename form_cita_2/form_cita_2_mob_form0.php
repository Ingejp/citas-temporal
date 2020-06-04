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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags(""); } else { echo strip_tags(""); } ?></TITLE>
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
.css_read_off_fechainicio button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cita_2/form_cita_2_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cita_2_mob_sajax_js.php");
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

include_once('form_cita_2_mob_jquery.php');

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
  scFocusField('codigo_cita');

<?php
}
?>
  addAutocomplete(this);

  $("#hidden_bloco_0,#hidden_bloco_1").each(function() {
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
    "hidden_bloco_1": true
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


  $(".sc-ui-autocomp-idpiloto", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idpiloto" != sId ? sId.substr(8) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_cita_2_mob_event_idpiloto_onchange) { do_ajax_form_cita_2_mob_event_idpiloto_onchange(sRow); }
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
     url: "form_cita_2_mob.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idpiloto",
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
   change: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idpiloto' != sId ? sId.substr(8) : '';
    if ("" == $(this).val()) {
     do_ajax_form_cita_2_mob_event_idpiloto_onchange(sRow);
    }
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idpiloto' != sId ? sId.substr(8) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idpiloto' != sId ? sId.substr(8) : '';
    ui.item.value = ui.item.value.toUpperCase();
    ui.item.label = ui.item.label.toUpperCase();
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    do_ajax_form_cita_2_mob_event_idpiloto_onchange(sRow);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_idpiloto", elem).on("focus", function() {
    $("#id_sc_field_idpiloto").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_idpiloto").trigger("blur");
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
     if ('function' == typeof do_ajax_form_cita_2_mob_event_idcabezal_onchange) { do_ajax_form_cita_2_mob_event_idcabezal_onchange(sRow); }
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
     url: "form_cita_2_mob.php",
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

  $(".sc-ui-autocomp-idviaje", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idviaje" != sId ? sId.substr(7) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_cita_2_mob_event_idviaje_onchange) { do_ajax_form_cita_2_mob_event_idviaje_onchange(sRow); }
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
     url: "form_cita_2_mob.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idviaje",
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
    var sId = $(this).attr("id").substr(6), sRow = 'idviaje' != sId ? sId.substr(7) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idviaje' != sId ? sId.substr(7) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_idviaje", elem).on("focus", function() {
    $("#id_sc_field_idviaje").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_idviaje").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_cita_2']['error_buffer']) && '' != $_SESSION['scriptcase']['form_cita_2']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_cita_2']['error_buffer'];
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
 include_once("form_cita_2_mob_js0.php");
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
               action="form_cita_2_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['insert_validation']; ?>">
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
<input type="hidden" name="idcita" value="<?php  echo $this->form_encode_input($this->idcita) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cita_2_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cita_2_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="80%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idestado']))
   {
       $this->nmgp_cmp_hidden['idestado'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idyarda']))
   {
       $this->nmgp_cmp_hidden['idyarda'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idtipomovimiento']))
   {
       $this->nmgp_cmp_hidden['idtipomovimiento'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['atc_ingreso']))
   {
       $this->nmgp_cmp_hidden['atc_ingreso'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['marchamo_ingreso']))
   {
       $this->nmgp_cmp_hidden['marchamo_ingreso'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['atc_despacho']))
   {
       $this->nmgp_cmp_hidden['atc_despacho'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['marchamo_despacho']))
   {
       $this->nmgp_cmp_hidden['marchamo_despacho'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['sec_users_login']))
   {
       $this->nmgp_cmp_hidden['sec_users_login'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['turno']))
   {
       $this->nmgp_cmp_hidden['turno'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DATOS DEL TURNO - <?php echo $_SESSION['yarda_desc'] ?><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo_cita']))
    {
        $this->nm_new_label['codigo_cita'] = "CODIGO TURNO";
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

    <TD class="scFormDataOdd css_codigo_cita_line" id="hidden_field_data_codigo_cita" style="<?php echo $sStyleHidden_codigo_cita; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_cita_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_cita_label"><span id="id_label_codigo_cita"><?php echo $this->nm_new_label['codigo_cita']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['codigo_cita']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['codigo_cita'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_cita"]) &&  $this->nmgp_cmp_readonly["codigo_cita"] == "on") { 

 ?>
<input type="hidden" name="codigo_cita" value="<?php echo $this->form_encode_input($codigo_cita) . "\">" . $codigo_cita . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_cita" class="sc-ui-readonly-codigo_cita css_codigo_cita_line" style="<?php echo $sStyleReadLab_codigo_cita; ?>"><?php echo $this->codigo_cita; ?></span><span id="id_read_off_codigo_cita" class="css_read_off_codigo_cita" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_cita; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_cita_obj" style="" id="id_sc_field_codigo_cita" type=text name="codigo_cita" value="<?php echo $this->form_encode_input($codigo_cita) ?>"
 size=35 maxlength=35 alt="{datatype: 'text', maxLength: 35, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 .,:") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_cita_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_cita_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_qr']))
   {
       $this->nm_new_label['tipo_qr'] = "TIPO QR";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_qr = $this->tipo_qr;
   $sStyleHidden_tipo_qr = '';
   if (isset($this->nmgp_cmp_hidden['tipo_qr']) && $this->nmgp_cmp_hidden['tipo_qr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_qr']);
       $sStyleHidden_tipo_qr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_qr = 'display: none;';
   $sStyleReadInp_tipo_qr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_qr']) && $this->nmgp_cmp_readonly['tipo_qr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_qr']);
       $sStyleReadLab_tipo_qr = '';
       $sStyleReadInp_tipo_qr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_qr']) && $this->nmgp_cmp_hidden['tipo_qr'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_qr" value="<?php echo $this->form_encode_input($this->tipo_qr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_qr_line" id="hidden_field_data_tipo_qr" style="<?php echo $sStyleHidden_tipo_qr; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_qr_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_qr_label"><span id="id_label_tipo_qr"><?php echo $this->nm_new_label['tipo_qr']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_qr"]) &&  $this->nmgp_cmp_readonly["tipo_qr"] == "on") { 

$tipo_qr_look = "";
 if ($this->tipo_qr == "1") { $tipo_qr_look .= "QR AUTOMATICO" ;} 
 if ($this->tipo_qr == "2") { $tipo_qr_look .= "QR MANUAL" ;} 
 if (empty($tipo_qr_look)) { $tipo_qr_look = $this->tipo_qr; }
?>
<input type="hidden" name="tipo_qr" value="<?php echo $this->form_encode_input($tipo_qr) . "\">" . $tipo_qr_look . ""; ?>
<?php } else { ?>
<?php

$tipo_qr_look = "";
 if ($this->tipo_qr == "1") { $tipo_qr_look .= "QR AUTOMATICO" ;} 
 if ($this->tipo_qr == "2") { $tipo_qr_look .= "QR MANUAL" ;} 
 if (empty($tipo_qr_look)) { $tipo_qr_look = $this->tipo_qr; }
?>
<span id="id_read_on_tipo_qr" class="css_tipo_qr_line"  style="<?php echo $sStyleReadLab_tipo_qr; ?>"><?php echo $this->form_encode_input($tipo_qr_look); ?></span><span id="id_read_off_tipo_qr" class="css_read_off_tipo_qr" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_qr; ?>">
 <span id="idAjaxSelect_tipo_qr"><select class="sc-js-input scFormObjectOdd css_tipo_qr_obj" style="" id="id_sc_field_tipo_qr" name="tipo_qr" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->tipo_qr == "1") { echo " selected" ;} ?>>QR AUTOMATICO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_tipo_qr'][] = '1'; ?>
 <option  value="2" <?php  if ($this->tipo_qr == "2") { echo " selected" ;} ?>>QR MANUAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_tipo_qr'][] = '2'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_qr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_qr_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechainicio']))
    {
        $this->nm_new_label['fechainicio'] = "FECHA DE INGRESO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechainicio = $this->fechainicio;
   $fechainicio_hora = $this->fechainicio_hora;
   $guarda_datahora = $this->field_config['fechainicio']['date_format'];
   $this->field_config['fechainicio']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_fechainicio = '';
   if (isset($this->nmgp_cmp_hidden['fechainicio']) && $this->nmgp_cmp_hidden['fechainicio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechainicio']);
       $sStyleHidden_fechainicio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechainicio = 'display: none;';
   $sStyleReadInp_fechainicio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechainicio']) && $this->nmgp_cmp_readonly['fechainicio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechainicio']);
       $sStyleReadLab_fechainicio = '';
       $sStyleReadInp_fechainicio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechainicio']) && $this->nmgp_cmp_hidden['fechainicio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechainicio" value="<?php echo $this->form_encode_input($fechainicio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechainicio_hora_line" id="hidden_field_data_fechainicio" style="<?php echo $sStyleHidden_fechainicio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechainicio_hora_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechainicio_label"><span id="id_label_fechainicio"><?php echo $this->nm_new_label['fechainicio']; ?></span></span><br><input type="hidden" name="fechainicio" value="<?php echo $this->form_encode_input($fechainicio); ?>"><span id="id_ajax_label_fechainicio"><?php echo nl2br($fechainicio); ?></span>
<?php
$tmp_form_data = $this->field_config['fechainicio']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

<input type="hidden" name="fechainicio_hora" value="<?php echo $this->form_encode_input($fechainicio_hora); ?>"><span id="id_ajax_label_fechainicio_hora"><?php echo nl2br($fechainicio_hora); ?></span>
<?php
$tmp_form_data = $this->field_config['fechainicio_hora']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechainicio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechainicio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fechainicio_dumb = ('' == $sStyleHidden_fechainicio) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fechainicio_dumb" style="<?php echo $sStyleHidden_fechainicio_dumb; ?>"></TD>
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
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>DETALLE DEL TURNO - <?php echo $_SESSION['yarda_desc'] ?><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idtipomovimiento']))
   {
       $this->nm_new_label['idtipomovimiento'] = "TIPO DE MOVIMIENTO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idtipomovimiento = $this->idtipomovimiento;
   if (!isset($this->nmgp_cmp_hidden['idtipomovimiento']))
   {
       $this->nmgp_cmp_hidden['idtipomovimiento'] = 'off';
   }
   $sStyleHidden_idtipomovimiento = '';
   if (isset($this->nmgp_cmp_hidden['idtipomovimiento']) && $this->nmgp_cmp_hidden['idtipomovimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idtipomovimiento']);
       $sStyleHidden_idtipomovimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idtipomovimiento = 'display: none;';
   $sStyleReadInp_idtipomovimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idtipomovimiento']) && $this->nmgp_cmp_readonly['idtipomovimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idtipomovimiento']);
       $sStyleReadLab_idtipomovimiento = '';
       $sStyleReadInp_idtipomovimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idtipomovimiento']) && $this->nmgp_cmp_hidden['idtipomovimiento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idtipomovimiento" value="<?php echo $this->form_encode_input($this->idtipomovimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idtipomovimiento_line" id="hidden_field_data_idtipomovimiento" style="<?php echo $sStyleHidden_idtipomovimiento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idtipomovimiento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idtipomovimiento_label"><span id="id_label_idtipomovimiento"><?php echo $this->nm_new_label['idtipomovimiento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idtipomovimiento"]) &&  $this->nmgp_cmp_readonly["idtipomovimiento"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipomovimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipomovimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipomovimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipomovimiento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipomovimiento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipomovimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipomovimiento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipomovimiento'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idtipoMovimiento, descripcion  FROM tipomovimiento  ORDER BY descripcion";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipomovimiento'][] = $rs->fields[0];
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
   $idtipomovimiento_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipomovimiento_1))
          {
              foreach ($this->idtipomovimiento_1 as $tmp_idtipomovimiento)
              {
                  if (trim($tmp_idtipomovimiento) === trim($cadaselect[1])) { $idtipomovimiento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipomovimiento) === trim($cadaselect[1])) { $idtipomovimiento_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idtipomovimiento" value="<?php echo $this->form_encode_input($idtipomovimiento) . "\">" . $idtipomovimiento_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idtipomovimiento();
   $x = 0 ; 
   $idtipomovimiento_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipomovimiento_1))
          {
              foreach ($this->idtipomovimiento_1 as $tmp_idtipomovimiento)
              {
                  if (trim($tmp_idtipomovimiento) === trim($cadaselect[1])) { $idtipomovimiento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipomovimiento) === trim($cadaselect[1])) { $idtipomovimiento_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idtipomovimiento_look))
          {
              $idtipomovimiento_look = $this->idtipomovimiento;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idtipomovimiento\" class=\"css_idtipomovimiento_line\" style=\"" .  $sStyleReadLab_idtipomovimiento . "\">" . $this->form_encode_input($idtipomovimiento_look) . "</span><span id=\"id_read_off_idtipomovimiento\" class=\"css_read_off_idtipomovimiento\" style=\"white-space: nowrap; " . $sStyleReadInp_idtipomovimiento . "\">";
   echo " <span id=\"idAjaxSelect_idtipomovimiento\"><select class=\"sc-js-input scFormObjectOdd css_idtipomovimiento_obj\" style=\"\" id=\"id_sc_field_idtipomovimiento\" name=\"idtipomovimiento\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idtipomovimiento) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idtipomovimiento)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idtipomovimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idtipomovimiento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idestado']))
   {
       $this->nm_new_label['idestado'] = "ESTADO";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['idestado']) && $this->nmgp_cmp_hidden['idestado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idestado" value="<?php echo $this->form_encode_input($this->idestado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idestado_line" id="hidden_field_data_idestado" style="<?php echo $sStyleHidden_idestado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idestado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idestado_label"><span id="id_label_idestado"><?php echo $this->nm_new_label['idestado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idestado"]) &&  $this->nmgp_cmp_readonly["idestado"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idestado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idestado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idestado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idestado'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idestado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idestado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idestado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idestado'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idestado, estado  FROM estado  ORDER BY estado";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idestado'][] = $rs->fields[0];
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
   $idestado_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idestado_1))
          {
              foreach ($this->idestado_1 as $tmp_idestado)
              {
                  if (trim($tmp_idestado) === trim($cadaselect[1])) { $idestado_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idestado) === trim($cadaselect[1])) { $idestado_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idestado" value="<?php echo $this->form_encode_input($idestado) . "\">" . $idestado_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idestado();
   $x = 0 ; 
   $idestado_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idestado_1))
          {
              foreach ($this->idestado_1 as $tmp_idestado)
              {
                  if (trim($tmp_idestado) === trim($cadaselect[1])) { $idestado_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idestado) === trim($cadaselect[1])) { $idestado_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idestado_look))
          {
              $idestado_look = $this->idestado;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idestado\" class=\"css_idestado_line\" style=\"" .  $sStyleReadLab_idestado . "\">" . $this->form_encode_input($idestado_look) . "</span><span id=\"id_read_off_idestado\" class=\"css_read_off_idestado\" style=\"white-space: nowrap; " . $sStyleReadInp_idestado . "\">";
   echo " <span id=\"idAjaxSelect_idestado\"><select class=\"sc-js-input scFormObjectOdd css_idestado_obj\" style=\"\" id=\"id_sc_field_idestado\" name=\"idestado\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idestado) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idestado)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idestado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idestado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sec_users_login_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sec_users_login_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idpiloto']))
    {
        $this->nm_new_label['idpiloto'] = "LICENCIA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpiloto = $this->idpiloto;
   $sStyleHidden_idpiloto = '';
   if (isset($this->nmgp_cmp_hidden['idpiloto']) && $this->nmgp_cmp_hidden['idpiloto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpiloto']);
       $sStyleHidden_idpiloto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpiloto = 'display: none;';
   $sStyleReadInp_idpiloto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idpiloto']) && $this->nmgp_cmp_readonly['idpiloto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpiloto']);
       $sStyleReadLab_idpiloto = '';
       $sStyleReadInp_idpiloto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpiloto']) && $this->nmgp_cmp_hidden['idpiloto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpiloto" value="<?php echo $this->form_encode_input($idpiloto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idpiloto_line" id="hidden_field_data_idpiloto" style="<?php echo $sStyleHidden_idpiloto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpiloto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idpiloto_label"><span id="id_label_idpiloto"><?php echo $this->nm_new_label['idpiloto']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idpiloto']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idpiloto'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpiloto"]) &&  $this->nmgp_cmp_readonly["idpiloto"] == "on") { 

 ?>
<input type="hidden" name="idpiloto" value="<?php echo $this->form_encode_input($idpiloto) . "\">" . $idpiloto . ""; ?>
<?php } else { ?>

<?php
$aRecData['idpiloto'] = $this->idpiloto;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->nm_clear_val("idpiloto");

   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idpiloto, licencia FROM piloto WHERE idpiloto = " . substr($this->Db->qstr($this->idpiloto), 1, -1) . " ORDER BY licencia";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   if ('' != $this->idpiloto)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$unformatted_value_idpiloto])) ? $aLookup[0][$unformatted_value_idpiloto] : $this->idpiloto;
$idpiloto_look = (isset($aLookup[0][$unformatted_value_idpiloto])) ? $aLookup[0][$unformatted_value_idpiloto] : $this->idpiloto;
?>
<span id="id_read_on_idpiloto" class="sc-ui-readonly-idpiloto css_idpiloto_line" style="<?php echo $sStyleReadLab_idpiloto; ?>"><?php echo str_replace("<", "&lt;", $idpiloto_look); ?></span><span id="id_read_off_idpiloto" class="css_read_off_idpiloto" style="white-space: nowrap;<?php echo $sStyleReadInp_idpiloto; ?>">
 <input class="sc-js-input scFormObjectOdd css_idpiloto_obj" style="display: none;" id="id_sc_field_idpiloto" type=text name="idpiloto" value="<?php echo $this->form_encode_input($idpiloto) ?>"
 size=11 style="display: none" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idpiloto']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idpiloto']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idpiloto']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idpiloto'] = $this->idpiloto;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->nm_clear_val("idpiloto");

   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idpiloto, licencia FROM piloto WHERE idpiloto = " . substr($this->Db->qstr($this->idpiloto), 1, -1) . " ORDER BY licencia";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   if ('' != $this->idpiloto)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idpiloto'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$unformatted_value_idpiloto])) ? $aLookup[0][$unformatted_value_idpiloto] : '';
$idpiloto_look = (isset($aLookup[0][$unformatted_value_idpiloto])) ? $aLookup[0][$unformatted_value_idpiloto] : '';
?>
<input type="text" id="id_ac_idpiloto" name="idpiloto_autocomp" class="scFormObjectOdd sc-ui-autocomp-idpiloto css_idpiloto_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idpiloto']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idpiloto']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idpiloto']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpiloto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpiloto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_piloto_line" id="hidden_field_data_piloto" style="<?php echo $sStyleHidden_piloto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_piloto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_piloto_label"><span id="id_label_piloto"><?php echo $this->nm_new_label['piloto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["piloto"]) &&  $this->nmgp_cmp_readonly["piloto"] == "on") { 

 ?>
<input type="hidden" name="piloto" value="<?php echo $this->form_encode_input($piloto) . "\">" . $piloto . ""; ?>
<?php } else { ?>
<span id="id_read_on_piloto" class="sc-ui-readonly-piloto css_piloto_line" style="<?php echo $sStyleReadLab_piloto; ?>"><?php echo $this->piloto; ?></span><span id="id_read_off_piloto" class="css_read_off_piloto" style="white-space: nowrap;<?php echo $sStyleReadInp_piloto; ?>">
 <input class="sc-js-input scFormObjectOdd css_piloto_obj" style="" id="id_sc_field_piloto" type=text name="piloto" value="<?php echo $this->form_encode_input($piloto) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_piloto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_piloto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_idcabezal_line" id="hidden_field_data_idcabezal" style="<?php echo $sStyleHidden_idcabezal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcabezal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idcabezal_label"><span id="id_label_idcabezal"><?php echo $this->nm_new_label['idcabezal']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idcabezal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idcabezal'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->nm_clear_val("idcabezal");

   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = " . substr($this->Db->qstr($this->idcabezal), 1, -1) . " ORDER BY placa";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$unformatted_value_idcabezal])) ? $aLookup[0][$unformatted_value_idcabezal] : $this->idcabezal;
$idcabezal_look = (isset($aLookup[0][$unformatted_value_idcabezal])) ? $aLookup[0][$unformatted_value_idcabezal] : $this->idcabezal;
?>
<span id="id_read_on_idcabezal" class="sc-ui-readonly-idcabezal css_idcabezal_line" style="<?php echo $sStyleReadLab_idcabezal; ?>"><?php echo str_replace("<", "&lt;", $idcabezal_look); ?></span><span id="id_read_off_idcabezal" class="css_read_off_idcabezal" style="white-space: nowrap;<?php echo $sStyleReadInp_idcabezal; ?>">
 <input class="sc-js-input scFormObjectOdd css_idcabezal_obj" style="display: none;" id="id_sc_field_idcabezal" type=text name="idcabezal" value="<?php echo $this->form_encode_input($idcabezal) ?>"
 size=11 style="display: none" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idcabezal']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idcabezal']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idcabezal']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idcabezal'] = $this->idcabezal;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->nm_clear_val("idcabezal");

   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idcabezal, placa FROM cabezal WHERE idcabezal = " . substr($this->Db->qstr($this->idcabezal), 1, -1) . " ORDER BY placa";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idcabezal'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$unformatted_value_idcabezal])) ? $aLookup[0][$unformatted_value_idcabezal] : '';
$idcabezal_look = (isset($aLookup[0][$unformatted_value_idcabezal])) ? $aLookup[0][$unformatted_value_idcabezal] : '';
?>
<input type="text" id="id_ac_idcabezal" name="idcabezal_autocomp" class="scFormObjectOdd sc-ui-autocomp-idcabezal css_idcabezal_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idcabezal']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idcabezal']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idcabezal']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcabezal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcabezal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['chasis']) && $this->nmgp_cmp_readonly['chasis'] == 'on')
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

    <TD class="scFormDataOdd css_chasis_line" id="hidden_field_data_chasis" style="<?php echo $sStyleHidden_chasis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_chasis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_chasis_label"><span id="id_label_chasis"><?php echo $this->nm_new_label['chasis']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['chasis']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['chasis'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["chasis"]) &&  $this->nmgp_cmp_readonly["chasis"] == "on") { 

 ?>
<input type="hidden" name="chasis" value="<?php echo $this->form_encode_input($chasis) . "\">" . $chasis . ""; ?>
<?php } else { ?>
<span id="id_read_on_chasis" class="sc-ui-readonly-chasis css_chasis_line" style="<?php echo $sStyleReadLab_chasis; ?>"><?php echo $this->chasis; ?></span><span id="id_read_off_chasis" class="css_read_off_chasis" style="white-space: nowrap;<?php echo $sStyleReadInp_chasis; ?>">
 <input class="sc-js-input scFormObjectOdd css_chasis_obj" style="" id="id_sc_field_chasis" type=text name="chasis" value="<?php echo $this->form_encode_input($chasis) ?>"
 size=12 maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_chasis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_chasis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
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

    <TD class="scFormDataOdd css_idselectivo_line" id="hidden_field_data_idselectivo" style="<?php echo $sStyleHidden_idselectivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idselectivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idselectivo_label"><span id="id_label_idselectivo"><?php echo $this->nm_new_label['idselectivo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idselectivo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idselectivo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idselectivo"]) &&  $this->nmgp_cmp_readonly["idselectivo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idselectivo, selectivo  FROM selectivo  ORDER BY selectivo";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idselectivo'][] = ''; 
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





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_idnaviera_line" id="hidden_field_data_idnaviera" style="<?php echo $sStyleHidden_idnaviera; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idnaviera_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idnaviera_label"><span id="id_label_idnaviera"><?php echo $this->nm_new_label['idnaviera']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idnaviera']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idnaviera'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idnaviera"]) &&  $this->nmgp_cmp_readonly["idnaviera"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idNaviera, naviera  FROM naviera  ORDER BY naviera";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idnaviera'][] = ''; 
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
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contenedorexport']))
    {
        $this->nm_new_label['contenedorexport'] = "CONTENEDOR EXPORT";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contenedorexport = $this->contenedorexport;
   $sStyleHidden_contenedorexport = '';
   if (isset($this->nmgp_cmp_hidden['contenedorexport']) && $this->nmgp_cmp_hidden['contenedorexport'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contenedorexport']);
       $sStyleHidden_contenedorexport = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contenedorexport = 'display: none;';
   $sStyleReadInp_contenedorexport = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contenedorexport']) && $this->nmgp_cmp_readonly['contenedorexport'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contenedorexport']);
       $sStyleReadLab_contenedorexport = '';
       $sStyleReadInp_contenedorexport = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contenedorexport']) && $this->nmgp_cmp_hidden['contenedorexport'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contenedorexport" value="<?php echo $this->form_encode_input($contenedorexport) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contenedorexport_line" id="hidden_field_data_contenedorexport" style="<?php echo $sStyleHidden_contenedorexport; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contenedorexport_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contenedorexport_label"><span id="id_label_contenedorexport"><?php echo $this->nm_new_label['contenedorexport']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contenedorexport"]) &&  $this->nmgp_cmp_readonly["contenedorexport"] == "on") { 

 ?>
<input type="hidden" name="contenedorexport" value="<?php echo $this->form_encode_input($contenedorexport) . "\">" . $contenedorexport . ""; ?>
<?php } else { ?>
<span id="id_read_on_contenedorexport" class="sc-ui-readonly-contenedorexport css_contenedorexport_line" style="<?php echo $sStyleReadLab_contenedorexport; ?>"><?php echo $this->contenedorexport; ?></span><span id="id_read_off_contenedorexport" class="css_read_off_contenedorexport" style="white-space: nowrap;<?php echo $sStyleReadInp_contenedorexport; ?>">
 <input class="sc-js-input scFormObjectOdd css_contenedorexport_obj" style="" id="id_sc_field_contenedorexport" type=text name="contenedorexport" value="<?php echo $this->form_encode_input($contenedorexport) ?>"
 size=12 maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contenedorexport_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contenedorexport_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contenedorimport']))
    {
        $this->nm_new_label['contenedorimport'] = "CONTENEDOR IMPORT";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contenedorimport = $this->contenedorimport;
   $sStyleHidden_contenedorimport = '';
   if (isset($this->nmgp_cmp_hidden['contenedorimport']) && $this->nmgp_cmp_hidden['contenedorimport'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contenedorimport']);
       $sStyleHidden_contenedorimport = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contenedorimport = 'display: none;';
   $sStyleReadInp_contenedorimport = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contenedorimport']) && $this->nmgp_cmp_readonly['contenedorimport'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contenedorimport']);
       $sStyleReadLab_contenedorimport = '';
       $sStyleReadInp_contenedorimport = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contenedorimport']) && $this->nmgp_cmp_hidden['contenedorimport'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contenedorimport" value="<?php echo $this->form_encode_input($contenedorimport) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contenedorimport_line" id="hidden_field_data_contenedorimport" style="<?php echo $sStyleHidden_contenedorimport; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contenedorimport_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contenedorimport_label"><span id="id_label_contenedorimport"><?php echo $this->nm_new_label['contenedorimport']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contenedorimport"]) &&  $this->nmgp_cmp_readonly["contenedorimport"] == "on") { 

 ?>
<input type="hidden" name="contenedorimport" value="<?php echo $this->form_encode_input($contenedorimport) . "\">" . $contenedorimport . ""; ?>
<?php } else { ?>
<span id="id_read_on_contenedorimport" class="sc-ui-readonly-contenedorimport css_contenedorimport_line" style="<?php echo $sStyleReadLab_contenedorimport; ?>"><?php echo $this->contenedorimport; ?></span><span id="id_read_off_contenedorimport" class="css_read_off_contenedorimport" style="white-space: nowrap;<?php echo $sStyleReadInp_contenedorimport; ?>">
 <input class="sc-js-input scFormObjectOdd css_contenedorimport_obj" style="" id="id_sc_field_contenedorimport" type=text name="contenedorimport" value="<?php echo $this->form_encode_input($contenedorimport) ?>"
 size=12 maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contenedorimport_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contenedorimport_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_idtipodecarga_line" id="hidden_field_data_idtipodecarga" style="<?php echo $sStyleHidden_idtipodecarga; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idtipodecarga_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idtipodecarga_label"><span id="id_label_idtipodecarga"><?php echo $this->nm_new_label['idtipodecarga']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idtipodecarga']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['php_cmp_required']['idtipodecarga'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idtipodecarga"]) &&  $this->nmgp_cmp_readonly["idtipodecarga"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idtipodecarga, descripcion  FROM tipodecarga  ORDER BY descripcion";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idtipodecarga'][] = ''; 
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





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idviaje']))
    {
        $this->nm_new_label['idviaje'] = "BUQUE Y VIAJE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idviaje = $this->idviaje;
   $sStyleHidden_idviaje = '';
   if (isset($this->nmgp_cmp_hidden['idviaje']) && $this->nmgp_cmp_hidden['idviaje'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idviaje']);
       $sStyleHidden_idviaje = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idviaje = 'display: none;';
   $sStyleReadInp_idviaje = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idviaje']) && $this->nmgp_cmp_readonly['idviaje'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idviaje']);
       $sStyleReadLab_idviaje = '';
       $sStyleReadInp_idviaje = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idviaje']) && $this->nmgp_cmp_hidden['idviaje'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idviaje" value="<?php echo $this->form_encode_input($idviaje) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idviaje_line" id="hidden_field_data_idviaje" style="<?php echo $sStyleHidden_idviaje; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idviaje_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idviaje_label"><span id="id_label_idviaje"><?php echo $this->nm_new_label['idviaje']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idviaje"]) &&  $this->nmgp_cmp_readonly["idviaje"] == "on") { 

 ?>
<input type="hidden" name="idviaje" value="<?php echo $this->form_encode_input($idviaje) . "\">" . $idviaje . ""; ?>
<?php } else { ?>

<?php
$aRecData['idviaje'] = $this->idviaje;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idviaje, viaje FROM viaje WHERE (idestado=1) AND idviaje = " . substr($this->Db->qstr($this->idviaje), 1, -1) . " ORDER BY viaje";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   if ('' != $this->idviaje)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idviaje])) ? $aLookup[0][$this->idviaje] : $this->idviaje;
$idviaje_look = (isset($aLookup[0][$this->idviaje])) ? $aLookup[0][$this->idviaje] : $this->idviaje;
?>
<span id="id_read_on_idviaje" class="sc-ui-readonly-idviaje css_idviaje_line" style="<?php echo $sStyleReadLab_idviaje; ?>"><?php echo str_replace("<", "&lt;", $idviaje_look); ?></span><span id="id_read_off_idviaje" class="css_read_off_idviaje" style="white-space: nowrap;<?php echo $sStyleReadInp_idviaje; ?>">
 <input class="sc-js-input scFormObjectOdd css_idviaje_obj" style="display: none;" id="id_sc_field_idviaje" type=text name="idviaje" value="<?php echo $this->form_encode_input($idviaje) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idviaje'] = $this->idviaje;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje'] = array(); 
    }

   $old_value_fechainicio = $this->fechainicio;
   $old_value_fechainicio_hora = $this->fechainicio_hora;
   $old_value_idpiloto = $this->idpiloto;
   $old_value_idcabezal = $this->idcabezal;
   $old_value_idyarda = $this->idyarda;
   $old_value_turno = $this->turno;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechainicio = $this->fechainicio;
   $unformatted_value_fechainicio_hora = $this->fechainicio_hora;
   $unformatted_value_idpiloto = $this->idpiloto;
   $unformatted_value_idcabezal = $this->idcabezal;
   $unformatted_value_idyarda = $this->idyarda;
   $unformatted_value_turno = $this->turno;

   $nm_comando = "SELECT idviaje, viaje FROM viaje WHERE (idestado=1) AND idviaje = " . substr($this->Db->qstr($this->idviaje), 1, -1) . " ORDER BY viaje";

   $this->fechainicio = $old_value_fechainicio;
   $this->fechainicio_hora = $old_value_fechainicio_hora;
   $this->idpiloto = $old_value_idpiloto;
   $this->idcabezal = $old_value_idcabezal;
   $this->idyarda = $old_value_idyarda;
   $this->turno = $old_value_turno;

   if ('' != $this->idviaje)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['Lookup_idviaje'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idviaje])) ? $aLookup[0][$this->idviaje] : '';
$idviaje_look = (isset($aLookup[0][$this->idviaje])) ? $aLookup[0][$this->idviaje] : '';
?>
<input type="text" id="id_ac_idviaje" name="idviaje_autocomp" class="scFormObjectOdd sc-ui-autocomp-idviaje css_idviaje_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idviaje_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idviaje_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idyarda']))
    {
        $this->nm_new_label['idyarda'] = "Yarda";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idyarda = $this->idyarda;
   if (!isset($this->nmgp_cmp_hidden['idyarda']))
   {
       $this->nmgp_cmp_hidden['idyarda'] = 'off';
   }
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
<?php if (isset($this->nmgp_cmp_hidden['idyarda']) && $this->nmgp_cmp_hidden['idyarda'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idyarda" value="<?php echo $this->form_encode_input($idyarda) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idyarda_line" id="hidden_field_data_idyarda" style="<?php echo $sStyleHidden_idyarda; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idyarda_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idyarda_label"><span id="id_label_idyarda"><?php echo $this->nm_new_label['idyarda']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idyarda"]) &&  $this->nmgp_cmp_readonly["idyarda"] == "on") { 

 ?>
<input type="hidden" name="idyarda" value="<?php echo $this->form_encode_input($idyarda) . "\">" . $idyarda . ""; ?>
<?php } else { ?>
<span id="id_read_on_idyarda" class="sc-ui-readonly-idyarda css_idyarda_line" style="<?php echo $sStyleReadLab_idyarda; ?>"><?php echo $this->idyarda; ?></span><span id="id_read_off_idyarda" class="css_read_off_idyarda" style="white-space: nowrap;<?php echo $sStyleReadInp_idyarda; ?>">
 <input class="sc-js-input scFormObjectOdd css_idyarda_obj" style="" id="id_sc_field_idyarda" type=text name="idyarda" value="<?php echo $this->form_encode_input($idyarda) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idyarda']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idyarda']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idyarda']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idyarda_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idyarda_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['atc_ingreso']))
    {
        $this->nm_new_label['atc_ingreso'] = "Atc Ingreso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $atc_ingreso = $this->atc_ingreso;
   if (!isset($this->nmgp_cmp_hidden['atc_ingreso']))
   {
       $this->nmgp_cmp_hidden['atc_ingreso'] = 'off';
   }
   $sStyleHidden_atc_ingreso = '';
   if (isset($this->nmgp_cmp_hidden['atc_ingreso']) && $this->nmgp_cmp_hidden['atc_ingreso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['atc_ingreso']);
       $sStyleHidden_atc_ingreso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_atc_ingreso = 'display: none;';
   $sStyleReadInp_atc_ingreso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['atc_ingreso']) && $this->nmgp_cmp_readonly['atc_ingreso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['atc_ingreso']);
       $sStyleReadLab_atc_ingreso = '';
       $sStyleReadInp_atc_ingreso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['atc_ingreso']) && $this->nmgp_cmp_hidden['atc_ingreso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="atc_ingreso" value="<?php echo $this->form_encode_input($atc_ingreso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_atc_ingreso_line" id="hidden_field_data_atc_ingreso" style="<?php echo $sStyleHidden_atc_ingreso; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_atc_ingreso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_atc_ingreso_label"><span id="id_label_atc_ingreso"><?php echo $this->nm_new_label['atc_ingreso']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["atc_ingreso"]) &&  $this->nmgp_cmp_readonly["atc_ingreso"] == "on") { 

 ?>
<input type="hidden" name="atc_ingreso" value="<?php echo $this->form_encode_input($atc_ingreso) . "\">" . $atc_ingreso . ""; ?>
<?php } else { ?>
<span id="id_read_on_atc_ingreso" class="sc-ui-readonly-atc_ingreso css_atc_ingreso_line" style="<?php echo $sStyleReadLab_atc_ingreso; ?>"><?php echo $this->atc_ingreso; ?></span><span id="id_read_off_atc_ingreso" class="css_read_off_atc_ingreso" style="white-space: nowrap;<?php echo $sStyleReadInp_atc_ingreso; ?>">
 <input class="sc-js-input scFormObjectOdd css_atc_ingreso_obj" style="" id="id_sc_field_atc_ingreso" type=text name="atc_ingreso" value="<?php echo $this->form_encode_input($atc_ingreso) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_atc_ingreso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_atc_ingreso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['marchamo_ingreso']))
    {
        $this->nm_new_label['marchamo_ingreso'] = "Marchamo Ingreso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $marchamo_ingreso = $this->marchamo_ingreso;
   if (!isset($this->nmgp_cmp_hidden['marchamo_ingreso']))
   {
       $this->nmgp_cmp_hidden['marchamo_ingreso'] = 'off';
   }
   $sStyleHidden_marchamo_ingreso = '';
   if (isset($this->nmgp_cmp_hidden['marchamo_ingreso']) && $this->nmgp_cmp_hidden['marchamo_ingreso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['marchamo_ingreso']);
       $sStyleHidden_marchamo_ingreso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_marchamo_ingreso = 'display: none;';
   $sStyleReadInp_marchamo_ingreso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['marchamo_ingreso']) && $this->nmgp_cmp_readonly['marchamo_ingreso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['marchamo_ingreso']);
       $sStyleReadLab_marchamo_ingreso = '';
       $sStyleReadInp_marchamo_ingreso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['marchamo_ingreso']) && $this->nmgp_cmp_hidden['marchamo_ingreso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="marchamo_ingreso" value="<?php echo $this->form_encode_input($marchamo_ingreso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_marchamo_ingreso_line" id="hidden_field_data_marchamo_ingreso" style="<?php echo $sStyleHidden_marchamo_ingreso; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_marchamo_ingreso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_marchamo_ingreso_label"><span id="id_label_marchamo_ingreso"><?php echo $this->nm_new_label['marchamo_ingreso']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["marchamo_ingreso"]) &&  $this->nmgp_cmp_readonly["marchamo_ingreso"] == "on") { 

 ?>
<input type="hidden" name="marchamo_ingreso" value="<?php echo $this->form_encode_input($marchamo_ingreso) . "\">" . $marchamo_ingreso . ""; ?>
<?php } else { ?>
<span id="id_read_on_marchamo_ingreso" class="sc-ui-readonly-marchamo_ingreso css_marchamo_ingreso_line" style="<?php echo $sStyleReadLab_marchamo_ingreso; ?>"><?php echo $this->marchamo_ingreso; ?></span><span id="id_read_off_marchamo_ingreso" class="css_read_off_marchamo_ingreso" style="white-space: nowrap;<?php echo $sStyleReadInp_marchamo_ingreso; ?>">
 <input class="sc-js-input scFormObjectOdd css_marchamo_ingreso_obj" style="" id="id_sc_field_marchamo_ingreso" type=text name="marchamo_ingreso" value="<?php echo $this->form_encode_input($marchamo_ingreso) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_marchamo_ingreso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_marchamo_ingreso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['atc_despacho']))
    {
        $this->nm_new_label['atc_despacho'] = "Atc Despacho";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $atc_despacho = $this->atc_despacho;
   if (!isset($this->nmgp_cmp_hidden['atc_despacho']))
   {
       $this->nmgp_cmp_hidden['atc_despacho'] = 'off';
   }
   $sStyleHidden_atc_despacho = '';
   if (isset($this->nmgp_cmp_hidden['atc_despacho']) && $this->nmgp_cmp_hidden['atc_despacho'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['atc_despacho']);
       $sStyleHidden_atc_despacho = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_atc_despacho = 'display: none;';
   $sStyleReadInp_atc_despacho = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['atc_despacho']) && $this->nmgp_cmp_readonly['atc_despacho'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['atc_despacho']);
       $sStyleReadLab_atc_despacho = '';
       $sStyleReadInp_atc_despacho = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['atc_despacho']) && $this->nmgp_cmp_hidden['atc_despacho'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="atc_despacho" value="<?php echo $this->form_encode_input($atc_despacho) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_atc_despacho_line" id="hidden_field_data_atc_despacho" style="<?php echo $sStyleHidden_atc_despacho; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_atc_despacho_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_atc_despacho_label"><span id="id_label_atc_despacho"><?php echo $this->nm_new_label['atc_despacho']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["atc_despacho"]) &&  $this->nmgp_cmp_readonly["atc_despacho"] == "on") { 

 ?>
<input type="hidden" name="atc_despacho" value="<?php echo $this->form_encode_input($atc_despacho) . "\">" . $atc_despacho . ""; ?>
<?php } else { ?>
<span id="id_read_on_atc_despacho" class="sc-ui-readonly-atc_despacho css_atc_despacho_line" style="<?php echo $sStyleReadLab_atc_despacho; ?>"><?php echo $this->atc_despacho; ?></span><span id="id_read_off_atc_despacho" class="css_read_off_atc_despacho" style="white-space: nowrap;<?php echo $sStyleReadInp_atc_despacho; ?>">
 <input class="sc-js-input scFormObjectOdd css_atc_despacho_obj" style="" id="id_sc_field_atc_despacho" type=text name="atc_despacho" value="<?php echo $this->form_encode_input($atc_despacho) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_atc_despacho_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_atc_despacho_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['marchamo_despacho']))
    {
        $this->nm_new_label['marchamo_despacho'] = "Marchamo Despacho";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $marchamo_despacho = $this->marchamo_despacho;
   if (!isset($this->nmgp_cmp_hidden['marchamo_despacho']))
   {
       $this->nmgp_cmp_hidden['marchamo_despacho'] = 'off';
   }
   $sStyleHidden_marchamo_despacho = '';
   if (isset($this->nmgp_cmp_hidden['marchamo_despacho']) && $this->nmgp_cmp_hidden['marchamo_despacho'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['marchamo_despacho']);
       $sStyleHidden_marchamo_despacho = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_marchamo_despacho = 'display: none;';
   $sStyleReadInp_marchamo_despacho = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['marchamo_despacho']) && $this->nmgp_cmp_readonly['marchamo_despacho'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['marchamo_despacho']);
       $sStyleReadLab_marchamo_despacho = '';
       $sStyleReadInp_marchamo_despacho = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['marchamo_despacho']) && $this->nmgp_cmp_hidden['marchamo_despacho'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="marchamo_despacho" value="<?php echo $this->form_encode_input($marchamo_despacho) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_marchamo_despacho_line" id="hidden_field_data_marchamo_despacho" style="<?php echo $sStyleHidden_marchamo_despacho; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_marchamo_despacho_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_marchamo_despacho_label"><span id="id_label_marchamo_despacho"><?php echo $this->nm_new_label['marchamo_despacho']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["marchamo_despacho"]) &&  $this->nmgp_cmp_readonly["marchamo_despacho"] == "on") { 

 ?>
<input type="hidden" name="marchamo_despacho" value="<?php echo $this->form_encode_input($marchamo_despacho) . "\">" . $marchamo_despacho . ""; ?>
<?php } else { ?>
<span id="id_read_on_marchamo_despacho" class="sc-ui-readonly-marchamo_despacho css_marchamo_despacho_line" style="<?php echo $sStyleReadLab_marchamo_despacho; ?>"><?php echo $this->marchamo_despacho; ?></span><span id="id_read_off_marchamo_despacho" class="css_read_off_marchamo_despacho" style="white-space: nowrap;<?php echo $sStyleReadInp_marchamo_despacho; ?>">
 <input class="sc-js-input scFormObjectOdd css_marchamo_despacho_obj" style="" id="id_sc_field_marchamo_despacho" type=text name="marchamo_despacho" value="<?php echo $this->form_encode_input($marchamo_despacho) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_marchamo_despacho_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_marchamo_despacho_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['turno']))
    {
        $this->nm_new_label['turno'] = "Turno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $turno = $this->turno;
   if (!isset($this->nmgp_cmp_hidden['turno']))
   {
       $this->nmgp_cmp_hidden['turno'] = 'off';
   }
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

    <TD class="scFormDataOdd css_turno_line" id="hidden_field_data_turno" style="<?php echo $sStyleHidden_turno; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_turno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_turno_label"><span id="id_label_turno"><?php echo $this->nm_new_label['turno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["turno"]) &&  $this->nmgp_cmp_readonly["turno"] == "on") { 

 ?>
<input type="hidden" name="turno" value="<?php echo $this->form_encode_input($turno) . "\">" . $turno . ""; ?>
<?php } else { ?>
<span id="id_read_on_turno" class="sc-ui-readonly-turno css_turno_line" style="<?php echo $sStyleReadLab_turno; ?>"><?php echo $this->turno; ?></span><span id="id_read_off_turno" class="css_read_off_turno" style="white-space: nowrap;<?php echo $sStyleReadInp_turno; ?>">
 <input class="sc-js-input scFormObjectOdd css_turno_obj" style="" id="id_sc_field_turno" type=text name="turno" value="<?php echo $this->form_encode_input($turno) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['turno']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['turno']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['turno']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_turno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_turno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['run_iframe'] != "R")
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_cita_2_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cita_2_mob");
 parent.scAjaxDetailHeight("form_cita_2_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cita_2_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cita_2_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['sc_modal'])
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
		if ($("#sc_b_new_t.sc-unique-btn-4").length && $("#sc_b_new_t.sc-unique-btn-4").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-5").length && $("#sc_b_ins_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
		if ($("#sc_b_new_b.sc-unique-btn-6").length && $("#sc_b_new_b.sc-unique-btn-6").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-7").length && $("#sc_b_ins_b.sc-unique-btn-7").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_b.sc-unique-btn-3").length && $("#sc_b_sai_b.sc-unique-btn-3").is(":visible")) {
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita_2_mob']['buttonStatus'] = $this->nmgp_botoes;
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
