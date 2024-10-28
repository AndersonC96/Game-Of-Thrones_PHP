<form method="GET" action="/characters">
    <input type="text" name="search" placeholder="Buscar personagem" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" class="form-control" style="display: inline-block; width: auto; margin-right: 10px;">
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<h1>Lista de Personagens</h1>
<?php if (!empty($charactersToShow)): ?>
    <div class="row mt-4">
    <div class="row">
        <?php foreach ($charactersToShow as $character): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($character['name'] ?? 'Nome não disponível'); ?> (<?= htmlspecialchars($character['aliases'][0] ?? 'Nome não disponível'); ?>)</h5>
                        <p class="card-text"><b>Casa</b>:
                            <?php if (!empty($character['allegiances'])): ?>
                                <?= htmlspecialchars(implode(', ', $character['allegiances'])); ?>
                            <?php else: ?>
                                Nenhuma casa associada
                            <?php endif; ?>
                        </p>
                        <a href="/characters/details?id=<?= urlencode($character['url']); ?>" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
    <!-- Paginação -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($currentPage > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $currentPage - 1 ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">Anterior</a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $currentPage ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($_GET['search'] ?? '') ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $currentPage + 1 ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">Próximo</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php else: ?>
    <p>Nenhum personagem encontrado.</p>
<?php endif; ?>