		<!-- publication table listing -->
		<div class="panel panel-default">
			<div class="panel-heading">Lista izdanja</div>
			<div class="table-responsive">
				<table class="table table-hover" id="publications">
					<thead>
						<tr>
							<th class="align-center">Print?</th>
							<th>Naziv Izdanja</th>
							<th class="align-center">Opseg</th>
							<th class="align-center">Normativ</th>
							<th class="align-center">Uređivanje</th>
							<th class="align-center">Brisanje</th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($publications as $pub): ?>
						<tr>
							<td class="align-center select"><input type="checkbox" name="print"></td>
							<td class="select"><?= $pub['name'] ?></td>
							<td class="align-center"><?= $pub['num_pages'] ?></td>
							<td class="align-center"><?= $pub['frequency'] ?></td>
							<td class="align-center"><a class="edit" href="<?= SITE_URL . '/publications/edit/' . $pub['publication_id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
							<td class="align-center"><a class="delete" href="<?= SITE_URL . '/publications/delete/' . $pub['publication_id'] ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
						</tr>
<?php endforeach; ?>
						<tr>
							<td colspan="6" class="align-center"><a href="<?= SITE_URL . '/publications/add/' ?>"><span class="glyphicon glyphicon-plus-sign"></span></a></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="panel-footer align-right">
				<button type="button" class="btn btn-success">Spremi</button>
			</div>
		</div> <!-- end .panel.panel-default -->
		
		<!-- modal -->
		<div class="modal fade" id="dialog-publication" role="dialog" aria-hidden="true"></div>