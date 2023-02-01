<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/profissionais/pesquisa.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/profissionais.css" rel="stylesheet">
        <link href="../../../css/pesquisa.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profissionais</title>
    </head>

    <body>
        <?php  
            include "../../../php/header/header.php";
        ?>

        <div class="body">
            <?php
                include "../../../php/side/side.php";
            ?>

            <div class="base" id="base" <?php if ($_SESSION["side"] == "FALSE"){ echo "style='margin-left: 96px;'";}?>>
                <div class="content">
                    <form action="profissionais.php" autocomplete="off" method="GET">
                        <div class="pesquisa">
                            <div style="width: 50%;">
                                <input class="pesquisa" name="pesquisa" placeholder="Pesquisar pelo perfil de um profissional" type="text" value="<?php echo $pesquisa?>">
                            </div>
                            <div style="margin-left: 8px; width: 30%;">
                                <input class="pesquisa" name="cidade" placeholder="Cidade do profissional" type="text" value="<?php echo $cidadep?>">
                            </div>
                            <div style="margin-left: 8px; width: 10%">
                                <select class="pesquisa" name="uf">
                                    <option disabled hidden selected>UF</option>
                                    <option value="">Vazio</option>
                                    <option value="AC" <?php if($ufp == "AC"){echo "selected";}?>>AC</option>
                                    <option value="AL" <?php if($ufp == "AL"){echo "selected";}?>>AL</option>
                                    <option value="AP" <?php if($ufp == "AP"){echo "selected";}?>>AP</option>
                                    <option value="AM" <?php if($ufp == "AM"){echo "selected";}?>>AM</option>
                                    <option value="BA" <?php if($ufp == "BA"){echo "selected";}?>>BA</option>
                                    <option value="CE" <?php if($ufp == "CE"){echo "selected";}?>>CE</option>
                                    <option value="DF" <?php if($ufp == "DF"){echo "selected";}?>>DF</option>
                                    <option value="ES" <?php if($ufp == "ES"){echo "selected";}?>>ES</option>
                                    <option value="GO" <?php if($ufp == "GO"){echo "selected";}?>>GO</option>
                                    <option value="MA" <?php if($ufp == "MA"){echo "selected";}?>>MA</option>
                                    <option value="MT" <?php if($ufp == "MT"){echo "selected";}?>>MT</option>
                                    <option value="MS" <?php if($ufp == "MS"){echo "selected";}?>>MS</option>
                                    <option value="MG" <?php if($ufp == "MG"){echo "selected";}?>>MG</option>
                                    <option value="PA" <?php if($ufp == "PA"){echo "selected";}?>>PA</option>
                                    <option value="PB" <?php if($ufp == "PB"){echo "selected";}?>>PB</option>
                                    <option value="PR" <?php if($ufp == "PR"){echo "selected";}?>>PR</option>
                                    <option value="PE" <?php if($ufp == "PE"){echo "selected";}?>>PE</option>
                                    <option value="PI" <?php if($ufp == "PI"){echo "selected";}?>>PI</option>
                                    <option value="RN" <?php if($ufp == "RN"){echo "selected";}?>>RN</option>
                                    <option value="RS" <?php if($ufp == "RS"){echo "selected";}?>>RS</option>
                                    <option value="RJ" <?php if($ufp == "RJ"){echo "selected";}?>>RJ</option>
                                    <option value="SC" <?php if($ufp == "SC"){echo "selected";}?>>SC</option>
                                    <option value="SP" <?php if($ufp == "SP"){echo "selected";}?>>SP</option>
                                    <option value="TO" <?php if($ufp == "TO"){echo "selected";}?>>TO</option>
                                </select>
                            </div>
                            <div style="margin-left: 8px; padding-top: 8px;">
                                <input class="pesquisa-s" type="submit" value="">
                            </div>
                        </div>
                    </form>

                    <div style="margin-top: 32px;">
                        <?php
                            include "../../../php/principal/profissionais/profissionais.php";
                        ?>
                    </div>

                    <div>
                        <?php
                            include "../../../php/principal/profissionais/paginas.php";
                        ?>
                    </div>
                </div>    
            <div>

        </div>

        <script src="../../../js/header.js"></script>
        <script src="../../../js/profissionais.js"></script>
    </body>
</html>