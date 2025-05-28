<?php


namespace App\Actions\Fortify;


use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        // Validasi input dasar
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
        ])->validate();


        // Validasi apakah email terdaftar di tabel siswa atau guru
        $email = $input['email'];
        $terdaftarSebagaiSiswa = Siswa::where('email', $email)->exists();
        $terdaftarSebagaiGuru = Guru::where('email', $email)->exists();


        if (!$terdaftarSebagaiSiswa && !$terdaftarSebagaiGuru) {
            throw ValidationException::withMessages([
                'email' => 'Email ini tidak terdaftar.',
            ]);
        }


        // Buat user baru (role null dulu, nanti diatur oleh admin)
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => null,
        ]);
    }
}

