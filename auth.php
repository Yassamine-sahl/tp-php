<?php 

class Auth 
{
   private $bd; 

   public function __construct() {
       try {
        $this->bd = new PDO('mysql:host=localhost;dbname=boutique', 'root', ''); 
       } catch (PDOException $e) {
            // On termine le script en affichant le code de l'erreur et le message
            die('<p> La connexion a échoué. Erreur['.$e->getCode().'] : '
            . $e->getMessage().'</p>');
            
       }
    }
    public function auth($email, $pswd) {
       try {
           
        $request1 = $this->bd->prepare("SELECT *  FROM users WHERE email='$email' AND password='$pswd'");
        $request1->execute();
       $result1 = $request1->fetch(); 
       if($request1->rowCount() > 0) {
         
          header('Location:index.php'); 
          $_SESSION['email'] = $result1['email']; 
          $_SESSION['nom'] = $result1['nom_complet']; 
        
        
       } else{
           header('Location:login&signup.php?message=wrong password'); 
       }
    }
    
       catch (PDOException $e) {
           die ("failed to login " . $e->getMessage()); 
       }

   }

   public function signup($name,$email, $pswd) {
    try {
        
     $request1 = $this->bd->prepare("INSERT INTO users (nom_complet, email, password) VALUES('$name','$email','$pswd')");
     $request1->execute();
    

      
       header('Location:index.php'); 
       $_SESSION['email'] = $email; 
       $_SESSION['nom'] = $name; 
     
     
  
 }
 
    catch (PDOException $e) {
        die ("failed to login " . $e->getMessage()); 
    }

}
}
