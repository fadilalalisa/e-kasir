<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?= $this->renderSection('title') ?>
	<link rel="shortcut icon" href="<?= base_url() ?>/img/favicon.png">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
	<link class="js-stylesheet" href="<?= base_url() ?>/css/light.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body data-theme="light" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky" class="">
	<div class="wrapper">

		<!-- Sidebar -->
		<?= $this->include('templates/sidebar') ?>

		<div class="main">
			<!-- Topbar -->
			<?= $this->include('templates/topbar') ?>

			<main class="content">
				<div class="container-fluid p-0">

					<?= $this->renderSection('content') ?>

				</div>
			</main>

			<!-- Topbar -->
			<?= $this->include('templates/footer') ?>
		</div>
	</div>

	<script src="<?= base_url() ?>/js/app.js"></script>
	<?= $this->renderSection('contentScript') ?>
</body>

</html>