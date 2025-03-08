package com.example.demo;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import jakarta.servlet.http.HttpSession;

import java.time.LocalDateTime;
import java.util.List;

@Controller
public class LibroController {

	  @Autowired
	    private ResenaRepository resenasRepository;

	   
    @Autowired
    private LibroRepository libroRepository;

    // Página principal que muestra la lista de libros
    @GetMapping("")
    public String index(Model model) {
        model.addAttribute("libros", libroRepository.findAll());
        return "listaLibros"; // Vista que muestra la lista de libros
    }

    // Selecciona un libro y guarda su ID en la sesión
    @GetMapping("/seleccionar")
    public String seleccionarLibro(@RequestParam(name = "id") Long id, HttpSession session) {
        session.setAttribute("libroId", id); // Guarda el ID del libro en la sesión
        return "redirect:/detalle"; // Redirige a la página de detalle
    }

    // Página para crear un nuevo libro (formulario)
    @GetMapping("/nuevo")
    public String formularioLibro(Model model) {
        model.addAttribute("libro", new Libro());
        return "formularioLibro"; // Vista para agregar un nuevo libro
    }

    // Guarda el libro en la base de datos
    @PostMapping("/guardar")
    public String guardarLibro(@ModelAttribute Libro libro, RedirectAttributes attributes) {
        libroRepository.save(libro);
        attributes.addFlashAttribute("mensaje", "¡Libro agregado exitosamente!");
        return "redirect:/"; // Redirige a la lista de libros
    }

    // Muestra el detalle del libro usando el ID almacenado en la sesión
    @GetMapping("/detalle")
    public String detalleLibro(HttpSession session, Model model) {
        Long libroId = (Long) session.getAttribute("libroId");

        if (libroId != null) {
            // Obtener el libro por ID
            Libro libro = libroRepository.findById(libroId)
                    .orElseThrow(() -> new RuntimeException("Libro no encontrado"));

            // Obtener las reseñas del libro
            List<Resenas> resenas = ResenaRepository.findByLibroId(libroId);

            // Pasar el libro y sus reseñas al modelo
            model.addAttribute("libro", libro);
            model.addAttribute("resenas", resenas);
            return "detalleLibro"; // Vista para el detalle del libro
        }

        model.addAttribute("error", "No se ha seleccionado un libro.");
        return "error"; // En caso de error
    }

    // Filtrar libros por género
    @GetMapping("/filtrarLibros")
    public String filtrarLibros(@RequestParam(name = "genero", required = false) String genero, Model model) {
        List<Libro> librosFiltrados;

        if (genero == null || genero.trim().isEmpty()) {
            librosFiltrados = libroRepository.findAll(); // Mostrar todos los libros
        } else {
            String generoNormalizado = genero.trim().toLowerCase();
            librosFiltrados = libroRepository.findAll().stream()
                    .filter(libro -> libro.getGenero().toLowerCase().contains(generoNormalizado))
                    .toList();
        }

        model.addAttribute("libros", librosFiltrados);
        return "listaLibros"; // Vista que muestra los libros filtrados
    }
    

  


}
