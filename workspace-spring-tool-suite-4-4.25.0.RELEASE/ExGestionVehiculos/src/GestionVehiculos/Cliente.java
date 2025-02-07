package GestionVehiculos;

import java.util.ArrayList;

public class Cliente {
	private String nombre;
	private String apellido;
	private String ID;
	private ArrayList<Vehiculo> vehiculosComprados;

	public Cliente(String nombre, String apellido, String ID) {
		this.nombre = nombre;
		this.apellido = apellido;
		this.ID = ID;
		this.vehiculosComprados = new ArrayList<>();
	}

	public void agregarVehiculoComprado(Vehiculo vehiculo) {
		vehiculosComprados.add(vehiculo);
	}

	// Getters
	public String getNombre() {
		return nombre;
	}

	public String getApellido() {
		return apellido;
	}

	public String getID() {
		return ID;
	}

	public ArrayList<Vehiculo> getVehiculosComprados() {
		return vehiculosComprados;
	}

	@Override
	public String toString() {
		return nombre + " " + apellido + " (ID: " + ID + ")";
	}
}
