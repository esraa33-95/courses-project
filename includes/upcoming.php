<?php
include_once('admin/include/conn.php');
   try{
    $sql = "SELECT * FROM `courses` WHERE `date` BETWEEN CURRENT_DATE AND '2024-06-30' limit 4";
    
     $stmtc = $conn->prepare($sql);
     $stmtc->execute();
    
     
   } catch(PDOException $e) {
       $msg = $e->getMessage();
       $alertType = "alert-danger";
   }


   try{
    $sql = "SELECT * FROM `categories` limit 5";
     
     $stmtcat = $conn->prepare($sql);
     $stmtcat->execute();
          
   } catch(PDOException $e) {
       $msg = $e->getMessage();
       $alertType = "alert-danger";
   }

?>


<section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Upcoming Meetings</h2>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="categories">
            <h4>Meeting Catgories</h4>
            <ul>
              <?php
               foreach($stmtcat->fetchAll() as $row){
                 $id = $row['id'];
                 $category = $row['category_name'];
              ?>
              <li>
                <a href="#"><?php echo $category;?></a>
              </li><br>
              <?php
               }
               ?>
            </ul>

            <div class="main-button-red">
              <a href="meetings.html">All Upcoming Meetings</a>
            </div>
          </div>
        </div>
       
          
        <div class="col-lg-8">
       
        <div class="row">
        <?php
              foreach( $stmtc->fetchAll() as $row)
              {
                $id = $row['id'];
               $image = $row['image'];
               $title = $row['title'];
               $price = $row['price'];
               $date = $row['date'];
               $content = $row['content'];
             
               ?>
            <div class="col-lg-6">
            
            
              <div class="meeting-item">
              
              
                <div class="thumb">
               
                  <div class="price">
                    <span>$<?php echo $price;?></span>
                  </div>
                  <img src="admin/images/<?php echo $image;?>" alt="<?php echo $title;?>">
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6><span><?php echo $date;?></span></h6>
                  </div>
                  <a href="meeting-details.php?id=<?php echo $id;?>"><h4><?php echo $title;?></h4></a>
                  <p><?php echo $content;?></p>

                </div>
                
              </div>
              
            </div>
            <?php
              }
              ?>
          </div>
          
        </div>
        
      </div>
    
    </div>
  </section>
