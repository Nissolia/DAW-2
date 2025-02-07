const ERROR_MES = "Mes incorrecto";

function primerLunesUltimoDomingo(año, mes) {
	// Escribe aquí tu código
	let mesDig = parseInt(mes);
	let anioDig = parseInt(año);
	let primerL = 0;
	let ultimoD = 0;
	if (mes < 1 || mes > 12) {
		throw new Error(ERROR_MES);
	} else {
		let fecha = new Date(anioDig - mesDig - 1);

		let mesLimite = mesDig;
		do {
			if (fecha.getDay() == 0) {
				primerL = fecha.getDate();
			} else if (fecha.getDay() == 6) {
				ultimoD = fecha.getDate();
			}
			fecha.setDate(fecha.getDate() + 1);

		} while (fecha.getMonth() == mesLimite);

	}
	let obj = {
		primerLunes: primerL,
		ultimoDomingo: ultimoD
	}
	return obj;

}