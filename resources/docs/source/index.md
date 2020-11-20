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
    "https://api.evius.co/api/events/est/duplicateactivitie/est" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/est/duplicateactivitie/est"
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
    -G "https://api.evius.co/api/events/delectus/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/delectus/activities"
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
    "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"PRIMERA ACTIVIDAD","subtitle":"Subtitulo primera actividad","image":"https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg","description":"Primera actividad del evento","capacity":50,"event_id":"5fa423eee086ea2d1163343e","datetime_end":"2020-10-14 14:11","datetime_start":"2020-10-14 14:50"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/activities"
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
    "https://api.evius.co/api/events/nulla/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/nulla/activities/1"
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
    "https://api.evius.co/api/events/quam/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/quam/activities/1"
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
    -G "https://api.evius.co/api/events/aliquam/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"activity_id":"eum","user_id":"explicabo"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/aliquam/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_id": "eum",
    "user_id": "explicabo"
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
    "https://api.evius.co/api/events/natus/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"5e9caaa1d74d5c2f6a02a3c2","activity_id":"5fa44f6ba8bf7449e65dae32"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/natus/activities_attendees"
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
    -G "https://api.evius.co/api/events/blanditiis/activities_attendees/1" \
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
    "https://api.evius.co/api/events/animi/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/animi/activities_attendees/1"
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
    "https://api.evius.co/api/events/commodi/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/commodi/activities_attendees/1"
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
    -G "https://api.evius.co/api/me/events/laudantium/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/me/events/laudantium/activities_attendees"
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
    "https://api.evius.co/api/events/veniam/activities_attendees/nihil/check_in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/veniam/activities_attendees/nihil/check_in"
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

#Category


