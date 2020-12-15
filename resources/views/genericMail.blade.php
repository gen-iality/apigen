@component('mail::message')  
    
    <p><strong>Nombre del usuario: </strong>{{ $userName }}</p>
    <p><strong>Correo del usuario: </strong>{{ $emailUser }}</p>
    <p>
        {{$message}}
    </p>
    

@endcomponent