<html>
<head>
    <style>
        .container{
            width:95%;
            padding:20px;
            border-radius:10px;
            background:#efefef;
            text-align:center;
            font-family:Arial,sans-serif;
        }
        .btn{
            padding:10px 20px;
            border-radius:3px;
            background:skyblue;
            color:white;
            outline: none;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <p>Hello {{$email}},</p>
    <p>Your package tracking code is: <strong>{{$code}}</strong></p>
</div>
</body>
</html>