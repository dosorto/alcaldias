<?php

namespace App\Livewire\PagoServicio;

use Livewire\Component;
use App\Models\suscripcion;
use App\Models\Contribuyente;
use App\Models\PagoServicio_has_Servicios;
use App\Models\Servicio;
use App\Models\Profesion_oficio;
use App\Models\PagoServicios;
use Livewire\WithPagination;
use Carbon\Carbon;

class PagoServicioGenerar extends Component
{
    use WithPagination;

    public $pago_servicio_id;
    public $pagoServicio;
    public $contribuyenteId;
    public $nombrecompleto;
    public $identidad;
    public $sexo;
    public $telefono;
    public $email;
    public $direccion;
    public $fecha_nacimiento;
    public $profesion;
    public $servicioId;
    public $num_recibo;
    public $fechap;
    public $encargado;
    public $totalImportes;
    public $totalImporte;
    public $valor_total;
    public $servicios_pagar = [];
    public $contribuyente;
    public $variable;
    public $serviceSelected;
    public $servicioss;
    public $numeroRecibo;
    public $isOpen = false;
    public $precioEditable;
    public $indexEditable;
    public $modalDelete = false;
    public $confirmarDelete;


    

    public function mount()
    {
        // Verificar si ya hay una cookie 'contribuyente_id' establecida
        $contribuyenteIdCookie = request()->cookie('contribuyente_id');

    if ($contribuyenteIdCookie) {
        // Si hay una cookie 'contribuyente_id', asignar su valor a $contribuyenteId
        $this->contribuyenteId = $contribuyenteIdCookie;
    } else {
        // Si no hay una cookie 'contribuyente_id', establecer el valor inicial
        $this->contribuyenteId = session('id');

        // Establecer la cookie 'contribuyente_id' con el valor de session('id')
        cookie()->queue('contribuyente_id', $this->contribuyenteId);
    }
        //Buscamos el contribuyente
        $this->contribuyente = Contribuyente::findOrFail($this->contribuyenteId);
            //Asginamos a las variables los datos del contribuyente
            $this->fechap = Carbon::now()->format('Y-m-d');
            $this->identidad = $this->contribuyente->identidad;
            $this->nombrecompleto = $this->contribuyente->primer_nombre . ' ' . $this->contribuyente->segundo_nombre . ' ' . $this->contribuyente->primer_apellido . ' ' . $this->contribuyente->segundo_apellido;
            $this->identidad = $this->contribuyente->identidad;
            $this->sexo = $this->contribuyente->sexo;
            $this->telefono = $this->contribuyente->telefono;
            $this->email = $this->contribuyente->email;
            $this->contribuyenteId = $this->contribuyente->id;
            $this->direccion = $this->contribuyente->direccion;
            $this->fecha_nacimiento = $this->contribuyente->fecha_nacimiento;
            //Buscamos la profesión para mostrarla en los detalles
            $this->profesion = profesion_oficio::findOrFail($this->contribuyente->profecion_id);

            //Buscamos los servicios que coincidan con el numero de recibo que pertenece al contribuyente
            $this->servicioss = $this->contribuyente->pagoServicios()
            ->join('pago_servicio_has_servicios', 'pago_servicios.id', '=', 'pago_servicio_has_servicios.pago_servicio_id')
            ->join('servicios', 'pago_servicio_has_servicios.servicio_id', '=', 'servicios.id')
            ->select('servicios.*')
            ->get();

            //Llamamos a la funcion que genera el numero de recibo
            $this->generarNumeroRecibo();
    }


    //Función que genera el numero de recibo que esta formado por el año, mes y un numero que aumenta segun el ultimo numero de recibo
    public function generarNumeroRecibo()
    {
        // Obtener el último número de recibo de la base de datos
        $ultimoNumeroRecibo = PagoServicios::latest()->value('num_recibo');

        // Extraer el número de secuencia del último número de recibo
        $numeroSecuencia = intval(substr($ultimoNumeroRecibo, -4));

        // Generar el nuevo número de recibo con el formato deseado y el siguiente número de secuencia
        $this->numeroRecibo = sprintf("%04d-%02d-%04d", $this->anioActual(), $this->mesActual(), $numeroSecuencia + 1);
    }

    //Función que obtiene el año para agregarlo al número de recibo
    public function anioActual()
    {
        return date('Y');
    }

    //Función que obtiene el mes para agregarlo al número de recibo
    public function mesActual()
    {
        return date('m');
    }

    //Función que renderiza la vista pregargando algunas listas
    public function render()
    {
        //Llamamos a la función mount que es la que precarga los datos del contribuyente
        $this->mount();

        //Lista que muestra los pagos que tiene asignado el contribuyente
        $listaPagare = PagoServicios::where('contribuyente_id', $this->contribuyenteId)->orderBy('id','DESC')->paginate(5);

        //Lista que carga las suscripciones del contribuyente
        $suscripciones = suscripcion::where('contribuyente_id', $this->contribuyenteId)->get();

        //Lista que carga los servicios
        $servicios = Servicio::all();
        return view('livewire.pago-servicio.generar-pagare',[
            'servicios' => $servicios, 'listaPagare' => $listaPagare, 'suscripciones' => $suscripciones]);
    }

