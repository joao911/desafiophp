 <?php 
if(isset($_GET['id'])){
    $test = file_get_contents('compras.json');
    //decodando arquivo compras.json
    $decodando =json_decode($test,true);;
    $chave = $_GET['id'];
    $produto = $decodando['listasCompras'][$chave]; 
  }else{
      header('location:form.php');
  }
  ?>
 <!doctype html>
 <html lang="en">

 <head>
     <title>Title</title>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>

 <body>
     <div class="container">
         <div class="card">
             <div class="button"> <a class="btn btn-light" href="form.php">voltar para lista de produtos</a></div>
             <div class="row">
                 <div class="imagem col-md-5 d-flex justify-content-center">
                     <img class="img-fluid" src="<?php echo isset($produto)?$produto['foto']:''?>"
                         alt="a imagem está aki">
                 </div>
                 <div class="descricao col-md-7">
                     <h1><?php echo isset($produto)?$produto['nome']:''?></h1>
                     <h3>categoria</h3>
                     <p><?php echo isset($produto)?$produto['select']:''?></p>
                     <h3>Descrição</h3>
                     <p><?php echo isset($produto)?$produto['descricao']:''?></p>
                     <div class="row">
                         <div class="qtd col-md-6">
                             <h3>Quantidade em estoque</h3>
                             <p><?php echo isset($produto)?$produto['qtd']:''?></p>
                         </div>
                         <div class="preco col-md-6">
                             <h3>preço</h3>
                             <p><?php echo isset($produto)?$produto['preco']:''?></p>
                         </div>
                     </div>
                     <h3></h3>
                 </div>
             </div>
         </div>
     </div>
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
         integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
         integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
     </script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
         integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
     </script>
 </body>

 </html>