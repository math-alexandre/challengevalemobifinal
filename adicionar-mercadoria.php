<?php
include './header.php';
require_once './util/Conexao.class.php';

$colunas = array('tbl_tipo.*');
$conexao = new Conexao();
$dados = $conexao->select('tbl_tipo', $colunas, NULL);
?>

<?php if (count($dados) == 0): ?>
    <div class="container" id="conteudo">
        <h1>Não existem tipos de mercadorias cadastrados !</h1>
        <a href="adicionar-tipo.php" class="btn btn-danger">Adicionar Tipo</a>
        <a href="index.php" class="btn btn-info">Voltar</a>
    </div>
<?php else: ?>
    <div class="container" id="conteudo">
        <div class="row">
            <div class="col-md-6">
                <h1>Cadastrar Mercadoria</h1>
                <form method="post" id="formulario" action="cadastro-mercadoria.php">
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
                        <input title="Nome" type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group">
                        <label>Quantidade</label>
                        <input title="Quantidade" type="number" step="1" max="100000" min="1"
                               class="form-control" name="quantidade">
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input title="Preço da Mercadoria" type="number" step="0.1"  id="preco" min="0.1"
                               class="form-control" name="preco" max="100000.0">
                    </div>
                    <div class="form-group">
                        <label>Tipo de Negócio</label>
                        <select title="Tipo de Negócio" class="form-control" name="tipoNegocio">
                            <option>Compra</option>
                            <option>Venda</option>
                        </select>
                    </div>
                    <input type="button" class="btn btn-success" value="Adicionar" id="btnAdd" title="Adicionar Mercadoria" >
                    <a href="index.php" class="btn btn-info">Voltar</a>
                </form>
                <div class="hide collapse collapsed" id="erro">
                    Informe todos os valores para prosseguir !
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script type="text/javascript">
    var form = document.getElementById("formulario");
    var btn = document.getElementById("btnAdd");
    var erro = document.getElementById("erro");
        
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