<?php $this->view('shared/header', 'Make a post'); ?>
<div class="container">
	<form action='' method='post' enctype='multipart/form-data'>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Picture:<br></label><input class='form-control' type="file" name="picture" id="picture" />
		<img id='pic_preview' src='/images/blank.jpg' style="max-width:200px;max-height:200px" />
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Caption:<br></label><input class='form-control' type="text" name="caption" placeholder='Say something about your picture.' />
	</div>
	<input type="submit" name="action" value="Publish" class='btn btn-primary' />
</form>
</div>

<a href='/'>Cancel</a>

<script>
	picture.onchange = evt => {
  const [file] = picture.files
  if (file) {
    pic_preview.src = URL.createObjectURL(file)
  }
}
</script>

<?php $this->view('shared/footer'); ?>