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
          <p>
            <?=form_open(base_url('appointment_search'));?>
            <b>Specialization:</b> 
            <select name="specialization" class="form-control" required>
              <option value="">Select Specialization</option>
              <?php
              $department=$this->Clinic_model->getAllDepartment();
              foreach($department as $row){
                echo "<option value='$row[specialization]'>$row[specialization]</option>";
              }
              ?>
            </select>
            <br>
            <input type="submit" value="Search" class="btn btn-primary btn-sm">
            <?=form_close();?>
          </p>
          <p>
            <?=form_open(base_url('appointment_search_doctor'));?>
            <b>Last Name:</b> 
            <input type="hidden" name="specialization" value="<?=$specialization;?>">
            <input type="text" name="lastname" class="form-control">
            <br>
            <input type="submit" value="Search" class="btn btn-primary btn-sm">
            <?=form_close();?>
          </p>
        </div>        
        <div class="row">          
          <?php
          foreach($items as $item){            
          ?>          
          
          <div class="col-md-3">
            <div class="box ">
              <div class="img-box">
                <?php
                if($item['pic']==""){
                  ?>
                  <img src="<?=base_url();?>design/images/s4.png" alt="">
                  <?php
                }else{
                  ?>
                  <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($item['pic']);?>" alt="">
                  <?php
                }
                ?>              
              </div>
              <div class="detail-box">
                <h5>
                  <?=$item['name'];?>
                </h5>
                <p>
                <?=$item['specialization'];?>
                </p>
                <?=form_open(base_url()."view_available");?>
          <input type="hidden" name="month" value="<?=date('m-Y');?>">
          <input type="hidden" name="apcode" value="<?=$item['code'];?>">
                <p>
                  <input type="submit" class="btn btn-success btn-sm" value="View Availability">
                </p>
                <?=form_close();?>
              </div>
            </div>
          </div>  
          
                      
          <?php
          }
          ?> 
        </div>
        
        <!-- <div class="btn-box">
          <button type="submit" class="btn btn-success">
            View Availability
          </button>
        </div> -->
        
      </div>
    </div>
  </section>