    public function store() //Funcion para agregar un servicio a la lsita de servicios para agregar
    {
        // $this->serviceSelected = $this->valor;
        if($this->serviceSelected){ //Verificamos si el servicio ha sido seleccionado
            //Buscamos el servicio por el nombre
            $servicio = Servicio::where('nombre_servicio', $this->serviceSelected)->first();
            if ($servicio) {
                //Verificamos si existe el servicio en la lista de servicios a agregar al pago
                $existingService = collect($this->servicios_pagar)->firstWhere('id', $servicio->id);
                if (!$existingService) {
                    $this->precioEditable = $servicio->importes;
                    // Agregar el servicio a la lista solo si no está presente
                    $this->servicios_pagar[] = [
                        'id' => $servicio->id,
                        'nombre_servicio' => $servicio->nombre_servicio,
                        'importes' => $this->precioEditable,
                        'clave_presupuestaria' => $servicio->clave_presupuestaria
                    ];
                } else {
                    //Mandamos un mensaje de error si el servicio ya existe en la lista agregada
                    session()->flash('error','El servicio "' . $servicio->nombre_servicio . '" ya ha sido agregado a la lista.');
                }
                //Ponemos null el servicio seleccionado
                $this->serviceSelected = '';
            }
        }
    }


    public function storeSubs($id)
    {
        if($id){
            // Obtener el servicio seleccionado de la base de datos
            $servicio = Servicio::find($id);
            if ($servicio) {
                //Verificamos si existe el servicio en la lista de servicios a agregar al pago

                $existingService = collect($this->servicios_pagar)->firstWhere('id', $servicio->id);
                if (!$existingService) {
                    // Agregar el servicio a la lista solo si no está presente
                    $this->servicios_pagar[] = [
                        'id' => $servicio->id,
                        'nombre_servicio' => $servicio->nombre_servicio,
                        'importes' => $servicio->importes,
                        'clave_presupuestaria' => $servicio->clave_presupuestaria
                    ];
                } else {
                    //Mandamos un mensaje de error si el servicio ya existe en la lista agregada
                    session()->flash('error','El servicio "' . $servicio->nombre_servicio . '" ya ha sido agregado a la lista.');
                }
                $id = null;
                $this->servicioId = 0;
            }
        }
    }

    public function removeServicio($index)
    {
        // Eliminar el servicio de la lista utilizando su índice
        unset($this->servicios_pagar[$index]);

        // Reindexar el array para mantener la consistencia
        $this->servicios_pagar = array_values($this->servicios_pagar);
    }
    public function guardarRegistro()
    {

        $total = $this->totalImportes;
        if($this->totalImportes > 0 && count($this->servicios_pagar) > 0){
            $pago_servicio = PagoServicios::create([
                'num_recibo' => $this->numeroRecibo,
                'fecha_pago' => $this->fechap,
                'total' => $this->totalImportes,
                'contribuyente_id' => $this->contribuyenteId,
                'fecha_suscripcion' => now(),
                'estado' => 'Pendiente'
            ]);

             //Recorremos la lista de servicios a pagar para obtener los id y agregarlos a la tabla PagoServicio_has_servicio
        foreach ($this->servicios_pagar as $servicioId) {

            PagoServicio_has_Servicios::create([
                'pago_servicio_id' => $pago_servicio->id,
                'servicio_id' => $servicioId['id']
            ]);
            }
            //Limpiamos la lista para poder hacer otro registros
            $this->servicios_pagar = [];
            $this->totalImportes = 0;

            session()->flash('message', 'Se ha creado exitosamente');
            $this->cerrarModal();
        }
        // Actualizar la vista para reflejar el nuevo número de recibo generado
        // $this->emit('actualizarNumeroRecibo');
    }

    public function opendelete($pago_servicio_id)
    {
        $this->modalDelete = true;
        $this->confirmarDelete = $pago_servicio_id;
    }

    public function eliminarRegistro()
    {
    // Busca el registro de pago de servicios
    // Busca el registro de pago de servicios
    $pago_servicio = PagoServicios::find($this->confirmarDelete);

    if ($pago_servicio) {
        // Obtiene los servicios asociados a este pago
        $servicios = $pago_servicio->servicios;

        // Agrega los servicios a la lista de servicios por pagar
        foreach ($servicios as $servicio) {
            $this->servicios_pagar[] = [
                'id' => $servicio->id,
                'nombre_servicio' => $servicio->nombre_servicio,
                'importes' => $servicio->importes,
                'clave_presupuestaria' => $servicio->clave_presupuestaria,
            ];
            $this->totalImportes += $servicio->importes;
        }

        // Elimina el registro de pago de servicios
        $pago_servicio->delete();

        $this->modalDelete = false;

        session()->flash('message', 'El registro se ha eliminado exitosamente');
    } else {
        session()->flash('message', 'No se encontró el registro de pago de servicios');
    }
    }

    

    public function abrirModal()
    {
        $this->isOpen = true;
    }

    public function cerrarModal()
    {
        $this->isOpen = false;
    }
    public function actualizarValor($valor){
        $this->serviceSelected = $valor;
    }

    public function actualizarImporte()
    {
        if ($this->indexEditable !== null && $this->precioEditable !== null) {
            $this->servicios_pagar[$this->indexEditable]['importes'] = $this->precioEditable;
        }
        // Limpiar los valores después de la actualización
        // $this->precioEditable = null;
        $this->indexEditable = null;

    }

    public function editarImporte($index)
    {

        // // Guardar el índice del servicio que estamos editando
        $this->indexEditable = $index;
        // // Establecer el valor editable al valor actual del importe
        $this->precioEditable = $this->servicios_pagar[$index]['importes'];
    }

    public function closeModal()
    {
        $this->precioEditable = $this->servicios_pagar[$this->indexEditable]['importes'];
        if($this->precioEditable = $this->servicios_pagar[$this->indexEditable]['importes']){
            $this->indexEditable = null;
        }
    }

    

    public function closeDelete()
    {
        $this->modalDelete = false;
    }


}
