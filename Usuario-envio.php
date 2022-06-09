<html>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <title></title>
</head>
<body>
</body>
</html>
<?php
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destruye la sesion. 
        session_destroy(); 
    }
    // Dirige a una pagina dependiendo del rol
    if(isset($_SESSION['usuRol'])){
        switch($_SESSION['usuRol']){
            case 'administrador':
                header('location: principal.php');
            break;

            case 'bodeguero':
            header('location: bodeguero_principal.php');
            break;

            case 'vendedor':
                header('location: vendedor_principal.php');
                break;

            default:
        }
    }
    // Se realiza la validacion de los campos
    if(isset($_POST['usuRol']) && isset($_POST['usuCedula']) && isset($_POST['usuContraseña'])){
        $usuRol = $_POST['usuRol'];
        $usuCedula = $_POST['usuCedula'];
        $usuContraseña = md5($_POST['usuContraseña']);

        $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
        $sql = "SELECT *FROM usuario WHERE usuRol = '$usuRol' AND usuCedula = '$usuCedula' AND usuContraseña = '$usuContraseña' AND usuEstado = 'activo'";
        $result = mysqli_query($conexion, $sql) or die ("Error");
        // Se guarda en un arreglo
        $row = mysqli_fetch_array($result);
        // Se valida que el arreglo tenga algo y si es asi redirige a una pagina diferente dependiendo del rol
        if($row == true){
            $usuRol = $row[1];
            
            $_SESSION['usuRol'] = $usuRol;
            switch($usuRol){
                case 'administrador':
                    header('location: principal.php');
                break;

                case 'bodeguero':
                header('location: bodeguero_principal.php');
                break;

                case 'vendedor':
                    header('location: vendedor_principal.php');
                    break;

                default:
            }
        }else{
            // muestra el mensaje de error en caso de que las validaciones no se cumplan en su totalidad. 
            echo "<script>
             Swal.fire({
               icon: 'error',
               title: 'Opss...!',
               text: 'Error en la autenticación.',  
               })
             
     </script>";
        }
        

    }
?>