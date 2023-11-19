<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - policyManager-AuthApi
 * Last Updated - 14/11/2023
 */

namespace App\Controllers;

use App\Framework\Http\Response;
use App\Models\Session;
use App\Models\User;

class AuthController
{

    public function login(): Response
    {

        $response = Response::get();

        $mail = null;
        $password = null;

        if(isset($_POST["mail"])){
            $mail = $_POST["mail"];
        }

        if(isset($_POST["password"])){
            $password = $_POST["password"];
        }

        if($mail === null){
            $response = $this->buildBadRequest($response);
            $response->addError("mail","Please enter a valid email address.");
        }

        if($password === null){
            $response = $this->buildBadRequest($response);
            $response->addError("password","Please enter a password with 8 or more characters");
        }else if (strlen($password) < 8){
            $response = $this->buildBadRequest($response);
            $response->addError("password","Please enter a password with 8 or more characters");
        }

        $user = User::LookUpByEmail($mail);
        if($user !== null && $user->GetPassword() === $password){
            $response->setOutcome(true);
            $response->setMessage("Successfully logged in.");
            $response->addContent("redirect","/?alert=success&message=".urlencode("Welcome ".$user->getDisplayName()));

            $token = Session::create($user,"LocalAuth");
            $response->addContent("session",$token);
        }else{

            $response = $this->buildBadRequest($response);
            $response->setStatusCode(401);
            $response->setMessage("Login failed, please recheck your username and password");
        }

        return $response;
    }

    public function logout(string $token): Response
    {

        $response  = Response::get();

        $response->setStatusCode(200);
        $response->setMessage("Successfully logged out.");
        $response->setOutcome(true);

        $session = Session::lookup($token);
        $session?->destroySelf();

        return $response;
    }

    public function checkSession(string $token): Response
    {

        $session = Session::lookup($token);
        $response = Response::get();

        if($session === null){
            $response->setStatusCode(401);
            $response->setOutcome(false);
            $response->setMessage("Session token invalid");
            $response->addContent("redirect","/login?alert=warning&message=".urlencode("Please login to access that page."));
        }else{
            $response->setStatusCode(200);
            $response->setOutcome(true);
            $response->setMessage("Valid session");
        }

        return $response;
    }

    public function register(): Response{

        $response = Response::get();

        $mail = null;
        $givenName = null;
        $surname = null;
        $password = null;

        if(isset($_POST["mail"])){
           $mail = $_POST["mail"];
        }

        if(isset($_POST["givenName"])){
            $givenName = $_POST["givenName"];
        }

        if(isset($_POST["surname"])){
            $surname = $_POST["surname"];
        }

        if(isset($_POST["password"])){
            $password = $_POST["password"];
        }

        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){

            $response = $this->buildBadRequest($response);
            $response->addError("mail","Validation failed, mail must be valid email 'example@mail.com'.");
        }

        if($response->getStatusCode() === 200){
            if(User::LookUpByEmail($mail) !== null){

                $response = $this->buildBadRequest($response);
                $response->addError("mail","Validation failed, email '".$mail."' is already taken.");
            }
        }

        if($givenName === null || strlen($givenName) < 2){

            $response = $this->buildBadRequest($response);
            $response->addError("givenName","Validation failed, given name must be at least 2 characters long.");
        }

        if($surname === null || strlen($surname) < 2){

            $response = $this->buildBadRequest($response);
            $response->addError("surname","Validation failed, surname must be at least 2 characters long.");
        }

        if($password === null || strlen($password) < 8){

            $response = $this->buildBadRequest($response);
            $response->addError("password","Validation failed, given name must be at least 8 characters long.");
        }


        if($response->getStatusCode() === 200 && User::register($mail,$givenName,$surname,$password)){
            $response->setOutcome(true);
            $response->setMessage("User account successfully registered");
            $response->addContent("redirect","/login?alert=success&message=".urlencode("Welcome ".$givenName." ".$surname.", Please sign in with your new account"));
        }


        return $response;

    }

    private function buildBadRequest(Response $response): Response
    {
        $response->setOutcome(false);
        $response->setStatusCode(400);
        $response->setMessage("Error, bad request.");

        return $response;
    }

}