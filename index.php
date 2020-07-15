<?php
  require_once 'header.php';
  


             if(isset($_SESSION['utilisateur'])){
                    echo('<h4 class="h4 text-center">Bonjour '.$_SESSION['utilisateur']['prenom'].' !</h4>');
             }else{
                echo('<h3 class="h3 text-center">Bienvenue sur le CV de Yves-Marie Chorel</h3>');
             }

             require_once 'competences.php';
             echo('<hr class="container">');
             require_once 'experience.php';
?>