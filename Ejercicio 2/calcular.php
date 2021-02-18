<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de amortización</title>
    <link rel='stylesheet' href="css/money.css"/>
    
</head>
<body>
    
<p>
<a href="index.html"><button type="button">Regresar</button></a>
</body>
<?php
 $capitali=$_POST['importe'];
 $periodo=$_POST['periodo'];
 $plazo=$_POST['plazo'];
 $interes=$_POST['interes_input'];
date_default_timezone_set("America/El_Salvador");
$dia=$_POST['dia'];$mes=$_POST['mes'];$anio=$_POST['anio'];
$fecha=''.$dia.'-'.$mes.'-'.$anio;

$suma=strtotime("+  days",strtotime($fecha));
$amortizacion=$_POST['amortización'];


        echo	"<table>\n";
        echo	"<tr>";
        echo	"<th>Fecha</th><th>Cuota</th><th>Capital</th><th>Interes</th><th>Saldo</th>";
        echo "</thead>\n<tbody>\n";
if($amortizacion=="sistemasimple"){
    define('valori',$capitali);
    define('interes',$interes);
    echo "<br><b> Fecha del prestamo:</b> ".$fecha."<b> (interes simple)<br>";
    echo "<b>Monto: </b>$".$capitali."     <b>Interés:</b> $interes%<br>";
    echo "<b>Periodo: </b>".$periodo."      <b>Plazo: </b>$plazo";
    $capitafinal=($capitali*(1+($plazo*$interes/100)));
    $cuota=$capitafinal/$plazo;
    $capital=$capitali/$plazo;
   
    for($i=0; $i<$plazo;$i++){
      
        if($periodo=="diario"){
            $suma=strtotime("+ 1 days",strtotime($fecha));
        
        }
        else if($periodo=="semanal"){
            $suma=strtotime("+ 7 days",strtotime($fecha));
        
        }
        else if($periodo=="Quincenal"){
            $suma=strtotime("+ 15 days",strtotime($fecha));
        }
        
        else if($periodo=="mensual"){
            $suma=strtotime("+ 1 month",strtotime($fecha));
        }
        else {
            $suma=strtotime("+ 1 Year",strtotime($fecha));  
        }
        $fechanueva=date('d-m-Y',$suma);
        echo "<tr>";
        echo "<td>".$fechanueva."</td>";
        echo "<td>$".number_format($cuota,2)."</td>";
        echo "<td>$".number_format($capital,2)."</td>";
        echo "<td>$".number_format( (interes/100)*valori,2)."</td>";
        echo "<td>$".number_format( ($capitali-$capital),2)."</td>";
        echo "</tr>";
        $capitali=$capitali-$capital;
        $fecha=$fechanueva;
        
    }
    echo "</table>";
    echo "<br>";

}
else{
    define('capital',$capitali/$plazo);
    define('valorincial',$capitali);
    echo "<br><b> Fecha del prestamo:</b> ".$fecha."<b> (interes Compuesto)<br>";
echo "<b>Monto: </b>$".$capitali."     <b>Interés:</b> $interes%<br>";
echo "<b>Periodo: </b>".$periodo."      <b>Plazo: </b>$plazo";
    $x=1;
    for($i=1; $i<$plazo+1;$i++){
       
        $capitafinal1=valorincial*pow((1+($interes/100)),$i-1);
        $capitafinal2=valorincial*pow((1+($interes/100)),($i));
        $diferencia_capital=$capitafinal2-$capitafinal1;
        $capitaf=$capitali-capital;
        $fechanueva=date('d-m-Y',$suma);
        $x++;
        $saldo=$capitali-capital;
        $cuota=$diferencia_capital+capital;
       
        if($periodo=="diario"){
            $suma=strtotime("+ 1 days",strtotime($fecha));
        
        }
        else if($periodo=="semanal"){
            $suma=strtotime("+ 7 days",strtotime($fecha));
        
        }
        else if($periodo=="Quincenal"){
            $suma=strtotime("+ 15 days",strtotime($fecha));
        }
        
        else if($periodo=="mensual"){
            $suma=strtotime("+ 1 month",strtotime($fecha));
        }
        else {
            $suma=strtotime("+ 1 Year",strtotime($fecha));  
        }
        $fechanueva=date('d-m-Y',$suma);
        echo "<tr>";
        echo "<td>".$fechanueva."</td>";
        echo "<td>$".number_format($cuota,2)."</td>";
        echo "<td>$".number_format(capital,2)."</td>";
        echo "<td>$".number_format ($capitafinal2-$capitafinal1,2)."</td>";
        echo "<td>$".number_format( ($saldo),2)."</td>";
        echo "</tr>";
        $fecha=$fechanueva;
        $capitali=$capitali-capital;
    
        
    }
    echo "</table>";

}


/*
$suma=strtotime("+ 2 days",strtotime($fecha));

echo date('d-m-Y',$suma);
*/
?>

</html>