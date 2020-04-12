<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Pagination;
class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Pour les demandes de Rendez-vous
    public function index(){
        $contact = Contact::paginate(5);

        return view('email_contact', ['contacts' => $contact]);
    }

    //
    public function create(){
        return view('contacts');
    }

    // Pour enregistrer les contacts

    public function store(ContactRequest $request){

        $contact = new Contact;
        $contact->contact_name = $request->contact_name;
        $contact->contact_email = $request->contact_email;
        $contact->contact_message = $request->contact_message;

        // Envoie un email à l'admin diouldmariia@hotmail.fr
        Mail::to('diouldmariia@hotmail.fr')->send(new ContactMail($contact));

        $contact->save();
        return view('confirm');
    }
}
