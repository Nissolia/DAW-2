addEventListener("load", inicializarEventos, false);

//  VARIABLES QUE CREAMOS PARA LAS APIS
const API_CARGAR_CATEGORIAS =
  "http://localhost/00_DWECliente/BanosJimenezNoeliaAjax/api/cargar_categorias_xml.php";
const API_CARGAR_PRODUCTOS =
  "http://localhost/00_DWECliente/BanosJimenezNoeliaAjax/api/cargar_productos_json.php";

function inicializarEventos() {
  // TOMAMOS EL ID DE INPUT CATEGORIAS
  console.log("entra en el iniciar eventos");
  let ob = document.getElementById("inputCategorias");
  ob.addEventListener("click", presionBoton, false);
//   ob.addEventListener("click", manejadorEventos);
  cargarCategorias();
}
// function manejadorEventos(event) {
//   console.log("evento");
//   console.log(targetId);
// }

// <!-- => AQUÍ VAN LAS CATEGORIAS (control inputCategorias) -->
//         <div class="col"><button class="btn btn-info">Categoría 1</button></div>

let conexion1;
// presion boton
function presionBoton() {
  conexion1 = new XMLHttpRequest();
  //   D:/Noelia\dev\htdocs\00_DWECliente\BanosJimenezNoeliaAjax
  conexion1.open("GET", API_CARGAR_PRODUCTOS, true);
  conexion1.timeout = 3000; // Tiempo máximo de espera del API 3sg
  conexion1.addEventListener("readystatechange", procesarProductos); // Añadimos el callback
  conexion1.addEventListener("timeout", tiempoVencido); // El evento ontimeout se dispara cuando se ha superado el tiempo de espera
  conexion1.send();
}
// carcar categorias
function cargarCategorias() {
  conexion1 = new XMLHttpRequest();
  conexion1.open("POST", API_CARGAR_CATEGORIAS, true);
  conexion1.timeout = 3000; // Tiempo máximo de espera del API 3sg
  conexion1.addEventListener("readystatechange", menuCategorias); // Añadimos el callback
  conexion1.addEventListener("timeout", tiempoVencido); // El evento ontimeout se dispara cuando se ha superado el tiempo de espera
  conexion1.send();
}

function tiempoVencido() {
  document.getElementById("resultados").innerHTML = "Tiempo de espera vencido";
}
// funcion completada
function menuCategorias() {
  console.log("entrada menu categorias");
  if (conexion1.readyState == 4 && conexion1.status == 200) {
    let botones = document.getElementById("inputCategorias");
    try {
      let xmlDoc = conexion1.responseXML; // En la propiedad responseXML se almacena el XML (tiene una estructura similar al DOM)
      let salida = "";

      // Obtener todos los elementos

      let categorias = xmlDoc.getElementsByTagName("categorias");

      //   miramos si
      let categoria = xmlDoc.getElementsByTagName("categoria");
      //   console.log("c: " + categoria.length);
      for (let f = 0; f < categoria.length; f++) {
        // Acceder a los datos de cada elemento <categoria>
        let id = categoria[f].getElementsByTagName("id")[0].innerHTML;
        let nombre = categoria[f].getElementsByTagName("nombre")[0].innerHTML;

        // console.log(nombre);
        salida +=
          " <div class='col'><button id=" + id + " class='btn btn-info'>";
        salida += nombre;
        salida += "</button></div>";
      }
      //   botones.appendChild(salida);
      botones.innerHTML = salida;
    } catch (ex) {
      document.getElementById("inputCategorias").innerHTML =
        "Error al cargar extraer del XML: " + ex.message;
    }
  }
}

function procesarProductos(e) {
  console.log("entrada procesar productos");
  //   let idTarget = e.target.responseText;
  //   let idUsado = idTarget['id_categoria'];
  //   console.log(idUsado);
  if (conexion1.readyState == 4 && conexion1.status == 200) {
    let resultados = document.getElementById("inputCategorias");
    //    el id que fue target en el boton
    try {
      let salida = "";
      let datos = JSON.parse(conexion1.responseText);
      // Obtener todos los elementos <periferico> dentro del XML

      //   console.log("datos: " + datos);
      for (let f = 0; f < datos.length; f++) {
        console.log(datos[f].id_categoria);
        // no termino de entender como hacer que funcione por esta parte
        // if (targetId.id == datos[f].id_categoria) {
        // Acceder a los datos de cada elemento <periferico>
        // let idProducto = datos[f].id;
        let imgProducto = datos[f].imagen;
        let nombreProducto = datos[f].nombre;
        let precioProducto = datos[f].precio;

        //    salida al html
        salida +=
          " <div class='card col-3 m-2' style='width: 18rem;'> <img src='images/";
        salida += imgProducto;
        salida +=
          "'class='card-img-top' alt=''><div class='card-body'><h3 class='card-title'></h3>";
        salida += nombreProducto;
        salida += '</h3>  <h4 class="card-text">';
        salida += precioProducto + "</h4>";
        // salida +="  <a onclick='" +  cargarDetalles(idProducto) + "' class='btn btn-primary'>Detalles</a> ";
        salida += "</div> </div>";
      }

      resultados.innerHTML = salida;
    } catch (ex) {
      document.getElementById("inputCategorias").innerHTML =
        "Error al cargar extraer del JSON: " + ex.message;
    }
  }
}

function cargarDetalles(e) {
  const targetId = e.target.id;
  if (conexion1.readyState == 4 && conexion1.status == 200) {
    let resultados = document.getElementById("inputCategorias");
    //    el id que fue target en el boton
    let targetId = e.target.id;
    try {
      let salida = "";
      let datos = JSON.parse(conexion1.responseText);
      // Obtener todos los elementos <periferico> dentro del XML

      console.log("datos: " + datos);
      for (let f = 0; f < datos.length; f++) {
        // Acceder a los datos de cada elemento <periferico>
        let imgProducto = datos[f].imagen;
        let nombreProducto = datos[f].nombre;
        let precioProducto = datos[f].precio;

        //    salida al html
        salida +=
          " <div class='card col m-2' style='width: 18rem;'> <img src='images/";
        salida += imgProducto;
        salida +=
          "'class='card-img-top' alt=''><div class='card-body'><h3 class='card-title'></h3>";
        salida += nombreProducto;
        salida += '</h3>  <h4 class="card-text">';
        salida += precioProducto;
        // salida +="</h4>  <a onclick='" +  cargarDetalles(num) + "' class='btn btn-primary'>Detalles</a> ";
        salida += "</div> </div>";
      }
      resultados.innerHTML = salida;
    } catch (ex) {
      document.getElementById("inputCategorias").innerHTML =
        "Error al cargar extraer del JSON: " + ex.message;
    }
  }
}
