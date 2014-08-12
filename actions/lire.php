<?php
    
    // Si aucune page n'est définie, on charge la page d'accueil
    if(!isset($_GET['id']))
        $_GET['id'] = $page_accueil;
        
    // Si $_GET['revision'] n'est pas défini, on le défini (null = la plus récente)
    if(!isset($_GET['revision']))
        $_GET['revision'] = null;
        
    // On tente de charger la page
    $page = lire_page($_GET['id'], $_GET['revision']);
    
    // Si la page n'existe pas, on charge $page_404
    if($page === false)
        $page = lire_page($page_404);
        
    // On parse le markdown
    $parsedown      = new Parsedown();
    $contenu_parse  = $parsedown->text($page['contenu']);
    
    // Définition du titre
    $titre_page = $page['titre'];
    
    // Inclusion du template
    include 'theme/lire.tpl';
?>