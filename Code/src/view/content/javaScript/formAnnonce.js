document.addEventListener('DOMContentLoaded', function() {
    const HIDDEN = "hide"; //class 'hide'

    const selectCategorie = document.getElementById("categorie");
    const selectServices =  document.getElementById("selectService");


    //Faire apparaitre ou disparaitre le champ des types de services en fonction de la valeur du champ des catégorie
    selectCategorie.onchange = function () {
        const SERVICES = "Services"

        let selectCategorieValue = selectCategorie.options[selectCategorie.selectedIndex].value;

        console.log(selectCategorieValue);

        if (selectCategorieValue === SERVICES){
            selectServices.classList.remove(HIDDEN);
        }else{
            selectServices.classList.add(HIDDEN);
            selectServices.options[selectServices.selectedIndex].value = "";

            console.log(selectServices.options[selectServices.selectedIndex].value);
        }
    }
});