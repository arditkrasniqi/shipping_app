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
        <p>Hello {{$name}},</p>
        <p>Click the link below to setup the password for your account.</p>
        <a target="_blank" class="btn" href="{{$reg_link}}">Setup password</a>
    </div>
</body>
</html>