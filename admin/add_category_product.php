<?php include("../include/menu.php"); ?>

<div class="container mt-5 py-5 pb-5">
<div class="col-lg-12 col-sm-12">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-bold text-uppercase text-primary mb-0">Ajouter une categorie produit</h4>
        <a href="category_product.php" class="btn btn-secondary border-0 rounded-0">
           <i class="fa-solid fa-backward me-1"></i>
            Annuler

        </a>
    </div>


    <div class="col-md-12 col-sm-12 mb-3">
    <?php include("process_add_category_product.php"); ?>
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
                    <label for="">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>


                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Description <span class="text-danger">*</span></label>
                    <input type="text" name="description" class="form-control">
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>

            </div>
            
            <div class="d-flex justify-content-between">
                <button type="submit" name="save_category_product" class="btn btn-primary border-0 rounded-0 mt-3">save</button>
                <button type="reset" class="btn btn-danger border-0 rounded-0">cancel</button>
            </div>

        </form>
    </div>
</div>
</div>
</div>

<script src="../assets/js/main.js"></script>
