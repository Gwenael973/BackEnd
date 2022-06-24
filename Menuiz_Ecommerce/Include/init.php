<?php

//initialisation de la session
session_start();
define('RACINE_WEB', ''); //ici mettez le nom du repertoire de votre appli
define('PHOTO_DIR', $_SERVER['DOCUMENT_ROOT'] . '/photo/');

define ('PHOTO_WEB', RACINE_WEB . 'photo/');
define ('IMG_WEB', RACINE_WEB . 'img/');
define( 'PHOTO_DEFAULT', 'https://dummyimage.com/600x400/cccccc/ffffff&text=Pas+d\'image'
        );

require_once __DIR__. '/cnx.php';
require_once __DIR__.'/fonctions.php';
?>