<?php 
include('config.php');
Site::updateUsuarioOnline();
Site::contadorVisitas();
?>
  <!DOCTYPE html>
  <html lang="pt-BR">
  <head>
      <link rel="stylesheet" href="css\style.css">

      <meta charset="UTF-8">  
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title> Projeto Superius </title>
  </head>
  <body style="background-image: url('imagens/background/bgnovo.png');">
       
          <header>
              <div class="media-top"></div>
              <nav>
                  <div class="nav-bar"></div>
                  <ul>
                      <li><a href="#" id="bHome">Home</a></li>
                      <li><a href="login.html" id="bLogin">Login</a></li>
                      <li><a href="¨#" id="bCarrinho">Carrinho</a></li>
                  </ul><!-- navegação -->
                  
                  <div class="nav-menu">
                  <input type="text" name="search-items" placeholder="Pesquisar por produto...">
                
                  </div><!-- nav-menu -->
                  <div class="logo" ><img src="imagens/logo.png" alt=""></div>
                  <div>
                  </div>
              </nav>
          </header>
          <div class="line-header">
              <div class="container">
              <div class="logo" ><img src="imagens/logo.png" alt=""></div>
              <form action=""><input type="text" name="search" placeholder="Digite o nome do Produto.." class="bSearch"></form>

              <div class="rigth-itens">
                  <div class="social-media">

                  </div><!-- social-media -->
                  <div class="navgation">
                      <a><img src="imagens\icones\search.webp" id="bSearch" alt=""></a>
                      <img href="login.html" src="imagens\icones\user.webp" alt="">
                      <img src="imagens\icones\cart.webp" alt="">
                  </div><!-- navigation -->
              </div><!-- rigth-itens -->
          </div><!-- container -->
          </div><!-- line-header -->
          <div class="container">     
              <div class="menu-mobile-wrapper">
                  <div class="menu-mobile-header">
                    <div class="menu-mobile-header-logo">
                      <a href="#"><img src="" alt=""></a>
                    </div>
                    <div class="menu-mobile-header-toggle">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                  </div>
                  
                  <div class="menu-mobile-content">
                    <div class="dropdown-wrapper">
                      <div class="dropdown-btn" id="bSobre"><img src="imagens/icones/a-studiopc-2.png" alt=""><p>Sobre</p></div>
                 
                    </div>
                    <div class="dropdown-wrapper">
                      <div class="dropdown-btn"><img src="imagens/icones/pecas-1.png" alt=""><p>Produtos</p></div>
                      <div class="dropdown-content">
                        <a href="#">Peças</a>
                        <a href="#">Periféricos</a>
                        <a href="#">Upgrade</a>
                      </div>
                    </div>
                    
                    <div class="dropdown-wrapper">
                      <div class="dropdown-btn" id="bComputadores"><img src="imagens/icones/pc-office.png" alt=""><p>Computadoes</p></div>
                    </div>
                    <div class="dropdown-wrapper">
                      <div class="dropdown-btn"><img src="imagens/icones/monteseupc-1.png" alt=""><p>Monte seu PC</p></div>
                      <div class="dropdown-content">
                        <a href="#">Opção 1</a>
                        <a href="#">Opção 2</a>
                        <a href="#">Opção 3</a>
                      </div>
                    </div>
                    <div class="dropdown-wrapper">
                      <div class="dropdown-btn" id="bContato"><img src="imagens/icones/pcs-gamers-2.png" alt=""><p>Contato</p></div>
                    </div>    
                  </div>
                  
                </div>

          </div><!-- container -->
          <div class="slider">
              <div class="slides">
                <video autoplay loop>
                  <source src="imagens/vídeos/video-banner.mp4" type="video/mp4">
                </video>
              </div>
          </div>
             <!--  <div class="controls">
                <div class="prev-slide">&#8249;</div>
                <div class="next-slide">&#8250;</div>
                <div class="dots"></div>
              </div> -->
            </div>


            <div class="container citens">
              <div class="item">
                <div id="img"> <img src="imagens/computers/computador-valorant.webp" alt=""></div>
                <div id="descricao"><p>Computador H-FIRE / i5 / 8GB DDR4 / SSD 240GB</p></div><!-- Descrição -->
                <div id="preco"><p>R$ 1000,00</p></div><!-- Preço -->
                <div id="sbProduto"><input type="button" value="COMPRAR"></div> <!-- comprar -->
              </div><!-- item -->

              <?php
  // Conecta ao banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "SUPERIUS";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verifica a conexão
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Consulta SQL SELECT
  $sql = "SELECT * FROM produtos WHERE sNmPreco = 1 ";
  $result = $conn->query($sql);

  // Exibe os resultados
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<div class='item'>";
      echo "<div id='img'><img src='".$row['sDsCaminho']."' alt=''></div>";
      echo "<div id='descricao'><p>".$row['sDsDescricao']."</p></div>";
      echo "<div id='preco'><p>R$ ".$row['sNmPreco']."</p></div>";
      echo "<div id='sbProduto'><input type='button' value='COMPRAR'></div>";
      echo "</div>";
    }
  } else {
    echo "Nenhum resultado encontrado.";
  }

  // Fecha a conexão
  $conn->close();
