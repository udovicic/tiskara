<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Uređivanje izdanja</h4>
		</div> <!-- end modal header -->
		<div class="modal-body">
			<form role="form" class="form-horizontal" action="<?= SITE_URL . '/publications/edit' ?>" method="post" name="edit">
				<input type="hidden" name="publication_id" id="publication_id" value="<?= $pub['publication_id'] ?>">
				<div class="form-group">
					<label class="col-xs-4 control-label" for="name">Naziv</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="name" id="name" value="<?= $pub['name'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="frequency">Tjedni broj izlazaka</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="frequency" id="frequency" value="<?= $pub['frequency'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="num_pages">Broj stranica</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="num_pages" id="num_pages" value="<?= $pub['num_pages'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="plate_1">Ploča 1010x658</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="plate_1" id="plate_1" value="<?= $pub['plate_1'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="plate_2">Ploča 745x605</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="plate_2" id="plate_2" value="<?= $pub['plate_2'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="plate_3">Ploča 740x676</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="plate_3" id="plate_3" value="<?= $pub['plate_3'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="paper_1">Papir 84cm/45g</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="paper_1" id="paper_1" value="<?= $pub['paper_1'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="paper_1s">Papir 42cm/45g</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="paper_1s" id="paper_1s" value="<?= $pub['paper_1s'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="paper_2">Papir 84cm/52g</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="paper_2" id="paper_2" value="<?= $pub['paper_2'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="paper_2s">Papir 42cm/52g</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="paper_2s" id="paper_2s" value="<?= $pub['paper_2s'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="paper_3">Papir 90cm/45g</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="paper_3" id="paper_3" value="<?= $pub['paper_3'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="paper_3s">Papir 45cm/45g</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="paper_3s" id="paper_3s" value="<?= $pub['paper_3s'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="paper_4">Papir 90cm/52g</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="paper_4" id="paper_4" value="<?= $pub['paper_4'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="paper_4s">Papir 45cm/52g</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="paper_4s" id="paper_4s" value="<?= $pub['paper_4s'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="color_c">Boja Cyan</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="color_c" id="color_c" value="<?= $pub['color_c'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="color_m">Boja Magenta</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="color_m" id="color_m" value="<?= $pub['color_m'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="color_y">Boja Yellow</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="color_y" id="color_y" value="<?= $pub['color_y'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="color_k">Boja Crna</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="color_k" id="color_k" value="<?= $pub['color_k'] ?>">
					</div>
				</div>
			</form>
		</div><!-- end modal body -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
			<button type="button" class="btn btn-primary" id="submit">Spremi</button>
		</div><!-- end modal footer -->
		<script src="<?= SITE_URL ?>/js/modal.js"></script>
	</div> <!-- end modal-content -->
</div> <!-- end modal-dialog -->