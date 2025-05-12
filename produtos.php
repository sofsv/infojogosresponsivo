<?php
    session_start();
    include('ligaDados.php');
    $db = new ligaDados();
    $dados = $db->listar_produtos(); 
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
                    <button id="form-open" class="login_button">Login</button>
                </nav>
                <?php include ('login.php'); ?>
            </div>
        </header>

        <main>
            <section>
                <div class="bloco">
        <br>
        <table width="800px" align="center" border="1">
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
            <td align='center'>Marca</td>
            <td align='center'>Modelo</td>
            <td align='center'>Preço</td>
            <td align='center'>Descrição</td>
            <td align='center'>Imagem</td>
            <?php
            if (isset($_SESSION['tipo'])) {
              if($_SESSION['tipo'] == 1) {
              echo "<td align='center'>Apagar</td><td align='center'>Atualizar</td>";
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
              if ($_SESSION['tipo'] == 1) {
                echo "<td align='center'><a href='registar.php?ap={$registo['n_produto']}'>teste 1</a></td>";
                echo "<td align='center'>teste 2</td>";
              }
              echo "</tr>";
            }
          ?>
        </table>
      </div>
            </section>
        </main>

        <footer>
            <h5>Site feito no âmbito da PAF - 2025</h5>
            <img src="imagens/logos.png" alt="Logos" />
        </footer>
    </div>
</body>
 
</html>
<script src="script.js"></script>