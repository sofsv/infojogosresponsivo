<?php 
include('ligaDados.php'); 
$db = new ligaDados();

//Registar Utilizador
if (isset($_POST['registar'])){
  if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2'])) {
    if($_POST['pass1'] == $_POST['pass2']){
      $password1 =MD5($_POST["pass1"]);
      
      $db->registo($_POST['user'],$_POST['email'],$password1);
    }
    else{
      echo("Password não coincide");
    }
  }
}

//Efetuar o login
if(isset($_POST['login'])){
  if(isset($_POST['usermail']) && isset($_POST['pwd'])) {
    echo "reg: ".$_POST['usermail']."e pass ".$_POST['pwd'];
    if(!empty($_POST['pwd']) && !empty($_POST['usermail'])){
      $password1 =MD5($_POST["pwd"]);
      $db->login($_POST['usermail'],$password1);
    }
    else{
      echo("Preencha todos os campos");
    }
  }
}

//Efetuar o logout
if (isset($_POST['logout'])){
  $db->logout();
}

//Apagar Produto
if (isset($_GET['ap'])){
  $db->apagar_produto($_GET['ap']);
}

//Apagar Produto
if (isset($_GET['ed'])){
  $db->listar_produtos_edit($_GET['ed']);
}

//Inserir 
if (isset($_POST['inserir'])) {
  
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $n_plataforma = $_POST['n_plataforma'];
  $preco = $_POST['preco'];
  $descricao = $_POST['descricao'];

  //extenções que serão permitidas para o upload dos ficheiros.
  $permitidas = array("jpeg","jpg","png");

  //variável que irá conter a imagem $_FILES[campo do caminho][tag name]
  $temp = explode(".",$_FILES["imagem"]["name"]);
  $extensao = end($temp);

  //Caminho para a pasta que passará a ter as imagens no servidor dentro da pasta htdocs
  $target_path = "fotos/".time()."_".basename($_FILES['imagem']["name"]);

  //if que garante que o ficheiro é de um formato de imagem válido e se tem tamanho inferior a 20mb
  if((($_FILES["imagem"]["type"] == "image/jpeg") || ($_FILES["imagem"]["type"] == "image/jpg") || 
  ($_FILES["imagem"]["type"] == "image/png") || ($_FILES["imagem"]["type"] == "image/x-png")) && 
  ($_FILES["imagem"]["size"] < 20000000) && in_array($extensao, $permitidas)) 
  {
    if($_FILES["imagem"]["error"] > 0){
      //Se houver erros no upload
    }
    else{
      //função que permite o upload de ficheiro para o servidor
      move_uploaded_file($_FILES["imagem"]["tmp_name"],$target_path);

      $db->inserir_produto($marca,$modelo,$n_plataforma,$preco,$descricao, $target_path);
    }
  }else{
    echo "ficheiro inválido";
  }
  
}

?>
