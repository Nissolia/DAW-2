package com.example.demo;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

@Repository
public interface LibroRepository extends JpaRepository<Libro, Long> {
    List<Libro> findByGenero(String genero);  

 // Método para obtener géneros distintos
   // @Query("SELECT DISTINCT l.genero FROM Libro l")
  //  List<String> findDistinctGeneros();
}
