<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailNotification extends Notification
{
    use Queueable;

    private $objects;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $objects)
    {
        $this->objects = $objects;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $lines = "";
        foreach($this->objects as $object){
            $lines = $lines."ID:".$object->id.", URL:".$object->url.", Status:".$object->status.", Dia/Hora:".$object->moment.PHP_EOL;

        }
        //dd($lines);
         return (new MailMessage)
                     ->from('pedro@teste.com', 'Pedro Gomes')
                     ->subject('Relatório de Monitoramento')
                     ->line('Reportando o resultados do monitoramento:')
                     ->line($lines)
                     //->action('Notification Action', url('/'))
                     ->line('Obrigado por usar a aplicação!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
