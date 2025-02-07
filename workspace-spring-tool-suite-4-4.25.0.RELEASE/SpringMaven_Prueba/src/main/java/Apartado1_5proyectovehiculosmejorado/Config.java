package Apartado1_5proyectovehiculosmejorado;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;

@ComponentScan("Apartado1_4proyectovehiculosmejorado")
@Configuration
public class Config {
	@Bean
	public MasPasajerosBean pasajerosParaTransbordadorEspacial() {
		return new MasPasajerosBean();
	}

	@Bean
	public TransbordadorEspacialConAnotacionBean transbordadorEspacialConAnotacionBean() {
		return new TransbordadorEspacialConAnotacionBean(pasajerosParaTransbordadorEspacial());
	} // pasajerosParaTransbordadorEspacial es el id del bean que se inyecta
}
