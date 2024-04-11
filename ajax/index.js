$(function (){
    $("#cadastro").hide()

    let usuarioStorage = JSON.parse(localStorage.getItem('usuario'));
    if (usuarioStorage){
        window.location.replace("http://localhost/apo/dashboard.php")
    }

    $("#cadastro-form").submit(e => {
        event.preventDefault();
        const postData = {
            dsNome: $("#dsNome").val(),
            idade: $("#idade").val(),
            estadoCivil: $("#estadoCivil").val(),
            dsEndereco: $("#dsEndereco").val(),
            dsEmail: $("#dsEmail").val(),
            dsSenha: $("#dsSenha").val()
        }
        $.ajax({
            url: "php/usuario.php",
            data: postData,
            type: "POST",
            success: function (response) {
                if (!response.error){
                   $("#cadastro-form").trigger("reset")
                    $("#cadastro").hide()
                    $("#formLogin").show()
                }
            }
        })
    })

    $("#login").submit( e => {
        event.preventDefault();
        const login = {
            dsEmail: $("#dsEmailLogin").val(),
            dsSenha: $("#dsSenhaLogin").val()
        }

        $.ajax({
            url: "php/usuario.php",
            data: login,
            type: "POST",
            success: function (response) {
                let responseTratado = response.substring(5, response.length);
                let usuarioLogado = JSON.parse(responseTratado)

                let usuario = {};

                for (let i = 0; i < usuarioLogado.length; i++) {
                    usuario.idUsuario = usuarioLogado[i].id_usuario;
                    usuario.dsNome = usuarioLogado[i].ds_nome;
                    usuario.idade = usuarioLogado[i].idade;
                    usuario.dsEmail = usuarioLogado[i].ds_email
                }

                localStorage.setItem('usuario', JSON.stringify(usuario))
                window.location.replace("http://localhost/apo/dashboard.php")

            }
        })
    })

    function fetchUsuario() {
        $.ajax({
            url: "php/usuario.php",
            type: "GET",
            success: function (response) {
                const usuarios = JSON.parse(response);
                let template = ``
                usuarios.forEach(usuario => {
                    template += `
                        <tr usuarioId="${usuario.id_usuario}">
                            <td>${usuario.id_usuario}</td>
                            <td>${usuario.ds_nome}</td>
                            <td>${usuario.idade}</td>
                            <td> <button class="btn btn-danger task-delete">Deletar</button></td>
                            <td> <button class="btn btn-warning task-editar">Editar</button></td>
                        </tr>
                    `
                })
                $("#tasks").html(template)
            }
        })
    }

    $(document).on("click", ".usuario-cadastrar", () => {
        event.preventDefault();
        $("#formLogin").hide()
        $("#cadastro").show()
    })

    $(document).on("click", ".task-delete", ()=>{
        if (confirm("Deseja excluir registro")){
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr("usuarioId")
            $.post("php/usuario.php", { id }, () => {
                fetchUsuario()
            })
        }
    })

    $(document).on("click", ".task-editar", ()=>{
        const element = $(this)[0].activeElement.parentElement.parentElement
        const id = $(element).attr("usuarioId")
        let url = "php/usuario-find-id.php"
        $.ajax({
            url,
            data: { id },
            type: "POST",
            success: function (response) {
                if (!response.error){
                    const usuario = JSON.parse(response)
                    let task
                    let usuarioEdit = {};

                    for (let i = 0; i < usuario.length; i++) {
                        usuarioEdit.idUsuario = usuario[i].id_usuario;
                        usuarioEdit.dsNome = usuario[i].ds_nome;
                        usuarioEdit.idade = usuario[i].idade;
                        usuarioEdit.dsEmail = usuario[i].ds_email
                    }
                    $("#dsNome").val(usuarioEdit.dsNome)
                    $("#dsEmail").val(usuarioEdit.dsEmail)
                }
            }
        }
    )
    })
})