<?php
app::position('header');
app::asset('/app/addons/rocket/pages/demo.css');
include(clPath . '/app/addons/rocket/pages/menu.php');
?>
<section class="rocket-demo">
    <div class="r_c">
        <div class="header">
            Class .hdr headers
        </div>
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Typography</a></li>
                <li><a href="#">Header</a></li>
                <li><a href="#">.hdr</a></li>
            </ul>
        </div>
        <div class="example">
            <pre><?php echo htmlentities('<h1 class="hdr">TEXT</h1> or <div class="h1 hdr">TEXT</div>');  ?></pre>
        </div>
        <div class="content">
            <h1 class="hdr">This is h1.hdr header example</h1>
            <div class="h2 hdr">This is div.h2.hdr header example</div>
            <h3 class="hdr">This is h3.hdr header example</h3>
            <div class="h4 hdr">This is div.h4.hdr header example</div>
            <h5 class="hdr">This is h5.hdr header example</h5>
            <h6 class="hdr">This is h6.hdr header example</h6>
        </div>
        <div class="content">
            <h1 class="hdr">This is h1.hdr header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire.</h1>
            <div class="h2 hdr">This is div.h2.hdr header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire.</div>
            <h3 class="hdr">This is h3.hdr header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire.</h3>
            <div class="h4 hdr">This is div.h4.hdr header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire.</div>
            <h5 class="hdr">This is h5.hdr header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire.</h5>
            <h6 class="hdr">This is h6.hdr header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire.</h6>
        </div>
    </div>
</section>
