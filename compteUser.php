<?php
    include 'forms/bd.php';
    
    if($_SESSION['validate']==true){
      $req3= client::connect()->prepare("SELECT * FROM client WHERE id_clent=?");
      $req3->execute(array($_SESSION['id_clent']));
      $info=$req3->fetch();
    }
 
    $req3 = categories::connect()->query("SELECT * FROM `categories`");
    $cats = $req3->fetchAll();

    $reqa = agence::connect()->query("SELECT * FROM `agence`");
    $ags = $reqa->fetchAll();

    $req = colis::connect()->prepare("SELECT * FROM `colis` WHERE `id_clent`=?");
    $req->execute(array($_SESSION['id_clent']));
    $colis = $req->fetchAll();
    $nbre = $req->rowCount();
     
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
        <button class="btn btn-outline-warning" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Enregistrer un colis</button>
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
 
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Infos colis</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/forms/formColis.php" method="post" >
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Entez une description de votre colis:</label>
                <textarea class="form-control" name="dest" id="message-text" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;"></textarea>
              </div>
             
              <select class="form-select mb-3" name="cat" aria-label="Default select example" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <option selected>Categories colis</option><!-- ne pas oublier de faire une vérification sur le type de la sélection --> 
                <?php   foreach($cats as $cat){    ?>  
                  <option value="<?php  echo $cat['id_cat']    ?>"><?php  echo $cat['Nom_cat']    ?></option>
                <?php }     ?>
              </select>
              <select class="form-select mb-3" name="agence" aria-label="Default select example" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                <option selected>Choisir une agence</option><!-- ne pas oublier de faire une vérification sur le type de la sélection --> 
                <?php   foreach($ags as $ag){    ?>  
                  <option value="<?php  echo $ag['id_agence']    ?>"><?php  echo $ag['NomAg']    ?></option>
                <?php }     ?>
              </select>
             <div class="deux" style="display: flex;">
              <div class="form-floating mb-3 mx-3">
                  <input type="text" class="form-control" name="nomDes" id="floatingInput" placeholder="nomDes" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                  <label for="floatingInput">Noms destinataire :</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="emailDes" id="floatingInput" placeholder="name@example.com" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                  <label for="floatingInput">Email destinataire :</label>
                </div>
               </div>
               <div class="deux" style="display: flex;">
                <div class="form-floating mb-3 mx-3">
                  <input type="number" class="form-control" name="phoneDes" id="floatingInput" placeholder="phoneDes" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                  <label for="floatingInput">phone destinataire:</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="adresseDes" id="floatingInput" placeholder="adresseDes" style="background: rgba(42, 44, 57, 0.9); color:aliceblue;">
                  <label for="floatingInput">Destination colis :</label>
                </div>
               </div>
              <button type="submit" name="poster" class="btn btn-outline-warning">Enregistrer</button>
          </form>
          </div>
         
        </div>
      </div>
    </div>
   
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h4><b><?php echo  $info['Prenom']?></b> vivez une expérience unique sur Flocolis</h4>
          <ol>
            <li><a href="index.php">Accueil</a></li>
            <li>Compte client</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-4">
             <div class="portfolio-info">
                <?php echo  '<h3>'.$info['Nom'].' '. $info['Prenom'].'</h3>'?>
                <ul>
                  <li><strong>Email</strong>:  <?php echo  $info['Email']?></li>
                  <li><strong>Phone</strong>: <?php echo  $info['Phone']?></li>
                  <li><strong>Nombre de colis postés</strong>: <?php echo  $nbre ?></li>
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
    </section><!-- End Portfolio Details Section -->
  

  </main><!-- End #main -->

 
  <?php include 'foot.php' ?>
</body>

</html>