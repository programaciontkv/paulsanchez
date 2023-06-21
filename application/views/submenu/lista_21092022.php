<section class="content-header">
	<form id="exp_excel" style="float:right;padding:0px;margin: 0px;" method="post" action="<?php echo base_url();?>submenu/excel/<?php echo $permisos->opc_id?>" onsubmit="return exportar_excel()"  >
        	<input type="submit" value="EXCEL" class="btn btn-success" />
        	<input type="hidden" id="datatodisplay" name="datatodisplay">
       	</form>
      <h1>
        Submenus
      </h1>
</section>
<section class="content">
	<div class="box box-solid">
		<div class="box box-body">
			<div class="row">
				<?php
					if ($usu_sesion == 1){
				?>
				<div class="col-md-12">
					<a href="<?php echo base_url();?>submenu/nuevo" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Crear submenu</a>
				</div>
				<?php	}?>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<table id="tbl_list" class="table table-bordered table-list table-hover">
						<thead>
							<th>No</th>
							<th>Nombre</th>
							<th>Orden</th>
							<th>Estado</th>
							<th>Acciones</th>
						</thead>
						<tbody>
						<?php 
						$n=0;
						if(!empty($submenus)){
							foreach ($submenus as $submenu) {
								$n++;
						?>
							<tr>
								<td><?php echo $n?></td>
								<td><?php echo $submenu->sbm_nombre?></td>
								<td><?php echo $submenu->sbm_orden?></td>
								<td><?php echo $submenu->est_descripcion?></td>
								<td align="center">
									<div class="btn-group">
										
										<?php
										if($permisos->rop_reporte){
										?>
										<button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo base_url();?>submenu/visualizar/<?php echo $submenu->sbm_id?>"><span class="fa fa-eye"></span>
							            </button>
							            <?php
							        	}
										if($permisos->rop_actualizar){
										?>
										<a href="<?php echo base_url();?>submenu/editar/<?php echo $submenu->sbm_id?>" class="btn btn-primary"> <span class="fa fa-edit"></span></a>
										<?php 
										}
										if($permisos->rop_eliminar && $usu_sesion == 1 ){
										?>
										<a href="<?php echo base_url();?>submenu/eliminar/<?php echo $submenu->sbm_id?>/<?php echo $submenu->sbm_nombre?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
										<?php 
										}
										?>
									</div>
								</td>
							</tr>
						<?php
							}
						}
						?>
						</tbody>
					</table>
				</div>	
			</div>
		</div>
	</div>


</section>

<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Submenu</h4>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
</div>