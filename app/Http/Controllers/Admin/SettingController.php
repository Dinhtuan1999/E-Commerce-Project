<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\SliderRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);

        return view('admin.setting.index', ['settings' => $settings]);
    }

    public function create()
    {
        return view('admin.setting.create');
    }

    public function store(SettingRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataSettingCreate = [
                'config_value' => $request->config_value,
                'config_key' => $request->config_key,
                'type' => $request->type,
            ];

             $this->setting->create($dataSettingCreate);
            DB::commit();
            return redirect()->route('settings.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message :" . $exception->getMessage() . '-' . 'line:' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);

        return view('admin.setting.edit', ['setting' => $setting]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataSettingUpdate = [
                'config_value' => $request->config_value,
                'config_key' => $request->config_key,

            ];



            $this->setting->find($id)->update($dataSettingUpdate);

            DB::commit();
            return redirect()->route('settings.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message :" . $exception->getMessage() . '-' . 'line:' . $exception->getLine());
        }
        return redirect()->route('sliders.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }
}
