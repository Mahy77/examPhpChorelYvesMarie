<?php
  $reponse = $pdo->query('SELECT * FROM experience');


?>

<div class="container">
    <h4 class="text-center display-4">Expérience</h4> 
  <table class="table">
    <thead class="thead-light">
      <th>Date de Début</th>
      <th>Date de Fin</th>
      <th>Titre</th>
      <th>Description</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      $experiences= $reponse->fetchAll();
      foreach ($experiences as $experience){
        echo(
        '<tr>'
          .'<td class="text-center">'.date('d m Y', strtotime($experience['date_debut'])).'</td>'
          .'<td class="text-center">'.date('d m Y', strtotime($experience['date_fin'])).'</td>'
          .'<td class="text-center">'.$experience['titre'].'</td>'
          .'<td class="text-center">'.$experience['description'].'</td>'
          .'<td class="text-center"><a title="editer" class="btn btn-outline-info m-2" href="edit-experience.php?id='.$experience['id'].'">Editer</a>
          <a title="Supprimer" class="btn btn-outline-danger m-2" href="delete-experience.php?id='.$experience['id'].'">supprimer</a></td>'
        );
    }
      ?>
      </tbody>

</table>
</div>