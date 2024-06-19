<!-- begin:: Topbar -->
<div class="kt-header__topbar">
    <!--begin: Search -->
    <div class="kt-header__topbar-item kt-header__topbar-item--search">
        <div class="kt-header__topbar-wrapper">
            <?php include('_dropdown-search-inline.php'); ?>
        </div>
    </div>
    <!--end: Search -->
    <!--begin: Search -->
    <div class="kt-header__topbar-item kt-header__topbar-item--search kt-hidden">
        <div class="kt-input-icon kt-input-icon--right">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                <span><i class="la la-search"></i></span>
            </span>
        </div>
    </div>
    <!--end: Search -->
    <!--begin: Quick Actions -->
    <!-- <div class="kt-header__topbar-item dropdown">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px">
            <span class="kt-header__topbar-icon"><i class="fa fa-cog"></i></span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
            <?php //include('_dropdown-quick-actions-solid.php'); ?>
        </div>
    </div> -->
    <!--end: Quick Actions -->
    <!--begin: Quick Panel Toggler -->
    <!-- <div class="kt-header__topbar-item" data-toggle="kt-tooltip" title="Quick panel" data-placement="right">
        <div class="kt-header__topbar-wrapper">
            <span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="fa fa-copy"></i></span>
        </div>
    </div> -->
    <!--end: Quick Panel Toggler -->
    <!--begin: Languages -->
    <!-- <div class="kt-header__topbar-item kt-header__topbar-item--langs">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <img class="" src="<?php //echo base_url('assets/media/flags/020-flag.svg') ?>" alt="" />
            </span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
            <?php //include('_dropdown-languages.php'); ?>
        </div>
    </div> -->
    <!--end: Languages -->
    <!--begin: Notifications -->
    <!-- <div class="kt-header__topbar-item dropdown">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px">
            <span class="kt-header__topbar-icon kt-bg-brand"><i class="fa fa-bell kt-font-light"></i></span>
            <span class="kt-badge kt-badge--danger kt-badge--notify">3</span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
            <?php //include('_dropdown-notifications-solid.php'); ?>
        </div>
    </div> -->
    <!--end: Notifications -->
    <!--begin: User -->
    <?php if(isset($this->common->user_profile) && $this->common->user_profile)  { ?>
    <div class="kt-header__topbar-item kt-header__topbar-item--user">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <img alt="Pic" src="<?php echo base_url('assets/media/users/'. ($this->common->user_profile->image ? $this->common->user_profile->image:'default.jpg')); ?>"/>
            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-md">
            <?php include('_dropdown-user-solid.php'); ?>
        </div>
    </div>
    <?php } else { ?>

    <div class="kt-header__topbar-item kt-header__topbar-item--user">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <button type="button" data-toggle="tooltip" data-placement="top" data-original-title="Click to login" id="btn_login" class="btn btn-outline-brand btn-icon btn-circle"><i class="fa fa-user"></i></button>
        </div>
    </div>
    <?php } ?>
    <!--end: User -->
</div>
<!-- end:: Topbar -->