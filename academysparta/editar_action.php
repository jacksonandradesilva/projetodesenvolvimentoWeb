<?php
// comunicação com banco de dados 
require 'Config.php'; 

// criar os filtros do dados atraveis das variaveis criadas de acordo com as que estão no banco de dado
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST,'name');
$data_nascimento = filter_input (INPUT_POST,'data_nascimento');
$data_cadastramento = filter_input(INPUT_POST,'data_cadastramento');
$cpf= filter_input(INPUT_POST,'cpf');
$email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); // validação de email
$endereco = filter_input(INPUT_POST,'endereco');
$telefone = filter_input(INPUT_POST,'telefone');
$modalidade= filter_input(INPUT_POST,'modalidade');
$descricao = filter_input (INPUT_POST , 'descricao');


// condição para validade se estão corretos ou se ocorre algum erro na comunicação do filter
if($id && $name && $data_nascimento && $data_cadastramento && $cpf && $email && $endereco && $telefone && $modalidade ) {
//  Prepara uma instrução para execução e retorna um objeto de instrução
 $sql = $pdo->prepare("UPDATE usuarios SET nome= :name, data_nascimento = :data_nascimento, data_cadastramento = :data_cadastramento,cpf = :cpf,email =:email,endereco = :endereco, telefone = :telefone, modalidade = :modalidade, descricao = :descricao WHERE id = :id");

 $sql->bindValue(':name',$name);
 $sql->bindValue(':data_nascimento',$data_nascimento);
 $sql->bindValue(':data_cadastramento',$data_cadastramento);
 $sql->bindValue(':cpf', $cpf);
 $sql->bindValue(':email',$email);
 $sql->bindValue(':endereco', $endereco);
 $sql->bindValue(':telefone', $telefone);
 $sql->bindValue(':modalidade', $modalidade);
 $sql->bindValue(':id' , $id);
 $sql->bindValue(':descricao' , $descricao);
 $sql->execute();
 

header("Location: ListaDados.php"); // caso ocorra tudo certo enviara para pagida de lista de dados
exit;

} else {
    header("Location: CadastrodeAlunos.html");// caso de um error de preenchimento volta para pagina cadastro de alunos, caso tambem não cadastrar nada ele não envia od dados volta para pagina cadastro alunos
    exit;
}
