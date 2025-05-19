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
                <h1>InfoJogos</h1>  
                <br>
                <main>

            <p class="section p.justificar">
             É com enorme entusiasmo que apresentamos a InfoJogos, a nova loja no mercado dedicada exclusivamente ao universo dos videojogos! Se és fã de gaming, seja em PC, Xbox ou PlayStation, este é o teu novo ponto de paragem obrigatório.
            </p>

             <p class="section p.justificar">
              A InfoJogos nasce da paixão pelos jogos e pela cultura gamer. Aqui, vais encontrar os títulos mais recentes, clássicos intemporais, acessórios de qualidade, consolas e uma equipa que fala a tua linguagem. Mais do que uma loja, queremos ser uma comunidade — um espaço onde os jogadores se sintam em casa, encontrem novidades, troquem ideias e vivam a sua paixão.
             </p>

            <p class="section p.justificarr">
             Situada num local de fácil acesso, a nossa loja foi cuidadosamente pensada para proporcionar uma experiência de compra envolvente e personalizada. Cada canto da InfoJogos foi desenhado para que te sintas dentro de um verdadeiro universo gamer: desde as prateleiras recheadas de jogos, aos postos de demonstração e zonas temáticas.
             </p>

             <p class="section p.justificar">O que vais encontrar na InfoJogos?</p>
             <ul>
             <li>🎮 Jogos para PC, Xbox e PlayStation – dos lançamentos mais esperados às pérolas escondidas.</li>
            <li>👾 Uma equipa especializada pronta a aconselhar-te com conhecimento e paixão.</li>
            </ul>

             <p class="section p.justificar">
            Acreditamos que o gaming é mais do que um hobby — é um estilo de vida. Por isso, na InfoJogos damos prioridade à qualidade, ao bom atendimento e à partilha dessa paixão que nos une a todos. Trabalhamos com as principais marcas e editoras do mercado, garantindo sempre novidades fresquinhas e promoções irresistíveis.
            </p>

             <p class="section p.justificar">
              Convidamos-te a visitar a InfoJogos, conhecer o nosso espaço, explorar o catálogo e fazer parte desta nova aventura. A tua próxima grande missão começa aqui!
             </p>

             <p class="section p.justificar">InfoJogos – Onde o jogo ganha vida.</p>
            </section>
        <main>
        <footer>
            <h5>Site feito no âmbito da PAF - 2025</h5>
            <img src="imagens/logos.png" alt="Logos" />
        </footer>
    </div>
</body>
</html>
<script src="script.js"></script>