
const ERROR_FECHA_NOVALIDA="Solo es válido pm o am";

function parsearFechaHora(fechaHoraStr) {
    // Validamos que la cadena contenga AM o PM
    const regex = /^(\d{1,2})\/(\d{1,2})\/(\d{4}) (\d{1,2}):(\d{2}):(\d{2}) (am|pm)$/;
    const resultado = fechaHoraStr.match(regex);
  
    if (!resultado) {
      throw new Error("Formato de fecha y hora no válido.");
    }
  
    const dia = parseInt(resultado[1], 10);
    const mes = parseInt(resultado[2], 10) - 1;  // Los meses en JavaScript empiezan desde 0
    const anio = parseInt(resultado[3], 10);
    let horas = parseInt(resultado[4], 10);
    const minutos = parseInt(resultado[5], 10);
    const segundos = parseInt(resultado[6], 10);
    const periodo = resultado[7];  // AM o PM
  
    // Ajustamos la hora si es PM y no es 12 PM
    if (periodo === "pm" && horas !== 12) {
      horas += 12;
    }
  
    // Ajustamos la hora si es AM y es 12 AM (medianoche)
    if (periodo === "am" && horas === 12) {
      horas = 0;
    }
  
    // Devolvemos un objeto Date con la fecha y hora ajustada
    return new Date(anio, mes, dia, horas, minutos, segundos);
  }
  

