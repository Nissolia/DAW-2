package Apartado1_6proyectovehiculosmejorado;

import org.springframework.context.annotation.AnnotationConfigApplicationContext;

public class PruebaVehiculoMejorado2PruebaBeanTransbordadorEspacial {

	public static void main(String[] args) {
		//Paso 1: Leer el class de config:
		AnnotationConfigApplicationContext miContexto = new AnnotationConfigApplicationContext(Config.class);
		// Paso 2: Hacemos la llamada al bean y lo usamos:
		VehiculoMejorado transbordador = miContexto.getBean("transbordadorEspacialConAnotacionBean", VehiculoMejorado.class);
		System.out.println(transbordador.getNombre()+" tiene un total de "+transbordador.getNumPasajeros()+" astronautas.");
		miContexto.close(); //Paso 3: Cerramos el bean.
	}

}
