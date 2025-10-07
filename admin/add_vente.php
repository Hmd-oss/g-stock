<?php include("../include/menu.php"); ?>
<?php 
include("../fonctions/fonction.php");
$products = get_active_products($connexion);
$clients = get_active_clients($connexion);    


?>

<div class="container mt-5 py-5 pb-5">
<div class="col-lg-12 col-sm-12">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-bold text-uppercase text-primary mb-0">Ajouter une vente</h4>
        <a href="vente.php" class="btn btn-secondary border-0 rounded-0">
           <i class="fa-solid fa-backward me-1"></i>
            Annuler

        </a>
    </div>


    <div class="col-md-12 col-sm-12 mb-3">
    <?php include("process_add_vente.php"); ?>
    <?php if ($error): ?>
    <div class="alert alert-danger text-center border-0 rounded-0"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success text-center border-0 rounded-0"><?= $success ?></div>
    <?php endif;?>
</div>

    <div class="col-lg-12 col-sm-12">
        <div class="card shadow mt-3 border-0 rounded-0 p-3">
        <form class="needs-validation" novalidate action="" method="post">
            <div class="row">
            
            <div class="col-lg-4 col-sm-12 mb-3">
            <label for="">Produits<span class="text-danger">*</span></label>
                <select class="form-select" name="product_uuid"  required>
                <option selected disabled value="">Choisir...</option>
                <?php foreach($products as $product): ?>
                    <option value="<?= $product["uuid"]  ?>">
                        <?= $product["name"]  ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <div  class="invalid-feedback">
                  Ce champ est requis
                </div>
        </div>
                
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="">Clients<span class="text-danger">*</span></label>
                <select class="form-select" name="client_uuid"  required>
                <option selected disabled value="">Choisir...</option>
                <?php foreach($clients as $client): ?>
                    <option value="<?= $client["uuid"]  ?>">
                        <?= $client["first_name"] . ' ' . $client["last_name"]  ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <div  class="invalid-feedback">
                  Ce champ est requis
                </div>
        </div>


        <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Quantité à vendre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="quantity" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
        </div>
             
            
        </div>
            
            <div class="d-flex justify-content-between">
                <button type="submit" name="save_vente" class="btn btn-primary border-0 rounded-0 mt-3">save</button>
                <button type="reset" class="btn btn-danger border-0 rounded-0">cancel</button>
            </div>
        </form>
        </div>
    </div>