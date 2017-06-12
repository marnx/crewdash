<?php

namespace App\Http\Controllers;

use App\Procedures;

use App\Certificate;

use Illuminate\Http\Request;

use App\http\Requests;

use Validator;

use Redirect;

use Log;

use Input;


class addprocedures extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("procedures");
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Dit code is de lijst van de tabel uit de database.
        $procedure = new Procedures;
        $procedure->Code = $request->code;
        $procedure->Name = $request->name;
        $procedure->name_file = $request->filename;

        $certificate = new Certificate;
        $certificate->Code = $request->code;
        $certificate->Name = $request->certificate_name;
        $certificate->name_file = $request->certificate_filename;

        $rules = array(
            'name' => 'required',
            'code' => 'required',
            'filename' => 'required|max:150000|mimes:docx,pdf, pptx, ppt');
        $validator = Validator::make($request->all(), $rules);
        /*if($validator->fails()) {
            $messages = $validator->messages();

            return Redirect::to('/procedures')->withErrors(
                $validator);
        } else if($validator->passes()){
            $procedure->save();
            return redirect::to('/procedures')->withRequest()->withErrors($validator);
        }*/
        //
        $procedure->name_file->move('Upload_procedures', $request->file('filename')->getClientOriginalName());
        $proceduredata=array(
            'name' => $procedure->Name,
            'code' => $procedure->Code,
            'name_file' => $request->file('filename')->getClientOriginalName()
        );
        Procedures::insert($proceduredata);

        $certificate->name_file->move('Upload_certificates', $request->file('certificate_filename')->getClientOriginalName());
        $certificatedata=array(
            'name' => $certificate->Name,
            'code' => $certificate->Code,
            'name_file' => $request->file('certificate_filename')->getClientOriginalName()
        );
        Certificate::insert($certificatedata);

        return redirect::to('/procedures');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
