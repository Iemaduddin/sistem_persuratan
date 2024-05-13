<?php

namespace App\Http\Controllers;

use App\Models\Sender;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSenderRequest;
use App\Http\Requests\UpdateSenderRequest;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }
    public function oki()
    {
        $okis = Sender::where('scope', '=', 'OKI')->get();
        return view('admin.senders.oki-management', compact('okis'));
    }
    public function naungan()
    {
        $naungans = Sender::where('scope', '=', 'Naungan')->get();
        return view('admin.senders.naungan-management', compact('naungans'));
    }
    public function others()
    {
        $others = Sender::where('scope', '!=', 'OKI')
            ->where('scope', '!=', 'Naungan')->get();
        return view('admin.senders.others-management', compact('others'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $senders = new Sender();
        $senders->scope = $request->scope;
        $senders->name = $request->name;
        $senders->save();
        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Sender $sender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sender $sender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $sender_id)
    {
        $senders = Sender::where('id', $sender_id);
        $senders->update([
            'name' => $request->name
        ]);
        toast('Berhasil Update Data', 'success');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sender_id)
    {
        Sender::destroy($sender_id);
        return back();
    }
}
