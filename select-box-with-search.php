<?php 
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>Hello, world!</title>
  </head>
  <body>
    

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php 
                    if(isset($_SESSION['status'])){
                        echo '<h4>'.$_SESSION['status'].'</h4>';
                        unset($_SESSION['status']);
                    }
                ?>
                <div class="card-header">
                    <h4>Select2 Plugin Insert</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <label>User Id</label>
                            <input type="text" name="user_id" class="form-control">
                        </div>
                        <div class="col-md-6">
                        <label>Hobbie List</label>
                            <select name="hobbies[]" class="js-example-basic-multiple form-control mb-3" multiple="multiple" required>
                                <?php 
                                    $con = mysqli_connect('localhost', 'root', '', 'select2_plugin');

                                    $query ="SELECT * FROM hobby_list";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $row){
                                            ?>
                                                <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                            <option value="">No Record Found</option>
                                        <?php
                                    }
                                ?>
                                
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" name="save_hobbies" class="btn btn-primary mt-4">Save Hobbies</button>
                        </div>
                    </div>
                    </form>

                    <a href="select-option-edit.php?user_id=1" class="btn btn-primary mr-2">User 1</a>
                    <a href="select-option-edit.php?user_id=2" class="btn btn-primary mr-2">User 2</a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
      $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
  </script>
    
  </body>
</html>