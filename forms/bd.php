<?php
  session_start();
  class client{
    public static function connect(){
        try{
            $bdd= new PDO('mysql:host=localhost;dbname=flocolis','root','');
            return $bdd;
        }catch(PDOException $e){
            echo 'Erreur : '.$e->getMessage();
        }
    }
  }
 
  class colis{
    public static function connect(){
        try{
            $bdd= new PDO('mysql:host=localhost;dbname=flocolis','root','');
            return $bdd;
        }catch(PDOException $e){
            echo 'Erreur : '.$e->getMessage();
        }
    }
  }
  class livreur{
    public static function connect(){
        try{
            $bdd= new PDO('mysql:host=localhost;dbname=flocolis','root','');
            return $bdd;
        }catch(PDOException $e){
            echo 'Erreur : '.$e->getMessage();
        }
    }
  }
  class admin{
    public static function connect(){
        try{
            $bdd= new PDO('mysql:host=localhost;dbname=flocolis','root','');
            return $bdd;
        }catch(PDOException $e){
            echo 'Erreur : '.$e->getMessage();
        }
    }
  }
  class agence{
    public static function connect(){
        try{
            $bdd= new PDO('mysql:host=localhost;dbname=flocolis','root','');
            return $bdd;
        }catch(PDOException $e){
            echo 'Erreur : '.$e->getMessage();
        }
    }
  }
  class categories{
    public static function connect(){
        try{
            $bdd= new PDO('mysql:host=localhost;dbname=flocolis','root','');
            return $bdd;
        }catch(PDOException $e){
            echo 'Erreur : '.$e->getMessage();
        }
    }
  }
    
?>