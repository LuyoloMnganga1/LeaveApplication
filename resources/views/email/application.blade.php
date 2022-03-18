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
    <h1>Application for leave created</h1>
<p>Good day {{$hod['name'] }}  {{$hod['surname'] }}, <br>
The is new apllication for leave in your department ({{ $user['department'] }}). <br> 
The following are details of application : <br>
Applicant Name: {{ $user['name'] }} <br>
Applicant Surname: {{ $user['surname'] }} <br>
Applicant Department: {{ $user['department'] }} <br>
Applicant Leave Type:  {{ $user['leavetype'] }}<br>
Applicant Leave Start Date: {{ $user['startDate'] }} <br>
Applicant Leave End Date: {{ $user['endDate'] }} <br>
Applicant Leave Comment: {{ $user['comments'] }} <br>

Please update the application status of the applicant.
<br>
</br>
Administrator
</p>
</html>