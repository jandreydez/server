if (isset($_POST["submit"])) {
    if (trim($_POST["contact_name"]) == "" || trim($_POST["contact_name"]) == "Name (required)") {
        $hasError = true;
    } else {
        $name = trim($_POST["contact_name"]);
    }

    $subject = "SEBRAE PREVIDÊNCIA - Fale com a Comissão Eleitoral";

    if (trim($_POST["email"]) == "" || trim($_POST["email"]) == "Email (required)") {
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST["email"]))) {
        $hasError = true;
    } else {
        $email = trim($_POST["email"]);
    }

    if (trim($_POST["telefone"]) == "" || trim($_POST["telefone"]) == "Telefone") {
        $hasError = true;
    } else {
        $telefone = trim($_POST["telefone"]);
    }

    if (trim($_POST["msg"]) == "" || trim($_POST['msg']) == "Message") {
        $hasError = true;
    } else {
        if (function_exists("stripslashes")) {
            $comments = stripslashes(trim($_POST["msg"]));
        } else {
            $comments = trim($_POST["msg"]);
        }
    }
    if (!isset($hasError)) {
        $emailTo = "comissaoeleitoral@sebraeprevidencia.com.br"; //Put your own email address here
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
echo '<form action="" method="post" class="clear contact_left">';
if (isset($hasError)) {
echo '<div class="alert error"><div class="msg">'. __("Please check if you've filled all the fields with valid information. Thank you.", 'Avada') .'</div></div>';
}
if (isset($emailSent) && $emailSent == true) {
echo '<div class="alert success"><div class="msg">'. __('Thank you', 'Avada') .' <strong>'. $name .'</strong> '. __('for using my contact form! Your email was successfully sent!', 'Avada') .'</div></div>';
}
echo '<div id="comment-input">';
echo '<input type="text" name="contact_name" id="author" placeholder="Nome" size="22" tabindex="1" aria-required="true" class="input-name" />';
echo '<input type="text" name="email" id="email" placeholder="E-mail" size="22" tabindex="2" aria-required="true" class="input-name" />';
echo '<input type="text" name="telefone" id="telefone" placeholder="Telefone" size="22" tabindex="3" aria-required="true" class="input-name" />';
echo '<input type="text" name="patrocinadora" id="patrocinadora" placeholder="Patrocinadora" size="22" tabindex="4" aria-required="true" class="input-name" />';
echo '<div id="comment-textarea">';
echo '<textarea name="msg" id="comment" cols="39" rows="4" tabindex="5" class="textarea-comment" placeholder="Mensagem"></textarea>';
echo '</div>';
echo '<div id="comment-submit">';
echo '<p><div><input name="submit" type="submit" id="submit" tabindex="6" value="Enviar" class="comment-submit button small green"></div></p>';
echo '</div>';
echo '</form>';
