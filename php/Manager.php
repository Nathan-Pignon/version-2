<?php

class Manager {

    public function saveMessage($nom, $prenom, $mail, $comm)
    {
        $sql = "INSERT INTO 
                messages (nom, prenom, mail, commentaire, date_envoie) 
                VALUES 
                (:nom, :prenom, :mail, :comm, NOW())";
 
        $pdo = DbConnection::getPdo();


        //envoie la requête au serveur sql
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":mail" => $mail,
            ":comm"=> $comm,
        ]);

        return $pdo-> lastInsertId();
    }

    public function saveAvis($name, $entreprise, $email, $mess)
    {
        $sql = "INSERT INTO 
                recommandation (author, entreprise, email, messages, created_date) 
                VALUES 
                (:author, :entreprise, :email, :mess, NOW())";
 
        $pdo = DbConnection::getPdo();


        //envoie la requête au serveur sql
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":author" => $name,
            ":entreprise" => $entreprise,
            ":email" => $email,
            ":mess"=> $mess,
        ]);

        return $pdo-> lastInsertId();
    }

    public function posts(){
    $sql = "SELECT * 
    FROM recommandation  
    ORDER BY created_date";

$pdo = DbConnection::getPdo();

//envoie ma requête SQL au serveur MySQL
$stmt = $pdo->prepare($sql);

//demande à MySQL d'exécuter ma requête 
//(les données sont toujours là-bas !)
$stmt->execute();

//récupère les films depuis le serveur MySQL
// ->fetch() pour récupérer une seule ligne ! 
$commentaires = $stmt->fetchAll();

// Affiche le nombre de avis
echo '<h5>Il y a '.count($commentaires).' avis.</h5>';

//Affiche les avis
foreach($commentaires as $commentaire){
	?> <article class="message">
		<?php 
        echo '<h2> '.$commentaire['author'].'</h2>';
        echo '<strong> <p> '.$commentaire['email'].'</p> </strong>';
        echo '<p> Entreprise : '.$commentaire['entreprise'].'</p>';
		echo '<br>';
		echo '<h4> '.$commentaire['messages'].'</h4>';
		echo '<br>';
        echo '<p> '.$commentaire['created_date'].'</p>';
        ?> </article>
		<?php 
	
    }
}
}