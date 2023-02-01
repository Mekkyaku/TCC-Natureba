<div class="header">
    <div style="display: flex; justify-content: space-between; width: 96px;">
        <div>
            <button class="side" id="bside" onclick="<?php include '../../../php/header/side.php';?>"></button>
        </div>
        <div>
            <img alt="Logo do Natureba" class="logo" src="../../../img/site/logo.png">
        </div>
    </div>
    <div style="display: flex; justify-content: space-between; width: 160px;">
        <div>
            <a href="../chat/chat.php"><button class="header-i"><img alt="Chat" class="header-i" src="../../../img/site/chat.png"></button></a>
        </div>
        <div>
            <button class="header-i" id="bnoti" onclick="shownoti()"><img alt="Notificaçãoes" id="inoti" class="header-i" src="<?php include '../../../php/header/bnoti.php';?>"></button>
        </div>
        <div>
            <button class="header" id="bperfil" onclick="showperfil()"><img alt="Perfil" class="header" src="../../../img/perfil/<?php echo $imagem;?>"></button>
        </div>
    </div>
</div>

<div id="noti" class="noti">
    <div style="padding: 16px 32px;">
        <h1 class="header">Notificações</h1>
    </div>
    <div>
        <?php
            include "../../../php/header/noti.php";
        ?>
    </div>
</div>

<div id="perfil" class="perfil">
    <a href="../perfil/perfil.php?id=<?php echo $id;?>"><div class="perfil-o">
        <p class="perfil">
            Perfil
        </p>
    </div></a>
    <a href="../perfil/config.php"><div class="perfil-o" style="border-bottom: 2px solid #ECECEC; border-top: 2px solid #ECECEC;">
        <p class="perfil">
            Configurações
        </p>
    </div></a>
    <a href="../../../php/sessao/encerrar.php"><div class="perfil-o">
        <p class="perfil">
            Sair    
        </p>
    </div></a>
</div>

<div class="shadow" id="snoti" onclick="hidenoti()"></div>
<div class="shadow" id="sperfil" onclick="hideperfil()"></div>