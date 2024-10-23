<h1>Lista de Casas</h1>
<?php if (!empty($housesToShow)): ?>
    <div class="row">
        <?php foreach ($housesToShow as $house): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= !empty($house['name']) ? htmlspecialchars($house['name']) : 'Nome não disponível'; ?></h5>
                        <p class="card-text">Região: <?= !empty($house['region']) ? htmlspecialchars($house['region']) : 'Região não disponível'; ?></p>
                        <p class="card-text">Brasão: <?= !empty($house['coatOfArms']) ? htmlspecialchars($house['coatOfArms']) : 'Brasão não disponível'; ?></p>
                        <p class="card-text">Lema: <?= !empty($house['words']) ? htmlspecialchars($house['words']) : 'Lema não disponível'; ?></p>
                        <p class="card-text">Lord Atual: <?= !empty($house['currentLordName']) ? htmlspecialchars($house['currentLordName']) : 'Lord não disponível'; ?></p>
                        <p class="card-text">Overlord: <?= !empty($house['overlordName']) ? htmlspecialchars($house['overlordName']) : 'Overlord não disponível'; ?></p>
                        <a href="/houses/details?id=<?= urlencode($house['url']); ?>" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Paginação -->
    <nav aria-label="Paginação">
        <ul class="pagination">
            <?php if ($currentPage > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $currentPage - 1; ?>" aria-label="Anterior">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $currentPage ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $currentPage + 1; ?>" aria-label="Próximo">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php else: ?>
    <p class="text-muted">Nenhuma casa encontrada.</p>
<?php endif; ?>