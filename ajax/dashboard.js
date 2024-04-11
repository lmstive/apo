$(function () {

    $("#formProduto").hide()
    $("#formFornecedor").hide()
    buscarListFornecedores()
    buscarListagemProdutos()

    $("#cadastro-fornecedor").submit(e => {
        event.preventDefault();
        const fornecedor = {
            dsNome: $("#dsNomeFornecedor").val(),
            dsEndereco: $("#dsEndereco").val(),
            dsTelefone: $("#dsTelefone").val()
        }
        $.ajax({
            url: "php/fornecedor.php",
            data: fornecedor,
            type: "POST",
            success: function (response) {
                if (!response.error){
                    buscarListFornecedores()
                }
            }
        })
        $("#formFornecedor").hide()
        $("#listProduto").show()
    })

    $("#cadastro-produto").submit(e => {
        event.preventDefault();
        const produto = {
            dsNome: $("#dsNome").val(),
            valor: $("#valor").val(),
            idFornecedor: $("#fornecedor").val()
        }
        $.ajax({
            url: "php/produto.php",
            data: produto,
            type: "POST",
            success: function (response) {
                if (!response.error){
                    buscarListagemProdutos()
                }
            }
        })
        $("#formProduto").hide()
        $("#listProduto").show()
    })

    $(document).on("click", ".produto-cadastro", () => {
        event.preventDefault();
        $("#listProduto").hide()
        $("#formProduto").show()
    })

    $(document).on("click", ".fornecedor-cadastro", () => {
        event.preventDefault();
        $("#listProduto").hide()
        $("#formFornecedor").show()
    })

    function buscarListFornecedores() {
        $.ajax({
            url: "php/fornecedor.php",
            type: "GET",
            success: function (response) {
                const fornecedores = JSON.parse(response);
                let select = document.getElementById('fornecedor')
                fornecedores.forEach(fornecedor => {
                    let option = document.createElement('option')
                    option.value = fornecedor.id_fornecedores
                    option.text = fornecedor.ds_nome
                    select.add(option)
                })
            }
        })
    }

    function buscarListagemProdutos() {
        $.ajax({
            url: "php/produto.php",
            type: "GET",
            success: function (response) {
                const produtos = JSON.parse(response);
                let template = ``
                produtos.forEach(produto => {
                    template += `
                        <tr produtoId="${produto.id_produto}">
                            <td>${produto.id_produto}</td>
                            <td>${produto.ds_nome}</td>
                            <td>${produto.vl_unitario}</td>
                            <td> <button class="btn btn-primary add-cesta">Adicionar Cesta</button></td>
                        </tr>
                    `
                })
                $("#produtos").html(template)
            }
        })
    }

    $(document).on("click", ".add-cesta", ()=>{
        if (confirm("Deseja adicionar item a cesta?")){
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr("produtoId")
            let usuario = JSON.parse(localStorage.getItem('usuario'));
            let pedido = {
                idProduto: id,
                idUsuario: usuario.idUsuario
            }
            let pedidoExistente = JSON.parse(localStorage.getItem('pedido'))
            if (pedidoExistente) {
                attPedido(pedidoExistente.idPedido, id)
            } else {
                $.ajax({
                    url: "php/pedido.php",
                    data: pedido,
                    type: "POST",
                    success: function (response) {
                        if (!response.error){
                            const pedido = JSON.parse(response);
                            let pedidoAtivo = {}
                            pedido.forEach(p => {
                                pedidoAtivo.idPedido = p.id_pedido;
                            })
                            localStorage.setItem('pedido', JSON.stringify(pedidoAtivo))
                            attPedido(pedidoAtivo.idPedido, pedido.idProduto)
                        }
                    }
                })
            }
        }
    })

    function attPedido(idPedido, idProduto) {
        let attPedido = {
            idPedido: idPedido,
            idProduto: idProduto
        }
        $.ajax({
            url: "php/pedido.php",
            data: attPedido,
            type: "POST",
            success: function (response) {
                if (!response.error){
                }
            }
        })
    }

    $(document).on("click", ".cesta", () => {
        event.preventDefault();
        window.location.replace("http://localhost/apo/cesta.php")
    })

})