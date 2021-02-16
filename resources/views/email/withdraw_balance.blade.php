<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	

	<P> Dear {{$info['name']}},</P>
	<p>You have withdrawed {{$info['balance']}} USD from your main balance.
	As soon as possible your withdrawal will be procced</p>
	<a href="{{ route('login') }}" class="btn btn-success">Login your account</a>
	 <H4>Thnak You</H4>

</body>
</html>