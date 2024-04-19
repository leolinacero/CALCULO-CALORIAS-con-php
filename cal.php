<!DOCTYPE html>
<html>
<head>
    <title>Calorias Diarias</title>
</head>
<body>
    
       

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso_kg = $_POST["peso"];
        $actividad = $_POST["actividad"];
        $objetivo = $_POST["objetivo"];
        $biotipo = $_POST["biotipo"];
        $kcal_min = 0;
        $kcal_max = 0;

        // Convertir peso de kg a libras
        $peso_libras = $peso_kg * 2.20462;

        // Calcular rango de Kcal
        if ($objetivo == "Rebajar") {
            if ($actividad == "Sedentario") {
                $kcal_min = $peso_libras * 10;
                $kcal_max = $peso_libras * 12;
            } elseif ($actividad == "Moderado") {
                $kcal_min = $peso_libras * 12;
                $kcal_max = $peso_libras * 14;
            } elseif ($actividad == "Muy_activo") {
                $kcal_min = $peso_libras * 14;
                $kcal_max = $peso_libras * 16;
            }
        } elseif ($objetivo == "Mantener") {
            if ($actividad == "Sedentario") {
                $kcal_min = $peso_libras * 12;
                $kcal_max = $peso_libras * 14;
            } elseif ($actividad == "Moderado") {
                $kcal_min = $peso_libras * 14;
                $kcal_max = $peso_libras * 16;
            } elseif ($actividad == "Muy_activo") {
                $kcal_min = $peso_libras * 16;
                $kcal_max = $peso_libras * 18;
            }
        } elseif ($objetivo == "Aumentar") {
            if ($actividad == "Sedentario") {
                $kcal_min = $peso_libras * 16;
                $kcal_max = $peso_libras * 18;
            } elseif ($actividad == "Moderado") {
                $kcal_min = $peso_libras * 18;
                $kcal_max = $peso_libras * 20;
            } elseif ($actividad == "Muy_activo") {
                $kcal_min = $peso_libras * 20;
                $kcal_max = $peso_libras * 22;
            }
        }
        // Calcular distribución de macros
        if($biotipo == "Ectomorfo"){
            $carbohidratos_min = ($kcal_min * 0.5) / 4;
            $carbohidratos_max = ($kcal_max * 0.5)/ 4;
            $proteinas_min = ($kcal_min * 0.25) / 4;
            $proteinas_max = ($kcal_max * 0.25) / 4;
            $grasas_min = ($kcal_min * 0.2) / 9;
            $grasas_max = ($kcal_max * 0.2) / 9;

        }elseif($biotipo == "Mesomorfo"){
            $carbohidratos_min = ($kcal_min * 0.4) / 4;
            $carbohidratos_max = ($kcal_max * 0.4)/ 4;
            $proteinas_min = ($kcal_min * 0.3) / 4;
            $proteinas_max = ($kcal_max * 0.3) / 4;
            $grasas_min = ($kcal_min * 0.3) / 9;
            $grasas_max = ($kcal_max * 0.3) / 9;
        }elseif($biotipo == "Endomorfo"){
            $carbohidratos_min = ($kcal_min * 0.2) / 9;
            $carbohidratos_max = ($kcal_max * 0.2)/ 9;
            $proteinas_min = ($kcal_min * 0.3) / 9;
            $proteinas_max = ($kcal_max * 0.3) / 9;
            $grasas_min = ($kcal_min * 0.35) / 4;
            $grasas_max = ($kcal_max * 0.35) / 4;
        }

        
        

        



        // Mostrar resultados
        echo "<h1><strong>Calculo de Calorias:</strong></h1>";
        echo "<p> Dietetica y Nutrición </p>";

        echo "<p> <strong>Peso en Kg:</strong>" .$peso_kg."</p>";
        echo "<p><strong>Peso en libras: </strong>" . $peso_libras . "</p>";
        echo "<p><strong> El peso en Kcal:</strong>" . $kcal_min ."(min)/" . $kcal_max ."(max)";

       
        echo "<p>Distribución de macronutrientes:</p>";
        echo "<ul>";
        echo "<li>Carbohidratos: " . $carbohidratos_min . " (min)/" . $carbohidratos_max . " (max)</li>";
        echo "<li>Proteínas: " . $proteinas_min . " (min)/ " . $proteinas_max . " (max)</li>";
        echo "<li>Grasas: " . $grasas_min . " (min)/" . $grasas_max . " (max)</li>";
        echo "</ul>";
    }
    ?>
</body>
</html>