<h1>Lista de Personagens</h1>
<div class="row">
    <?php if (!empty($characters)): ?>
        <?php foreach ($characters as $character): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($character['name']); ?></h5>
                        <p class="card-text">Casa: <?= htmlspecialchars($character['house']); ?></p>
                        <a href="/characters/details/<?= htmlspecialchars($character['id']); ?>" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted">Nenhum personagem encontrado.</p>
    <?php endif; ?>
</div>