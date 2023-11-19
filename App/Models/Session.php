<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - nextstats-web
 * Last Updated - 30/10/2023
 */

namespace App\Models;

use App\Framework\Database;
use app\Framework\Database\Attributes\DatabaseColumn;

class Session
{

    #[DatabaseColumn([
        "PRIMARY_KEY"=>true,
        "TYPE"=>SQL_TYPE_VARCHAR,
        "ALLOW_NULL"=>false
    ])]
    private string $token;

    #[DatabaseColumn([
        "TYPE"=>SQL_TYPE_INT
    ])]
    private int $user_id;

    #[DatabaseColumn([
        "TYPE"=>SQL_TYPE_INT
    ])]
    private int $expiry;

    #[DatabaseColumn([
        "TYPE"=>SQL_TYPE_VARCHAR
    ])]
    private string $driver;

    public function __construct(Array $entity)
    {
        $this->token = $entity["token"];
        $this->expiry = $entity["expiry"];
        $this->user_id = $entity["user_id"];
        $this->driver = $entity["driver"];
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public static function create(User $user,string $application): String
    {

        Session::destroy($user,$application);

        $token = sha1($user->GetMail().time());
        $user_id = $user->GetId();
        $expiry = time()+2630000;

        $query = "INSERT INTO Session (token,user_id,expiry,driver) VALUES ('$token','$user_id','$expiry','$application')";

        Database::query($query);

        return $token;
    }

    public static function lookup(string $token): ?Session
    {
        $query = "SELECT * FROM Session WHERE token='$token'";
        $result = Database::query($query);

        if($result->num_rows > 0){
            return new Session($result->fetch_assoc());
        }else{
            return null;
        }
    }

    public static function destroy(User $user, string $application): bool
    {
        $user_id = $user->GetId();
        $query = "DELETE FROM Session WHERE user_id='$user_id' AND driver='$application'";

        return Database::query($query);
    }

    public function destroySelf(): bool
    {
        $token = $this->token;
        $driver =  $this->driver;
        $query = "DELETE FROM Session WHERE token='$token' AND driver='$driver'";

        return Database::query($query);
    }

}