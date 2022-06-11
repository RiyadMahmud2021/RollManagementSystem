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
    <title>edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
    <div class="container">
            <?php  if( $this->session->flashdata('successed')) {?> 
                <div class="col-xs-12">
                    <div class="alert alert-success"><?php echo $this->session->flashdata('successed'); ?></div>
                </div>
                
                <?php } elseif($this->session->flashdata('failed')) {?>
                
                <div class="col-xs-12">
                    <div class="alert alert-success"><?php echo $this->session->flashdata('failed'); ?></div>
                </div>
            <?php  } ?>

            <form action="<?php echo base_url('permissions/edit/'.$perm['id']);?>" method="POST" class="form">

                Name: <input class='form-control' type="text" name="name" value="<?php echo !empty($perm['name']) ? $perm['name']: ''; ?>">  
                        <!-- $pos or $post or anything but why anything ??? see array , array variable, array index  -->
                <br/>  <br/>
                Description: <input class='form-control' type="text" name="description" value="<?php echo !empty($perm['description']) ? $perm['description']: '';?>">
                <br/>  <br/>
                <input class='btn btn-success' type="submit" name="postSubmit" value="Submit">      <!-- We have used "postSubmit"  before in Posts.php (controller) -->

            </form>
    </div>
</body>
</html>

<?php $this->load->view('layout/footer');?>