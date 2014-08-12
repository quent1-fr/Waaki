<?php
    
    // Si aucune page n'est définie, on charge $page_404
    if(!isset($_GET['id']))
        header('Location: ' . $url_wiki . '?action=lire&id=404');
        
    // On tente de charger la page
    $page = lire_page($_GET['id']);
    
    // Si la page n'existe pas, on charge $page_404
    if($page === false)
        header('Location: ' . $url_wiki . '?action=lire&id=404');
        
    // Définition du titre
    $titre_page = 'Édition de la page « ' . $page['titre'] . ' »';
    
    // Génération et stockage du captcha
    $nombres = array(
        'zéro',
        'un',
        'deux',
        'trois',
        'quatre',
        'cinq',
        'six',
        'sept',
        'huit',
        'neuf'
    );
    
    // Premier nombre du captcha
    $premier_nombre = mt_rand(0, 9);
    
    // Second nombre du captcha
    $second_nombre = mt_rand(0, 9);
    
    // On stocke le résultat, pour pouvoir le comparer à la réponse de l'utilisateur
    $_SESSION['resultat'] = $premier_nombre + $second_nombre;
    
    // Inclusion du template
    include 'theme/editer.tpl';    
?>