<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'due_date',
        'paid_date',
        'user_id'
    ];
    public function items(){
        return $this->hasMany(InvoiceItem::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'invoice_id');
    }
    public function amounts(){
        $amounts = [
            'total' => 0,
            'paid' => 0,
            'due' => 0
        ];

        foreach($this->items as $item){
            $amounts['total'] += $item->price * $item->quantity;
        }

        foreach($this->payments as $item){
            $amounts['paid'] += $item->price * $item->quantity;
        }

        foreach($this->payments as $item){
            $amounts['due'] = $amounts['total'] - $amounts['paid'];
        }
        return $amounts;
    }
}
