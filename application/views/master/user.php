<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
	<div class="col-12">
		<h2>Master User &nbsp;
			<?php if (isset($_SESSION['akses_modul']['user']) && $_SESSION['akses_modul']['user'] == 'on') : ?>
				<a class="btn bg-primary text-white" href="#" data-bs-toggle="modal" data-bs-target="#adduser"><i class="mdi mdi-account-plus"></i> Tambah Baru</a>
			<?php endif; ?>
		</h2>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-4 ms-auto">
				<form>
					<div class="input-group">
						<input name="katakunci" class="form-control form-control-sm" type="search" placeholder="Kata kunci" aria-label="Search">
						<div class="input-group-append">
							<button class="btn bg-secondary text-white" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-12" id="divtabeluser">
				<div class="table-responsive">
					<table class="table table-bordered" name="vuser" id="vuser">
						<thead>
							<th class="width-sm">ID</th>
							<th>Username</th>
							<th>Akses Klasifikasi</th>
							<th>Akses Modul</th>
							<th>Tipe</th>
							<th class="width-sm"></th>
							<th class="width-sm"></th>
						</thead>
						<?php
						if (isset($user)) {
							$no = 1;
							foreach ($user as $u) {
								echo "<tr>";
								echo "<td>" . $u['id'] . "</td>";
								echo "<td>" . $u['username'] . "</td>";
								echo "<td>" . $u['akses_klas'] . "</td>";
								echo "<td>";
								$mm = $u['akses_modul'];
								if ($mm != "") {
									$mm = json_decode($mm);
									if ($mm) {
										foreach ($mm as $key => $val) {
											echo $key . ",";
										}
									}
								}
								echo "</td>";
								echo "<td>" . $u['tipe'] . "</td>";
								echo "<td align=\"center\"><a data-bs-toggle=\"modal\" data-bs-target=\"#edituser\" class='eduser text-primary' href='#' id='" . $u['id'] . "' title=\"Edit\"><i class=\"fa fa-edit fa-lg\"></i> </a></td>";
								echo "<td align=\"center\"><a data-bs-toggle=\"modal\" data-bs-target=\"#deluser\" class='deluser text-danger' href='#' id='" . $u['id'] . "' title=\"Delete\"><i class=\"fa fa-trash fa-lg\"></i> </a></td>";
								echo "</tr>";
								$no++;
							}
						}
						?>
					</table>
				</div>

				<div class="mt-2">
					<?= $pages; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="adduser">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header py-3">
				<h5 class="modal-title">Tambah User</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="fadduser" class="form-horizontal" role="form" method="post" action="<?php echo site_url("/admin/adduser"); ?>">
					<div class="form-group">
						<label class="control-label" for="username">Username</label>
						<div class="">
							<input type="text" class="form-control" id="username" name="username" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="password">Password</label>
						<div class="">
							<input type="password" class="form-control" id="password" name="password" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="conf_password">Konfirmasi password</label>
						<div class="">
							<input type="password" class="form-control" id="conf_password" name="conf_password" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="username">Hak Akses Klasifikasi</label>
						<div class="">
							<input type="text" class="form-control" id="akses_klas" name="akses_klas" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="username">Hak Akses Modul</label>
						<div class="">
							<div class="">
								<label for="modul1">
									<input tabindex="5" type="checkbox" id="modul1" name="modul[entridata]">
									Entri Data
								</label>
								<label for="modul2">
									<input type="checkbox" id="modul2" name="modul[sirkulasi]">
									Sirkulasi
								</label>
								<label for="modul3">
									<input type="checkbox" id="modul3" name="modul[klasifikasi]">
									Klasifikasi
								</label>
								<label for="modul4">
									<input type="checkbox" id="modul4" name="modul[pencipta]">
									Pencipta Arsip
								</label>
								<label for="modul5">
									<input type="checkbox" id="modul5" name="modul[pengolah]">
									Pengolah Arsip
								</label>
								<label for="modul6">
									<input type="checkbox" id="modul6" name="modul[lokasi]">
									Lokasi Arsip
								</label>
								<label for="modul7">
									<input type="checkbox" id="modul7" name="modul[media]">
									Media Arsip
								</label>
								<label for="modul8">
									<input type="checkbox" id="modul8" name="modul[user]">
									User
								</label>
								<label for="modul9">
									<input type="checkbox" id="modul9" name="modul[import]">
									Import Data
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="tipe">Tipe</label>
						<div class="">
							<select id="tipe" name="tipe" class="form-select">
								<option value="admin">Admin</option>
								<option value="operator">Operator</option>
								<option value="user">User</option>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="button" class="btn bg-primary text-white" id="addusergo">Simpan</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="edituser">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header py-3">
				<h5 class="modal-title">Edit User</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="feduser" class="form-horizontal" role="form" method="post" action="<?php echo site_url("/admin/eduser"); ?>">
					<input type="hidden" name="id" id="ediduser" value="">
					<div class="form-group">
						<label class="control-label" for="username">Username</label>
						<div class="">
							<input type="text" class="form-control" id="eusername" name="username" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="password">Password</label>
						<div class="">
							<input type="password" class="form-control" id="epassword" name="password" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="username">Hak Akses Klasifikasi</label>
						<div class="">
							<input type="text" class="form-control" id="eakses_klas" name="akses_klas" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="username">Hak Akses Modul</label>
						<div class="">
							<div class="">
								<label for="emodul1">
									<input type="checkbox" id="emodul1" name="modul[entridata]">
									Entri Data
								</label>
								<label for="emodul2">
									<input type="checkbox" id="emodul2" name="modul[sirkulasi]">
									Sirkulasi
								</label>
								<label for="emodul3">
									<input type="checkbox" id="emodul3" name="modul[klasifikasi]">
									Klasifikasi
								</label>
								<label for="emodul4">
									<input type="checkbox" id="emodul4" name="modul[pencipta]">
									Pencipta Arsip
								</label>
								<label for="emodul5">
									<input type="checkbox" id="emodul5" name="modul[pengolah]">
									Pengolah Arsip
								</label>
								<label for="emodul6">
									<input type="checkbox" id="emodul6" name="modul[lokasi]">
									Lokasi Arsip
								</label>
								<label for="emodul7">
									<input type="checkbox" id="emodul7" name="modul[media]">
									Media Arsip
								</label>
								<label for="emodul8">
									<input type="checkbox" id="emodul8" name="modul[user]">
									User
								</label>
								<label for="emodul9">
									<input type="checkbox" id="emodul9" name="modul[import]">
									Import Data
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="tipe">Tipe</label>
						<div class="">
							<select id="etipe" name="tipe" class="form-select">
								<option value="admin">Admin</option>
								<option value="operator">Operator</option>
								<option value="user">User</option>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="button" class="btn bg-primary text-white" id="editusergo">Simpan</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="deluser">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header py-3">
				<h5 class="modal-title">Delete User</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="fdeluser" class="form-horizontal" role="form" method="post" action="<?php echo site_url("/admin/deluser"); ?>">
					<h4 class="modal-title">Yakin ingin Hapus data ini?</h4>
					<input type="hidden" name="id" id="deliduser" value="">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" id="delusergo">Hapus</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->