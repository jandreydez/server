<?php
// Template Name: Contact
get_header();
global $data;
?>

<?php
if ($data['recaptcha_public'] && $data['recaptcha_private']) {
    require_once('framework/recaptchalib.php');
}

//If the form is submitted

if (isset($_POST['submit'])) {
    //Check to make sure that the name field is not empty
    if (trim($_POST['contact_name']) == '' || trim($_POST['contact_name']) == 'Name (required)') {
        $hasError = true;
    } else {
        $name = trim($_POST['contact_name']);
    }

    //Subject field is not required
    //$subject = trim($_POST['url']);
    $subject = "SEBRAE PREVIDÊNCIA - Fale Conosco";

    //Check to make sure sure that a valid email address is submitted
    if (trim($_POST['email']) == '' || trim($_POST['email']) == 'Email (required)') {
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    // Validando o telefone
    if (trim($_POST['telefone']) == '' || trim($_POST['telefone']) == 'Telefone') {
        $hasError = true;
    } else {
        $telefone = trim($_POST['telefone']);
    }

    //Check to make sure comments were entered
    if (trim($_POST['msg']) == '' || trim($_POST['msg']) == 'Message') {
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['msg']));
        } else {
            $comments = trim($_POST['msg']);
        }
    }

    if ($data['recaptcha_public'] && $data['recaptcha_private']) {
        $resp = recaptcha_check_answer($data['recaptcha_private'], $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
        if (!$resp->is_valid) {
            $hasError = true;
        }
    }

    //If there is no error, send the email
    if (!isset($hasError)) {
        $emailTo = $data['email_address']; //Put your own email address here
        //$emailTo = "vlamir.santo@plusinterativa.com";
        //$body = "Name: $name \n\nEmail: $email \n\nTelefone: $telefone \n\nSubject: $subject \n\nComments:\n $comments";
        //$headers = "From: ". $name . " <" . $email . ">\r\n";
        $body = "<p>Nome: $name <br/>";
        $body .= "E-mail: $email <br />";
        $body .= "Telefone: $telefone <br />";
        $body .= "Mensagem: $comments</p>";
        $headers = 'MIME-Version: 1.0' . "\n" . 'Content-type: text/html; charset=UTF-8'
                . "\n" . 'From: ' . $name . ' <' . $email . '>\n';
        $mail = wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>

<?php
if (get_post_meta($post->ID, 'pyre_full_width', true) == 'yes') {

    $content_css = 'width:100%';

    $sidebar_css = 'display:none';
} elseif (get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'left') {

    $content_css = 'float:right;';

    $sidebar_css = 'float:left;';
} elseif (get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {

    $content_css = 'float:left;';

    $sidebar_css = 'float:right;';
} elseif (get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'default') {

    if ($data['default_sidebar_pos'] == 'Left') {

        $content_css = 'float:right;';

        $sidebar_css = 'float:left;';
    } elseif ($data['default_sidebar_pos'] == 'Right') {

        $content_css = 'float:left;';

        $sidebar_css = 'float:right;';
    }
}
?>

<div id="content" style="<?php echo $content_css; ?>">

<?php while (have_posts()): the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="post-content">

    <?php the_content(); ?>

            </div>

            <form action="" method="post" class="clear contact_left">
                <?php if (isset($hasError)) { //If errors are found ?>
                    <div class="alert error"><div class="msg"><?php echo __("Please check if you've filled all the fields with valid information. Thank you.", 'Avada'); ?></div></div>
                    <br />
                <?php } ?>

                <?php if (isset($emailSent) && $emailSent == true) { //If email is sent ?>
                    <div class="alert success"><div class="msg"><?php echo __('Thank you', 'Avada'); ?> <strong><?php echo $name; ?></strong> <?php echo __('for using my contact form! Your email was successfully sent!', 'Avada'); ?></div></div>
                    <br />
                <?php } ?>

                <div id="comment-input">
                    <input type="text" name="contact_name" id="author" value="<?php if (isset($_POST['contact_name']) && !empty($_POST['contact_name'])) {
        echo $_POST['contact_name'];
    } ?>" placeholder="<?php echo __('Name (required)', 'Avada'); ?>" size="22" tabindex="1" aria-required="true" class="input-name">
                    <input type="text" name="email" id="email" value="<?php if (isset($_POST['email']) && !empty($_POST['email'])) {
        echo $_POST['email'];
    } ?>" placeholder="<?php echo __('Email (required)', 'Avada'); ?>" size="22" tabindex="2" aria-required="true" class="input-email">
                    <input type="text" name="telefone" id="telefone" value="<?php if (isset($_POST['telefone']) && !empty($_POST['telefone'])) {
        echo $_POST['telefone'];
    } ?>" placeholder="<?php echo __('Telefone', 'Avada'); ?>" size="22" tabindex="3" class="input-website">
                </div>
                <div id="comment-textarea">
                    <textarea name="msg" id="comment" cols="39" rows="4" tabindex="4" class="textarea-comment" placeholder="<?php echo __('Message', 'Avada'); ?>"><?php if (isset($_POST['msg']) && !empty($_POST['msg'])) {
        echo $_POST['msg'];
    } ?></textarea>
                </div>

    <?php if ($data['recaptcha_public'] && $data['recaptcha_private']): ?>

                    <div id="comment-recaptcha">

        <?php echo recaptcha_get_html($data['recaptcha_public']); ?>

                    </div>

    <?php endif; ?>

                <div id="comment-submit">
                    <p><div><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo __('Submit Form', 'Avada'); ?>" class="comment-submit button small green"></div></p>
                </div>
            </form>
            <div class="contact_right">
                <p><strong>SEBRAE PREVIDÊNCIA<br />
                Instituto Sebrae de Seguridade Social</strong></p>
                <p>SEPN, Quadra 515, Bloco C, loja 32, 1º andar, SEBRAE PREVIDÊNCIA</p>
                <p>CEP:70.770-503 - Brasília, DF</p>
                <p>(61) 3327-1226<br />
                <a href="mailto:atendimento@sebraeprev.com.br">atendimento@sebraeprev.com.br</a></p>
            </div>

        </div>

<?php endwhile; ?>

</div>

<div id="sidebar" style="<?php echo $sidebar_css; ?>"><?php generated_dynamic_sidebar(); ?></div>

<?php get_footer(); ?>