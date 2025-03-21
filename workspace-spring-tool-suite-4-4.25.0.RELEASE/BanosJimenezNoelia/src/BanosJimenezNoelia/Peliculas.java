package BanosJimenezNoelia;

public class Peliculas {
	String titulo;
	String director;
	int mayorDe;

	// CONSTRUCTOR
	public Peliculas() {
		double elegida = Math.random() * 100;
// generamos las peliculas elegidas que se van a mostrar con la probabilidad de cada una
		if (elegida > 50 || elegida <= 100) {
			this.titulo = "Joker";
			this.director = "Todd Phillips";
			this.mayorDe = 18;
		} else if (elegida >= 0 || elegida <= 12.5) {
			this.titulo = "El pianista";
			this.director = "Roman Polanski";
			this.mayorDe = 13;
		} else if (elegida > 12.5 || elegida <= 25) {
			this.titulo = "El señor de los anillos";
			this.director = "Peter Jackson";
			this.mayorDe = 13;
		} else if (elegida > 25 || elegida < 37.5) {
			this.titulo = "El caballero oscuro";
			this.director = "Christopher Nolan";
			this.mayorDe = 13;
		} else {
			this.titulo = "Smile";
			this.director = "Parker Finn";
			this.mayorDe = 16;
		}
	}

	public String getTitulo() {
		return titulo;
	}

	public void setTitulo(String titulo) {
		this.titulo = titulo;
	}

	public String getDirector() {
		return director;
	}

	public void setDirector(String director) {
		this.director = director;
	}

	public int getMayorDe() {
		return mayorDe;
	}

	public void setMayorDe(int mayorDe) {
		this.mayorDe = mayorDe;
	}

	@Override
	public String toString() {
		return "Pelicula reproducida: " + titulo + " del director " + director + " Esta película es para mayores de " + mayorDe + ". Por lo tanto, quien no cumpla este requisito, no podrá adquirir entrada.";
	}

}
