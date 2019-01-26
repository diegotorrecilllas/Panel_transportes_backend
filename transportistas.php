<?php
$accion="registrar";
include_once 'conexion.php';

$sql_leer = 'SELECT * FROM transporte';
//nos creamos una variable como en la documentacion $gsent la cual le pasamos la variable $pdo (conexion) la cual tenia el usuario y demas
// y le decimos que ejecute sql_leer
$gsent= $pdo->prepare($sql_leer);
//ejecutamos todo lo que hay arriba.
$gsent->execute();
$resultado = $gsent ->fetchAll();
// var_dump($resultado);
//********************************* */

//******AGREGAR DATOS A LA DB****** */

if($_POST AND !isset($_POST['editar']) AND !isset($_POST['modificar']) AND !isset($_POST['borrarreg'])){
    $codigo_i= $_POST['CODIGO'];
    $nif_i= $_POST['NIF'];
    $pesomax_i=$_POST['PESOMAX'];
    $tarifa_i=$_POST['TARIFA'];
    $matricula_i=$_POST['MATRICULA'];
    $nombre_i=utf8_decode($_POST['NOMBRE']);
    $telefono1_i=$_POST['TELEFONO1'];
    $email_i=$_POST['EMAIL'];
    $direccion_i=utf8_decode($_POST['DIRECCION']);
    $autonomo_i=utf8_decode($_POST['AUTONOMO']);
    $modulo_i=utf8_decode($_POST['MODULO']);
    $cp_i=$_POST['CP'];
    $poblacion_i=utf8_decode($_POST['POBLACION']);
    $formapago_i=utf8_decode($_POST['FORMAPAGO']);
    $observaciones_i=utf8_decode($_POST['OBSERVACIONES']);
    $telefono2_i=$_POST['TELEFONO2'];
    $movil_i=$_POST['MOVIL'];



    //agregaremos los datos a la base de datos
    //$sql_agregar_db= 'INSERT INTO pedidos (no_pedido,fecha,empresa) VALUE (?,?,?)';
    $sql_agregar_db= 'INSERT INTO transporte (CODIGO,NIF,PESOMAX,TARIFA,MATRICULA,NOMBRE,TELEFONO1,EMAIL,DIRECCION,AUTONOMO,MODULO,CP,POBLACION,FORMAPAGO,OBSERVACIONES,TELEFONO2,MOVIL) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
   // $sql_agregar_db= 'INSERT INTO pedidos (PEDIDO,FECHA,EMPRESA,DEPARTAMENTO,CONTRATO) VALUE (?,?,?,?)';
    // INSERT INTO `b2d`(`pedido`, `fecha`, `empresa`, `departamento`, `contrato`, `observaciones`, `cliente`, `direccion`, `cp`, `poblacion`, `provincia`, `telefono`, `movil`, `email`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])
    $agregar_db = $pdo -> prepare($sql_agregar_db);
    //$agregar_db->execute(array($pedido_i,$fecha_i,$empresa_i));
    $agregar_db->execute(array($codigo_i,$nif_i,$pesomax_i,$tarifa_i,$matricula_i,$nombre_i,$telefono1_i,$email_i,$direccion_i,$autonomo_i,$modulo_i,$cp_i,$poblacion_i,$formapago_i,$observaciones_i,$telefono2_i,$movil_i));
    // $agregar_db =null;
    // $pdo = null;
    // header('location:contenido.php');

    //Nuevo 27/12/2018, para actualizar la lista.
    $sql_leer = 'SELECT * FROM transporte';
    $gsent= $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent ->fetchAll();

  }

  if($_POST AND isset($_POST['editar'])){
    if (isset($_POST['editar'])){
        $codbus= $_POST['editar'];
        $accion="modificar";
        $sql_buscar_db= 'SELECT * FROM transporte WHERE codigo='.$codbus;
        $gbusca= $pdo->prepare($sql_buscar_db);
        $gbusca->execute();
        //$total=num_rows($gbusca);
        $xno_pedido=$codbus;
        $resultado2 = $gbusca ->fetchAll();
        foreach($resultado2 as $dato2):
             $xcodigo=$dato2['codigo'];
             $xnif=$dato2['nif'];
             $xpesomax=$dato2['pesomax'];
             $xtarifa=$dato2['tarifa'];
             $xmatricula=utf8_encode($dato2['matricula']);
             $xnombre=utf8_encode($dato2['nombre']);
             $xtelefono1=$dato2['telefono1'];
             $xemail=$dato2['email'];
             $xdireccion=utf8_encode($dato2['direccion']);
             $xautonomo=utf8_encode($dato2['autonomo']);
             $xmodulo=utf8_encode($dato2['modulo']);
             $xcp=$dato2['cp'];
             $xpoblacion=utf8_encode($dato2['poblacion']);
             $xformapago=utf8_encode($dato2['formapago']);
             $xobservaciones=utf8_encode($dato2['observaciones']);
             $xtelefono2=$dato2['telefono2'];
             $xmovil=$dato2['movil'];

         endforeach;

    }
    }

   if($_POST AND isset($_POST['modificar'])){

       $codigo_i= $_POST['CODIGO'];
    $nif_i= $_POST['NIF'];
    $pesomax_i=$_POST['PESOMAX'];
    $tarifa_i=$_POST['TARIFA'];
    $matricula_i=$_POST['MATRICULA'];
    $nombre_i=utf8_decode($_POST['NOMBRE']);
    $telefono1_i=$_POST['TELEFONO1'];
    $email_i=$_POST['EMAIL'];
    $direccion_i=utf8_decode($_POST['DIRECCION']);
    $autonomo_i=utf8_decode($_POST['AUTONOMO']);
    $modulo_i=utf8_decode($_POST['MODULO']);
    $cp_i=$_POST['CP'];
    $poblacion_i=utf8_decode($_POST['POBLACION']);
    $formapago_i=utf8_decode($_POST['FORMAPAGO']);
    $observaciones_i=utf8_decode($_POST['OBSERVACIONES']);
    $telefono2_i=$_POST['TELEFONO2'];
    $movil_i=$_POST['MOVIL'];
     //$x=$_POST['PEDIDO'].' '.$cliente_i;


        $sql="UPDATE transporte SET cp=".$cp_i.",codigo=".$codigo_i.",pesomax=".$pesomax_i.",tarifa=".$tarifa_i.",matricula='".$matricula_i."',observaciones='".$observaciones_i."'
        ,poblacion='".$poblacion_i."',direccion='".$direccion_i."',telefono1=".$telefono1_i.",movil=".$movil_i.",email='".$email_i."',nif='".$nif_i."',nombre='".$nombre_i."'
        ,autonomo='".$autonomo_i."',modulo='".$modulo_i."',formapago='".$formapago_i."',telefono2=".$telefono2_i." WHERE codigo=".$codigo_i;
        $gmod= $pdo->prepare($sql);
        $gmod->execute();


        //Nuevo 27/12/2018, para actualizar la lista.
        $sql_leer = 'SELECT * FROM transporte';
        $gsent= $pdo->prepare($sql_leer);
        $gsent->execute();
        $resultado = $gsent ->fetchAll();


   }


   if($_POST AND isset($_POST['borrarreg'])){
       $res=$_POST['borrarreg'];
       if ($res=="si"){
           $codigo_i= $_POST['CODIGO'];
           $sql="DELETE FROM transporte WHERE codigo=".$codigo_i;
           $geli= $pdo->prepare($sql);
           $geli->execute();
        }

       //Nuevo 27/12/2018, para actualizar la lista.
        $sql_leer = 'SELECT * FROM transporte';
        $gsent= $pdo->prepare($sql_leer);
        $gsent->execute();
        $resultado = $gsent ->fetchAll();

   }


