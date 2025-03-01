<div class="p-4">
    <h1><?= $title; ?></h1>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($vardefs as $field => $def): ?>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold"><?= $def['label']; ?>:</label>
                        <p>
                            <?php if ($def['format'] === 'boolean'): ?>
                                <?= $data_list[$field] ? 'Yes' : 'No'; ?>
                            <?php elseif ($def['format'] === 'email'): ?>
                                <a href="mailto:<?= $data_list[$field]; ?>"><?= $data_list[$field]; ?></a>
                            <?php else: ?>
                                <?= $data_list[$field]; ?>
                            <?php endif; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="card-footer">
            <a href="index.php?module=crm&action=list&crm_module=<?= $crm_module; ?>" class="btn btn-secondary">Volver a la Lista</a>
        </div>
    </div>
</div>