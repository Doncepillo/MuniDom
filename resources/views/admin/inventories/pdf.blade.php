<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Reportes en pdf</title>
</head>
<style>
    html {}

    body {
        font-family: "Times New Roman", serif;
        margin: -2mm 8mm 2mm 8mm;
    }
</style>
</body>
<div class="row">
  <div style="position: relative;float: left" class="col-8"> <img src="img/la.jpg" width="200" height="100" /></div>
  <div style="position: relative;float: right" class="col-4">
  <h4> R.U.T. 74.317.600-6</h4>
  Sucursal "HUERTO": Pichiquema Lote 2 - Camino a Pichirropulli Paillaco
  <div class="col-4">
  Cooperativa Campesina Apícola Valdivia LTDA. 
  </div>
  </div>
</div>


<div class="row">
    <div class="col-sm-7">
        <center>
            <h2 style="border-bottom : 1px solid gray">APIARANDANOS VALDIVIA - CHILE</h2>
        </center>
        <br>
    </div>
</div>

<hr/>

<table class="table">
    <thead>
        <tr>
            <th>N° guia</th>
            <th>Fecha</th>
            <th>Articulo</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Stock Minimo</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->guia }}</td>
            <td>{{ $article->fecha }}</td>
            <td>{{ $article->nombre_articulo }}</td>
            <td>{{ $article->descripcion }}</td>
            <td>{{ $article->cant }}</td>
            <td>{{ $article->min_stock }}</td>
            <td>{{ $article->category_categoria }}</td>
        </tr>
    </tbody>
    @endforeach
</table>
</body>

</html>