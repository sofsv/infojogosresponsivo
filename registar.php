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

//Inserir 
if (isset($_POST['atualizar'])) {
  echo 'teste';
  $marca = $_POST['marcaU'];
  $modelo = $_POST['modeloU'];
  $n_plataforma = $_POST['plataformaU'];
  $preco = $_POST['precoU'];
  $descricao = $_POST['descricaoU'];
  $id = $_POST['campo'];

  if(!empty($_POST['imagemU'])){
    //extenções que serão permitidas para o upload dos ficheiros.
    $permitidas = array("jpeg","jpg","png");

    //variável que irá conter a imagem $_FILES[campo do caminho][tag name]
    $temp = explode(".",$_FILES["imagemU"]["name"]);
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
        header("location: produtos.php");
      }
      else{
        //função que permite o upload de ficheiro para o servidor
        move_uploaded_file($_FILES["imagem"]["tmp_name"],$target_path);

        $db->atualizar_produtos_img($marca,$modelo,$n_plataforma,$preco,$descricao, $target_path, $id);
      }
    }
  } else{
    $db->atualizar_produtos($marca,$modelo,$n_plataforma,$preco,$descricao, $id);
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
  if($_POST['acao'] === 'carregar_edicao'){
    $id = $_POST['id'] ?? null; // Captura o ID do produto
    if ($id) {
        $dados2 = $db->listar_produtos_edit($id); // Chama a função com o ID correto
        foreach ($dados2 as $registo2) {
            echo "<input type=\"hidden\" name=\"campo\" value=\"{$registo2['n_produto']}\">";
            echo "<div class='input_box'><input type='text' name='marcaU' value='{$registo2['marca']}' ></div>";
            echo "<div class='input_box'><input type='text' name='modeloU' value='{$registo2['modelo']}' ></div>";
            echo "<div class='input_box'><input type='text' name='plataformaU' value='{$registo2['n_plataforma']}' ></div>";
            echo "<div class='input_box'><input type='number' step='0.01' name='precoU' value='{$registo2['preco']}' ></div>";
            echo "<div class='input_box'><input type='text' name='descricaoU' value='{$registo2['descricao']}' ></div>";
            echo "<div class='input_box'><input type='file' name='imagemU' accept='image/*' ></div>";
        }
    }
  }
}
?>
