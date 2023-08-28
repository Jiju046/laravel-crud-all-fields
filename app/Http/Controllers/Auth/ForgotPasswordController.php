<?php

namespace App\Http\Controllers;


class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
{
    return view('auth.forgot-password'); // Customize the view name if needed
}
}
