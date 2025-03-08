package com.example.demo;

import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface UsuarioRepository extends JpaRepository<Usuarios, Integer> {

	Optional<Usuarios> findById(long l);

	Optional<Usuarios> findByNombre(String username);


}