<?php 

class FormValidator extends Validator
{
    //retourne un booléen en fonction de si un formulaire a été soumis
    public static function formIsSubmitted()
    {
        if (!empty($_POST)){
            return true;
        }

        return false;
    }

    //on passe aussi le name des champs en argument
    public function validateRequired($value, $fieldName)
    {
        if (empty($value)){
            $this->addError($fieldName, "Le champ $fieldName est requis !");
        }
    }

    //le maximum est optionnel
    public function validateStringLength($string, $fieldName, $min, $max = null)
    {
        if (strlen($string) < $min){
            $this->addError($fieldName, "La valeur pour $fieldName est trop courte !");
        }
        elseif ($max !== null && strlen($string) > $max){
            $this->addError($fieldName, "La valeur pour $fieldName est trop longue !");
        }
    }

    public function validateEmail($email, $fieldName)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->addError($fieldName, "La valeur pour $fieldName n'est pas un email valide !");
        }
    }

    public function validateBirthyear($year, $fieldName)
    {
        if (!is_numeric($year)){
            $this->addError($fieldName, "La valeur pour $fieldName n'est pas une année valide !");
        }
        elseif (strlen($year) < 4){
            $this->addError($fieldName, "La valeur pour $fieldName n'est pas une année valide !");
        }
        elseif($year < 1900){
            $this->addError($fieldName, "Vous êtes trop vieux !");
        }
    }

}