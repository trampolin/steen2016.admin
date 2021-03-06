<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.12.15
 * Time: 22:37
 */
?>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <div class="error-box no-padding">

            <?= form_open( base_url().'user/login', array( 'class' => 'smart-form client-form', 'novalidate' => 'novalidate') ); ?>

            <!--form action="<?= base_url() ?>index.php/login?redirect=<?= base_url() ?>" method="post" id="login-form" class="smart-form client-form" novalidate="novalidate" accept-charset="utf-8"-->
                <header>
                    Sign In
                </header>

                <fieldset>

                    <section>
                        <label class="label">E-mail</label>
                        <label class="input"> <i class="icon-append fa fa-user"></i>
                            <input type="text" name="username">
                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
                    </section>

                    <section>
                        <label class="label">Password</label>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input type="password" name="password">
                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                        <div class="note">
                            <a href="forgotpassword.html">Forgot password?</a>
                        </div>
                    </section>

                </fieldset>
                <footer>
                    <button type="submit" class="btn btn-primary" value="Login">
                        Sign in
                    </button>
                </footer>
            </form>

            <?php if(isset($error)) { ?>
            <div class="alert alert-danger">
                Message: <?= $error ?>
            </div>
            <?php } ?>

        </div>

        <h5 class="text-center"> - Or sign in using -</h5>

        <ul class="list-inline text-center">
            <li>
                <a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
                <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
            </li>
        </ul>

    </div>

</div>

