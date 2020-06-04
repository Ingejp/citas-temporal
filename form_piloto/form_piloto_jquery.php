
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
  scEventControl_data["licencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dpi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["huella" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtransporte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpiloto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpiloto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["licencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["licencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dpi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dpi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["huella" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["huella" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtransporte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtransporte" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtransporte" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("licencia" + iSeq == fieldName) {
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
  $('#id_sc_field_idpiloto' + iSeqRow).bind('blur', function() { sc_form_piloto_idpiloto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_piloto_idpiloto_onfocus(this, iSeqRow) });
  $('#id_sc_field_licencia' + iSeqRow).bind('blur', function() { sc_form_piloto_licencia_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_piloto_licencia_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_piloto_licencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_form_piloto_nombre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_piloto_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_dpi' + iSeqRow).bind('blur', function() { sc_form_piloto_dpi_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_piloto_dpi_onfocus(this, iSeqRow) });
  $('#id_sc_field_huella' + iSeqRow).bind('blur', function() { sc_form_piloto_huella_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_piloto_huella_onfocus(this, iSeqRow) });
  $('#id_sc_field_foto' + iSeqRow).bind('blur', function() { sc_form_piloto_foto_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_piloto_foto_onfocus(this, iSeqRow) });
  $('#id_sc_field_idtransporte' + iSeqRow).bind('blur', function() { sc_form_piloto_idtransporte_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_piloto_idtransporte_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_piloto_idpiloto_onblur(oThis, iSeqRow) {
  do_ajax_form_piloto_validate_idpiloto();
  scCssBlur(oThis);
}

function sc_form_piloto_idpiloto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_piloto_licencia_onblur(oThis, iSeqRow) {
  do_ajax_form_piloto_validate_licencia();
  scCssBlur(oThis);
}

function sc_form_piloto_licencia_onchange(oThis, iSeqRow) {
  do_ajax_form_piloto_event_licencia_onchange();
}

function sc_form_piloto_licencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_piloto_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_piloto_validate_nombre();
  scCssBlur(oThis);
}

function sc_form_piloto_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_piloto_dpi_onblur(oThis, iSeqRow) {
  do_ajax_form_piloto_validate_dpi();
  scCssBlur(oThis);
}

function sc_form_piloto_dpi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_piloto_huella_onblur(oThis, iSeqRow) {
  do_ajax_form_piloto_validate_huella();
  scCssBlur(oThis);
}

function sc_form_piloto_huella_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_piloto_foto_onblur(oThis, iSeqRow) {
  do_ajax_form_piloto_validate_foto();
  scCssBlur(oThis);
}

function sc_form_piloto_foto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_piloto_idtransporte_onblur(oThis, iSeqRow) {
  do_ajax_form_piloto_validate_idtransporte();
  scCssBlur(oThis);
}

function sc_form_piloto_idtransporte_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idpiloto", "", status);
	displayChange_field("licencia", "", status);
	displayChange_field("nombre", "", status);
	displayChange_field("dpi", "", status);
	displayChange_field("huella", "", status);
	displayChange_field("foto", "", status);
	displayChange_field("idtransporte", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpiloto(row, status);
	displayChange_field_licencia(row, status);
	displayChange_field_nombre(row, status);
	displayChange_field_dpi(row, status);
	displayChange_field_huella(row, status);
	displayChange_field_foto(row, status);
	displayChange_field_idtransporte(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpiloto" == field) {
		displayChange_field_idpiloto(row, status);
	}
	if ("licencia" == field) {
		displayChange_field_licencia(row, status);
	}
	if ("nombre" == field) {
		displayChange_field_nombre(row, status);
	}
	if ("dpi" == field) {
		displayChange_field_dpi(row, status);
	}
	if ("huella" == field) {
		displayChange_field_huella(row, status);
	}
	if ("foto" == field) {
		displayChange_field_foto(row, status);
	}
	if ("idtransporte" == field) {
		displayChange_field_idtransporte(row, status);
	}
}

function displayChange_field_idpiloto(row, status) {
}

function displayChange_field_licencia(row, status) {
}

function displayChange_field_nombre(row, status) {
}

function displayChange_field_dpi(row, status) {
}

function displayChange_field_huella(row, status) {
}

function displayChange_field_foto(row, status) {
}

function displayChange_field_idtransporte(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_piloto_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(19);
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

