<?php
    
    // On mesure le temps de génération
    $debut_chargement = microtime(true);
    
    // On inclu le fichier de configuration
    include 'include/config.php';
    
    // On inclu le parseur Markdown
    include 'include/parsedown.php';
    
    // On inclu le lecteur de la base de données
    include 'include/db_reader.php';
    
    // On démarre le système de sessions
    session_start();
    
    // Début du système de MVC
    ob_start();
    
    
        // Si aucune action n'est définie, on charge lire.php
        if(!isset($_GET['action']))
           $_GET['action'] = 'lire';
        
        
        // Si l'action définie n'existe pas, on charge la page d'erreur 404
        if(!file_exists('actions/' . $_GET['action'] . '.php')){
           $_GET['action'] = 'lire';
           $_GET['id'] = $page_404;
        }
        
           
        // On inclu le fichier correspondant à l'action demandée
        include 'actions/' . $_GET['action'] . '.php';
        
        
        // On stocke la page dans la variable $contenu_page
        $contenu_page = ob_get_contents();
        
    
    ob_end_clean();
    // Fin du système de MVC
    
    // On mesure le temps de génération
    $fin_chargement = microtime(true);
    
    // On calcule le temps de génération (à 0,00001 près)
    $temps_generation = round($fin_chargement - $debut_chargement, 5, PHP_ROUND_HALF_EVEN);
    
    // On inclu le thème du wiki
    include 'theme/theme.php';    
    
?>