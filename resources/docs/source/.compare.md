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
[Get Postman Collection](http://api.evius.co/docs/collection.json)

<!-- END_INFO -->

#Activity


The activities within an event are **sessions, talks, lessons or conferences** in which specific topics are discussed.

Each activity has its **date , time and duration**.

These activities, according to the organizer, can be carried out either in person or virtually.
<!-- START_7def06aea83f3af8d7df3d68a7c1776e -->
## _duplicate_: endpoint destined to the duplication of an activity to english language

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events/facere/duplicateactivitie/voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/facere/duplicateactivitie/voluptatem"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event to which the activities belong.
    `id` |  required  | id of the activity you want to see.

<!-- END_7def06aea83f3af8d7df3d68a7c1776e -->

<!-- START_4b74c69334a9fda83ca783df8b478e89 -->
## _index:_ Listing of all activities

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/corporis/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/corporis/activities"
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


> Example response (200):

```json
{
    "access_restriction_rol_ids": [],
    "access_restriction_roles": [],
    "access_restriction_type": "OPEN",
    "access_restriction_types_available": null,
    "activity_categories": [],
    "activity_categories_ids": [
        []
    ],
    "bigmaker_meeting_id": null,
    "capacity": 30,
    "created_at": "2020-11-05 19:15:55",
    "datetime_end": "2020-10-14 14:11",
    "datetime_start": "2020-10-14 14:11",
    "description": "<p>Descripción de la actividad<\/p>",
    "event_id": "5fa423eee086ea2d1163343e",
    "has_date": null,
    "host_ids": [
        []
    ],
    "hosts": [],
    "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg",
    "meeting_id": null,
    "name": "Segunda actividad del evento",
    "registration_message": "<p>Su registro a la segunda actividad ha sido exitoso<\/p>",
    "role_attendee_ids": [
        []
    ],
    "0": [],
    "selected_document": [],
    "space": null,
    "space_id": null,
    "subtitle": "Subtitulo de la segunda actividad",
    "type_id": "5dbb3211d74d5c542150ccc3",
    "updated_at": "2020-11-05 19:15:55",
    "vimeo_id": null,
    "_id": "5fa44f6ba8bf7449e65dae32"
}
```

### HTTP Request
`GET api/events/{event_id}/activities`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 

<!-- END_4b74c69334a9fda83ca783df8b478e89 -->

<!-- START_6828bf55010cf5e51d8e53e912e57eef -->
## _store_: create a new activity

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events/totam/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"PRIMERA ACTIVIDAD","subtitle":"Subtitulo primera actividad","image":"https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg","description":"Primera actividad del evento","capacity":50,"event_id":"5fa423eee086ea2d1163343e","datetime_end":"2020-10-14 14:11","datetime_start":"2020-10-14 14:50"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/totam/activities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "PRIMERA ACTIVIDAD",
    "subtitle": "Subtitulo primera actividad",
    "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg",
    "description": "Primera actividad del evento",
    "capacity": 50,
    "event_id": "5fa423eee086ea2d1163343e",
    "datetime_end": "2020-10-14 14:11",
    "datetime_start": "2020-10-14 14:50"
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
`POST api/events/{event_id}/activities`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | id of the event in which a new activity is to be created
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name
        `subtitle` | string |  optional  | optional
        `image` | string |  optional  | 
        `description` | string |  optional  | 
        `capacity` | integer |  optional  | number of people who can enter the activity.
        `event_id` | string |  required  | event with which the activity is associated
        `datetime_end` | datetime |  required  | 
        `datetime_start` | datetime |  required  | 
    
<!-- END_6828bf55010cf5e51d8e53e912e57eef -->

<!-- START_7b617dbab4e1f0b404e75ddfd19c8fe7 -->
## _show_: View information on a specific activity

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/1/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/activities/1"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Activities] 1"
}
```

### HTTP Request
`GET api/events/{event_id}/activities/{activity}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | id of the activity you want to see.

<!-- END_7b617dbab4e1f0b404e75ddfd19c8fe7 -->

<!-- START_4ba6ba333e4727baa0578296257f0dd9 -->
## _update_:update an activity specific.

> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/autem/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/autem/activities/1"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event to which the activities belong.
    `id` |  required  | id of the activity you want to update.

<!-- END_4ba6ba333e4727baa0578296257f0dd9 -->

<!-- START_13a385d312a14beeda4094ce219fd8c0 -->
## _destroy_: Remove the specified activity

> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/events/perferendis/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/perferendis/activities/1"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event to which the activities belong 5dbc9c65d74d5c5853222222
    `id` |  required  | id of the activity you want to destroy 5dbc99bad74d5c5822691111

<!-- END_13a385d312a14beeda4094ce219fd8c0 -->

<!-- START_871211164d6ff3c84d19bccb06960a4f -->
## api/events/{event_id}/createmeeting/{id}
> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events/1/createmeeting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/createmeeting/1"
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

