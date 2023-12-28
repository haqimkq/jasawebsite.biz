<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'catatan',
        'status',
        'doneAt',
        'isConfirm',
        'todoFrom'
    ];

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'domain_todo', 'todo_id', 'domain_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_todo', 'todo_id', 'user_id');
    }

    public function label()
    {
        return $this->belongsToMany(LabelDomain::class, 'label_domain_todos', 'todo_id', 'label_domain_id');
    }
    public function from()
    {
        return $this->belongsTo(User::class, 'todoFrom');
    }
    public function file()
    {
        return $this->belongsToMany(FileTodo::class, 'todo_file_todo');
    }
}
