<?php
    /*
     * db_reader.php
     *
     * Fonctions permettant de lire facilement la base de données texte.
    */
    
    /*
     * Retourne l'historique des modifications pour une page donnée
    */
    function historique($id_page){
        
        // On vérifie si la page existe
        if(!file_exists('donnees/' . $id_page . '/contenu.md'))
            return false;
        
        // On initialise les variables
        $fichiers   = array();
        $historique = array();
        
        // On liste le répertoire de la page
        $repertoire = opendir('donnees/' . $id_page);
        
        while($fichier = readdir($repertoire)){
            
            // Si ce n'est ni un dossier, ni contenu.md, ni publique
            if(!is_dir($fichier) && $fichier != 'contenu.md' && $fichier != 'publique'){
                
                // On ajoute le fichier à la liste
                $fichiers[] = str_replace('.md', '', $fichier);
                
            }
        }
        
        closedir($repertoire);
        
        // On trie le tableau
        rsort($fichiers);
        
        // On traite tous les éléments du tableau
        foreach($fichiers as $fichier){
            // On lis le fichier, et on l'ajoute à la liste
                
            $page = lire_page($id_page, $fichier);
                
            $historique[] = array(
                'ip'            => $page['ip'],
                'timestamp'     => $page['timestamp'],
                'commentaire'   => $page['commentaire']
            );
        }
        
        return $historique;
    }
    
    /*
     * Permet de lire toutes les informations d'une page donnée
    */
    function lire_page($id_page, $revision = null){
        
        // On défini le fichier contenant les données de la page
        if($revision === null or !is_numeric($revision)){
            $ancienne_revision = false;
            $url = 'donnees/' . $id_page . '/contenu.md';
        }
        else{
            $ancienne_revision = true;
            $url = 'donnees/' . $id_page . '/' . $revision . '.md';
        }
        
        // On vérifie si la page existe
        if(!file_exists($url))
            return false;
        
        // On initialise les variables
        $titre              = null;
        $contenu_brut       = null;
        $page_publique      = null;
        $ip                 = null;
        $commentaire        = null;
        $timestamp          = null;
        
        // On regarde si la page est éditable
        if(!file_exists('donnees/' . $id_page . '/publique'))
            $page_publique = false;
        else
            $page_publique = true;
        
        // On récupère la date de dernière modification
        if($revision === null or !is_numeric($revision))
            $timestamp = filemtime($url);
        else
            $timestamp = $revision;
        
        // On ouvre le fichier
        $contenu = file($url);
        
        // On le lis ligne par ligne
        foreach($contenu as $numero_ligne => $contenu_ligne){
            
            // IP du dernier éditeur
            if($numero_ligne == 0)
                $ip = $contenu_ligne;
            
            // Commentaire lié à l'édition    
            elseif($numero_ligne ==  1)
                $commentaire = $contenu_ligne;
            
            // Titre de la page
            elseif($numero_ligne ==  2)
                $titre = $contenu_ligne;
            
            // Contenu
            else
                $contenu_brut .= $contenu_ligne;
                
        }
        
        // Si la page est vide, on utilise le fallback
        if($contenu_brut == '')
            $contenu_brut = $fallback_contenu;
        
        // On retourne toutes les informations
        return array(
            'titre'                 => $titre,
            'contenu'               => $contenu_brut,
            'publique'              => $page_publique,
            'ip'                    => $ip,
            'commentaire'           => $commentaire,
            'timestamp'             => $timestamp,
            'ancienne_revision'     => $ancienne_revision
        );
    }
?>