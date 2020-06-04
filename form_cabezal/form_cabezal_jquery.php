
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
  scEventControl_data["idcabezal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["placa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtransporte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idcabezal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtransporte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtransporte" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("placa" + iSeq == fieldName) {
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
  $('#id_sc_field_idcabezal' + iSeqRow).bind('blur', function() { sc_form_cabezal_idcabezal_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cabezal_idcabezal_onfocus(this, iSeqRow) });
  $('#id_sc_field_placa' + iSeqRow).bind('blur', function() { sc_form_cabezal_placa_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_cabezal_placa_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cabezal_placa_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_cabezal_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cabezal_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_idtransporte' + iSeqRow).bind('blur', function() { sc_form_cabezal_idtransporte_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cabezal_idtransporte_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cabezal_idcabezal_onblur(oThis, iSeqRow) {
  do_ajax_form_cabezal_validate_idcabezal();
  scCssBlur(oThis);
}

function sc_form_cabezal_idcabezal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cabezal_placa_onblur(oThis, iSeqRow) {
  do_ajax_form_cabezal_validate_placa();
  scCssBlur(oThis);
}

function sc_form_cabezal_placa_onchange(oThis, iSeqRow) {
  do_ajax_form_cabezal_event_placa_onchange();
}

function sc_form_cabezal_placa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cabezal_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_cabezal_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_cabezal_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cabezal_idtransporte_onblur(oThis, iSeqRow) {
  do_ajax_form_cabezal_validate_idtransporte();
  scCssBlur(oThis);
}

function sc_form_cabezal_idtransporte_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idcabezal", "", status);
	displayChange_field("placa", "", status);
	displayChange_field("descripcion", "", status);
	displayChange_field("idtransporte", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idcabezal(row, status);
	displayChange_field_placa(row, status);
	displayChange_field_descripcion(row, status);
	displayChange_field_idtransporte(row, status);
}

function displayChange_field(field, row, status) {
	if ("idcabezal" == field) {
		displayChange_field_idcabezal(row, status);
	}
	if ("placa" == field) {
		displayChange_field_placa(row, status);
	}
	if ("descripcion" == field) {
		displayChange_field_descripcion(row, status);
	}
	if ("idtransporte" == field) {
		displayChange_field_idtransporte(row, status);
	}
}

function displayChange_field_idcabezal(row, status) {
}

function displayChange_field_placa(row, status) {
}

function displayChange_field_descripcion(row, status) {
}

function displayChange_field_idtransporte(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_cabezal_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(20);
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

