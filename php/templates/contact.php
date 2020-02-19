<?php
include("db.php");
include("top.php");
//on include nos pages php où sont toutes nos méthodes
include("Validator.php");
include("FormValidator.php");
//on inclue la variable de la classe
$formvalidate = new FormValidator();
?>

<main class="mainContact">
	<br>
	<p class="txt">Me contacter</p> <br>
    <form class="formulaire" method="post" enctype="multipart/form-data">
    <div>
        <label for="user_name">Nom :</label>
        <input type="text" id="user_name" name="user_name"> 
        <ul class="errors">
            <!-- affichage des erreurs ici -->
            <?php
        if($formvalidate->formIsSubmitted()== true){
        /* Je récupère la valeur de "Pseudo" */
        $nom = $_POST['user_name'];
       
        /* J'exécute les fonctions permettant de trouver une erreur */
        $formvalidate->validateRequired($nom, "user_name");
        $formvalidate->validateStringLength($nom, "user_name", 3, 75);
        /* On voit s'il y a une erreur */
        if(!$formvalidate->isValid())
        {
            /* Et on lui dit que s'il y a une ou des erreurs il devra toutes les afficher */
            $notValide = $formvalidate->getErrors('user_name'); 
            foreach($notValide as $error)
            {
                $formvalidate->formIsSubmitted()== false;
                echo '<li>'.$error.'</li>';
            }
        }
        }
        ?>
        </ul>
    </div>

    <div>
        <label for="user_firstname">Prenom :</label>
        <input type="text" id="prenom" name="user_firstname"> 
        <ul class="errors">
            <!-- affichage des erreurs ici -->
            <?php
        if($formvalidate->formIsSubmitted()== true){
        /* Je récupère la valeur de "Pseudo" */
        $prenom = $_POST['user_firstname'];
        /* J'exécute les fonctions permettant de trouver une erreur */
        $formvalidate->validateRequired($prenom, "user_firstname");
        $formvalidate->validateStringLength($prenom, "user_firstname", 3, 75);
        /* On voit s'il y a une erreur */
        if(!$formvalidate->isValid())
        {
            /* Et on lui dit que s'il y a une ou des erreurs il devra toutes les afficher */
            $notValide = $formvalidate->getErrors('user_firstname'); 
            foreach($notValide as $error)
            {
                $formvalidate->formIsSubmitted()== false;
                echo '<li>'.$error.'</li>';
            }
        }
        }
        ?>
        </ul>
    </div>

    <div>
        <label for="user_mail">E-mail :</label>
        <input type="email" id="mail" name="user_mail">
        <ul class="errors">
            <!-- affichage des erreurs ici -->
            <?php
        if($formvalidate->formIsSubmitted()== true){
        /* Je récupère la valeur de "Email" */
        $mail = $_POST['user_mail'];
        /* J'exécute les fonctions permettant de trouver une erreur */
        $formvalidate->validateRequired($mail, "user_mail");
        $formvalidate->validateStringLength($mail, "user_mail", 8, 255);
        $formvalidate->validateEmail($mail, "user_mail");
        /* On voit s'il y a une erreur */
        if(!$formvalidate->isValid())
        {
            /* Et on lui dit que s'il y a une ou des erreurs il devra toutes les afficher */
            $notValide = $formvalidate->getErrors('user_mail'); 
            foreach($notValide as $error)
            {
                $formvalidate->formIsSubmitted()== false;
                echo $error;
            }
        }
        }
        ?>
        </ul>
    </div>

    <div>
        <label for="user_message">Message :</label>
        <textarea id="msg" name="user_message"></textarea>
        <ul class="errors">
            <!-- affichage des erreurs ici -->
            <?php
        if($formvalidate->formIsSubmitted()== true){
        /* Je récupère la valeur de "Pseudo" */
        $comm = $_POST['user_message'];
        /* J'exécute les fonctions permettant de trouver une erreur */
        $formvalidate->validateRequired($comm, "user_message");
        $formvalidate->validateStringLength($comm, "user_message", 3, 50);
        /* On voit s'il y a une erreur */
        if(!$formvalidate->isValid())
        {
            /* Et on lui dit que s'il y a une ou des erreurs il devra toutes les afficher */
            $notValide = $formvalidate->getErrors('user_message'); 
            foreach($notValide as $error)
            {
                $formvalidate->formIsSubmitted()== false;
                echo '<li>'.$error.'</li>';
            }
        }
        }
        ?>
        </ul>
    </div>
    <?php 
    if($formvalidate->formIsSubmitted()== true){
        if(empty($errors)){
                $manager = new Manager();

                $manager->saveMessage($nom, $prenom, $mail, $comm);

            }
     } 
     ?>
     <div class="button">
        <button class="btn btn-outline-primary">Envoyer le message</button>
	</div>
</form>
</main>

<?php include("bottom.php") ?>