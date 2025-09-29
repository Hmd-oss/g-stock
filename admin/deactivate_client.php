<?php
include("../database/connexion.php");

if (isset($_GET["uuid"])) {
    $uuid = $_GET["uuid"];
    $query = "UPDATE tlbl_clients SET is_active = 0 WHERE uuid = :uuid";
    $execute_request = $connexion->prepare( $query);
    $execute_request->bindParam(":uuid",$uuid);
    $execute_request->execute();

    if ($execute_request->rowCount() > 0) {
        header("Location: client.php?message=client desactiver avec succes");
    }else{
    header("Location: client.php?message=une erreur est survenue");
    }

}else{
    header("Location: client.php?message=uuid du client introuvable");
    exit;
}

?>