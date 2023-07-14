<?php

namespace App\Http\Controllers;

use App\Models\ImmovablesTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{

    public function updateTemplate(Request $request)
    {
        if ($request->hasFile('template_file')) {
            $file = $request->file('template_file');

            $originalFilename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $newFilename = 'custom_template.blade.' . $extension;

            if ($extension === 'php') {
                $path = 'templates/' . $newFilename;

                File::put(storage_path('app/' . $path), file_get_contents($file));
                $file->move(resource_path('views/templates'), $newFilename);

                $templateData = [
                    'name' => $originalFilename,
                    'path' => $path,
                ];

                ImmovablesTemplate::updateOrCreate([], $templateData);

                return redirect()->back()->with('message', 'Plik szablonu został zaktualizowany.');
            } else {
                return redirect()->back()->with('error', 'Przesłany plik musi mieć rozszerzenie .php.');
            }
        }
        return redirect()->back()->with('error', 'Brak pliku, bład przesyłania lub samego pliku.');
    }

    public function deleteTemplate()
    {
        $template = ImmovablesTemplate::first();
        if ($template) {
            
            Storage::delete($template->path);

            $viewsPath = resource_path('views/templates/custom_template.blade.php');
            if (file_exists($viewsPath)) {
                unlink($viewsPath);
            }
            Storage::delete('views/templates');

            $template->delete('views/templates');

            return redirect()->back()->with('message', 'Plik szablonu został usunięty.');

        }
    }
}