package com.example.demo;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import java.util.List;

@Service
public class LibroService {

    @Autowired
    private static LibroRepository libroRepository;

    public static List<Libro> obtenerLibrosPorGenero(String genero) {
        return libroRepository.findByGenero(genero);
    }

    public static List<Libro> obtenerTodosLosLibros() {
        return libroRepository.findAll();
    }
 // Obtener los géneros únicos disponibles
    //public static List<String> obtenerGenerosDisponibles() {
      //  return libroRepository.findByGenero();
    //}
}
