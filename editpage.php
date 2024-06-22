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

        public function read_category_for_edit($id) {
            $sql="SELECT* FROM category WHERE id=$id";
             $cat_info=mysqli_query($this->conn,$sql);
             $ct_info=mysqli_fetch_assoc( $cat_info);
             return $ct_info;
         
         }
         
         
         public function update_category($received_data){
             $id=$received_data['id'];
             $name=$received_data['category_name'];
             $des=$received_data['category_description'];
             $query="UPDATE category SET category_name='$name' , category_description='$des' WHERE id=$id";
             $result=mysqli_query($this->conn,$query);
             if($result){
         
                 $message="Updated category Successfully";
                 return $message;
         
             }
         
         }
         

        

    }

    $obj = new AdminBack();
    if(isset($_POST['ctg_btn'])){
        $returnmsg=$obj->add_category($_POST);

    }

    if(isset($_GET['status'])){
        $get_id=$_GET['id'];
        if($_GET['status']='edit'){
           $data=$obj->read_category_for_edit($get_id);
            
        }
    
    }
    
    
    if(isset($_POST['uctg_btn'])) {
        $mgs=$obj->update_category($_POST);
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
        <div class="container py-4">

            <div class="row">

                <div class="card m-auto border border-1 border-primary rounded shadow p-4" style="width: 90%;">
                            <div class="card-header py-3">
                                    <h4 class="m-0 font-weight-bold text-primary" >Update Catagory</h4>

                            </div> 
                        <div class="card-body">

                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input hidden type="text" class="form-control" name="id" value="<?php echo $data['id'] ?>" required autocomplete="off">
                                    <input type="text" class="form-control" name="category_name" value="<?php echo $data['category_name'] ?>"  placeholder="Edit Category" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category Description</label>
                                    <input type="text" class="form-control" name="category_description" value="<?php echo $data['category_description'] ?>"  placeholder="Edit Description" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="uctg_btn"  value="Update Catagory" class="btn btn-primary">
                                </div>
                            </form>


                            <?php 
                                if (isset($mgs)) {
                                    echo $mgs;
                                    } 
                            ?>
            
                        </div>



                 </div>

            </div>

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>