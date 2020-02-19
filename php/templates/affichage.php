<?php

//On crée une variable capable d'aider à répartir les messages à gauche et à droite
//On retrouve une idée d'ID mais propre à notre page.

$j = 0;

//La boucle va permettre de savoir quel élement va être ouvrant pour une ligne (gauche)
// ou fermant la ligne (droite)
foreach($messages as $message){

  if($j % 2 == 0){

  echo '<div class="row">';
  echo '<div class="col-sm-6">
    <div class="card">
      <div class="card-body overflow-auto">
        <h4 class="card-title">'. $message['author'].'</h4>
        <h6 class="card-text">'. $message['created_date'] .'</h6>
        <article class="message"><p>'. $message['message'] .'</p></article>
        </div>
    </div>
  </div>';}
  else{
  echo  '<div class="col-sm-6">
    <div class="card">
      <div class="card-body overflow-auto">
        <h4 class="card-title">'. $message['author'].'</h4>
        <h6 class="card-text">'. $message['created_date'] .'</h6>
        <article class="message"><p>'. $message['message'] .'</p></article>
        </div>
    </div>
  </div>';
echo '</div>';}
    $j ++;
}
?>