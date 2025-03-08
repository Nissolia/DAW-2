package com.example.demo;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface ResenaRepository extends JpaRepository<Resenas, Long> {
	    // Método para obtener las reseñas de un libro
	    static List<Resenas> findByLibroId(Long libroId) {
			// TODO Auto-generated method stub
			return null;
		}
	    

	}

