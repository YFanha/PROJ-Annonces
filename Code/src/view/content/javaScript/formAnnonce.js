document.addEventListener('DOMContentLoaded', function() {
    const HIDDEN = "hide"; //class 'hide'

    const selectCategorie = document.getElementById("categorie"); //Liste déroulante des catégories
    const selectServices =  document.getElementById("selectService"); //Liste déroulante des services
    const inputImg = document.getElementById("annonceImg"); //Image de l'annonce

    //Constante pour definir la valeur "Services" de la categorie
    const SERVICES = "Services"

    //Afficher la liste si la "services" est déjà choisi (lors de la modification)
    if (selectCategorie.options[selectCategorie.selectedIndex].value === SERVICES){
       selectServices.classList.remove(HIDDEN);
    }

    //Faire apparaitre ou disparaitre le champ des types de services en fonction de la valeur du champ des catégorie
    selectCategorie.onchange = function () {

        let selectCategorieValue = selectCategorie.options[selectCategorie.selectedIndex].value;

        console.log(selectCategorieValue);

        if (selectCategorieValue === SERVICES){
            selectServices.classList.remove(HIDDEN);
            inputImg.required = false;
        }else{
            selectServices.classList.add(HIDDEN);
            selectServices.options[selectServices.selectedIndex].value = "";
            inputImg.required = true;

            console.log(selectServices.options[selectServices.selectedIndex].value);
        }
    }
});