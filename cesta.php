<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trabalho Unipar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar bg-danger">
    <div class="column">
        <div class="container-fluid justify-content">
            <a href="dashboard.php" class="navbar-brand fw-bold text-light">Home</a>
            <button class="btn btn-primary cesta">Cesta</button>
        </div>
    </div>
</nav>
<div>
    <div class="card my-4" id="task-result">
        <div class="card-body">
            <h1 class="text-center font-weight-bold mt-2">Itens Pedido</h1>
        </div>

    </div>
    <div id="infPedido" class="m-3 column">

    </div>
    <table class="table table-bordered table-sm m-3" id="listPedido">
        <thead>
        <tr>
            <td>Cod</td>
            <td>Nome</td>
            <td>Valor</td>
        </tr>
        </thead>
        <tbody id="pedido">

        </tbody>
    </table>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="ajax/cesta.js"></script>
</html>