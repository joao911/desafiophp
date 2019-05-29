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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="estilo/estillo.css">
    <title>Document</title>
</head>

<body>
    <div class="tudo">
        <?php if(file_exists("compras.json")){?>
        <div>
        <h1>Produtos Cadastrados</h1>
        <table class="col-md-6 table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($decodando as $key =>$valeu){
                    foreach($valeu as $chave=>$dados){
                    ?>
                <tr>
                    <td><a href="template.php?id=<?php echo $chave?>"><?php echo $dados['nome']?></a></td>
                    <td><?php echo $dados['select']?></td>
                    <td><?php echo $dados['descricao']?></td>
                    <td><?php echo $dados['qtd']?></td>
                    <td><?php echo $dados['preco']?></td>
                </tr>
                <?php }};?>
            </tbody>
        </table>
        </div>
        <?php } else { ?>
        <h2>ainda não foram cadastrados produtos</h2>
        <?php } ?>
        <form action="validar.php" method="post" enctype="multipart/form-data">
            <h2>Cadastrar Produto</h2>
            nome:<br>
            <input type="text" name="nome" id="nome"class="nome"><br>
            Categoria<br>
            <select name="select" class="select" id="select">
                <option value="" disabled selected>selicione uma categoria</option>
                <option value="1" name="Premium">calça</option>
                <option value="2" name="Polonia">Camiseta</option>
                <option value="3" name="Media">Média</option>
                <option value="4" name="Finlandesa">Finlandesa</option>
                <option value="5" name="França">França</option>
                <option value="6" name="Povao">Povão</option>
            </select><br>
            Descrição:<br>
            <input type="text" name="descricao" class="descricao" id="descricao"><br>
            Quantidade<br>
            <input type="number" name="qtd" class="qtd" id="qtd"><br>
            Preço:<br>
            <input type="number" name="preco" class="preco" id="preco"><br><br>
            <input type="file" name="foto" id="[foto]"><br>
            <button type="submit" class="buttom">Enviar</button><br>
        </form>
    </div>
    </div>
    <script>
        let form = document.querySelector("form");
        let inputs = document.querySelectorAll("input");
        let button = document.querySelector("button");
        form.onsubmit = function (e) {
            e.preventDefault();
            numeroPreenchido = 0;
            for (input of inputs) {
                if (input.value == "") {
                    input.style.border = "1px solid red";
                    input.setAttribute("placeholder", "Preencha este campo");
                } else {
                    numeroPreenchido++;
                }
            }
            if (numeroPreenchido === inputs.length) {
                form.submit();
            }
        }
    </script>

</body>

</html>