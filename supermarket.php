<?php
if (isset($_POST['viewproduct']) ) {
    $producttable= drawproducttable();
}
if (isset($_POST['invoice']) ) {
    $invoicetable= drawinvoicetable();
}
function drawproducttable()
{
    $table = " <table class='table'>
                    <thead>
                        <th>enter product</th>
                        <th>price</th>
                        <th>number</th>
                    </thead>
                    <tbody>";
     for ($i=1;  $i<= $_POST['number'] ; $i++) { 
        $table .=" <tr>
                            <td><input  type='text' class='' name='product$i'></td>
                            <td><input  type='number' class='' name='price$i'></td>
                            <td><input  type='number' class='' name='number$i'></td>
                        </tr>" ;
    }                 
                 

     $table .="                   
                        
                    </tbody>
</table>
<button class='btn btn-success  form-control' name='invoice'>view invoice</button>
";
return $table;

}

function drawinvoicetable(){
    $table = " <table class='table table-success table-stripped'>
                    <thead>
                        <th>enter product</th>
                        <th>price</th>
                        <th>number</th>
                        <th>sub total</th>
                    </thead>
                    <tbody>";
                    $total=0;
                    for ($i=1;  $i<= $_POST['number'] ; $i++) { 
                        $subTotal=$_POST['price'.$i]*$_POST['number'.$i];
                        $total +=$subTotal;
                        $table .=" <tr>
                                            <td>{$_POST['product'.$i]}</td>
                                            <td>{$_POST['price'.$i]}</td>
                                            <td>{$_POST['number'.$i]}</td>
                                            <td>$subTotal</td>
                                        </tr>" ;
                    } 
                    $percentage= (discountPercentage($total) * 100);
                    $discount= ($percentage* $total )/100;
                    $priceAfterDiscount= $total - $discount;
                    $delivery= delivery($_POST['city']);
                    $totalPrice= $priceAfterDiscount + $delivery ;


                 

     $table .="      <tr>
                    <td><b>INVOICE</b></td>
     
                    </tr>              
                    <tr>
                    <td>client name</td>
                    <td>{$_POST['name']}</td>
                    </tr>
                    <tr>
                    <td>city</td>
                    <td>{$_POST['city']}</td>
                    </tr>
                    <tr>
                    <td>total</td>
                    <td>{$total}</td>
                    </tr>  
                    <td>discount percentage</td>
                    <td>{$percentage} %</td>
                    </tr>  
                    <td>discount</td>
                    <td>{$discount} EGP</td>
                    </tr> 
                    <td>price after discount</td>
                    <td>{$priceAfterDiscount} EGP</td>
                    </tr> 
                    <td>delivery</td>
                    <td>{$delivery} EGP</td>
                    </tr>
                    <td>total price</td>
                    <td>{$totalPrice} EGP</td>
                    </tr>  

                    </tbody>
</table>

";
return $table;
}
function discountPercentage($total){
    if ($total<1000) {
        return 0;
    }elseif ($total>=1000 && $total<3000) {
       return .1 ;
    }elseif ($total>=3000 && $total<4500) {
    return .15 ;
 }else {
     return .2 ;
 }


}

function delivery($city){
    switch ($_POST['city']) {
        case 'cairo':
           return 0 ;
        case 'giza':
           return 30;
        case 'alex':
            return 50;
            default :
            return 100 ;
        
       
    }

}



?>
<!doctype html>
<html lang="en">
  <head>
    <title>supermarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row mt-5">
              <div class="col-12">
                  <h1 class="h1 text-center text-success ">supermarket</h1>
                  <form action="" method="post">
                      <div class="form-group mt-5">
                        <label for="name">user name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>"> 
                        <small id="helpId" class="text-muted">Help text</small>
                      </div>
                      <div class="form-group">
                          <label for="">City</label>
                          <select name="city" id="city" class="form-control">
                                <option value="cairo" <?= (isset($_POST['city'])&& $_POST['city']=='cairo') ? 'selected' : '' ?>>Cairo</option>
                                <option value="giza" <?= (isset($_POST['city'])&& $_POST['city']=='giza') ? 'selected' : '' ?>>Giza</option>
                                <option value="alex" <?= (isset($_POST['city'])&& $_POST['city']=='alex') ? 'selected' : '' ?>>Alex</option>
                                <option value="others" <?= (isset($_POST['city'])&& $_POST['city']=='others') ? 'selected' : '' ?>>Others</option>
                       </select>
                      </div>
                      <div class="form-group">
                        <label for="">number of product</label>
                        <input type="number" name="number" id="number" class="form-control" placeholder="" aria-describedby="helpId" value="<?php if(isset($_POST['number'])){echo $_POST['number'];} ?>">
                        <small id="helpId" class="text-muted">Help text</small>
                      </div>
                      
                      
                      <button class="btn btn-success form-control" name="viewproduct">buy now?</button>
                      
                      <?php 
                      if (isset($producttable)) {

                          echo $producttable;
                      }
                      if (isset($invoicetable)) {

                        echo $invoicetable;
                    }
                      ?>
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