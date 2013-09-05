		<form role="form" class="form-horizontal" action="<?= SITE_URL . '/materials/printable/' . $mode ?>" method="post" name="printable" id="form-printable">
<?php if($mode == 1): ?>
		<p>Odaberite tjedan:</p>
		<div class="form-group">
			<label class="col-xs-2 control-label" for="week">Tjedan:</label>
			<div class="col-xs-2">
				<input type="text" class="form-control" name="week" id="week" value="<?= $week ?>" autofocus required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-2 control-label" for="year">Godina:</label>
			<div class="col-xs-2">
				<input type="text" class="form-control" name="year" id="year" value="<?= $year ?>" required>
			</div>
		</div>
<?php else: ?>
		<p>Odaberite period:</p>
		<div class="form-group">
			<label class="col-xs-2 control-label" for="week-start">Početni tjedan:</label>
			<div class="col-xs-2">
				<input type="text" class="form-control" name="week-start" id="week-start" value="<?= $week ?>" autofocus required>
			</div>
			<div class="col-xs-2">
				<input type="text" class="form-control" name="year-start" id="year-start" value="<?= $year ?>" autofocus required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-2 control-label" for="week-end">Krajnji tjedan:</label>
			<div class="col-xs-2">
				<input type="text" class="form-control" name="week-end" id="week-end" value="<?= $week ?>" required>
			</div>
			<div class="col-xs-2">
				<input type="text" class="form-control" name="year-end" id="year-end" value="<?= $year ?>" required>
			</div>
		</div>
<?php endif; ?>
			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-warning" name="pregled">Pregled</button>
				</div>
			</div>
		</form>
