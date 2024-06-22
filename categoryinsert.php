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

        

    }

    $obj = new AdminBack();
    if(isset($_POST['ctg_btn'])){
        $returnmsg=$obj->add_category($_POST);

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
                                    <h4 class="m-0 font-weight-bold text-primary" >Add Category</h4>

                            </div> 
                        <div class="card-body">

                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control" name="category_name"  placeholder="Enter Category Name" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category Description</label>
                                    <input type="text" class="form-control" name="category_description" id="exampleInputPassword1" placeholder="Enter Category Description" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="ctg_btn"  value="Add Category" class="btn btn-primary">
                                </div>
                            </form>


                            <?php
                                if(isset($returnmsg)){
                                    echo $returnmsg;
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