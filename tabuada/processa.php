<?php
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero = $_POST["numero"] ?? "";

    if (is_numeric($numero)) {
        $resultado .= "<h2>Tabuada do $numero</h2>";
        $resultado .= "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse; text-align: center;'>";

        for ($i = 1; $i <= 10; $i++) {
            $multiplicacao = $numero * $i;
            $resultado .= "
                <tr>
                    <td>$numero</td>
                    <td>x</td>
                    <td>$i</td>
                    <td>= $multiplicacao</td>
                </tr>";
        }

        $resultado .= "</table>";
    } else {
        $resultado = "<p style='color:red;'>Por favor, digite um número válido.</p>";
    }

    echo $resultado;
}
?>
