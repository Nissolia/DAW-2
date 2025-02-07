package Apartado1_5proyectovehiculosmejorado;

import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

public class PruebaVehiculoMejorado {

	public static void main(String[] args) {
		// 1: Leer el class de configuración:
		AnnotationConfigApplicationContext miContexto = new AnnotationConfigApplicationContext(Config.class);
		VehiculoMejorado nave = miContexto.getBean("naveEspacial", VehiculoMejorado.class);
		System.out.println(nave.getNombre());

		//Paso 4: Cerramos el bean.
		miContexto.close();
	}

}
