<?php
function genycoupe($phrase,$nbre) {
 
//si $titre depasse la limite qu'on a impos�
if(strlen($phrase)>=$nbre)
{
//on "bride" notre titre a 30 caracteres par exemple
    $phrase=substr($phrase,0,$nbre);
 
//on recupere la derniere position de l'espace, ici $espace=28
    $espace=strrpos($phrase, ' ');
 
//puis nous rebridons notre titre a 28 caracteres (donc juste avant l'espace) et nous rajoutons nos trois petits points
    $phrase=substr($phrase,0,$espace)." ...";
 
}

return $phrase; 

}
?>