<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Car::all();
        return view('viewCar', ['cars'=> $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addNewCar', ['manufacturers'=>Manufacturer::all()]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $name = '';
        
        if($req -> hasFile('image')){
            $this->validate($req,[
                'image' =>'mimes:jpg,png,jpeg|max:2048',
            ],[
                'image.mimes'=>'Chỉ chấp nhận files ảnh',
                'image.max' => 'Chỉ chấp nhận files ảnh dưới 2Mb',

            ]);
            $file =$req ->file(('image'));
            $name = time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images');
            $file -> move($destinationPath, $name);
        }
        $this->validate($req,[
            'description'=>'required', 
            'model'=>'required',
            'produced_on'=>'required',
            
        ],[
            'description.required' =>'Bạn chưa nhập mô tả',
            'model.required' =>'Bạn chưa nhập model',
            'produced_on.required' =>'Bạn chưa nhập ngày sản xuất',
            'produced_on.date' =>'Cột produced_on phải là kiểu ngày!'
            
        ]);
        $car=new Car();
        $car->description=$req->description;
        $car->model=$req->model;
        $car->mf_id=$req->mf_id;
        $car->produced_on=$req->produced_on;
        $car->image=$name;
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Bạn đã thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $car = Car::find($id);
        $manufacturers = Manufacturer::all();
        // dd($car);
        return view('editCar', compact('car', 'manufacturers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $name = '';
        
        if($req -> hasFile('image')){
            $this->validate($req,[
                'image' =>'mimes:jpg,png,jpeg|max:2048',
            ],[
                'image.mimes'=>'Chỉ chấp nhận files ảnh',
                'image.max' => 'Chỉ chấp nhận files ảnh dưới 2Mb',

            ]);
            $file =$req ->file(('image'));
            $name = time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images');
            $file -> move($destinationPath, $name);
        }
        $this->validate($req,[
            'description'=>'required', 
            'model'=>'required',
            'produced_on'=>'required',
        ],[
            'description.required' =>'Bạn chưa nhập mô tả',
            'model.required' =>'Bạn chưa nhập model',
            'produced_on.required' =>'Bạn chưa nhập ngày sản xuất',
            'produced_on.date' =>'Cột produced_on phải là kiểu ngày!'
        ]);
        $car= Car::find($id);//Khac vs store()
        $car->description=$req->description;
        $car->model=$req->model;
        $car->mf_id=$req->mf_id;
        $car->produced_on=$req->produced_on;
        $car->image=$name;
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $car = Car::where($id)->delete();
        $car = Car::find($id);
        $linkImage = public_path('images/').$car->image;
        //Xoa luon anh trong thu muc, neu ko co cau lenh nay thi khi xoa anh van con trong thu muc
        if(File::exists($linkImage)){
            File::delete($linkImage);
        }
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Bạn đã xóa thành công');
    }
}
