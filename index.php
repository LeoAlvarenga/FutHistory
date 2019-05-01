<?php
	
	include_once("conexao.php");
	
	$consulta = "SELECT * FROM produtos";
	$resultado_produtos = mysqli_query($conn, $consulta);
	$resultado_categoria = mysqli_query($conn, "SELECT * FROM categoria");
	

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<style>
			#social ul li {display: inline;}
	</style>

    <title>Futhistory</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Futhistory</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Quem Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contato.php">Contato</a>
            </li>
            <li class="nav-item">
              <form target="pagseguro" action="https://pagseguro.uol.com.br/security/webpagamentos/webpagto.aspx" method="post">
				<input type="hidden" name="email_cobranca" value="leo.alvarenga08@hotmail.com" />
				<input type="hidden" name="tipo" value="VER" />
				<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/99x61-carrinho-cinza-assina.gif" name="submit" alt="Visualizar carrinho de compras" />
				</form>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <img src="img/logo.PNG">
          <div class="-listgroup">
			<?php 
				$read_categoria = mysqli_query($conn, "SELECT * FROM categoria ");
				if(mysqli_num_rows($read_categoria)> '0'){
					foreach($read_categoria as $read_categoria_view){
						echo utf8_encode('<a href= "index.php?cat='.$read_categoria_view['categoria_id'].'" class="list-group-item">'.$read_categoria_view['nome_categoria'].'</a>');
					}
				}
			?>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">
				<?php 
					if(isset($_GET['cat']) && $_GET['cat'] != '' ){
						$id_cat = addslashes($_GET['cat']);
						$sql_categoria = "AND produto_cat ='".$id_cat."'";
					}else{
						$sql_categoria = "";
					}
					$read_produto = mysqli_query($conn, "SELECT * FROM produtos WHERE codProduto != '' {$sql_categoria}");
					if(mysqli_num_rows($read_produto) > '0'){
						foreach($read_produto as $read_produto_view){
							
				?>
				<div class="col-lg-4 col-md-6 mb-4">
				  <div class="card h-100">
					<a href="produto.php?id_produto=<?php echo $read_produto_view['codProduto'];?>"><img class="card-img-top" src=<?php echo $read_produto_view['img']; ?> alt=""></a>
					<div class="card-body">
					  <h4 class="card-title">
						<a href="produto.php?id_produto=<?php echo $read_produto_view['codProduto'];?>"><?php echo $read_produto_view['nomeProduto']; ?></a>
					  </h4>
					  <h5>R$ <?php echo number_format($read_produto_view['preco'], 2,".",","); ?></h5>
					  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
					</div>
				  </div>
				</div>
				<?php 
						}
					}
				?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; EsporteWeb 2018</p>
		<nav id="social">
		<ul>
					<li><a href="http://facebook.com/futhistory"><img src="img\produtos\facebook.png"></a></li>
					<li><a href="http://twitter.com/futhistory"><img src="img\produtos\twitter.png"></a></li>
					<li><a href="http://plus.google.com/futhistory"><img src="img\produtos\googleplus.png"></a></li>	
		</ul>
		</nav>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
