<?php 

    session_start();
    require_once 'config/connect.php';

    $page_title = 'Menu'; 
    include 'inc/header.php'; 
?>

<?php include 'inc/nav.php'; ?>
	
	<!-- CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
					<h2> 
                        
					<?php 
						$cat_id = $_SERVER['QUERY_STRING']; 
						$sql = "SELECT name FROM category
							WHERE $cat_id"; 

						$result = mysqli_query($connection, $sql); 
						
						while ($foo = mysqli_fetch_assoc($result)) {
							echo $foo['name'];  
						}
					?>	
                        
					</h2> 
					</div>
                    
					<div class="col-md-12">
						<div class="row">
							<div id="shop-mason" class="shop-mason-4col">

							<?php 
								$sql = "SELECT * FROM products";
                                
								if(isset($_GET['id']) & !empty($_GET['id'])) {
                                    
									$id = $_GET['id'];
									$sql .= " WHERE catid=$id";
								}
	
								$res = mysqli_query($connection, $sql);
								
                                while($r = mysqli_fetch_assoc($res)) {
                                    
                                    ?>
                                    <div class="sm-item isotope-item">
                                        <div class="product">
                                            <div class="product-thumb">
                                                <img src="admin/<?php echo $r['thumb']; ?>" class="img-responsive" width="250px" alt="">
                                                <div class="product-overlay">
                                                    <span>
                                                        <a href="single.php?id=<?php echo $r['id']; ?>" class="fa fa-link"></a>
                                                        <a href="addtocart.php?id=<?php echo $r['id']; ?>" class="fa fa-shopping-cart"></a>
                                                    </span>					
                                                </div>
                                            </div>
                                            <h2 class="product-title"><a href="single.php?id=<?php echo $r['id']; ?>"><?php echo $r['name']; ?></a></h2>
                                            <div class="product-price"> $ <?php echo $r['price']; ?><span></span></div>
                                        </div>
                                    </div>
							     <?php } ?>
                                
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- Footer --> 
<?php include 'inc/footer.php' ?>
