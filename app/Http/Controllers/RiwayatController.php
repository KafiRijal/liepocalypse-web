<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Riwayat;
use Barryvdh\DomPDF\Facade\Pdf;

class RiwayatController extends Controller
{
    public function riwayat(Request $request)
    {
        $query = Riwayat::query();

        if (Auth::check()) {
            $query->where('user_id', Auth::id());
        }

        if ($request->has('q')) {
            $query->where('input_text', 'like', '%' . $request->q . '%');
        }

        $riwayats = $query->latest()->paginate(5);

        return view('riwayat', compact('riwayats'));
    }

    public function detail($id)
    {
        $riwayat = \App\Models\Riwayat::find($id);

        if (!$riwayat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        if (!is_null($riwayat->user_id) && $riwayat->user_id != Auth::id()) {
            return response()->json(['message' => 'Tidak diizinkan.'], 403);
        }

        return response()->json($riwayat);
    }

    public function downloadPdf($id)
    {
        $riwayat = Riwayat::findOrFail($id);

        $pdf = Pdf::loadView('pdf', compact('riwayat'));
        return $pdf->download('riwayat-' . $riwayat->id . '.pdf');
    }
    public function destroy($id)
    {
        $riwayat = Riwayat::find($id);

        if (!$riwayat) {
            return response()->json([
                'success' => false,
                'message' => 'Riwayat tidak ditemukan.'
            ]);
        }

        if (!is_null($riwayat->user_id) && $riwayat->user_id != Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak diizinkan.'
            ]);
        }

        $riwayat->delete();

        return response()->json(['success' => true]);
    }
}
