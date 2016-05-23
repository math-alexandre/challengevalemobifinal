<?php
//Includes
include './header.php';
require_once './util/Conexao.class.php';

$conexao = new Conexao();
$colunas = array('tbl_item.*');
$dados = $conexao->select("tbl_item", $colunas, NULL);

//Não existe
if (count($dados) == 0):
    ?>
    <div id="conteudo" class="container">
        <h1>Não existem mercadorias cadastradas !</h1>
        <a href="adicionar-mercadoria.php" class="btn btn-danger">Clique aqui para Cadastrar</a>
        <a href="index.php" class="btn btn-info">Voltar</a>
    </div>
<?php else: ?>
    <div class="container" id="conteudo">
        <h1>Itens</h1>
        <input id="filter" type="text" class="form-control" placeholder="Pesquise Aqui...">
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <td>Código</td>
            <td>Tipo</td>
            <td>Nome</td>
            <td>Quantidade</td>
            <td>Preço</td>
            <td>Tipo de Negócio</td>
            <td>Editar</td>
            </thead>
            <tbody class="searchable">
    <?php foreach ($dados as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['tipo'] ?></td>
                        <td><?php echo $item['nome'] ?></td>
                        <td><?php echo $item['quantidade'] ?></td>
                        <td><?php echo $item['preco'] ?></td>
                        <td><?php
                            if ($item['tipoNegocio'] == 1)
                                echo 'Compra';
                            else
                                echo 'Venda';
                            ?>
                        </td>
                        <td>
                            <a href="editar-mercadoria.php?id=<?php echo $item['id'] ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span> </a>
                        </td>
                    </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-info">Voltar</a>
        <a href="adicionar-mercadoria.php" class="btn btn-success">Cadastrar Nova</a>
    </div>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filter').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.searchable tr').hide();
                $('.searchable tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>