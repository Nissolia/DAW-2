class Alumno {
	constructor(nombreCompleto, curso, dominio, notas = []) {
		this.nombreCompleto = nombreCompleto;
		this.curso = curso;
		this.dominio = dominio;
		this.notas = notas;
		this.correo = this.generarCorreo();
	}

	// Método para generar el correo basado en el nombre completo y dominio
	generarCorreo() {
		// Dividimos el nombre completo por ";"
		const partes = this.nombreCompleto.split(';');
		const apellidos = [];
		for (let i = 0; i < partes.length - 1; i++) {
			apellidos.push(partes[i].trim().toLowerCase()); // Añadir apellidos al array
		}
		const nombre = partes[partes.length - 1].trim().toLowerCase(); // Última parte es el nombre

		// Convertimos los apellidos y nombre al formato correcto
		const inicialNombre = nombre[0]; // Primera letra del nombre
		let apellidosConcat = '';
		for (let i = 0; i < apellidos.length; i++) {
			if (i > 0) {
				apellidosConcat += '-'; // Añadir guion entre apellidos
			}
			apellidosConcat += apellidos[i]; // Concatenar cada apellido
		}

		// Generamos el correo
		return `${inicialNombre}.${apellidosConcat}@${this.dominio}`;
	}

	// Getter para obtener el nombre de pila
	get nombrePila() {
		const partes = this.nombreCompleto.split(';');
		return partes[partes.length - 1].trim(); // Devuelve el último nombre limpio de espacios
	}

	// Método para calcular la nota media
	notaMedia() {
		if (this.notas.length === 0) {
			return -1; // Si no hay notas, devolvemos -1
		}

		// Sumar las notas manualmente
		let suma = 0;
		for (let i = 0; i < this.notas.length; i++) {
			suma += this.notas[i];
		}
		const media = suma / this.notas.length;

		// Redondeamos a un decimal
		return Math.round(media * 10) / 10;
	}

	// Método para añadir una o varias notas a la vez
	añadirNota(...nuevasNotas) {
		for (let i = 0; i < nuevasNotas.length; i++) {
			this.notas.push(nuevasNotas[i]);
		}
	}
}
