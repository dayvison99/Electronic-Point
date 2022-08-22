<?php
include_once("conexao.php");
if(!isset($_SESSION)){
        session_start();
  }


$usuariot = $_POST['pessoa'];
$senha = $_POST['senha'];
// validando senha de usuario

$result = mysqli_query($con,"SELECT * FROM pessoa WHERE id_pessoa='$usuariot' and senha ='$senha'");
$resultado = mysqli_fetch_assoc($result);
if(!$resultado){
  $result = mysqli_query($con,"SELECT * FROM pessoa WHERE id_pessoa='$usuariot'");
  $resultado = mysqli_fetch_assoc($result);
  $msg = $resultado['nome_pessoa'];
      include_once("index.php");
      echo "<script>
        window.alert('$msg Sua Senha Está Errada! Vamos Tentar Novamente?')
      </script>";
      return false;
}


 //hora do  ponto
if ($usuariot) {
  date_default_timezone_set('America/Sao_Paulo');
  $hora =date('Y-m-d H:i:s', time());
  $hora2 = date('H:i:s', time());
  // $data = date('d-m-Y ', time());
}

//saber se é entrada ou saída
$entradaSaida = mysqli_query($con,"SELECT * FROM ponto WHERE id_pessoa='$usuariot' order by nr_ponto desc");
$entradaSaidaquery = mysqli_fetch_assoc($entradaSaida);

//Validando entrada E e Saida S
if($entradaSaidaquery){
  if($entradaSaidaquery['entrada_saida'] == "E")
    $entrada_saida = "S";
  else
    $entrada_saida = "E";
}else{
    $entrada_saida = "E";
}

//Validando 10 Minutos de Espera
$diffHoras = (strtotime(substr($hora2,0,5)) - strtotime(substr($entradaSaidaquery['data_hora_ponto'],10,6)));
$output = date('H:i:s', $diffHoras);

if(substr($output,3,2)<='10'){
  $result = mysqli_query($con,"SELECT * FROM pessoa WHERE id_pessoa='$usuariot'");
  $resultado = mysqli_fetch_assoc($result);
  $msg = $resultado['nome_pessoa'];
      include_once("index.php");
      echo "<script>
        window.alert('$msg Só é Permitido Resgistrar o ponto Após 10 Minutos!')
      </script>";
      return false;
}

// if($entradaSaidaquery){
//   if(( $hora -$entradaSaidaquery['data_hora_ponto'])


$result = mysqli_query($con,"SELECT * FROM pessoa WHERE id_pessoa='$usuariot'");
$resultado = mysqli_fetch_assoc($result);

$result = "INSERT INTO ponto(`id_pessoa`,`data_hora_ponto`,`entrada_saida`, `data_hora_registro`) VALUES ('$usuariot','$hora','$entrada_saida','$hora')";
$queryresult = mysqli_query($con, $result);

if($queryresult == FALSE) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado

      include_once("index.php");
      echo "<script>
            window.alert(' Erro ao Registrar seu Ponto!')
          </script>";
          return false;
  }else{
    $result = mysqli_query($con,"SELECT * FROM pessoa WHERE id_pessoa='$usuariot'");
    $resultado = mysqli_fetch_assoc($result);
    $msg = $resultado['nome_pessoa'];
        include_once("index.php");
        echo "<script>
          window.alert('$msg Seu Ponto Foi Registrado com Sucesso!')
        </script>";
        return false;
  }
// echo
// $senhat = $_POST['senha'];
// $cidade = $_POST['cidade'];
//
// $result = mysqli_query($con,"SELECT * FROM usuario WHERE usuario='$usuariot' AND senha='$senhat' AND cidade = '$cidade' ");
// $resultado = mysqli_fetch_assoc($result);
//
// $result2 = mysqli_query($con,"SELECT * FROM usuario WHERE usuario='$usuariot' AND senha='$senhat' ");
// $resultado2 = mysqli_fetch_assoc($result2);
//
// $date = mysqli_query($con,"SELECT * FROM cvs ");
// $dateresultado = mysqli_fetch_assoc($date);
//
// if($resultado == FALSE and $resultado2 == TRUE) {
//       // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
//
//       include_once("index.php");
//       echo "<script>
//             window.alert(' Você Não Tem Acesso a Essa Cidade!')
//           </script>";
//           return false;
//   }
//
//
// if($resultado == FALSE) {
//       // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
//
//       include_once("index.php");
//       echo "<center>Usuário ou Senha Invalidos!</center>";
//
//       return false;
//
//   } else {
//       $_SESSION['UsuarioID'] = $resultado['id'];
//       $_SESSION['UsuarioNome'] = $resultado['usuario'];
//       $_SESSION['Nome'] = $resultado['nome'];
//       $_SESSION['permissao'] = $resultado['permissao'];
//       $_SESSION['data'] = $dateresultado['dataalteracao'];
//       $_SESSION['empresa'] = $resultado['cidade'];
//
//
//       if($_SESSION['permissao'] == "root" or $_SESSION['permissao'] == "administrador" ){
//          include_once("home.php");
//          #include_once("controllers/conexao.php");
//       #  include_once("atualizarbanco.php");
//       }
//       if ($_SESSION['permissao'] == "estoque") {
//         include_once("home.php");
//       #  include_once("atualizarbanco.php");
//       }
//       if ($_SESSION['permissao'] == "caixa") {
//         include_once("home.php");
//       #  include_once("atualizarbanco.php");
//       }
//   }


?>
