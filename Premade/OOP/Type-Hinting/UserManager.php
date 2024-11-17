<?php

class UserManager {
    public function addUser(array $users) : void
    {
        foreach($users as $user){
            echo "Adding user - " . $user . "<br>";
        }
    }
}

$userManager = new UserManager();
$userManager->addUser(["Asad", "Mijan", "Biplob"]);