package Apartado1_3proyectovehiculosmejorado;

import org.springframework.stereotype.Component;

@Component
public class TransporteAuxiliarDos_Qualifier implements PasajerosExtra{

	@Override
	public int getPasajerosExtra() {
		return 10;
	}

}
