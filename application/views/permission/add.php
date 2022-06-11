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
    <title>add</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
    <div class="container">
            <form action="<?php echo base_url('permissions/add');?>" method="POST" class="form">

            Name: <input class='form-control' type="text" name="name" value="">  
                <br/>  <br/>
            Description: <input class='form-control' type="text" name="description" value="">
                <br/>  <br/>
            <input class='btn btn-success' type="submit" name="postSubmit" value="Submit"> 
            </form>
    </div>
</body>
</html>

<?php $this->load->view('layout/footer');?>