<?php
$options = get_option( 'wiocc_settings' );
add_action("wp_ajax_contact", "contact");
add_action("wp_ajax_nopriv_contact", "contact");

add_action("wp_ajax_download", "download");
add_action("wp_ajax_nopriv_download", "download");

function contact() {

}

function download ()
{
//    if (!wp_verify_nonce($_REQUEST['nonce'], "download")) {
//        exit("No naughty business please");
//    }
   //$_POST['file_link'];
    $return_array=array(
        'success'=>false,
        'message'=>'There was an error try again',
        'fileLink' => $_POST['file_link']
    );
    if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['checker'])) {
        if (!strlen($_POST['first_name']) > 0) {
            $return_array['message'] = 'Please enter a first name';
            $return_array['success'] = false;
        } else if (!strlen($_POST['last_name']) > 0) {
            $return_array['message'] = 'Please enter a last name';
            $return_array['success'] = false;
        } else if (!is_email($_POST['email'])) {
            $return_array['message'] = 'Please enter a valid Email';
            $return_array['success'] = false;
        } else {
            $first_name = sanitize_text_field($_POST['first_name']);
            $last_name = sanitize_text_field($_POST['last_name']);
            $email = sanitize_email($_POST['email']);
            $industry = sanitize_text_field($_POST['location']);

            $id = wp_insert_post(array(
                'post_title' => $first_name . ' ' . $last_name,
                'post_content' => '',
                'post_date' => date('Y-m-d H:i:s'),
                'post_type' => 'download-form',
                'post_status' => 'publish',
            ));
            if ($id) {
                add_post_meta($id, 'wiocc-first_name', $first_name);
                add_post_meta($id, 'wiocc-last_name', $last_name);

                add_post_meta($id, 'wiocc-email', $email);
                add_post_meta($id, 'wiocc-industry', $industry);
                $return_array['success'] = true;
                $return_array['message'] = 'Your Download will start Shortly';
            }
        }

    } else if (!isset($_POST['checker'])) {
        $return_array['message']='You must tick consent to access the file';
        $return_array['success'] = false;
    } else {
        $return_array['message']='Please enter a valid name/email combination';
        $return_array['success'] = false;
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        if($return_array['success']==false){
            http_response_code(442);
        }
        $result = json_encode($return_array);
        echo $result;
    }
    else {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
    die();
}
?>