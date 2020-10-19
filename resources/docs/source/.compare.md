---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#ActivityAssistant.


<!-- START_eca15b751105fbb8f3ff752e6f4428a7 -->
## _index:_ Listado de los usuarios de las actividades.

Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/ut/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"activity_id":"earum","user_id":"harum"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/ut/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_id": "earum",
    "user_id": "harum"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/activities_attendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `activity_id` | string |  required  | id de la actividad a listar
        `user_id` | string |  required  | id del usuario a listar
    
<!-- END_eca15b751105fbb8f3ff752e6f4428a7 -->

<!-- START_368722239d745a97771b933ab15b57a2 -->
## _store_: Store a newly created resource in storage
Crear de asistencia de usuario por actividad

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"sit","activity_id":"commodi"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "sit",
    "activity_id": "commodi"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/activities_attendees`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | required |  optional  | string id del usuario que asistirá a la actividad
        `activity_id` | required |  optional  | string id del de la actividad a las que asistirá el usuario.
    
<!-- END_368722239d745a97771b933ab15b57a2 -->

<!-- START_9e0213186f832d6708992947ec48bd85 -->
## _show:_ Mostrar asistente-actividad.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/in/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/in/activities_attendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/activities_attendees/{activities_attendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | id ActivityAssistant

<!-- END_9e0213186f832d6708992947ec48bd85 -->

<!-- START_fe450cfeffdd715401ac202e8a07afb5 -->
## _update:_ Update the specified resource in storage.

Actualizar registro de actividad-asistente.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"checkedin_at":"numquam"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activities_attendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "checkedin_at": "numquam"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/activities_attendees/{activities_attendee}`

`PATCH api/events/{event_id}/activities_attendees/{activities_attendee}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `checkedin_at` | dateTime |  required  | 
    
<!-- END_fe450cfeffdd715401ac202e8a07afb5 -->

<!-- START_a88693506040243563fe88ba562ff6cf -->
## _destroy_: Remove specific record from ActivityAssistant
Eliminar registro específico de ActivityAssistant

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/facere/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/facere/activities_attendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/activities_attendees/{activities_attendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required
    `id` |  optional  | string required id de Attendee

<!-- END_a88693506040243563fe88ba562ff6cf -->

<!-- START_edd1a95da5722356af1cc0e3cfcd3035 -->
## _indexForAdmin:_ Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/iusto/activities_attendeesAdmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"activity_id":"eaque","user_id":"dignissimos"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/iusto/activities_attendeesAdmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_id": "eaque",
    "user_id": "dignissimos"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/activities_attendeesAdmin`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `activity_id` | string |  required  | id de la actividad a listar
        `user_id` | string |  required  | id del usuario a listar
    
<!-- END_edd1a95da5722356af1cc0e3cfcd3035 -->

<!-- START_515690ef29735a9f74bb254e7af30f8b -->
## _meIndex:_ Consultar las actividades inscritas del usuario logueado.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/events/tenetur/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/events/tenetur/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/me/events/{event_id}/activities_attendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 

<!-- END_515690ef29735a9f74bb254e7af30f8b -->

<!-- START_40ddf68733d3f5fd481f254ccf82b550 -->
## _checkIn:_ Actualizar checkIn cuando un usuario entra a la actividad.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/activities_attendees/1/check_in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activities_attendees/1/check_in"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/activities_attendees/{id}/check_in`


<!-- END_40ddf68733d3f5fd481f254ccf82b550 -->

<!-- START_5b252f668f0a1dea44aaa843eaa84ad0 -->
## _borradorepetidos:_ Borrar usuarios repetidos en las actividades.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/borradorepetidos/activity/perferendis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/borradorepetidos/activity/perferendis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/borradorepetidos/activity/{activity_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `activity_id` |  required  | Id de Actividad a la que se le borran usuarios repetidos.

<!-- END_5b252f668f0a1dea44aaa843eaa84ad0 -->

#EventUser.


<!-- START_741efed688409cc5b0c2673b73da037b -->
## __index:__ Display all the EventUsers of an event

