#Waaki#
###Le wiki léger et sans base de données###
----
Waaki est un CMS publié sous licence libre GPL v3. Fonctionnant sans base de données (tout est stocké dans plusieurs fichiers et dossiers), il est particulièrement simple à installer et à utiliser, nottament grâce à sa syntaxe Markdown. De plus, n'ayez plus peur des robots spammeurs! En effet, Waaki est livré par défaut avec un captcha anti-spam simple à résoudre... pour les humains!

----

## Tutoriels liés à l'utilisation du wiki ##

----

####Installation et configuration####
Pour installer Waaki, téléchargez et décompressez les sources de Waaki sur votre serveur. Pour le configurer, il vous suffit d'éditer le fichier config.php contenu dans le dossier include/.

----

####Créer une nouvelle page####
Pour créer une nouvelle page, créez un nouveau dossier dans donnees/. Aidez-vous au besoin des dossiers déjà présents. Rendez-vous ensuite sur http://votrewiki/?id=nom_de_votre_dossier pour ajouter du contenu à votre nouvelle page.

----

####Ouvrir/fermer l'édition d'une page aux visiteurs####
Pour ouvrir ou fermer l'édition d'une page aux visiteurs, il vous suffit de créer/de supprimer le fichier « publique » contenu dans donnees/votre-page.

----

## Remerciement ##

----
Waaki ne pourrait pas fonctionner sans le travail réalisé par erusev [et son parseur Markdown][1], publié sous licence MIT.


  [1]: http://parsedown.org/
