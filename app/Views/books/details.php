<h1>Detalhes do Livro</h1>
<?php if (!empty($book)): ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($book['name']); ?></h5>
            <p class="card-text"><b>Autor</b>: <?= htmlspecialchars($book['authors'][0]); ?></p>
            <p class="card-text"><b>Número de páginas</b>: <?= htmlspecialchars($book['numberOfPages']); ?></p>
            <p class="card-text"><b>Data de lançamento</b>: <?= htmlspecialchars($book['released']) ? htmlspecialchars(date('d/m/Y', strtotime($book['released']))) : 'Data não disponível'; ?></p>
            <h6><b>Personagens</b>:</h6>
            <ul>
                <?php if (!empty($book['character_names'])): ?>
                    <?php foreach ($book['character_names'] as $characterName): ?>
                        <li><?= htmlspecialchars($characterName); ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Sem personagens para exibir</li>
                <?php endif; ?>
            </ul>
            <div class="pagination">
                <?php if ($book['pagination']['page'] > 1): ?>
                    <a href="?id=<?= $id; ?>&page=<?= $book['pagination']['page'] - 1; ?>" class="btn btn-primary">Anterior</a>
                <?php endif; ?>
                <?php if ($book['pagination']['page'] < $book['pagination']['totalPages']): ?>
                    <a href="?id=<?= $id; ?>&page=<?= $book['pagination']['page'] + 1; ?>" class="btn btn-primary">Próximo</a>
                <?php endif; ?>
            </div>
            <a href="/books" class="btn btn-secondary">Voltar à lista</a>
        </div>
    </div>
<?php else: ?>
    <p class="text-muted">Detalhes do livro não encontrados.</p>
<?php endif; ?>