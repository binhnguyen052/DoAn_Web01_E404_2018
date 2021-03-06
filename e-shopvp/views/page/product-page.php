<?php
    include ("../../controllers/products/header.php");


//lưu lượt xem

$op = 'product-detail'; //trang hiện tại
$id_view = $_GET['id'];

//mỗi session riêng chỉ tính 1 lượt view
$_model_product->view_session($db->link, $id_view, $op);

//mỗi lượt click là tính 1 lượt view (không quan tâm session)
//$_model_product->view_on_click($db->link, $id_view);
?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Chi tiết sản phẩm</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <?php
                    $product_id = null;
                    $product_type_id = null;
                    $manufacturer_id = null;
                    if (isset($_GET['id'])) {$product_id = $_GET['id']; }
                    $filter = array(
                        'id' => $product_id,
                    );
                    $sql = $_model_product->get_one_product($filter);
                    $result = $db->executeQuery($db->link, $sql);
                    while($row = mysqli_fetch_array($result)) {
                    extract($row); $product_type_id = $row['type_id']; $manufacturer_id = $row['manufacturer_id'];?>
                        <div class="col-md-6">
                            <div id="product-main-view">
                                <div class="product-view">
                                    <img src="<?php echo $href_public;?>/upload/detail/<?php echo $row['image_url'];?>" alt="">
                                </div>
                            </div>

<!--                            <div id="product-view">-->
<!--                                <div class="product-view">-->
<!--                                    <img src="--><?php //echo $href_public;?><!--/upload/detail/--><?php //echo $row['image_url'];?><!--" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>

                        <div class="col-md-6">
                            <div class="product-body">
                                <div class="product-label text-uppercase">
                                    <span>Sản phẩm</span>
                                </div>
                                <h2 class="product-name text-uppercase"><?php echo $row['product_name'];?></h2>
                                <h3 class="product-price" style=" color: #F8694A;">$<?php echo $row['price'];?></h3>
<!--                                <div>-->
<!--                                    <div class="product-rating">-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star-o empty"></i>-->
<!--                                    </div>-->
<!--                                    <a href="#">3 Review(s) / Add Review</a>-->
<!--                                </div>-->
                                <p class="text-uppercase"><strong>Khả dụng: </strong><?php echo $row['type_name']; ?></p>
                                <p class="text-uppercase"><strong>Loại sản phẩm: </strong><?php echo $row['type_name']; ?></p>
                                <p class="text-uppercase"><strong>Nhà sản xuất: </strong><?php echo $row['manufacturer_name']; ?></p>
                                <p class="text-uppercase"><strong>Xuất xứ: </strong><?php echo $row['origin']; ?></p>
                                <p class="text-uppercase"><strong>Số lượt bán: </strong><?php echo $row['solds']; ?></p>
                                <p class="text-uppercase"><strong>Số lượt xem: </strong><?php echo $row['views']; ?></p>
                                <p class="text-uppercase"><strong>Mô tả: </strong><?php echo $row['descreibe']; ?></p>
                                <div class="product-options">
                                    <ul class="size-option">
                                        <li><span class="text-uppercase">Size:</span></li>
                                        <li class="active"><a href="#">S</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">SL</a></li>
                                    </ul>
                                    <ul class="color-option">
                                        <li><span class="text-uppercase">Color:</span></li>
                                        <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                                        <li><a href="#" style="background-color:#8A2454;"></a></li>
                                        <li><a href="#" style="background-color:#BF6989;"></a></li>
                                        <li><a href="#" style="background-color:#9A54D8;"></a></li>
                                    </ul>
                                </div>

                                <div class="product-btns">
                                    <div class="qty-input">
                                        <span class="text-uppercase">QTY: </span>
                                        <input class="input" type="number">
                                    </div>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    <div class="pull-right">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr/>
                        </div>
                    <?php }?>
                </div>
                <!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">sản phẩm cùng loại</h2>
					</div>
				</div>
				<!-- section title -->

                <?php
                    $sql_type = $_model_product->get_same_type($product_type_id);
                    $result_type = $db->executeQuery($db->link, $sql_type);
                    while($row_type = mysqli_fetch_array($result_type))
                    {
                    extract($row_type);
                ?>
				<!-- Product Single -->
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
<!--							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem Nhanh</button>-->
                            <a class="main-btn quick-view btn"
                               href="./product-page.php?id=<?php echo $row_type['id']; ?>"
                               role="button">Xem Nhanh</a>
							<img src="<?php echo $href_public; ?>/upload/<?php echo $row_type['image_url'];?>" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price" style=" color: #F8694A;">$<?php echo $row_type['price'];?></h3>
<!--							<div class="product-rating">-->
<!--								<i class="fa fa-star"></i>-->
<!--								<i class="fa fa-star"></i>-->
<!--								<i class="fa fa-star"></i>-->
<!--								<i class="fa fa-star"></i>-->
<!--								<i class="fa fa-star-o empty"></i>-->
<!--							</div>-->
							<h2 class="product-name text-uppercase href="#"><?php echo $row_type['name'];?></a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào giỏ hàng</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
                <?php } ?>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">cùng nhà sản xuất</h2>
					</div>
				</div>
				<!-- section title -->

                <?php
                $sql_manufacturer = $_model_product->get_same_manufacturer($manufacturer_id);
                $result_manufacturer = $db->executeQuery($db->link, $sql_manufacturer);
                while($row_manufacturer = mysqli_fetch_array($result_manufacturer))
                {
                extract($row_manufacturer);
                ?>
				<!-- Product Single -->
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
<!--							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem Nhanh</button>-->
                            <a class="main-btn quick-view btn"
                               href="./product-page.php?id=<?php echo $row_manufacturer['id']; ?>"
                               role="button">Xem Nhanh</a>
							<img src="<?php echo $href_public; ?>/upload/<?php echo $row_manufacturer['image_url'];?>" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price" style=" color: #F8694A;">$<?php echo $row_manufacturer['price'];?></h3>
<!--							<div class="product-rating">-->
<!--								<i class="fa fa-star"></i>-->
<!--								<i class="fa fa-star"></i>-->
<!--								<i class="fa fa-star"></i>-->
<!--								<i class="fa fa-star"></i>-->
<!--								<i class="fa fa-star-o empty"></i>-->
<!--							</div>-->
							<h2 class="product-name text-uppercase"><a href="#"><?php echo $row_manufacturer['name'];?></a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào giỏ hàng</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
                <?php } ?>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<!-- FOOTER -->
<?php
include("./footer.php");
$db->db_close();
?>
<!-- FOOTER -->
