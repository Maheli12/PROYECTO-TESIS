<?php
include("php/dbconnect.php");
include("php/checklogin.php");
$error = '';
if(isset($_POST['save']))
{

$antpassword = mysqli_real_escape_string($conn,$_POST['antigua Contraseña']);
$nuevpassword = mysqli_real_escape_string($conn,$_POST['nueva Contraseña]);
$sql = "select * from user where id= '".$_SESSION['rainbow_uid']."' and password='".md5($antpassword )."'";
$q = $conn->query($sql);
if($q->num_rows>0)
{

$sql = "actualizar la contraseña establecida por el usuario ='".md5($nuevpassword)."' WHERE id = '".$_SESSION['rainbow_uid']."'";
$r = $conn->query($sql);
echo '<script type="text/javascript">window.location="configuracion.php?act=1"; </script>';
}else
{
$error = '<div class="alerta alerta-peligro">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> contraseña antigua incorrecta</strong>
</div>';
}

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema de Pago</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
	<script src="js/jquery-1.10.2.js"></script>
	
	<script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
	
</head>
<?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Configuración</h1>
                     
<?php
if(isset($_REQUEST['act']) &&  @$_REQUEST['act']=='1')
{
echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Excelente!</strong> Cambio de Contraseña Exitoso.
</div>';

}
echo $error;
?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
				
                    <div class="col-sm-8 col-sm-offset-2">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                          Cambio de Contraseña
                        </div>
						<form action="Configuración.php" method="post" id="signupForm1" class="form-horizontal">
                        <div class="panel-body">
						
						
						
						
						<div class="form-group">
								<label class="col-sm-4 control-label" for="Old">Antigüa Contraseña</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="antpassword" name="antpassword"  />
								</div>
							</div>
							
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="Password"> Nueva Contraseña</label>
								<div class="col-sm-5">
									 <input class="form-control" name="nuevpassword" id="nuevpassword" type="password">
								</div>
							</div>
							
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="Confirm">Confirmar Contraseña</label>
								<div class="col-sm-5">
									   <input class="form-control" name="confirmpassword" type="password">
								</div>
							</div>
						
						<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<button type="entregar" name="Guardar" class="btn btn-primary">Guardar </button>
								</div>
							</div>
                         
                           
                           
                         
                           
                         </div>
							</form>
							
                        </div>
                            </div>
            
			
                </div>
                <!-- /. ROW  -->

            
            </div>
        </div>
    </div>
    

    <div id="footer-sec">
    	    </div>
   
  
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>
    
		<script type="text/javascript">
		

		$( document ).ready( function () {			
			
			$( "#signupForm1" ).validate( {
				rules: {
					antpassword: "required",
				
					nuevpassword: {
						requerido: true,
						caractermin 6
					},
					
					confirmpassword: {
						requerido: true,
						caractermin: 6,
						igual_a: "#newpassword"
					}
				},
				messages: {
					antpassword: "Ingrese su contraseña anterior",
					
					nuevpassword: {
						requerido: "Por favor ingrese una contraseña",
						caractermin: "Tu contraseña debe tener al menos 6 caracteres"
					},
					confirmpassword: {
						requerido: "Por favor ingrese una contraseña",
						caractermin: "Tu contraseña debe tener al menos 6 caracteres",
						igual_a: "Ingrese la misma contraseña que la anterior"
					}
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Agrega la clase `help-block` al elemento de error
					error.addClass( "help-block" );

					// Agrega la clase `has-feedback` al grupo div.form-group padre
                    // para agregar íconos a las entradas
					element.parents( ".col-sm-5" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Agregue el elemento span, si no existe, y aplíquele las clases de iconos. el insert aferter actualiza las tablas
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Agregue el elemento span, si no existe, y aplíquele las clases de iconos.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
	</script>


</body>
</html>
