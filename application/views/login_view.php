
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Login</title>
  <link rel="stylesheet" href="<?php echo base_url();?>application/views/css/bootstrap-responsive.css">
  <link rel="stylesheet" href="<?php echo base_url();?>application/views/css/bootstrap.css">
  <style type="text/css">
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: rgb(245, 245, 245);
    }
  </style>
 </head>
 <body>
  <div class="container">
    <?php
      echo validation_errors();
      $attributes = array('class' => 'form-signin');
      echo form_open('home/verifyLogin', $attributes);
    ?>
    <h1>Login</h1>
    <label for="username">Username:</label>
    <input class="input-block-level" type="text" size="20" id="username" name="username"/>
    <br/>
    <label for="password">Password:</label>
    <input class="input-block-level" type="password" size="20" id="password" name="password"/>
    <br/>
    <input class="btn-primary" type="submit" value="Login"/>
    </form>

    <?php
      echo validation_errors();
      $attributes = array('class' => 'form-signin');
      echo form_open('home/register', $attributes);
    ?>
    <input class="btn-primary" type="submit" value="Register"/>
    </form>
  </div>
 </body>
</html>

