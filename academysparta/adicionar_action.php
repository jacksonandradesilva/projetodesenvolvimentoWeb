<?php
// comunicação com banco de dados 
require 'Config.php'; 

// criar os filtros do dados 
$name = filter_input(INPUT_POST,'name');
$data_nascimento = filter_input (INPUT_POST,'data_nascimento');
$data_cadastramento = filter_input(INPUT_POST,'data_cadastramento');
$cpf= filter_input(INPUT_POST,'cpf');
$email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); // validação de email
$endereco = filter_input(INPUT_POST,'endereco');
$telefone = filter_input(INPUT_POST,'telefone');
$modalidade= filter_input(INPUT_POST,'modalidade');
$descricao= filter_input(INPUT_POST , 'descricao');


// condição para validade se estão corretos ou se ocorre algum erro na comunicação do filter
if($name && $data_nascimento && $data_cadastramento && $cpf && $email && $endereco && $telefone && $modalidade ) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");// fazer uma verificação se email ja foi cadastrado novamente.
    $sql->bindValue(':email', $email);
    $sql->execute();

if($sql->rowCount() === 0) { // se email for igual a zero ele irar executar o cadastro se caso ele seja repetido ele não executa

    // $pdo->query("INSERT INTO usuarios (nome, data_nascimento,....)VALUE ('$name','$data_nascimento')"); posso colocar assim porem fica muito vulneravel.
   $sql = $pdo->prepare("INSERT INTO usuarios (nome, data_nascimento,data_cadastramento,cpf,email,endereco,telefone,modalidade,descricao)
   VALUES (:name,:data_nascimento,:data_cadastramento,:cpf,:email,:endereco,:telefone,:modalidade,:descricao)");

      // criar as associações  dos dados 
   $sql->bindValue(':name',$name);
   $sql->bindValue(':data_nascimento',$data_nascimento);
   $sql->bindValue(':data_cadastramento',$data_cadastramento);
   $sql->bindValue(':cpf', $cpf);
   $sql->bindValue(':email',$email);
   $sql->bindValue(':endereco', $endereco);
   $sql->bindValue(':telefone', $telefone);
   $sql->bindValue(':modalidade', $modalidade);
   $sql->bindValue(':descricao', $descricao);
   $sql->execute(); // execucao da minha associacao dos dados.


header("Location: ListaDados.php"); // dando certos com os dados adicionando sera enviado para pagina Alunos Cadastrados.
exit;

} else {

    header("Location: CadastroAlunos.html");
    exit;
}

} else {
    header("Location: CadastrodeAlunos.html");// caso de um error de preenchimento volta para pagina cadastro de alunos, caso tambem não cadastrar nada ele não envia od dados volta para pagina cadastro alunos
    exit;
}
