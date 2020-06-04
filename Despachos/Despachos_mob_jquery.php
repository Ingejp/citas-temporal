
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
  scEventControl_data["codigo_cita" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["atc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["destino" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["placa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["chasis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["naviera" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contenedor_exp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contenedor_imp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcita" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["piloto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["viaje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigo_cita" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_cita" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["atc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["atc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["destino" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["destino" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["chasis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["chasis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["naviera" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["naviera" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contenedor_exp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contenedor_exp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contenedor_imp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contenedor_imp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcita" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcita" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["piloto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["piloto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["viaje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["viaje" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("destino" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
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
  $('#id_sc_field_codigo_cita' + iSeqRow).bind('blur', function() { sc_Despachos_codigo_cita_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_Despachos_codigo_cita_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_Despachos_codigo_cita_onfocus(this, iSeqRow) });
  $('#id_sc_field_placa' + iSeqRow).bind('blur', function() { sc_Despachos_placa_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_Despachos_placa_onfocus(this, iSeqRow) });
  $('#id_sc_field_chasis' + iSeqRow).bind('blur', function() { sc_Despachos_chasis_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_Despachos_chasis_onfocus(this, iSeqRow) });
  $('#id_sc_field_naviera' + iSeqRow).bind('blur', function() { sc_Despachos_naviera_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_Despachos_naviera_onfocus(this, iSeqRow) });
  $('#id_sc_field_contenedor_exp' + iSeqRow).bind('blur', function() { sc_Despachos_contenedor_exp_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_Despachos_contenedor_exp_onfocus(this, iSeqRow) });
  $('#id_sc_field_contenedor_imp' + iSeqRow).bind('blur', function() { sc_Despachos_contenedor_imp_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_Despachos_contenedor_imp_onfocus(this, iSeqRow) });
  $('#id_sc_field_atc' + iSeqRow).bind('blur', function() { sc_Despachos_atc_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_Despachos_atc_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_Despachos_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_Despachos_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcita' + iSeqRow).bind('blur', function() { sc_Despachos_idcita_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_Despachos_idcita_onfocus(this, iSeqRow) });
  $('#id_sc_field_destino' + iSeqRow).bind('blur', function() { sc_Despachos_destino_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_Despachos_destino_onfocus(this, iSeqRow) });
  $('#id_sc_field_piloto' + iSeqRow).bind('blur', function() { sc_Despachos_piloto_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_Despachos_piloto_onfocus(this, iSeqRow) });
  $('#id_sc_field_viaje' + iSeqRow).bind('blur', function() { sc_Despachos_viaje_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_Despachos_viaje_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_Despachos_codigo_cita_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_codigo_cita();
  scCssBlur(oThis);
}

function sc_Despachos_codigo_cita_onchange(oThis, iSeqRow) {
  do_ajax_Despachos_mob_event_codigo_cita_onchange();
}

function sc_Despachos_codigo_cita_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_placa_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_placa();
  scCssBlur(oThis);
}

function sc_Despachos_placa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_chasis_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_chasis();
  scCssBlur(oThis);
}

function sc_Despachos_chasis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_naviera_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_naviera();
  scCssBlur(oThis);
}

function sc_Despachos_naviera_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_contenedor_exp_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_contenedor_exp();
  scCssBlur(oThis);
}

function sc_Despachos_contenedor_exp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_contenedor_imp_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_contenedor_imp();
  scCssBlur(oThis);
}

function sc_Despachos_contenedor_imp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_atc_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_atc();
  scCssBlur(oThis);
}

function sc_Despachos_atc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_Despachos_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_idcita_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_idcita();
  scCssBlur(oThis);
}

function sc_Despachos_idcita_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_destino_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_destino();
  scCssBlur(oThis);
}

function sc_Despachos_destino_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_piloto_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_piloto();
  scCssBlur(oThis);
}

function sc_Despachos_piloto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Despachos_viaje_onblur(oThis, iSeqRow) {
  do_ajax_Despachos_mob_validate_viaje();
  scCssBlur(oThis);
}

function sc_Despachos_viaje_onfocus(oThis, iSeqRow) {
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
	displayChange_field("codigo_cita", "", status);
	displayChange_field("atc", "", status);
	displayChange_field("sc_field_0", "", status);
	displayChange_field("destino", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("placa", "", status);
	displayChange_field("chasis", "", status);
	displayChange_field("naviera", "", status);
	displayChange_field("contenedor_exp", "", status);
	displayChange_field("contenedor_imp", "", status);
	displayChange_field("idcita", "", status);
	displayChange_field("piloto", "", status);
	displayChange_field("viaje", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigo_cita(row, status);
	displayChange_field_atc(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_destino(row, status);
	displayChange_field_placa(row, status);
	displayChange_field_chasis(row, status);
	displayChange_field_naviera(row, status);
	displayChange_field_contenedor_exp(row, status);
	displayChange_field_contenedor_imp(row, status);
	displayChange_field_idcita(row, status);
	displayChange_field_piloto(row, status);
	displayChange_field_viaje(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigo_cita" == field) {
		displayChange_field_codigo_cita(row, status);
	}
	if ("atc" == field) {
		displayChange_field_atc(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("destino" == field) {
		displayChange_field_destino(row, status);
	}
	if ("placa" == field) {
		displayChange_field_placa(row, status);
	}
	if ("chasis" == field) {
		displayChange_field_chasis(row, status);
	}
	if ("naviera" == field) {
		displayChange_field_naviera(row, status);
	}
	if ("contenedor_exp" == field) {
		displayChange_field_contenedor_exp(row, status);
	}
	if ("contenedor_imp" == field) {
		displayChange_field_contenedor_imp(row, status);
	}
	if ("idcita" == field) {
		displayChange_field_idcita(row, status);
	}
	if ("piloto" == field) {
		displayChange_field_piloto(row, status);
	}
	if ("viaje" == field) {
		displayChange_field_viaje(row, status);
	}
}

function displayChange_field_codigo_cita(row, status) {
}

function displayChange_field_atc(row, status) {
}

function displayChange_field_sc_field_0(row, status) {
}

function displayChange_field_destino(row, status) {
}

function displayChange_field_placa(row, status) {
}

function displayChange_field_chasis(row, status) {
}

function displayChange_field_naviera(row, status) {
}

function displayChange_field_contenedor_exp(row, status) {
}

function displayChange_field_contenedor_imp(row, status) {
}

function displayChange_field_idcita(row, status) {
}

function displayChange_field_piloto(row, status) {
}

function displayChange_field_viaje(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_Despachos_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(21);
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

