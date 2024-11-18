<?php
require 'config.php'; // comunicacacao com banco de dado
$info = [];
$id = filter_input(INPUT_GET , 'id');
if($id){

    $sql = $pdo->prepare("SELECT * FROM fichatreino WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){

    $info= $sql->fetch(PDO :: FETCH_ASSOC);

  
} else {

    header("Location: ListaDadosFicha.php");
    exit;
}

}else{

    header("Location:ListaDadosFicha.php");
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
        <button><a href="index.html">TELA INICIAL</a></button>
        <button> <a href="ListaDados.php">ALUNOS CADASTRADOS</a></button>
       
    </nav>
   
<div id="cadastro">Dados do Aluno</div>

 
<form method="POST" action="EditarFicha_action.php">

    <input type="hidden"name = "id" value ="<?=$info['id'];?>"/> 

    <fieldset>
            <legend><p>Aluno</p></legend>
            <label>
              Nome: <br/>
              <input type="text"id="nome" name="name"value="<?=$info['nome'];?>"/>
            </label><br/>
            <label>
              Professor(a): <br/>
              <input type="text" name="professor"value="<?=$info['professor'];?>"/>
            </label><br/>
            <label>
              Data Avaliação: <br/>
              <input type="date" name="data_avaliacao"value="<?=$info['data_avaliacao'];?>"/>
            </label><br/>
            <label>
              Data Reavaliação: <br/>
              <input type="date" name="data_reavaliacao"value ="<?=$info['data_reavaliacao'];?>"/>
            </label><br/>
            <label>
              E-mail: <br/>
              <input type="email" name="email"value ="<?=$info['email'];?>"/>
            </label>
            

            <legend><p>Ficha de Treino</p></legend>
         <ul for="Treino A">Treino A:</ul>
         <input  type="text"name="treino_a"size="260" maxlength="500"  value="<?=$info['treino_a'];?>"/>
         <ul for="Treino B">Treino B:</ul>
         <input type="text"name="treino_b"size="260" maxlength="500"  value="<?=$info['treino_b'];?>"/>
         <ul for="Treino C">Treino C:</ul>
         <input type="text"name="treino_c"size="260" maxlength="500"  value="<?=$info['treino_c'];?>"/>
         <ul for="Treino D">Treino D:</ul>
         <input type="text"name="treino_d"size="260" maxlength="500"   value="<?=$info['treino_d'];?>"/>
                                
            <legend><p>Observações</p></legend>
            <input type="text"name="observacao"size="260" maxlength="500"  value="<?=$info['observacao'];?>"/>
            <button type="submit" onclick="cadastrar()">Cadastrar </button>
            <button type="reset"> Limpar Mensagem </button>
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