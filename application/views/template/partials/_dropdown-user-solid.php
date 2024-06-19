<div class="kt-user-card kt-margin-b-40 kt-margin-b-30-tablet-and-mobile" style="background-image: url(<?php echo base_url('assets/media/misc/head_bg_sm.jpg') ?>)">
    <div class="kt-user-card__wrapper">
        <div class="kt-user-card__pic">
            <img alt="Pic" src="<?php echo base_url('assets/media/users/'. ($this->common->user_profile->image ? $this->common->user_profile->image:'default.jpg')); ?>" />
        </div>
        <div class="kt-user-card__details">
            <div class="kt-user-card__name"><?php echo $this->common->user_profile ? $this->common->user_profile->full_name:'No name'; ?></div>
            <div class="kt-user-card__position">
            <?php echo ($this->common->user_profile->position_title ? $this->common->user_profile->position_title:'No position').'<br/>'.($this->common->user_profile->company ? $this->common->user_profile->company : 'No company'); ?>
            </div>
        </div>
    </div>
</div>
<ul class="kt-nav kt-margin-b-10">
    <li class="kt-nav__item">
        <a href="<?php echo base_url('./../edit-user-profile/profile'); ?>" class="kt-nav__link" target="_blank">
            <span class="kt-nav__link-icon"><i class="flaticon2-calendar-3"></i></span>
            <span class="kt-nav__link-text">My Profile</span> 
        </a>
    </li>
    <!-- <li class="kt-nav__item">
        <a href="?page=custom/user/profile-v1" class="kt-nav__link">
            <span class="kt-nav__link-icon"><i class="flaticon2-browser-2"></i></span>
            <span class="kt-nav__link-text">My Tasks</span> 
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="?page=custom/user/profile-v1" class="kt-nav__link">
            <span class="kt-nav__link-icon"><i class="flaticon2-mail"></i></span>
            <span class="kt-nav__link-text">Messages</span> 
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="?page=custom/user/profile-v1" class="kt-nav__link">
            <span class="kt-nav__link-icon"><i class="flaticon2-gear"></i></span>
            <span class="kt-nav__link-text">Settings</span> 
        </a>
    </li> -->
    <li class="kt-nav__item kt-nav__item--custom kt-margin-t-15"> <a href="<?php echo base_url('./../index.php?option=com_users&task=user.logout&' .  $this->common->juser_token . '=1'); ?>" class="btn btn-label-brand btn-upper btn-sm btn-bold">Sign Out</a> </li>
</ul>