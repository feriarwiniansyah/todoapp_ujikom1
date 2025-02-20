<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = ['name']; //untuk menentukan colom mana yang boleh diisi
    
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ]; //untuk menentukan colom mana yang tidak boleh diisi

    public function tasks() {
        return $this->hasMany(Task::class, 'list_id'); //digunakan untuk menghubungkan ke table task
    }
}