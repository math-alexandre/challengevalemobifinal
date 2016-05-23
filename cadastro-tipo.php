<?php
//Includes
require_once('./util/Conexao.class.php');
//Atribuições
$nome = trim($_POST['nome']);
$descricao = trim($_POST['descricao']);

$conexao = new Conexao();

$colunas = array('tbl_tipo.*');
$dados = $conexao->select('tbl_tipo', $colunas, "WHERE nome = '" . $nome . "'");

//Nome já existe
if (count($dados) > 0):
    include './header.php';
    ?>
    <div class="container" id="conteudo">
        <h1>O Nome do tipo já existe ! Insira outro.</h1>
        <a href='adicionar-tipo.php' class="btn btn-danger">Voltar</a>
    </div>
    <?php
else:
    $colunas = array('nome', 'descricao');
    $valores = array($nome, $descricao);

    $conexao->insert('tbl_tipo', $colunas, $valores);

    header('Location: index.php');
endif;
?>