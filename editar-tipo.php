<?php
//Includes
include './header.php';
require_once './util/Conexao.class.php';

$conexao = new Conexao();
$id = $_GET['id'];
$colunas = array("tbl_tipo.*");
$data = $conexao->select("tbl_tipo", $colunas, "WHERE id = '" . $id . "'");
$id = $data[0]['id'];
//Não existe
if (count($data) == 0):
    ?>
    <div id="conteudo" class="container">
        <h1>O tipo não existe !</h1>
        <a href="tipos.php" class="btn btn-info">Voltar</a>
    </div>
    <?php
else:
    $dado = $data[0];
    ?>
    <div class="container" id="conteudo">
        <div class="row">
            <div class="col-md-6">
                <h1>Editar Tipo: <?php echo $dado['id']?></h1>
                <form method="post" id="form" action="salvar-tipo.php">
                    <div class="form-group">
                        <label>Código</label>
                        <input title="Código" type="number" class="form-control" name="id" 
                               value="<?php echo $dado['id']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input title="Nome" type="text" class="form-control" name="nome"
                               value="<?php echo $dado['nome']?>">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input title="Descrição" type="text" class="form-control" name="descricao"
                               value="<?php echo $dado['descricao']?>">
                    </div>
                    <input type="button" class="btn btn-success" value="Salvar" id="btnAdd" title="Salvar Tipo" >
                    <a href="tipos.php" class="btn btn-info">Voltar</a>
                </form>
                <div class="hide collapse collapsed" id="erro">
                    Informe um Nome para o tipo para prosseguir !
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script type="text/javascript">
    var form = document.getElementById("form");
    var btn = document.getElementById("btnAdd");

	//Click do botão Adicionar
    btn.onclick = function () {
        if (form["nome"].value.trim() == "") {
            alert('O campo Nome é obrigatório');
            erro.className = "alert alert-warning show";
            form["nome"].focus();
        }
        else {
            form.submit();
        }
    }
</script>