<?php 

//une classe "abstract" ne peut pas être instanciée
abstract class Validator 
{
    private $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    //retourne une booléen en fonction de si le champ a au moins une erreur
    public function hasErrors($fieldName)
    {
        if(!empty($this->errors[$fieldName])){
            return true;
        }

        return false;
    }

    //retourne les erreurs d'un champ spécifique
    public function getErrors($fieldName)
    {
        if ($this->hasErrors($fieldName)) {
            return $this->errors[$fieldName];
        }

        //retourne un tableau vide si aucune erreur pour ce champ
        return [];
    }

    //retourne un booléen en fonction de si le formulaire est valide
    public function isValid()
    {
        $isValid = true;
        if (count($this->errors) > 0){
            $isValid = false;
        }

        return $isValid;
    }

    protected function addError($fieldName, $message)
    {
        //les erreurs sont classées par nom de champ dans le tableau
        $this->errors[$fieldName][] = $message;
    }
    
    //enlève les balises HTML et les espaces au début et à la fin
    public static function purifyString($string)
    {
        $purified = strip_tags(trim($string));
        return $purified;
    }
}