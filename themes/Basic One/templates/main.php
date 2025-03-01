<?= $header; ?>
<?php if (!isset($_GET['module']) || strtolower($_GET['module']) !== 'login') { ?>
    <?= $navbar; ?>
<?php } ?>

<?= $content; ?>

<?= $footer; ?>
