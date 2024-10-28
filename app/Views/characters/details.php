<h1>Detalhes do Personagem</h1>
<?php if (!empty($character)): ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= !empty($character['name']) ? htmlspecialchars($character['name']) : 'Nome não disponível'; ?></h5>
            <p class="card-text"><b>Gênero</b>: <?= !empty($character['gender']) ? htmlspecialchars($character['gender']) : 'Não disponível'; ?></p>
            <p class="card-text"><b>Local</b>: <?= !empty($character['culture']) ? htmlspecialchars($character['culture']) : 'Não disponível'; ?></p>
            <p class="card-text"><b>Nascimento</b>: <?= !empty($character['born']) ? htmlspecialchars($character['born']) : 'Não disponível'; ?></p>
            <p class="card-text"><b>Morte</b>: <?= !empty($character['died']) ? htmlspecialchars($character['died']) : 'Não disponível'; ?></p>
            <p class="card-text"><b>Títulos</b>: <?= !empty($character['titles']) ? implode(', ', $character['titles']) : 'Nenhum título'; ?></p>
            <!-- Requisição para obter o nome da casa -->
            <p class="card-text"><b>Casa</b>:
                <?php
                if (!empty($character['allegiances'])) {
                    $houseUrl = $character['allegiances'][0];
                    $houseData = file_get_contents($houseUrl);
                    $house = json_decode($houseData, true);
                    echo htmlspecialchars($house['name'] ?? 'Nome da casa não disponível');
                } else {
                    echo 'Nenhuma casa associada';
                }
                ?>
            </p>
            <p class="card-text"><b>Apelidos</b>: <?= !empty($character['aliases']) ? implode(', ', $character['aliases']) : 'Nenhum apelido'; ?></p>
            <p class="card-text"><b>Pai:</b> <?= !empty($character['fatherName']) ? htmlspecialchars($character['fatherName']) : 'Informação não disponível'; ?></p>
            <p class="card-text"><b>Mãe</b>: <?= !empty($character['mother']) ? htmlspecialchars($character['mother']) : 'Informação não disponível'; ?></p>
            <!-- Requisição para obter o nome do(a) esposo(a) -->
            <p class="card-text"><b>Esposa(o)</b>:
                <?php
                if (!empty($character['spouse'])) {
                    $spouseUrl = $character['spouse'];
                    $spouseData = file_get_contents($spouseUrl);
                    $spouse = json_decode($spouseData, true);
                    echo htmlspecialchars($spouse['name'] ?? 'Nome do cônjuge não disponível');
                } else {
                    echo 'Nenhuma informação disponível';
                }
                ?>
            </p>
            <!-- Requisição para obter o nome das alianças -->
            <p class="card-text"><b>Alianças</b>:
                <?php
                if (!empty($character['allegiances'])) {
                    foreach ($character['allegiances'] as $allianceUrl) {
                        $allianceData = file_get_contents($allianceUrl);
                        $alliance = json_decode($allianceData, true);
                        echo htmlspecialchars($alliance['name'] ?? 'Nome da aliança não disponível') . '<br>';
                    }
                } else {
                    echo 'Nenhuma aliança disponível';
                }
                ?>
            </p>
            <!-- Requisição para obter o nome dos livros em que aparece -->
            <p class="card-text"><b>Livros</b>:
                <?php
                if (!empty($character['books'])) {
                    foreach ($character['books'] as $bookUrl) {
                        $bookData = file_get_contents($bookUrl);
                        $book = json_decode($bookData, true);
                        echo htmlspecialchars($book['name'] ?? 'Nome do livro não disponível') . '<br>';
                    }
                } else {
                    echo 'Nenhum livro disponível';
                }
                ?>
            </p>
            <p class="card-text"><b>Temporadas</b>: <?= !empty($character['tvSeries']) ? implode(', ', $character['tvSeries']) : 'Nenhuma temporada'; ?></p>
            <p class="card-text"><b>Ator/Atriz</b>: <?= !empty($character['playedBy']) ? implode(', ', $character['playedBy']) : 'Nenhum ator/atriz'; ?></p>
            <a href="/characters" class="btn btn-secondary">Voltar à lista</a>
        </div>
    </div>
<?php else: ?>
    <p class="text-muted">Detalhes do personagem não encontrados.</p>
<?php endif; ?>