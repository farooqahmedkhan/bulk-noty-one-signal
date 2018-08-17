<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class AppController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = \App\Models\App::all();
        return $this->makeJSONResponse(true, '', $apps, []);                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->makeJSONResponse(true, 'This endpoint is not implemented', [], []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = null;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'one_signal_key' => 'required',
            'os' => 'required'
        ]);

        if(!$validator->fails()){
            $app = \App\Models\App::create($request->all());
            $response = $this->makeJSONResponse(true, '', $app, []);
        }else{
            $response = $this->makeJSONResponse(false, 'Invalid request', [], []);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $validator = Validator::make(array('id' => $id), [
            'id' => 'exists:apps'
        ]);
        if(!$validator->fails()){
            $app = \App\Models\App::find($id);            
            return $this->makeJSONResponse(true, '', $app, []);
        }else{
            return $this->makeJSONResponse(false, 'Invalid request', [], []);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->makeJSONResponse(true, 'This endpoint is not implemented', [], []);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $response = null;
        
        $params = $request->all();
        $params['id'] = $id;

        $validator = Validator::make($params, [
            'id' => 'required|exists:apps',
            'name' => 'required',
            'one_signal_key' => 'required',
            'os' => 'required'
        ]);
                
        if(!$validator->fails()){
            $app = \App\Models\App::find($id);
            $status = $app->update($request->all());
            $response = $this->makeJSONResponse(true, $status, $app, []);
        }else{
            $response = $this->makeJSONResponse(false, 'Invalid request', [], []);
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validator = Validator::make(array('id' => $id), [
            'id' => 'exists:apps'
        ]);
        if(!$validator->fails()){
            $app = \App\Models\App::find($id);
            $app->destroy();
            return $this->makeJSONResponse(true, 'App deleted successfully', [], []);
        }else{
            return $this->makeJSONResponse(false, 'Invalid request', [], []);
        }
    }
}
