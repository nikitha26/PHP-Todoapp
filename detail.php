<?php
  include('config/dbconnect.php');

  //Delete Todo from Database
   if(isset($_POST['delete'])){
       $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
       
       $sql = "DELETE FROM todo WHERE id = $id_to_delete";
       if(mysqli_query($conn,$sql)){
           //Success
           header('Location:index.php');
       }else{
           //Failure
           echo 'query error: '.mysqli_error($conn);
       }
   }

   //Update the Todo in Database
//    if(isset($_POST['update'])){
//        $todo_update = mysqli_real_escape_string($conn,$_POST['todo_update']);

//        $sql = "UPDATE todo SET todo = 'go to temple' WHERE todo = $todo_update";
//        if(mysqli_query($conn,$sql)){
//            header('Location:add.php');
//        }
//        else{
//            echo 'query error: '.mysqli_error($conn);
//        }
//    }

  //Check get request from id parameter
  if(isset($_GET['id'])){
      $id = mysqli_real_escape_string($conn,$_GET['id']);

      //make sql
      $sql = "SELECT * FROM todo WHERE id = $id";
      

      //get query
      $result = mysqli_query($conn,$sql);

       //fetch result from query
       $todo = mysqli_fetch_assoc($result);

       //free result from memory
        mysqli_free_result($result);

        //close connection
        mysqli_close($conn);
       // print_r($todo);
  }
  
  //echo $todo['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php');?>
    <div class="container">
        <div class="row">
            <?php if($todo){ ?>
                <div class="col s6 md3">
                    <div class="card">
                        <small class="right"><?php echo date($todo['create_at']);?></small>
                        <div class="card-content center">
                            <h6><b>Created By:</b><?php echo htmlspecialchars($todo['title']);?></h6>
                            <h6><b>Email:</b><?php echo htmlspecialchars($todo['email']);?></h6>
                            <h6><b>Todo:</b><?php echo htmlspecialchars($todo['todo']);?></h6>
                        </div>
                        <form action="detail.php" method="POST">
                            <input type="hidden" name="id_to_delete" value="<?php echo $todo['id'];?>">
                            <input type="submit" name="delete" value="Delete" class="btn " style="background-color:rgb(199, 67, 44);color:white">
                            <!-- <input type="hidden" name="todo_update" value="<?php echo $todo['todo'];?>">
                            <input type="submit" name="update" value="Update" class="btn " style="background-color:blue;color:white"> -->
                        </form>
                        
                    </div>
                </div>
            <?php } else { ?>
                <h4>No such todo exists</h4>
            <?php } ?>     
        </div>    
    </div>
    <?php include('templates/footer.php');?>

</html>