<?php
/**
 * Template Name: Downloads Page
 */

global $title;
$title = get_the_title();

get_header();

/**
 * @var $wpdb wpdb
 */
global $wpdb;

$types = $wpdb->get_results('SELECT * from `wp_wpfb_cats` ORDER BY `cat_name` ASC');
$forms = $wpdb->get_results('SELECT * from `wp_wpfb_files`');
$filebase_options = get_option('wpfilebase');

/**
 * Function from CodeIgniter /system/helpers/file_helper.php
 * Uses CodeIgniter /application/config/mimes.php
 *
 * Get Mime by Extension
 *
 * Translates a file extension into a mime type based on config/mimes.php.
 * Returns FALSE if it can't determine the type, or open the mime config file
 *
 * Note: this is NOT an accurate way of determining file mime types, and is here strictly as a convenience
 * It should NOT be trusted, and should certainly NOT be used for security
 *
 * @access	public
 * @param	string	path to file
 * @return	mixed
 */
function get_mime_by_extension($file)
{
    $extension = strtolower(substr(strrchr($file, '.'), 1));

    global $mimes;

    if ( ! is_array($mimes))
    {
         include('inc/mimes.php');

        if ( ! is_array($mimes))
        {
            return FALSE;
        }
    }

    if (array_key_exists($extension, $mimes))
    {
        if (is_array($mimes[$extension]))
        {
            // Multiple mime types, just give the first one
            return current($mimes[$extension]);
        }
        else
        {
            return $mimes[$extension];
        }
    }
    else
    {
        return FALSE;
    }
}
?>

<div id="content_left">
    <div id="content_left_above">
        <style type="text/css">
            #downloads_wrapper {
                padding-left: 30px;
                padding-top: 15px;
                position: relative;
            }
            #downloads_sorter.downloads_sorter_floating {
                border: 1px solid #CCC;
                width: 130px;
                padding: 0;
                box-shadow: 2px 2px 10px #AAA;
                position: absolute;
                z-index: 10;
                background-color: #FFF;
                left: -118px;
                top: 15px;
            }
            #downloads_sorter_title {
                margin: 0;
                padding: 10px 10px 4px 10px;
                font-weight: bold;
                font-size: 11pt;
                text-transform: uppercase;
            }
            ul#downloads_sorter_typewrapper {
                list-style-type: none;
                padding: 0 0 7px 0;
                margin: 0;
                font-size: 10pt;
            }
            #downloads_sorter_typewrapper a {
                display: block;
                border: 0;
            }
            #downloads_sorter_typewrapper a.downloads_sorter_type_current, #downloads_sorter_typewrapper a:hover {
                background-color: #BD0000;
                color: #FFF;
            }
            .downloads_sorter_type {
                padding: 3px 3px 3px 12px;
            }
            .downloads_type_title {
                text-transform: uppercase;
                font-size: 16pt;
                font-weight: normal;
            }
            ul.downloads_type_itemwrapper {
                list-style-type: none;
                padding-left: 0;
            }
            ul.downloads_type_itemwrapper li {
                margin: 15px 25px 15px 15px;
                overflow: auto;
            }
            .downloads_type_item_icon {
                float: left;
            }
            .downloads_type_item_info {
                font-size: 11pt;
                margin-left: 35px;
                padding-top: 3px;
            }
            .downloads_type_item_title {
                float: left;
                font-size: 12pt;
                border-bottom: 1px solid #AAA;
                font-weight: bold;
            }
            .downloads_type_item_size {
                float: right;
            }
            .downloads_type_item_downloadcount {
                margin-top: 5px;
                clear: both;
                float: left;
            }
            .downloads_type_item_date {
                margin-top: 5px;
                clear: right;
                float: right;
            }
        </style>
        <script type="text/javascript" src="<?=get_stylesheet_directory_uri()?>/js/downloads.js"></script>
        <div class="fancybox">
            <h2 class="fancytitle black">Downloads</h2>
            <?php
            function files_of_type($type_id) {
                global $forms;
                return array_filter($forms, function($form) use (&$type_id) {
                    if ($form->file_category == $type_id) return true;
                    return false;
                });
            }
            function download_type_anchor($type) {
                $search = array(' ', "'", '"');
                return 'category_' . strtolower(str_replace($search, '_', $type));
            }
            function format_filesize($filesize) {
                $units = array('bytes', 'KB', 'MB', 'GB');
                $power = floor(log($filesize, 1024));
                return round($filesize / pow(1024, $power)) . ' ' . $units[$power];
            }

            function get_icon($filename) {
                $mime_type = get_mime_by_extension($filename);
                $mime_type = str_replace('/', '-', $mime_type);
                if (file_exists(get_stylesheet_directory() . '/images/icons/faenza/mimetypes/24/' . $mime_type . '.png')) {
                    return get_stylesheet_directory_uri() . '/images/icons/faenza/mimetypes/24/' . $mime_type . '.png';
                } else {
                    return get_stylesheet_directory_uri() . '/images/icons/faenza/mimetypes/24/empty.png';
                }
            }

            function get_file_link($file_path) {
                global $filebase_options;
                return site_url($filebase_options->upload_path . '/' . $file_path);
            }
            ?>
            <div id="downloads_wrapper">
                <div id="downloads_sorter" class="downloads_sorter_floating">
                    <h4 id="downloads_sorter_title">Categories</h4>
                    <ul id="downloads_sorter_typewrapper">
                        <?php foreach ($types as $type): ?>
                            <a href="#<?=download_type_anchor($type->cat_name)?>"><li class="downloads_sorter_type"><?=$type->cat_name?></li></a>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php foreach ($types as $type): ?>
                    <h3 class="downloads_type_title" id="<?=download_type_anchor($type->cat_name)?>"><?=$type->cat_name?></h3>
                    <ul class="downloads_type_itemwrapper">
                        <?php foreach (files_of_type($type->cat_id) as $form): ?>
                            <li>
                                <a class="downloads_type_item" href="<?=get_file_link($form->file_path)?>">
                                    <div class="downloads_type_item_icon">
                                        <img src="<?=get_icon($form->file_name)?>" width="24" height="24" />
                                    </div>
                                    <div class="downloads_type_item_info">
                                        <span class="downloads_type_item_title"><?=$form->file_display_name?></span>
                                        <span class="downloads_type_item_size"><?=format_filesize($form->file_size)?></span>
                                        <span class="downloads_type_item_downloadcount"></span>
                                        <span class="downloads_type_item_date"><?=date('M n, Y', $form->file_mtime)?></span>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>