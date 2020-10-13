<br/>
<main class="container-fluid">
    <div class="row explore">
        <div class="col-3">
            <div class="search" style="    border: 2px solid #43888c!important;">
                <div class="text-center pimay-bg py-5 text-light">
                    <h4><b>Shopping Options</b></h4>
                </div>
                <br/>

                <form action="<?php echo base_url('ExploreGlasses/search'); ?>" name="search_glasses" class="px-4"
                      id="search_glasses" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <label for="glass_name">Glass name</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="glass_name"><i class="fa fa-eye"></i></span>
                            <input id="glass_name" name="glass_name" type="text" class="form-control" placeholder="Glass name"
                                   aria-describedby="glass_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="glass_name"><i class="fa fa-eye"></i></span>
                            <select name="brand" class="form-control form-control-lg" id="brand">
                                <option value="0">Choose...</option>
                                <?php
                                foreach ($brand as $brandObj) {
                                    ?>
                                    <option
                                    value="<?php echo $brandObj['id']; ?>"><?php echo $brandObj['name']; ?></option><?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frame_type">Frame type</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="glass_name"><i class="fa fa-eye"></i></span>
                            <select name="frame_type" class="form-control form-control-lg" id="frame_type">
                                <option value="0">Choose...</option>
                                <?php
                                foreach ($frame_type as $frame_typeObj) {
                                    ?>
                                    <option
                                    value="<?php echo $frame_typeObj['id']; ?>"><?php echo $frame_typeObj['name']; ?></option><?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender">For</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="glass_name"><i class="fa fa-eye"></i></span>
                            <select name="gender" class="form-control form-control-lg" id="gender">
                                <option value="-1">Choose...</option>
                                <option value="0">Women</option>
                                <option value="1">Men</option>
                                <option value="2">Uni-sex</option>
                                <option value="3">Children</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="from_price">Price range</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-addon" id="glass_name"><i class="fa fa-eye"></i></span>
                                    <input type="number" class="form-control" name="from_price"
                                           id="from_price" placeholder="From..." autocomplete="off">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-addon" id="glass_name"><i class="fa fa-eye"></i></span>
                                    <input type="number" class="form-control" name="to_price" id="to_price"
                                           placeholder="To..." autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right mt-4">
                        <button type="submit" class="btn btn-secondary pimay-bg w-100">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-9">
            <?php
            $size = sizeof($frame) - 1;
            $count = 0;
            for ($i = 0; $i <= $size;) {
                ?>
                <div class="row">
                    <?php
                    if ($frame[$count]['id'] != "") {
                        ?>

                        <div class="col-3 product-container">
                            <div class="card product-card">
                                <div class="w-100">
                                    <?php
                                    $frameId1 = $frame[$count]['id'];
                                    foreach ($frame_image as $frameImgObj) {
                                        if ($frameImgObj['frame_id'] == $frameId1) {
                                            ?><img class="product-img"
                                                   src="<?php echo base_url() . '/uploads/frameImage/' . $frameImgObj['path']; ?>"
                                                   height="100%" width="100%"
                                                   alt="<?php echo $frameImgObj['alt']; ?>"><?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="card-body">
                                    <span class="discount-container"><span class="discount">-10%</span></span>
                                    <h4 class="py-1 float-left"><b><?php echo $frame[$count]['name']; ?></b></h4>

                                    <h4 class="price">
                                        <b><?php echo $frame[$count]['price'] . ' LKR'; ?></b>
                                    </h4>
                                    <div class="clearfix"></div>
                                    <?php
                                    if ($frame[$count]['type'] == 0) {
                                        ?><h5 class="py-1 text-muted"><b> Women</b></h5><?php
                                    } else if ($frame[$count]['type'] == 1) {
                                        ?><h5 class="py-1 text-muted"><b>Men</b></h5><?php
                                    } else if ($frame[$count]['type'] == 2) {
                                        ?><h5 class="py-1 text-muted"><b>Uni-sex</b></h5><?php
                                    } else if ($frame[$count]['type'] == -1) {
                                        ?><h5 class="py-1 text-muted"><b>Own Frame</b></h5><?php
                                    } else {
                                        ?><h5 class="py-1 text-muted"><b>Children</b></h5><?php
                                    }
                                    ?>
                                    <?php
                                    foreach ($brand as $brandObj) {
                                        if ($frame[$count]['brand'] == $brandObj['id']) {
                                            ?>
                                            <h5 class="pt-1 text-muted"> <?php echo $brandObj['name'] ?></h5>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="moredetails-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            foreach ($brand as $brandObj) {
                                                if ($frame[$count]['brand'] == $brandObj['id']) {
                                                    ?><p><b>Brand</b></p>
                                                    <h5 class="pt-0"> <?php echo $brandObj['name'] ?></h5>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                            foreach ($frame_type as $frameTypeObj) {
                                                if ($frameTypeObj['id'] == $frame[$count]['frametype_id']) {
                                                    ?><p><b>Frame type</b></p>
                                                    <h5 class="pt-0"> <?php echo $frameTypeObj['name']; ?></h5><?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-12 border-top border-bottom py-3 mb-3">
                                            <div class="rating">
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text"><?php echo $frame[$count]['description']; ?></p>
                                </div>
                            </div>

                            <div class="w-100">
                                <?php
                                    if($frame[$count]['stock'] > 0){
                                        ?><a class="morebtn mt-1" href="<?php echo base_url().'/ExploreGlasses/product/'.$frame[$count]['id']; ?>">Buy Now</a><?php
                                    }
                                    else{
                                        ?><a class="morebtn mt-1 text-white"><b>STOCK OUT</b></a><?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-3"></div><?php
                    }
                    ?>

                    <?php $count++; ?>
                    <?php $i = $count; ?>

                    <?php
                    if ($frame[$count]['id'] != "") {
                        ?>

                        <div class="col-3 product-container">
                            <div class="card product-card">
                                <div class="w-100">
                                    <?php
                                    $frameId1 = $frame[$count]['id'];
                                    foreach ($frame_image as $frameImgObj) {
                                        if ($frameImgObj['frame_id'] == $frameId1) {
                                            ?><img class="product-img"
                                                   src="<?php echo base_url() . '/uploads/frameImage/' . $frameImgObj['path']; ?>"
                                                   height="100%" width="100%"
                                                   alt="<?php echo $frameImgObj['alt']; ?>"><?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="card-body">
                                    <span class="discount-container"><span class="discount">-10%</span></span>
                                    <h4 class="py-1 float-left"><b><?php echo $frame[$count]['name']; ?></b></h4>

                                    <h4 class="price">
                                        <b><?php echo $frame[$count]['price'] . ' LKR'; ?></b>
                                    </h4>
                                    <div class="clearfix"></div>
                                    <?php
                                    if ($frame[$count]['type'] == 0) {
                                        ?><h5 class="py-1 text-muted"><b> Women</b></h5><?php
                                    } else if ($frame[$count]['type'] == 1) {
                                        ?><h5 class="py-1 text-muted"><b>Men</b></h5><?php
                                    } else if ($frame[$count]['type'] == 2) {
                                        ?><h5 class="py-1 text-muted"><b>Uni-sex</b></h5><?php
                                    } else if ($frame[$count]['type'] == -1) {
                                        ?><h5 class="py-1 text-muted"><b>Own Frame</b></h5><?php
                                    } else {
                                        ?><h5 class="py-1 text-muted"><b>Children</b></h5><?php
                                    }
                                    ?>
                                    <?php
                                    foreach ($brand as $brandObj) {
                                        if ($frame[$count]['brand'] == $brandObj['id']) {
                                            ?>
                                            <h5 class="pt-1 text-muted"> <?php echo $brandObj['name'] ?></h5>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="moredetails-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            foreach ($brand as $brandObj) {
                                                if ($frame[$count]['brand'] == $brandObj['id']) {
                                                    ?><p><b>Brand</b></p>
                                                    <h5 class="pt-0"> <?php echo $brandObj['name'] ?></h5>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                            foreach ($frame_type as $frameTypeObj) {
                                                if ($frameTypeObj['id'] == $frame[$count]['frametype_id']) {
                                                    ?><p><b>Frame type</b></p>
                                                    <h5 class="pt-0"> <?php echo $frameTypeObj['name']; ?></h5><?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-12 border-top border-bottom py-3 mb-3">
                                            <div class="rating">
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text"><?php echo $frame[$count]['description']; ?></p>
                                </div>
                            </div>

                            <div class="w-100">
                                <?php
                                    if($frame[$count]['stock'] > 0){
                                        ?><a class="morebtn mt-1"href="<?php echo base_url().'/ExploreGlasses/product/'.$frame[$count]['id']; ?>">Buy Now</a><?php
                                    }
                                    else{
                                        ?><a class="morebtn mt-1 text-white">STOCK OUT</a><?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-3"></div><?php
                    }
                    ?>

                    <?php $count++; ?>
                    <?php $i = $count; ?>

                    <?php
                    if ($frame[$count]['id'] != "") {
                        ?>
                        <div class="col-3 product-container">
                            <div class="card product-card">
                                <div class="w-100">
                                    <?php
                                    $frameId1 = $frame[$count]['id'];
                                    foreach ($frame_image as $frameImgObj) {
                                        if ($frameImgObj['frame_id'] == $frameId1) {
                                            ?><img class="product-img"
                                                   src="<?php echo base_url() . '/uploads/frameImage/' . $frameImgObj['path']; ?>"
                                                   height="100%" width="100%"
                                                   alt="<?php echo $frameImgObj['alt']; ?>"><?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="card-body">
                                    <span class="discount-container"><span class="discount">-10%</span></span>
                                    <h4 class="py-1 float-left"><b><?php echo $frame[$count]['name']; ?></b></h4>

                                    <h4 class="price">
                                        <b><?php echo $frame[$count]['price'] . ' LKR'; ?></b>
                                    </h4>
                                    <div class="clearfix"></div>
                                    <?php
                                    if ($frame[$count]['type'] == 0) {
                                        ?><h5 class="py-1 text-muted"><b> Women</b></h5><?php
                                    } else if ($frame[$count]['type'] == 1) {
                                        ?><h5 class="py-1 text-muted"><b>Men</b></h5><?php
                                    } else if ($frame[$count]['type'] == 2) {
                                        ?><h5 class="py-1 text-muted"><b>Uni-sex</b></h5><?php
                                    } else if ($frame[$count]['type'] == -1) {
                                        ?><h5 class="py-1 text-muted"><b>Own Frame</b></h5><?php
                                    } else {
                                        ?><h5 class="py-1 text-muted"><b>Children</b></h5><?php
                                    }
                                    ?>
                                    <?php
                                    foreach ($brand as $brandObj) {
                                        if ($frame[$count]['brand'] == $brandObj['id']) {
                                            ?>
                                            <h5 class="pt-1 text-muted"> <?php echo $brandObj['name'] ?></h5>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="moredetails-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            foreach ($brand as $brandObj) {
                                                if ($frame[$count]['brand'] == $brandObj['id']) {
                                                    ?><p><b>Brand</b></p>
                                                    <h5 class="pt-0"> <?php echo $brandObj['name'] ?></h5>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                            foreach ($frame_type as $frameTypeObj) {
                                                if ($frameTypeObj['id'] == $frame[$count]['frametype_id']) {
                                                    ?><p><b>Frame type</b></p>
                                                    <h5 class="pt-0"> <?php echo $frameTypeObj['name']; ?></h5><?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-12 border-top border-bottom py-3 mb-3">
                                            <div class="rating">
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text"><?php echo $frame[$count]['description']; ?></p>
                                </div>
                            </div>

                            <div class="w-100">
                                <?php
                                    if($frame[$count]['stock'] > 0){
                                        ?><a class="morebtn mt-1"href="<?php echo base_url().'/ExploreGlasses/product/'.$frame[$count]['id']; ?>">Buy Now</a><?php
                                    }
                                    else{
                                        ?><a class="morebtn mt-1 text-white">STOCK OUT</a><?php
                                    }
                                ?>
                            </div>

                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-3"></div><?php
                    }
                    ?>
                    <?php $count++; ?>
                    <?php $i = $count; ?>

                    <?php
                    if ($frame[$count]['id'] != "") {
                        ?>

                        <div class="col-3 product-container">
                            <div class="card product-card">
                                <div class="w-100">
                                    <?php
                                    $frameId1 = $frame[$count]['id'];
                                    foreach ($frame_image as $frameImgObj) {
                                        if ($frameImgObj['frame_id'] == $frameId1) {
                                            ?><img class="product-img"
                                                   src="<?php echo base_url() . '/uploads/frameImage/' . $frameImgObj['path']; ?>"
                                                   height="100%" width="100%"
                                                   alt="<?php echo $frameImgObj['alt']; ?>"><?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="card-body">
                                    <span class="discount-container"><span class="discount">-10%</span></span>
                                    <h4 class="py-1 float-left"><b><?php echo $frame[$count]['name']; ?></b></h4>

                                    <h4 class="price">
                                        <b><?php echo $frame[$count]['price'] . ' LKR'; ?></b>
                                    </h4>
                                    <div class="clearfix"></div>
                                    <?php
                                    if ($frame[$count]['type'] == 0) {
                                        ?><h5 class="py-1 text-muted"><b> Women</b></h5><?php
                                    } else if ($frame[$count]['type'] == 1) {
                                        ?><h5 class="py-1 text-muted"><b>Men</b></h5><?php
                                    } else if ($frame[$count]['type'] == 2) {
                                        ?><h5 class="py-1 text-muted"><b>Uni-sex</b></h5><?php
                                    } else if ($frame[$count]['type'] == -1) {
                                        ?><h5 class="py-1 text-muted"><b>Own Frame</b></h5><?php
                                    } else {
                                        ?><h5 class="py-1 text-muted"><b>Children</b></h5><?php
                                    }
                                    ?>
                                    <?php
                                    foreach ($brand as $brandObj) {
                                        if ($frame[$count]['brand'] == $brandObj['id']) {
                                            ?>
                                            <h5 class="pt-1 text-muted"> <?php echo $brandObj['name'] ?></h5>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="moredetails-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            foreach ($brand as $brandObj) {
                                                if ($frame[$count]['brand'] == $brandObj['id']) {
                                                    ?><p><b>Brand</b></p>
                                                    <h5 class="pt-0"> <?php echo $brandObj['name'] ?></h5>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                            foreach ($frame_type as $frameTypeObj) {
                                                if ($frameTypeObj['id'] == $frame[$count]['frametype_id']) {
                                                    ?><p><b>Frame type</b></p>
                                                    <h5 class="pt-0"> <?php echo $frameTypeObj['name']; ?></h5><?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-12 border-top border-bottom py-3 mb-3">
                                            <div class="rating">
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text"><?php echo $frame[$count]['description']; ?></p>
                                </div>
                            </div>
                            <div class="w-100">
                                <?php
                                    if($frame[$count]['stock'] > 0){
                                        ?><a class="morebtn mt-1"href="<?php echo base_url().'/ExploreGlasses/product/'.$frame[$count]['id']; ?>">Buy Now</a><?php
                                    }
                                    else{
                                        ?><a class="morebtn mt-1 text-white">STOCK OUT</a><?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-3"></div><?php
                    }
                    ?>

                    <?php $count++; ?>
                    <?php $i = $count; ?>

                </div>
                <?php
            }
            ?>
        </div>
    </div>
</main>
<br/>