<?php ob_start() ?>
<p>Bienvenue !</p>

<form  action="<?=URL?>ValiderInscription" method="POST" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="mail" id="mail" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Password</label>
        </div>
        <div class="col-auto">
            <input type="password" id="password" class="form-control" name="password" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Must be 8-20 characters long.
            </span>
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">pseudo</label>
        </div>
        <div class="col-auto">
            <input name="pseudo" id="pseudo" class="form-control">
        </div>
    </div>
    <?php
            
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
        }

    ?>
    <button type="submit" class="btn btn-light text-info border-info">Valider l'inscription</button>
</form>

<?php
$titre = "Inscription";
$content = ob_get_clean();
require_once "App/Views/template.php";
