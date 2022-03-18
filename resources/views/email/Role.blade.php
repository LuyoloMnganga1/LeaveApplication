<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <h1>UserAccount Updated</h1>
<p>Good day {{$user['name'] }}  {{$user['surname'] }}, <br> Your account has been updated for Leave Application System<br> username : {{$user['email'] }}  <br>
Now you are having access to system as  a {{$user['role'] }} for department: {{$user['department'] }}<br>

Administrator
</p>
</html>