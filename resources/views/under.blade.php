<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        #container{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
<div id="container">
    <div>
        <img src="{{asset('images/under.jpg')}}" alt="">
        <h2>
            Under constraction
            {{config('app.name')}}
        </h2>
    </div>
</div>
</body>
</html>
