<?php
session_start();
if (!(isset($_SESSION['login']))) {
  // Utilizador não autenticado
} else {

}
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
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="produtos.php">Produtos</a></li>
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
            <section>
                <h1 align="center">InfoJogos</h1>  
                <br><br><br><br>
                <p style="text-align:justify;">
                    Um novo site para comprar a bom preço os jogos atuais e antigos!!!!<br>
                    Queres os melhores jogos para PC, PlayStation ou Xbox? No InfoJogos, encontras uma vasta seleção de títulos para todas as plataformas, desde os lançamentos mais aguardados até aos clássicos intemporais.
                    Compra de forma fácil e segura e recebe os teus jogos rapidamente para começares a jogar sem esperas. Explora a nossa coleção e encontra o teu próximo grande jogo hoje mesmo!!!!
                </p>
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