// Script d'affichage par onglets des tableaux des articles, membres et commentaires

(function(){
    var afficherOnglet = function (a, animations) {
        if (animations === undefined) {
            animations = true
        }
        var li = a.parentNode
        var div = a.parentNode.parentNode.parentNode;
        // Contenu actif
        var activeTab = div.querySelector('.tab-content.active');
        // Contenu à afficher
        var aAfficher = div.querySelector(a.getAttribute('href'));
        if (li.classList.contains('active')) {
            return false;
        }
        // On retire la classe active de l'onglet actif
        div.querySelector('.tabs .active').classList.remove('active');
        // J'ajoute la classe active à l'onglet actuel
        li.classList.add('active');
        
       if (animations) {
           // On ajoute la classe fade sur l'élément actif
        // A la fin de l'animation 
        //          on retire la class fade et active
        //          on ajoute la classe active et fade à l'élément à afficher
        //          on ajoute la classe in
        activeTab.classList.add('fade')
        activeTab.classList.remove('in')
        var transitionend = function() {
            this.classList.remove('fade')
            this.classList.remove('active')
            aAfficher.classList.add('active')
            aAfficher.classList.add('fade')
            aAfficher.offsetWidth
            aAfficher.classList.add('in')
            activeTab.removeEventListener('transitionend', transitionend)
            activeTab.removeEventListener('webkitTransitionEnd', transitionend)
            activeTab.removeEventListener('oTransitionEnd', transitionend)
        }
        activeTab.addEventListener('transitionend', transitionend)
        activeTab.addEventListener('webkitTransitionEnd', transitionend)
        activeTab.addEventListener('oTransitionEnd', transitionend)
       }

       else {
           aAfficher.classList.add('active')
           activeTab.classList.remove('active')
       }
        
    }
    

    
    var tabs = document.querySelectorAll('.tabs a');
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener('click', function(e){
           afficherOnglet(this)
        })
    }
    
    // Je récupère le hash
    var hash = window.location.hash
    // Ajouter la classe active sur le lien href="hash"
    // Retirer la class active sur les autres onglets
    // Afficher / Masquer les contenus

    var hashChange = function (e) {
        var a = document.querySelector('a[href="' + hash + '"]')
        if (a !== null && !a.parentNode.classList.contains('active')) {
            afficherOnglet(a, e !== undefined)
        }
    }

    window.addEventListener('hashchange', hashChange)
    hashChange();
})()