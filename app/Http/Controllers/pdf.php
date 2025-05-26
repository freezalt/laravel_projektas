<?php
use Illuminate\Support\Facades\Mail;
use App\Mail\PDFMail;

Mail::to('rokas.raustys@stud.svako.lt')->send(new PDFMail());

