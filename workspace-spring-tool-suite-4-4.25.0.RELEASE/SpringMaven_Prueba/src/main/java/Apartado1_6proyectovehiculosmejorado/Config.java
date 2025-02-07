package Apartado1_6proyectovehiculosmejorado;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.PropertySource;

@ComponentScan("Apartado1_4proyectovehiculosmejorado")
@Configuration
@PropertySource("classpath:MiVehiculo.txt")
public class Config {
	@Bean
	public MasPasajerosBean pasajerosParaTransbordadorEspacial() {
		return new MasPasajerosBean();
	}

	@Bean
	public TransbordadorEspacialConAnotacionBeanEjemploPropertySourceyValue transbordadorEspacialConAnotacionBean() {
	return new TransbordadorEspacialConAnotacionBeanEjemploPropertySourceyValue(pasajerosParaTransbordadorEspacial());
	}
}
