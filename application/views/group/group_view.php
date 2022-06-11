
<?php $this->load->view('layout/header');?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
    <div class="container">    
        <div class="card text-white bg-secondary mb-3">     
            
            <div class="card-body text-center btn btn-outline-light">
            <h1 class="card-header">View Post</h1>
            <p> <?php  echo !empty($grp['name']) ? $grp['name']:  ''; ?> </p>  <!-- Here used php ternary operator https://www.phptutorial.net/php-tutorial/php-ternary-operator/   -->
            <p> <?php  echo !empty($grp['description']) ? $grp['description']: ''; ?> </p>
            </div>
        
            <!-- <h1>View Post</h1> -->
        </div>      
    </div>
</body>
</html>


<?php $this->load->view('layout/footer');?>