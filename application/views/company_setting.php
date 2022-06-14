<?php 
  $this->load->view('layout/header');
?>

<?php
         // $user_info=$this->session->userdata('user');
         $userPermissions = $this->session->userdata('userPermissions');
         // var_dump($logged_info);
         // var_dump($user_info);
         // var_dump($userPermissions);
         // exit(); don't give it, its a page not controller

         if(empty($userPermissions)){

              redirect('login','refresh');

         }

        if(!in_array("Company_Setting",$userPermissions)){ 

          redirect('dashboard','refresh');

        }
         
?>

      <!-- Main content -->
  <section class="content ml-5">

    <div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <!-- /.box-header -->
              <form action="<?php echo base_url('CompanySetting/add_company'); ?>" method="post" 
                  id="settingForm" class="form-horizontal" name="companyForm" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-md-6"> 
                        <div class="box-body">

                            <div class="form-group">
                              <label class="col-sm-4 control-label require" for="inputEmail3">
                                Name<span class="text-danger">*</span>
                              </label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="company_name" value="<?php  if(isset($data[0]->name)){ echo $data[0]->name; }?>">
                                <span style="font-size:20px;"><?php  echo form_error('name');?></span> 
                                    <p style="color:#990000;"></p>
                              </div>
                            </div>            

                            <div class="form-group">
                              <label class="col-sm-4 control-label" for="inputEmail3">
                                Short Name<span class="text-danger">*</span>
                              </label>

                              <div class="col-sm-8">
                                <input type="text" name="short_name" id="short_name" value="<?php  if(isset($data[0]->short_name)){ echo $data[0]->short_name;}?>" class="form-control">
                                <span style="font-size:20px;"> </span>
                                    <p style="color:#990000;"></p>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label require" for="inputEmail3">
                                Email<span class="text-danger">*</span>
                              </label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" id="email" value="<?php if(isset($data[0]->email)){ echo $data[0]->email;}?>">
                                <span style="font-size:20px;"> </span>
                                    <p style="color:#990000;"></p>
                                    <h4 id="emailid" style="color:#990000;"></h4>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label require" for="inputEmail3">
                                Mobile <span class="text-danger">*</span>
                              </label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php if(isset($data[0]->phone)){ echo $data[0]->phone; }?>">
                                  <span style="font-size:20px;"><?php  ?></span>
                                    <p id="con" style="color:#990000;"></p> 
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label" for="inputEmail3">
                                Bank Name 
                              </label>

                              <div class="col-sm-8">
                                <input type="text" name="bank_name" id="bank_name" value="<?php if(isset($data[0]->bank_name)){ echo $data[0]->bank_name;}?>" class="form-control">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label" for="inputEmail3">
                                  A/c No
                              </label>

                              <div class="col-sm-8">
                                <input type="text" name="ac_no" id="ac_no" value="<?php if(isset($data[0]->ac_no)){ echo $data[0]->ac_no;}?>" class="form-control">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label" for="gstin">
                              GSTIN
                              </label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="gstin" id="gstin" value="<?php if(isset($data[0]->gstin)){ echo $data[0]->gstin; }?>" maxlength="16">
                                <span style="font-size:20px;">
                                <?php  ?></span>
                                <label>ex : 22AAAAA0000A1Z5(15 digit)</label>
                                <p id="gstinno" style="color:#990000;"></p>
                              </div>
                            </div>

                        </div>  
                      </div>

                      <!-- ================================================================= -->
                      <!-- ================================================================= -->
                      <!-- ================================================================= -->

                      <div class="col-md-6 pl-5">                     
                        <div class="box-body">
                              <div class="form-group">
                                <label class="col-sm-4 control-label require" for="inputEmail3">
                                  Street
                                    <?php?>
                                </label>

                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="street" id="company_street" value="<?php if(isset($data[0]->street)){ echo $data[0]->street;}?>" >
                                    <span style="font-size:20px;"><?php ?></span>
                                      <p style="color:#990000;"></p> 
                                </div>
                              </div>

                              <!-- Country -->
                              <div class="form-group">
                                <label class="col-sm-4 control-label require" for="country">
                                Country
                                </label>
                                <div class="col-sm-8">
                                  <select class="form-control select2" name="country" id="country">
                                  <option value="<?php // if (isset($data[0]->country_id)) { echo $data[0]->country_id; } ?>">Select</option>
                                      <?php foreach ($countries as  $row):?>
                                        <option value='<?php echo $row->id; ?>' <?php echo ($row->id == $data[0]->country_id) ? 'selected' : '' ?>> <?php echo $row->name; ?> </option>
                                      <?php endforeach;?>                             
                                  </select>
                                <!-- span class="validation-color" id="err_country"><?php  ?></span>
                                      <p id="coun" style="color:#990000;"></p> -->  
                                </div>
                              </div>  
                            

                              <!-- State -->
                              <div class="form-group">
                                <label class="col-sm-4 control-label require" for="city">
                                State
                                </label>
                                <div class="col-sm-8">
                                  <select class="form-control select2" name="state" id="state" value="" >
                                    <option value="<?php //if (isset($data[0]->state)) { echo $data[0]->state; }?> ">Select</option>
                                              <?php foreach ($states as  $row):  ?>
                                                <option value='<?php echo $row->id; ?>' <?php echo ($row->id == $data[0]->state) ? 'selected' : '' ?>> <?php echo $row->name;  ?> </option>
                                              <?php endforeach;?>                                        
                                  </select>
                                  <!-- <span class="validation-color" id="err_city"></span>
                                      <p style="color:#990000;"></p> -->
                                </div>
                              </div>  
                              

                              <div class="form-group">
                                <label class="col-sm-4 control-label" for="inputEmail3">
                                Post code
                                </label>

                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php if(isset($data[0]->zip_code)){ echo $data[0]->zip_code; }?>" >
                                  <span style="font-size:20px;"> </span>
                                      <p style="color:#990000;"></p>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-4 control-label require" for="inputEmail3"> 
                                    Login Page Logo
                                </label>

                                <div class="col-sm-8">
                                  <input type="file" class="form-control" name="login_logo" id="login_logo"value="<?php ($data[0]->loginpage_image)?>">
                                  <!-- <input type="hidden" class="form-control" name="login_image" id="login_image" value="<?php //if(isset($data[0]->loginpage_image)){echo $data[0]->loginpage_image; }?>">  -->

                                    <p>Recomended size : 300*120</p>
                                      <p style="color:#990000;"></p> 
                                    <?php if(isset($data[0]->loginpage_image)){?>  
                                    <!-- <img src="<?php //echo base_url();?>/asset/images/<?php //if(isset($data[0]->loginpage_image)){echo $data[0]->loginpage_image;}?>" height="50" width="100"> -->
                                    <?php echo"<img style='height: 40px; width:100px;' src=".$data[0]->loginpage_image." width='40' height='100'>"; ?>
                                    <?php } ?>
                                </div>
                              </div> 

                        </div>                        
                      </div>
                  </div>
                    <!-- /.box-body -->
                  <div class="row">  
                    <div class="col-md-12 text-center pb-2">
                      <!-- <center> -->
                        <input class="btn btn-success btn-flat" type="submit" id="btn" value="Submit" name="btnsubmit" > 
                      <!-- </center>  -->
                    </div>
                  </div>
                  <!-- /.box-footer -->
              </form>
            </div>
              <!-- /.box-body -->
          </div>
      </div>
    </div>
      
  </section>



<?php 
  $this->load->view('layout/footer');
?> 
<script type="text/javascript">
    // $('#country').change(function(){
    //       var id = $(this).val(); 
    //       $('#state').html('<option value="">Select</option>');
    //       $('#city').html('<option value="">Select</option>');
    //       $.ajax({
    //           url: "<?php //echo base_url('settings/getState') ?>/"+id,
    //           type: "GET",
    //           dataType: "JSON",
    //           success: function(data){
    //             for(i=0;i<data.length;i++){
    //               $('#state').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
    //             }
    //           }
    //         });
    //   });

    //   $('#state').change(function(){
    //   var id = $(this).val();
    //   $('#city').html('<option value="">Select</option>');
    //   $.ajax({
    //       url: "<?php// echo base_url('settings/getCity') ?>/"+id,
    //       type: "GET",
    //       dataType: "JSON",
    //       success: function(data){
    //         for(i=0;i<data.length;i++){
    //           $('#city').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
    //         }
    //       }
    //     });
    // });
</script>

<script type="text/javascript">
  window.setTimeout(function() {
      $(".alert").fadeTo(400, 0).slideUp(400, function(){
          $(this).remove(); 
      });
  }, 1000);
</script>