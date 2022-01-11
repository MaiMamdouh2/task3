<?php
session_start();
if (isset($_POST['enter'])) {
    $resulttable = drawresulttable();

}
   

function drawresulttable() {
    $table = " <table class='table'>
    <thead>
        <th>Questions?</th>
        <th>review</th>
        
    </thead>
    <tbody>
         <tr>
            <td>cleanliness</td>
            <td> {$_POST['option1']} </td>
            
        </tr>
        <tr>
            <td>service prices</td>
            <td> {$_POST['option2']} </td>
            
        </tr>
        <tr>
            <td>nursing service </td>
            <td> {$_POST['option3']} </td>
            
        </tr>
        <tr>
            <td>level of doctor </td>
            <td> {$_POST['option4']} </td>
            
        </tr>
        <tr>
            <td>calmness in the hospital</td>
            <td> {$_POST['option5']} </td>
            
        </tr>";
        $total=0;
        $review= reviewpercantage($_POST['option1'])+ reviewpercantage($_POST['option2'])+ reviewpercantage($_POST['option3'])+ reviewpercantage($_POST['option4'])+ reviewpercantage($_POST['option5']);
        if ($review<25) {
           $total ="Review is bad...,sorry we will call you soon" .$_SESSION['number'] ;
           
        }elseif ($review>=25 && $review<=50) {
           $total = "Review is good...., thanks for submiting";
           
        } 
        $table .=" <tr>
        <td> <h3 >  $total   </h3> </td>
       </tr>
        </tbody>
        </table>
       

        
        ";
        return $table;

}
function reviewpercantage(){
    switch ($_POST['option1']) {
        case 'bad':
            return 0;
            case 'good':
            return 3;
            case 'verygood':
            return 5;
            case 'exelent':
            return 10;
        
    }
    switch ($_POST['option2']) {
        case 'bad':
            return 0;
            case 'good':
            return 3;
            case 'verygood':
            return 5;
            case 'exelent':
            return 10;
        
    }
    switch ($_POST['option3']) {
        case 'bad':
            return 0;
            case 'good':
            return 3;
            case 'verygood':
            return 5;
            case 'exelent':
            return 10;
        
    }
    switch ($_POST['option4']) {
        case 'bad':
            return 0;
            case 'good':
            return 3;
            case 'verygood':
            return 5;
            case 'exelent':
            return 10;
        
    }
    switch ($_POST['option5']) {
        case 'bad':
            return 0;
            case 'good':
            return 3;
            case 'verygood':
            return 5;
            case 'exelent':
            return 10;
        
    }

}



?>
<!doctype html>
<html lang="en">
  <head>
    <title>review</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta value="viewport" content="wnameth=device-wnameth, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <h1>HOSPITAL SURVAY</h1>
              </div>
          </div>
          <div class="row">
              <div class="offset-2 col-8">
                <form action="" method="post">
                <table class="table table-striped">
                     <thead>
                         <th>Are you satisfied with..?</th>
                         <th>bad</th>
                         <th>good</th>
                         <th>verygood</th>
                         <th>exelent</th>
                     </thead>
                     <tbody>
                         <tr>
                             <td>the level of cleanliness  </td>
                             <td><input class="form-check-input" type="radio" value="bad" name="option1" ></td>    
                             <td><input class="form-check-input" type="radio" value="good" name="option1" ></td> 
                             <td><input class="form-check-input" type="radio" value="verygood" name="option1" ></td> 
                             <td><input class="form-check-input" type="radio" value="exelent" name="option1" ></td> 
                            
                            </tr>
                            <tr>
                            <tr>
                             <td>the service prices       </td>
                             <td><input class="form-check-input" type="radio" value="bad" name="option2" ></td>    
                             <td><input class="form-check-input" type="radio" value="good" name="option2" ></td> 
                             <td><input class="form-check-input" type="radio" value="verygood" name="option2" ></td> 
                             <td><input class="form-check-input" type="radio" value="exelent" name="option2" ></td> 
                            
                            </tr>

                            <tr>
                             <td>the nursing service      </td>
                             <td><input class="form-check-input" type="radio" value="bad" name="option3" ></td>    
                             <td><input class="form-check-input" type="radio" value="good" name="option3" ></td> 
                             <td><input class="form-check-input" type="radio" value="verygood" name="option3" ></td> 
                             <td><input class="form-check-input" type="radio" value="exelent" name="option3" ></td> 
                            
                            </tr>

                            <tr>
                             <td>the level of doctor      </td>
                             <td><input class="form-check-input" type="radio" value="bad" name="option4" ></td>    
                             <td><input class="form-check-input" type="radio" value="good" name="option4" ></td> 
                             <td><input class="form-check-input" type="radio" value="verygood" name="option4" ></td> 
                             <td><input class="form-check-input" type="radio" value="exelent" name="option4" ></td> 
                            
                            </tr>
                            <tr>
                             <td>the calmness in the hospital  </td>
                             <td><input class="form-check-input" type="radio" value="bad" name="option5" ></td>    
                             <td><input class="form-check-input" type="radio" value="good" name="option5" ></td> 
                             <td><input class="form-check-input" type="radio" value="verygood" name="option5" ></td> 
                             <td><input class="form-check-input" type="radio" value="exelent" name="option5" ></td> 
                            
                            </tr>
                         
                         
                     </tbody>
  
                </table>
                <button class="btn btn-dark" name="enter">submit</button>
                <?php 
                      if (isset($resulttable)) {

                          echo $resulttable;
                      }?>
                         <?php  if(isset($total)){echo $total;}  ?>  
                </form>

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