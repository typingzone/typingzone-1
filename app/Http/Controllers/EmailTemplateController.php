<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    public function index()
    {
        return view('pages.email_templates.email_templates');
    }

}
