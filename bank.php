<?php

if ($_POST) {
    if ($_POST['years']<3) {
       $rate=.1* $_POST['years'];
    }elseif($_POST['years']>=3) {

        $rate=.15 * $_POST['years'] ;
   
    }

    $rateOf= $rate * $_POST['lean'];
    $lean= $_POST['lean']*(1+$rate);
    $leanPerMonth= $lean /($_POST['years'] * 12) ;


}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style=" background:url(back.jpg) ; background-size: cover ;">
  <div class="container">
        <div class="row">
              <div class="col-12 mt-5">
                  <h1 class="text-success text-center h1 "> BANK </h1>
              </div>
              <div class="offset-4 col-4">
                    <form action="" method="post" class="text-success">
                    <div class="form-group">
                          <label for="name"><b>NAME</b></label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="name"><b>LEAN AMOUNT</b></label>
                          <input type="text" name="lean" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="years"><b>NUM OF YEARS</b></label>
                          <input type="number" name="years" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        
                        
                      
                        <div class="form-group ">
                            <button name="sale"  class="btn btn-success rounded"> calculate</button>
                        </div>
                    </form>
              </div>
          </div>
          <?php
          if(!$_POST){
                
                echo "";die;
                }?>
          <div class="row">
              <div class="offset-3 col-6">
                  
                  <table class="table table-success text-success">
                      <thead>
                          <th>rate</th>
                          <th>lean after rate</th>
                          <th>monthely</th>
                      </thead>
                      <tbody>
                          <tr>
                              <td><?php if(isset($rateOf)){ echo $rateOf;} ?></td>
                              <td><?php if(isset($lean)){ echo $lean;} ?></td>
                              <td><?php if(isset($leanPerMonth)){ echo $leanPerMonth;} ?></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
             
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>