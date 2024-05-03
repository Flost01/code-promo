<?php
 include 'bd.php';
 

 /*traitement d'infos colis*/
 if(isset($_POST['poster'])){
    $errors=[];
    extract($_POST);
    $date=date("y-m-d");
    
    if(!empty($dest) && !empty($agence) && !empty($nomDes) && !empty($emailDes) && !empty($phoneDes) && !empty($adresseDes)){
        
        /*appel de la table client*/
        if($_SESSION['validate']==true){
            $req3= client::connect()->prepare("SELECT * FROM client WHERE id_clent=?");
            $req3->execute(array($_SESSION['id_clent']));
            $info=$req3->fetch();
        }
        
        /*requete d'insertion des infos colis*/
        $cat= $_POST['cat'];
        $agence=$_POST['agence'];
        $req2= colis::connect()->prepare("INSERT INTO `colis`(`id_clent`, `id_cat`, `id_agence`, `Descrition`, `date_creation`, `delai_livraison`, `NomDes`, `EmailDes`, `PhoneDes`, `Destination`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $req2->execute(array($info['id_clent'], $cat, $agence, $dest, $date, $date, $nomDes, $emailDes, $phoneDes, $adresseDes));
        
        if($req2){
          $req2=$req2->fetch();
        

          $uni=colis::connect()->prepare("SELECT * FROM colis WHERE id_colis=?");
          echo '<script>
             alert(\'Insertion réussie!\');
             document.location.href=\'../../compteUser.php\'
             </script>';
        }else{
          echo '<script>
          alert(\'Insertion échoué!\');
          document.location.href=\'../../compteUser.php\'
          </script>';
        }
    }else{
      echo '<script>
      alert(\'Remplisser tous les champs!\');
      document.location.href=\'../../compteUser.php\'
      </script>';
     
    } 
 }
  

?>