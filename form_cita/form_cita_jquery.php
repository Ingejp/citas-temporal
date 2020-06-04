
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["idpiloto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcontenedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcabezal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechainicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_cita" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idnaviera" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtipodecarga" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numcontenedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpiloto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpiloto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcontenedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcontenedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechainicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechainicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_cita" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_cita" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idnaviera" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idnaviera" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtipodecarga" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtipodecarga" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numcontenedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcontenedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idnaviera" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idcontenedor" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idpiloto" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idtipodecarga" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idestado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idcontenedor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idcabezal" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idpiloto" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idtipodecarga" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_codigo_cita' + iSeqRow).bind('blur', function() { sc_form_cita_codigo_cita_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cita_codigo_cita_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_cita_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cita_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechainicio' + iSeqRow).bind('blur', function() { sc_form_cita_fechainicio_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cita_fechainicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechainicio_hora' + iSeqRow).bind('blur', function() { sc_form_cita_fechainicio_hora_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_cita_fechainicio_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_idnaviera' + iSeqRow).bind('blur', function() { sc_form_cita_idnaviera_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cita_idnaviera_onfocus(this, iSeqRow) });
  $('#id_sc_field_idtipodecarga' + iSeqRow).bind('blur', function() { sc_form_cita_idtipodecarga_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cita_idtipodecarga_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cita_idtipodecarga_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcontenedor' + iSeqRow).bind('blur', function() { sc_form_cita_idcontenedor_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cita_idcontenedor_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cita_idcontenedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_idpiloto' + iSeqRow).bind('blur', function() { sc_form_cita_idpiloto_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_cita_idpiloto_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cita_idpiloto_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcabezal' + iSeqRow).bind('blur', function() { sc_form_cita_idcabezal_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cita_idcabezal_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cita_idcabezal_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_cita_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cita_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_form_cita_nombre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cita_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_form_cita_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cita_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcontenedor' + iSeqRow).bind('blur', function() { sc_form_cita_numcontenedor_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cita_numcontenedor_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cita_codigo_cita_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_codigo_cita();
  scCssBlur(oThis);
}

function sc_form_cita_codigo_cita_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_cita_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_fechainicio_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_fechainicio();
  scCssBlur(oThis);
}

function sc_form_cita_fechainicio_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_fechainicio();
  scCssBlur(oThis);
}

function sc_form_cita_fechainicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_fechainicio_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_idnaviera_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_idnaviera();
  scCssBlur(oThis);
}

function sc_form_cita_idnaviera_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_cita_idtipodecarga_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_idtipodecarga();
  scCssBlur(oThis);
}

function sc_form_cita_idtipodecarga_onchange(oThis, iSeqRow) {
  do_ajax_form_cita_event_idtipodecarga_onchange();
}

function sc_form_cita_idtipodecarga_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_idcontenedor_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_idcontenedor();
  scCssBlur(oThis);
}

function sc_form_cita_idcontenedor_onchange(oThis, iSeqRow) {
  do_ajax_form_cita_event_idcontenedor_onchange();
}

function sc_form_cita_idcontenedor_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_cita_idpiloto_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_idpiloto();
  scCssBlur(oThis);
}

function sc_form_cita_idpiloto_onchange(oThis, iSeqRow) {
  do_ajax_form_cita_event_idpiloto_onchange();
}

function sc_form_cita_idpiloto_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_cita_idcabezal_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_idcabezal();
  scCssBlur(oThis);
}

function sc_form_cita_idcabezal_onchange(oThis, iSeqRow) {
  do_ajax_form_cita_event_idcabezal_onchange();
}

function sc_form_cita_idcabezal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_cita_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_cita_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_nombre();
  scCssBlur(oThis);
}

function sc_form_cita_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_form_cita_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_numcontenedor_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_validate_numcontenedor();
  scCssBlur(oThis);
}

function sc_form_cita_numcontenedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
	if ("3" == block) {
		displayChange_block_3(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idpiloto", "", status);
	displayChange_field("sc_field_1", "", status);
	displayChange_field("idcontenedor", "", status);
	displayChange_field("idcabezal", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("fechainicio", "", status);
	displayChange_field("codigo_cita", "", status);
	displayChange_field("idnaviera", "", status);
	displayChange_field("idtipodecarga", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("descripcion", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("numcontenedor", "", status);
	displayChange_field("sc_field_0", "", status);
	displayChange_field("nombre", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpiloto(row, status);
	displayChange_field_sc_field_1(row, status);
	displayChange_field_idcontenedor(row, status);
	displayChange_field_idcabezal(row, status);
	displayChange_field_fechainicio(row, status);
	displayChange_field_codigo_cita(row, status);
	displayChange_field_idnaviera(row, status);
	displayChange_field_idtipodecarga(row, status);
	displayChange_field_descripcion(row, status);
	displayChange_field_numcontenedor(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_nombre(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpiloto" == field) {
		displayChange_field_idpiloto(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("idcontenedor" == field) {
		displayChange_field_idcontenedor(row, status);
	}
	if ("idcabezal" == field) {
		displayChange_field_idcabezal(row, status);
	}
	if ("fechainicio" == field) {
		displayChange_field_fechainicio(row, status);
	}
	if ("codigo_cita" == field) {
		displayChange_field_codigo_cita(row, status);
	}
	if ("idnaviera" == field) {
		displayChange_field_idnaviera(row, status);
	}
	if ("idtipodecarga" == field) {
		displayChange_field_idtipodecarga(row, status);
	}
	if ("descripcion" == field) {
		displayChange_field_descripcion(row, status);
	}
	if ("numcontenedor" == field) {
		displayChange_field_numcontenedor(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("nombre" == field) {
		displayChange_field_nombre(row, status);
	}
}

function displayChange_field_idpiloto(row, status) {
}

function displayChange_field_sc_field_1(row, status) {
}

function displayChange_field_idcontenedor(row, status) {
}

function displayChange_field_idcabezal(row, status) {
}

function displayChange_field_fechainicio(row, status) {
}

function displayChange_field_codigo_cita(row, status) {
}

function displayChange_field_idnaviera(row, status) {
}

function displayChange_field_idtipodecarga(row, status) {
}

function displayChange_field_descripcion(row, status) {
}

function displayChange_field_numcontenedor(row, status) {
}

function displayChange_field_sc_field_0(row, status) {
}

function displayChange_field_nombre(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_cita_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(17);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fechainicio" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechainicio" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechainicio']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechainicio']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_cita_validate_fechainicio(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechainicio']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        info.css({
          top: trigger.position().top - (info.height() - trigger.height()),
          left: trigger.position().left - ((info.width() - trigger.width()) / 2),
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

