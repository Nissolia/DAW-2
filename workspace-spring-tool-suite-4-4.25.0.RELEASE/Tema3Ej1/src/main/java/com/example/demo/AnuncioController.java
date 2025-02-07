package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class AnuncioController {

	// Maneja el formulario de envío (POST)
	@PostMapping("/anuncio")
	public String anuncio(@RequestParam(name = "nombre") String name, @RequestParam(name = "asunto") String asunto,
			@RequestParam(name = "comentario") String comentario, Model model) {
		model.addAttribute("nombre", name);
		model.addAttribute("asunto", asunto);
		model.addAttribute("comentario", comentario);
		return "anuncio";
	}

	// cargando la pagina donde tenemos el get
	@GetMapping("")
	public String nuevoAnuncio() {
		return "nuevoAnuncio";
	}
}
