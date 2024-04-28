<?php
namespace Framework;

class Authorization
{
    /**
     * Check if current logged in user own a resource
     * 
     * @param int resource id
     * 
     * @return bool
     */
    public static function isOwner(int $resourceId): bool
    {
        //Authorizeuser
        return Session::get('user')['id']
            ? ((int) Session::get('user')['id'] == $resourceId
                ? true
                : false)
            : false;


    }
}