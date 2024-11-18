<?php
// comunicação com banco de dados 
require 'Config.php'; 

// criar os filtros do dados 
$id = filter_input(INPUT_POST, 'id'); 
$name = filter_input(INPUT_POST,'name');
$professor= filter_input (INPUT_POST,'professor');
$data_avaliacao = filter_input(INPUT_POST,'data_avaliacao');
$treino_a= filter_input(INPUT_POST,'treino_a');
$treino_b = filter_input(INPUT_POST,'treino_b',); 
$treino_c = filter_input(INPUT_POST,'treino_c');
$treino_d = filter_input(INPUT_POST,'treino_d');
$data_reavaliacao = filter_input (INPUT_POST,'data_reavaliacao');
$observacao= filter_input(INPUT_POST,'observacao');
$email = filter_input (INPUT_POST , 'email');


// condição para validade se estão corretos ou se ocorre algum erro na comunicação do filter
if($id && $name && $professor && $data_avaliacao && $treino_a && $treino_b && $treino_c && $treino_d && $observacao && $data_reavaliacao && $email ) {

 $sql = $pdo->prepare("UPDATE fichatreino SET nome = :name, professor = :professor, data_avaliacao = :data_avaliacao,treino_a = :treino_a, treino_b =:treino_b,treino_c = :treino_c, treino_d = :treino_d, observacao  = :observacao , data_reavaliacao = :data_reavaliacao, email = :email WHERE id = :id");

 $sql->bindValue(':name',$name);
 $sql->bindValue(':professor', $professor);
 $sql->bindValue(':data_avaliacao',$data_avaliacao);
 $sql->bindValue(':treino_a', $treino_a);
 $sql->bindValue(':treino_b',$treino_b);
 $sql->bindValue(':treino_c', $treino_c);
 $sql->bindValue(':treino_d', $treino_d);
 $sql->bindValue(':observacao', $observacao);
 $sql->bindValue(':id' , $id);
 $sql->bindValue(':data_reavaliacao' , $data_reavaliacao);
 $sql->bindValue(':email' , $email);
 $sql->execute();
 

header("Location: ListaDadosFicha.php");
exit;

} else {
    header("Location: Ficha.html");// caso de um error de preenchimento volta para pagina cadastro de alunos, caso tambem não cadastrar nada ele não envia od dados volta para pagina cadastro alunos
    exit;
}
