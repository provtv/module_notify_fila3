<?php

declare(strict_types=1);

namespace Modules\Notify\Actions;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Modules\Notify\Models\NotificationTemplate;
=======
=======
>>>>>>> 9b05d0a6 (.)
use Illuminate\Notifications\Notification as LaravelNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Modules\Notify\Models\NotificationLog;
<<<<<<< HEAD
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
use Modules\Notify\Notifications\GenericNotification;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action per l'invio di notifiche multi-canale.
 * Supporta l'invio via email, SMS e notifiche in-app.
 */
class SendNotificationAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Invia una notifica utilizzando un template.
     *
     * @param Model $recipient Il destinatario della notifica
     * @param string $templateCode Il codice del template da utilizzare
     * @param array $data I dati per compilare il template
     * @param array $channels I canali da utilizzare (opzionale, usa quelli del template se non specificati)
     * @param array $options Opzioni aggiuntive per l'invio
     * 
     * @return bool
     * @throws \Exception Se il template non esiste o non è attivo
     */
    public function execute(
        Model $recipient,
        string $templateCode,
        array $data = [],
        array $channels = [],
        array $options = []
    ): bool {
        // Recupera il template
        $template = NotificationTemplate::where('code', $templateCode)
            ->where('is_active', true)
            ->first();

        if (!$template) {
            throw new \Exception("Template {$templateCode} non trovato o non attivo");
        }

        // Verifica condizioni di invio
        if (!$template->shouldSend($data)) {
            return false;
        }

        // Compila il template
        $compiled = $template->compile($data);

        // Determina i canali da utilizzare
        $effectiveChannels = $channels ?: $template->channels;

        // Processa ogni canale
        foreach ($effectiveChannels as $channel) {
            try {
                $this->sendViaChannel($recipient, $channel, $compiled, $options);
            } catch (\Exception $e) {
                // Log dell'errore ma continua con altri canali
                Log::error("Errore invio notifica via {$channel}: " . $e->getMessage());
                continue;
            }
        }

        return true;
    }

    /**
     * Invia la notifica attraverso un canale specifico.
     *
     * @param Model $recipient
     * @param string $channel
     * @param array $compiled
     * @param array $options
     * @return void
     */
    protected function sendViaChannel(
        Model $recipient,
        string $channel,
        array $compiled,
        array $options
    ): void {
        switch ($channel) {
            case 'mail':
                $this->sendMail($recipient, $compiled, $options);
                break;
            case 'database':
                $this->sendDatabase($recipient, $compiled, $options);
                break;
            case 'sms':
                $this->sendSms($recipient, $compiled, $options);
                break;
            default:
                throw new \Exception("Canale {$channel} non supportato");
        }
    }

    /**
     * Invia una notifica via email.
     */
    protected function sendMail(Model $recipient, array $compiled, array $options): void
    {
        if (!method_exists($recipient, 'routeNotificationForMail')) {
            throw new \Exception('Il destinatario non supporta le notifiche email');
        }

        $email = $recipient->routeNotificationForMail();
        if (!$email) {
            throw new \Exception('Email destinatario non disponibile');
        }

        // Usa il sistema di notifiche di Laravel
        if (method_exists($recipient, 'notify')) {
            $recipient->notify(new GenericNotification(
                $compiled['subject'],
                $compiled['body_html'] ?? $compiled['body_text'],
                ['mail'],
                array_merge($options, [
                    'text_view' => $compiled['body_text'],
                ])
            ));
        } else {
            // Fallback per modelli che non implementano Notifiable
            Notification::send($recipient, new GenericNotification(
                $compiled['subject'],
                $compiled['body_html'] ?? $compiled['body_text'],
                ['mail'],
                array_merge($options, [
                    'text_view' => $compiled['body_text'],
                ])
            ));
        }
    }

    /**
     * Invia una notifica nel database.
     */
    protected function sendDatabase(Model $recipient, array $compiled, array $options): void
    {
        Notification::send($recipient, new GenericNotification(
            $compiled['subject'],
            $compiled['body_text'] ?? strip_tags($compiled['body_html']),
            ['database'],
            $options
        ));
    }

    /**
     * Invia una notifica via SMS.
     */
    protected function sendSms(Model $recipient, array $compiled, array $options): void
    {
        if (!method_exists($recipient, 'routeNotificationForSms')) {
            throw new \Exception('Il destinatario non supporta le notifiche SMS');
        }

        $phone = $recipient->routeNotificationForSms();
        if (!$phone) {
            throw new \Exception('Numero di telefono destinatario non disponibile');
        }

        // Usa il testo plain o una versione senza HTML
        $message = $compiled['body_text'] ?? strip_tags($compiled['body_html']);

        // Limita la lunghezza del messaggio SMS
        if (mb_strlen($message) > 320) {
            $message = mb_substr($message, 0, 317) . '...';
        }

        Notification::send($recipient, new GenericNotification(
            $compiled['subject'],
            $message,
            ['sms'],
            $options
        ));
    }
=======
=======
>>>>>>> 9b05d0a6 (.)
     * Invia una notifica a un destinatario.
     *
     * @param Model $recipient Il destinatario della notifica
     * @param string $title Il titolo della notifica
     * @param string $message Il contenuto della notifica
     * @param array<string> $channels I canali da utilizzare ('mail', 'sms', 'database')
     * @param array<string, mixed> $data Dati aggiuntivi per la notifica
     * 
     * @return bool Esito dell'invio
     */
    public function execute(
        Model $recipient,
        string $title,
        string $message,
        array $channels = ['mail'],
        array $data = []
    ): bool {
        try {
            // Crea la notifica
            $notification = new GenericNotification(
                $title,
                $message,
                $channels,
                $data
            );
            
            // Invia la notifica
            Notification::send($recipient, $notification);
            
            // Crea un log della notifica
            $this->logNotification($recipient, $title, $message, $channels, $data);
            
            return true;
        } catch (\Exception $e) {
            Log::error('Errore nell\'invio della notifica', [
                'error' => $e->getMessage(),
                'recipient_type' => get_class($recipient),
                'recipient_id' => $recipient->id,
                'title' => $title,
                'channels' => $channels,
            ]);
            
            return false;
        }
    }
    
    /**
     * Registra l'invio della notifica nel log.
     *
     * @param Model $recipient Il destinatario della notifica
     * @param string $title Il titolo della notifica
     * @param string $message Il contenuto della notifica
     * @param array<string> $channels I canali utilizzati
     * @param array<string, mixed> $data Dati aggiuntivi
     */
    protected function logNotification(
        Model $recipient,
        string $title,
        string $message,
        array $channels,
        array $data
    ): void {
        try {
            NotificationLog::create([
                'notifiable_type' => get_class($recipient),
                'notifiable_id' => $recipient->id,
                'title' => $title,
                'content' => $message,
                'channels' => $channels,
                'data' => $data,
                'sent_at' => now(),
                'status' => 'sent',
            ]);
        } catch (\Exception $e) {
            Log::warning('Impossibile loggare la notifica', [
                'error' => $e->getMessage(),
                'recipient_type' => get_class($recipient),
                'recipient_id' => $recipient->id,
            ]);
        }
    }
<<<<<<< HEAD
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
}
