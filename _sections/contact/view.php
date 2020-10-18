<?php
$formErrors = array();
$formSuccess = false;

/*
    include("external/captcha/simple-php-captcha.php");


    GLOBAL $formErrors;
    GLOBAL $formSuccess;


    if (isset($_POST['send'])):
        if (!isset($_POST['name']) OR $_POST['name'] == ''):
            array_push($formErrors, 'Name is required');
        elseif (strlen($_POST['name']) < 2):
            array_push($formErrors, 'the name is too short');
        endif;
        if (!isset($_POST['message']) OR $_POST['message'] == ''):
            array_push($formErrors, 'Message is required');
        elseif (strlen($_POST['message']) < 20):
            array_push($formErrors, 'The message is too short');
            echo $_SESSION['captcha']['code'] . ' != '. $_POST['captcha'];
            array_push($formErrors, 'Incorrect security code');
        endif;




        if (empty($formErrors)):

            $message = 'Name: ' . @$_POST['name'] . '<br />';
            $message .= 'E-mail: ' . @$_POST['email'] . '<br />';
            $message .= 'Phone: ' . @$_POST['phone'] . '<br />';
            $message .= 'Message: ' . @$_POST['message'] . '<br />';
            if (email::send(content::get(158,407), 'SFPTool.com - Contact form - ' . $_POST['name'], $message))
            $formSuccess = true;
        endif;
    endif;

    $_SESSION['captcha'] = simple_php_captcha();

*/

?>

<section id="clSection_<?php echo $clSection['id']; ?>" class="contact">

    <?php if (!empty($formErrors)): ?>
    <div class="errors">
        <div class="title">
            oops there was a problem
        </div>
        <div class="list">
            <?php
            foreach ($formErrors as $key => $value):
                ?>
                <div class="item">
                    <?php echo $value; ?>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($formSuccess == true): ?>
    <div class="success">
        <div class="title">
            Your message has been sent
        </div>
    </div>
    <?php endif; ?>


    <div class="contener">
         <div class="form">
             <form action="" method="post">
                 <div class="column">


                     <div class="input">
                         <label for="">Name *</label>
                         <input type="text" name="name" value="<?php if ($formSuccess == false): echo @$_POST['name']; endif; ?>" required>
                     </div>
                     <div class="input">
                         <label for="">E-mail</label>
                         <input type="email" name="email" value="<?php if ($formSuccess == false): echo @$_POST['email']; endif; ?>">
                     </div>
                     <div class="input">
                         <label for="">Phone</label>
                         <input type="text" name="phone" value="<?php if ($formSuccess == false): echo @$_POST['phone']; endif; ?>">
                     </div>
                     <div class="input">
                         <label for="">Organization/Agency</label>
                         <input type="text" name="organization" value="<?php if ($formSuccess == false): echo @$_POST['organization']; endif; ?>">
                     </div>
                     <!--
                     <div class="input">
                         <label for="">Security code *</label>
                         <div class="image">
                             <img src="<?php // echo $_SESSION['captcha']['image_src']; ?>" alt="Captcha">
                         </div>
                         <input type="text" name="captcha" placeholder="Enter the code above">
                     </div>
                 -->
                 </div>
                 <div class="column">
                     <div class="input">
                         <label for="">Message *</label>
                         <textarea name="message" required><?php if ($formSuccess == false): echo @$_POST['message']; endif; ?></textarea>
                     </div>
                     <div class="button">
                         <button type="submit" name="send">Send a message</button>
                     </div>
                 </div>
             </form>
         </div>
    </div>

</section>
