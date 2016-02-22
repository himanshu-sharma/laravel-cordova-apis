<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MobileUser;

class MobileUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * API Call: curl --user admin_user:password localhost:8000/api/v1/mobile_user
     */
    public function index()
    {
        $data = MobileUser::all();
        return $data->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Call API: curl -i --user ViOpGh7Qdk@gmail.com:password -d "cordova_version=6.0&device_model=iOS&device_platform=iOS&device_uuid=xxxxxxxxxx&device_version=iOS 6.1&device_manufacturer=Apple&device_isVirtual=false&device_serial=ZBHAAMXK123" http://localhost:8000/api/v1/mobile_user
     */
    public function store(Request $request)
    {
        $mobile_user = new MobileUser;
        $mobile_user->cordova_version = $request['cordova_version'];
        $mobile_user->device_model = $request['device_model'];
        $mobile_user->device_platform = $request['device_platform'];
        $mobile_user->device_uuid = $request['device_uuid'];
        $mobile_user->device_version = $request['device_version'];
        $mobile_user->device_manufacturer = $request['device_manufacturer'];
        $mobile_user->device_isVirtual = $request['device_isVirtual'];
        $mobile_user->device_serial = $request['device_serial'];
        $mobile_user->save();
        return Response()->json(array('success' => true), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * API Call: curl --user admin_user:password localhost:8000/api/v1/mobile_user/1
     */
    public function show($id)
    {
        // Make sure current user owns the requested resource
        $mobile_user = MobileUser::where('id', $id)->take(1)->get();
        return Response()->json(array('success' => true, 'users' => $mobile_user->toArray()), 200
        );
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * curl -i -X PUT --user admin_user:password -d 'device_isVirtual=true' localhost:8000/api/v1/mobile_user/1
     */
    public function update(Request $request, $id)
    {
        $mobile_user = MobileUser::find($id);
        if ($request['cordova_version']) {
            $mobile_user->cordova_version = $request['cordova_version'];
        }
        if ($request['device_version']) {
            $mobile_user->device_version = $request['device_version'];
        }
        if ($request['device_isVirtual']) {
            $mobile_user->device_isVirtual = $request['device_isVirtual'];
        }

        $mobile_user->save();
        return Response()->json(array('success' => true,'message' => 'user updated'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * API Call: curl -i -X DELETE --user admin_user:password localhost:8000/api/v1/mobile_user/1
     */
    public function destroy($id)
    {
        $mobile_user = MobileUser::find($id);
        $mobile_user->delete();
        return Response()->json(array('success' => true, 'message' => 'user deleted'), 200
        );
    }
}
