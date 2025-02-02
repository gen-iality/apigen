<?php

namespace App\Mail;

use App;
use App\evaLib\Services\GoogleFiles;
use App\Event;
use App\Organization;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use QRCode;
use Spatie\IcalendarGenerator\Components\Calendar as iCalCalendar;
use Spatie\IcalendarGenerator\Components\Event as iCalEvent;
use Spatie\IcalendarGenerator\PropertyTypes\TextPropertyType as TextPropertyType;
use Illuminate\Support\Facades\Log;

class InvitationMailSimple extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $eventUser_name;
    public $eventuser_id;
    public $eventuser_lan;
    public $password;
    public $email;
    public $event;
    public $eventUser;
    public $image;
    public $link;
    public $message;
    public $organization_picture;
    public $subject;
    public $urlconfirmacion;
    public $image_header;
    public $type;
    public $image_footer;
    public $image_footer_default;
    public $activity;
    public $event_location;
    public $logo;
    public $ical = [];
    public $changePassword;
    public $onlylink;
    public $onetimelogin;
    public $mensajepersonalizado;
    public $qr;
    public $firebasePasswordChange;
    public $urlOrigin; // Hace dinamico el envio de correo segun la url del front

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $message, Event $event, $eventUser, string $image = null, $activity = null, string $subject = null, string $urlOrigin, $image_header = null, $content_header = null, $image_footer = null, $changePassword = false, $destination = null, $onlylink = null, $firebasePasswordChange = null)
    {

        $locale = isset($event->language) ? $event->language : 'es';
        App::setLocale($locale);

        $auth = resolve('Kreait\Firebase\Auth');
        //dd("auth", $auth);
        $this->auth = $auth;

        $destination = ($destination) ? $destination : config('app.front_url');

        $event_location = null;
        if (!empty($event["location"]["FormattedAddress"])) {
            $event_location = $event["location"]["FormattedAddress"];
        }
        if (!empty($event->alt_image)) {
            // $image = $event->alt_image;
        }
        $type = null;
        $email = isset($eventUser["properties"]["email"]) ? $eventUser["properties"]["email"] : $eventUser["email"];

        if (is_null($email)) {
            $email = $eventUser->properties["email"];
        }

        $organization_picture = !empty($event->styles["event_image"]) && strpos($event->styles["event_image"], 'htt') === 0 ? $event->styles["event_image"] : null;

        //dd("es anonimo: ", $eventUser->anonymous);
        if (!$eventUser->anonymous) {
            $userPassword = isset($eventUser["properties"]["password"]) ? $eventUser["properties"]["password"] : null;
            $password = isset($userPassword) ? $userPassword : $email;

            if ($changePassword) {
                $password = self::createPass();
                try {
                    $updatedUser = $this->auth->changeUserPassword($eventUser['user']['uid'], $password);
                    $properties = $eventUser["properties"];
                    $properties["password"] = $password;
                    $eventUser["properties"] = $properties;
                    $eventUser->save();
                } catch (AuthError $e) {

                    Log::error("temp password used. " . $e->getMessage());
                    $password = "evius.2040";
                    $updatedUser = $this->auth->changeUserPassword($userinfo->uid, $password);
                }
            }

            // var_dump($password);die;
            $eventUser_name = isset($eventUser["properties"]["names"]) ? $eventUser["properties"]["names"] : $eventUser["properties"]["displayName"];

            // lets encrypt !
            $pass = self::encryptdata($password);
        }

        $link = '';
        $this->urlOrigin = isset($urlOrigin) ? $urlOrigin : config('app.front_url');
        if (!$eventUser->anonymous) {
            // Admin SDK API to generate the sign in with email link.
            $firebasaUser = $auth->getUserByEmail($email);
            if ($firebasaUser->emailVerified) {

                $link = $auth->getSignInWithEmailLink(
                    $email,
                    [
                        "url" => $this->urlOrigin . "/loginWithCode?email=" . urlencode($email) . "&event_id=" . $event->_id,
                    ]
                );
            } else {
                $link = $auth->getEmailVerificationLink(
                    $email,
                    [
                        "url" => $this->urlOrigin . "/loginWithCode?email=" . urlencode($email) . "&event_id=" . $event->_id,
                    ]
                );
            }
        } else {
            $link = $this->urlOrigin . "/landing/" . $event->_id . "/evento&email=" . $email . "&names=" . $eventUser_name;
        }

        //WHATSAPP AND SMS SERVICE
        /*
        $has_extension = false;
        $phone = "";
        foreach ($event->user_properties as $propertie) {
        if ($propertie->type == "codearea") {
        $has_extension = true;
        $phone = $propertie->name;
        }
        }
        if ($has_extension) {
        $code = $eventUser["properties"]["code"];
        $codeWhatsapp = substr($code, 1);
        $number = $eventUser["properties"][$phone];
        $numberWhatsapp = $codeWhatsapp . $number;
        $codeUrl = WhatsappService::getCode($link);
        $bodyWhatsapp = WhatsappService::templateButton($numberWhatsapp, $event->styles["banner_image"], $eventUser_name, $event->name, $codeUrl);
        WhatsappService::sendWhatsapp($bodyWhatsapp);
        $numberSms = $code . $number;//con el +
        $body = SmsService::bodyInvitationEvent($eventUser_name, $event->name, $link);
        SmsService::sendSms($numberSms, $body);
        }
         */

        // $link = config('app.api_evius') . "/singinwithemail?email=" . urlencode($email) . '&innerpath=' . $event->_id . "&pass=" . urlencode($pass);
        $content_header = "<div style='text-align: center;font-size: 115%'>" . $content_header . "</div>";
        //$message = "<div style='margin-bottom:-100px;text-align: center;font-size: 115%'>" . $message   . "</div>";

        // [LINK_EVENTO:TEXTO]
        $pattern = '/\[LINK_EVENTO\:(.*)\]/i';

        $replacement = '<a href=' . $link . '>$1</a>';

        $mensajepersonalizado = preg_replace($pattern, $replacement, $event->registration_message);

        // var_dump($mensajepersonalizado);die;

        $this->organization_picture = $organization_picture;
        $this->type = $type;
        $this->image_header = isset($event->styles['banner_image_email']) ? $event->styles['banner_image_email'] : $event->styles['banner_image'];
        $this->link = $link;
        $this->event = $event;
        $this->event_location = $event_location;
        $this->eventUser = $eventUser;
        $this->image = ($image) ? $image : null;
        $this->activity = $activity;
        $this->message = $message;
        $this->image_footer = isset($image_footer) ? $image_footer : $event->styles['banner_footer_email'];
        $this->image_footer_default = (isset($event->styles) && isset($event->styles['banner_footer']) && $event->styles['banner_footer']) ? $event->styles['banner_footer'] : null;
        $this->eventUser_name = $eventUser_name;
        $this->password = $password;
        $this->email = $email;
        $this->urlconfirmacion = $destination . '/landing/' . $event->_id;
        $this->changePassword = $changePassword;
        $this->onlylink = $onlylink;
        $this->mensajepersonalizado = $mensajepersonalizado;
        $this->firebasePasswordChange = $firebasePasswordChange;

        if (!$subject) {
            "Invitación a " . $event->name . "";
        }

        //Definición de horario de inicio y fin del evento.Se le agrega -05:00 para que quede hora Colombia
        $date_time_from = (isset($eventUser->ticket) && isset($eventUser->ticket->activities) && isset($eventUser->ticket->activities->datetime_start)) ? \Carbon\Carbon::parse($eventUser->ticket->activities->datetime_start . "-05:00") : \Carbon\Carbon::parse($event->datetime_from . "-05:00");
        $date_time_to = (isset($eventUser->ticket) && isset($eventUser->ticket->activities) && isset($eventUser->ticket->activities->datetime_end)) ? \Carbon\Carbon::parse($eventUser->ticket->activities->datetime_end . "-05:00") : \Carbon\Carbon::parse($event->datetime_to . "-05:00");
        $date_time_from = $date_time_from->setTimezone("UTC");
        $date_time_to = $date_time_to->setTimezone("UTC");

        $this->subject = $subject;
        // $descripcion = "<div><a href='{$link}'>Evento Virtual,  ir a la plataforma virtual del evento  </a></div>";
        // $descripcion .= ($event->registration_message) ? $event->registration_message : $event->description;

        $descripcion = $event->name . " Ver el evento en: " . $this->link;

        //Crear un ICAL que es un formato para agregar a calendarios y eso se adjunta al correo
        // Eliminar validacion de evento, error con zona horaria y se opto por quemar codigo
        if (!empty($event->dates) && $event->_id != '65035e1e18f62b38c40ca4d4') {
            foreach ($event->dates as $date) {
                $cal = iCalCalendar::create($event->name)
                    ->appendProperty(
                        TextPropertyType::create('URL', $this->urlconfirmacion)
                    )
                    ->appendProperty(
                        TextPropertyType::create('METHOD', "REQUEST")
                    )
                    ->event(
                        iCalEvent::create($event->name)
                            ->startsAt(new DateTime($date['start']))
                            ->endsAt(new DateTime($date['end']))
                            ->description($descripcion)
                            ->uniqueIdentifier("$event->_id ${date['start']}")
                            ->createdAt(new DateTime())
                            ->address(($event->address) ? $event->address : $this->urlconfirmacion)
                            // ->addressName(($event->address) ? $event->address : "Virtual en web evius.co")
                            //->coordinates(51.2343, 4.4287)
                            ->organizer('alerts@geniality.com.co', $event->organizer->name)
                            ->alertMinutesBefore(60, $event->name . " empezará dentro de poco.")
                    )->get();

                array_push($this->ical, $cal);
            }
        } else {
            // Cuando no especifican fechas del evento
            $this->ical = iCalCalendar::create($event->name)->appendProperty(
                TextPropertyType::create('URL', $this->urlconfirmacion)
            )
                ->appendProperty(
                    TextPropertyType::create('METHOD', "REQUEST")
                )
                ->event(
                    iCalEvent::create($event->name)
                        ->startsAt($date_time_from)
                        ->endsAt($date_time_to)
                        ->description($descripcion)
                        ->uniqueIdentifier($event->name)
                        ->createdAt(new DateTime())
                        ->address(($event->address) ? $event->address : $this->urlconfirmacion)
                        // ->addressName(($event->address) ? $event->address : "Virtual en web evius.co")
                        //->coordinates(51.2343, 4.4287)
                        ->organizer('alerts@geniality.com.co', $event->organizer->name)
                        ->alertMinutesBefore(60, $event->name . " empezará dentro de poco.")
                )->get();
        }
    }

    private function encryptdata($string)
    {

        // Store the cipher method
        $ciphering = "AES-128-CTR"; //config(app.chiper);

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = config('app.encryption_iv');

        // Store the encryption key
        $encryption_key = config('app.encryption_key');

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt(
            $string,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );

        // Display the encrypted string
        return $encryption;
    }

    private function createPass()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $input_length = strlen($permitted_chars);
        $random_string = '';
        for ($i = 0; $i < 10; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $icals = $this->ical;
        $logo_evius = 'images/logo.png';
        $this->logo = url($logo_evius);

        $organization = !empty($this->event->organizer_id) ? Organization::find($this->event->organizer_id) : null;
        $from = !empty($organization) ? $organization->name : "Evius Event ";
        $emailOrganization = !empty($organization->email) ? $organization->email : "alerts@geniality.com.co";
        $gfService = new GoogleFiles();
        $event = $this->event;
        try {

            ob_start();
            $qr = QRCode::text($this->eventUser->_id)->setSize(8)->setMargin(4)->png();
            $page = ob_get_contents();
            ob_end_clean();
            $type = "png";
            $image = $page;
            $url = $gfService->storeFile($image, "" . $this->eventUser->_id . "." . $type);

            $this->qr = (string) $url;
            $this->logo = url($logo_evius);
        } catch (\Exception $e) {
            Log::debug("error: " . $e->getMessage());
            var_dump($e->getMessage());
        }

        if ($this->onlylink) {

            return $this
                ->from($emailOrganization, $from)
                ->subject($this->subject)
                ->markdown('rsvp.onetimelogin');
        }

        $locale = isset($this->event->language) ? $this->event->language : 'es';
        App::setLocale($locale);

        if ($this->changePassword) {
            return $this
                ->from($emailOrganization, $from)
                ->subject($this->subject)
                ->markdown('rsvp.changepassword');
        }
        if ($this->onetimelogin) {
            return $this
                ->from($emailOrganization, $from)
                ->subject($this->subject)
                ->markdown('rsvp.onetimelogin');
        }
        if ($this->event->send_custom_email) {

            return $this
                ->from($emailOrganization, $from)
                ->subject($this->subject)
                // ->attachData($this->ical, 'ical.ics', [
                //     'mime' => 'text/calendar',
                // ])
                ->markdown('rsvp.invitationcustom');
            //return $this->view('vendor.mail.html.message');
        }

        if ($this->event->_id === '60c93174a85d8f027013691f' || $this->event->_id === "609ea39ca79e084e7602214c" || $this->event->_id === "60c9313f3e6e7a525514c3c7") {
            return $this
                ->from($emailOrganization, $from)
                ->subject($this->subject)
                ->markdown('rsvp.invitation');
        }

        $icalCalendar = isset($event->extra_config['include_ical_calendar']) ? $event->extra_config['include_ical_calendar'] : true;

        if (!$icalCalendar) {
            return $this->from($emailOrganization, $from)
                ->subject($this->subject)
                ->markdown('rsvp.invitation');
        }

        $mail = $this->from($emailOrganization, $from)
            ->subject($this->subject);

        $i = 0;
        if (is_array($icals)) {
            $i++;
            foreach ($icals as $ical) {
                $mail->attachData($ical, "ical$i.ics", [
                    'mime' => 'text/calendar;charset="UTF-8";method=REQUEST',
                ]);
            }
        } else {
            $mail->attachData($this->ical, "ical.ics", [
                'mime' => 'text/calendar;charset="UTF-8";method=REQUEST',
            ]);
        }

        return $mail->markdown('rsvp.invitation');
    }
}
