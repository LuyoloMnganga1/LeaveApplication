<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rest Password</title>
</head>
<style>
    .button{
        background-color: #4CAF50;
        border: none;
        border-radius:1.6rem;
        color: white;
        font-size: 10px;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: center;
        cursor: pointer;
    }
    .wapper{
        background-color: whitesmoke;
        padding: 20px;
        margin: 5% 20% 0% 20%;
        border: none;
        border-radius:0.6rem;
    }

</style>
<body >
<div class="wapper">
<h1>Leave Application System</h1><br></br>
Hi {{ $name }}, <br>
Please reset your password here. <br>
Click on the below button to reset the password.<br>
 <a href="{{ $url }}"><button class="button">RESET PASSWORD</button></a>
 <br></br>
 Administrator
</div>
</body>
</html>
