
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
  scEventControl_data["turno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_cita" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["placa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coment" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["turno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["turno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_cita" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_cita" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coment" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coment" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("codigo_cita" + iSeq == fieldName) {
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
  $('#id_sc_field_codigo_cita' + iSeqRow).bind('blur', function() { sc_Modificar_Cita_codigo_cita_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_Modificar_Cita_codigo_cita_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_Modificar_Cita_codigo_cita_onfocus(this, iSeqRow) });
  $('#id_sc_field_placa' + iSeqRow).bind('blur', function() { sc_Modificar_Cita_placa_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_Modificar_Cita_placa_onfocus(this, iSeqRow) });
  $('#id_sc_field_turno' + iSeqRow).bind('blur', function() { sc_Modificar_Cita_turno_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_Modificar_Cita_turno_onfocus(this, iSeqRow) });
  $('#id_sc_field_coment' + iSeqRow).bind('blur', function() { sc_Modificar_Cita_coment_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_Modificar_Cita_coment_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_Modificar_Cita_codigo_cita_onblur(oThis, iSeqRow) {
  do_ajax_Modificar_Cita_validate_codigo_cita();
  scCssBlur(oThis);
}

function sc_Modificar_Cita_codigo_cita_onchange(oThis, iSeqRow) {
  do_ajax_Modificar_Cita_event_codigo_cita_onchange();
}

function sc_Modificar_Cita_codigo_cita_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Modificar_Cita_placa_onblur(oThis, iSeqRow) {
  do_ajax_Modificar_Cita_validate_placa();
  scCssBlur(oThis);
}

function sc_Modificar_Cita_placa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Modificar_Cita_turno_onblur(oThis, iSeqRow) {
  do_ajax_Modificar_Cita_validate_turno();
  scCssBlur(oThis);
}

function sc_Modificar_Cita_turno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Modificar_Cita_coment_onblur(oThis, iSeqRow) {
  do_ajax_Modificar_Cita_validate_coment();
  scCssBlur(oThis);
}

function sc_Modificar_Cita_coment_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("turno", "", status);
	displayChange_field("codigo_cita", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("placa", "", status);
	displayChange_field("coment", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_turno(row, status);
	displayChange_field_codigo_cita(row, status);
	displayChange_field_placa(row, status);
	displayChange_field_coment(row, status);
}

function displayChange_field(field, row, status) {
	if ("turno" == field) {
		displayChange_field_turno(row, status);
	}
	if ("codigo_cita" == field) {
		displayChange_field_codigo_cita(row, status);
	}
	if ("placa" == field) {
		displayChange_field_placa(row, status);
	}
	if ("coment" == field) {
		displayChange_field_coment(row, status);
	}
}

function displayChange_field_turno(row, status) {
}

function displayChange_field_codigo_cita(row, status) {
}

function displayChange_field_placa(row, status) {
}

function displayChange_field_coment(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_Modificar_Cita_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd
