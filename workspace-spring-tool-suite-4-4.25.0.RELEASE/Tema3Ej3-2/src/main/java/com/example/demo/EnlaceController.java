package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class EnlaceController {
	// cargamos la pagina principal
		@GetMapping("")
		public String enlacesPag() {
			return "enlaces";
		}
		@GetMapping("enlaces")
		public String enlacesPagVolver() {
			return "enlaces";
		}
		// aqui cargamos la pagina del enlace, recibimos un enlace
    @GetMapping("/enlace")
    public String mostrarEnlace(@RequestParam(name = "nenlace", required = false, defaultValue = "1") int nenlace, Model model) {
        model.addAttribute("nenlace", nenlace);
        return "resultado";
    }
}
