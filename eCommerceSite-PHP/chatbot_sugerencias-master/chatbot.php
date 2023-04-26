<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            display: flex;
        
            justify-content: center;
        
        }
        form{
            display: flex;
            flex-flow: wrap column;
            
        }
    #txtMensaje{
        
    }
    </style>
</head>
<body>
    <h2></h2>
    <form action="" method="post">
    
	<input type="textarea" name="txtMensaje" id="txtMensaje" placeholder="Ingresar ID de proveedor" autocomplete="off" style='width:20%'><br>
    <input type="submit" value="EnviarBuscar" name="btnEnviar">
    </form>

    <?php
    /*$salida = '';
    if(isset($_POST["btnEnviar"])){
        $mensaje = $_POST["txtMensaje"];
        if(!empty($mensaje)){
            exec("python3 chatbot.py '$mensaje'", $salida);
            $respuesta = $salida;
            if(!empty($respuesta)){
                echo "<h2 id='output'>" . $respuesta . "</h2>";
            }
        }
    } */
require '..\vendor\autoload.php';

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = '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';

$open_ai = new OpenAi($open_ai_key);

$prompt = $_POST['txtMensaje'];
if($prompt != ''){
$complete = $open_ai->completion([
    'model' => 'text-davinci-003',
    'prompt' => $prompt,
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);

$response = json_decode($complete, true);
$response = $response["choices"][0]["text"];
echo $response;
}
?>


</body>
</html>