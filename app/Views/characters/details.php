<h1>Detalhes do Personagem</h1>
<?php if (!empty($character)): ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($character['name']); ?></h5>
            <p class="card-text">Casa: <?= htmlspecialchars($character['house']); ?></p>
            <p class="card-text">Aparições: <?= htmlspecialchars(implode(', ', $character['appearances'])); ?></p>
            <a href="/characters" class="btn btn-secondary">Voltar à lista</a>
        </div>
    </div>
<?php else: ?>
    <p class="text-muted">Detalhes do personagem não encontrados.</p>
<?php endif; ?>