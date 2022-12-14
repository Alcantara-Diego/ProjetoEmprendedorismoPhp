<?php



session_start();
ob_start();


include_once '../php/conexao.php';



?>


<!-- ------------------------------------------------------------------------------------------------- HTML-->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="user.css">
	<link
      href="https://fonts.googleapis.com/css?family=Inter&display=swap"
      rel="stylesheet"
    />

    <!-- FONT AWESOME BRAND TAGS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/brands.min.css"
      integrity="sha512-bSncow0ApIhONbz+pNI52n0trz5fMWbgteHsonaPk42JbunIeM9ee+zTYAUP1eLPky5wP0XZ7MSLAPxKkwnlzw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <!-- Script JAVASCRIPT para o carousel -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <title>WOLF FIT</title>

    <link rel="shortcut icon" href="../images/kisspng_gray_wolf_logo_mascot_clip_art_wolf_5ab4467dd78141_1.png" />


</head>

<body>


    <header>
        <p class="primeiroTitulo ">Ganhe 10% + FRETE GR??TIS na primeira compra com o cupom: BEMVINDO</p>
        <p class="segundoTitulo">
            Frete Gr??tis, vide as regras | 1?? Troca sem custo* | Entrega realizada em at?? 7 dias ??teis</p>

    </header>



   
    <!-- Barra de navega????o ------------------------------------------------------  Barra de navega????o    -->
    <nav>
    <div class="navContainer">
        <!-- Mobile Hamburguer -->
        <button id="hamburguerBtn" class="navBtn">
          <i class="fa fa-bars"></i>
        </button>

        <a href="../index.php" class="logoArea">
          <img
            src="../images/kisspng_gray_wolf_logo_mascot_clip_art_wolf_5ab4467dd78141_1.png"
            alt="Logo"
         
          />
          <span class="companyName">Wolf-Fit</span>
        </a>

        <div class="navMenu">
          <ul class="navItems">

            <li>
                <a href="../index.php">Home</a>
            </li>
            <li>
              <a href="../products/produtos.php">Produtos</a>
            </li>
            <li>
                <a href="../contato/contato.php">Contato</a>
            </li>

            <li>
                <a href="../sobre/sobre.php">Sobre</a>
            </li>
          </ul>

          <div class="navItems2">
            <button class="navBtn">
            <?php
                       if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
                         
                     
                        echo  '<a href="login.php"> <i class="fa fa-user"></i><span class="nav2ItemNome">Login</span></a>';
                      
                      } else {
                        echo  '<span class="menuItem"><a href="dashboard.php">Configura????es</a></span>';
          
                        echo    '<a href="sair.php">SAIR</a>';
                      
                                   
                      }
            ?>
            </button>
            <button id="abrirCarrinhoBtn" class="navBtn">
              <i class="fa fa-cart-shopping"></i>
              <span class="nav2ItemNome">Carrinho</span>
            </button>
          </div>
        </div>
      </div>
    </nav>
    <div id="botao__carinho" class="botao__carinho">
      <h3>Carrinho <i class="fa fa-cart-shopping"></i></h3>
      <button
        type="button"
        class="limparCarrinhoBtn"
        onclick=" localStorage.clear(); location.reload();"
      >
        Limpar
      </button>
      <button
        type="button"
        class="limparCarrinhoBtn"
        onclick=" location.reload();"
      >
        Atualizar
      </button>
      <div>Total R$: <span id="total"></span> </div>            
      <div id="botao__carinho___tabela">
      <div id="itens"> </div>
      <div class="total2">Total R$: <span id="total2"></span> 
      <input type="hidden" value="" id="total_full"></input></div>
        
      </div>

      

      

      <button id="fecharCarrinhoBtn"><i class="fa fa-close"></i></button>
    </div>


    <div class="loginArea">
      

    <section class="loginContainer">

<h1>Login</h1>


<form method="POST" action="">
    <label>Usu??rio:</label>
    <input type="email" name="usuario" placeholder="digite o e-mail"id="" value="<?php if(isset($dados['usuario']))
    {echo $dados['usuario']; } ?>">

    

    <label >Senha:</label>
    <input type="password" name="senha_usuario" placeholder="digite a senha"id="" value="<?php if(isset($dados['senha_usuario']))
    {echo $dados['senha_usuario'];} ?>">

    <br>
    <br>
    <?php
// exemplo criptografar a senha

// echo password_hash(123456, PASSWORD_DEFAULT)

?>

<?php

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados["SendCadastro"])){

  // echo "<pre>";
  // var_dump($dados);
  // echo "</pre>";
   
   header("Location: cadastro.php");
}

if(!empty($dados["SendLogin"])){

  //  echo "<pre>";
  //  var_dump($dados);
  //  echo "</pre>";




$query_usuario ="SELECT id, nome, cpf, usuario, senha_usuario, id_number
FROM usuarios 
WHERE usuario =:usuario
LIMIT 1";        

$result_usuario = $conn->prepare($query_usuario);
$result_usuario -> bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);         

$result_usuario -> execute();

if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
$row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
  
//  echo "<pre>";
//  var_dump($row_usuario);
//  echo "</pre>";


if(password_verify($dados["senha_usuario"], $row_usuario["senha_usuario"])){

    // echo "acessado";


    
    $_SESSION['id_number'] = $row_usuario['id_number'];
    $_SESSION['id'] = $row_usuario['id'];
    $_SESSION['nome'] = $row_usuario['nome'];
  
    

    header("Location: ../index.php");

}
else {
       $_SESSION['msg']= "<p style='color: #ff0000'> Erro; Senha inv??lida! </p>";
}


}
else {
$_SESSION['msg']= "<p style='color: #ff0000'> Erro; Usu??rio ou Senha inv??lida! </p>";
}

if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset ($_SESSION['msg']);
}

}


?>

    <div class="btnContainer">
      <input type="submit" value="Acessar" name="SendLogin">
      <input type="submit" value="Ainda n??o tenho uma conta" name="SendCadastro"  >
    </div>
</form>


</section>

  <div class="overlay"></div>
    </div>

    


    <!-- Footer -->
    <footer>
      <div class="cadastroEmail">
        <p>
          <i class="fas fa-envelope"></i> RECEBA OFERTAS E NOVIDADES POR E-MAIL:
        </p>

        <form>
          <input type="email" placeholder="E-mail" />
          <button class="cadastrarBtn">Cadastrar</button>
        </form>
      </div>

      <div class="creditos">
      
        <div class="extras">
          <h5>Extras</h5>
          <a href="https://www.instagram.com/wolffit848/" target="_blank"
            >Instagram <i class="fa-brands fa-instagram"></i
          ></a>
          <a href="../sobre/sobre.php"> Sobre N??s</a>
          <a href="../contato/contato.php">Fale Conosco</a>
        </div>

                    
        </div>
      </div>
      <div>Wolf-Fit suplementos LTDA??2022</div>
    </footer>


    <script src="../script/hamburguer.js"></script>

</body>

</html>