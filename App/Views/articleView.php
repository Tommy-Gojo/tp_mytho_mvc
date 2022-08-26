<?php ob_start() ?>

<p>La Mytho logie</p>

<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nom de L'article</h5>
    <p class="card-text">petite desc</p>
    <a href="#" class="btn btn-primary">voir L'article entier</a>
  </div>
</div>


<?php
$titre = "Les articles !";
$content = ob_get_clean();
require_once "App/Views/template.php";