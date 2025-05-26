<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmissionMail;
use Illuminate\Support\Facades\Mail;

    Mail::to('rokas.raustys@stud.svako.lt')->send(new FormSubmissionMail($formData));

