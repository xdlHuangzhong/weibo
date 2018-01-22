<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>激活邮件</title>
</head>
<body>
    感谢{{ $user->name }}注册我们的网站。您的账号需要激活才能使用，请于24小时内激活您的账号，逾期需重新注册账号。点击 <a href="{{ url('home/active?id='.$user->id.'&token='.$user->token) }}">激活</a> 链接，激活您的账号。
</body>
</html>