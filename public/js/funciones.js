
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