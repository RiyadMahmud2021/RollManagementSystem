
<?php $this->load->view('layout/header');?>



<section class="content">
  <div class="row">
    
    <div class="col-md-12">  
        <table class="table table-bordered ">
                <thead class=" ">
                    <tr  class=" text-center ">
                        <th class="border  ">ID</th>
                        <th class="border  ">Group/Role Name</th>
                        <th class="border  ">Discription</th>
                        <th class="border  ">Action</th>
                    </tr>
                    <?php  if(!empty($groups)): foreach($groups as $group):?>   
                    <tr class=''>
                        <td class="border "><?php  echo $group['id'];?></td>
                        <td class="border "><?php echo $group['name'];?></td>
                        <td class="border  "><?php echo $group['description'];?></td>
                        <td class="border  text-center">
                            <a class="btn btn-outline-light" href="<?php  echo base_url('groups/view/'.$group['id']); ?>"> View </a>
                            <a class="btn btn-warning " href="<?php  echo base_url('groups/show_edit_form/'.$group['id'] ); ?>"> Edit </a>
                            <a class="btn btn-danger" href="<?php echo base_url('groups/delete/'.$group['id']); ?>">Delete</a>  
                        </td>
                    </tr>
                    <?php endforeach; endif;?>
                </thead>
        </table>
        <div class="text-center">
            <a class="btn btn-success text-center" href="<?php  echo site_url('groups/show_add_form/'); ?>" >Add Group </a>  
             <!-- this button is not submit button but it change url and go to new url (its a lin button and took to the other link)-->
        </div>
    </div>
   
  </div>
 

</section>


<?php $this->load->view('layout/footer');?>
