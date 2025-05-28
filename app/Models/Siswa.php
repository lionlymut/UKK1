<?php




namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;




class Siswa extends Authenticatable
{
    protected $fillable = ['nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'foto', 'status_pkl'];
    protected $hidden = ['password'];
    // Model Siswa.php buat ambil siswa yang udah kirim data biar true
    public function pkl()
    {
        return $this->hasOne(Pkl::class, 'siswa_id', 'id');  // Sesuaikan dengan nama kolom yang ada
    }
 // Accessor status_pkl
 public function getStatusPklAttribute()
 {
     return $this->pkl()->exists();
 }




}



