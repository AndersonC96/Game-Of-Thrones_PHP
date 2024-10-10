<?php include '../app/views/layouts/header.php'; ?>
<h1>Personagens de Game of Thrones</h1>
<form method="GET" action="/characters">
    <input type="text" name="search" placeholder="Digite o nome do personagem..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit">Buscar</button>
</form>
<form method="GET" action="/characters">
    <label for="house">Filtrar por Casa:</label>
    <select name="house">
        <option value="">Todas as Casas</option>
        <option value="Stark" <?php echo isset($_GET['house']) && $_GET['house'] == 'Stark' ? 'selected' : ''; ?>>Stark</option>
        <option value="Targaryen" <?php echo isset($_GET['house']) && $_GET['house'] == 'Targaryen' ? 'selected' : ''; ?>>Targaryen</option>
        <option value="Lannister" <?php echo isset($_GET['house']) && $_GET['house'] == 'Lannister' ? 'selected' : ''; ?>>Lannister</option>
        <!-- Adicionar outras casas -->
    </select>
    <label for="title">Filtrar por Título:</label>
    <select name="title">
        <option value="">Todos os Títulos</option>
        <option value="Rei" <?php echo isset($_GET['title']) && $_GET['title'] == 'Rei' ? 'selected' : ''; ?>>Rei</option>
        <option value="Rainha" <?php echo isset($_GET['title']) && $_GET['title'] == 'Rainha' ? 'selected' : ''; ?>>Rainha</option>
        <option value="Mão do Rei" <?php echo isset($_GET['title']) && $_GET['title'] == 'Mão do Rei' ? 'selected' : ''; ?>>Mão do Rei</option>
        <!-- Adicionar outros títulos -->
    </select>
    <button type="submit">Aplicar Filtros</button>
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