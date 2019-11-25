<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Record;
use Carbon\Carbon;

class GuestHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $data = [];
        // $data['variation'] = round(microtime(true)) % 2;

        return view('start', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function end() {
        $data = [];
        $data['records'] = Record::get();

        return view('end', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function prep() {
        $data = [];
        $data['variation'] = round(microtime(true)) % 2;

        return view('prep', $data);
    }

    /**
     * 
     */
    public function records_update() {
        $answers = Input::has('answers') ? Input::get('answers') : null;
        $correct = Input::has('correct') ? Input::get('correct') : 0;
        $total = Input::has('total') ? Input::get('total') : 0;
        $started_at = Input::has('started_at') ? Input::get('started_at') : null;
        $finished_at = Input::has('finished_at') ? Input::get('finished_at') : null;
        $variation = Input::has('variation') ? Input::get('variation') : 0;
        $test = Input::has('test') ? Input::get('test') : 1;
        $age = Input::has('age') ? Input::get('age') : null;
        $gender = Input::has('gender') ? Input::get('gender') : null;

        $record = Record::create([
            'answers' => $answers,
            'correct' => $correct,
            'total' => $total,
            'started_at' => Carbon::createFromFormat('D M d Y H:i:s e+', $started_at),
            'finished_at' => Carbon::createFromFormat('D M d Y H:i:s e+', $finished_at),
            'variation' => $variation,
            'test' => $test,
            'age' => $age,
            'gender' => $gender,
            'ip' => \Request::ip()
         ]);

        return json_encode($record);
    }
}
