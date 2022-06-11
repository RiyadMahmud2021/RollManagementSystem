<?php $this->load->view('layout/header');?>

<section class="content">

    <div class="row">

        <div class="col-md-2">
                <div class="box box-primary">  
                </div>       
        </div>
        
        <div class="col-md-8 ">
            <div class="box-header with-border text-center">
                <h3 class="box-title text-bold">Edit User</h3>
                <hr/>
                <hr/>
            </div>

            <form action="<?php echo base_url('registrations/edit/'.$edit_users->id);?>" method="POST" id="myform1" class="form-horizontal" name="memberForm"> 
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Username</label>
                        <input value="<?php echo $edit_users->username;?>" type="text" class="form-control"  placeholder="Username" name="username">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input value="<?php echo $edit_users->password;?>" type="password" class="form-control" placeholder="Password" name="password">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Email</label>
                        <input value="<?php  echo $edit_users->email; ?>" type="email" class="form-control" placeholder="Email" name="email">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">First Name</label>
                        <input value="<?php echo $edit_users->first_name;?>" type="firstname" class="form-control" placeholder="First Name" name="first_name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Last Name</label>
                        <input value="<?php echo $edit_users->last_name;?>" type="lastname" class="form-control" placeholder="Last Name" name="last_name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Phone</label>
                        <input value="<?php echo $edit_users->phone;?>" type="phone" class="form-control" placeholder="Phone" name="phone">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">NID</label>
                        <input value="<?php echo $edit_users->nid;?>" type="nid" class="form-control" placeholder="NID" name="nid">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Employee Address</label>
                        <input value="<?php echo $edit_users->employee_address;?>" type="employee_address" class="form-control" placeholder="Employee Address" name="employee_address">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Designation</label>
                        <input value="<?php echo $edit_users->designation;?>" type="designation" class="form-control" placeholder="Designation" name="designation">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">User Group</label>
                        <select  class="form-control valdation_select select2" name="user_group" id="user_group">   
                                        <option selected="selected">Choose one</option>
                                            <?php foreach($groups as $group) :?>
                                                <option value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
                                            <?php endforeach; ?>
                        </select>
                    </div>

                </div> 
    
                <div class="box-footer col-md-12 text-center"> 
                    <input class="btn btn-primary " type="submit" name="btnSubmit" value="Submit">
                </div>

            </form> 
        </div>

        <div class="col-md-2">
            <div class="box box-primary">

            </div>       
        </div>

    </div>

</section>

<?php $this->load->view('layout/footer');?>