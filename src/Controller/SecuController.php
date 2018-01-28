<?php
namespace App\Controller;

// Fichier pour sécuriser les formulaires
class SecuController
{
    // DEBUT DE LA CLASSE
    
    // PROPRIETES
    public $tabErreur;
    public $tabColonneInfo;
    
    // METHODES
    function __construct ()
    {
        // IL FAUT INITIALISER LES PROPRIETES
        $this->tabErreur        = [];
        $this->tabColonneInfo   = [];
    }
    
    // AJOUTER VOS METHODES ICI
    // ON VA RECUPERER UNE INFO DU FORMULAIRE
    // ET ON VA VERIFIER SI L'INFO A BIEN UN FORMAT D'EMAIL
    function verifierInfoEmail ($nameInput)
    {
        // ON FAIT APPEL A LA FONCTION verifierInfo POUR RECUPERER L'INFO 
        // ET EFFECTUER QUELQUES FILTRES... 
        $email = $this->verifierInfo($nameInput);
        
        // TEST DE VALIDITE
        if ($email == "")
        {
            // ERREUR
            $this->tabErreur[] = "EMAIL VIDE";
        }
    
        // http://php.net/manual/fr/function.mb-strlen.php
        if (mb_strlen($email) > 1000)
        {
            // ERREUR
            $this->tabErreur[] = "EMAIL TROP LONG";
        }
    
        // EST-CE QUE L'EMAIL A UN FORMAT VALIDE
        // http://php.net/manual/fr/function.filter-var.php
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
        {
            // ERREUR
            $this->tabErreur[] = "EMAIL INVALIDE";
        }

        // POUR LA SYNTAXE CHAINEE
        return $this;
    }

    // ON VA RECUPERER UNE INFO DU FORMULAIRE
    // ET JE LE STOCKE DANS LA VARIABLE GLOBALE $tabColonneInfo
    function verifierInfo ($nameInput, $valeurDefaut="")
    {
        // IL MANQUE ENCORE UN TEST POUR VERIFIER SI L'INFO EST BIEN PRESENTE...
        // TODO
        
        // $valueInput EST UNE VARIABLE LOCALE
        // QUI CONTIENT CE QUE LE VISITEUR A ENVOYE AVEC LE FORMULAIRE
        // SI LE FORMULAIRE CONTIENT BIEN L'INFO
        //On passe par l'objet $objetRequest

        $valueInput = $this->objetRequest->get($nameInput, $valeurDefaut);
        

        // ANCIEN CODE
        
        // if (isset($_REQUEST[$nameInput]))
        // {
        //     // ALORS JE LA RECUPERE
        //     $valueInput = $_REQUEST[$nameInput];
        // }
        // else
        // {
        //     // SINON, ON MET LA CHAINE VIDE COMME VALEUR PAR DEFAUT
        //     $valueInput = "";
        // }
        // FILTRER LES MAUVAISES INFOS
        
        // ATTENTION: MODE PARANO
        // L'ORDRE DES FILTRES EST IMPORTANT
        
        // ENLEVER LES BALISES HTML ET PHP
        // http://php.net/manual/fr/function.strip-tags.php
        $valueInput = strip_tags($valueInput);
        
    
        // ENLEVER LES ESPACES AU DEBUT ET A LA FIN
        // http://php.net/manual/fr/function.trim.php
        $valueInput = trim($valueInput);
        
        // JE RAJOUTE DANS LE TABLEAU $tabColonneInfo L'INFO RECUPEREE DU FORMULAIRE
        // $tabColonneInfo["email"] = verifierInfoEmail("email");
        // global $tabColonneInfo;
        // $tabColonneInfo[$nameInput] = $valueInput;
        $this->tabColonneInfo[$nameInput] = $valueInput;

        return $valueInput;
    }
    
    // AFFICHER LES ERREURS
    function afficherErreur ()
    {
        // http://php.net/manual/fr/function.implode.php
        $listeErreur = implode(",", $this->tabErreur);
        $nbErreur    = $this->getErreur();
        
        // ERREUR: L'UNE DES INFORMATION EST MANQUANTE
        echo 
<<<CODEHTML
    <div class="ko">$nbErreur ERREUR(S): $listeErreur</div>
CODEHTML;
    
    }


