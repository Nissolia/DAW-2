package com.example.demo;

import jakarta.persistence.*;
import java.time.LocalDateTime;

@Entity
public class Resenas {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    
    @ManyToOne
    @JoinColumn(name = "libro_id", nullable = false)
    private Libro libro;

  

    private int estrellas; // Estrellas (0-9)
    private String resena; // Texto de la reseña
    private LocalDateTime fecha; // Fecha de la reseña

    // Constructor vacío
    public Resenas() {}

    // Constructor con todos los campos
    public Resenas(Libro libro, int estrellas, String resena, LocalDateTime fecha) {
        this.libro = libro;
   
        this.estrellas = estrellas;
        this.resena = resena;
        this.fecha = fecha;
    }

    // Getters y Setters
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Libro getLibro() {
        return libro;
    }

    public void setLibro(Libro libro) {
        this.libro = libro;
    }


    public int getEstrellas() {
        return estrellas;
    }

    public void setEstrellas(int estrellas) {
        this.estrellas = estrellas;
    }

    public String getResena() {
        return resena;
    }

    public void setResena(String resena) {
        this.resena = resena;
    }

    public LocalDateTime getFecha() {
        return fecha;
    }

    public void setFecha(LocalDateTime fecha) {
        this.fecha = fecha;
    }
}
