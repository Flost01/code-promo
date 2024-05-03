<?php

use livreur as GlobalLivreur;

    include '../forms/bd.php';
    
     
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

</head>


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

    <div class="logo me-auto">
        <h1><a href="index.php">Flocolis</a></h1>
        
    </div>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <button class="btn btn-outline-warning">Déconnexion</button>
      </nav><!-- .navbar -->
    
      

    </div>
  </header><!-- End Header -->
 
 
   
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h4><b></b> vivez une expérience unique sur Flocolis</h4>
          <ol>
            <li><a href="index.php">Accueil</a></li>
            <li>Compte Agent</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <div class="container">
      <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-4">
             <div class="portfolio-info">
                <?php ?>
                <ul>
                  <li><strong>Email</strong>:  <?php ?></li>
                  <li><strong>Phone</strong>: <?php ?></li>
                  <li><strong>Nombre de colis postés</strong>: <?php ?></li>
                </ul>
             </div>
              <div class="portfolio-description">
                  <h2>Bon à savoir</h2>
                    <p>
                        Entrez toutes les informations détaillées concernant vos différents colis pour obtenir un meilleur service.
                    </p>
              </div>
          </div>
          <div class="col-lg-8 ">
            <table id="table_id" class="table dataTable">
              <thead>
                <tr>
                  <th scope="col">Description</th>
                  <th scope="col">Nom destinataire</th>
                  <th scope="col">Destination colis</th>
                  <th scope="col">Status</th>
                  <th scope="col">Opérations</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                
                <?php 
                   if(isset($_GET['id_colis'])){
                    $d = colis::connect()->prepare("DELETE FROM `colis` WHERE `id_colis`=?");
                    $d->execute(array($_GET['id_colis']));
                   }

                   $req = colis::connect()->prepare("SELECT `id_colis`, `Descrition`, `NomDes`, `Destination`, `status_colis`  FROM `colis` WHERE `id_clent`=?");
                   $req->execute(array($_SESSION['id_clent']));
                   $colis = $req->fetchAll(PDO::FETCH_ASSOC);

                   if(count($colis)>0){
                    for($i=0; $i<count($colis);$i++ ){
                       echo '<tr>'; 
                      foreach($colis[$i] as $key => $coli){  
                        
                        if($key!='id_colis'){
                          echo '<td>'.$coli.'</td>';
                        } 
                      
                      }?>
                      <td style="display: flex;">
                          <a href="compteUser.php?id_colis=<?php echo $colis[$i]['id_colis'] ?>"><i class="bi bi-trash"></i></a>
                          <i class="bi bi-pencil-square"></i>
                      </td>
                      
                
                <?php  echo '</tr>';} }    ?>
                   
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </section>
          
           

   </div>
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