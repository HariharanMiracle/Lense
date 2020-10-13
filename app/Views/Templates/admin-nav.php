<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin-Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <?php
      	if($admin_nav_item == "Frame-Type"){
      		?>
      		  <li class="nav-item active">
	        	<a class="nav-link" href="<?php echo base_url().'/AdminPanel/frame_type' ?>">Frame-Type<span class="sr-only">(current)</span></a>
	      	  </li>
      		<?php
      	}
      	else{
      		?>
  		      <li class="nav-item">
  		        <a class="nav-link" href="<?php echo base_url().'/AdminPanel/frame_type' ?>">Frame-Type</a>
  		      </li>
      		<?php
      	}
      	
      	if($admin_nav_item == "Lense-Type"){
          ?>
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url().'/AdminPanel/lense_type' ?>">Lense-Type<span class="sr-only">(current)</span></a>
            </li>
          <?php
      	}
      	else{
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'/AdminPanel/lense_type' ?>">Lense-Type</a>
            </li>
          <?php      		
      	}

        if($admin_nav_item == "Lense_shade"){
          ?>
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url().'/AdminPanel/lense_shade' ?>">Lense_shade<span class="sr-only">(current)</span></a>
            </li>
          <?php
        }
        else{
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'/AdminPanel/lense_shade' ?>">Lense_shade</a>
            </li>
          <?php         
        } 
      	
        if($admin_nav_item == "Brand"){
          ?>
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url().'/AdminPanel/brand' ?>">Brand<span class="sr-only">(current)</span></a>
            </li>
          <?php
        }
        else{
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'/AdminPanel/brand' ?>">Brand</a>
            </li>
          <?php         
        }
        
      	if($admin_nav_item == "Frame"){
          ?>
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url().'/AdminPanel/frame' ?>">Frame<span class="sr-only">(current)</span></a>
            </li>
          <?php
        }
        else{
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'/AdminPanel/frame' ?>">Frame</a>
            </li>
          <?php         
        }
      	
      	if($admin_nav_item == "Lense"){
          ?>
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url().'/AdminPanel/lense' ?>">Lense<span class="sr-only">(current)</span></a>
            </li>
          <?php
        }
        else{
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'/AdminPanel/lense' ?>">Lense</a>
            </li>
          <?php         
        }

        if($admin_nav_item == "Shipping_type"){
          ?>
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url().'/AdminPanel/shipping_type' ?>">Shipping-type<span class="sr-only">(current)</span></a>
            </li>
          <?php
        }
        else{
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'/AdminPanel/shipping_type' ?>">Shipping-type</a>
            </li>
          <?php         
        }

        if($admin_nav_item == "User"){
          ?>
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url().'/AdminPanel/user' ?>">User<span class="sr-only">(current)</span></a>
            </li>
          <?php
        }
        else{
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'/AdminPanel/user' ?>">User</a>
            </li>
          <?php         
        }

        if($admin_nav_item == "Order"){
          ?>
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url().'/AdminPanel/order' ?>">Order<span class="sr-only">(current)</span></a>
            </li>
          <?php
        }
        else{
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'/AdminPanel/order' ?>">Order</a>
            </li>
          <?php         
        }                
      ?>      

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Report
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
          if($admin_nav_item == "Report"){
            ?>
              <a class="dropdown-item active" href="<?php echo base_url().'/Report/statistics_summary' ?>">Statistics Summary</a>          
            <?php
          }
          else{
            ?>
              <a class="dropdown-item" href="<?php echo base_url().'/Report/statistics_summary' ?>">Statistics Summary</a>   
            <?php         
          }  
        ?>

        <?php
          if($admin_nav_item == "User Report"){
            ?>
              <a class="dropdown-item active" href="<?php echo base_url().'/Report/view_user' ?>">User Report</a>          
            <?php
          }
          else{
            ?>
              <a class="dropdown-item" href="<?php echo base_url().'/Report/view_user' ?>">User Report</a>   
            <?php         
          }  
        ?>        


         <!--  <a class="dropdown-item" href="<?php //echo base_url().'/Report/statistics_summary' ?>">Statistics Summary</a>
          <a class="dropdown-item" href="<?php //echo base_url().'/Report/statistics_summary#lense_summary' ?>">Lense Summary</a>
          <a class="dropdown-item" href="<?php //echo base_url().'/Report/statistics_summary#frame_summary' ?>">Frame Summary</a>
          <a class="dropdown-item" href="<?php //echo base_url().'/Report/statistics_summary#order_summary' ?>">Order Summary</a>
          <a class="dropdown-item" href="<?php //echo base_url().'/Report/statistics_summary' ?>">Monthly sales</a>
          <a class="dropdown-item" href="<?php //echo base_url().'/Report/statistics_summary' ?>">Yearly sales</a> -->
        </div>
      </li>
    </ul>
  </div>
  <div class="row mr-2">
    <div class="mt-1">
      <a class="nav-link" href="<?php echo base_url().'/Login/logout' ?>" style="color:white">Logout</a>
    </div>
  </div>
</nav>