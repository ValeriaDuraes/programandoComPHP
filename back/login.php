<?php

$login = $_REQUEST['login'];
echo "<br/>";
$senha = $_REQUEST['senha'];

  if(empty($login)){
    exit("Faltando o campo login");
  }

  if(empty($senha)){
    exit("Faltando o campo senha!");
  }

  $conexao = new PDO(
    "mysql:host=localhost;port=3306;dbname=php-crud",
    "root", ""
  );

  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $comando = $conexao->prepare("
    SELECT * FROM `usuario`
    WHERE login = ? AND senha = ?;
  ");

  $comando->execute([ $login, $senha]);
  $resultados = $comando->fetchAll(PDO::FETCH_ASSOC); //fetchAll retorn alguma coisa
  var_dump($resultados);


?>