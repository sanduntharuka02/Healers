<?php session_start(); ?>
<?php include 'includes/header.php'; ?>
		<div class="container">
				<div class="row">
					

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

  <!-- <td>".$row["id"]."</td>
				    <td>".$row["product_name"]."</td>
				    <td>".$row["company"]."</td>
				    <td>".$row["price"]."</td>
				    <td>".$row["address"]."</td>
				    <td>".$row["status"]."</td>"; -->