<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MainController extends Controller
{


    public function index()
    {
        return view('form');
    }

    public function CheckString()
    {
        $validator = Validator::make(request()->all() , [
			'txt_check'     => 'required|string|max:255',

		]);

        if ($validator->fails())
        {
			return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = array();

        $txt =request()->txt_check;
        $txt = preg_replace('/\s+/', '', $txt); // remove spaces

        $arr1 = str_split($txt); // split string into array of characters
        $arr2 = array_count_values($arr1); // count values of each character

        foreach($arr1 as $key=>$value){
            $prev_char = $next_char = null;
            $next_key = $key+1;
            $prev_key = $key-1;

            $dis = array_keys($arr1, $value);
            $first = reset($dis);
            $last = end($dis);
            $distance = $last - $first;
            if( isset($arr1[$next_key]) ){
                $next_char = $arr1[$next_key];
            }
            if( isset($arr1[$prev_key]) ){
                $prev_char = $arr1[$prev_key];
            }
            if(isset($data[$value])){
                $data[$value]['before'] = trim($data[$value]['before'] ,",").",".$next_char;
                $data[$value]['after']  = trim($data[$value]['after'] ,",").",".$prev_char;
            }
            else
            {
                $data[$value]=array(
                    "symbol" => $value,
                    "count" => $arr2[$value],
                    "before" => $next_char,
                    "after" => $prev_char,
                    "distance" => $distance
                );
            }
        }

        return view('grid',compact('txt','data'));

    }


}
