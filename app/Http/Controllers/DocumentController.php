<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sender;
use App\Models\Document;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\GoogleSheet;
use App\Exports\DocumentsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function suratMasuk()
    {
        $suratMasuk = Document::where('category', '=', 'Surat Masuk')
            ->orderBy('created_at', 'desc')
            ->get();
        $senders = Sender::all();
        return view('document.surat.suratMasuk-management', compact('suratMasuk', 'senders'));
    }
    public function suratKeluar()
    {
        $suratKeluar = Document::where('category', '=', 'Surat Keluar')
            ->orderBy('no_surat', 'desc')
            ->get();
        return view('document.surat.suratKeluar-management', compact('suratKeluar'));
    }
    public function proposalHmti()
    {
        $proposalHmti = Document::where('category', '=', 'Proposal AA')
            ->orWhere('category', '=', 'Proposal Real')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('document.proposal.proposalHmti-management', compact('proposalHmti'));
    }
    public function proposalNaungan()
    {
        $proposalNaungan = Document::where('category', '=', 'Proposal WRI')
            ->orWhere('category', '=', 'Proposal ITDEC')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('document.proposal.proposalNaungan-management', compact('proposalNaungan'));
    }
    public function lpjHmti()
    {
        $lpjHmti = Document::where('category', '=', 'LPJ AA')
            ->orWhere('category', '=', 'LPJ Real')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('document.lpj.lpjHmti-management', compact('lpjHmti'));
    }
    public function lpjNaungan()
    {
        $lpjNaungan = Document::where('category', '=', 'LPJ WRI')
            ->orWhere('category', '=', 'LPJ ITDEC')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('document.lpj.lpjNaungan-management', compact('lpjNaungan',));
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
    public function store(Request $request, GoogleSheet $googleSheet)
    {
        $valid = Validator::make($request->all(), [
            'other_sender' => 'unique:senders,name',
        ]);

        if ($valid->fails()) {
            toast('Gagal!. Nama Pengirim Sudah Ada', 'error');
            return back();
        }

        if ($request->other_sender != null) {
            $senders = new Sender();
            $senders->scope = "Others";
            $senders->name = $request->other_sender;
            $senders->save();
        }
        // Kategori Dokumen
        $categoryDoc = $request->category;
        $documents = new Document();
        if ($request->hasFile('fileDocument')) {
            $validator = Validator::make($request->all(), [
                'fileDocument' => 'required|file|mimes:pdf',
            ]);

            if ($validator->fails()) {
                toast('Gagal!. File harus PDF', 'error');
                return back();
            }
            $file = $request->file('fileDocument');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $department = Department::find($request->department_id);
            $sender = Sender::find($request->sender_id);
            $documents = new Document();

            $categoryDoc = $request->category;
            if ($request->has('department_id') && $request->department_id != null) {
                $departName = $department->name;
                if ($request->eventCategory == 'Proker') {
                    if ($request->category == 'Surat Keluar' && !$request->has('needCategory')) {
                        $file->storeAs("HMTI/{$categoryDoc}/{$departName}/Proker/Surat/", $fileName, 'public');
                        $fileSave = 'HMTI/' . $categoryDoc . '/' . $departName . '/Proker/Surat/' . $fileName;
                        $documents->fileDocument = $fileSave;
                    }
                } elseif ($request->eventCategory == 'Agenda') {
                    if ($request->category == 'Surat Keluar') {
                        $file->storeAs("HMTI/{$categoryDoc}/{$departName}/Agenda/", $fileName, 'public');
                        $fileSave = 'HMTI/' . $categoryDoc . '/' . $departName . '/Agenda/' . $fileName;
                        $documents->fileDocument = $fileSave;
                    }
                }
                if (Str::startsWith($request->category, 'Proposal') || Str::startsWith($request->category, 'LPJ')) {
                    $file->storeAs("HMTI/Proposal_LPJ/{$departName}/{$request->event}", $fileName, 'public');
                    $fileSave = 'HMTI/Proposal_LPJ' . '/' . $departName . '/' . $request->event . '/' . $fileName;
                    $documents->fileDocument = $fileSave;
                }
            } elseif ($request->has('department_id') && $request->department_id == null) {
                if ($request->category == 'Surat Keluar' && $request->has('allotment')) {
                    // Selain 
                    if ($request->other_needCategory == null) {
                        $file->storeAs("HMTI/{$categoryDoc}/{$request->allotment}/", $fileName, 'public');
                        $fileSave = 'HMTI/' . $categoryDoc . '/' . $request->allotment . '/' . $fileName;
                        $documents->fileDocument = $fileSave;
                    } else {
                        $file->storeAs("HMTI/{$categoryDoc}/{$request->other_needCategory}/", $fileName, 'public');
                        $fileSave = 'HMTI/' . $categoryDoc . '/' .  $request->other_needCategory . '/' . $fileName;
                        $documents->fileDocument = $fileSave;
                    }
                }
            } elseif (!$request->has('department_id')) {
                if ($request->category == 'Surat Masuk') {
                    if ($request->sender_id != '') {
                        $senderName = $sender->name;
                    } else {
                        $senderName = $request->other_sender;
                    }
                    $file->storeAs("HMTI/{$categoryDoc}/{$senderName}/", $fileName, 'public');
                    $fileSave = 'HMTI/' . $categoryDoc . '/' . $senderName . '/' . $fileName;
                    $documents->fileDocument = $fileSave;
                } elseif (Str::endsWith($request->category, 'WRI')) {
                    $file->storeAs("Naungan/WRI/{$request->event}", $fileName, 'public');
                    $fileSave =  'Naungan/WRI/' . $request->event . '/' . $fileName;
                    $documents->fileDocument = $fileSave;
                } elseif (Str::endsWith($request->category, 'ITDEC')) {
                    $file->storeAs("Naungan/ITDEC/{$request->event}", $fileName, 'public');
                    $fileSave =  'Naungan/ITDEC/' . $request->event . '/' . $fileName;
                    $documents->fileDocument = $fileSave;
                }
            }
        }
        $documents->category = $request->category;
        $documents->no_surat = $request->no_surat;
        $documents->department_id = $request->department_id;
        $documents->sender_id = $request->sender_id;

        if ($request->allotment != null) {
            $documents->allotment = $request->allotment;
        } else {
            $documents->allotment = $request->other_needCategory;
        }

        $documents->eventCategory = $request->eventCategory;
        $documents->event = $request->event;
        $documents->description = $request->description;

        $documents->save();
        // $data = [
        //     $documents->id,
        //     $documents->category,
        //     $documents->no_surat,
        //     $documents->sender_id,
        //     $documents->department_id,
        //     $documents->eventCategory,
        //     $documents->allotment,
        //     $documents->event,
        //     $documents->description,
        //     $documents->fileDocument,
        //     $documents->created_at->format('Y-m-d H:i:s'), // Format the date as a string
        //     $documents->updated_at->format('Y-m-d H:i:s')  // Format the date as a string
        // ];

        // $googleSheet->createData($data);
        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        // Cek apakah user menambahkan pengirim baru
        if ($request->other_sender != null) {
            $sender = new Sender();
            $sender->scope = "Others";
            $sender->name = $request->other_sender;
            $sender->save();
            $senderId = $sender->id;
        }

        // Validasi file
        if ($request->hasFile('fileDocument')) {
            $validator = Validator::make($request->all(), [
                'fileDocument' => 'file|mimes:pdf',
            ]);

            if ($validator->fails()) {
                toast('Gagal!. File harus PDF', 'error');
                return back();
            }
            // Hapus file lama jika ada
            if (Storage::disk('public')->exists($document->fileDocument)) {
                Storage::disk('public')->delete($document->fileDocument);
            }
            $file = $request->file('fileDocument');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $department = Department::find($request->department_id);
            $sender = Sender::find($request->sender_id);

            $categoryDoc = $request->category;
            if ($request->has('department_id') && $request->department_id != null) {
                $departName = $department->name;
                if ($request->eventCategory == 'Proker') {
                    if ($request->category == 'Surat Keluar' && !$request->has('needCategory')) {
                        $file->storeAs("{$categoryDoc}/{$departName}/Proker/Surat/", $fileName, 'public');
                        $fileSave = $categoryDoc . '/' . $departName . '/Proker/Surat/' . $fileName;
                        $document->fileDocument = $fileSave;
                    }
                } elseif ($request->eventCategory == 'Agenda') {
                    if ($request->category == 'Surat Keluar') {
                        $file->storeAs("{$categoryDoc}/{$departName}/Agenda/", $fileName, 'public');
                        $fileSave = $categoryDoc . '/' . $departName . '/Agenda/' . $fileName;
                        $document->fileDocument = $fileSave;
                    }
                }
                if (Str::startsWith($request->category, 'Proposal') || Str::startsWith($request->category, 'LPJ')) {
                    $file->storeAs("/Proposal_LPJ/{$departName}/{$request->event}", $fileName, 'public');
                    $fileSave = 'Proposal_LPJ' . '/' . $departName . '/' . $request->event  . '/' . $fileName;
                    $document->fileDocument = $fileSave;
                }
            } elseif ($request->has('department_id') && $request->department_id == null) {
                if ($request->category == 'Surat Keluar' && $request->has('allotment')) {
                    // Selain 
                    if ($request->other_needCategory == null) {
                        $file->storeAs("{$categoryDoc}/{$request->allotment}/", $fileName, 'public');
                        $fileSave = $categoryDoc . '/' . $request->allotment . '/' . $fileName;
                        $document->fileDocument = $fileSave;
                    } else {
                        $file->storeAs("{$categoryDoc}/{$request->other_needCategory}/", $fileName, 'public');
                        $fileSave = $categoryDoc . '/' .  $request->other_needCategory . '/' . $fileName;
                        $document->fileDocument = $fileSave;
                    }
                }
            } elseif (!$request->has('department_id') && $request->category == 'Surat Masuk') {
                if ($request->sender_id != '') {
                    $senderName = $sender->name;
                } else {
                    $senderName = $request->other_sender;
                }
                $file->storeAs("{$categoryDoc}/{$senderName}/", $fileName, 'public');
                $fileSave = $categoryDoc . '/' . $senderName . '/' . $fileName;
                $document->fileDocument = $fileSave;
            }
        }

        // Update atribut lainnya
        $document->category = $request->category;
        $document->no_surat = $request->no_surat;
        $document->department_id = $request->department_id;
        $document->sender_id = $request->sender_id;
        if (!$request->has('allotment')) {
            $document->allotment = $request->allotment;
        } else {
            $document->allotment = $request->other_allotment;
        }
        $document->eventCategory = $request->eventCategory;
        $document->event = $request->event;
        $document->description = $request->description;
        $document->save();

        // toast('Berhasil Memperbarui Data', 'success');
        return redirect()->back()->with('success', 'Data berhasil disimpan');;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($document_id)
    {
        // Mengambil alamat file dari model Document yang akan dihapus
        $document = Document::findOrFail($document_id);
        $filePath = $document->fileDocument;

        // Menghapus file dari penyimpanan
        Storage::disk('public')->delete($filePath);

        // Menghapus data dari database
        Document::destroy($document_id);

        return back();
    }
    public function export_excel()
    {
        return Excel::download(new DocumentsExport, 'Report-Persuratan-' . Carbon::now()->translatedFormat('l, j F Y H:i:s') . '.xlsx');
    }

    public function getDataChart(Request $request)
    {
        $selectedYear = $request->input('year', Carbon::now()->year);
        // Radial chart
        $radialSuratKeluar = Document::where('category', 'Surat Keluar')
            ->select('department_id', 'allotment', DB::raw('count(*) as total'))
            ->groupBy('department_id', 'allotment')
            ->with('department', 'sender')
            ->get();
        // Ambil jumlah total untuk masing-masing departemen atau allotment
        $category = $radialSuratKeluar->groupBy(function ($item) {
            return $item['department']['name'] ?? $item['allotment'];
        })->map(function ($group) {
            return $group->sum('total');
        });
        $nameCategoryRadial = $category->keys();
        $totalCategoryRadial = $category->values();


        // Bar Chart
        $kategoriBerkasNaungan = ['Proposal WRI', 'LPJ WRI', 'Proposal ITDEC', 'LPJ ITDEC'];
        $queryBerkasNaungan = Document::whereIn('category', $kategoriBerkasNaungan)
            ->select(DB::raw('count(*) as total'))
            ->first();
        $lainnyaData = Document::whereNotIn('category', $kategoriBerkasNaungan)
            ->select('category', DB::raw('count(*) as total'))
            ->groupBy('category')->get();
        $totalBerkasNaungan = $queryBerkasNaungan ? $queryBerkasNaungan->total : 0;
        $barPerCategory = [];
        // Gabungkan total kategori Berkas Naungan dengan kategori lainnya
        if ($totalBerkasNaungan > 0) {
            $barPerCategory['Berkas Naungan'] = $totalBerkasNaungan;
        }
        // Gabungkan hasil query untuk kategori lainnya dengan kategori Berkas Naungan
        foreach ($lainnyaData as $data) {
            if ($data->total > 0) {
                $barPerCategory[$data->category] = $data->total;
            }
        }
        krsort($barPerCategory);

        // Line Chart
        $dataPerBulan = [];
        // Iterasi melalui setiap bulan
        for ($i = 1; $i <= 12; $i++) {
            // Format bulan menjadi dua digit
            $bulan = str_pad($i, 2, '0', STR_PAD_LEFT);

            // Ambil nama bulan
            $namaBulan = Carbon::create()->month($i)->monthName;

            // Ambil data Surat Keluar untuk bulan tertentu
            // Array yang berisi kategori yang ingin digabungkan menjadi satu
            $kategoriBerkasNaungan = ['Proposal WRI', 'LPJ WRI', 'Proposal ITDEC', 'LPJ ITDEC'];
            // Query untuk kategori lainnya
            $queryLainnya = Document::whereYear('created_at', $selectedYear)
                ->whereMonth('created_at', $bulan)
                ->whereNotIn('category', $kategoriBerkasNaungan)
                ->select('category', DB::raw('count(*) as total'))
                ->groupBy('category');
            // Ambil data untuk kategori lainnya
            $lainnyaData = $queryLainnya->get();

            // Query untuk kategori Berkas Naungan
            $queryBerkasNaungan = Document::whereYear('created_at', $selectedYear)
                ->whereMonth('created_at', $bulan)
                ->whereIn('category', $kategoriBerkasNaungan)
                ->select(DB::raw('count(*) as total'))
                ->first();

            // Ambil jumlah total untuk kategori Berkas Naungan
            $totalBerkasNaungan = $queryBerkasNaungan ? $queryBerkasNaungan->total : 0;
            $linePerCategory = [];
            // Gabungkan total kategori Berkas Naungan dengan kategori lainnya
            if ($totalBerkasNaungan > 0) {
                $linePerCategory['Berkas Naungan'] = $totalBerkasNaungan;
            }
            // Gabungkan hasil query untuk kategori lainnya dengan kategori Berkas Naungan
            foreach ($lainnyaData as $data) {
                if ($data->total > 0) {
                    $linePerCategory[$data->category] = $data->total;
                }
            }
            // dd($linePerCategory);
            // Simpan data ke dalam array dengan nama bulan sebagai kunci
            $dataPerBulan[$namaBulan] = $linePerCategory;
        }
        foreach ($dataPerBulan as &$bulanData) {
            krsort($bulanData);
        }
        // dd($dataPerBulan);

        return response()->json([
            'nameCategoryRadial' => $nameCategoryRadial,
            'totalCategoryRadial' => $totalCategoryRadial,
            'kategoriPerBulan' => $dataPerBulan,
            'kategoriAll' => $barPerCategory,
        ]);
    }
}