    function getErreur ()
    {
        // RENVOIE LE NOMBRE D'ERREURS
        return count($this->tabErreur);
    }
    
    function validerInserer ($nomTable, $message)
    {
        if ($this->getErreur() == 0)
        {
            $objetModel = new Model;
            $objetModel->insererLigne($nomTable, $this->tabColonneInfo);
            
            // VERSION COMPACTE SANS VARIABLE INTERMEDIAIRE
            // (new Model)->insererLigne("Newsletter", [ "email" => $email ]);
            
            // SI JE VEUX POUVOIR TRANSFORMER LE SHORTCODE EN SA VALEUR FINALE
            // IL FAUT QUE JE CHERCHE DANS $message LE SHORTCODE 
            // ET QUE JE LE REMPLACE PAR SA VALEUR
            foreach($this->tabColonneInfo as $cle => $valeur)
            {
                // ON REMPLACE LES SHORTCODES PAR LEUR VALEUR
                $message = str_replace("[$cle]", $valeur, $message);
            }
            
            echo "$message";
        }
        else
        {
            $this->afficherErreur();
        }        
    }

    // ON VA RECUPERER UNE INFO DU FORMULAIRE
    // ET ON VA VERIFIER SI L'INFO NE DEPASSE PAS UNE LONGUEUR MAX
    function verifierInfoTexte ($nameInput, $longueurMax)
    {
        // IL FAUT CREER LA VARIABLE GLOBALE AVANT D'APPELER LA FONCTION

        // ON FAIT APPEL A LA FONCTION verifierInfo POUR RECUPERER L'INFO 
        // ET EFFECTUER QUELQUES FILTRES... 
        $texte = $this->verifierInfo($nameInput);
        
        // TEST DE VALIDITE
        if ($texte == "")
        {
            // ERREUR
            $this->tabErreur[] = "($nameInput) TEXTE VIDE";
        }
    
        // http://php.net/manual/fr/function.mb-strlen.php
        if (mb_strlen($texte) > $longueurMax)
        {
            // ERREUR
            $this->tabErreur[] = "($nameInput) TEXTE TROP LONG";
        }
        
        // POUR LA SYNTAXE CHAINEE
        return $this;
    }
    
    function verifierInfoPasswordHash ($nameInput, $longueurMin)
    {
        // ON RECUPERE LE MOT DE PASSE NON HASHE
        $this->verifierInfoPassword($nameInput, $longueurMin);
        
        // IL FAUT HASHER LE MOT DE PASSE AVANT DE LE STOCKER DANS SQL
        // https://secure.php.net/manual/fr/function.password-hash.php
        $passwordHash = password_hash($this->tabColonneInfo[$nameInput], PASSWORD_DEFAULT);
        
        // ON ECRASE LA VALEUR DE LA COLONNE $nameInput AVEC LE MOT DE PASSE HASH
        $this->setColonneValeur($nameInput, $passwordHash);
        
        // POUR LA SYNTAXE CHAINEE
        return $this;
    }
    
    // ON VA RECUPERER UNE INFO DU FORMULAIRE
    // ET ON VA VERIFIER SI L'INFO FAIT AU MOINS UNE LONGUEUR MIN
    function verifierInfoPassword ($nameInput, $longueurMin)
    {
        // ON FAIT APPEL A LA FONCTION verifierInfo POUR RECUPERER L'INFO 
        // ET EFFECTUER QUELQUES FILTRES... 
        $texte = $this->verifierInfo($nameInput);
        
        // TEST DE VALIDITE
        if ($texte == "")
        {
            // ERREUR
            $this->tabErreur[] = "($nameInput) TEXTE VIDE";
        }
    
        // http://php.net/manual/fr/function.mb-strlen.php
        if (mb_strlen($texte) < $longueurMin)
        {
            // ERREUR
            $this->tabErreur[] = "($nameInput) MOT DE PASSE TROP COURT";
        }
        
        // IL FAUDRAIT AJOUTER PLEIN DE TESTS
        // MAJUSCULE OBLIGATOIRE
        // MINUSCULE OBLIGATOIRE
        // CHIFFRE OBLIGATOIRE
        // CARACTERE SPECIAL OBLIGATOIRE
        // ...
        
        // POUR POUVOIR UTILISER LA SYNTAXE CHAINEE
        return $this;
    }

    
    function setColonneValeur ($nomColonne, $valeur)
    {
        // ON AJOUTE UNE CLE ET UNE VALEUR DANS LA PROPRIETE $this->tabColonneInfo
        $this->tabColonneInfo[$nomColonne] = $valeur;
        
        // POUR POUVOIR UTILISER LA SYNTAXE CHAINEE
        return $this;
    }
    
