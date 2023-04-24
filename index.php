<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>

    <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


</head>

<body class="bg-info d-flex justify-content-center align-items-center vh-100">
  
  <div class="bg-white p-5 rounded-5 text=secondary" style="width:25rem">
    <div class="d-flex justify-content-center">
      <img src="./views/img/fotografia/logito.png" alt="login" style="height: 7rem">
      
    </div>

    <div class="text-center fs-1 fw-bold">Login</div>
    <div class="input-group mt-4">
      <div class="input-group-text bg-info">
        <img src="./views/img/fotografia/login.png" alt="login" style="height:1rem">
      </div>
      <input class="form-control" type="text" placeholder= "username">
    </div>
    <div class="input-group mt-1">
      <div class="input-group-text bg-info">
        <img src="./views/img/fotografia/key.png" alt="key" style="height:1rem">
      </div>
      <input class="form-control" type="password" placeholder= "password">
    </div>
    <div class="d-flex justify-content-around mt-1">
      <div class="d-flex align-items-center gap:1">
        <input class="form-check-input" type="checkbox">
        <div class="pt-1" style="font-size:0.9rem">remember me</div>
      </div>
      <div class="pt:1">
        <a href="" class="text-decoration-none text-info fw-semibold fst-italic font-size:0.9rem" style="font-size:0.9rem">Forgot your Password</a>
      </div>
    </div>
    <div class="btn btn-info text-white w-100 mt-4 fw- shadow-sm">
    <a href="views/estudiantes.php">Iniciar Sesión</a>

    </div>
   
    </div>
  </div>


  
</body>
</html>