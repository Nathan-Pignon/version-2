<?php
include("db.php");
include("top.php");
//on include nos pages php où sont toutes nos méthodes
include("Validator.php");
include("FormValidator.php");
//on inclue la variable de la classe
$formvalidate = new FormValidator();
$manager = new Manager();

  //ma requête sql pour récupérer 30 films au hasard
  //pour l'instant, on ne fait que stocker la requête dans une chaîne

?>

<main class="mainAvis">
    <section class="avis">
    <br>
		<h2 class="titreAvis">Tous les avis !</h2>
        <br>
		<?php $manager->posts() ?>
			
			<!-- afficher tous les avis -->
			
    </section>
    <div class="VotreAvis">
	<p class="txt">Votre avis</p> <br>
    <form class="formulaire" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name"> 
        <ul class="errors">
            <!-- affichage des erreurs ici -->
            <?php
        if($formvalidate->formIsSubmitted()== true){
        /* Je récupère la valeur de "Pseudo" */
        $name = $_POST['name'];
       
        /* J'exécute les fonctions permettant de trouver une erreur */
        $formvalidate->validateRequired($name, "name");
        $formvalidate->validateStringLength($name, "name", 3, 75);
        /* On voit s'il y a une erreur */
        if(!$formvalidate->isValid())
        {
            /* Et on lui dit que s'il y a une ou des erreurs il devra toutes les afficher */
            $notValide = $formvalidate->getErrors('name'); 
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
        <label for="entreprise">Entreprise :</label>
        <input type="text" id="prenom" name="entreprise"> 
        <ul class="errors">
            <!-- affichage des erreurs ici -->
            <?php
        if($formvalidate->formIsSubmitted()== true){
        /* Je récupère la valeur de "Pseudo" */
        $entreprise = $_POST['entreprise'];
        /* J'exécute les fonctions permettant de trouver une erreur */
        $formvalidate->validateRequired($entreprise, "entreprise");
        $formvalidate->validateStringLength($entreprise, "entreprise", 1, 75);
        /* On voit s'il y a une erreur */
        if(!$formvalidate->isValid())
        {
            /* Et on lui dit que s'il y a une ou des erreurs il devra toutes les afficher */
            $notValide = $formvalidate->getErrors('entreprise'); 
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
        <label for="email">E-mail :</label>
        <input type="email" id="mail" name="email">
        <ul class="errors">
            <!-- affichage des erreurs ici -->
            <?php
        if($formvalidate->formIsSubmitted()== true){
        /* Je récupère la valeur de "Email" */
        $email = $_POST['email'];
        /* J'exécute les fonctions permettant de trouver une erreur */
        $formvalidate->validateRequired($email, "email");
        $formvalidate->validateStringLength($email, "email", 8, 255);
        $formvalidate->validateEmail($email, "email");
        /* On voit s'il y a une erreur */
        if(!$formvalidate->isValid())
        {
            /* Et on lui dit que s'il y a une ou des erreurs il devra toutes les afficher */
            $notValide = $formvalidate->getErrors('email'); 
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
        <label for="message">Votre avis :</label>
        <textarea id="msg" name="message"></textarea>
        <ul class="errors">
            <!-- affichage des erreurs ici -->
            <?php
        if($formvalidate->formIsSubmitted()== true){
        /* Je récupère la valeur de "Pseudo" */
        $mess = $_POST['message'];
        /* J'exécute les fonctions permettant de trouver une erreur */
        $formvalidate->validateRequired($mess, "message");
        $formvalidate->validateStringLength($mess, "message", 3, 50);
        /* On voit s'il y a une erreur */
        if(!$formvalidate->isValid())
        {
            /* Et on lui dit que s'il y a une ou des erreurs il devra toutes les afficher */
            $notValide = $formvalidate->getErrors('message'); 
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

                $manager->saveAvis($name, $entreprise, $email, $mess);

            }
     } 
     ?>
     <div class="button">
        <button class="btn btn-outline-primary">Publier !</button>
	</div>
</form>
</div>
</main>

<?php include("bottom.php") ?>