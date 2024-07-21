<?php

namespace App\Livewire;

use App\Models\Propiedad;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\Contribuyente;
use App\Models\TipoPropiedad;
use App\Models\Paise;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Aldea;
use App\Models\Barrio;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Repeater;

class VerPropiedad extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Propiedad $record;

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ClaveCatastral')
                    ->label('Clave Catastral')
                    ->required()
                    ->disabled(),

                Select::make('IdContribuyente')
                    ->label('Contribuyente')
                    ->options(
                        Contribuyente::all()->pluck('primer_nombre', 'id')
                    )
                    ->searchable()
                    ->disabled(),

                Select::make('IdTipoPropiedad')
                    ->label('Tipo Propiedad')
                    ->options(
                        TipoPropiedad::all()->pluck('Nombre', 'id')
                    )
                    ->searchable(['Nombre'])
                    ->disabled(),

                Select::make('IdPais')
                    ->label('Pais')
                    ->default($this->record->barrio->aldea->municipios->departamentos->paises->id)
                    ->options(
                        Paise::pluck('nombre', 'id')
                        ->toArray()
                    )
                    ->live()
                    ->selectablePlaceholder(false)
                    ->disabled(),

                Select::make('IdDepartamento')
                    ->label('Departamento')
                    ->default(6)
                    // ->default($this->record->barrio->aldea->municipios->departamentos->id)
                    ->options(
                    function (Get $get) {
                            $paisId = $get('IdPais');
                            
                            if ($paisId) {
                                return Departamento::where('pais_id', $paisId)->pluck('name', 'id');
                            }
                            
                            $defaultPaisId = $this->record->barrio->aldea->municipios->departamentos->paises->id; 
                            return Departamento::where('pais_id', $defaultPaisId)->pluck('name', 'id');
                        }
                        
                        )
                    ->live()
                    ->disabled()
                    ->selectablePlaceholder(false),

                Select::make('IdMunicipio')
                    ->label('Municipio')
                    ->default($this->record->barrio->aldea->municipios->id)
                    ->options(
                        function (Get $get) {
                            $departamentoId = $get('IdDepartamento');
                
                            if ($departamentoId) {
                                return Municipio::where('departamento_id', $departamentoId)->pluck('name', 'id');
                            }
                
                            $defaultId = $this->record->barrio->aldea->municipios->departamentos->id; 
                            return Municipio::where('departamento_id', $defaultId)->pluck('name', 'id');
                        }
                    )
                    ->live()
                    ->disabled()
                    ->selectablePlaceholder(false),


                Select::make('IdAldea')
                    ->label('Aldea')
                    ->default($this->record->barrio->aldea->id)
                    ->options(
                        function (Get $get) {
                            $Id = $get('IdMunicipio');
                
                            if ($Id) {
                                return Aldea::where('Municipio_id', $Id)->pluck('nombre', 'id');
                            }
                
                            $defaultId = $this->record->barrio->aldea->municipios->id; 
                            return Aldea::where('Municipio_id', $defaultId)->pluck('nombre', 'id');
                        }
                    )
                    ->live()
                    ->disabled()
                   ->selectablePlaceholder(false),

                Select::make('IdBarrio')
                    ->label('Barrio')
                    ->default($this->record->barrio->id)
                    ->options(
                        function (Get $get) {
                            $Id = $get('IdAldea');
                
                            if ($Id) {
                                return Barrio::where('Aldea_id', $Id)->pluck('nombre', 'id');
                            }
                
                            $defaultId = $this->record->barrio->aldea->id; 
                            return Barrio::where('Aldea_id', $defaultId)->pluck('nombre', 'id');
                        }
                    )
                    ->live()
                    ->disabled()
                    ->selectablePlaceholder(false),

                TextInput::make('Direccion')
                    ->columnSpanFull()
                    ->label('Direccion')
                    ->required()
                    ->disabled(),

                // cada que se actualice la propiedad, se actualizan las coordenadas
                Repeater::make('Georeferenciacion')
                    ->label('Coordenadas')
                    ->relationship()
                    ->schema([
                        TextInput::make('latitud')
                            ->label('Latitud')
                            ->numeric()
                            ->required()
                            ->disabled(),

                        TextInput::make('longitud')
                            ->label('Longitud')
                            ->numeric()
                            ->required()
                            ->disabled(),

                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->disabled(),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    // public function save(): void
    // {
    //     $data = $this->form->getState();

    //     $this->record->update($data);
    // }

    public function render(): View
    {
        return view('livewire.ver-propiedad');
    }
}
