<?php 
namespace App\Auth\Passwords;

use Illuminate\Auth\Passwords\DatabaseTokenRepository;


class CustomDatabaseTokenRepository extends DatabaseTokenRepository
{

    // Overrides the standard token creation function
    public function createNewToken()
    {
        // Here changed manually [lenght set 6]
        $random = substr(md5(mt_rand()), 0, 6);
        return strtoupper($random);

        return substr(parent::createNewToken(), 0, 30);
    }

}