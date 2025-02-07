package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

import jakarta.servlet.http.HttpSession;
import java.util.ArrayList;
import java.util.List;

@Controller
public class AnuncioController {

    // Crea una sesión y almacena un nuevo anuncio
    @GetMapping("/anuncio")
    public String createSession(@RequestParam(name = "nombre") String name,
                                 @RequestParam(name = "asunto") String asunto,
                                 @RequestParam(name = "comentario") String comentario,
                                 Model model,
                                 HttpSession session) {
        // Obtenemos la lista de anuncios o la inicializamos si no existe
        @SuppressWarnings("unchecked")
		List<Anuncio> anuncios = (List<Anuncio>) session.getAttribute("anuncios");
        if (anuncios == null) {
            anuncios = new ArrayList<>();
        }

        // Creamos un nuevo anuncio y lo añadimos a la lista
        Anuncio nuevoAnuncio = new Anuncio(name, asunto, comentario);
        anuncios.add(nuevoAnuncio);

        // Guardamos la lista de anuncios en la sesión
        session.setAttribute("anuncios", anuncios);

        // Pasamos los datos al modelo
        model.addAttribute("anuncios", anuncios);
        return "index";
    }

    // Recupera y muestra los anuncios desde la sesión
    @GetMapping("/")
    public String index(HttpSession session, Model model) {
        @SuppressWarnings("unchecked")
		List<Anuncio> anuncios = (List<Anuncio>) session.getAttribute("anuncios");
        model.addAttribute("anuncios", anuncios);
        return "index";
    }

    // Página para crear un nuevo anuncio
    @GetMapping("/nuevoAnuncio")
    public String nuevoAnuncio() {
        return "nuevoAnuncio";
    }
}
