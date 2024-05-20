<?php include 'partcls/header.php' ?>

<div class="container">

<h2>Register</h2>

    <?php if ($this->session->flashdata('msg')){
        echo "<h3>".$this->session->flashdata('msg')."</h3>";
    }

    ?>

    <hr>

        <?php echo validation_errors(); ?>
        <?php echo form_open('register/registerUser'); ?>

        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="Name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="Email">
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Passwprd">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="Confirm Password">
        </div>
        
        <button type="submit" class="btn btn-default">Register</button>
        <?php echo form_close(); ?>

        </div>

    <?php include 'partcls/footer.php' ?>