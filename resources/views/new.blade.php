<!DOCTPE html>
<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Name</td>
<td>Email</td>
<td>Password</td>
<td>Edit</td>
</tr>
@foreach ($users as $user)
<tr>
<td>{{ $customer->id }}</td>
<td>{{ $customer->name }}</td>
<td>{{ $customer->email }}</td>
<td>{{ $customer->password }}</td>
<td><a href = 'delete/{{ $customer->id }}'>Delete</a> <button type="button" data-toggle="modal" data-target="#myModal{{ $customer->id }}">Edit</button></td>
</tr>
<div class="container">
    <div class="modal fade" id="myModal{{ $customer->id }}" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Update</h4>
          </div>
          <div class="modal-body">
            <form action="/edit/<?php echo $customer->id; ?>" method="post">
                @csrf
                  <h2>Update</h2>
                  <div class="form-group">
                    <input type="text" class="form-control" value = '<?php echo $customer->name; ?>' name="name" placeholder="Name" required="required">
                </div>
                  <div class="form-group">
                      <input type="email" class="form-control" value = '<?php echo $customer->email; ?>' name="email" placeholder="Email" required="required">
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" name="password" value = '<?php echo $customer->password; ?>' placeholder="Password" required="required">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

  </div>

@endforeach
</table>
</body>
</html>
