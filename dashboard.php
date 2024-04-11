<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>APO</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar bg-danger">
    <div class="column">
        <div class="container-fluid justify-content">
            <a href="" class="navbar-brand fw-bold text-light">Home</a>
            <button class="btn btn-success cesta">Cesta</button>
        </div>
    </div>
</nav>
<div>
    <div class="card my-4" id="task-result">
        <div class="card-body">
            <h1 class="text-center font-weight-bold mt-2">Cadastro de Produtos e Fornecedores</h1>
        </div>

    </div>
    <div class="m-3 column">
        <button class="btn btn-primary produto-cadastro">Cadastrar Produto</button>
        <button class="btn btn-primary fornecedor-cadastro">Cadastrar Fornecedor</button>
    </div>
    <table class="table table-bordered table-sm m-3" id="listProduto">
        <thead>
        <tr>
            <td>Codigo</td>
            <td>Nome</td>
            <td>Valor</td>
            <td></td>
        </tr>
        </thead>
        <tbody id="produtos">

        </tbody>
    </table>
</div>

<div id="formProduto" class="container my-5">
    <div class="row p-4">
        <div>
            <div class="card">
                <div class="card-title">
                    <p class="text-center font-weight-bold mt-4">Cadastro de Produto</p>
                </div>
                <div class="card-body">
                    <form id="cadastro-produto">
                        <div class="form-group">
                            <input type="text" id="dsNome" placeholder="Nome do Produto" class="form-control my-2">
                        </div>
                        <div class="form-group">
                            <input type="number" min="0" step="0.01" id="valor" placeholder="Valor" class="form-control my-2">
                        </div>
                        <select id="fornecedor" class="form-control">
                            <option value="">Selecione um Forncedor</option>
                        </select>
                        <button type="submit" class="btn btn-primary text-center mt-3">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="formFornecedor" class="container my-5">
    <div class="row p-4">
        <div>
            <div class="card">
                <div class="card-title">
                    <p class="text-center font-weight-bold mt-4">Cadastro de Fornecedor</p>
                </div>
                <div class="card-body">
                    <form id="cadastro-fornecedor">
                        <div class="form-group">
                            <input type="text" id="dsNomeFornecedor" placeholder="Nome do Fornecedor" class="form-control my-2">
                        </div>
                        <div class="form-group">
                            <input type="text" id="dsEndereco" placeholder="Endereço" class="form-control my-2">
                        </div>
                        <div class="form-group">
                            <input type="number" id="dsTelefone" placeholder="Telefone" class="form-control my-2">
                        </div>
                        <button type="submit" class="btn btn-primary text-center">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="ajax/dashboard.js"></script>
</html>