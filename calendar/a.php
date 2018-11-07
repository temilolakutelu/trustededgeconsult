
<link  href="css/bootstrap.min.css" rel="stylesheet" >
<link href="css/fullcalendar.css" rel="stylesheet" />
<link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />
<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
 <script src="js/moment.min.js"></script>
<script src="js/fullcalendar.js"></script>
<script src="js/scripts.js"></script>

  <link rel="icon" href="fav-1.png" type="image/x-icon" />


<!-- add calander in this div -->

<div class="container">
  <div class="row">
    <div>
      <a href="../index.php"><button style='background-color: #76c11f;
      margin-top: 10px;
    border-radius: 20px;
    color: #fff;
    font-weight: bold;
    width: 200px;
    height: 50px;
    margin-bottom: 20px;'>Back To HomePage</button></a>
    </div>
    <div id="calendar"></div>
  </div>
</div>
<!--  Modal  to Add Event -->

<!--  Modal to Event Details -->
<div id="calendarModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style='background: #84d033;color: #fff;'>
      <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
        <h4 class="modal-title">Event Details</h4>
      </div>
      <div id="modalBody" class="modal-body">
        <h4 id="modalTitle" class="modal-title"></h4>
        <div id="modalWhen" style="margin-top:5px;"></div>
      </div>
      <input type="hidden" id="eventID"/>
      
    </div>
  </div>
</div>
