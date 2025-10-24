<?php namespace Furroy\Clients\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Furroy\Clients\Models\Encarreg;
use Flash;

class Encarregs extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
    parent::__construct();
    }

    /**
     * Carga el formulario del popup para enviar el correo
     * @return mixed
     */
    public function onLoadSendMailForm()
    {
        $id = input('id');
        
        if (!$id) {
            Flash::error('No se proporcionó un ID de encargo válido');
            return false;
        }

        $encargo = Encarreg::find($id);

        if (!$encargo) {
            Flash::error('No se encontró el encargo especificado');
            return false;
        }

        \Log::info('Datos del encargo:', [
            'id' => $encargo->id,
            'id_client' => $encargo->id_client,
            'attributes' => $encargo->getAttributes()
        ]);

        // Intentar encontrar el cliente directamente
        $client = \Furroy\Clients\Models\Client::find($encargo->id_client);

        if (!$client) {
            \Log::warning('Cliente no encontrado en la base de datos:', [
                'id_client_buscado' => $encargo->id_client,
                'total_clientes' => \Furroy\Clients\Models\Client::count(),
                'ejemplo_cliente' => \Furroy\Clients\Models\Client::first() ? 
                    \Furroy\Clients\Models\Client::first()->getAttributes() : 'No hay clientes'
            ]);
            
            Flash::error('El encargo #' . $encargo->id . ' tiene asignado el cliente #' . $encargo->id_client . ' pero este cliente no existe en la base de datos.');
            return false;
        }

        \Log::info('Datos del cliente encontrado:', [
            'id' => $client->id,
            'attributes' => $client->getAttributes()
        ]);

        return $this->makePartial('$/furroy/clients/controllers/encarregs/sendmailform', [
            'encargo' => $encargo,
            'client' => $client
        ]);
    }

    /**
     * Envía el correo al cliente
     */
    public function onSendMail()
    {
        \Log::info('Datos recibidos:', post());

        $subject = trim(input('subject'));
        $message = trim(input('message'));
        $encargoId = input('encargo_id');

        \Log::info('Datos procesados:', [
            'subject' => $subject,
            'message' => $message,
            'encargoId' => $encargoId
        ]);

        if (empty($subject)) {
            Flash::error('El asunto del correo es obligatorio.');
            return;
        }

        if (empty($message)) {
            Flash::error('El mensaje del correo es obligatorio.');
            return;
        }

        if (empty($encargoId)) {
            Flash::error('No se ha especificado el encargo.');
            return;
        }

        $encargo = Encarreg::find($encargoId);

        if (!$encargo) {
            Flash::error('No se encontró el encargo especificado.');
            return;
        }

        // Buscar el cliente directamente como en onLoadSendMailForm
        $client = \Furroy\Clients\Models\Client::find($encargo->id_client);

        if (!$client) {
            Flash::error('No se pudo encontrar el cliente asociado al encargo #' . $encargo->id);
            return;
        }

        if (!$client->email) {
            Flash::error('El cliente ' . $client->nom . ' no tiene dirección de correo electrónico.');
            return;
        }

        try {
            \Log::info('Intentando enviar correo:', [
                'to' => $client->email,
                'subject' => $subject,
                'template' => 'furroy.clients::mail.encargo_mail'
            ]);

            $template = 'furroy.clients::mail.encargo_mail';
            $data = [
                'emailSubject' => $subject,
                'emailContent' => $message,
                'client' => $client,
                'encargo' => $encargo
            ];

            \Mail::send($template, $data, function($mail) use ($client, $subject) {
                $mail->to($client->email);
                $mail->subject($subject);
                \Log::info('Configuración del correo:', [
                    'to' => $client->email,
                    'subject' => $subject,
                    'from' => config('mail.from.address'),
                    'name' => config('mail.from.name')
                ]);
            });

            \Log::info('Correo enviado correctamente');
            Flash::success('Correo enviado correctamente al cliente ' . $client->nom);
        } catch (\Exception $e) {
            \Log::error('Error al enviar correo:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            Flash::error('Error al enviar correo: ' . $e->getMessage());
        }
    }
}
