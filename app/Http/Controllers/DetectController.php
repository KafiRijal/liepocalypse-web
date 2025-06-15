<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetectController extends Controller
{
    public function detect(Request $request)
    {
        $textInput = $request->input('text');
        $linkInput = $request->input('url');
        $imageInput = $request->file('file');

        if (empty($textInput) && empty($linkInput) && !$imageInput) {
            return back()->withInput()->withErrors(['input_error' => 'Tidak ada input yang diberikan.']);
        }

        $flaskApiUrl = 'http://localhost:5000/api/detect';

        try {
            if (!empty($textInput)) {
                $response = Http::asForm()->post($flaskApiUrl, [
                    'text' => $textInput,
                ]);
            } elseif (!empty($linkInput)) {
                $response = Http::asForm()->post($flaskApiUrl, [
                    'url' => $linkInput,
                ]);
            } elseif ($imageInput) {
                $response = Http::attach(
                    'file',
                    file_get_contents($imageInput->getPathname()),
                    $imageInput->getClientOriginalName()
                )->post($flaskApiUrl);
            } else {
                return back()->with('error', 'Tidak ada input yang diberikan.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
