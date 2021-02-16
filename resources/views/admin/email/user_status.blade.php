<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	

	<P> Dear {{$user->name !=null ? $user->name : $user->username}},</P>
	<p>{{$info['msg']}}</p>
	<a href="{{ route('login') }}" class="btn btn-success">Login your account</a>
	 <H4>Thnak You</H4>

</body>
</html>