package Apartado1_1proyectovehiculosmejorado;

import org.springframework.context.support.ClassPathXmlApplicationContext;

public class PruebaVehiculoMejorado {

	public static void main(String[] args) {
		ClassPathXmlApplicationContext miContexto = new ClassPathXmlApplicationContext("applicationContext.xml");
		VehiculoMejorado nave = miContexto.getBean("naveEspacial", VehiculoMejorado.class);
		
		System.out.println(nave.toString());

		//Paso 4: Cerramos el bean.
		miContexto.close();
	}

}
