package GestionVehiculos;

public class Automovil extends Vehiculo implements Vendible {
	private String tipoMotor;
	private boolean EsDescapotable;

	// Constructor
	public Automovil(String marca, String modelo, float precio, String tipoMotor, boolean esDescapotable) {
		super(marca, modelo, precio);
		this.tipoMotor = tipoMotor;
		EsDescapotable = esDescapotable;
	}

	// Getter y setter
	public String getTipoMotor() {
		return tipoMotor;
	}

	public void setTipoMotor(String tipoMotor) {
		this.tipoMotor = tipoMotor;
	}

	public boolean isEsDescapotable() {
		return EsDescapotable;
	}

	public void setEsDescapotable(boolean esDescapotable) {
		EsDescapotable = esDescapotable;
	}

	// Métodos heredados de la interfaz
	@Override
	public void vender() {
		// TODO Auto-generated method stub

	}

	@Override
	public double calcularDescuento() {
		// TODO Auto-generated method stub
		return 0;
	}
	@Override
	public void vender(Cliente cliente) {
	    // Lógica para marcar el vehículo como vendido (puedes agregar un flag `vendido` en Vehiculo)
	    cliente.agregarVehiculoComprado(this);
	    System.out.println("Automóvil vendido a " + cliente);
	}


}
