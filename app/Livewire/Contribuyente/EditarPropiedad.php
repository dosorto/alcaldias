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
    public ?array $prevCoordinates = [];

    public Propiedad $record;
    protected $listeners = ['actualizarCoordenadas'];

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
        $this->prevCoordinates = $this->data['Georeferenciacion'] ?? [];
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
                        return Contribuyente::where('identidad', 'like', "%{$search}%")
                            ->limit(50)
                            ->get()
                            ->mapWithKeys(function ($contribuyente) {
                    
                                $fullName = "{$contribuyente->primer_nombre} {$contribuyente->segundo_nombre} {$contribuyente->primer_apellido} {$contribuyente->segundo_apellido}";
                                return [$contribuyente->id => $fullName];
                            })
                            ->toArray();
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
                    ->default($this->record->barrio->aldea->municipios->departamentos->paises->id)
                    ->options(
                        Paise::pluck('nombre', 'id')
                        ->toArray()
                    )
                    // ->searchable()
                    ->live()
                    ->selectablePlaceholder(false),

                        // dd($this->record->barrio->aldea->municipios->departamentos->id),
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
                    ->disabled(fn (Get $get) => $get('IdPais') == null)
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
                    ->disabled(fn (Get $get) => $get('IdDepartamento') == null)
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
                   ->disabled(fn (Get $get) => $get('IdMunicipio') == null)
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
                    ->disabled(fn (Get $get) => $get('IdAldea') == null)
                    ->selectablePlaceholder(false)
                    ->required(),

                TextInput::make('Direccion')
                    ->columnSpanFull()
                    ->label('Direccion')
                    ->required(),

                // cada que se actualice la propiedad, se actualizan las coordenadas
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
            ->statePath('data')
            ->model($this->record);
    }

    public function actualizarCoordenadas($coordenadas)
    {
        // Asumiendo que tienes una propiedad llamada `Georeferenciacion` en tu componente
        $this->form->Georeferenciacion = $coordenadas;
        $this->save(); // O cualquier lógica para guardar las coordenadas actualizadas
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
