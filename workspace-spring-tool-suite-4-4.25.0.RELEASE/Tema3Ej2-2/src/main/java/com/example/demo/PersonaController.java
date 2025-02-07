package com.example.demo;

import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/personas")
public class PersonaController {

  static List<Persona> lista= new ArrayList<Persona>();
  static {
    
    lista.add(new Persona ("pepe","perez",20));
    lista.add(new Persona ("ana","gomez",40));
  }
  @GetMapping("/lista")
  public String lista(Model modelo) {
    modelo.addAttribute("lista", lista);
    return "lista";
  }
//cargando la pagina donde tenemos el get
	@GetMapping("")
	public String nuevoAnuncio() {
		return "home";
	}
  
  
  
  
}