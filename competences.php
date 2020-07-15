<?php

  $reponse = $pdo->query('SELECT * FROM competence');


?>


<div class="container"> 
<h4 class="text-center display-4">Compétences</h4> 
  <table class="table">
    <thead class="thead-light">
      <th>Technologie</th>
      <th>Maitrise</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      $competences= $reponse->fetchAll();
      foreach ($competences as $competence){
          $nbStar = $competence['note'];
        echo('<tr>');
        echo('<td class="text-center">'.$competence['titre'].'</td>');
        echo('<td class="text-center">'.$competence['note'].'</td>');
        echo('<td class="text-center"><a title="editer" class="btn btn-outline-info m-2" href="edit-competence.php?id='.$competence['id'].'">Editer</a>
                    <a title="Supprimer" class="btn btn-outline-danger m-2" href="delete-competence.php?id='.$competence['id'].'">supprimer</a>
        </td>');
        echo('</tr>');
    }
      ?>
      
    
    </tbody>

  </table>
  </div>