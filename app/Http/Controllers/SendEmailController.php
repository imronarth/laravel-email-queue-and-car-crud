<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use App\Http\Requests\SendEmailRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Email;

class SendEmailController extends Controller
{
    public function index()
    {
        return view('kirim-email');
    }

    public function store(SendEmailRequest $request)
    {
        $data = $request->all();
        Email::create($request->except('_token'));
        dispatch(new SendMailJob($data));
        return redirect()->route('kirim-email')->with('status', 'Email berhasil dikirim');
    }
}
