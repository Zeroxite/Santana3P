<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;


    if($valid == 1) {

		//Saving data into the main table tbl_end_category
		
	
    	$success_message = 'Gama añadida correctamente.';
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Añadir gama</h1>
	</div>
	<div class="content-header-right">
		<a href="gama.php" class="btn btn-primary btn-sm">Ver Todas</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
			
			<p>
			<?php echo $error_message; ?>
			</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Nombre de Gama <span>*</span></label>
				
							<div class="col-sm-4">
								<input type="text" class="form-control" name="ecat_name">
							</div>
							
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Puntos <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="ecat_name">
							</div>
						</div>
					
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Añadir</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>