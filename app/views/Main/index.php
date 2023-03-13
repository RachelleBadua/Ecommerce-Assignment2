<?php $this->view('shared/header', 'Check out some publications!'); ?>
<div class="container">
	<h1 style="text-align: center;">Publications</h1>
	<p>Should add list of anyones publications</p>
		<?php
			foreach ($data as $publication) {
				$this->view('Publication/post', $publication);
			}
		?>
</div>
<?php $this->view('shared/footer'); ?>