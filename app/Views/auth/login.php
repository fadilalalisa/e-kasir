<?= $this->extend('templates/auth_layout') ?>

<?= $this->section('content') ?>
<div class="text-center mt-4">
	<h1 class="h2">Login</h1>
	<p class="lead">
		Sign in to your account to continue
	</p>
</div>

<div class="card">
	<div class="card-body">
		<div class="m-sm-4">

			<form action="/login" method="POST">
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input class="form-control form-control" type="text" name="login" placeholder="Enter your username">
					<div class="invalid-feedback">Please provide a valid city.</div>
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input class="form-control form-control" type="password" name="password" placeholder="Enter your password">
					<div class="invalid-feedback">Please provide a valid city.</div>
					<small>
						<a href="#">Forgot password?</a>
					</small>
				</div>

				<div class="text-center mt-3">
					<button type="submit" class="btn btn-primary">Sign in</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php if (session()->has('pesan')) : ?>
	<script>
		alert('<?= session()->get('pesan') ?>')
	</script>
<?php endif ?>
<?= $this->endSection() ?>