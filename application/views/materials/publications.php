<?php if($mode == 'list'): ?>
		<ul class="list-group">
<?php foreach ($weekly as $week => $value): if($week != 'ukupno'):?>
			<li class="list-group-item"><strong><?= $week ?>:</strong> <?= $value['publications'] ?> - <a href="<?= SITE_URL . '/materials/delete/' . $value['material_id'] ?>" alt="Brisanje unosa"><span class="glyphicon glyphicon-remove"></span></a></li>
<?php endif; endforeach; ?>
		</ul>
<?php else: ?>
		<form role="form" class="form-horizontal" action="<?= SITE_URL . '/materials/publications/' ?>" method="post" name="publications" id="publications">
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
			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-warning" name="pregled">Pregled</button>
				</div>
			</div>
		</form>
<?php endif; ?>
