<?php include 'includes/header.php';

if ($this->session->flashdata('welcome')){
    echo "<h3>".$this->session->flashdata('welcome')."</h3>";
}
?>

<h1>Welcome da mappu</h1>

<?php include 'includes/footer.php'; ?>