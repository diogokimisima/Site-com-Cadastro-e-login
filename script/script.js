function validateForm() {
    var nome = document.getElementById("nome").value;
    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;
    var nivel = document.getElementById("nivel").value;

    var nomeError = document.getElementById("nome-error");
    var loginError = document.getElementById("login-error");
    var passwordError = document.getElementById("password-error");
    var nivelError = document.getElementById("nivel-error");

    if (nome.length < 2) {
        nomeError.innerHTML = "O nome deve ter pelo menos 2 caracteres.";
        return false;
    } else {
        passwordError.innerHTML = "";
    }

    if (login.length < 5) {
        loginError.innerHTML = "O login deve ter pelo menos 5 caracteres.";
        return false;
    } else {
        loginError.innerHTML = "";
    }

    if (password.length < 5) {
        passwordError.innerHTML = "A senha deve ter pelo menos 5 caracteres.";
        return false;
    } else {
        passwordError.innerHTML = "";
    }

    if (nivel === "0") {
        nivelError.innerHTML = "Selecione um nível de usuário.";
        return false;
    } else {
        nivelError.innerHTML = "";
    }

    return true;
}

function exibirSenha() {
    var senhaInput = document.getElementById("password");
    var checkbox = document.getElementById("exibirSenha");

    if (checkbox.checked) {
        senhaInput.type = "text";
    } else {
        senhaInput.type = "password";
    }
}

function confirmDelete(id, nome) {
    var result = confirm("Tem certeza que deseja excluir o usuário '" + nome + "'?");
    if (result) {
        var arquivo = "user.json";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                alert("Usuário excluído com sucesso!");
                location.reload();
            }
        };
        xhttp.open("GET", "list_user.php?delete=" + id, true);
        xhttp.send();
    }
}

