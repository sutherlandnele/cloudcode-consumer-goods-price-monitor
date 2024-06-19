<!-- begin:: Aside Menu -->

<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500" >
        <ul class="kt-menu__nav">
            <li class="kt-menu__item kt-menu__item--open kt-menu__item--here <?php if(isset($_GET['page']))  { echo 'kt-menu__item--active'; } ?>" aria-haspopup="true">
                <a href="<?php echo base_url() ?>" class="kt-menu__link"><i class="kt-menu__link-icon fa fa-home"></i><span class="kt-menu__link-text">Home</span></a>
            </li>
            <li class="kt-menu__section">
                <h4 class="kt-menu__section-text">
                    Monitored Goods
                </h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i> 
            </li>
            <li class="kt-menu__item" aria-haspopup="true" >
                <a href="<?php echo base_url() ?>get_all_declared" class="kt-menu__link"><i class="kt-menu__link-icon fas fa-gifts"></i><span class="kt-menu__link-text">Declared Goods</span></a>
            </li>

            <li class="kt-menu__item" aria-haspopup="true" >
                <a href="<?php echo base_url() ?>get_all_non_declared" class="kt-menu__link"><i class="kt-menu__link-icon fas fa-gifts"></i><span class="kt-menu__link-text">Non-Declared Goods</span></a>
            </li>
  
            <li class="kt-menu__section">
                <h4 class="kt-menu__section-text">
                    Price Watchlist
                </h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i> 
            </li>
            <li class="kt-menu__item"  aria-haspopup="true" >
                <a href="<?php echo base_url() ?>PriceWatchlist" class="kt-menu__link"><i class="kt-menu__link-icon fas fa-binoculars"></i><span class="kt-menu__link-text">Price Watchlist Table</span></a>
            </li>
            <li class="kt-menu__section">
                <h4 class="kt-menu__section-text">
                    Shopping Hints
                </h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i> 
            </li>
            <li class="kt-menu__item" aria-haspopup="true" >
                <a href="<?php echo base_url() ?>ProductLocation" class="kt-menu__link"><i class="kt-menu__link-icon fas fa-search-location"></i><span class="kt-menu__link-text">Locate Sold Good</span></a>
            </li>
            <?php if(isset($this->common->user_profile) && $this->common->user_profile)  { ?>
            <li class="kt-menu__section">
                <h4 class="kt-menu__section-text">
                    ICCC Information Management
                </h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i> 
            </li>
            <li class="kt-menu__item" aria-haspopup="true" >
                <a href="<?php echo base_url() ?>Product" class="kt-menu__link"><i class="kt-menu__link-icon fas fa-shopping-basket"></i><span class="kt-menu__link-text">Goods</span></a>
            </li>
            <li class="kt-menu__item" aria-haspopup="true" >
                <a href="<?php echo base_url() ?>Shop" class="kt-menu__link"><i class="kt-menu__link-icon fas fa-shopping-cart"></i><span class="kt-menu__link-text">Shops</span></a>
            </li> 
            <li class="kt-menu__item" aria-haspopup="true" >
                <a href="<?php echo base_url() ?>ShopProduct" class="kt-menu__link"><i class="kt-menu__link-icon fas fa-box-open"></i><span class="kt-menu__link-text">Shop Goods</span></a>
            </li> 
            <?php } ?>
            <li class="kt-menu__section">
                <h4 class="kt-menu__section-text">
                    &nbsp;
                </h4>              
            </li>
        </ul>        
    </div>
</div>
<!-- end:: Aside Menu -->