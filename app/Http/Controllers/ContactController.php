<?php

namespace App\Http\Controllers;

use App\Mail\testMail;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(){

        $data['contact'] = Contact::first();
        $data['sliders'] = Slider::all();

        return view('contact')->with($data);
    }
    
    public function all(){

        $contact = Contact::first();
        return view('admin.contact.index',['contact'=>$contact]);
    }

    public function add(Request $request){
        
       $data= $request->validate([
            'address' =>'required',
            'email' =>'required',
            'phone'=>'required',
        ]);

        Contact::Create($data);

        return back()->with('success','cntact added succesully');

    }

    public function contactForm(Request $request){

        $data=$request->validate([

            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        ContactForm::Create($data);


        return back()->with('success','Message
         Send Succssfully');
    }

    public function getFormContact(){
        $contacts = ContactForm::all();

        return view('admin.contact.form',
        ['contacts'=>$contacts]
    );
    }

    public function deleteContact($id){
        $contact=ContactForm::findOrFail($id)->delete();

        return back()->with('success','contact deleted successfully');
    }

    public function responceOne($id){
        $message = ContactForm::findOrFail($id);

        return view('admin.contact.recponce',['message'=>$message]);
    }

    public function responceTwo($id,Request $request){

        $message = ContactForm::findOrFail($id);
        $contacts = Contact::all();
        
        Mail::to($message->email)->send(new 
        testMail($request->name,$request->subject,$request->body));

        ContactForm::findOrFail($id)->update([
            'status'=>2
        ]);

        return redirect(url("contact/form"))->with(['contacts'=>$contacts])->with('success','email send successfully');

    }
}
