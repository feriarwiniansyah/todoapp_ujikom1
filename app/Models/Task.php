<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ]; //proteksi yang bisa diisi dan agar tidak ketersesat pada saat menginput data

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ]; //proteksi unutk field yang ada diatas

    const PRIORITIES = [
        'low',
        'medium',
        'high'
    ]; //const adalah nilai yang tidak bisa dirubah serta untuk mendapatkan prioritas yang akan setiap prioritas yang dibutuhkan

    public function getPriorityClassAttribute() {
        return match($this->attributes['priority']) {
            'low' => 'success',
            'medium' => 'warning',
            'high' => 'danger',
            default => 'secondary'
        };
    } //ini untuk memunculkan warna disetiap field priority

    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id');
    }
}