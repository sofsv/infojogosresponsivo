<!-- Formulário de login e registo -->
                <div class="form_container">
                    <span class="form_close">×</span>

                    <div class="form login_form">
                        <form action="registar.php" method="post">
                            <h2>Iniciar Sessão</h2>
                            <div class="input_box">
                                <input type="email" placeholder="Email" name="usermail" required />
                                <i class="uil uil-envelope-alt email"></i>
                            </div>
                            <div class="input_box">
                                <input type="password" placeholder="Password" name="pwd" required />
                                <i class="uil uil-lock password"></i>
                                <i class="uil uil-eye-slash pw_hide"></i>
                            </div>
                            <button class="button" name="login">Entrar agora</button>
                            <div class="login_signup">Não tem uma conta? <a href="" id="signup">Criar</a></div>
                        </form>
                    </div>

                    <div class="form signup_form">
                        <form action="registar.php" method="POST">
                            <h2>Criar</h2>
                            <div class="input_box">
                                <input type="email" id="email" placeholder="Email" name="email" required />
                                <i class="uil uil-envelope-alt email"></i>
                            </div>
                            <div class="input_box">
                                <input type="password" id="pass1" placeholder="Password" name="pass1" required />
                                <i class="uil uil-lock password"></i>
                                <i class="uil uil-eye-slash pw_hide"></i>
                            </div>
                            <div class="input_box">
                                <input type="password" id="pass2" placeholder="Confirmar password" name="pass2" required />
                                <i class="uil uil-lock password"></i>
                                <i class="uil uil-eye-slash pw_hide"></i>
                            </div>
                            <button class="button" name="registar">Criar</button>
                            <div class="login_signup">Já tem uma conta? <a href="" id="loginlink">Entrar</a></div>
                        </form>
                    </div>
                </div>