<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Immovables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;



class AdminController extends Controller
{
    public function list()
    {
        $immovables = Immovables::all();
        return view('immovables-list', ['immovables' => $immovables]);
    }
    public function add()
    {
        return view('immovables-add');
    }
    public function edit($slug)
    {
        $immovable =Immovables::find($slug);
        return view('immovables-edit', ['immovable' => $immovable]);
    }
    
    public function insert(Request $request)
    {
        $data = $request->all();
        $immovables = new Immovables();
        $validatedData = $immovables->validateData($data);
        if ($validatedData) {
        $immovables->fill($validatedData);
        $immovables->name =  $validatedData['name'];
        $immovables->meta_name =  $validatedData['meta_name'];
        $immovables->meta_desc =  $validatedData['meta_desc'];
        $immovables->metarobots =  $validatedData['metarobots'];
        $immovables->slug = Str::slug( $validatedData['slug']);
        $immovables->price =  $validatedData['price'];
        $immovables->extent =  $validatedData['extent'];
        $immovables->address =  $validatedData['address'];
        $immovables->short_desc =  $validatedData['short_desc'];
        if($request->hasfile('main_photo'))
        {
                $file = $request->file('main_photo');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/folder/images/';
                $filename =  time() . '-' . $file_extension;
                $request->file('main_photo')->move($destination_path, $filename);
                $immovables->main_photo = $filename;
        }
        $immovables->long_desc =  $validatedData['long_desc'];
        $immovables->first_head =  $validatedData['first_head'];
        $immovables->first_desc =  $validatedData['first_desc'];
        if($request->hasfile('first_photo'))
        {
                $file = $request->file('first_photo');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/folder/images/';
                $filename =  time() . '-' . $file_extension;
                $request->file('first_photo')->move($destination_path, $filename);
                $immovables->first_photo = $filename;
        }
        $immovables->second_head =  $validatedData['second_head'];
        $immovables->second_desc =  $validatedData['name'];
        if($request->hasfile('second_photo'))
        {
                $file = $request->file('second_photo');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/folder/images/';
                $filename =  time() . '-' . $file_extension;
                $request->file('second_photo')->move($destination_path, $filename);
                $immovables->second_photo = $filename;
        }

        
        $immovables->save();
        return redirect()->route('immovables_list')->with('message', 'Dodano poprawnie!');
        } else {
        return redirect()->back()->withErrors('Wystąpił błąd walidacji. Sprawdź wprowadzone dane.')->withInput();
        }

}
    public function update($id, Request $request)
    {
        $immovables = Immovables::find($id);

        $validatedData = $request->validate($immovables->validationRules($immovables));

        if ($validatedData) {
            $immovables->name =  $validatedData['name'];
            $immovables->meta_name =  $validatedData['meta_name'];
            $immovables->meta_desc =  $validatedData['meta_desc'];
            $immovables->metarobots =  $validatedData['metarobots'];
            $immovables->slug = Str::slug( $validatedData['slug']);
            $immovables->price =  $validatedData['price'];
            $immovables->extent =  $validatedData['extent'];
            $immovables->address =  $validatedData['address'];
            $immovables->short_desc =  $validatedData['short_desc'];
        if($request->hasfile('main_photo'))
        {
                $destination = public_path() . '/folder/images/'.$immovables->main_photo;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('main_photo');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/folder/images/';
                $filename =  time() . '-' . $file_extension;
                $request->file('main_photo')->move($destination_path, $filename);
                $immovables->main_photo = $filename;
        }
        $immovables->long_desc = $validatedData['long_desc'];
        $immovables->first_head = $validatedData['first_head'];
        $immovables->first_desc = $validatedData['first_desc'];
        if($request->hasfile('first_photo'))
        {
            $destination = public_path() . '/folder/images/'.$immovables->first_photo;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('first_photo');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/folder/images/';
                $filename =  time() . '-' . $file_extension;
                $request->file('first_photo')->move($destination_path, $filename);
                $immovables->first_photo = $filename;
        }
        $immovables->second_head = $validatedData['second_head'];
        $immovables->second_desc = $validatedData['second_desc'];
        if($request->hasfile('second_photo'))
        {
            $destination = public_path() . '/folder/images/'.$immovables->second_photo;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('second_photo');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/folder/images/';
                $filename =  time() . '-' . $file_extension;
                $request->file('second_photo')->move($destination_path, $filename);
                $immovables->second_photo = $filename;
        }

        
        $immovables->update();
        return redirect()->route('immovables_list')->with('message', 'Nadpisano poprawnie!');
    } else {
        return redirect()->back()->withErrors('Wystąpił błąd walidacji. Sprawdź wprowadzone dane.')->withInput();
        }
    }

    public function delete($slug)
    {
        $immovables = Immovables::find($slug);
        $destination1 = public_path() . '/folder/images/'.$immovables->main_photo;
        $destination2 = public_path() . '/folder/images/'.$immovables->first_photo;
        $destination3 = public_path() . '/folder/images/'.$immovables->second_photo;
        if(File::exists($destination1) || File::exists($destination2) || File::exists($destination2))
        {
            File::delete($destination1);
            File::delete($destination2);
            File::delete($destination3);
        }

        $immovables->delete();
        return redirect()->route('immovables_list')->with('message', 'Usunięto poprawnie!');
    }

}
