<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $validator = Validator:: make($req->all(),[
            'a' => 'required|integer',
            'b' => 'required|integer',
            'cal'=>'required',
        ], [
            'a.required' => 'Hệ số a bắt buộc là số nguyên',
            'b.required' => 'Hệ số b bắt buộc là số nguyên',
            'a.numeric' => 'Hệ số a phải là số nguyên',
            'b.numeric' => 'Hệ số b phải là số nguyên',
            'cal.required' => 'Bắt buộc phải nhập đầy đủ',
        ]);
        
        if ($validator->fails()) {
            //
            $errors = $validator->errors();
            return view('calculation')->withErrors($errors);
        }
        //Xử lý
        $a = $req->input('a');
        $b = $req->input('b');
        $check= $req->input('cal');

        switch($check):
            case('+'):
                $ca = $a."+".$b."=" .($b + $a);
                break;
            case('-'):
                $ca = $a."-".$b."=" .($a - $b);
                break;
            case('*'):
                $ca = $a."*".$b."=" .($b * $a);
                break;
            case('/'):
                $ca = $b == 0 ? "Divison by zero": round($a / $b, 2);
                // break;
            default:
                $ca ="Ban chua chon";
        endswitch; 
        return view('calculation', compact('ca', 'check'));

    }

    
}
