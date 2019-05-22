<?php

$nome  = $_POST['nome'];
$select = $_POST['select'];
$descricao = $_POST['descricao'];
$qtd = $_POST['qtd'];
$preco = $_POST['preco'];
$erros = [];
//extensoes aceitas 
$extensoesAceitas = ["image/jpeg"];
// o nome do arquivo
$nomeArquivo = $_FILES["foto"]["name"];
// aonde o arquivo esta temporariamente
$aquivoTmp = $_FILES["foto"]["tmp_name"];
//extensao do arquivo

$extensaoArquivo = $_FILES['foto']['type'];

// a onde eu quero salvar
$localSave = "save/$nomeArquivo";

if($_FILES['foto']['error'] !=  UPLOAD_ERR_OK){
echo "Deu um erro no arquivo";
}
if(array_search($extensaoArquivo, $extensoesAceitas)=== false){
    echo "Extensão  invalida";
    exit;
}
//Salvando de fato o arquivo
move_uploaded_file($aquivoTmp,$localSave);


function validarNome($nome){
    return strlen($nome)>0;
}
function validarSelect($select){
    return strlen($select)>0;
}
function validarDescricao($descricao){
    return strlen($descricao)>0;
}
function validarQtd($qtd){
    return strlen($qtd)>0;
}
function validarPreco($preco){
    return strlen($preco)>0;
}
function salvarCompras($arrayCompras){
    if(!file_exists('compras.json')){
        $compras ["listasCompras"] = [$arrayCompras];
        $jasonCompras = json_encode($compras);
        file_put_contents('compras.json',$jasonCompras);
    }else{
        $jasonCompras = file_get_contents('compras.json');
        $listraCompras =json_decode($jasonCompras,TRUE);
        $listraCompras["listasCompras"][] = $arrayCompras;
        $jasonCompras = json_encode($listraCompras);
        file_put_contents('compras.json',$jasonCompras);
        
    };
}
function validarDados($nome, $select, $descricao, $qtd, $preco){
    global $erros;
    if(!validarNome($nome)){
      array_push($erros,"Preencha seu nome corretamente");  
    }if (!validarSelect($select)){
        array_push($erros,"Selecione um dado");
    }if (!validarDescricao($descricao)){
        array_push($erros,"Preencha a descrição corretamente");
    }if (!validarQtd($qtd)){
        array_push($erros,"Preencha a quantidade corretamente");
    }if (!validarPreco($preco)){
        array_push($erros," O valor minimo é R$52");
    }
    if (count($erros)==0){
        salvarCompras($_POST);
    }
}
validarDados($nome,$select, $descricao, $qtd, $preco);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo/validar.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <?php if(count($erros)>0){?>
    <h2>Preencha os dados corretamente</h2>
    <ul>
    <?php foreach($erros as $key => $value ):?>
    <li><?php echo $value?></li>
    <?php endforeach?>
    </ul>
    <?php } else {?>
    <div class="container">
        <div class="principal">
            <div class="foto">
                <div class="voltar">
                    <i class="fas fa-arrow-left"></i> <a href="form.php">Voltar para lista de produtos</a>
                </div>
                <img src="<?php echo $localSave ?>" alt="imagem da cachaça">
            </div>    
            <div class="dados">
                    <h1><?php echo $nome?></h1>
                    <h2>Categoria</h2>
                    <h3><?php echo $select ?></h3>
                    <h2>Descrição</h2>
                    <h3><?php echo $descricao?></h3>    
                <div class="qtd">
                    <div>
                        <h2>Quantidade em estoque </h2>
                        <h3><?php echo $qtd?></h3>
                    </div>
                    <div class="p">
                        <h2>Preço</h2>
                        <h3><?php echo "R$ $preco"?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</body>
</html>

