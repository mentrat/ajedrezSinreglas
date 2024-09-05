<!DOCTYPE html>
<html>

<head>
    <title>Tablero de Ajedrez</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js.js" defer></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <table>
        <?php
        $piezas_negras = [
            1 => 'fa-chess-rook',    // Torre en la columna 1
            2 => 'fa-chess-knight',  // Caballo en la columna 2
            3 => 'fa-chess-bishop',  // Alfil en la columna 3
            4 => 'fa-chess-king',    // Rey en la columna 4
            5 => 'fa-chess-queen',   // Reina en la columna 5
            6 => 'fa-chess-bishop',  // Alfil en la columna 6
            7 => 'fa-chess-knight',  // Caballo en la columna 7
            8 => 'fa-chess-rook'     // Torre en la columna 8
        ];

        $piezas_blancas = $piezas_negras;

        for ($fila = 8; $fila >= 1; $fila--) {
            echo '<tr>';
            for ($columna = 1; $columna <= 8; $columna++) {
                $color = ($fila + $columna) % 2 === 0 ? 'blanco' : 'negro';
                echo '<td class="' . $color . '">';

                if ($fila === 8 && isset($piezas_negras[$columna])) {
                    echo '<i class="fa-solid ' . $piezas_negras[$columna] . ' pieza"></i>';
                } elseif ($fila === 7) {
                    echo '<i class="fas fa-chess-pawn pieza"></i>';
                }

                if ($fila === 1 && isset($piezas_blancas[$columna])) {
                    echo '<i class="fa-solid ' . $piezas_blancas[$columna] . ' pieza" style="color: #fff;"></i>';
                } elseif ($fila === 2) {
                    echo '<i class="fas fa-chess-pawn pieza" style="color: #fff;"></i>';
                }

                echo '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>

</html>
