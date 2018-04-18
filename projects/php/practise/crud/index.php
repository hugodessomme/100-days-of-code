<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Page d'accueil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <div class="col col-3">
          <img src="https://picsum.photos/200/200" alt="">
        </div>
        <div class="col col-9">
          <h1>Welcome!</h1>
          <h2>Enjoy our New Todo list manager!</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <form method="post">
          <fieldset>
            <legend>Subscribe</legend>
            <div class="form-group">
              <label for="login">Login</label>
              <input type="text" name="login" id="login" class="form-control">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
              <label for="password-2">Password Confirmation</label>
              <input type="text" name="password-2" id="password-2" class="form-control">
            </div>

            <div class="text-right">
              <input type="submit" class="btn btn-primary">
            </div>
          </fieldset>
        </form>
      </div>
      <div class="col">
        <form method="post">
          <fieldset>
            <legend>Login</legend>
            <div class="form-group">
              <label for="login-2">Login</label>
              <input type="text" name="login-2" id="login-2" class="form-control">
            </div>
            <div class="form-group">
              <label for="password-3">Password</label>
              <input type="text" name="password-3" id="password-3" class="form-control">
            </div>
            <div class="text-right">
              <input type="submit" class="btn btn-primary">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</body>
</html>