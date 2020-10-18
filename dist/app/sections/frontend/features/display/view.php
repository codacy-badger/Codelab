<?php
$fontawesome = array(
    'fa-tasks',
    'fa-users',
    'fa-project-diagram',
    'fa-book'
);
fontawesome::icons($fontawesome);
?>
<section <?php echo section::create(); ?>>

        <div class="r_c">
            <div class="outer">
                <div class="single">
                    <div class="inner">
                        <div class="icon">
                            <i class="fal fa-tasks"></i>
                        </div>
                        <div class="text">
                            <h2>Projects and tasks</h2>
                            <p>
                                <?php echo clMockup::lorem(17, 17); ?>
                            </p>
                        </div>
                        <div class="button">
                            <a href="#"  class="r_btn">Zobacz więcej</a>
                        </div>
                    </div>
                </div>
                <div class="single">
                    <div class="inner">
                        <div class="icon">
                            <i class="fal fa-users"></i>
                        </div>
                        <div class="text">
                            <h2>Team collaboration</h2>
                            <p>
                                <?php echo clMockup::lorem(17, 17); ?>
                            </p>
                        </div>
                        <div class="button">
                            <a href="#"  class="r_btn">Zobacz więcej</a>
                        </div>
                    </div>
                </div>
                <div class="single">
                    <div class="inner">
                        <div class="icon">
                            <i class="fal fa-project-diagram"></i>
                        </div>
                        <div class="text">
                            <h2>Advanced planning</h2>
                            <p>
                                <?php echo clMockup::lorem(17, 17); ?>
                            </p>
                        </div>
                        <div class="button">
                            <a href="#"  class="r_btn">Zobacz więcej</a>
                        </div>
                    </div>
                </div>
                <div class="single">
                    <div class="inner">
                        <div class="icon">
                            <i class="fal fa-book"></i>
                        </div>
                        <div class="text">
                            <h2>Work documentation</h2>
                            <p>
                                <?php echo clMockup::lorem(17, 17); ?>
                            </p>
                        </div>
                        <div class="button">
                            <a href="#"  class="r_btn">Zobacz więcej</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>
