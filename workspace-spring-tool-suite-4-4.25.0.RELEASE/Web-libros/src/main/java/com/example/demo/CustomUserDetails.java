package com.example.demo;

import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;

import java.util.Collection;

public class CustomUserDetails extends User {

    /**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private Usuarios usuario;

    public CustomUserDetails(Usuarios usuario) {
        super(usuario.getNombre(), usuario.getContrasena(), usuario.getPerfil()); // Suponiendo que "perfil" es el rol
        this.usuario = usuario;
    }

    public Usuarios getUsuario() {
        return usuario;
    }

    public void setUsuario(Usuarios usuario) {
        this.usuario = usuario;
    }
}
