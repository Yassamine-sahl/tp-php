<?php  
 //pagination.php  
 $connect = mysqli_connect("localhost", "root", "", "boutique");  
 $record_per_page = 6;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM produits ORDER BY sku DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);  
 
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= " 
      <div class='col-sm-3'>
      <div class='product-image-wrapper'>
          <div class='single-products'>
                  <div class='productinfo text-center'>
                      <img src='" .  $row['image']  . "' alt='' width='150px'/>
                      <h2>." . $row['price'] . "</h2>
                      <p>" . $row['name']  . "</p>
                      <a href='#' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                  </div>
                  <div class='product-overlay'>
                      <div class='overlay-content'>
                          <h2>$56</h2>
                          <p>Easy Polo Black Edition</p>
                          <a href='#' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                      </div>
                  </div>
          </div>
          <div class='choose'>
              <ul class='nav nav-pills nav-justified'>
                  <li><a href='#'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
                  <li><a href='#'><i class='fa fa-plus-square'></i>Add to compare</a></li>
              </ul>
          </div>
      </div>
      </div>
      
       
      ";  
 }  
 $output .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM produits ORDER BY sku DESC";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
 $output .= '<br/><br>';  
 echo $output;  