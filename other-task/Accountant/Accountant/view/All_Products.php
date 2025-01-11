<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
      require '../controller/Header.php';
    ?>
  <body>
   

   	
    <form action="none" method="POST">
       <i><center><legend><h3>All Products</h3></legend></center></i><br>
     </fieldset>
        <div class="container" style="width:800px;">              
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Product ID</th> 
                               <th>Product Name</th> 
                               
                               <th>Product Price</th>    
                          </tr>  
                          <?php   
                          include '../Controller/AllProductcontroller.php' ;

                          $data = loadData();

                          foreach($data as $row)  
                          {  
                              ?>
                               <tr>
                                <td><?php echo $row['ProductID'] ?></td>
                               <td><?php echo $row['name'] ?></td>
                               <td><?php echo $row['ProductPrice'] ?></td>
                               
                               
                               
                               </tr>
                               <?php 
                          }  
                          ?>  
                     </table> 
                   </div>
                 </div>

   </form><br><br>
    <?php
       include "../controller/Footer.php";
       ?>
  </body>
</html>
