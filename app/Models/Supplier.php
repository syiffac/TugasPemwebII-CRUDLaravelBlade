<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email',
        'status'
    ];

    public function getAllSuppliers()
    {
        return $this->all();
    }

    public function getSupplierById($id)
    {
        return $this->find($id);
    }

    public function createSupplier($data)
    {
        return $this->create($data);
    }

    public function updateSupplier($id, $data)
    {
        return $this->where('id', $id)->update($data);
    }

    public function deleteSupplier($id)
    {
        return $this->where('id', $id)->delete();
    }
}
