<?php
include './header.php';
?>
<div class="container" id="conteudo">
    <div class="row">
        <div class="col-md-6">
            <h1>Cadastrar Tipo</h1>
            <form method="post" id="form" action="cadastro-tipo.php">
                <div class="form-group">
                    <label>Nome</label>
                    <input title="Nome" type="text" class="form-control" name="nome">
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <input title="Descrição" type="text" class="form-control" name="descricao">
                </div>
                <input type="button" class="btn btn-success" value="Adicionar" id="btnAdd" title="Adicionar Tipo" >
                <a href="index.php" class="btn btn-info">Voltar</a>
            </form>
            <div class="hide collapse collapsed" id="erro">
                Informe um Nome para o tipo para prosseguir !
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var form = document.getElementById("form");
    var btn = document.getElementById("btnAdd");

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