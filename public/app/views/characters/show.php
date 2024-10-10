<?php include '../app/views/layouts/header.php'; ?>
<h1>Detalhes do Personagem</h1>
<?php if ($character): ?>
    <p><strong>Nome:</strong> <?php echo $character['name'] ?: 'Desconhecido'; ?></p>
    <p><strong>Gênero:</strong> <?php echo $character['gender'] ?: 'Desconhecido'; ?></p>
    <p><strong>Nascimento:</strong> <?php echo $character['born'] ?: 'Desconhecido'; ?></p>
    <p><strong>Título:</strong> <?php echo $character['titles'][0] ?: 'Nenhum título'; ?></p>
    <p><strong>Casa(s):</strong> <?php echo $character['allegiances'] ? implode(', ', $character['allegiances']) : 'Sem afiliações'; ?></p>
    <p><strong>Ator:</strong> <?php echo $character['playedBy'][0] ?: 'Desconhecido'; ?></p>
    <a href="/characters">Voltar à lista de personagens</a>
<?php else: ?>
    <p>Personagem não encontrado.</p>
    <a href="/characters">Voltar à lista de personagens</a>
<?php endif; ?>
<?php include '../app/views/layouts/footer.php'; ?>