<?

//Marlon Aristimuño___ 31.898.731

class Rectangulo {
    public $longitud = 1.0;
    public $ancho = 1.0;

    public function calcularPerimetro() {
        return 2 * ($this->longitud + $this->ancho);
    }

    public function calcularArea() {
        return $this->longitud * $this->ancho;
    }
}

$rectangulo = new Rectangulo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rectangulo->longitud = floatval($_POST["longitud"]);
    $rectangulo->ancho = floatval($_POST["ancho"]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Rectángulo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
            margin: 20px auto;
            width: 300px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="text"] {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0074d9;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056a5;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        p {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Calculadora de Rectángulo</h1>
    <form method="post">
        Longitud: <input type="text" name="longitud" value="<?php echo $rectangulo->longitud; ?>"><br>
        Ancho: <input type="text" name="ancho" value="<?php echo $rectangulo->ancho; ?>"><br>
        <input type="submit" value="Calcular">
    </form>
    
    <h2>Resultados:</h2>
    <p>Longitud: <?php echo $rectangulo->longitud; ?></p>
    <p>Ancho: <?php echo $rectangulo->ancho; ?></p>
    <p>Perímetro: <?php echo $rectangulo->calcularPerimetro(); ?></p>
    <p>Área: <?php echo $rectangulo->calcularArea(); ?></p>
</body>
</html>