this methods allows dynamic quering by any property via URL using the services FilterQuery.
Exmaple:
 - ?filteredBy=[{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/eventusers`


<!-- END_741efed688409cc5b0c2673b73da037b -->

<!-- START_a365aa3932cace4bde297c80cef75050 -->
## __Show:__ Display an Attendee by id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/corrupti/eventusers/vero" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/corrupti/eventusers/vero"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/eventusers/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required
    `id` |  optional  | string required id de Attendee

<!-- END_a365aa3932cace4bde297c80cef75050 -->

<!-- START_64ba4676dd80d161a4fc09b243f63433 -->
## api/events/{event_id}/searchinevent
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/searchinevent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/searchinevent"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/searchinevent`


<!-- END_64ba4676dd80d161a4fc09b243f63433 -->

<!-- START_f4ee022bcd35d6d38fadedb070189787 -->
## api/events/myevents
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/myevents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/myevents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/myevents`


<!-- END_f4ee022bcd35d6d38fadedb070189787 -->

<!-- START_314ab10189ffcbcaaab1ed19eb9dd21f -->
## api/eventusers/event/{event_id}/user/{user_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/eventusers/event/1/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventusers/event/1/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/eventusers/event/{event_id}/user/{user_id}`


<!-- END_314ab10189ffcbcaaab1ed19eb9dd21f -->

<!-- START_017b9c2694857efdd5c16863bc1aaea7 -->
## _SubscribeUserToEventAndSendEmail_: Register user to an event and send confirmation email
Registrar usuario a un evento y enviar correo de confirmación

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/voluptatem/adduserwithemailvalidation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"asperiores","name":"sunt","other_params,":{"":{"":{"":"tenetur"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/voluptatem/adduserwithemailvalidation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "asperiores",
    "name": "sunt",
    "other_params,": {
        "": {
            "": {
                "": "tenetur"
            }
        }
    }
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/adduserwithemailvalidation`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | field
        `name` | string |  required  | 
        `other_params,...` | any |  optional  | other params  will be saved in user and eventUser
    
<!-- END_017b9c2694857efdd5c16863bc1aaea7 -->

<!-- START_cd20adcf5c26e47f21f72d0301544be1 -->
## _ChangeUserPassword_: Change user password
Cambiar contraseña del usuario

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/est/changeUserPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"sunt"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/est/changeUserPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "sunt"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/changeUserPassword`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | Email of the user who will change his password
    
<!-- END_cd20adcf5c26e47f21f72d0301544be1 -->

<!-- START_6b56a32b833284ebacc99706a28295f7 -->
## api/eventusers/{event_id}/tranfereventuser/{event_user}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/eventusers/1/tranfereventuser/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventusers/1/tranfereventuser/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/eventusers/{event_id}/tranfereventuser/{event_user}`


<!-- END_6b56a32b833284ebacc99706a28295f7 -->

<!-- START_6b9ba84498ac309ef3cc779bb6c6279f -->
## api/events/withstatus/{id}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/withstatus/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/withstatus/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/withstatus/{id}`


<!-- END_6b9ba84498ac309ef3cc779bb6c6279f -->

<!-- START_62f0c5655d8d2562857a8516c1822886 -->
## api/eventUsers/{id}/withStatus
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/eventUsers/1/withStatus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventUsers/1/withStatus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/eventUsers/{id}/withStatus`


<!-- END_62f0c5655d8d2562857a8516c1822886 -->

<!-- START_897c85bf5d7fd99f7b7f7aa4e4dd66f2 -->
## __CheckIn:__ Checks In an existent Attendee to the related event

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/eventUsers/maxime/checkin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventUsers/maxime/checkin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/eventUsers/{id}/checkin`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string required id Attendee to checkin into the event

<!-- END_897c85bf5d7fd99f7b7f7aa4e4dd66f2 -->

<!-- START_f4a1ecb28e0dc1d6236e81e49658f03c -->
## _createUserAndAddtoEvent_:Create user and add it to an event
Crear un usuario y añadirlo a un evento

> Example request:

```bash
curl -X POST \
    "http://localhost/api/eventUsers/createUserAndAddtoEvent/odit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"consectetur","name":"et","password":"maiores","other_params,":{"":{"":{"":"possimus"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/eventUsers/createUserAndAddtoEvent/odit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "consectetur",
    "name": "et",
    "password": "maiores",
    "other_params,": {
        "": {
            "": {
                "": "possimus"
            }
        }
    }
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/eventUsers/createUserAndAddtoEvent/{event_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required
    `eventuser_id` |  optional  | string
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | field
        `name` | string |  required  | 
        `password` | string |  required  | 
        `other_params,...` | any |  optional  | other params  will be saved in user and eventUser
    
<!-- END_f4a1ecb28e0dc1d6236e81e49658f03c -->

<!-- START_8584edbef5108e01985db1d291b64c2e -->
## api/eventUsers/bookEventUsers/{event}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/eventUsers/bookEventUsers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventUsers/bookEventUsers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/eventUsers/bookEventUsers/{event}`


<!-- END_8584edbef5108e01985db1d291b64c2e -->

<!-- START_249ab20f97f221e40760858747d9b006 -->
## api/events/{event_id}/testeventusers
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/testeventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/testeventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/testeventusers`


<!-- END_249ab20f97f221e40760858747d9b006 -->

<!-- START_eed9d2ac9ae0f6e3669f6613fa1d351c -->
## _createUserAndAddtoEvent_:Create user and add it to an event
Crear un usuario y añadirlo a un evento

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/sint/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"illum","name":"laboriosam","password":"perferendis","other_params,":{"":{"":{"":"qui"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/sint/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "illum",
    "name": "laboriosam",
    "password": "perferendis",
    "other_params,": {
        "": {
            "": {
                "": "qui"
            }
        }
    }
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/eventusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required
    `eventuser_id` |  optional  | string
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | field
        `name` | string |  required  | 
        `password` | string |  required  | 
        `other_params,...` | any |  optional  | other params  will be saved in user and eventUser
    
<!-- END_eed9d2ac9ae0f6e3669f6613fa1d351c -->

<!-- START_7ea69d252da861fe068b097ff9fb8ec9 -->
## api/me/eventusers/event/{event_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/eventusers/event/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/eventusers/event/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/me/eventusers/event/{event_id}`


<!-- END_7ea69d252da861fe068b097ff9fb8ec9 -->

<!-- START_1b30bab6e9ef7c312e1ee78d85ac2dfa -->
## api/me/events/{event_id}/eventusers
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/events/1/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/events/1/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/me/events/{event_id}/eventusers`


<!-- END_1b30bab6e9ef7c312e1ee78d85ac2dfa -->

<!-- START_7d2c50077b648a794a56934c47fae532 -->
## __index:__ Display all the EventUsers of an event

this methods allows dynamic quering by any property via URL using the services FilterQuery.
Exmaple:
 - ?filteredBy=[{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/eventUsers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/eventUsers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/eventUsers`


<!-- END_7d2c50077b648a794a56934c47fae532 -->

<!-- START_882953c7fc55a0465ff69cdc398811be -->
## __Update:__ Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/est/eventusers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"maiores","name":"voluptatibus","other_params,":{"":{"":{"":"officiis"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/est/eventusers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "maiores",
    "name": "voluptatibus",
    "other_params,": {
        "": {
            "": {
                "": "officiis"
            }
        }
    }
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/eventusers/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required
    `evenUserId` |  optional  | string required id de Attendee
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | field
        `name` | string |  required  | 
        `other_params,...` | any |  optional  | other params  will be saved in user and eventUser
    
<!-- END_882953c7fc55a0465ff69cdc398811be -->

<!-- START_8229080007df704aa1e43dbfa7bf3ea8 -->
## __delete:__ Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/eventusers/officia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/eventusers/officia"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/eventusers/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string required id Attendee to checkin into the event

<!-- END_8229080007df704aa1e43dbfa7bf3ea8 -->

<!-- START_8cc5dbbd6d1dd06913d7bbb6ce8cec8d -->
## __createUserViaUrl:__ Tries to create a new user from provided data and then add that user to specified event

Intenta crear un nuevo usuario a partir de los datos proporcionados y luego lo agrega al evento especificado

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/cumque/eventusersbyurl" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"quam","name":"voluptatibus","other_params,":{"":{"":{"":"ullam"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/cumque/eventusersbyurl"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quam",
    "name": "voluptatibus",
    "other_params,": {
        "": {
            "": {
                "": "ullam"
            }
        }
    }
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/eventusersbyurl`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | field
        `name` | string |  required  | 
        `other_params,...` | any |  optional  | other params  will be saved in user and eventUser
    
<!-- END_8cc5dbbd6d1dd06913d7bbb6ce8cec8d -->

<!-- START_49dfc5f0a26b6a7a13efa07e31d9e131 -->
## api/events/{event_id}/sendemailtoallusers
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/sendemailtoallusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendemailtoallusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/sendemailtoallusers`


<!-- END_49dfc5f0a26b6a7a13efa07e31d9e131 -->

<!-- START_b517d383c710e2dea5f2e97ab7bb8b43 -->
## _meEvents:_ Listado de eventos incritos del usuario logueado.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/eventUsers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/eventUsers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/me/eventUsers`


<!-- END_b517d383c710e2dea5f2e97ab7bb8b43 -->

#Invitation


<!-- START_e37bb54d9c879f83a7481d706567da04 -->
## api/singinwithemail
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/singinwithemail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/singinwithemail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/singinwithemail`


<!-- END_e37bb54d9c879f83a7481d706567da04 -->

<!-- START_14f5adf45c9b14e7cb29dbe4d4d66bed -->
## _invitationsSent_:List of applications sent

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/vel/indexinvitations/nulla" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/vel/indexinvitations/nulla"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/indexinvitations/{user_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | 
    `user_id` |  optional  | 

<!-- END_14f5adf45c9b14e7cb29dbe4d4d66bed -->

<!-- START_64d2cbddd78e2a020c86f89cc3e88d1a -->
## _invitationsReceived_: List of applications recived

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/quae/indexinvitationsrecieved/ea" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/quae/indexinvitationsrecieved/ea"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/indexinvitationsrecieved/{user_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | 
    `user_id` |  optional  | 

<!-- END_64d2cbddd78e2a020c86f89cc3e88d1a -->

<!-- START_ac223e224f8317ff1a01fccd8ef736e7 -->
## _acceptOrDeclineFriendRequest_: Accept Or Decline Friend Request

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/nostrum/acceptordecline/velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"response":"quis"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/nostrum/acceptordecline/velit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "response": "quis"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/acceptordecline/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | user who accepts or rejects the application
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `response` | string |  required  | 
    
<!-- END_ac223e224f8317ff1a01fccd8ef736e7 -->

<!-- START_bd81320f3c4511edb1925655907b488f -->
## _indexcontacts_: List of current contacts

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/tenetur/contactlist/unde" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/tenetur/contactlist/unde"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/contactlist/{user_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | 
    `user_id` |  optional  | 

<!-- END_bd81320f3c4511edb1925655907b488f -->

<!-- START_b38652249ac82e5c106c2a3355efaeed -->
## api/events/{event_id}/meetingrequest/notify
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/meetingrequest/notify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/meetingrequest/notify"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/meetingrequest/notify`


<!-- END_b38652249ac82e5c106c2a3355efaeed -->

<!-- START_6ca4e171737001f583fce1bb4bb9ddb2 -->
## _indexcontacts_: List of current contacts

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/adipisci/contactlist/placeat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/adipisci/contactlist/placeat"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/contactlist/{user_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | 
    `user_id` |  optional  | 

<!-- END_6ca4e171737001f583fce1bb4bb9ddb2 -->

<!-- START_980c7fcb3212d1a5166f9b32292c06f1 -->
## _index_: Display a listing of the Invitation.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/ullam/invitation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/ullam/invitation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/invitation`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 

<!-- END_980c7fcb3212d1a5166f9b32292c06f1 -->

<!-- START_9517f6b677db242e4a1cf6a04daf4e1d -->
## _store_: Send request with redirection to evius

Enviar solicitud con redirección a evius

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/et/invitation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id_user_requested":"quisquam"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/et/invitation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id_user_requested": "quisquam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/invitation`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id_user_requested` | string |  required  | 
    
<!-- END_9517f6b677db242e4a1cf6a04daf4e1d -->

<!-- START_cfcc08fc7d6b3ebcd309681e30856e8c -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/invitation/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/invitation/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/invitation/{invitation}`


<!-- END_cfcc08fc7d6b3ebcd309681e30856e8c -->

<!-- START_2a0c45e501d0cc663f127e9a5a157c6e -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/invitation/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/invitation/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/invitation/{invitation}`

`PATCH api/events/{event_id}/invitation/{invitation}`


<!-- END_2a0c45e501d0cc663f127e9a5a157c6e -->

<!-- START_0f3398960f180ac8c24d54336d7ffdbb -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/invitation/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/invitation/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/invitation/{invitation}`


<!-- END_0f3398960f180ac8c24d54336d7ffdbb -->

#Organization


<!-- START_434c81a9abb0283f205ef7cb7378688e -->
## _index_:Display a listing of the organizations.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/organizations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/organizations`


<!-- END_434c81a9abb0283f205ef7cb7378688e -->

<!-- START_7d1f86cd2d17ff6e8f7bce97aeabc7f3 -->
## _show_: Display the specified organization.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/organizations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/organizations/{organization}`


<!-- END_7d1f86cd2d17ff6e8f7bce97aeabc7f3 -->

<!-- START_a3d4660c575d6fd59c9718ff69a12cc7 -->
## _store_:Store a newly created resource in organizations.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/organizations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"properties":{"name,email":[]}}'

```

```javascript
const url = new URL(
    "http://localhost/api/organizations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "properties": {
        "name,email": []
    }
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/organizations`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `properties[name,email]` | array |  optional  | 
    
<!-- END_a3d4660c575d6fd59c9718ff69a12cc7 -->

<!-- START_e6c758d4cc6e3b90231537145573cfd8 -->
## _update_: Update the specified resource in organization.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/organizations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/organizations/{organization}`

`PATCH api/organizations/{organization}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  required  | 

<!-- END_e6c758d4cc6e3b90231537145573cfd8 -->

<!-- START_b9047b90f047db47c77810fd8de29af9 -->
## _destroy_: Remove the specified organization from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/organizations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/organizations/{organization}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  required  | 

<!-- END_b9047b90f047db47c77810fd8de29af9 -->

<!-- START_4c6145b46f1c2242e8bb6de5f5447d52 -->
## _meOrganizations_: List the organizations of the logged-in user.

Listar las organizaciones del usuario logueado

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/organizations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/organizations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/me/organizations`


<!-- END_4c6145b46f1c2242e8bb6de5f5447d52 -->

#RSVP


<!-- START_9b477f276b762a5f390fd3dc38df8cdb -->
## *  notificaciones al correo por actividad en el muro

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/wallnotifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/wallnotifications"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/wallnotifications`


<!-- END_9b477f276b762a5f390fd3dc38df8cdb -->

<!-- START_01aa68de7cc9bc01aac7cf1947206db3 -->
## api/rsvp/test
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rsvp/test" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rsvp/test"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/rsvp/test`


<!-- END_01aa68de7cc9bc01aac7cf1947206db3 -->

<!-- START_6b8165cc7da505120fbe6aa7aba5356e -->
## _createAndSendRSVP_:Send RSVP to users in an event, taking usersIds[] in request to filter which users the RSVP is going to be send to
Enviar RSVP a los usuarios en un evento, tomando usersIds[] en solicitud para filtrar a qué usuarios se va a enviar la RSVP

> Example request:

```bash
curl -X POST \
    "http://localhost/api/rsvp/sendeventrsvp/autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"usersIds":{"":"atque"},"message":"neque","image":"atque","subject":"architecto","footer":"recusandae"}'

```

```javascript
const url = new URL(
    "http://localhost/api/rsvp/sendeventrsvp/autem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "usersIds": {
        "": "atque"
    },
    "message": "neque",
    "image": "atque",
    "subject": "architecto",
    "footer": "recusandae"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/rsvp/sendeventrsvp/{event}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `usersIds[]` | required |  optional  | 
        `message` | required |  optional  | 
        `image` | required |  optional  | 
        `subject` | required |  optional  | 
        `footer` | required |  optional  | 
    
<!-- END_6b8165cc7da505120fbe6aa7aba5356e -->

<!-- START_1ce8e6bee5951ce85fa8ccdc35da0865 -->
## _confirmRSVP_: Confirmation de RSVP

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rsvp/confirmrsvp/reprehenderit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rsvp/confirmrsvp/reprehenderit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/rsvp/confirmrsvp/{eventUser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `eventUser` |  required  | 

<!-- END_1ce8e6bee5951ce85fa8ccdc35da0865 -->

<!-- START_f0266492be1eb40c7fae7d7b7c12402e -->
## api/rsvp/confirmrsvptest/{eventUser}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rsvp/confirmrsvptest/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rsvp/confirmrsvptest/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/rsvp/confirmrsvptest/{eventUser}`


<!-- END_f0266492be1eb40c7fae7d7b7c12402e -->

#Synchronization


<!-- START_713b263eae14561e1e999503e124ba0c -->
## Event Users

This driver was designed to export all event_users found on mongo.
Este controlador fue diseñado para exportar todos los event_users que se encuentran en mongo
Realizando una migración completa, para mas información acerca del funcionamiento de firestore con php sigue el siguiente link https://firebase-php.readthedocs.io/en/4.44.0/

El controlador sigue los siguientes pasos:
     1. Se abre el servicio de firestore
     2. Captura toda la información de la table event_users
     3. Crea la collección, el cual es el mismo nombre "event_users"
     4. Recorre todos los usuarios encontrados anteriormente pero.
         4.1. Si los datos del usuario existen entonces.
         4.2. Guarda un nuevo documento con el id del event_user.
         4.3. Convertimos los datos del usuario en un array para poder guardarlo.
         4.4. Dentro del documento guardamos los datos del usuario.
     5. Al finalizar retornamos un mensaje sobre la culminación del trabajo

Inconvenientes: La cantidad de usuarios, hace que la página no responda arrogando un
error por limite de tiempo.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/sync/firestore/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sync/firestore/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/sync/firestore/{event_id}`


<!-- END_713b263eae14561e1e999503e124ba0c -->

<!-- START_1b510062bbbf529fbc9099f8ed51139d -->
## Event Account

Este controlador fue diseñado para exportar un event_user que se encuentran en mongo
Realizando una migración por medio del id,

para mas información acerca del funcionamiento de firestore con php sigue el siguiente link
https://github.com/morrislaptop/firestore-php

El controlador sigue los siguientes pasos:
     1. Se abre el servicio de firestore
     2. Captura toda la información del event_users
     3. Se diríge a la collección, el cual es el mismo nombre "event_users"
     4. Recorre todos los usuarios encontrados anteriormente pero.
         4.1. Si los datos del usuario existen entonces.
         4.2. Guarda un nuevo documento con el id del event_user.
         4.3. Convertimos los datos del usuario en un array para poder guardarlo.
         4.4. Dentro del documento guardamos los datos del usuario.
     5. Al finalizar retornamos un mensaje sobre la culminación del trabajo

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/sync/firestore/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sync/firestore/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/sync/firestore/{id}`


<!-- END_1b510062bbbf529fbc9099f8ed51139d -->

<!-- START_0a90f007ba0181dc120f51a029d014c9 -->
## api/sync/firebase/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/sync/firebase/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sync/firebase/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/sync/firebase/{id}`


<!-- END_0a90f007ba0181dc120f51a029d014c9 -->

#UserProperties


<!-- START_80e4098ecf7c46e19bc2ae66dee69b0a -->
## Display a listing of the resource UserProperties.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/est/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/est/userproperties"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/userproperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | .

<!-- END_80e4098ecf7c46e19bc2ae66dee69b0a -->

<!-- START_ebb5857491760d6d919fb2ee88948798 -->
## Store a newly created resource in UserProperties.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"quas","name":"omnis","other_params,":{"":{"":{"":"laborum"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/1/userproperties"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quas",
    "name": "omnis",
    "other_params,": {
        "": {
            "": {
                "": "laborum"
            }
        }
    }
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/userproperties`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | field
        `name` | string |  required  | 
        `other_params,...` | any |  optional  | other params  will be saved in UserProperties
    
<!-- END_ebb5857491760d6d919fb2ee88948798 -->

<!-- START_fe05ac86d035509adf2f42088dba696d -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/inventore/userproperties/quaerat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"quod","name":"iure","other_params,":{"":{"":{"":"delectus"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/inventore/userproperties/quaerat"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quod",
    "name": "iure",
    "other_params,": {
        "": {
            "": {
                "": "delectus"
            }
        }
    }
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/userproperties/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | id UserProperties
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | field
        `name` | string |  required  | 
        `other_params,...` | any |  optional  | other params  will be saved in UserProperties
    
<!-- END_fe05ac86d035509adf2f42088dba696d -->

<!-- START_ed027bf50129713419477bccfbfba928 -->
## Update the specified resource in UserProperties.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/vitae/userproperties/minima" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"other_params,":{"":{"":{"":"et"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/vitae/userproperties/minima"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "other_params,": {
        "": {
            "": {
                "": "et"
            }
        }
    }
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/userproperties/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | id UserProperties
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `other_params,...` | any |  optional  | other params  will be saved in UserProperties
    
<!-- END_ed027bf50129713419477bccfbfba928 -->

<!-- START_c9fea00fc5c42be6bb3201c8cb649333 -->
## Remove the specified resource from UserProperties.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/sequi/userproperties/eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/sequi/userproperties/eos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/userproperties/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | id UserProperties

<!-- END_c9fea00fc5c42be6bb3201c8cb649333 -->

#general


<!-- START_f7b7ea397f8939c8bb93e6cab64603ce -->
## Display Swagger API page.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/documentation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/documentation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/documentation`


<!-- END_f7b7ea397f8939c8bb93e6cab64603ce -->

<!-- START_1ead214f30a5e235e7140eb2aaa29eee -->
## Dump api-docs.json content endpoint.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/docs/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/docs/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET docs/{jsonFile?}`

`POST docs/{jsonFile?}`

`PUT docs/{jsonFile?}`

`PATCH docs/{jsonFile?}`

`DELETE docs/{jsonFile?}`

`OPTIONS docs/{jsonFile?}`


<!-- END_1ead214f30a5e235e7140eb2aaa29eee -->

<!-- START_1a23c1337818a4de9e417863aebaca33 -->
## docs/asset/{asset}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/docs/asset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/docs/asset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET docs/asset/{asset}`


<!-- END_1a23c1337818a4de9e417863aebaca33 -->

<!-- START_a2c4ea37605c6d2e3c93b7269030af0a -->
## Display Oauth2 callback pages.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/oauth2-callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth2-callback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/oauth2-callback`


<!-- END_a2c4ea37605c6d2e3c93b7269030af0a -->

<!-- START_f9be2084aff68c858acd388059207b79 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/spaces" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/spaces"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/spaces`


<!-- END_f9be2084aff68c858acd388059207b79 -->

<!-- START_170d265425e546856aa4e402627f4ea2 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/spaces" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/spaces"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/spaces`


<!-- END_170d265425e546856aa4e402627f4ea2 -->

<!-- START_8bcd2eda92d7f472c26850a40f8e7373 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/spaces/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/spaces/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/spaces/{id}`


<!-- END_8bcd2eda92d7f472c26850a40f8e7373 -->

<!-- START_cbb8ea6901e6c3a91dbf2f4023780494 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/spaces/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/spaces/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/spaces/{id}`


<!-- END_cbb8ea6901e6c3a91dbf2f4023780494 -->

<!-- START_0fb45d1ff227ec2424af968dfbebe3a3 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/spaces/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/spaces/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/spaces/{id}`


<!-- END_0fb45d1ff227ec2424af968dfbebe3a3 -->

<!-- START_964575066aab89a37fb80b450ca0225d -->
## api/event/{id}/configuration
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/event/1/configuration" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/event/1/configuration"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/event/{id}/configuration`


<!-- END_964575066aab89a37fb80b450ca0225d -->

<!-- START_5a649a0985c0852e0ae90d619e8169ce -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/event/1/configuration" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/event/1/configuration"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/event/{id}/configuration`


<!-- END_5a649a0985c0852e0ae90d619e8169ce -->

<!-- START_4fb585c746a41b0ea15113f2f28ad3f5 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/event/1/configuration/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/event/1/configuration/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/event/{id}/configuration/{configuration}`


<!-- END_4fb585c746a41b0ea15113f2f28ad3f5 -->

<!-- START_2ea6da70cac057cb257e5d7e1e21a1a9 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/event/1/configuration/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/event/1/configuration/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/event/{id}/configuration/{configuration}`

`PATCH api/event/{id}/configuration/{configuration}`


<!-- END_2ea6da70cac057cb257e5d7e1e21a1a9 -->

<!-- START_0d4edc5ad34e68043a4433354757f602 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/event/1/configuration/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/event/1/configuration/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/event/{id}/configuration/{configuration}`


<!-- END_0d4edc5ad34e68043a4433354757f602 -->

<!-- START_a9bb45f8d746da9914dcc2ee8e72690c -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/event/1/configuration" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/event/1/configuration"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/event/{id}/configuration`


<!-- END_a9bb45f8d746da9914dcc2ee8e72690c -->

<!-- START_3ca75370bdd408878ed2e43af6fa6884 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/styles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/styles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/styles`


<!-- END_3ca75370bdd408878ed2e43af6fa6884 -->

<!-- START_503458718d7be3b36083fa946c700657 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/styles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/styles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/styles`


<!-- END_503458718d7be3b36083fa946c700657 -->

<!-- START_7b34640bf09fa6460f6143483e38b414 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/styles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/styles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/styles/{style}`


<!-- END_7b34640bf09fa6460f6143483e38b414 -->

<!-- START_cc7f38a3597a6b3e8b3d549ccc8695e5 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/styles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/styles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/styles/{style}`

`PATCH api/events/{event_id}/styles/{style}`


<!-- END_cc7f38a3597a6b3e8b3d549ccc8695e5 -->

<!-- START_2612595ee38bea997349eee5c65bf395 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/styles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/styles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/styles/{style}`


<!-- END_2612595ee38bea997349eee5c65bf395 -->

<!-- START_4d9686758fd77c23cbb6ef2ae1ff7429 -->
## api/events/{event_id}/stylestemp
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/stylestemp" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/stylestemp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/stylestemp`


<!-- END_4d9686758fd77c23cbb6ef2ae1ff7429 -->

<!-- START_e0d49728ce088a96c48a48028a684153 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/newsfeed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/newsfeed"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{id}/newsfeed`


<!-- END_e0d49728ce088a96c48a48028a684153 -->

<!-- START_62d862a784d8247e840dac5ed6157a5c -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/newsfeed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/newsfeed"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{id}/newsfeed`


<!-- END_62d862a784d8247e840dac5ed6157a5c -->

<!-- START_28dc61ac3b5ba76cc6ca7e512591793d -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/newsfeed/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/newsfeed/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{id}/newsfeed/{newsfeed}`


<!-- END_28dc61ac3b5ba76cc6ca7e512591793d -->

<!-- START_c6a06dd093cca191d88cbb7b06470a40 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/newsfeed/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/newsfeed/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{id}/newsfeed/{newsfeed}`

`PATCH api/events/{id}/newsfeed/{newsfeed}`


<!-- END_c6a06dd093cca191d88cbb7b06470a40 -->

<!-- START_1a2eae5db99739ef1bf2920ae364258a -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/newsfeed/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/newsfeed/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{id}/newsfeed/{newsfeed}`


<!-- END_1a2eae5db99739ef1bf2920ae364258a -->

<!-- START_197591256de6497289ad668a16ae1d87 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/surveys"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{id}/surveys`


<!-- END_197591256de6497289ad668a16ae1d87 -->

<!-- START_23038058c2ee32777d8f8d6893825b70 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/surveys"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{id}/surveys`


<!-- END_23038058c2ee32777d8f8d6893825b70 -->

<!-- START_38bbb52ea61cf253c98556f7aa9fde12 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/surveys/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/surveys/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{id}/surveys/{survey}`


<!-- END_38bbb52ea61cf253c98556f7aa9fde12 -->

<!-- START_b13bb17427337f15a17a8eb791626ca6 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/surveys/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/surveys/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{id}/surveys/{survey}`

`PATCH api/events/{id}/surveys/{survey}`


<!-- END_b13bb17427337f15a17a8eb791626ca6 -->

<!-- START_ac5a48ef106fc4209e4e5cfbd04e06bc -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/surveys/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/surveys/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{id}/surveys/{survey}`


<!-- END_ac5a48ef106fc4209e4e5cfbd04e06bc -->

<!-- START_8786205d28fca4396d84aa7b22325a45 -->
## api/events/{event_id}/questionedit/{id}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/questionedit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/questionedit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/questionedit/{id}`


<!-- END_8786205d28fca4396d84aa7b22325a45 -->

<!-- START_077192157db94670b0aec4f8c3ab858f -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/host"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/host`


<!-- END_077192157db94670b0aec4f8c3ab858f -->

<!-- START_8710494b3157c7134f7c467307cff046 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/host"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/host`


<!-- END_8710494b3157c7134f7c467307cff046 -->

<!-- START_85676b7f0e906289674c581ed2493a28 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/host/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/host/{host}`


<!-- END_85676b7f0e906289674c581ed2493a28 -->

<!-- START_e181049a1431f6e4a1b7613337ac048b -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/host/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/host/{host}`

`PATCH api/events/{event_id}/host/{host}`


<!-- END_e181049a1431f6e4a1b7613337ac048b -->

<!-- START_7b8999601caed9302abcb020e7e74f34 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/host/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/host/{host}`


<!-- END_7b8999601caed9302abcb020e7e74f34 -->

<!-- START_b9298050e90b4de6eccf58a900a68606 -->
## api/meetingrecording
> Example request:

```bash
curl -X POST \
    "http://localhost/api/meetingrecording" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/meetingrecording"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/meetingrecording`


<!-- END_b9298050e90b4de6eccf58a900a68606 -->

<!-- START_7def06aea83f3af8d7df3d68a7c1776e -->
## api/events/{event_id}/duplicateactivitie/{id}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/duplicateactivitie/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/duplicateactivitie/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/duplicateactivitie/{id}`


<!-- END_7def06aea83f3af8d7df3d68a7c1776e -->

<!-- START_30c8734825ebd7286a547fb216116479 -->
## api/events/{event_id}/activitiesbyhost/{host_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/activitiesbyhost/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activitiesbyhost/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/activitiesbyhost/{host_id}`


<!-- END_30c8734825ebd7286a547fb216116479 -->

<!-- START_4b74c69334a9fda83ca783df8b478e89 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/activities`


<!-- END_4b74c69334a9fda83ca783df8b478e89 -->

<!-- START_6828bf55010cf5e51d8e53e912e57eef -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/activities`


<!-- END_6828bf55010cf5e51d8e53e912e57eef -->

<!-- START_7b617dbab4e1f0b404e75ddfd19c8fe7 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activities/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/activities/{activity}`


<!-- END_7b617dbab4e1f0b404e75ddfd19c8fe7 -->

<!-- START_4ba6ba333e4727baa0578296257f0dd9 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activities/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/activities/{activity}`

`PATCH api/events/{event_id}/activities/{activity}`


<!-- END_4ba6ba333e4727baa0578296257f0dd9 -->

<!-- START_13a385d312a14beeda4094ce219fd8c0 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activities/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/activities/{activity}`


<!-- END_13a385d312a14beeda4094ce219fd8c0 -->

<!-- START_871211164d6ff3c84d19bccb06960a4f -->
## api/events/{event_id}/createmeeting/{id}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/createmeeting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/createmeeting/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/createmeeting/{id}`


<!-- END_871211164d6ff3c84d19bccb06960a4f -->

<!-- START_c475fed2fcef9d17f79b2367bddc8c50 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/type" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/type"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/type`


<!-- END_c475fed2fcef9d17f79b2367bddc8c50 -->

<!-- START_13a8fbc711030df644ad64785010a517 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/type" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/type"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/type`


<!-- END_13a8fbc711030df644ad64785010a517 -->

<!-- START_abc4ab7d85396fa24429dc944b0e26ee -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/type/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/type/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/type/{type}`


<!-- END_abc4ab7d85396fa24429dc944b0e26ee -->

<!-- START_b69685bfde86c65561fc99a7ee4228cf -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/type/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/type/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/type/{type}`

`PATCH api/events/{event_id}/type/{type}`


<!-- END_b69685bfde86c65561fc99a7ee4228cf -->

<!-- START_4e8c152fe008d63d23eebc1ab70f3df7 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/type/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/type/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/type/{type}`


<!-- END_4e8c152fe008d63d23eebc1ab70f3df7 -->

<!-- START_83f28bcefc953eb3a7205d1a45951890 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/categoryactivities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/categoryactivities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/categoryactivities`


<!-- END_83f28bcefc953eb3a7205d1a45951890 -->

<!-- START_9cc51c6bffac731b60e642cff610d4ae -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/categoryactivities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/categoryactivities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/categoryactivities`


<!-- END_9cc51c6bffac731b60e642cff610d4ae -->

<!-- START_e434a41e15f59fbfa341284759422d93 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/categoryactivities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/categoryactivities/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/categoryactivities/{categoryactivity}`


<!-- END_e434a41e15f59fbfa341284759422d93 -->

<!-- START_6f35aa1f05b3abdd88f62d01a0d039f1 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/categoryactivities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/categoryactivities/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/categoryactivities/{categoryactivity}`

`PATCH api/events/{event_id}/categoryactivities/{categoryactivity}`


<!-- END_6f35aa1f05b3abdd88f62d01a0d039f1 -->

<!-- START_29451dde1051fbdd10afe021d8064d2f -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/categoryactivities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/categoryactivities/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/categoryactivities/{categoryactivity}`


<!-- END_29451dde1051fbdd10afe021d8064d2f -->

<!-- START_e1637ef61b41584b6bcdea0d55291e55 -->
## api/events/{event_id}/recoverypassword
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/recoverypassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/recoverypassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/recoverypassword`


<!-- END_e1637ef61b41584b6bcdea0d55291e55 -->

<!-- START_5ed094292849b54364e74db0b9de0d66 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/sendpush" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendpush"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/sendpush`


<!-- END_5ed094292849b54364e74db0b9de0d66 -->

<!-- START_24982fda4edaee46e7fedfa69509ec71 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/sendpush" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendpush"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/sendpush`


<!-- END_24982fda4edaee46e7fedfa69509ec71 -->

<!-- START_471bb14b5a1d856b92fed3e3d1694144 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/sendpush/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendpush/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/sendpush/{sendpush}`


<!-- END_471bb14b5a1d856b92fed3e3d1694144 -->

<!-- START_138a15942e6537a55167ce57685f6c3f -->
## api/events/{event_id}/sendpush/{sendpush}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/sendpush/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendpush/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/sendpush/{sendpush}`

`PATCH api/events/{event_id}/sendpush/{sendpush}`


<!-- END_138a15942e6537a55167ce57685f6c3f -->

<!-- START_83fb7bd44a09da529a1285e71c9c393f -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/sendpush/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendpush/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/sendpush/{sendpush}`


<!-- END_83fb7bd44a09da529a1285e71c9c393f -->

<!-- START_c116f85bebc95aa026a5b59ebd1e554d -->
## api/event/{event_id}/notifications/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/event/1/notifications/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/event/1/notifications/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/event/{event_id}/notifications/{id}`


<!-- END_c116f85bebc95aa026a5b59ebd1e554d -->

<!-- START_b0ef8043c83487565960a1983b663e91 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/documents`


<!-- END_b0ef8043c83487565960a1983b663e91 -->

<!-- START_5bb93c1b652f6b08a1c6a5d251db6a52 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/documents`


<!-- END_5bb93c1b652f6b08a1c6a5d251db6a52 -->

<!-- START_be7c4c6c0dfd759f9a7eeefb203c5095 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/documents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/documents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/documents/{document}`


<!-- END_be7c4c6c0dfd759f9a7eeefb203c5095 -->

<!-- START_fd6303cd1aeea0b67655b7c34120e2bf -->
## api/events/{event_id}/documents/{document}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/documents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/documents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/documents/{document}`

`PATCH api/events/{event_id}/documents/{document}`


<!-- END_fd6303cd1aeea0b67655b7c34120e2bf -->

<!-- START_705641f839861b64bb2c37f1f8f4ad7c -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/documents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/documents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/documents/{document}`


<!-- END_705641f839861b64bb2c37f1f8f4ad7c -->

<!-- START_3f43fceb60b0e871e5038a1d5663c1e7 -->
## api/events/{event_id}/getallfiles
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/getallfiles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/getallfiles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/getallfiles`


<!-- END_3f43fceb60b0e871e5038a1d5663c1e7 -->

<!-- START_47868b24eeb845176ecbdbd68d4b72ee -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/wall" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/wall"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/wall`


<!-- END_47868b24eeb845176ecbdbd68d4b72ee -->

<!-- START_854b7e222082699382b9545d35a5ef1d -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/wall" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/wall"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/wall`


<!-- END_854b7e222082699382b9545d35a5ef1d -->

<!-- START_c9fbc809514fa0b005bc091fd12ffe97 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/wall/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/wall/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/wall/{wall}`


<!-- END_c9fbc809514fa0b005bc091fd12ffe97 -->

<!-- START_704264199a9376de9fc4bc701333599e -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/wall/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/wall/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/wall/{wall}`

`PATCH api/events/{event_id}/wall/{wall}`


<!-- END_704264199a9376de9fc4bc701333599e -->

<!-- START_7246a0a321df63b16c0d62f2bd012da6 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/wall/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/wall/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/wall/{wall}`


<!-- END_7246a0a321df63b16c0d62f2bd012da6 -->

<!-- START_d7857dd92d30891b8c4744d2f70289b5 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/faqs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/faqs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{id}/faqs`


<!-- END_d7857dd92d30891b8c4744d2f70289b5 -->

<!-- START_796e9bcebc2b4205096d4fda9187ac2f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/faqs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/faqs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{id}/faqs`


<!-- END_796e9bcebc2b4205096d4fda9187ac2f -->

<!-- START_9ab32b83623389160a1f43d8cb78dec3 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/faqs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/faqs/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{id}/faqs/{faq}`


<!-- END_9ab32b83623389160a1f43d8cb78dec3 -->

<!-- START_e9fa3dd0e6a384bb493d299bc17d8e07 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/faqs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/faqs/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{id}/faqs/{faq}`

`PATCH api/events/{id}/faqs/{faq}`


<!-- END_e9fa3dd0e6a384bb493d299bc17d8e07 -->

<!-- START_1a139fe556e9fe5c47c2bdce789665b4 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/faqs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/faqs/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{id}/faqs/{faq}`


<!-- END_1a139fe556e9fe5c47c2bdce789665b4 -->

<!-- START_0cf8d1dd0fcf2679d1de5e7e206c38da -->
## api/events/{event_id}/duplicatefaqs/{id}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/duplicatefaqs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/duplicatefaqs/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/duplicatefaqs/{id}`


<!-- END_0cf8d1dd0fcf2679d1de5e7e206c38da -->

<!-- START_93aa71bf26b2f4d319268e9c86ecfda4 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/zoomhost" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/zoomhost"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{id}/zoomhost`


<!-- END_93aa71bf26b2f4d319268e9c86ecfda4 -->

<!-- START_30c4fa0e804a8da038a8a2238375a0ea -->
## api/events/zoomhost
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/zoomhost" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/zoomhost"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/zoomhost`


<!-- END_30c4fa0e804a8da038a8a2238375a0ea -->

<!-- START_b49acd106f42b7cc8661f913a2fa318b -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/zoomhost" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/zoomhost"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/zoomhost`


<!-- END_b49acd106f42b7cc8661f913a2fa318b -->

<!-- START_f6e0be661d33f868c8d4a36f00b2aa62 -->
## Duncan juego. Número de segundos desde que jugue.

Número de segundos desde que jugue menos una hora que es límite de tiempo para volver a jugar, si el número es positivo no puedo jugar, si es negativo significa que ya paso más de una hora.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/duncan/minutosparajugar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/duncan/minutosparajugar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/duncan/minutosparajugar`


<!-- END_f6e0be661d33f868c8d4a36f00b2aa62 -->

<!-- START_e368abcfeb54ef4e5e5981f3e2d6f5aa -->
## Duncan juego. Guardamos el puntaje con el timestamp para después poder limitar la cantiadad de veces jugadas por tiempo

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/duncan/guardarpuntaje" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/duncan/guardarpuntaje"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/duncan/guardarpuntaje`


<!-- END_e368abcfeb54ef4e5e5981f3e2d6f5aa -->

<!-- START_7c8179f222715a3db70f08a120bf7211 -->
## Mensaje que se enviará mediante SMS al usuario invitado

> Example request:

```bash
curl -X POST \
    "http://localhost/api/duncan/invitaramigos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/duncan/invitaramigos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/duncan/invitaramigos`


<!-- END_7c8179f222715a3db70f08a120bf7211 -->

<!-- START_743b4a67e5ae97894be70c681e219cef -->
## api/duncan/setphoneaspassword
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/duncan/setphoneaspassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/duncan/setphoneaspassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/duncan/setphoneaspassword`


<!-- END_743b4a67e5ae97894be70c681e219cef -->

<!-- START_5d1892b870c3f7272db3ceb2ceb45e4d -->
## api/test/serialization
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/test/serialization" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/test/serialization"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/test/serialization`


<!-- END_5d1892b870c3f7272db3ceb2ceb45e4d -->

<!-- START_6b890525f6aa3202ee9330e6f62b65e9 -->
## api/test/queue
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/test/queue" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/test/queue"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/test/queue`


<!-- END_6b890525f6aa3202ee9330e6f62b65e9 -->

<!-- START_689c210ebe174946aebc5f5e948631fe -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/test/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/test/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/test/auth`


<!-- END_689c210ebe174946aebc5f5e948631fe -->

<!-- START_a38aedad9cec29d72ac819b13bd5b54f -->
## api/test/Gateway
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/test/Gateway" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/test/Gateway"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/test/Gateway`


<!-- END_a38aedad9cec29d72ac819b13bd5b54f -->

<!-- START_9888a415966c56da58263425c11136a3 -->
## api/test/request/{refresh_token}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/test/request/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/test/request/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/test/request/{refresh_token}`


<!-- END_9888a415966c56da58263425c11136a3 -->

<!-- START_c1ae7c36fbba5190e79ee296ee349e9b -->
## api/test/error
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/test/error" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/test/error"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/test/error`


<!-- END_c1ae7c36fbba5190e79ee296ee349e9b -->

<!-- START_5b99f62340cc86cfef31a4cc595cec04 -->
## api/test/permissions
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/test/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/test/permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/test/permissions`


<!-- END_5b99f62340cc86cfef31a4cc595cec04 -->

<!-- START_0a34afc0f0d287e7d7de8f97f1148a9c -->
## api/test/orderSave/{order_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/test/orderSave/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/test/orderSave/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/test/orderSave/{order_id}`


<!-- END_0a34afc0f0d287e7d7de8f97f1148a9c -->

<!-- START_49d50adbf9d790f047707bf00ace06f7 -->
## Delete Attendee

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/test/ticket/1/order/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/test/ticket/1/order/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/test/ticket/{ticket_id}/order/{order_id}`


<!-- END_49d50adbf9d790f047707bf00ace06f7 -->

<!-- START_c1b602605e9866557de0bafd3e253c34 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/generatorQr/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/generatorQr/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/generatorQr/{id}`


<!-- END_c1b602605e9866557de0bafd3e253c34 -->

<!-- START_a2d0406589ef05ab05b1e3a3cac469f6 -->
## api/integration/bigmaker/conferences/enter
> Example request:

```bash
curl -X POST \
    "http://localhost/api/integration/bigmaker/conferences/enter" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/integration/bigmaker/conferences/enter"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/integration/bigmaker/conferences/enter`


<!-- END_a2d0406589ef05ab05b1e3a3cac469f6 -->

<!-- START_33830f7d0c3c97eb68e98898c2d22ae2 -->
## api/eventusers/{event_id}/makeTicketIdaProperty/{ticket_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/eventusers/1/makeTicketIdaProperty/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventusers/1/makeTicketIdaProperty/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/eventusers/{event_id}/makeTicketIdaProperty/{ticket_id}`


<!-- END_33830f7d0c3c97eb68e98898c2d22ae2 -->

<!-- START_e3cf9cc35163eea18b0500dea24447d3 -->
## api/events/{event_id}/users/{user_id}/asignticketstouser
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/users/1/asignticketstouser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/users/1/asignticketstouser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/users/{user_id}/asignticketstouser`


<!-- END_e3cf9cc35163eea18b0500dea24447d3 -->

<!-- START_d84649799f33244554dc0cd2568792d4 -->
## api/users/verifyAccount/{uid}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/users/verifyAccount/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/verifyAccount/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/users/verifyAccount/{uid}`


<!-- END_d84649799f33244554dc0cd2568792d4 -->

<!-- START_e6b3cb8f3e1edf3605287cd526c7f97b -->
## api/events/sendMecPerfil
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/sendMecPerfil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/sendMecPerfil"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/sendMecPerfil`


<!-- END_e6b3cb8f3e1edf3605287cd526c7f97b -->

<!-- START_e91cb003b68fa252dcfc2b6391edc20a -->
## api/events/sendMecPerfilMec
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/sendMecPerfilMec" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/sendMecPerfilMec"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/sendMecPerfilMec`


<!-- END_e91cb003b68fa252dcfc2b6391edc20a -->

<!-- START_19f04c8aa5404ee0ff1ced42e5b6f30b -->
## api/events/{event_id}/sendMecPerfilMectoall
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/sendMecPerfilMectoall" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendMecPerfilMectoall"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/sendMecPerfilMectoall`


<!-- END_19f04c8aa5404ee0ff1ced42e5b6f30b -->

<!-- START_8b57b71ba02b021a6361ad07c15afefd -->
## api/events/sendnotificationemail
> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/sendnotificationemail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/sendnotificationemail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/sendnotificationemail`


<!-- END_8b57b71ba02b021a6361ad07c15afefd -->

<!-- START_304a10fe7e2fad2fbb4ed3e49ac28907 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/sendcontent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendcontent"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/sendcontent`


<!-- END_304a10fe7e2fad2fbb4ed3e49ac28907 -->

<!-- START_57b56057ac2c130fe00099a3fdab7a57 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/sendcontent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendcontent"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/sendcontent`


<!-- END_57b56057ac2c130fe00099a3fdab7a57 -->

<!-- START_9e47585578f520ac7ee0abee9100c368 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/sendcontent/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendcontent/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/sendcontent/{sendcontent}`


<!-- END_9e47585578f520ac7ee0abee9100c368 -->

<!-- START_5b22035049f5bef5e640779214c4cb65 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/sendcontent/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendcontent/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/sendcontent/{sendcontent}`

`PATCH api/events/{event_id}/sendcontent/{sendcontent}`


<!-- END_5b22035049f5bef5e640779214c4cb65 -->

<!-- START_572e9fa5a01e48e49c2ce9e213fbaf39 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/sendcontent/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sendcontent/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/sendcontent/{sendcontent}`


<!-- END_572e9fa5a01e48e49c2ce9e213fbaf39 -->

<!-- START_5311daf9c1595e9d9e1570e62c42f532 -->
## Display a listing of the resource.

muestra los usuarios de una organización

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/organizations/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/organizations/{organization_id}/users`


<!-- END_5311daf9c1595e9d9e1570e62c42f532 -->

<!-- START_34148d0e6f8b61d9042ff6beec41e7a0 -->
## Store a newly created resource in storage.

En el request llega el email del usuario
Buscamos la información del usuario por el correo
Guarda un usuario de una origanización
{
"email" : "test+11@mocionsoft.com",
"names": "test11",
"organization_id" : "5bbfce07c065863da36b821e"
}

> Example request:

```bash
curl -X POST \
    "http://localhost/api/organizations/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/organizations/{organization_id}/users`


<!-- END_34148d0e6f8b61d9042ff6beec41e7a0 -->

<!-- START_aa46dafbc8e05a6c3cc56490ed6322ee -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/organizations/1/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/1/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/organizations/{organization_id}/users/{user}`


<!-- END_aa46dafbc8e05a6c3cc56490ed6322ee -->

<!-- START_4a8a9fd02fc7e7e76aa536bec2c09335 -->
## Display only organization of user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/organizationUser/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/organizationUser/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/user/organizationUser/{organization_id}`


<!-- END_4a8a9fd02fc7e7e76aa536bec2c09335 -->

<!-- START_38b0238db31dd47cbd26822cacdc51e9 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/organizations/1/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/1/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/organizations/{organization_id}/user/{organization_user_id}`


<!-- END_38b0238db31dd47cbd26822cacdc51e9 -->

<!-- START_65d864b61072aea751734b0dfbc4e90a -->
## loginorcreatefromtoken

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/loginorcreatefromtoken" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/loginorcreatefromtoken"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/user/loginorcreatefromtoken`


<!-- END_65d864b61072aea751734b0dfbc4e90a -->

<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/users/{user}`


<!-- END_8653614346cb0e3d444d164579a0a0a2 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/users`


<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/users/{user}`

`PATCH api/users/{user}`


<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/users/{user}`


<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->

<!-- START_742a1cbd4a274c7269f0db99a704ff41 -->
## api/events
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events`


<!-- END_742a1cbd4a274c7269f0db99a704ff41 -->

<!-- START_de3413bf02c9bb71627fa96e1c1c409f -->
## Store a newly created event resource in storage.

there is a special event relation called organizer Its polymorphic relationship.
related to user and organization
organizer: It could be "me"(current user) or an organization Id

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events`


<!-- END_de3413bf02c9bb71627fa96e1c1c409f -->

<!-- START_379a3beb17bbb91528d80d8507f69655 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event}`


<!-- END_379a3beb17bbb91528d80d8507f69655 -->

<!-- START_d16967fd1d3d935666f7e8112a1a4451 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event}`

`PATCH api/events/{event}`


<!-- END_d16967fd1d3d935666f7e8112a1a4451 -->

<!-- START_379a30feb2949828b5f95efbfd7649c3 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event}`


<!-- END_379a30feb2949828b5f95efbfd7649c3 -->

<!-- START_aec83efbad5ec636ec1b29352c041932 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/me/events`


<!-- END_aec83efbad5ec636ec1b29352c041932 -->

<!-- START_2478aef777186232e8bca32fdf09efe3 -->
## Store a newly created event resource in storage.

there is a special event relation called organizer Its polymorphic relationship.
related to user and organization
organizer: It could be "me"(current user) or an organization Id

> Example request:

```bash
curl -X POST \
    "http://localhost/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/user/events`


<!-- END_2478aef777186232e8bca32fdf09efe3 -->

<!-- START_26fd0ed6db820ca28bb674ba1d761a2e -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/user/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/user/events/{event}`

`PATCH api/user/events/{event}`


<!-- END_26fd0ed6db820ca28bb674ba1d761a2e -->

<!-- START_ed1c02a70ed814c85d464077d0854e00 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/user/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/user/events/{event}`


<!-- END_ed1c02a70ed814c85d464077d0854e00 -->

<!-- START_f59d4cbbf9176342893379adb70dc1a5 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/user/events`


<!-- END_f59d4cbbf9176342893379adb70dc1a5 -->

<!-- START_7488288e859ba4fe861385339c81371a -->
## api/eventsbeforetoday
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/eventsbeforetoday" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventsbeforetoday"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/eventsbeforetoday`


<!-- END_7488288e859ba4fe861385339c81371a -->

<!-- START_08180c1785ee9a816b6fa5cdf32ece34 -->
## api/users/{id}/events
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/users/{id}/events`


<!-- END_08180c1785ee9a816b6fa5cdf32ece34 -->

<!-- START_84149f81b1537e6bcfc498d67a92d685 -->
## api/organizations/{id}/events
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/organizations/1/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/1/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/organizations/{id}/events`


<!-- END_84149f81b1537e6bcfc498d67a92d685 -->

<!-- START_109013899e0bc43247b0f00b67f889cf -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/categories`


<!-- END_109013899e0bc43247b0f00b67f889cf -->

<!-- START_34925c1e31e7ecc53f8f52c8b1e91d44 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/categories/{category}`


<!-- END_34925c1e31e7ecc53f8f52c8b1e91d44 -->

<!-- START_2335abbed7f782ea7d7dd6df9c738d74 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/categories`


<!-- END_2335abbed7f782ea7d7dd6df9c738d74 -->

<!-- START_549109b98c9f25ebff47fb4dc23423b6 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/categories/{category}`

`PATCH api/categories/{category}`


<!-- END_549109b98c9f25ebff47fb4dc23423b6 -->

<!-- START_7513823f87b59040507bd5ab26f9ceb5 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/categories/{category}`


<!-- END_7513823f87b59040507bd5ab26f9ceb5 -->

<!-- START_c326d3af496947220548e32f2e10ba93 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/rolesattendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/rolesattendees`


<!-- END_c326d3af496947220548e32f2e10ba93 -->

<!-- START_1640bc5878f3f3b6698f1fafb9b2b09d -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/rolesattendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/rolesattendees`


<!-- END_1640bc5878f3f3b6698f1fafb9b2b09d -->

<!-- START_761128fefeeda477ce81ce2f0051aad6 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/rolesattendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/rolesattendees/{rolesattendee}`


<!-- END_761128fefeeda477ce81ce2f0051aad6 -->

<!-- START_0d430b692f1997c2147d78272af1f468 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/rolesattendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/rolesattendees/{rolesattendee}`

`PATCH api/events/{event_id}/rolesattendees/{rolesattendee}`


<!-- END_0d430b692f1997c2147d78272af1f468 -->

<!-- START_730da4f67177565f46a1d6dfab2006d5 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/rolesattendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/rolesattendees/{rolesattendee}`


<!-- END_730da4f67177565f46a1d6dfab2006d5 -->

<!-- START_e2f33a100c8801ebd7aec3998e69ed8b -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/mailing" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/mailing"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/mailing`


<!-- END_e2f33a100c8801ebd7aec3998e69ed8b -->

<!-- START_84cdc485ad5581ac3b4656e684a63dfe -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/mailing" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/mailing"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/mailing`


<!-- END_84cdc485ad5581ac3b4656e684a63dfe -->

<!-- START_22fc2bd50f076eb56d968f94de16abad -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/mailing/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/mailing/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/mailing/{mailing}`


<!-- END_22fc2bd50f076eb56d968f94de16abad -->

<!-- START_77cae05892bcb0f77f2aa3c1342545d4 -->
## api/events/{event_id}/mailing/{mailing}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/mailing/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/mailing/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/mailing/{mailing}`

`PATCH api/events/{event_id}/mailing/{mailing}`


<!-- END_77cae05892bcb0f77f2aa3c1342545d4 -->

<!-- START_e3cb4d552df96d7acd1195a69b889ca4 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/mailing/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/mailing/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/mailing/{mailing}`


<!-- END_e3cb4d552df96d7acd1195a69b889ca4 -->

<!-- START_491853e99011901472276c04a2028910 -->
## api/generatecertificate
> Example request:

```bash
curl -X POST \
    "http://localhost/api/generatecertificate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/generatecertificate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/generatecertificate`


<!-- END_491853e99011901472276c04a2028910 -->

<!-- START_68adc3f6281f21cf39ff45bbccede6e2 -->
## api/events/{event_id}/certificates
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/certificates" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/certificates"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/certificates`


<!-- END_68adc3f6281f21cf39ff45bbccede6e2 -->

<!-- START_f079297f56fef66382c899397b2114a6 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/certificates" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/certificates"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/certificates`


<!-- END_f079297f56fef66382c899397b2114a6 -->

<!-- START_38c251cd2137c789af7ddd3c87749979 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/certificates/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/certificates/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/certificates/{certificate}`


<!-- END_38c251cd2137c789af7ddd3c87749979 -->

<!-- START_6266c97cac89368b9901a5e2e1f313e2 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/certificates/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/certificates/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/certificates/{certificate}`

`PATCH api/events/{event_id}/certificates/{certificate}`


<!-- END_6266c97cac89368b9901a5e2e1f313e2 -->

<!-- START_9d1f5720c227f04584ffa14fcdd26837 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/certificates/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/certificates/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/certificates/{certificate}`


<!-- END_9d1f5720c227f04584ffa14fcdd26837 -->

<!-- START_4c9efcf47162dba5a71705010c1d5cc7 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/certificates" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/certificates"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/certificates`


<!-- END_4c9efcf47162dba5a71705010c1d5cc7 -->

<!-- START_80fcb3c92345683d3dc174755e5183ab -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/certificates/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/certificates/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/certificates/{certificate}`

`PATCH api/certificates/{certificate}`


<!-- END_80fcb3c92345683d3dc174755e5183ab -->

<!-- START_3984f7a219b9fb6506187360e1d541c8 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/certificates/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/certificates/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/certificates/{certificate}`


<!-- END_3984f7a219b9fb6506187360e1d541c8 -->

<!-- START_4a1857b8b0fa2e53e019d8fba0f88994 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/certificates/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/certificates/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/certificates/{id}`


<!-- END_4a1857b8b0fa2e53e019d8fba0f88994 -->

<!-- START_5ae624c6977784b7a830ad9eab832b35 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rolesattendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/rolesattendees`


<!-- END_5ae624c6977784b7a830ad9eab832b35 -->

<!-- START_cf1028f6126759f733fee604202cd964 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rolesattendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/rolesattendees/{rolesattendee}`


<!-- END_cf1028f6126759f733fee604202cd964 -->

<!-- START_b2a28d12952f6be38c94e5f73dfd299d -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rolesattendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/rolesattendees`


<!-- END_b2a28d12952f6be38c94e5f73dfd299d -->

<!-- START_386fae58600cc4aaab7e40611552e7f8 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rolesattendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/rolesattendees/{rolesattendee}`

`PATCH api/rolesattendees/{rolesattendee}`


<!-- END_386fae58600cc4aaab7e40611552e7f8 -->

<!-- START_20bcc935d9c85f19ae2a05947d0add4b -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rolesattendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/rolesattendees/{rolesattendee}`


<!-- END_20bcc935d9c85f19ae2a05947d0add4b -->

<!-- START_67f0cc9990d72d5faeb7e08ced97043b -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rolesattendees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/rolesattendees/{id}`


<!-- END_67f0cc9990d72d5faeb7e08ced97043b -->

<!-- START_20357dac1999c588c85ffe24bc8cdd8d -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/certificate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/certificate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/certificate`


<!-- END_20357dac1999c588c85ffe24bc8cdd8d -->

<!-- START_63fc0e87430a7e884b4feef38a9ab61a -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/certificate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/certificate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/certificate`


<!-- END_63fc0e87430a7e884b4feef38a9ab61a -->

<!-- START_d4de594f6e18a81ef1d37b4e4c7a8fe3 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/certificate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/certificate/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/certificate/{certificate}`


<!-- END_d4de594f6e18a81ef1d37b4e4c7a8fe3 -->

<!-- START_359fc0e6c033060787ded1d7676a4d05 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/certificate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/certificate/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/certificate/{certificate}`

`PATCH api/certificate/{certificate}`


<!-- END_359fc0e6c033060787ded1d7676a4d05 -->

<!-- START_ff42e90196178b087d14163d009b736c -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/certificate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/certificate/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/certificate/{certificate}`


<!-- END_ff42e90196178b087d14163d009b736c -->

<!-- START_d075018d0f5c4b4c28eebc2ea6c990a2 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/eventTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventTypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/eventTypes`


<!-- END_d075018d0f5c4b4c28eebc2ea6c990a2 -->

<!-- START_09825cb853e4d8fa1de590dd2be05597 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/eventTypes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventTypes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/eventTypes/{eventType}`


<!-- END_09825cb853e4d8fa1de590dd2be05597 -->

<!-- START_82b919fce1599acdcfd3004c203870e2 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/eventTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventTypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/eventTypes`


<!-- END_82b919fce1599acdcfd3004c203870e2 -->

<!-- START_a325fad9fb1c30018665e33c1e492456 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/eventTypes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventTypes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/eventTypes/{eventType}`

`PATCH api/eventTypes/{eventType}`


<!-- END_a325fad9fb1c30018665e33c1e492456 -->

<!-- START_1467fede542f45de7219375dc20253dc -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/eventTypes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventTypes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/eventTypes/{eventType}`


<!-- END_1467fede542f45de7219375dc20253dc -->

<!-- START_d3d04ced88d4cf72f2d4f723acb41b9a -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/eventContents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventContents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/eventContents`


<!-- END_d3d04ced88d4cf72f2d4f723acb41b9a -->

<!-- START_eaf3d3625ea7f078f4c903e10a25b092 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/eventContents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventContents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/eventContents`


<!-- END_eaf3d3625ea7f078f4c903e10a25b092 -->

<!-- START_dfabc5b6b75af4aa53612a6ff74a0531 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/eventContents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventContents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/eventContents/{eventContent}`


<!-- END_dfabc5b6b75af4aa53612a6ff74a0531 -->

<!-- START_97c753492279460f994ec6f52445dcdf -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/eventContents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventContents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/eventContents/{eventContent}`

`PATCH api/eventContents/{eventContent}`


<!-- END_97c753492279460f994ec6f52445dcdf -->

<!-- START_34572c0eba24a1b7d95c3fa1110f2e72 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/eventContents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventContents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/eventContents/{eventContent}`


<!-- END_34572c0eba24a1b7d95c3fa1110f2e72 -->

<!-- START_c631fe8f864960f494954f13c1a772a1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/escarapelas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/escarapelas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/escarapelas`


<!-- END_c631fe8f864960f494954f13c1a772a1 -->

<!-- START_19779841d12d4bb9183fd756a45b7c66 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/escarapelas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/escarapelas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/escarapelas/{escarapela}`


<!-- END_19779841d12d4bb9183fd756a45b7c66 -->

<!-- START_1a18bce34367375f781a7831fe7666d8 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/escarapelas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/escarapelas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/escarapelas`


<!-- END_1a18bce34367375f781a7831fe7666d8 -->

<!-- START_b50c99b721a85ef1479c68464c7ece88 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/escarapelas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/escarapelas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/escarapelas/{escarapela}`

`PATCH api/escarapelas/{escarapela}`


<!-- END_b50c99b721a85ef1479c68464c7ece88 -->

<!-- START_bc0e5dcee6115c7767bc9d0511afe259 -->
## Remove the specified escarapela from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/escarapelas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/escarapelas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/escarapelas/{escarapela}`


<!-- END_bc0e5dcee6115c7767bc9d0511afe259 -->

<!-- START_36706fcc205375781e86a939712d26c6 -->
## Display a listing of the contributors of an event resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/contributors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/contributors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/contributors`


<!-- END_36706fcc205375781e86a939712d26c6 -->

<!-- START_b1adb5d4af9e58e0da6d1e2cda447351 -->
## Store

| Body Params   |
| ------------- |
| @body $_POST[role_id] required field       |
| @body $_POST[event_id]  required field     |
| @body $_POST[model_id] required field      |

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/contributors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/contributors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/contributors`


<!-- END_b1adb5d4af9e58e0da6d1e2cda447351 -->

<!-- START_96415cac4e8d40f2a70c48a8da7591e0 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/contributors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/contributors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/contributors/{id}`


<!-- END_96415cac4e8d40f2a70c48a8da7591e0 -->

<!-- START_720aaa57783e67d8b485e29c4ec14005 -->
## Update the specified resource in storage.

| Body Params   |
| ------------- |
| @body $_POST[role_id] required field       |
| @body $_POST[event_id]  required field     |
| @body $_POST[model_id] required field      |

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/contributors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/contributors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/contributors/{id}`


<!-- END_720aaa57783e67d8b485e29c4ec14005 -->

<!-- START_ef829dee4dc076657aac0acb8576135f -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/contributors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/contributors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/contributors/{id}`


<!-- END_ef829dee4dc076657aac0acb8576135f -->

<!-- START_04d54e28c19869568d3c4b99cbc82806 -->
## Metadata Controller

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/contributors/metadata/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/contributors/metadata/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/contributors/metadata/roles`


<!-- END_04d54e28c19869568d3c4b99cbc82806 -->

<!-- START_894ddb1e7b4cedf9c117b46c1f870d07 -->
## Create model_has_role
role_id
model_id (user_id)
event_id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/contributors/events/1/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/contributors/events/1/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/contributors/events/{event_id}/me`


<!-- END_894ddb1e7b4cedf9c117b46c1f870d07 -->

<!-- START_739442a2495f200cd4de63da705ac98e -->
## Create model_has_role
role_id
model_id (user_id)
event_id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/contributors/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/contributors/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/me/contributors/events`


<!-- END_739442a2495f200cd4de63da705ac98e -->

<!-- START_5935dd03adb1c114810f33ec2303a839 -->
## Display a listing of the contributors of an event resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/contributors/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/contributors/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/contributors/events/{event_id}`


<!-- END_5935dd03adb1c114810f33ec2303a839 -->

<!-- START_69e7f7090d03b6f67858500acb10a09d -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/tickets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/tickets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/tickets`


<!-- END_69e7f7090d03b6f67858500acb10a09d -->

<!-- START_f940530f59ac8daf13bd5e7d677081c2 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/tickets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/tickets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/tickets`


<!-- END_f940530f59ac8daf13bd5e7d677081c2 -->

<!-- START_c26bcfa05e94d22e0498969bdc46856a -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/tickets/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/tickets/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/tickets/{ticket}`


<!-- END_c26bcfa05e94d22e0498969bdc46856a -->

<!-- START_4195478c7083204dd114f38ffe81165f -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/tickets/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/tickets/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/tickets/{ticket}`

`PATCH api/events/{event_id}/tickets/{ticket}`


<!-- END_4195478c7083204dd114f38ffe81165f -->

<!-- START_ee3ea7effff77325c08c661c5954c3f0 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/tickets/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/tickets/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/tickets/{ticket}`


<!-- END_ee3ea7effff77325c08c661c5954c3f0 -->

<!-- START_3d0ee74690d52954de463d7369171be1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/ticket/event/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/ticket/event/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/ticket/event/{event_id}`


<!-- END_3d0ee74690d52954de463d7369171be1 -->

<!-- START_a0e41b9933e7eb265880c82df7a590fa -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/speakers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/speakers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/speakers`


<!-- END_a0e41b9933e7eb265880c82df7a590fa -->

<!-- START_12f5f71b4cb44e4c01d8288ecdfbc35d -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/speakers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/speakers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/speakers`


<!-- END_12f5f71b4cb44e4c01d8288ecdfbc35d -->

<!-- START_ccc0679dd39a8101641498f4debd9225 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/speakers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/speakers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/speakers/{speaker}`


<!-- END_ccc0679dd39a8101641498f4debd9225 -->

<!-- START_41d8aaa51e38c3bd83d96f416e792872 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/speakers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/speakers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/speakers/{speaker}`

`PATCH api/events/{event_id}/speakers/{speaker}`


<!-- END_41d8aaa51e38c3bd83d96f416e792872 -->

<!-- START_1a276f883fe179385e528569dc2addc4 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/speakers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/speakers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/speakers/{speaker}`


<!-- END_1a276f883fe179385e528569dc2addc4 -->

<!-- START_548e5b49768b071d20bd66812eb154ef -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/sessions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sessions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/sessions`


<!-- END_548e5b49768b071d20bd66812eb154ef -->

<!-- START_9b31af4ecb22e238c7122749b6c99f78 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/sessions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sessions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/sessions`


<!-- END_9b31af4ecb22e238c7122749b6c99f78 -->

<!-- START_3e606eca8ffe11a2783d3a50033c0e81 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/sessions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sessions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/sessions/{session}`


<!-- END_3e606eca8ffe11a2783d3a50033c0e81 -->

<!-- START_17941c70a481d82d273fb4ad97773d6f -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/sessions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sessions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/sessions/{session}`

`PATCH api/events/{event_id}/sessions/{session}`


<!-- END_17941c70a481d82d273fb4ad97773d6f -->

<!-- START_b55e4adc3b42ad38194a3037079c38d5 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/sessions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/sessions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/sessions/{session}`


<!-- END_b55e4adc3b42ad38194a3037079c38d5 -->

<!-- START_06ad2a830ec14cf7c4d9c858bfc2e648 -->
## Display all the Orders.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/orders`


<!-- END_06ad2a830ec14cf7c4d9c858bfc2e648 -->

<!-- START_72edc05ed4ae514da4bad532f214a31f -->
## Store a newly created Order in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/1/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events/{event_id}/orders`


<!-- END_72edc05ed4ae514da4bad532f214a31f -->

<!-- START_f2428def093e1ed65a58650d9628dff7 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/orders/{order}`


<!-- END_f2428def093e1ed65a58650d9628dff7 -->

<!-- START_8aae8924e0d43008721448202f5acb30 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/1/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event_id}/orders/{order}`

`PATCH api/events/{event_id}/orders/{order}`


<!-- END_8aae8924e0d43008721448202f5acb30 -->

<!-- START_9afb68ce24fd83186ebbfe08981dd597 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/events/1/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event_id}/orders/{order}`


<!-- END_9afb68ce24fd83186ebbfe08981dd597 -->

<!-- START_087d6a267e06d33af265eccc80e3a9fb -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/event/1/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/event/1/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/event/{event_id}/orders/{order_id}`


<!-- END_087d6a267e06d33af265eccc80e3a9fb -->

<!-- START_bcf0272dea5d3796febe1ed055342653 -->
## api/event/{event_id}/orders/{order_id}/addAttendees
> Example request:

```bash
curl -X POST \
    "http://localhost/api/event/1/orders/1/addAttendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/event/1/orders/1/addAttendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/event/{event_id}/orders/{order_id}/addAttendees`


<!-- END_bcf0272dea5d3796febe1ed055342653 -->

<!-- START_bba9e1079cc87b19eb837d900247b785 -->
## Delete Attendee

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/order/1/attendee/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/1/attendee/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/order/{order_id}/attendee/{attendee_id}`


<!-- END_bba9e1079cc87b19eb837d900247b785 -->

<!-- START_9b8c5a2dde67602a8bbc27b096c1a18c -->
## __index:__ Display all the Orders of an user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/users/{user_id}/orders`


<!-- END_9b8c5a2dde67602a8bbc27b096c1a18c -->

<!-- START_ce55e3d34b596a57ed26ef1545458299 -->
## __index:__ Display all the Orders of an user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/me/orders`


<!-- END_ce55e3d34b596a57ed26ef1545458299 -->

<!-- START_8db32d07dc01faab0334a890e45101fe -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/messageUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/messageUser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/messageUser`


<!-- END_8db32d07dc01faab0334a890e45101fe -->

<!-- START_35426311087d0c48bf131b4995527d5a -->
## api/messageUser/create
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/messageUser/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/messageUser/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/messageUser/create`


<!-- END_35426311087d0c48bf131b4995527d5a -->

<!-- START_2b6b30017e3501aa85c74c317bfdd087 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/messageUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/messageUser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/messageUser`


<!-- END_2b6b30017e3501aa85c74c317bfdd087 -->

<!-- START_51c3cbb296675cf9c27170e9d3eb54c5 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/messageUser/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/messageUser/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/messageUser/{messageUser}`


<!-- END_51c3cbb296675cf9c27170e9d3eb54c5 -->

<!-- START_267a83c88beeb791608b3cd1e9bd3791 -->
## api/messageUser/{messageUser}/edit
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/messageUser/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/messageUser/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/messageUser/{messageUser}/edit`


<!-- END_267a83c88beeb791608b3cd1e9bd3791 -->

<!-- START_4fcbcfe32d5b1f636fecf73ec2db2338 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/messageUser/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/messageUser/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/messageUser/{messageUser}`

`PATCH api/messageUser/{messageUser}`


<!-- END_4fcbcfe32d5b1f636fecf73ec2db2338 -->

<!-- START_b7d5cad60267e810bd2eaa7f678561f9 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/messageUser/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/messageUser/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/messageUser/{messageUser}`


<!-- END_b7d5cad60267e810bd2eaa7f678561f9 -->

<!-- START_ec3df098747db16aed360b4583570d46 -->
## api/testsendemail/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/testsendemail/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/testsendemail/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/testsendemail/{id}`


<!-- END_ec3df098747db16aed360b4583570d46 -->

<!-- START_1255da3a2dc90c857def94fd283c8a16 -->
## api/testqr
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/testqr" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/testqr"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/testqr`


<!-- END_1255da3a2dc90c857def94fd283c8a16 -->

<!-- START_976e8468d2af4745c9dc7bd7fc7ac709 -->
## api/pdftest
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/pdftest" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/pdftest"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/pdftest`


<!-- END_976e8468d2af4745c9dc7bd7fc7ac709 -->

<!-- START_5c81529453d31c0784de076ff21f89c2 -->
## Undocumented function

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/confirmEmail/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/confirmEmail/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/confirmEmail/{id}`


<!-- END_5c81529453d31c0784de076ff21f89c2 -->

<!-- START_befdd07d20869750621d0b923cc0b50c -->
## Resend an entire order

> Example request:

```bash
curl -X POST \
    "http://localhost/api/order/1/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/1/resend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/order/{order_id}/resend`


<!-- END_befdd07d20869750621d0b923cc0b50c -->

<!-- START_197e9a023bed3e3482c242432ca4055f -->
## Update status in email sent by Sendinblue.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/UpdateStatusMessage" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/UpdateStatusMessage"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/UpdateStatusMessage`


<!-- END_197e9a023bed3e3482c242432ca4055f -->

<!-- START_59ad56e92ee87756405391ba6323c045 -->
## Create a new Webhooks in Sendinblue API.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/activeWebhooks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/activeWebhooks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/activeWebhooks`


<!-- END_59ad56e92ee87756405391ba6323c045 -->

<!-- START_2e0ba84c41eb83f8910fe4ee3fbc4ed3 -->
## api/viewWebhooks
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/viewWebhooks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/viewWebhooks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/viewWebhooks`


<!-- END_2e0ba84c41eb83f8910fe4ee3fbc4ed3 -->

<!-- START_5223e399e5354d49c615263f0ce00691 -->
## api/UpdateStatusMessageT
> Example request:

```bash
curl -X POST \
    "http://localhost/api/UpdateStatusMessageT" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/UpdateStatusMessageT"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/UpdateStatusMessageT`


<!-- END_5223e399e5354d49c615263f0ce00691 -->

<!-- START_25859c1b808548ec8a8b1965bada83fe -->
## Update manually status in email sent by Sendinblue.

This methods allows function for update manually status
in email.

Once the method has been executed, search the database
for those that are in a "queued" state limited by 50.

Then it executes the report of the emails sent in order
to update the status of these.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/UpdateStatusMessageManually" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/UpdateStatusMessageManually"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/UpdateStatusMessageManually`


<!-- END_25859c1b808548ec8a8b1965bada83fe -->

<!-- START_737aa8371e5a0ca4c14f51dc6baab31a -->
## api/permissions/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/permissions/{id}`


<!-- END_737aa8371e5a0ca4c14f51dc6baab31a -->

<!-- START_04c928fb7ec045888fb969784cc3eb7e -->
## AddUserProperty: Add dynamic user property to the event

each dynamic property must be composed of following parameters:

* name     text
* required boolean - this field is not yet used  for anything
* type     text    - this field is not yet used for anything

Once created user dynamic event properties could be get directly from $event->userProperties.
Dynamic properties are returned inside each UserEvent like regular properties

> Example request:

```bash
curl -X POST \
    "http://localhost/api/user/events/1/addUserProperty" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/events/1/addUserProperty"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/user/events/{id}/addUserProperty`


<!-- END_04c928fb7ec045888fb969784cc3eb7e -->

<!-- START_7fc3643705ffb59eed1a17830c3ca58a -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rols" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rols"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/rols`


<!-- END_7fc3643705ffb59eed1a17830c3ca58a -->

<!-- START_b8f0c94729c67ebf9f447d6c0d713dc8 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/states" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/states"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/states`


<!-- END_b8f0c94729c67ebf9f447d6c0d713dc8 -->

<!-- START_4fd14a1648567263b13dc56b81d79a88 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rsvp/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rsvp/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/rsvp/{id}`


<!-- END_4fd14a1648567263b13dc56b81d79a88 -->

<!-- START_f0cc04c2ae10aa8188fc7ac2315efdd1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/messages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/messages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/events/{event_id}/messages`


<!-- END_f0cc04c2ae10aa8188fc7ac2315efdd1 -->

<!-- START_2a29088746aee0c7fa1f3a03ed44765b -->
## Uploads files send though HTTP multipart/form-data

Uploads provided file though HTTPFile  multipart/form-data; and returns full file URL.
default field_name(key) for the file is file but it could be changed using
additional parameter field_name to reference file using another field_name
HTTPFile could be just one file on multiple files,
for one file this function returns  a string with the url
for multiple files It returns an array of URLS.

Request example
POST /eviusapilaravel/public/api/files/upload/image HTTP/1.1
Host: localhost
Cache-Control: no-cache
Postman-Token: 2f16a68e-f8fd-4b1b-a0d6-635c5ba7e981
Content-Type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW

> Example request:

```bash
curl -X POST \
    "http://localhost/api/files/upload/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/files/upload/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/files/upload/{field_name?}`


<!-- END_2a29088746aee0c7fa1f3a03ed44765b -->

<!-- START_18c1b3fc6f79ce014b60fa16df3d8417 -->
## Funcion destinada al guardado de imagenes en base 64 al google storage, XOXO

> Example request:

```bash
curl -X POST \
    "http://localhost/api/files/uploadbase/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/files/uploadbase/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/files/uploadbase/{name}`


<!-- END_18c1b3fc6f79ce014b60fa16df3d8417 -->

<!-- START_ac496d9a6f5b4ced464fea1a0edbcfec -->
## Process purshase status from placetopay via POST
(Rejected, accepted purshase)

> Example request:

```bash
curl -X POST \
    "http://localhost/api/order/paymentCompleted" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/paymentCompleted"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/order/paymentCompleted`


<!-- END_ac496d9a6f5b4ced464fea1a0edbcfec -->

<!-- START_6b10a9a35183944aa812a0294322e20f -->
## Complete an order

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/order/complete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/order/complete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET api/order/complete/{order_id}`


<!-- END_6b10a9a35183944aa812a0294322e20f -->

<!-- START_76410e3fd56ad078ab9b920e8fd01917 -->
## Validate a ticket request. If successful reserve the tickets and redirect to checkout

> Example request:

```bash
curl -X POST \
    "http://localhost/api/postValidateTickets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/postValidateTickets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/postValidateTickets`


<!-- END_76410e3fd56ad078ab9b920e8fd01917 -->

<!-- START_c9737c45d8ee8f0207d4ce840eed9bf1 -->
## Show the select organiser page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/select_organiser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/select_organiser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET select_organiser`


<!-- END_c9737c45d8ee8f0207d4ce840eed9bf1 -->

<!-- START_788928a09cf780ed5b5fb8dcdbbb9dc7 -->
## viewOrdersUsers/{user_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/viewOrdersUsers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/viewOrdersUsers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET viewOrdersUsers/{user_id}`


<!-- END_788928a09cf780ed5b5fb8dcdbbb9dc7 -->

<!-- START_842b81bad97de1fd9fe35a150f389ae0 -->
## payment/return/stripe
> Example request:

```bash
curl -X GET \
    -G "http://localhost/payment/return/stripe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/payment/return/stripe"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET payment/return/stripe`

`POST payment/return/stripe`

`PUT payment/return/stripe`

`PATCH payment/return/stripe`

`DELETE payment/return/stripe`

`OPTIONS payment/return/stripe`


<!-- END_842b81bad97de1fd9fe35a150f389ae0 -->

<!-- START_26579305b499efc0a29f10f0cf202f8a -->
## Log a user out and redirect them

> Example request:

```bash
curl -X GET \
    -G "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET logout`

`POST logout`

`PUT logout`

`PATCH logout`

`DELETE logout`

`OPTIONS logout`


<!-- END_26579305b499efc0a29f10f0cf202f8a -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Shows login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handles the login request.

> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_6ea5fa55ccef15129c404506202f5dd2 -->
## signup
> Example request:

```bash
curl -X GET \
    -G "http://localhost/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET signup`


<!-- END_6ea5fa55ccef15129c404506202f5dd2 -->

<!-- START_41ec161bb0631a5e8679f86e04fd290e -->
## Creates an account.

> Example request:

```bash
curl -X POST \
    "http://localhost/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST signup`


<!-- END_41ec161bb0631a5e8679f86e04fd290e -->

<!-- START_c9568747ad3837e1ae6696da4e5dd5e2 -->
## Confirm a user email

> Example request:

```bash
curl -X GET \
    -G "http://localhost/signup/confirm_email/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/signup/confirm_email/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET signup/confirm_email/{confirmation_code}`


<!-- END_c9568747ad3837e1ae6696da4e5dd5e2 -->

<!-- START_afe57d6cd6aa758abc274aefa1d1cf88 -->
## Show the public organiser page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/o/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/o/1/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET o/{organiser_id}/{organier_slug?}`


<!-- END_afe57d6cd6aa758abc274aefa1d1cf88 -->

<!-- START_8433645dc0516453a3ad63f32c76a1dc -->
## e/{event_id}/calendar.ics
> Example request:

```bash
curl -X GET \
    -G "http://localhost/e/1/calendar.ics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/e/1/calendar.ics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET e/{event_id}/calendar.ics`


<!-- END_8433645dc0516453a3ad63f32c76a1dc -->

<!-- START_28b7cf2270bde7f0c9cc0bc9f034c5c8 -->
## Show the homepage for an event

> Example request:

```bash
curl -X GET \
    -G "http://localhost/e/1/showTicketsTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/e/1/showTicketsTypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET e/{event_id}/showTicketsTypes`


<!-- END_28b7cf2270bde7f0c9cc0bc9f034c5c8 -->

<!-- START_6fa8acba2d5767785dc303224d19f779 -->
## Sends a message to the organiser

> Example request:

```bash
curl -X POST \
    "http://localhost/e/1/contact_organiser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/e/1/contact_organiser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST e/{event_id}/contact_organiser`


<!-- END_6fa8acba2d5767785dc303224d19f779 -->

<!-- START_ecb0aba14a9b045b96791247cc531af8 -->
## Show preview of event homepage / used for backend previewing

> Example request:

```bash
curl -X GET \
    -G "http://localhost/e/1/preview" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/e/1/preview"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET e/{event_id}/preview`


<!-- END_ecb0aba14a9b045b96791247cc531af8 -->

<!-- START_bfca99faa0ca0a60102c6d419d63410d -->
## Validate a ticket request. If successful reserve the tickets and redirect to checkout

> Example request:

```bash
curl -X POST \
    "http://localhost/e/1/checkout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/e/1/checkout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST e/{event_id}/checkout`


<!-- END_bfca99faa0ca0a60102c6d419d63410d -->

<!-- START_c6d562d917362b13b99125cf2a03c231 -->
## Show the checkout page

This controller show the user information, when you put the user information

> Example request:

```bash
curl -X GET \
    -G "http://localhost/e/1/checkout/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/e/1/checkout/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET e/{event_id}/checkout/create`


<!-- END_c6d562d917362b13b99125cf2a03c231 -->

<!-- START_f18dfa216a3130325da4d55ffc8cf134 -->
## Attempt to complete a user&#039;s payment when they return from
an off-site gateway

> Example request:

```bash
curl -X GET \
    -G "http://localhost/e/1/checkout/success" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/e/1/checkout/success"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET e/{event_id}/checkout/success`


<!-- END_f18dfa216a3130325da4d55ffc8cf134 -->

<!-- START_3c0db96cc5b13db72a6c8b15e37ec8d5 -->
## postCreateOrder
Create the order, handle payment, update stats, fire off email jobs then redirect user

> Example request:

```bash
curl -X POST \
    "http://localhost/e/1/checkout/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/e/1/checkout/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST e/{event_id}/checkout/create`


<!-- END_3c0db96cc5b13db72a6c8b15e37ec8d5 -->

<!-- START_2a2037d20e4364fcd3cff49eefb5d2be -->
## postCreateOrder
Create the order, handle payment, update stats, fire off email jobs then redirect user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/e/1/checkout/paymentEvius" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/e/1/checkout/paymentEvius"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET e/{event_id}/checkout/paymentEvius`


<!-- END_2a2037d20e4364fcd3cff49eefb5d2be -->

<!-- START_d71b2cd6649222a557509211c04d0313 -->
## Show the order details page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET order/{order_reference}`


<!-- END_d71b2cd6649222a557509211c04d0313 -->

<!-- START_4d937c37913572611c6a49c45bda55d3 -->
## Show information about the order
(Rejected, accepted purshase or pending)

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order/1/payment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/1/payment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET order/{order_reservation_reference}/payment`


<!-- END_4d937c37913572611c6a49c45bda55d3 -->

<!-- START_2dbaa7928310402878b8938d4612dd27 -->
## showOrderPaymentStatusPaymentGateway

This controller get information of order by means of the order_reference, directly from payment gateway

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order/1/payment/status/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/1/payment/status/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET order/{order_reservation_reference}/payment/status/{payment_gateway}`


<!-- END_2dbaa7928310402878b8938d4612dd27 -->

<!-- START_a5b41dfbaa8c727c3948663936a831e7 -->
## Shows the tickets for an order - either HTML or PDF

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order/1/tickets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/1/tickets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET order/{order_reference}/tickets`


<!-- END_a5b41dfbaa8c727c3948663936a831e7 -->

<!-- START_31cddfce6bc4215fa912f98847f80e4d -->
## Show information about the order
(Rejected, accepted purshase or pending)

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order/1/payment/PayU" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/1/payment/PayU"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET order/{order_reservation_reference}/payment/PayU`


<!-- END_31cddfce6bc4215fa912f98847f80e4d -->

<!-- START_3bcedda78ae45ef5c0f4c97a4963b7a1 -->
## Show the edit user modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET user`


<!-- END_3bcedda78ae45ef5c0f4c97a4963b7a1 -->

<!-- START_3efbce72c5183a8fae61143a8bcdd44a -->
## Updates the current user

> Example request:

```bash
curl -X POST \
    "http://localhost/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user`


<!-- END_3efbce72c5183a8fae61143a8bcdd44a -->

<!-- START_0feaba28bec826019276e4905acf6cd6 -->
## Show the account modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/tickets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/tickets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET tickets`


<!-- END_0feaba28bec826019276e4905acf6cd6 -->

<!-- START_ed4c875913b40ecf70df8e8d19c4bb4e -->
## Edit an account

> Example request:

```bash
curl -X POST \
    "http://localhost/tickets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/tickets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST tickets`


<!-- END_ed4c875913b40ecf70df8e8d19c4bb4e -->

<!-- START_de157b00b50203b9a931e5da3b303eca -->
## Save account payment information

> Example request:

```bash
curl -X POST \
    "http://localhost/tickets/edit_payment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/tickets/edit_payment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST tickets/edit_payment`


<!-- END_de157b00b50203b9a931e5da3b303eca -->

<!-- START_1c9afa082f844637cc6944adec7f3626 -->
## Invite a user to the application

> Example request:

```bash
curl -X POST \
    "http://localhost/tickets/invite_user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/tickets/invite_user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST tickets/invite_user`


<!-- END_1c9afa082f844637cc6944adec7f3626 -->

<!-- START_bb4c6fb6a165b79c86247d97d9c8cac5 -->
## Edit an account

> Example request:

```bash
curl -X POST \
    "http://localhost/tickets/codes_promocional" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/tickets/codes_promocional"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST tickets/codes_promocional`


<!-- END_bb4c6fb6a165b79c86247d97d9c8cac5 -->

<!-- START_a161534e8891198497c7f7fe3b90a33b -->
## Edit an account

> Example request:

```bash
curl -X POST \
    "http://localhost/tickets/tickets_promocional" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/tickets/tickets_promocional"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST tickets/tickets_promocional`


<!-- END_a161534e8891198497c7f7fe3b90a33b -->

<!-- START_2d993925081e66f8e7c3b3fae2718b99 -->
## Edit seats configuration

> Example request:

```bash
curl -X POST \
    "http://localhost/tickets/edit_seats" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/tickets/edit_seats"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST tickets/edit_seats`


<!-- END_2d993925081e66f8e7c3b3fae2718b99 -->

<!-- START_c0e50f17ea6ed98c5310ed975bbf1209 -->
## Edit Advanced Configuration

> Example request:

```bash
curl -X POST \
    "http://localhost/tickets/advanced_configuration" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/tickets/advanced_configuration"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST tickets/advanced_configuration`


<!-- END_c0e50f17ea6ed98c5310ed975bbf1209 -->

<!-- START_eebd0e574ed3f510a7273628ea9ae1dc -->
## Show the organiser dashboard

> Example request:

```bash
curl -X GET \
    -G "http://localhost/organiser/1/dashboard" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/organiser/1/dashboard"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET organiser/{organiser_id}/dashboard`


<!-- END_eebd0e574ed3f510a7273628ea9ae1dc -->

<!-- START_3f1753b7a14e74ef0bc952ba0be6a52a -->
## Show the organiser events page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/organiser/1/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/organiser/1/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET organiser/{organiser_id}/events`


<!-- END_3f1753b7a14e74ef0bc952ba0be6a52a -->

<!-- START_73fbef9286c247780032397c3e28fa18 -->
## Show organiser setting page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/organiser/1/customize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/organiser/1/customize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET organiser/{organiser_id}/customize`


<!-- END_73fbef9286c247780032397c3e28fa18 -->

<!-- START_4b2b52eec9e677ac0b506c09f47fa9aa -->
## Edits organiser settings / design etc.

> Example request:

```bash
curl -X POST \
    "http://localhost/organiser/1/customize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/organiser/1/customize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST organiser/{organiser_id}/customize`


<!-- END_4b2b52eec9e677ac0b506c09f47fa9aa -->

<!-- START_321742b63839480d82a767f5713222da -->
## Show the create organiser page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/organiser/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/organiser/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET organiser/create`


<!-- END_321742b63839480d82a767f5713222da -->

<!-- START_b8dfa6706512934cd80f5d40d40f89b3 -->
## Create the organiser

> Example request:

```bash
curl -X POST \
    "http://localhost/organiser/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/organiser/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST organiser/create`


<!-- END_b8dfa6706512934cd80f5d40d40f89b3 -->

<!-- START_714b431891bf77d9be776c06b846bb6d -->
## Edits organiser profile page colors / design

> Example request:

```bash
curl -X POST \
    "http://localhost/organiser/1/page_design" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/organiser/1/page_design"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST organiser/{organiser_id}/page_design`


<!-- END_714b431891bf77d9be776c06b846bb6d -->

<!-- START_92b328319f49439288d157a4c5e241e1 -->
## Show the &#039;Create Event&#039; Modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/events/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET events/create`


<!-- END_92b328319f49439288d157a4c5e241e1 -->

<!-- START_421dd5ccdba33e6e944a6d5f27b46bb3 -->
## Create an event

> Example request:

```bash
curl -X POST \
    "http://localhost/events/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST events/create`


<!-- END_421dd5ccdba33e6e944a6d5f27b46bb3 -->

<!-- START_71d14c7dfe3087c0431f2d1a9a0734b8 -->
## Show the event dashboard

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/dashboard" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/dashboard"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/dashboard`


<!-- END_71d14c7dfe3087c0431f2d1a9a0734b8 -->

<!-- START_faf1f4978cb48c9f1cc95e1038e40d1f -->
## event/{event_id}/tickets
> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/tickets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/tickets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/tickets`


<!-- END_faf1f4978cb48c9f1cc95e1038e40d1f -->

<!-- START_56f839e06dbc59cb1d61bf7c98defd7b -->
## Show the edit ticket modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/tickets/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/tickets/edit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/tickets/edit/{ticket_id}`


<!-- END_56f839e06dbc59cb1d61bf7c98defd7b -->

<!-- START_d3a7c6d415d012277f853dc33970e89d -->
## Edit a ticket

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/tickets/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/tickets/edit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/tickets/edit/{ticket_id}`


<!-- END_d3a7c6d415d012277f853dc33970e89d -->

<!-- START_6d26946bd4e20f85f367f80434735202 -->
## Show the create ticket modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/tickets/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/tickets/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/tickets/create`


<!-- END_6d26946bd4e20f85f367f80434735202 -->

<!-- START_374478747358c372bab8f0b35e258a31 -->
## Creates a ticket

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/tickets/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/tickets/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/tickets/create`


<!-- END_374478747358c372bab8f0b35e258a31 -->

<!-- START_11bf6cd77ef13c87f4911a09c46728d5 -->
## Deleted a ticket

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/tickets/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/tickets/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/tickets/delete`


<!-- END_11bf6cd77ef13c87f4911a09c46728d5 -->

<!-- START_23238b6fbfba3bd71dd128d1b0300491 -->
## Pause ticket / take it off sale

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/tickets/pause" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/tickets/pause"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/tickets/pause`


<!-- END_23238b6fbfba3bd71dd128d1b0300491 -->

<!-- START_33b9e2b843bd0e8eceaf51e1f0755ccb -->
## Updates the sort order of tickets

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/tickets/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/tickets/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/tickets/order`


<!-- END_33b9e2b843bd0e8eceaf51e1f0755ccb -->

<!-- START_b74eb5103a319495d4f3765544e316ae -->
## Show the attendees list

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees`


<!-- END_b74eb5103a319495d4f3765544e316ae -->

<!-- START_951655383f615f5e8e5ff551d432394d -->
## Shows the &#039;Message Attendees&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/message" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/message"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/message`


<!-- END_951655383f615f5e8e5ff551d432394d -->

<!-- START_6a93790e8f8bc7b14fdded426165d450 -->
## Send a message to attendees

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/attendees/message" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/message"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/attendees/message`


<!-- END_6a93790e8f8bc7b14fdded426165d450 -->

<!-- START_8efbd3e96a135a7e784805346bdc2349 -->
## Show the &#039;Message Attendee&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/single_message" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/single_message"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/single_message`


<!-- END_8efbd3e96a135a7e784805346bdc2349 -->

<!-- START_bb1e9e822342882c85624debbb298819 -->
## Send a message to an attendee

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/attendees/single_message" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/single_message"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/attendees/single_message`


<!-- END_bb1e9e822342882c85624debbb298819 -->

<!-- START_2ad101bbb28c7244c36ef0ae2eb655da -->
## Show the &#039;Message Attendee&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/resend_ticket" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/resend_ticket"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/resend_ticket`


<!-- END_2ad101bbb28c7244c36ef0ae2eb655da -->

<!-- START_21d184bee901b13ae2852b44cf1a1d7f -->
## Send a message to an attendee

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/attendees/resend_ticket" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/resend_ticket"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/attendees/resend_ticket`


<!-- END_21d184bee901b13ae2852b44cf1a1d7f -->

<!-- START_91554aee76e7c4e2925bb3471f439b2b -->
## Show the &#039;Invite Attendee&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/invite" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/invite"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/invite`


<!-- END_91554aee76e7c4e2925bb3471f439b2b -->

<!-- START_5d9f6b905f1a6783129d1ebadeb1aff2 -->
## Invite an attendee

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/attendees/invite" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/invite"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/attendees/invite`


<!-- END_5d9f6b905f1a6783129d1ebadeb1aff2 -->

<!-- START_c552e69b9f04de1901d4e210e27d40f5 -->
## Show the &#039;Import Attendee&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/import" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/import"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/import`


<!-- END_c552e69b9f04de1901d4e210e27d40f5 -->

<!-- START_ec9ceed1a46f33e92c1b9753c6d40947 -->
## Import attendees

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/attendees/import" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/import"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/attendees/import`


<!-- END_ec9ceed1a46f33e92c1b9753c6d40947 -->

<!-- START_c024b9eb42f7d5f8c29a3aedf45710ed -->
## Show the printable attendee list

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/print" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/print"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/print`


<!-- END_c024b9eb42f7d5f8c29a3aedf45710ed -->

<!-- START_e683c915539c97989d61e00c0ade2225 -->
## event/{event_id}/attendees/{attendee_id}/export_ticket
> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/1/export_ticket" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/1/export_ticket"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/{attendee_id}/export_ticket`


<!-- END_e683c915539c97989d61e00c0ade2225 -->

<!-- START_35af420cc63fd2a1e8c1b0b200d71129 -->
## Show an attendee ticket

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/1/ticket" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/1/ticket"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/{attendee_id}/ticket`


<!-- END_35af420cc63fd2a1e8c1b0b200d71129 -->

<!-- START_74fe27c99fe92f77b3e5eea5b309df00 -->
## Downloads an export of attendees

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/export/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/export/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/export/{export_as?}`


<!-- END_74fe27c99fe92f77b3e5eea5b309df00 -->

<!-- START_02a72b1e3a4ff8423f910642d5e6a668 -->
## Show the &#039;Edit Attendee&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/{attendee_id}/edit`


<!-- END_02a72b1e3a4ff8423f910642d5e6a668 -->

<!-- START_95bae939cbda3fe88cafee708eb09f9f -->
## Updates an attendee

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/attendees/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/attendees/{attendee_id}/edit`


<!-- END_95bae939cbda3fe88cafee708eb09f9f -->

<!-- START_c09819e9758f414172db656f8d9e60fd -->
## Shows the &#039;Cancel Attendee&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/attendees/1/cancel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/1/cancel"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/attendees/{attendee_id}/cancel`


<!-- END_c09819e9758f414172db656f8d9e60fd -->

<!-- START_6118846fdae1b29dcd47632ebf09f08c -->
## Cancels an attendee

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/attendees/1/cancel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/attendees/1/cancel"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/attendees/{attendee_id}/cancel`


<!-- END_6118846fdae1b29dcd47632ebf09f08c -->

<!-- START_d0fc71a015c1602937faeec50cc0cb8f -->
## event/{event_id}/stages
> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/stages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/stages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/stages`


<!-- END_d0fc71a015c1602937faeec50cc0cb8f -->

<!-- START_c58f7004f42c1681be28e3d037aff7a6 -->
## Show the create stage modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/stage/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/stage/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/stage/create`


<!-- END_c58f7004f42c1681be28e3d037aff7a6 -->

<!-- START_4e169ee85db1984df9dfd498984e50a0 -->
## Creates a stage

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/stage/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/stage/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/stage/create`


<!-- END_4e169ee85db1984df9dfd498984e50a0 -->

<!-- START_480f71e6e8041aeda42dccab0d9ee550 -->
## Show the update stage modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/stage/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/stage/1/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/stage/{stage_id}/update`


<!-- END_480f71e6e8041aeda42dccab0d9ee550 -->

<!-- START_9fa0b6e67dbb18b45b57bbc88ae10d34 -->
## Update a stage

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/stage/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/stage/1/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/stage/{stage_id}/update`


<!-- END_9fa0b6e67dbb18b45b57bbc88ae10d34 -->

<!-- START_7d9eb3b9e9289b9d2277ebb4254cf353 -->
## Show event orders page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/orders`


<!-- END_7d9eb3b9e9289b9d2277ebb4254cf353 -->

<!-- START_0827cf1e81d95a4bcdd57b2a51db7c97 -->
## Shows  &#039;Manage Order&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/order/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/order/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/order/{order_id}`


<!-- END_0827cf1e81d95a4bcdd57b2a51db7c97 -->

<!-- START_cbc9b4ba3b76f2727a914062893aac10 -->
## Resend an entire order

> Example request:

```bash
curl -X POST \
    "http://localhost/event/order/1/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/order/1/resend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/order/{order_id}/resend`


<!-- END_cbc9b4ba3b76f2727a914062893aac10 -->

<!-- START_bd11539caaa76c6d3030c97fc548b07b -->
## Shows &#039;Edit Order&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/order/1/show/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/order/1/show/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/order/{order_id}/show/edit`


<!-- END_bd11539caaa76c6d3030c97fc548b07b -->

<!-- START_7e8d9dd9b2321b501eb52a671d286728 -->
## Shows &#039;transfer Ticket&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/order/1/transfer/tickets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/order/1/transfer/tickets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/order/{order_id}/transfer/tickets`


<!-- END_7e8d9dd9b2321b501eb52a671d286728 -->

<!-- START_7ed4cebdb9ab4fca5f74810f126b565b -->
## Cancels an order

> Example request:

```bash
curl -X POST \
    "http://localhost/event/order/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/order/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/order/{order_id}/edit`


<!-- END_7ed4cebdb9ab4fca5f74810f126b565b -->

<!-- START_5474d3123e968ce86aa0cfebee7e4aa9 -->
## Shows &#039;Cancel Order&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/order/1/cancel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/order/1/cancel"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/order/{order_id}/cancel`


<!-- END_5474d3123e968ce86aa0cfebee7e4aa9 -->

<!-- START_196c14bea626aa2aaa0305388e519a13 -->
## Cancels an order

> Example request:

```bash
curl -X POST \
    "http://localhost/event/order/1/cancel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/order/1/cancel"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/order/{order_id}/cancel`


<!-- END_196c14bea626aa2aaa0305388e519a13 -->

<!-- START_135b22c5e624a853dd3ae7f7dd6e3192 -->
## Mark an order as payment received

> Example request:

```bash
curl -X POST \
    "http://localhost/event/order/1/mark_payment_received" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/order/1/mark_payment_received"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/order/{order_id}/mark_payment_received`


<!-- END_135b22c5e624a853dd3ae7f7dd6e3192 -->

<!-- START_da5bf01481c97cdf195535f2d72162e5 -->
## Exports order to popular file types

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/orders/export/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/orders/export/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/orders/export/{export_as?}`


<!-- END_da5bf01481c97cdf195535f2d72162e5 -->

<!-- START_265fb6644c55df1f2caaf3b357f215aa -->
## shows &#039;Message Order Creator&#039; modal

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/orders/message" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/orders/message"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/orders/message`


<!-- END_265fb6644c55df1f2caaf3b357f215aa -->

<!-- START_8980f566861ac2eab8ee544a16f2636b -->
## Sends message to order creator

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/orders/message" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/orders/message"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/orders/message`


<!-- END_8980f566861ac2eab8ee544a16f2636b -->

<!-- START_bce72aab2390572dce919a8472cae88a -->
## Show the event customize page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/customize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/customize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/customize`


<!-- END_bce72aab2390572dce919a8472cae88a -->

<!-- START_9a3ace3973a4470d61ef083a81267500 -->
## Show the event customize page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/event/1/customize/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/customize/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET event/{event_id}/customize/{tab?}`


<!-- END_9a3ace3973a4470d61ef083a81267500 -->

<!-- START_91e555703c4f35985dd659519f8165e0 -->
## Edit the event order page settings

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/customize/order_page" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/customize/order_page"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/customize/order_page`


<!-- END_91e555703c4f35985dd659519f8165e0 -->

<!-- START_c5913194443a0092df24144fd5129791 -->
## Edit event page design/colors etc.

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/customize/design" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/customize/design"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/customize/design`


<!-- END_c5913194443a0092df24144fd5129791 -->

<!-- START_22eb84e4fce6432bb1609f120d99971e -->
## Update ticket details

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/customize/ticket_design" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/customize/ticket_design"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/customize/ticket_design`


<!-- END_22eb84e4fce6432bb1609f120d99971e -->

<!-- START_1bf5124c8ccbfcee374bdbccc6debaad -->
## Edit social settings of an event

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/customize/social" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/customize/social"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/customize/social`


<!-- END_1bf5124c8ccbfcee374bdbccc6debaad -->

<!-- START_cdc19a9a343bb61aee0e8fcf73824b84 -->
## Edit fees of an event

> Example request:

```bash
curl -X POST \
    "http://localhost/event/1/customize/fees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/event/1/customize/fees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST event/{event_id}/customize/fees`


<!-- END_cdc19a9a343bb61aee0e8fcf73824b84 -->

<!-- START_9aa49ac5a307cac90de27e8a859ecf9c -->
## Process purshase status from placetopay via POST
(Rejected, accepted purshase)

> Example request:

```bash
curl -X POST \
    "http://localhost/order/paymentCompleted" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/paymentCompleted"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST order/paymentCompleted`


<!-- END_9aa49ac5a307cac90de27e8a859ecf9c -->

<!-- START_0d4015dc738d9dbac0bbd2c09289b5b6 -->
## Process purshase status from PayU via POST
(Rejected, accepted purshase)

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order/paymentCompleted/PayU" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/paymentCompleted/PayU"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET order/paymentCompleted/PayU`


<!-- END_0d4015dc738d9dbac0bbd2c09289b5b6 -->

<!-- START_2f21f968c1e80394536ac41a225a69bc -->
## deleteOrdersPending

> Example request:

```bash
curl -X GET \
    -G "http://localhost/order/delete/orders/pending" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/delete/orders/pending"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET order/delete/orders/pending`


<!-- END_2f21f968c1e80394536ac41a225a69bc -->

<!-- START_cbb57d02b2156a79f9fd55ae7a5d4a09 -->
## Process purshase status from PayU via POST
(Rejected, accepted purshase)

> Example request:

```bash
curl -X POST \
    "http://localhost/order/paymentCompleted/PayU" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/order/paymentCompleted/PayU"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST order/paymentCompleted/PayU`


<!-- END_cbb57d02b2156a79f9fd55ae7a5d4a09 -->

<!-- START_f3dd17678bf646c039706c6e34a58439 -->
## Process purshase status via GET
(Rejected, accepted purshase or pending)

> Example request:

```bash
curl -X GET \
    -G "http://localhost/paymentCompleted/order/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/paymentCompleted/order/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET paymentCompleted/order/{reference_order}`


<!-- END_f3dd17678bf646c039706c6e34a58439 -->

<!-- START_81d84dc18efe0dd12b481830f2b1ac61 -->
## Validate a ticket request. If successful reserve the tickets and redirect to checkout

> Example request:

```bash
curl -X POST \
    "http://localhost/validateTickets/1/checkout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/validateTickets/1/checkout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST validateTickets/{event_id}/checkout`


<!-- END_81d84dc18efe0dd12b481830f2b1ac61 -->

<!-- START_1248933c38ee9ebc9eda5bd99ae79f23 -->
## Show event orders page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/events/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/reports"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET events/reports`


<!-- END_1248933c38ee9ebc9eda5bd99ae79f23 -->

<!-- START_8858ad0032e1a682b4809a1d5b091590 -->
## Exports order to popular file types

> Example request:

```bash
curl -X GET \
    -G "http://localhost/1/exportExcel/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/1/exportExcel/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET {event_id}/exportExcel/{export_as?}`


<!-- END_8858ad0032e1a682b4809a1d5b091590 -->

<!-- START_87ed3e2e425668b72f10723f4d20495b -->
## testsendemail
> Example request:

```bash
curl -X GET \
    -G "http://localhost/testsendemail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/testsendemail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET testsendemail`


<!-- END_87ed3e2e425668b72f10723f4d20495b -->

<!-- START_c1aa27515bf03f12d5698af59e31585a -->
## test
> Example request:

```bash
curl -X GET \
    -G "http://localhost/test" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/test"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET test`


<!-- END_c1aa27515bf03f12d5698af59e31585a -->

<!-- START_fe527ea723c09bf9aa5f91451af188f8 -->
## testpush
> Example request:

```bash
curl -X POST \
    "http://localhost/testpush" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/testpush"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST testpush`


<!-- END_fe527ea723c09bf9aa5f91451af188f8 -->

<!-- START_7106b230a124bdfa15ece6cd430c5724 -->
## getCurrentUser

returns current user information using valid token send with the request.
Token is prosseced by middleware

> Example request:

```bash
curl -X GET \
    -G "http://localhost/auth/currentUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/auth/currentUser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET auth/currentUser`


<!-- END_7106b230a124bdfa15ece6cd430c5724 -->

<!-- START_66df3678904adde969490f2278b8f47f -->
## Authenticate the request for channel access.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/broadcasting/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "No token provided. Unauthenticated"
}
```

### HTTP Request
`GET broadcasting/auth`

`POST broadcasting/auth`


<!-- END_66df3678904adde969490f2278b8f47f -->


