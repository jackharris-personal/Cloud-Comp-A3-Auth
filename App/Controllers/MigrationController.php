<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - policyManager-AuthApi
 * Last Updated - 14/11/2023
 */

namespace App\Controllers;

use app\Framework\Database\Migration;

class MigrationController
{

    private Migration $migration;

    public function __construct(){
        $this->migration = new Migration();
    }

    public function make(string $class): string
    {

        if(!file_exists(MODELS.$class.".php")){

            return "Invalid model class name provided, ".MODELS.$class.".php was not found";
        }

        //Append the namespace to the front of the class.
        $class = "App\\Models\\".$class;

        //Execute our migration
        if($this->migration->make($class)){
            return "Successfully performed database migration";
        }

        return "Failed to perform database migration..";
    }

}