<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Register</title>
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
   <h1>Register</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('register/create'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="email">Email:</label>
     <input type="text" size="20" id="email" name="email"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password"/>
     <br/>
     <input type="submit" value="Create"/>
   </form>
 </div>
 </body>
</html>