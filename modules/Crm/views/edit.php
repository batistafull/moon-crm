<div class="p-4">
    <h1><?= $title; ?></h1>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php if (!empty($success)): ?>
                    <li><?= $success; ?></li>
                <?php endif; ?>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="alert alert-success">
        <ul>
            <?php if (!empty($success)): ?>
                <li><?= $success; ?></li>
            <?php endif; ?>
        </ul>
    </div>

    <form action="index.php?module=crm&action=<?= $action ?>&crm_module=<?= $crm_module; ?>&id=<?= $id; ?>" method="post" class="row">
        <?php foreach ($vardefs as $var => $def): ?>
            <div class="form-group col-md-<?= $def['size']; ?> mb-3">
                <label for="<?= $var; ?>"><?= $def['label']; ?></label>

                <?php if ($def['type'] === 'text'): ?>
                    <!-- Campo de tipo texto -->
                    <input type="text" 
                           name="<?= $var; ?>" 
                           id="<?= $var; ?>" 
                           value="<?= $data_list[$var] ?? ''; ?>" 
                           class="form-control"
                           maxlength="<?= $def['maxlength'] ?? ''; ?>"
                           <?= $def['required'] ? 'required' : ''; ?>>

                <?php elseif ($def['type'] === 'checkbox'): ?>
                    <!-- Campo de tipo checkbox -->
                    <div class="form-check">
                        <input type="checkbox" 
                               name="<?= $var; ?>" 
                               id="<?= $var; ?>" 
                               value="1"
                               class="form-check-input"
                               <?= isset($data_list[$var]) && $data_list[$var] ? 'checked' : ''; ?>
                               <?= $def['required'] ? 'required' : ''; ?>>
                        <label class="form-check-label" for="<?= $var; ?>"><?= $def['label']; ?></label>
                    </div>

                <?php elseif ($def['type'] === 'select'): ?>
                    <!-- Campo de tipo select -->
                    <select name="<?= $var; ?>" 
                            id="<?= $var; ?>" 
                            class="form-control"
                            <?= $def['required'] ? 'required' : ''; ?>>
                        <?php foreach ($def['options'] as $value => $label): ?>
                            <option value="<?= $value; ?>" 
                                    <?= isset($data_list[$var]) && $data_list[$var] === $value ? 'selected' : ''; ?>>
                                <?= $label; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                <?php elseif ($def['type'] === 'textarea'): ?>
                    <!-- Campo de tipo textarea -->
                    <textarea name="<?= $var; ?>" 
                              id="<?= $var; ?>" 
                              class="form-control"
                              <?= $def['required'] ? 'required' : ''; ?>><?= $data_list[$var] ?? ''; ?></textarea>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>