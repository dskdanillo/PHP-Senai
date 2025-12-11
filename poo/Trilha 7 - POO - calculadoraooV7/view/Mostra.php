

            <?php
            final class Mostra
            {
                public function exibirResultado(?string $er, string $oper, ?float $v1, ?float $v2, ?float $resultado): void
                {

                    echo "<h1>Resultado</h1>";

                    if (!empty($er)) {
                        echo '<p class="error">' . htmlspecialchars($er, ENT_QUOTES, 'UTF-8') . '</p>';
                        echo '<a href="../view/index.html"><button>Voltar</button></a>';
                    } else {

                        echo '<p>Operação: <strong>' . htmlspecialchars($oper, ENT_QUOTES, 'UTF-8') . '</strong></p>';
                        echo '<p>' . htmlspecialchars($v1, ENT_QUOTES, 'UTF-8') . ' ';

                        switch ($oper) {
                            case 'somar':
                                echo '+';
                                break;
                            case 'subtrair':
                                echo '-';
                                break;
                            case 'multiplicar':
                                echo '×';
                                break;
                            case 'dividir':
                                echo '÷';
                                break;
                        }

                        echo ' ' . htmlspecialchars($v2, ENT_QUOTES, 'UTF-8');
                        echo ' = <strong>' . htmlspecialchars($resultado, ENT_QUOTES, 'UTF-8') . '</strong></p>';

                        echo '<a href="../view/index.html"><button>Voltar</button></a>';
                    }
                }
            }
            ?>