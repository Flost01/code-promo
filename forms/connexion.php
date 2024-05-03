<?php
    include 'bd.php';
    if(isset($_POST['connect'])){
        $errors=[];
        extract($_POST);
        $_SESSION['validate']=false;

        if(!empty($email) && !empty($mdp)){
            $req3= client::connect()->prepare("SELECT * FROM client WHERE Email=? AND Password=?");
            $req3->execute(array($email, $mdp));
            $info=$req3->rowCount();
           
            
            if($info>0){
                $info=$req3->fetch();
                $_SESSION['id_clent']=$info['id_clent'];
                $_SESSION['Email']=$info['Email'];
                $_SESSION['Password']=$info['Password'];
                $_SESSION['Nom']=$info['Nom'];
                $_SESSION['Phone']=$info['Phone'];
                $_SESSION['validate']=true;
                echo '<script>
                alert("Connection réussie!");
                </script>';
                header('location:../../compteUser.php');
            }else{
                echo '<script>
                alert("Ce compte n\'existe pas!");
                </script>';
            }
        }else{
            echo  '<script>
            alert("Veuillez remplir tous les champ!");
            </script>';
        }
    }

    if(isset($_POST['conex'])){
        $errors=[];
        extract($_POST);
        $_SESSION['valid']=false;

        if(!empty($emaill) && !empty($mdpl)){
            $mdpl=sha1($mdpl);

            $req3= livreur::connect()->prepare("SELECT * FROM livreur WHERE EmailL=? AND PasswordL=?");
            $req3->execute(array($emaill, $mdpl));
            $infos=$req3->rowCount();
           
            
            if($infos>0){
                $infos=$req3->fetch();
                $_SESSION['id_livreur']=$infos['id_livreur'];
                $_SESSION['EmailL']=$infos['EmailL'];
                $_SESSION['PasswordL']=$infos['PasswordL'];
                $_SESSION['NomL']=$infos['NomL'];
                $_SESSION['PhoneL']=$infos['PhoneL'];
                $_SESSION['valid']=true;
                echo '<script>
                alert("Connection réussie!");
                document.location.href=\'../../compteAgent.php\'
                </script>';
                
            }else{
                echo '<script>
                alert("Ce compte n\'existe pas!");
                document.location.href=\'../../index.php\'
                </script>';
            }
        }else{
            echo '<script>
            alert("Remplisser tous les champs!");
            document.location.href=\'../../index.php\'
            </script>';
        }
    }
?>
