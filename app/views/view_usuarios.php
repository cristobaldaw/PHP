<div class="container">
	<div class="col-md-4">
		<div class="list-group">
			<a class="list-group-item disabled text-md-center list-inverse">
			Opciones
			</a>
			<a href="" class="list-group-item" data-toggle="modal" data-target="#anadir">Añadir usuario</a>
		</div>
	</div>
	<div class="col-md-8">
		<table class="table table-bordered">
			<thead class="table-inverse">
				<tr>
					<th class="text-md-center" class="text-md-center" class="text-md-center">Usuario</th>
					<th class="text-md-center" class="text-md-center">Contraseña</th>
					<th class="text-md-center">Tipo de usuario</th>
					<th class="text-md-center">Opciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($usuarios as $usuario) { ?>
				<tr>
					<td><?=$usuario['usuario']?></td>
					<td><?=$usuario['pass']?></td>
					<td><?=TipoUsuario($usuario['tipo'])?></td>
					<td><button type="button" class="btn btn-danger btn-sm" title="Eliminar" data-toggle="modal" data-target="#eliminar" data-usuario="<?=$usuario['usuario']?>" data-pass="<?=$usuario['pass']?>" data-tipo="<?=TipoUsuario($usuario['tipo'])?>" data-id="<?=$usuario['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
				</tr> <?php
			} ?>
			</tbody>
		</table>
	</div>
</div>


<!-- Modal añadir -->
<div class="modal fade" id="anadir" tabindex="-1" role="dialog" aria-labelledby="anadir" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-md-center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Introduzca los datos del nuevo usuario</strong>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="row">
						<div class="form-group col-md-8 offset-md-2">
							<label for="usuario">Usuario</label>
							<input type="text" class="form-control" name="usuario">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-8 offset-md-2">
							<label for="pass">Contraseña</label>
							<input type="password" class="form-control" name="pass">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-8 offset-md-2">
							<label for="tipo">Tipo de usuario</label><br>
							<?= CreaRadio("tipo", $tipos) ?>
						</div>
					</div>
					<div class="text-md-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" name="btn_anadir">Aceptar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal eliminar -->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="eliminar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-md-center">¿Desea eliminar este usuario?</h4>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group text-md-center">
						<h4 class="txt_usuario"></h4>
						<h4 class="txt_pass"></h4>
						<h4 class="txt_tipo"></h4>
						<input type="hidden" class="hidden_id" name="hidden_id">
					</div>
					<div class="text-md-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" name="btn_eliminar">Eliminar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script>
	$('#eliminar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var usuario = button.data('usuario') // Extract info from data-* attributes
  var pass = button.data('pass')
  var tipo = button.data('tipo')
  var id = button.data('id')
  var modal = $(this)
  modal.find('.txt_usuario').html("<strong>Usuario: </strong>" + usuario)
  modal.find('.txt_pass').html("<strong>Contraseña: </strong>" + pass)
  modal.find('.txt_tipo').html("<strong>Tipo de usuario: </strong>" + tipo)
  modal.find('.hidden_id').val(id)
})
</script>