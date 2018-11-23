<html>
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://keops-web1.herokuapp.com/assets/login.css">
  </head>
  <body id="LoginForm">
  <div class="container">
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <h2>Signup</h2>
          <p>Please enter your info</p>
        </div>
        <form action="https://keops-web1.herokuapp.com/User/signup" method='POST' enctype="multipart/form-data" style="text-align: center;">
          <input type="text" name="Username" class="form-control" placeholder="Enter Username" aria-describedby="basic-addon1" required >
          <input style="margin-top: 10px;" type="password" name="Password" class="form-control" placeholder="Enter password" aria-describedby="basic-addon1" required >
          <input style="margin-top: 10px;" type="text" name="name" class="form-control" placeholder="Enter Name" aria-describedby="basic-addon1" required >
          <input style="margin-top: 10px;" type="text" name="surname" class="form-control" placeholder="Enter Surname" aria-describedby="basic-addon1" required >   
          <input type="submit" name="Sepet" value="Üye Ol" class="button" style="padding: 3px 6px; font-size: 20px;width: 100%;margin-top: 10px;background-color: coral;color: white;border: 0;">
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
