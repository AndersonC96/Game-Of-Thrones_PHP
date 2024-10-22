<h1>Detalhes do Livro</h1>
<?php if (!empty($book)): ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($book['name']); ?></h5>
            <p class="card-text">Autor: <?= htmlspecialchars($book['author']); ?></p>
            <p class="card-text">Data de Publicação: <?= htmlspecialchars($book['release_date']); ?></p>
            <p class="card-text">Resumo: <?= nl2br(htmlspecialchars($book['summary'])); ?></p>
            <a href="/books" class="btn btn-secondary">Voltar à lista</a>
        </div>
    </div>
<?php else: ?>
    <p class="text-muted">Detalhes do livro não encontrados.</p>
<?php endif; ?>