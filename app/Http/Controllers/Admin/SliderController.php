<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Traits\StorageImageTrait;

class SliderController extends Controller
{

    use StorageImageTrait, DeleteModelTrait;

    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->paginate(5);

        return view('admin.slider.index', ['sliders' => $sliders]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataSliderCreate = [
                'name' => $request->slider_name,
                'description' => $request->description,
            ];

            $dataUploadImageName = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataUploadImageName)) {
                $dataSliderCreate['image_name'] = $dataUploadImageName['file_name'];
                $dataSliderCreate['image_path'] = $dataUploadImageName['file_path'];
            }

            $slider = $this->slider->create($dataSliderCreate);
            DB::commit();
            return redirect()->route('sliders.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message :" . $exception->getMessage() . '-' . 'line:' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);

        return view('admin.slider.edit', ['slider' => $slider]);
    }

    public function update(SliderRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataSliderUpdate = [
                'name' => $request->slider_name,
                'description' => $request->description,

            ];

            $dataUploadImageName = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataUploadImageName)) {
                $dataSliderUpdate['image_name'] = $dataUploadImageName['file_name'];
                $dataSliderUpdate['image_path'] = $dataUploadImageName['file_path'];
            }

            $this->slider->find($id)->update($dataSliderUpdate);

            DB::commit();
            return redirect()->route('sliders.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message :" . $exception->getMessage() . '-' . 'line:' . $exception->getLine());
        }
        return redirect()->route('sliders.index');
    }

    public function delete($id)
    {
        // try {
        //     $this->slider->find($id)->delete();

        //     return response()->json([
        //         'code' => 200,
        //         'message' => 'success'
        //     ], 200);
        // } catch (\Exception $exception) {
        //     Log::error("message :" . $exception->getMessage() . '-' . 'line:' . $exception->getLine());

        //     return response()->json([
        //         'code' => 500,
        //         'message' => 'error'
        //     ], 500);
        // }

        return $this->deleteModelTrait($id, $this->slider);

    }

    public function uploadImages(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
