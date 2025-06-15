<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetectController extends Controller
{

    public function clearSession()
    {
        session()->forget('result');
        return back();
    }

    function api($method, $url, $t, $token = null, $data = null)
    {
        ini_set('max_execution_time', 3600);
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        if ($t == 'json') {
            $type = 'application/json';
        } elseif ($t == 'form') {
            $type = 'multipart/form-data';
        } else {
            $type = 'application/json';
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);

        $headers = ['Content-Type: ' . $type];
        if (!empty($token)) {
            $headers[] = 'Authorization: Bearer ' . $token;
            $headers[] = 'Ip-Adress: ' . $_SERVER['REMOTE_ADDR'];
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);

        switch (strtoupper($method)) {
            case "GET":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                break;
            case "POST":
            case "PUT":
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

                if ($t == 'json' && is_array($data)) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data)); // ✅ encode JSON
                } elseif ($t == 'form') {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // ✅ biarkan array (multipart/form-data)
                } else {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // fallback
                }
                break;
        }

        $curl_response = curl_exec($curl);
        curl_close($curl);

        return json_decode($curl_response);
    }
    public function detect(Request $request)
    {
        $textInput = $request->input('text');
        $linkInput = $request->input('url');
        $imageInput = $request->file('file');

        if (empty($textInput) && empty($linkInput) && !$imageInput) {
            return back()->withInput()->withErrors(['input_error' => 'Tidak ada input yang diberikan.']);
        }

        $flaskApiUrl = 'http://127.0.0.1:5000/api/detect';

        try {
            if (!empty($textInput)) {
                $response = $this->api('POST', $flaskApiUrl, 'form', null, [
                    'text' => $textInput,
                ]);
                session(['result' => $response]);

                // Redirect ke halaman hasil
                return redirect()->route('index');
            } elseif (!empty($linkInput)) {
                $response = $this->api('POST', $flaskApiUrl, 'form', null, [
                    'url' => $linkInput,
                ]);

                // Simpan ke session secara eksplisit
                session(['result' => $response]);

                // Redirect ke halaman hasil
                return redirect()->route('index');
            } elseif ($imageInput) {
                $response = $this->api('POST', $flaskApiUrl, 'form', null, [
                    'file' => curl_file_create($imageInput->getPathname(), $imageInput->getMimeType(), $imageInput->getClientOriginalName()),
                ]);
                session(['result' => $response]);

                // Redirect ke halaman hasil
                return redirect()->route('index');
            } else {
                return back()->with('error', 'Tidak ada input yang diberikan.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
