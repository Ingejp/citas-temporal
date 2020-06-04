
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
  scEventControl_data["idocupacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ocupaciondry" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ocupacionreefer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ocupacionteu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalocupacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importdry" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importreefer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importteu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalimport" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disponibledry" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disponiblereefer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disponibleteu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totaldisponible" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["exportdry" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["exportreefer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["exportteu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalexport" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["despachodry" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["despachoreefer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["despachoteu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totaldespacho" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idocupacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idocupacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ocupaciondry" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ocupaciondry" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ocupacionreefer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ocupacionreefer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ocupacionteu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ocupacionteu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalocupacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalocupacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importdry" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importdry" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importreefer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importreefer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importteu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importteu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalimport" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalimport" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disponibledry" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disponibledry" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disponiblereefer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disponiblereefer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disponibleteu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disponibleteu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totaldisponible" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totaldisponible" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["exportdry" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["exportdry" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["exportreefer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["exportreefer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["exportteu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["exportteu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalexport" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalexport" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["despachodry" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["despachodry" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["despachoreefer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["despachoreefer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["despachoteu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["despachoteu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totaldespacho" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totaldespacho" + iSeqRow]["change"]) {
    return true;
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
  $('#id_sc_field_idocupacion' + iSeqRow).bind('blur', function() { sc_form_ocupacion_idocupacion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ocupacion_idocupacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('blur', function() { sc_form_ocupacion_fecha_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_ocupacion_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_ocupaciondry' + iSeqRow).bind('blur', function() { sc_form_ocupacion_ocupaciondry_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ocupacion_ocupaciondry_onfocus(this, iSeqRow) });
  $('#id_sc_field_ocupacionreefer' + iSeqRow).bind('blur', function() { sc_form_ocupacion_ocupacionreefer_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_ocupacion_ocupacionreefer_onfocus(this, iSeqRow) });
  $('#id_sc_field_ocupacionteu' + iSeqRow).bind('blur', function() { sc_form_ocupacion_ocupacionteu_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ocupacion_ocupacionteu_onfocus(this, iSeqRow) });
  $('#id_sc_field_importdry' + iSeqRow).bind('blur', function() { sc_form_ocupacion_importdry_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ocupacion_importdry_onfocus(this, iSeqRow) });
  $('#id_sc_field_importreefer' + iSeqRow).bind('blur', function() { sc_form_ocupacion_importreefer_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ocupacion_importreefer_onfocus(this, iSeqRow) });
  $('#id_sc_field_importteu' + iSeqRow).bind('blur', function() { sc_form_ocupacion_importteu_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ocupacion_importteu_onfocus(this, iSeqRow) });
  $('#id_sc_field_disponibledry' + iSeqRow).bind('blur', function() { sc_form_ocupacion_disponibledry_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_ocupacion_disponibledry_onfocus(this, iSeqRow) });
  $('#id_sc_field_disponiblereefer' + iSeqRow).bind('blur', function() { sc_form_ocupacion_disponiblereefer_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_ocupacion_disponiblereefer_onfocus(this, iSeqRow) });
  $('#id_sc_field_disponibleteu' + iSeqRow).bind('blur', function() { sc_form_ocupacion_disponibleteu_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_ocupacion_disponibleteu_onfocus(this, iSeqRow) });
  $('#id_sc_field_exportdry' + iSeqRow).bind('blur', function() { sc_form_ocupacion_exportdry_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ocupacion_exportdry_onfocus(this, iSeqRow) });
  $('#id_sc_field_exportreefer' + iSeqRow).bind('blur', function() { sc_form_ocupacion_exportreefer_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ocupacion_exportreefer_onfocus(this, iSeqRow) });
  $('#id_sc_field_exportteu' + iSeqRow).bind('blur', function() { sc_form_ocupacion_exportteu_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ocupacion_exportteu_onfocus(this, iSeqRow) });
  $('#id_sc_field_despachodry' + iSeqRow).bind('blur', function() { sc_form_ocupacion_despachodry_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ocupacion_despachodry_onfocus(this, iSeqRow) });
  $('#id_sc_field_despachoreefer' + iSeqRow).bind('blur', function() { sc_form_ocupacion_despachoreefer_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_ocupacion_despachoreefer_onfocus(this, iSeqRow) });
  $('#id_sc_field_despachoteu' + iSeqRow).bind('blur', function() { sc_form_ocupacion_despachoteu_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ocupacion_despachoteu_onfocus(this, iSeqRow) });
  $('#id_sc_field_totalocupacion' + iSeqRow).bind('blur', function() { sc_form_ocupacion_totalocupacion_onblur(this, iSeqRow) })
                                            .bind('click', function() { sc_form_ocupacion_totalocupacion_onclick(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_ocupacion_totalocupacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_totalimport' + iSeqRow).bind('blur', function() { sc_form_ocupacion_totalimport_onblur(this, iSeqRow) })
                                         .bind('click', function() { sc_form_ocupacion_totalimport_onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ocupacion_totalimport_onfocus(this, iSeqRow) });
  $('#id_sc_field_totaldespacho' + iSeqRow).bind('blur', function() { sc_form_ocupacion_totaldespacho_onblur(this, iSeqRow) })
                                           .bind('click', function() { sc_form_ocupacion_totaldespacho_onclick(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_ocupacion_totaldespacho_onfocus(this, iSeqRow) });
  $('#id_sc_field_totaldisponible' + iSeqRow).bind('blur', function() { sc_form_ocupacion_totaldisponible_onblur(this, iSeqRow) })
                                             .bind('click', function() { sc_form_ocupacion_totaldisponible_onclick(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_ocupacion_totaldisponible_onfocus(this, iSeqRow) });
  $('#id_sc_field_totalexport' + iSeqRow).bind('blur', function() { sc_form_ocupacion_totalexport_onblur(this, iSeqRow) })
                                         .bind('click', function() { sc_form_ocupacion_totalexport_onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ocupacion_totalexport_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_ocupacion_idocupacion_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_idocupacion();
  scCssBlur(oThis);
}

function sc_form_ocupacion_idocupacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_ocupacion_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_ocupaciondry_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_ocupaciondry();
  scCssBlur(oThis);
}

function sc_form_ocupacion_ocupaciondry_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_ocupacionreefer_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_ocupacionreefer();
  scCssBlur(oThis);
}

function sc_form_ocupacion_ocupacionreefer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_ocupacionteu_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_ocupacionteu();
  scCssBlur(oThis);
}

function sc_form_ocupacion_ocupacionteu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_importdry_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_importdry();
  scCssBlur(oThis);
}

function sc_form_ocupacion_importdry_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_importreefer_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_importreefer();
  scCssBlur(oThis);
}

function sc_form_ocupacion_importreefer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_importteu_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_importteu();
  scCssBlur(oThis);
}

function sc_form_ocupacion_importteu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_disponibledry_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_disponibledry();
  scCssBlur(oThis);
}

function sc_form_ocupacion_disponibledry_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_disponiblereefer_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_disponiblereefer();
  scCssBlur(oThis);
}

function sc_form_ocupacion_disponiblereefer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_disponibleteu_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_disponibleteu();
  scCssBlur(oThis);
}

function sc_form_ocupacion_disponibleteu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_exportdry_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_exportdry();
  scCssBlur(oThis);
}

function sc_form_ocupacion_exportdry_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_exportreefer_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_exportreefer();
  scCssBlur(oThis);
}

function sc_form_ocupacion_exportreefer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_exportteu_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_exportteu();
  scCssBlur(oThis);
}

function sc_form_ocupacion_exportteu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_despachodry_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_despachodry();
  scCssBlur(oThis);
}

function sc_form_ocupacion_despachodry_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_despachoreefer_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_despachoreefer();
  scCssBlur(oThis);
}

function sc_form_ocupacion_despachoreefer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_despachoteu_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_despachoteu();
  scCssBlur(oThis);
}

function sc_form_ocupacion_despachoteu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_totalocupacion_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_totalocupacion();
  scCssBlur(oThis);
}

function sc_form_ocupacion_totalocupacion_onclick(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_event_totalocupacion_onclick();
}

function sc_form_ocupacion_totalocupacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_totalimport_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_totalimport();
  scCssBlur(oThis);
}

function sc_form_ocupacion_totalimport_onclick(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_event_totalimport_onclick();
}

function sc_form_ocupacion_totalimport_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_totaldespacho_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_totaldespacho();
  scCssBlur(oThis);
}

function sc_form_ocupacion_totaldespacho_onclick(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_event_totaldespacho_onclick();
}

function sc_form_ocupacion_totaldespacho_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_totaldisponible_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_totaldisponible();
  scCssBlur(oThis);
}

function sc_form_ocupacion_totaldisponible_onclick(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_event_totaldisponible_onclick();
}

function sc_form_ocupacion_totaldisponible_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ocupacion_totalexport_onblur(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_validate_totalexport();
  scCssBlur(oThis);
}

function sc_form_ocupacion_totalexport_onclick(oThis, iSeqRow) {
  do_ajax_form_ocupacion_mob_event_totalexport_onclick();
}

function sc_form_ocupacion_totalexport_onfocus(oThis, iSeqRow) {
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
	if ("5" == block) {
		displayChange_block_5(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idocupacion", "", status);
	displayChange_field("fecha", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("ocupaciondry", "", status);
	displayChange_field("ocupacionreefer", "", status);
	displayChange_field("ocupacionteu", "", status);
	displayChange_field("totalocupacion", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("importdry", "", status);
	displayChange_field("importreefer", "", status);
	displayChange_field("importteu", "", status);
	displayChange_field("totalimport", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("disponibledry", "", status);
	displayChange_field("disponiblereefer", "", status);
	displayChange_field("disponibleteu", "", status);
	displayChange_field("totaldisponible", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("exportdry", "", status);
	displayChange_field("exportreefer", "", status);
	displayChange_field("exportteu", "", status);
	displayChange_field("totalexport", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("despachodry", "", status);
	displayChange_field("despachoreefer", "", status);
	displayChange_field("despachoteu", "", status);
	displayChange_field("totaldespacho", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idocupacion(row, status);
	displayChange_field_fecha(row, status);
	displayChange_field_ocupaciondry(row, status);
	displayChange_field_ocupacionreefer(row, status);
	displayChange_field_ocupacionteu(row, status);
	displayChange_field_totalocupacion(row, status);
	displayChange_field_importdry(row, status);
	displayChange_field_importreefer(row, status);
	displayChange_field_importteu(row, status);
	displayChange_field_totalimport(row, status);
	displayChange_field_disponibledry(row, status);
	displayChange_field_disponiblereefer(row, status);
	displayChange_field_disponibleteu(row, status);
	displayChange_field_totaldisponible(row, status);
	displayChange_field_exportdry(row, status);
	displayChange_field_exportreefer(row, status);
	displayChange_field_exportteu(row, status);
	displayChange_field_totalexport(row, status);
	displayChange_field_despachodry(row, status);
	displayChange_field_despachoreefer(row, status);
	displayChange_field_despachoteu(row, status);
	displayChange_field_totaldespacho(row, status);
}

function displayChange_field(field, row, status) {
	if ("idocupacion" == field) {
		displayChange_field_idocupacion(row, status);
	}
	if ("fecha" == field) {
		displayChange_field_fecha(row, status);
	}
	if ("ocupaciondry" == field) {
		displayChange_field_ocupaciondry(row, status);
	}
	if ("ocupacionreefer" == field) {
		displayChange_field_ocupacionreefer(row, status);
	}
	if ("ocupacionteu" == field) {
		displayChange_field_ocupacionteu(row, status);
	}
	if ("totalocupacion" == field) {
		displayChange_field_totalocupacion(row, status);
	}
	if ("importdry" == field) {
		displayChange_field_importdry(row, status);
	}
	if ("importreefer" == field) {
		displayChange_field_importreefer(row, status);
	}
	if ("importteu" == field) {
		displayChange_field_importteu(row, status);
	}
	if ("totalimport" == field) {
		displayChange_field_totalimport(row, status);
	}
	if ("disponibledry" == field) {
		displayChange_field_disponibledry(row, status);
	}
	if ("disponiblereefer" == field) {
		displayChange_field_disponiblereefer(row, status);
	}
	if ("disponibleteu" == field) {
		displayChange_field_disponibleteu(row, status);
	}
	if ("totaldisponible" == field) {
		displayChange_field_totaldisponible(row, status);
	}
	if ("exportdry" == field) {
		displayChange_field_exportdry(row, status);
	}
	if ("exportreefer" == field) {
		displayChange_field_exportreefer(row, status);
	}
	if ("exportteu" == field) {
		displayChange_field_exportteu(row, status);
	}
	if ("totalexport" == field) {
		displayChange_field_totalexport(row, status);
	}
	if ("despachodry" == field) {
		displayChange_field_despachodry(row, status);
	}
	if ("despachoreefer" == field) {
		displayChange_field_despachoreefer(row, status);
	}
	if ("despachoteu" == field) {
		displayChange_field_despachoteu(row, status);
	}
	if ("totaldespacho" == field) {
		displayChange_field_totaldespacho(row, status);
	}
}

function displayChange_field_idocupacion(row, status) {
}

function displayChange_field_fecha(row, status) {
}

function displayChange_field_ocupaciondry(row, status) {
}

function displayChange_field_ocupacionreefer(row, status) {
}

function displayChange_field_ocupacionteu(row, status) {
}

function displayChange_field_totalocupacion(row, status) {
}

function displayChange_field_importdry(row, status) {
}

function displayChange_field_importreefer(row, status) {
}

function displayChange_field_importteu(row, status) {
}

function displayChange_field_totalimport(row, status) {
}

function displayChange_field_disponibledry(row, status) {
}

function displayChange_field_disponiblereefer(row, status) {
}

function displayChange_field_disponibleteu(row, status) {
}

function displayChange_field_totaldisponible(row, status) {
}

function displayChange_field_exportdry(row, status) {
}

function displayChange_field_exportreefer(row, status) {
}

function displayChange_field_exportteu(row, status) {
}

function displayChange_field_totalexport(row, status) {
}

function displayChange_field_despachodry(row, status) {
}

function displayChange_field_despachoreefer(row, status) {
}

function displayChange_field_despachoteu(row, status) {
}

function displayChange_field_totaldespacho(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_ocupacion_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
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
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_ocupacion_mob_validate_fecha(iSeqRow); }, 200);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
