function comprobarLatitud(latitud) {
  // Expresión regular para validar latitudes en formato "gradosº minutos' segundos'' N/S"
  const regex = /^(\d{1,2})º\s(\d{1,2})'\s(\d{1,2})''\s([NS])$/;
  const resultado = latitud.match(regex);

  if (!resultado) {
    return false; // Si no coincide con el formato esperado
  }

  const grados = parseInt(resultado[1]);
  const minutos = parseInt(resultado[2]);
  const segundos = parseInt(resultado[3]);
  const direccion = resultado[4];

  // Comprobaciones de rango
  if (grados < 0 || grados > 89) {
    return false; // Los grados deben estar entre 0 y 89
  }
  if (minutos < 0 || minutos > 59) {
    return false; // Los minutos deben estar entre 0 y 59
  }
  if (segundos < 0 || segundos > 59) {
    return false; // Los segundos deben estar entre 0 y 59
  }
  if (direccion !== 'N' && direccion !== 'S') {
    return false; // La dirección debe ser 'N' o 'S'
  }

  return true; // Si todas las comprobaciones son correctas
}
