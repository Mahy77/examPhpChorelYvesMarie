<?php
require_once 'header.php';
if(!isset($_SESSION['utilisateur'])){
    header('Location: redirection.php');
}

$idExperience = $_GET['id'];
$experience = getExperience($pdo, $idExperience);
$errors = [];
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validateExpForm();
    $errors = $returnValidation['errors'];

    if( count($errors) === 0) {
        updateExpBdd($pdo, $experience['id']);
        header('Location: index.php');
    }
}


?>

<div class="container">
    <h3 class="h3 text-center">Ajouter des expériences</h3>
        <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
        <form action="edit-experience.php?id=<?php echo($experience['id']);?>" method="post" class="form-signin" enctype="multipart/form-data">
            <div class="form-label-group">
                <input type="text" id="titre" name="titre" value="<?php echo($experience['titre']) ?>" class="form-control" placeholder="titre" required autofocus>
                <label for="titre">Titre</label>
            </div>
            <div class="form-label-group">
                <input type="date" id="date_debut" name="date_debut" value="<?php echo($experience['date_debut']) ?>" class="form-control" placeholder="date_debut" required autofocus>
                <label for="date_debut">Date de Début</label>
            </div>
            <div class="form-label-group">
                <input type="date" id="date_fin" name="date_fin" value="<?php echo($experience['date_fin']) ?>" class="form-control" placeholder="date_fin" required autofocus>
                <label for="date_fin">Date de Fin</label>
            </div>
            <div class="form-label-group">
                <textarea type="text" id="description" name="description" value="<?php echo($experience['description']) ?>" class="form-control" placeholder="description" required autofocus></textarea>
                <label for="description"></label>
            </div>
            
                <button type="submit" class="btn btn-lg btn-outline-success btn-block text-uppercase">Soumettre</button>
        </form>

        <?php 
            if (count($errors) != 0){
                foreach($errors as $error){
                    echo('<p>'.$error.'</p>');
                }
            }
        
        ?>
        </div>
        </div>
        </div>
        </div>
        </div>