<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Lead;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Admission extends Component
{

    public $search;
    public $lead_id;
    public $leads = [];
    public $course_id;
    public $selectedCourse;

    public $payment;
    public function render()
    {
        $courses = Course::all();
        return view('livewire.admission',[
            'courses' => $courses
        ]);
    }

    public function search(){

        $this->leads = Lead::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('email','like', '%' . $this->search . '%' )
                            ->orWhere('phone','like', '%' . $this->search . '%' )
                            ->get();
    }

    public function courseSelected(){
        $this->selectedCourse = Course::findOrFail($this->course_id);
    }
    public function admit(){
            $lead = Lead::findOrFail($this->lead_id);
            $user = User::create([
                'name' => $lead->name,
                'email' => $lead->email,
                'password' => bcrypt('password')
            ]);
            $lead->delete();

            $invoice = Invoice::create([
                'due_date' => now()->addDays(7),
                'user_id' => $user->id

            ]);
          InvoiceItem::create([
                'name' => 'course :' . $this->selectedCourse->name,
                'price' => $this->selectedCourse->price,
                'quantity' => 1,
                'invoice_id' => $invoice->id,
            ]);

          $this->selectedCourse->students()->attach($user->id);

          if(!empty($this->payment)){
              Payment::create([
                  'price' => $this->payment,
                  'invoice_id' => $invoice->id,
                  'transaction_id' => str::random(8),
              ]);
          }

        $this->search = null;
        $this->lead_id = null;
        $this->course_id = null;
        $this->selectedCourse = null;
        $this->leads = [];


       flash()->addSuccess('admission complete');
    }
}
