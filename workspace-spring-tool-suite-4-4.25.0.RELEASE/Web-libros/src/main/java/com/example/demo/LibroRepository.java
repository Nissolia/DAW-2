package com.example.demo;

import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

@Repository
public interface LibroRepository extends JpaRepository<Libro, Long> {

	Optional<Libro> findById(Long libroId);
	
	 @Query("SELECT l FROM Libro l WHERE LOWER(l.genero) LIKE LOWER(CONCAT('%', :genero, '%'))")
	    List<Libro> buscarPorGenero(@Param("genero") String genero);

}
