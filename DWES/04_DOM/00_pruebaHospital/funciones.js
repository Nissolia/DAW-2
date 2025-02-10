document.addEventListener("DOMContentLoaded", function () {
    // Poblar el seguro médico
    const seguros = [
      "Seleccionar",
      "Adeslas",
      "Asisa",
      "Caser Salud",
      "DKV",
      "Mapfre",
      "Sanitas",
    ];
    const seguroMedico = document.getElementById("seguro-medico");
    seguros.forEach((seguro) => {
      const option = document.createElement("option");
      option.value = seguro;
      option.textContent = seguro;
      seguroMedico.appendChild(option);
    });
  
    // Activar/desactivar especialidad
    const medicoFamilia = document.getElementById("medico-familia");
    const medicoEspecialista = document.getElementById("medico-especialista");
    const especialidad = document.getElementById("especialidad");
  
    medicoFamilia.addEventListener("change", () => {
      especialidad.disabled = true;
      especialidad.value = "";
    });
  
    medicoEspecialista.addEventListener("change", () => {
      especialidad.disabled = false;
    });
  
    // Validar formulario al enviar
    const formulario = document.getElementById("formulario-cita");
    formulario.addEventListener("submit", function (e) {
      e.preventDefault(); // Evitar el envío
  
      // Resetear errores
      document.querySelectorAll(".error").forEach((error) => (error.textContent = ""));
  
      let valido = true;
  
      // Validar nombre y apellidos
      const nombre = document.getElementById("nombre").value.trim();
      const apellidos = document.getElementById("apellidos").value.trim();
  
      if (!nombre) {
        document.getElementById("error-nombre").textContent = "El nombre es obligatorio.";
        valido = false;
      }
  
      if (!apellidos) {
        document.getElementById("error-apellidos").textContent = "Los apellidos son obligatorios.";
        valido = false;
      }
  
      // Validar DNI
      const dni = document.getElementById("dni").value.trim().toUpperCase();
      const dniRegex = /^[0-9]{8}[A-Z]$/;
      if (!dniRegex.test(dni)) {
        document.getElementById("error-dni").textContent = "Formato de DNI no válido.";
        valido = false;
      } else {
        const letrasDNI = "TRWAGMYFPDXBNJZSQVHLCKE";
        const numeroDNI = parseInt(dni.slice(0, -1), 10);
        const letraDNI = dni.slice(-1);
        if (letrasDNI[numeroDNI % 23] !== letraDNI) {
          document.getElementById("error-dni").textContent = "La letra del DNI no es válida.";
          valido = false;
        }
      }
  
      // Validar seguro médico
      if (seguroMedico.value === "Seleccionar") {
        document.getElementById("error-seguro").textContent = "El seguro médico es obligatorio.";
        valido = false;
      }
  
      // Validar especialidad si se selecciona "Médico especialista"
      if (medicoEspecialista.checked && !especialidad.value) {
        document.getElementById("error-especialidad").textContent =
          "Debe seleccionar una especialidad.";
        valido = false;
      }
  
      // Validar fecha
      const fecha = new Date(document.getElementById("fecha").value);
      const diaSemana = fecha.getDay(); // 1 = lunes, ..., 4 = jueves
      if (isNaN(fecha) || diaSemana < 1 || diaSemana > 4) {
        document.getElementById("error-fecha").textContent =
          "El día de la cita sólo puede ser de lunes a jueves.";
        valido = false;
      }
  
      // Validar hora
      const hora = document.getElementById("hora").value;
      const [horas, minutos] = hora.split(":").map(Number);
  
      if (diaSemana >= 1 && diaSemana <= 3) {
        // Lunes a miércoles: 10:00 a 14:15
        if (horas < 10 || (horas === 14 && minutos > 15) || horas > 14) {
          document.getElementById("error-hora").textContent =
            "La hora debe estar entre 10:00 y 14:15.";
          valido = false;
        }
      } else if (diaSemana === 4) {
        // Jueves: 18:30 a 20:00
        if (horas < 18 || (horas === 18 && minutos < 30) || horas > 20) {
          document.getElementById("error-hora").textContent =
            "La hora debe estar entre 18:30 y 20:00.";
          valido = false;
        }
      }
  
      if (valido) {
        alert("Formulario enviado correctamente.");
        formulario.reset(); // Reiniciar el formulario
      }
    });
  });
  