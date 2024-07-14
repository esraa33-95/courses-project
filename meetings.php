<?php
include_once('admin/include/conn.php');
try{
  $sql = "SELECT * FROM `courses`";
  
   $stmt = $conn->prepare($sql);
   $stmt->execute();
  $result = $stmt->fetchAll();
   
 } catch(PDOException $e) {
     $msg = $e->getMessage();
     $alertType = "alert-danger";
 }

?>

<!DOCTYPE html>
<html lang="en">

  <head>
  <title>Education - List of Meetings</title>

    <?php include_once('includes/head.php');?>
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>

  <!-- Sub Header -->
  
  <?php include_once('includes/subheader.php');?>
  <!-- ***** Header Area Start ***** -->
  <?php include_once('includes/headerarea.php');?>
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
       
        <div class="col-lg-12">
          <h6>Here are our upcoming meetings</h6>
          <h2>Upcoming Meetings</h2>
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
              <div class="filters">
                <ul>
                  <li data-filter="*"  class="active">All Meetings</li>
                  <li data-filter=".soon">Soon</li>
                  <li data-filter=".imp">Important</li>
                  <li data-filter=".att">Attractive</li>
                </ul>
              </div>
            </div>


            <div class="col-lg-12">
              <div class="row grid">
              <?php
            foreach($result as $row)
            {
             $id = $row['id'];
             $image = $row['image'];
             $name = $row['name'];
             $price = $row['price'];
             $date = $row['date'];
             $content = $row['content'];


        ?>
                <div class="col-lg-4 templatemo-item-col all soon">
             
                  <div class="meeting-item">
                    <div class="thumb">
                      <div class="price">
                        <span>$<?php echo $price;?></span>
                      </div>
                      <a href="meeting-details.html"><img src="admin/images/<?php echo $image;?>" alt="<?php echo $name;?>"></a>
                    </div>
                    <div class="down-content">
                      <div class="date">
                        <h6><span><?php echo $date;?></span></h6>
                      </div>
                      <a href="meeting-details.html"><h4><?php echo $name;?></h4></a>
                      <p><?php echo $content;?></p>
                    </div>
                  </div>
                
                </div>

                <?php
            }
            ?>


              </div>
            </div>
            <div class="col-lg-12">
             
              <div class="pagination">
                <ul>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
              </div>
              
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com/page/1" target="_parent" title="website templates">TemplateMo</a></p>
    </div>
  </section>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <?php include_once('includes/bootstrap.php');?>
</body>


  </body>

</html>
