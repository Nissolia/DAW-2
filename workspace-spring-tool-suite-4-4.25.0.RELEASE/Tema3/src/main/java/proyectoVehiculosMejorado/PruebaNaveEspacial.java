package proyectoVehiculosMejorado;

import org.springframework.context.support.ClassPathXmlApplicationContext;

public class PruebaNaveEspacial {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ClassPathXmlApplicationContext miContexto = new ClassPathXmlApplicationContext("applicationContext.xml");
		VehiculoMejorado n1 = miContexto.getBean("naveEspacial", VehiculoMejorado.class);

		System.out.println(n1.getNombre() + " tiene un total de " + n1.getNumPasajeros() + " pasajeros");

		miContexto.close();
	}
}
