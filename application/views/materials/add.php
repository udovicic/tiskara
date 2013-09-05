<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Unos tjedne potrošnje</h4>
		</div> <!-- end modal header -->
		<div class="modal-body">
			<p>Odabrana izdanja:</p>
			<ul>
<?php foreach ($publications as $pub): ?>
				<li><?= $pub['name'] ?>(<?= $pub['num_pages'] ?>)</li>
<?php endforeach; ?>
			</ul>
			<p>Spremiti u:</p>
			<form role="form" class="form-horizontal" action="<?= SITE_URL . '/materials/add' ?>" method="post" name="save" id="modal-form">
					<input type="hidden" name="holder" value="<?= $holder ?>">
					<div class="form-group">
						<label class="col-xs-2 control-label" for="week">Tjedan:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" name="week" id="week" value="<?= $week ?>" autofocus required>
						</div>
						<label class="col-xs-2 control-label" for="year">Godina:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" name="year" id="year" value="<?= $year ?>" required>
						</div>
					</div>
			</form>
		</div><!-- end modal body -->
		<div class="modal-footer">
			<button type="button" class="btn btn-success" id="submit">Prihvati</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
		</div><!-- end modal footer -->
		<script src="<?= SITE_URL ?>/js/modal.js"></script>
	</div> <!-- end modal-content -->
</div> <!-- end modal-dialog -->