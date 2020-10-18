<?php
app::position('header');
app::asset('/app/addons/rocket/pages/demo.css');
include(clPath . '/app/addons/rocket/pages/menu.php');
?>
<section class="rocket-demo">
    <div class="container">
        <div class="header">
            Button
        </div>
        <div class="example">
            <code>
            <?php echo htmlentities('<h1>TEXT</h1> or <div class="h1">TEXT</div>');  ?>
            </code>
        </div>
        <div class="content">
            <h1>This is h1 header example</h1>
            <div class="h4">This is div.h2 header example</div>
            <h3>This is h3 header example</h3>
            <div class="h4">This is div.h4 header example</div>
            <h5>This is h5 header example</h5>
            <h6>This is h6 header example</h6>
        </div>
        <div class="content">
            <h1>This is h1 header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire. Ne soluta expetendis ius, lobortis deseruisse definiebas eu eos, an melius albucius vis.</h1>
            <div class="h4">This is div.h2 header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire. Ne soluta expetendis ius, lobortis deseruisse definiebas eu eos, an melius albucius vis.</div>
            <h3>This is h3 header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire. Ne soluta expetendis ius, lobortis deseruisse definiebas eu eos, an melius albucius vis.</h3>
            <div class="h4">This is div.h4 header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire. Ne soluta expetendis ius, lobortis deseruisse definiebas eu eos, an melius albucius vis.</div>
            <h5>This is h5 header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire. Ne soluta expetendis ius, lobortis deseruisse definiebas eu eos, an melius albucius vis.</h5>
            <h6>This is h6 header example. Lorem ipsum dolor sit amet, eu veri lorem albucius eos. Qui dolor invenire. Ne soluta expetendis ius, lobortis deseruisse definiebas eu eos, an melius albucius vis.</h6>
        </div>

    </div>
</section>
