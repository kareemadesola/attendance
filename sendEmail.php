<?php 
    require  __DIR__.'/vendor\autoload.php';
    // require  'vendor/autoload.php';

    // $dotenv= new vendor\ilimic\phpdotenv\src\Dotenv(__DIR__);
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

    $dotenv->load();



    class SendEmail{
        public static function SendMail($to, $subject, $content){

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom('kareemadesola1999@gmail.com', 'Kareem Adesola');
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain",$content);
            // $email->addContent("text/html", $content);

            $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

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
