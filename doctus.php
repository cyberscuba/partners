<?php
            include("class/files.php");
            require_once("class/".$conf.".".$ext);
            require_once("class/".$ppal.".".$ext);
         
            $usuariop = $_GET['vt'];
            $contrl = 1;
            $Muestra = new Muestra();
            require_once($info.".".$ext);
           
            $userss = $Muestra->get_users5($usuariop);
            foreach ($userss as $row){
                $name_user = $row['name_user']. " ".$row['ape_user']; 
            }
if($user != 1){
    
    echo "No tienes permisos para acceder a este apartado";die();
}

if($usuariop <= 0){
    
    echo "Algo no esta bien, vuelve al panel central";die();
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
    /*    --------------------------------------------------
	:: General
	-------------------------------------------------- */
body {
	font-family: 'Open Sans', sans-serif;
	color: #353535;
}
.content h1 {
	text-align: center;
}
.content .content-footer p {
	color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
.content .content-footer p a {
	color: inherit;
	font-weight: bold;
}

/*	--------------------------------------------------
	:: Table Filter
	-------------------------------------------------- */
.panel {
	border: 1px solid #ddd;
	background-color: #fcfcfc;
}
.panel .btn-group {
	margin: 15px 0 30px;
}
.panel .btn-group .btn {
	transition: background-color .3s ease;
}
.table-filter {
	background-color: #fff;
	border-bottom: 1px solid #eee;
}
.table-filter tbody tr:hover {
	cursor: pointer;
	background-color: #eee;
}
.table-filter tbody tr td {
	padding: 10px;
	vertical-align: middle;
	border-top-color: #eee;
}
.table-filter tbody tr.selected td {
	background-color: #eee;
}
.table-filter tr td:first-child {
	width: 38px;
}
.table-filter tr td:nth-child(2) {
	width: 35px;
}
.ckbox {
	position: relative;
}
.ckbox input[type="checkbox"] {
	opacity: 0;
}
.ckbox label {
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
.ckbox label:before {
	content: '';
	top: 1px;
	left: 0;
	width: 18px;
	height: 18px;
	display: block;
	position: absolute;
	border-radius: 2px;
	border: 1px solid #bbb;
	background-color: #fff;
}
.ckbox input[type="checkbox"]:checked + label:before {
	border-color: #2BBCDE;
	background-color: #2BBCDE;
}
.ckbox input[type="checkbox"]:checked + label:after {
	top: 3px;
	left: 3.5px;
	content: '\e013';
	color: #fff;
	font-size: 11px;
	font-family: 'Glyphicons Halflings';
	position: absolute;
}
.table-filter .star {
	color: #ccc;
	text-align: center;
	display: block;
}
.table-filter .star.star-checked {
	color: #F0AD4E;
}
.table-filter .star:hover {
	color: #ccc;
}
.table-filter .star.star-checked:hover {
	color: #F0AD4E;
}
.table-filter .media-photo {
	width: 35px;
}
.table-filter .media-body {
    display: block;
    /* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
}
.table-filter .media-meta {
	font-size: 11px;
	color: #999;
}
.table-filter .media .title {
	color: #2BBCDE;
	font-size: 14px;
	font-weight: bold;
	line-height: normal;
	margin: 0;
}
.table-filter .media .title span {
	font-size: .8em;
	margin-right: 20px;
}
.table-filter .media .title span.pagado {
	color: #5cb85c;
}
.table-filter .media .title span.pendiente {
	color: #f0ad4e;
}
.table-filter .media .title span.cancelado {
	color: #d9534f;
}
.table-filter .media .summary {
	font-size: 14px;
}
</style>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Documentos - <?php echo $cpny ?></title>
 <?php echo $favicon  ?>
<div class="container">
	<div class="row">
	    
	    <?php
	    $conectar = new mysql;  
        $conectar->__construct();
	    $rop = $conectar->_db->query("SELECT * FROM security_users WHERE ID = '$usuariop'");
	    ?>

		<section class="content">
			<h2 align="center">Información del usuario: <?php echo $name_user ?></h2>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
					
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
								    <?php 
								 
								    while($rtt = mysqli_fetch_array($rop)){ ?>
									<tr data-status="pagado">
										
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="assets/img/creferidos.png" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right"><?php echo $rtt['bill'] ?></span>
													<h4 class="title">
														Wallet Bitcoin Personal:
													<a href="<?php echo $rtt['url'] ?>" download>	<span class="pull-right pagado"></span> </a>
													</h4>
													<p class="summary">Enlace del archivo: 	<a href="<?php echo $rtt['url'] ?>">https://www.socialtradingsystem.com/partners/<?php echo $rtt['url'] ?></a></p>
												</div>
											</div>
										</td>
									</tr>
								     <?php } ?>
									</tr>
								</tbody>
							</table>
							
						</div>
						
					</div>
				</div>
			<a href="dash_users" class="btn btn-info"> < Volver al panel</a>
			</div>
		</section>
		
	</div>
</div>