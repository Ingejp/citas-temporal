
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
  scEventControl_data["fecha_solicitud" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idestado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["factura_revision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["factura_acople" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtipo_movilizacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idregimen_aduanero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["maga" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sgaia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dipafront" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ucc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcabezal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contenedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idmedida" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idnaviera" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idselectivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtipodecarga" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idconsignatario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcontenido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bl" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad_por_bl" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idviaje_importacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iddestino" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ubicacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idrampa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idfuncionario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idgestor_aduanal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idestado_revision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sec_users_login" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_revision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["fecha_solicitud" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_solicitud" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idestado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idestado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factura_revision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["factura_revision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factura_acople" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["factura_acople" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtipo_movilizacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtipo_movilizacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idregimen_aduanero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idregimen_aduanero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["maga" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["maga" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sgaia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sgaia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dipafront" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dipafront" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ucc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ucc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contenedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contenedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idmedida" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idmedida" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idnaviera" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idnaviera" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idselectivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idselectivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtipodecarga" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtipodecarga" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idconsignatario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idconsignatario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcontenido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcontenido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bl" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bl" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad_por_bl" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad_por_bl" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idviaje_importacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idviaje_importacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iddestino" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddestino" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ubicacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ubicacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idrampa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idrampa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfuncionario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfuncionario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idgestor_aduanal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idgestor_aduanal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idestado_revision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idestado_revision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sec_users_login" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sec_users_login" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_revision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_revision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcabezal" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idgestor_aduanal" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idconsignatario" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idcontenido" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idfuncionario" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idviaje_importacion" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idtipo_movilizacion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idregimen_aduanero" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idmedida" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idnaviera" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idselectivo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idtipodecarga" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("iddestino" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idrampa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idestado_revision" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idtipoderevision" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
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
  $('#id_sc_field_codigo_revision' + iSeqRow).bind('blur', function() { sc_form_revision_codigo_revision_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_revision_codigo_revision_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_solicitud' + iSeqRow).bind('blur', function() { sc_form_revision_fecha_solicitud_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_revision_fecha_solicitud_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_solicitud_hora' + iSeqRow).bind('blur', function() { sc_form_revision_fecha_solicitud_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_revision_fecha_solicitud_onfocus(this, iSeqRow) });
  $('#id_sc_field_maga' + iSeqRow).bind('blur', function() { sc_form_revision_maga_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_revision_maga_onfocus(this, iSeqRow) });
  $('#id_sc_field_sgaia' + iSeqRow).bind('blur', function() { sc_form_revision_sgaia_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_revision_sgaia_onfocus(this, iSeqRow) });
  $('#id_sc_field_sat' + iSeqRow).bind('blur', function() { sc_form_revision_sat_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_revision_sat_onfocus(this, iSeqRow) });
  $('#id_sc_field_dipafront' + iSeqRow).bind('blur', function() { sc_form_revision_dipafront_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_revision_dipafront_onfocus(this, iSeqRow) });
  $('#id_sc_field_ucc' + iSeqRow).bind('blur', function() { sc_form_revision_ucc_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_revision_ucc_onfocus(this, iSeqRow) });
  $('#id_sc_field_idnaviera' + iSeqRow).bind('blur', function() { sc_form_revision_idnaviera_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_revision_idnaviera_onfocus(this, iSeqRow) });
  $('#id_sc_field_contenedor' + iSeqRow).bind('blur', function() { sc_form_revision_contenedor_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_revision_contenedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_bl' + iSeqRow).bind('blur', function() { sc_form_revision_bl_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_revision_bl_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_revision_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_revision_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcabezal' + iSeqRow).bind('blur', function() { sc_form_revision_idcabezal_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_revision_idcabezal_onfocus(this, iSeqRow) });
  $('#id_sc_field_idgestor_aduanal' + iSeqRow).bind('blur', function() { sc_form_revision_idgestor_aduanal_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_revision_idgestor_aduanal_onfocus(this, iSeqRow) });
  $('#id_sc_field_idrampa' + iSeqRow).bind('blur', function() { sc_form_revision_idrampa_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_revision_idrampa_onfocus(this, iSeqRow) });
  $('#id_sc_field_idconsignatario' + iSeqRow).bind('blur', function() { sc_form_revision_idconsignatario_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_revision_idconsignatario_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcontenido' + iSeqRow).bind('blur', function() { sc_form_revision_idcontenido_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_revision_idcontenido_onfocus(this, iSeqRow) });
  $('#id_sc_field_idestado_revision' + iSeqRow).bind('blur', function() { sc_form_revision_idestado_revision_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_revision_idestado_revision_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad_por_bl' + iSeqRow).bind('blur', function() { sc_form_revision_cantidad_por_bl_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_revision_cantidad_por_bl_onfocus(this, iSeqRow) });
  $('#id_sc_field_idmedida' + iSeqRow).bind('blur', function() { sc_form_revision_idmedida_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_revision_idmedida_onfocus(this, iSeqRow) });
  $('#id_sc_field_idselectivo' + iSeqRow).bind('blur', function() { sc_form_revision_idselectivo_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_revision_idselectivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_idtipodecarga' + iSeqRow).bind('blur', function() { sc_form_revision_idtipodecarga_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_revision_idtipodecarga_onfocus(this, iSeqRow) });
  $('#id_sc_field_sec_users_login' + iSeqRow).bind('blur', function() { sc_form_revision_sec_users_login_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_revision_sec_users_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_factura_revision' + iSeqRow).bind('blur', function() { sc_form_revision_factura_revision_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_revision_factura_revision_onfocus(this, iSeqRow) });
  $('#id_sc_field_factura_acople' + iSeqRow).bind('blur', function() { sc_form_revision_factura_acople_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_revision_factura_acople_onfocus(this, iSeqRow) });
  $('#id_sc_field_ubicacion' + iSeqRow).bind('blur', function() { sc_form_revision_ubicacion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_revision_ubicacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_idfuncionario' + iSeqRow).bind('blur', function() { sc_form_revision_idfuncionario_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_revision_idfuncionario_onfocus(this, iSeqRow) });
  $('#id_sc_field_idviaje_importacion' + iSeqRow).bind('blur', function() { sc_form_revision_idviaje_importacion_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_revision_idviaje_importacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_idregimen_aduanero' + iSeqRow).bind('blur', function() { sc_form_revision_idregimen_aduanero_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_revision_idregimen_aduanero_onfocus(this, iSeqRow) });
  $('#id_sc_field_iddestino' + iSeqRow).bind('blur', function() { sc_form_revision_iddestino_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_revision_iddestino_onfocus(this, iSeqRow) });
  $('#id_sc_field_idestado' + iSeqRow).bind('blur', function() { sc_form_revision_idestado_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_revision_idestado_onfocus(this, iSeqRow) });
  $('#id_sc_field_idtipo_movilizacion' + iSeqRow).bind('blur', function() { sc_form_revision_idtipo_movilizacion_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_revision_idtipo_movilizacion_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_revision_codigo_revision_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_codigo_revision();
  scCssBlur(oThis);
}

function sc_form_revision_codigo_revision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_fecha_solicitud_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_fecha_solicitud();
  scCssBlur(oThis);
}

function sc_form_revision_fecha_solicitud_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_fecha_solicitud();
  scCssBlur(oThis);
}

function sc_form_revision_fecha_solicitud_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_fecha_solicitud_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_maga_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_maga();
  scCssBlur(oThis);
}

function sc_form_revision_maga_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_sgaia_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_sgaia();
  scCssBlur(oThis);
}

function sc_form_revision_sgaia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_sat_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_sat();
  scCssBlur(oThis);
}

function sc_form_revision_sat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_dipafront_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_dipafront();
  scCssBlur(oThis);
}

function sc_form_revision_dipafront_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_ucc_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_ucc();
  scCssBlur(oThis);
}

function sc_form_revision_ucc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_idnaviera_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idnaviera();
  scCssBlur(oThis);
}

function sc_form_revision_idnaviera_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_contenedor_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_contenedor();
  scCssBlur(oThis);
}

function sc_form_revision_contenedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_bl_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_bl();
  scCssBlur(oThis);
}

function sc_form_revision_bl_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_revision_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_idcabezal_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idcabezal();
  scCssBlur(oThis);
}

function sc_form_revision_idcabezal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_revision_idgestor_aduanal_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idgestor_aduanal();
  scCssBlur(oThis);
}

function sc_form_revision_idgestor_aduanal_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_revision_idrampa_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idrampa();
  scCssBlur(oThis);
}

function sc_form_revision_idrampa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_idconsignatario_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idconsignatario();
  scCssBlur(oThis);
}

function sc_form_revision_idconsignatario_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_revision_idcontenido_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idcontenido();
  scCssBlur(oThis);
}

function sc_form_revision_idcontenido_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_revision_idestado_revision_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idestado_revision();
  scCssBlur(oThis);
}

function sc_form_revision_idestado_revision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_cantidad_por_bl_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_cantidad_por_bl();
  scCssBlur(oThis);
}

function sc_form_revision_cantidad_por_bl_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_idmedida_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idmedida();
  scCssBlur(oThis);
}

function sc_form_revision_idmedida_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_idselectivo_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idselectivo();
  scCssBlur(oThis);
}

function sc_form_revision_idselectivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_idtipodecarga_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idtipodecarga();
  scCssBlur(oThis);
}

function sc_form_revision_idtipodecarga_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_sec_users_login_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_sec_users_login();
  scCssBlur(oThis);
}

function sc_form_revision_sec_users_login_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_factura_revision_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_factura_revision();
  scCssBlur(oThis);
}

