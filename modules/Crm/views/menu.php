<ul class="nav justify-content-center p-2 bg-secondary-subtle">
    <?php foreach ($menu_list as $menu): ?>
    <li class="nav-item">
        <a class="nav-link" href="index.php?module=crm&action=list&crm_module=<?= $menu ?>"><?= $menu; ?></a>
    </li>
    <?php endforeach; ?>
</ul>