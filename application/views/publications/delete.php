<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Brisanje izdanja</h4>
		</div> <!-- end modal header -->
		<div class="modal-body">
			<p>Želite li obrisati <?= $pub['name'] ?>(<?= $pub['num_pages'] ?>)?</p>
			<form action="<?= SITE_URL . '/publications/delete' ?>" method="post" name="form-delete">
				<input type="hidden" name="publication_id" id="publication_id" value="<?= $pub['publication_id'] ?>">
			</form>
		</div><!-- end modal body -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
			<button type="button" class="btn btn-danger" id="submit">Obriši</button>
		</div><!-- end modal footer -->
		<script src="<?= SITE_URL ?>/js/modal.js"></script>
	</div> <!-- end modal-content -->
</div> <!-- end modal-dialog -->