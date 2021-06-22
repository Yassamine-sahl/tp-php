<?php 
 try {
    $bd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    }
    catch (PDOException $e) {
    // On termine le script en affichant le code de l'erreur et le message
    die('<p> La connexion a échoué. Erreur['.$e->getCode().'] : '
    . $e->getMessage().'</p>');
    } 

$json = file_get_contents('products.json'); 
$raw = json_decode($json); 
//echo var_dump($raw); 
foreach($raw as $product) {
    $ref = $product->sku; 
    $name = $product->name; 
    $type = $product->type; 
    $price = $product->price; 
    $shipping = $product->shipping; 
    $description = $product->description; 
    $manufacturer = $product->manufacturer; 
    $model = $product->model; 
    $url = $product->url; 
    $image = $product->image; 

    try {
        $req = $bd->prepare("INSERT INTO produits VALUES('$ref', '$name', '$type', '$price', '$shipping', '$description', '$manufacturer', '$model', '$url', '$image')"); 
        $req->execute(); 
        echo "success"; 
    } catch(PDOEXCEPTION $e) {
       echo "failed" . $e; 
    }

}

