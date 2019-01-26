<?php
$accion="registrar";
include_once 'conexion.php';

$sql_leer = 'SELECT * FROM empresas';
//nos creamos una variable como en la documentacion $gsent la cual le pasamos la variable $pdo (conexion) la cual tenia el usuario y demas
// y le decimos que ejecute sql_leer
$gsent= $pdo->prepare($sql_leer);
//ejecutamos todo lo que hay arriba.
$gsent->execute();
$resultado = $gsent ->fetchAll();
// var_dump($resultado);
//********************************* */

//******AGREGAR DATOS A LA DB****** */

if($_POST AND !isset($_POST['editar']) AND !isset($_POST['modificar']) AND !isset($_POST['borrarreg']) ){
    $codigo_i= $_POST['CODIGO'];
    $cif_i= $_POST['CIF'];
    $tarifa_i=$_POST['TARIFA'];
    $formapago_i=utf8_decode($_POST['FORMAPAGO']);
    $serie_i=$_POST['SERIE'];
    $nombre_i=utf8_decode($_POST['NOMBRE']);
    $direccion_i=utf8_decode($_POST['DIRECCION']);
    $provincia_i=utf8_decode($_POST['PROVINCIA']);
    $observaciones_i=utf8_decode($_POST['OBSERVACIONES']);
    $telefono1_i=$_POST['TELEFONO1'];
    $movil_i=$_POST['MOVIL'];

    $nombre2_i=utf8_decode($_POST['NOMBRE2']);
    $direccion2_i=utf8_decode($_POST['DIRECCION2']);
    $poblacion2_i=utf8_decode($_POST['POBLACION2']);
    $provincia2_i=utf8_decode($_POST['PROVINCIA2']);
    $telefono2_i=$_POST['TELEFONO2'];
    $observaciones2_i=utf8_decode($_POST['OBSERVACIONES2']);






    //agregaremos los datos a la base de datos
    //$sql_agregar_db= 'INSERT INTO pedidos (no_pedido,fecha,empresa) VALUE (?,?,?)';
    $sql_agregar_db= 'INSERT INTO empresas (CODIGO,CIF,TARIFA,FORMAPAGO,SERIE,NOMBRE,DIRECCION,PROVINCIA,OBSERVACIONES,TELEFONO1,MOVIL,NOMBRE2,DIRECCION2,POBLACION2,PROVINCIA2,TELEFONO2,OBSERVACIONES2) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
   // $sql_agregar_db= 'INSERT INTO pedidos (PEDIDO,FECHA,EMPRESA,DEPARTAMENTO,CONTRATO) VALUE (?,?,?,?)';
    // INSERT INTO `b2d`(`pedido`, `fecha`, `empresa`, `departamento`, `contrato`, `observaciones`, `cliente`, `direccion`, `cp`, `poblacion`, `provincia`, `telefono`, `movil`, `email`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])
    $agregar_db = $pdo -> prepare($sql_agregar_db);
    //$agregar_db->execute(array($pedido_i,$fecha_i,$empresa_i));
    $agregar_db->execute(array($codigo_i,$cif_i,$tarifa_i,$formapago_i,$serie_i,$nombre_i,$direccion_i,$provincia_i,$observaciones_i,$telefono1_i,$movil_i,$nombre2_i,$direccion2_i,$poblacion2_i,$provincia2_i,$telefono2_i,$observaciones2_i));
    // $agregar_db =null;
    // $pdo = null;
    // header('location:contenido.php');

    //Nuevo 27/12/2018, para actualizar la lista.
    $sql_leer = 'SELECT * FROM empresas';
    $gsent= $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent ->fetchAll();

  }


  if($_POST AND isset($_POST['editar'])){
    if (isset($_POST['editar'])){
        $codbus= $_POST['editar'];
        $accion="modificar";
        $sql_buscar_db= 'SELECT * FROM empresas WHERE codigo='.$codbus;
        $gbusca= $pdo->prepare($sql_buscar_db);
        $gbusca->execute();
        //$total=num_rows($gbusca);
        $xno_pedido=$codbus;
        $resultado2 = $gbusca ->fetchAll();
        foreach($resultado2 as $dato2):
             $xcodigo=$dato2['codigo'];
             $xcif=$dato2['cif'];
             $xtarifa=$dato2['tarifa'];
             $xformapago=utf8_encode($dato2['formapago']);
             $xserie=utf8_encode($dato2['serie']);
             $xnombre=utf8_encode($dato2['nombre']);
             $xdireccion=utf8_encode($dato2['direccion']);
             $xprovincia=utf8_encode($dato2['provincia']);
             $xobservaciones=utf8_encode($dato2['observaciones']);
             $xtelefono1=$dato2['telefono1'];
             $xmovil=$dato2['movil'];
             $xnombre2=utf8_encode($dato2['nombre2']);
             $xdireccion2=utf8_encode($dato2['direccion2']);
             $xpoblacion2=utf8_encode($dato2['poblacion2']);
             $xprovincia2=utf8_encode($dato2['provincia2']);
             $xobservaciones2=utf8_encode($dato2['observaciones2']);
             $xtelefono2=$dato2['telefono2'];








         endforeach;

    }
    }

   if($_POST AND isset($_POST['modificar'])){

        $codigo_i= $_POST['CODIGO'];
        $cif_i= $_POST['CIF'];
        $tarifa_i=$_POST['TARIFA'];
        $formapago_i=utf8_decode($_POST['FORMAPAGO']);
        $serie_i=$_POST['SERIE'];
        $nombre_i=utf8_decode($_POST['NOMBRE']);
        $direccion_i=utf8_decode($_POST['DIRECCION']);
        $provincia_i=utf8_decode($_POST['PROVINCIA']);
        $observaciones_i=utf8_decode($_POST['OBSERVACIONES']);
        $telefono1_i=$_POST['TELEFONO1'];
        $movil_i=$_POST['MOVIL'];

        $nombre2_i=utf8_decode($_POST['NOMBRE2']);
        $direccion2_i=utf8_decode($_POST['DIRECCION2']);
        $poblacion2_i=utf8_decode($_POST['POBLACION2']);
        $provincia2_i=utf8_decode($_POST['PROVINCIA2']);
        $telefono2_i=$_POST['TELEFONO2'];
        $observaciones2_i=utf8_decode($_POST['OBSERVACIONES2']);

        $sql="UPDATE empresas SET codigo=".$codigo_i.",cif='".$cif_i."',tarifa=".$tarifa_i.",formapago='".$formapago_i."',serie='".$serie_i."',direccion='".$direccion_i."',provincia='".$provincia_i."'
        ,observaciones='".$observaciones_i."',telefono1=".$telefono1_i.",movil=".$movil_i.",nombre2='".$nombre2_i."',nombre='".$nombre_i."',direccion2='".$direccion2_i."'
        ,poblacion2='".$poblacion2_i."',telefono2=".$telefono2_i.",observaciones2='".$observaciones2_i."'   WHERE codigo=".$codigo_i;
        $gmod= $pdo->prepare($sql);
        $gmod->execute();


        //Nuevo 27/12/2018, para actualizar la lista.
        $sql_leer = 'SELECT * FROM empresas';
        $gsent= $pdo->prepare($sql_leer);
        $gsent->execute();
        $resultado = $gsent ->fetchAll();


   }


   if($_POST AND isset($_POST['borrarreg'])){
       $res=$_POST['borrarreg'];
       if ($res=="si"){
           $codigo_i= $_POST['CODIGO'];
           $sql="DELETE FROM empresas WHERE codigo=".$codigo_i;
           $geli= $pdo->prepare($sql);
           $geli->execute();
        }


       //Nuevo 27/12/2018, para actualizar la lista.
        $sql_leer = 'SELECT * FROM empresas';
        $gsent= $pdo->prepare($sql_leer);
        $gsent->execute();
        $resultado = $gsent ->fetchAll();

   }




