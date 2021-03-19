

<?php include_once("head.php"); ?>

<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">

						<h2 style="float: left;">Welcome back <b><?= $user->getName(); ?></b></h2>

						<a href="<?= FRONT_ROOT?>/user/logout" class="btn btn-danger" style="float: left; margin-left: 20px;"><i class="material-icons">power_settings_new</i><span>Log Out</span></a>							

					</div>
					<div class="col-sm-6">

						<a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>

						
						<button form="deleteForm" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete these users?');" ><i class="material-icons">&#xE15C;</i><span>Delete</span></button>


						<a href="<?= FRONT_ROOT?>/user/index"class="btn btn-info" ><i class="material-icons">cached</i> <span>Refresh</span></a>	
											
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Password/Hash</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

					<form  id="deleteForm" action="<?= FRONT_ROOT?>/user/deleteUsers" method="POST">

					<?php foreach ($userList as $value) { ?>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox"  name="checkbox_options[]" value="<?= $value->getId();  ?>">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td><?= $value->getName();  ?></td>
						<td><?= $value->getEmail();  ?></td>
						<td style="word-break: break-all;"><?= $value->getPassword();  ?></td>
						<td>

							<a href="#editUserModal" data-user-id="<?= $value->getId(); ?>" data-user-name="<?= $value->getName(); ?>" data-user-email="<?= $value->getEmail(); ?>" data-user-psw="<?= $value->getPassword(); ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

							<a href="#deleteUserModal" data-user-id="<?= $value->getId(); ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<?php } ?>

					</form>
				</tbody>


			</table>
			<!-- <div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
				</div>
			</div> -->
	</div>        
</div>

<!-- Add Modal HTML -->
<?php include_once("add-user-modal.php"); ?>

<!-- Edit Modal HTML -->
<?php include_once("edit-user-modal.php"); ?>

<!-- Delete Modal HTML -->
<?php include_once("delete-user-modal.php"); ?>

<script type="text/javascript">
	//triggered when modal is about to be shown
	$('#editUserModal').on('show.bs.modal', function(e) {

    //get data attributes of the clicked element
    var userId = $(e.relatedTarget).data('user-id');
    var userName = $(e.relatedTarget).data('user-name');
    var userEmail = $(e.relatedTarget).data('user-email');

    //populate inputs
    $(e.currentTarget).find('input[name="id"]').val(userId);
    $(e.currentTarget).find('input[name="name"]').val(userName);
    $(e.currentTarget).find('input[name="email"]').val(userEmail);
});
</script>

<script type="text/javascript">
	//triggered when modal is about to be shown
	$('#deleteUserModal').on('show.bs.modal', function(e) {

    //get user-id attribute of the clicked element
    var userId = $(e.relatedTarget).data('user-id');

    //populate inputs
    $(e.currentTarget).find('input[name="id"]').val(userId);
});

</script>

</body>
</html>