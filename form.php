<?php 
if(file_exists('compras.json')){
$test = file_get_contents('compras.json');
//decodando arquivo compras.json
$decodando =json_decode($test,true);
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo/estillo.css">
    <title>Document</title>
</head>
<body>
<div class="tudo">
    <?php if(file_exists("compras.json")){?>
    <div>
        <h1>Produtos Cadastrados</h1>
            <div class="produtos">
                <div class="nome">
                    <h2>Nome</h2>
                    <?php foreach($decodando as $key =>$valeu){
                    foreach($valeu as $dados){
                    ?>
                    <p><?php echo $dados["nome"]?></p>            
                </div>
                <div class="nome">
                    <h2>Categoria</h2>
                    <p><?php echo $dados["select"]; ?></p>
                </div>
                <div class="nome">
                    <h2>Descrição</h2>
                    <p><?php echo $dados["descricao"]; ?></p>
                    
                </div>
                <div class="nome">
                    <h2>Quantidade</h2>
                    <p><?php echo $dados["qtd"]; ?></p>
    
                </div>
                <div class="nome">
                    <h2>Preço</h2>
                    <p><?php echo $dados["preco"]; ?></p>
                    <?php } }; ?> 
                </div>  
            </div>
         </div> 
                    <?php } else { ?>
                        <h2>ainda nãp foram cadastrados produtos</h2>
                    <?php } ?>
            <form action="validar.php" method="post" enctype="multipart/form-data">
                <h2>Cadastrar Produto</h2>
                nome:<br>
               <input type="text" name="nome" class="nome"><br>
                Categoria<br>
                <select name="select" class="select">
                    <option value="" disabled selected>selicione uma categoria</option>
                    <option value="Premium" name="Premium">Premium</option>
                    <option value="Polonia" name="Polonia">Polonia</option>
                    <option value="Média" name="Media">Média</option>
                    <option value="Finlandesa" name="Finlandesa">Finlandesa</option>
                    <option value="França" name="França">França</option>
                    <option value="Povao" name="Povao">Povão</option>
                </select><br>
                Descrição:<br>
                <input type="text" name="descricao" class="descricao"><br>
                Quantidade<br>
                <input type="number" name="qtd" class="qtd"><br>
                Preço:<br>
                <input type="number" name="preco" class="preco"><br><br>
                <input type="file" name="foto" id="[foto]"><br>
                <button type="submit" class="buttom">Enviar</button><br>
            </form>  
        </div> 
</div>  
    <script>
    let form = document.querySelector("form");
    let inputs = document.querySelectorAll("input");
    let button = document.querySelector("button");
    form.onsubmit = function(e){
        e.preventDefault();
        numeroPreenchido = 0;
        for (input of inputs){
            if(input.value == "" ){
                input.style.border = "1px solid red";
                input.setAttribute("placeholder", "Preencha este campo");
            } else {
                numeroPreenchido++;
            }
        }
        if(numeroPreenchido === inputs.length){
            form.submit();
        }
    }
            
    </script>
 
</body>
</html>