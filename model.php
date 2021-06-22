<?php 
 

class Model {

    protected $bd; //Attribut privé contenant l'objet PDO

    //Attribut qui contiendra l'unique instance du modèle
    private static $instance = null;


    private function __construct() {
        try {
             $this->bd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
             }
             catch (PDOException $e) {
             // On termine le script en affichant le code de l'erreur et le message
             die('<p> La connexion a échoué. Erreur['.$e->getCode().'] : '
             . $e->getMessage().'</p>');
             } 
    }


    /**
    * Méthode permettant de récupérer l'instance de la classe Model
    */
    public static function get_model()
    {
    
         //Si la classe n'a pas encore été instanciée
         if (is_null(self::$instance)) 
         self::$instance = new Model(); //On l'instancie
         return self::$instance; //On retourne l'instance
    
    }
 

}
?>

       
     

