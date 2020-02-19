<?php 

class Controller 
{
    public function home()
    {
        //requête à la bdd pour aller chercher les derniers articles

        include("templates/home.php");
    }

    public function PageCV()
    {
        include("templates/cv.php");
    }

    public function reco()
    {
         //tout le traitement du formulaire
         $errors = [];
         if(!empty($_POST))
         {   
             
             $name = strip_tags($_POST['name']);
             $entreprise = strip_tags($_POST['entreprise']);
             $email = strip_tags($_POST['email']);
             $mess = strip_tags($_POST['message']);
 
 
     }
        include("templates/recommandation.php");
    }

    public function contact()
    {
        //tout le traitement du formulaire
        $errors = [];
        if(!empty($_POST))
        {   
            
            $nom = strip_tags($_POST['user_name']);
            $prenom = strip_tags($_POST['user_firstname']);
            $mail = strip_tags($_POST['user_mail']);
            $comm = strip_tags($_POST['user_message']);


    }

        include("templates/contact.php");
    }

    public function erreur404()
    {
        include("templates/404.php");
    }
}