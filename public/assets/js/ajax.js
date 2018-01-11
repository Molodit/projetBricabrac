console.log("ajax.js");




$(function(){

    // JE PRENDS LA MAIN SUR LE FORMULAIRE
    $("form.commentaires").on("submit", function(event){
        // BLOQUER L'ENVOI DU FORMULAIRE
        event.preventDefault();

        console.log("JE PRENDS LA MAIN");

        // ON VA ENVOYER LE FORMULAIRE EN AJAX
        // ON RECUPERE LES INFOS DU FORMULAIRE
        var formData = new FormData(this);

        // urlAJax A DETERMINER
        $.ajax({
            method:         "POST",
            url:            urlAjax,
            data:           formData,
            contentType:    false,
            processData:    false
        })
        .done(function(response){
            // CETTE FONCTION SERA APPELEE 
            // QUAND LE NAVIGATEUR VA RECEVOIR LE REPONSE DU SERVEUR
            // JE VAIS AFFICHER response DANS LA BALISE .response
            console.log(response);
            $(".read").prepend(response);
        });

    });
});