The categories are a facility for classification of events
<!-- START_109013899e0bc43247b0f00b67f889cf -->
## _index_: List of categories

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/categories"
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
    "data": [
        {
            "_id": "5bf47083754e2317e4300b5f",
            "name": "Foro",
            "event_ids": [
                "5bf6be5d854baf01fb6b5392",
                "5bf6e259fb8a3301742ccb54",
                "5c0e7757fb8a3343cd53f2a2",
                "5c0ed445fb8a3346865d18a2",
                "5c0edc55fb8a3346fe092c62",
                "5ce42263d74d5c53fe73b5c2",
                "5ddc6fa1d74d5c4a80105af5",
                "5ea23acbd74d5c4b360ddde2",
                "5ec3f3b6098c766b5c258df2",
                "5ed6a74b7e2bc067381ad164",
                "5f5930849a620801bc6f0e54",
                "5f77244022e2856747709962",
                "5f7e3564cdedb50e4c651602",
                "5f8a0fa58a97e06e371538b4",
                "5f99ffa1ee8de175b83b6523",
                "5fa326abf3411d215c08582e",
                "5fa43a8ce353c5000c109913",
                "5fa5b02c728c0d6c98571d02",
                "5fa68cb53052d821e17b013c",
                "5fa98f4453f33e2b76706178",
                "5fa9a1d0acf8fe587021f792",
                "5fa9d8f0f796e426bc2e8288",
                "5fa9f0d3923f013d325c6c72",
                "5fab0fea29946661320e3192",
                "5fad5184b14d3e1bb6532541",
                "5fad7289b96d3b4c3435d744",
                "5faeab0b51717e6dfa262a02",
                "5fb40d306a842b5580378972",
                "5fb43a5ccebf5521446ac826",
                "5fb44e66d5626726fb784474",
                "5fb546c7e82f8d60733d29c4",
                "5fb582c4daff40449033ce26",
                "5fb59250c647cc6f5130c144",
                "5fb6831dbc16552c8201aca4",
                "5fb690690f82c057eb2e46e2",
                "5fb6906b94aa257b6d100942",
                "5fb6cd01f8cc941e1b0574c4"
            ]
        },
        {
            "_id": "5bb25f91b6312771e92c8695",
            "name": "Concierto",
            "event_ids": [
                "5bb27ad2c0658655f820265e",
                null,
                "5b1060b20d4ed40e93533af3",
                "5bbe5f1ac065861af6219579",
                "5bbfbf7bc065863e0e4f0c90",
                "5bc0b87dc065863e0e4f0cac",
                "5bc65b9ac06586597610c8f1",
                "5bc891f9c065865b5379708b",
                "5bd0c50072b127104119d462",
                "5bd8e48572b127010d268dc2",
                "5bda163072b12702e9647ec2",
                "5be19f1972b1270ee622f422",
                "5be5e7b172b12717943de0b2",
                "5beae89872b12705524056b2",
                "5bec32f7854baf01fb5f80f2",
                "5bd7295d72b12701bd2dce02",
                "5bed94f9854baf0099603452",
                "5bed9c1d854baf03ad1b2f66",
                "5beeea85854baf09b41c4c62",
                "5bef2dcb854baf00d3663732",
                "5bef309b854baf01410f75b2",
                "5bf2d2a5854baf091331b932",
                "5bf43c8c854baf03c2366b03",
                "5bf46040854baf016475a572",
                "5bf46248854baf01eb60d022",
                "5bf463f4854baf022d1d87e2",
                "5bf46602854baf03996a9af2",
                "5bf46af3854baf015d739a12",
                "5bf7057cfb8a330313167423",
                "5bf71112fb8a330353414d2c",
                "5bf71bf3fb8a3306615b87f2",
                "5bf723a4fb8a3307694d6722",
                "5bf82f78fb8a330af0523486",
                "5c012d29fb8a33248b3308f2",
                "5c082558e37db0252e23d752",
                "5c082569e37db0252f1e1102",
                "5c08258de37db0253053bf12",
                "5c082809e37db025313414d2",
                "5c082b99e37db0252e23d753",
                "5c09821efb8a333d987ea6d2",
                "5c0e8e7ffb8a3344ef0ed712",
                "5c0ee06dfb8a3346fe092c63",
                "5c19643efb8a335eb37389d2",
                "5c1979c4fb8a335f7907b782",
                "5c197ea4fb8a335f957f03f2",
                "5c1a4372fb8a33603a0c7572",
                "5c23e147fb8a33622d1b59d2",
                "5c5e07373422540e5c75e323",
                "5c5e0ac13422540e646e99d2",
                "5c5e14bb3422540ec62abd32",
                "5c9d2e9e34225423dd279d82",
                "5ca520903422542c3e47a8f2",
                "5ca5265c3422542c5a146552",
                "5ce34dc3d74d5c5319136272",
                "5ef8a5f13039385c010c8a72",
                "5ef8b0bda724b52094241394",
                "5f99a20378f48e50a571e3b6",
                "5fa60886db08cc02cd020ca4"
            ]
        },
        {
            "_id": "5bb25f9fb6312771e92c8697",
            "name": "Asamblea",
            "event_ids": [
                "5bb29e19c0658655f820266e",
                null,
                "5bbe01dfc0658666af4d39aa",
                "5bbe02cec0658666af4d39ab",
                "5b1060b20d4ed40e93533af3",
                "5bbfc60ec065863da36b8210",
                "5bc0f205c0658655831d3c7c",
                "5bc12c31c0658674c223f7da",
                "5bc7354ec06586060a622897",
                "5bd77b0c72b12700bb57f902",
                "5bd899ad72b1270f043ec9c2",
                "5be2fbd772b1270540690992",
                "5beb317672b1270dc05d05c2",
                "5beb351272b1270e346eeaf2",
                "5beb47fb72b127123d6ffaa2",
                "5bedd45c854baf032463c3d2",
                "5bf43b0a854baf029e23f752",
                "5bf46af3854baf015d739a12",
                "5bf5e5bd854baf06a65c5e02",
                "5bf6de9afb8a33016b6fdbc2",
                "5bfac0d2f33bd4298f457fc2",
                "5bfc7a89fb8a33151b6c0e12",
                "5c083f53fb8a3339862611d2",
                "5c0e79e1fb8a33441a41b352",
                "5c0ed445fb8a3346865d18a2",
                "5c0edc55fb8a3346fe092c62",
                "5c182e45fb8a335c76319a93",
                "5c198f28fb8a335fba6f0922",
                "5c1a7468fb8a3360d3014842",
                "5c1a74acfb8a3360d4548162",
                "5c1a7b57f33bd43bb6041384",
                "5c1a7beff33bd4327d175de6",
                "5c1a7bfdf33bd43eda347075",
                "5c1a7d5cf33bd40bb575ac24",
                "5c1aa9c9f33bd4023b392c12",
                "5c3c9e4cfb8a336cde5e5602",
                "5c3df629fb8a336e8f65b8c2",
                "5c5ca5e53422540afd776174",
                "5c5e0c6d3422540e742f6ca2",
                "5ca3869234225428e73b2122",
                "5e7bd077d74d5c581c1a3d92",
                "5e9cae6bd74d5c2f5f0c61f2",
                "5ea896a0081c9926462ab094",
                "5ec04ae80f0544330c302ba2",
                "5e7be525d74d5c588747d1a2",
                "5ec3f3b6098c766b5c258df2",
                "5ee7d3753bdf8c32652b12a4",
                "5ee7e8653569fc5dfe51c644",
                "5ee8bf296778bd42e76e1983",
                "5ef109d080ba2a5b055350e2",
                "5ef3aa1629062152632ae312",
                "5ef49fd9c6c89039a14c6412",
                "5f00dc9c26b2b13c164a8894",
                "5f0e16a66b0e49031810d6e2",
                "5f1445482ef28320510a26e2",
                "5f456bef532c8416b97e9c82",
                "5f4fcfb3a4ecad4c2412e9c3",
                "5f4ff8e06328ce6d755d8392",
                "5f56a40502fde049d27aeb22",
                "5f64b6470dde8f41b0417602",
                "5f7ca7e4552ff6163239bb43"
            ]
        },
        {
            "_id": "5bf470c9754e2317e4300b62",
            "name": "Convención",
            "event_ids": [
                "5bfc06e3fb8a330f9a57b02a",
                "5bfdc654fb8a331aa77a9292",
                "5c5e0e723422540e9a4fcf33",
                "5db215419567225895c8d296",
                "5d6eb0cbd74d5c163179d002",
                "5e1ceb50d74d5c1064437aa2",
                "5e20b7b1d74d5c237f66f129",
                "5e20bee2d74d5c23df54af42",
                "5e1f7921d74d5c1bcf25c6b2",
                "5e5fe2e4d74d5c2e8d65b2f2",
                "5e5fe449d74d5c2e9e3deda2",
                "5e5fe3bad74d5c2e795083f2",
                "5ea6df83cf57da4a52065562",
                "5f63ec5722fd5373b8276c92",
                "5f63ed6294fb0d651d5bb304",
                "5f7b31866df71d13c2782153",
                "5f7c95da1854d9768431cd06",
                "5fa32390c8b11e5a83171bf8",
                "5fa41eabe086ea2d1163343c",
                "5fa41ebfe086ea2d1163343d",
                "5fa423eee086ea2d1163343e",
                "5fa5bf4e9f09392fc33c2ce2",
                "5fa60d792e86f35c0c2a3d32",
                "5faae7381fc1d06d3b28fca2",
                "5fadb9472da04d17e203b98a",
                "5fadbc9c8bc34c4c890c5ee4",
                "5fb69178cb4e49174574ed12"
            ]
        },
        {
            "_id": "5bf470d9754e2317e4300b63",
            "name": "Rueda de negocios",
            "event_ids": [
                "5c0986affb8a333df27d1502",
                "5c198fd0fb8a335fc816e2f2",
                "5ee2357712834512ea33a3b2",
                "5f4fc565b52ae439c874daa2",
                "5f92d0cee5e2552f1b7c8ea2",
                "5f9708a2e4c9eb75713f8cc6"
            ]
        },
        {
            "_id": "5bf470f1754e2317e4300b64",
            "name": "Summit",
            "event_ids": [
                "5bf7057cfb8a330313167423",
                "5c0edc55fb8a3346fe092c62",
                "5c3ca52ffb8a336d065fbaf2",
                "5c3ca61bfb8a336d24302702",
                "5c3cf95afb8a336d5c6152e4",
                "5df02a50d74d5c58130fc0f2",
                "5f5aa2f9ca44794d515f9b82",
                "5f68ddf3f414a9173c5908e3",
                "5f9824fc1f8ccc414e33bec2"
            ]
        },
        {
            "_id": "5bb25243b6312771e92c8693",
            "name": "Evento Deportivo",
            "event_ids": [
                "5ba8fbc4c065867ca1734b31",
                "5ba670a1c065866bce2332d2",
                "5bb25c7b3dafc227b94cf874",
                "5bb25f07c0658635c41dc870",
                "5bb27ad2c0658655f820265e",
                "5bb27f45c0658655f8202664",
                null,
                "5bbccaab3dafc25fff2c70b2",
                "5bbccc7c3dafc260022daed2",
                "5b7c4159c06586333f616385",
                "5bbe5f1ac065861af6219579",
                "5bbf9910c0658665986b03d9",
                "5bbfc323c065863da36b8208",
                "5bc607eec0658629c903b77c",
                "5bc64fbfc0658604132134b0",
                "5bd37aba72b127011f0252b2",
                "5bd7295d72b12701bd2dce02",
                "5be1c42b72b12718b62208f2",
                "5be204e872b1271f671314b2",
                "5bec51da854baf01544e7572",
                "5beedefc854baf037c66a062",
                "5bf43a63854baf029a1ed312",
                "5bf463f4854baf022d1d87e2",
                "5c082558e37db0252e23d752",
                "5c082569e37db0252f1e1102",
                "5c08258de37db0253053bf12",
                "5c082809e37db025313414d2",
                "5c082b99e37db0252e23d753",
                "5c098c5dfb8a333df27d1503",
                "5c0a927bfb8a333f8f24a8b2",
                "5c0ed262fb8a33465e75fb74",
                "5c0ee168fb8a3346d37c29b8",
                "5c197f67fb8a335f9c3c8442",
                "5cddc0317b5f3e09f64388d3",
                "5f308172dde9a812cc682135",
                "5f308604ca217d45ee0345a3",
                "5f44499497e0ec0f865fbb32",
                "5f4e41d5eae9886d464c6bf4",
                "5f4e49d0614b803ccf46f902"
            ],
            "organization_ids": [
                "5bb63842c06586040e58aa35",
                "5bb63861c065863d470263a3"
            ]
        },
        {
            "_id": "5bbb6f7f3dafc227ce1c1ca2",
            "name": "Seminario",
            "updated_at": "2018-10-08 14:53:51",
            "created_at": "2018-10-08 14:53:51",
            "event_ids": [
                null,
                "5bbccaab3dafc25fff2c70b2",
                "5bbccc7c3dafc260022daed2",
                "5bbf701ac0658665986b03c9",
                "5bbfb81ac0658655831d3c60",
                "5bc0b109c065861c264694de",
                "5bc12c31c0658674c223f7da",
                "5bc4a013c065862b4f2ed07f",
                "5bc9dfaac0658639dc57fb62",
                "5bcf47a2c0658639a4316246",
                "5bd8e8b172b12701c774b1a2",
                "5bd9e7e272b12758282e4a72",
                "5bda461e72b12700bc56c802",
                "5bf6de9afb8a33016b6fdbc2",
                "5c0a9d34fb8a3340137899f2",
                "5c0e7656fb8a33439b5d6622",
                "5c0e7757fb8a3343cd53f2a2",
                "5c0e79e1fb8a33441a41b352",
                "5c0ed445fb8a3346865d18a2",
                "5c0ed47ffb8a33468d6b4af2",
                "5c0edc55fb8a3346fe092c62",
                "5c3919e6fb8a336be65e0bb4",
                "5c59ebee34225402ea3cd4d6",
                "5c5e0e003422540e8346fed2",
                "5d2de182d74d5c28047d1f85",
                "5ea3395ad74d5c51340463e2",
                "5ea896a0081c9926462ab094",
                "5eb56bba8962a462823e4162",
                "5ed3ff9f6ba39d1c634fe3f2",
                "5eda79a877dab10c6701e5f3",
                "5ef4b5777a25367490524032",
                "5efd0295c9d8313f9a671d53",
                "5f622ab4fd452e39b3677996",
                "5f9190c0b1b9640237258654",
                "5fa3573e2ee8b743df34e312",
                "5fad3989b15b9e229b01c912",
                "5fad4916bd00d46c7923f124",
                "5fad4916aee83730103eaed2",
                "5fada2dc4c702b76da453024",
                "5fb2c963b637b4527b05d9a8"
            ]
        },
        {
            "_id": "5bf470bc754e2317e4300b61",
            "name": "Lanzamiento",
            "event_ids": [
                "5bf5b842854baf022c5c6b12",
                "5bf62134854baf028946cdf2",
                "5c014bfafb8a332661784d42",
                "5c0ea52bfb8a334571517f14",
                "5c0ed445fb8a3346865d18a2",
                "5c54ba2434225409a225b4b4",
                "5c5d96fc3422540c172c7c36",
                "5c6ede5e7822ab00e71d1a6c",
                "5d9209dad74d5c6d123e15d2",
                "5e475f15d74d5c6b021348e2",
                "5e477041d74d5c6b94570302",
                "5e4786b4d74d5c6bea4d4693",
                "5ea31383d74d5c4ee67f6225",
                "5ea3395ad74d5c51340463e2",
                "5efb5e59b5ce1a30e1705901",
                "5efb5e5db5ce1a30e1705905",
                "5f3fecdc5480a53a9f721bc2",
                "5f47d1871afd9c0a4d7ad7c2",
                "5f52c1d3ed38c87193392ef2",
                "5f7b87c67bd48c53ad335076",
                "5f8099c29564bf4ee44da4f3",
                "5f80a72272ccfd4e0d44b722",
                "5f80a9b272ccfd4e0d44b728",
                "5f80b6c93b4b966dfe7cd012",
                "5fa9a9431cd0d1074b1e9242",
                "5faa8a64c665d049b02df4d2",
                "5faac7b59f81de6f8f1bf712",
                "5fae8c77b72906528d582552",
                "5faec5ebfa7c2b189e6aeb32"
            ]
        },
        {
            "_id": "5bf470fe754e2317e4300b65",
            "name": "Ferial",
            "event_ids": [
                "5c05adcffb8a3333df499fc2",
                "5c068c8ffb8a33342f4ea584",
                "5c068ce1fb8a3334346dc652",
                "5c06dd03fb8a3335a454c4a2",
                "5c0ea52bfb8a334571517f14",
                "5c0ed445fb8a3346865d18a2",
                "5c0edc55fb8a3346fe092c62",
                "5c1127fafb8a3349950ea222",
                "5c34dc8dfb8a3366b957a622",
                "5c3dcfc0fb8a336d5506dc64",
                "5c9d2e9e34225423dd279d82",
                "5ca520903422542c3e47a8f2",
                "5cbdd53a7b5f3e1547110292",
                "5cbe5231d74d5c0d251fa1e2",
                "5cc75549d74d5c1ef610520b",
                "5cdc889cd74d5c49d0046222",
                "5cdc88abd74d5c49e3751e32",
                "5cdc88afd74d5c49d0046223",
                "5cdc88f3d74d5c49e3751e33",
                "5cdc88f3d74d5c49de4fd772",
                "5cdc8cd6d74d5c4a072146f2",
                "5cdde132d74d5c4d2d2c4783",
                "5ce4092dd74d5c539f2fe382",
                "5d853b29d74d5c4eb2105042",
                "5db215419567225895c8d296",
                "5ea70e904586464c1f70a1d2",
                "5ea820bde6d3d573c50beca3",
                "5f2097be48e7d96cf46b6362",
                "5f36c16016a5e7188c7a7a94",
                "5f59331584f7fe05933b8582",
                "5fa5c39562abae32df15db72",
                "5fa5ccdce9d642132168d3f2",
                "5fa5f5ae58fb845fc1663a88",
                "5fa6dcee1c41f15ec92847b4",
                "5fa6e3d915a5d2163d2fae86",
                "5fab316d5bcfb0030a200e06",
                "5fabf617e964377e60653e56",
                "5fac1305512f9c72d14fd602",
                "5fac4ad644d34a6ade0a1942",
                "5fac4ad64b23d321fc1393c2"
            ]
        },
        {
            "_id": "5bf470a7754e2317e4300b60",
            "name": "Congreso",
            "event_ids": [
                "5bf6e259fb8a3301742ccb54",
                "5c0d75a8fb8a33414d5d6f62",
                "5c0d9b42fb8a33416607e1c2",
                "5c0d9d1dfb8a33418a412bd2",
                "5c198f8dfb8a335fbd009692",
                "5c391c55fb8a336be65e0bb5",
                "5c3c9a6dfb8a336c9a035d83",
                "5c3c9d39fb8a336cc529cbf2",
                "5c3ca1c4f33bd444d60ff7a2",
                "5c3ca1f9f33bd444d86d9002",
                "5c3cb554f33bd449405bed63",
                "5c3cb955f33bd444d60ff7a4",
                "5c3cf2f2f33bd44916038d82",
                "5c3cf51af33bd444d9692e12",
                "5c3cf564fb8a336d3f2a83e2",
                "5c3cf5d5fb8a336d5c6152e2",
                "5c3cfa43f33bd449405bed65",
                "5c3cfb37f33bd444d86d9004",
                "5c3cfbf4fb8a336d3f2a83e4",
                "5c3d0817fb8a336d5506dc62",
                "5c3d0e99f33bd444d9692e14",
                "5c3de94cfb8a336de4713ec2",
                "5c3deb93fb8a336de4713ec4",
                "5c3e4382fb8a336fc94ef862",
                "5c3fb4ddfb8a3371ef79bd62",
                "5c51e165342254001a3b1982",
                "5c5b2ea9342254077b4447d9",
                "5c5b2f41342254077b4447db",
                "5c5e14bb3422540ec62abd32",
                "5ce42263d74d5c53fe73b5c2",
                "5e7be525d74d5c588747d1a2",
                "5ea23acbd74d5c4b360ddde2",
                "5ea312a0d74d5c4ee67f6224",
                "5eab373295955335932e8d92",
                "5f0622f01ce76d5550058c32",
                "5f0b95ca34c8116f9b21ebd6",
                "5f0e17dbe2d7c463b16cf157",
                "5f216c2bfdad3d499e1f4942",
                "5f21e0ace0231400f47ae0c2",
                "5f7f21217828e17d80642856",
                "5f7f296192007f701518bb22",
                "5f7f2b7692007f701518bb26",
                "5f7f2df897835115573db7d2",
                "5f7f3021f6408a62c0006eb2",
                "5f7f3022cc68cf2a0143c324",
                "5f879935c2d65a166840c516"
            ]
        },
        {
            "_id": "5fb6e8d76dbaeb3738258092",
            "name": "Comunicaciones",
            "updated_at": "2020-11-19 21:51:19",
            "created_at": "2020-11-19 21:51:19"
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/categories?page=1",
        "last": "http:\/\/localhost\/api\/categories?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/categories",
        "per_page": 900,
        "to": 12,
        "total": 12
    }
}
```

### HTTP Request
`GET api/categories`


<!-- END_109013899e0bc43247b0f00b67f889cf -->

<!-- START_34925c1e31e7ecc53f8f52c8b1e91d44 -->
## _show_: consult information on a specific category

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/categories/5fb6e8d76dbaeb3738258092" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/categories/5fb6e8d76dbaeb3738258092"
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
    "_id": "5fb6e8d76dbaeb3738258092",
    "name": "Comunicaciones",
    "updated_at": "2020-11-19 21:51:19",
    "created_at": "2020-11-19 21:51:19"
}
```

