<?php
include_once('admin/include/conn.php');
$id = $_GET['id'];
try{
  
  $sql = "SELECT * FROM `courses` where `id`= $id";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $resultmeet = $stmt->fetch();
  
  
 $id = $resultmeet['id'];
 $title = $resultmeet['title'];
 $image = $resultmeet['image'];
 $meet_content = $resultmeet['content'];
 $meeting_date = $resultmeet['meeting_date'];
 $meet_price = $resultmeet['price'];
 $meet_location = $resultmeet['location'];
 $meet_booking = $resultmeet['booking'];
 $meet_hours = $resultmeet['hours'];

        
 } catch(PDOException $e) {
     $msg = $e->getMessage();
     $alertType = "alert-danger";
 }

?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <!-- <title>Education Template - Meeting Detail Page</title> -->

    <?php include_once('includes/head.php');?>
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>

<?php include_once('includes/subheader.php');?>

  <!-- Sub Header -->
  

  <!-- ***** Header Area Start ***** -->
  <?php include_once('includes/headerarea.php');?>
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
    
      <div class="row">
      
        <div class="col-lg-12">
          <h6>Get all details</h6>
          <h2><?php echo $title;?></h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">

      <div class="row">
        
        <div class="col-lg-12">
          <div class="row"> 
            <div class="col-lg-12">

              <div class="meeting-single-item">
                <div class="thumb">
                  <div class="price">
                    <span><?php echo $meet_price;?></span>
                  </div>
                  <div class="date">
                    <h6><span><?php echo $meeting_date;?></span></h6>
                  </div>
                  <a href="meeting-details.php"><img src="admin/images/<?php echo $image;?>" alt="<?php echo $title;?>"></a>
                </div>
                <div class="down-content">
                  <a href="meeting-details.php"><h4><?php echo $title;?></h4></a>
                  <p><?php echo $meet_location;?></p>
                  <p class="description">
                    <?php echo $meet_content;?>
                  </p>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="hours">
                        <h5>Hours</h5>
                        <p><?php echo $meet_hours;?></p>
                      </div>
                    </div>


                    <div class="col-lg-4">
                      <div class="location">
                        <h5>Location</h5>
                        <p><?php echo $meet_location;?></p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="book now">
                        <h5>Book Now</h5>
                        <p><?php echo $meet_booking;?></p>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="share">
                        <h5>Share:</h5>
                        <ul>
                          <li><a href="#">Facebook</a>,</li>
                          <li><a href="#">Twitter</a>,</li>
                          <li><a href="#">Linkedin</a>,</li>
                          <li><a href="#">Behance</a></li>
                        </ul>
                      </div>
                    </div>
                   
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="main-button-red">
                <a href="meetings.php">Back To Meetings List</a>
              </div>
              
              </div>
        
            </div>
         
        </div>
       
      </div>
      
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
    </div>
  </section>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <?php include_once('includes/bootstrap.php');?>
</body>

</html>
