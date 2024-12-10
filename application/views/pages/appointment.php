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
        <?=form_open(base_url()."view_available");?>
        <div class="row">
          <div class="col-md-12">
            <div class="box ">              
              <div class="detail-box">
                <h5>
                  Appointment Details
                </h5>
                <table width="100%" border="0" style="text-align:left;">
                    <tr>
                        <td><b>Doctor:</b></td>
                        <td>
                            <select name="apcode" class="form-control" required>
                                <option value="">Select Doctor</option>
                                <?php
                                foreach($items as $item){
                                    echo "<option value='$item[code]'>$item[lastname], $item[firstname] - $item[specialization]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
          </div>                  
        </div>
        <div class="btn-box">
          <button type="submit" class="btn btn-success">
            View Availability
          </button>
        </div>
        <?=form_close();?>
      </div>
    </div>
  </section>