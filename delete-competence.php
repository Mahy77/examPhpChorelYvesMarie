<?php
  require_once 'header.php';
  
  if(!isset($_SESSION['utilisateur'])){
    header('Location: redirection.php');
}

  $id = $_GET['id'];
  deleteCompetence($pdo, $id);
  header('Location: index.php');

?>