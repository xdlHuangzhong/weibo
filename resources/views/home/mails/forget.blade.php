<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>密码重置</title>
</head>
<body>
   请点击 <a href="{{ url('/home/reset?id='.$user->id.'&token='.$user->token) }}"> 链接</a>，重置密码.
</body>
</html>