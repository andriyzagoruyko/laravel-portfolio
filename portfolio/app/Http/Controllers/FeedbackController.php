<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    public function send(FeedbackRequest $request) {
        
        $mailTo = Config::first()->email;

        if (empty($mailTo)) {
            return response()->json([
                'status' => 'error',
                'message' => __('main.mail_error'),
            ]);
        }

        Mail::to($mailTo)
            ->send(new FeedbackMail($request->except('_token')));

        return response()->json([
            'status' => 'success',
            'message' => __('main.mail_sent'),
        ]);    
    }
}
