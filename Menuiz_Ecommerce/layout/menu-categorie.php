<?php

$stmt = $pdo->query('SELECT * FROM T_D_PRODUCTTYPE_PTY');
$categoriesMenu = $stmt->fetchAll();
?>

<div class='navbar-collapse'>
    <ul class="navbar-nav">
        <?php
        foreach ($categoriesMenu as $categoriesMenu) :
        ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= RACINE_WEB; ?>categorie.php?id=<?= $categoriesMenu['PTY_ID']; ?>">
                    <?= $categoriesMenu['PTY_DESCRIPTION']; ?>
                </a>
            </li>

        <?php

        endforeach;
        ?>










    </ul>

</div>