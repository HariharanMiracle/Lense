<main class="container">
    <br/>
    <div class="row">
        <!-- product image plane start -->
        <div class="col-6 border border-light">
            <!-- Main image section start -->
            <div class="row text-center">
                <div class="col-12 bg-light">
                    <h3><?php echo $frame['name']; ?></h3>
                </div>
            </div>
            <br/>
            <div class="row text-center">
                <div class="col-12">
                    <!-- Main image of product start -->
                    <?php
                    foreach ($frame_image as $frame_imageObj) {
                        if ($frame_imageObj['frame_id'] == $frame['id']) {
                            ?>
                            <img src="<?php echo base_url() . '/uploads/frameImage/' . $frame_imageObj['path']; ?>"
                                 alt="<?php $frame_imageObj['alt']; ?>" class="border" height="250px" width="250px"/>
                            <?php
                        }

                    }
                    ?>
                    <!-- Main image of product end -->
                </div>
            </div>
            <!-- Main image section start -->

            <!-- Sub images section start -->
            <div class="row">
                <!-- Side view 1 start -->
                <div class="col-4">
                    <!-- Side view 1 image section start -->
                    <div class="row text-center">
                        <div class="col-12">
                            <!-- Side view 1 image of product start -->
                            <?php
                            foreach ($side_image_1 as $side_image_1Obj) {
                                if ($side_image_1Obj['frame_id'] == $frame['id']) {
                                    ?>
                                    <img src="<?php echo base_url() . '/uploads/frameImage/' . $side_image_1Obj['image_path']; ?>"
                                         alt="<?php $side_image_1Obj['alt']; ?>" class="border zoomMini" height="100px"
                                         width="100px"/>
                                    <?php
                                }

                            }
                            ?>
                            <h5>Side view 1</h5>
                            <!-- Side view 1 image of product end -->
                        </div>
                    </div>
                    <!-- Side view 1 image section end -->
                </div>
                <!-- Sub images section end -->

                <!-- Sub images section start -->
                <div class="col-4">
                    <!-- Side view 1 image section start -->
                    <div class="row text-center">
                        <div class="col-12">
                            <!-- Main image of product start -->
                            <?php
                            foreach ($front_image as $front_imageObj) {
                                if ($front_imageObj['frame_id'] == $frame['id']) {
                                    ?>
                                    <img src="<?php echo base_url() . '/uploads/frameImage/' . $front_imageObj['image_path']; ?>"
                                         alt="<?php $front_imageObj['alt']; ?>" class="border zoomMini" height="100px"
                                         width="100px"/>
                                    <?php
                                }

                            }
                            ?>
                            <h5>Front view</h5>
                            <!-- Side view 1 image of product end -->
                        </div>
                    </div>
                    <!-- Side view 1 image section end -->
                </div>
                <!-- Sub images section end -->

                <!-- Sub images section start -->
                <div class="col-4">
                    <!-- Side view 2 image section start -->
                    <div class="row text-center">
                        <div class="col-12">
                            <!-- Side view 2 image of product start -->
                            <?php
                            foreach ($side_image_2 as $side_image_2Obj) {
                                if ($side_image_2Obj['frame_id'] == $frame['id']) {
                                    ?>
                                    <img src="<?php echo base_url() . '/uploads/frameImage/' . $side_image_1Obj['image_path']; ?>"
                                         alt="<?php $side_image_2Obj['alt']; ?>" class="border zoomMini" height="100px"
                                         width="100px"/>
                                    <?php
                                }

                            }
                            ?>
                            <h5>Side view 2</h5>
                            <!-- Side view 2 image of product end -->
                        </div>
                    </div>
                    <!-- Side view 2 image section start -->
                </div>
                <!-- Sub images section end -->
            </div>

        </div>
        <!-- product image plane end -->

        <!-- product image plane start -->
        <div class="col-6 border border-light">
            <div class="row text-center">
                <div class="col-12 bg-light"><h3>Details</h3></div>
            </div>
            <div class="row container-fluid">
                <?php
                if ($frame['type'] == 0) {
                    ?><h5><b>FOR:</b> Women</h5><?php
                } else if ($frame['type'] == 1) {
                    ?><h5><b>FOR:</b> Men</h5><?php
                } else if ($frame['type'] == 2) {
                    ?><h5><b>FOR:</b> Uni-Sex</h5><?php
                } else {
                    ?><h5><b>FOR:</b> Children</h5><?php
                }
                ?>
            </div>
            <div class="row container-fluid">
                <h5><b>MODEL:</b><?php echo ' ' . $frame['model']; ?></h5>
            </div>
            <div class="row container-fluid">
                <h5><b>PRICE:</b><?php echo ' ' . $frame['price'] . ' LKR'; ?></h5>
                <input type="text" value="<?php echo $frame['price']; ?>" id="frame_price" name="frame_price" hidden/>
            </div>
            <div class="row container-fluid">
                <h5><b>DESCRIPTION:</b><?php echo ' ' . $frame['description']; ?></h5>
            </div>
            <?php
            foreach ($brand as $brandObj) {
                if ($brandObj['id'] == $frame['brand']) {
                    ?><h5><b>BRAND:</b><?php echo ' ' . $brandObj['name']; ?></h5><?php
                }
            }
            ?>
            <div class="row text-center">
