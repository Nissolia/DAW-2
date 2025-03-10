package com.example.demo;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.security.provisioning.InMemoryUserDetailsManager;

@Configuration
@EnableWebSecurity
public class SecurityConfig {

    @Bean
    public UserDetailsService userDetailsService() {
        var userDetailsService = new InMemoryUserDetailsManager();

        // Crear un UserDetails usando el método estático withUsername()
        UserDetails admin = User.withUsername("Noelia")
                .password(passwordEncoder().encode("123456789")) // Codificar la contraseña
                .authorities("ROLE_ADMIN") // Asignar el rol
                .build(); // Construir el UserDetails

        userDetailsService.createUser(admin); // Agregar el usuario al UserDetailsService
        return userDetailsService;
    }

    @Bean
    public PasswordEncoder passwordEncoder() {
        return new BCryptPasswordEncoder(); // Configurar el codificador de contraseñas
    }
}