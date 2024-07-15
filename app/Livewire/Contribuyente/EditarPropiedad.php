<?php

namespace App\Livewire\Contribuyente;

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



class EditarPropiedad extends Component implements HasForms
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
                    ->required(),

                Select::make('IdContribuyente')
                    ->label('Contribuyente')
                    ->options(
                        Contribuyente::all()->pluck('primer_nombre', 'id')
                    )
                    ->searchable(),

                Select::make('IdTipoPropiedad')
                    ->label('Tipo Propiedad')
                    ->options(
                        TipoPropiedad::all()->pluck('Nombre', 'id')
                    )
                    ->searchable(['Nombre']),

                // Select::make('IdPais')
                //     ->label('Pais')
                //     ->default($this->record->barrio->aldea->municipios->departamentos->paises->id)
                //     ->options(
                //         Paise::pluck('nombre', 'id')
                //         ->toArray()
                //     )
                //     // ->searchable()
                //     ->live()
                //     ->selectablePlaceholder(false),


                // Select::make('IdDepartamento')
                //     ->label('Departamento')
                //     ->options(
                //         fn (Get $get) => Departamento::where('pais_id', $get('IdPais'))
                //             ->pluck('name', 'id')

                //     )
                //     ->default($this->record->barrio->aldea->municipios->departamentos->id)
                //     ->live(),
                //     //->disabled(fn (Get $get) => $get('IdPais') == null),

                // Select::make('IdMunicipio')
                //     ->label('Municipio')
                //     ->options(
                //         fn (Get $get) => Municipio::where('departamento_id', $get('IdDepartamento'))
                //             ->pluck('name', 'id')
                //     )
                //     ->default($this->record->barrio->aldea->municipios->id)
                //     ->live(),
                //     //->disabled(fn (Get $get) => $get('IdDepartamento') == null),


                // Select::make('IdAldea')
                //     ->label('Aldea')
                //     ->options(
                //         fn (Get $get) => Aldea::where('municipio_id', $get('IdMunicipio'))
                //             ->pluck('nombre', 'id')
                //     )
                //     ->default($this->record->barrio->aldea->id)
                //     ->live(),
                //    // ->disabled(fn (Get $get) => $get('IdMunicipio') == null),

                // Select::make('IdBarrio')
                //     ->label('Barrio')
                //     ->options(
                //         fn (Get $get) => Barrio::where('aldea_id', $get('IdAldea'))
                //             ->pluck('nombre', 'id')
                //     )
                //     ->live()
                //     ->default($this->record->barrio->id),
                //     // ->disabled(fn (Get $get) => $get('IdAldea') == null),

                TextInput::make('Direccion')
                    ->columnSpanFull()
                    ->label('Direccion')
                    ->required(),


                Repeater::make('Georeferenciacion')
                    ->label('Coordenadas')
                    ->relationship()
                    ->schema([
                        TextInput::make('latitud')
                            ->label('Latitud')
                            ->numeric()
                            ->required(),

                        TextInput::make('longitud')
                            ->label('Longitud')
                            ->numeric()
                            ->required(),

                    ])
                    ->columns(2)
                    ->columnSpanFull()
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->record->update($data);

        Notification::make()
            ->title('Exito!')
            ->body('Propiedad creada exitosamente')
            ->success()
            ->send();

        $this->redirect(route('propiedad'));

    }

    public function render(): View
    {
        return view('livewire.contribuyente.editar-propiedad');
    }
}
