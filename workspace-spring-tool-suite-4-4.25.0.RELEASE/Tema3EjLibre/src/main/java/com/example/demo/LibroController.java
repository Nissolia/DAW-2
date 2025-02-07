package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@Controller
public class LibroController {
    private final LibroRepository libroRepository;

    public LibroController(LibroRepository libroRepository) {
        this.libroRepository = libroRepository;
    }

    @GetMapping("/")
    public String index(Model model) {
        List<Libro> libros = libroRepository.findAll();
        model.addAttribute("libros", libros);
        return "listaLibros";
    }

    @GetMapping("/nuevo")
    public String formularioLibro(Model model) {
        model.addAttribute("libro", new Libro());
        return "formularioLibro";
    }

    @PostMapping("/guardar")
    public String guardarLibro(@ModelAttribute Libro libro) {
        libroRepository.save(libro);
        return "redirect:/";
    }
 // Filtrar libros por género
    @GetMapping("/filtrarLibros")
    public String filtrarLibrosPorGenero(@RequestParam("genero") String genero, Model model) {
        List<Libro> libros = LibroService.obtenerLibrosPorGenero(genero);
        model.addAttribute("libros", libros);
        return "libros";  // Vista de los libros filtrados
    }
    @GetMapping("/detalle/{id}")
    public String detalleLibro(@PathVariable Long id, Model model) {
        Optional<Libro> libro = libroRepository.findById(id);
        if (libro.isPresent()) {
            model.addAttribute("libro", libro.get());
            return "detalleLibro";
        }
        model.addAttribute("error", "El libro no existe.");
        return "error";
    }
}
