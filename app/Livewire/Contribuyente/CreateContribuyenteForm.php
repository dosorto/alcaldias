<?php

namespace App\Livewire\Contribuyente;

use App\Models\Contribuyente;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\Select;
use App\Models\TipoPropiedad;
use App\Models\Georeferenciacion;
use App\Models\Barrio;
use App\Models\Paise;
use App\Models\Departamento;

use App\Models\Municipio;
use App\Models\Aldea;


use Filament\Forms\Get;

class CreateContribuyenteForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ClaveCatastral')
                    ->label('Clave Catastral')
                    ->required(),

                Select::make('ContribuyenteId')
                    ->options(
                        Contribuyente::all()->pluck('primer_nombre', 'id')
                    )
                    ->searchable(['identidad']),

                Select::make('TipoPropiedadId')
                    ->options(
                        TipoPropiedad::all()->pluck('Nombre', 'id')
                    )
                    ->searchable(['Nombre']),

                Select::make('IdGeoreferencia')
                    ->options(
                        Georeferenciacion::all()->pluck('id', 'id')
                    )
                    ->searchable(['Nombre']),

                Select::make('IdPais')
                    ->label('Pais')
                    ->options(
                        Paise::all()->pluck('nombre', 'id')
                    )
                    ->live()
                    ->searchable(['Nombre']),

                Select::make('IdDepartamento')
                    ->label('Departamento')
                    ->options(
                        /*   fn (Get $get) => Centro::find($get('centro_id'))
                                        ->carreras->pluck('nombre', 'id') */
                        fn(Get $get) => Departamento::where('pais_id', $get('IdPais'))
                            ->pluck('name', 'id')

                    )
                    ->live()
                    ->disabled(fn(Get $get) => $get('IdPais') == null),

                Select::make('IdMunicipio')
                    ->label('Municipio')
                    ->options(
                        fn(Get $get) => Municipio::where('departamento_id', $get('IdDepartamento'))
                            ->pluck('name', 'id')
                    )
                    ->live()
                    ->disabled(fn(Get $get) => $get('IdDepartamento') == null),


                Select::make('IdAldea')
                    ->label('Aldea')
                    ->options(
                        fn(Get $get) => Aldea::where('municipio_id', $get('IdMunicipio'))
                            ->pluck('nombre', 'id')
                    )
                    ->live()
                    ->disabled(fn(Get $get) => $get('IdMunicipio') == null),

                Select::make('IdBarrio')
                    ->label('Barrio')
                    ->options(
                        fn(Get $get) => Barrio::where('aldea_id', $get('IdAldea'))
                            ->pluck('nombre', 'id')
                    )
                    ->live()
                    ->disabled(fn(Get $get) => $get('IdAldea') == null),

                TextInput::make('Direccion')
                ->columnSpanFull()
                    ->label('Direccion')
                    ->required(),
                    

                

            
                        


            ])
            ->columns(2)
            ->statePath('data')
            ->model(Contribuyente::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Contribuyente::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.contribuyente.create-contribuyente-form');
    }
}