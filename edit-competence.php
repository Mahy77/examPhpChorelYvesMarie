<?php
require_once 'header.php';
if(!isset($_SESSION['utilisateur'])){
    header('Location: redirection.php');
}

$idCompetence = $_GET['id'];
$competence = getCompetence($pdo, $idCompetence);
$errors = [];
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validateCompForm();
    $errors = $returnValidation['errors'];

    if( count($errors) === 0) {
        updateCompBdd($pdo, $competence['id']);
        header('Location: index.php');
    }
}


?>

<div class="container">
    <h3 class="h3 text-center">Editer</h3>
        <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
        <form action="edit-competence.php?id=<?php echo($competence['id']);?>" method="post" class="form-signin" enctype="multipart/form-data">
            <div class="form-label-group">
                <input type="text" id="titre" name="titre" value="<?php echo($competence['titre']) ?>" class="form-control" placeholder="titre" required autofocus>
                <label for="titre">Titre</label>
            </div>
            <div class="form-label-group">
                <input type="number" id="note" name="note" value="<?php echo($competence['note']) ?>" class="form-control" placeholder="note" required autofocus>
                <label for="note">Note</label>
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