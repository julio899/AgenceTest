
// Funciones Globales
function limpiarFondo()
{ 
  var elementosConFondo = document.getElementsByClassName('fondoGris');
  if ( elementosConFondo )
  {
    for (let index = 0; index < elementosConFondo.length; index++) 
    {
      elementosConFondo[index].classList.remove('fondoGris');
    }
  }
}
function loaderOff()
{
    if(document.getElementById('loader'))
    {
        document.getElementById('loader').classList.add('ocultar');
    }
}
function loaderRun()
{
    if(document.getElementById('loader'))
    {
        document.getElementById('loader').classList.remove('ocultar');
    }
}

function selectorCambio(e)
{
    if(__current_consultor)
    {
        loaderRun();
        return busquedaDataConsultor(__current_consultor);
    }else{
        return swal('Lo Sentimos','Pero Debes seleccionar una cuenta de consultor previamente','error')
    }
}
//Registro de Listener a selectores
const anio = document.getElementById('year');
const mes = document.getElementById('month');

if(  anio && mes) {
    anio.addEventListener('change',selectorCambio);
    mes.addEventListener('change',selectorCambio);
}