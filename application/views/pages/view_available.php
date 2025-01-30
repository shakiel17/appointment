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
          <br>
          <p>
            <a href="<?=base_url('appointment');?>" class="btn btn-success btn-sm">Select Doctor</a>
          </p>
        </div>        
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
                            <?=$item['name'];?>
                        </td>
                    </tr>
                </table>                
              </div>    
              <?php
              $datetime=$year."-".$month;
              if($month==date('m') && $year==date('Y')){
                $previous="disabled";
              }else{
                $previous="";
              }
              $nextdate=date('m-Y',strtotime('1 month',strtotime($datetime)));
              $prevdate=date('m-Y',strtotime('-1 month',strtotime($datetime)));
              ?>
              <!-- <table width="100%" border="1" style="border-collapse:collapse; border-color:#96D4D4;"> -->
                <div class="table-responsive">
                <table class="table table-bordered" width="100%" style="table-layout: fixed;">
                  <tr style="background-color: greenyellow;">
                    <td colspan="2" align="right" style="border-right:0;">
                      <?=form_open(base_url('view_available'));?>
                      <input type="hidden" name="apcode" value="<?=$item['code'];?>">
                      <input type="hidden" name="month" value="<?=$prevdate;?>">
                      <button type="submit" class="btn btn-primary btn-sm" <?=$previous;?>><< Previous</button>
                      <?=form_close();?>
                    </td>
                    <td align="center" colspan="3" style="border-right:0;border-left:0;">
                      <h4><b><?=date('F',strtotime($datetime));?> <?=$year;?></b></h4>
                    </td>
                    <td colspan="2" align="left" style="border-left:0;">
                      <?=form_open(base_url('view_available'));?>
                      <input type="hidden" name="month" value="<?=$nextdate;?>">
                      <input type="hidden" name="apcode" value="<?=$item['code'];?>">
                      <button type="submit" class="btn btn-primary btn-sm">Next >></button>
                      <?=form_close();?>
                    </td>
                  </tr>
                    <tr>
                      <td align="center" style="background-color:red; color:white;"><b>SUN</b></td>
                      <td align="center" style="background-color:blue; color:white;"><b>MON</b></td>
                      <td align="center" style="background-color:blue; color:white;"><b>TUE</b></td>
                      <td align="center" style="background-color:blue; color:white;"><b>WED</b></td>
                      <td align="center" style="background-color:blue; color:white;"><b>THU</b></td>
                      <td align="center" style="background-color:blue; color:white;"><b>FRI</b></td>
                      <td align="center" style="background-color:blue; color:white;"><b>SAT</b></td>
                    </tr>
                    <?php
                    $w=0;                    
                    for($i=1;$i<=date('t',strtotime($datetime));$i++){
                      $date=date('Y-m-d',strtotime($datetime."-".$i));                      
                      $check=$this->Clinic_model->db->query("SELECT * FROM appointment WHERE apcode='$item[code]' AND appointment_date='$date'");
                      $res=$check->num_rows();
                      $qry=$this->Clinic_model->db->query("SELECT * FROM docfile WHERE code='$item[code]'");
                      $rs1=$qry->row_array();
                      $day=date('w',strtotime($date));
                      if(strpos($item['PF'],"$day")){                        
                        if(strtotime($date) <= strtotime(date('Y-m-d')) || strpos($rs1['date_unavailable'],$date) !== false){
                          $button="<br><font style='font-size:1.5w;'>N/A</font>";
			   $color="background-color:gray;";
                        }else{
                          if($res >= $item['vatex']){
                            $button="<br><font style='font-size:1.5w;'>FULL</font>";                       
			   $color="background-color:gray;";
                          }else{                          
                            $button="<br>
                          <font style='font-size:2vmin;'>$item[rebates]</font><br>
                          <form action='".base_url()."appointment_details' method='POST' style='width:100%;'>
                          <input type='hidden' name='apcode' value='$item[code]'>
                          <input type='hidden' name='datearray' value='$date'>
                            <button type='submit' style='font-size:2vmin;border:0;background-color:green; color:white; padding:5px; border-radius:5px;'><i class='fa fa-calendar'></i> Select Date</button>
                          </form>";
				$color="";
                          }  
                        }
                      }else{
                         $button="<br><font style='font-size:1.5w;'>N/A</font>";
			   $color="background-color:gray;";                      
                      }                      
                      if($i==1){
                        for($x=0;$x<7;$x++){
                            if(date('w',strtotime($date))==$x){                              
                             echo "<td style='$color' align='center'><b style='float:center; font-size:3vw;'>$i</b>$button</td>";                                 
                                $w++;
                                break;                                                                                                                                                     
                            }else{
                                echo "<td style='background-color:gray;'>&nbsp;</td>";
                                $w++;
                            }
                           
                       }
                    }else{                      
                        echo "<td style='$color' align='center'><b style='float:center; font-size:3vw;'>$i</b>$button</td>"; 
                        $w++;
                    }
                                                               
                   
                    if($w > 6){
                        $w=0;
                        echo "</tr>";
                    }
                    }
                    ?>
                </table>
                  </div>
            </div>
          </div>                  
        </div>        
      </div>
    </div>
  </section>
