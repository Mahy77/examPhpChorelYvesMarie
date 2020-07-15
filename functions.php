<?php

//  Fonction de validation 
//  de formulaires des Competences

function validateCompForm() {
        $errors= [];
    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }
    if (empty($_POST['note'])) {
        $errors[] = 'Veuillez saisir une note';    
    }
return $errors;
    }

//  Fonction de validation 
//  de formulaires des Expérences

function validateExpForm(){
        $errors= [];
        if (empty($_POST['titre'])) {
            $errors[] = 'Veuillez saisir un titre';
        }
        if (empty($_POST['date_debut'])) {
            $errors[] = 'Veuillez saisir une date de début';    
        }
        if (empty($_POST['date_fin'])) {
            $errors[] = 'Veuillez saisir une date de fin';    
        }
        if (empty($_POST['description'])) {
            $errors[] = 'Veuillez saisir une description';    
        }
    return $errors;
    }

//  Fonctions du 
//  formulaire de login

function validateLogin() {
    $errors= [];
    if (empty($_POST['email'])) {
        $errors[] = 'Veuillez saisir un Email';
    }
    if (empty($_POST['mot_de_passe'])) {
        $errors[] = 'Veuillez saisir un mot de passe';    
    }
return ['errors' => $errors];
    }

    function checkUser($pdo) {
   
        $res = $pdo -> prepare(
            'SELECT * from user where email = :email and mot_de_passe = :mot_de_passe'
        );
        $res -> execute([
            'email' => $_POST['email'],
            'mot_de_passe' => md5($_POST['mot_de_passe'])
        ]);
            $result = $res -> fetch();
            if ($result){
                session_start();
                $_SESSION['utilisateur'] = $result;
            }else{
                $errors =[];
                $errors[] = 'email ou mot de passe incorrect';
            }
            return $errors;
    }
    
    
//  FONCTIONS DU 
//  CRUD COMPETENCE

     function getCompetence($pdo,$id)
{
    $res = $pdo->prepare('SELECT * FROM competence WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}   

 function addCompBdd($pdo){
        $query = $pdo->prepare('INSERT INTO competence (titre, note)
    VALUES(:titre, :note)');
        $query->execute([
            
            'titre' => $_POST['titre'],
            'note' => $_POST['note']
        ]);
    }   

function updateCompBdd($pdo, $id) {
    $req = $pdo->prepare('UPDATE competence SET titre = :titre, note = :note  WHERE id = :id');
            $req->execute([
                'titre' => $_POST['titre'],
                'note' => $_POST['note'],
                'id' => $id
        ]);
}    

 function deleteCompetence($pdo, $id){
        $res = $pdo->prepare('DELETE FROM competence WHERE id = :id');
        $res->execute(['id'=> $id]);
    }


//  FONCTIONS DU 
//  CRUD EXPERIENCE


function addExpBdd($pdo){
        $query = $pdo->prepare('INSERT INTO experience (titre, description, date_debut, date_fin)
    VALUES(:titre, :description, :date_debut, :date_fin)');
        $query->execute([
            
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'date_debut' => $_POST['date_debut'],
            'date_fin' => $_POST['date_fin']
        ]);
    }



function getExperience($pdo,$id)
{
    $res = $pdo->prepare('SELECT * FROM experience WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}



function updateExpBdd($pdo, $id) {
    $req = $pdo->prepare('UPDATE experience SET titre = :titre, description = :description, date_debut = :date_debut, date_fin = :date_fin  WHERE id = :id');
    $req->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin'],
        'id' => $id
]);
}

function deleteExperience($pdo, $id){
        $res = $pdo->prepare('DELETE FROM experience WHERE id = :id');
        $res->execute(['id'=> $id]);
    }


// FONCTION POUR OBTENIR LE RENDU 
// AVEC LES ÉTOILES POUR LA MAITRISE DES COMPÉTENCES


// LES ETOILES APPARAISSENT EN CUMULÉ AU DESSUS DU TABLEAU
// JE REPOSE LES CHIFFRES


function nbStar($nbStar){
        
        for ($i = 0; $i < $nbStar; $i++){
            echo('<i class="fas fa-star"></i>');
        }

    }

   

    
?>
