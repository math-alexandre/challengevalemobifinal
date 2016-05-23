<?php
//Includes
include './header.php';
require_once './util/Conexao.class.php';

$conexao = new Conexao();
$id = $_GET['id'];
$colunas = array("tbl_item.*");
$data = $conexao->select("tbl_item", $colunas, "WHERE id = '" . $id . "'");
$id = $data[0]['id'];
//Não existe
if (count($data) == 0):
    ?>
    <div id="conteudo" class="container">
        <h1>A mercadoria não existe !</h1>
        <a href="itens.php" class="btn btn-info">Voltar</a>
    </div>
    <?php
else:
    $colunas = array('tbl_tipo.*');
    $conexao = new Conexao();
    $dados = $conexao->select('tbl_tipo', $colunas, NULL);
    $dado = $data[0];
    ?>
    <div class="container" id="conteudo">
        <div class="row">
            <div class="col-md-6">
                <h1>Editar Mercadoria: <?php echo $dado["id"] ?></h1>
                <form method="post" id="formulario" action="salvar-mercadoria.php">
                    <div class="form-group">
                        <label>Código</label>
                        <input type="number" title="Código da Mercadoria" readonly
                               class="form-control" name="id" value ="<?php echo $dado['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select title="Selecione" class="form-control" name="tipo">
                            <?php foreach ($dados as $tipo): ?>
                                <option><?php echo $tipo['nome']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input title="Nome da Mercadoria" type="text" class="form-control" name="nome" maxlength="30"
                               value="<?php echo $dado["nome"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Quantidade</label>
                        <input title="Quantidade da Mercadoria" min="1" step="1" type="number" class="form-control"
                               name="quantidade" value="<?php echo $dado["quantidade"] ?>" max="100000">
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input title="Preço da Mercadoria" type="number" step="0.1" min="0.01" 
                               class="form-control" name="preco" max="10000.00" value="<?php echo $dado["preco"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Tipo de Negócio</label>
                        <select title="Tipo de Negócio da Mercadoria" class="form-control" name="tipoNegocio">
                            <option 
                            <?php if ($dado["tipoNegocio"] == 1): ?> 
                                    selected 
                                <?php endif; ?> >Compra</option>
                            <option 
                            <?php if ($dado["tipoNegocio"] == 2): ?> 
                                    selected 
                                <?php endif; ?> >Venda</option>
                        </select>
                    </div>
                    <input type="button" class="btn btn-default" value="Salvar" id="btnAdd" 
                           title="Adicionar Mercadoria" >
                    <a href="itens.php" class="btn btn-info">Voltar</a>
                </form>
                <div class="hide" id="erro">
                    Informe todos os valores para prosseguir !
                </div>
            </div>
        </div>
    </div>
<?php
endif;
?>
<script type="text/javascript">
    var form = document.getElementById("formulario");
    var btn = document.getElementById("btnAdd");
    var erro = document.getElementById("erro");
    
    $()

    btn.onclick = function () {
        if (form["nome"].value.trim() == "" || form["quantidade"].value == "" || form["preco"].value.trim() == "") {
            erro.className = "alert alert-warning show";
            alert("Informe todos os valores para continuar !");
        }
        else {
            form.submit();
        }
    }
</script>