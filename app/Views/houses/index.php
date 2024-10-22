<h1>Lista de Casas</h1>
<div class="row">
    <?php if (!empty($houses)): ?>
        <?php foreach ($houses as $house): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($house['name']); ?></h5>
                        <p class="card-text">Região: <?= htmlspecialchars($house['region']); ?></p>
                        <a href="/houses/details/<?= htmlspecialchars($house['id']); ?>" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted">Nenhuma casa encontrada.</p>
    <?php endif; ?>
</div>