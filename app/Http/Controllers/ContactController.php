<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\View\View; // Correct namespace for View class

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::latest()->get();
        return view('template.contact', [
            'title' => 'Contact',
            'items' => $contact,
        ]);
    }

    public function create()
    {
        return view('template.contact');
    }

    public function store(Request $request)
    {
        Contact::create([
            'message' => $request->input('message'),
        ]);

        return redirect()
            ->route('template.contact')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        // Get contact by ID
        $contact = Contact::findOrFail($id);

        // Render view with contact
        return view('template.edit', compact('contact'));
    }
}
