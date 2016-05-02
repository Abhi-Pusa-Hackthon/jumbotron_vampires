<!DOCTYPE html>
<html>
  <head>
    <?php include 'header.php';?>
  </head>
  <body>
    <div class="container login_div">
      <div class="row">
        <div class="col-sm-12">
          <h3>Login Here</h3>
          <form class="" action="authenticate.php" method="post">
            <input type="text" name="user" placeholder="username" /><br>
            <input type="password" name="pass" placeholder="password" /><br>
            <input type="submit" value="Login" />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
