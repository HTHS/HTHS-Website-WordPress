<?php
$username = $_GET['teacher'];
$user_query = new WP_User_Query(array(
    'role' => 'hths_teacher',
    'search' => $username,
    'search_columns' => array('user_login')
));
$results = $user_query->results;
if (count($results) != 1) :
?>

<div id="content_left">
    <div id="content_left_above">
        <div class="fancybox">
            Error: Teacher not found.
        </div>
    </div>
</div>

<?php else : $teacher = $results[0]; ?>

<style type="text/css">
.teacher_image {
    float: left;
    margin: 2px 10px 5px 2px;
    border: 1px solid #CCC;
    padding: 10px;
    background-color: white;
    width: 160px;
    height: 200px;
}

#teacher_description ul, #teacher_description ol {
	display: inline-block;
	margin: 0 0 1em -20px;
}

#teacher_description_wrapper {
	overflow: auto;
}

#teacher_email {
    font-size: 12pt;
}
#contact_form td {
    vertical-align: middle;
    padding: 5px;
}
#contact_form td:first-child {
    text-align: right;
}
#contact_form input, #contact_form textarea {
    width: 400px;
}
#contact_form #contact_form_verify {
    width: 200px;
}
#contact_form tr:last-child td {
    text-align: center;
}
#contact_form tr:last-child td input {
    width: 100px;
    height: 30px;
}
</style>

<div id="content_left">
    <div id="content_left_above">
        <div class="fancybox">
            <div class="fancytitle"><?=$teacher->display_name?></div>
            <div id="teacher_description_wrapper">
                <?php userphoto($teacher); ?>
                <div id="teacher_description">
                    <?=$teacher->description?>
                </div>
            </div>
        </div>

        <div class="fancybox" id="contact">
            <h2 class="fancytitle">Contact <?=$teacher->display_name?></h2>
            <p>You may contact this teacher via a voicemail or via direct email, or you may send an email directly from this page via the form provided below.</p>
            <p>
            <h3>Contact via voicemail: </h3>
                (732) 842-8444 x<?=$teacher->voicemail?>
            </p>
            <p>
            <h3>Contact via direct email:</h3>
            <?php echo antispambot($teacher->user_email); ?>
            </p><p>
            <h3>Contact via form:</h3>
            <?php
            $contact_form_shortcode = "
            [contact-form to='" . $teacher->user_email . "' subject='Message Received from HTHS Website']
            [contact-field label='Name' type='name' required='1'/]
            [contact-field label='Email' type='email' required='1'/]
            [contact-field label='Subject' type='text' required='1'/]
            [contact-field label='Message' type='textarea' required='1'/]
            [/contact-form]";
            echo $contact_form_shortcode;
            echo do_shortcode($contact_form_shortcode);
            ?>
            </p>
        </div>
    </div>
</div>

<?php endif; ?>