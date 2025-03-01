<div class="p-4">
    <h1><?= $title; ?> <a href="index.php?module=crm&action=create&crm_module=<?= $crm_module; ?>" class="btn btn-primary">Crear</a></h1>

    <table class="table table-bordered table-striped table-sm">
        <thead>
            <tr>
                <?php foreach ($vardefs as $field => $def): ?>
                    <th>
                        <?= $def['label']; ?>
                        <?php if ($def['sortable']): ?>
                            <a href="#" class="sort-link" data-field="<?= $field; ?>">
                                <i class="fas fa-sort"></i>
                            </a>
                        <?php endif; ?>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_list as $value): ?>
                <tr>
                    <?php foreach ($vardefs as $field => $def): ?>
                        <?php if ($field === 'actions'): ?>
                            <td>
                                <a href="index.php?module=crm&action=detail&crm_module=<?= $crm_module; ?>&id=<?= $value['id']; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Detalles
                                </a>
                                <a href="index.php?module=crm&action=edit&crm_module=<?= $crm_module; ?>&id=<?= $value['id']; ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?');">
                                    <i class="fas fa-trash"></i> Eliminar
                                </a>
                            </td>
                        <?php else: ?>
                            <td><?= $value[$field]; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>