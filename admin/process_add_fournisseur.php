<?php
include("../database/connexion.php");
include("../fonctions/fonction.php");

$error = "";
$success = "";

if (isset($_POST["save_fournisseur"])){
    $uuid = generate_uuid_v4();
    $first_name = $_POST["first_name"] ?? null;
    $last_name = $_POST["last_name"] ?? null;
    $email = $_POST["email"] ?? null;
    $phone_number = $_POST["phone_number"] ?? null;
    $phone_number_2  = $_POST["phone_number_2"] ?? null;
    $address = $_POST["address"] ?? null;
    $cni_number = $_POST["cni_number"] ?? null;
    

    $exist_info = $connexion->prepare("SELECT COUNT(*) FROM tlbl_fournisseurs WHERE is_deleted = 1 AND( email = :email OR phone_number = :phone_number OR phone_number_2 = :phone_number_2 OR cni_number = :cni_number)");
    $exist_info->execute([
        ":email" => $email,
        ":phone_number" => $phone_number,
        ":phone_number_2" => $phone_number_2,
        ":cni_number" => $cni_number,
        
    ]);
    if($exist_info->fetchColumn() > 0){
        $error = "Ce fournisseur existe deja";
    }else {
        $insert_info = $connexion->prepare(
            "INSERT INTO tlbl_fournisseurs(uuid,first_name,last_name,email,phone_number,phone_number_2,address,cni_number)
            VALUES (:uuid,:first_name,:last_name,:email,:phone_number,:phone_number_2,:address,:cni_number)
            ");


        $insert_info->execute([
            ":uuid" => $uuid,
            ":first_name" => $first_name,
            ":last_name" => $last_name,
            ":email" => $email,
            ":phone_number" => $phone_number,
            ":phone_number_2" => $phone_number_2,
            ":address" => $address,
            ":cni_number" => $cni_number,
           
        ]);

        if($insert_info){
            $success = "Fournisseur save successfully";
        }else{
            $error = "error saving";
        }
    }
}

?>