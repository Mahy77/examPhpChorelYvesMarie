<?php
    require_once 'header.php';
 $errors = [];
    if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
        $errors = validateLogin()['errors'];

        if (count($errors) === 0) {
            $errors = checkUser($pdo);
            if (count($errors) === 0){
            header('Location: index.php');
        }
        }
    }
?>


  <div class=" container my-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin">
          <div class="card-body">
            <h5 class="card-title text-center">Connexion</h5>
            <form class="form-signin" method="post">
              
            <div class="form-label-group">
                <input type="mail" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="email">Email</label>
            </div>

              <div class="form-label-group">
                <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" placeholder="mot_de_passe" required>
                <label for="mot_de_passe">Mot de passe</label>
              </div>
              <button class="btn btn-lg btn-outline-info btn-block text-uppercase" type="submit">Se connecter</button>
              <hr class="my-4">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
    <?php 
    if (count($errors) != 0) {
        foreach($errors as $error){
            echo('<p class="text-center text-danger">'.$error.'</p>');
        }
    }
?>   
</div>
