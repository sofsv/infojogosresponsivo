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
                            echo ('<li><a href="inserir.php">Inserir</a></li>');
                        } ?>
                        <li><a href="contactos.php"  class="active">Contactos</a></li>
                    </ul>
                    <button id="form-open" class="login_button">Login</button>
                </nav>
                <?php include ('login.php'); ?>
                
            </div>
        </header>

        <main>
            <section>
                <h1 align="center">InfoJogos</h1>  
                <br><br>
                <div class="bloco" align="center">
                    <br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.7108610132104!2d-8.552041159667821!3d41.16896813018609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd24639f4b95e9eb%3A0x8d5bc9d9f00952a!2sEisnt%20-%20Forma%C3%A7%C3%A3o%20e%20Consultoria!5e0!3m2!1spt-PT!2spt!4v1671583598441!5m2!1spt-PT!2spt" width="350" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <p><b>Morada: Avenida D. João I, 380/384, Soutelo</b></p>
                    <p><b>Código Postal: 4435-208 - Rio Tinto</b></p>
                    <p><b>Telefone: 22 480 4792 </b></p>
                    <p><b>Email: formacao@eisnt.com</b></p>
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