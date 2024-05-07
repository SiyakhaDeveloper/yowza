<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DownloadHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DocumentLibraryController extends Controller
{
    //
    public function index()
    {
        if (! Gate::allows('course_access')) {
            return abort(401);
        }
        // $videos = SocialEnterpriseVideo::all();
        $documents = Document::paginate(10);

        return view('admin.library.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.library.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
            'date' => 'required|date',
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // Adjust file types and size as needed
        ]);

        $data = $request->all();
        $data['file_path'] = $request->file('file')->store('documents', 'public');

        $document = Document::create($data);

        return redirect()->route('admin.library.index')->with('success', 'Document uploaded successfully.');
    }

    public function show(Document $document)
    {
        return view('admin.library.show', compact('document'));
    }

    public function view(Document $document)
    {
        // Create a new record in download history
        $downloadHistory = new DownloadHistory();
        $downloadHistory->document_id = $document->id;
        $downloadHistory->user_id = auth()->id(); // Assuming the user is authenticated
        $downloadHistory->downloaded_at = now();
        $downloadHistory->save();

        // Redirect the user to download the file
        return redirect(asset('storage/' . $document->file_path));
    }

    public function download(Document $document): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        // Save the download history
        DownloadHistory::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'document_id' => $document->id,
            'downloaded_at' => now(),
        ]);

        // Redirect the user to download the file
        return redirect(asset('storage/' . $document->file_path));
    }

    public function edit(Document $document)
    {
        return view('admin.library.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
            'date' => 'required|date',
        ]);

        $document->update([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'status' => $request->input('status'),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('admin.library.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('admin.library.index')->with('success', 'Document deleted successfully.');
    }
}
