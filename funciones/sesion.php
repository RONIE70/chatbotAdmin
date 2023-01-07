<?php

  function inicializarIDsuperior(){
    if(!isset($_SESSION['superior'])){
      $_SESSION['superior']='is null';
    }else{
        if ("0" == $_POST['texto']) {
            $_SESSION['superior']='is null';
        }
    }
  }

  function actualizarIDsuperior($idSuperior){
    if(isset($_POST['texto'])){
      if ("0" == $_POST['texto']) {
        $_SESSION['superior']='is null';
      }
      else{
          $_SESSION['superior']='='.$idSuperior;
      }
    }
  }
  
?>