?>


<!DOCTYPE html>
<html  lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>B2D </title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
function item(n){
    //alert ('n '+n);
    document.getElementById('editar').value=n;
}
function borrar(){
     x=confirm('Desea Eliminar el Registro?');
     if (x){
        document.getElementById('borrarreg').value="si";
        return true;
     }
     else{
        document.getElementById('borrarreg').value="no";
        return false;
     }
}

</script>


</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Crear Nuevo <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Pedido</a>
                                <a class="dropdown-item" href="#">Albarán</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Factura</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">



                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Salir</a>
                                <div class="dropdown-divider"></div>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pedidos.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Pedidos</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="empresasytarifas.php" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Empresas y tarifas</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="transportistas.php" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Montadores y transportistas</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Facturar</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Liquidar</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Sin Facturar </span></a>

                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Sin Liquidar</span></a></li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Montadores y transportistas</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">Facturas</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage "></i></h1>
                                <h6 class="text-white">Pedidos</h6>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline "></i></h1>
                                <h6 class="text-white">Estadísticas</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">

                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                <h6 class="text-white">Seguimiento</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                             <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                                <h6 class="text-white">Incidenicas</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->


                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <?php
                  if ($accion=="registrar"){
               ?>
                <form method="POST">
                <div class="row">
                        <div class="col">
                            <h3>Montadores y transportistas</h3>
                            <div class="row ">
                                <div class="col-md-2">
                                    <label for="cono1" class="  control-label col-form-label">Codigo </label>
                                    <input type="number" class="form-control" id="fname" placeholder="Codigo" name="CODIGO">

                                </div>
                                <div class="col-md-3 ">
                                    <label for="cono1" class="control-label col-form-label">NIF</label>
                                    <input type="text" class="form-control" id="fname" placeholder="NIF" name="NIF">
                                </div>
                                <div class="col-md-2 ">
                                        <label for="cono1" class="control-label col-form-label">Peso Max</label>
                                        <input type="number" class="form-control" id="fname" placeholder="Peso Max" name="PESOMAX">
                                    </div>
                                <div class="col-md-2 ">
                                    <label for="cono1" class="  control-label col-form-label">Tarifa</label>
                                    <input type="number" class="form-control" id="fname" placeholder="Tarifa" name="TARIFA">
                                </div>
                                <div class="col-md-3 ">
                                        <label for="cono1" class="  control-label col-form-label">Matrícula</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Matrícula" name="MATRICULA">
                                    </div>
                            </div>
                            <div class="row d-flex justify-content-between ">
                                <div class="col-md-4">
                                    <label for="cono1" class="  control-label col-form-label">Nombre</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Nombre" name="NOMBRE">

                                </div>
                                <div class="col-md-4 ">
                                    <label for="cono1" class="control-label col-form-label">Teléfono</label>
                                    <input type="number" class="form-control" id="fname" placeholder="Teléfono" name="TELEFONO1">
                                </div>
                                <div class="col-md-4 ">
                                        <label for="cono1" class="control-label col-form-label">Email</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Email" name="EMAIL">
                                    </div>

                            </div>
                            <div class="row ">
                                <div class="col-md-5">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">Dirección</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Dirección" name="DIRECCION">
                                </div>
                                <div class="col">
                                        <label for="cono1" class="col-sm-3  control-label col-form-label">Autonomo</label>
                                        <div class="row">
                                                <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation1" name="AUTONOMO" value="Sí" required>
                                                        <label class="custom-control-label" for="customControlValidation1">Sí</label>
                                                    </div>
                                                     <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="AUTONOMO" value="No" required>
                                                        <label class="custom-control-label" for="customControlValidation2">No</label>
                                                    </div>
                                                     <!-- radio-stacked -->
                                        </div>
                                </div>
                                <div class="col">
                                        <label for="cono1" class="col-sm-3  control-label col-form-label">Modulo</label>
                                        <div class="row">
                                                <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation3" name="MODULO" value="Sí" required>
                                                        <label class="custom-control-label" for="customControlValidation3">Sí</label>
                                                    </div>
                                                     <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation4" name="MODULO" value="No" required>
                                                        <label class="custom-control-label" for="customControlValidation4">No</label>
                                                    </div>

                                        </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-2">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">CP</label>
                                    <input type="number" class="form-control" id="fname" placeholder="CP" name="CP">

                                </div>
                                <div class="col-md-6">
                                        <label for="cono1" class="col-sm-3  control-label col-form-label">Poblacion</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Población" name="POBLACION">

                                    </div>
                                    <div class="col">
                                        <label for="cono1" class="col  control-label col-form-label">Formas de pago</label>
                                        <div class="row">
                                                <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation5" name="FORMAPAGO" value="Talón" required>
                                                        <label class="custom-control-label" for="customControlValidation5">Talón</label>
                                                    </div>
                                                     <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation6" name="FORMAPAGO" value="Transferencia" required>
                                                        <label class="custom-control-label" for="customControlValidation6">Transferencia</label>
                                                    </div>

                                        </div>
                                </div>
                            </div>
                            <div class="row ">

                                <div class="col">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">Observaciones</label>
                                    <textarea class="form-control" name="OBSERVACIONES"></textarea>
                                </div>

                            </div>
                            <div class="row ">

                                <div class="col">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">Teléfono</label>
                                    <input type="number" class="form-control" id="fname" placeholder="Teléfono" name="TELEFONO2">
                                </div>
                                <div class="col">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">Móvil</label>
                                    <input type="number" class="form-control" id="fname" placeholder="Móvil" name="MOVIL">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="d-flex justify-content-end m-3">
                    <button class="btn btn-primary">Guardar</button>
                </div>
                </form>
                 <?php

                 }
                ?>

                <?php
                 if ($accion=="modificar"){
                ?>
                  <form method="POST">
                <div class="row">
                        <div class="col">
                            <h3>Montadores y transportistas</h3>
                            <div class="row ">
                                <div class="col-md-2">
                                    <label for="cono1" class="  control-label col-form-label">Codigo </label>
                                    <input type="number" class="form-control" id="fname" placeholder="Codigo" name="CODIGO" value="<?php echo $xcodigo; ?>">

                                </div>
                                <div class="col-md-3 ">
                                    <label for="cono1" class="control-label col-form-label">NIF</label>
                                    <input type="text" class="form-control" id="fname" placeholder="NIF" name="NIF" value="<?php echo $xnif; ?>">
                                </div>
                                <div class="col-md-2 ">
                                        <label for="cono1" class="control-label col-form-label">Peso Max</label>
                                        <input type="number" class="form-control" id="fname" placeholder="Peso Max" name="PESOMAX" value="<?php echo $xpesomax; ?>">
                                    </div>
                                <div class="col-md-2 ">
                                    <label for="cono1" class="  control-label col-form-label">Tarifa</label>
                                    <input type="number" class="form-control" id="fname" placeholder="Tarifa" name="TARIFA" value="<?php echo $xtarifa; ?>">
                                </div>
                                <div class="col-md-3 ">
                                        <label for="cono1" class="  control-label col-form-label">Matrícula</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Matrícula" name="MATRICULA" value="<?php echo $xmatricula; ?>">
                                    </div>
                            </div>
                            <div class="row d-flex justify-content-between ">
                                <div class="col-md-4">
                                    <label for="cono1" class="  control-label col-form-label">Nombre</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Nombre" name="NOMBRE" value="<?php echo $xnombre; ?>">

                                </div>
                                <div class="col-md-4 ">
                                    <label for="cono1" class="control-label col-form-label">Teléfono</label>
                                    <input type="number" class="form-control" id="fname" placeholder="Teléfono" name="TELEFONO1" value="<?php echo $xtelefono1; ?>">
                                </div>
                                <div class="col-md-4 ">
                                        <label for="cono1" class="control-label col-form-label">Email</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Email" name="EMAIL" value="<?php echo $xemail; ?>">
                                    </div>

                            </div>
                            <div class="row ">
                                <div class="col-md-5">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">Dirección</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Dirección" name="DIRECCION" value="<?php echo $xdireccion; ?>">
                                </div>
                                <div class="col">
                                        <label for="cono1" class="col-sm-3  control-label col-form-label">Autonomo</label>
                                        <div class="row">
                                                <div class="custom-control custom-radio m-2">
                                                       <?php
                                                          if ($xautonomo=="No"){
                                                        ?>
                                                        <input type="radio" class="custom-control-input" id="customControlValidation1" name="AUTONOMO" value="Sí" required>
                                                        <label class="custom-control-label" for="customControlValidation1">Sí</label>
                                                 </div>
                                                 <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="AUTONOMO" value="No" checked>
                                                        <label class="custom-control-label" for="customControlValidation2">No</label>
                                                    </div>
                                                        <?php

                                                         }else{
                                                        ?>
                                                         <input type="radio" class="custom-control-input" id="customControlValidation1" name="AUTONOMO" value="Sí" checked>
                                                        <label class="custom-control-label" for="customControlValidation1">Sí</label>
                                                 </div>
                                                 <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="AUTONOMO" value="No" required>
                                                        <label class="custom-control-label" for="customControlValidation2">No</label>
                                                    </div>
                                                        <?php
                                                          }
                                                        ?>


                                                     <!-- radio-stacked -->
                                        </div>
                                </div>
                                <div class="col">
                                        <label for="cono1" class="col-sm-3  control-label col-form-label">Modulo</label>
                                        <div class="row">
                                              <?php
                                                if ($xmodulo=="No"){
                                              ?>
                                                <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation3" name="MODULO" value="Sí" required>
                                                        <label class="custom-control-label" for="customControlValidation3">Sí</label>
                                                    </div>
                                                     <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation4" name="MODULO" value="No" checked>
                                                        <label class="custom-control-label" for="customControlValidation4">No</label>
                                                    </div>
                                               <?php
                                                  }else{
                                               ?>
                                                   <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation3" name="MODULO" value="Sí" checked>
                                                        <label class="custom-control-label" for="customControlValidation3">Sí</label>
                                                    </div>
                                                     <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation4" name="MODULO" value="No" required>
                                                        <label class="custom-control-label" for="customControlValidation4">No</label>
                                                    </div>
                                               <?php
                                                 }
                                               ?>

                                        </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-2">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">CP</label>
                                    <input type="number" class="form-control" id="fname" placeholder="CP" name="CP" value="<?php echo $xcp; ?>">

                                </div>
                                <div class="col-md-6">
                                        <label for="cono1" class="col-sm-3  control-label col-form-label">Poblacion</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Población" name="POBLACION" value="<?php echo $xpoblacion; ?>">

                                    </div>
                                    <div class="col">
                                        <label for="cono1" class="col  control-label col-form-label">Formas de pago</label>
                                        <div class="row">

                                               <?php
                                                 if ($xformapago=="Transferencia"){
                                                ?>
                                                <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation5" name="FORMAPAGO" value="Talón" required>
                                                        <label class="custom-control-label" for="customControlValidation5">Talón</label>
                                                    </div>
                                                     <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation6" name="FORMAPAGO" value="Transferencia" checked>
                                                        <label class="custom-control-label" for="customControlValidation6">Transferencia</label>
                                                    </div>
                                              <?php
                                                }else{
                                              ?>
                                                <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation5" name="FORMAPAGO" value="Talón" checked>
                                                        <label class="custom-control-label" for="customControlValidation5">Talón</label>
                                                    </div>
                                                     <div class="custom-control custom-radio m-2">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation6" name="FORMAPAGO" value="Transferencia" required>
                                                        <label class="custom-control-label" for="customControlValidation6">Transferencia</label>
                                                    </div>
                                              <?php

                                                }
                                              ?>

                                        </div>
                                </div>
                            </div>
                            <div class="row ">

                                <div class="col">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">Observaciones</label>
                                    <textarea class="form-control" name="OBSERVACIONES"><?php echo $xobservaciones; ?></textarea>
                                </div>

                            </div>
                            <div class="row ">

                                <div class="col">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">Teléfono</label>
                                    <input type="number" class="form-control" id="fname" placeholder="Teléfono" name="TELEFONO2" value="<?php echo $xtelefono2; ?>">
                                </div>
                                <div class="col">
                                    <label for="cono1" class="col-sm-3  control-label col-form-label">Móvil</label>
                                    <input type="number" class="form-control" id="fname" placeholder="Móvil" name="MOVIL" value="<?php echo $xmovil; ?>">
                                </div>
                            </div>
                        </div>


                    </div>

                 <input type="hidden" name="modificar" id="modificar" value="<?php echo $xno_pedido; ?>" />
                <div class="d-flex justify-content-end m-3">
                    <button class="btn btn-danger" onclick="return borrar();">Borrar Registro</button>
                    <span>&nbsp;&nbsp;</span>
                    <button class="btn btn-primary">Guardar Edición</button>
                </div>
                <input type="hidden" name="borrarreg" id="borrarreg" value="" />

                </form>
                <?php
                  }
                ?>




                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
               <!-- añadiremos la tabla para mostrar los resultados -->
               <form method="POST">
               <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Datos Guardados</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>NIF</th>
                                        <th>Peso Max.</th>
                                        <th>Tarifa</th>
                                        <th>Matrícula</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Dirección</th>
                                        <th>Autonomo</th>
                                        <th>Módulo</th>
                                        <th>Cp</th>
                                        <th>Población</th>
                                        <th>Forma Pago</th>
                                        <th>Observaciones</th>
                                        <th>Teléfono</th>
                                        <th>Móvil</th>
                                        <th>Acción</th>


                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($resultado as $dato):  ?>
                                    <tr>
                                        <td> <?php echo $dato['codigo']  ?></td>
                                        <td><?php echo $dato['nif']  ?></td>
                                        <td><?php echo $dato['pesomax']  ?></td>
                                        <td><?php echo $dato['tarifa']  ?></td>
                                        <td><?php echo utf8_encode($dato['matricula'])  ?></td>
                                        <td><?php echo utf8_encode($dato['nombre'])  ?></td>
                                        <td><?php echo $dato['telefono1']  ?></td>
                                        <td><?php echo $dato['email']  ?></td>
                                        <td><?php echo utf8_encode($dato['direccion'])  ?></td>
                                        <td><?php echo utf8_encode($dato['autonomo'])  ?></td>
                                        <td><?php echo utf8_encode($dato['modulo'])  ?></td>
                                        <td><?php echo $dato['cp']  ?></td>
                                        <td><?php echo utf8_encode($dato['poblacion'])  ?></td>
                                        <td><?php echo utf8_encode($dato['formapago'])  ?></td>
                                        <td><?php echo utf8_encode($dato['observaciones'])  ?></td>
                                        <td><?php echo $dato['telefono2']  ?></td>
                                        <td><?php echo $dato['movil']  ?></td>
                                        <td><button  class="btn btn-info" onclick="item(<?php echo $dato['codigo']  ?>)" >Editar</button></td>

                                    </tr>
                                 <?php endforeach?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <input type="hidden" id="editar" name="editar" value="55" />
                </form>


            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Todos los derechos reservados a B2D</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>

</body>

</html>
