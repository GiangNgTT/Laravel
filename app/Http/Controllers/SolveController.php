<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SolveController extends Controller
{
    public function solve(Request $req)
    {
        // $validated = $req->validate([
        //     'a' => 'required|integer',
        //     'b' => 'required|integer',
        // ], [
        //     'a.required' => 'Hệ số a bắt buộc là số nguyên',
        //     'b.required' => 'Hệ số b bắt buộc là số nguyên',
        //     'a.integer' => 'Hệ số a phải là số nguyên',
        //     'b.integer' => 'Hệ số b phải là số nguyên',
        // ]);
        $validator = Validator:: make($req->all(),[
            'a' => 'required|integer',
            'b' => 'required|integer',
        ], [
            'a.required' => 'Hệ số a bắt buộc là số nguyên',
            'b.required' => 'Hệ số b bắt buộc là số nguyên',
            'a.integer' => 'Hệ số a phải là số nguyên',
            'b.integer' => 'Hệ số b phải là số nguyên',
        ]);
        
        if ($validator->fails()) {
            //
            $errors = $validator->errors();
            return view('ptb1')->withErrors($errors);
        }
        $a = $req->input('a');
        $b = $req->input('b');
        if ($a == 0)
            if ($b == 0)
                $kq = "Phuong trinh vo so nghiem";
            else $kq = "Phuong trinh vo nghiem";
        else $kq = "Phuong trinh co nghiem x = " . round(-$b / $a, 2);;
        return view('ptb1', compact('a', 'b', 'kq'));
    }
}
