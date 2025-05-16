<?php
session_start();
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
                        <li><a href="produtos.php">Produtos</a></li>
                        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) {
                            echo ('<li><a href="inserir.php" class="active">Inserir</a></li>');
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

                <div class="form">
                    <form action="registar.php" method="POST" enctype="multipart/form-data">
                        <h2>Inserir Produto</h2>

                        <div class="input_box">
                        <input type="text" name="marca" placeholder="Marca" required>
                        </div>

                        <div class="input_box">
                        <input type="text" name="modelo" placeholder="Modelo" required>
                        </div>

                        <div class="input_box">
                        <input type="number" name="n_plataforma" placeholder="Código da Plataforma" required>
                        </div>

                        <div class="input_box">
                        <input type="number" step="0.01" name="preco" placeholder="Preço (€)" required>
                        </div>

                        <div class="input_box">
                        <input type="text" name="descricao" placeholder="Descrição" required>
                        </div>
                        
                        <div class="input_box">
                        <input type="file" name="imagem" accept="image/*" required>
                        </div>

                        <div class="botao_centro">
                        <button class="button_inserir" type="submit" name="inserir">Inserir</button>
                        </div>
                    </form>
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