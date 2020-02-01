<?php 
    require_once 'vendor/autoload.php';

    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom('kareemadesola1999@gmail.com', 'Kareem Adesola');
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain",$content);
            // $email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try {
                $response = $sendgrid->send($email);
                return $response;
            } catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }

        }
    }
?>