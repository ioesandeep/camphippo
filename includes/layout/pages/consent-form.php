<?php
//this variable is used to skip the step for fetching camp details.
//useful for subscriptions; since subscription is independent of camp details.
$skip_camp = false;
if (isset($_GET['reg-id'])) {
    $user = table_fetch_row('camp_registration', sprintf('id="%d"', $_REQUEST['reg-id']));
} elseif (isset($_GET['sub-id'])) {
    $skip_camp = true;
    $user = table_fetch_row('camp_subscriptions', sprintf('id="%d"', $_REQUEST['sub-id']));
} else {
    header('Location:/');
    return;
}
if (false == $user) {
    header('Location:/');
    return;
}
$camp = table_fetch_row('camps', sprintf('id="%d"', $user['camp']));
if ((false == $camp || $camp['type'] == 1) && !$skip_camp) {
    header('Location:/');
    return;
}
if (isset($_POST['consent'])) {
    try {
        /**
         * TODO: Data validation
         */

        //save medication information
        if (!table_insert('child_medication', array_keys($_POST['medical']), $_POST['medical'])) {
            throw new Exception(Lang::save_error());
        }
        $_POST['medication_id'] = db_insert_id();

        //save contact details
        if (!table_insert('consent_contact_details', array_keys($_POST['contact']), $_POST['contact'])) {
            throw new Exception(Lang::save_error());
        }
        $_POST['contact_id'] = db_insert_id();

        $fields = array('user_id', 'medication_id', 'contact_id', 'signed_date', 'signature', 'can_swim');
        //finally save the consent form
        if (!table_insert('consent_data', $fields, $_POST)) {
            throw new Exception(Lang::save_error());
        }
        ob_start();
        ?>
        <table>
            <caption>1. Parental Consent:</caption>
            <tr></tr>
        </table>
        <?php
        $out = ob_get_contents();
        ob_end_clean();
        $to = 'tom@wdymail.co.uk';
        //send_html_email($to, 'Tom Beachell', Site::email(), Site::application(), Lang::new_registration(), $email);
        //redirect to payment page
        if (isset($_GET['sub-id'])) {
            header('Location:/subscription-payment.html?sub-id=' . $_POST['user_id']);
        } else {
            header('Location:/payment.html?reg-id=' . $_POST['user_id']);
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>
<div class="row">
    <div id="default-content-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <form action="" class="contactForm" method="post">
                <input type="hidden" name="consent_type"
                       value="<?php echo isset($_GET['reg-id']) ? 'registration' : 'subscription'; ?>"/>
                <input type="hidden" name="user_id" value="<?php _e(intval($user['id'])); ?>">
                <div id="form-container">
                    <?php
                    if (isset($message)) {
                        _t('h2', $message);
                    } ?>
                    <fieldset>
                        <legend><h3>1. Parental Consent:</h3></legend>
                        <p>I give permission for my son/daughter/ward to participate in the Camp
                            Hippo
                            <?php
                            if (!$skip_camp){
                            echo $camp['title'];
                            ?>:
                        <p><?php _e(date('dS F', strtotime($camp['start_date']))); ?>
                            to <?php _e(date('dS F Y', strtotime($camp['start_date']))); ?></p>
                        <?php } ?>
                        <p>He/she is physically able to carry out the activities mentioned in the programme.</p>
                    </fieldset>
                    <fieldset>
                        <legend><h3>2. Medical Section:</h3></legend>
                        <p><b>Does your son/daughter/ward suffer from any of the following: </b></p>
                        <ul class="list list-alphabet">
                            <li>
                                <span class="text-left">Skin diseases</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[skin_diseases]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <span class="text-left">Chest Troubles</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[chest_troubles]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <span class="text-left">Blackouts</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[blackouts]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <span class="text-left">Rheumatic Fever and any other heart condition</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[rheumatic_fever]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <span class="text-left">Kidney Trouble</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[kidney_troubles]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <span class="text-left">Severe Sprain or Fractures</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[sprain_fractures]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <span class="text-left">Any Respiratory Complaints (including Asthma)</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[asthma]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <span class="text-left">Diabetes</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[diabetes]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <span class="text-left">Allergies</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[allergies]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <span class="text-left">Epilepsy</span>
                            <span class="pull-right">
                                <input type="checkbox" name="medical[epilepsy]" value="1"/>
                            </span>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                        <p><b>Should you wish to describe in more detail anything you consider relevant to me concerning
                                a condition that you have indicated above as a YES, please do so below:</b></p>
                        <textarea name="medical[extra_info]" class="form-control"></textarea>
                        <p><b>Is your son/daughter/ward at present under treatment for anything? If so what?</b></p>
                        <textarea name="medical[treatment_info]" class="form-control"></textarea>
                        <p><b>If your son/daughter/ward is taking medication presently would you please inform Mrs
                                Kilsby on
                                arrival.</b></p>
                        <input type="text" name="medical[medication_name]" class="form-control"
                               placeholder="Name of medication"/>
                        <div class="form-group">
                            <div class="col-md-6 no-padding">
                                <input type="text" name="medical[dose]" class="form-control" placeholder="Dosage"/>
                            </div>
                            <div class="col-md-5 col-sm-12 col-xs-12 no-padding pull-right">
                                <input type="text" name="medical[time_taken]" class="form-control"
                                       placeholder="When taken"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><h3>3. Swimming ability:</h3></legend>
                        <p>I certify that my son/ward/daughter is</p>
                        <p>able to swim a short distance only. <input type="radio" name="can_swim" value="1"/></p>
                        <p>unable to swim. <input type="radio" name="can_swim" value="0"/></p>
                        <br/>
                        <p>(* Delete or annotate relevant wording)</p>
                    </fieldset>
                    <fieldset>
                        <legend><h3>4. Contact details:</h3></legend>
                        <p>Please complete the information boxes below so that I can contact you regarding your
                            son/daughter/ward if necessary whilst the camp is in operation.</p>
                        <input type="text" id="" name="contact[child_name]" placeholder="Name of child"
                               class="form-control" value="<?php echo isset($user['name']) ? $user['name'] : null; ?>"/>
                        <input type="text" id="" name="contact[person_name]" placeholder="Name of person of contact"
                               class="form-control"/>
                        <input type="text" id="" name="contact[phone_1]" placeholder="Phone number"
                               class="form-control"
                               value="<?php echo isset($user['mobile']) ? $user['mobile'] : null; ?>"/>
                        <input type="text" id="" name="contact[alt_contact]" placeholder="Alternative contact"
                               class="form-control"
                               value="<?php echo isset($user['email']) ? $user['email'] : null; ?>"/>
                        <input type="text" id="" name="contact[phone_2]" placeholder="Phone number"
                               class="form-control"
                               value="<?php echo isset($user['landline']) ? $user['landline'] : null; ?>"/>
                    </fieldset>
                    <div class="form-group">
                        <div class="col-md-5 no-padding" id="date-container">
                            <input type="text" id="date-input" name="signed_date" value="<?php _e(date('d-m-Y')); ?>"
                                   class="form-control" placeholder="Date"/>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 no-padding pull-right">
                            <div id="signature"></div>
                            <div id="signature_2"></div>
                            <input type="hidden" name="signature"/>
                            <label for="" class="text-center col-md-12 col-sm-12 col-xs-12 no-padding">Signature</label>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <button type="submit" class="red-btn pull-left" name="consent"><?php _e(Lang::submit()); ?></button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var sig_con = $('#signature');
        var sig_con_2 = $('#signature_2');
        sig_con.jSignature({UndoButton: true});
        sig_con_2.jSignature({UndoButton: true});
        $('form').submit(function () {
            var sign = sig_con_2.jSignature("getData", "image");
            if ((sig_con_2.jSignature("getData", "image")[1] == sig_con.jSignature("getData", "image")[1])) {
                alert('Signature is required.');
                return false;
            }
            $('input[name=signature]').val(sign);
            return true;
        });
    });
</script>