    // A PARTIR DES INFOS DU FORMULAIRE DE LOGIN
    // ON VA VERIFIER SI IL Y A UNE LIGNE CORRESPONDANTE DANS LA TABLE SQL User
    // SI OUI LA METHODE RENVOIE UN TABLEAU ASSOCIATIF AVEC TOUTES LES COLONNES
    // SI NON LA METHODE RENVOIE UN TABLEAU VIDE
    function verifierUser ($cleEmail, $clePassword, $message)
    {
        // RECUPERER L'EMAIL ET LE PASSWORD DU FORMULAIRE
        $emailSaisie = $this->tabColonneInfo[$cleEmail];
        $passwordSaisie = $this->tabColonneInfo[$clePassword];
        
        // DEBUG 
        // echo "[$emailSaisie][$passwordSaisie]";
        if ($this->getErreur() == 0)
        {
            // LE MOT DE PASSE DANS LA BASE DE DONNEES EST HASHE
            // DONC ON NE PEUT PAS ALLER CHERCHER LE MOT DE PASSE DIRECTEMENT
            // ON PEUT SEULEMENT L'EMAIL POUR RETROUVER LA LIGNE DANS LA TABLE User
            // => ON VA FAIRE UNE REQUETE SELECT SUR LA TABLE User AVEC COMME CRITERE
            // DE CHERCHER L'EMAIL QUI CORRESPOND
            $objetModel = new Model;
            $tabUser = $objetModel->lireLigne("User", $cleEmail, $emailSaisie);
            
            // SOIT ON UN TABLEAU REMPLI ET ON A UN USER
            // SINON LE USER N'EXISTE PAS
            if (!empty($tabUser))
            {
                // ON A TROUVE UN USER
                // https://secure.php.net/manual/fr/function.password-verify.php
                // ON VA UTILISER LA FONCTION password_verify 
                // POUR COMPARER LE MOT DE PASSE EN CLAIR
                // AVEC LE MOT DE PASSE HASHE
                // $password = $tabUser["password"];
                extract($tabUser);
                $passwordOK = password_verify($passwordSaisie, $password);
                if ($passwordOK)
                {
                    // JE VEUX MEMORISER DANS UNE SESSION
                    // LES INFOS DE L'UTILISATEUR
                    $objetSession = new Session;
                    // JE VEUX STOCKER LE NIVEAU, idUser, LE PSEUDO ET L'EMAIL
                    $objetSession->stockerSession("niveau", $niveau);
                    $objetSession->stockerSession("idUser", $idUser);
                    $objetSession->stockerSession("pseudo", $pseudo);
                    $objetSession->stockerSession("email",  $email);
                    
                    // REDIRIGER VERS LA PAGE admin SI LE NIVEAU EST >= 9
                    if ($niveau >= 9)
                    {
                        header("Location: admin.php");
                    }

                    // SI JE VEUX POUVOIR TRANSFORMER LE SHORTCODE EN SA VALEUR FINALE
                    // IL FAUT QUE JE CHERCHE DANS $message LE SHORTCODE 
                    // ET QUE JE LE REMPLACE PAR SA VALEUR
                    foreach($tabUser as $cle => $valeur)
                    {
                        // ON REMPLACE LES SHORTCODES PAR LEUR VALEUR
                        $message = str_replace("[$cle]", $valeur, $message);
                    }
                    
                    
                    // CA Y'EST ON EST BON
                    echo $message;
                }
                else
                {
                    // MAUVAIS MOT DE PASSE
                    echo "IDENTIFIANTS INCORRECTS";
                }
            }
            else
            {
                // ON A RIEN TROUVE
                echo "DESOLE RETENTEZ VOTRE CHANCE PLUS TARD";
            }
        }
    }
    
