
<?php $this->load->view('layout/header');?>

    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
        <table class="table table-bordered ">
            <div  style="background-color:red; color: white; text-align:center; font-size: 20px;">
                    <?php if($this->session->flashdata('Failed')); {?>
                        <?php echo $this->session->flashdata('Failed'); ?>
                    <?php } if($this->session->flashdata('Failedu'));{?>
                        <?php echo $this->session->flashdata('Failed'); ?>
                    <?php } if($this->session->flashdata('error_msgd'));{?>
                        <?php echo $this->session->flashdata('error_msgd'); ?>
                    <?php }?>
            </div>
            <div  style="background-color:green; color: white; text-align:center; font-size: 20px;">
                    <?php if($this->session->flashdata('Successed')); {?>
                        <?php echo $this->session->flashdata('Successed');?>
                    <?php } if($this->session->flashdata('Successedu')); {?>
                            <?php echo $this->session->flashdata('Successedu');?>
                    <?php } if($this->session->flashdata('success_msgd')); {?>
                            <?php echo $this->session->flashdata('success_msgd');?>
                    <?php }?>
            </div>
                <thead class=" ">
                    <tr  class=" text-center ">
                        <th class="border ">ID</th>
                        <th class="border ">Permission Name</th>
                        <th class="border ">Permission Discription</th>
                        <th class="border ">Action</th>
                    </tr>
                    <?php  if(!empty($permiss)): foreach($permiss as $perm):?>   
                    <tr class=''>
                        <td class="border "><?php  echo $perm['id'];?></td>
                        <td class="border "><?php echo $perm['name'];?></td>
                        <td class="border "><?php echo $perm['description'];?></td>
                        <td class="border text-center">
                            <a class="btn btn-outline-light" href="<?php  echo base_url('permissions/view/'.$perm['id']); ?>"> View </a>
                            <a class="btn btn-warning " href="<?php  echo base_url('permissions/show_Perm_Edit_Form/'.$perm['id'] ); ?>"> Edit </a>
                            <a class="btn btn-danger " href="<?php echo base_url('permissions/delete/'.$perm['id']); ?>">Delete</a> 
                        </td>
                    </tr>
                    <?php endforeach; endif;?>
                </thead>
            </table>
            <div class="text-center">
                <a class="btn btn-success text-center" href="<?php echo site_url('permissions/show_Perm_Form'); ?>" >Add Role </a>  
                 <!-- this button is not submit button but it change url and go to new url (its a lin button and took to the other link)-->
            </div>
             
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

    
<?php $this->load->view('layout/footer');?>