<!--                 <div class="col-12">
                    <button type="button" class="btn btn-info btn-lg btn-block">TRY ON</button>
                </div>
 -->            </div>
        </div>
        <!-- product image plane start -->
    </div>

    <br/>
    <br/>
    <form action="<?php echo base_url('Cart/addItem'); ?>" name="categoryObj_create" id="categoryObj_create"
          method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="row">
            <!-- Lense selection start -->
            <div class="col-3 border-right border-dark">
                <div class="row">
                    <div class="col-12 bg-light text-center">
                        <h4>Select a lense</h4>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-12 bg-light text-center">
                        <h4>Lense effect</h4>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lense_shade_id">Lense effect</label>
                    <select id="lense_shade_id" name="lense_shade_id" class="form-control form-control-lg"
                            onchange="loadImage(this.value)">
                        <option id="0">Choose...</option>
                        <?php
                        foreach ($lense_shade as $lense_shadeObj) {
                            ?>
                            <option
                            value="<?php echo $lense_shadeObj['id'] . ' ' . $lense_shadeObj['path'] . ' ' . $lense_shadeObj['price']; ?>"><?php echo $lense_shadeObj['name']; ?></option><?php
                        }
                        ?>
                    </select>

                    <input type="text" name="lenseEffectPrice" class="form-control" id="lenseEffectPrice"
                           placeholder="Lense effect price" readonly="readonly" value="0" required>
                </div>
                <div class="form-group zoom1">
                    <img id="lense-effect" src="http://localhost/Lense/public/uploads/frameImage/none.png" height="100%"
                         width="100%"/>
                </div>
                <br/>
                <div class="form-group">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                        Lense Selection
                    </button>&nbsp;&nbsp;&nbsp;<span
                            class="text-danger"><b>*Click this button to select the lense</b></span>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Lense Selection</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="scrollbar">
                                    <?php
                                    $i = 1;
                                    $lensetype = "";
                                    foreach ($lense as $lenseObj) {
                                        ?>
                                        <div class="row">
                                            <div class="col-1"><h5><?php echo $i; ?></h5></div>
                                            <div class="col-2"><h5><?php foreach ($lense_type as $lense_typeObj) {
                                                        if ($lense_typeObj['id'] == $lenseObj['lensetype_id']) {
                                                            echo $lense_typeObj['name'];
                                                            $lensetype = $lense_typeObj['name'];
                                                        }
                                                    } ?></h5></div>
                                            <div class="col-3"><h5><?php echo $lenseObj['model']; ?></h5></div>
                                            <div class="col-3"><h5><?php echo $lenseObj['name']; ?></h5></div>
                                            <div class="col-1"><h5><?php echo $lenseObj['price']; ?></h5></div>
                                            <div class="col-2"><input type="button" class="btn btn-info"
                                                                      name="lense_select"
                                                                      onclick="fillLenseDetails('<?php echo $lenseObj['id']; ?>', '<?php echo $lensetype; ?>', '<?php echo $lenseObj['model']; ?>', '<?php echo $lenseObj['name']; ?>', '<?php echo $lenseObj['price']; ?>', '<?php echo $lenseObj['description']; ?>')"
                                                                      value="ok"/></div>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="frame_id" class="form-control" id="frame_id" placeholder="Frame id"
                           readonly="readonly" value="<?php echo $frame['id']; ?>" required hidden>
                    <input type="text" name="lense_id" class="form-control" id="lense_id" placeholder="Lense id"
                           readonly="readonly" required hidden>
                    <label for="lense_type">Lense type</label>
                    <input type="text" name="lense_type" class="form-control" id="lense_type" placeholder="Lense type"
                           readonly="readonly" required>
                </div>
                <div class="form-group">
                    <label for="lense_model">Lense model</label>
                    <input type="text" name="lense_model" class="form-control" id="lense_model"
                           placeholder="Lense model" readonly="readonly" required>
                </div>
                <div class="form-group">
                    <label for="lense_name">Lense name</label>
                    <input type="text" name="lense_name" class="form-control" id="lense_name" placeholder="Lense name"
                           readonly="readonly" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="lense_price" class="form-control" id="lense_price" value="0"
                           placeholder="Price" readonly="readonly" required>
                </div>
                <div class="form-group">
                    <label for="des">Description</label>
                    <input type="text" name="des_lense" class="form-control" id="des_lense" placeholder="Description"
                           readonly="readonly" required>
                </div>
            </div>
            <!-- Lense selection end -->
            <!-- Add to cart item end -->

            <div class="col-9 border-left border-dark">
                <div class="row">
                    <div class="col-12 bg-light text-center">
                        <h4>Prescription | බෙහෙත් වට්ටෝරුව</h4>
                    </div>
                </div>
                <br/>

                <div class="row ml-3">
                    <div class="col-6 border border-dark">
                        <div class="row">
                            <div class="col-12 text-center bg-light"><h4>Left Eye</h4></div>
                        </div>
                    </div>
                    <div class="col-6 border border-dark">
                        <div class="row">
                            <div class="col-12 text-center bg-light"><h4>Right Eye</h4></div>
                        </div>
                    </div>
                </div>
                <div class="row ml-3">
                    <div class="col-6 border border-dark">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#######</th>
                                        <th>SPH (ගෝල)</th>
                                        <th>CLY (සිලින්ඩර්)</th>
                                        <th>AXIS (අක්ශ)</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 border border-dark">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#######</th>
                                        <th>SPH (ගෝල)</th>
                                        <th>CLY (සිලින්ඩර්)</th>
                                        <th>AXIS (අක්ශ)</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ml-3">
                    <div class="col-6 border border-dark">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Distance (දුර)</th>
                                        <td><input type="number" id="LDSPH" name="LDSPH" class="form-control"/></td>
                                        <td><input type="number" id="LDCLY" name="LDCLY" class="form-control"/></td>
                                        <td><input type="number" id="LDAXIS" name="LDAXIS" class="form-control"/></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 border border-dark">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Distance (දුර)</th>
                                        <td><input type="number" id="RDSPH" name="RDSPH" class="form-control"/></td>
                                        <td><input type="number" id="RDCLY" name="RDCLY" class="form-control"/></td>
                                        <td><input type="number" id="RDAXIS" name="RDAXIS" class="form-control"/></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ml-3">
                    <div class="col-6 border border-dark">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Reading (කියවීම)</th>
                                        <td><input type="number" id="LRSPH" name="LRSPH" class="form-control"/></td>
                                        <td><input type="number" id="LRCLY" name="LRCLY" class="form-control"/></td>
                                        <td><input type="number" id="LRAXIS" name="LRAXIS" class="form-control"/></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 border border-dark">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Reading (කියවීම)</th>
                                        <td><input type="number" id="RRSPH" name="RRSPH" class="form-control"/></td>
                                        <td><input type="number" id="RRCLY" name="RRCLY" class="form-control"/></td>
                                        <td><input type="number" id="RRAXIS" name="RRAXIS" class="form-control"/></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group ml-3 mt-2">
                    <label for="prescription">Prescription image</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="glass_name"><i class="fa fa-camera"></i></span>
                        <input type="file" name="prescription" class="form-control" id="prescription">
                    </div>
                </div>

                <div class="form-group" style="float: right">
                    <button type="submit" class="btn btn-secondary" data-toggle="modal"
                            data-target="#exampleModalCenter">
                        Add to cart
                    </button>
                </div>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-12">
                        <div class="row"><h4><b>Total:</b> <span id="totalPrice"><?php echo $frame['price']; ?></span>
                                LKR</h4></div>
                        <input type="number" id="totalPriceInput" name="totalPriceInput" class="form-control" required
                               hidden/>
                    </div>
                </div>
            </div>
    </form>
    <br/>
</main>
<style type="text/css">
    .zoom1 {
        /*padding: 50px;*/
        /*background-color: green;*/
        transition: transform .2s; /* Animation */
        /*width: 200px;*/
        /*height: 200px;*/
        margin: 0 auto;
    }

    .zoom1:hover {
        transform: scale(2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
    .zoomMini:hover {
        transition: transform .2s; /* Animation */
        transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>
<script type="text/javascript">
    function fillLenseDetails(id, lense_type, lense_model, lense_name, price, description) {
        // alert('lense_type: ' + lense_type + '===lense_model: ' + lense_model + '===lense_name: ' + lense_name + '===price: ' + price + "===des: " + description);

        document.getElementById('lense_id').value = id;
        document.getElementById('lense_type').value = lense_type;
        document.getElementById('lense_model').value = lense_model;
        document.getElementById('lense_name').value = lense_name;
        document.getElementById('lense_price').value = price;
        document.getElementById('des_lense').value = description;

        totalCalculator();
    }

    // function totalCalculator(price){
    // 	var total = 0;
    // 	total = parseFloat(document.getElementById("frame_price").value) + price + parseFloat(document.getElementById("lenseEffectPrice").value);
    // 	document.getElementById("totalPrice").innerHTML = total;
    // 	document.getElementById("totalPriceInput").value = total;
    // }

    function totalCalculator() {
        var total = 0;
        var frame_price = parseFloat(document.getElementById("frame_price").value);
        var lense_price = parseFloat(document.getElementById("lense_price").value);
        var lense_effect_price = parseFloat(document.getElementById("lenseEffectPrice").value);
        console.log('frame_price: ' + frame_price);
        console.log('lense_price: ' + lense_price);
        console.log('lense_effect_price: ' + lense_effect_price);

        total = frame_price + lense_price + lense_effect_price;

        document.getElementById("totalPrice").innerHTML = total;
        document.getElementById("totalPriceInput").value = total;
    }

    function loadImage(str) {
        var strPart = str.split(" ");
        var id = strPart[0];
        var image = strPart[1];
        var price = strPart[2];

        var res = 'http://localhost/Lense/public/uploads/frameImage/' + image;

        document.getElementById('lense-effect').src = res;
        console.log(id);
        console.log(image);
        console.log(price);
        console.log(str);

        document.getElementById('lenseEffectPrice').value = price;
        totalCalculator();
    }
</script>