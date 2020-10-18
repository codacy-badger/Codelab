<?php
app::position('header');
app::asset('/app/addons/rocket/pages/demo.css');
include(clPath . '/app/addons/rocket/pages/menu.php');
?>
<section class="rocket-demo">
    <div class="r_c">
        <div class="header">
            Content box
        </div>
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Typography</a></li>
                <li><a href="#">Box</a></li>
            </ul>
        </div>
        <div class="example">
            <pre><?php echo htmlentities('<p class="rocketBox">TEXT</p>');  ?></pre>
        </div>
        <div class="content">
            <p class="rocketBox">
                Lorem ipsum dolor sit amet, et erant postea assueverit qui, idque verear te eos, ex eam sumo verear commodo. Ad vel quod tollit deterruisset, nec meis dicta dolorem ne. Eos ea legimus oportere, sea at eius dolorem adversarium. Sit an salutandi concludaturque. Ad eam quis tractatos persequeris, eum ex stet facete denique. Per zril argumentum ne.
            </p>
        </div>
        <div class="example">
            <pre><?php echo htmlentities('<p class="rocketBox  rocketBcg-color rocketColor-white">TEXT</p>');  ?></pre>
        </div>
        <div class="content">
            <p class="rocketBox rocketBcg-color rocketColor-white">
                Lorem ipsum dolor sit amet, et erant postea assueverit qui, idque verear te eos, ex eam sumo verear commodo. Ad vel quod tollit deterruisset, nec meis dicta dolorem ne. Eos ea legimus oportere, sea at eius dolorem adversarium. Sit an salutandi concludaturque. Ad eam quis tractatos persequeris, eum ex stet facete denique. Per zril argumentum ne.
            </p>
        </div>
        <div class="example">
            <pre><?php echo htmlentities('<p class="rocketBox  rocketBcg-color rocketColor-white">TEXT</p>');  ?></pre>
        </div>
        <div class="content">
            <p class="rocketBox rocketBcg-colorDarker rocketColor-white l-rocketBcg-red m-rocketColor-red">
                Lorem ipsum dolor sit amet, et erant postea assueverit qui, idque verear te eos, ex eam sumo verear commodo. Ad vel quod tollit deterruisset, nec meis dicta dolorem ne. Eos ea legimus oportere, sea at eius dolorem adversarium. Sit an salutandi concludaturque. Ad eam quis tractatos persequeris, eum ex stet facete denique. Per zril argumentum ne.
            </p>
        </div>
    </div>
</section>
