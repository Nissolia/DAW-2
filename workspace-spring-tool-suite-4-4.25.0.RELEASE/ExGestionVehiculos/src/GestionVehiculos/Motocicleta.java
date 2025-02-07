package GestionVehiculos;

public class Motocicleta extends Vehiculo implements Vendible {
	private String cilindrada;
	private String tipoCarenado;

	// Constructor
	public Motocicleta(String marca, String modelo, float precio, String cilindrada, String tipoCarenado) {
		super(marca, modelo, precio);
		this.cilindrada = cilindrada;
		this.tipoCarenado = tipoCarenado;
	}

	// Getter y setter

	public String getCilindrada() {
		return cilindrada;
	}

	public void setCilindrada(String cilindrada) {
		this.cilindrada = cilindrada;
	}

	public String getTipoCarenado() {
		return tipoCarenado;
	}

	public void setTipoCarenado(String tipoCarenado) {
		this.tipoCarenado = tipoCarenado;
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
	    public String toString() {
	        return super.toString() + ", Motocicleta [cilindrada=" + cilindrada + ", tipoCarenado=" + tipoCarenado + "]";
	    }
	@Override
	public void vender(Cliente cliente) {
	    // Lógica para marcar el vehículo como vendido (puedes agregar un flag `vendido` en Vehiculo)
	    cliente.agregarVehiculoComprado(this);
	    System.out.println("Motocicleta vendida a " + cliente);
	}


	
	
}
