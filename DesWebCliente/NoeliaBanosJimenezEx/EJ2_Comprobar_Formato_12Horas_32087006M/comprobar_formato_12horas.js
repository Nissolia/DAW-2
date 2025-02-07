// Formato h:mm am|pm (ej. 8:12 pm, 12:15 am)
function comprobarHora(fechaHoraStr) {
    //quitamos los espacios sobrantes
    const trimHora = fechaHoraStr.trim();
    const exRegular = /^([1-12]{1,2}):([0-59]{2})\s(am|pm)$/;

    return exRegular.test(trimHora);
}