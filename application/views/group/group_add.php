<?php $this->load->view('layout/header');?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class="container">
        <div  style="background-color:red; color: white; text-align:center; font-size: 20px;">
                    <?php if($this->session->flashdata('checkboxValid')); {?>
                        <?php echo $this->session->flashdata('checkboxValid'); }?>
            </div>
            <form action="<?php echo base_url('groups/add'); ?>" method="POST" class="form">
                Name: <input class='form-control' type="text" name="rolename"  id="rolename" value="<?php echo !empty($grp['name']) ? $grp['name']: '';?>">  
                            <!-- $pos or $post or anything but why anything ??? see array , array variable, array index  -->
                    <br/>  <br/>
                Description: <input class='form-control' type="text" name="roledescription" value="<?php echo !empty($grp['description']) ? $grp['description']: '';?>">
                    <br/>  <br/>

                <div class="row">
                    <div class="col-sm-12">
                        <input type="checkbox" name="test" id="test" value=""> <label for="test">Check All</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <?php foreach ($permissions as $value) { ?>
                        
                        <div class="col-sm-3">
                                <input type="checkbox" name="permission[]" id="<?php  echo $value->id;?>" value="<?php echo $value->id;?>" class="case">&nbsp;&nbsp;&nbsp;
                                <label for="<?php  echo $value->id;?>"><?php  echo $value->name;?></label>
                        </div>  
                        
                    <?php } ?>
                        <span style="font-size:20px;"></span>
                        <p style="color:#990000;"></p>
                </div>

                <div class="text-center pb-5">     
                    <input class='btn btn-success' type="submit" name="postSubmit" value="Submit">       
                </div>        
            </form>
         </div>


<?php $this->load->view('layout/footer');?>




<script>
     $(document).ready(function() {
        $("#test").click(function() {
            $('input[type="checkbox"]').prop('checked', this.checked);
        })
    });

</script>