package com.example.demo;

import org.springframework.stereotype.Component;

@Component
public class Anuncio {
    private String titulo;
    private String asunto;
    private String comentario;

    // Constructor
    public Anuncio(String titulo, String asunto, String comentario) {
        this.titulo = titulo;
        this.asunto = asunto;
        this.comentario = comentario;
    }
    public Anuncio() {}

    // Getters y Setters
    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public String getAsunto() {
        return asunto;
    }

    public void setAsunto(String asunto) {
        this.asunto = asunto;
    }

    public String getComentario() {
        return comentario;
    }

    public void setComentario(String comentario) {
        this.comentario = comentario;
    }
}