?>
              
              <!-- ATENÇÃO CHAT GPT É AQUI QUE EU QUERO ADICIONAR TUDO DENTRO DESSA DIV CONTAINER CITENS -->

            </div><!-- container -->

            <div class="bg-sobre">

              <div class="img-sobre"> <img src="imagens/logo.png"></div><!-- img-sobre -->
              <div class="content-sobre">
                <h1>Quem somos?</h1>  
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum facilis nam vero harum error, molestias alias excepturi perspiciatis illo sapiente deleniti mollitia! Labore inventore animi tempora praesentium aliquid eius quam?</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum facilis nam vero harum error, molestias alias excepturi perspiciatis illo sapiente deleniti mollitia! Labore inventore animi tempora praesentium aliquid eius quam?</p>
                <h2>Nós somos..</h2>
                <H2>  _.SUPERIUS. </H2>
              </div><!-- content-sobre -->
              </div><!--  bg-sobre -->

           <div class="container-contato">

            <div class="texto-contato">
              <h1>Fale</h1> <h1>conosco!</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut tenetur suscipit officiis. Facilis, excepturi qui quod vitae nisi, repudiandae laborum sequi incidunt repellat quam quisquam alias nostrum, magni consequatur. Ea.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut tenetur suscipit officadipisicing elit. Aut tenetur suscipit officiis. Facilis, excepturi qui quod vitae nisi, repudiandae laborum sequi incidunt repellat quam quisquam alias nostrum, magni consequatur. Ea.</p>
              <p><a href="">(21) 983172132</a></p> 
              <p><a href="">(21) 983172132</a></p><br>
              <h1>SUPE</h1> <h1>RIUS</h1>

            </div><!-- texto-contato -->
            <div class="form-contato">
              <form method="post" id="form-cont">

                <h2>Formulário de Contato</h2>

                <span>NOME*</span>
                <input type="text" name="nome" placeholder="Digite seu nome">
                <span>EMAIL*</span>
                <input type="text" name="email" placeholder="Digite seu email" required>
                <span>ASSUNTO*</span>
                <input type="text" name="texto" placeholder="Nome do assunto" required>
                <input type="submit" name="acao" value="Enviar">
              </form><!-- form-cont -->
            </div><!-- form-contato -->
           </div><!-- container-contato -->

           <footer>
            <div class="container c-footer">
              <h2>Todos os direitos reservados!</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti quidem expedita eius incidunt dicta libero eos dolor, quo illum pariatur animi nesciunt vero velit qui, voluptatibus rem veniam. Fuga, beatae!</p>
            </div>
          </footer>
  </body>
<!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="/ProjetoSuperius/jquery/jssocials.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="jquery/functions.js"></script>
  <script src="jquery/itens.js"></script>
  </html>