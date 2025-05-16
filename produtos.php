<?php
    session_start();
    include('ligaDados.php');
    $db = new ligaDados();
    $dados = $db->listar_produtos(); 
    $dados2 = $db->listar_produtos_edit(10); 
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <title>InfoJogos</title>
    <link rel="icon" href="imagens/infojogosicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css.css" />
</head>
<body class="home">
    <div class="wrapper">
        <header>
            <div class="container">
                <img src="imagens/infojogos.png" />
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="produtos.php" class="active">Produtos</a></li>
                        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) {
                            echo ('<li><a href="inserir.php">Inserir</a></li>');
                        } ?>
                        <li><a href="contactos.php">Contactos</a></li>
                    </ul>
                     <?php   
                      if (isset($_SESSION['login'])) { 
                              echo '<form action="registar.php" method="post" >
                              <button class="login_button" type="submit" name="logout">Logout</button>
                              </form>';
                      }else{
                          echo '<button id="form-open" class="login_button">Login</button>';
                      }  ?>
                </nav>
                <?php include ('login.php'); ?>
            </div>
        </header>

        <main>
          <div id="tabela" class="conteudo">
            <section>
              <table>
                <tr>
                <?php
                if (isset($_SESSION['tipo'])) {
                  if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 0) {
                    echo '<td align="center" colspan="7">';
                  } else {
                    echo '<td align="center" colspan="5">';
                  }
                }
                ?>  
                  <h2 style="color:#FFF;" align="center">Catálogo de jogos</h2>
                  </td>
                </tr>

                <tr>
                  <th align='center'>Marca</th>
                  <th align='center'>Modelo</th>
                  <th align='center'>Preço</th>
                  <th align='center'>Descrição</th>
                  <th align='center'>Imagem</th>
                  <?php
                  if (isset($_SESSION['tipo'])) {
                    if($_SESSION['tipo'] == 1) {
                    echo "<th align='center'>Apagar</th><th align='center'>Atualizar</th>";
                    }
                  }
                  ?>
                </tr>
                <?php 
                  foreach ($dados as $registo) {
                    echo "<tr><td align='center'>{$registo['marca']}</td>";
                    echo "<td align='center'>{$registo['modelo']}</td>";
                    echo "<td align='center'>{$registo['preco']}</td>";
                    echo "<td align='center'>{$registo['descricao']}</td>";
                    echo "<td align='center'><img src='{$registo['imagem']}' width='180px'></td>";
                    if($_SESSION){
                    if ($_SESSION['tipo'] == 1) {
                      echo "<td align='center'><a href='registar.php?ap={$registo['n_produto']}'><img src=\"imagens/Delete.png\" width=\"30\" height=\"27\"/></a></td>";
                      echo "<td align='center'><a onclick=\"alternarConteudo()\"><img src=\"imagens/editar.png\" width=\"30\" height=\"27\"/></td>";
                    }
                    echo "</tr>";
                  }}
                ?>
              </table>
              <div id="editar" class="conteudo" style="display: none;">
                  <div class="form">
                    <form action="registar.php" method="POST" enctype="multipart/form-data">
                        <h2>Editar Produto</h2>
                        <?php foreach ($dados2 as $registo2) { ?>
                        <div class="input_box">
                        <input type="text" name="marca" placeholder="<?php echo $registo2['marca'] ?>" required>
                        </div>

                        <div class="input_box">
                        <input type="text" name="modelo" placeholder="<?php echo $registo2['modelo'] ?>" required>
                        </div>

                        <div class="input_box">
                        <input type="text" name="n_plataforma" placeholder="<?php echo $registo2['plataforma'] ?>" required>
                        </div>

                        <div class="input_box">
                        <input type="number" step="0.01" name="preco" placeholder="<?php echo $registo2['preco'] ?>" required>
                        </div>

                        <div class="input_box">
                        <input type="text" name="descricao" placeholder="<?php echo $registo2['descricao'] ?>" required>
                        </div>
                        
                        <div class="input_box">
                        <input type="file" name="imagem" accept="image/*" required>
                        </div>
                        <?php } ?>
                        <div class="botao_centro">
                          <button class="button_inserir" type="submit" name="inserir">Cacelar</button>
                        <button class="button_inserir" type="submit" name="inserir"  onclick="alternarConteudo()">Atualizar</button>
                        </div>
                    </form>
                </div>
              </div>
            </section>
          </div>
        </main>

        <footer>
            <h5>Site feito no âmbito da PAF - 2025</h5>
            <img src="imagens/logos.png" alt="Logos" />
        </footer>
    </div>
</body>
 
</html>

<script>
function alternarConteudo() {
    let div1 = document.getElementById("tabela");
    let div2 = document.getElementById("editar");

    if (div1.style.display === "none") {
        div1.style.display = "block";
        div2.style.display = "none";
    } else {
        div1.style.display = "none";
        div2.style.display = "block";
    }
}
</script>
<script src="script.js"></script>