package proyectoVehiculos;


import org.springframework.context.annotation.AnnotationConfigApplicationContext;

public class PruebaVehiculos2 {

	public static void main(String[] args) {
		AnnotationConfigApplicationContext miContexto = new AnnotationConfigApplicationContext(Config.class);
		
		Vehiculo v1 = miContexto.getBean("GeneradorVehiculos", Vehiculo.class);
		System.out.println(v1.getTareas());
//paso 6: Mantenimiento inyectado === inyección de dependencia
		System.out.println(((Coche) v1).getMantenimiento());
		miContexto.close();
	}

}
