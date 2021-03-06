<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Doctor Registration <small>Register new doctor</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>doctor_registration/register">
              <div class="title_left">
                <small>Basic Information</small>
                <hr>
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">First Name <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="fname" id="fname" class="form-control">
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Last Name <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="lname" id="lastname" class="form-control">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Father Name <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="fathername" id="fathername" class="form-control">
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Gender <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="gender">
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    <option value="o">Others</option>
                  </select>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Email <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="email" required="required" name="email" id="email" class="form-control">
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Mobile <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="mobile" required="required" name="mobile" id="mobile" class="form-control" minlength="10" maxlength="10">
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">DOB <span class="required">*</span></label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="date" required="required" name="dob" id="dob" class="form-control">
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Category <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="category" required>
                    <option value="">Select Category</option>
                    <?php if ($category) { 
                          foreach ($category as $key => $catvalue) { ?>
                    <option value="<?php echo $catvalue['doctor_category_id']; ?>"><?php echo $catvalue['category_name']; ?></option>

                  <?php }} ?>
                  </select>
                </div>               
              </div>
              <br>
              
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Complete Address</label>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" required="required" name="address" id="address" class="form-control">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                 
                </div>              
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="state" id="state" required>
                    <option value="">Select State</option>
                    <?php foreach ($states as $key => $svalue) { ?>
                    <option value="<?php echo $svalue['id']; ?>" ><?php echo $svalue['name']; ?></option>

                    <?php } ?>
                              
                  </select>
                  <span>Select State</span>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="city" required id="city">
                                                  
                  </select>
                  <span>Select City</span>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <input type="text" required="required" name="pincode" class="form-control">
                  <span>Pincode</span>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                 
                </div>
                
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="lat" class="form-control">
                  <span>Latitude</span>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="long" class="form-control">
                  <span>Longitude</span>
                </div>
              </div>
              <br>
              <div class="title_left">
                <small>Professional Information</small>
                <hr>
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Registration No <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <input type="text" required="required" name="registration_no" class="form-control">
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Medical Council <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="mc" required>
                    <option value="">Select Council</option>
                    <?php foreach ($mc as $key => $mcvalue) { ?>
                    <option value="<?php echo $mcvalue['medical_council']; ?>" ><?php echo $mcvalue['medical_council']; ?></option>

                    <?php } ?>
                              
                  </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="mc_year" required>
                    <option value="">Select Year</option>
                    <?php for ($i=2021; $i >= 1980; $i--) { ?>
                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>

                    <?php } ?>
                              
                  </select>
                  <span>Certification Year</span>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Medical Degree<span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="md">
                    <option value="">Select Degree</option>
                    <?php foreach ($md as $key => $mdvalue) { ?>
                    <option value="<?php echo $mdvalue['medical_degree']; ?>" ><?php echo $mdvalue['medical_degree']; ?></option>

                    <?php } ?>
                              
                  </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="md_year">
                    <option value="">Select Year</option>
                    <?php for ($i=2021; $i >= 1980; $i--) { ?>
                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>

                    <?php } ?>
                              
                  </select>
                  <span>Passout Year</span>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <input type="text" name="md_college" class="form-control" required>
                  <span>Medical College Name</span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Experience<span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="number" name="experience" min="0" class="form-control" required>
                </div>               
              </div>



              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Speciality</label>
                  <span class="text-warning">* Select speciality if any</span>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  
                  <div class="checkbox col-md-3 col-sm-3 col-xs-12">
                    <label>
                      <input name="specility" type="radio" class="flat" value="na"> NA
                    </label>
                  </div>

                  <?php if ($specility) { 
                          foreach ($specility as $key => $spcvalue) { ?>
                  <div class="checkbox col-md-3 col-sm-3 col-xs-12">
                    <label>
                      <input name="specility" type="radio" class="flat" value="<?php echo $spcvalue['speciality_id']; ?>"> <?php echo $spcvalue['speciality_name']; ?>
                    </label>
                  </div>

                <?php }} ?>

                </div>
              </div>             
              <div class="ln_solid"></div>
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <button type="submit" class="btn btn-success" id="bt_registration">Submit</button>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <label id="status" class="text-info">
                    <?php
                        if ($this->session->flashdata('msg')) {
                          echo $this->session->flashdata('msg');
                        }
                     ?>
                  </label>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>


<script type="text/javascript">
    $('#state').change(function(){
      $('#city').empty();
      var state =$('#state').val();
      if (state.length>0) {
          $.ajax({
                type: 'POST',
                url: base_url + 'user_registration/get_cities',
                data: JSON.stringify(state),
                dataType: 'json',
             })
             .done(function(json) {

                var city_html = '<option value="">Select City</option>';

                $.each(json.cities, function(i, item) {
                    city_html = city_html + '<option value="'+item.id+'">'+item.name+'</option>';
                });

                $('#city').append(city_html); 
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             }); 
     
      }else{
               var city_html = '<option value="">No City</option>';
               $('#city').append(city_html); 
      }//end of if      
             
    }); // end of change state
</script>