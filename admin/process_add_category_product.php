<?php
include("../database/connexion.php");
include("../fonctions/fonction.php");

$error = "";
$success = "";

if (isset($_POST["save_category_product"])){
    $uuid = generate_uuid_v4();
    $name = $_POST["name"] ?? null;
    $description = $_POST["description"] ?? null;

    // verification de l'unicite des donnees

    $exist_info = $connexion->prepare("SELECT COUNT(*) FROM tlbl_category_products WHERE is_deleted = 1 AND( name = :name)");
    $exist_info->execute([
        ":name" => $name,
    ]);
    if($exist_info->fetchColumn() > 0){
        $error = "cette categorie produit existe deja";
    }else {
        $insert_info = $connexion->prepare(
            "INSERT INTO tlbl_category_products(uuid,name,description)
            VALUES (:uuid,:name,:description)
            ");


        $insert_info->execute([
            ":uuid" => $uuid,
            ":name" => $name,
            "description" => $description,
        ]);

        if($insert_info){
            $success = "category_product save successfully";
            echo "<script>setTimeout(function {window.location.href='category_product.php'; } , 3000)</script>";
        }else{
            $error = "error saving";
        }
    }
}

?>