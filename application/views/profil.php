<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row mb-2">
	<div class="col-12">
		<h2>Profil</h2>
		<?php if (isset($_SESSION['akses_modul']['pengaturan']) && $_SESSION['akses_modul']['pengaturan'] == 'on') : ?>
		<?php endif; ?>
	</div>
</div>

<div class="card">

	<div class="card-body">

		<form class="form-horizontal" role="form" method="post" action="<?= site_url("/pengaturan/save_profil"); ?>">
			<input type="hidden" name="id" id="ediduser" value="<?= $user->id ?>">
			<div class="form-group">
				<label class="control-label" for="username">Username</label>
				<div class="">
					<input type="text" class="form-control" id="username" name="username" value="<?= $user->username ?>" readonly />
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

			<button type="submit" class="btn bg-primary text-white">Simpan</button>
		</form>
	</div>
</div>