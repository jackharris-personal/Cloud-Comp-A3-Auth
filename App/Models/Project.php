<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - policyManager-AuthApi
 * Last Updated - 18/11/2023
 */

namespace App\Models;

use app\Framework\Database\Attributes\DatabaseColumn;

class Project
{

    #[DatabaseColumn([
        "PRIMARY_KEY"=>true,
        "TYPE"=>SQL_TYPE_INT,
        "ALLOW_NULL"=>false,
        "AUTO_INCREMENT"=>true
    ])]
    private int $id;

    #[DatabaseColumn(["TYPE"=>SQL_TYPE_VARCHAR])]
    private string $name;

    #[DatabaseColumn(["TYPE"=>SQL_TYPE_VARCHAR,"LENGTH"=>65000])]
    private string $description;

    #[DatabaseColumn(["TYPE"=>SQL_TYPE_VARCHAR])]
    private string $code;

    #[DatabaseColumn(["TYPE"=>SQL_TYPE_VARCHAR])]
    private string $variables;

    #[DatabaseColumn(["TYPE"=>SQL_TYPE_INT])]
    private string $user_id;

    #[DatabaseColumn(["TYPE"=>SQL_TYPE_INT])]
    private string $created_at;

    #[DatabaseColumn(["TYPE"=>SQL_TYPE_INT])]
    private string $last_updated;

}