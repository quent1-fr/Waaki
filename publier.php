<?php

    // On inclu le fichier de configuration
    include 'include/config.php';
    
    // On démarre le système de sessions
    session_start();
    
    // On vérifie si tous les champs sont remplis
    if(!isset($_POST['titre'], $_POST['contenu'], $_POST['commentaire'], $_POST['captcha'], $_POST['page_id'], $_SESSION['resultat'], $_POST['mot_de_passe']) or empty($_POST['titre']) or empty($_POST['contenu']) or empty($_POST['commentaire']) or empty($_POST['page_id'])){
        header('Location: ' . $url_wiki . '?action=editer&id=' . $_POST['page_id'] . '&message=2');
        exit;
    }
    
    // On vérifie si le captcha est bon
    if($_SESSION['resultat'] != $_POST['captcha']){
        header('Location: ' . $url_wiki . '?action=editer&id=' . $_POST['page_id'] . '&message=3');
        exit;
    }
    
    // On vérifie si la page à éditer est publique ou si le mot de passe administrateur est le bon
    if(!file_exists('donnees/' . $_POST['page_id'] . '/publique') && $_POST['mot_de_passe'] != $mot_de_passe){
        header('Location: ' . $url_wiki . '?action=editer&id=' . $_POST['page_id'] . '&message=4');
        exit;
    }
    
    // On archive l'ancienne page
    copy('donnees/' . $_POST['page_id'] . '/contenu.md', 'donnees/' . $_POST['page_id'] . '/' . filemtime('donnees/' . $_POST['page_id'] . '/contenu.md') . '.md');
    
    // On met à jour la page actuelle
    file_put_contents('donnees/' . $_POST['page_id'] . '/contenu.md', $_SERVER['REMOTE_ADDR'] . "\n" . strip_tags($_POST['commentaire']) . "\n" . strip_tags($_POST['titre']) . "\n" . strip_tags($_POST['contenu']));
    
    // Si l'administrateur l'a demandé, on lui envoie un mail
    if($notification_edition === true){
        
        // Sujet
        $sujet = 'Une page a été éditée sur ' . $titre_wiki;
    
        // Message au format HTML
        $message = '<html><head><title>Une page a été éditée sur ' . $titre_wiki . '</title></head><body>Bonjour,<br />vous avez demandé à recevoir un e-mail à chaque modification apportée sur votre wiki « ' . $titre_wiki . ' ».<br />La page « <a href="' . $url_wiki . '?id=' . $_POST['page_id'] . '">' . $_POST['titre'] . '</a> » vient d\'être modifiée par ' . $_SERVER['REMOTE_ADDR'] . '. Voici son commentaire:<br/>« <em>' . $_POST['commentaire'] . '</em> ».<br /><br/>Bonne journée!</body></html>';
    
        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    
        // En-têtes additionnels
        $headers .= 'To: Administrateur - ' . $titre_wiki . ' <' . $notification_email . '>' . "\r\n";
        $headers .= 'From: E-mail automatique - ' . $titre_wiki . ' <nepasrepondre@waaki.example.com>' . "\r\n";
         
        // Envoi
        mail($notification_email, $sujet, $message, $headers);
        
    }
    
    // On renvoie vers un message de confirmation
    header('Location: ' . $url_wiki . '?action=editer&id=' . $_POST['page_id'] . '&message=1');

?>