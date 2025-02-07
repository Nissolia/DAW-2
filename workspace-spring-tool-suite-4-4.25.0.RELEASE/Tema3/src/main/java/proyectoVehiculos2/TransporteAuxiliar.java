package proyectoVehiculos2;

import org.springframework.stereotype.Component;

@Component
public class TransporteAuxiliar implements PasajerosExtra{

	@Override
	public int getPasajerosExtra() {
		// TODO Auto-generated method stub
		return 8;
	}
}
