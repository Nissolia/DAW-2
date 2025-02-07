addEventListener('load',inicializarEventos,false);

function inicializarEventos()
{
  var ob=document.getElementById('boton1');
  ob.addEventListener('click',presionBoton,false);
}

function presionBoton(e)
{
  var ob1=document.getElementById('voto');
  var ob2=document.getElementById('nombre');
  cargarVoto(ob1.value,ob2.value);
}


var conexion1;
function cargarVoto(voto,nom) 
{
  conexion1=new XMLHttpRequest();  
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open('GET','pagina1.php?puntaje='+voto+'&nombre='+nom, true);
  conexion1.send();
}

function procesarEventos()
{
  var resultados = document.getElementById("resultados");
  if(conexion1.readyState == 4)
  {
    resultados.innerHTML = conexion1.responseText;
  } 
  else 
  {
    resultados.innerHTML = 'Cargando...';
  }
}