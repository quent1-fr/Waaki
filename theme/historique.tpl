<?php
    // Affichage du titre
    echo '<article><h1>' . $titre_page . '</h1>';
    
    // Affichage du contenu
    echo '<p>Voici l\'ensemble des versions pour cette page:<ul><li><strong>Version actuelle</strong></li>
    <ul>
        <li><a href="' . $url_wiki . '?id=' . $_GET['id'] . '">Version du ' . date($format_date, $page['timestamp']) . ' par ' . $page['ip'] . '. Commentaire: « <em>' . $page['commentaire'] . '</em> »</a></li>
    </ul>
    <li><strong>Anciennes révisions</strong></li>
    <ul>';
    
    foreach($historique as $revision)
        echo '<li><a href="' . $url_wiki . '?id=' . $_GET['id'] . '&revision=' . $revision['timestamp'] . '">Version du ' . date($format_date, $revision['timestamp']) . ' par ' . $revision['ip'] . '. Commentaire: « <em>' . $revision['commentaire'] . '</em> »</a></li>';
    
    echo '</ul></ul></p></article>';
?>