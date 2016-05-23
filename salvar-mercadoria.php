<?php
//Includes
require_once './util/Conexao.class.php';

//Atribuições
$id = $_POST['id'];
$tipo = $_POST['tipo'];
$nome = trim($_POST['nome']);
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];
$tipoNegocio = $_POST['tipoNegocio'];

if ($tipoNegocio == 'Compra')
    $tipoNegocio = 1;
else
    $tipoNegocio = 2;

$campos = array("tipo", "nome", "quantidade", "preco", "tipoNegocio");
$valores = array($tipo, $nome, $quantidade, $preco, $tipoNegocio);

$conexao = new Conexao();
$conexao->update("tbl_item", $campos, $valores, "id = '" . $id . "'");

header('Location: itens.php');
?>