#ActivityAssistant


<!-- START_eca15b751105fbb8f3ff752e6f4428a7 -->
## _index_: List of the activity_assitans

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/hic/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"activity_id":"commodi","user_id":"libero"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/hic/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_id": "commodi",
    "user_id": "libero"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/events/{event_id}/activities_attendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `activity_id` | string |  required  | 
        `user_id` | string |  required  | 
    
<!-- END_eca15b751105fbb8f3ff752e6f4428a7 -->

<!-- START_368722239d745a97771b933ab15b57a2 -->
## _store_: create new record activity_assitant

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events/incidunt/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"5e9caaa1d74d5c2f6a02a3c2","activity_id":"5fa44f6ba8bf7449e65dae32"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/incidunt/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "5e9caaa1d74d5c2f6a02a3c2",
    "activity_id": "5fa44f6ba8bf7449e65dae32"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | required |  optional  | id of the user who signs up for the activity
        `activity_id` | id |  optional  | of the activity to which the user subscribes
    
<!-- END_368722239d745a97771b933ab15b57a2 -->

<!-- START_9e0213186f832d6708992947ec48bd85 -->
## _show_: view the specific information of an activity_assitant record

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/aut/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/aut/activities_attendees/1"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\ActivityAssistant] 1"
}
```

### HTTP Request
`GET api/events/{event_id}/activities_attendees/{activities_attendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `id` |  optional  | id de activity_assitant

<!-- END_9e0213186f832d6708992947ec48bd85 -->

<!-- START_fe450cfeffdd715401ac202e8a07afb5 -->
## _update_:Update the specific information of an activity_assitant record

> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/illo/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/illo/activities_attendees/1"
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
`PUT api/events/{event_id}/activities_attendees/{activities_attendee}`

`PATCH api/events/{event_id}/activities_attendees/{activities_attendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `id` |  optional  | id de activity_assitant

<!-- END_fe450cfeffdd715401ac202e8a07afb5 -->

<!-- START_a88693506040243563fe88ba562ff6cf -->
## _destroy_:Remove the specific register of an activity_assitant record

> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/events/blanditiis/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/blanditiis/activities_attendees/1"
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
    `event_id` |  required  | event to which the activity belongs
    `id` |  optional  | id of activity_assitant to remove

<!-- END_a88693506040243563fe88ba562ff6cf -->

<!-- START_515690ef29735a9f74bb254e7af30f8b -->
## _meIndex_: list of registered activities of the logged-in user

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/me/events/sed/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/me/events/sed/activities_attendees"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/me/events/{event_id}/activities_attendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs

<!-- END_515690ef29735a9f74bb254e7af30f8b -->

<!-- START_40ddf68733d3f5fd481f254ccf82b550 -->
## _checkIn_: status indicating that the user entered the activity

> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/facere/activities_attendees/explicabo/check_in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/facere/activities_attendees/explicabo/check_in"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `id` |  optional  | id of activity_assitant

<!-- END_40ddf68733d3f5fd481f254ccf82b550 -->

#Event


<!-- START_742a1cbd4a274c7269f0db99a704ff41 -->
## _index:_ Listing of all events

This method allows dynamic querying of any property through the URL using FilterQuery services for example : Exmaple: [{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events?filteredBy=%5B%7B%22id%22%3A%22event_type_id%22%2C%22value%22%3A%5B%225ea6df83cf57da4a52065562%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events"
);

let params = {
    "filteredBy": "[{"id":"event_type_id","value":["5ea6df83cf57da4a52065562"]}]",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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


> Example response (200):

```json
{
    "_id": "5fa423eee086ea2d1163343e",
    "name": "Evento de bienvenida",
    "datetime_from": "2020-10-14T07:00:00.000-05:00",
    "datetime_to": "2020-10-14T07:00:00.000-05:00",
    "author_id": "5e9caaa1d74d5c2f6a02a3c2",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47203754e2317e4300b68",
    "updated_at": "2020-11-05T11:45:01.000-05:00",
    "created_at": "2020-11-05T11:10:22.189-05:00",
    "category_ids": [
        "5bf470c9754e2317e4300b62"
    ],
    "user_properties": [
        {
            "name": "email",
            "label": "Correo",
            "unique": false,
            "mandatory": false,
            "type": "email",
            "updated_at": "2020-11-05T11:10:23.360-05:00",
            "created_at": "2020-11-05T11:10:23.360-05:00",
            "_id": "5fa423efe086ea2d11633440"
        },
        {
            "name": "names",
            "label": "Nombres Y Apellidos",
            "unique": false,
            "mandatory": false,
            "type": "text",
            "updated_at": "2020-11-05T11:10:24.442-05:00",
            "created_at": "2020-11-05T11:10:24.442-05:00",
            "_id": "5fa423f0e086ea2d11633441"
        }
    ],
    "description": "<p>Evento de prueba en testeo de plataforma evius<\/p>",
    "location": [],
    "venue": "Mocion",
    "visibility": "PUBLIC",
    "itemsMenu": {
        "Home": {
            "name": "Homa",
            "position": null,
            "section": "home",
            "icon": "CalendarOutlined",
            "checked": true,
            "permissions": "public"
        }
    }
}
```

### HTTP Request
`GET api/events`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filteredBy` |  optional  | optional filter parameters

<!-- END_742a1cbd4a274c7269f0db99a704ff41 -->

<!-- START_de3413bf02c9bb71627fa96e1c1c409f -->
## _store_: Create new event of the organizer.

There is a special event relationship called organizer, it is a polymorphic relationship. Related to the user and the organization organizer: It could be "me" (current user) or an organization Id.

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\"Programming course\"","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"occaecati","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\"Programming course\"",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "occaecati",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a"
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
`POST api/events`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name to event
        `datetime_from` | datetime |  required  | date and time of start of the event
        `datetime_to` | datetime |  required  | date and time of the end of the event
        `picture` | string |  optional  | image of the event
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties
        `author_id` | string |  required  | 
        `event_type_id` | string |  required  | 
    
<!-- END_de3413bf02c9bb71627fa96e1c1c409f -->

<!-- START_aec83efbad5ec636ec1b29352c041932 -->
## _currentUserindex_: list of events of the organizer

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/me/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/me/events"
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
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/me/events`


<!-- END_aec83efbad5ec636ec1b29352c041932 -->

<!-- START_2478aef777186232e8bca32fdf09efe3 -->
## _store_: Create new event of the organizer.

There is a special event relationship called organizer, it is a polymorphic relationship. Related to the user and the organization organizer: It could be "me" (current user) or an organization Id.

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\"Programming course\"","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"et","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/user/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\"Programming course\"",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "et",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a"
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
`POST api/user/events`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name to event
        `datetime_from` | datetime |  required  | date and time of start of the event
        `datetime_to` | datetime |  required  | date and time of the end of the event
        `picture` | string |  optional  | image of the event
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties
        `author_id` | string |  required  | 
        `event_type_id` | string |  required  | 
    
<!-- END_2478aef777186232e8bca32fdf09efe3 -->

<!-- START_f59d4cbbf9176342893379adb70dc1a5 -->
## _currentUserindex_: list of events of the organizer

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/user/events"
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
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user/events`


<!-- END_f59d4cbbf9176342893379adb70dc1a5 -->

<!-- START_08180c1785ee9a816b6fa5cdf32ece34 -->
## _EventbyUsers_: search of events by user organizer.

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/users/a/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/a/events"
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


> Example response (200):

```json
{
    "data": [],
    "links": {
        "first": "http:\/\/localhost\/api\/users\/a\/events?page=1",
        "last": "http:\/\/localhost\/api\/users\/a\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/users\/a\/events",
        "per_page": 900,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/users/{id}/events`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | organiser_id

<!-- END_08180c1785ee9a816b6fa5cdf32ece34 -->

<!-- START_84149f81b1537e6bcfc498d67a92d685 -->
## _EventbyOrganizations_: search of events by user organizer.

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/organizations/et/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/organizations/et/events"
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


> Example response (200):

```json
{
    "data": [],
    "links": {
        "first": "http:\/\/localhost\/api\/organizations\/et\/events?page=1",
        "last": "http:\/\/localhost\/api\/organizations\/et\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/organizations\/et\/events",
        "per_page": 900,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/organizations/{id}/events`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | organizer_id

<!-- END_84149f81b1537e6bcfc498d67a92d685 -->

#EventUser



Handles the relation bewteeen user and event.  It handles user booking into an event
Account relation to an event is one of the fundamental aspects of this platform
Most of the user functionality is executed under "Attendee" model and not directly under Account, because is an events platform.


<p style="border: 1px solid #DDD">
Attendee has one user though user_id
<br> and one event though event_id
<br> This relation has states that represent the booking status of the user into the event
</p>
<!-- START_741efed688409cc5b0c2673b73da037b -->
## _index_ display all the EventUsers of an event

ORDERING PROBLEM WITH CAPITAL LETTERS
Collections must be created with case-insensitive default collation

Example: db.createCollection("names", { collation: { locale: 'en_US', strength: 1 } } )
https://docs.mongodb.com/manual/core/index-case-insensitive/
https://stackoverflow.com/questions/44682160/add-default-collation-to-existing-mongodb-collection

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/1/eventusers?filteredBy=%5B%7B%22id%22%3A%22event_type_id%22%2C%22value%22%3A%5B%225bb21557af7ea71be746e98x%22%2C%225bb21557af7ea71be746e98b%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/eventusers"
);

