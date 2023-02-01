<?php
    $pgs = ceil($qtd[0] / 60);
    $i = 1;
    if ($pgs > 1){
        echo    "<div class='paginas'>";
        while ($i <= $pgs){
            echo    "<a href='alimentos.php?page=" . $i . "&pqo=" . $pesquisa . "&clo=" . $classe . "'>
                        <p class='paginas' style='text-decoration: underline;'>" . $i . "</p>
                    </a>";

            if ($i != $pgs){
                echo    "<p class='paginas'> ・ </p>";
            }
            $i++;
        }
        echo    "</div>";
    }
?>