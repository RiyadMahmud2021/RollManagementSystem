<?php 
  $this->load->view('layout/header');
//   $user_session = $this->session->userdata('userRole');
  
//   if(empty($user_session))
//   {
//     redirect('auth','refresh');
//   }
//   if(!in_array("manage_team_member",$user_session)){
//       redirect('auth','refresh');
//   }
?>
    <!-- Main content -->
    <section class="content">

        <div class="box mt-5">
            <div class="box-body">
            <div  style="background-color:red; color: white; text-align:center; font-size: 20px;">
                <?php if($this->session->flashdata('Failed')); {?>
                    <?php echo $this->session->flashdata('Failed'); ?>
                <?php } if($this->session->flashdata('Failedu'));{?>
                    <?php echo $this->session->flashdata('Failedu'); ?>
                <?php }?>
            </div>
            <div  style="background-color:green; color: white; text-align:center; font-size: 20px;">
                <?php if($this->session->flashdata('Failed')); {?>
                    <?php echo $this->session->flashdata('Successed');?>
                <?php } if($this->session->flashdata('Failedu')); {?>
                        <?php echo $this->session->flashdata('Successedu');?>
                <?php }?>
            </div>
            <table id="example1" class="table table-bordered table-striped">

                <thead>
                  <tr class="text-center">
                    <!-- <th>ID </th> -->
                    <th>User Name </th>
                    <th>Email </th>
                    <th>Group </th>
                    <th>Action </th>
                  </tr>
                </thead>

                <tbody>
                  <?php  if(!empty($users)): foreach($users as $user): // user catch the $users array's indexs particularly?>   
                    
                    <tr class=''>
                        <!-- <td class="border "><?php  //echo $user->id; // and print particular info according to $user index ?></td>  -->
                        <td class="border "><?php  echo $user->username;?></td>
                        <td class="border "><?php  echo $user->email;?></td>
                     
                        <td class="border "><?php  echo $user->name;?></td>
                    
                        <td class="border text-center">
                            <!-- <a class="btn btn-outline-light" href="<?php // echo site_url('permissions/view/'.$user['id']); ?>"> View </a>  -->
                            <a class="btn btn-warning " href="<?php echo base_url('registrations/show_edit_Form/'.$user->id ); ?>"> Edit </a>
                            <!-- <a class="btn btn-danger disabled" href="<?php // echo site_url('permissions/delete/'.$user['id']); ?>">Delete</a>  -->
                        </td>
                    </tr>
                    <?php endforeach; endif;?>                 
                  </tr>  
                </tbody>  

            </table>

        </div>
        <div class="col-md-12 pb-2">
              <div class="row">
                <div class="col-md-12"> 
                  <div class="text-center">
                      <a class="btn btn-success text-center" href="<?php echo site_url('registrations/show_Reg_Form'); ?>" >New User Registrations</a>  
                  </div>
                </div>
              </div>        
        </div>  


    </section>

 
  <?php 

  $this->load->view('layout/footer');
?> 