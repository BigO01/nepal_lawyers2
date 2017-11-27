<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mail File</title>
</head>
<body>
<?php	

	$ee = Crypt::encrypt($e);
	$fe = Crypt::encrypt($f);
	$le = Crypt::encrypt($l);
?>


	<h1>Please ConfirmYour Email to Click Below.</h1>
	<!-- <h5>{{ URL::to('/signup/'.$ee.'/'.$fe.'/'.$le) }}</h5> -->
	<h3>{!! HTML::link( URL::to('/signup/'.$ee.'/'.$fe.'/'.$le), 'Click here to confirm your email!') !!}</h3>
    
</body>
</html>