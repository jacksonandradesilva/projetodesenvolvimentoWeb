<?php
// comunicação com banco de dados 
require 'Config.php'; 

// criar os filtros do dados 
$name = filter_input(INPUT_POST,'name');
$professor = filter_input (INPUT_POST,'professor');
$data_avaliacao= filter_input(INPUT_POST,'data_avaliacao');
$treino_a= filter_input(INPUT_POST,'treino_a');
$treino_b= filter_input(INPUT_POST,'treino_b'); 
$treino_c = filter_input(INPUT_POST,'treino_c');
$treino_d= filter_input(INPUT_POST,'treino_d');
$data_reavaliacao= filter_input(INPUT_POST,'data_reavaliacao');
$observacao= filter_input(INPUT_POST , 'observacao');
$email = filter_input(INPUT_POST ,'email');


// condição para validade se estão corretos ou se ocorre algum erro na comunicação do filter
if($name && $professor && $data_avaliacao && $treino_a && $treino_b && $treino_c && $treino_d && $data_reavaliacao && $observacao && $email) {

    $sql = $pdo->prepare("SELECT * FROM fichatreino WHERE email = :email");// fazer uma verificação se email ja foi cadastrado novamente.
    $sql->bindValue(':email', $email);
    $sql->execute();

if($sql->rowCount() === 0) { // se email for igual a zero ele irar executar o cadastro se caso ele seja repetido ele não executa

    
   $sql = $pdo->prepare("INSERT INTO fichatreino (nome,professor,data_avaliacao,treino_a,treino_b,treino_c,treino_d,data_reavaliacao,observacao,email)
   VALUES (:name,:professor,:data_avaliacao,:treino_a,:treino_b,:treino_c,:treino_d,:data_reavaliacao,:observacao,:email)");

      // criar as associações  dos dados 
   $sql->bindValue(':name',$name);
   $sql->bindValue(':professor',$professor);
   $sql->bindValue(':data_avaliacao',$data_avaliacao);
   $sql->bindValue(':treino_a', $treino_a);
   $sql->bindValue(':treino_b',$treino_b);
   $sql->bindValue(':treino_c', $treino_c);
   $sql->bindValue(':treino_d', $treino_d);
   $sql->bindValue(':data_reavaliacao', $data_reavaliacao);
   $sql->bindValue(':observacao', $observacao);
   $sql->bindValue(':email',$email);
   $sql->execute(); // execucao da minha associacao dos dados.


header("Location: ListaDadosFicha.php"); // dando certos com os dados adicionando sera enviado para pagina Alunos Cadastrados.
exit;

} else {

    header("Location: Ficha.html");
    exit;
}

} else {
   header("Location: Ficha.html");// caso de um error de preenchimento volta para pagina cadastro de alunos, caso tambem não cadastrar nada ele não envia od dados volta para pagina cadastro alunos
    exit;
}
