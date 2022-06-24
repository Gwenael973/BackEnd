<?php

require_once __DIR__. '/include/init.php';

unset ($_SESSION['utilisateur']);
unset ($_SESSION['panier']);
unset($_SESSION['adresseFac']);
unset($_SESSION['adresseLiv']);
header('Location:index.php');
die;
