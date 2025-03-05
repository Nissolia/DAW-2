package com.example.demo;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import java.sql.Date;

@Entity
public class Resenas {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;
    private int idLibro;  // Cambié el nombre para seguir la convención de JPA de usar nombres más claros
    private int usuario;  // Aquí se mapea al ID del usuario
    private int estrellas;
    private String resena;
    private Date fecha;

    // Constructor
    public Resena() {
    }

    public Resena(int idLibro, int usuario, int estrellas, String resena, Date fecha) {
        this.idLibro = idLibro;
        this.usuario = usuario;
        this.estrellas = estrellas;
        this.resena = resena;
        this.fecha = fecha;
    }

    // Getters y Setters
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getIdLibro() {
        return idLibro;
    }

    public void setIdLibro(int idLibro) {
        this.idLibro = idLibro;
    }

    public int getUsuario() {
        return usuario;
    }

    public void setUsuario(int usuario) {
        this.usuario = usuario;
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

    public Date getFecha() {
        return fecha;
    }

    public void setFecha(Date fecha) {
        this.fecha = fecha;
    }
}
