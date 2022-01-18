<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Routes</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="blue-grey darken-4">

      <div class="container ">

      <div class="center">
	<h1 class="white-text">Sin documentación</h1>
	  <p class="white-text">{{ count($withoutDocs) }} urls sin documentación de {{ count($allRoutes) }} urls totales</p>
      </div>

	<table class="highlight z-depth-2 card-panel blue-grey darken-2">

	  <thead class="blue-grey darken-3">
	    <tr>
	      <th class="white-text">URL</th>
	      <th class="white-text">METHOD</th>
	    </tr>
	  </thead>

	  @foreach ($withoutDocs as $route)
	  <tbody>
	    <tr>
	      <td class="white-text"> {{ $route[ 'url' ] }}</td>
	      <td class="white-text">{{ $route[ 'method' ] }}</td>
	    </tr>
	  </tbody>
	  @endforeach

	</table>

	<div class="center">
	  <h1 class="white-text">Con documentación</h1>
	  <p class="white-text">{{ count($withDocs) }} urls con documentación de {{ count($allRoutes) }} urls totales</p>
	</div>
	<table class="highlight z-depth-2 card-panel blue-grey darken-2">

	  <thead class="blue-grey darken-3">
	    <tr>
	      <th class="white-text">URL</th>
	      <th class="white-text">METHOD</th>
	    </tr>
	  </thead>

	  @foreach ($withDocs as $route)
	  <tbody>
	    <tr>
	      <td class="white-text"> {{ $route[ 'url' ] }}</td>
	      <td class="white-text">{{ $route[ 'method' ] }}</td>
	    </tr>
	  </tbody>
	  @endforeach

	</table>

      </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
