<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mail File</title>
</head>
<body>
<?php	
	$firm_id= Crypt::encrypt($id);
	$lawyer_email= Crypt::encrypt($mail);
?>
	<h1>This message is from Nepal Lawyers to offer you to join our platform for work.</h1>
	<h2>Lawfirm of <strong>{{$fname}}{{$lname}}</strong> send you a request to join their firm.</h2>
	<h3>{!! HTML::link( URL::to('/signedUp/'.$firm_id.'/'.$lawyer_email), 'Click here to join!') !!}</h3>
	
    
</body>
</html>