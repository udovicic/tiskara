		<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Dodavanje izdanja</h4>
		</div> <!-- end modal header -->
		<div class="modal-body">
			<form role="form" class="form-horizontal" action="<?= SITE_URL . '/publications/add' ?>" method="post" name="add" id="modal-form">
				<div class="form-group">
					<label class="col-xs-4 control-label" for="name">Naziv</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="name" id="name" value="" autofocus>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="frequency">Tjedni broj izlazaka</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="frequency" id="frequency" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label" for="num_pages">Broj stranica</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" name="num_pages" id="num_pages" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-2 control-label" for="plate_1">Ploča 1010x658</label>
					<div class="col-xs-2">
						<input type="text" class="form-control" name="plate_1" id="plate_1" value="">
					</div>
					<label class="col-xs-2 control-label" for="plate_2">Ploča 745x605</label>
					<div class="col-xs-2">
						<input type="text" class="form-control" name="plate_2" id="plate_2" value="">
					</div>
					<label class="col-xs-2 control-label" for="plate_3">Ploča 740x676</label>
					<div class="col-xs-2">
						<input type="text" class="form-control" name="plate_3" id="plate_3" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label" for="paper_1">Papir 84cm/45g</label>
					<div class="col-xs-3">
						<input type="text" class="form-control" name="paper_1" id="paper_1" value="">
					</div>
					<label class="col-xs-3 control-label" for="paper_1s">Papir 42cm/45g</label>
					<div class="col-xs-3">
						<input type="text" class="form-control" name="paper_1s" id="paper_1s" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label" for="paper_2">Papir 84cm/52g</label>
					<div class="col-xs-3">
						<input type="text" class="form-control" name="paper_2" id="paper_2" value="">
					</div>
					<label class="col-xs-3 control-label" for="paper_2s">Papir 42cm/52g</label>
					<div class="col-xs-3">
						<input type="text" class="form-control" name="paper_2s" id="paper_2s" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label" for="paper_3">Papir 90cm/45g</label>
					<div class="col-xs-3">
						<input type="text" class="form-control" name="paper_3" id="paper_3" value="">
					</div>
					<label class="col-xs-3 control-label" for="paper_3s">Papir 45cm/45g</label>
					<div class="col-xs-3">
						<input type="text" class="form-control" name="paper_3s" id="paper_3s" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label" for="paper_4">Papir 90cm/52g</label>
					<div class="col-xs-3">
						<input type="text" class="form-control" name="paper_4" id="paper_4" value="">
					</div>
					<label class="col-xs-3 control-label" for="paper_4s">Papir 45cm/52g</label>
					<div class="col-xs-3">
						<input type="text" class="form-control" name="paper_4s" id="paper_4s" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-2 control-label" for="color_c">Boja Cyan</label>
					<div class="col-xs-2">
						<input type="text" class="form-control" name="color_c" id="color_c" value="">
					</div>
					<label class="col-xs-2 control-label" for="color_m">Boja Magenta</label>
					<div class="col-xs-2">
						<input type="text" class="form-control" name="color_m" id="color_m" value="">
					</div>
					<label class="col-xs-2 control-label" for="color_y">Boja Yellow</label>
					<div class="col-xs-2">
						<input type="text" class="form-control" name="color_y" id="color_y" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-2 control-label" for="color_k">Boja Crna</label>
					<div class="col-xs-2">
						<input type="text" class="form-control" name="color_k" id="color_k" value="">
					</div>
				</div>
			</form>
		</div><!-- end modal body -->
		<div class="modal-footer">
			<button type="button" class="btn btn-success" id="submit">Dodaj</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
		</div><!-- end modal footer -->
		<script src="<?= SITE_URL ?>/js/modal.js"></script>
	</div> <!-- end modal-content -->
</div> <!-- end modal-dialog -->