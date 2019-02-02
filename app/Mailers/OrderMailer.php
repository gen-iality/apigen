<?php

namespace App\Mailers;

use App\Models\Order;
use App\Event;
use App\Attendee;
use App\Services\Order as OrderService;
use PDF;
use Log;
use Mail;

class OrderMailer
{
    public function sendOrderNotification(Order $order)
    {
        $orderService = new OrderService($order->amount, $order->organiser_booking_fee, $order->event);
        $orderService->calculateFinalCosts();

        $data = [
            'order' => $order,
            'orderService' => $orderService
        ];

        Mail::send('Emails.OrderNotification', $data, function ($message) use ($order) {
            $message->to($order->account->email);
            $message->subject('New order received on the event ' . $order->event->title . ' [' . $order->order_reference . ']');
        });

    }

    public function sendOrderTickets(Order $order)
    {
        // Se cargan los datos que se van a utilizar en el PDF
        $date = new \DateTime();
        $today =  $date->format('d-m-Y');
        $logo_evius = 'images/logo.png';
        $event = Event::findOrFail($order->event_id);
        $eventusers = Attendee::where('order_id', $order->id)->get();
        $location = $event["location"]["FormattedAddress"];

        $orderService = new OrderService($order->amount, $order->organiser_booking_fee, $order->event);
        $orderService->calculateFinalCosts();

        Log::info("Sending ticket to: " . $order->email);
        $data = [
            'order' => $order,
            'orderService' => $orderService,
            'logo' => $logo_evius,
        ];
        
        // Creación del PDF
         $pdf = PDF::loadview('pdf_bookingConfirmed', compact('event','eventusers','order','location','today'));
         $pdf->setPaper('legal','portrait');

        // Envío del email
        Mail::send('Mailers.TicketMailer.SendOrderTickets', $data, function ($message) use ($order, $pdf) {
            $message->to($order->email);
            $message->subject('Tus tickets para el evento '.$order->event->name);
            $message->attachData(
                $pdf->download(), 'Tickets Evento '. $order->event->name.'.pdf'
            );
        });

    }

}
