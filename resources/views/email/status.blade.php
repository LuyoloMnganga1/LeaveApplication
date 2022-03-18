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
    <h1>Application Status</h1>
<p>Good day {{$data['name'] }}  {{$data['surname'] }}, <br>
Your application status has been updated  <br>
Application status: {{$data['status'] }}<br>
</p>
@if ($data['status'] ==='Rejected')
<p>Reason your application status is rejected here is the reason: {{$data['Rejected']}}
@endif
<br></br>

Administrator
</p>
</html>