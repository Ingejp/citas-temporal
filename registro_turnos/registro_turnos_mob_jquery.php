
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
  scEventControl_data["tipo_qr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechainicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtipomovimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idestado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sec_users_login" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpiloto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["piloto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcabezal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["chasis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idselectivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idnaviera" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contenedorexport" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contenedorimport" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtipodecarga" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idviaje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idyarda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["atc_ingreso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marchamo_ingreso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["atc_despacho" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marchamo_despacho" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["turno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigo_cita" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_cita" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_qr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_qr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechainicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechainicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtipomovimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtipomovimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idestado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idestado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sec_users_login" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sec_users_login" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpiloto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpiloto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["piloto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["piloto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["chasis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["chasis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idselectivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idselectivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idnaviera" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idnaviera" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contenedorexport" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contenedorexport" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contenedorimport" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contenedorimport" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtipodecarga" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtipodecarga" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idviaje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idviaje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idyarda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idyarda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["atc_ingreso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["atc_ingreso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marchamo_ingreso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marchamo_ingreso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["atc_despacho" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["atc_despacho" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marchamo_despacho" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marchamo_despacho" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["turno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["turno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpiloto" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idviaje" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo_qr" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idtipomovimiento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idestado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idselectivo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idnaviera" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idtipodecarga" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_qr" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idnaviera" + iSeq == fieldName) {
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
  $('#id_sc_field_codigo_cita' + iSeqRow).bind('blur', function() { sc_registro_turnos_codigo_cita_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_registro_turnos_codigo_cita_onfocus(this, iSeqRow) });
  $('#id_sc_field_contenedorimport' + iSeqRow).bind('blur', function() { sc_registro_turnos_contenedorimport_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_registro_turnos_contenedorimport_onfocus(this, iSeqRow) });
  $('#id_sc_field_contenedorexport' + iSeqRow).bind('blur', function() { sc_registro_turnos_contenedorexport_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_registro_turnos_contenedorexport_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_registro_turnos_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_registro_turnos_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechainicio' + iSeqRow).bind('blur', function() { sc_registro_turnos_fechainicio_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_registro_turnos_fechainicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechainicio_hora' + iSeqRow).bind('blur', function() { sc_registro_turnos_fechainicio_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_registro_turnos_fechainicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_chasis' + iSeqRow).bind('blur', function() { sc_registro_turnos_chasis_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_registro_turnos_chasis_onfocus(this, iSeqRow) });
  $('#id_sc_field_idnaviera' + iSeqRow).bind('blur', function() { sc_registro_turnos_idnaviera_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_registro_turnos_idnaviera_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_registro_turnos_idnaviera_onfocus(this, iSeqRow) });
  $('#id_sc_field_idtipodecarga' + iSeqRow).bind('blur', function() { sc_registro_turnos_idtipodecarga_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_registro_turnos_idtipodecarga_onfocus(this, iSeqRow) });
  $('#id_sc_field_idestado' + iSeqRow).bind('blur', function() { sc_registro_turnos_idestado_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_registro_turnos_idestado_onfocus(this, iSeqRow) });
  $('#id_sc_field_idpiloto' + iSeqRow).bind('blur', function() { sc_registro_turnos_idpiloto_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_registro_turnos_idpiloto_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_registro_turnos_idpiloto_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcabezal' + iSeqRow).bind('blur', function() { sc_registro_turnos_idcabezal_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_registro_turnos_idcabezal_onfocus(this, iSeqRow) });
  $('#id_sc_field_idselectivo' + iSeqRow).bind('blur', function() { sc_registro_turnos_idselectivo_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_registro_turnos_idselectivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_idyarda' + iSeqRow).bind('blur', function() { sc_registro_turnos_idyarda_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_registro_turnos_idyarda_onfocus(this, iSeqRow) });
  $('#id_sc_field_idtipomovimiento' + iSeqRow).bind('blur', function() { sc_registro_turnos_idtipomovimiento_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_registro_turnos_idtipomovimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_idviaje' + iSeqRow).bind('blur', function() { sc_registro_turnos_idviaje_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_registro_turnos_idviaje_onfocus(this, iSeqRow) });
  $('#id_sc_field_atc_ingreso' + iSeqRow).bind('blur', function() { sc_registro_turnos_atc_ingreso_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_registro_turnos_atc_ingreso_onfocus(this, iSeqRow) });
  $('#id_sc_field_marchamo_ingreso' + iSeqRow).bind('blur', function() { sc_registro_turnos_marchamo_ingreso_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_registro_turnos_marchamo_ingreso_onfocus(this, iSeqRow) });
  $('#id_sc_field_atc_despacho' + iSeqRow).bind('blur', function() { sc_registro_turnos_atc_despacho_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_registro_turnos_atc_despacho_onfocus(this, iSeqRow) });
  $('#id_sc_field_marchamo_despacho' + iSeqRow).bind('blur', function() { sc_registro_turnos_marchamo_despacho_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_registro_turnos_marchamo_despacho_onfocus(this, iSeqRow) });
  $('#id_sc_field_sec_users_login' + iSeqRow).bind('blur', function() { sc_registro_turnos_sec_users_login_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_registro_turnos_sec_users_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_turno' + iSeqRow).bind('blur', function() { sc_registro_turnos_turno_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_registro_turnos_turno_onfocus(this, iSeqRow) });
  $('#id_sc_field_piloto' + iSeqRow).bind('blur', function() { sc_registro_turnos_piloto_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_registro_turnos_piloto_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_qr' + iSeqRow).bind('blur', function() { sc_registro_turnos_tipo_qr_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_registro_turnos_tipo_qr_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_registro_turnos_tipo_qr_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_registro_turnos_codigo_cita_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_codigo_cita();
  scCssBlur(oThis);
}

function sc_registro_turnos_codigo_cita_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_contenedorimport_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_contenedorimport();
  scCssBlur(oThis);
}

function sc_registro_turnos_contenedorimport_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_contenedorexport_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_contenedorexport();
  scCssBlur(oThis);
}

function sc_registro_turnos_contenedorexport_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_registro_turnos_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_fechainicio_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_fechainicio();
  scCssBlur(oThis);
}

function sc_registro_turnos_fechainicio_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_fechainicio();
  scCssBlur(oThis);
}

function sc_registro_turnos_fechainicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_fechainicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_chasis_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_chasis();
  scCssBlur(oThis);
}

function sc_registro_turnos_chasis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_idnaviera_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_idnaviera();
  scCssBlur(oThis);
}

function sc_registro_turnos_idnaviera_onchange(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_event_idnaviera_onchange();
}

function sc_registro_turnos_idnaviera_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_idtipodecarga_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_idtipodecarga();
  scCssBlur(oThis);
}

function sc_registro_turnos_idtipodecarga_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_idestado_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_idestado();
  scCssBlur(oThis);
}

function sc_registro_turnos_idestado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_idpiloto_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_idpiloto();
  scCssBlur(oThis);
}

function sc_registro_turnos_idpiloto_onchange(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_event_idpiloto_onchange();
}

function sc_registro_turnos_idpiloto_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_registro_turnos_idcabezal_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_idcabezal();
  scCssBlur(oThis);
}

function sc_registro_turnos_idcabezal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_registro_turnos_idselectivo_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_idselectivo();
  scCssBlur(oThis);
}

function sc_registro_turnos_idselectivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_idyarda_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_idyarda();
  scCssBlur(oThis);
}

function sc_registro_turnos_idyarda_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_idtipomovimiento_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_idtipomovimiento();
  scCssBlur(oThis);
}

function sc_registro_turnos_idtipomovimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_idviaje_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_idviaje();
  scCssBlur(oThis);
}

function sc_registro_turnos_idviaje_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_registro_turnos_atc_ingreso_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_atc_ingreso();
  scCssBlur(oThis);
}

function sc_registro_turnos_atc_ingreso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_marchamo_ingreso_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_marchamo_ingreso();
  scCssBlur(oThis);
}

function sc_registro_turnos_marchamo_ingreso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_atc_despacho_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_atc_despacho();
  scCssBlur(oThis);
}

function sc_registro_turnos_atc_despacho_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_marchamo_despacho_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_marchamo_despacho();
  scCssBlur(oThis);
}

function sc_registro_turnos_marchamo_despacho_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_sec_users_login_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_sec_users_login();
  scCssBlur(oThis);
}

function sc_registro_turnos_sec_users_login_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_turno_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_turno();
  scCssBlur(oThis);
}

