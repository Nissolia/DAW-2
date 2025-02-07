package proyectoVehiculos;

public class Coche implements Vehiculo, CreacionMantenimientoAp4 {

	@Override
	public String getTareas() {
		return "Coche conduce por ciudad";
	}

	// Paso 1
	// Apartado 4 Inyeccion de dependencias
	@Override
	public String getMantenimiento() {
		return "Mantenimiento realizado en coche" + creacion.getMantenimiento();
	}

	// Paso 2
	private CreacionMantenimientoAp4 creacion;

	// Paso 3
	// Creación del constructor en la clase (Mantenimiento) para la
	// inyección de la dependencia.
	public Coche(CreacionMantenimientoAp4 creacion) {
		this.creacion = creacion; // Inyección de la dependencia
	}
	// Paso 4 --> Vincular el bean en archivo XML
}
