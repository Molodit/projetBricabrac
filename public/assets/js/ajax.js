$('#post-messages').on('submit', function(event){
    
    event.preventDefault();

        const titre = $('#titre').val();
        const Contentu = $('#contentu').val();
        $('input').val('');
        $('input').focus();
            
        $.post("ajax.php?action=write", { titre: titre, contenu: contenu}, function(){
            displayLastMessage();
        });
});



function displayLastMessage(){
    
    
    //2. FAIRE l'APPEL AJAX sur chat.php, récupérer json et inserer les messages dans la div message
    $.getJSON('chat.php', function(afficher){
        
        // 1. VIDER LA DIV#contenu
        $('#messages').html('');
        
        afficher.reverse();
        
        afficher.forEach(function(message){
            const html = `<div class="messages">
                            <span class="date"> ${message.date_publication} </span>
                            <span class="titre"> ${message.titre} </span>
                            <span class="contentu"> ${message.contentu} </span>
                        </div>`;
            $('#messages').html($('#messages').html() + html);
    
        //ON UTILISE JQUERY POUR RETOURNER LE TABLEAU QUE LES MESSAGES LES PLUS RECENT SOIENT EN BAS
        //$('#messages').prepend(html);
            
        });
   
    });
    
};

displayLastMessage();

window.setInterval(displayLastMessage, 2000);