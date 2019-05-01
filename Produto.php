<?php
	
	include_once("conexao.php");
	$id_produto = addslashes($_GET['id_produto']);
	$read_produto = mysqli_query($conn, "SELECT * FROM produtos WHERE codProduto = '".$id_produto."'");
	if(mysqli_num_rows($read_produto) > '0'){
		foreach($read_produto as $read_produto_view);
	}else{
		header("Location= index.php");
	}
						
	

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
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

          <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src=<?php echo $read_produto_view['img']; ?> alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $read_produto_view['nomeProduto'];?></h3>
              <h4>R$ <?php echo number_format($read_produto_view['preco'], 2,".",","); ?></h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
             
              <form target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
			  <input type="hidden" name="email_cobranca" value="leo.alvarenga08@hotmail.com" />
			  <input type="hidden" name="tipo" value="CBR" />
			  <input type="hidden" name="moeda" value="BRL" />
			  <input type="hidden" name="item_id" value="<?php echo $read_produto_view['codProduto']?>" />
			  <input type="hidden" name="item_descr" value="<?php echo $read_produto_view['nomeProduto']?>" />
			  <input type="hidden" name="item_quant" value="1" />
			  <input type="hidden" name="item_valor" value="<?php echo $read_produto_view['precoPag']?>" />
			  <input type="hidden" name="frete" value="0" />
			  <input type="hidden" name="peso" value="0" />
			  <input type="image" name="submit" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/99x61-comprar-assina.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
			</form>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

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
