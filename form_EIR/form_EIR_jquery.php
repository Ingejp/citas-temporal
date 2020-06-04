
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'id_condicion':
      case 'sec_users_login':
      case 'fecha':
      case 'tipomovimiento_idtipomovimiento':
      case 'numero_contenedor':
      case 'idnaviera':
      case 'idyarda':
      case 'idtransporte':
      case 'idcabezal':
      case 'cable':
      case 'plug':
      case 'medida':
      case 'observaciones':
      case 'fima':
        sc_exib_ocult_pag('form_EIR_form0');
        break;
      case 'detalle':
        sc_exib_ocult_pag('form_EIR_form1');
        break;
    }
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
  scEventControl_data["id_condicion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sec_users_login" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipomovimiento_idtipomovimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_contenedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idnaviera" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idyarda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtransporte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcabezal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cable" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["plug" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["medida" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fima" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_condicion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_condicion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sec_users_login" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sec_users_login" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipomovimiento_idtipomovimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipomovimiento_idtipomovimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_contenedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_contenedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idnaviera" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idnaviera" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idyarda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idyarda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtransporte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtransporte" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cable" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cable" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["plug" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["plug" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["medida" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["medida" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fima" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fima" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_contenedor" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["autocomp"]) {
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
  if ("tipomovimiento_idtipomovimiento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idnaviera" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idyarda" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idnaviera" + iSeq == fieldName) {
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
  $('#id_sc_field_id_condicion' + iSeqRow).bind('blur', function() { sc_form_EIR_id_condicion_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_EIR_id_condicion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('blur', function() { sc_form_EIR_fecha_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_EIR_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_hora' + iSeqRow).bind('blur', function() { sc_form_EIR_fecha_hora_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_EIR_fecha_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_EIR_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_EIR_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_cable' + iSeqRow).bind('blur', function() { sc_form_EIR_cable_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_EIR_cable_onfocus(this, iSeqRow) });
  $('#id_sc_field_plug' + iSeqRow).bind('blur', function() { sc_form_EIR_plug_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_EIR_plug_onfocus(this, iSeqRow) });
  $('#id_sc_field_idnaviera' + iSeqRow).bind('blur', function() { sc_form_EIR_idnaviera_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_EIR_idnaviera_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_EIR_idnaviera_onfocus(this, iSeqRow) });
  $('#id_sc_field_idyarda' + iSeqRow).bind('blur', function() { sc_form_EIR_idyarda_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_EIR_idyarda_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_contenedor' + iSeqRow).bind('blur', function() { sc_form_EIR_numero_contenedor_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_EIR_numero_contenedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcabezal' + iSeqRow).bind('blur', function() { sc_form_EIR_idcabezal_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_EIR_idcabezal_onfocus(this, iSeqRow) });
  $('#id_sc_field_sec_users_login' + iSeqRow).bind('blur', function() { sc_form_EIR_sec_users_login_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_EIR_sec_users_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipomovimiento_idtipomovimiento' + iSeqRow).bind('blur', function() { sc_form_EIR_tipomovimiento_idtipomovimiento_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_EIR_tipomovimiento_idtipomovimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_idtransporte' + iSeqRow).bind('blur', function() { sc_form_EIR_idtransporte_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_EIR_idtransporte_onfocus(this, iSeqRow) });
  $('#id_sc_field_medida' + iSeqRow).bind('blur', function() { sc_form_EIR_medida_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_EIR_medida_onfocus(this, iSeqRow) });
  $('#id_sc_field_fima' + iSeqRow).bind('blur', function() { sc_form_EIR_fima_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_EIR_fima_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle' + iSeqRow).bind('blur', function() { sc_form_EIR_detalle_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_EIR_detalle_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_EIR_id_condicion_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_id_condicion();
  scCssBlur(oThis);
}

function sc_form_EIR_id_condicion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_EIR_fecha_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_EIR_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_fecha_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_EIR_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_cable_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_cable();
  scCssBlur(oThis);
}

function sc_form_EIR_cable_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_plug_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_plug();
  scCssBlur(oThis);
}

function sc_form_EIR_plug_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_idnaviera_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_idnaviera();
  scCssBlur(oThis);
}

function sc_form_EIR_idnaviera_onchange(oThis, iSeqRow) {
  do_ajax_form_EIR_event_idnaviera_onchange();
}

function sc_form_EIR_idnaviera_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_idyarda_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_idyarda();
  scCssBlur(oThis);
}

function sc_form_EIR_idyarda_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_numero_contenedor_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_numero_contenedor();
  scCssBlur(oThis);
}

function sc_form_EIR_numero_contenedor_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_EIR_idcabezal_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_idcabezal();
  scCssBlur(oThis);
}

function sc_form_EIR_idcabezal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_EIR_sec_users_login_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_sec_users_login();
  scCssBlur(oThis);
}

function sc_form_EIR_sec_users_login_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_tipomovimiento_idtipomovimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_tipomovimiento_idtipomovimiento();
  scCssBlur(oThis);
}

function sc_form_EIR_tipomovimiento_idtipomovimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_idtransporte_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_idtransporte();
  scCssBlur(oThis);
}

function sc_form_EIR_idtransporte_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_EIR_medida_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_medida();
  scCssBlur(oThis);
}

function sc_form_EIR_medida_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_fima_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_fima();
  scCssBlur(oThis);
}

function sc_form_EIR_fima_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_EIR_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_EIR_validate_detalle();
  scCssBlur(oThis);
}

function sc_form_EIR_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
	displayChange_block("1", status);
}

function displayChange_page_1(status) {
	displayChange_block("2", status);
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
}

function displayChange_block_0(status) {
	displayChange_field("id_condicion", "", status);
	displayChange_field("sec_users_login", "", status);
	displayChange_field("fecha", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("tipomovimiento_idtipomovimiento", "", status);
	displayChange_field("numero_contenedor", "", status);
	displayChange_field("idnaviera", "", status);
	displayChange_field("idyarda", "", status);
	displayChange_field("idtransporte", "", status);
	displayChange_field("idcabezal", "", status);
	displayChange_field("cable", "", status);
	displayChange_field("plug", "", status);
	displayChange_field("medida", "", status);
	displayChange_field("observaciones", "", status);
	displayChange_field("fima", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("detalle", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_condicion(row, status);
	displayChange_field_sec_users_login(row, status);
	displayChange_field_fecha(row, status);
	displayChange_field_tipomovimiento_idtipomovimiento(row, status);
	displayChange_field_numero_contenedor(row, status);
	displayChange_field_idnaviera(row, status);
	displayChange_field_idyarda(row, status);
	displayChange_field_idtransporte(row, status);
	displayChange_field_idcabezal(row, status);
	displayChange_field_cable(row, status);
	displayChange_field_plug(row, status);
	displayChange_field_medida(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_fima(row, status);
	displayChange_field_detalle(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_condicion" == field) {
		displayChange_field_id_condicion(row, status);
	}
	if ("sec_users_login" == field) {
		displayChange_field_sec_users_login(row, status);
	}
	if ("fecha" == field) {
		displayChange_field_fecha(row, status);
	}
	if ("tipomovimiento_idtipomovimiento" == field) {
		displayChange_field_tipomovimiento_idtipomovimiento(row, status);
	}
	if ("numero_contenedor" == field) {
		displayChange_field_numero_contenedor(row, status);
	}
	if ("idnaviera" == field) {
		displayChange_field_idnaviera(row, status);
	}
	if ("idyarda" == field) {
		displayChange_field_idyarda(row, status);
	}
	if ("idtransporte" == field) {
		displayChange_field_idtransporte(row, status);
	}
	if ("idcabezal" == field) {
		displayChange_field_idcabezal(row, status);
	}
	if ("cable" == field) {
		displayChange_field_cable(row, status);
	}
	if ("plug" == field) {
		displayChange_field_plug(row, status);
	}
	if ("medida" == field) {
		displayChange_field_medida(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("fima" == field) {
		displayChange_field_fima(row, status);
	}
	if ("detalle" == field) {
		displayChange_field_detalle(row, status);
	}
}

function displayChange_field_id_condicion(row, status) {
}

function displayChange_field_sec_users_login(row, status) {
}

function displayChange_field_fecha(row, status) {
}

function displayChange_field_tipomovimiento_idtipomovimiento(row, status) {
}

function displayChange_field_numero_contenedor(row, status) {
}

function displayChange_field_idnaviera(row, status) {
}

function displayChange_field_idyarda(row, status) {
}

function displayChange_field_idtransporte(row, status) {
}

function displayChange_field_idcabezal(row, status) {
}

function displayChange_field_cable(row, status) {
}

function displayChange_field_plug(row, status) {
}

function displayChange_field_medida(row, status) {
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_fima(row, status) {
}

function displayChange_field_detalle(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detalle_condicion")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detalle_condicion")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_EIR_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(16);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_EIR_validate_fecha(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSignatureAdd(seqRow) {
  $("#sc-id-sign-fima" + seqRow).jSignature({
    width: "400px",
    height: "150px",
    color: "#000000"
  }).bind("change", function(e) {
    $("#id_sc_field_fima" + seqRow).trigger("change");
    scJQSignatureRedrawReadonly("#id_sc_field_fima" + seqRow);
    var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
    if (changedRow.length) {
      $(changedRow[0]).prop("checked", true);
    }
  });
  scJQSignatureRedraw("fima" + seqRow);
  var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
  if (changedRow.length) {
    $(changedRow[0]).prop("checked", false);
  }
} // scJQSignatureAdd

function scJQSignatureRedraw(fieldName) {
  var thisFieldValue = $("#id_sc_field_" + fieldName).val();
  if ("" != thisFieldValue && "data:image/jsignature;base30," != thisFieldValue && "data:image/jsignature;base30," == thisFieldValue.substr(0, 29)) {
    $("#sc-id-sign-" + fieldName).jSignature("reset").jSignature("setData", thisFieldValue);
    var pngDataUrl = $("#sc-id-sign-" + fieldName).jSignature("getData", "image");
    $("#sc-id-disabled-" + fieldName).find("img").attr("src", "data:" + pngDataUrl);
    scJQSignatureRedrawReadonly(fieldName);
  }
  else {
    scJQSignatureClear(fieldName);
  }
} // scJQSignatureRedraw

function scJQSignatureRedrawReadonly(fieldName) {
  var thisFieldValue = $("#id_sc_field_" + fieldName).val();
  if ("" != thisFieldValue) {
    var pngDataUrl = $("#sc-id-sign-" + fieldName).jSignature("getData", "image");
    $("#sc-id-ronly-" + fieldName).find("img").attr("src", "data:" + pngDataUrl);
    $("#sc-id-ronly-" + fieldName).show();
  }
} // scJQSignatureRedraw

function scJQSignatureClear(fieldName) {
  $("#sc-id-sign-" + fieldName).jSignature("reset");
  $("#sc-id-disabled-" + fieldName).find("img").attr("src", "");
  scJQSignatureClearReadOnly(fieldName);
} // scJQSignatureRedraw

function scJQSignatureClearReadOnly(fieldName) {
    $("#sc-id-ronly-" + fieldName).find("img").attr("src", "");
} // scJQSignatureRedraw

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSignatureAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