    // ON VA RECUPERER UNE INFO DU FORMULAIRE
    // ET ON VA VERIFIER SI L'INFO EST ENTRE $min et $max
    function verifierInfoNombre ($nameInput, $min, $max)
    {

        // ON FAIT APPEL A LA FONCTION verifierInfo POUR RECUPERER L'INFO 
        // ET EFFECTUER QUELQUES FILTRES... 
        $texte = $this->verifierInfo($nameInput);
        
        // CONVERTIR LE TEXTE EN NOMBRE ENTIER
        $nombre = intval($texte);
        
        // TEST DE VALIDITE
        if ($nombre < $min)
        {
            // ERREUR
            $this->tabErreur[] = "($nameInput) VALEUR TROP PETITE";
        }
    
        // http://php.net/manual/fr/function.mb-strlen.php
        if ($nombre > $max)
        {
            // ERREUR
            $this->tabErreur[] = "($nameInput) VALEUR TROP GRANDE";
        }
        
        // POUR LA SYNTAXE CHAINEE
        return $this;
    }

    function verifierInfoUpload ($nameInput)
    {
        // ON TRAITE LE CHARGEMENT DU FICHIER EN UPLOAD
        $cheminImage = $this->chargerFichier($nameInput);
        
        // ON VEUT STOCKER CETTE INFORMATION DANS LA BASE DE DONNEES
        $this->tabColonneInfo[$nameInput] = $cheminImage;
        
        // POUR LA CHAINE CHAINEE
        return $this;
    }

    function validerSupprimer ($message, $paramTable, $paramLigne)
    {
        // DEBUG
        print_r($this->tabErreur);
        
        if ($this->getErreur() == 0)
        {
            // ON NE PEUT PAS UTILISER $this->tabColonneInfo DIRECTEMENT
            $nomTable = $this->tabColonneInfo[$paramTable];
            $idLigne  = $this->tabColonneInfo[$paramLigne];
            
            $objetModel = new Model;
            $objetModel->supprimerLigne($nomTable, "id$nomTable", $idLigne);
            
            echo $message;
        }
        else
        {
            $this->afficherErreur();
        }
    }
    
    function chargerFichier ($nameInput)
    {
        // AU DEPART, ON A UN CHEMIN VIDE
        $cheminImage = "";
        
        if (isset($_FILES["$nameInput"]))
        {
            $tabInfoUpload  = $_FILES["$nameInput"];
            $error          = $tabInfoUpload["error"];
            if ($error == 0)
            {
                // OK UPLOAD BIEN RECU
                $name       = $tabInfoUpload["name"];
                // http://php.net/manual/fr/function.pathinfo.php
                $extension  = pathinfo($name, PATHINFO_EXTENSION);
    
                // ON CONVERTIT EN minuscules
                // http://php.net/manual/fr/function.strtolower.php
                $extension = strtolower($extension);
                
                // http://php.net/manual/fr/function.in-array.php
                if (in_array($extension, [ "jpg", "png", "gif", "jpeg", "svg" ]))
                {
                    // OK
                    $size = $tabInfoUpload["size"];
                    $sizeMax = 2 * 1024 * 1024;     // 2 Mo
                    if ($size <= $sizeMax)
                    {
                        // OK 
                        // ON PEUT TRANSFERER LE FICHIER VERS NOTRE PROJET
                        // ON VA RANGER LE FICHIER DANS LE DOSSIER assets/upload
                        // ET POUR LE MOMENT, ON GARDE SON NOM D'ORIGINE
                        // http://php.net/manual/fr/function.move-uploaded-file.php
                        $tmpName = $tabInfoUpload["tmp_name"];
                        move_uploaded_file($tmpName, "assets/upload/$name");
                        
                        // STOCKE LE CHEMIN POUR FAIRE return PLUS TARD
                        $cheminImage = "assets/upload/$name";
                        
                    }
                    else
                    {
                        // KO
                        echo "FICHIER TROP LOURD";
                    }
                    
                }
                else
                {
                    // KO
                    echo "EXTENSION NON AUTORISEE: $extension";
                }
            }
            else
            {
                // KO
                // IL FAUT RECOMMENCER TOUT N'EST PAS ARRIVE
            }
            
        }
        else
        {
            // KO
            // PHP N'A PAS RECU DE FICHIER...
        }    
        
        // RENVOYER LE CHEMIN DU FICHIER
        return $cheminImage;
    }

    // FIN DE LA CLASSE
}

// NE PAS METTRE DE CODE ICI