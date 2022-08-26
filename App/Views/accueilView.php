<?php ob_start() ?>

<h2>Accueil</h2>

<?php
$titre = "Page d'accueil";
$content = ob_get_clean();
require_once "App/Views/template.php";