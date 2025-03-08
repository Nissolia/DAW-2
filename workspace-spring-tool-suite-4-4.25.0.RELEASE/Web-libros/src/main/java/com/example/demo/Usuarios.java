package com.example.demo;

import java.util.Collection;
import java.util.List;

import org.springframework.security.core.GrantedAuthority;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;
import jakarta.persistence.Table;

@Entity
@Table(name = "usuarios") 
public class Usuarios {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;
    private String nombre;
    private Collection<? extends GrantedAuthority> perfil;
    private String contrasena;
    

    // Constructor con parámetros
    public Usuarios(String nombre, Collection<? extends GrantedAuthority> perfil, String contrasena) {
        this.nombre = nombre;
        this.perfil = perfil;
    }

    // Getters y Setters
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Collection<? extends GrantedAuthority> getPerfil() {
        return perfil;
    }

    public void setPerfil(Collection<? extends GrantedAuthority> perfil) {
        this.perfil = perfil;
    }
    public String getContrasena() {
        return contrasena;
    }

    public void setContrasena(String contrasena) {
        this.contrasena = contrasena;
    }
}
