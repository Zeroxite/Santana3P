<!DOCTYPE html>
<html>
  <head>
    <title>Contact us</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      * {
      box-sizing: border-box;
      }
      html, body {
      min-height: 100vh;
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px; 
      color: #666;
      }
      input, textarea { 
      outline: none;
      }
      body {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      background: #5a7233;
      }
      h1 {
      margin-top: 0;
      font-weight: 500;
      }
      form {
      position: relative;
      width: 80%;
      border-radius: 30px;
      background: #fff;
      }
      .form-left-decoration,
      .form-right-decoration {
      content: "";
      position: absolute;
      width: 50px;
      height: 20px;
      border-radius: 20px;
      background: #5a7233;
      }
      .form-left-decoration {
      bottom: 60px;
      left: -30px;
      }
      .form-right-decoration {
      top: 60px;
      right: -30px;
      }
      .form-left-decoration:before,
      .form-left-decoration:after,
      .form-right-decoration:before,
      .form-right-decoration:after {
      content: "";
      position: absolute;
      width: 50px;
      height: 20px;
      border-radius: 30px;
      background: #fff;
      }
      .form-left-decoration:before {
      top: -20px;
      }
      .form-left-decoration:after {
      top: 20px;
      left: 10px;
      }
      .form-right-decoration:before {
      top: -20px;
      right: 0;
      }
      .form-right-decoration:after {
      top: 20px;
      right: 10px;
      }
      .circle {
      position: absolute;
      bottom: 80px;
      left: -55px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #fff;
      }
      .form-inner {
      padding: 40px;
      }
      .form-inner input,
      .form-inner textarea {
      display: block;
      width: 100%;
      padding: 15px;
      margin-bottom: 10px;
      border: none;
      border-radius: 20px;
      background: #d0dfe8;
      }
      .form-inner textarea {
      resize: none;
      }
      button {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      border-radius: 20px;
      border: none;
      border-bottom: 4px solid #3e4f24;
      background: #5a7233; 
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      }
      
      button:hover {
      background: #3e4f24;
      } 
      a {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      border-radius: 20px;
      border: none;
      border-bottom: 4px solid #3e4f24;
      background: #5a7233; 
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      }
      a:hover {
      background: #3e4f24;
      }
      @media (min-width: 568px) {
      form {
      width: 60%;
      }
      
      }
    </style>
  </head>
  <body>
    <form method= "POST" class="decor">
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>ChatBot</h1>
        <?php
    require '..\..\..\vendor\autoload.php';

    use Orhanerday\OpenAi\OpenAi;

    if(isset($_POST['btnEnviar'])){
    
    $open_ai_key = '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';
    
    $open_ai = new OpenAi($open_ai_key);
    
    $prompt = $_POST['txtMensaje'];
    
    $complete = $open_ai->completion([
        'model' => 'text-davinci-003',
        'prompt' => $prompt,
        'temperature' => 0.9,
        'max_tokens' => 300,
        'frequency_penalty' => 0,
        'presence_penalty' => 0.6,
    ]);
    
    $response = json_decode($complete, true);
    $response = $response["choices"][0]["text"];
    echo '<textarea placeholder="Mensaje..." name='.$response.' rows="10">'.$response.'</textarea>';
  }
    ?>
        <textarea placeholder="Mensaje..." name="txtMensaje" rows="5"></textarea>
        <button type="submit" name="btnEnviar">Enviar</button>
        <a href="../../../ticket/index.php">Crear ticket</a>
        <a href="../../../index.php">Volver</a>
        <!--<button type="ticket" href="..\..\..\ticket\index.php">Crear ticket</button>
        <button type="back" href="..\..\..\index.php">Regresar</button> -->
      </div>
    </form>
  </body>
</html>
