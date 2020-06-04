
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
  scEventControl_data["idgestor_aduanal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dpi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idgestor_aduanal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idgestor_aduanal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dpi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dpi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono2_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  $('#id_sc_field_idgestor_aduanal_' + iSeqRow).bind('blur', function() { sc_form_gestor_aduanal_idgestor_aduanal__onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_gestor_aduanal_idgestor_aduanal__onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_gestor_aduanal_idgestor_aduanal__onfocus(this, iSeqRow) });
  $('#id_sc_field_dpi_' + iSeqRow).bind('blur', function() { sc_form_gestor_aduanal_dpi__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_gestor_aduanal_dpi__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_gestor_aduanal_dpi__onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_' + iSeqRow).bind('blur', function() { sc_form_gestor_aduanal_nombre__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_gestor_aduanal_nombre__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_gestor_aduanal_nombre__onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono1_' + iSeqRow).bind('blur', function() { sc_form_gestor_aduanal_telefono1__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_gestor_aduanal_telefono1__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_gestor_aduanal_telefono1__onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono2_' + iSeqRow).bind('blur', function() { sc_form_gestor_aduanal_telefono2__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_gestor_aduanal_telefono2__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_gestor_aduanal_telefono2__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_gestor_aduanal_idgestor_aduanal__onblur(oThis, iSeqRow) {
  do_ajax_form_gestor_aduanal_validate_idgestor_aduanal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_gestor_aduanal_idgestor_aduanal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_gestor_aduanal_idgestor_aduanal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_gestor_aduanal_dpi__onblur(oThis, iSeqRow) {
  do_ajax_form_gestor_aduanal_validate_dpi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_gestor_aduanal_dpi__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_gestor_aduanal_dpi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_gestor_aduanal_nombre__onblur(oThis, iSeqRow) {
  do_ajax_form_gestor_aduanal_validate_nombre_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_gestor_aduanal_nombre__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_gestor_aduanal_nombre__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_gestor_aduanal_telefono1__onblur(oThis, iSeqRow) {
  do_ajax_form_gestor_aduanal_validate_telefono1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_gestor_aduanal_telefono1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_gestor_aduanal_telefono1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_gestor_aduanal_telefono2__onblur(oThis, iSeqRow) {
  do_ajax_form_gestor_aduanal_validate_telefono2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_gestor_aduanal_telefono2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_gestor_aduanal_telefono2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idgestor_aduanal_", "", status);
	displayChange_field("dpi_", "", status);
	displayChange_field("nombre_", "", status);
	displayChange_field("telefono1_", "", status);
	displayChange_field("telefono2_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idgestor_aduanal_(row, status);
	displayChange_field_dpi_(row, status);
	displayChange_field_nombre_(row, status);
	displayChange_field_telefono1_(row, status);
	displayChange_field_telefono2_(row, status);
}

function displayChange_field(field, row, status) {
	if ("idgestor_aduanal_" == field) {
		displayChange_field_idgestor_aduanal_(row, status);
	}
	if ("dpi_" == field) {
		displayChange_field_dpi_(row, status);
	}
	if ("nombre_" == field) {
		displayChange_field_nombre_(row, status);
	}
	if ("telefono1_" == field) {
		displayChange_field_telefono1_(row, status);
	}
	if ("telefono2_" == field) {
		displayChange_field_telefono2_(row, status);
	}
}

function displayChange_field_idgestor_aduanal_(row, status) {
}

function displayChange_field_dpi_(row, status) {
}

function displayChange_field_nombre_(row, status) {
}

function displayChange_field_telefono1_(row, status) {
}

function displayChange_field_telefono2_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_gestor_aduanal_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
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

