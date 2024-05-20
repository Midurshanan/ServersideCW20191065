<?php include 'partcls/header.php' ?>

<div class="container">

<h2>Login</h2>

<?php if ($this->session->flashdata('errmsg')){
        echo "<h3>".$this->session->flashdata('errmsg')."</h3>";
    }

    ?>

<hr>

<?php echo validation_errors(); ?>
<?php echo form_open('login/loginUser'); ?>

<form>
  <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Passwprd">
  </div>
  
  <button type="submit" class="btn btn-default">Login</button>
  <?php echo form_close(); ?>


</div>


<?php include 'partcls/footer.php' ?>