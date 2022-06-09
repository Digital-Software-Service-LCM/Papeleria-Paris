// envia los mensajes de confirmacion para la eliminacion de un registro en cualquier modulo.
function confirmacion(e){
	if (confirm("¿Está seguro que desea eliminar este registro?")){
		return true;
	} else{
		e.preventDefault();
	}
}
let iconDelete = document.querySelectorAll(".icon-table-delete");
for (var i = 0; i < iconDelete.length; i++){
	iconDelete[i].addEventListener('click', confirmacion);
}
// envia los mensajes de confirmacion para la inactivacion de un usuario.
function confirmacionInactive(e){
	if (confirm("¿Está seguro que desea inactivar este usuario?")){
		return true;
	} else{
		e.preventDefault();
	}
}
let iconInactive = document.querySelectorAll(".icon-table-inactive");
for (var i = 0; i < iconInactive.length; i++){
	iconInactive[i].addEventListener('click', confirmacionInactive);
}