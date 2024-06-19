<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            <?php echo isset($current_breadcrumb_title) && $current_breadcrumb_title != 'Home'?$current_breadcrumb_title:"Consumer Resources & Tools"?>
        </h3>
        <?php if(isset($current_breadcrumb_title) && $current_breadcrumb_title != 'Home') { ?>
            <span class="kt-subheader__separator kt-hidden"></span> 
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span> <a href="<?php echo base_url() ?>" class="kt-subheader__breadcrumbs-link"> <?php echo isset($l1_breadcrumb_title)?$l1_breadcrumb_title:"Home"?> </a> 
                <span class="kt-subheader__breadcrumbs-separator"></span> <a href="" class="kt-subheader__breadcrumbs-link"> <?php echo isset($l2_breadcrumb_title)?$l2_breadcrumb_title:"PNG ICCC"?> </a>
                <?php if(isset($l3_breadcrumb_title) && $l3_breadcrumb_title != '') { ?> 
                    <span class="kt-subheader__breadcrumbs-separator"></span> <a href="<?php echo $l3_breadcrumb_url ?>" class="kt-subheader__breadcrumbs-link"> <?php echo $l3_breadcrumb_title ?> </a> 
                <?php } ?>
                <!-- <span class="kt-subheader__breadcrumbs-separator"></span>
                <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
                    <?php //echo isset($current_breadcrumb_title)?$current_breadcrumb_title:"Consumer Resources & Tools"?>
                </span> -->
            </div>
        <?php } ?>
    </div>
</div>