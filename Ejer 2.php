<?php

//Marlon Aristimuño___ 31.898.731

class Rectangulo {
    public $x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4;

    public function establecer($x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4) {
        $this->x1 = $x1;
        $this->y1 = $y1;
        $this->x2 = $x2;
        $this->y2 = $y2;
        $this->x3 = $x3;
        $this->y3 = $y3;
        $this->x4 = $x4;
        $this->y4 = $y4;
    }

    public function calcularLongitud() {
        return max(abs($this->x2 - $this->x1), abs($this->x4 - $this->x3));
    }

    public function calcularAncho() {
        return max(abs($this->y3 - $this->y1), abs($this->y4 - $this->y2));
    }

    public function calcularPerimetro() {
        $longitud = $this->calcularLongitud();
        $ancho = $this->calcularAncho();
        return 2 * ($longitud + $ancho);
    }

    public function calcularArea() {
        $longitud = $this->calcularLongitud();
        $ancho = $this->calcularAncho();
        return $longitud * $ancho;
    }

    public function esCuadrado() {
        $longitud = $this->calcularLongitud();
        $ancho = $this->calcularAncho();
        return $longitud === $ancho;
    }
}

$rectangulo = new Rectangulo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x1 = floatval($_POST["x1"]);
    $y1 = floatval($_POST["y1"]);
    $x2 = floatval($_POST["x2"]);
    $y2 = floatval($_POST["y2"]);
    $x3 = floatval($_POST["x3"]);
    $y3 = floatval($_POST["y3"]);
    $x4 = floatval($_POST["x4"]);
    $y4 = floatval($_POST["y4"]);

    $rectangulo->establecer($x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4);
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
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            margin: 20px auto;
            width: 300px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"] {
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
            color: #333;
        }

        p {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Calculadora de Rectángulo</h1>
    <form method="post">
        Coordenada 1 (X, Y): <input type="text" name="x1" value="<?php echo $rectangulo->x1; ?>">, <input type="text" name="y1" value="<?php echo $rectangulo->y1; ?>"><br>
        Coordenada 2 (X, Y): <input type="text" name="x2" value="<?php echo $rectangulo->x2; ?>">, <input type="text" name="y2" value="<?php echo $rectangulo->y2; ?>"><br>
        Coordenada 3 (X, Y): <input type="text" name="x3" value="<?php echo $rectangulo->x3; ?>">, <input type="text" name="y3" value="<?php echo $rectangulo->y3; ?>"><br>
        Coordenada 4 (X, Y): <input type="text" name="x4" value="<?php echo $rectangulo->x4; ?>">, <input type="text" name="y4" value="<?php echo $rectangulo->y4; ?>"><br>
        <input type="submit" value="Calcular">
    </form>
    
    <h2>Resultados:</h2>
    <p>Longitud: <?php echo $rectangulo->calcularLongitud(); ?></p>
    <p>Ancho: <?php echo $rectangulo->calcularAncho(); ?></p>
    <p>Perímetro: <?php echo $rectangulo->calcularPerimetro(); ?></p>
    <p>Área: <?php echo $rectangulo->calcularArea(); ?></p>
    <p>¿Es un cuadrado? <?php echo $rectangulo->esCuadrado() ? "Sí" : "No"; ?></p>
</body>
</html>

