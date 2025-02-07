package ej_6Interfaces;

import java.time.LocalDate;

public interface EsAlimento {

	public void setCaducidad(LocalDate fc);

	public LocalDate getCaducidad();

	public double getCalorias();
}
