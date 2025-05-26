<?php
namespace App\Http\Controllers; 

use App\Models\Contact; 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Mail\FormSubmissionMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller 
{ 
public function index() 
{ 
    $contacts = Contact::paginate(20); 
    return view('contacts.index', compact('contacts')); 
} 

public function create() 
{ 
    return view('contacts.create'); 
} 

public function store(Request $request) 
{ 
    $request->validate([ 
    'name' => 'required|string', 
    'phone' => 'required|string', 
    'email' => 'required|string',
                                ]); 
    Contact::create($request->only('name', 'phone', 'email')); 
    return redirect()->route('contacts.index')->with('success', 'Contact  added successfully!'); 
} 

public function destroy(Contact $contact)
{
    $contact->delete();
    return redirect()->route('contacts.index')->with('success', 'kontaktas ištrintas');
}

public function trashed()
{
    $contacts = Contact::onlyTrashed()->paginate(20);
    return view('contacts.trashed', compact('contacts'));
}

public function restore($id)
{
    Contact::withTrashed()->findOrFail($id)->restore();
    return redirect()->route('contacts.trashed')->with('success', 'Kontaktas atkurtas!');
}

public function forceDelete($id)
{
    Contact::withTrashed()->findOrFail($id)->forceDelete();
    return redirect()->route('contacts.trashed')->with('success', 'Kontaktas visam laikui pašalintas.');
}

    public function submit(Request $request)
    {
        $formData = $request->all();

        // Išsiunčiame el. laišką su formos duomenimis
        Mail::to('rokas.raustys@stud.svako.lt')->send(new FormSubmissionMail($formData));

        return back()->with('success', 'Forma sėkmingai pateikta ir kopija išsiųsta el. paštu.');
    }

}

