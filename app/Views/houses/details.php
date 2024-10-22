<h1>Detalhes da Casa</h1>
<?php if (!empty($house)): ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($house['name']); ?></h5>
            <p class="card-text">Região: <?= htmlspecialchars($house['region']); ?></p>
            <p class="card-text">Fundador: <?= htmlspecialchars($house['founder']); ?></p>
            <p class="card-text">Lema: <?= htmlspecialchars($house['words']); ?></p>
            <a href="/houses" class="btn btn-secondary">Voltar à lista</a>
        </div>
    </div>
<?php else: ?>
    <p class="text-muted">Detalhes da casa não encontrados.</p>
<?php endif; ?>