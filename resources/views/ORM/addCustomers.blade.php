<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .form-control{
            width: 20%;
        }
        #add{
            background-color: #718096;
            color: #ffffff;
        }
    </style>
</head>
<body>
<h1>Add Customer</h1>
<form method="POST">
    <div>
        <label>Full Name</label>
        <input type="text" class="form-control" name="name" placeholder="Input fullname">
    </div><br>
    <div>
        <label>Gender</label>
        <select class="form-control" name="gender">
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>
    </div><br>
    <div>
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Input username">
    </div><br>
    <div>
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Input password">
    </div><br>
    <div>
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Input email">
    </div><br>
    <div>
        <label>Address 1</label>
        <input type="text" class="form-control" name="address" placeholder="Input address">
    </div><br>
    <div>
        <label>Address 2</label>
        <input type="text" class="form-control" name="address" placeholder="Input address">
    </div><br><br>
    <div>
        <input type="submit" class="form-control" value="Add" id="add">
    </div>
    @csrf
</form>

</body>
</html>
