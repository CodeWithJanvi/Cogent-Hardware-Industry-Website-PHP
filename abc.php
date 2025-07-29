
              <ul>
                <?php
                 while($category=mysqli_fetch_array($cat))
                 //foreach($category as $cat)
                 //{                
                 {
                  ?>
                  <li class="drop-down"><a href="header.php?id=<?php echo $category['id']; ?>"><?php echo $category['category_name'] ?></a>
                  <?php
                 }
                 ?>
                 <ul>
                
             <?php
           
               if (isset($_GET['id'])) 
               {
                 $id=$_GET['id'];
                 $sub=mysqli_query($conn,"select * from subcategory where cat_id='$id'");
             
                 while($subcat = mysqli_fetch_array($sub)) 
                 {
                 ?>
                 <li class="drop-down"><a href="header.php?cat_id=<?php echo $subcat['id'];?>"><?php echo $subcat['sub_name'] ?></a>
                 </li>
                 <?php
                 }
               }
              
             ?>
           </ul>
           

              </ul>