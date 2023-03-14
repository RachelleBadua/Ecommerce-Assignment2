<?php $this->view('shared/header', 'Create a profile'); ?>

<form action="" method="post" enctype='multipart/form-data'>
		<label class="form-label">Image Post: </label>
		<div class="form-group row">
			<!-- Image that you selected  -->
			<img class="border rounded" src="/images/<?= $data->picture ?>" src='' style=" max-width:400px; max-height:400px;" />	
			<div class="col">
				<label class="col-sm-2 col-form-label">Caption:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="caption">
				</div>
			</div>
		</div>
		<div class="">
			<br>
			<input  class="btn btn-success" type="submit" name="edit" value="Edit Post">
		</div>
	</form>
	<div>
		<br>
		<a href="/Profile/index" class="btn btn-danger">Cancel</a>
	</div>
</div>
<?php $this->view('shared/footer'); ?>