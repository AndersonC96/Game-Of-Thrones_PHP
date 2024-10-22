<?php
    require_once '../app/Views/layouts/header.php';
?>
<h1><?= htmlspecialchars($title); ?></h1>
<p><?= htmlspecialchars($description); ?></p>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Livros</h5>
                <p class="card-text">Descubra os livros de Game of Thrones.</p>
                <a href="/books" class="btn btn-primary">Ver Livros</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Personagens</h5>
                <p class="card-text">Explore os personagens da série.</p>
                <a href="/characters" class="btn btn-primary">Ver Personagens</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Casas</h5>
                <p class="card-text">Veja as grandes casas de Westeros.</p>
                <a href="/houses" class="btn btn-primary">Ver Casas</a>
            </div>
        </div>
    </div>
</div>
<?php
    require_once '../app/Views/layouts/footer.php';
?>