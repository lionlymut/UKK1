<?php




namespace App\Filament\Resources;




use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;




class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';




    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('nama')
                ->required()
                ->maxLength(255),


            Forms\Components\TextInput::make('nis')
                ->required()
                ->unique(ignoreRecord: true, column: 'nis', table: 'siswas')
                ->maxLength(255)
                ->validationMessages([
                'unique' => 'NIS sudah dipakai.',
            ]),


            Forms\Components\Select::make('gender')
                ->required()
                ->options([
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan',
                ]),


            Forms\Components\TextInput::make('alamat')
                ->required()
                ->maxLength(255),


            Forms\Components\TextInput::make('kontak')
                ->required()
                ->tel()
                ->maxLength(255),


            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->unique(ignoreRecord: true)
                ->maxLength(255),


            Forms\Components\FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->disk('public') // ini wajib!
                ->directory('uploads')
                ->preserveFilenames()
                ->visibility('public')
                ->columnSpanFull()
                ->nullable(),




 
            Forms\Components\Toggle::make('status_pkl')
            ->label('Status PKL')
            ->reactive()
            ->afterStateUpdated(function (bool $state, $record) {
        DB::transaction(function () use ($state, $record) {
            try {
                // Update status PKL di tabel siswas
                $record->update(['status_pkl' => $state]);




                if ($state) {
                    // Jika status menjadi true, tambahkan ke tabel pkl
                    $record->pkl()->create([
                        'siswa_id' => $record->id,
                        'tanggal_mulai' => now(),
                        'tanggal_selesai' => now()->addMonths(3),
                    ]);
                } else {
                    // Jika status menjadi false, hapus dari tabel pkl
                    $record->pkl()->delete();
                }




                // Logging untuk debugging
                \Log::info("Transaction berhasil: Status PKL siswa ID {$record->id} diubah ke " . ($state ? 'true' : 'false'));




            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error("Transaction gagal: " . $e->getMessage());
            }
        });
    }),
 
        ]);
}


public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama')
                ->label('Nama')
                ->searchable()
                ->sortable(),


            Tables\Columns\TextColumn::make('nis')
                ->label('NIS')
                ->searchable()
                ->sortable(),


            Tables\Columns\TextColumn::make('gender')
                ->label('Jenis Kelamin')
                ->sortable()
                ->formatStateUsing(fn ($state) => $state === 'L' ? 'Laki-laki' : 'Perempuan'),


            Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat')
                ->limit(30),


            Tables\Columns\TextColumn::make('kontak')
                ->label('Kontak'),


            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable(),


            Tables\Columns\ImageColumn::make('foto')
                ->label('Foto')
                ->disk('public')
                ->circular()
                ->height(40),






                Tables\Columns\TextColumn::make('status_pkl')
                ->label('Status PKL')
                ->badge()
                ->formatStateUsing(fn ($record) => $record->status_pkl ? 'true' : 'false')
                ->colors([
                    'success' => fn ($state) => $state === 'true' ? 'green' : null,
                    'danger' => fn ($state) => $state === 'false' ? 'red' : null,
                ]),
           
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}


    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}









