package ej_4POO_g;

public class Persona {
	// ATRIBUTOS
	private String nombre = "";
	private String dni;
	private int edad = 0;
	private char sexo = 'H';
	private double peso = 0;
	private double altura = 0;

	// Constante para el sexo por defecto
	private static final char S_DEFAULT = 'H';

	// CONSTRUCTORES
	public Persona() {
		this.dni = generaDNI();
	}

	public Persona(String nombre, int edad, char sexo) {
		this.nombre = nombre;
		this.edad = edad;
		this.sexo = comprobarSexo(sexo);
		this.dni = generaDNI();
	}

	public Persona(String nombre, int edad, char sexo, double peso, double altura) {
		this.nombre = nombre;
		this.edad = edad;
		this.sexo = comprobarSexo(sexo);
		this.peso = peso;
		this.altura = altura;
		this.dni = generaDNI();
	}

	// GETTERS Y SETTERS
	public String getNombre() {
		return nombre;
	}

	public String getDni() {
		return dni;
	}

	public int getEdad() {
		return edad;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public void setEdad(int edad) {
		this.edad = edad;
	}

	public char getSexo() {
		return sexo;
	}

	public void setSexo(char sexo) {
		this.sexo = comprobarSexo(sexo);
	}

	public double getPeso() {
		return peso;
	}

	public void setPeso(double peso) {
		this.peso = peso;
	}

	public double getAltura() {
		return altura;
	}

	public void setAltura(double altura) {
		this.altura = altura;
	}

	/******** MÉTODOS ********/
	/*
	 * Calculara si la persona esta en su peso ideal (peso en kg/(altura^2 en m)),
	 * si esta fórmula devuelve un valor menor que 20, la función devuelve un -1, si
	 * devuelve un número entre 20 y 25 (incluidos), significa que esta por debajo
	 * de su peso ideal la función devuelve un 0 y si devuelve un valor mayor que 25
	 * significa que tiene sobrepeso, la función devuelve un 1.
	 */
	public int calcularIMC() {
		if (altura == 0) {
			// Para evitar división por cero
			return 0;
		}
		double imc = peso / (altura * altura);
		if (imc < 20) {
			// Por debajo del peso ideal
			return -1;
		} else if (imc >= 20 && imc <= 25) {
			// Peso ideal
			return 0;
		} else {
			// Sobrepeso
			return 1;
		}
	}

	/* Indica si es mayor de edad, devuelve un booleano. */
	public boolean esMayorDeEdad() {
		return edad >= 18;
	}

	/*
	 * Comprueba que el sexo introducido es correcto. Si no es correcto, sera H. No
	 * sera visible al exterior.
	 */
	private char comprobarSexo(char sexo) {
		if (sexo != 'H' && sexo != 'M') {
			return S_DEFAULT;
		}
		return sexo;
	}

	/*
	 * Genera un número aleatorio de 8 cifras, genera a partir de este su número su
	 * letra correspondiente. Este método sera invocado cuando se construya el
	 * objeto. Puedes dividir el método para que te sea más fácil. No será visible
	 * al exterior.
	 */
	private String generaDNI() {
		int numero = (int) (Math.random() * (99999999 - 11111111 + 1)) + 11111111;
		char letra = calcularLetraDNI(numero);
		// Convertir el número a String y concatenar con la letra
		return Integer.toString(numero) + letra;
	}

	/* Generar letra del DNI */
	private char calcularLetraDNI(int numero) {
		char[] letras = { 'T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H',
				'L', 'C', 'K', 'E', 'T' };
		return letras[numero % 23];
	}

	/* Devuelve toda la información del objeto. */
	@Override
	public String toString() {
		return "Nombre: " + nombre + "\nDNI: " + dni + "\nEdad: " + edad + "\nSexo: " + sexo + "\nPeso: " + peso
				+ " kg\nAltura: " + altura + " m";
	}
}
