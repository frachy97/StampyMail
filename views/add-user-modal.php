<!-- Add Modal HTML -->
<div id="addUserModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= FRONT_ROOT?>/user/add" method="POST" name="addForm" onsubmit="return(validator());">
				<div class="modal-header">						
					<h4 class="modal-title">Add User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input id="name" name="name" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input id="email" name="email" type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input id="password" name="password" type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>