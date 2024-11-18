<?php

require 'Config.php';

$lista= [];
$sql =$pdo->query("SELECT * FROM fichatreino"); // consulta dos dados cadastrados
if($sql->rowCount() > 0) {
    $lista = $sql->fetchall(PDO::FETCH_ASSOC);
}

?> 

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EstiloFichadoAlunos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ficha de Treino</title>
    <body>
    <header>ACADEMIA SPARTA</header>
    
    
  
    <nav id="fachada">
        <button><a href="index.html">TELA INICIAL</a></button>
        <button><a href="cadastrodeAlunos.html">CADASTRO DE ALUNOS</a></button>
        
     </nav>


<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>PROFESSOR</th>
        <th>DATA AVALIÇÃO</th>
        <th>DATA REAVALIACAO</th>
        <th>OBSERVAÇÕES</th>
        

    </tr>
<?php foreach($lista as $fichatreino):?>
    <tr>
        <td><?=$fichatreino['id'];?></td> 
        <td><?=$fichatreino['nome'];?></td>
        <td><?=$fichatreino['professor'];?></td>
        <td><?=$fichatreino['data_avaliacao'];?></td>
        <td><?=$fichatreino['data_reavaliacao'];?></td>
        <td><?=$fichatreino['observacao'];?></td>
        <td><?=$fichatreino['email'];?></td>
        <td>
            <a href="EditarFicha.php?id=<?=$fichatreino['id'];?>"onclick="return confirm ('Deseja Editar Cadastro?')">[Editar]</a>
            <a href="ExcluirFicha.php?id=<?=$fichatreino['id'];?>"onclick="return confirm('Tem Certeza que deseja Excluir?')">[Excluir]</a>
         
        </td>
    </tr>


<?php endforeach;?>

</table>
</body>
<footer>
    Criado por:
    EQUIPE DE DESENVOLVIMENTO WEB
    JACKSON ANDRADE / ANTHONY PETERSON
</footer>

</html>
