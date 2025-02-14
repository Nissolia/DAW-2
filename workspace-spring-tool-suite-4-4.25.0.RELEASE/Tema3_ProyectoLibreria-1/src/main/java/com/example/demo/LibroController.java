package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import jakarta.servlet.http.HttpSession;
import java.util.ArrayList;
import java.util.List;

@Controller
public class LibroController {

    private List<Libro> libros = new ArrayList<>();

    // Inicializar los libros en el constructor para tener algo previo
    public LibroController() {
        libros.add(new Libro("Cien años de soledad", "Gabriel García Márquez", "Realismo Mágico", "La obra narra la historia de la familia Buendía a lo largo de varias generaciones en el pueblo ficticio de Macondo."));
        libros.add(new Libro("1984", "George Orwell", "Distopía", "Una sociedad totalitaria controlada por el Partido que supervisa todos los aspectos de la vida de los ciudadanos, incluyendo sus pensamientos."));
        libros.add(new Libro("Orgullo y prejuicio", "Jane Austen", "Romántico", "Cuenta la historia de Elizabeth Bennet y su relación con el arrogante Mr. Darcy."));
        libros.add(new Libro("El alquimista", "Paulo Coelho", "Aventura", "Santiago, un joven pastor, inicia un viaje en busca de un tesoro personal, enfrentándose a desafíos que lo transforman en el proceso."));
    }

    // Página principal que muestra la lista de libros
    @GetMapping("")
    public String index(HttpSession session, Model model) {
        model.addAttribute("libros", libros);
        return "listaLibros"; // listaLibros.html
    }

 // Selecciona un libro y guarda su ID en la sesión
    @GetMapping("/seleccionar")
    public String seleccionarLibro(@RequestParam(name = "id") int id, HttpSession session, Model model) {
        if (id >= 0 && id < libros.size()) {
            session.setAttribute("libroId", id);  
            return "redirect:/detalle";  // Redirigimos a la página de detalle
        }
     // Si no existe el libro, mostramos error
        model.addAttribute("error", "El libro seleccionado no existe.");
        return "error";  
    }

 // Página para crear un nuevo libro (formulario)
    @GetMapping("/formularioLibro")
    public String formularioLibro(Model model) {
    	// Creamos un objeto Libro vacío
        model.addAttribute("libro", new Libro()); 
        return "formularioLibro";
    }
 // Guarda el libro y lo agrega a la lista
    @PostMapping("/guardar")
    public String guardarLibro(@ModelAttribute Libro libro, RedirectAttributes attributes) {
    	 // Agregamos el nuevo libro a la lista
        libros.add(libro); 
        attributes.addAttribute("mensaje", "¡Libro agregado exitosamente!"); 
        return "/";
    }

    // Muestra el detalle del libro usando el ID almacenado en la sesión
    @GetMapping("/detalle")
    public String detalleLibro(HttpSession session, Model model) {
        Integer libroId = (Integer) session.getAttribute("libroId");
        if (libroId != null && libroId >= 0 && libroId < libros.size()) {
            Libro libro = libros.get(libroId);
            model.addAttribute("libro", libro);
            return "detalleLibro";
        }
        // Si no hay libro en sesión, mostramos error
        model.addAttribute("error", "No se ha seleccionado un libro.");
        return "error"; 
    }
}
