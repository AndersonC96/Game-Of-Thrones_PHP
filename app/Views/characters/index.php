<form method="GET" action="/characters">
    <input type="text" name="search" placeholder="Buscar personagem" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
<h1>Lista de Personagens</h1>
<?php if (!empty($characters)): ?>
    <div class="row">
        <?php foreach ($characters as $character): ?>
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
    <!-- Paginação -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">Anterior</a>
                </li>
            <?php endif; ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">Próximo</a>
            </li>
        </ul>
    </nav>
<?php else: ?>
    <p>Nenhum personagem encontrado.</p>
<?php endif; ?>