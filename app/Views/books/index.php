<h1>Lista de Livros</h1>
<div class="row">
    <?php if (!empty($books)): ?>
        <?php foreach ($books as $book): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($book['name']); ?></h5>
                        <p class="card-text">Autor: <?= htmlspecialchars($book['author']); ?></p>
                        <p class="card-text">Data de Publicação: <?= htmlspecialchars($book['release_date']); ?></p>
                        <a href="/books/details/<?= htmlspecialchars($book['id']); ?>" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted">Nenhum livro encontrado.</p>
    <?php endif; ?>
</div>