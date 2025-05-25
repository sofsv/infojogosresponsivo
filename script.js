const formOpenBtn = document.querySelector("#form-open"),
  home = document.querySelector(".home"),
  formContainer = document.querySelector(".form_container"),
  formCloseBtn = document.querySelector(".form_close"),
  signupBtn = document.querySelector("#signup"),
  loginBtn = document.querySelector("#loginlink"),
  pwShowHide = document.querySelectorAll(".pw_hide");

formOpenBtn.addEventListener("click", () => home.classList.add("show"));
formCloseBtn.addEventListener("click", () => home.classList.remove("show"));

pwShowHide.forEach((icon) => {
  icon.addEventListener("click", () => {
    let getPwInput = icon.parentElement.querySelector("input");
    if (getPwInput.type === "password") {
      getPwInput.type = "text";
      icon.classList.replace("uil-eye-slash", "uil-eye");
    } else {
      getPwInput.type = "password";
      icon.classList.replace("uil-eye", "uil-eye-slash");
    }
  });
});

signupBtn.addEventListener("click", (e) => {
  e.preventDefault();
  formContainer.classList.add("active");
});

loginBtn.addEventListener("click", (e) => {
  e.preventDefault();
  formContainer.classList.remove("active");
});


function alternarConteudo() {
    let div1 = document.getElementById("tabela");
    let div2 = document.getElementById("editar");
        div1.classList.remove("conteudo");
        div1.classList.add("mostrar");
        div2.classList.remove("mostrar");
        div2.classList.add("conteudo");
}

function mostrarEdicao(id) {
   let div1 = document.getElementById("tabela");
    let div2 = document.getElementById("editar");

        div1.classList.remove("mostrar");
        div1.classList.add("conteudo");
        div2.classList.remove("conteudo");
        div2.classList.add("mostrar");
   

  // Enviar o ID para o PHP
    fetch('registar.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'acao=carregar_edicao&id=' + encodeURIComponent(id)
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("update_form").innerHTML = data; // Insere o conteúdo atualizado
    })
    .catch(error => console.error("Erro ao chamar PHP:", error));
}