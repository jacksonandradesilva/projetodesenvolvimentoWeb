<?php
require 'config.php'; // comunicacao com banco de dados

$id = filter_input(INPUT_GET , 'id');
if($id){

    $sql=$pdo->prepare("DELETE FROM usuarios WHERE id = :id"); // deletar no bando de daos
    $sql->bindValue(':id' , $id); // deleta de acordo com id selcionado
    $sql->execute(); // executa 
  
}
    header("Location:ListaDados.php");
    exit;


?>