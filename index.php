<?php

// Création de la fonction translate recevant le mot et le sens de traduction
function translate($mot,$monselect) {
    //Déclaration du dictionnaire 
    $dictionary =
    [
        'cat'    => 'chat',
        'dog'    => 'chien',
        'monkey' => 'singe',
        'horse'  => 'cheval',
        'sun'    => 'soleil'
    ];

    // Traduction du mot anglais en français ou français en anglais
    switch($monselect) {
        case 'engtofr':
        if(array_key_exists ($mot, $dictionary))
        {
            // Oui, récupération de la valeur, de la traduction en français.
            $translatedWord = $dictionary[$mot];
    
            $message = "Le mot '$mot' se traduit par '$translatedWord'.";
        }
        else
        {
            // Non, cet indice n'existe pas.
            $message = "Je ne connais pas le mot '$mot'.";
        }
        break;

        case 'frtoeng':
            if(in_array($mot, $dictionary) == true)
            {
                // Oui, récupération de l'indice, de la traduction en anglais.
                $translatedWord = array_search($mot, $dictionary);
    
                $message = "Le mot '$mot' se traduit par '$translatedWord'.";
            }
            else
            {
                // Non, cette valeur n'existe pas.
                $message = "Je ne connais pas le mot '$mot'.";
            }
            break;

            default:
            $message = "Je ne sais traduire qu'en français et en anglais !";
    }

    return $message;
        
} 


$result = '';
$direction='frtoeng';
// Come console.log
//var_dump($_POST);

if(array_key_exists('monselect', $_POST) == true)
{
    $direction = $_POST['monselect'];
}

if(array_key_exists('mot', $_POST) == true)
{
    $word = strtolower($_POST['mot']);
    $result = translate($word, $direction);
}

    
include 'index.phtml';





