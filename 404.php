		<?php include($_SERVER['DOCUMENT_ROOT'].'/bin/head.php'); ?>
		<style>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/css/error.css'); ?>
		</style>
		<title>August Associates LLC - 404</title>
		<meta name="description" content="404, this page could not be found. August Associates, your valued guide in real estate." />
	</head>
	<body>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/bin/nav.php'); ?>
		<div class="errorPage">
			<h1 class="errorCode">404</h1>
			<h2 class="errorDescription">Oops, looks like this page doesn't exist.</h2>
			<h3 class="errorWhatToDo">You should probably head back to the homepage or report a problem if you want</h3>
			<button id="errorHome" onclick="window.location.href='/'">Home</button>
			<button id="errorReport" onclick="window.location.href='/contact'">Report a Problem</button>
		</div>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/bin/footer.html'); ?>
	</body>
</html>

<script>
	<?php
		include('bin/jquery.js');
		include('js/load.js');
	?>
</script>
