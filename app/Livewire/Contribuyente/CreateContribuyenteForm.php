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

use App\Models\Propiedad;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Forms\Components\ViewField;

use App\Forms\Components\Map;
use Filament\Forms\Components\Repeater;

class CreateContribuyenteForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public ?array $prevCoordinates = [];

    public function mount(): void
    {
        $this->form->fill();
        $this->prevCoordinates = $this->data['Georeferenciacion'] ?? [];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ClaveCatastral')
                    ->label('Clave Catastral')
                    ->numeric()
                    ->required(),

                Select::make('IdContribuyente')
                    ->label('Contribuyente')
                    ->options(
                        Contribuyente::all()->map(function ($contribuyente) {
                            return [
                                'id' => $contribuyente->id,
                                'nombre_completo' => $contribuyente->primer_nombre . ' ' 
                                . $contribuyente->segundo_nombre . ' ' 
                                . $contribuyente->primer_apellido. ' ' 
                                . $contribuyente->segundo_apellido,
                            ];
                        })->pluck('nombre_completo', 'id')
                    )
                    ->getSearchResultsUsing(function (string $search): array {
                        return Contribuyente::where('primer_nombre', 'like', "%{$search}%")
                            ->orWhere('identidad', 'like', "%{$search}%")
                            ->limit(50)
                            ->get()
                            ->pluck('primer_nombre', 'id')
                            ->toArray();
                    })
                    ->getOptionLabelUsing(function ($value): ?string {
                        $contribuyente = Contribuyente::find($value);
                        return $contribuyente ? $contribuyente->primer_nombre : null;
                    })
                    ->searchable()
                    ->required(),

                Select::make('IdTipoPropiedad')
                    ->label('Tipo Propiedad')
                    ->options(
                        TipoPropiedad::all()->pluck('Nombre', 'id')
                    )
                    ->searchable(['Nombre'])
                    ->required(),

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
                        fn (Get $get) => Departamento::where('pais_id', $get('IdPais'))
                            ->pluck('name', 'id')

                    )
                    ->live()
                    ->disabled(fn (Get $get) => $get('IdPais') == null),

                Select::make('IdMunicipio')
                    ->label('Municipio')
                    ->options(
                        fn (Get $get) => Municipio::where('departamento_id', $get('IdDepartamento'))
                            ->pluck('name', 'id')
                    )
                    ->live()
                    ->disabled(fn (Get $get) => $get('IdDepartamento') == null),


                Select::make('IdAldea')
                    ->label('Aldea')
                    ->options(
                        fn (Get $get) => Aldea::where('municipio_id', $get('IdMunicipio'))
                            ->pluck('nombre', 'id')
                    )
                    ->live()
                    ->disabled(fn (Get $get) => $get('IdMunicipio') == null),

                Select::make('IdBarrio')
                    ->label('Barrio')
                    ->options(
                        fn (Get $get) => Barrio::where('aldea_id', $get('IdAldea'))
                            ->pluck('nombre', 'id')
                    )
                    ->live()
                    ->disabled(fn (Get $get) => $get('IdAldea') == null)
                    ->required(),

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
                    ->afterStateUpdated(function ($state) {
                        // Verificar si se eliminó una coordenada
                        if (count($state) < count($this->prevCoordinates)) {
                            // lanzar evento para eliminar coordenadas
                            $this->dispatch('eliminarcoordenada', ['coordenadas' => $state]); 
                            $this->prevCoordinates = $state;
                        }
                        // verificar si se crea una nueva coordenada
                        else if (count($state) > count($this->prevCoordinates)){
                            // lanzar evento para actualizar las coordenadas cuando se crea una nueva
                            $this->dispatch('actualizarCoordenadas', ['coordenadas' => $state]);
                            $this->prevCoordinates = $state;
                        } 
                        // evento para actualizar los marcadores y el poligono en caso de
                        // que haya una actualizacion de las coordenadas a mano
                        else {
                            // lanzar evento para actualizar las coordenadas
                            $this->dispatch('actualizar', ['coordenadas' => $state]);
                        }
                    })
                    ->defaultItems(1)
                    ->itemLabel(function ($state) {
                        // Obtener la clave actual
                        $claveActual = array_search($state, $this->data['Georeferenciacion']);
                        
                        // Obtener todas las claves del arreglo
                        $claves = array_keys($this->data['Georeferenciacion']);
                        
                        // Buscar la posición de la clave en el arreglo de claves
                        $indice = array_search($claveActual, $claves);
                        
                        // Retornar la etiqueta con el índice convertido a entero
                        return 'Punto ' . strval((int) $indice + 1);
                    })
                    ->grid(2)
                    ->live()
                    ->required(),
            ])
            ->columns(2)
            ->statePath('data')
            ->model(Propiedad::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        
        $record = Propiedad::create($data);

        $this->form->model($record)->saveRelationships();
        
        Notification::make()
            ->title('Exito!')
            ->body('Propiedad creada exitosamente')
            ->success()
            ->send();

        $this->js('location.reload();');
    }

    public function render(): View
    {
        return view('livewire.contribuyente.create-contribuyente-form');
    }
}
