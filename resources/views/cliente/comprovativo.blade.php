<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ficha de inscrição</title>
  <style>
      body{
        background-color: #ddd;
      }
      main{
        width: 60%;
        height: 50vh;
        margin: 0 auto;
      }
      .card{
          border:1px solid #c2bfbf;
          height: inherit;
          background-color: #fff;
      }
      .card-header{
        height: 7vh;
        border:1px solid #c2bfbf;
        border-top: none;
        border-left: none;
        border-right: none;
        display: flex;
        align-items: center;
        justify-content: center;

      }
      .letra{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
        color:#666;
      }
      span{
          margin-left: 10px;
      }
      li{
        font-family: monospace;
      }
     
  </style>
</head>
<body>
  <main>
    <div class="card">
      <div class="card-header">
        <div class="">
          <span class="letra">Ficha de Inscrição - TVCJ</span>
        </div>
      </div>

      <div class="card-body">

          <ul>
            <li>Id - {{$dados->id}}</li>
            <li>Linha - {{$dados->linha}}</li>
            <li>Contacto - {{$dados->contacto}}</li>
            <li>Rua - {{$dados->rua}}</li>
            <li>Nome - {{$dados->nome}}</li>
            <li>Dia de Pagamento - {{$dados->dia_pagamento}}</li>
            <li>Data do Contrato - {{$dados->data_contrato}}</li>
            <br>
            <li> Observação <nav class="letra">Esta ficha de inscrição contém informações valiosas e relevantes para fins de atestar a tua condição de cliente. Guarde em um lugar seguro.</nav>
            </li>
          </ul>
      <div>

      <div class="card-footer">

      </div>
      
    </div>
  </main>
</body>
</html>