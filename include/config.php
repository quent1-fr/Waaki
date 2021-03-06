<?php
    
    // La page par défaut du wiki
    $page_accueil = 'accueil';
    
    // La page d'erreur 404
    $page_404 = '404';
    
    // Le titre du wiki
    $titre_wiki = 'Mon super wiki Waaki';
    
    // L'URL du wiki - Par défaut, cette dernière est auto-détectée
    $url_wiki = '//' . $_SERVER['SERVER_NAME'] . str_replace('publier.php', '', explode('?', $_SERVER['REQUEST_URI'])[0]);
    
    // Le menu du wiki
    $menu_wiki = '<ul><li><a href="' . $url_wiki . '">Accueil</a></li></ul>';
    
    // Le format de la date
    $format_date = 'd/m/Y à H:i';
    
    // Mot de passe pour éditer les pages privées
    $mot_de_passe = 'monsupermotdepasse';
    
    // Footer affiché en bas de la page
    $footer = 'Thème et contenu publiés sous licence <a href="http://creativecommons.org/licenses/by-sa/3.0/fr/">Creative Commons BY-SA</a>';
    
    // Texte affiché si la page est vide
    $fallback_contenu = 'Cette page est vide. Pourquoi ne pas l\'éditer, si vous en avez les droits?';
    
    // Notifier l'utilisateur si une page est éditée? (oui = true; non = false)
    $notification_edition = false;
    
    // E-mail pour la notification
    $notification_email = 'jean.dupond@example.com';
  
    // Activer reCaptcha plutôt que le captcha classique (plus efficace, mais utilise les services Google)?
    $recaptcha = false;

    // Clés fournies par reCaptcha (si activé)
    $recaptcha_site_key = '';
    $recaptcha_secret_key = '';  
?>