		<!-- publication table listing -->
		<div class="panel panel-default">
			<div class="panel-heading">Lista izdanja</div>
			<div class="table-responsive">
				<form action="<?= SITE_URL . '/materials/add' ?>" method="post" name="form-add-material" id="form-add-material">
					<table class="table table-hover" id="publications">
						<thead>
							<tr>
								<th class="align-center">Print?</th>
								<th>Naziv Izdanja</th>
								<th class="align-center">Opseg</th>
								<th class="align-center">Uređivanje</th>
								<th class="align-center">Brisanje</th>
							</tr>
						</thead>
						<tbody>
<?php foreach ($publications as $pub): ?>
							<tr>
								<td class="align-center"><input class="select-box" type="checkbox" name="print" id="<?= $pub['publication_id'] ?>" value="<?= $pub['publication_id'] ?>"></td>
								<td><label for="<?= $pub['publication_id'] ?>"><?= $pub['name'] ?></label></td>
								<td class="align-center"><?= $pub['num_pages'] ?></td>
								<td class="align-center"><a class="edit" href="<?= SITE_URL . '/publications/edit/' . $pub['publication_id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								<td class="align-center"><a class="delete" href="<?= SITE_URL . '/publications/delete/' . $pub['publication_id'] ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
							</tr>
<?php endforeach; ?>
							<tr>
								<td colspan="5" class="align-center"><a href="<?= SITE_URL . '/publications/add/' ?>"><span class="glyphicon glyphicon-plus-sign"></span></a></td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
			<div class="panel-footer align-right">
				<button type="button" class="btn btn-success" id="material-add">Spremi</button>
			</div>
		</div> <!-- end .panel.panel-default -->
		
		<!-- modal -->
		<div class="modal fade" id="dialog-publication" role="dialog" aria-hidden="true"></div>