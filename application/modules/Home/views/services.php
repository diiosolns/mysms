<style type="text/css">

.box {
    border-radius: 3px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    padding: 10px 25px;
    text-align: right;
    display: block;
    margin-top: 60px;
}
.box-icon {
    background-color: #57a544;
    border-radius: 50%;
    display: table;
    height: 100px;
    margin: 0 auto;
    width: 100px;
    margin-top: -61px;
}
.box-icon span {
    color: #fff;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}
.info h4 {
    font-size: 26px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.info > p {
    color: #717171;
    font-size: 16px;
    padding-top: 10px;
    text-align: justify;
}
.info > a {
    background-color: #03a9f4;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    color: #fff;
    transition: all 0.5s ease 0s;
}
.info > a:hover {
    background-color: #0288d1;
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.16), 0 2px 5px 0 rgba(0, 0, 0, 0.12);
    color: #fff;
    transition: all 0.5s ease 0s;
}

.serviceHeader {
  margin-left: 20px;
  padding: 15px 5px 10px 5px;
}

.fullwidth {
    margin-left: 0;
    margin-right: 0; 
    width: 100%;
}
</style>

  <div class="serviceHeader time-label">
    <span class="bg-aqua" style="padding: 10px 15px 10px 15px;">
      <b style="font-size: 20px;"><?php echo $this->lang->line('msg_services_home'); ?></b>
   </span>
 </div>


<div class="container fullwidth">
   <!--  <div class="time-label" style="text-align: justify; font-size: 16px;">
          <p><?php echo $this->lang->line('msg_serv_text1'); ?></p>
         <p><?php echo $this->lang->line('msg_serv_text2'); ?></p>
         <p><?php echo $this->lang->line('msg_serv_text3'); ?></p>
    </div> -->


    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 wow animated fadeInLeft">
            <div class="box">
                <div class="bg-aqua box-icon">
                    <span class="fa fa-4x fa-comments"></span>
                </div>
                <div class="info">
                    <h4 class="text-center"><?php echo $this->lang->line('msg_serv_bulk_sms'); ?></h4>
                    <p>
                        <?php echo $this->lang->line('msg_serv_bulk_sms_txt'); ?>  
                        
                    <br>
                    </p>
                   <!--  <div style="text-align: left;">
                      <b>Benefits to User</b>
                      <ul>
                        <li>Meet your Target People</li>
                        <li>Find Business Profile Easly.</li>
                       
                      </ul>
                    </div> -->
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 wow animated fadeInUp">
            <div class="box">
                <div class="bg-aqua box-icon">
                    <span class="fa fa-4x fa-laptop"></span>
                </div>
                <div class="info">
                    <h4 class="text-center"><?php echo $this->lang->line('msg_serv_software'); ?> </h4>
                    <p><?php echo $this->lang->line('msg_serv_software_txt'); ?></p>
                    <!-- <div style="text-align: left;">
                      <b>Benefits to service providers</b>
                      <ul>
                        <li>Marketing platform</li>
                        <li>Reach large number of people in a short time</li>
                        <li>Guarantee on return on investment </li>
                        <li>Free and valuable site to use </li>
                      </ul>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 wow animated fadeInUp">
            <div class="box">
                <div class="bg-aqua box-icon">
                    <span class="fa fa-4x fa-shopping-cart "></span>
                </div>
                <div class="info">
                    <h4 class="text-center"><?php echo $this->lang->line('msg_serv_business'); ?> </h4>
                    <p><?php echo $this->lang->line('msg_serv_business_txt'); ?> <br><br></p>
                    <!-- <div style="text-align: left;">
                      <b>Benefits to User</b>
                      <ul>
                        <li>Marketing platform</li>
                        <li>Reach large number of people in a short time</li>
                        <li>Guarantee on return on investment </li>
                        <li>Free and valuable site to use </li>
                      </ul>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 wow animated fadeInRight">
            <div class="box">
                <div class="bg-aqua box-icon">
                    <span class="fa fa-4x fa-book "></span>
                </div>
                <div class="info">
                    <h4 class="text-center"><?php echo $this->lang->line('msg_serv_learning'); ?> </h4>
                    <p><?php echo $this->lang->line('msg_serv_learning_txt'); ?> </p>
                    <!-- <div style="text-align: left;">
                      <b>Benefits to User</b>
                      <ul>
                        <li>...</li>
                        <li>...</li>
                        <li>...</li>
                      
                      </ul>
                    </div> -->
                </div>
            </div>
        </div>
       
  </div>

</div>