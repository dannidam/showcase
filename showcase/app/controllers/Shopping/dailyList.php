<?php

namespace App\Http\Controllers\Shopping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\shopping\security;
use App\models\shopping\users;
use DB;
use Session;

class dailyList extends Controller
{
    public function __construct(){
        $this->data = [];
        $this->security = new security();
        $this->user = new users;
    }

    public function main($group_id){
        $data = $this->data;
        $data['loggedIn'] = $this->security->isLogged();
        if($data['loggedIn']){
            $data['user'] = $this->user->getUser();
            // dailyList link
            $data['dListLink'] = "/shopping/daily_list=".$group_id;
            //get data
            $date = getdate(date("U"));
            $data['today'] = $this->convertDate($date['weekday'], $date['month'], $date['mday'], $date['year']);
            //dd($data['today']);
         return view('Shopping/daily_list', compact('data'));
        }
        else{
            return redirect('shopping/login');
        }
    }

    public function convertDate($day, $month, $date, $year){
        return $this->convertDayName($day).', '. $this->convertMonthByName($month).' '. $date.', '.$year;
    }

    public function convertDayName($day){
        if($day == 'Monday'){
            return 'Mandag';
        }
        
        elseif($day == 'Tuesday'){
            return 'Tirsdag';
        }

        elseif($day == 'Wednesday'){
            return 'Onsdag';
        }

        elseif($day == 'Thursday'){
            return 'Torsdag';
        }

        elseif($day == 'Friday'){
            return 'Fredag';
        }

        elseif($day == 'Saturday'){
            return 'Lørdag';
        }

        elseif($day == 'Sunday'){
            return 'Søndag';
        }
    }

    public function convertMonthByName($month){
        if($month == 'January'){
            return 'Januar';
        }

        else if($month == 'February'){
            return 'Februar';
        }

        else if($month == 'March'){
            return 'Marts';
        }

        else if($month == 'April'){
            return 'April';
        }

        else if($month == 'May'){
            return 'Maj';
        }

        else if($month == 'June'){
            return 'Juni';
        }

        else if($month == 'July'){
            return 'Juli';
        }

        else if($month == 'August'){
            return 'August';
        }

        else if($month == 'September'){
            return 'September';
        }

        else if($month == 'October'){
            return 'Oktober';
        }

        else if($month == 'November'){
            return 'November';
        }

        else if($month == 'December'){
            return 'December';
        }
    }
}
