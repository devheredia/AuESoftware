<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    header {
        background: #222324;
        padding: 20px;
        width: 100%;
        /* Ajustado para ocupar a largura total */
        height: 30px;
        position: fixed;
        z-index: 9999;
    }

    /*pushing a hamburger menu into a pillow texture like background*/

    .menuButton {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 6%;
        /* Reduzi o espaço entre os elementos */
        color: #090909;
        width: 2em;
        /* Reduzi ainda mais o tamanho do botão */
        height: 2em;
        /* Reduzi ainda mais o tamanho do botão */
        border-radius: 0.3em;
        /* Reduzi o raio da borda */
        background: #171717;
        border: 1px solid #171717;
        transition: all .3s;
        box-shadow: inset 2px 2px 8px #3a3a3a,
            /* Reduzi o tamanho da sombra */
            inset -2px -2px 8px #000000;
        /* Reduzi o tamanho da sombra */
        position: relative;
        z-index: 9999;
        margin-left: 10px;
        top: -8%;
    }

    .menuButton:hover {
        border: 1px solid black;
    }

    .menuButton:active {
        color: #666;
        box-shadow: 4px 4px 8px #3a3a3a,
            /* Reduzi o tamanho da sombra */
            -4px -4px 8px #000000;
        /* Reduzi o tamanho da sombra */
    }

    input[type="checkbox"] {
        -webkit-appearance: none;
        display: none;
        visibility: hidden;
    }

    .menuButton span {
        width: 15px;
        /* Reduzi o tamanho das linhas */
        height: 2px;
        /* Reduzi o tamanho das linhas */
        background: rgb(200, 200, 200);
        border-radius: 100px;
        transition: 0.3s ease;
    }

    input[type]:checked~span.top {
        transform: translateY(190%) rotate(45deg);
        /* Ajustei a posição */
        width: 20px;
        /* Aumentei o tamanho da linha superior */
    }

    input[type]:checked~span.bot {
        transform: translateY(-170%) rotate(-45deg);
        /* Ajustei a posição */
        width: 20px;
        /* Aumentei o tamanho da linha inferior */
        box-shadow: 0 0 6px #495057;
    }

    input[type]:checked~span.mid {
        transform: translateX(-10px);
        /* Ajustei a posição */
        opacity: 0;
    }


    /* .botao-atalho-menu3 {
        margin-left: 283px;
        color: #ffffff;
        position: relative;
        z-index: 9999;
    } */

    .left {
        margin-left: 3%;
        position: relative;
        z-index: 9999;
        top: -35px;
    }

    .left h3 {
        color: #fff;
        margin: 0;
        text-transform: uppercase;
        font-size: 22px;
        font-weight: 800;
    }

    .left span {
        color: #8c9196;
    }

    .sidebar {
        width: 290px;
        height: 100%;
        top: 0;
        left: 0;
        background: #222324;
        padding-top: 70px;
        overflow-y: auto;
        transition: left 0.5s;
        position: fixed;
    }

    .sidebar::-webkit-scrollbar {
        width: 0;
    }

    .sidebar .image {
        width: 100px;
        height: 100px;
        border-radius: 100px;
    }

    .sidebar h2 {
        color: #ccc;
        margin-top: 0;
        margin-bottom: 20px;
    }

    .sidebar p {
        color: #ccc;
        margin-top: 10px;
        margin-bottom: 0;
        padding-left: 30px;
    }

    .sidebar a {
        color: #fff;
        display: block;
        width: 100%;
        line-height: 35px;
        text-decoration: none;
        padding-left: 40px;
        box-sizing: border-box;
        font-size: 19px;
        transition: background 0.5s;
    }

    .sidebar a:hover {
        background: #51b3ec;
    }

    .sidebar ion-icon {
        padding-right: 10px;
    }

    #check {
        display: none;
    }

    label #sidebar_btn {
        position: fixed;
        left: 10px;
        color: #fff;
        font-size: 25px;
        margin: 5px 0;
        cursor: pointer;
        transition: color 0.5s;
    }

    label #sidebar_btn:hover {
        color: #51b3ec;
    }

    #check:checked~.sidebar {
        left: -290px;
    }

    #check:checked~.sidebar a span {
        display: none;
    }

    #check:checked~.sidebar a {
        font-size: 20px;
        margin-left: 170px;
        width: 80px;
    }

    .content {
        background: url(/image/img-2.jpg) no-repeat;
        background-size: cover;
        background-position: center;
        height: 100px;
        transition: margin-left 0.5s;
        margin-left: 290px;
    }

    #check:checked~.content {
        margin-left: 0;
    }

    .container a {
        text-decoration: none;
    }

    .container h5 {
        margin-left: 5px;
    }

    .container span {
        display: inline-flex;
        align-items: center;
    }

    .submenu {
        display: none;
    }

    .submenu.active {
        display: block;
    }

    .toggle {
        cursor: pointer;
    }

    .toggle span {
        display: flex;
        align-items: center;
    }

    .toggle:hover {
        background-color: #f0f0f0;
    }

    .submenu a {
        font-size: 14px;
        margin-left: 20px;
    }

    .redes-sociais {
        display: flex;
        margin-top: 40%;
        color: white;
        margin-left: 30px;
    }

    .redes-sociais a {
        margin-right: -170px;
        padding-left: 0px;
    }

    .botao-sair-ok {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 45px;
        height: 45px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition-duration: .3s;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
        background-color: rgb(255, 65, 65);
        margin-left: 90%;
        top: -77px;
    }

    /* plus sign */
    .sign {
        width: 100%;
        transition-duration: .3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sign svg {
        width: 17px;
    }

    .sign svg path {
        fill: white;
    }

    /* text */
    .text {
        position: absolute;
        right: 0%;
        width: 0%;
        opacity: 0;
        color: white;
        font-size: 1.2em;
        font-weight: 600;
        transition-duration: .3s;
    }

    /* hover effect on button width */
    .botao-sair-ok:hover {
        width: 125px;
        border-radius: 40px;
        transition-duration: .3s;
    }

    .botao-sair-ok:hover .sign {
        width: 30%;
        transition-duration: .3s;
        padding-left: 20px;
    }

    /* hover effect button's text */
    .botao-sair-ok:hover .text {
        opacity: 1;
        width: 70%;
        transition-duration: .3s;
        padding-right: 10px;
    }

    /* button click effect*/
    .botao-sair-ok:active {
        transform: translate(2px, 2px);
    }

    /* Active state for the SVG */
    .botao-sair-ok:active .sign svg {
        fill: #ccc;
        /* Altere a cor do SVG quando clicado */
    }

    /* Estilos para dispositivos móveis */
    @media only screen and (max-width: 768px) {
        .left {
            margin-left: 13%;
        }

        header {
            width: 100%;
        }

        .sidebar {
            width: 52%;
            padding-top: 100px;
        }

        #check:checked~.sidebar {
            left: 0;
        }

        label #sidebar_btn {
            left: 10px;
        }

        .botao-sair-ok {
            margin-left: 68%;
        }

        #check:checked~.content {
            margin-left: 0;
        }

        .botao-atalho-menu {
            display: flex;
            /* Exibir o botão na versão móvel */
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: rgb(255, 65, 65);
        }

        .botao-atalho-menu svg {
            width: 17px;
        }

        .botao-atalho-menu svg path {
            fill: white;
        }

        .frase-bota-atalho-menu {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 1.2em;
            font-weight: 600;
            transition-duration: .3s;
        }

        .botão-atalho-menu:hover {
            width: 125px;
            border-radius: 40px;
            transition-duration: .3s;
        }

        .botão-atalho-menu:hover .botao-atalho-menu {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
        }

        .botão-atalho-menu:hover .frase-bota-atalho-menu {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
        }

        .botão-atalho-menu:active {
            transform: translate(2px, 2px);
        }
    }

    /* Estilos para monitores maiores */
    @media only screen and (min-width: 769px) {
        .botao-atalho-menu {
            display: none;
            /* Ocultar o botão na versão normal */
        }
    }
</style>