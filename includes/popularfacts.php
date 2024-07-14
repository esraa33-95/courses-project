<?php
 include_once('admin/include/conn.php');

try{
 $sql = "SELECT COUNT(users_courses.courses) as visits ,courses.id, courses.title,courses.image,courses.price 
          FROM `users_courses` JOIN `courses` ON users_courses.courses = courses.id
           GROUP BY courses.id 
           Having visits > 4
          ORDER BY visits DESC";
 
  $stmt= $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchALL();

  
} catch(PDOException $e) {
    $msg = $e->getMessage();
    $alertType = "alert-danger";
}
?>

<section class="our-courses" id="courses">

    <div class="container">

      <div class="row">
      
       
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Our Popular Courses</h2>
          </div>
        </div>

       

        <div class="col-lg-12">

          
           <div class="owl-courses-item owl-carousel"> 
           <?php
          foreach($result as $row){

            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image =$row['image'];

         ?>  
            <div class="item">
            
              <img src="admin/images/<?php echo $image;?>" alt="Course One">
              <div class="down-content">
                <h4><?php echo $title;?></h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8" >
                      <ul name="rate">
                        <li ><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$<?php echo $price;?></span>
                      
                    </div>
                    
                  </div>
              
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
