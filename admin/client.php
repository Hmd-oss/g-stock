<?php include("../include/menu.php"); ?>
<?php
require_once('../fonctions/fonction.php');

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$pagination = get_all_clients($connexion, $page);

$users = $pagination['data'];
$totalPages = $pagination['total_pages'];
$currentPage = $pagination['current_page'];
?>

<div class="container mt-5 py-5 pb-5">
  <div class="col-lg-12 col-sm-12">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold text-uppercase text-primary mb-0">Liste des clients</h4>
      <a href="add_client.php" class="btn btn-primary border-0 rounded-0">
        <i class="fa-solid fa-plus me-1"></i>
        Ajouter
      </a>
    </div>
  </div>

  <div class="col-lg-12 col-sm-12 mb-3 mt-3">
    <div class="card shadow p-3 rounded-0 border-0">
      <table class="table table-striped table-bordered text-center table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom complet</th>
            <th scope="col">Email</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Adresse</th>
            <th scope="col">Créer le</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $index => $client): ?>
              <tr>
                <td><?= ($index + 1) + ($currentPage - 1) * 25 ?></td>
                <td><?= htmlspecialchars($client['first_name'] . ' ' . $client['last_name']) ?></td>
                <td><?= htmlspecialchars($client['email']) ?></td>
                <td><?= htmlspecialchars($client['phone_number']) ?></td>
                <td><?= htmlspecialchars($client['address']) ?></td>
                <td><?= htmlspecialchars($client['created_at']) ?></td>
                <td>
                    <?php if ($client['is_active']): ?>
                        <span class="badge bg-success border-0 rounded-0 text-white py-2 px-2">Actif</span>
                        <?php else: ?>
                    <span class="badge bg-danger border-0 rounded-0 text-white py-2 px-2">Inactif</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                       <?php if ($client['is_active']): ?>
                        <a href="deactivate_client.php?uuid=<?= htmlspecialchars($client['uuid']) ?>" class="badge bg-danger border-0 rounded-0 text-white text-decoration-none py-2 px-2 mx-2 ">Desactiver</a>
                        <?php else: ?>
                    <a href="activate_client.php?uuid=<?= htmlspecialchars($client['uuid']) ?>" class="badge bg-success border-0 rounded-0 text-white text-decoration-none py-2 px-2 mx-2">Activer</a>
                    <?php endif; ?> 
                    <a href="update_client.php?uuid=<?= htmlspecialchars($client['uuid']) ?>" class="badge bg-warning border-0 rounded-0 text-white text-decoration-none py-2 px-2 mx-2">Modifier</a>
                    <a href="delete_client.php?uuid=<?= htmlspecialchars($client['uuid']) ?>" class="badge bg-danger border-0 rounded-0 text-white text-decoration-none py-2 px-2 mx-2">Supprimer</a>
                    </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7">Aucun élément trouvé</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <div class="pagination">
    <ul class="pagination">
        <?php if ($currentPage > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $currentPage - 1 ?>">Précédent</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Suivant</a>
            </li>
        <?php endif; ?>
    </ul>
</div>

    </div>
    </div>
    
</div>