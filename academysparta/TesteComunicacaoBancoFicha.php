<?php
// comunicacao com banco de dados utilizando o PDO.
$pdo = new PDO("mysql:dbname=academysparta;host=localhost","root","");
// criar uma consulta com variavel $sql ,apos comunicacao com banco de dados para aparecer na tela, usando query - SELECT * FROM
$sql = $pdo->query('SELECT * FROM fichatreino');
//com a variavel $dados usar variavel $sql e a funcionalidade do PDO fectchall para pegar os dados no banco de dado.
$dados = $sql->fetchall(PDO::FETCH_ASSOC);
// totalizar quantidades de linhas utilizando $sql->rowCount (contagem de linhas)
echo "TOTAL DE DADOS INSERIDOS NO BANCO DE DADOS:".$sql->rowCount();
//<pre> deixa as linhas organizadas
echo '<pre>';
// print em tela dos dados do banco ja inseridos para teste em uma pagina.
print_r($dados);