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
            <li><a href="compteAgent.php">Compte Agent</a></li>
            <li>Détail</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
             <div class="portfolio-info" style="color: #000; display:flex; justify-content: space-between;">
              <?php
                 if(isset($_GET['id_colis'])){
                    $id=$_GET['id_colis'];
                    $req = colis::connect()->prepare("SELECT * FROM colis c,  client cl, categories ca WHERE c.id_clent=cl.id_clent AND ca.id_cat=c.id_cat AND id_colis=?");
                    $req->execute(array($id));
                    $colis = $req->fetchAll();
                }
              ?>
             
             <?php foreach($colis as $coli){ ?>
           <ul>
            <h4>Infos client</h4>
            <li>Nom client : <?php echo $coli['Nom'] ?></li>
            <li>email client : <?php echo $coli['Email'] ?></li>
            <li>Adresse client : <?php echo $coli['Adresse'] ?></li>
            <li>Phone client : <?php echo $coli['Phone'] ?></li>
           </ul>
           <ul>
            <h4>Infos colis</h4>
            <li>Description : <?php echo $coli['Descrition'] ?></li>
            <li>Catégorie : <?php echo $coli['Nom_cat'] ?></li>
            <li>Delai livraison : <?php echo $coli['delai_livraison'] ?></li>
            <li>Destination : <?php echo $coli['Destination'] ?></li>
           </ul>
           <ul>
            <h4>Infos destinataire</h4>
            <li>Nom Destinataire : <?php echo $coli['NomDes'] ?></li>
            <li>Email destinataire : <?php echo $coli['EmailDes'] ?></li>
            <li>Phone destinataire : <?php echo $coli['PhoneDes'] ?></li>
            
           </ul>
         <?php } ?>
      </div>
      </div>
    </section><!-- End Portfolio Details Section -->
  

  </main><!-- End #main -->

 
  <?php include 'foot.php' ?>
</body>

</html>