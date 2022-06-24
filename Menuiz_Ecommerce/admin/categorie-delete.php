<?php
require_once __DIR__.'/../include/init.php';
adminSecurity();

$query = 'DELETE FROM T_D_PRODUCTTYPE_PTY WHERE PTY_ID='.(int)$_GET['id'];

$pdo->exec($query);
setFlashMessage('La categorie a été supprimée');
header('Location: categories.php');
//termine l'excution du script