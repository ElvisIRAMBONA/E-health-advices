<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentApproved extends Notification
{
    use Queueable;

    private $appointment;

    /**
     * Create a new notification instance.
     *
     * @param $appointment
     */
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Rendez-vous approuvé')
            ->line('Votre rendez-vous avec le docteur ' . $this->appointment->doctor->name . ' a été approuvé.')
            ->line('Date : ' . $this->appointment->appointment_date)
            ->action('Voir mes rendez-vous', url('/appointments'))
            ->line('Merci de faire confiance à notre plateforme.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'appointment_id' => $this->appointment->id,
            'doctor_name' => $this->appointment->doctor->name,
            'appointment_date' => $this->appointment->appointment_date,
        ];
    }
}