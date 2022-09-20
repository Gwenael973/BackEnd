<?php
/**
 * side bar template
 *
 * @subpackage wpkites
 */
?>
<div class="col-lg-4 col-md-4 col-sm-12">
    <div class="sidebar">
        <?php if (is_active_sidebar('woocommerce')) : ?>

            <?php dynamic_sidebar('woocommerce'); ?>

        <?php endif; ?>
    </div>
</div>	