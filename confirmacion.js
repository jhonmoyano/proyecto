function confirmacion(e){

if(confirm("¿Esta seguro que deseas eliminar este registro?")) {
return true;

}else {

e.preventdefault();
} 

}
let linkdelete=document.querySelectorAll(".btn__delete");
for(var i = 0; i <linkdelete.length; i++){
    linkdelete[i].addEventListener('click',confirmacion);
}