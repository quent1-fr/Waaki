<?php
    
    // Si aucune page n'est définie, on charge $page_404
    if(!isset($_GET['id']))
        header('Location: ' . $url_wiki . '?action=lire&id=404');
        
    // On tente de charger la page
    $page = lire_page($_GET['id']);
    
    // Si la page n'existe pas, on charge $page_404
    if($page === false)
        header('Location: ' . $url_wiki . '?action=lire&id=404');
        
    // On charge l'historique
    $historique = historique($_GET['id']);
        
    // Définition du titre
    $titre_page = 'Historique des modifications pour « ' .$page['titre'] . ' »';
    
    // Inclusion du template
    include 'theme/historique.tpl';
?>