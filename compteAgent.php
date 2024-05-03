<?php
    include 'forms/bd.php';

        $req3=livreur::connect()->prepare("SELECT * FROM livreur WHERE id_livreur=?");
        $req3->execute(array($_SESSION['id_livreur']));
        $infoL=$req3->fetch();
      
     
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'head.php' ?>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

    <div class="logo me-auto">
        <h1><a href="index.php">Flocolis</a></h1>
    </div>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <button class="btn btn-outline-warning" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Se déconnecter</button>
      </nav><!-- .navbar 
    
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="#about">About Us</a></li>
              <li><a class="nav-link scrollto" href="#team">Team</a></li>
              <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto active" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav> .navbar

      <div class="header-social-links d-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div> -->

    </div>
  </header><!-- End Header -->
 
 
   
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h4><b><?php echo $infoL['NomL'] ?></b> vivez une expérience unique sur Flocolis</h4>
          <ol>
            <li><a href="index.php">Accueil</a></li>
            <li>Compte Agent</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-4">
             <div class="portfolio-info" style="color: #000;">
                <?php echo'<h3>'.$infoL['NomL'].' '.$infoL['PrenomL'].'</h3>' ?>
                <ul>
                  <li><strong>Email</strong>:  <?php echo $infoL['EmailL'] ?></li>
                  <li><strong>Phone</strong>: <?php echo $infoL['PhoneL'] ?></li>
                  <li><strong>Nombre de colis pris en charge</strong>: <?php  ?></li>
                </ul>
             </div>
              <div class="portfolio-description">
                  <h2>Bon à savoir</h2>
                    <p>
                        Modifiez le statut d'un colis après payement des frais de livraison par le client
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
                    
                   $stat='save';
                   $req = colis::connect()->prepare("SELECT `id_colis`, `Descrition`, `NomDes`, `Destination`, `status_colis`  FROM `colis` c WHERE `status_colis`=? ");
                   $req->execute(array($stat));
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
                          <a href="detail.php?id_colis=<?php echo $colis[$i]['id_colis'] ?>"><i class="bi bi-clipboard-plus-fill"></i></a>
                      </td>
                      
                
                <?php  echo '</tr>';} }    ?>
                   
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
  

  </main><!-- End #main -->

 
  <?php include 'foot.php' ?>
</body>

</html>