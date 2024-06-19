<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="row">
		<div class="col">
			<div class="kt-portlet">
				<div class="kt-portlet__body">
					<div class="kt-section__content kt-section">
						<h3>PNG ICCC - Consumer Resources and Tools</h3>
						<p class="lead">Consumers within Papua New Guinea can use the tools and resources provided here to find out 
						more information about the goods and services that are regulated by the Independent Consumer and Competition Commission (ICCC)
						of Papua New Guinea.</p>				
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--begin::Row-->
	<div class="row">
		<div class="col-lg-12 col-xl-8 order-lg-2 order-xl-1">

			<!--begin::Portlet-->
			<div class="kt-portlet kt-portlet--height-fluid">
				<!-- <div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">Resources & Tools</h3>
					</div>
				</div> -->
				<div class="kt-portlet__body">
					<div class="kt-section">
						<!-- <div class="kt-section__info">
							The PNG ICCC provides the following consumer tools & resources.
						</div> -->
						<div class="kt-section__content kt-section__content--border">
							<div class="card-deck">
								<div class="card">
									<img class="card-img-top" src="<?php base_url() ?>assets/media/misc/goods.png" alt="Goods Categories">
									<div class="card-body">
										<h5 class="card-title">Goods</h5>
										<p class="card-text">Goods being monitored by ICCC.</p>
										<a href="<?php echo base_url() ?>get_all_non_declared"  class="btn btn-primary">Goods Categories</a>
									</div>
									
								</div>
								<div class="card">
									<img class="card-img-top" src="<?php base_url() ?>assets/media/misc/pricewatchlist.png" alt="Price Watchlist">
									<div class="card-body">
										<h5 class="card-title">Price Watchlist</h5>
										<p class="card-text">Price watchlist contains a listing of monitored goods and their prices.</p>
										<a href="<?php echo base_url() ?>PriceWatchlist"  class="btn btn-primary">Price Watchlist Table</a>
									</div>									
								</div>
								<div class="card">
									<img class="card-img-top" src="<?php base_url() ?>assets/media/misc/shoppinghints.png"  alt="Shopping Hints">
									<div class="card-body">
										<h5 class="card-title">Shopping Hints</h5>
										<p class="card-text">Shows the location of where specific monitored goods are sold.</p>
										<a href="<?php echo base_url() ?>ProductLocation"  class="btn btn-primary">Locate Goods</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end::Portlet-->
		</div>
		<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
			<!--begin::Portlet-->
			<div class="kt-portlet kt-portlet--height-fluid-half">
				<div class="kt-portlet__body">
					<div id="kt-widget-slider-13-2" class="kt-slider carousel slide" data-ride="carousel" data-interval="8000">
						<div class="kt-slider__head">
							<div class="kt-slider__label">Latest ICCC News</div>
							<div class="kt-slider__nav">
								<a class="kt-slider__nav-prev carousel-control-prev" href="#kt-widget-slider-13-2" role="button" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="kt-slider__nav-next carousel-control-next" href="#kt-widget-slider-13-2" role="button" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</div>
						<div class="carousel-inner">
							<!-- <?php if (count($latest_news) > 0) { ?>
								<?php foreach ($latest_news as $news_item): ?>																		
										<div class="carousel-item <?php if($news_item->id == htmlspecialchars($latest_news_article->id)) echo 'active'; ?> kt-slider__body">
											<div class="kt-widget-13">
												<div class="kt-widget-13__body">
													<a class="kt-widget-13__title" target="_blank" href="<?php echo $news_item->link ?>"><?php echo $news_item->title ?></a>
													<div class="kt-widget-13__desc">
														<?php echo $news_item->introtext ?>
													</div>
												</div>
												<div class="kt-widget-13__foot">
													<div class="kt-widget-13__label">
														<div class="btn btn-sm btn-label btn-bold">
															<?php echo $news_item->created ?>
														</div>
													</div>
													<div class="kt-widget-13__toolbar">
														<a href="<?php echo $news_item->link ?>" target="_blank" class="btn btn-default btn-sm btn-bold btn-upper">View</a>
													</div>
												</div>
											</div>
										</div>
									
								<?php endforeach ?>						
							<?php } ?> -->
						</div>
						
					</div>
				</div>
			</div>
			<!--end::Portlet-->
			<!--begin::Portlet-->
			<div class="kt-portlet kt-portlet--height-fluid-half">
				<div class="kt-portlet__body">
					<div id="kt-widget-slider-13-1" class="kt-slider carousel slide" data-ride="carousel" data-interval="8000">
						<div class="kt-slider__head">
							<div class="kt-slider__label">Public Announcements</div>
							<div class="kt-slider__nav">
								<a class="kt-slider__nav-prev carousel-control-prev" href="#kt-widget-slider-13-1" role="button" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="kt-slider__nav-next carousel-control-next" href="#kt-widget-slider-13-1" role="button" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</div>
						<div class="carousel-inner">
							<!-- <?php if (count($latest_announcements) > 0) { ?>
									<?php foreach ($latest_announcements as $news_item): ?>																			
											<div class="carousel-item <?php if($news_item->id == htmlspecialchars($latest_pub_announce_article->id)) echo 'active'; ?> kt-slider__body">
												<div class="kt-widget-13">
													<div class="kt-widget-13__body">
														<a class="kt-widget-13__title" target="_blank" href="<?php echo $news_item->link ?>"><?php echo $news_item->title ?></a>
														<div class="kt-widget-13__desc">
															<?php echo $news_item->introtext ?>
														</div>
													</div>
													<div class="kt-widget-13__foot">
														<div class="kt-widget-13__label">
															<div class="btn btn-sm btn-label btn-bold">
																<?php echo $news_item->created ?>
															</div>
														</div>
														<div class="kt-widget-13__toolbar">
															<a href="<?php echo $news_item->link ?>" target="_blank" class="btn btn-default btn-sm btn-bold btn-upper">View</a>
														</div>
													</div>
												</div>
											</div>
										
									<?php endforeach ?>						
								<?php } ?> -->
							</div> 
					</div>
				</div>
			</div>
			<!--end::Portlet-->
		</div>
	</div>
</div>
