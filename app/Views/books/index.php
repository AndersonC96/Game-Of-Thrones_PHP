<h1>Lista de Livros</h1>
<div class="row">
    <?php if (!empty($books)): ?>
        <?php foreach ($books as $book): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($book['name']); ?></h5>
                            <p class="card-text"><b>Autor</b>: <?= htmlspecialchars($book['authors'][0]); ?></p>
                            <p class="card-text"><b>Data de lançamento</b>: <?= htmlspecialchars($book['released']) ? htmlspecialchars(date('d/m/Y', strtotime($book['released']))) : 'Data não disponível'; ?></p>
                            <a href="/books/details?id=<?= urlencode(basename($book['url'])) ?>" class="btn">Ver detalhes</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted">Nenhum livro encontrado.</p>
    <?php endif; ?>
</div>