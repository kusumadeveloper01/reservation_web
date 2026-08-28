<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $guarded = ['id'];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'total_price' => 'decimal:2'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    public function hasConflict(): bool
    {
        return static::where('room_id', $this->room_id)
            ->where('id', '!=', $this->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('check_in', '<', $this->check_out)
            ->where('check_out', '>', $this->check_in)
            ->exists();
    }

    public function nights(): int
    {
        return $this->check_in->diffInDays($this->check_out);
    }
}
