package Apartado1_6proyectovehiculosmejorado;

import org.springframework.context.annotation.AnnotationConfigApplicationContext;

public class PruebaPropertySource_Value {

	public static void main(String[] args) {
		AnnotationConfigApplicationContext miContexto = new AnnotationConfigApplicationContext(Config.class);

		TransbordadorEspacialConAnotacionBeanEjemploPropertySourceyValue transbordador = miContexto.getBean("transbordadorEspacialConAnotacionBean", TransbordadorEspacialConAnotacionBeanEjemploPropertySourceyValue.class);
		
		System.out.println("El vehículo ha costado "+transbordador.getPrecio() +" y tiene una velocidad de "+transbordador.getVelocidad());

		// Paso 4: Cerramos el bean.
		miContexto.close();

	}

}