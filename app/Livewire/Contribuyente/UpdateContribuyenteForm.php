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
use App\Models\Propiedad;
use Filament\Forms\Get;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;

class UpdateContribuyenteForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?Propiedad $propiedad;

    public function mount(Propiedad $propiedad): void
    {
        $this->propiedad = $propiedad;
        $this->form->fill($propiedad);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ClaveCatastral')
                    ->label('Clave Catastral')
                    ->disabled(),

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

                Select::make('IdGeoreferencia')
                    ->label('Georeferenciacion')
                    ->options(
                        Georeferenciacion::all()->pluck('latitud', 'id')
                    )
                    ->searchable(['latitud']),

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
                    ->required()
            ])
            ->columns(2)
            ->statePath('data')
            ->model($this->propiedad);
    }

    public function update(): void
    {
        $data = $this->form->getState();
        $this->propiedad->update($data);

        Notification::make()
            ->title('Éxito!')
            ->body('Propiedad actualizada exitosamente')
            ->success()
            ->send();

        $this->redirect(route('ruta.a.donde.redirigir')); // Reemplaza 'ruta.a.donde.redirigir' por la ruta adecuada
    }

    public function render(): View
    {
        return view('livewire.contribuyente.update-contribuyente-form');
    }
}
