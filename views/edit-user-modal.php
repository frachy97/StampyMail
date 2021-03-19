<!-- Edit Modal HTML -->
<div id="editUserModal" class="modal fade" role="dialog" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= FRONT_ROOT?>/user/edit" method="POST" name="editForm" onsubmit="return(validator());">
				<div class="modal-header">						
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<input name="id" type="hidden">
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input id="name-edit" name="name" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input id="email-edit" name="email" type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>New Password</label>
						<input id="password-edit" name="password" type="text" class="form-control" required>
					</div>			
								
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>