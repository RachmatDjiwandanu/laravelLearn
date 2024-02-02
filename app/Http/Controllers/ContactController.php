<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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

    public function update(Request $request, string $id): RedirectResponse
    {
      $contact = Contact::findOrFail($id);

      // Update contact
      $contact->update([
          'message' => $request->input('message'),
      ]);
      return redirect()
            ->route('template.contact')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id): RedirectResponse
    {
        // Get post by ID
        $contact = Contact::findOrFail($id);

        // Delete post
        $contact->delete();

        // Redirect to index
        return redirect()->route('template.contact')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
