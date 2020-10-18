<?php
app::position('header');
app::asset('/app/addons/rocket/pages/demo.css');
include(clPath . '/app/addons/rocket/pages/menu.php');
?>
<section class="rocket-demo">
    <div class="r_c">
        <div class="header">
            Class .slim and .fat headers
        </div>
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Typography</a></li>
                <li><a href="#">Header</a></li>
                <li><a href="#">.slim / .fat</a></li>
            </ul>
        </div>
        <div class="topic">
            Class .fat headers
        </div>
        <div class="example">
            <pre><?php echo htmlentities('<h1 class="slim">TEXT</h1> or <div class="h1 slim">TEXT</div>');  ?></pre>
        </div>

        <div class="content">
            <h1 class="slim">This is h1.slim header example</h1>
            <div class="h2 slim">This is div.h2.slim header example</div>
            <h3 class="slim">This is h3.slim header example</h3>
            <div class="h4 slim">This is div.h4.slim header example</div>
            <h5 class="slim">This is h5.slim header example</h5>
            <h6 class="slim">This is h6.slim header example</h6>
        </div>
        <div class="topic">
            Class .fat headers
        </div>
        <div class="example">
            <code>
            <?php echo htmlentities('<h1 class="fat">TEXT</h1> or <div class="h1 fat">TEXT</div>');  ?>
            </code>
        </div>
        <div class="content">
            <h1 class="fat">This is h1.fat header example</h1>
            <div class="h2 fat">This is div.h2.fat header example</div>
            <h3 class="fat">This is h3.fat header example</h3>
            <div class="h4 fat">This is div.h4.fat header example</div>
            <h5 class="fat">This is h5.fat header example</h5>
            <h6 class="fat">This is h6.fat header example</h6>
        </div>
    </div>
</section>
