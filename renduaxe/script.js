//Définition des variables liées à des éléments HTML ayant une classe CSS

let newpost = document.querySelector(".imgnew");
let popupcontainer= document.querySelector(".popup_container");
let button= document.querySelector(".reduce");
let btnpublish=document.querySelector(".btnpublish");

//Gestionnaire d'événement : la fonction du popup s'exécute au clic sur 'newpost' et ce dernier apparaît
newpost.addEventListener("click",function() {

    popupcontainer.classList.toggle("active");
}
)

button.addEventListener("click",function(){
    popupcontainer.classList.toggle("active")
})

btnpublish.addEventListener("click",function(){
    popupcontainer.classList.toggle("active")
})


//Fonction permettant d'afficher un message de demande de confirmation ou d'annulation de suppression du post
function confirmDelete() {
    return confirm('Êtes-vous sûr de vouloir supprimer ce post ?');
  }


//Barre de navigation lorsqu'on passe au format téléphone

let side_button = document.querySelector(".side-button");

let side_menu = document.querySelector(".side-menu");
  
side_button.addEventListener("click",function(){
    side_menu.classList.toggle("active");
})
  
let reduce_button = document.querySelector(".side-reduce");
  
reduce_button.addEventListener("click",function(){
    side_menu.classList.toggle("active");
})