package Apartado1_6proyectovehiculosmejorado;

import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Component;

@Component
public class TransporteAuxiliarDos_Qualifier implements PasajerosExtra{

	@Override
	public int getPasajerosExtra() {
		return 10;
	}

}
