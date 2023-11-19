<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - policyManager-AuthApi
 * Last Updated - 14/11/2023
 */

namespace App\Controllers;

use App\Framework\Http\Response;
use App\Middleware\Authorization;
use App\Models\User;

class UserController
{

    public function me(): Response
    {
        if(!Authorization::check()){
            return Response::getUnauthorized();
        }

        $response = Response::get();
        $user = User::lookUp(Authorization::getCurrentSession()->getUserId());

        foreach ($user->getEntity() as $key => $value){
            $response->addContent($key,$value);
        }

        return $response;
    }

    public function userLookup($id): Response
    {
        if(!Authorization::check()){
            return Response::getUnauthorized();
        }

        $user = User::lookUp($id);

        if($user === null){
            return Response::getResourceNotFound();
        }

        $response = Response::get();
        $response->addContent("displayName",$user->getDisplayName());
        $response->addContent("jobTitle",$user->getJobTitle());
        $response->addContent("company",$user->getCompany());
        $response->addContent("photo",$user->getPhoto());

        return $response;
    }
}