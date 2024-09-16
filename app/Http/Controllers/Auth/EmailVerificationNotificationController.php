<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Webklex\IMAP\Facades\Client;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('user.dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        Email::create([
            'to' => $request->user()->email,
            'title' => "forgot_password",
        ]);

        $client = Client::account('default');
        $client->connect();

        $inbox = $client->getFolder('INBOX');
        $messages = $inbox->messages()->all()->get();

        if ($messages->count() > 0) {
            $message = $messages->last();
            if ($message = 'Mail delivery failed: returning message to sender') {
                return back()->with('status', 'verification-link-fail');
            }
        } else {
            return back()->with('status', 'verification-link-fail');
        }

        return back()->with('status', 'verification-link-sent');
    }
}
