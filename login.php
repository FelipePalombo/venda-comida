<link rel="stylesheet" type="text/css" href="./css/login.css">

<div class="container login-container">    
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 login-form-1">
            <?php 
                if(isset($_GET['nologin'])){
                    echo "<h2><b>Necessário realizar o login!</b></h2><br>";
                }else if(isset($_GET['wronglogin'])){
                    echo "<h2>Senha ou usuário errado!</h2><br>";
                }
            ?>
            <h3>Login</h3>
            <form action="acao.login.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Seu usuário *" name="user" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Sua senha *" name="pass" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Entrar" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">Esqueceu a Senha? Uma pena...</a>
                </div>
            </form>
        </div>        
    </div>
</div>