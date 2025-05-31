<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TaskassigneEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
   public function sendEmail()
   {
   
     $to ="e48.aoneseo@gmail.com";
     $mas="demo";
     $subject="assignedTask";
    Mail::to($to)->send(new TaskassigneEmail($mas, $subject));
   }
}
