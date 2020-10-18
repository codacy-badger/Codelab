<div id="clSessionTimer" class="clSessionTimer">
    <div class="inner">

        <div class="icon">
            <i class="fas fa-info"></i>
        </div>
        <div class="text">
            <?php echo  lang::text('Your user session is about to expire', 'uf'); ?>
        </div>
        <div class="value">
            <span id="clSessionTimerValue" class="clSessionTimerValue"><?php echo registry::get('auth.timeout', 300); ?></span>
        </div>
    </div>


</div>
