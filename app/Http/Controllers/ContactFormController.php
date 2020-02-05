<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Newsletter;

class ContactFormController extends Controller
{
    public function sendEmail(Request $request)
    {
      $this->validate($request,[
        'email' => 'required'
      ]);
      Newsletter::subscribe('seguns@discworld.com', ['FNAME'=>'Rince', 'LNAME'=>'Wind', 'MSG' => 'this is message']);
      $fromName = 'Olakunle Boye';
      $replyTo = 'admin@example.com';
      $subject = 'Testing';

    /*  Newsletter::createCampaign(
          $fromName,
          $replyTo,
          $subject,
          $html = '<p>This is testing</p>',
          $listName = 'Boyeoffice',
        $options = [],
        $contentOptions = []
      );*/
      //$api = Newsletter::getApi();
      //$user = Newsletter::getMember('kunlexzy@gmail.com');
      //$error = Newsletter::getLastError();
      return ['success' => true];
    }
}
