<?php include("../include/menu.php"); ?>
<?php
require_once('../fonctions/fonction.php');

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$pagination = get_all_products($connexion, $page);

$users = $pagination['data'];
$totalPages = $pagination['total_pages'];
$currentPage = $pagination['current_page'];
?>


<div class="container mt-5 py-5 pb-5">
  <div class="col-lg-12 col-sm-12">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold text-uppercase text-primary mb-0">Liste des produits</h4>
      <a href="add_product.php" class="btn btn-primary border-0 rounded-0">
        <i class="fa-solid fa-plus me-1"></i>
        Ajouter
      </a>
    </div>
  </div>



  <div class="col-lg-12 col-sm-12 mb-3">
     <?php if(!empty($_GET["message"])) : ?>
        <?php $message = $_GET["message"]; ?>
        <span class="text-info"><?php echo $message; ?> !</span>
      <?php endif; ?>
  </div>



  <div class="col-lg-12 col-sm-12 mb-3 mt-3">
    <div class="card shadow p-3 rounded-0 border-0"> 
      <div class="table-responsive">
        <table class="table table-striped table-bordered text-center table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Qte</th>
            <th scope="col">Pu A</th>
            <th scope="col">Pu V</th>
            <th scope="col">Fournisseur</th>
            <th scope="col">Categorie</th>
            <th scope="col">Actions</th>    
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
      </div>
    

    </div>
    </div>
    
</div>