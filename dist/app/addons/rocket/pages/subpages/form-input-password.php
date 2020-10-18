<?php
app::position('header');
app::asset('/app/addons/rocket/pages/demo.css');
include(clPath . '/app/addons/rocket/pages/menu.php');
?>
<section class="rocket-demo">
    <div class="container">
        <div class="header">
            Password input
        </div>
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Form</a></li>
                <li><a href="#">Input</a></li>
                <li><a href="#">Password</a></li>
            </ul>
        </div>
        <div class="topic">
            Default
        </div>
        <div class="example">
            <code>
            <?php echo htmlentities('<input class="inp" type="text" placeholder="Enter your text">');  ?>
            </code>
        </div>
        <div class="content">
            <form class="form">
                <div class="input">
                    <label class="lbl" for="inputExample1">Input text</label>
                    <div class="input">
                        <input class="inp" type="text" placeholder="Enter your text">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample2">Input email</label>
                    <div class="input">
                        <input class="inp" id="inputExample2" type="email" name="" value="" placeholder="Enter email">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input search</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="search" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input tel</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="tel" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input url</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="url" name="" value="">
                    </div>
                </div>

                <div class="input">
                    <label class="lbl" for="inputExample1">Datalist</label>
                    <div class="input">
                        <input class="inp" type="text" list="browsers" name="browser">
                        <datalist class="inp" id="browsers">
                          <option value="one">
                          <option value="two">
                          <option value="three">
                        </datalist>
                    </div>
                </div>

            </form>
        </div>


    </div>
</section>