function sc_registro_turnos_turno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_piloto_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_piloto();
  scCssBlur(oThis);
}

function sc_registro_turnos_piloto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_registro_turnos_tipo_qr_onblur(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_validate_tipo_qr();
  scCssBlur(oThis);
}

function sc_registro_turnos_tipo_qr_onchange(oThis, iSeqRow) {
  do_ajax_registro_turnos_mob_event_tipo_qr_onchange();
}

function sc_registro_turnos_tipo_qr_onfocus(oThis, iSeqRow) {
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
	displayChange_field("tipo_qr", "", status);
	displayChange_field("fechainicio", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("idtipomovimiento", "", status);
	displayChange_field("idestado", "", status);
	displayChange_field("sec_users_login", "", status);
	displayChange_field("idpiloto", "", status);
	displayChange_field("piloto", "", status);
	displayChange_field("idcabezal", "", status);
	displayChange_field("chasis", "", status);
	displayChange_field("idselectivo", "", status);
	displayChange_field("idnaviera", "", status);
	displayChange_field("contenedorexport", "", status);
	displayChange_field("contenedorimport", "", status);
	displayChange_field("idtipodecarga", "", status);
	displayChange_field("idviaje", "", status);
	displayChange_field("observaciones", "", status);
	displayChange_field("idyarda", "", status);
	displayChange_field("atc_ingreso", "", status);
	displayChange_field("marchamo_ingreso", "", status);
	displayChange_field("atc_despacho", "", status);
	displayChange_field("marchamo_despacho", "", status);
	displayChange_field("turno", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigo_cita(row, status);
	displayChange_field_tipo_qr(row, status);
	displayChange_field_fechainicio(row, status);
	displayChange_field_idtipomovimiento(row, status);
	displayChange_field_idestado(row, status);
	displayChange_field_sec_users_login(row, status);
	displayChange_field_idpiloto(row, status);
	displayChange_field_piloto(row, status);
	displayChange_field_idcabezal(row, status);
	displayChange_field_chasis(row, status);
	displayChange_field_idselectivo(row, status);
	displayChange_field_idnaviera(row, status);
	displayChange_field_contenedorexport(row, status);
	displayChange_field_contenedorimport(row, status);
	displayChange_field_idtipodecarga(row, status);
	displayChange_field_idviaje(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_idyarda(row, status);
	displayChange_field_atc_ingreso(row, status);
	displayChange_field_marchamo_ingreso(row, status);
	displayChange_field_atc_despacho(row, status);
	displayChange_field_marchamo_despacho(row, status);
	displayChange_field_turno(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigo_cita" == field) {
		displayChange_field_codigo_cita(row, status);
	}
	if ("tipo_qr" == field) {
		displayChange_field_tipo_qr(row, status);
	}
	if ("fechainicio" == field) {
		displayChange_field_fechainicio(row, status);
	}
	if ("idtipomovimiento" == field) {
		displayChange_field_idtipomovimiento(row, status);
	}
	if ("idestado" == field) {
		displayChange_field_idestado(row, status);
	}
	if ("sec_users_login" == field) {
		displayChange_field_sec_users_login(row, status);
	}
	if ("idpiloto" == field) {
		displayChange_field_idpiloto(row, status);
	}
	if ("piloto" == field) {
		displayChange_field_piloto(row, status);
	}
	if ("idcabezal" == field) {
		displayChange_field_idcabezal(row, status);
	}
	if ("chasis" == field) {
		displayChange_field_chasis(row, status);
	}
	if ("idselectivo" == field) {
		displayChange_field_idselectivo(row, status);
	}
	if ("idnaviera" == field) {
		displayChange_field_idnaviera(row, status);
	}
	if ("contenedorexport" == field) {
		displayChange_field_contenedorexport(row, status);
	}
	if ("contenedorimport" == field) {
		displayChange_field_contenedorimport(row, status);
	}
	if ("idtipodecarga" == field) {
		displayChange_field_idtipodecarga(row, status);
	}
	if ("idviaje" == field) {
		displayChange_field_idviaje(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("idyarda" == field) {
		displayChange_field_idyarda(row, status);
	}
	if ("atc_ingreso" == field) {
		displayChange_field_atc_ingreso(row, status);
	}
	if ("marchamo_ingreso" == field) {
		displayChange_field_marchamo_ingreso(row, status);
	}
	if ("atc_despacho" == field) {
		displayChange_field_atc_despacho(row, status);
	}
	if ("marchamo_despacho" == field) {
		displayChange_field_marchamo_despacho(row, status);
	}
	if ("turno" == field) {
		displayChange_field_turno(row, status);
	}
}

function displayChange_field_codigo_cita(row, status) {
}

function displayChange_field_tipo_qr(row, status) {
}

function displayChange_field_fechainicio(row, status) {
}

function displayChange_field_idtipomovimiento(row, status) {
}

function displayChange_field_idestado(row, status) {
}

function displayChange_field_sec_users_login(row, status) {
}

function displayChange_field_idpiloto(row, status) {
}

function displayChange_field_piloto(row, status) {
}

function displayChange_field_idcabezal(row, status) {
}

function displayChange_field_chasis(row, status) {
}

function displayChange_field_idselectivo(row, status) {
}

function displayChange_field_idnaviera(row, status) {
}

function displayChange_field_contenedorexport(row, status) {
}

function displayChange_field_contenedorimport(row, status) {
}

function displayChange_field_idtipodecarga(row, status) {
}

function displayChange_field_idviaje(row, status) {
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_idyarda(row, status) {
}

function displayChange_field_atc_ingreso(row, status) {
}

function displayChange_field_marchamo_ingreso(row, status) {
}

function displayChange_field_atc_despacho(row, status) {
}

function displayChange_field_marchamo_despacho(row, status) {
}

function displayChange_field_turno(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_registro_turnos_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
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
    },
    onClose: function(dateText, inst) {
      do_ajax_registro_turnos_mob_validate_fechainicio(iSeqRow);
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

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

