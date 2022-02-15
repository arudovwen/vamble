<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\Config;

class CalendarController extends Controller
{
  public function handleCalendar($id)
  {

    switch ($id) {
      case 'standard room':
        $email = 'qfo9i30f6dgqs40v38f656jnus@group.calendar.google.com';
        break;
      case 'executive room':
        $email = 'vs0t3nvldepi9nt42j3qfnve9c@group.calendar.google.com';
        break;
      case 'standard apartment':
        $email = 'an2mrjog41kior96epjth1hq58@group.calendar.google.com';
        break;
      case 'executive apartment':
        $email = '4qt8baogmlreldkda1pk9tvn5c@group.calendar.google.com';
        break;
      case 'platinum apartment':
        $email = 'pem5u5sr4c0kagea47ptbcnb5g@group.calendar.google.com';
        break;

      default:
        # code...
        break;
    }
    Config::set('google-calendar.credentials_json', storage_path('app/google-calendar/oauth-credentials.json'));
    Config::set('google-calendar.token_json', storage_path('app/google-calendar/oauth-token.json'));
    Config::set('google-calendar.calendar_id', $email);
  }

  public function checkcalendar($id, $checkIn, $checkOut)
  {
    $this->handleCalendar($id);
    $allevents = Event::get()->filter(function ($a) use ($checkIn, $checkOut) {

       return $a->googleEvent->start->dateTime <= $checkOut && $a->googleEvent->end->dateTime >= $checkIn;
    });
    return count($allevents);
  }
}
