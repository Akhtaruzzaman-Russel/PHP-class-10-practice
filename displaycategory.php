<?php

    class AdminBack{
        private $conn;

        public function __construct(){
           $dbhost = "localhost";
           $dbuser = "root";
           $dbpass = "";
           $dbname = "db";
           $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
           
           if (!$this->conn){
            // echo "Connection Successfully Connected";
            // }else{
                die("Connection Failed");
            }

        }

        public function add_category($data){
            $category_name = $data['category_name'];
            $category_description = $data['category_description'];

            $sql="INSERT INTO category (category_name, category_description) VALUES ('$category_name', '$category_description')";
            $result = mysqli_query($this->conn, $sql);
            if($result){
                $msg= "Category Added Successfully";
                return $msg;
            }else{
                $msg= "Category Not Added";
                return $msg;
            }

        }

        public function display_category(){
            $sql="SELECT*FROM category";
           $result=mysqli_query($this->conn,$sql);
        
           if($result){
        
            return $result;
        
          } 
          }
        
        
          public function delete_category($id){
            $query="DELETE FROM category WHERE id=$id";
            mysqli_query($this->conn,$query);
        
        
          }
          



    }

    $obj = new AdminBack();
    if(isset($_POST['ctg_btn'])){
        $returnmsg=$obj->add_category($_POST);

    }

    if(isset($_GET['status'])){
        $get_id=$_GET['id'];
        if($_GET['status']='delete'){
           $data=$obj->delete_category($get_id);
            
        }
    
    }
    

?>





<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>PHP Class 10</title>
    </head>


  <body>

  <table class="table">
  <thead class="thead-dark">

  
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  <tbody>
    <?php 
    $data=$obj->display_category();
    while($row=mysqli_fetch_assoc($data)){
    
    ?>
  <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['category_name']; ?></td>
      <td><?php echo $row['category_description']; ?></td>
      <td>
<div class="btn-group">

<a href="?status=delete&&id=<?php echo $row['id']; ?>" class="btn btn-danger py-2 mx-1">Delete</a>
<a href="editpage.php?status=edit&&id=<?php echo $row['id']; ?>" class="btn btn-info py-2 mx-1">Edit</a>
</div>

      </td>
    </tr>
  <?php } 
  
  ?>   
  </tbody>
</table>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>