function sc_form_revision_factura_revision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_factura_acople_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_factura_acople();
  scCssBlur(oThis);
}

function sc_form_revision_factura_acople_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_ubicacion_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_ubicacion();
  scCssBlur(oThis);
}

function sc_form_revision_ubicacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_idfuncionario_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idfuncionario();
  scCssBlur(oThis);
}

function sc_form_revision_idfuncionario_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_revision_idviaje_importacion_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idviaje_importacion();
  scCssBlur(oThis);
}

function sc_form_revision_idviaje_importacion_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_revision_idregimen_aduanero_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idregimen_aduanero();
  scCssBlur(oThis);
}

function sc_form_revision_idregimen_aduanero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_iddestino_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_iddestino();
  scCssBlur(oThis);
}

function sc_form_revision_iddestino_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_idestado_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idestado();
  scCssBlur(oThis);
}

function sc_form_revision_idestado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_revision_idtipo_movilizacion_onblur(oThis, iSeqRow) {
  do_ajax_form_revision_mob_validate_idtipo_movilizacion();
  scCssBlur(oThis);
}

function sc_form_revision_idtipo_movilizacion_onfocus(oThis, iSeqRow) {
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
	if ("4" == block) {
		displayChange_block_4(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("fecha_solicitud", "", status);
	displayChange_field("idestado", "", status);
	displayChange_field("factura_revision", "", status);
	displayChange_field("factura_acople", "", status);
	displayChange_field("idtipo_movilizacion", "", status);
	displayChange_field("idregimen_aduanero", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("maga", "", status);
	displayChange_field("sgaia", "", status);
	displayChange_field("sat", "", status);
	displayChange_field("dipafront", "", status);
	displayChange_field("ucc", "", status);
	displayChange_field("observaciones", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("idcabezal", "", status);
	displayChange_field("contenedor", "", status);
	displayChange_field("idmedida", "", status);
	displayChange_field("idnaviera", "", status);
	displayChange_field("idselectivo", "", status);
	displayChange_field("idtipodecarga", "", status);
	displayChange_field("idconsignatario", "", status);
	displayChange_field("idcontenido", "", status);
	displayChange_field("bl", "", status);
	displayChange_field("cantidad_por_bl", "", status);
	displayChange_field("idviaje_importacion", "", status);
	displayChange_field("iddestino", "", status);
	displayChange_field("ubicacion", "", status);
	displayChange_field("idrampa", "", status);
	displayChange_field("idfuncionario", "", status);
	displayChange_field("idgestor_aduanal", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("idestado_revision", "", status);
	displayChange_field("sec_users_login", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("codigo_revision", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_fecha_solicitud(row, status);
	displayChange_field_idestado(row, status);
	displayChange_field_factura_revision(row, status);
	displayChange_field_factura_acople(row, status);
	displayChange_field_idtipo_movilizacion(row, status);
	displayChange_field_idregimen_aduanero(row, status);
	displayChange_field_maga(row, status);
	displayChange_field_sgaia(row, status);
	displayChange_field_sat(row, status);
	displayChange_field_dipafront(row, status);
	displayChange_field_ucc(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_idcabezal(row, status);
	displayChange_field_contenedor(row, status);
	displayChange_field_idmedida(row, status);
	displayChange_field_idnaviera(row, status);
	displayChange_field_idselectivo(row, status);
	displayChange_field_idtipodecarga(row, status);
	displayChange_field_idconsignatario(row, status);
	displayChange_field_idcontenido(row, status);
	displayChange_field_bl(row, status);
	displayChange_field_cantidad_por_bl(row, status);
	displayChange_field_idviaje_importacion(row, status);
	displayChange_field_iddestino(row, status);
	displayChange_field_ubicacion(row, status);
	displayChange_field_idrampa(row, status);
	displayChange_field_idfuncionario(row, status);
	displayChange_field_idgestor_aduanal(row, status);
	displayChange_field_idestado_revision(row, status);
	displayChange_field_sec_users_login(row, status);
	displayChange_field_codigo_revision(row, status);
}

function displayChange_field(field, row, status) {
	if ("fecha_solicitud" == field) {
		displayChange_field_fecha_solicitud(row, status);
	}
	if ("idestado" == field) {
		displayChange_field_idestado(row, status);
	}
	if ("factura_revision" == field) {
		displayChange_field_factura_revision(row, status);
	}
	if ("factura_acople" == field) {
		displayChange_field_factura_acople(row, status);
	}
	if ("idtipo_movilizacion" == field) {
		displayChange_field_idtipo_movilizacion(row, status);
	}
	if ("idregimen_aduanero" == field) {
		displayChange_field_idregimen_aduanero(row, status);
	}
	if ("maga" == field) {
		displayChange_field_maga(row, status);
	}
	if ("sgaia" == field) {
		displayChange_field_sgaia(row, status);
	}
	if ("sat" == field) {
		displayChange_field_sat(row, status);
	}
	if ("dipafront" == field) {
		displayChange_field_dipafront(row, status);
	}
	if ("ucc" == field) {
		displayChange_field_ucc(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("idcabezal" == field) {
		displayChange_field_idcabezal(row, status);
	}
	if ("contenedor" == field) {
		displayChange_field_contenedor(row, status);
	}
	if ("idmedida" == field) {
		displayChange_field_idmedida(row, status);
	}
	if ("idnaviera" == field) {
		displayChange_field_idnaviera(row, status);
	}
	if ("idselectivo" == field) {
		displayChange_field_idselectivo(row, status);
	}
	if ("idtipodecarga" == field) {
		displayChange_field_idtipodecarga(row, status);
	}
	if ("idconsignatario" == field) {
		displayChange_field_idconsignatario(row, status);
	}
	if ("idcontenido" == field) {
		displayChange_field_idcontenido(row, status);
	}
	if ("bl" == field) {
		displayChange_field_bl(row, status);
	}
	if ("cantidad_por_bl" == field) {
		displayChange_field_cantidad_por_bl(row, status);
	}
	if ("idviaje_importacion" == field) {
		displayChange_field_idviaje_importacion(row, status);
	}
	if ("iddestino" == field) {
		displayChange_field_iddestino(row, status);
	}
	if ("ubicacion" == field) {
		displayChange_field_ubicacion(row, status);
	}
	if ("idrampa" == field) {
		displayChange_field_idrampa(row, status);
	}
	if ("idfuncionario" == field) {
		displayChange_field_idfuncionario(row, status);
	}
	if ("idgestor_aduanal" == field) {
		displayChange_field_idgestor_aduanal(row, status);
	}
	if ("idestado_revision" == field) {
		displayChange_field_idestado_revision(row, status);
	}
	if ("sec_users_login" == field) {
		displayChange_field_sec_users_login(row, status);
	}
	if ("codigo_revision" == field) {
		displayChange_field_codigo_revision(row, status);
	}
}

function displayChange_field_fecha_solicitud(row, status) {
}

function displayChange_field_idestado(row, status) {
}

function displayChange_field_factura_revision(row, status) {
}

function displayChange_field_factura_acople(row, status) {
}

function displayChange_field_idtipo_movilizacion(row, status) {
}

function displayChange_field_idregimen_aduanero(row, status) {
}

function displayChange_field_maga(row, status) {
}

function displayChange_field_sgaia(row, status) {
}

function displayChange_field_sat(row, status) {
}

function displayChange_field_dipafront(row, status) {
}

function displayChange_field_ucc(row, status) {
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_idcabezal(row, status) {
}

function displayChange_field_contenedor(row, status) {
}

function displayChange_field_idmedida(row, status) {
}

function displayChange_field_idnaviera(row, status) {
}

function displayChange_field_idselectivo(row, status) {
}

function displayChange_field_idtipodecarga(row, status) {
}

function displayChange_field_idconsignatario(row, status) {
}

function displayChange_field_idcontenido(row, status) {
}

function displayChange_field_bl(row, status) {
}

function displayChange_field_cantidad_por_bl(row, status) {
}

function displayChange_field_idviaje_importacion(row, status) {
}

function displayChange_field_iddestino(row, status) {
}

function displayChange_field_ubicacion(row, status) {
}

function displayChange_field_idrampa(row, status) {
}

function displayChange_field_idfuncionario(row, status) {
}

function displayChange_field_idgestor_aduanal(row, status) {
}

function displayChange_field_idestado_revision(row, status) {
}

function displayChange_field_sec_users_login(row, status) {
}

function displayChange_field_codigo_revision(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_revision_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(25);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha_solicitud" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_solicitud" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha_solicitud']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_solicitud']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_revision_mob_validate_fecha_solicitud(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_solicitud']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  $('#sc_btgp_btn_' + sGroup).addClass('selected');
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup, false);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup, bForce) {
  if (bForce || 'over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
    $('#sc_btgp_btn_' + sGroup).addClass('selected');
  }
}
