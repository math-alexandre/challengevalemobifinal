<?php
//Includes
require_once './util/Conexao.class.php';
//Atribuições
$id = $_POST['id'];
$nome = trim($_POST['nome']);
$descricao = $_POST['descricao'];

$campos = array("nome", "descricao");
$valores = array($nome, $descricao);

$conexao = new Conexao();
$conexao->update("tbl_tipo", $campos, $valores, "id = '" . $id . "'");

header('Location: tipos.php');
?>