<?php

require 'Config.php';// comunicação do bando de dado

$lista= [];// array vazia armazena quando solicita 
$sql =$pdo->query("SELECT * FROM usuarios"); // consulta dos dados cadastrados
if($sql->rowCount() > 0) { // se for maior que zero irar alimentar a variaval $lista
    $lista = $sql->fetchall(PDO::FETCH_ASSOC);//Busca as linhas remanescentes de um conjunto de resultados
}

?> 

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EstiloFichadoAlunos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ALUNOS CADASTRADOS</title>
    <body>
    <header>ACADEMIA SPARTA</header>
    
  
    <nav id="fachada">
    <button><a href="index.html">TELA INICIAL</a></button>
    <button><a  href="CadastrodeAlunos.html">CADASTRO DE ALUNOS</a></button>
        
    </nav>


<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>CPF</th>
        <th>EMAIL</th>
        <th>TELEFONE</th>
        <th>MODALIDADE</th>
        <th>ENDEREÇO</th>
        <th>AÇÕES</th>

    </tr>
    
<?php foreach($lista as $usuarios):?> //foreach fornece uma maneira facil de iterar sobre arrays nesse caso com variavel $ lista e $ususrios
    <tr>
        <td><?=$usuarios['id'];?></td> 
        <td><?=$usuarios['nome'];?></td>
        <td><?=$usuarios['cpf'];?></td>
        <td><?=$usuarios['email'];?></td>
        <td><?=$usuarios['telefone'];?></td>
        <td><?=$usuarios['modalidade'];?></td>
        <td><?=$usuarios['endereco'];?></td>
        <td>
            <a href="Editar.php?id=<?=$usuarios['id'];?>"onclick="return confirm ('Deseja Editar Cadastro?')">[Editar]</a>
            <a href="Excluir.php?id=<?=$usuarios['id'];?>"onclick="return confirm('Tem Certeza que deseja Excluir?')">[Excluir]</a>
         
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
