<?php
    // Si on a chargé une ancienne révision
    if($page['ancienne_revision'] == true)
        echo '<article class="infos"><p>Cette page est une ancienne révision. <a href="' . $url_wiki . '?id=' . $_GET['id'] . '">Cliquez ici pour voir la version la plus récente</a>.</p></article>';

    // Affichage du titre
    echo '<article><h1>' . $titre_page . '</h1>';

    // On affiche le contenu parsé
    echo $contenu_parse . '</article>';
    
    echo '<article class="infos"><p>Dernière édition le ' . date($format_date, $page['timestamp']) . ' par ' . $page['ip'] . '. <a href="' . $url_wiki . '?action=historique&id=' . $_GET['id'] . '">Voir l\'historique</a>. <a href="' . $url_wiki . '?action=editer&id=' . $_GET['id'] . '">Éditer cette page</a>.</p></article>';
?>