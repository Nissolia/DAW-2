package proyectoVehiculos2;

import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.support.ClassPathXmlApplicationContext;

@SpringBootApplication
public class PruebaNaveEspacial {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ClassPathXmlApplicationContext miContexto = new ClassPathXmlApplicationContext("applicationContext.xml");
		VehiculoMejorado n1 = miContexto.getBean("naveEspacial", VehiculoMejorado.class);

		System.out.println(n1.toString());

		miContexto.close();
	}
}
