<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha de inscrição</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif; font-size: 14px;
        }

        main {
            width: 100%;
            height: 700px;
            position: relative;
            margin: 0 auto;
        }

        .header {
            width: 100%;
            height: 30px;
            background: rgb(238, 97, 3);
        }

        .div-titulo {
            width: 100%;
            margin-left: 20px;
            position: relative;
            top: 6px;
        }

        .letra {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12pt;
            margin-left: 20px;
            color: #fff;
        }

        ul{
            list-style: none;
        }
        ul li{margin: 10px; color:black; background: rgb(228, 232, 236); padding:4px;}

        hr {
            width: 60%;
        }

        .ficha {
            text-align: center;
            margin-top: 50px;
            color: #666;
            margin-bottom: 0px;
        }

        .observacao {
            font-size: 12px;
            text-align: center;
            margin-top: 50px;
            font-family: monospace;
        }

        .footer {
            width: 100%;
            position: absolute;
            bottom: 0;
            padding-top: 4px;
            padding-bottom: 4px;
            text-align: center;
        }

        .footer span {
            font-size: 12px;
        }

        .nome {text-align: right; margin-right: 10px; margin-top: 30px;}
    </style>
</head>

<body>
    <main>
        <img src="light/assets/images/logo-tvcj.png">
        <div class="header">
            <div class="div-titulo">
                <span class="letra">Transforme sua TV com a melhor conexão, canais exclusivos e entretenimento sem limites!</span>
            </div>
        </div>

        <h4 class="ficha">COMPROVATIVO DE PAGAMENTO </h4>
        <hr>


        <div class="corpo">

            <div class="nome">{{$dados->nome}}</div>
            <ul>
                <li>Código do cliente - {{$dados->id}}</li>
                <li>Mes de Pagamento - {{$dados->mes}}</li>
                <li>Ano de Pagamento - {{$dados->contacto}}</li>
                <li>Data de Pagamento - {{$dados->data_pagamento}}</li>
                <li>Atendimento por - {{$dados->atendido_por}}</li>
                <br>
                <p class="observacao">Observação - Esta ficha de inscrição contém informações valiosas
                    para atestar a tua condição de cliente. Guarde em um lugar seguro.
                </p>
            </ul>
        </div>

        <div class="footer">
            {{-- <span>TVCJ @ Todos os direitos reservados.</span> --}}
        </div>

    </main>
</body>

</html>