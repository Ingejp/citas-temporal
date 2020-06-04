
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
  scEventControl_data["fac_revision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fac_acople" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["placa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nuevo_estatus" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["operador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rampa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_revision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["intrusion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contenedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatus" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ubicacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefonos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["turno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["turno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fac_revision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fac_revision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fac_acople" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fac_acople" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nuevo_estatus" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nuevo_estatus" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["operador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["operador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rampa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rampa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_revision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_revision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["intrusion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["intrusion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contenedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contenedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatus" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatus" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ubicacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ubicacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefonos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefonos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["operador" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("nuevo_estatus" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("rampa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_revision" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("turno" + iSeq == fieldName) {
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
  $('#id_sc_field_turno' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_turno_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_Cambio_estatus_Rev_turno_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_Cambio_estatus_Rev_turno_onfocus(this, iSeqRow) });
  $('#id_sc_field_contenedor' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_contenedor_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_Cambio_estatus_Rev_contenedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_cliente_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_Cambio_estatus_Rev_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatus' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_estatus_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_Cambio_estatus_Rev_estatus_onfocus(this, iSeqRow) });
  $('#id_sc_field_rampa' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_rampa_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_Cambio_estatus_Rev_rampa_onfocus(this, iSeqRow) });
  $('#id_sc_field_nuevo_estatus' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_nuevo_estatus_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_Cambio_estatus_Rev_nuevo_estatus_onfocus(this, iSeqRow) });
  $('#id_sc_field_ubicacion' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_ubicacion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_Cambio_estatus_Rev_ubicacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fac_revision' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_fac_revision_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_Cambio_estatus_Rev_fac_revision_onfocus(this, iSeqRow) });
  $('#id_sc_field_fac_acople' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_fac_acople_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_Cambio_estatus_Rev_fac_acople_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefonos' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_telefonos_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_Cambio_estatus_Rev_telefonos_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_Cambio_estatus_Rev_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_nombre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_Cambio_estatus_Rev_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_placa' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_placa_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_Cambio_estatus_Rev_placa_onfocus(this, iSeqRow) });
  $('#id_sc_field_intrusion' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_intrusion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_Cambio_estatus_Rev_intrusion_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_Cambio_estatus_Rev_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0_hora' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_sc_field_0_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_Cambio_estatus_Rev_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_Cambio_estatus_Rev_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1_hora' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_sc_field_1_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_Cambio_estatus_Rev_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_operador' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_operador_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_Cambio_estatus_Rev_operador_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_codigo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_Cambio_estatus_Rev_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_revision' + iSeqRow).bind('blur', function() { sc_Cambio_estatus_Rev_tipo_revision_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_Cambio_estatus_Rev_tipo_revision_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_Cambio_estatus_Rev_turno_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_turno();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_turno_onchange(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_event_turno_onchange();
}

function sc_Cambio_estatus_Rev_turno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_contenedor_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_contenedor();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_contenedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_cliente_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_cliente();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_estatus_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_estatus();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_estatus_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_rampa_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_rampa();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_rampa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_nuevo_estatus_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_nuevo_estatus();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_nuevo_estatus_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_ubicacion_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_ubicacion();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_ubicacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_fac_revision_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_fac_revision();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_fac_revision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_fac_acople_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_fac_acople();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_fac_acople_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_telefonos_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_telefonos();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_telefonos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_nombre_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_nombre();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_placa_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_placa();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_placa_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_intrusion_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_intrusion();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_intrusion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_operador_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_operador();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_operador_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_codigo_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_codigo();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_Cambio_estatus_Rev_tipo_revision_onblur(oThis, iSeqRow) {
  do_ajax_Cambio_estatus_Rev_mob_validate_tipo_revision();
  scCssBlur(oThis);
}

function sc_Cambio_estatus_Rev_tipo_revision_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("turno", "", status);
	displayChange_field("fac_revision", "", status);
	displayChange_field("fac_acople", "", status);
	displayChange_field("placa", "", status);
	displayChange_field("nuevo_estatus", "", status);
	displayChange_field("sc_field_0", "", status);
	displayChange_field("sc_field_1", "", status);
	displayChange_field("operador", "", status);
	displayChange_field("rampa", "", status);
	displayChange_field("tipo_revision", "", status);
	displayChange_field("intrusion", "", status);
	displayChange_field("observaciones", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("cliente", "", status);
	displayChange_field("contenedor", "", status);
	displayChange_field("estatus", "", status);
	displayChange_field("ubicacion", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("nombre", "", status);
	displayChange_field("telefonos", "", status);
	displayChange_field("codigo", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_turno(row, status);
	displayChange_field_fac_revision(row, status);
	displayChange_field_fac_acople(row, status);
	displayChange_field_placa(row, status);
	displayChange_field_nuevo_estatus(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_sc_field_1(row, status);
	displayChange_field_operador(row, status);
	displayChange_field_rampa(row, status);
	displayChange_field_tipo_revision(row, status);
	displayChange_field_intrusion(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_cliente(row, status);
	displayChange_field_contenedor(row, status);
	displayChange_field_estatus(row, status);
	displayChange_field_ubicacion(row, status);
	displayChange_field_nombre(row, status);
	displayChange_field_telefonos(row, status);
	displayChange_field_codigo(row, status);
}

function displayChange_field(field, row, status) {
	if ("turno" == field) {
		displayChange_field_turno(row, status);
	}
	if ("fac_revision" == field) {
		displayChange_field_fac_revision(row, status);
	}
	if ("fac_acople" == field) {
		displayChange_field_fac_acople(row, status);
	}
	if ("placa" == field) {
		displayChange_field_placa(row, status);
	}
	if ("nuevo_estatus" == field) {
		displayChange_field_nuevo_estatus(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("operador" == field) {
		displayChange_field_operador(row, status);
	}
	if ("rampa" == field) {
		displayChange_field_rampa(row, status);
	}
	if ("tipo_revision" == field) {
		displayChange_field_tipo_revision(row, status);
	}
	if ("intrusion" == field) {
		displayChange_field_intrusion(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("cliente" == field) {
		displayChange_field_cliente(row, status);
	}
	if ("contenedor" == field) {
		displayChange_field_contenedor(row, status);
	}
	if ("estatus" == field) {
		displayChange_field_estatus(row, status);
	}
	if ("ubicacion" == field) {
		displayChange_field_ubicacion(row, status);
	}
	if ("nombre" == field) {
		displayChange_field_nombre(row, status);
	}
	if ("telefonos" == field) {
		displayChange_field_telefonos(row, status);
	}
	if ("codigo" == field) {
		displayChange_field_codigo(row, status);
	}
}

function displayChange_field_turno(row, status) {
}

function displayChange_field_fac_revision(row, status) {
}

function displayChange_field_fac_acople(row, status) {
}

function displayChange_field_placa(row, status) {
}

function displayChange_field_nuevo_estatus(row, status) {
}

function displayChange_field_sc_field_0(row, status) {
}

function displayChange_field_sc_field_1(row, status) {
}

function displayChange_field_operador(row, status) {
}

function displayChange_field_rampa(row, status) {
}

function displayChange_field_tipo_revision(row, status) {
}

function displayChange_field_intrusion(row, status) {
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_cliente(row, status) {
}

function displayChange_field_contenedor(row, status) {
}

function displayChange_field_estatus(row, status) {
}

function displayChange_field_ubicacion(row, status) {
}

function displayChange_field_nombre(row, status) {
}

function displayChange_field_telefonos(row, status) {
}

function displayChange_field_codigo(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_Cambio_estatus_Rev_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(30);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_sc_field_0" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_sc_field_0" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['sc_field_0']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['sc_field_0']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_Cambio_estatus_Rev_mob_validate_sc_field_0(iSeqRow);
    },
    numberOfMonths: 1,
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['sc_field_0']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_sc_field_1" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_sc_field_1" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['sc_field_1']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['sc_field_1']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_Cambio_estatus_Rev_mob_validate_sc_field_1(iSeqRow);
    },
    numberOfMonths: 1,
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['sc_field_1']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

