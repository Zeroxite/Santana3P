<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Gama</h1>
	</div>
	<div class="content-header-right">
		<a href="gama-add.php" class="btn btn-primary btn-sm">Añadir</a>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr>
			        <th>#</th>
			        <th>Nombre</th>
                    <th>Puntos</th>
			        <th>Action</th>
			    </tr>
			</thead>
          
          </table>
        </div>
      </div>
  

</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmar eliminación</h4>
            </div>
            <div class="modal-body">
                <p>Está seguro??</p>
                <p style="color:red;">Cuidado, borrará los productos de esta gama.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>