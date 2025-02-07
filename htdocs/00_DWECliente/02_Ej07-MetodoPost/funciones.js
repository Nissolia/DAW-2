addEventListener('load',inicializarEventos,false);

function inicializarEventos()
{
  var ref=document.getElementById('formulario');
  ref.addEventListener('submit',enviarDatos,false);
}

function enviarDatos(e)
{
  e.preventDefault();
  enviarFormulario();
}


function retornarDatos()
{
  var cad='';
  var nom=document.getElementById('nombre').value;
  var com=document.getElementById('comentarios').value;
  cad='nombre='+encodeURIComponent(nom)+'&comentarios='+encodeURIComponent(com);
  return cad;
}

var conexion1;
function enviarFormulario() 
{
  conexion1=new XMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open('POST','pagina1.php', true);
  conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexion1.send(retornarDatos());  
}

function procesarEventos()
{
  var resultados = document.getElementById("resultados");
//   para ver que esta todo finalizado y que no hay errores en lo que hemos recibido
  if(conexion1.readyState == 4 && conexion1.status == 200)
  {
    // resultados.innerHTML = 'Gracias.';
    resultados.innerHTML = conexion1.responseText;
  } 
  else 
  {
    resultados.innerHTML = 'Procesando...';
  }
}