let params = {
    "filteredBy": "[{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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


> Example response (200):

```json
{
    "_id": "5f9055454e6953792a54fd43",
    "state_id": "5b0efc411d18160bce9bc706",
    "checked_in": false,
    "rol_id": "5afaf644500a7104f77189cd",
    "properties": {
        "names": "Burke Maldonado",
        "email": "vygufiqe@mailinator.com",
        "password": null,
        "displayName": "Burke Maldonado"
    },
    "event_id": "5e9cae6bd74d5c2f5f0c61f2",
    "account_id": "5f9055454e6953792a54fd42",
    "updated_at": "2020-10-21 15:35:33",
    "created_at": "2020-10-21 15:35:33",
    "rol": null,
    "user": {
        "_id": "5f9055454e6953792a54fd42",
        "email": "vygufiqe@mailinator.com",
        "names": "Burke Maldonado",
        "displayName": "Burke Maldonado",
        "confirmation_code": "mSCaqtrRujVotLrG",
        "api_token": "gEXBxQHw5NW1BOjrC97If7stp9jODtpuLiW6MCeaZ45mUOMcfu20dJMwJedQ",
        "uid": "UOlROJM9hASVfUsbZofEubXrM5j2",
        "initial_token": "eyJhbGciOiJSUzI1NiIsImtpZCI6IjBlM2FlZWUyYjVjMDhjMGMyODFhNGZmN2..",
        "refresh_token": "AG8BCndDGp2u4dbDaA0Q0QvfUfFCJd55iJoOrgJDr84lhXXpd4B34a2Bk8Y8UWl..",
        "updated_at": "2020-10-21 15:35:34",
        "created_at": "2020-10-21 15:35:33"
    },
    "ticket": null
}
```

### HTTP Request
`GET api/events/{event_id}/eventusers`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filteredBy` |  optional  | optional filter parameters

<!-- END_741efed688409cc5b0c2673b73da037b -->

<!-- START_a365aa3932cace4bde297c80cef75050 -->
## _show:_ consult an EventUser by assistant id

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/dolor/eventusers/quisquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/dolor/eventusers/quisquam"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Attendee] quisquam"
}
```

### HTTP Request
`GET api/events/{event_id}/eventusers/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required
    `id` |  optional  | string required id Attendee

<!-- END_a365aa3932cace4bde297c80cef75050 -->

<!-- START_882953c7fc55a0465ff69cdc398811be -->
## _update_:update a specific assistant

> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/error/eventusers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"earum","name":"eum","other_params,":{"":{"":{"":"praesentium"}}}}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/error/eventusers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "earum",
    "name": "eum",
    "other_params,": {
        "": {
            "": {
                "": "praesentium"
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

<!-- START_eed9d2ac9ae0f6e3669f6613fa1d351c -->
## _store:_ Store a newly Attendee  in storage.

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events/qui/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"culpa","user_id":"qui","names":"quaerat","properties":[]}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/qui/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "culpa",
    "user_id": "qui",
    "names": "quaerat",
    "properties": []
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
    `event_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | field
        `user_id` | string |  required  | user id
        `names` | string |  required  | 
        `properties` | array |  optional  | other params  will be saved in user and eventUser
    
<!-- END_eed9d2ac9ae0f6e3669f6613fa1d351c -->

<!-- START_8229080007df704aa1e43dbfa7bf3ea8 -->
## __delete:__ remove a specific attendee from an event.

> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/events/1/eventusers/illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/eventusers/illo"
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
    `eventId` |  optional  | string required
    `id` |  optional  | string required id Attendee to checkin into the event

<!-- END_8229080007df704aa1e43dbfa7bf3ea8 -->

#Files


Files handing mostly used to upload new files
<!-- START_2a29088746aee0c7fa1f3a03ed44765b -->
## Uploads files send though HTTP multipart/form-data

Uploads provided file though HTTPFile  multipart/form-data; and returns full file URL.

In the request the file data came in field called file.

But in case this field name should be changed, It could be done though

field_name parameter

HTTPFile could be just one file on multiple files,

 for one file this function returns  a string with the url
for multiple files It returns an array of URLS.

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/files/upload/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"magnam"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/files/upload/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "magnam"
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
`POST api/files/upload/{field_name?}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `file` | file |  required  | file sent using multipart/form-data;
    
<!-- END_2a29088746aee0c7fa1f3a03ed44765b -->

<!-- START_18c1b3fc6f79ce014b60fa16df3d8417 -->
## _storeBaseImg_: Uploads images send though HTTP multipart/form-data  with resizing option

Uploads files send though HTTP multipart/form-data

Uploads provided file though HTTPFile  multipart/form-data; and returns full file URL.

In the request the file data came in field called file.

But in case this field name should be changed, It could be done though

field_name parameter

HTTPFile could be just one file on multiple files,

 for one file this function returns  a string with the url
for multiple files It returns an array of URLS.

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/files/uploadbase/voluptatibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"blanditiis","type":"qui"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/files/uploadbase/voluptatibus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "blanditiis",
    "type": "qui"
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
`POST api/files/uploadbase/{name}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `name` |  optional  | file field by default file
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `file` | file |  required  | file sent using multipart/form-data;
        `type` | string |  optional  | ["icon" => 240, "wall" => 500, "default" => 600, "email" => 600]; by default 600
    
<!-- END_18c1b3fc6f79ce014b60fa16df3d8417 -->

#Host(Speakers)


The host or conferences are in charge of carrying out the activities
<!-- START_077192157db94670b0aec4f8c3ab858f -->
## _index_: list all host

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/pariatur/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/pariatur/host"
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


> Example response (200):

```json
{
    "created_at": "2020-11-05 20:23:33",
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "event_id": "5fa423eee086ea2d1163343e",
    "image": null,
    "name": "Primer conferencista",
    "order": 1,
    "profession": "Ingeniero",
    "updated_at": "2020-11-05 20:23:33",
    "_id": "5fa45f453766a90b471a0f22"
}
```

### HTTP Request
`GET api/events/{event_id}/host`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 

<!-- END_077192157db94670b0aec4f8c3ab858f -->

<!-- START_8710494b3157c7134f7c467307cff046 -->
## _store_: create new host

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events/quaerat/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"et","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/quaerat/host"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "et",
    "name": "Primer conferencista",
    "order": 1,
    "profession": "Ingeniero"
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
`POST api/events/{event_id}/host`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `description` | string |  optional  | 
        `description_activity` | string |  optional  | 
        `image` | string |  optional  | 
        `name` | string |  optional  | 
        `order` | number |  optional  | 
        `profession` | string |  optional  | 
    
<!-- END_8710494b3157c7134f7c467307cff046 -->

<!-- START_85676b7f0e906289674c581ed2493a28 -->
## _show_: view information for a specific host

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/sint/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/sint/host/1"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Host] 1"
}
```

### HTTP Request
`GET api/events/{event_id}/host/{host}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | host id to be removed

