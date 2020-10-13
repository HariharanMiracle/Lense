<main class="container-fluid">
<!-- All Categories -->
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <h3><i class="fas fa-list-alt"></i>All Orders</h3>
                            <br />
                            <div class="row">
							  <form class="form-inline ml-4 mb-2" action="<?php echo base_url().'/Order/search' ?>" method="post">
						        <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						      </form>   
                            </div>
                            <?php
                                if ($order) {
                                    echo '<table class="table table-striped table-bordered" id="lense">';
                                        echo '<thead>';
                                            echo '<tr>';
                                                echo '<th>No</th>';
                                                echo '<th>Username</th>';
                                                echo '<th>First name</th>';
                                                echo '<th>Last name</th>';
                                                echo '<th>Contact</th>';
                                                echo '<th>Email</th>';
                                                echo '<th>Total</th>';
                                                echo '<th>Order Date</th>';
                                                echo '<th>Status</th>';
                                                echo '<th>View-&-Edit</th>';
                                            echo '</tr>';
                                        echo '</thead>';

                                        echo '<tbody>';
                                            $count = 1;
                                            foreach ($order as $obj) {
                                                echo '<tr>';
                                                    echo '<td>'.$count.'</td>';
                                                    foreach($user as $obj2){
                                                    	if($obj['user_id'] == $obj2['id']){
                                                    		echo '<td>'.$obj2['username'].'</td>';
	                                                    	echo '<td>'.$obj2['fname'].'</td>';
		                                                    echo '<td>'.$obj2['lname'].'</td>';
		                                                    echo '<td>'.$obj2['contact'].'</td>';
		                                                    echo '<td>'.$obj2['email'].'</td>';
                                                    	}
                                                    }
                                                    echo '<td>'.$obj['total'].'</td>';
                                                    echo '<td>'.$obj['order_date'].'</td>';
                                                    if($obj['status'] == 0){
		                                                echo '<td class="bg-danger"><b class="text-white">Not paid</b></td>';
                                                    }
                                                    else if($obj['status'] == 1){
		                                                echo '<td class="bg-info"><b>Paid</b></td>';
                                                    }
                                                    else if($obj['status'] == 2){
		                                                echo '<td class="bg-warning"><b>Confirmed</b></td>';
                                                    }
                                                    else{
		                                                echo '<td class="bg-success"><b class="text-white">Deleiverd</b></td>';
                                                    }
                                                    echo '<td><a class="a-orange" href="'.base_url().'/Order/view/'.$obj['id'].'" alt="Edit Category - '.$obj['id'].'"><i class="far fa-edit"></i></a></td>';
                                                echo '</tr>';
                                                $count++;
                                            }
                                        echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo '<div class="col-md-12">';
                                        echo '<div class="alert alert-warning" role="alert">';
                                            echo 'No Orders Found!';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#category').DataTable();
    } );
</script>
</body>
</html>