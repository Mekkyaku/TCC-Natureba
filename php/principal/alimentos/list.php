<?php
    $i = 4;
    $y = 0;

    while ($holder_flame = mysqli_fetch_assoc($cleitom)){
        $vrf = $i % 4;

        if ($vrf == 0){
            echo    "<div style='display: flex; justify-content: space-between; margin-top: 32px; width: 100%'>";
        }

        echo    "<div class='alimento' onclick='showInfo(" .  $holder_flame["ID"] . ")'>
                    <div class='a-head' style='background-image: url(../../../img/alimento/" . $holder_flame["Imagem"] . ");'></div>
                    <div class='a-foot'>
                        <p class='alimento'>" . $holder_flame["Nome"] . "</p>
                    </div>
                </div>";

        if ($vrf == 3){
            echo    "</div>";
        }

        $i++;
        $y = 1;
    }

    if ($y == 1){
        $ghost = 3 - $vrf;
        while ($ghost != 0){
            echo    "<div class='alimento' style='visibility: hidden;'>
                        <div class='a-head' style='background-image: url(../../../img/alimento/no-image.png);'></div>
                        <div class='a-foot'>
                            <p>Placeholder</p> 
                        </div>
                    </div>";

            if ($ghost == 1){
                echo "</div>";
            }
            $ghost--;
        }
    }
    else if ($y == 0){
        echo    "<div style='margin-left: auto; margin-right: auto; width: fit-content;'>
                    <p>Nenhum alimento encontrado</p>
                </div>";
    }
?>


    
</div>