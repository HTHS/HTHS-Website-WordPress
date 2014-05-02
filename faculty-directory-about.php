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
</style>

<div id="content_left">
    <div id="content_left_above">
        <div class="fancybox">
            <div class="fancytitle"><?=$teacher->get('display_name')?></div>
            <div id="teacher_description_wrapper">
                <?php userphoto($teacher); ?>
                <div id="teacher_description">
                    <?=$teacher->get('description')?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>