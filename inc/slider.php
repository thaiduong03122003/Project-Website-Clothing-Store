<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">

				<?php
					$getLastedDell = $product->getLastedDell();
					if($getLastedDell) {
						while($resultdell = $getLastedDell->fetch_assoc()) {
					
				?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultdell['productId']?>"> <img src="admin/uploads/<?php echo $resultdell['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>DELL</h2>
						<p><?php echo $resultdell['productName']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultdell['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>	

			   <?php
						}
					}
			   ?>	

				<?php
					$getLastedApple = $product->getLastedApple();
					if($getLastedApple) {
						while($resultdapple = $getLastedApple->fetch_assoc()) {
					
				?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $resultdapple['productId']?>"><img src="admin/uploads/<?php echo $resultdapple['image']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>APPLE</h2>
						  <p><?php echo $resultdapple['productName']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultdapple['productId']?>">Add to cart</a></span></div>
					</div>
				</div>

				<?php
						}
					}
			    ?>

			</div>
			<div class="section group">

				<?php
					$getLastedSamsung = $product->getLastedSamsung();
					if($getLastedSamsung) {
						while($resultsamsung = $getLastedSamsung->fetch_assoc()) {
					
				?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultsamsung['productId']?>"> <img src="admin/uploads/<?php echo $resultsamsung['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>SAM SUNG</h2>
						<p><?php echo $resultsamsung['productName']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultsamsung['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>	

			   <?php
						}
					}
			   ?>	

				<?php
					$getLastedNova = $product->getLastedNova();
					if($getLastedNova) {
						while($resultnova = $getLastedNova->fetch_assoc()) {
					
				?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $resultnova['productId']?>"><img src="admin/uploads/<?php echo $resultnova['image']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>NOVA</h2>
						  <p><?php echo $resultnova['productName']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultnova['productId']?>">Add to cart</a></span></div>
					</div>
				</div>

				<?php
						}
					}
			    ?>

			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>