<!-- END_85676b7f0e906289674c581ed2493a28 -->

<!-- START_e181049a1431f6e4a1b7613337ac048b -->
## _update_: update the specified host.

> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/in/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"repudiandae","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/in/host/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "repudiandae",
    "name": "Primer conferencista",
    "order": 1,
    "profession": "Ingeniero"
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
`PUT api/events/{event_id}/host/{host}`

`PATCH api/events/{event_id}/host/{host}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `description` | string |  optional  | 
        `description_activity` | string |  optional  | 
        `image` | string |  optional  | 
        `name` | string |  optional  | 
        `order` | number |  optional  | 
        `profession` | string |  optional  | 
    
<!-- END_e181049a1431f6e4a1b7613337ac048b -->

<!-- START_7b8999601caed9302abcb020e7e74f34 -->
## _destroy_ : Remove the specified speaker.

> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/events/quia/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/quia/host/1"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | host id to be removed

<!-- END_7b8999601caed9302abcb020e7e74f34 -->

#User

Manage users, the users info are stored in the  backend and the user auth info (password, email, sms login)
is stored in firebase auth.
firebaseauth user and backend user are connected thought the uid field generated in firebaseauth.

El manejo de la sessión (si un usuario ingreso al sistema) se maneja usando tokens JWT generados por firebase
se maneja un token en la url que se vence cada media hora y un refresh_token almacenado en el usuario
para refrescar el token que se pasa por la URL.

Del token en la url se extrae la información del usuario
se pasa de esta manera
?token=xxxxxxxxxxxxxxxxx
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## _index_: It&#039;s not posible to query all users in the platform.

Doesn't make sense to query all users. Users main function is to assits to an event
thus make sense to query users going to an event.

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users"
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


> Example response (200):

```json
{
    "data": "Can't query all users of the platform maximun scope is by event, please query particular user by _id or findByEmail"
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
## _show_: registered User

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/users/5e9caaa1d74d5c2f6a02a3c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/5e9caaa1d74d5c2f6a02a3c2"
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


> Example response (200):

```json
{
    "_id": "5e9caaa1d74d5c2f6a02a3c2",
    "uid": "5MxmwDRVy1dULG3oSkigE1shi7z1",
    "email": "evius@evius.co",
    "emailVerified": false,
    "displayName": "evius@evius.co",
    "photoUrl": null,
    "phoneNumber": null,
    "disabled": false,
    "metadata": {
        "createdAt": {
            "date": "2020-04-19 19:46:40.359000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "lastLoginAt": {
            "date": "2020-04-19 19:46:40.359000",
            "timezone_type": 3,
            "timezone": "UTC"
        }
    },
    "providerData": [
        {
            "uid": "evius@evius.co",
            "displayName": "evius co",
            "email": "evius@evius.co",
            "photoUrl": null,
            "providerId": "password",
            "phoneNumber": null
        }
    ],
    "passwordHash": "UkVEQUNURUQ=",
    "customAttributes": [],
    "tokensValidAfterTime": {
        "date": "2020-04-19 19:46:40.000000",
        "timezone_type": 3,
        "timezone": "UTC"
    },
    "confirmation_code": "Fmg1DjO8NAavTRaS",
    "api_token": "p7C53ZAC7Y5I6fzjaJmHgxJK4BCqixG1GeziMAkH3MG4RZxo6iyrcuPS4GBK",
    "updated_at": "2020-11-10 00:12:38",
    "created_at": "2020-04-19 19:46:41",
    "names": "evius lopez",
    "refresh_token": "AG8BCncdaPhPhgCmprMdO-TFKreGtarSI1RvnvYoX5WUIFBwoJL8BxGfJMeqi0225p_uKMEltFse0KDJ5ihUH3pg2-5jArwIPStAQcWw1Ai3x9qxHY3r9dQg6blAjo4280nISbMw1ca4Kj5Wq5KnDm3BSkkTUsGYzY1eGfdWJWVY6H3vPcBBuLqjTGH4gcsU40cC872qD2A-No5V5afPZSugzH6zmhxPtg",
    "aerolineapreferida": "Avianca",
    "genero": "Masculino",
    "tipodecerveza": "Ale",
    "pesovoto": "1",
    "ticket_id": "5efb3da70787930c06043c32",
    "ciudad": "Bogota",
    "compania": "asdf",
    "numerodecelular": "1341234",
    "pais": "Colombia",
    "celular": "123456",
    "condicion": "Mostrar",
    "lugardenacimiento": "Bogotá",
    "seleccionmultiple": [
        "Uno"
    ],
    "casa": "Casa 2",
    "aceptaterminosycondiciones": true,
    "asistecomo": "Persona",
    "estariainteresadoenparticiparenreunionesempresarialesacercade": [
        "Emprendimiento"
    ],
    "cargo": "asdfasdf",
    "direccioncomercial": "567867",
    "empresa": "evius",
    "nit": "1234123412341234",
    "nombredequiendiligencia": "67890",
    "telefono": "123123",
    "ticketid": "5efb3da70787930c06043c32",
    "cedula": 0,
    "address": "Cra 7a 94a - 08",
    "birthDate": "1998-04-22",
    "city": "Bogotá",
    "date": 1599487338613,
    "id": "1019140079",
    "idType": "Cédula de Ciudadanía",
    "name": "Juan Ramirez",
    "payment_status": "Pendiente",
    "phone": "+57 3227363095",
    "playStationID": "sdfsdfsdf4234534",
    "privacyPolicy": true,
    "referenceCode": "e485d3e-2e6c-747e-d583-b1cbaed065e6",
    "teamName": "Polombia FC",
    "termsAndConditions": true,
    "paisciudad": "Afghanistan",
    "campodeaccion": "Teleinformatica",
    "deseaparticipardelaimaginaton": "Si",
    "documentodeidentificacion": "123456789",
    "edad": "2020-11-05",
    "escenario": "El parque",
    "localidad": "Chapinero",
    "niveleducativo": "Profesional",
    "profesion": "aasdfasdf",
    "sexo": "Hombre",
    "password2": "fantasma2040",
    "terminoscondiciones": true,
    "ciudadubicacion": "1234234",
    "ingresasameetupspara": "Asitir a las Charlas",
    "award": "Pinturas",
    "cc": "23123123",
    "place": "CENTRO CORONA MEDELLIN",
    "tel": "13123132123",
    "apellidos": "Triana",
    "archivo": {
        "file": {
            "uid": "rc-upload-1603322886214-7"
        },
        "fileList": [
            {
                "uid": "rc-upload-1603322886214-7",
                "lastModified": 1594398150333,
                "lastModifiedDate": "2020-07-10T16:22:30.333Z",
                "name": "Cancelar los rubros para los e-16a5f9b3fe2a4ec188ddcf339de3ed24100720.xls",
                "size": 5632,
                "type": "application\/vnd.ms-excel",
                "percent": 0,
                "originFileObj": {
                    "uid": "rc-upload-1603322886214-7"
                }
            }
        ]
    },
    "file": {
        "file": {
            "uid": "rc-upload-1602685679263-5"
        },
        "fileList": [
            {
                "uid": "rc-upload-1602685679263-5",
                "lastModified": 1602025229817,
                "lastModifiedDate": "2020-10-06T23:00:29.817Z",
                "name": "ImageCoronaPinturas.jpg",
                "size": 122245,
                "type": "image\/jpeg",
                "percent": 0,
                "originFileObj": {
                    "uid": "rc-upload-1602685679263-5"
                }
            }
        ]
    },
    "files": [],
    "multiplelisttest2": [
        {
            "label": "Turismo Cultural -5512 Alojamiento en apartahoteles",
            "value": "Turismo Cultural -5512 Alojamiento en apartahoteles"
        }
    ],
    "archivo2": {
        "file": {
            "uid": "rc-upload-1603322886214-9"
        },
        "fileList": [
            {
                "uid": "rc-upload-1603322886214-9",
                "lastModified": 1594397783928,
                "lastModifiedDate": "2020-07-10T16:16:23.928Z",
                "name": "Esta de acuerdo con que el Pre-17aa3aada4ca41e5a98f38569a33d034100720.xls",
                "size": 7680,
                "type": "application\/vnd.ms-excel",
                "percent": 0,
                "originFileObj": {
                    "uid": "rc-upload-1603322886214-9"
                }
            }
        ]
    },
    "comoseenterodemagicland": "Redes sociales",
    "eres": "Mayor de edad",
    "identificacion": "123",
    "nombres": "asdf",
    "telefonodecontacto": "11111111111",
    "capitalaserfinanciado": "1111111",
    "cargodelcontactoresponsabledelainiciativa": "test",
    "costoimplementar": "11111",
    "departamento": "Amazonas",
    "direccion": "test",
    "estadodelainiciativaporfavormarqueunadelasdosalternativasseguncorrespondaparalainiciativaqueseestapostulandoiiniciativasquecorrespondanalacontinuacionoescalamientodeunproyectodeadaptacionpreviamenteejecutado": "a",
    "manejodeinformacionhabeasdata": true,
    "nombredelaentidad": "test",
    "nombredelainiciativa": "test",
    "objetivodelainiciativaindiqueelpropositofinaldeloquesequierelograrconlaimplementaciondeestainiciativaestefindeberaindicarunresultadoenlaadaptacionalcambioclimatico": "sadfasdf",
    "participacomo": "Proponente",
    "presentaciondelainciciativa": {
        "file": {
            "uid": "rc-upload-1604577543848-7",
            "lastModified": 1604156059856,
            "lastModifiedDate": "2020-10-31T14:54:19.856Z",
            "name": "Pago PSE.pdf",
            "size": 46394,
            "type": "application\/pdf",
            "percent": 100,
            "originFileObj": {
                "uid": "rc-upload-1604577543848-7"
            },
            "status": "done",
            "response": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/J42QMvdZWXJe3XmWlpBqnKfdThC2cgmzjd47CsQ1.pdf",
            "xhr": []
        },
        "fileList": [
            {
                "uid": "rc-upload-1604577543848-7",
                "lastModified": 1604156059856,
                "lastModifiedDate": "2020-10-31T14:54:19.856Z",
                "name": "Pago PSE.pdf",
                "size": 46394,
                "type": "application\/pdf",
                "percent": 100,
                "originFileObj": {
                    "uid": "rc-upload-1604577543848-7"
                },
                "status": "done",
                "response": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/J42QMvdZWXJe3XmWlpBqnKfdThC2cgmzjd47CsQ1.pdf",
                "xhr": [],
                "url": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/J42QMvdZWXJe3XmWlpBqnKfdThC2cgmzjd47CsQ1.pdf"
            }
        ]
    },
    "presupuestoycronograma": {
        "file": {
            "uid": "rc-upload-1604609330236-21",
            "lastModified": 1604156059856,
            "lastModifiedDate": "2020-10-31T14:54:19.856Z",
            "name": "Pago PSE.pdf",
            "size": 46394,
            "type": "application\/pdf",
            "percent": 100,
            "originFileObj": {
                "uid": "rc-upload-1604609330236-21"
            },
            "status": "done",
            "response": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/dKeVUkt1wecnQ7a3li5NySBnb3vh35ru9EatxEED.pdf",
            "xhr": []
        },
        "fileList": [
            {
                "uid": "rc-upload-1604609330236-21",
                "lastModified": 1604156059856,
                "lastModifiedDate": "2020-10-31T14:54:19.856Z",
                "name": "Pago PSE.pdf",
                "size": 46394,
                "type": "application\/pdf",
                "percent": 100,
                "originFileObj": {
                    "uid": "rc-upload-1604609330236-21"
                },
                "status": "done",
                "response": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/dKeVUkt1wecnQ7a3li5NySBnb3vh35ru9EatxEED.pdf",
                "xhr": []
            }
        ]
    },
    "sector": [
        "Agropecuario",
        "Energía",
        "Turismo",
        "Transporte"
    ],
    "tamanodeempresa": "Start Up",
    "tiempoestimadoparadesarrollarelproyecto": "Menor a 1 año",
    "tipodeempresa": "Pública",
    "tipodeidentificacion": "C.C",
    "tipodeiniciativa": "Adaptación al cambio climático",
    "tipoderecursosnecesarios": "Recursos no reembolsables (donaciones)",
    "aceptoterminosycondiciones": true,
    "terminosycondiciones": true,
    "others_properties": [],
    "profile_completed": false,
    "picture": "http:\/\/www.gravatar.com\/avatar"
}
```

### HTTP Request
`GET api/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | id of user.

<!-- END_8653614346cb0e3d444d164579a0a0a2 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## _store_: create new user SignUp.

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","names":"nostrum","picture":"http:\/\/www.gravatar.com\/avatar","password":"similique","others_properties":"[]"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "evius@evius.co",
    "names": "nostrum",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "password": "similique",
    "others_properties": "[]"
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
`POST api/users`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | 
        `names` | string |  required  | person name
        `picture` | string |  optional  | optional.
        `password` | string |  optional  | optional if not provided a default evius.2040 password is assigned
        `others_properties` | Array |  optional  | dynamic properties of the user you want to place
    
<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## _update_: update registered user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/users/5e9caaa1d74d5c2f6a02a3c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","names":"evius lopez","picture":"http:\/\/www.gravatar.com\/avatar","others_properties":"[]"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/5e9caaa1d74d5c2f6a02a3c2"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "evius@evius.co",
    "names": "evius lopez",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "others_properties": "[]"
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
`PUT api/users/{user}`

`PATCH api/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | id user.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  optional  | optional.
        `names` | string |  optional  | optional.
        `picture` | string |  optional  | optional.
        `others_properties` | array |  optional  | optional dynamic properties of the user you want to place.
    
<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## _delete_: dele a registered user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/1"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | id user

<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->

<!-- START_eb2ff3ef2cdbbd1f25eccfdb8637e9e5 -->
## _signInWithEmailAndPassword_: login a user

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/users/signInWithEmailAndPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","password":"evius.2040"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/signInWithEmailAndPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "evius@evius.co",
    "password": "evius.2040"
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
`POST api/users/signInWithEmailAndPassword`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | 
        `password` | string |  required  | 
    
<!-- END_eb2ff3ef2cdbbd1f25eccfdb8637e9e5 -->

<!-- START_a8785604ee9d7e645382ed66ee45ff12 -->
## loginorcreatefromtoken: create a user from auth data.

If a userauth is created  in frontend using firebaseatuh javascript JDK
this method can be called to create respective user in the backend
data is extracted from the token.

authuser in firebaseauth and user are related by the field uid created by firebase

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/users/loginorcreatefromtoken" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/loginorcreatefromtoken"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Account] loginorcreatefromtoken"
}
```

### HTTP Request
`GET api/users/loginorcreatefromtoken`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `token` |  required  | auth token used to extract the user info
    `destination` |  optional  | optional url to redirect after user is created

<!-- END_a8785604ee9d7e645382ed66ee45ff12 -->

<!-- START_16f3abe301f4f23d3903a26415684533 -->
## _findByEmail_: search for specific user by mail

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/users/findByEmail/evius@evius.co" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/findByEmail/evius@evius.co"
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


> Example response (200):

```json
[
    {
        "_id": "5e9caaa1d74d5c2f6a02a3c2",
        "email": "evius@evius.co",
        "displayName": "evius@evius.co",
        "names": "evius lopez",
        "id": "1019140079",
        "name": "Juan Ramirez"
    }
]
```

### HTTP Request
`GET api/users/findByEmail/{email}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `email` |  required  | email del usuario buscado.

