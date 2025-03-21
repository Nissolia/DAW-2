package BanosJimenezNoelia;

public class Espectador {
	String nombre;
	int edad;
	double dineroEncima;
	boolean tarjeta = false;
	double entrada = 0;
	boolean apto = false;
	boolean tieneAsiento = false;

	public Espectador(String nombre, int edad, double dineroEncima, boolean tarjeta) {

		this.nombre = nombre;
		this.edad = edad;
		this.dineroEncima = dineroEncima;
		this.tarjeta = tarjeta;
	}

// getter y setters
	
	public String getNombre() {
		return nombre;
	}

	public boolean isTieneAsiento() {
		return tieneAsiento;
	}

	public void setTieneAsiento(boolean tieneAsiento) {
		this.tieneAsiento = tieneAsiento;
	}

	public boolean isApto() {
		return apto;
	}

	public void setApto(boolean apto) {
		this.apto = apto;
	}

	public double getEntrada() {
		return entrada;
	}

	public void setEntrada(double entrada) {
		this.entrada = entrada;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public int getEdad() {
		return edad;
	}

	public void setEdad(int edad) {
		this.edad = edad;
	}

	public boolean isTarjeta() {
		return tarjeta;
	}

	public void setTarjeta(boolean tarjeta) {
		this.tarjeta = tarjeta;
	}

	public double getDineroEncima() {
		return dineroEncima;
	}

	public void setDineroEncima(double dineroEncima) {
		this.dineroEncima = dineroEncima;
	}

	@Override
	public String toString() {
		String frase = "NO";
		if (tarjeta == true) {
			frase = "SI";
		}
		return "Nombre del espectador es " + nombre + ", de " + edad + " , con " + dineroEncima + " euros encima. "
				+ frase + " tiene tarjeta de descuento.";
	}

}
