<div class="p-4">
    <h1><?= $nombre; ?></h1>

    <form action="" method="post" class="row">
        <?php foreach ($vardefs as $var => $def): ?>
            <div class="form-group col-md-<?= $def['size']; ?> mb-3">
                <label for="<?= $var; ?>"><?= $def['label']; ?></label>

                <?php if ($def['type'] === 'text'): ?>
                    <!-- Campo de tipo texto -->
                    <input type="text" 
                           name="<?= $var; ?>" 
                           id="<?= $var; ?>" 
                           value="<?= $def['default']; ?>" 
                           class="form-control"
                           maxlength="<?= $def['maxlength'] ?? ''; ?>"
                           <?= $def['required'] ? 'required' : ''; ?>>

                <?php elseif ($def['type'] === 'checkbox'): ?>
                    <!-- Campo de tipo checkbox -->
                    <div class="form-check">
                        <input type="checkbox" 
                               name="<?= $var; ?>" 
                               id="<?= $var; ?>" 
                               class="form-check-input"
                               <?= $def['default'] ? 'checked' : ''; ?>
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
                                    <?= $def['default'] === $value ? 'selected' : ''; ?>>
                                <?= $label; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                <?php elseif ($def['type'] === 'textarea'): ?>
                    <!-- Campo de tipo textarea -->
                    <textarea name="<?= $var; ?>" 
                              id="<?= $var; ?>" 
                              class="form-control"
                              <?= $def['required'] ? 'required' : ''; ?>><?= $def['default']; ?></textarea>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>