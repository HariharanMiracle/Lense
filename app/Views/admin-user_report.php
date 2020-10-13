<main class="container-fluid">
					<div class="row">
                        <div class="col-md-12">
                            <h3><i class="fas fa-list-alt"></i>All Users</h3>
                            <br />
<!--                             <div class="row">
							  <form class="form-inline ml-4 mb-2" action="<?php echo base_url().'/User/search0' ?>" method="post">
						        <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						      </form>   
                            </div> -->
                            <?php
                                if ($user) {
                                    echo '<table class="table table-striped table-bordered" id="lense_type">';
                                        echo '<thead>';
                                            echo '<tr>';
                                                echo '<th>No</th>';
                                                echo '<th>Username</th>';
                                                echo '<th>First name</th>';
                                                echo '<th>Last name</th>';
                                                echo '<th>Contact</th>';
                                                // echo '<th>Dob</th>';
                                                // echo '<th>Privilege</th>';
                                                echo '<th>City</th>';
                                                echo '<th>Country</th>';
                                                echo '<th>Address</th>';
                                                echo '<th>Email</th>';
                                                echo '<th>Description</th>';
                                                // echo '<th>Created on</th>';
                                                echo '<th>View Report</th>';
                                                // echo '<th>Delete</th>';
                                            echo '</tr>';
                                        echo '</thead>';

                                        echo '<tbody>';
                                            $count = 1;
                                            foreach ($user as $obj) {
                                            	if($obj['privilege'] == 2){
	                                            	echo '<tr>';
	                                                	if($obj['status'] == 0){
	                                                		// In-active
	                                                		echo '<td class="bg-danger">'.$count.'</td>';
	                                                	}
	                                                	else{
	                                                		// Active
	                                                		echo '<td class="bg-success">'.$count.'</td>';
	                                                	}
	                                                    echo '<td>'.$obj['username'].'</td>';
	                                                    echo '<td>'.$obj['fname'].'</td>';
	                                                    echo '<td>'.$obj['lname'].'</td>';
	                                                    echo '<td>'.$obj['contact'].'</td>';
	                                                    echo '<td>'.$obj['city'].'</td>';
	                                                    echo '<td>'.$obj['country'].'</td>';
	                                                    echo '<td>'.$obj['address'].'</td>';
	                                                    echo '<td>'.$obj['email'].'</td>';
	                                                    echo '<td>'.$obj['description'].'</td>';
	                                                    // echo '<td>'.$obj['created_on'].'</td>';
	                                                    echo '<td><a class="a-orange" href="'.base_url().'/Report/view_user_report/'.$obj['id'].'" alt="View report - '.$obj['username'].'"><i class="fa fa-eye"></i></a></td>';
	                                                    // echo '<td><a class="a-orange" href="'.base_url().'/User/delete/'.$obj['id'].'" alt="Delete Category - '.$obj['username'].'"><i class="far fa-trash-alt"></i></a></td>';
	                                                echo '</tr>';
	                                                $count++;
                                            	}
                                            }
                                        echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo '<div class="col-md-12">';
                                        echo '<div class="alert alert-warning" role="alert">';
                                            echo 'No User Found!';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            ?>
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
</body>
</html>	