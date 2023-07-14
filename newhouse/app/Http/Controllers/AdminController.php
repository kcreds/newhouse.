<?php

namespace App\Http\Controllers;

use App\Models\immovablesTemplate;
use Illuminate\Http\Request;
use App\Models\Immovables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;



class AdminController extends Controller
{
    public function list()
    {
        $template = immovablesTemplate::first();
        $immovables = Immovables::paginate(10);
        return view('immovables-list', ['immovables' => $immovables, 'template' => $template]);
    }
    public function add()
    {
        return view('immovables-add');
    }
    public function edit($slug)
    {
        $immovable = Immovables::find($slug);
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
            $immovables->slug = Str::slug($validatedData['slug']);
            $immovables->price =  $validatedData['price'];
            $immovables->extent =  $validatedData['extent'];
            $immovables->address =  $validatedData['address'];
            $immovables->short_desc =  $validatedData['short_desc'];
            if ($request->hasfile('main_photo')) {
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
            if ($request->hasfile('first_photo')) {
                $file = $request->file('first_photo');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/folder/images/';
                $filename =  time() . '-' . $file_extension;
                $request->file('first_photo')->move($destination_path, $filename);
                $immovables->first_photo = $filename;
            }
            $immovables->second_head =  $validatedData['second_head'];
            $immovables->second_desc =  $validatedData['name'];
            if ($request->hasfile('second_photo')) {
                $file = $request->file('second_photo');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/folder/images/';
                $filename =  time() . '-' . $file_extension;
                $request->file('second_photo')->move($destination_path, $filename);
                $immovables->second_photo = $filename;
            }

            if ($request->hasfile('photo_gallery')) {
                $photoGallery = $request->file('photo_gallery');
                $galleryFilenames = [];

                foreach ($photoGallery as $photo) {
                    $file_extension = $photo->getClientOriginalName();
                    $destination_path = public_path() . '/folder/images/';
                    $filename =  time() . '-' . $file_extension;
                    $photo->move($destination_path, $filename);

                    $galleryFilenames[] = $filename;
                }

                $immovables->photo_gallery = json_encode($galleryFilenames);
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
            $immovables->slug = Str::slug($validatedData['slug']);
            $immovables->price =  $validatedData['price'];
            $immovables->extent =  $validatedData['extent'];
            $immovables->address =  $validatedData['address'];
            $immovables->short_desc =  $validatedData['short_desc'];
            if ($request->hasfile('main_photo')) {
                $destination = public_path() . '/folder/images/' . $immovables->main_photo;
                if (File::exists($destination)) {
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
            if ($request->hasfile('first_photo')) {
                $destination = public_path() . '/folder/images/' . $immovables->first_photo;
                if (File::exists($destination)) {
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
            if ($request->hasfile('second_photo')) {
                $destination = public_path() . '/folder/images/' . $immovables->second_photo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('second_photo');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/folder/images/';
                $filename =  time() . '-' . $file_extension;
                $request->file('second_photo')->move($destination_path, $filename);
                $immovables->second_photo = $filename;
            }

            if ($request->hasFile('photo_gallery')) {
                $destination_path = public_path('folder/images/');
                $galleryFilenames = [];

                if ($immovables->photo_gallery) {
                    $photoGallery = $immovables->photo_gallery;
                    foreach ($photoGallery as $photo) {
                        $destination = $destination_path . $photo;
                        if (File::exists($destination)) {
                            File::delete($destination);
                        }
                    }
                }

                foreach ($request->file('photo_gallery') as $photo) {
                    $file_extension = $photo->getClientOriginalName();
                    $filename = time() . '-' . $file_extension;
                    $photo->move($destination_path, $filename);

                    $galleryFilenames[] = $filename;
                }

                $immovables->photo_gallery = json_encode($galleryFilenames);
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
        $destination1 = public_path() . '/folder/images/' . $immovables->main_photo;
        $destination2 = public_path() . '/folder/images/' . $immovables->first_photo;
        $destination3 = public_path() . '/folder/images/' . $immovables->second_photo;
        if (File::exists($destination1) || File::exists($destination2) || File::exists($destination2)) {
            File::delete($destination1);
            File::delete($destination2);
            File::delete($destination3);
        }

        $photoGallery = $immovables->photo_gallery;
        $destinationPath = public_path('/folder/images/');

        if (!empty($photoGallery)) {
            foreach ($photoGallery as $filename) {
                $destination = $destinationPath . $filename;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
        }

        $immovables->delete();
        return redirect()->route('immovables_list')->with('message', 'Usunięto poprawnie!');
    }

    public function deletePhoto(Request $request, $id, $photo)
    {
        $immovable = Immovables::find($id);

        if ($immovable) {
            $photoGallery = $immovable->photo_gallery;

            if (in_array($photo, $photoGallery)) {
                // Usuń plik z dysku
                $photoPath = public_path('folder/images/' . $photo);
                if (File::exists($photoPath)) {
                    File::delete($photoPath);
                }

                // Usuń zdjęcie z galerii
                $updatedGallery = array_diff($photoGallery, [$photo]);
                $immovable->photo_gallery = $updatedGallery;
                $immovable->save();

                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Nie można usunąć zdjęcia']);
    }
}
