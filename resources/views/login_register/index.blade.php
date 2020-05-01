@extends('layouts.app_loginPlataforma')

@section('content')
    <div class="container">
        <!-- Codrops top bar -->
        <div class="codrops-top">
            <a href="">
                <strong>&laquo; Previous Demo: </strong>Responsive Content Navigator
            </a>
            <span class="right">
                    <a href=" http://tympanus.net/codrops/2012/03/27/login-and-registration-form-with-html5-and-css3/">
                        <strong>Back to the Codrops Article</strong>
                    </a>
                </span>
            <div class="clr"></div>
        </div>
        <!--/ Codrops top bar -->
        <header>
            <h1>Login and Registration Form <span>with HTML5 and CSS3</span></h1>
            <nav class="codrops-demos">
                <span>Click <strong>"Join us"</strong> to see the form switch</span>
                <a href="index.html" class="current-demo">Demo 1</a>
                <a href="index2.html">Demo 2</a>
                <a href="index3.html">Demo 3</a>
            </nav>
        </header>
        <section>
            <div id="container_demo">
                <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form id="form_login" autocomplete="on">
                            <h1>Log in</h1>
                            <p>
                                <label for="email" class="uname" data-icon="u"> Your email</label>
                                <input id="email" type="email" placeholder="mymail@mail.com" />
                                <div style="display: none" id="email_vazio">
                                    <span style="color: red;">Preencha o E-mail</span>
                                </div>
                            </p>
                            <p>
                                <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                <input id="password" type="password" placeholder="eg. X8df!90EO" />
                                <div  style="display: none" id="senha_vazia">
                                    <span style="color: red;">Preencha a senha</span>
                                </div>
                            </p>
                            <p class="keeplogin">
                                <input type="checkbox" name="keep_logged_in" id="keep_logged_in" value="1" />
                                <label for="keep_logged_in">Keep me logged in</label>
                            </p>
                            <p class="login button">
                            <button type="submit" class="btn">Login</button>                            
                            </p>
                            <p>
                                <a style="color: rgb(64, 92, 96);" href="enter_email.php">Forgot your password?</a>
                            </p>
                            <div  style="display: none" id="senha_errada">
                                    <span style="color: red;">Email ou senha incorreto.</span>
                            </div>
                            <p class="change_link">
                                Not a member yet ?
                                <a href="#toregister" class="to_register">Join us</a>
                            </p>
                        </form>
                    </div>

                    <div id="register" class="animate form">
                        <form  id="form_register" autocomplete="on">
                            {{ csrf_field() }}
                            <h1> Sign up </h1>
                            <p>
                                <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                <input id="usernamesignup" name="usernamesignup" type="text" placeholder="mysuperusername690" />
                            </p>
                            <div style="display: none" id="nome_cadastro_vazio">
                                <span style="color: red;">Preencha o nome</span>
                            </div>
                            <p>
                                <label for="emailsignup" class="youmail" data-icon="e"> Your email</label>
                                <input id="emailsignup" name="emailsignup" type="email" placeholder="mysupermail@mail.com" />
                            </p>
                            <div style="display: none" id="email_cadastro_vazio">
                                <span style="color: red;">Preencha o E-mail</span>
                            </div>
                            <p>
                                <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                <input id="passwordsignup" name="passwordsignup" type="password" placeholder="eg. X8df!90EO" />
                            </p>
                            <div style="display: none" id="password_cadastro_vazia">
                                <span style="color: red;">A senha deve possuir pelo menos 5 caracteres</span>
                            </div>
                            <p>
                                <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                <input id="passwordsignup_confirm" name="passwordsignup_confirm" type="password" placeholder="eg. X8df!90EO" />
                            </p>
                            <div style="display: none" id="password_confirm_cadastro_vazia">
                                <span style="color: red;">Preencha a senha</span>
                            </div>
                            <!--
                            <p class="keeplogin">
                                <input type="checkbox" name="keep_logged_in" id="keep_logged_in_register" value="1" />
                                <label for="keep_logged_in">Keep me logged in</label>
                            </p>
                            -->
                            <p class="signin button">
                                <input type="submit" value="Sign up" />
                            </p>
                                <div style="display: none" id="senhas_diferentes">
                                    <span style="color: red;">As senhas informadas não correspondem</span>
                                </div>
                                <div style="display: none" id="email_ja_cadastrado">
                                    <span style="color: red;">O E-mail já se encontra cadastrado</span>
                                </div>
                            <p class="change_link">
                                Already a member ?
                                <a href="#tologin" class="to_register"> Go and log in </a>
                            </p>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#form_login').submit(function(event) {
                
                $('#email_vazio').hide();
                $('#senha_vazia').hide();
                $('#senha_errada').hide();
                
                $('#senha_errada').hide();
                $('#senha_errada').hide();
                $('#senha_errada').hide();
                
                // var user = $('input[name=user]').val();
                var oEnviar = {
                    email: $('#email').val(),
                    password: $('#password').val(),
                    //keep_logged_in : $('#keep_logged_in').val()
                }
                if (oEnviar.email == "" || oEnviar.password == "") {
                    if (oEnviar.email == "" && oEnviar.password == "") {
                        $('#email_vazio').show();
                        $('#senha_vazia').show();
                        $('#email').focus();
                    } else if (oEnviar.email == "") {
                        $('#email_vazio').show();
                        $('#email').focus();
                    } else if (oEnviar.password == "") {
                        $('#senha_vazia').show();
                        $('#password').focus();
                    }
                } else {
                    $.ajax({
                        url: "{{ url('/loginPlataforma/salvar') }}",
                        type: 'post',
                        dataType: 'json',
                        data: oEnviar,
                    })
                    .done(function(s) {
                        
                        if (s == 1) {
                            window.location.href = "teste.html";
                        } else if (s == 0) {
                            $('#senha_errada').show();
                        }
                        
                    })
                    .fail(function(e) {
                        
                        alert('Deu errado.')
                        
                    })
                    .always(function(c) {
                        
                        // console.log(c);
                    });
    }
    event.preventDefault();
});
});
</script>
<script type="text/javascript">

    
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $('#form_register').submit(function(event) {

        var password_confirmacao_cadastro = $('#passwordsignup_confirm').val();
        
        var oCadastrar = {
            
            username: $('#usernamesignup').val(),
            email: $('#emailsignup').val(),
            password: $('#passwordsignup').val(),
            //manter_logado: $('#keep_logged_in_register').val(),
        }
        
        $('#nome_cadastro_vazio').hide();
        $('#email_cadastro_vazio').hide();
        $('#email_ja_cadastrado').hide();
        $('#password_cadastro_vazia').hide();
        $('#password_confirm_cadastro_vazia').hide();
        $('#senhas_diferentes').hide();
        
        if (oCadastrar.username == '' || oCadastrar.email == '' || oCadastrar.password.length < 5 ||
        oCadastrar.password == "" || password_confirmacao_cadastro == "" || oCadastrar.password !=
        password_confirmacao_cadastro) {
            if (oCadastrar.username == "") {
                $('#nome_cadastro_vazio').show();
                $('#usernamesignup').focus();
            }
            if (oCadastrar.email == "") {
                $('#email_cadastro_vazio').show();
                if (oCadastrar.username != "" && oCadastrar.email == "") {
                    $('#emailsignup').focus();
                }
            }
            if (oCadastrar.password.length < 5) {
                $('#password_cadastro_vazia').show();
                if (oCadastrar.username != "" && oCadastrar.email != "" && oCadastrar.password == "") {
                    $('#passwordsignup').focus();
                }
            }
            if (password_confirmacao_cadastro.length < 5) {
                $('#password_confirm_cadastro_vazia').show();
                if (oCadastrar.username != "" && oCadastrar.email != "" && (oCadastrar.password != "" || oCadastrar.password.length >= 5) && password_confirmacao_cadastro == "") {
                    $('#passwordsignup_confirm').focus();
                }
            }
            if (oCadastrar.password != "" && password_confirmacao_cadastro != "" && oCadastrar.password != password_confirmacao_cadastro) {
                $('#senhas_diferentes').show();
            }
        } else {
            $.ajax({
                url: " {{ url('clientes/salvar') }} ",
                type: 'post',
                dataType: 'json',
                data: {
                    nome: "Lucia",
                    endereco:"Avenida",
                    numero:"1232"
                },
                
            })

            .done(function(s) {
                if (s == 1) {
                }
                if (s == 0) {
                    $('#email_ja_cadastrado').show();
                }
            })
            .fail(function(e) {
                alert("Os dados não foram enviados");
            })
            .always(function(c) {
                
                // console.log(c);
            });
        }
        event.preventDefault();
    });
});    
</script>

@endsection