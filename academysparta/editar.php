<?php
require 'config.php'; // comunicacacao com banco de dado
$info = [];
$id = filter_input(INPUT_GET , 'id');
if($id){

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){

    $info= $sql->fetch(PDO :: FETCH_ASSOC);

  
} else {

    header("Location: ListaDados.php");
    exit;
}
}else{
    header("Location:ListaDados.php");
    exit;
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EstiloCadastroAlunos.css">
    <link rel="shortcut icon" href="" type="image/x-icon"/>
    <title>Cadastro de Alunos</title>
</head>

<body>

    <header>ACADEMIA SPARTA</header>
   

    <nav id="fachada">
        <a  href="FichadoAluno.html">FICHA DO ALUNO</a>
        <a href="index.html">TELA INICIAL</a>
        <a href="ListaDados.php">ALUNOS CADASTRADOS</a>
    </nav>
   
<div id="cadastro">Cadastro dos Alunos</div>

  <nav>
    
</nav>


<form method="POST" action="editar_action.php">
    <input type="hidden"name = "id" value ="<?=$info['id'];?>"/> 
    

        <fieldset>

            <legend><p>Cadastro dos Alunos</p></legend>
            <label>
              NOME: <br/>
              <input type="text" id="nomeid" name="name"value ="<?=$info['nome'];?>"/> 
            </label><br/>

            <label>
              DATA NASCIMENTO: <br/>
              <input type="date" name="data_nascimento"value="<?=$info['data_nascimento'];?>"/>
            </label><br/>

            <label>
              DATA CADASTRO: <br/>
              <input type="date" name="data_cadastramento"value="<?=$info['data_cadastramento'];?>"/>
            </label><br/>

            <label>
              CPF: <br/>
              <input type="text" name="cpf"value ="<?=$info['cpf'];?>"/>
            </label><br/>

            <label>
              E-MAIL: <br/>
              <input type="email" name="email" value="<?=$info['email'];?>"/>
            </label><br/>

            <label>
              ENDEREÇO: <br/>
              <input type="text" name="endereco" value ="<?=$info['endereco'];?>"/>
            </label><br/>

            <label>
              TELEFONE: <br/>
              <input type="text" name="telefone" value="<?=$info['telefone'];?>"/>
            </label><br/>
            <label>
              MODALIDADE: <br/>
              <input type="text" name="modalidade" value="<?=$info['modalidade'];?>"/>
            </label><br/>
      
          <legend><p>Observações</p></legend>
          <input type="text"name="descricao"size="260" maxlength="5000"  value="<?=$info['descricao'];?>"/>
          
          </label><br/>

        </fieldset>
   
    <fieldset>
    <button type="submit" onclick ="alteracao()" >Salvar Alteração </button>
    
  </fieldset>

</form> 
</body>
<script>
    function alteracao() {

var nome = document.getElementById("nomeid");

if (nome.value != "") {
    alert('Edição Realizado com Sucesso!');
}

}
</script>
<footer>
    EQUIPE DE DESENVOLVIMENTO WEB:
    JACKSON ANDRADE / ANTHONY PETERSON
    <br>   
</footer>