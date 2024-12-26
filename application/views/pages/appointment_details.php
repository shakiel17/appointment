<section class="department_section layout_padding">
    <div class="department_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Book an Appointment
          </h2>
          <p>
            Quality Health Care for All
          </p>
        </div>        
        <div class="row">
          <div class="col-md-12">
            <div class="box ">      
              <?=form_open(base_url()."save_appointment");?>   
              <input type="hidden" name="apcode" value="<?=$item['code'];?>">     
              <input type="hidden" name="datearray" value="<?=$datearray;?>">
              <div class="detail-box">
                <h5>
                  Appointment Details
                </h5>
                <table width="100%" border="0" style="text-align:left;">
                    <tr>
                        <td><b>Doctor:</b></td>
                        <td>
                            <?=$item['name'];?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Appointment Date:</b></td>
                        <td>
                            <?=date('M d, Y',strtotime($datearray));?>
                        </td>
                    </tr>
                    <tr>
                      <td><b>Last Name</b></td>
                      <td><input type="text" name="lastname" class="form-control" required></td>
                    </tr>
                    <tr>
                      <td><b>First Name</b></td>
                      <td><input type="text" name="firstname" class="form-control" required></td>
                    </tr>
                    <tr>
                      <td><b>Middle Name</b></td>
                      <td><input type="text" name="middlename" class="form-control" required></td>
                    </tr>
                    <tr>
                      <td><b>Suffix</b></td>
                      <td><input type="text" name="suffix" class="form-control"></td>
                    </tr>
                    <tr>
                      <td><b>Date of Birth</b></td>
                      <td><input type="date" name="birthdate" class="form-control" required></td>
                    </tr>
                    <tr>
                      <td><b>Contact No.</b></td>
                      <td><input type="text" name="contactno" class="form-control" required></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><input type="submit" class="btn btn-primary" value="Submit"></td>
                    </tr>
                </table>                
              </div>  
              <?=form_close();?>                
            </div>
          </div>                  
        </div>        
      </div>
    </div>
  </section>