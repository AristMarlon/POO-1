<?php  
class Gato {
    public $tablero;
    public $turno;

    public function __construct() {
        $this->tablero = array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0));
        $this->turno = 1; // Comienza el primer jugador
    }

    public function realizarMovimiento($fila, $columna) {
        if ($this->tablero[$fila][$columna] == 0) {
            $this->tablero[$fila][$columna] = $this->turno;
            $this->turno = ($this->turno == 1) ? 2 : 1; // Cambia el turno
            return true; // Movimiento válido
        } else {
            return false; // Movimiento inválido
        }
    }

    public function esGanador($jugador) {
        for ($i = 0; $i < 3; $i++) {
            if ($this->tablero[$i][0] == $jugador && $this->tablero[$i][1] == $jugador && $this->tablero[$i][2] == $jugador) {
                return true; // Filas
            }
            if ($this->tablero[0][$i] == $jugador && $this->tablero[1][$i] == $jugador && $this->tablero[2][$i] == $jugador) {
                return true; // Columnas
            }
        }
        if ($this->tablero[0][0] == $jugador && $this->tablero[1][1] == $jugador && $this->tablero[2][2] == $jugador) {
            return true; // Diagonal principal
        }
        if ($this->tablero[0][2] == $jugador && $this->tablero[1][1] == $jugador && $this->tablero[2][0] == $jugador) {
            return true; // Diagonal secundaria
        }
        return false; // No hay ganador
    }

    public function esEmpate() {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($this->tablero[$i][$j] == 0) {
                    return false; // Todavía hay movimientos disponibles
                }
            }
        }
        return true; // Es un empate
    }
}

$gato = new Gato();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fila = $_POST["fila"];
    $columna = $_POST["columna"];

    if ($gato->realizarMovimiento($fila, $columna)) {
        if ($gato->esGanador(1)) {
            echo "¡Jugador 1 ha ganado!";
        } elseif ($gato->esGanador(2)) {
            echo "¡Jugador 2 ha ganado!";
        } elseif ($gato->esEmpate()) {
            echo "¡Empate!";
        }
    } else {
        echo "Movimiento inválido. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Juego del Gato</title>
</head>
<body>
    <h1>Juego del Gato</h1>
    <h2>Turno del Jugador <?php echo $gato->turno; ?></h2>

    <table border="1">
        <?php
        $tablero = $gato->tablero;
        for ($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 3; $j++) {
                echo "<td>";
                if ($tablero[$i][$j] == 1) {
                    echo "X";
                } elseif ($tablero[$i][$j] == 2) {
                    echo "O";
                } else {
                    echo "<form method='post'><input type='hidden' name='fila' value='$i'><input type='hidden' name='columna' value='$j'><input type='submit' value=''></form>";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