### HTTP Request
`GET api/categories/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `category` |  required  | category

<!-- END_34925c1e31e7ecc53f8f52c8b1e91d44 -->

<!-- START_2335abbed7f782ea7d7dd6df9c738d74 -->
## _store_: create new category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Lectura"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Lectura"
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
`POST api/categories`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name category
    
<!-- END_2335abbed7f782ea7d7dd6df9c738d74 -->

<!-- START_549109b98c9f25ebff47fb4dc23423b6 -->
## _update_: update a specific category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/categories/5fb6e8d76dbaeb3738258092" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"quia"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/categories/5fb6e8d76dbaeb3738258092"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "quia"
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
`PUT api/categories/{category}`

`PATCH api/categories/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `category` |  optional  | category
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | name category
    
<!-- END_549109b98c9f25ebff47fb4dc23423b6 -->

<!-- START_7513823f87b59040507bd5ab26f9ceb5 -->
## _destroy_: Remove the specified resource from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/categories/5fb6e8d76dbaeb3738258092" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/categories/5fb6e8d76dbaeb3738258092"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `category` |  optional  | category

<!-- END_7513823f87b59040507bd5ab26f9ceb5 -->

#Event


<!-- START_742a1cbd4a274c7269f0db99a704ff41 -->
## _index:_ Listing of all events

