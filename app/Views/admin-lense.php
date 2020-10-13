<main class="container-fluid">
<!-- All Categories -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo base_url().'/Lense/create'; ?>" class="btn btn-orange" alt="Create Category">Add New</a>
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-md-12">
                            <h3><i class="fas fa-list-alt"></i>All Lense</h3>
                            <br />
                            <div class="row">
							  <form class="form-inline ml-4 mb-2" action="<?php echo base_url().'/Lense/search' ?>" method="post">
						        <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						      </form>   
                            </div>
                            <?php
                                if ($lense) {
                                    echo '<table class="table table-striped table-bordered" id="lense">';
                                        echo '<thead>';
                                            echo '<tr>';
                                                echo '<th>No</th>';
                                                echo '<th>Lense Type</th>';
                                                echo '<th>Lense model</th>';
                                                echo '<th>Lense name</th>';
                                                echo '<th>Description</th>';
                                                // echo '<th>Power</th>';
                                                echo '<th>Price</th>';
                                                echo '<th>Edit</th>';
                                                echo '<th>Delete</th>';
                                            echo '</tr>';
                                        echo '</thead>';

                                        echo '<tbody>';
                                            $count = 1;
                                            foreach ($lense as $obj) {
                                                
                                                echo '<tr>';
                                                    echo '<td>'.$count.'</td>';
                                                    foreach($lense_type as $obj2){
                                                    	if($obj['lensetype_id'] == $obj2['id']){
                                                    		echo '<td>'.$obj2['name'].'</td>';
                                                    	}
                                                    }
                                                    echo '<td>'.$obj['model'].'</td>';
                                                    echo '<td>'.$obj['name'].'</td>';
                                                    echo '<td>'.$obj['description'].'</td>';
                                                    // echo '<td>'.$obj['power'].'</td>';
                                                    echo '<td>'.$obj['price'].'</td>';
                                                    echo '<td><a class="a-orange" href="'.base_url().'/Lense/edit/'.$obj['id'].'" alt="Edit Category - '.$obj['name'].'"><i class="far fa-edit"></i></a></td>';
                                                    echo '<td><a class="a-orange" href="'.base_url().'/Lense/delete/'.$obj['id'].'" alt="Delete Category - '.$obj['name'].'"><i class="far fa-trash-alt"></i></a></td>';
                                                echo '</tr>';
                                                $count++;
                                            }
                                        echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo '<div class="col-md-12">';
                                        echo '<div class="alert alert-warning" role="alert">';
                                            echo 'No Lense Found!';
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