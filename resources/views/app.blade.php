<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}" defer></script>
</head>
<body>
  
  <div class="flex justify-center items-center h-screen space-x-1" id="app">
    <dropmenu no-icon rounded text="Menu">
      <drop-item href="http://www.google.com.br">Opção 1</drop-item>
      <drop-item :to="{ name:'foo' }">Opção 2</drop-item>
      <drop-item>Opção 3</drop-item>
      <Drodown-Divider></Drodown-Divider>
      <drop-item @click.stop.prevent="metodo4teste">Opção 4</drop-item>
      <drop-item>Opção 5</drop-item>
    </dropmenu>
    <dropmenu naked text="Menu">
      <drop-item href="http://www.google.com.br">Opção 1</drop-item>
      <drop-item :to="{ name:'foo' }">Opção 2</drop-item>
      <drop-item>Opção 3</drop-item>
      <Drodown-Divider></Drodown-Divider>
      <drop-item @click.stop.prevent="metodo4teste">Opção 4</drop-item>
      <drop-item>Opção 5</drop-item>
    </dropmenu>
  </div>

  
    
      
  
</body>
</html>