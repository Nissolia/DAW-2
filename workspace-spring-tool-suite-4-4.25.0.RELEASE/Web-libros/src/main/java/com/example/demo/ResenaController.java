package com.example.demo;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import java.time.LocalDateTime;
import java.util.List;

@Controller
public class ResenaController {

    @Autowired
    private ResenaRepository resenasRepository;

    @Autowired
    private LibroRepository libroRepository;

    // Método para mostrar el formulario de reseña
    @GetMapping("/nuevaResena")
    public String formularioResena(Model model) {
        // Obtener la lista de libros desde la base de datos
        model.addAttribute("libros", libroRepository.findAll());
        model.addAttribute("resena", new Resenas()); // Crear una reseña vacía
        return "formularioResena"; // Vista para añadir una nueva reseña
    }

    // Método para guardar la reseña
    @PostMapping("/guardarResena")
    public String guardarResena(@ModelAttribute Resenas resena, @RequestParam Long libroId,
                                 RedirectAttributes attributes) {

        // Obtener el libro seleccionado por el ID
        Libro libro = libroRepository.findById(libroId)
                .orElseThrow(() -> new RuntimeException("Libro no encontrado"));

        // Asociar la reseña con el libro
        resena.setLibro(libro);
        resena.setFecha(LocalDateTime.now()); // Establecer la fecha actual

        // Guardar la reseña en la base de datos
        resenasRepository.save(resena);

        attributes.addFlashAttribute("mensaje", "Reseña guardada exitosamente");
        return "redirect:/resenas"; // Redirige a la lista de reseñas
    }

    // Mostrar todas las reseñas de todos los libros
    @GetMapping("/resenas")
    public String verResenas(Model model) {
        try {
            List<Resenas> resenas = resenasRepository.findAll();
            model.addAttribute("resenas", resenas); // Agregar las reseñas al modelo
            return "listaResenas"; // Devolver la vista que muestra todas las reseñas
        } catch (Exception e) {
            // Si ocurre un error, logueamos la excepción y regresamos un error adecuado
            e.printStackTrace();
            model.addAttribute("error", "Ocurrió un error al cargar las reseñas.");
            return "errorPage"; // Opción de redirigir a una página de error.
        }
    }


}
