
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:App" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App.html">App</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console.html">Console</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Console_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Console/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_EventInvitations" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/EventInvitations.html">EventInvitations</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_EventInvitations_RSVPController" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/EventInvitations/RSVPController.html">RSVPController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Exceptions" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Exceptions_Handler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Exceptions/Handler.html">Handler</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http.html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers_Auth" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers/Auth.html">Auth</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Controllers_Auth_ForgotPasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/ForgotPasswordController.html">ForgotPasswordController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_LoginController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/LoginController.html">LoginController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_RegisterController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/RegisterController.html">RegisterController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_ResetPasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/ResetPasswordController.html">ResetPasswordController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Controllers_AttendeTicketController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/AttendeTicketController.html">AttendeTicketController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Controller" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/Controller.html">Controller</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_EventController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/EventController.html">EventController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_EventUserController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/EventUserController.html">EventUserController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_FilesController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/FilesController.html">FilesController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_FireBaseAuthController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/FireBaseAuthController.html">FireBaseAuthController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_MessageController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/MessageController.html">MessageController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_OrganizationController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/OrganizationController.html">OrganizationController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_OrganizationUserController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/OrganizationUserController.html">OrganizationUserController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_PermissionController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/PermissionController.html">PermissionController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_RolController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/RolController.html">RolController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_StateController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/StateController.html">StateController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_TestingController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/TestingController.html">TestingController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Middleware" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Middleware.html">Middleware</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Middleware_AuthFirebase" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/AuthFirebase.html">AuthFirebase</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_Cors" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/Cors.html">Cors</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_EncryptCookies" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/EncryptCookies.html">EncryptCookies</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_RedirectIfAuthenticated" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/RedirectIfAuthenticated.html">RedirectIfAuthenticated</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_TrimStrings" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/TrimStrings.html">TrimStrings</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_TrustProxies" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/TrustProxies.html">TrustProxies</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_VerifyCsrfToken" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/VerifyCsrfToken.html">VerifyCsrfToken</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Http/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Mail" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Mail.html">Mail</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Mail_RSVP" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Mail/RSVP.html">RSVP</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Providers" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Providers.html">Providers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Providers_AppServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AppServiceProvider.html">AppServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_AuthServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AuthServiceProvider.html">AuthServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_BroadcastServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/BroadcastServiceProvider.html">BroadcastServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_EvaFilesServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/EvaFilesServiceProvider.html">EvaFilesServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_EvaRolServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/EvaRolServiceProvider.html">EvaRolServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_EventServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/EventServiceProvider.html">EventServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_RouteServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/RouteServiceProvider.html">RouteServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_evaLib" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/evaLib.html">evaLib</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_evaLib_Services" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/evaLib/Services.html">Services</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_evaLib_Services_EvaRol" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/evaLib/Services/EvaRol.html">EvaRol</a>                    </div>                </li>                            <li data-name="class:App_evaLib_Services_GoogleFiles" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/evaLib/Services/GoogleFiles.html">GoogleFiles</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                            <li data-name="class:App_AttendeTicket" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/AttendeTicket.html">AttendeTicket</a>                    </div>                </li>                            <li data-name="class:App_Event" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Event.html">Event</a>                    </div>                </li>                            <li data-name="class:App_EventUser" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/EventUser.html">EventUser</a>                    </div>                </li>                            <li data-name="class:App_Message" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Message.html">Message</a>                    </div>                </li>                            <li data-name="class:App_MessageUser" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/MessageUser.html">MessageUser</a>                    </div>                </li>                            <li data-name="class:App_Organization" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Organization.html">Organization</a>                    </div>                </li>                            <li data-name="class:App_OrganizationUser" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/OrganizationUser.html">OrganizationUser</a>                    </div>                </li>                            <li data-name="class:App_Permission" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Permission.html">Permission</a>                    </div>                </li>                            <li data-name="class:App_Rol" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Rol.html">Rol</a>                    </div>                </li>                            <li data-name="class:App_State" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/State.html">State</a>                    </div>                </li>                            <li data-name="class:App_User" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/User.html">User</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "App.html", "name": "App", "doc": "Namespace App"},{"type": "Namespace", "link": "App/Console.html", "name": "App\\Console", "doc": "Namespace App\\Console"},{"type": "Namespace", "link": "App/EventInvitations.html", "name": "App\\EventInvitations", "doc": "Namespace App\\EventInvitations"},{"type": "Namespace", "link": "App/Exceptions.html", "name": "App\\Exceptions", "doc": "Namespace App\\Exceptions"},{"type": "Namespace", "link": "App/Http.html", "name": "App\\Http", "doc": "Namespace App\\Http"},{"type": "Namespace", "link": "App/Http/Controllers.html", "name": "App\\Http\\Controllers", "doc": "Namespace App\\Http\\Controllers"},{"type": "Namespace", "link": "App/Http/Controllers/Auth.html", "name": "App\\Http\\Controllers\\Auth", "doc": "Namespace App\\Http\\Controllers\\Auth"},{"type": "Namespace", "link": "App/Http/Middleware.html", "name": "App\\Http\\Middleware", "doc": "Namespace App\\Http\\Middleware"},{"type": "Namespace", "link": "App/Mail.html", "name": "App\\Mail", "doc": "Namespace App\\Mail"},{"type": "Namespace", "link": "App/Providers.html", "name": "App\\Providers", "doc": "Namespace App\\Providers"},{"type": "Namespace", "link": "App/evaLib.html", "name": "App\\evaLib", "doc": "Namespace App\\evaLib"},{"type": "Namespace", "link": "App/evaLib/Services.html", "name": "App\\evaLib\\Services", "doc": "Namespace App\\evaLib\\Services"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/AttendeTicket.html", "name": "App\\AttendeTicket", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\AttendeTicket", "fromLink": "App/AttendeTicket.html", "link": "App/AttendeTicket.html#method_event", "name": "App\\AttendeTicket::event", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\AttendeTicket", "fromLink": "App/AttendeTicket.html", "link": "App/AttendeTicket.html#method_rol", "name": "App\\AttendeTicket::rol", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Console", "fromLink": "App/Console.html", "link": "App/Console/Kernel.html", "name": "App\\Console\\Kernel", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Console\\Kernel", "fromLink": "App/Console/Kernel.html", "link": "App/Console/Kernel.html#method_schedule", "name": "App\\Console\\Kernel::schedule", "doc": "&quot;Define the application&#039;s command schedule.&quot;"},
                    {"type": "Method", "fromName": "App\\Console\\Kernel", "fromLink": "App/Console/Kernel.html", "link": "App/Console/Kernel.html#method_commands", "name": "App\\Console\\Kernel::commands", "doc": "&quot;Register the commands for the application.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Event.html", "name": "App\\Event", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Event", "fromLink": "App/Event.html", "link": "App/Event.html#method_organization", "name": "App\\Event::organization", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Event", "fromLink": "App/Event.html", "link": "App/Event.html#method_eventUsers", "name": "App\\Event::eventUsers", "doc": "&quot;Get the comments for the blog post.&quot;"},
            
            {"type": "Class", "fromName": "App\\EventInvitations", "fromLink": "App/EventInvitations.html", "link": "App/EventInvitations/RSVPController.html", "name": "App\\EventInvitations\\RSVPController", "doc": "&quot;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&quot;"},
                                                        {"type": "Method", "fromName": "App\\EventInvitations\\RSVPController", "fromLink": "App/EventInvitations/RSVPController.html", "link": "App/EventInvitations/RSVPController.html#method_index", "name": "App\\EventInvitations\\RSVPController::index", "doc": "&quot;Display a listing of the resource.&quot;"},
                    {"type": "Method", "fromName": "App\\EventInvitations\\RSVPController", "fromLink": "App/EventInvitations/RSVPController.html", "link": "App/EventInvitations/RSVPController.html#method_sendEventRSVP", "name": "App\\EventInvitations\\RSVPController::sendEventRSVP", "doc": "&quot;Send RSVP to users in an event, taking usersIds[] in\nrequest to filter which users the RSVP is going to be send to&quot;"},
                    {"type": "Method", "fromName": "App\\EventInvitations\\RSVPController", "fromLink": "App/EventInvitations/RSVPController.html", "link": "App/EventInvitations/RSVPController.html#method_saveRSVP", "name": "App\\EventInvitations\\RSVPController::saveRSVP", "doc": "&quot;Undocumented function&quot;"},
                    {"type": "Method", "fromName": "App\\EventInvitations\\RSVPController", "fromLink": "App/EventInvitations/RSVPController.html", "link": "App/EventInvitations/RSVPController.html#method_confirmRSVP", "name": "App\\EventInvitations\\RSVPController::confirmRSVP", "doc": "&quot;Undocumented function&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/EventUser.html", "name": "App\\EventUser", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\EventUser", "fromLink": "App/EventUser.html", "link": "App/EventUser.html#method_event", "name": "App\\EventUser::event", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\EventUser", "fromLink": "App/EventUser.html", "link": "App/EventUser.html#method_rol", "name": "App\\EventUser::rol", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\EventUser", "fromLink": "App/EventUser.html", "link": "App/EventUser.html#method_state", "name": "App\\EventUser::state", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\EventUser", "fromLink": "App/EventUser.html", "link": "App/EventUser.html#method_user", "name": "App\\EventUser::user", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\EventUser", "fromLink": "App/EventUser.html", "link": "App/EventUser.html#method_confirm", "name": "App\\EventUser::confirm", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\EventUser", "fromLink": "App/EventUser.html", "link": "App/EventUser.html#method_checkIn", "name": "App\\EventUser::checkIn", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\EventUser", "fromLink": "App/EventUser.html", "link": "App/EventUser.html#method_changeToInvite", "name": "App\\EventUser::changeToInvite", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Exceptions", "fromLink": "App/Exceptions.html", "link": "App/Exceptions/Handler.html", "name": "App\\Exceptions\\Handler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_report", "name": "App\\Exceptions\\Handler::report", "doc": "&quot;Report or log an exception.&quot;"},
                    {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_render", "name": "App\\Exceptions\\Handler::render", "doc": "&quot;Render an exception into an HTTP response.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/AttendeTicketController.html", "name": "App\\Http\\Controllers\\AttendeTicketController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\AttendeTicketController", "fromLink": "App/Http/Controllers/AttendeTicketController.html", "link": "App/Http/Controllers/AttendeTicketController.html#method_index", "name": "App\\Http\\Controllers\\AttendeTicketController::index", "doc": "&quot;Display a listing of the resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AttendeTicketController", "fromLink": "App/Http/Controllers/AttendeTicketController.html", "link": "App/Http/Controllers/AttendeTicketController.html#method_create", "name": "App\\Http\\Controllers\\AttendeTicketController::create", "doc": "&quot;Show the form for creating a new resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AttendeTicketController", "fromLink": "App/Http/Controllers/AttendeTicketController.html", "link": "App/Http/Controllers/AttendeTicketController.html#method_store", "name": "App\\Http\\Controllers\\AttendeTicketController::store", "doc": "&quot;Store a newly created resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AttendeTicketController", "fromLink": "App/Http/Controllers/AttendeTicketController.html", "link": "App/Http/Controllers/AttendeTicketController.html#method_show", "name": "App\\Http\\Controllers\\AttendeTicketController::show", "doc": "&quot;Display the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AttendeTicketController", "fromLink": "App/Http/Controllers/AttendeTicketController.html", "link": "App/Http/Controllers/AttendeTicketController.html#method_edit", "name": "App\\Http\\Controllers\\AttendeTicketController::edit", "doc": "&quot;Show the form for editing the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AttendeTicketController", "fromLink": "App/Http/Controllers/AttendeTicketController.html", "link": "App/Http/Controllers/AttendeTicketController.html#method_update", "name": "App\\Http\\Controllers\\AttendeTicketController::update", "doc": "&quot;Update the specified resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AttendeTicketController", "fromLink": "App/Http/Controllers/AttendeTicketController.html", "link": "App/Http/Controllers/AttendeTicketController.html#method_destroy", "name": "App\\Http\\Controllers\\AttendeTicketController::destroy", "doc": "&quot;Remove the specified resource from storage.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/ForgotPasswordController.html", "name": "App\\Http\\Controllers\\Auth\\ForgotPasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\ForgotPasswordController", "fromLink": "App/Http/Controllers/Auth/ForgotPasswordController.html", "link": "App/Http/Controllers/Auth/ForgotPasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\ForgotPasswordController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/LoginController.html", "name": "App\\Http\\Controllers\\Auth\\LoginController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\LoginController", "fromLink": "App/Http/Controllers/Auth/LoginController.html", "link": "App/Http/Controllers/Auth/LoginController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\LoginController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/RegisterController.html", "name": "App\\Http\\Controllers\\Auth\\RegisterController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\RegisterController", "fromLink": "App/Http/Controllers/Auth/RegisterController.html", "link": "App/Http/Controllers/Auth/RegisterController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\RegisterController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\RegisterController", "fromLink": "App/Http/Controllers/Auth/RegisterController.html", "link": "App/Http/Controllers/Auth/RegisterController.html#method_validator", "name": "App\\Http\\Controllers\\Auth\\RegisterController::validator", "doc": "&quot;Get a validator for an incoming registration request.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\RegisterController", "fromLink": "App/Http/Controllers/Auth/RegisterController.html", "link": "App/Http/Controllers/Auth/RegisterController.html#method_create", "name": "App\\Http\\Controllers\\Auth\\RegisterController::create", "doc": "&quot;Create a new user instance after a valid registration.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/ResetPasswordController.html", "name": "App\\Http\\Controllers\\Auth\\ResetPasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\ResetPasswordController", "fromLink": "App/Http/Controllers/Auth/ResetPasswordController.html", "link": "App/Http/Controllers/Auth/ResetPasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\ResetPasswordController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/Controller.html", "name": "App\\Http\\Controllers\\Controller", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/EventController.html", "name": "App\\Http\\Controllers\\EventController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_index", "name": "App\\Http\\Controllers\\EventController::index", "doc": "&quot;Display a listing of the resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_publicEvents", "name": "App\\Http\\Controllers\\EventController::publicEvents", "doc": "&quot;Return all public events&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_getOnePublicEvent", "name": "App\\Http\\Controllers\\EventController::getOnePublicEvent", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_create", "name": "App\\Http\\Controllers\\EventController::create", "doc": "&quot;Show the form for creating a new resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_delete", "name": "App\\Http\\Controllers\\EventController::delete", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_store", "name": "App\\Http\\Controllers\\EventController::store", "doc": "&quot;Store a newly created resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_show", "name": "App\\Http\\Controllers\\EventController::show", "doc": "&quot;Display the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_edit", "name": "App\\Http\\Controllers\\EventController::edit", "doc": "&quot;Show the form for editing the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_test", "name": "App\\Http\\Controllers\\EventController::test", "doc": "&quot;Simply testing service providers&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_update", "name": "App\\Http\\Controllers\\EventController::update", "doc": "&quot;Update the specified resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_destroy", "name": "App\\Http\\Controllers\\EventController::destroy", "doc": "&quot;Remove the specified resource from storage.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/EventUserController.html", "name": "App\\Http\\Controllers\\EventUserController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_index", "name": "App\\Http\\Controllers\\EventUserController::index", "doc": "&quot;Display a listing of the resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_addUserToEvent", "name": "App\\Http\\Controllers\\EventUserController::addUserToEvent", "doc": "&quot;Show the form for creating a new resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_testing", "name": "App\\Http\\Controllers\\EventUserController::testing", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_store", "name": "App\\Http\\Controllers\\EventUserController::store", "doc": "&quot;Store a newly created resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_verifyandcreate", "name": "App\\Http\\Controllers\\EventUserController::verifyandcreate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_createImportedUser", "name": "App\\Http\\Controllers\\EventUserController::createImportedUser", "doc": "&quot;Create users imported in the excel&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_show", "name": "App\\Http\\Controllers\\EventUserController::show", "doc": "&quot;Display the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_edit", "name": "App\\Http\\Controllers\\EventUserController::edit", "doc": "&quot;Show the form for editing the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_update", "name": "App\\Http\\Controllers\\EventUserController::update", "doc": "&quot;Update the specified resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_checkIn", "name": "App\\Http\\Controllers\\EventUserController::checkIn", "doc": "&quot;Undocumented function&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventUserController", "fromLink": "App/Http/Controllers/EventUserController.html", "link": "App/Http/Controllers/EventUserController.html#method_destroy", "name": "App\\Http\\Controllers\\EventUserController::destroy", "doc": "&quot;Remove the specified resource from storage.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/FilesController.html", "name": "App\\Http\\Controllers\\FilesController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\FilesController", "fromLink": "App/Http/Controllers/FilesController.html", "link": "App/Http/Controllers/FilesController.html#method_upload", "name": "App\\Http\\Controllers\\FilesController::upload", "doc": "&quot;Uploads files send though HTTP multipart\/form-data&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/FireBaseAuthController.html", "name": "App\\Http\\Controllers\\FireBaseAuthController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\FireBaseAuthController", "fromLink": "App/Http/Controllers/FireBaseAuthController.html", "link": "App/Http/Controllers/FireBaseAuthController.html#method_getCurrentUser", "name": "App\\Http\\Controllers\\FireBaseAuthController::getCurrentUser", "doc": "&quot;getCurrentUser&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/MessageController.html", "name": "App\\Http\\Controllers\\MessageController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\MessageController", "fromLink": "App/Http/Controllers/MessageController.html", "link": "App/Http/Controllers/MessageController.html#method_message", "name": "App\\Http\\Controllers\\MessageController::message", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/OrganizationController.html", "name": "App\\Http\\Controllers\\OrganizationController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationController", "fromLink": "App/Http/Controllers/OrganizationController.html", "link": "App/Http/Controllers/OrganizationController.html#method_index", "name": "App\\Http\\Controllers\\OrganizationController::index", "doc": "&quot;Display a listing of the resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationController", "fromLink": "App/Http/Controllers/OrganizationController.html", "link": "App/Http/Controllers/OrganizationController.html#method_create", "name": "App\\Http\\Controllers\\OrganizationController::create", "doc": "&quot;Show the form for creating a new resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationController", "fromLink": "App/Http/Controllers/OrganizationController.html", "link": "App/Http/Controllers/OrganizationController.html#method_store", "name": "App\\Http\\Controllers\\OrganizationController::store", "doc": "&quot;Store a newly created resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationController", "fromLink": "App/Http/Controllers/OrganizationController.html", "link": "App/Http/Controllers/OrganizationController.html#method_show", "name": "App\\Http\\Controllers\\OrganizationController::show", "doc": "&quot;Display the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationController", "fromLink": "App/Http/Controllers/OrganizationController.html", "link": "App/Http/Controllers/OrganizationController.html#method_edit", "name": "App\\Http\\Controllers\\OrganizationController::edit", "doc": "&quot;Show the form for editing the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationController", "fromLink": "App/Http/Controllers/OrganizationController.html", "link": "App/Http/Controllers/OrganizationController.html#method_update", "name": "App\\Http\\Controllers\\OrganizationController::update", "doc": "&quot;Update the specified resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationController", "fromLink": "App/Http/Controllers/OrganizationController.html", "link": "App/Http/Controllers/OrganizationController.html#method_destroy", "name": "App\\Http\\Controllers\\OrganizationController::destroy", "doc": "&quot;Remove the specified resource from storage.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/OrganizationUserController.html", "name": "App\\Http\\Controllers\\OrganizationUserController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationUserController", "fromLink": "App/Http/Controllers/OrganizationUserController.html", "link": "App/Http/Controllers/OrganizationUserController.html#method_index", "name": "App\\Http\\Controllers\\OrganizationUserController::index", "doc": "&quot;Display a listing of the resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationUserController", "fromLink": "App/Http/Controllers/OrganizationUserController.html", "link": "App/Http/Controllers/OrganizationUserController.html#method_create", "name": "App\\Http\\Controllers\\OrganizationUserController::create", "doc": "&quot;Show the form for creating a new resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationUserController", "fromLink": "App/Http/Controllers/OrganizationUserController.html", "link": "App/Http/Controllers/OrganizationUserController.html#method_store", "name": "App\\Http\\Controllers\\OrganizationUserController::store", "doc": "&quot;Store a newly created resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationUserController", "fromLink": "App/Http/Controllers/OrganizationUserController.html", "link": "App/Http/Controllers/OrganizationUserController.html#method_verifyandcreate", "name": "App\\Http\\Controllers\\OrganizationUserController::verifyandcreate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationUserController", "fromLink": "App/Http/Controllers/OrganizationUserController.html", "link": "App/Http/Controllers/OrganizationUserController.html#method_show", "name": "App\\Http\\Controllers\\OrganizationUserController::show", "doc": "&quot;Display the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationUserController", "fromLink": "App/Http/Controllers/OrganizationUserController.html", "link": "App/Http/Controllers/OrganizationUserController.html#method_edit", "name": "App\\Http\\Controllers\\OrganizationUserController::edit", "doc": "&quot;Show the form for editing the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationUserController", "fromLink": "App/Http/Controllers/OrganizationUserController.html", "link": "App/Http/Controllers/OrganizationUserController.html#method_update", "name": "App\\Http\\Controllers\\OrganizationUserController::update", "doc": "&quot;Update the specified resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\OrganizationUserController", "fromLink": "App/Http/Controllers/OrganizationUserController.html", "link": "App/Http/Controllers/OrganizationUserController.html#method_destroy", "name": "App\\Http\\Controllers\\OrganizationUserController::destroy", "doc": "&quot;Remove the specified resource from storage.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/PermissionController.html", "name": "App\\Http\\Controllers\\PermissionController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\PermissionController", "fromLink": "App/Http/Controllers/PermissionController.html", "link": "App/Http/Controllers/PermissionController.html#method_index", "name": "App\\Http\\Controllers\\PermissionController::index", "doc": "&quot;Display a listing of the resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PermissionController", "fromLink": "App/Http/Controllers/PermissionController.html", "link": "App/Http/Controllers/PermissionController.html#method_create", "name": "App\\Http\\Controllers\\PermissionController::create", "doc": "&quot;Show the form for creating a new resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PermissionController", "fromLink": "App/Http/Controllers/PermissionController.html", "link": "App/Http/Controllers/PermissionController.html#method_store", "name": "App\\Http\\Controllers\\PermissionController::store", "doc": "&quot;Store a newly created resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PermissionController", "fromLink": "App/Http/Controllers/PermissionController.html", "link": "App/Http/Controllers/PermissionController.html#method_show", "name": "App\\Http\\Controllers\\PermissionController::show", "doc": "&quot;Display the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PermissionController", "fromLink": "App/Http/Controllers/PermissionController.html", "link": "App/Http/Controllers/PermissionController.html#method_edit", "name": "App\\Http\\Controllers\\PermissionController::edit", "doc": "&quot;Show the form for editing the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PermissionController", "fromLink": "App/Http/Controllers/PermissionController.html", "link": "App/Http/Controllers/PermissionController.html#method_update", "name": "App\\Http\\Controllers\\PermissionController::update", "doc": "&quot;Update the specified resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PermissionController", "fromLink": "App/Http/Controllers/PermissionController.html", "link": "App/Http/Controllers/PermissionController.html#method_destroy", "name": "App\\Http\\Controllers\\PermissionController::destroy", "doc": "&quot;Remove the specified resource from storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PermissionController", "fromLink": "App/Http/Controllers/PermissionController.html", "link": "App/Http/Controllers/PermissionController.html#method_getUserPermissionByEvent", "name": "App\\Http\\Controllers\\PermissionController::getUserPermissionByEvent", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/RolController.html", "name": "App\\Http\\Controllers\\RolController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\RolController", "fromLink": "App/Http/Controllers/RolController.html", "link": "App/Http/Controllers/RolController.html#method_index", "name": "App\\Http\\Controllers\\RolController::index", "doc": "&quot;Display a listing of the resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\RolController", "fromLink": "App/Http/Controllers/RolController.html", "link": "App/Http/Controllers/RolController.html#method_create", "name": "App\\Http\\Controllers\\RolController::create", "doc": "&quot;Show the form for creating a new resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\RolController", "fromLink": "App/Http/Controllers/RolController.html", "link": "App/Http/Controllers/RolController.html#method_store", "name": "App\\Http\\Controllers\\RolController::store", "doc": "&quot;Store a newly created resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\RolController", "fromLink": "App/Http/Controllers/RolController.html", "link": "App/Http/Controllers/RolController.html#method_show", "name": "App\\Http\\Controllers\\RolController::show", "doc": "&quot;Display the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\RolController", "fromLink": "App/Http/Controllers/RolController.html", "link": "App/Http/Controllers/RolController.html#method_edit", "name": "App\\Http\\Controllers\\RolController::edit", "doc": "&quot;Show the form for editing the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\RolController", "fromLink": "App/Http/Controllers/RolController.html", "link": "App/Http/Controllers/RolController.html#method_update", "name": "App\\Http\\Controllers\\RolController::update", "doc": "&quot;Update the specified resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\RolController", "fromLink": "App/Http/Controllers/RolController.html", "link": "App/Http/Controllers/RolController.html#method_destroy", "name": "App\\Http\\Controllers\\RolController::destroy", "doc": "&quot;Remove the specified resource from storage.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/StateController.html", "name": "App\\Http\\Controllers\\StateController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\StateController", "fromLink": "App/Http/Controllers/StateController.html", "link": "App/Http/Controllers/StateController.html#method_index", "name": "App\\Http\\Controllers\\StateController::index", "doc": "&quot;Display a listing of the resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\StateController", "fromLink": "App/Http/Controllers/StateController.html", "link": "App/Http/Controllers/StateController.html#method_create", "name": "App\\Http\\Controllers\\StateController::create", "doc": "&quot;Show the form for creating a new resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\StateController", "fromLink": "App/Http/Controllers/StateController.html", "link": "App/Http/Controllers/StateController.html#method_store", "name": "App\\Http\\Controllers\\StateController::store", "doc": "&quot;Store a newly created resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\StateController", "fromLink": "App/Http/Controllers/StateController.html", "link": "App/Http/Controllers/StateController.html#method_show", "name": "App\\Http\\Controllers\\StateController::show", "doc": "&quot;Display the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\StateController", "fromLink": "App/Http/Controllers/StateController.html", "link": "App/Http/Controllers/StateController.html#method_edit", "name": "App\\Http\\Controllers\\StateController::edit", "doc": "&quot;Show the form for editing the specified resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\StateController", "fromLink": "App/Http/Controllers/StateController.html", "link": "App/Http/Controllers/StateController.html#method_update", "name": "App\\Http\\Controllers\\StateController::update", "doc": "&quot;Update the specified resource in storage.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\StateController", "fromLink": "App/Http/Controllers/StateController.html", "link": "App/Http/Controllers/StateController.html#method_destroy", "name": "App\\Http\\Controllers\\StateController::destroy", "doc": "&quot;Remove the specified resource from storage.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/TestingController.html", "name": "App\\Http\\Controllers\\TestingController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\TestingController", "fromLink": "App/Http/Controllers/TestingController.html", "link": "App/Http/Controllers/TestingController.html#method_sendemail", "name": "App\\Http\\Controllers\\TestingController::sendemail", "doc": "&quot;Show the form for creating a new resource.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\TestingController", "fromLink": "App/Http/Controllers/TestingController.html", "link": "App/Http/Controllers/TestingController.html#method_sendemail2", "name": "App\\Http\\Controllers\\TestingController::sendemail2", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\TestingController", "fromLink": "App/Http/Controllers/TestingController.html", "link": "App/Http/Controllers/TestingController.html#method_usuario", "name": "App\\Http\\Controllers\\TestingController::usuario", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http", "fromLink": "App/Http.html", "link": "App/Http/Kernel.html", "name": "App\\Http\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/AuthFirebase.html", "name": "App\\Http\\Middleware\\AuthFirebase", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\AuthFirebase", "fromLink": "App/Http/Middleware/AuthFirebase.html", "link": "App/Http/Middleware/AuthFirebase.html#method_handle", "name": "App\\Http\\Middleware\\AuthFirebase::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/Cors.html", "name": "App\\Http\\Middleware\\Cors", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\Cors", "fromLink": "App/Http/Middleware/Cors.html", "link": "App/Http/Middleware/Cors.html#method_handle", "name": "App\\Http\\Middleware\\Cors::handle", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/EncryptCookies.html", "name": "App\\Http\\Middleware\\EncryptCookies", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\RedirectIfAuthenticated", "fromLink": "App/Http/Middleware/RedirectIfAuthenticated.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html#method_handle", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/TrimStrings.html", "name": "App\\Http\\Middleware\\TrimStrings", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/TrustProxies.html", "name": "App\\Http\\Middleware\\TrustProxies", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/VerifyCsrfToken.html", "name": "App\\Http\\Middleware\\VerifyCsrfToken", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Mail", "fromLink": "App/Mail.html", "link": "App/Mail/RSVP.html", "name": "App\\Mail\\RSVP", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Mail\\RSVP", "fromLink": "App/Mail/RSVP.html", "link": "App/Mail/RSVP.html#method___construct", "name": "App\\Mail\\RSVP::__construct", "doc": "&quot;Create a new message instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Mail\\RSVP", "fromLink": "App/Mail/RSVP.html", "link": "App/Mail/RSVP.html#method_build", "name": "App\\Mail\\RSVP::build", "doc": "&quot;Build the message.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Message.html", "name": "App\\Message", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Message", "fromLink": "App/Message.html", "link": "App/Message.html#method_users", "name": "App\\Message::users", "doc": "&quot;The messages that belong to the user.&quot;"},
                    {"type": "Method", "fromName": "App\\Message", "fromLink": "App/Message.html", "link": "App/Message.html#method_messageUsers", "name": "App\\Message::messageUsers", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/MessageUser.html", "name": "App\\MessageUser", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\MessageUser", "fromLink": "App/MessageUser.html", "link": "App/MessageUser.html#method_user", "name": "App\\MessageUser::user", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\MessageUser", "fromLink": "App/MessageUser.html", "link": "App/MessageUser.html#method_message", "name": "App\\MessageUser::message", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Organization.html", "name": "App\\Organization", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/OrganizationUser.html", "name": "App\\OrganizationUser", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\OrganizationUser", "fromLink": "App/OrganizationUser.html", "link": "App/OrganizationUser.html#method_organization", "name": "App\\OrganizationUser::organization", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\OrganizationUser", "fromLink": "App/OrganizationUser.html", "link": "App/OrganizationUser.html#method_rol", "name": "App\\OrganizationUser::rol", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Permission.html", "name": "App\\Permission", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AppServiceProvider.html", "name": "App\\Providers\\AppServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_boot", "name": "App\\Providers\\AppServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_register", "name": "App\\Providers\\AppServiceProvider::register", "doc": "&quot;Register any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AuthServiceProvider.html", "name": "App\\Providers\\AuthServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AuthServiceProvider", "fromLink": "App/Providers/AuthServiceProvider.html", "link": "App/Providers/AuthServiceProvider.html#method_boot", "name": "App\\Providers\\AuthServiceProvider::boot", "doc": "&quot;Register any authentication \/ authorization services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/BroadcastServiceProvider.html", "name": "App\\Providers\\BroadcastServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\BroadcastServiceProvider", "fromLink": "App/Providers/BroadcastServiceProvider.html", "link": "App/Providers/BroadcastServiceProvider.html#method_boot", "name": "App\\Providers\\BroadcastServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/EvaFilesServiceProvider.html", "name": "App\\Providers\\EvaFilesServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\EvaFilesServiceProvider", "fromLink": "App/Providers/EvaFilesServiceProvider.html", "link": "App/Providers/EvaFilesServiceProvider.html#method_boot", "name": "App\\Providers\\EvaFilesServiceProvider::boot", "doc": "&quot;Bootstrap services.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\EvaFilesServiceProvider", "fromLink": "App/Providers/EvaFilesServiceProvider.html", "link": "App/Providers/EvaFilesServiceProvider.html#method_register", "name": "App\\Providers\\EvaFilesServiceProvider::register", "doc": "&quot;Register services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/EvaRolServiceProvider.html", "name": "App\\Providers\\EvaRolServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\EvaRolServiceProvider", "fromLink": "App/Providers/EvaRolServiceProvider.html", "link": "App/Providers/EvaRolServiceProvider.html#method_boot", "name": "App\\Providers\\EvaRolServiceProvider::boot", "doc": "&quot;Bootstrap services.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\EvaRolServiceProvider", "fromLink": "App/Providers/EvaRolServiceProvider.html", "link": "App/Providers/EvaRolServiceProvider.html#method_register", "name": "App\\Providers\\EvaRolServiceProvider::register", "doc": "&quot;Register services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/EventServiceProvider.html", "name": "App\\Providers\\EventServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\EventServiceProvider", "fromLink": "App/Providers/EventServiceProvider.html", "link": "App/Providers/EventServiceProvider.html#method_boot", "name": "App\\Providers\\EventServiceProvider::boot", "doc": "&quot;Register any events for your application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/RouteServiceProvider.html", "name": "App\\Providers\\RouteServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_boot", "name": "App\\Providers\\RouteServiceProvider::boot", "doc": "&quot;Define your route model bindings, pattern filters, etc.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_map", "name": "App\\Providers\\RouteServiceProvider::map", "doc": "&quot;Define the routes for the application.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_mapWebRoutes", "name": "App\\Providers\\RouteServiceProvider::mapWebRoutes", "doc": "&quot;Define the \&quot;web\&quot; routes for the application.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_mapApiRoutes", "name": "App\\Providers\\RouteServiceProvider::mapApiRoutes", "doc": "&quot;Define the \&quot;api\&quot; routes for the application.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_mapAuthRoutes", "name": "App\\Providers\\RouteServiceProvider::mapAuthRoutes", "doc": "&quot;Define the \&quot;auth\&quot; routes for the application.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Rol.html", "name": "App\\Rol", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Rol", "fromLink": "App/Rol.html", "link": "App/Rol.html#method_event", "name": "App\\Rol::event", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Rol", "fromLink": "App/Rol.html", "link": "App/Rol.html#method_organization", "name": "App\\Rol::organization", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/State.html", "name": "App\\State", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/User.html", "name": "App\\User", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_messages", "name": "App\\User::messages", "doc": "&quot;The messages that belong to the user.&quot;"},
            
            {"type": "Class", "fromName": "App\\evaLib\\Services", "fromLink": "App/evaLib/Services.html", "link": "App/evaLib/Services/EvaRol.html", "name": "App\\evaLib\\Services\\EvaRol", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\evaLib\\Services\\EvaRol", "fromLink": "App/evaLib/Services/EvaRol.html", "link": "App/evaLib/Services/EvaRol.html#method_doSomethingUseful", "name": "App\\evaLib\\Services\\EvaRol::doSomethingUseful", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\evaLib\\Services\\EvaRol", "fromLink": "App/evaLib/Services/EvaRol.html", "link": "App/evaLib/Services/EvaRol.html#method_createAuthorAsEventAdmin", "name": "App\\evaLib\\Services\\EvaRol::createAuthorAsEventAdmin", "doc": "&quot;Stores a file in remote storage service returning url&quot;"},
                    {"type": "Method", "fromName": "App\\evaLib\\Services\\EvaRol", "fromLink": "App/evaLib/Services/EvaRol.html", "link": "App/evaLib/Services/EvaRol.html#method_createAuthorAsOrganizationAdmin", "name": "App\\evaLib\\Services\\EvaRol::createAuthorAsOrganizationAdmin", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\evaLib\\Services", "fromLink": "App/evaLib/Services.html", "link": "App/evaLib/Services/GoogleFiles.html", "name": "App\\evaLib\\Services\\GoogleFiles", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\evaLib\\Services\\GoogleFiles", "fromLink": "App/evaLib/Services/GoogleFiles.html", "link": "App/evaLib/Services/GoogleFiles.html#method_doSomethingUseful", "name": "App\\evaLib\\Services\\GoogleFiles::doSomethingUseful", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\evaLib\\Services\\GoogleFiles", "fromLink": "App/evaLib/Services/GoogleFiles.html", "link": "App/evaLib/Services/GoogleFiles.html#method_storeFile", "name": "App\\evaLib\\Services\\GoogleFiles::storeFile", "doc": "&quot;Stores a file in remote storage service returning url&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


