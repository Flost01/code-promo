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

    $ida=$_SESSION['id_agence'];
    $liv= livreur::connect()->prepare('SELECT * FROM livreur WHERE id_agence=?');
    $liv->execute(array($ida));
    

    $ags= agence::connect()->query('SELECT * FROM agence');
    

     
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agence Flocolis</title>
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
        <h1><a href="index.php"><?php echo $_SESSION['NomAg'] ?></a></h1>
        
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#agence">Agents</a></li>
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
        <h3>Liste des agents</h3>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="bi bi-person-plus-fill"></i>
        Ajouter
        </button>
        
        <table class="table dataTable" style="text-align: center;">
          <thead>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Ville</th>
            <th scope="col">Phone</th>
          </thead>
          <tbody>
          <?php 
           foreach($liv as $li){
            echo '<tr>';
            ?>
            <td>
              <?php echo $li['NomL'] ?>
            </td>
            <td>
              <?php echo $li['PrenomL'] ?>
            </td>
            <td>
              <?php echo $li['ville'] ?>
            </td>
            <td>
              <?php echo $li['PhoneL'] ?>
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
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter un agent</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id='register' class='input-group-register' method="post" action="../forms/inscription.php">
              <div class="deux" style="display: flex;">
              <div class="form-floating mx-3">
                <input type="text" class="form-control" name="noml" id="floatingInput" placeholder="nom" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Nom agent:</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="prenoml" id="floatingInput" placeholder="prenom" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Prenom agent :</label>
              </div>
              </div>
              <div class="deux" style="display: flex;">
              <div class="form-floating mx-3">
                <input type="email" class="form-control" name="emaill" id="floatingInput" placeholder="name@example.com" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Email agent :</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="mdpl" placeholder="Password" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingPassword">Code agent:</label>
              </div>
              </div>
              <div class="deux" style="display: flex;">
              <div class="form-floating mx-3">
                <input type="number" class="form-control" name="phonel" id="floatingInput" placeholder="phone" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Phone agent:</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="adresse" id="floatingInput" placeholder="adresse" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <label for="floatingInput">Ville : </label>
              </div>
              </div>
  
                <button class="btn btn-outline-warning" type="submit" name="envois">S'inscrire</button>
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