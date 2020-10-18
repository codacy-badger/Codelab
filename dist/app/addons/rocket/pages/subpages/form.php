<?php
app::position('header');
app::asset('/app/addons/rocket/pages/demo.css');
include(clPath . '/app/addons/rocket/pages/menu.php');
?>
<section class="rocket-demo">
    <div class="container">
        <div class="header">
            Forms and inputs
        </div>
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Form</a></li>
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
                    <label class="lbl" for="inputExample1">Input time</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="time" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input url</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="url" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input password</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="password" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input color</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="color" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input file</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="file" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input month</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="month" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input number</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="number" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Input date</label>
                    <div class="input">
                        <input class="inp" id="inputExample1" type="date" name="" value="">
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Textarea</label>
                    <div class="input">
                        <textarea class="inp" placeholder="Enter your text"></textarea>
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Select</label>
                    <div class="input">
                        <select id="cars" name="cars" class="inp">
                          <option value="volvo">Volvo</option>
                          <option value="saab">Saab</option>
                          <option value="fiat">Fiat</option>
                          <option value="audi">Audi</option>
                        </select>
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Select groups</label>
                    <div class="input">
                        <select  name="cars" id="cars" class="inp">
                          <optgroup label="Swedish Cars">
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                          </optgroup>
                          <optgroup label="German Cars">
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                          </optgroup>
                        </select>
                    </div>
                </div>
                <div class="input">
                    <label class="lbl" for="inputExample1">Select Multiple</label>
                    <div class="input">
                        <select id="cars" name="cars" class="inp"  size="4" multiple>
                          <option value="volvo">Volvo</option>
                          <option value="saab">Saab</option>
                          <option value="fiat">Fiat</option>
                          <option value="audi">Audi</option>
                        </select>
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


                <div class="input">
                    <label class="lbl" for="inputExample1">Input checkbox</label>
                    <div class="inp inp-check">
                        <div class="inp-check-item">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> I have a bike</label>
                        </div>
                       <div class="inp-check-item">
                           <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                           <label for="vehicle2"> I have a car</label>
                       </div>
                       <div class="inp-check-item">
                           <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                           <label for="vehicle3"> I have a boat</label>
                       </div>
                    </div>
                </div>

                <div class="input">
                    <label class="lbl" for="inputExample1">Input checkbox</label>
                    <div class="inp inp-check inp-inline">
                       <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                       <label for="vehicle1"> I have a bike</label>
                       <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                       <label for="vehicle2"> I have a car</label>
                       <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                       <label for="vehicle3"> I have a boat</label>
                    </div>
                </div>


                <div class="input">
                    <label class="lbl" for="inputExample1">Progress</label>
                    <progress id="file" value="32" max="100" class="inp"> 32% </progress>
                </div>





            </form>
        </div>


    </div>
</section>
