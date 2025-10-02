<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

?>
<!DocType html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <title>Dados Recebidos </title>
        <style>

                /*estilização dos dados recebidos*/
                body{
                    font-family: Arial, sans-serif;
                    background: rgba(111, 231, 231, 0.2);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height:100vh;
                }
                .resultado{

                    background:rgba(192, 99, 99, 0.2);
                    padding:20px;
                    border-radius:10px;
                    box-shadow:0 0 10px rgba(0,0,0,0.2);
                    width:350px;

                }
                h2{
                    text-align:center;
                    color:#333;
                }
                p{
                    margin:10px 0;
                    font-size:16px;
                }
                span{
                    font-weight: bold;
                    color: rgba(243, 146, 0, 0.93);

                }

        </style>
</head>
<body>
    <div class="resultado">
    <h2>Dados Recebidos</h2>
    <!--Use <span> quando quiser aplicar (CSS) em parte de um texto -->
    <p><span>Nome : </span><?php echo htmlspecialchars($nome);?></p>
    <p><span>Email : </span><?php echo htmlspecialchars($email);?></p>
    <p><span>Mensagem : </span><?php echo htmlspecialchars($mensagem);?></p>
      
    <?php echo "<br> <a href='index.html'>Voltar</a>";?>
      
      
 
    </div>
</body>
</html>


