<?php

//business/UserService.php

class UserService {

    public static function controleerGebruiker($gebruikersnaam, $wachtwoord) {
        if ($gebruikersnaam == "admin" && $wachtwoord == "geheim"){
            return true;
        }
        else {
            return false;
        }
    }

}
