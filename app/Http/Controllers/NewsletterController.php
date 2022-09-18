<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Validation\ValidationException;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Exception;

class NewsletterController extends Controller

{
    public function __invoke(Newsletter $newsletter)
    {
        ddd($newsletter);
        //require_once('/path/to/MailchimpMarketing/vendor/autoload.php');
        request()->validate(['email' => 'required|email']);

        //$response = $mailchimp->ping->get();
        //$response = $mailchimp->lists->getAllLists();
        //$response = $mailchimp->lists->getListMembersInfo('5d8b953207');

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This e-maill could not be added to our newsletter list.'
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up for out newsletter');

        //dd(var_dump($response));
        //ddd($response);
    }
}
