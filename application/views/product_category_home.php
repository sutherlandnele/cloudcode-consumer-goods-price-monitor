<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Browse through the list of <?php echo strtolower($current_breadcrumb_title) ?> below.</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__content   kt-section__content--border">
                            <div class="kt-grid-nav-v2">
                                <?php if (count($product_category) > 0) { ?>
                                    <?php foreach ($product_category as $pc_item): ?>
                                        <a href="<?php echo base_url().'search_category/'. $pc_item->name ?>" class="kt-grid-nav-v2__item">
                                            <div class="kt-grid-nav-v2__item-icon">
                                                <div class="kt-avatar kt-avatar--circle kt-avatar--outline" id="kt_profile_avatar_2">
                                                    <div class="kt-avatar__holder" style="background-image: url(<?php echo base_url().'uploads/product_categories/'.$pc_item->image; ?>)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-grid-nav-v2__item-title"><?php echo $pc_item->name ?></div>
                                        </a>
                                    <?php endforeach ?>
                                <?php } else { ?>
                                    <h5 class="text-danger">Nothing to View.</h5>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                </div>
            </div>
        </div>  
    </div>
</div>
