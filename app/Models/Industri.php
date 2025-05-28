<?php




namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;




class Industri extends Model
{
    protected $fillable = ['nama', 'bidang_usaha', 'alamat', 'kontak', 'email', 'website'];
    public function pkl()
    {
        return $this->hasMany(Pkl::class);
    }
}

