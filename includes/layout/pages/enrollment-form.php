<?php
if (!isset($_GET['reg-id'])) {
    header('Location:/');
    return;
}
$user = table_fetch_row('camp_registration', sprintf('id="%d"', intval($_GET['reg-id'])));
if (false == $user) {
    header('Location:/');
    return;
}
$camp = table_fetch_row('camps', sprintf('id="%d"', $user['camp']));
if (false == $camp || $camp['type'] != 1) {
    header('Location:/');
    return;
}
if (isset($_POST['enrollment'])) {
    try {
        if (!isset($_POST['require'])) {
            throw new Exception(Lang::req_req());
        }
        if (!table_insert('lifeguarding_requisites', array_keys($_POST['require']), $_POST['require'])) {
            throw new Exception(Lang::save_error());
        }
        $req_id = db_insert_id();
        $fields = array('camp_id', 'user_id', 'title', 'name', 'address', 'dob', 'postcode', 'telephone', 'email', 'emergency_contact_person', 'emergency_contact_relation', 'emergency_contact_number', 'requisites_id', 'signature_candidate', 'signature_guardian', 'specialist_learning', 'disability', 'extra_info');
        if (!table_insert('lifeguarding_enrollment', $fields, $_POST)) {
            throw new Exception(Lang::save_error());
        }
        header('Location:/payment.html?reg-id=' . $user['id']);
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>
<style type="text/css">
    input[type="radio"], input[type="checkbox"] {
        cursor: pointer;
        line-height: normal;
        margin: 4px 0 0;
        min-height: 15px;
        min-width: 15px;
    }
</style>
<div class="row">
    <div id="default-content-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <form action="" class="contactForm" method="post">
                <?php
                if (isset($message)) {
                    _t('h2', $message);
                } ?>
                <input type="hidden" name="user_id" value="<?php _e(intval($_GET['reg-id'])); ?>">
                <input type="hidden" name="camp_id" value="<?php _e(intval($camp['id'])); ?>">
                <fieldset>
                    <legend>
                        <h3>CANDIDATE DETAILS
                            <small>(Please use BLOCK CAPITALS)</small>
                        </h3>
                    </legend>
                    <label for="title">Title:</label>
                    <input type="text" id="" name="title" placeholder="Title" class="form-control"/>

                    <label for="name">Name:</label>
                    <input type="text" id="" name="name" placeholder="Name of person" class="form-control"
                           value="<?php _e($user['name']); ?>"/>

                    <label for="dob">Date of birth:</label>
                    <input type="text" id="" name="dob" placeholder="Date of birth" class="form-control"/>

                    <label for="address">Address:</label>
                    <textarea name="address" placeholder="Address information" class="form-control"
                              value="<?php _e($user['address']); ?>"></textarea>

                    <label for="postcode">Postcode:</label>
                    <input type="text" id="" name="postcode" placeholder="Postcode" class="form-control"/>

                    <div class="col-md-12 no-padding">
                        <div class="col-md-6 no-padding">
                            <label for="telephone">Telephone:</label>
                            <input type="text" name="telephone" class="form-control" placeholder="Telephone"
                                   value="<?php _e($user['mobile']); ?>"/>
                        </div>
                        <div class="col-md-6 pull-right">
                            <label for="email">Email:</label>
                            <input type="text" name="email" class="form-control" placeholder="Email"
                                   value="<?php _e($user['email']); ?>"/>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="col-md-6 no-padding">
                            <label for="emergency_contact_person">Emergency contact name:</label>
                            <input type="text" name="emergency_contact_person" class="form-control"
                                   placeholder="Emergency contact name"/>
                        </div>
                        <div class="col-md-6 pull-right">
                            <label for="emergency_contact_relation">Relationship to candidate:</label>
                            <input type="text" name="emergency_contact_relation" class="form-control"
                                   placeholder="Relationship to candidate"/>
                        </div>
                    </div>

                    <label for="emergency_contact_number">Emergency contact number:</label>
                    <input type="text" name="emergency_contact_number" placeholder="Emergency contact number"
                           class="form-control"/>
                </fieldset>
                <fieldset>
                    <legend>
                        <h3>COURSE PRE REQUISITES
                            <small>(All new candidates must meet the following criteria (please tick))</small>
                        </h3>
                    </legend>
                    <ul class="list list-unstyled">
                        <li>
                            <span class="text-left">Must be 16 years of age prior to assessment</span>
                            <span class="pull-right">
                                <input type="checkbox" name="require[is_16]" value="1"/>
                            </span>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <span class="text-left">Jump/dive into deep water</span>
                            <span class="pull-right">
                                <input type="checkbox" name="require[jump_dive]" value="1"/>
                            </span>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <span class="text-left">Swim 50 metres in no more than 60 seconds</span>
                            <span class="pull-right">
                                <input type="checkbox" name="require[swim]" value="1"/>
                            </span>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <span class="text-left">Swim 100 metres continuously on front and back</span>
                            <span class="pull-right">
                                <input type="checkbox" name="require[swim_back_forth]" value="1"/>
                            </span>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <span class="text-left">In deep water, tread water for 30 seconds</span>
                            <span class="pull-right">
                                <input type="checkbox" name="require[deep_water]" value="1"/>
                            </span>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <span class="text-left">Surface dive to the floor of the pool</span>
                            <span class="pull-right">
                                <input type="checkbox" name="require[surface_dive]" value="1"/>
                            </span>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <span class="text-left">Climb out unaided without ladder/steps and where the pool design permits</span>
                            <span class="pull-right">
                                <input type="checkbox" name="require[climb_out]" value="1"/>
                            </span>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                </fieldset>
                <fieldset>
                    <legend>
                        <h3>ADDITIONAL INFORMATION</h3>
                    </legend>
                    <div class="col-md-12 no-padding">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <p>Do you have any specialist learning requirements?</p>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <input type="radio" name="specialist_learning" value="1"> Yes
                            &nbsp;
                            <input type="radio" name="specialist_learning" value="0"> No
                        </div>
                    </div>
                    <div class="col-md-12 no-padding">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <p>Do you have a disability/ medical condition?</p>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <input type="radio" name="disability" value="1"> Yes
                            &nbsp;
                            <input type="radio" name="disability" value="0"> No
                        </div>
                    </div>
                    <div class="col-md-12 no-padding">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <p>If you answered yes to either of the above questions please provide further details on
                                how we can assist with your learning:</p>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <textarea name="extra_info" class="form-control"></textarea>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>
                        <h3>COURSE PAYMENT</h3>
                    </legend>
                    <p>The cost of this course is &pound;<?php _e($camp['price']);?> and must be paid in full by 22/07/2016</p>
                    <p>By completing this form you are confirming your enrolment onto the RLSS UK National Pool
                        Lifeguard Qualification</p>
                    <div class="col-md-12 no-padding">
                        <div class="col-md-6 col-sm-12 col-xs-12 no-padding">
                            <div id="signature_candidate"></div>
                            <div id="signature_candidate_2"></div>
                            <input type="hidden" name="signature_candidate"/>
                            <label for="" class="text-center col-md-12 col-sm-12 col-xs-12 no-padding">Candidate
                                Signature</label>
                        </div>
                        <div class="col-md-5 no-padding pull-right" id="date-container">
                            <input type="text" id="date-input" name="signed_date" value="<?php _e(date('d-m-Y')); ?>"
                                   class="form-control" placeholder="Date"/>
                        </div>
                    </div>
                    <div class="col-md-12 no-padding">
                        <div class="col-md-6 col-sm-12 col-xs-12 no-padding">
                            <div id="signature_guardian"></div>
                            <div id="signature_guardian_2"></div>
                            <input type="hidden" name="signature_guardian"/>
                            <label for="" class="text-center col-md-12 col-sm-12 col-xs-12 no-padding">Parent/Guardian
                                Signature (if under 18)</label>
                        </div>
                        <div class="col-md-5 no-padding pull-right" id="date-container">
                            <input type="text" id="date-input" name="signed_date" value="<?php _e(date('d-m-Y')); ?>"
                                   class="form-control" placeholder="Date"/>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" name="enrollment" class="red-btn">Submit</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var sig_con = $('#signature_guardian');
        var sig_con_2 = $('#signature_guardian_2');
        var sig_can = $('#signature_candidate');
        var sig_can_2 = $('#signature_candidate_2');
        sig_can.jSignature({UndoButton: true});
        sig_can_2.jSignature({UndoButton: true});
        sig_con.jSignature({UndoButton: true});
        sig_con_2.jSignature({UndoButton: true});
        $('form').submit(function () {
            var sign = sig_can.jSignature("getData", "image");
            if ((sig_can.jSignature("getData", "image")[1] == sig_can_2.jSignature("getData", "image")[1])) {
                alert('Signature is required.');
                return false;
            }
            $('input[name=signature_candidate]').val(sign);

            if ((sig_con.jSignature("getData", "image")[1] != sig_con_2.jSignature("getData", "image")[1])) {
                $('input[name=signature_guardian]').val(sig_con.jSignature("getData", "image"));
            }
            return true;
        });
    });
</script>