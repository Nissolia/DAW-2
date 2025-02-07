package Ej_2String;

@SuppressWarnings("serial")
public class ExceptionMiFecha extends Exception {

	public ExceptionMiFecha(String mensaje) {
		super(mensaje);
	}

	public ExceptionMiFecha() {
		super("Excepción de fecha personalizada.");
	}
}
