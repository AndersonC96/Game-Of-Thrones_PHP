<h1>Detalhes da Casa</h1>

<?php if (!empty($house)): ?>
    <div class="card">
        <div class="card-body">
            <h3><?= !empty($house['name']) ? htmlspecialchars($house['name']) : 'Nome não disponível'; ?></h3>
            <p><strong><b>Fundação</b>:</strong> <?= !empty($house['founded']) ? $house['founded'] : 'Fundação não disponível'; ?></p>
            <p><strong><b>Fundador</b>:</strong> <?= !empty($house['founder']) ? htmlspecialchars($house['founder']) : 'Fundador não disponível'; ?></p>
            <p><strong><b>Morte</b>:</strong> <?= !empty($house['diedOut']) ? $house['diedOut'] : 'Morte não disponível'; ?></p>
            <p><strong>Região:</strong> <?= !empty($house['region']) ? htmlspecialchars($house['region']) : 'Região não disponível'; ?></p>
            <p><strong>Brasão:</strong> <?= !empty($house['coatOfArms']) ? htmlspecialchars($house['coatOfArms']) : 'Brasão não disponível'; ?></p>
            <p><strong>Lema:</strong> <?= !empty($house['words']) ? htmlspecialchars($house['words']) : 'Lema não disponível'; ?></p>
            <p><strong>Lord Atual:</strong> <?= !empty($house['currentLordName']) ? htmlspecialchars($house['currentLordName']) : 'Lord não disponível'; ?></p>
            <p><strong>Overlord:</strong> <?= !empty($house['overlordName']) ? htmlspecialchars($house['overlordName']) : 'Overlord não disponível'; ?></p>
            <p><strong><b>Herdeiro</b>:</strong> <?= !empty($house['heir']) ? htmlspecialchars($house['heir']) : 'Herdeiro não disponível'; ?></p>
            <p><strong>Títulos:</strong> <?= !empty($house['titles']) ? implode(', ', $house['titles']) : 'Nenhum título disponível'; ?></p>
            <p><strong>Armas Ancestrais:</strong> <?= !empty($house['ancestralWeapons']) ? implode(', ', $house['ancestralWeapons']) : 'Nenhuma arma ancestral disponível'; ?></p>
            <p><strong><b>Locais</b>:</strong> <?= !empty($house['seats']) ? implode(', ', $house['seats']) : 'Nenhum título disponível'; ?></p>
            <p><strong>Personagens:</strong></p>
            <ul>
                <?php if (!empty($charactersToShow)): ?>
                    <?php foreach ($charactersToShow as $character): ?>
                        <li><?= htmlspecialchars($character); ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Nenhum personagem disponível</li>
                <?php endif; ?>
            </ul>
            <!-- Paginação de personagens -->
            <nav aria-label="Paginação de Personagens">
                <ul class="pagination">
                    <?php if ($characterPage > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?id=<?= urlencode($_GET['id']); ?>&characterPage=<?= $characterPage - 1; ?>" aria-label="Anterior">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $totalCharacterPages; $i++): ?>
                        <li class="page-item <?= $i == $characterPage ? 'active' : ''; ?>">
                            <a class="page-link" href="?id=<?= urlencode($_GET['id']); ?>&characterPage=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <?php if ($characterPage < $totalCharacterPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?id=<?= urlencode($_GET['id']); ?>&characterPage=<?= $characterPage + 1; ?>" aria-label="Próximo">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <a href="/houses" class="btn btn-primary">Voltar à lista</a>
        </div>
    </div>
<?php else: ?>
    <p class="text-muted">Casa não encontrada.</p>
<?php endif; ?>