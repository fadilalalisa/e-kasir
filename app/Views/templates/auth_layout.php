<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?= $title ?></title>
	<link rel="shortcut icon" href="<?= base_url() ?>/img/favicon.png">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
	<link class="js-stylesheet" href="<?= base_url() ?>/css/light.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body data-theme="light" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky" class="">
	<div class="main d-flex justify-content-center w-100">
		<main class="content d-flex p-0">
			<div class="container d-flex flex-column">
				<div class="row h-100">
					<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">

						<?= $this->renderSection('content') ?>

						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

	<script src="<?= base_url() ?>/js/app.js"></script>
</body>

</html>