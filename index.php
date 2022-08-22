<?php
if(!isset($_SESSION)){
        session_start();
      }

include_once("conexao.php");

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ponto Cantinho</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
    <form class="form-signin" method="POST" action="valida_ponto.php" >
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="login.html">Login</a></li>
                <!-- <li class="sidebar-nav-item"><a href="#page-top">Home</a></li>
                <li class="sidebar-nav-item"><a href="#about">About</a></li>
                <li class="sidebar-nav-item"><a href="#services">Services</a></li>
                <li class="sidebar-nav-item"><a href="#portfolio">Portfolio</a></li>
                <li class="sidebar-nav-item"><a href="#contact">Contact</a></li> -->
            </ul>
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-1 px-lg-5 text-center">
              <h2 class="form-signin-heading"><img src="img/Cantinho-da-Cegonha.png" height="40%" width="40%"> </h2>
                <!-- <h3 class="mb-5"><em>Controle de Horas</em></h3> -->
                <table class="table">
                    <thead class="table table-striped">
                      <tr>
                        <th>
                          <h1>

                             <!-- document.getElementById("time"); -->
                            <p id="time"></p>

                          </h1>
                        </th>
                      </tr>
                    </table>
                    <div class="form-group mx-sm-3 mb-2">
                    <select class="form-control" id="pessoa" name="pessoa" required>
                              <option disabled selected  placeholder="Pessoa" required value="">Selecione</option>
                        <?php
                            $query = $con->query("SELECT * FROM pessoa order by nome_pessoa");
                             while($reg = $query->fetch_array())
                              {
                                  echo '<option value="'.$reg["id_pessoa"].'">'.$reg["nome_pessoa"].'</option>';
                              }
                        ?>
                      </select>
                    </div>
                      <br/>
                      <div class="form-group mx-sm-3 mb-2">
                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Justificativa"></textarea>
                    </div>
                    <br/>
                    <div class="form-group mx-sm-3 mb-1">
                	                            <input type="password" name="senha" class="form-control" placeholder="Digite a Senha" required>
                     </div>
                         <div class="form-group">
                      <br/>                    <!-- <a class="btn btn-primary btn-xl" href="valida_ponto.php">Registrar</a> -->
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
                      </div>


          </form>
        </header>
        <!-- About-->

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container px-2 px-lg-1">
              <p class="text-muted small mb-0">Copyright &copy; Cantinho da Cegonha 2022</p>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<script>
var timeDisplay = document.getElementById("time");


function refreshTime() {
var dateString = new Date().toLocaleString("pt-BR", {timeZone: "America/Sao_Paulo"});
var formattedString = dateString.replace(", ", " - ");
timeDisplay.innerHTML = formattedString;
}

setInterval(refreshTime, 1000);
function validar(){
if(getElementById('pessoa').value=="")
  alert("aaa")

}
</script>
