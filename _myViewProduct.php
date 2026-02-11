<?php include 'includes/header.php'; ?>
<?php

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";  
}else{
    $url = "http://";  
}

// Append the host(domain name, ip) to the URL.  
$url.= $_SERVER['HTTP_HOST'];  
// Append the requested resource location to the URL  
$url.= $_SERVER['REQUEST_URI'];    

//echo "<script>window.alert('$url');</script>";

$components = parse_url($url);
parse_str($components['query'], $results);
$filterParamValue = $results['id'];

//echo "<script>window.alert('$filterParamValue');</script>";

$relatedProducts = '';
$relatedCategory = '';
?>
        <div class="container">
                <div class="row">
                    <?php

            require_once "db.php";

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM fruit_markets WHERE id=$filterParamValue LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {
                  if ($row["status"] != 0){
                    ?>

                    <div class='col-lg-6 col-md-6 col-sm-12'>
                         <?php
                            
                            echo "<img src='catelog/images/products/".$row["product_image"]."' style='width:100%; height:250px;'/><br>";
                            
                        ?>
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-12'>

                        <?php
                            echo "<label>".$row["product_name"]."</label><br>";
                            echo "<label>".$row["company"]."</label><br>";
                            echo "<label>".$row["address"]."</label><br>";
                            echo "<input type='number'/>";
                    
                        echo "<button>Add to card</button><br>";

                        ?>
                    </div>
                    <?php
                    
                  }


              }

            }

            ?>
                </div>
        </div>



        <div class="container">
                <div class="row">
                    <h1>Related Product</h1>
                    

            <?php

            require_once "db.php";

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM fruit_markets";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {
                  if ($row["status"] != 0){
                   /* echo "<img src='images/baba.jpg'>";*/
                   echo "<div class='col-lg-4 col-md-4 col-sm-12'>";
                    echo "<div class='product-card' style='border: 2px solid black; padding: 20px 20px;'>";
                        echo "<a href='_myViewProduct.php?id=".$row["id"]."' >";
                            echo "<label>".$row["product_name"]."</label><br>";
                            echo "<img src='catelog/images/products/".$row["product_image"]."' style='width:100%; height:250px;'/><br>";
                            echo "<label>".$row["company"]."</label><br>";
                            echo "<label>".$row["address"]."</label><br>";
                            echo "<input type='number'/>";
                        echo "</a>";
                        echo "<button>Add to card</button><br>";
                    echo "</div>";
                   echo "</div>";
                    
                  }


              }

            }

            ?>
                </div>
        </div>


<?php include 'includes/footer.php'; ?>