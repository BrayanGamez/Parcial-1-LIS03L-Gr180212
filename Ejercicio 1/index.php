<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
    <title>Calculadora de Divisas</title>
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF'];?>" class="container" method="POST">
        <div class="title">
            <u class="title-text">Calculadora de Divisas</u>
            <img src="img/iconTitle.png" alt="icon-title" class="iconTitle">
        </div>
        <div class="container-convert">
            <input type="text" name="cant" class="inputCant" placeholder="Ingrese una cantidad">
            <select  class="type1" name="select" >
                <option value="dolar">Dolares Americanos</option>
                <option value="euro">Euros</option>
                <option value="yen">Yen Japones</option>
                <option value="libra">Libras Esterlinas</option>
            </select>
            <div class="icon-convert" title="Convertir Moneda"></div>
            <select class="type2" name="select2">
                <option value="dolar">Dolares Americanos</option>
                <option value="euro">Euros</option>
                <option value="yen">Yen Japones</option>
                <option value="libra">Libras Esterlinas</option>
            </select>
        </div>
        <input type="submit" name="Enviar" onclick="viewResult()" value="send">
    </form>
    <?php
    if (isset($_POST['Enviar']) && $_POST['Enviar']=="send") 
    {
        $outPut= 0;
        if ($_POST['cant'] != "" && $_POST['cant']>0)
         {
            $cant = $_POST['cant'];
            $select1 = $_POST['select'];
            $select2 = $_POST['select2'];
            switch ($select1)
           {
                case 'dolar':
                   switch ($select2)
                    {
                        case 'euro':
                            $outPut = $cant*0.83;
                            break;
        
                        case 'yen':
                            $outPut = $cant*105.65;
                            break;
        
                        case 'libra':
                            $outPut = $cant*0.72;
                            break;
                    } 
                break;
            
                case 'euro':
                    switch ($select2) {
                        case 'dolar':
                            $outPut = $cant*0.83;
                            break;
        
                    case 'yen':
                        $outPut = $cant*127.80;
                            break;
        
                    case 'libra':
                        $outPut = $cant*0.87;
                            break;     
                    } 
                break;

                case 'yen':
                    switch ($select2) {
                        case 'euro':
                            $outPut = $cant*0.0078;
                            break;
        
                    case 'dolar':
                            $outPut = $cant*0.0095;
                            break;
        
                    case 'libra':
                           $outPut = $cant*0.0068;
                            break; 
                    } 
                break;

                case 'libra':
                    switch ($select2) {
                        case 'euro':
                        $outPut = $cant*1.16;
                            break;
        
                    case 'yen':
                        $outPut = $cant*147.66;
                            break;
        
                    case 'dolar':
                        $outPut = $cant*1.40;
                            break;
                    } 
                break;
            }
            echo "<div class=\"container2\">";
       echo  "<div class=\"table\">";
       echo  "<h2 class=\"thead\">Resultado de la Conversion</h2>";
        echo "<p class =\"row\" style=\"justify-content: center;color: black ;font-size: 40px;font-family: 'Anton';
        border: 1px solid black;\"> "+$outPut+"</p>";
        echo "</div>";
        }
    }
    ?>
    </div>
    <script src="js/buton.js"></script>
</body>
</html>