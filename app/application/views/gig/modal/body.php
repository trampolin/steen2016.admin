<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 11.12.15
 * Time: 14:51
 */
?>

<div class="row">
    <div class="col-xs-12">

        <form id="create-or-update-gig-form" class="smart-form" novalidate="novalidate">

            <fieldset>
                <div class="row">
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                            <input type="text" name="fname" placeholder="First name">
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                            <input type="text" name="lname" placeholder="Last name">
                        </label>
                    </section>
                </div>

                <div class="row">
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                            <input type="email" name="email" placeholder="E-mail">
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="input state-success"> <i class="icon-prepend fa fa-phone"></i>
                            <input type="tel" name="phone" placeholder="Phone" data-mask="(999) 999-9999" class="valid">
                        </label>
                    </section>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <section class="col col-5">
                        <label class="select">
                            <select name="venue_id">
                                <option value="" selected="" disabled="">Country</option>
                                <option value="244">Aaland Islands</option>
                                <option value="1">Afghanistan</option>
                                <option value="2">Albania</option>
                                <option value="3">Algeria</option>
                                <option value="4">American Samoa</option>
                                <option value="230">Viet Nam</option>
                                <option value="231">Virgin Islands (British)</option>
                                <option value="232">Virgin Islands (U.S.)</option>
                                <option value="233">Wallis and Futuna Islands</option>
                                <option value="234">Western Sahara</option>
                                <option value="235">Yemen</option>
                                <option value="238">Zambia</option>
                                <option value="239">Zimbabwe</option>
                            </select> <i></i> </label>
                    </section>

                    <section class="col col-4">
                        <label class="input">
                            <input type="text" name="city" placeholder="City">
                        </label>
                    </section>

                    <section class="col col-3">
                        <label class="input">
                            <input type="text" name="code" placeholder="Post code">
                        </label>
                    </section>
                </div>

                <section>
                    <label for="address2" class="input">
                        <input type="text" name="address2" id="address2" placeholder="Address">
                    </label>
                </section>

                <section>
                    <label class="textarea">
                        <textarea rows="3" name="info" placeholder="Additional info"></textarea>
                    </label>
                </section>
            </fieldset>

            <fieldset>
                <section>
                    <div class="inline-group">
                        <label class="radio">
                            <input type="radio" name="radio-inline" checked="">
                            <i></i>Visa</label>
                        <label class="radio">
                            <input type="radio" name="radio-inline">
                            <i></i>MasterCard</label>
                        <label class="radio">
                            <input type="radio" name="radio-inline">
                            <i></i>American Express</label>
                    </div>
                </section>

                <section>
                    <label class="input">
                        <input type="text" name="name" placeholder="Name on card">
                    </label>
                </section>

                <div class="row">
                    <section class="col col-10">
                        <label class="input">
                            <input type="text" name="card" placeholder="Card number" data-mask="9999-9999-9999-9999">
                        </label>
                    </section>
                    <section class="col col-2">
                        <label class="input">
                            <input type="text" name="cvv" placeholder="CVV2" data-mask="999">
                        </label>
                    </section>
                </div>

                <div class="row">
                    <label class="label col col-4">Expiration date</label>
                    <section class="col col-5">
                        <label class="select">
                            <select name="month">
                                <option value="0" selected="" disabled="">Month</option>
                                <option value="1">January</option>
                                <option value="1">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select> <i></i> </label>
                    </section>
                    <section class="col col-3">
                        <label class="input">
                            <input type="text" name="year" placeholder="Year" data-mask="2099">
                        </label>
                    </section>
                </div>
            </fieldset>

            <footer>
                <button type="submit" class="btn btn-primary">
                    Anlegen
                </button>
            </footer>
        </form>

        <script type="text/javascript">
            Steen.request.page.events.addEvent(function() {
                $('#create-or-update-gig-form').ajaxForm({
                    url: '/modal/gig/submit/',
                    type: 'post'
                });
            });
        </script>


    </div>
</div>