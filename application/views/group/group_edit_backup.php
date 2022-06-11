<?php 
// echo '<pre>';
// print_r($roles);
// echo '<pre>';
// var_dump($roles->group_id);
// exit;
$this->load->view('layout/header');?>

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container">

            <form action="<?php echo base_url('groups/edit'); ?>" method="POST" class="form">
                <input type="hidden" name="role_id" value="<?php echo $roles[0]->group_id;?>">
                Name: <input class='form-control' type="text" name="name" value="<?php echo $roles[0]->group_name;?>"> 
                                       
                <br/>  <br/>
                Description: <input class='form-control' type="text" name="description" value="<?php  echo $roles[0]->g_description;?>">
               
                <br/>  <br/>

                <div class="row">
                    <div class="col-sm-12">
                        <input type="checkbox" name="test" id="test" value=""> <label for="test">Check All</label>
                    </div>
                </div>
                <br>

                <div class="row">
                  <?php foreach ($permission as $value) {?>
                  <div class="col-sm-3">
                    <input type="checkbox" name="permission[]" id="<?php echo $value->id;?>" value="<?php echo $value->id;?>" <?php foreach ($roles as $r) {
                              if($r->permission_id == $value->id){ echo 'checked="checked"';}}?>>&nbsp;&nbsp;&nbsp;                          
                    <label for="<?php echo $value->id;?>"><?php echo $value->name;?></label>
                  </div>
                  <?php } ?>
                </div>  


                <input class='btn btn-success' type="submit" name="postSubmit" value="Submit">      <!-- We have used "postSubmit"  before in Posts.php (controller) -->

            </form>
    </div>

<?php $this->load->view('layout/footer');?>

<script type="text/javascript">
$(document).ready(function(){
    $("#test").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});


</script>