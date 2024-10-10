<?php include '../app/views/layouts/header.php'; ?>
<h1>Personagens de Game of Thrones</h1>
<form method="GET" action="/characters">
    <input type="text" name="search" placeholder="Digite o nome do personagem..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit">Buscar</button>
</form>
<?php if (count($characters) > 0): ?>
    <ul>
        <?php foreach ($characters as $character): ?>
            <li>
                <a href="/characters/<?php echo $character['id']; ?>">
                    <?php echo $character['name'] ?: 'Personagem sem nome'; ?> - Casa: <?php echo $character['allegiances'] ? $character['allegiances'][0] : 'Sem casa'; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Nenhum personagem encontrado.</p>
<?php endif; ?>
<?php include '../app/views/layouts/footer.php'; ?>