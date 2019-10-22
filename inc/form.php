<?php
/**
 * Load needed options & translations into template.
 */
function init_js_vars() {
	global $wp_query;
	wp_localize_script( 'contact-me', 'dataForForm',
		array(
            'url'    => site_url('/wp-admin/admin-ajax.php'),
		)
	);
}
add_action('wp_print_scripts', 'init_js_vars');

/* Обрабока AJAX запроса формы */
function mail_send(){
    function trans($text) {
        return iconv("UTF-8","window-1252",$text);
    }
    // Check for empty fields
    if(empty($_POST['name'])      ||
    empty($_POST['email'])     ||
    empty($_POST['phone'])     ||
    empty($_POST['message'])   ||
    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
    echo "No arguments Provided!";
    return false;
    }

    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));
    $message = strip_tags(htmlspecialchars($_POST['message']));
    $emailTo = get_post_meta( LH_ID_MAIN_PAGE, $p.'lh_form_email_to');
    $to = $emailTo[0];
    $site_url = site_url();
    $title = "Вы получили новое сообщение из формы контакта на веб-сайте";
    

    // Формирование заголовка сообщения.
    $email_subject = "Форма контакта веб-сайта $site_url от $name";
    
    // Формируем заголовок письма
    $headers = "From: noreply@yourdomain.com\r\n"; 
    $header .= "Content-Type:text/html; charset=\"utf-8\"\r\n"; 
    $headers .= "Reply-To: $email_address\r\n";  
    $header .= "MIME-Version: 1.0\r\n";
    

    // Формирование тела письма
    $email_body = 
        "$title  $site_url .\n\n".
        "Name: $name\n\n".
        "Email: $email_address\n\n".
        "Phone: $phone\n\n".
        "Message:\n$message";

    
    mail($to, $email_subject, $email_body, $headers);
    return true;          
    
    die(); 
    
}
add_action('wp_ajax_mail_send', 'mail_send');
add_action('wp_ajax_nopriv_mail_send', 'mail_send');