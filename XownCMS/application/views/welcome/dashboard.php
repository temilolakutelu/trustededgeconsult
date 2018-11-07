<link type="text/css" href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.css" rel="stylesheet"> 						<!-- FullCalendar -->
<link type="text/css" href="<?php echo base_url(); ?>assets/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"> 			<!-- jVectorMap -->
<link type="text/css" href="<?php echo base_url(); ?>assets/switchery/switchery.css" rel="stylesheet">  


<!-- Charts -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/charts-flot/jquery.flot.min.js"></script>             	<!-- Flot Main File -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/charts-flot/jquery.flot.pie.min.js"></script>             <!-- Flot Pie Chart Plugin -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/charts-flot/jquery.flot.stack.min.js"></script>       	<!-- Flot Stacked Charts Plugin -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/charts-flot/jquery.flot.orderBars.min.js"></script>   	<!-- Flot Ordered Bars Plugin-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/charts-flot/jquery.flot.resize.min.js"></script>          <!-- Flot Responsive -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/charts-flot/jquery.flot.tooltip.min.js"></script> 		<!-- Flot Tooltips -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/charts-flot/jquery.flot.spline.js"></script> 				<!-- Flot Curved Lines -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/sparklines/jquery.sparklines.min.js"></script> 			 <!-- Sparkline -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>       <!-- jVectorMap -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jvectormap/jquery-jvectormap-world-mill-en.js"></script>   <!-- jVectorMap -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/switchery/switchery.js"></script>     					<!-- Switchery -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easypiechart/jquery.easypiechart.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/moment.min.js"></script> 		 			<!-- Moment.js Dependency -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.js"></script>   			<!-- Calendar Plugin -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo-index.js"></script> 

<!-- load api -->

<div class="row" style="margin-top: 40px;">
    <div class="col-sm-12">
        <h4 style="color: #7C1828 !important">Trusted Edge Consult</h4>
    </div>
    <!--div class="col-md-3">
        <div class="info-tile tile-orange">
            <div class="tile-icon"><i class="ti ti-user"></i></div>
            <div class="tile-heading"><span>Enrollee</span></div>
           <div class="tile-body"><span>2</span></div>
            <div class="tile-footer"><span class="text-success">22.5% <i class="fa fa-level-up"></i></span></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-tile tile-success">
            <div class="tile-icon"><i class="ti ti-bar-chart"></i></div>
            <div class="tile-heading"><span>Capitation</span></div>
           <div class="tile-body"><span>2</span></div>
            <div class="tile-footer"><span class="text-danger">12.7% <i class="fa fa-level-down"></i></span></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-tile tile-info">
            <div class="tile-icon"><i class="fa fa-hospital-o"></i></div>
            <div class="tile-heading"><span>Providers</span></div>
            <div class="tile-body"><span>2</span></div>
            <div class="tile-footer"><span class="text-success">5.2% <i class="fa fa-level-up"></i></span></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-tile tile-danger">
            <div class="tile-icon"><i class="fa fa-group"></i></div>
            <div class="tile-heading"><span>Customers</span></div>
            <div class="tile-body"><span>2</span></div>
            <div class="tile-footer"><span class="text-danger">10.5% <i class="fa fa-level-down"></i></span></div>
        </div>
    </div-->
</div>
<div data-widget-group="group1">


    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                    <h2>Website Visitor Stats</h2>
                    <div class="panel-ctrls button-icon-bg" 
                         data-actions-container="" 
                         data-action-collapse='{"target": ".panel-body"}'
                         data-action-colorpicker=''
                         data-action-refresh-demo='{"type": "circular"}'
                         >
                    </div>
                </div>
                <div class="panel-body">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="spark-container mb-xl">
                                <div class="pull-left">
                                    <h2 class="title" style="color: #cddc39">Total WebSite Visitors</h2>
                                    <h3 class="number"><?= number_format($no_users); ?></h3>
                                </div>
                                <div class="pull-right">
                                    <h2 class="title" style="color: #ff5722; text-align: right;">Today's Visitors</h2>
                                    <h3 class="number"><?= number_format($today_users); ?></h3>
                                </div>

                                <div class="spark-pageviews">
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="newvsreturning" style="height: 144px" class="mt-md mb-md"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-teal" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                    <h2>Browsers</h2>
                    <div class="panel-ctrls button-icon-bg" 
                         data-actions-container="" 
                         data-action-collapse='{"target": ".panel-body"}'
                         data-action-colorpicker=''
                         data-action-refresh-demo='{"type": "circular"}'
                         >
                    </div>
                </div>
                <div class="panel-body no-padding">
                    <table class="table browsers m-n">
                        <tbody>
                           
                            <tr>
                              
                                <td>Google Chrome</td>
                                <td class="text-right">43.7%</td>
                                <td class="vam" style="width: 56px;">
                                    <div class="progress m-n">
                                        <div class="progress-bar progress-bar-teal" style="width: 100%"></div>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Firefox</td>
                                <td class="text-right">20.5%</td>
                                <td class="vam">
                                    <div class="progress m-n">
                                        <div class="progress-bar progress-bar-teal" style="width: 50%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Opera</td>
                                <td class="text-right">14.6%</td>
                                <td class="vam">
                                    <div class="progress m-n">
                                        <div class="progress-bar progress-bar-teal" style="width: 40%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Safari</td>
                                <td class="text-right">9.1%</td>
                                <td class="vam">
                                    <div class="progress m-n">
                                        <div class="progress-bar progress-bar-teal" style="width: 25%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Internet Explorer</td>
                                <td class="text-right">5.3%</td>
                                <td class="vam">
                                    <div class="progress m-n">
                                        <div class="progress-bar progress-bar-teal" style="width: 12.5%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Torch</td>
                                <td class="text-right">2.9%</td>
                                <td class="vam">
                                    <div class="progress m-n">
                                        <div class="progress-bar progress-bar-teal" style="width: 9%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Maxthon</td>
                                <td class="text-right">2.3%</td>
                                <td class="vam">
                                    <div class="progress m-n">
                                        <div class="progress-bar progress-bar-teal" style="width: 6%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Others</td>
                                <td class="text-right">1.6%</td>
                                <td class="vam">
                                    <div class="progress m-n">
                                        <div class="progress-bar progress-bar-teal" style="width: 3%"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

</div>

