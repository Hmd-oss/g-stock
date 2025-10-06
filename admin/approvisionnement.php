<?php include("../include/menu.php"); ?>
<?php
require_once('../fonctions/fonction.php');

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$pagination = get_all_approvisionnements($connexion, $page);

$approvisionnements = $pagination['data'];
$totalPages = $pagination['total_pages'];
$currentPage = $pagination['current_page'];
?>


<div class="container mt-5 py-5 pb-5">
  <div class="col-lg-12 col-sm-12">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold text-uppercase text-primary mb-0">Liste de l'approvisionnement des produits</h4>
      <a href="add_approvisionnement.php" class="btn btn-primary border-0 rounded-0">
        <i class="fa-solid fa-plus me-1"></i>
        Ajouter
      </a>
    </div>
  </div>


  <div class="col-lg-12 col-sm-12 mb-3 mt-3">
     <?php if(!empty($_GET["message"])) : ?>
        <?php $message = $_GET["message"]; ?>
        <div class="alert alert-info text-center rounded-0 "><?php echo $message; ?> !</div>
      <?php endif; ?>
  </div>


  <!-- <?php var_dump($approvisionnements) ?> -->



  <div class="col-lg-12 col-sm-12 mb-3 mt-3">
    <div class="card shadow p-3 rounded-0 border-0"> 
      <div class="table-responsive">
        
    <table class="table table-striped table-bordered text-center table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Fournisseur</th>
        <th scope="col">Produits</th>
        <th scope="col">Nouvelle quantité</th>
        <th scope="col">Date d'approvisionnement</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
       
    </tbody>
    <?php if (!empty($approvisionnements)): ?>
        <?php foreach ($approvisionnements as $index => $approvisionnement): ?>
            <tr>
            <td><?= ($index + 1) + ($currentPage - 1) * 25 ?></td>
                <td><?= htmlspecialchars($approvisionnement['first_name'] . ' ' . $approvisionnement['last_name']) ?></td>
                <td><?= htmlspecialchars(string: $approvisionnement['name']) ?></td>
                <td><?= htmlspecialchars($approvisionnement['new_qte']) ?></td>
                <td><?= htmlspecialchars($approvisionnement['created_at']) ?></td>
                <td>
                <a href="delete_approvisionnement.php?uuid=<?= htmlspecialchars($approvisionnement['uuid']) ?>" class="badge bg-danger border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Supprimer</a>
              </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
              <td colspan="10">Aucun élément trouvé</td>
            </tr>
          <?php endif; ?>
    </table>
    
    </div>

    </div>
    </div>
    
</div>
<!-- <script>
  
  $(document).ready(function() {
      setTimeout(function() {
        $(".alert").alert('close');
      }, 2000);
    });

</script> -->