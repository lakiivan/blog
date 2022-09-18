<?php

namespace App\Services;

class ConvertKitNewsletter implements Newsletter
{
    public function subscribe(string $email, string $list=null)
    {
        //just for explaining how to separate newsletter from exact implementation mailchimp, convertkit or some  other
        return null;
    }
}
