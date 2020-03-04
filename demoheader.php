<?php
$role=$_SESSION['role'];
 ?>

<nav class="navbar navbar-default" style="background-color:#06296b;">
  <div class="container-fluid" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php?pagename=home"> Sri Govind Middle & High School</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
         
          <li><a href="home.php?pagename=home"><i class="fa fa-home"></i>Home</a></li>
          
          <li><a href="enquiry.php?pagename=enquiry"><i class="fa fa-users"></i>&nbsp;Enquiry</a></li> 
          <li><a href="admission.php?pagename=Registration"><i class="fa fa-user"></i>&nbsp;New Registration</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><i class="fa fa-search"></i>&nbsp;
            <span class="caret"></span> Search Students</a>
            <ul class="dropdown-menu">
            	 <li><a href="search_session_wise.php?pagename=search-session-wise"><i class="fa fa-search"></i>&nbsp;Session Wise</a></li>
              <li><a href="search_class_wise.php?pagename=search-class-wise"><i class="fa fa-search"></i>&nbsp;Class Wise</a></li>
              <li><a href="defaultStudent.php?pagename=default-student"><i class="fa fa-search"></i>&nbsp;Default Students</a></li>
            </ul>
            </li>
           <li><a href="student_payment.php?pagename=student-payment"><i class="fa fa-file-text"></i>&nbsp;Payment</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><i class="fa fa-money"></i>&nbsp;
            <span class="caret"></span> Account</a>
            <ul class="dropdown-menu">
            	 <li><a href="add-expenditure.php?pagename=add-expenditure"><i class="fa fa-sign-out"></i>&nbsp;Add Expenditure</a></li>
              <li><a href="view-expenditure.php?pagename=view-expanditure"><i class="fa fa-sign-out"></i>&nbsp;View Expenditure</a></li>
            </ul>
            </li>
            <?php if($_SESSION['role']=='admin'){ ?>
            <li><a href="certificate.php?pagename=Certificate"> <i class="fa fa-certificate"></i>&nbsp;Certificates</a> </li>
           <li><a href="report.php?pagename=Report"> <i class="fa fa-list-alt"></i>&nbsp;Reports</a> </li>
          
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><i class="fa fa-users"></i>&nbsp;
            <span class="caret"></span>Staff</a>
            <ul class="dropdown-menu">
            	 <li><a href="staff-info.php?pagename=add-Staff"><i class="fa fa-users"></i>&nbsp;Add Staff Info.</a></li>
              <li><a href="staff-salary.php?pagename=Staff-salary"><i class="fa fa-money"></i>&nbsp;Staff Salary</a></li>
              <li><a href="staff-details.php?pagename=Staff"><i class="fa fa-users"></i>&nbsp;Staff Details</a></li>
              
              
            </ul>
            </li>
          <?php } ?>
        
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i>&nbsp;
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <?php if($role=='admin'){ ?>
            	 <li><a href="user.php?pagename=users"><i class="fa fa-sign-out"></i>&nbsp;Users</a></li>
                 <?php } ?>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
            </ul>
          </li> 
        </ul>
      </div>
   </div>
</nav>
