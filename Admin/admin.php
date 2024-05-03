<?php

use livreur as GlobalLivreur;

    include '../forms/bd.php';

    $st='take';
    $re= colis::connect()->prepare('SELECT * FROM colis WHERE status_colis=?');
    $re->execute(array($st));
    $nbre=$re->rowCount();

    $sta='Livré';
    $res= colis::connect()->prepare('SELECT * FROM colis WHERE status_colis=?');
    $res->execute(array($sta));
    $nbres=$res->rowCount();
   
    $res= colis::connect()->query('SELECT * FROM colis');
    $nbr=$res->rowCount();

    $u= client::connect()->query('SELECT * FROM client');
    $cnbr=$u->rowCount();

    $l= livreur::connect()->query('SELECT * FROM livreur');
    $lnbr=$l->rowCount();

    $ags= agence::connect()->query('SELECT * FROM agence');
    

     
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Flocolis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- DataTables CSS Files -->
  <link rel="stylesheet" href="../assets/js/style.css" />

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <style>
    .stat {
      margin-top: 5rem;
    }

    .nbre {
      width: 330px;
      height: 200px;
      padding: 35px;
      background: #adb5bd;
      border-radius: 20px;
      display: flex;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
    }

    .t {
      background: #009cea;
    }
    h3{
      text-align: center;
      margin-bottom: 2rem;
    }
    .agence button{
      text-align: right;
      margin-right: 1rem;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">AdminFlocolis</a></h1>
        
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#agence">Agences</a></li>
          <li><a class="nav-link scrollto" href="#colis">Colis</a></li>
          <li><a class="nav-link scrollto " href="#client">Client</a></li>
          
          <li><button class="btn btn-outline-warning">Se déconnecter</button></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section class="agence" id="agence" style="margin-top: 2rem;">
      <div class="container">
        <h3>Nos partenaires de transport</h3>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="bi bi-person-plus-fill"></i>
        Ajouter
        </button>
        
        <table class="table dataTable" style="text-align: center;">
          <thead>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Nom PDG</th>
            <th scope="col">Siège principale</th>
            <th scope="col">Site web</th>
          </thead>
          <tbody>
          <?php 
           foreach($ags as $ag){
            echo '<tr>';
            ?>
            <td>
              <?php echo $ag['NomAg'] ?>
            </td>
            <td>
              <?php echo $ag['Descrption'] ?>
            </td>
            <td>
              <?php echo $ag['NomPDG'] ?>
            </td>
            <td>
              <?php echo $ag['SiegeP'] ?>
            </td>
            <td>
              <?php echo $ag['site'] ?>
            </td>
            
            <?php echo '</tr>';} ?>
          </tbody>
        </table>  
      </div>
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter un partenaire</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id='login'  method="post" action="../forms/inscription.php">
             <div class="deux" style="display: flex;">
              <div class="form-floating mb-3" >
                <input type="text" class="form-control" name="nomA" id="floatingInput" placeholder="Nom agence" style=" background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Nom de l'agence:</label>
              </div>
              <div class="form-floating mx-3" >
                <input type="text" class="form-control" name="nomP" id="floatingInput" placeholder="Nom PDG" style=" background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Nom du PDG:</label>
              </div>
             </div>
              <div class="form-floating mb-3" >
                <input type="text" class="form-control" name="DesA" id="floatingInput" placeholder="Description agence" style=" background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Description l'agence :</label>
              </div>
              
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="mdpA" placeholder="Password" style=" background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingPassword">Entrez votre mot de passe:</label>
              </div>
              <div class="deux" style="display: flex;">
              <div class="form-floating mb-3" >
                <input type="text" class="form-control" name="siegeP" id="floatingInput" placeholder="Nom agence" style=" background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Siège principal:</label>
              </div>
              <div class="form-floating mx-3" >
                <input type="text" class="form-control" name="site" id="floatingInput" placeholder="Nom PDG" style=" background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Site web:</label>
              </div>
              </div>
                <button class="btn btn-outline-warning" type="submit" name="enregistre">Enregistrer</button>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </section>
   
    <section class="client" id="client">
      <div class="container">
        <h3>Liste des clients du système</h3>
        <table class="table dataTable" style="text-align: center;">
          <thead>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Email</th>
            <th scope="col">Addresse</th>
            <th scope="col">Phone</th>
            <th scope="col">Create_at</th>
            
          </thead>
          <tbody>
            <?php 

          foreach($u as $c){
            echo '<tr>';
            ?>
            <td>
              <?php echo $c['Nom'] ?>
            </td>
            <td>
              <?php echo $c['Prenom'] ?>
            </td>
            <td>
              <?php echo $c['Email'] ?>
            </td>
            <td>
              <?php echo $c['Adresse'] ?>
            </td>
            <td>
              <?php echo $c['Phone'] ?>
            </td>
            <td>
              <?php echo $c['create_at'] ?>
            </td>
           
            <?php echo '</tr>';} ?>
          </tbody>
          </table>
      </div>
    </section>

    <section class="colis" id="colis">
      <div class="container">
        <H3>Liste des colis du système</H3>
        <table class="table dataTable" style="text-align: center;">
          <thead>
            <th scope="col">Description</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Nom client</th>
            <th scope="col">Addresse client</th>
            <th scope="col">Nom destinataire</th>
            <th scope="col">Destination colis</th>
            <th scope="col">Statut</th>
            <th scope="col">Delai livraison</th>
          </thead>
          <tbody>
          <?php 
          $stat='save';
            $col=colis::connect()->query("SELECT * FROM client cl, colis co, categories ca WHERE cl.id_clent=co.id_clent AND co.id_cat=ca.id_cat ");
           foreach($col as $co){
            echo '<tr>';
            ?>
            <td>
              <?php echo $co['Descrition'] ?>
            </td>
            <td>
              <?php echo $co['Nom_cat'] ?>
            </td>
            <td>
              <?php echo $co['Nom'] ?>
            </td>
            <td>
              <?php echo $co['Adresse'] ?>
            </td>
            <td>
              <?php echo $co['NomDes'] ?>
            </td>
            <td>
              <?php echo $co['Destination'] ?>
            </td>
            <td>
              <?php echo $co['status_colis'] ?>
            </td>
            <td>
              <?php echo $co['delai_livraison'] ?>
            </td>
            <?php echo '</tr>';} ?>
          </tbody>
          </table>
      </div>
    </section>
  </main><!-- End #main -->
  <footer id="footer">
    <div class="container">
      <h3>Flocolis</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Flocolis</span></strong>. Tous droit reservés
      </div>
      <div class="credits">
        Designer par <a href="#">TIANI Florinda</a>
      </div>
    </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>


  

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>