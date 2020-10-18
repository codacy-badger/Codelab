<section id="clSection_<?php echo $clSection['id']; ?>" class="clSection text-caption <?php echo @$clSection['meta']['class']; ?>">
    <div class="container">
        <div class="line"><div class="inner"></div></div>
        <h1><?php echo $clSection['meta']['header']; ?></h1>
        <?php if (@$clSection['meta']['subheader'] != ''): ?>
        <h4><?php echo $clSection['meta']['subheader']; ?></h4>
        <?php endif; ?>
    </div>
</section>