?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

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
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
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
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light"
                                href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
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
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i
                                        class="ti-close"></i></a>
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
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg"
                                    alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">



                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i>
                                    Salir</a>
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
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pedidos.php"
                                aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Pedidos</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="empresasytarifas.php"
                                aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Empresas
                                    y tarifas</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="transportistas.php"
                                aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Montadores Y transportistas</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Facturar</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Liquidar</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Sin
                                    Facturar </span></a>

                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Sin
                                    Liquidar</span></a></li>

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
                        <h4 class="page-title">Empresas</h4>
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
                        <h3>Empresas</h3>
                        <div class="row ">
                            <div class="col-md-4">
                                <label for="cono1" class="  control-label col-form-label">Codigo Cliente</label>
                                <input type="number" class="form-control" id="fname" placeholder="Codigo cliente" name="CODIGO">

                            </div>
                            <div class="col-md-4 ">
                                <label for="cono1" class="control-label col-form-label">CIF</label>
                                <input type="text" class="form-control" id="fname" placeholder="CIF" name="CIF">
                            </div>
                            <div class="col-md-4 ">
                                <label for="cono1" class="  control-label col-form-label">Tarifa</label>
                                <input type="number" class="form-control" id="fname" placeholder="Tarifa" name="TARIFA">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between ">
                            <div class="col-md-8">
                                <label for="cono1" class="  control-label col-form-label">Forma de pago</label>
                                <input type="text" class="form-control" id="fname" placeholder="Forma de pago" name="FORMAPAGO">

                            </div>
                            <div class="col-md-4 ">
                                <label for="cono1" class="control-label col-form-label">Serie</label>
                                <input type="text" class="form-control" id="fname" placeholder="Serie" name="SERIE">
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Nombre</label>
                                <input type="text" class="form-control" id="fname" placeholder="Nombre" name="NOMBRE">
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Dirección</label>
                                <input type="text" class="form-control" id="fname" placeholder="Dirección" name="DIRECCION">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Provincia</label>
                                <input type="text" class="form-control" id="fname" placeholder="Provincia" name="PROVINCIA">

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
                                <input type="number" class="form-control" id="fname" placeholder="Teléfono" name="TELEFONO1">
                            </div>
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Móvil</label>
                                <input type="number" class="form-control" id="fname" placeholder="Móvil" name="MOVIL">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <h3>Departamento/tiendas</h3>
                        <div class="row  d-flex justify-content-between">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Nombre</label>
                                <input type="text" class="form-control" id="fname" placeholder="Nombre" name="NOMBRE2">

                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Dirección</label>
                                <input type="text" class="form-control" id="fname" placeholder="Dirección" name="DIRECCION2">
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col  control-label col-form-label">Poblacion</label>
                                <input type="text" class="form-control  " id="fname" placeholder="Poblacion" name="POBLACION2">


                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Provincia</label>
                                <input type="text" class="form-control" id="fname" placeholder="Provincia" name="PROVINCIA2">

                            </div>
                        </div>
                        <div class="row ">

                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Teléfono</label>
                                <input type="number" class="form-control" id="fname" placeholder="Teléfono" name="TELEFONO2">
                            </div>

                        </div>
                        <div class="row ">

                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Observaciones</label>
                                <textarea class="form-control" name="OBSERVACIONES2"></textarea>
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
                        <h3>Empresas</h3>
                        <div class="row ">
                            <div class="col-md-4">
                                <label for="cono1" class="  control-label col-form-label">Codigo Cliente</label>
                                <input type="number" class="form-control" id="fname" placeholder="Codigo cliente" name="CODIGO" value="<?php echo $xcodigo; ?>">

                            </div>
                            <div class="col-md-4 ">
                                <label for="cono1" class="control-label col-form-label">CIF</label>
                                <input type="text" class="form-control" id="fname" placeholder="CIF" name="CIF" value="<?php echo $xcif; ?>">
                            </div>
                            <div class="col-md-4 ">
                                <label for="cono1" class="  control-label col-form-label">Tarifa</label>
                                <input type="number" class="form-control" id="fname" placeholder="Tarifa" name="TARIFA" value="<?php echo $xtarifa; ?>">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between ">
                            <div class="col-md-8">
                                <label for="cono1" class="  control-label col-form-label">Forma de pago</label>
                                <input type="text" class="form-control" id="fname" placeholder="Forma de pago" name="FORMAPAGO" value="<?php echo $xformapago; ?>">

                            </div>
                            <div class="col-md-4 ">
                                <label for="cono1" class="control-label col-form-label">Serie</label>
                                <input type="text" class="form-control" id="fname" placeholder="Serie" name="SERIE" value="<?php echo $xserie; ?>">
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Nombre</label>
                                <input type="text" class="form-control" id="fname" placeholder="Nombre" name="NOMBRE" value="<?php echo $xnombre; ?>">
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Dirección</label>
                                <input type="text" class="form-control" id="fname" placeholder="Dirección" name="DIRECCION" value="<?php echo $xdireccion; ?>">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Provincia</label>
                                <input type="text" class="form-control" id="fname" placeholder="Provincia" name="PROVINCIA" value="<?php echo $xprovincia; ?>">

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
                                <input type="number" class="form-control" id="fname" placeholder="Teléfono" name="TELEFONO1" value="<?php echo $xtelefono1; ?>">
                            </div>
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Móvil</label>
                                <input type="number" class="form-control" id="fname" placeholder="Móvil" name="MOVIL" value="<?php echo $xmovil; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <h3>Departamento/tiendas</h3>
                        <div class="row  d-flex justify-content-between">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Nombre</label>
                                <input type="text" class="form-control" id="fname" placeholder="Nombre" name="NOMBRE2" value="<?php echo $xnombre2; ?>">

                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Dirección</label>
                                <input type="text" class="form-control" id="fname" placeholder="Dirección" name="DIRECCION2" value="<?php echo $xdireccion2; ?>">
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col  control-label col-form-label">Poblacion</label>
                                <input type="text" class="form-control  " id="fname" placeholder="Poblacion" name="POBLACION2" value="<?php echo $xpoblacion2; ?>">


                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Provincia</label>
                                <input type="text" class="form-control" id="fname" placeholder="Provincia" name="PROVINCIA2" value="<?php echo $xprovincia2; ?>">

                            </div>
                        </div>
                        <div class="row ">

                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Teléfono</label>
                                <input type="number" class="form-control" id="fname" placeholder="Teléfono" name="TELEFONO2" value="<?php echo $xtelefono2; ?>">
                            </div>

                        </div>
                        <div class="row ">

                            <div class="col">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Observaciones</label>
                                <textarea class="form-control" name="OBSERVACIONES2"><?php echo $xobservaciones2; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

               <input type="hidden" name="modificar" id="modificar" value="<?php echo $xcodigo; ?>" />
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
               <form method="POST">
                 <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Datos Guardados</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>CIF</th>
                                        <th>Tarifa</th>
                                        <th>Forma Pago</th>
                                        <th>Serie</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Provincia</th>
                                        <th>Observaciones</th>
                                        <th>Teléfono</th>
                                        <th>Móvil</th>
                                        <th>Dep. Nombre</th>
                                        <th>Dirección</th>
                                        <th>Población</th>
                                        <th>Provincia</th>
                                        <th>Teléfono</th>
                                        <th>Observaciones</th>
                                        <th>Acción</th>



                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($resultado as $dato):  ?>
                                    <tr>
                                        <td> <?php echo $dato['codigo']  ?></td>
                                        <td><?php echo $dato['cif']  ?></td>
                                        <td><?php echo $dato['tarifa']  ?></td>
                                        <td><?php echo utf8_encode($dato['formapago'])  ?></td>
                                        <td><?php echo utf8_encode($dato['serie'])  ?></td>
                                        <td><?php echo utf8_encode($dato['nombre'])  ?></td>
                                        <td><?php echo utf8_encode($dato['direccion'])  ?></td>
                                        <td><?php echo utf8_encode($dato['provincia'])  ?></td>
                                        <td><?php echo utf8_encode($dato['observaciones'])  ?></td>
                                        <td><?php echo $dato['telefono1']  ?></td>
                                        <td><?php echo $dato['movil']  ?></td>
                                        <td><?php echo utf8_encode($dato['nombre2'])  ?></td>
                                        <td><?php echo utf8_encode($dato['direccion2'])  ?></td>
                                        <td><?php echo utf8_encode($dato['poblacion2'])  ?></td>
                                        <td><?php echo utf8_encode($dato['provincia2'])  ?></td>
                                        <td><?php echo $dato['telefono2']  ?></td>
                                        <td><?php echo utf8_encode($dato['observaciones2'])  ?></td>
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
