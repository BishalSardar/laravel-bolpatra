<?php

namespace App\Http\Controllers;

use App\Models\Bolpatra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;

class BolpatraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
            ]);

            $tender = new Bolpatra();

            if ($request->file('image') && $request->file('pdf')) {
                $imgFile = $request->file('image');
                $imgFileName = $imgFile->getClientOriginalName();
                $imgFile->move(public_path('Image'), $imgFileName);
                $tender['image'] = $imgFileName;

                $file = $request->file('pdf');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('PDF'), $filename);
                $tender['pdf'] = $filename;
            }
            $tender->title = $request->title;
            $tender->start_date = $request->start_date;
            $tender->ending_date = $request->ending_date;
            $tender->desc = $request->desc;
            $tender->save();
        } catch (Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', 'This is the error' . $exception);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bolpatra  $bolpatra
     * @return \Illuminate\Http\Response
     */
    public function show(Bolpatra $bolpatra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bolpatra  $bolpatra
     * @return \Illuminate\Http\Response
     */
    public function edit(Bolpatra $bolpatra, $id)
    {
        $item = Bolpatra::find($id);
        return view('update', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bolpatra  $bolpatra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bolpatra $bolpatra, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
            ]);

            $tender = Bolpatra::find($id);

            if ($request->file('image') && $request->file('pdf')) {
                $imgFile = $request->file('image');
                $imgFileName = $imgFile->getClientOriginalName();
                $imgFile->move(public_path('Image'), $imgFileName);
                $tender['image'] = $imgFileName;

                $file = $request->file('pdf');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('PDF'), $filename);
                $tender['pdf'] = $filename;
            }
            $tender->title = $request->title;
            $tender->start_date = $request->start_date;
            $tender->ending_date = $request->ending_date;
            $tender->desc = $request->desc;
            $tender->update();
        } catch (Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', 'This is the error' . $exception);
        }

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $data = Bolpatra::find($id);
        $image_dest = 'Image/' . $data->image;
        $pdf_des = 'PDF/' . $data->image;
        if (File::exists($image_dest, $pdf_des)) {
            File::delete($image_dest, $pdf_des);
        }
        $data->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bolpatra  $bolpatra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bolpatra $bolpatra)
    {
        //
    }
}
