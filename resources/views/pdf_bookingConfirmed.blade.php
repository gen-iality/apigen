<html>
    <body>
        <div style="width:75%; margin:1em auto; height: auto; border: 1px solid lightgrey;">
            <div style="width:70%; margin:0 auto; padding: 3em 0">
                <div style="width:100%">
                    <div style=" width:40%; margin: 0 auto">
                        <img src="images/logo.png" width="100%"/>
                    </div>
                </div>

                <div style="display: block; height: 300px; margin-bottom:1em; border-bottom: 1px solid lightgrey;">
                    <div style="width:45%; display: inline-block; vertical-align:top; padding: 35px 0;">
                        <div style="margin-bottom: 1em;">
                            <h3 style="margin: 0;">Evento</h3>
                            <p style="margin: 0;">{{$event->name}}</p>
                        </div>
                        <div style="margin-bottom: 1em;">
                            <h3 style="margin: 0;">Ticket Nro</h3>
                            <p style="margin: 0;">{{$tikect_id}}</p>
                        </div>
                        <div style="margin-bottom: 1em;">
                            <h3 style="margin: 0;">Fecha de Impresion</h3>
                            <p style="margin: 0;">31/10/2018</p>
                        </div>
                    </div>
                    <div style="width: auto; display: inline-block;">
                        <img src="{{url()->previous()}}/api/generatorQr/{{$tikect_id}}" />
                    </div>
                </div>

                <div style="display: block; border-bottom: 1px solid lightgrey;">
                    <div style="display: inline-block; width:100%; margin-bottom: 1em;">
                        <h3 style="margin: 0;">Nombre</h3>
                        <p style="margin: 0; text-align:center">{{$eventuser}}</p>
                    </div>
                    <div style="display:block; width:100%; margin-bottom: 1em;  ">
                        <div style="display:inline-block; margin-bottom:1em; border-right:1px solid lightgrey; width:45%;">
                            <h3 style="margin: 0;">Tipo de Entrada</h3>
                            <p style="margin: 0 0 0 1em;">General</p>
                        </div>
                        <div style="display: inline-block; margin-bottom:1em; width:45%; float: right;">
                            <h3 style="margin: 0;">Precio</h3>
                            <p style="margin:0 0 0 1em;">Invitacion</p>
                        </div>
                    </div>                    
                </div>

                <div style="display:block;">
                    <div style="display: inline-block; width:100%; margin-bottom:1em;">
                        <div style="display: inline-block; margin-bottom: 1em; margin-top: 2em; width: 100%;">
                            <div style="display:inline-block; width:45%; border-right: 1px solid lightgrey;">
                                <h3 style="margin: 0;">Fecha de Inicio</h3>
                                <p style="margin:0 0 0 1em;">{{ date('l, F j Y ', strtotime($event->datetime_from)) }}</p>
                            </div>
                            <div style="display:inline-block; width:45%; float: right;">
                                <h3 style="margin: 0;">Hora</h3>
                                <p style="margin:0 0 0 1em;">{{date('H:s', strtotime($event->datetime_from)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display:block;">
                    <div style="display:inline-block; width:100%; margin-bottom: 1em;">
                        <div style="display:inline-block; margin-bottom: 1em; width: 100%;">
                            <div style="display:inline-block; width:45%; border-right: 1px solid lightgrey;">
                                <h3 style="margin: 0;">Fecha Finalización</h3>
                                <p style="margin:0 0 0 1em;">{{ date('l, F j Y ', strtotime($event->datetime_to)) }}</p>
                            </div>
                            <div style="display:inline-block; width:45%; float:right;">
                                <h3 style="margin: 0;">Hora</h3>
                                <p style="margin:0 0 0 1em;">{{date('H:s', strtotime($event->datetime_to)) }}</p>
                            </div>
                        </div>
                    </div> 
                </div>
                
                <div style="display: block; border-bottom: 1px dashed lightgrey;">
                    <div style="display:inline-block; width:100%; margin-bottom:1em;">
                        <div style="display:inline-block; width:100%">
                            <h3>Ubicacion del Evento</h3>
                            <p>{{$location}}</p>
                        </div>    
                    </div>
                </div>

                <div style="display:block;">
                    <p style="text-align:center">Imprime esta entrada y tráela el día del evento, recuerda
                    que tambien puedes presentarla desde tu smartphone.</p>
                </div>
            </div>
        </div>
        <div style="display:block; width:75%; margin:1em auto;">
            <div style="display:block;">
                <p style="text-align:center">La manera más facíl de publicar y organizar tus eventos.</p>
            </div>
            <div style="display:block; width:40%; margin: 0 auto">
                <img src="images/logo.png" width="100%"/>
            </div>
        </div>
    </body>
</html>