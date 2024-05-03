<?php
 include 'bd.php';
 if(isset($_POST['envoi'])){
    $errors=[];
    extract($_POST);
    $date=date("y-m-d");
  
    if(!empty($nom) && !empty($prenom) && !empty($email)&& !empty($mdp) && !empty($phone) && !empty($adresse)){
    
      if(strlen($mdp) < 6){
        echo '<script>
              alert(\'Mot de passe trop court minimum 6 caractères\');
              document.location.href=\'../../index.php\'
            </script>';
      }else{
      $req1= client::connect()->prepare("SELECT Email FROM client WHERE Email=?");
      $req1->execute(array($email));
      $req1->fetch(PDO::FETCH_ASSOC);

      if($req1->rowCount()>0){
        $errors['global']= "Cet email existe déjà!";
      }else{
        $status='inscrit';
        $req2= client::connect()->prepare("INSERT INTO `client`(`Nom`, `Prenom`, `Email`, `Password`, `Phone`,`Adresse`, `create_at`) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
        $req2->execute(array($nom, $prenom, $email, $mdp, $phone,$adresse, $date));
        $_SESSION['nom']=$nom;
        if($req2){
          echo '<script>
              alert(\'Inscription réussie! connectez vous pour accéder à votre compte\');
              document.location.href=\'../../index.php\'
            </script>';
        }else{
          echo '<script>
          alert("Inscription échoué!");
          document.location.href=\'../../index.php\'
          </script>';
        }
      }
      }
    }else{
      echo '<script>
      alert("Remplisser tous les champs!");
      </script>';
      header('location:../../index.php');
    }
}
 
if(isset($_POST['enregistre'])){

    extract($_POST);
    $date=date("y-m-d");

    if(!empty($nomA) && !empty($nomP) && !empty($DesA)&& !empty($mdpA) && !empty($siegeP) && !empty($site)){
      $mdpA=sha1($mdpA);

      $reqA= agence::connect()->prepare("INSERT INTO `agence`(`NomAg`, `NomPDG`, `Descrption`, `SiegeP`, `Passord`,`site`, `create_at`) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
      $reqA->execute(array($nomA, $nomP, $DesA,  $siegeP, $mdpA, $site,  $date));

      if($reqA){
        echo '<script>
            alert(\'Enregistrement réussie!\');
            document.location.href=\'../Admin/admin.php\'
          </script>';
      }else{
        echo '<script>
        alert("Enregistrement échoué!");
        document.location.href=\'../Admin/admin.php\'
        </script>';
      }
    }else{
      echo '<script>
      alert("Remplisser tous les champs!");
      </script>';
      header('location:../Admin/admin.php');
    }
}
 

if(isset($_POST['envois'])){
  $errors=[];
  extract($_POST);
  $date=date("y-m-d");
if(!empty($noml) && !empty($prenoml) && !empty($emaill)&& !empty($mdpl) && !empty($phonel) && !empty($adresse)){

  if(strlen($mdpl) < 6){
    echo '<script>
          alert(\'Mot de passe trop court (minimum 6 caractères)\');
          document.location.href=\'../Agence/agence.php\'
          </script>';
  }else{
      $re= livreur::connect()->prepare("SELECT EmailL FROM livreur WHERE EmailL=?");
      $re->execute(array($emaill));
      $re->fetch(PDO::FETCH_ASSOC);

      if($re->rowCount()>0){
       echo '<script>
          alert(\'Cet email existe déjà!\');
          document.location.href=\'../Agence/agence.php\'
          </script>';
      }else{
       $mdpl=sha1($mdpl);
       $ag=$_SESSION['id_agence'];
       
      $r= livreur::connect()->prepare("INSERT INTO `livreur`( `id_agence`, `NomL`, `PrenomL`, `EmailL`, `PhoneL`, `PasswordL`, `ville`, `create_at`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
      $r->execute(array( $ag, $noml, $prenoml, $emaill,  $phonel, $mdpl, $adresse, $date));
      
      if($r){
         
          echo '<script>
          alert(\'Enregistrement réussie!\');
          document.location.href=\'../Agence/agence.php\'
          </script>';
          
      }else{
          echo '<script>
          alert("Enregistrement échoué!");
          document.location.href=\'../Agence/agence.php\'
          </script>';
      }
      }
  }
}else{
  echo '<script>
  alert("Remplisser tous les champs!");
  document.location.href=\'../Agence/agence.php\'
  </script>';
}
}



?>