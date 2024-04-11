<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trabalho Unipar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="page" id="formLogin">
        <form id="login" method="POST" class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">E-mail</label>
            <input type="email" id="dsEmailLogin" placeholder="Digite seu e-mail" autofocus="true" />
            <label for="password">Senha</label>
            <input type="password" id="dsSenhaLogin" placeholder="Digite seu e-mail" />

            <div class="column">
                <button type="submit" class="btn btn-dark text-center">Entrar</button>
                <button class="btn btn-dark text-center usuario-cadastrar">Cadastro</button>
            </div>
        </form>
    </div>



    <div id="cadastro" class="container my-5">
        
        <div class="row p-4">
            <div>
                <div class="card">
                    <div class="card-title">
                        <h4>
                            <p class="text-center font-weight-bold mt-4">Cadastro de Usuario</p>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id="cadastro-form">
                            <div class="form-group">
                                <input type="text" id="dsNome" placeholder="Nome do Usuario" class="form-control my-2">
                            </div>
                            <div class="form-group">
                                <input type="number" id="idade" placeholder="Idade" class="form-control my-2">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" id="dsEndereco" placeholder="Endereço" class="form-control my-2">
                            </div>
                            <div class="form-group">
                                <input type="email" id="dsEmail" placeholder="E-mail" class="form-control my-2">
                            </div>
                            <div class="form-group">
                                <input type="password" id="dsSenha" placeholder="Senha" class="form-control my-2">
                            </div>
                            <button type="submit" class="btn btn-primary text-center">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="ajax/index.js"></script>
</body>

</html>