<!-- END_16f3abe301f4f23d3903a26415684533 -->

#general


<!-- START_5311daf9c1595e9d9e1570e62c42f532 -->
## Display a listing of the resource.

muestra los usuarios de una organización

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/organizations/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/organizations/1/users"
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
    "message": "Unauthenticated."
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
    "https://api.evius.co/api/organizations/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/organizations/1/users"
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
    "https://api.evius.co/api/organizations/1/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/organizations/1/users/1"
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

<!-- START_739442a2495f200cd4de63da705ac98e -->
## Create model_has_role
role_id
model_id (user_id)
event_id

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/me/contributors/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/me/contributors/events"
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
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/me/contributors/events`


<!-- END_739442a2495f200cd4de63da705ac98e -->

<!-- START_9b8c5a2dde67602a8bbc27b096c1a18c -->
## __index:__ Display all the Orders of an user

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/users/1/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/1/orders"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\User] 1"
}
```

### HTTP Request
`GET api/users/{user_id}/orders`


<!-- END_9b8c5a2dde67602a8bbc27b096c1a18c -->

<!-- START_3f1753b7a14e74ef0bc952ba0be6a52a -->
## Show the organiser events page

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/organiser/1/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/organiser/1/events"
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
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET organiser/{organiser_id}/events`


<!-- END_3f1753b7a14e74ef0bc952ba0be6a52a -->


