   
<style type="text/css">
  

@media (min-width: 168px){

#page-wrapper {
   
    padding: 0 30px;
    min-height: 300px;
    border-left: 1px solid #2c3e50;
}
}

#page-wrapper {
    padding: 0 15px;
    border: none;
    
}

.date-picker{    
    border-color: #138871;
    color: #fff;
    background-color: #149077;
    margin-top: -7px;
    border-radius: 0px;
    margin-right: -15px;
}

#page-wrapper .breadcrumb {
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color: #e0e7e8;
    border-radius: 0px;
    
}


@media (min-width: 768px){
.circle-tile {
    margin-bottom: 30px;
}
}

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}

.circle-tile-heading {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto -40px;
    border: 3px solid rgba(255,255,255,0.3);
    border-radius: 100%;
    color: #fff;
    transition: all ease-in-out .3s;
}

/* -- Background Helper Classes */

/* Use these to cuztomize the background color of a div. These are used along with tiles, or any other div you want to customize. */

 .dark-blue {
    background-color: #34495e;
}

.green {
    background-color: #16a085;
}

.blue {
    background-color: #2980b9;
}

.orange {
    background-color: #f39c12;
}

.red {
    background-color: #e74c3c;
}

.purple {
    background-color: #8e44ad;
}

.dark-gray {
    background-color: #7f8c8d;
}

.gray {
    background-color: #95a5a6;
}

.light-gray {
    background-color: #bdc3c7;
}

.yellow {
    background-color: #f1c40f;
}

/* -- Text Color Helper Classes */

 .text-dark-blue {
    color: #34495e;
}

.text-green {
    color: #16a085;
}

.text-blue {
    color: #2980b9;
}

.text-orange {
    color: #f39c12;
}

.text-red {
    color: #e74c3c;
}

.text-purple {
    color: #8e44ad;
}

.text-faded {
    color: rgba(255,255,255,0.7);
}



.circle-tile-heading .fa {
    line-height: 80px;
}

.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-description {
    text-transform: uppercase;
}

.text-faded {
    color: rgba(255,255,255,0.7);
}

.circle-tile-number {
    padding: 5px 0 15px;
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
}

.circle-tile-footer {
    display: block;
    padding: 5px;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.1);
    transition: all ease-in-out .3s;
}

.circle-tile-footer:hover {
    text-decoration: none;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.2);
}



.time-widget {
    margin-top: 5px;
    overflow: hidden;
    text-align: center;
    font-size: 1.75em;
}

.time-widget-heading {
    text-transform: uppercase;
    font-size: .5em;
    font-weight: 400;
    color: #fff;
}
#datetime{color:#fff;}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0,0,0,0.9);
}

.tile {
    margin-bottom: 15px;
    padding: 15px;
    overflow: hidden;
    color: #fff;
}
</style>




<div style="margin-top: 0px; padding-top: 0px;" class="box box-success">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;<b>DASHBOARD</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>System Overview</small> <span><b>(<?php echo mdate('%d/%m/%Y %H:%i:%s');?>)</b></span></h3>
    </div>
    <div class="box-body">
           

        <div class="container-2">
              <div id="page-wrapper">

              <div class="rov" style="padding: 0 0 0 0;">
                  <div class="col-md-6 " style="padding: 0 5px 0 0;">
                      <div class="well well-sm">
                          <b style="font-size: 20px;">ENERGY</b>
                          <div class="row" >
                            <div class="col-lg-6 col-sm-12">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading dark-blue">
                                            <i class="fa fa-clipboard fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content dark-blue">
                                        <div class="circle-tile-description text-faded">
                                            Pending
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            00
                                            <span id="sparklineA"></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                             <div class="col-lg-6 col-sm-12">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading green">
                                            <i class="fa fa-laptop fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content green">
                                        <div class="circle-tile-description text-faded">
                                            Accepted
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            20
                                        </div>
                                        <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                             <div class="col-lg-6 col-sm-12">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading blue">
                                            <i class="fa fa-tasks fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content blue">
                                        <div class="circle-tile-description text-faded">
                                            Approved 
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            10
                                            <span id="sparklineB"></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading blue">
                                            <i class="fa fa-tasks fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content blue">
                                        <div class="circle-tile-description text-faded">
                                            Approved 
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            10
                                            <span id="sparklineB"></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>


                        </div>

                      </div>
                  </div>





                  <div class="col-md-6" style="padding: 0 0 0 5px;">
                      <div class="well well-sm">
                          <b style="font-size: 20px;">ACCESS</b>

                          <div class="row">
                              <div class="col-lg-6 col-sm-12">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading green">
                                            <i class="fa fa-laptop fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content green">
                                        <div class="circle-tile-description text-faded">
                                            Accepted
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            20
                                        </div>
                                        <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                           <div class="col-lg-6 col-sm-12">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading orange">
                                            <i class="fa fa-bell fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content orange">
                                        <div class="circle-tile-description text-faded">
                                           Rejected 
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            20
                                        </div>
                                        <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading blue">
                                            <i class="fa fa-arrows-alt fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content blue">
                                        <div class="circle-tile-description text-faded">
                                            Approved 
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            10
                                            <span id="sparklineB"></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading red">
                                            <i class="fa fa-trash-o fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content red">
                                        <div class="circle-tile-description text-faded">
                                            Rejected
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            24
                                            <span id="sparklineC"></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                          </div>

                      </div>
                  </div>

              </div>

















                                        
               <div class="row" >
                   <!--  <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-clipboard fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Pending
                                </div>
                                <div class="circle-tile-number text-faded">
                                    00
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div> -->

                   <!--  <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-laptop fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Accepted
                                </div>
                                <div class="circle-tile-number text-faded">
                                    20
                                </div>
                                <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div> -->

                   <!--  <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-bell fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                                <div class="circle-tile-description text-faded">
                                   <b style="font-size: 20px;">Rejected => 20</b>
                                </div>
                              <div class="circle-tile-number text-faded">
                                    20
                                </div> 
                                <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-tasks fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Approved 
                                </div>
                                <div class="circle-tile-number text-faded">
                                    10
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-trash-o fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Rejected
                                </div>
                                <div class="circle-tile-number text-faded">
                                    24
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading purple">
                                    <i class="fa fa-arrows-alt fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content purple">
                                <div class="circle-tile-description text-faded">
                                    All Requests
                                </div>
                                <div class="circle-tile-number text-faded">
                                    96
                                    <span id="sparklineD"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">Continue <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div> -->

                </div> 














               
          </div><!-- page-wrapper END-->
         </div><!-- container-1 END-->

                         
    </div>
</div>




 









<script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-toggle").click(function(){
            $(this).hide();
            
           $("#user-profil").show();
            
           $("#hide-btn").show();
            
           $(".container-2").css("width", "85%");
            
             
        });
        
        $("#hide-btn").click(function(){
            $(this).hide();
            
           $("#user-profil").hide();
            
           $(".sidebar-toggle").show();
            
           $(".container-2").css("width", "100%");
            
             
        });
    });
</script>

   
 