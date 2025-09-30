<?php
include("../database/connexion.php");
function generate_uuid_v4() {
    // Générer un UUID v4
    $data = random_bytes(16);
    // Modifier certains bits selon la spécification UUID
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // version 4
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // variant DCE 1.1
    return vsprintf('%s-%s-%s-%s-%s', str_split(bin2hex($data), 4));
}


function getCurrentYear() {
    return date("Y"); // Renvoie l'année actuelle au format 4 chiffres (ex. 2024)
}

function getCurrentDateTime() {
    return date("d-m-Y H:i:s"); // Renvoie la date et l'heure actuelles au format "AAAA-MM-JJ HH:MM:SS"
}



function validateEmail($email) {
    // Utiliser filter_var avec FILTER_VALIDATE_EMAIL pour vérifier si l'email est valide
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function generateFourDigitCode() {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomCode = '';
    for ($i = 0; $i < 4; $i++) {
        $randomCode .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomCode;
}



function getCurrentPageName() {
    // Récupérer le nom du fichier PHP actuel sans extension
    $pageName = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
    
    // Remplacer les soulignements par des espaces
    $pageName = str_replace('_', ' ', $pageName);
    
    // Capitaliser chaque mot
    $pageName = ucwords($pageName);
    
    return $pageName;
}

function get_all_clients($connexion, int $page = 1, int $limit = 25): array {
    $offset = ($page - 1) * $limit;

    //  Récupérer le total des utilisateurs
    $count_users = $connexion->query("SELECT COUNT(*) FROM tlbl_clients WHERE is_deleted = 0");
    $total = (int) $count_users->fetchColumn();
    $total_pages = max(1, ceil($total / $limit)); // éviter division par zéro

    //  Préparer la requête paginée
    $all_users = $connexion->prepare("
        SELECT * 
        FROM tlbl_clients 
        WHERE is_deleted = 0 
        ORDER BY created_at DESC 
        LIMIT :limit OFFSET :offset
    ");
    $all_users->bindValue(':limit', $limit, PDO::PARAM_INT);
    $all_users->bindValue(':offset', $offset, PDO::PARAM_INT);
    $all_users->execute();
    $users = $all_users->fetchAll(PDO::FETCH_ASSOC);

    return [
        'data' => $users,
        'total_pages' => $total_pages,
        'current_page' =>$page
];
}


function get_all_fournisseurs($connexion, int $page = 1, int $limit = 25): array {
    $offset = ($page - 1) * $limit;

    //  Récupérer le total des utilisateurs
    $count_users = $connexion->query("SELECT COUNT(*) FROM tlbl_fournisseurs WHERE is_deleted = 0");
    $total = (int) $count_users->fetchColumn();
    $total_pages = max(1, ceil($total / $limit)); // éviter division par zéro

    //  Préparer la requête paginée
    $all_users = $connexion->prepare("
        SELECT * 
        FROM tlbl_fournisseurs 
        WHERE is_deleted = 0 
        ORDER BY created_at DESC 
        LIMIT :limit OFFSET :offset
    ");
    $all_users->bindValue(':limit', $limit, PDO::PARAM_INT);
    $all_users->bindValue(':offset', $offset, PDO::PARAM_INT);
    $all_users->execute();
    $users = $all_users->fetchAll(PDO::FETCH_ASSOC);

    return [
        'data' => $users,
        'total_pages' => $total_pages,
        'current_page' =>$page
];
}


function get_all_category_products($connexion, int $page = 1, int $limit = 25): array {
    $offset = ($page - 1) * $limit;

    //  Récupérer le total des utilisateurs
    $count_users = $connexion->query("SELECT COUNT(*) FROM tlbl_category_products WHERE is_deleted = 0");
    $total = (int) $count_users->fetchColumn();
    $total_pages = max(1, ceil($total / $limit)); // éviter division par zéro

    //  Préparer la requête paginée
    $all_users = $connexion->prepare("
        SELECT * 
        FROM tlbl_category_products 
        WHERE is_deleted = 0 
        ORDER BY created_at DESC 
        LIMIT :limit OFFSET :offset
    ");
    $all_users->bindValue(':limit', $limit, PDO::PARAM_INT);
    $all_users->bindValue(':offset', $offset, PDO::PARAM_INT);
    $all_users->execute();
    $users = $all_users->fetchAll(PDO::FETCH_ASSOC);

    return [
        'data' => $users,
        'total_pages' => $total_pages,
        'current_page' =>$page
];
}


function get_active_fournisseurs($connexion){
    $fournisseur = $connexion->prepare('SELECT * FROM tlbl_fournisseurs WHERE is_active = 1 AND is_deleted = 0 ORDER BY created_at DESC');
    $fournisseur->execute();
    return $fournisseur->fetchAll(PDO::FETCH_ASSOC);
}


function get_active_category_products($connexion){
    $category_product = $connexion->prepare('SELECT * FROM tlbl_category_products WHERE is_active = 1 AND is_deleted = 0 ORDER BY created_at DESC');
    $category_product->execute();
    return $category_product->fetchAll(PDO::FETCH_ASSOC);

}


function get_active_products($connexion){
    $products = $connexion->prepare('SELECT * FROM tlbl_products WHERE is_active = 1 AND is_deleted = 0 ORDER BY created_at DESC');
    $products->execute();
    return $products->fetchAll(PDO::FETCH_ASSOC);

}


function get_all_products($connexion, int $page = 1, int $limit = 25): array {
    $offset = ($page - 1) * $limit;

    //  Récupérer le total des utilisateurs
    $count_users = $connexion->query("SELECT COUNT(*) FROM tlbl_products WHERE is_deleted = 0");
    $total = (int) $count_users->fetchColumn();
    $total_pages = max(1, ceil($total / $limit)); // éviter division par zéro

    //  Préparer la requête paginée
    $all_users = $connexion->prepare("
        SELECT * 
        FROM tlbl_products 
        WHERE is_deleted = 0 
        ORDER BY created_at DESC 
        LIMIT :limit OFFSET :offset
    ");
    $all_users->bindValue(':limit', $limit, PDO::PARAM_INT);
    $all_users->bindValue(':offset', $offset, PDO::PARAM_INT);
    $all_users->execute();
    $users = $all_users->fetchAll(PDO::FETCH_ASSOC);

    return [
        'data' => $users,
        'total_pages' => $total_pages,
        'current_page' =>$page
];
}



?>