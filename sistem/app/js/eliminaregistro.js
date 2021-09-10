function confirmacion(e){
    if (confirm("¿Está Seguro que desea eliminar éste registro?")) {
        return true;
    }else{
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".eliminar");

for (var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}