This method allows dynamic querying of any property through the URL using FilterQuery services for example : Exmaple: [{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events?filtered=%5B%7B%22field%22%3A%22name%22%2C%22value%22%3A%5B%22SUBASTA+DE+ARTE%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events"
);

let params = {
    "filtered": "[{"field":"name","value":["SUBASTA DE ARTE"]}]",
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
    `filtered` |  optional  | optional filter parameters

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
    -d '{"name":"Programming course","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"aut","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category":[],"location":"dicta","extra_config":{}}'

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
    "name": "Programming course",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "aut",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category": [],
    "location": "dicta",
    "extra_config": {}
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
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `picture` | string |  optional  | image of the event
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties
        `author_id` | string |  required  | 
        `event_type_id` | string |  required  | 
        `organizer_id` | string |  required  | 
        `category` | array |  optional  | App\Category
        `location` | String |  optional  | VIRTUAL | VENUE_NAME
        `extra_config` | object |  optional  | json of additional values to be stored
    
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
    -d '{"name":"Programming course","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"laborum","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category":[],"location":"excepturi","extra_config":{}}'

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
    "name": "Programming course",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "laborum",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category": [],
    "location": "excepturi",
    "extra_config": {}
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
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `picture` | string |  optional  | image of the event
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties
        `author_id` | string |  required  | 
        `event_type_id` | string |  required  | 
        `organizer_id` | string |  required  | 
        `category` | array |  optional  | App\Category
        `location` | String |  optional  | VIRTUAL | VENUE_NAME
        `extra_config` | object |  optional  | json of additional values to be stored
    
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
    -G "https://api.evius.co/api/users/temporibus/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/temporibus/events"
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
        "first": "http:\/\/localhost\/api\/users\/temporibus\/events?page=1",
        "last": "http:\/\/localhost\/api\/users\/temporibus\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/users\/temporibus\/events",
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
    -G "https://api.evius.co/api/organizations/ut/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/organizations/ut/events"
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
        "first": "http:\/\/localhost\/api\/organizations\/ut\/events?page=1",
        "last": "http:\/\/localhost\/api\/organizations\/ut\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/organizations\/ut\/events",
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

#EventTypes

The type of event provides information about the scope of the event, for example, events can be of type, **educational, sports, international, etc..**
<!-- START_d075018d0f5c4b4c28eebc2ea6c990a2 -->
## _index_ : list of event types

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/eventTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/eventTypes"
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
    "data": [
        {
            "_id": "5bf47271754e2317e4300b70",
            "name": "Deportes"
        },
        {
            "_id": "5bf47267754e2317e4300b6f",
            "name": "Festivales"
        },
        {
            "_id": "5bf4724a754e2317e4300b6c",
            "name": "Banca"
        },
        {
            "_id": "5bf4725e754e2317e4300b6e",
            "name": "Internacional"
        },
        {
            "_id": "5bf47203754e2317e4300b68",
            "name": "Educación"
        },
        {
            "_id": "5bf47226754e2317e4300b6a",
            "name": "Corporativo"
        },
        {
            "_id": "5bf471e3754e2317e4300b66",
            "name": "Entidades Estatales"
        },
        {
            "_id": "5bf47252754e2317e4300b6d",
            "name": "Pyme"
        },
        {
            "_id": "5bf47230754e2317e4300b6b",
            "name": "Automotor"
        },
        {
            "_id": "5bf471f9754e2317e4300b67",
            "name": "Salud"
        },
        {
            "_id": "5bf47215754e2317e4300b69",
            "name": "Telcos"
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/eventTypes?page=1",
        "last": "http:\/\/localhost\/api\/eventTypes?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/eventTypes",
        "per_page": 900,
        "to": 11,
        "total": 11
    }
}
```

### HTTP Request
`GET api/eventTypes`


<!-- END_d075018d0f5c4b4c28eebc2ea6c990a2 -->

<!-- START_82b919fce1599acdcfd3004c203870e2 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/eventTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"nihil"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/eventTypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "nihil"
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
`POST api/eventTypes`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | required |  optional  | name event types
    
<!-- END_82b919fce1599acdcfd3004c203870e2 -->

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
    -G "https://api.evius.co/api/events/asperiores/eventusers/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/asperiores/eventusers/et"
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
    "message": "No query results for model [App\\Attendee] et"
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
    "https://api.evius.co/api/events/maiores/eventusers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"qui","name":"inventore","other_params,":{"":{"":{"":"aut"}}}}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/maiores/eventusers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qui",
    "name": "inventore",
    "other_params,": {
        "": {
            "": {
                "": "aut"
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
    "https://api.evius.co/api/events/fugiat/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"quibusdam","properties":[]}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/fugiat/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "quibusdam",
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
    `user_id` | string |  required  | user id
        `properties` | array |  optional  | other params  will be saved in user and eventUser each event can require aditional properties for registration
    
<!-- END_eed9d2ac9ae0f6e3669f6613fa1d351c -->

<!-- START_8229080007df704aa1e43dbfa7bf3ea8 -->
## __delete:__ remove a specific attendee from an event.

> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/events/1/eventusers/aliquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/eventusers/aliquam"
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
    -d '{"file":"aliquam"}'

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
    "file": "aliquam"
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
    "https://api.evius.co/api/files/uploadbase/optio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"in","type":"vel"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/files/uploadbase/optio"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "in",
    "type": "vel"
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
    -G "https://api.evius.co/api/events/assumenda/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/assumenda/host"
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
    "https://api.evius.co/api/events/explicabo/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"praesentium","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/explicabo/host"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "praesentium",
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
    -G "https://api.evius.co/api/events/explicabo/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/explicabo/host/1"
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
    "https://api.evius.co/api/events/autem/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"nesciunt","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/autem/host/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "nesciunt",
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
    "https://api.evius.co/api/events/aut/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/aut/host/1"
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

#RoleAttendee


<!-- START_c326d3af496947220548e32f2e10ba93 -->
## _index_: list of the roles of the attendees of an event

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees"
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
        "_id": "5faefba6b68d6316213f7cc2",
        "name": "Asistente",
        "event_id": "5ea23acbd74d5c4b360ddde2",
        "updated_at": "2020-11-13 21:33:26",
        "created_at": "2020-11-13 21:33:26"
    }
]
```

### HTTP Request
`GET api/events/{event_id}/rolesattendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event id

<!-- END_c326d3af496947220548e32f2e10ba93 -->

<!-- START_1640bc5878f3f3b6698f1fafb9b2b09d -->
## _store_:create a new assistant role for an event

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Profesor","event_id":"5fa423eee086ea2d1163343e"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/rolesattendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Profesor",
    "event_id": "5fa423eee086ea2d1163343e"
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
`POST api/events/{event_id}/rolesattendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | rol name
        `event_id` | string |  required  | event id
    
<!-- END_1640bc5878f3f3b6698f1fafb9b2b09d -->

<!-- START_761128fefeeda477ce81ce2f0051aad6 -->
## _show_: view information for a specific assistant role

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees/5faefba6b68d6316213f7cc2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees/5faefba6b68d6316213f7cc2"
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
    "_id": "5faefba6b68d6316213f7cc2",
    "name": "Asistente",
    "event_id": "5ea23acbd74d5c4b360ddde2",
    "updated_at": "2020-11-13 21:33:26",
    "created_at": "2020-11-13 21:33:26"
}
```

### HTTP Request
`GET api/events/{event_id}/rolesattendees/{rolesattendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `rolesattendee` |  required  | RoleAttendee id

<!-- END_761128fefeeda477ce81ce2f0051aad6 -->

<!-- START_0d430b692f1997c2147d78272af1f468 -->
## _update_: update role event

> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/1/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/rolesattendees/1"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | id de RoleAttendee

<!-- END_0d430b692f1997c2147d78272af1f468 -->

<!-- START_730da4f67177565f46a1d6dfab2006d5 -->
## _destroy_: delete rol.

> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/events/1/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/rolesattendees/1"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | id de RoleAttendee

<!-- END_730da4f67177565f46a1d6dfab2006d5 -->

<!-- START_5ae624c6977784b7a830ad9eab832b35 -->
## _index_: list of the roles of the attendees of an event

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/rolesattendees"
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
`GET api/rolesattendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event id

<!-- END_5ae624c6977784b7a830ad9eab832b35 -->

<!-- START_cf1028f6126759f733fee604202cd964 -->
## _show_: view information for a specific assistant role

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/rolesattendees/5faefba6b68d6316213f7cc2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/rolesattendees/5faefba6b68d6316213f7cc2"
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
`GET api/rolesattendees/{rolesattendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `rolesattendee` |  required  | RoleAttendee id

<!-- END_cf1028f6126759f733fee604202cd964 -->

<!-- START_b2a28d12952f6be38c94e5f73dfd299d -->
## _store_:create a new assistant role for an event

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Profesor","event_id":"5fa423eee086ea2d1163343e"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/rolesattendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Profesor",
    "event_id": "5fa423eee086ea2d1163343e"
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
`POST api/rolesattendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | rol name
        `event_id` | string |  required  | event id
    
<!-- END_b2a28d12952f6be38c94e5f73dfd299d -->

<!-- START_386fae58600cc4aaab7e40611552e7f8 -->
## _update_: update role event

> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/rolesattendees/1"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | id de RoleAttendee

<!-- END_386fae58600cc4aaab7e40611552e7f8 -->

<!-- START_20bcc935d9c85f19ae2a05947d0add4b -->
## _destroy_: delete rol.

> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/rolesattendees/1"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | id de RoleAttendee

<!-- END_20bcc935d9c85f19ae2a05947d0add4b -->

<!-- START_67f0cc9990d72d5faeb7e08ced97043b -->
## _destroy_: delete rol.

> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/rolesattendees/quo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/rolesattendees/quo"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | id de RoleAttendee

<!-- END_67f0cc9990d72d5faeb7e08ced97043b -->

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

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## _store_: create new user SignUp

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","names":"quam","picture":"http:\/\/www.gravatar.com\/avatar","password":"ab","others_properties":"[]"}'

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
    "names": "quam",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "password": "ab",
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
    "updated_at": "2020-11-19 21:59:45",
    "created_at": "2020-04-19 19:46:41",
    "names": "evius lopez",
    "refresh_token": "AG8BCnfmqFs1f29NW4w8fc1L_23KP51NXpXhANXYSfLzY1qE5eUT6s9mri7YwPHskJYKSwZOfp8_tufiWr_id-KAXqN9fkFW8W_iU9EpEWKyfKCk4XLm_R3UZ0xJ5fimz1d6JXybodf99-Fp2NjPkZeAD2KXzx0Rn6hDo0hh7V1li2PkY9HLOv5mkPlHofUoMrXAeIDxv8kON1XpA-8CjtIB91Pb-sLR1w",
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

<!-- START_897105c2d6a4eba5dea882c31f100668 -->
## getCurrentUser: returns current user information using valid token send with the request.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
returns current user information using valid token send with the request.
Token is processed  by middleware

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/users/currentUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/currentUser"
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
    "message": "No query results for model [App\\Account] currentUser"
}
```

### HTTP Request
`GET api/users/currentUser`


<!-- END_897105c2d6a4eba5dea882c31f100668 -->

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


<!-- START_689c210ebe174946aebc5f5e948631fe -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/test/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/test/auth"
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
    "_id": "5bc51599cb22e0643e006173",
    "name": "test1539642776",
    "email": "apps1539642776@mocionsoft.com",
    "uid": "uKvKnMsSNnZdECIIqNQ2O46zawD3",
    "updated_at": "2018-10-15 22:32:57",
    "created_at": "2018-10-15 22:32:57"
}
```

### HTTP Request
`GET api/test/auth`


<!-- END_689c210ebe174946aebc5f5e948631fe -->

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

<!-- START_66df3678904adde969490f2278b8f47f -->
## Authenticate the request for channel access.

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/broadcasting/auth"
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



### HTTP Request
`GET broadcasting/auth`

`POST broadcasting/auth`


<!-- END_66df3678904adde969490f2278b8f47f -->


