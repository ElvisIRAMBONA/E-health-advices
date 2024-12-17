<?php
namespace App\Notifications; 
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use   Illuminate\Notifications\Notification;
class AppointmentApproved extends Notification { use Queueable;
    public $appointment; 
    public function __construct($appointment) { $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
    return ['mail'];
    }

    public function toMail($notifiable)
    {
    return (new MailMessage)
    ->subject('Rendez-vous Approuvé')
    ->greeting('Bonjour ' . $notifiable->name)
    ->line('Votre rendez-vous avec le Dr. ' . $this->appointment->doctor->name . ' a été approuvé.')
    ->line('Date : ' . $this->appointment->appointment_date)
    ->line('Statut : Approuvé')
    ->action('Voir mes rendez-vous', url('/my-appointments'))
    ->line('Merci d\'utiliser notre plateforme E-Health!');
    }
    }