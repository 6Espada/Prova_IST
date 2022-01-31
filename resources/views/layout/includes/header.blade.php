<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="http://prova-laravel.test/css/style.css">
  
  <title>@yield('titulo')</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Prova PHP IST</a>
  <div class="navbar-nav">
    <a class="nav-item nav-link" href="{{ route('pessoas') }}">Pessoa</a>
    <a class="nav-item nav-link" href="{{ route('contas') }}">Conta</a>
    <a class="nav-item nav-link" href="{{ route('movimentacoes') }}">Movimentação</a>
  </div>
  </div>
</nav>

<body>