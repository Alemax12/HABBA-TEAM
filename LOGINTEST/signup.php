<?php

  require 'database.php';
  $message = '';
echo $_POST['email'];
echo $_POST['firstname'];
echo $_POST['dob'];

//cambia el formato de mes/dia/ano a ano/mes/dia como lo solicita mysql
//$date = DateTime::createFromformat('m/d/Y',$form);
//$form_date=$date->format("Y-m-d");
//echo $form_date;
//------------------------------------------------------------------------
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO cliente (nom_cliente, fecha_nac, celular, peso, estatura, direccion, email, contraseña,id_rol) VALUES (:firstname,:dob,:phone,:weight,:stature, :address, :email, :password,1)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstname', $_POST['firstname']);
    $stmt->bindParam(':dob',$_POST['dob'] );
    $stmt->bindParam(':phone',$_POST['phone'] );
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':weight',$_POST['weight'] );
    $stmt->bindParam(':stature',$_POST['stature'] );
    $stmt->bindParam(':address',$_POST['address'] );
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $_POST['password']);
    

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
      header("Location: ../");
    } else {
      $message = 'Sorry there must have been an issue creating your account';
      header("Location: ../");
    }
  }
  ?> 