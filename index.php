<?php include('db.php');


//insert into db
$employee = '';
$reason = '';
$date = '';
if(isset($_POST['record'])){
    $employee = trim($_POST['consultant']);
    $reason = trim($_POST['reason']);
    $date = trim($_POST['date']);

     $sql = "INSERT INTO appointments (
        employee, date, reason
    ) VALUES(
        '$employee', '$reason', '$date'

    )";

  if(mysqli_query($link, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

    $first = "";
    $last = "";
    $email = "";
    $phone = "";

}




?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Consulting</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <?php include('nav.php')?>
      </nav>

      <div class="container">
          <div class="row">
              <div class="col-sm-12 d-flex justify-content-between mt-3">
                   <h6 class="">All Appointements</h6>
                  <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add appointement
                </button>
              </div>
              <div class="col-sm-12">

                  <table class="table">
                        <thead>
                            <tr>

                            <th scope="col">Employee Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM employees join appointments on employees.id = appointments.employee ";
                            $result = mysqli_query($link, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>

                            <td><?php echo($row['first']." ".$row['last'])?></td>
                            <td><?php echo($row['date'])?></td>
                            <td><?php echo($row['reason'])?></td>
                            </tr>
                            <?php }?>

                        </tbody>
                        </table>
              </div>
          </div>

      </div>

<!-- modal to save appointements -->


<!-- Modal -->
<form action="index.php" method="POST">
    <input type="hidden" name='record' value="1">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Place Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label></label>
                    <div class="col-sm-6 form-group">
                        <label for="">Consultant</label>
                        <select name="consultant" class="form-control">
                            <?php
                             $sql = "SELECT * FROM employees ";
                            $result = mysqli_query($link, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo($row['id'])?>"><?php echo($row['first']." ".$row['last'])?></option>
                            <?php }?>

                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="">Date</label>
                        <input type="date" name='date' class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12 form-group ">
                        <label for="">Reason</label>`
                        <textarea name="reason" id=""  class="form-control"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
</form>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
