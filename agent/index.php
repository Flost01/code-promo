<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            background: #eee;
        }
        form{
            margin-top: 10rem;
            padding: 2rem;
            background: #fff;
            font-family: Arial, Helvetica, sans-serif;
            border-radius: 30px;
        }
        h1{
            text-align: center;
            margin-bottom: 40px;
            color: #009cea;
        }
        .int{
            margin-top: 15px;
        }
        input{
            width: 100%;
            margin-top: 10px;
            outline: none;
            height: 35px;
            border: none;
            box-shadow: 0 0 6px 5px #eee;
            border-radius: 15px;
            text-align: center;
        }
        input[type="submit"]{
           background: #009cea;
           width: 80%;
           color: #fff;
           font-size: 18px;
           letter-spacing: 3px;
           transition: 0.6s all;
        }
        input[type="submit"]:hover{
            background: #988eee;
            color: #333;
        }
        .sut{
            text-align: center;
            margin-top: 10px;
        }

    </style>

<?php 
 include '../forms/bd.php';
 if(isset($_POST['so'])){
    extract($_POST);

    $req3= livreur::connect()->prepare("SELECT * FROM livreur WHERE NomL=? AND PasswordL=?");
    $req3->execute(array($nom, $pwd));
    $infos=$req3->rowCount();


    if($infos > 0){
        foreach($req3 as $re){
        echo '<script>
                alert("Connection réussie!");
                document.location.href=\'compteLivreur.php?id_livreur=<?php $re[\'id_livreur\'] ?>\'
                </script>';}
    }else{
        echo '<script>
                alert("Connection echoué!");
                </script>';
    }
 }

?>
</head>
<body>
    <div class="cont">
        <form action="index.php" method="post">
            <h1>Flocolis agence page</h1>
            <div class="int">
                <label for="user">Nom agent:</label>
                <input type="text" name="nom" id="user" required>
            </div>
            <div class="int">
                <label for="pwd">Mot de passe agent :</label>
                <input type="password" name="pwd" id="pwd" required>
            </div>
            <div class="sut">
                <input class="sut" name="so" type="submit" value="soumettre">
            </div>
            
        </form>
    </div>
</body>
</html>