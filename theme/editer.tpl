<?php

    // Gestion des messages
    if(isset($_GET['message'])){
        
        echo '<article ';
        
        if($_GET['message'] == 1)
            echo 'class="infos confirmation"><p>Page éditée avec succès!</p>';
        
        elseif($_GET['message'] == 2)
            echo 'class="infos erreur"><p>Erreur: tous les champs ne sont pas remplis!</p>';
        
        elseif($_GET['message'] == 3)
            echo 'class="infos erreur"><p>Erreur: mauvais captcha!</p>';
            
        elseif($_GET['message'] == 4)
            echo 'class="infos erreur"><p>Erreur: vous n\'avez pas le droit d\'éditer cette page!</p>';
        
        echo '</article>';
        
    }

    // Affichage du titre
    echo '<article><h1>' . $titre_page . '</h1>';
    
    // Bouton retour à la page
    echo '<p><a href="' . $url_wiki . '?id=' . $_GET['id'] . '">« Retourner à la page précédente</a></p>';
    
    // Affichage du formulaire d'édition    
    echo '<form action="publier.php" method="post">
        <label>Titre de la page:</label>
        <input type="text" value="' . $page['titre'] . '" name="titre" required />
        <label>Contenu de la page (<a href="http://fr.wikipedia.org/wiki/Markdown">au format Markdown</a>):</label>
        <textarea name="contenu" required>' . $page['contenu'] . '</textarea>
        <label>Résumé des modifications:</label>
        <input type="text" name="commentaire" required />
        <label><strong>Captcha anti-spam</strong>: ' . $nombres[$premier_nombre] . ' plus ' . $nombres[$second_nombre] . ' égal </label>
        <input type="text" placeholder="En chiffres..." name="captcha" required />';
        
    // Si la page n'est pas publique, on demande le mot de passe administrateur
    if($page['publique'] === false)
        echo '<label>Cette page est privée. Merci d\'entrer le mot de passe administrateur:</label><input type="password" required name="mot_de_passe" />';
    else
        echo '<input type="hidden" name="mot_de_passe" />';
            
    // Fin du formulaire d'édition
    echo '<input type="hidden" name="page_id" value="' . $_GET['id'] . '" /><input type="submit" value="Publier mes modifications" /></form>';
    
?>   
    