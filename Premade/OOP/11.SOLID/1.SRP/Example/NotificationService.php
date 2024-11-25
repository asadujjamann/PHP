<?php

class NotificationService 
{
    public function sendEmailNotification($email, $message) 
    {
        echo "<h3> Email sent to: $email </h3>
            <p> Email content: $message </p>";
    }
}

$notificationService1 = new NotificationService();
$notificationService1->sendEmailNotification("asad@gmail.com", "Some important articles with images");