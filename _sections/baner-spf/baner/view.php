    <section class="baner cl <?php if (auth::check()): ?>logged<?php endif; ?>">
        <div class="fullPageForm">
            <div class="container parallaxFade">
                <?php if (auth::check()): ?>
                <div class="full">
                    <h1 class="hdr">
                        Hi <?php echo USER['username']; ?>
                    </h1>
                </div>
                <?php else: ?>
                <div class="left">
                    <h3 class="hdr"><?php echo section::config('header', 'inline'); ?></h3>
                    <h6 class="hdr"><?php echo section::config('subheader', 'inline'); ?></h6>
                </div>

                <div class="right">
                    <div class="form">
                        <form action="<?php app::link(); ?>/login" id="loginForm" class="loginForm" method="post">
                            <div class="top">
                                <div class="header">
                                    Sign in
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="input">
                                    <div class="name">
                                        <?php echo section::config('formEmail', 'inline'); ?>
                                    </div>
                                    <input type="text" minlength="4" maxlength="24" name="email" autocomplete="off" required autocorrect="off" autocapitalize="none"/>
                                </div>
                                <div class="input">
                                    <div class="name">
                                        <?php echo section::config('formPassword', 'inline'); ?>
                                    </div>
                                    <input type="password" minlength="6"  name="password"  autocomplete="off" required autocorrect="off" autocapitalize="none"/>
                                </div>
                                <div class="button">
                                    <button class="btnEffect" name="signin">Login</button>
                                </div>
                                <div class="pass">
                                    <a href="/recovery">Password recovery</a> | <a href="/recovery">Support center</a>
                                </div>
                            </div>
                        </form>
                        <form action="<?php app::link(); ?>/join" id="joinForm" class="joinForm" method="post">
                            <div class="top">
                                <div class="header">
                                    <?php echo section::config('formHeader', 'inline'); ?>
                                </div>
                                <div class="subheader">
                                    <?php echo section::config('formSubheader', 'inline'); ?>
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="input">
                                    <div class="name">
                                        <?php echo section::config('formUsername', 'inline'); ?>
                                    </div>
                                    <input type="text" minlength="4" maxlength="24" name="username" autocomplete="off" required autocorrect="off" autocapitalize="none" />
                                </div>
                                <div class="input">
                                    <div class="name">
                                        <?php echo section::config('formEmail', 'inline'); ?>
                                    </div>
                                    <input type="email" name="email"  class="" autocomplete="off" required autocorrect="off" autocapitalize="none"/>
                                </div>
                                <div class="input">
                                    <div class="name">
                                        <?php echo section::config('formPhone', 'inline'); ?>
                                    </div>
                                    <input minlength="7" minlength="12" type="number" name="phone" id="joinPhone"  class="phoneInput" autocomplete="off" required/>
                                    <input type="hidden" name="phoneDialcode" id="joinPhoneDialcode"  autocomplete="off" autocorrect="off" autocapitalize="none"/>
                                </div>
                                <div class="terms">
                                    <label>
                                        <input  type="checkbox" name="regulations" required/> <?php echo section::config('formRegulations', 'inline'); ?>
                                    </label>
                                    <ul>
                                        <li><a href="/terms-of-services">Terms of Service </a></li>
                                        <li><a href="/data-policy">Data Policy</a></li>
                                        <li><a href="/community-regulations">Community Regulations</a></li>
                                    </ul>
                                </div>
                                <div class="button">
                                    <button class="" name="signup">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
            </div>
          </div>

          <!--// CUT -->
          <div class="paralax">
              <div class="outer">
                  <div class="layerParalax layer1" ><img src="<?php echo $clSection['url']; ?>/layer1.png" alt="Baner layer 1" /></div>
                  <div class="layerParalax layer2" ><img src="<?php echo $clSection['url']; ?>/layer2.png" alt="Baner layer 2" /></div>
                  <div class="layerParalax layer3" ><img src="<?php echo $clSection['url']; ?>/layer3.png" alt="Baner layer 3" /></div>
                  <div class="layerParalax layer4" ><img src="<?php echo $clSection['url']; ?>/layer4.png" alt="Baner layer 4" /></div>
              </div>
        </div>
          <div class="wave">
              <svg viewBox="0 0 1920 310" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg replaced-svg">
                  <!-- Generator: Sketch 51.1 (57501) - http://www.bohemiancoding.com/sketch -->
                  <title>Wave Baner</title>
                  <desc>Psyll wave</desc>
                  <defs></defs>
                  <g id="Landing-Pages" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g id="03_vApp-v3-Copy" transform="translate(0.000000, -554.000000)" fill="#f5f5f5">
                          <path d="M-3,551 C186.257589,757.321118 319.044414,856.322454 395.360475,848.004007 C509.834566,835.526337 561.525143,796.329212 637.731734,765.961549 C713.938325,735.593886 816.980646,681.910577 1035.72208,733.065469 C1254.46351,784.220361 1511.54925,678.92359 1539.40808,662.398665 C1567.2669,645.87374 1660.9143,591.478574 1773.19378,597.641868 C1848.04677,601.75073 1901.75645,588.357675 1934.32284,557.462704 L1934.32284,863.183395 L-3,863.183395" id="Path-7"></path>
                      </g>
                  </g>
            </svg>
        </div>
    </section>
