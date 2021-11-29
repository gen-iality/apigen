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
[Get Postman Collection](http://apidev.evius.co/docs/collection.json)

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
    "https://apidev.evius.co/api/events/tenetur/duplicateactivitie/accusantium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/tenetur/duplicateactivitie/accusantium"
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
    -G "https://apidev.evius.co/api/events/605241e68b276356801236e4/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/activities"
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
            "_id": "60804c0b83a7356adf055244",
            "name": "Test",
            "subtitle": "Actividad de Bienvenida",
            "bigmaker_meeting_id": null,
            "datetime_start": "2021-03-17 10:59",
            "datetime_end": "2021-03-17 10:59",
            "space_id": "60804a3fb4446f324067d734",
            "image": null,
            "description": "<p>Descripción de la actividad<\/p>",
            "registration_message": "<p>Descripción de la actividad<\/p>",
            "capacity": 0,
            "activity_categories_ids": [
                []
            ],
            "access_restriction_type": "OPEN",
            "access_restriction_rol_ids": [],
            "has_date": null,
            "selected_document": [],
            "meeting_id": null,
            "vimeo_id": null,
            "platform": "zoom",
            "start_url": null,
            "join_url": null,
            "host_ids": [
                "60804a05ad144055685e3ac7"
            ],
            "event_id": "605241e68b276356801236e4",
            "date_start_zoom": "2021-03-17T09:59:00",
            "date_end_zoom": "2021-03-17T11:59:00",
            "updated_at": "2021-04-21 16:00:11",
            "created_at": "2021-04-21 16:00:11",
            "role_attendee_ids": [
                []
            ],
            "access_restriction_types_available": null,
            "activity_categories": [],
            "space": {
                "_id": "60804a3fb4446f324067d734",
                "name": "Salón 1",
                "event_id": "605241e68b276356801236e4",
                "updated_at": "2021-04-21 15:52:31",
                "created_at": "2021-04-21 15:52:31",
                "60804a3fb4446f324067d734": [
                    null,
                    null
                ]
            },
            "hosts": [
                {
                    "_id": "60804a05ad144055685e3ac7",
                    "name": "Conferencista",
                    "image": null,
                    "description_activity": "true",
                    "description": "<p>Descripción del conferencista<\/p>",
                    "profession": "Conferencista",
                    "order": 1,
                    "event_id": "605241e68b276356801236e4",
                    "updated_at": "2021-04-21 15:51:33",
                    "created_at": "2021-04-21 15:51:33",
                    "activities_ids": [
                        "60804886e0187e207d5df280",
                        "60804c0b83a7356adf055244"
                    ]
                }
            ],
            "type": null,
            "access_restriction_roles": []
        },
        {
            "_id": "614adaa4b2f1862950362910",
            "name": "Activity 2",
            "subtitle": null,
            "bigmaker_meeting_id": null,
            "datetime_start": "2021-03-17 11:26",
            "datetime_end": "2021-03-17 11:26",
            "space_id": null,
            "image": null,
            "description": "<p><br><\/p>",
            "registration_message": "<p><br><\/p>",
            "capacity": 0,
            "activity_categories_ids": [
                []
            ],
            "access_restriction_type": "OPEN",
            "access_restriction_rol_ids": [],
            "has_date": null,
            "selected_document": [],
            "meeting_id": null,
            "vimeo_id": null,
            "platform": "zoom",
            "start_url": null,
            "join_url": null,
            "requires_registration": false,
            "host_ids": [
                []
            ],
            "event_id": "605241e68b276356801236e4",
            "date_start_zoom": "2021-03-17T10:26:00",
            "date_end_zoom": "2021-03-17T12:26:00",
            "updated_at": "2021-09-22 07:26:28",
            "created_at": "2021-09-22 07:26:28",
            "role_attendee_ids": [
                []
            ],
            "access_restriction_types_available": null,
            "activity_categories": [],
            "space": null,
            "hosts": [],
            "type": null,
            "access_restriction_roles": []
        },
        {
            "_id": "614adb5d5140ef04a663bc7f",
            "name": "Visita al pabellon del Japón",
            "subtitle": null,
            "bigmaker_meeting_id": null,
            "datetime_start": "2021-03-17 11:27",
            "datetime_end": "2021-03-17 11:27",
            "space_id": null,
            "image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/K1rt74ODkjiBTVySgNCueQFSkDyZuZyutEItRui2.jpg",
            "description": "<p><br><\/p>",
            "registration_message": "<p><br><\/p>",
            "capacity": 0,
            "activity_categories_ids": [
                []
            ],
            "access_restriction_type": "OPEN",
            "access_restriction_rol_ids": [],
            "has_date": null,
            "selected_document": [],
            "meeting_id": null,
            "vimeo_id": null,
            "platform": "zoom",
            "start_url": null,
            "join_url": null,
            "requires_registration": false,
            "host_ids": [
                []
            ],
            "event_id": "605241e68b276356801236e4",
            "date_start_zoom": "2021-03-17T10:27:00",
            "date_end_zoom": "2021-03-17T12:27:00",
            "updated_at": "2021-09-22 07:29:33",
            "created_at": "2021-09-22 07:29:33",
            "role_attendee_ids": [
                []
            ],
            "access_restriction_types_available": null,
            "activity_categories": [],
            "space": null,
            "hosts": [],
            "type": null,
            "access_restriction_roles": []
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/events\/605241e68b276356801236e4\/activities?page=1",
        "last": "http:\/\/localhost\/api\/events\/605241e68b276356801236e4\/activities?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/605241e68b276356801236e4\/activities",
        "per_page": 2500,
        "to": 3,
        "total": 3
    }
}
```

### HTTP Request
`GET api/events/{event_id}/activities`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | require

<!-- END_4b74c69334a9fda83ca783df8b478e89 -->

<!-- START_6828bf55010cf5e51d8e53e912e57eef -->
## _store_: create a new activity

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"PRIMERA ACTIVIDAD","subtitle":"Subtitulo primera actividad","image":"https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg","description":"Primera actividad del evento","capacity":50,"event_id":"5fa423eee086ea2d1163343e","datetime_end":"2020-10-14 14:11","datetime_start":"2020-10-14 14:50"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/activities"
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


> Example response (200):

```json
{
    "_id": "60804c6e6b7150714f20d122",
    "name": "PRIMERA ACTIVIDAD",
    "subtitle": "Subtitulo primera actividad",
    "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg",
    "description": "Primera actividad del evento",
    "capacity": 50,
    "event_id": "5fa423eee086ea2d1163343e",
    "datetime_end": "2020-10-14 14:11",
    "datetime_start": "2020-10-14 14:50",
    "date_start_zoom": "2020-10-14T13:50:00",
    "date_end_zoom": "2020-10-14T15:11:00",
    "updated_at": "2021-04-21 16:01:50",
    "created_at": "2021-04-21 16:01:50",
    "access_restriction_types_available": null,
    "activity_categories": [],
    "space": null,
    "hosts": [],
    "type": null,
    "access_restriction_roles": []
}
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
    -G "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/activities/60804c6e6b7150714f20d122" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/activities/60804c6e6b7150714f20d122"
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
    "_id": "60804c6e6b7150714f20d122",
    "name": "PRIMERA ACTIVIDAD",
    "subtitle": "Subtitulo primera actividad",
    "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg",
    "description": "Primera actividad del evento",
    "capacity": 50,
    "event_id": "5fa423eee086ea2d1163343e",
    "datetime_end": "2020-10-14 14:11",
    "datetime_start": "2020-10-14 14:50",
    "date_start_zoom": "2020-10-14T13:50:00",
    "date_end_zoom": "2020-10-14T15:11:00",
    "updated_at": "2021-04-21 16:01:50",
    "created_at": "2021-04-21 16:01:50",
    "access_restriction_types_available": null,
    "activity_categories": [],
    "space": null,
    "hosts": [],
    "type": null,
    "access_restriction_roles": []
}
```

### HTTP Request
`GET api/events/{event_id}/activities/{activity}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event the activity.
    `activity` |  required  | id of the activity you want to see.

<!-- END_7b617dbab4e1f0b404e75ddfd19c8fe7 -->

<!-- START_4ba6ba333e4727baa0578296257f0dd9 -->
## _update_:update an activity specific.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"PRIMERA ACTIVIDAD","subtitle":"Subtitulo primera actividad","image":"https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg","description":"Primera actividad del evento","capacity":50,"event_id":"5fa423eee086ea2d1163343e","datetime_end":"2020-10-14 14:11","datetime_start":"2020-10-14 14:50"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/activities/1"
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
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "_id": "60804c6e6b7150714f20d122",
    "name": "PRIMERA ACTIVIDAD",
    "subtitle": "Subtitulo primera actividad",
    "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg",
    "description": "Primera actividad del evento",
    "capacity": 50,
    "event_id": "5fa423eee086ea2d1163343e",
    "datetime_end": "2020-10-14 14:11",
    "datetime_start": "2020-10-14 14:50",
    "date_start_zoom": "2020-10-14T13:50:00",
    "date_end_zoom": "2020-10-14T15:11:00",
    "updated_at": "2021-04-21 16:01:50",
    "created_at": "2021-04-21 16:01:50",
    "access_restriction_types_available": null,
    "activity_categories": [],
    "space": null,
    "hosts": [],
    "type": null,
    "access_restriction_roles": []
}
```

### HTTP Request
`PUT api/events/{event_id}/activities/{activity}`

`PATCH api/events/{event_id}/activities/{activity}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event to which the activities belong.
    `id` |  required  | id of the activity you want to update.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | name
        `subtitle` | string |  optional  | optional
        `image` | string |  optional  | 
        `description` | string |  optional  | 
        `capacity` | integer |  optional  | number of people who can enter the activity.
        `event_id` | string |  optional  | event with which the activity is associated
        `datetime_end` | datetime |  optional  | 
        `datetime_start` | datetime |  optional  | 
    
<!-- END_4ba6ba333e4727baa0578296257f0dd9 -->

<!-- START_13a385d312a14beeda4094ce219fd8c0 -->
## _destroy_: Remove the specified activity

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/events/5dbc9c65d74d5c5853222222/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5dbc9c65d74d5c5853222222/activities/1"
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
    `event_id` |  required  | id of the event to which the activities belong
    `id` |  required  | id of the activity you want to destroy

<!-- END_13a385d312a14beeda4094ce219fd8c0 -->

<!-- START_871211164d6ff3c84d19bccb06960a4f -->
## _createMeeting_: assing meeting to activitie.

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/createmeeting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"activity_datetime_start":"2020-10-14 14:11","activity_name":"facere","activity_description":"quasi"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/createmeeting/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_datetime_start": "2020-10-14 14:11",
    "activity_name": "facere",
    "activity_description": "quasi"
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
`POST api/events/{event_id}/createmeeting/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `activity_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `activity_datetime_start` | date |  required  | 
        `activity_name` | string |  required  | Example : First activity
        `activity_description` | string |  required  | Example : First activity
    
<!-- END_871211164d6ff3c84d19bccb06960a4f -->

<!-- START_8aca23a4296683126db1e2caebd731fb -->
## _hostAvailability_: end point que controla las disponibilidad de los host al crear una reunión

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/numquam/activities/dolorem/hostAvailability" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"host_ids":"[\"KthHMroFQK24I97YoqxBZw\" , \"FIRVnSoZR7WMDajgtzf5Uw\" , \"15DKHS_6TqWIFpwShasM4w\" , \"2m-YaXq_TW2f791cVpP8og\", \"mSkbi8PmSSqQEWsm6FQiAA\"]","host_id":"KthHMroFQK24I97YoqxBZw","date_start_zoom":"2021-02-08T07:30:00","date_end_zoom":"2021-02-08T09:30:00"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/numquam/activities/dolorem/hostAvailability"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "host_ids": "[\"KthHMroFQK24I97YoqxBZw\" , \"FIRVnSoZR7WMDajgtzf5Uw\" , \"15DKHS_6TqWIFpwShasM4w\" , \"2m-YaXq_TW2f791cVpP8og\", \"mSkbi8PmSSqQEWsm6FQiAA\"]",
    "host_id": "KthHMroFQK24I97YoqxBZw",
    "date_start_zoom": "2021-02-08T07:30:00",
    "date_end_zoom": "2021-02-08T09:30:00"
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
`PUT api/events/{event_id}/activities/{id}/hostAvailability`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `id` |  required  | activity to which the meeting is to be created
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `host_ids` | array |  optional  | optional id array of selectable hosts
        `host_id` | string |  optional  | host selected to create the meeting
        `date_start_zoom` | date |  optional  | 
        `date_end_zoom` | date |  optional  | 
    
<!-- END_8aca23a4296683126db1e2caebd731fb -->

<!-- START_e1a4529c7f0d61c37cd22cb487b821a1 -->
## _registerAndCheckInActivity_: status indicating that the user entered the activity

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/ea/activities/et/register_and_checkin_to_activity" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/ea/activities/et/register_and_checkin_to_activity"
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


> Example response (200):

```json
{
    "user_id": "5e9caaa1d74d5c2f6a02a3c2",
    "activity_id": "60181474e36ef049a92768ba",
    "event_id": "5fa423eee086ea2d1163343e",
    "checkedin_at": "2021-02-01 22:48:19",
    "updated_at": "2021-02-01 22:48:19",
    "created_at": "2021-02-01 22:48:19",
    "_id": "601885335603e6467b65b605"
}
```

### HTTP Request
`POST api/events/{event_id}/activities/{id}/register_and_checkin_to_activity`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `id` |  optional  | id of activity

<!-- END_e1a4529c7f0d61c37cd22cb487b821a1 -->

<!-- START_0ad85be048a18b3c6da08c3a96a8e939 -->
## _deleteVirtualSpaceZoom_:

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/1/activities/mettings_zoom/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/activities/mettings_zoom/1"
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
`PUT api/events/{event_id}/activities/mettings_zoom/{meeting_id}`


<!-- END_0ad85be048a18b3c6da08c3a96a8e939 -->

<!-- START_abb60f527b9773a27ca95b03f895e392 -->
## _checkInByAdmin_: admin can check-in a specific user on a specific activity

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/et/activities/consequatur/checkinbyadmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"aperiam"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/et/activities/consequatur/checkinbyadmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "aperiam"
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
`POST api/events/{event}/activities/{activity}/checkinbyadmin`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event to which the activity belongs
    `activity` |  required  | activity id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | string |  required  | user id
    
<!-- END_abb60f527b9773a27ca95b03f895e392 -->

#ActivityAssistant


<!-- START_eca15b751105fbb8f3ff752e6f4428a7 -->
## _index_: List of the activity_assitans

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees"
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
            "_id": "5ed66ce2a6929562725bd7c2",
            "activity_id": "5ed4081416197f2b711c5ed5",
            "user_id": "5ed667edd3093a019f783d58",
            "event_id": "5ed3ff9f6ba39d1c634fe3f2",
            "user_ids": [
                "5ed667edd3093a019f783d58"
            ],
            "updated_at": "2020-06-02 15:14:42",
            "created_at": "2020-06-02 15:14:42",
            "user": null
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/events\/5ed3ff9f6ba39d1c634fe3f2\/activities_attendees?page=1",
        "last": "http:\/\/localhost\/api\/events\/5ed3ff9f6ba39d1c634fe3f2\/activities_attendees?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/5ed3ff9f6ba39d1c634fe3f2\/activities_attendees",
        "per_page": 2500,
        "to": 1,
        "total": 1
    }
}
```

### HTTP Request
`GET api/events/{event_id}/activities_attendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 

<!-- END_eca15b751105fbb8f3ff752e6f4428a7 -->

<!-- START_368722239d745a97771b933ab15b57a2 -->
## _store_: create new record activity_assitant

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/perspiciatis/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"5e9caaa1d74d5c2f6a02a3c2","activity_id":"5fa44f6ba8bf7449e65dae32"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/perspiciatis/activities_attendees"
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


> Example response (200):

```json
{
    "user_id": "6026b57a11dbd7582d770e5a",
    "activity_id": "60804c6e6b7150714f20d122",
    "event_id": "5fa423eee086ea2d1163343e",
    "updated_at": "2021-04-21 16:48:14",
    "created_at": "2021-04-21 16:48:14",
    "_id": "6080574edccc122ed71f7b24"
}
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
    -G "https://apidev.evius.co/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees/5ed66ce2a6929562725bd7c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees/5ed66ce2a6929562725bd7c2"
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
    "_id": "5ed66ce2a6929562725bd7c2",
    "activity_id": "5ed4081416197f2b711c5ed5",
    "user_id": "5ed667edd3093a019f783d58",
    "event_id": "5ed3ff9f6ba39d1c634fe3f2",
    "user_ids": [
        "5ed667edd3093a019f783d58"
    ],
    "updated_at": "2020-06-02 15:14:42",
    "created_at": "2020-06-02 15:14:42",
    "user": null
}
```

### HTTP Request
`GET api/events/{event_id}/activities_attendees/{activities_attendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `activities_attendee` |  optional  | id de activity_assitant

<!-- END_9e0213186f832d6708992947ec48bd85 -->

<!-- START_fe450cfeffdd715401ac202e8a07afb5 -->
## _update_:Update the specific information of an activity_assitant record

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/ex/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/ex/activities_attendees/1"
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
    "https://apidev.evius.co/api/events/et/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/et/activities_attendees/1"
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

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/me/events/quos/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/me/events/quos/activities_attendees"
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
    "https://apidev.evius.co/api/events/dolorum/activities_attendees/sed/check_in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/dolorum/activities_attendees/sed/check_in"
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
    -G "https://apidev.evius.co/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/categories"
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
            "_id": "5bb25243b6312771e92c8693",
            "name": "Evento Deportivo",
            "organization_ids": [
                "5bb63842c06586040e58aa35",
                "5bb63861c065863d470263a3"
            ]
        },
        {
            "_id": "5bb25f91b6312771e92c8695",
            "name": "Concierto"
        },
        {
            "_id": "5bb25f9fb6312771e92c8697",
            "name": "Asamblea"
        },
        {
            "_id": "5bbb6f7f3dafc227ce1c1ca2",
            "name": "Seminario",
            "updated_at": "2018-10-08 14:53:51",
            "created_at": "2018-10-08 14:53:51"
        }
    ]
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
    -G "https://apidev.evius.co/api/categories/5bb25243b6312771e92c8693" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/categories/5bb25243b6312771e92c8693"
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
    "_id": "5bb25243b6312771e92c8693",
    "name": "Evento Deportivo",
    "organization_ids": [
        "5bb63842c06586040e58aa35",
        "5bb63861c065863d470263a3"
    ]
}
```

### HTTP Request
`GET api/categories/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `category` |  required  | category

<!-- END_34925c1e31e7ecc53f8f52c8b1e91d44 -->

<!-- START_a3f47d4a0050ce677364d4f73eba41eb -->
## _indexByOrganization_ : list categories by organization

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/categories/organizations/5f7e33ba3abc2119442e83e8" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/categories/organizations/5f7e33ba3abc2119442e83e8"
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
        "_id": "5fbee701a75d483665317ee3",
        "name": "Planeta",
        "image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/ucronio-dev%2Fplaneta.jpg?alt=media&token=54c3c6d0-de27-4298-b5a0-fda6a1409759",
        "updated_at": "2020-11-25 23:21:37",
        "created_at": "2020-11-25 23:21:37",
        "organization_ids": [
            "5f7e33ba3abc2119442e83e8"
        ]
    },
    {
        "_id": "5fbee74043fe4a32e151587c",
        "name": "Satélites",
        "image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/ucronio-dev%2Fsatelites.jpg?alt=media&token=7f12fa5d-11a3-40a0-9461-d3debdc04b90",
        "updated_at": "2020-11-25 23:22:40",
        "created_at": "2020-11-25 23:22:40",
        "organization_ids": [
            "5f7e33ba3abc2119442e83e8"
        ]
    }
]
```

### HTTP Request
`GET api/categories/organizations/{organization_ids}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_ids` |  required  | 

<!-- END_a3f47d4a0050ce677364d4f73eba41eb -->

<!-- START_2335abbed7f782ea7d7dd6df9c738d74 -->
## _store_: create new category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Animales","image":"https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/gato-atigrado-triste-redes.jpg?alt=media&token=2cd2161b-43f7-42a8-87e6-cf571e83e660","organization_ids":"[5f7e33ba3abc2119442e83e8]"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Animales",
    "image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/gato-atigrado-triste-redes.jpg?alt=media&token=2cd2161b-43f7-42a8-87e6-cf571e83e660",
    "organization_ids": "[5f7e33ba3abc2119442e83e8]"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "name": "Animales",
    "image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/gato-atigrado-triste-redes.jpg?alt=media&token=2cd2161b-43f7-42a8-87e6-cf571e83e660",
    "updated_at": "2021-01-26 15:45:32",
    "created_at": "2021-01-26 15:45:32",
    "_id": "6010391c5254c826bf302bc6"
}
```

### HTTP Request
`POST api/categories`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name category
        `image` | string |  optional  | category image
        `organization_ids` | array |  optional  | 
    
<!-- END_2335abbed7f782ea7d7dd6df9c738d74 -->

<!-- START_549109b98c9f25ebff47fb4dc23423b6 -->
## _update_: update a specific category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/categories/5bb25243b6312771e92c8693" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"vitae"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/categories/5bb25243b6312771e92c8693"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vitae"
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
    "https://apidev.evius.co/api/categories/5fb6e8d76dbaeb3738258092" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/categories/5fb6e8d76dbaeb3738258092"
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

#Comment


<!-- START_6c560cb463cae69ddba197afa896608b -->
## _store_: create new coment

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"organization_id":"voluptatem","comment":"rerum","image":"sunt"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/comments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "organization_id": "voluptatem",
    "comment": "rerum",
    "image": "sunt"
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
`POST api/comments`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `organization_id` | string |  optional  | 
        `comment` | string |  optional  | 
        `image` | string |  optional  | 
    
<!-- END_6c560cb463cae69ddba197afa896608b -->

<!-- START_2ac6a0d031eca72e1eee4fed61fa203c -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/comments/1"
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
`PUT api/comments/{comment}`


<!-- END_2ac6a0d031eca72e1eee4fed61fa203c -->

<!-- START_482189ec97ee06a20b1ee2c27cbda274 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/comments/1"
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
`DELETE api/comments/{comment}`


<!-- END_482189ec97ee06a20b1ee2c27cbda274 -->

<!-- START_38702aa9c6f225b36ff53e89358992ea -->
## _index_: list comments

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/comments"
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
`GET api/comments`


<!-- END_38702aa9c6f225b36ff53e89358992ea -->

<!-- START_11437bb938648370779cd0883f18af2b -->
## _indexByOrganization_: list comments

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/comments/organizations/quisquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/comments/organizations/quisquam"
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
`GET api/comments/organizations/{organization}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | 

<!-- END_11437bb938648370779cd0883f18af2b -->

#DiscountCode


<!-- START_a5713fe21a364fcdf05d44f3e7a88ade -->
## _index_: list of discount codes by template

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code"
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
        "_id": "5fc81e8631be4a3ca2419dcc",
        "code": "puBdF3zCs",
        "discount_code_template_id": "5fc80b2a31be4a3ca2419dc4",
        "event_id": "5ea23acbd74d5c4b360ddde2",
        "updated_at": "2020-12-04 17:17:07",
        "created_at": "2020-12-02 23:08:54",
        "number_uses": 1
    },
    {
        "_id": "5fc825e431be4a3ca2419ddf",
        "code": "9L54R947",
        "discount_code_template_id": "5fc80b2a31be4a3ca2419dc4",
        "event_id": "5ea23acbd74d5c4b360ddde2",
        "updated_at": "2020-12-03 21:01:20",
        "created_at": "2020-12-02 23:40:20",
        "number_uses": 1
    },
    {
        "_id": "5fcbf67721bfcb1393450fc3",
        "code": "Nyd0jOpQ",
        "discount_code_template_id": "5fc80b2a31be4a3ca2419dc4",
        "event_id": "5ea23acbd74d5c4b360ddde2",
        "updated_at": "2020-12-05 21:07:03",
        "created_at": "2020-12-05 21:07:03"
    }
]
```

### HTTP Request
`GET api/discountcodetemplate/{template_id}/code`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `template_id` |  required  | 

<!-- END_a5713fe21a364fcdf05d44f3e7a88ade -->

<!-- START_394b534eecfed6413b7c504a6c534400 -->
## _store_: ceate new discount code

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quantity":2}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "quantity": 2
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "_id": "5fcbf67721bfcb1393450fc3",
            "code": "Nyd0jOpQ",
            "discount_code_template_id": "5fc80b2a31be4a3ca2419dc4",
            "event_id": "5ea23acbd74d5c4b360ddde2",
            "updated_at": "2020-12-05 21:07:03",
            "created_at": "2020-12-05 21:07:03",
            "discount_code_template": {
                "_id": "5fc80b2a31be4a3ca2419dc4",
                "name": "Código de regalo",
                "discount": 100,
                "event_id": "5ea23acbd74d5c4b360ddde2",
                "use_limit": 1,
                "updated_at": "2020-12-02 21:46:18",
                "created_at": "2020-12-02 21:46:18",
                "event": {
                    "_id": "5ea23acbd74d5c4b360ddde2",
                    "name": "Evento virtual Idartes",
                    "datetime_from": "2020-10-14 12:00:00",
                    "datetime_to": "2020-10-14 12:00:00",
                    "venue": "Teatro Municipal Jorge Eliécer Gaitán"
                }
            }
        },
        {
            "_id": "5fcbf67721bfcb1393450fc4",
            "code": "Nyd0jOpR",
            "discount_code_template_id": "5fc80b2a31be4a3ca2419dc4",
            "event_id": "5ea23acbd74d5c4b360ddde2",
            "updated_at": "2020-12-05 21:07:03",
            "created_at": "2020-12-05 21:07:03",
            "discount_code_template": {
                "_id": "5fc80b2a31be4a3ca2419dc4",
                "name": "Código de regalo",
                "discount": 100,
                "event_id": "5ea23acbd74d5c4b360ddde2",
                "use_limit": 1,
                "updated_at": "2020-12-02 21:46:18",
                "created_at": "2020-12-02 21:46:18",
                "event": {
                    "_id": "5ea23acbd74d5c4b360ddde2",
                    "name": "Evento virtual Idartes",
                    "datetime_from": "2020-10-14 12:00:00",
                    "datetime_to": "2020-10-14 12:00:00",
                    "venue": "Teatro Municipal Jorge Eliécer Gaitán"
                }
            }
        }
    ]
}
```

### HTTP Request
`POST api/discountcodetemplate/{template_id}/code`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `template_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `quantity` | number |  required  | number of codes to be generated
    
<!-- END_394b534eecfed6413b7c504a6c534400 -->

<!-- START_eb134ba8cfdce8e85314aba306ea51bb -->
## _show_: view information for a specific code

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code/5fcbf67721bfcb1393450fc3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code/5fcbf67721bfcb1393450fc3"
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
    "_id": "5fcbf67721bfcb1393450fc3",
    "code": "Nyd0jOpQ",
    "discount_code_template_id": "5fc80b2a31be4a3ca2419dc4",
    "event_id": "5ea23acbd74d5c4b360ddde2",
    "updated_at": "2020-12-05 21:07:03",
    "created_at": "2020-12-05 21:07:03",
    "discount_code_template": {
        "_id": "5fc80b2a31be4a3ca2419dc4",
        "name": "Código de regalo",
        "discount": 100,
        "event_id": "5ea23acbd74d5c4b360ddde2",
        "use_limit": 1,
        "updated_at": "2020-12-02 21:46:18",
        "created_at": "2020-12-02 21:46:18",
        "event": {
            "_id": "5ea23acbd74d5c4b360ddde2",
            "name": "Evento virtual Idartes",
            "datetime_from": "2020-10-14 12:00:00",
            "datetime_to": "2020-10-14 12:00:00",
            "venue": "Teatro Municipal Jorge Eliécer Gaitán"
        }
    }
}
```

### HTTP Request
`GET api/discountcodetemplate/{template_id}/code/{code}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `template_id` |  required  | discount code template with which the code is associated
    `code` |  required  | code to be consulted

<!-- END_eb134ba8cfdce8e85314aba306ea51bb -->

<!-- START_6f3ac1b580ce7ebafdb3f4ade4b97210 -->
## _update_: update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/discountcodetemplate/1/code/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/1/code/1"
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
`PUT api/discountcodetemplate/{template_id}/code/{code}`

`PATCH api/discountcodetemplate/{template_id}/code/{code}`


<!-- END_6f3ac1b580ce7ebafdb3f4ade4b97210 -->

<!-- START_4baba7f610cfbce5ab10b0f75e032949 -->
## _destroy_: Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/discountcodetemplate/libero/code/dignissimos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/libero/code/dignissimos"
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
`DELETE api/discountcodetemplate/{template_id}/code/{code}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `template_id` |  required  | 
    `code` |  required  | id code delete

<!-- END_4baba7f610cfbce5ab10b0f75e032949 -->

<!-- START_ad024d13f8fadcba8151ef67354c7676 -->
## _validateCode_ : valid if the code is redeemed, exists or is valid.

To verify the code you must send code and event_id or organization_id as the case may be

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/code/validatecode" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"Nyd0jOpQ","event_id":"5ea23acbd74d5c4b360ddde2","organization_id":"et"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/code/validatecode"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "Nyd0jOpQ",
    "event_id": "5ea23acbd74d5c4b360ddde2",
    "organization_id": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "message": "El código ya se uso"
}
```
> Example response (404):

```json
{
    "message": "El código no existe"
}
```
> Example response (200):

```json
{
    "_id": "5fcbf67721bfcb1393450fc3",
    "code": "Nyd0jOpQ",
    "discount_code_template_id": "5fc80b2a31be4a3ca2419dc4",
    "event_id": "5ea23acbd74d5c4b360ddde2",
    "updated_at": "2020-12-05 21:07:03",
    "created_at": "2020-12-05 21:07:03",
    "discount_code_template": {
        "_id": "5fc80b2a31be4a3ca2419dc4",
        "name": "Código de regalo",
        "discount": 100,
        "event_id": "5ea23acbd74d5c4b360ddde2",
        "use_limit": 1,
        "updated_at": "2020-12-02 21:46:18",
        "created_at": "2020-12-02 21:46:18",
        "event": {
            "_id": "5ea23acbd74d5c4b360ddde2",
            "name": "Evento virtual Idartes",
            "datetime_from": "2020-10-14 12:00:00",
            "datetime_to": "2020-10-14 12:00:00",
            "venue": "Teatro Municipal Jorge Eliécer Gaitán"
        }
    }
}
```

### HTTP Request
`POST api/code/validatecode`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `code` | string |  required  | code to redeem
        `event_id` | string |  optional  | event for which the code was purchased
        `organization_id` | string |  optional  | organization so that the code applies to any event Example:
    
<!-- END_ad024d13f8fadcba8151ef67354c7676 -->

<!-- START_690924bea4cfcc7fd61b529afac550ce -->
## _redeemPointCode_: end point that redeems the points code and adds them to the user who redeemed it.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/code/redeem_point_code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"quo"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/code/redeem_point_code"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "quo"
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
`PUT api/code/redeem_point_code`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `code` | string |  required  | code that the user is redeeming
    
<!-- END_690924bea4cfcc7fd61b529afac550ce -->

<!-- START_3f8e8d01c9b0e0cc305d38edd56f26a1 -->
## _codesByUser_: list all codes by user

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/code/codesByUser?organization=aperiam&email=molestiae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/code/codesByUser"
);

let params = {
    "organization": "aperiam",
    "email": "molestiae",
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/code/codesByUser`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `organization` |  required  | organization_id
    `email` |  required  | user email

<!-- END_3f8e8d01c9b0e0cc305d38edd56f26a1 -->

#DiscountCodeTemplate


The discount template is used to generate the discount codes, along with their percentage and the limit of uses for each code.
<!-- START_201aa1c9edd47d2be21f4e3fc581bd0d -->
## _index_: list all Discount Code Templates

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/discountcodetemplate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate"
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
        "_id": "5fcee46a27b131731965ba7f",
        "name": "90%",
        "discount": "90",
        "use_limit": "1",
        "event_id": "5fc9bd9a6f78fc22da463509",
        "updated_at": "2021-01-11 23:01:07",
        "created_at": "2020-12-08 02:26:50",
        "discount_type": "percentage",
        "event": {
            "_id": "5fc9bd9a6f78fc22da463509",
            "datetime_from": "2021-02-22 00:00:00",
            "datetime_to": "2021-02-25 00:00:00",
            "description": "La música y la imagen como conceptos que van de la mano.  La escritura de ideas e historia , a través de la música y la imagen. Storytelling, Transmedia y captación de audiencias para proyectos musicales y artísticos.",
            "name": "Expresión Gráfica para proyectos musicales",
            "picture": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/ucronio-dev%2F05_ExpresionGrafica.jpg?alt=media&token=c4bfa160-01b6-442c-8c88-2cfd57ec5942",
            "visibility": "PUBLIC"
        }
    },
    {
        "_id": "5fd4f51720b4fa0f2b4437d5",
        "name": "Curso de regalo",
        "use_limit": 1,
        "discount": 100,
        "event_id": "5ea6df83cf57da4a52065562",
        "discount_type": "price",
        "updated_at": "2020-12-12 16:51:35",
        "created_at": "2020-12-12 16:51:35",
        "event": {
            "_id": "5ea6df83cf57da4a52065562",
            "name": "Test Event",
            "datetime_from": "2020-06-01 08:00:00",
            "datetime_to": "2020-06-06 22:00:00",
            "picture": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/ysn7fDSU0avqNqcn2f53uoPtShKiix1tG7XkJDFw.png",
            "venue": "Mocion"
        }
    }
]
```

### HTTP Request
`GET api/discountcodetemplate`


<!-- END_201aa1c9edd47d2be21f4e3fc581bd0d -->

<!-- START_5fa6dfe88397f13379d24b5901980587 -->
## _store_:create new discount code template

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/discountcodetemplate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Curso de regalo","use_limit":1,"discount":100,"event_id":"5ea23acbd74d5c4b360ddde2","organization_id":"5e9caaa1d74d5c2f6a02a3c3","discount_type":"qui"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Curso de regalo",
    "use_limit": 1,
    "discount": 100,
    "event_id": "5ea23acbd74d5c4b360ddde2",
    "organization_id": "5e9caaa1d74d5c2f6a02a3c3",
    "discount_type": "qui"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "_id": "5fc80b2a31be4a3ca2419dc4",
        "name": "Código de regalo",
        "discount": 100,
        "event_id": "5ea23acbd74d5c4b360ddde2",
        "use_limit": 1,
        "updated_at": "2020-12-02 21:46:18",
        "created_at": "2020-12-02 21:46:18"
    },
    {
        "_id": "5fc93d5eccba7b16a74bd538",
        "name": "Acceso",
        "discount": 100,
        "event_id": "5ea23acbd74d5c4b360ddde2",
        "use_limit": 1,
        "updated_at": "2020-12-03 19:32:46",
        "created_at": "2020-12-03 19:32:46"
    },
    {
        "_id": "5fc97a186b7e7f2ff822bc92",
        "name": "Acceso1",
        "discount": "20",
        "use_limit": "10",
        "event_id": "5fba0649f2d08642eb750ba0",
        "updated_at": "2020-12-03 23:51:52",
        "created_at": "2020-12-03 23:51:52"
    }
]
```

### HTTP Request
`POST api/discountcodetemplate`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 
        `use_limit` | number |  required  | the number of uses for each code
        `discount` | number |  required  | price to be discounted or percentage discount
        `event_id` | string |  optional  | event with which the template will be associated
        `organization_id` | string |  optional  | organization_id if you want the discount template to be applicable to any course
        `discount_type` | string |  required  | percentage or price
    
<!-- END_5fa6dfe88397f13379d24b5901980587 -->

<!-- START_27da3fb1931735a783b6af918eeb8072 -->
## _show_ : information from a specific template

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/discountcodetemplate/5fcee46a27b131731965ba7f" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/5fcee46a27b131731965ba7f"
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
    "_id": "5fcee46a27b131731965ba7f",
    "name": "90%",
    "discount": "90",
    "use_limit": "1",
    "event_id": "5fc9bd9a6f78fc22da463509",
    "updated_at": "2021-01-11 23:01:07",
    "created_at": "2020-12-08 02:26:50",
    "discount_type": "percentage",
    "event": {
        "_id": "5fc9bd9a6f78fc22da463509",
        "datetime_from": "2021-02-22 00:00:00",
        "datetime_to": "2021-02-25 00:00:00",
        "description": "La música y la imagen como conceptos que van de la mano.  La escritura de ideas e historia , a través de la música y la imagen. Storytelling, Transmedia y captación de audiencias para proyectos musicales y artísticos.",
        "name": "Expresión Gráfica para proyectos musicales",
        "picture": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/ucronio-dev%2F05_ExpresionGrafica.jpg?alt=media&token=c4bfa160-01b6-442c-8c88-2cfd57ec5942",
        "visibility": "PUBLIC"
    }
}
```

### HTTP Request
`GET api/discountcodetemplate/{discountcodetemplate}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `discountcodetemplate` |  optional  | id

<!-- END_27da3fb1931735a783b6af918eeb8072 -->

<!-- START_9ec4381af827ff532415a8fe08101924 -->
## _update_: update information from a specific template

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/discountcodetemplate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Curso de regalo","use_limit":1,"discount":100}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Curso de regalo",
    "use_limit": 1,
    "discount": 100
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
`PUT api/discountcodetemplate/{discountcodetemplate}`

`PATCH api/discountcodetemplate/{discountcodetemplate}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | 
        `use_limit` | number |  optional  | the number of uses for each code
        `discount` | number |  optional  | discount percentage
    
<!-- END_9ec4381af827ff532415a8fe08101924 -->

<!-- START_ed37ebe6fa3939018ea0dcd848cbb868 -->
## _destroy_: delete the specified docunt code template

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/discountcodetemplate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/1"
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


> Example response (400):

```json
{
    "message": "El grupo no se puede eliminar si está asociado a un código de descuento"
}
```
> Example response (200):

```json
1
```

### HTTP Request
`DELETE api/discountcodetemplate/{discountcodetemplate}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | discount template id

<!-- END_ed37ebe6fa3939018ea0dcd848cbb868 -->

<!-- START_76981da19869ccb88996013c80fe9c56 -->
## _importCodes_ : Imports DiscountCodes in JSON format, in case this codes are generated in external platform
and needed to be used inside EVIUS

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/discountcodetemplate/1/importCodes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"":{"json":"{\"codes\":[{\"code\":\"160792352\"},{\"code\":\"204692331\"}]}"}}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/1/importCodes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "": {
        "json": "{\"codes\":[{\"code\":\"160792352\"},{\"code\":\"204692331\"}]}"
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
`POST api/discountcodetemplate/{id}/importCodes`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `[json` | object] |  optional  | 
    
<!-- END_76981da19869ccb88996013c80fe9c56 -->

<!-- START_b8b03f80174c3b76c3ba70419cbfeb09 -->
## _findByOrganization_: find disount code template by organization

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/discountcodetemplate/findByOrganization/5e9caaa1d74d5c2f6a02a3c3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/discountcodetemplate/findByOrganization/5e9caaa1d74d5c2f6a02a3c3"
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
        "_id": "5fcfb83c0b46a571c2743c94",
        "name": "Template test",
        "use_limit": 1,
        "discount": 90,
        "organization_id": "5e9caaa1d74d5c2f6a02a3c3",
        "updated_at": "2020-12-08 17:30:36",
        "created_at": "2020-12-08 17:30:36",
        "event": null,
        "organization": {
            "_id": "5e9caaa1d74d5c2f6a02a3c3",
            "tax_name": "Tax Name",
            "tax_value": "Tax Rate",
            "tax_id": "Tax ID",
            "author": "5e9caaa1d74d5c2f6a02a3c2",
            "name": "eviusCo",
            "updated_at": "2021-10-27 13:44:56",
            "created_at": "2021-10-20 02:22:38",
            "banner_image_email": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/AyzpPPMDQTSPWRxGc71I6ymjh742GaRuNgXx3KTf.gif",
            "description": "Nueva descripción",
            "styles": {
                "brandPrimary": "#FFFFFF",
                "brandSuccess": "#FFFFFF",
                "brandInfo": "#FFFFFF",
                "brandDanger": "#FFFFFF",
                "containerBgColor": "#0b333e",
                "brandWarning": "#FFFFFF",
                "toolbarDefaultBg": "#f8e71c",
                "brandDark": "#FFFFFF",
                "brandLight": "#FFFFFF",
                "textMenu": "#9b9b9b",
                "toolbarMenuSocial": "#50e3c2",
                "activeText": "#FFFFFF",
                "bgButtonsEvent": "#9b9b9b",
                "color_icon_socialzone": "#000000",
                "color_tab_agenda": "#000000",
                "event_image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/bVbhvWil5MLAXDWLk5pCEZpMDZ1mxSczA5uBk4uH.jpg",
                "banner_image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/7VlNZs6c3GDBkOVv0de8KiXyRRKjyQcfQLsLfZ45.jpg",
                "banner_image_email": null,
                "menu_image": null,
                "BackgroundImage": null,
                "FooterImage": null,
                "banner_footer": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/3QKW6u6zkU8iOzOBrzCYwyJPvdHouBs6pqMyVHNG.jpg",
                "mobile_banner": null,
                "banner_footer_email": null,
                "show_banner": false,
                "show_title": false,
                "show_video_widget": false,
                "show_card_banner": true,
                "show_inscription": false,
                "hideDatesAgenda": false,
                "hideBtnDetailAgenda": true,
                "loader_page": "no",
                "data_loader_page": null,
                "hideDatesAgendaItem": false,
                "hideHoursAgenda": false
            },
            "footer_image_email": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/wElkkpWTf6ijB3RPQ0gZmTLbvnI8yfirfzWi2Glv.jpg",
            "user_properties": [
                {
                    "name": "email",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "email",
                    "description": null,
                    "type": "email",
                    "justonebyattendee": false,
                    "updated_at": "2021-10-14 20:29:56",
                    "created_at": "2021-10-14 20:29:56",
                    "_id": {
                        "$oid": "617957d8e6c9ca20af2eeee1"
                    },
                    "index": 0,
                    "order_weight": 1
                },
                {
                    "name": "names",
                    "label": "Nombres.",
                    "unique": false,
                    "mandatory": true,
                    "type": "text",
                    "updated_at": "2021-10-14 20:29:56",
                    "created_at": "2020-04-24 01:03:08",
                    "_id": {
                        "$oid": "617957d8e6c9ca20af2eeee2"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": [],
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "index": 1,
                    "order_weight": 2
                },
                {
                    "name": "prueba",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "prueba",
                    "description": null,
                    "type": "text",
                    "justonebyattendee": false,
                    "updated_at": "2021-10-12 22:13:20",
                    "created_at": "2021-10-12 22:12:59",
                    "_id": {
                        "$oid": "617957d8e6c9ca20af2eeee3"
                    },
                    "sensibility": true,
                    "index": 2,
                    "order_weight": 3
                }
            ],
            "template_properties": [
                {
                    "name": "Template pruebas",
                    "user_properties": [
                        {
                            "name": "names",
                            "label": "Nombres",
                            "unique": false,
                            "mandatory": true,
                            "type": "text",
                            "_id": "614260d226e7862220497eab",
                            "author": null,
                            "categories": [],
                            "currency": {
                                "_id": "5c23936fe37db02c715b2a02",
                                "id": 1,
                                "title": "U.S. Dollar",
                                "symbol_left": "$",
                                "symbol_right": null,
                                "code": "USD",
                                "decimal_place": 2,
                                "value": 1,
                                "decimal_point": ".",
                                "thousand_point": ",",
                                "status": 1
                            },
                            "event_type": null,
                            "organiser": null,
                            "organizer": null,
                            "tickets": [],
                            "visibleByContacts": "public",
                            "visibleByAdmin": false,
                            "index": 0,
                            "order_weight": 1
                        },
                        {
                            "name": "email",
                            "label": "Correo",
                            "unique": false,
                            "mandatory": true,
                            "type": "email",
                            "_id": "614260d226e7862220497eac",
                            "author": null,
                            "categories": [],
                            "currency": {
                                "_id": "5c23936fe37db02c715b2a02",
                                "id": 1,
                                "title": "U.S. Dollar",
                                "symbol_left": "$",
                                "symbol_right": null,
                                "code": "USD",
                                "decimal_place": 2,
                                "value": 1,
                                "decimal_point": ".",
                                "thousand_point": ",",
                                "status": 1
                            },
                            "event_type": null,
                            "organiser": null,
                            "organizer": null,
                            "tickets": [],
                            "visibleByContacts": "public",
                            "visibleByAdmin": false,
                            "index": 1,
                            "order_weight": 2
                        },
                        {
                            "name": "contrasena",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "Contraseña",
                            "description": null,
                            "type": "password",
                            "justonebyattendee": false,
                            "order_weight": 3,
                            "_id": "614260d226e7862220497ead",
                            "author": null,
                            "categories": [],
                            "event_type": null,
                            "organiser": null,
                            "organizer": null,
                            "currency": {
                                "_id": "5c23936fe37db02c715b2a02",
                                "id": 1,
                                "title": "U.S. Dollar",
                                "symbol_left": "$",
                                "symbol_right": null,
                                "code": "USD",
                                "decimal_place": 2,
                                "value": 1,
                                "decimal_point": ".",
                                "thousand_point": ",",
                                "status": 1
                            },
                            "tickets": [],
                            "index": 2,
                            "sensibility": true
                        },
                        {
                            "name": "campoprueba",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campo prueba",
                            "description": null,
                            "type": "email",
                            "justonebyattendee": false,
                            "_id": "6165c586137aca6ac3319a24",
                            "index": 3,
                            "order_weight": 4
                        },
                        {
                            "name": "camponuevo",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campo nuevo",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false,
                            "_id": "6165c514137aca6ac3319a23",
                            "index": 4,
                            "order_weight": 5
                        },
                        {
                            "name": "pruebassss",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "pruebassss",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "avatar",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "Avatar",
                            "description": null,
                            "type": "avatar",
                            "justonebyattendee": false
                        },
                        {
                            "name": "campoprueba",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campoprueba",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "campotexto",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campotexto",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "camponew",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campoNew",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "camporefresh",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "camporefresh",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "campofresh",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campofresh",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        }
                    ],
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1634235514228"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1634076384407"
                        }
                    },
                    "_id": {
                        "$oid": "616606e0a4eebe0c714bc8e2"
                    }
                },
                {
                    "name": "nuevo template",
                    "user_properties": [
                        {
                            "name": "email",
                            "label": "Correo",
                            "unique": false,
                            "mandatory": false,
                            "justonebyattendee": false,
                            "type": "email",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false,
                            "index": 0,
                            "order_weight": 1
                        },
                        {
                            "name": "datopruebanomandatory",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "datopruebanomandatory",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false,
                            "index": 1,
                            "order_weight": 2
                        },
                        {
                            "name": "nombreprueba",
                            "label": "NombrePrueba",
                            "unique": false,
                            "mandatory": true,
                            "justonebyattendee": false,
                            "type": "text",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false,
                            "index": 2,
                            "order_weight": 3
                        },
                        {
                            "name": "datoplantilla",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "datoPlantilla",
                            "description": null,
                            "type": "city",
                            "justonebyattendee": false,
                            "index": 3,
                            "order_weight": 4
                        },
                        {
                            "name": "otrodatoplantilla",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "otrodatoplantilla",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false,
                            "index": 4,
                            "order_weight": 5
                        },
                        {
                            "name": "datoprueba",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "datoPrueba",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false,
                            "index": 5,
                            "order_weight": 6
                        },
                        {
                            "label": "campoMultiple",
                            "name": "campomultiple",
                            "type": "multiplelist",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "order_weight": 7,
                            "options": [
                                {
                                    "label": "opcion1",
                                    "value": "opcion1"
                                },
                                {
                                    "label": "opcion2",
                                    "value": "opcion2"
                                }
                            ],
                            "index": 6
                        }
                    ],
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1635280353161"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1634162080756"
                        }
                    },
                    "_id": {
                        "$oid": "616755a0c625ee3ac80f5f02"
                    }
                },
                {
                    "name": "Nueva Plantilla Cypress",
                    "user_properties": [
                        {
                            "name": "email",
                            "label": "Correo",
                            "unique": false,
                            "mandatory": false,
                            "justonebyattendee": false,
                            "type": "email",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false
                        },
                        {
                            "name": "names",
                            "label": "Nombres Y Apellidos",
                            "unique": false,
                            "mandatory": false,
                            "justonebyattendee": false,
                            "type": "text",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false
                        },
                        {
                            "name": "picture",
                            "label": "Avatar",
                            "unique": false,
                            "mandatory": false,
                            "justonebyattendee": false,
                            "type": "avatar",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false
                        }
                    ],
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1635290375580"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1635290375580"
                        }
                    },
                    "_id": {
                        "$oid": "61788d079df94e523803e4f5"
                    }
                }
            ],
            "itemsMenu": {
                "agenda": {
                    "name": "Agenda",
                    "position": 5,
                    "section": "agenda",
                    "icon": "ReadOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "tickets": {
                    "name": "Register",
                    "position": 6,
                    "section": "tickets",
                    "icon": "CreditCardOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "speakers": {
                    "name": "Seccion3",
                    "position": 7,
                    "section": "speakers",
                    "icon": "AudioOutlined",
                    "checked": true,
                    "permissions": "assistants"
                }
            },
            "type_event": "Corporativo"
        }
    },
    {
        "_id": "5fcfc7510991c63a2c673c74",
        "name": "Curso de regalo",
        "use_limit": 1,
        "discount": 100,
        "organization_id": "5e9caaa1d74d5c2f6a02a3c3",
        "updated_at": "2020-12-08 18:34:57",
        "created_at": "2020-12-08 18:34:57",
        "event": null,
        "organization": {
            "_id": "5e9caaa1d74d5c2f6a02a3c3",
            "tax_name": "Tax Name",
            "tax_value": "Tax Rate",
            "tax_id": "Tax ID",
            "author": "5e9caaa1d74d5c2f6a02a3c2",
            "name": "eviusCo",
            "updated_at": "2021-10-27 13:44:56",
            "created_at": "2021-10-20 02:22:38",
            "banner_image_email": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/AyzpPPMDQTSPWRxGc71I6ymjh742GaRuNgXx3KTf.gif",
            "description": "Nueva descripción",
            "styles": {
                "brandPrimary": "#FFFFFF",
                "brandSuccess": "#FFFFFF",
                "brandInfo": "#FFFFFF",
                "brandDanger": "#FFFFFF",
                "containerBgColor": "#0b333e",
                "brandWarning": "#FFFFFF",
                "toolbarDefaultBg": "#f8e71c",
                "brandDark": "#FFFFFF",
                "brandLight": "#FFFFFF",
                "textMenu": "#9b9b9b",
                "toolbarMenuSocial": "#50e3c2",
                "activeText": "#FFFFFF",
                "bgButtonsEvent": "#9b9b9b",
                "color_icon_socialzone": "#000000",
                "color_tab_agenda": "#000000",
                "event_image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/bVbhvWil5MLAXDWLk5pCEZpMDZ1mxSczA5uBk4uH.jpg",
                "banner_image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/7VlNZs6c3GDBkOVv0de8KiXyRRKjyQcfQLsLfZ45.jpg",
                "banner_image_email": null,
                "menu_image": null,
                "BackgroundImage": null,
                "FooterImage": null,
                "banner_footer": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/3QKW6u6zkU8iOzOBrzCYwyJPvdHouBs6pqMyVHNG.jpg",
                "mobile_banner": null,
                "banner_footer_email": null,
                "show_banner": false,
                "show_title": false,
                "show_video_widget": false,
                "show_card_banner": true,
                "show_inscription": false,
                "hideDatesAgenda": false,
                "hideBtnDetailAgenda": true,
                "loader_page": "no",
                "data_loader_page": null,
                "hideDatesAgendaItem": false,
                "hideHoursAgenda": false
            },
            "footer_image_email": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/wElkkpWTf6ijB3RPQ0gZmTLbvnI8yfirfzWi2Glv.jpg",
            "user_properties": [
                {
                    "name": "email",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "email",
                    "description": null,
                    "type": "email",
                    "justonebyattendee": false,
                    "updated_at": "2021-10-14 20:29:56",
                    "created_at": "2021-10-14 20:29:56",
                    "_id": {
                        "$oid": "617957d8e6c9ca20af2eeee1"
                    },
                    "index": 0,
                    "order_weight": 1
                },
                {
                    "name": "names",
                    "label": "Nombres.",
                    "unique": false,
                    "mandatory": true,
                    "type": "text",
                    "updated_at": "2021-10-14 20:29:56",
                    "created_at": "2020-04-24 01:03:08",
                    "_id": {
                        "$oid": "617957d8e6c9ca20af2eeee2"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": [],
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "index": 1,
                    "order_weight": 2
                },
                {
                    "name": "prueba",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "prueba",
                    "description": null,
                    "type": "text",
                    "justonebyattendee": false,
                    "updated_at": "2021-10-12 22:13:20",
                    "created_at": "2021-10-12 22:12:59",
                    "_id": {
                        "$oid": "617957d8e6c9ca20af2eeee3"
                    },
                    "sensibility": true,
                    "index": 2,
                    "order_weight": 3
                }
            ],
            "template_properties": [
                {
                    "name": "Template pruebas",
                    "user_properties": [
                        {
                            "name": "names",
                            "label": "Nombres",
                            "unique": false,
                            "mandatory": true,
                            "type": "text",
                            "_id": "614260d226e7862220497eab",
                            "author": null,
                            "categories": [],
                            "currency": {
                                "_id": "5c23936fe37db02c715b2a02",
                                "id": 1,
                                "title": "U.S. Dollar",
                                "symbol_left": "$",
                                "symbol_right": null,
                                "code": "USD",
                                "decimal_place": 2,
                                "value": 1,
                                "decimal_point": ".",
                                "thousand_point": ",",
                                "status": 1
                            },
                            "event_type": null,
                            "organiser": null,
                            "organizer": null,
                            "tickets": [],
                            "visibleByContacts": "public",
                            "visibleByAdmin": false,
                            "index": 0,
                            "order_weight": 1
                        },
                        {
                            "name": "email",
                            "label": "Correo",
                            "unique": false,
                            "mandatory": true,
                            "type": "email",
                            "_id": "614260d226e7862220497eac",
                            "author": null,
                            "categories": [],
                            "currency": {
                                "_id": "5c23936fe37db02c715b2a02",
                                "id": 1,
                                "title": "U.S. Dollar",
                                "symbol_left": "$",
                                "symbol_right": null,
                                "code": "USD",
                                "decimal_place": 2,
                                "value": 1,
                                "decimal_point": ".",
                                "thousand_point": ",",
                                "status": 1
                            },
                            "event_type": null,
                            "organiser": null,
                            "organizer": null,
                            "tickets": [],
                            "visibleByContacts": "public",
                            "visibleByAdmin": false,
                            "index": 1,
                            "order_weight": 2
                        },
                        {
                            "name": "contrasena",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "Contraseña",
                            "description": null,
                            "type": "password",
                            "justonebyattendee": false,
                            "order_weight": 3,
                            "_id": "614260d226e7862220497ead",
                            "author": null,
                            "categories": [],
                            "event_type": null,
                            "organiser": null,
                            "organizer": null,
                            "currency": {
                                "_id": "5c23936fe37db02c715b2a02",
                                "id": 1,
                                "title": "U.S. Dollar",
                                "symbol_left": "$",
                                "symbol_right": null,
                                "code": "USD",
                                "decimal_place": 2,
                                "value": 1,
                                "decimal_point": ".",
                                "thousand_point": ",",
                                "status": 1
                            },
                            "tickets": [],
                            "index": 2,
                            "sensibility": true
                        },
                        {
                            "name": "campoprueba",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campo prueba",
                            "description": null,
                            "type": "email",
                            "justonebyattendee": false,
                            "_id": "6165c586137aca6ac3319a24",
                            "index": 3,
                            "order_weight": 4
                        },
                        {
                            "name": "camponuevo",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campo nuevo",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false,
                            "_id": "6165c514137aca6ac3319a23",
                            "index": 4,
                            "order_weight": 5
                        },
                        {
                            "name": "pruebassss",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "pruebassss",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "avatar",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "Avatar",
                            "description": null,
                            "type": "avatar",
                            "justonebyattendee": false
                        },
                        {
                            "name": "campoprueba",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campoprueba",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "campotexto",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campotexto",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "camponew",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campoNew",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "camporefresh",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "camporefresh",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        },
                        {
                            "name": "campofresh",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "campofresh",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false
                        }
                    ],
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1634235514228"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1634076384407"
                        }
                    },
                    "_id": {
                        "$oid": "616606e0a4eebe0c714bc8e2"
                    }
                },
                {
                    "name": "nuevo template",
                    "user_properties": [
                        {
                            "name": "email",
                            "label": "Correo",
                            "unique": false,
                            "mandatory": false,
                            "justonebyattendee": false,
                            "type": "email",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false,
                            "index": 0,
                            "order_weight": 1
                        },
                        {
                            "name": "datopruebanomandatory",
                            "mandatory": false,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "datopruebanomandatory",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false,
                            "index": 1,
                            "order_weight": 2
                        },
                        {
                            "name": "nombreprueba",
                            "label": "NombrePrueba",
                            "unique": false,
                            "mandatory": true,
                            "justonebyattendee": false,
                            "type": "text",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false,
                            "index": 2,
                            "order_weight": 3
                        },
                        {
                            "name": "datoplantilla",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "datoPlantilla",
                            "description": null,
                            "type": "city",
                            "justonebyattendee": false,
                            "index": 3,
                            "order_weight": 4
                        },
                        {
                            "name": "otrodatoplantilla",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "otrodatoplantilla",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false,
                            "index": 4,
                            "order_weight": 5
                        },
                        {
                            "name": "datoprueba",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "visibleByAdmin": false,
                            "label": "datoPrueba",
                            "description": null,
                            "type": "text",
                            "justonebyattendee": false,
                            "index": 5,
                            "order_weight": 6
                        },
                        {
                            "label": "campoMultiple",
                            "name": "campomultiple",
                            "type": "multiplelist",
                            "mandatory": true,
                            "visibleByContacts": false,
                            "order_weight": 7,
                            "options": [
                                {
                                    "label": "opcion1",
                                    "value": "opcion1"
                                },
                                {
                                    "label": "opcion2",
                                    "value": "opcion2"
                                }
                            ],
                            "index": 6
                        }
                    ],
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1635280353161"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1634162080756"
                        }
                    },
                    "_id": {
                        "$oid": "616755a0c625ee3ac80f5f02"
                    }
                },
                {
                    "name": "Nueva Plantilla Cypress",
                    "user_properties": [
                        {
                            "name": "email",
                            "label": "Correo",
                            "unique": false,
                            "mandatory": false,
                            "justonebyattendee": false,
                            "type": "email",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false
                        },
                        {
                            "name": "names",
                            "label": "Nombres Y Apellidos",
                            "unique": false,
                            "mandatory": false,
                            "justonebyattendee": false,
                            "type": "text",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false
                        },
                        {
                            "name": "picture",
                            "label": "Avatar",
                            "unique": false,
                            "mandatory": false,
                            "justonebyattendee": false,
                            "type": "avatar",
                            "description": "avatar del user",
                            "visibleByAdmin": false,
                            "visibleByContacts": false
                        }
                    ],
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1635290375580"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1635290375580"
                        }
                    },
                    "_id": {
                        "$oid": "61788d079df94e523803e4f5"
                    }
                }
            ],
            "itemsMenu": {
                "agenda": {
                    "name": "Agenda",
                    "position": 5,
                    "section": "agenda",
                    "icon": "ReadOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "tickets": {
                    "name": "Register",
                    "position": 6,
                    "section": "tickets",
                    "icon": "CreditCardOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "speakers": {
                    "name": "Seccion3",
                    "position": 7,
                    "section": "speakers",
                    "icon": "AudioOutlined",
                    "checked": true,
                    "permissions": "assistants"
                }
            },
            "type_event": "Corporativo"
        }
    }
]
```

### HTTP Request
`GET api/discountcodetemplate/findByOrganization/{organization}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization id

<!-- END_b8b03f80174c3b76c3ba70419cbfeb09 -->

#Document User


This model works to manage the documents to assign to the attendees.
<!-- START_2a6eabd54a9b7747080b93d32e551cc6 -->
## _index_: list all documents to user by event.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/est/documentusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/est/documentusers"
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
null
```

### HTTP Request
`GET api/events/{event}/documentusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event_id

<!-- END_2a6eabd54a9b7747080b93d32e551cc6 -->

<!-- START_821db2d0712d975ae3c831c56512e295 -->
## _show_: Get a document user by id
Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/temporibus/documentusers/incidunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/temporibus/documentusers/incidunt"
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
    "name": "document name",
    "url": "https:\/\/document\/img.png",
    "assign": false,
    "event_id": "602ecc7d52fc536415397962",
    "updated_at": "2021-11-16 18:29:47",
    "created_at": "2021-11-16 18:29:47",
    "_id": "6193f89bb558ed609e6f85c0"
}
```

### HTTP Request
`GET api/events/{event}/documentusers/{documentuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
    `documentuser` |  required  | document user id

<!-- END_821db2d0712d975ae3c831c56512e295 -->

<!-- START_bf08af12b3a51e7d6c89e96b162a953f -->
## _store_: create a new document user in event

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/et/documentusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolores","url":"excepturi","assign":true}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/et/documentusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolores",
    "url": "excepturi",
    "assign": true
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "name": "document name",
    "url": "https:\/\/document\/img.png",
    "assign": false,
    "event_id": "602ecc7d52fc536415397962",
    "updated_at": "2021-11-16 18:29:47",
    "created_at": "2021-11-16 18:29:47",
    "_id": "6193f89bb558ed609e6f85c0"
}
```

### HTTP Request
`POST api/events/{event}/documentusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Document name.
        `url` | string |  required  | Document url.
        `assign` | boolean |  required  | This indicate if the document is assigned to a user.
    
<!-- END_bf08af12b3a51e7d6c89e96b162a953f -->

<!-- START_7a95b32bdae437425a365b1842f435aa -->
## _update_: Update a document user by id
Update the specified resource in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/incidunt/documentusers/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/incidunt/documentusers/et"
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


> Example response (200):

```json
{
    "name": "updated document name",
    "url": "https:\/\/document\/img.png",
    "assign": false,
    "event_id": "602ecc7d52fc536415397962",
    "updated_at": "2021-11-16 18:29:47",
    "created_at": "2021-11-16 18:29:47",
    "_id": "6193f89bb558ed609e6f85c0"
}
```

### HTTP Request
`PUT api/events/{event}/documentusers/{documentuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
    `documentuser` |  required  | document user id

<!-- END_7a95b32bdae437425a365b1842f435aa -->

<!-- START_d4541c3d1709aa360459e62ae6b3ef33 -->
## _destroy_: Delete a document user by id
Remove the specified resource from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/events/quia/documentusers/labore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/quia/documentusers/labore"
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


> Example response (204):

```json
{}
```

### HTTP Request
`DELETE api/events/{event}/documentusers/{documentuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
    `documentuser` |  required  | document user id

<!-- END_d4541c3d1709aa360459e62ae6b3ef33 -->

<!-- START_10e99476f37db4f919ba13cc5d830287 -->
## _documentsUserByEvent_: list the documents of a logged in user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/quibusdam/me/documentusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/quibusdam/me/documentusers"
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
null
```

### HTTP Request
`GET api/events/{event}/me/documentusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id

<!-- END_10e99476f37db4f919ba13cc5d830287 -->

#Event


<!-- START_742a1cbd4a274c7269f0db99a704ff41 -->
## _index:_ Listing of all events

This method allows dynamic querying of any property through the URL using FilterQuery services for example : Exmaple: [{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events?filtered=%5B%7B%22field%22%3A%22name%22%2C%22value%22%3A%5B%22SUBASTA+DE+ARTE%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events"
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
    "https://apidev.evius.co/api/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Programming course","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"quaerat","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category":[],"location":"aut","extra_config":{},"status":"quis"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Programming course",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "quaerat",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category": [],
    "location": "aut",
    "extra_config": {},
    "status": "quis"
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
        `status` | string |  optional  | when a teacher creates a course the automatic status is **'draft**' in case the administrator creates it automatically it will be **'approved'**
    
<!-- END_de3413bf02c9bb71627fa96e1c1c409f -->

<!-- START_379a3beb17bbb91528d80d8507f69655 -->
## _show_: display information about a specific event.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1"
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
    "message": "No query results for model [App\\Event] 1"
}
```

### HTTP Request
`GET api/events/{event}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | id of the event you want to consult

<!-- END_379a3beb17bbb91528d80d8507f69655 -->

<!-- START_d16967fd1d3d935666f7e8112a1a4451 -->
## _update_: update information on a specific event.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\"Programming course\"","description":"et","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"quasi","visibility":"PUBLIC","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","author_id":"5e9caaa1d74d5c2f6a02a3c2","event_type_id":"5bf47203754e2317e4300b68"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/in"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\"Programming course\"",
    "description": "et",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "quasi",
    "visibility": "PUBLIC",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "author_id": "5e9caaa1d74d5c2f6a02a3c2",
    "event_type_id": "5bf47203754e2317e4300b68"
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
`PUT api/events/{event}`

`PATCH api/events/{event}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id of the event to be updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | name to event
        `description` | string |  optional  | description of teh event Example : "Event to study"
        `datetime_from` | datetime |  optional  | date and time of start of the event
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `picture` | string |  optional  | image of the event
        `visibility` | string |  optional  | restricts access for registered users or any unregistered user
        `organizer_id` | string |  optional  | 
        `author_id` | string |  optional  | 
        `event_type_id` | string |  optional  | 
    
<!-- END_d16967fd1d3d935666f7e8112a1a4451 -->

<!-- START_379a30feb2949828b5f95efbfd7649c3 -->
## _destroy_: delete event.

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/events/quis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/quis"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id of the event to be eliminated

<!-- END_379a30feb2949828b5f95efbfd7649c3 -->

<!-- START_aec83efbad5ec636ec1b29352c041932 -->
## _currentUserindex_: list of events of the organizer

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/me/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/me/events"
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
    "https://apidev.evius.co/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Programming course","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"corrupti","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category":[],"location":"et","extra_config":{},"status":"autem"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/user/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Programming course",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "corrupti",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category": [],
    "location": "et",
    "extra_config": {},
    "status": "autem"
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
        `status` | string |  optional  | when a teacher creates a course the automatic status is **'draft**' in case the administrator creates it automatically it will be **'approved'**
    
<!-- END_2478aef777186232e8bca32fdf09efe3 -->

<!-- START_26fd0ed6db820ca28bb674ba1d761a2e -->
## _update_: update information on a specific event.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/user/events/sunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\"Programming course\"","description":"voluptas","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"repudiandae","visibility":"PUBLIC","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","author_id":"5e9caaa1d74d5c2f6a02a3c2","event_type_id":"5bf47203754e2317e4300b68"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/user/events/sunt"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\"Programming course\"",
    "description": "voluptas",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "repudiandae",
    "visibility": "PUBLIC",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "author_id": "5e9caaa1d74d5c2f6a02a3c2",
    "event_type_id": "5bf47203754e2317e4300b68"
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
`PUT api/user/events/{event}`

`PATCH api/user/events/{event}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id of the event to be updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | name to event
        `description` | string |  optional  | description of teh event Example : "Event to study"
        `datetime_from` | datetime |  optional  | date and time of start of the event
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `picture` | string |  optional  | image of the event
        `visibility` | string |  optional  | restricts access for registered users or any unregistered user
        `organizer_id` | string |  optional  | 
        `author_id` | string |  optional  | 
        `event_type_id` | string |  optional  | 
    
<!-- END_26fd0ed6db820ca28bb674ba1d761a2e -->

<!-- START_ed1c02a70ed814c85d464077d0854e00 -->
## _destroy_: delete event.

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/user/events/odio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/user/events/odio"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id of the event to be eliminated

<!-- END_ed1c02a70ed814c85d464077d0854e00 -->

<!-- START_f59d4cbbf9176342893379adb70dc1a5 -->
## _currentUserindex_: list of events of the organizer

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/user/events"
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

<!-- START_738ca5bedb446a3c28429c4257c4a4af -->
## _changeStatusEvent_: approve or reject the courses **&#039;draft&#039;**, and send mail of the change of status of the event to the user who created it

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/beatae/changeStatusEvent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"status":"approved"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/beatae/changeStatusEvent"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "approved"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "_id": "5fb2eef214b93f11165dd1a0",
    "category": "d35319efaf194af191b8dc7c149a01bc",
    "datetime_from": null,
    "datetime_to": null,
    "description": "dddd",
    "name": "curso 1",
    "picture": "https:\/\/picsum.photos\/400\/800",
    "visibility": "PUBLIC",
    "extra_config": {
        "price": "0"
    },
    "author_id": "5fb1f6fb7bf68702e345b5d2",
    "organizer_id": "5f7e33ba3abc2119442e83e8",
    "event_type_id": "5bf47203754e2317e4300b68",
    "status": "approved",
    "updated_at": "2021-01-20 21:07:50",
    "created_at": "2020-11-16 21:28:18"
}
```
> Example response (403):

```json
{
    "Error": "The user does not have the permissions to execute this action"
}
```

### HTTP Request
`PUT api/events/{event_id}/changeStatusEvent`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event to be rejected or approved Example:
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `status` | string |  required  | the status update allows for two possible statuses **approved** or **rejected**
    
<!-- END_738ca5bedb446a3c28429c4257c4a4af -->

<!-- START_7488288e859ba4fe861385339c81371a -->
## _beforeToday:_ list finished events

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/eventsbeforetoday?filtered=%5B%7B%22field%22%3A%22name%22%2C%22value%22%3A%5B%22SUBASTA+DE+ARTE%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/eventsbeforetoday"
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
    "data": [
        {
            "_id": "5f9190c0b1b9640237258654",
            "name": "SUBASTA DE ARTE",
            "datetime_from": "2020-11-18 08:00:00",
            "datetime_to": "2020-11-18 22:00:00",
            "venue": "Virtual",
            "location": [],
            "visibility": "PUBLIC",
            "description": "<p>Aquí estoy otra vez invitándolos para que nos acompañen en la séptima edición de la Subasta a la Rueda Rueda para poderles cumplir los sueños a nuestros niños que solo nos tienen a nosotros para lograrlo, con la pedagogía de ocio creativo que es nuestra herramienta fundamental para ello.<\/p><p><br><\/p><p>No hemos parado a pesar de las dificultades que vinieron con la pandemia. Hemos hecho un gran esfuerzo para ajustarnos a las clases virtuales tanto con los estudiantes como a los padres de familia quienes han manifestado su agradecimiento porque sus niños siguen desarrollándose y aprovechando el tiempo obligado en casa.<\/p>",
            "user_properties": [
                {
                    "name": "participascomo",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Participas como",
                    "description": null,
                    "type": "list",
                    "options": [
                        {
                            "label": "Persona",
                            "value": "Persona"
                        },
                        {
                            "label": "Empresa",
                            "value": "Empresa"
                        }
                    ],
                    "order_weight": "1",
                    "updated_at": "2020-10-28 20:20:20",
                    "created_at": "2020-10-22 19:55:41",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c834"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "informacionparticipanteenrepresentaciondeunapersonajuridicaempresa",
                    "mandatory": false,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "INFORMACIÓN PARTICIPANTE EN REPRESENTACIÓN DE UNA PERSONA JURÍDICA (EMPRESA)",
                    "description": null,
                    "type": "tituloseccion",
                    "order_weight": "2",
                    "updated_at": "2020-10-28 20:20:21",
                    "created_at": "2020-10-23 12:50:16",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c835"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "names",
                    "label": "Nombres y apellidos",
                    "unique": false,
                    "mandatory": true,
                    "type": "text",
                    "updated_at": "2020-10-27 22:36:38",
                    "created_at": "2020-10-22 14:01:36",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c836"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "order_weight": "3",
                    "organiser": null,
                    "organizer": null,
                    "tickets": [],
                    "visibleByAdmin": false,
                    "visibleByContacts": false
                },
                {
                    "name": "tipodedocumento",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Tipo de documento",
                    "description": null,
                    "type": "list",
                    "options": [
                        {
                            "label": "C.C",
                            "value": "C.C"
                        },
                        {
                            "label": "C.E",
                            "value": "C.E"
                        },
                        {
                            "label": "Pasaporte",
                            "value": "Pasaporte"
                        }
                    ],
                    "order_weight": "3",
                    "updated_at": "2020-10-28 20:20:23",
                    "created_at": "2020-10-22 19:59:02",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c837"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "numerodedocumento",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Número de documento",
                    "description": null,
                    "type": "number",
                    "labelPosition": "izquierda",
                    "order_weight": "4",
                    "updated_at": "2020-10-28 20:20:28",
                    "created_at": "2020-10-22 19:59:53",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c838"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "pais",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "País",
                    "description": null,
                    "type": "country",
                    "order_weight": "5",
                    "updated_at": "2020-10-28 20:20:29",
                    "created_at": "2020-10-22 20:22:53",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c839"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "ciudad",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Ciudad",
                    "description": null,
                    "type": "city",
                    "updated_at": "2020-10-28 20:20:29",
                    "created_at": "2020-10-22 20:00:26",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c83a"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "order_weight": "6",
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "direccion",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Dirección",
                    "description": null,
                    "type": "text",
                    "order_weight": "7",
                    "updated_at": "2020-10-28 20:20:32",
                    "created_at": "2020-10-22 20:01:35",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c83b"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "telefonocelular",
                    "mandatory": false,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Teléfonos",
                    "description": null,
                    "type": "tituloseccion",
                    "order_weight": "8",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1604422244000"
                        }
                    },
                    "created_at": "2020-10-22 20:02:27",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c83c"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "telefonos",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Número de contacto",
                    "description": null,
                    "type": "tituloseccion",
                    "order_weight": "8",
                    "updated_at": "2020-10-29 20:37:40",
                    "created_at": "2020-10-23 12:55:33",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c83d"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "celular",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Celular",
                    "description": null,
                    "type": "number",
                    "labelPosition": "izquierda",
                    "order_weight": "9",
                    "updated_at": "2020-10-28 20:20:35",
                    "created_at": "2020-10-22 20:04:55",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c83e"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "residencia",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Teléfono de Residencia",
                    "description": null,
                    "type": "number",
                    "labelPosition": "izquierda",
                    "order_weight": "91",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1604422299000"
                        }
                    },
                    "created_at": "2020-10-22 20:07:36",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c83f"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "oficina",
                    "mandatory": false,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Teléfono de Oficina",
                    "description": null,
                    "type": "number",
                    "labelPosition": "izquierda",
                    "order_weight": "92",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1604422324000"
                        }
                    },
                    "created_at": "2020-10-22 20:08:22",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c840"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "email",
                    "label": "Correo electrónico",
                    "unique": false,
                    "mandatory": true,
                    "type": "email",
                    "updated_at": "2020-10-22 20:20:33",
                    "created_at": "2020-10-22 14:01:36",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c841"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "order_weight": "93",
                    "organiser": null,
                    "organizer": null,
                    "tickets": [],
                    "visibleByAdmin": false,
                    "visibleByContacts": false
                },
                {
                    "name": "razonsocial",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Razón social",
                    "description": null,
                    "type": "text",
                    "order_weight": "96",
                    "updated_at": "2020-10-28 20:37:37",
                    "created_at": "2020-10-23 12:50:58",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c842"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "nombreyapellidosdequiendiligenciaelformato",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Nombre y apellidos de quien diligencia el formato",
                    "description": null,
                    "type": "text",
                    "order_weight": "97",
                    "updated_at": "2020-10-28 20:37:38",
                    "created_at": "2020-10-23 12:51:20",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c843"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "nit",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "NIT",
                    "description": null,
                    "type": "text",
                    "order_weight": "98",
                    "updated_at": "2020-10-28 20:37:40",
                    "created_at": "2020-10-23 12:51:50",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c844"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "cargo",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Cargo",
                    "description": null,
                    "type": "text",
                    "order_weight": "99",
                    "updated_at": "2020-10-28 20:37:44",
                    "created_at": "2020-10-23 12:53:00",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c845"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "elfirmantecertificaquelainformacionproporcionadaenesteformularioesveridicayqueaceptalosterminosylascondicionesdelasubasta",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "El firmante certifica que la información proporcionada en este formulario es verídica y que acepta los términos y las condiciones de la Subasta",
                    "description": "TÉRMINOS Y CONDICIONES\n\nSUBASTA ARTE A LA RUEDA RUEDA 2020 VIRTUAL\n(en adelante la “Subasta”)\nLa Subasta es una actividad de venta pública organizada,\na través de la cual los participantes inscritos (en adelante \nlos “Participantes”) podrán adquirir las obras de arte \nofertadas (en adelante las “Obras”), las cuales serán \nadjudicadas al postor que ofrezca la mayor cantidad \nde dinero. Los presentes términos y condiciones (en \nadelante los “TyC”) contienen una descripción general \nde los alcances, requisitos de participación, inscripción \nde los participantes, las Obras, aspectos de mecánica,\nnotificaciones y demás descritos en la parte general\nde los presentes TyC. Los presentes son TyC bajo los \ncuales se desarrollará y realizará la Subasta. La persona \nque desee participar reconoce y acepta que el desarrollo \ny realización de la Subasta se sujetará única y \nexclusivamente a los mismos. \n\nLa participación en la Subasta implica total conocimiento y\naceptación de los TyC, las que por causas ajenas y de fuerza \nmayor no imputables a los Organizadores, podrán \nser modificadas, sin que ello dé lugar a reclamo o \nindemnización alguna.\n\nI. ASPECTOS GENERALES DE PARTICIPACIÓN EN LA \nSUBASTA\n\nALCANCE: la Subasta es organizada por la FUNDACIÓN \nA LA RUEDA RUEDA DE PAN Y CANELA (en adelante \nla “Fundación”), con el apoyo de MARIA VICTORIA \nESTRADA (quienes en adelante serán entendidos como \nlos “Organizadores”).\n\nVIGENCIA: la Subasta se llevará a cabo de manera virtual,\ndurante los días [23 de octubre al 18 de noviembre], \nuna vez se haga público catálogo en la página web \nde la Fundación (en adelante el “Periodo de Vigencia”).\n\nOBRAS: las Obras son de propiedad de las personas \n(naturales o jurídicas) que cuentan con la capacidad \ny la facultad plena para disponer de las Obras \n(en adelante “Consignatario” o “Consignatarios”), \nquienes, para efectos de la Subasta, otorgan a la \nFundación la facultad de ofrecerlas y venderlas, \nen su nombre y representación.\n\nPARTICIPANTES: podrán participar las personas \nnaturales mayores de dieciocho (18) años, nacionales \no extranjeras, así como las personas jurídicas, \nprivadas, nacionales o extranjeras a través de su \nrepresentante legal o mediante un representante \nque cuente con poder debidamente conferido.\n\nFORMA DE PARTICIPACIÓN: durante el Periodo de Vigencia,\ntodas las personas que cumplan con los requisitos de \nparticipación establecidos en los TyC podrán participar \nde la Subasta y se inscriban para participar en \nla Subasta. Las personas que se inscriban para participar \nen la Subasta deberán entregar la información \nsolicitada en el formulario de inscripción que podrá \nser enviado en medio físico o digital con la siguiente \ninformación: nombre completo, documento de \nidentificación, domicilio y datos de contacto \n(teléfono y correo electrónico) \n(los “Datos Personales”). Mediante la entrega \nde los Datos Personales el titular autoriza, \nde manera previa, expresa e informada a las Fundación \npara que lleva a cabo el tratamiento de los Datos \nPersonales con la finalidad de adelantar todos \nlos procedimientos tendientes a formalizar y \nllevar a cabo la participación en la Subasta. La Fundación \ntratará los Datos Personales conforme con los \nprocedimientos establecidos en su Política de \nTratamiento de Datos, puede solicitarlo al correo \n[info@fundacionalaruedarueda.org]. La Fundación \ninforma a los titulares que podrán ejercer sus \nderechos a conocer, actualizar, modificar o suprimir \nlos Datos Personales enviando un mensaje de correo \nelectrónico a [info@fundacionalaruedarueda.org].\n\nII. INFORMACIÓN PERSONA NATURAL\n\nDATOS PLATAFORMA DE PAGOS\nEl firmante certifica que la información proporcionada \nen este formulario es verídica y que acepta los términos \ny las condiciones de la Subasta:\nFecha _____________________________________________________________\n\nIII. INFORMACIÓN PERSONA EN REPRESENTACIÓN \nDE UNA PERSONA JURÍDICA (EMPRESA)\n\nNota: Como representante de la persona \njurídica, es necesario acreditar su calidad mediante \npoder general o especial presentado ante notario \npúblico. En caso de no hacerlo se entenderá que \nactúa en nombre propio. El firmante certifica \nque la información proporcionada en este \nformulario es verídica y que acepta los términos \ny las condiciones de la Subasta. \n\nIV. OFERTAS EN AUSENCIA\n\nSi desea puede realizar su oferta en ausencia:\n\nARTISTA ______________________________________\nLOTE No. ________\nOFERTA ________________________________________\n\nV. PARTICULARIDADES Y MECÁNICA DE PARTICIPACIÓN\nDE LA SUBASTA\n\n5.1. LUGAR Y FECHA\nLa Subasta se llevará a cabo el día [18 de noviembre]\na las [7:30pm] y se realizará a través de un streaming, \ndel cual será compartido el link a los Participantes \ninscritos por medio de la metodología que la \nFundación elija.\n\n5.2. MECÁNICA DE PARTICIPACIÓN DE LA SUBASTA\nDe conformidad con lo establecido en el Periodo de \nVigencia, la Subasta dará inicio una vez se haga \npúblico el catálogo de Obras en la página web \nde la Fundación, y los Organizadores designarán \nun director (en adelante el “Subastador”), \nencargado de, entre otras cosas, lo siguiente: \n\n1.1. Instalar y moderar la Subasta.\n\n1.2. Informar el momento en que inicia la subasta \npara cada una de las Obras.\n\n1.3. Anunciar el monto inicial que deberán \nofrecer los Participantes en la puja por cada \nuna de las Obras (en adelante “Precio de Salida”).\n\n1.4. Establecer cuál fue la mejor oferta para \ncada una de las Obras.\n\n1.5. Golpear el martillo o hacer procedimiento \nequivalente que dé lugar al cierre de cada puja \ny aceptación de la la oferta del mejor postor.\n\nInstalada la Subasta, el Subastador informará \ndel Precio de Salida de la venta de cada una de las\nObras, las cuales serán ofrecidas de manera individual, \nde conformidad con lo informado por el Subastador,\n con el fin de que los Participantes inicien el lance.\n\nUna vez determinada la mejor oferta, el Subastador \nprocederá a golpear el martillo, lo cual indicará\nque la última oferta lanzada fue aceptada, por \nlo que se le adjudica la Obra al Participante.\n\nLa oferta aceptada por parte del Subastador \nimplica el perfeccionamiento del contrato de \ncompraventa entre el Consignatario de la \nObra y el Participante y perfecciona la \ndonación que se hiciere a la Fundación.\n\n5.3. CONDICIONES DE PAGO DE LA OBRA\n\nAceptada la oferta del Participante (en adelante \nel “Comprador”), se establecen las siguientes \ncondiciones para el pago de la Obra:\n\n1. Obligaciones del comprador: dentro de los cinco \n(5) días hábiles siguientes a la fecha de la Subasta,\nel Comprador de la Obra se obliga a:\n\n(i) Firmar un certificado de origen de los fondos \nconforme a las disposiciones tributarias y de la \nUIAF, en el cual se identificará plenamente la \nidentidad del comprador, con lo que se cumplen \nlos requerimientos del Sistema para el Control \nde Lavado de Activos – SIPLA.\n\n(ii) Pagar el precio establecido al consignatario de la \nObra, que puede ser una persona natural o \njurídica con plena capacidad y facultad de \ndisponer de la Obra, el cual podrá ser pagado en \nefectivo, cheque (personal o de gerencia) o a \ntravés de una transferencia electrónica.\n\n(iii) Entregar el saldo correspondiente a la \ndonación a la Fundación, la cual podrá ser entregada \nen cheque (personal o de gerencia) o a través \nde una transferencia electrónica.\n\n(iv) Retirar la Obra.\n\nNota: Mientras el Participante Comprador no pague\nen su totalidad el precio establecido al consignatario\nde la Obra y entregue la donación a la \nFundación, no le será entregada la Obra. Una \nvez recibido el dinero correspondiente a la \ndonación por parte del Comprador, la Fundación\nexpedirá el respectivo Certificado de Donación,\nde acuerdo a lo establecido en el estatuto \ntributario, por el valor correspondiente a \nla donación, que puede o no corresponder \na la totalidad del precio del martillo.\n\nVI. DATOS PERSONALES DE LOS PARTICIPANTES\n\nLos Participantes autorizan de manera previa, \nexpresa e informada, sin derecho a compensación \nalguna, a los Organizadores y a quien éste \ndesigne, a utilizar sus Datos Personales \n(v.gr. nombres, documentos, domicilio, testimonios, \nvoces y\/o imágenes) para ser contactados \ncon fines de llevar a cabo la Subasta y todos los \nprocedimientos necesarios y accesorios para \nadelantarla. Salvo lo establecido en los presentes TyC,\nlos Datos Personales suministrados serán \nutilizados única y exclusivamente para las \nactividades asociadas a la Subasta, durante el \ntiempo que los Organizadores y\/o quien estos \ndesignen lo requieran. Los Organizadores \ngarantizan la confidencialidad y seguridad de esos \ndatos personales de acuerdo con sus políticas \nde manejo y privacidad de la información y en \ncumplimiento de la legislación aplicable.\n\nLa participación en la Subasta y el registro de los \nDatos Personales ante los Organizadores serán \ninterpretados como el entendimiento del \nParticipante de estos TyC, y el consentimiento \nprevio, expreso e informado para el uso de los \nDatos Personales del Participante. En caso de\nincomprensión, dudas y\/o desacuerdo con algún \nelemento de estos TyC, el Participante deberá \nabstenerse de inscribirse en la Subasta. \n\nLos Participantes reconocen y aceptan que la \nFundación les ha informado plena y suficientemente\nacerca de sus derechos como titular de Datos \nPersonales, y declara, reconoce y acepta que la \ninformación suministrada a la Fundación de \nforma voluntaria, con ocasión del registro en la \nSubasta, es verídica y que no se ha omitido o \nadulterado ninguna información. Así mismo,\nmanifiestan que autoriza de manera, previa, \nexpresa e informada a la Fundación o a quién esta\ndelegue, o a quién represente sus derechos, \no a quién en el futuro detente su posición contractual \npara que realicen el tratamiento de sus Datos \nPersonales, que pueden incluir entre otros, datos de\ncarácter sensible como su imagen y relacionada con \nsu sexo o raza o datos relacionados con su información \nlaboral o académica. Autoriza para que sus \nDatos Personales sean recolectados, almacenados, \nusados, procesados, transferidos y\/o transmitidos,\na nivel nacional o internacional especialmente a \nfiliales o compañías aliadas de la Fundación. \nA su turno, declara que entiende, acepta y reconoce \nque ha sido informado por la Fundación del \ncarácter facultativo de la entrega de datos \npersonales de carácter sensible, los cuales son \naquellos que podrían afectar mi intimidad o cuyo \nuso indebido puede generar discriminación.\n\nLos Participantes reconocen y aceptan que sus \ndatos personales podrán ser puestos a disposición de \naliados de la Fundación. Así mismo, acepta que \nsu información sea puesta a disposición del \npersonal encargado de la labor correspondiente \ndentro de la Fundación, sin excluirse la posibilidad \nde ser transferidos a encargados, consultores, \nasesores, personas y oficinas externas según \nsea necesario para cumplir con las finalidades. \nAdicionalmente, manifiestan que se ha puesto a su\ndisposición la Política de Tratamiento de Datos \nPersonales de la Fundación en el correo\n[info@fundacionalaruedarueda.org], y que \npor lo tanto conoce las Políticas de Tratamiento \nde Datos Personales de la Fundación. Los \nParticipantes reconocen y aceptan que \nfueron informados por la Fundación acerca \nde todos sus derechos como titular de datos \npersonales, tales como: \n(a) acceder de forma gratuita a los datos personales; \n(b) solicitar actualización y rectificación de su \ninformación frente a datos parciales, inexactos, \nincompletos, fraccionados, que induzcan a \nerror, o a aquellos cuyo tratamiento esté prohibido \no no haya sido autorizado; \n(c) solicitar prueba de la autorización otorgada; \n(d) presentar quejas ante la Superintendencia de \nIndustria y Comercio; \n(e) revocar la autorización y\/o solicitar la supresión del \ndato personal, a menos que exista un deber legal o \ncontractual que haga imperativo conservar la \ninformación; y \n(f) abstenerse de responder las preguntas sobre datos \nsensibles o sobre datos de las niñas, niños o \nadolescentes.\n\nLa Fundación tiene a disposición de los titulares \nles mecanismos establecidos en su Política de \nTratamiento de Datos Personales para que ejerzan \nsus derechos.\n\nVII. RESPONSABILIDAD\n\nLa responsabilidad de los Organizadores cesa \ncon la entrega formal de la Obra. \n\n- Los Organizadores están exentos de cualquier \nresponsabilidad derivada del uso y disfrute de la Obra.\n\n- Los Organizadores no se responsabilizarán de la pérdida, \ndaño o destrucción de la Obra una vez entregada.\n\n- Los Organizadores no serán responsables de las \nincidencias derivadas en la ejecución de la Subasta \npor causas de fuerza mayor.\n\n- Los Participantes reconocen y aceptan que la ley \naplicable para cualquier controversia que surja \ncon relación a la Subasta será la de Colombia y \nrenuncian a su derecho a iniciar cualquier tipo de \nreclamación en otra jurisdicción. \n\nLos Organizadores no serán responsables por los daños\ny perjuicios que pudiera sufrir el Participante en \nsus personas o bienes, con motivo o en \nocasión de su participación en la Subasta, o del \nretiro o utilización de la Obra. Los Participantes, \ncon su sola inscripción en la Subasta, aceptan \nde pleno derecho todas y cada una de las \ndisposiciones previstas en los presentes TyC. \n\nAl inscribirse en la Subasta, el Participante en forma \nplena e incondicional conviene en aceptar y ser \nobligado por las disposiciones de los TyC, \ny por todas las decisiones de los Organizadores, \nincluyendo, entre otras, la interpretación de los \ntérminos utilizados en estos TyC; y garantiza que \ntoda la información proporcionada por él\/ella \nen relación con la Subasta es verdadera, exacta y \ncompleta a la fecha de la inscripción para participar. \n\nEn ningún caso los Organizadores, o sus compañías \nmatrices, subsidiarias, afiliadas y relacionadas, \nsus agencias de publicidad y promoción, así \ncomo sus respectivos directivos, directores, \nempleados y representantes, contratistas y \nagentes, (colectivamente denominados, los \n“Exonerados”) será responsables de información \nde inscripción inexacta, incorrecta, incompleta, \nmal dirigida, o que llegue tarde. Además, los \nExonerados no asumen responsabilidad \nalguna y no son responsables de:\n\n(1) problemas o malfuncionamiento técnicos de\ncualquier clase, de cualquier red telefónica o de \ncomputación, ni de las líneas telefónicas, \ncomputadoras, servidores, o proveedores, \nequipos de computación, hardware o software, \no (2) errores, interrupciones, defectos, demoras o \nfallos en las operaciones o transmisión de formularios \nde inscripción adecuadamente procesados, incluyendo, \nentre otros, la transmisión inexacta de información \nde inscripción, o la no recepción por parte de los \nOrganizadores de ésta, debido a problemas técnicos \no congestiones de tráfico en Internet o en cualquier \nsitio web, o (3) interrupciones de la comunicación u \notras fuerzas más allá del control razonable de los \nOrganizadores, incluyendo la incapacidad de obtener\nacceso al sitio web de la Fundación, envío de \nformularios de inscripción o cualquier interrupción \nrelacionada con el tráfico en Internet, virus, \n“bugs”, o intervención desautorizada; o \n(4) daños o pérdidas de cualquier tipo, incluyendo \ndaños directos, incidentales, consecuentes o punitivos \nal Participante o a cualquier otra persona o propiedad \nque puedan ser ocasionados, directa o indirectamente, \nen su totalidad o en parte, por la participación en la \nSubasta, por el acceso a cualquier sitio de Internet \nasociado con los Organizadores o del uso de dicho sitio, \no bien por la baja de cualquier material del sitio web de \nlos Organizadores, independientemente de si el\nmaterial fue preparado por los Organizadores o por \nun tercero, e independientemente de si el material \nestá conectado al sitio web de los Organizadores \nmediante un enlace de hipertexto.\n\nSi por cualquier razón la Subasta no puede llevarse a cabo \nsegún lo planeado, debido a la acción de un virus \nde computadora, de un “bug”, manipulación indebida,\nintervención desautorizada, fraude, fallas técnicas \no por cualquier otra causa que exceda al control \nde los Organizadores, que corrompa o afecte la \nadministración, seguridad, equidad, integridad, \no realización adecuada de la Subasta, los \nOrganizadores se reservan el derecho, a su exclusiva \ndiscreción, de descalificar a cualquier persona a \nquien se halle manipulando indebidamente la \noperación de la Subasta o violando los presentes \nTyC, y a cancelar, dar por terminado, modificar o \nsuspender la Subasta.",
                    "type": "boolean",
                    "labelPosition": "izquierda",
                    "order_weight": "995",
                    "updated_at": "2020-10-28 20:37:52",
                    "created_at": "2020-10-22 20:16:24",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c846"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "opcionesdepagoparalaentrada",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "Opciones de pago para la entrada:",
                    "description": null,
                    "type": "tituloseccion",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1604422855000"
                        }
                    },
                    "created_at": "2020-10-30 20:06:06",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c847"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": [],
                    "order_weight": "996"
                },
                {
                    "name": "1transferenciaacuentasdelafundacion",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "1. Transferencia a cuentas de la fundación A la Rueda Rueda de Pan y Canela:",
                    "description": null,
                    "type": "tituloseccion",
                    "updated_at": "2020-11-03 14:36:33",
                    "created_at": "2020-10-30 20:06:36",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c848"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "abancodebogotacuentacorriente880017918",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "a. Banco de Bogotá \/ cuenta corriente #000071563",
                    "description": null,
                    "type": "tituloseccion",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1604503647000"
                        }
                    },
                    "created_at": "2020-10-30 20:06:52",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c849"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "bbancodaviviendacuentacorriente473469991706",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "b. Banco Davivienda \/ cuenta corriente # 473469991706",
                    "description": null,
                    "type": "tituloseccion",
                    "updated_at": "2020-10-30 20:07:02",
                    "created_at": "2020-10-30 20:07:02",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c84a"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "nitdelafundacionalaruedaruedadepanycanela9005943799",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "NIT de la fundación A la Rueda Rueda de Pan y Canela: 9005943799",
                    "description": null,
                    "type": "tituloseccion",
                    "updated_at": "2020-11-03 14:41:36",
                    "created_at": "2020-11-03 14:41:30",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c84b"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "2tarjetadebitoycredito",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "2. Tarjeta débito y crédito",
                    "description": null,
                    "type": "tituloseccion",
                    "updated_at": "2020-10-30 20:07:15",
                    "created_at": "2020-10-30 20:07:15",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c84c"
                    },
                    "author": null,
                    "categories": [],
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "tickets": []
                },
                {
                    "name": "3datafonodelhotelestelar93del10al18denoviembre",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "3. Datáfono en Hotel Parque 93, del 10 al 18 de noviembre.",
                    "description": "Es importante enviar soporte vía email al correo info@fundacionalaruedarueda.org después de realizar el pago.",
                    "type": "tituloseccion",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1604503839000"
                        }
                    },
                    "created_at": "2020-10-30 20:07:32",
                    "_id": {
                        "$oid": "5fa16c468e815552f046c84d"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "metododepago",
                    "mandatory": true,
                    "visibleByContacts": true,
                    "visibleByAdmin": false,
                    "label": "Método de Pago",
                    "description": null,
                    "type": "multiplelist",
                    "options": [
                        {
                            "label": "Transferencia a cuentas de la Fundación A la Rueda Rueda",
                            "value": "Transferencia a cuentas de la Fundación A la Rueda Rueda"
                        },
                        {
                            "label": "Tarjeta Débito ó Crédito",
                            "value": "Tarjeta Débito ó Crédito"
                        },
                        {
                            "label": "Datáfono en Hotel Parque 93, Del 10 al 18 de Noviembre",
                            "value": "Datáfono en Hotel Parque 93, Del 10 al 18 de Noviembre"
                        }
                    ],
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1604422782000"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1604422754000"
                        }
                    },
                    "_id": {
                        "$oid": "5fa18c6214e43f7d95595a62"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "order_weight": "996",
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                },
                {
                    "name": "paravalidarsuregistroenviarsoporteviaemailalcorreoinfofundacionalaruedaruedaorgdespuesderealizarelpago",
                    "mandatory": false,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "Para validar su registro enviar soporte vía email al correo info@fundacionalaruedarueda.org después de realizar el pago.",
                    "description": null,
                    "type": "tituloseccion",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1604669836000"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1604504485000"
                        }
                    },
                    "_id": {
                        "$oid": "5fa2cba590fe9531d17e2324"
                    }
                },
                {
                    "name": "seleccioneunadelasdosmodalidadessegunsupreferencia",
                    "mandatory": true,
                    "visibleByContacts": false,
                    "visibleByAdmin": false,
                    "label": "Seleccione una de las dos modalidades según su preferencia",
                    "description": null,
                    "type": "list",
                    "options": [
                        {
                            "label": "Presencial",
                            "value": "Presencial"
                        },
                        {
                            "label": "Virtual",
                            "value": "Virtual"
                        }
                    ],
                    "order_weight": "93",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1604669853000"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1604590253000"
                        }
                    },
                    "_id": {
                        "$oid": "5fa41aada6ddd942736d3134"
                    },
                    "author": null,
                    "categories": [],
                    "currency": {
                        "_id": "5c23936fe37db02c715b2a02",
                        "id": 1,
                        "title": "U.S. Dollar",
                        "symbol_left": "$",
                        "symbol_right": null,
                        "code": "USD",
                        "decimal_place": 2,
                        "value": 1,
                        "decimal_point": ".",
                        "thousand_point": ",",
                        "status": 1,
                        "created_at": "2013-11-29 19=>51=>38",
                        "updated_at": "2013-11-29 19=>51=>38"
                    },
                    "event_type": null,
                    "organiser": null,
                    "organizer": null,
                    "tickets": []
                }
            ],
            "author_id": "5f918f7bb7cf22309d5c2fa2",
            "organizer_id": "5f918f7bb7cf22309d5c2fa3",
            "event_type_id": "5bf47267754e2317e4300b6f",
            "updated_at": "2020-11-17 15:01:45",
            "created_at": "2020-10-22 14:01:36",
            "category_ids": [
                "5bbb6f7f3dafc227ce1c1ca2"
            ],
            "address": null,
            "allow_detail_calendar": false,
            "allow_register": false,
            "data_loader_page": null,
            "enable_language": false,
            "event_platform": "zoomExterno",
            "has_date": false,
            "initial_page": null,
            "loader_page": "no",
            "picture": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/R0cbmrSAVe1ti1yfr5SZklzB1vcOjflKLaE0eVlQ.jpeg",
            "show_banner": true,
            "show_banner_footer": false,
            "video": "https:\/\/www.youtube.com\/watch?v=cAY0rpujB3c&ab_channel=Fundaci%C3%B3nalaRuedaRueda",
            "styles": {
                "buttonColor": "#FFF",
                "banner_color": "#FFF",
                "menu_color": "#FFF",
                "event_image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/hm3XZLdWvQV59NtcfEiXBHbJmUMXTVq50shuZhxX.jpeg",
                "banner_image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/3rltjNdt6IRHh0ZDq2HxGiVk0DZu5cgEsnjm833b.jpeg",
                "menu_image": null,
                "brandPrimary": "#FFFFFF",
                "brandSuccess": "#FFFFFF",
                "brandInfo": "#FFFFFF",
                "brandDanger": "#FFFFFF",
                "containerBgColor": "#FFFFFF",
                "brandWarning": "#FFFFFF",
                "toolbarDefaultBg": "#e2e2e2",
                "brandDark": "#FFFFFF",
                "brandLight": "#FFFFFF",
                "textMenu": "#FFFFFF",
                "activeText": "#FFFFFF",
                "bgButtonsEvent": "#FFFFFF",
                "banner_image_email": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/banner_image_email1605317350.jpeg",
                "BackgroundImage": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/r6phWi8IZOO3EfxclG4YE7xY1TjJePyFjABretjo.jpeg",
                "FooterImage": null,
                "banner_footer": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/mgFC1rhFtmaXOj62nfuFZtdbPHfrm0MZyHCd8xra.jpeg",
                "mobile_banner": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/LxZmELt8LufaUVEZV7AE42CCAErfTM66rhTBCHvV.jpeg",
                "banner_footer_email": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/banner_footer_email1605126079.jpeg",
                "show_banner": "true",
                "show_card_banner": "false",
                "show_inscription": false,
                "hideDatesAgenda": false,
                "hideBtnDetailAgenda": "true",
                "loader_page": "no",
                "data_loader_page": null
            },
            "itemsMenu": {
                "evento": {
                    "name": "Home",
                    "position": "1",
                    "section": "evento",
                    "icon": "CalendarOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "agenda": {
                    "name": "Galería",
                    "position": "2",
                    "section": "agenda",
                    "icon": "ReadOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "tickets": {
                    "name": "Registro",
                    "position": "3",
                    "section": "tickets",
                    "icon": "CreditCardOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "informativeSection": {
                    "name": "Catálogo",
                    "position": null,
                    "section": "informativeSection",
                    "icon": "FileDoneOutlined",
                    "markup": "<img style=\"width: 34%; display: block; heigth:auto;\" src=\"https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/SubastaAlaRuedaRueda%2Fimagenes%2FEvento%20a%20la%20rueda%20rueda.jpg?alt=media&token=729d26b2-c6f6-40bc-95a7-092027e9faf0\"\/><br><a href=\"https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/SubastaAlaRuedaRueda%2Farchivos%2Fcatalogo%202020ok.pdf?alt=media&token=7848ccb3-6f47-492c-807d-e3ccc747146c\" style=\"font-size:20px;    display: flex;\">Descargar Archivo <\/a>",
                    "checked": true,
                    "permissions": "public"
                },
                "partners": {
                    "name": "Patrocinadores",
                    "section": "partners",
                    "icon": "DollarCircleOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "informativeSection1": {
                    "name": "Menú Subasta",
                    "position": null,
                    "section": "informativeSection1",
                    "icon": "FileDoneOutlined",
                    "markup": "<img class=\"menusubasta\" src=\"https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/2020-11-17.jpg?alt=media&token=bd4c2b49-4481-4956-a79d-8131705c336d\"\/> <style> @media screen and (max-width:780px){ .menusubasta{ width:30%; display: block; heigth:auto; } } @media screen and (min-width:780px) and (max-width:1300px){ .menusubasta{ display: block; heigth:auto; } } <\/style>",
                    "checked": true,
                    "permissions": "public"
                }
            },
            "type_event": "onlineEvent",
            "fields_conditions": [
                {
                    "fields": [
                        "email",
                        "names",
                        "tipodedocumento",
                        "numerodedocumento",
                        "ciudad",
                        "direccion",
                        "telefonocelular",
                        "celular",
                        "residencia",
                        "oficina",
                        "elfirmantecertificaquelainformacionproporcionadaenesteformularioesveridicayqueaceptalosterminosylascondicionesdelasubasta",
                        "pais"
                    ],
                    "fieldToValidate": "participascomo",
                    "state": "enabled",
                    "value": "Persona"
                },
                {
                    "fields": [
                        "informacionparticipanteenrepresentaciondeunapersonajuridicaempresa",
                        "razonsocial",
                        "nombreyapellidosdequiendiligenciaelformato",
                        "nit",
                        "cargo",
                        "telefonos",
                        "celular",
                        "residencia",
                        "oficina",
                        "names",
                        "email",
                        "elfirmantecertificaquelainformacionproporcionadaenesteformularioesveridicayqueaceptalosterminosylascondicionesdelasubasta",
                        "pais",
                        "ciudad",
                        "direccion"
                    ],
                    "fieldToValidate": "participascomo",
                    "state": "enabled",
                    "value": "Empresa"
                }
            ],
            "registration_message": "<p>Hemos recibido su información, nos encontramos en el proceso de la transacción y validación con el banco.&nbsp;<\/p><p><br><\/p><p>Pronto enviaremos a su correo una confirmación con el número de inscripción y los pasos a seguir&nbsp;<\/p><p><br><\/p><p>El registro exitoso de sus datos no garantiza la participación dentro de nuestra subasta.<\/p> <a target='blank' style='text-align:center;background-color: #615f5f; width: 100%; display: block; padding: 20px; color: #efb610; font-weight: bold; font-size: 18px;' href='https:\/\/donacionesfundacionalaruedarueda.onlinepaymenthub.com\/RecaudosElectronicosWebRueda\/faces\/registro\/usuarios\/formularioRegistro.xhtml?idOrganizacion=2f5cadce87d788a4b6a1f6c7f7d95184' >Ir a Pasarela de Pago<\/a>",
            "validateEmail": true,
            "author": {
                "_id": "5f918f7bb7cf22309d5c2fa2",
                "uid": "zpXTyIzChuNwumnR3u447Xv4Nnx1",
                "email": "rueda@evius.co",
                "emailVerified": false,
                "displayName": "Fundación a la Rueda Rueda",
                "photoUrl": null,
                "phoneNumber": null,
                "disabled": false,
                "metadata": {
                    "createdAt": {
                        "date": "2020-10-22 13:56:10.114000",
                        "timezone_type": 3,
                        "timezone": "UTC"
                    },
                    "lastLoginAt": {
                        "date": "2020-10-22 13:56:10.114000",
                        "timezone_type": 3,
                        "timezone": "UTC"
                    }
                },
                "providerData": [
                    {
                        "uid": "rueda@evius.co",
                        "displayName": "Fundación a la Rueda Rueda",
                        "email": "rueda@evius.co",
                        "photoUrl": null,
                        "providerId": "password",
                        "phoneNumber": null
                    }
                ],
                "passwordHash": "UkVEQUNURUQ=",
                "passwordSalt": null,
                "customAttributes": [],
                "tokensValidAfterTime": {
                    "date": "2020-10-22 13:56:10.000000",
                    "timezone_type": 3,
                    "timezone": "UTC"
                },
                "tenantId": null,
                "confirmation_code": "L8NL2L19nANloA6R",
                "api_token": "zYxqIrXSS0KsmyrdEDouwYCEhacYSlsAMrIXwg1CxZm0yJcCLJlgfY8Qpg2f",
                "updated_at": "2021-06-22 13:07:23",
                "created_at": "2020-10-22 13:56:11",
                "refresh_token": "AGEhc0DUTt8dfPcqqNqQ5brLN38uiVlHvakaDlBHFPyl7nMwzHi08BnaAvN3qtJbEFsnJQYOYMSxN7n_pnO6bgg1nQS84oMmyC_fcu2Z3vYDyp690PNxiTxZkKEwCY9cXlOL-Db4mXpMq9TgOziEoMXQFf_WWLMWFpRFgYfqxJQUkJ3bb7UCVTu00ZtRkPJex8LVC7uJ6c2oSVHwZavC5LSKozp5Ww9AXiX5ISeyTpdKZrK6iUvLpdc"
            },
            "categories": [
                {
                    "_id": "5bbb6f7f3dafc227ce1c1ca2",
                    "name": "Seminario",
                    "updated_at": "2018-10-08 14:53:51",
                    "created_at": "2018-10-08 14:53:51"
                }
            ],
            "event_type": {
                "_id": "5bf47267754e2317e4300b6f",
                "name": "Festivales"
            },
            "organiser": {
                "_id": "5f918f7bb7cf22309d5c2fa3",
                "tax_name": "Tax Name",
                "tax_value": "Tax Rate",
                "tax_id": "Tax ID",
                "author": "5f918f7bb7cf22309d5c2fa2",
                "name": "Fundación a la Rueda Rueda",
                "updated_at": "2020-10-22 13:56:11",
                "created_at": "2020-10-22 13:56:11"
            },
            "organizer": {
                "_id": "5f918f7bb7cf22309d5c2fa3",
                "tax_name": "Tax Name",
                "tax_value": "Tax Rate",
                "tax_id": "Tax ID",
                "author": "5f918f7bb7cf22309d5c2fa2",
                "name": "Fundación a la Rueda Rueda",
                "updated_at": "2020-10-22 13:56:11",
                "created_at": "2020-10-22 13:56:11"
            },
            "currency": {
                "_id": "5c23936fe37db02c715b2a02",
                "id": 1,
                "title": "U.S. Dollar",
                "symbol_left": "$",
                "symbol_right": "",
                "code": "USD",
                "decimal_place": 2,
                "value": 1,
                "decimal_point": ".",
                "thousand_point": ",",
                "status": 1,
                "created_at": "2013-11-29 19=>51=>38",
                "updated_at": "2013-11-29 19=>51=>38"
            },
            "tickets": []
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/eventsbeforetoday?page=1",
        "last": "http:\/\/localhost\/api\/eventsbeforetoday?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/eventsbeforetoday",
        "per_page": 2500,
        "to": 1,
        "total": 1
    }
}
```

### HTTP Request
`GET api/eventsbeforetoday`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filtered` |  optional  | optional filter parameters

<!-- END_7488288e859ba4fe861385339c81371a -->

<!-- START_a5b53c3efbacc4b924f371335093c0f7 -->
## _afterToday:_ list upcoming events

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/eventsaftertoday?filtered=%5B%7B%22field%22%3A%22name%22%2C%22value%22%3A%5B%22SUBASTA+DE+ARTE%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/eventsaftertoday"
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
    "data": [],
    "links": {
        "first": "http:\/\/localhost\/api\/eventsaftertoday?page=1",
        "last": "http:\/\/localhost\/api\/eventsaftertoday?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/eventsaftertoday",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/eventsaftertoday`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filtered` |  optional  | optional filter parameters

<!-- END_a5b53c3efbacc4b924f371335093c0f7 -->

<!-- START_08180c1785ee9a816b6fa5cdf32ece34 -->
## _EventbyUsers_: search of events by user organizer.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/users/quis/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/quis/events"
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
        "first": "http:\/\/localhost\/api\/users\/quis\/events?page=1",
        "last": "http:\/\/localhost\/api\/users\/quis\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/users\/quis\/events",
        "per_page": 2500,
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
    -G "https://apidev.evius.co/api/organizations/at/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/at/events"
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
        "first": "http:\/\/localhost\/api\/organizations\/at\/events?page=1",
        "last": "http:\/\/localhost\/api\/organizations\/at\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/organizations\/at\/events",
        "per_page": 2500,
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

<!-- START_4eba2e62eff1c7a104583f0315fc73b8 -->
## api/organizations/{id}/eventsstadistics
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/organizations/1/eventsstadistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/eventsstadistics"
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
    "data": []
}
```

### HTTP Request
`GET api/organizations/{id}/eventsstadistics`


<!-- END_4eba2e62eff1c7a104583f0315fc73b8 -->

<!-- START_8a1f4214ec529da1c29998469d77b81b -->
## api/events/{event_id}/surveys/{id}/coursefinished
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/1/surveys/1/coursefinished" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/surveys/1/coursefinished"
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
`POST api/events/{event_id}/surveys/{id}/coursefinished`


<!-- END_8a1f4214ec529da1c29998469d77b81b -->

<!-- START_fee8ef1fe728ff1db6ba4c577c3fd10c -->
## _addDocumentUserToEvent_: adds the default settings to events that have user documents.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/qui/adddocumentuser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quantity":2.62,"auto_assign":true}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/qui/adddocumentuser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "quantity": 2.62,
    "auto_assign": true
}

fetch(url, {
    method: "PUT",
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
`PUT api/events/{event}/adddocumentuser`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `quantity` | number |  required  | Indicates how many documents will assigned to a user.
        `auto_assign` | boolean |  required  | This parameter indicates if the document are assigned to the user automatically or if the user selects them when registering.
    
<!-- END_fee8ef1fe728ff1db6ba4c577c3fd10c -->

#EventTypes

The type of event provides information about the scope of the event, for example, events can be of type, **educational, sports, international, etc..**
<!-- START_d075018d0f5c4b4c28eebc2ea6c990a2 -->
## _index_ : list of event types

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/eventTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/eventTypes"
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
            "_id": "5bf471e3754e2317e4300b66",
            "name": "Entidades Estatales"
        },
        {
            "_id": "5bf471f9754e2317e4300b67",
            "name": "Salud"
        },
        {
            "_id": "5bf47203754e2317e4300b68",
            "name": "Educación"
        },
        {
            "_id": "5bf47215754e2317e4300b69",
            "name": "Telcos"
        },
        {
            "_id": "5bf47226754e2317e4300b6a",
            "name": "Corporativo"
        },
        {
            "_id": "5bf47230754e2317e4300b6b",
            "name": "Automotor"
        },
        {
            "_id": "5bf4724a754e2317e4300b6c",
            "name": "Banca"
        },
        {
            "_id": "5bf47252754e2317e4300b6d",
            "name": "Pyme"
        },
        {
            "_id": "5bf4725e754e2317e4300b6e",
            "name": "Internacional"
        },
        {
            "_id": "5bf47267754e2317e4300b6f",
            "name": "Festivales"
        },
        {
            "_id": "5bf47271754e2317e4300b70",
            "name": "Deportes"
        },
        {
            "_id": "617822f0c8a3d6cb5059e75b",
            "name": "Misiones"
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
        "per_page": 2500,
        "to": 12,
        "total": 12
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
    "https://apidev.evius.co/api/eventTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"ipsam"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/eventTypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ipsam"
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
    -G "https://apidev.evius.co/api/events/1/eventusers?filtered=%5B%7B%22id%22%3A%22event_type_id%22%2C%22value%22%3A%5B%225bb21557af7ea71be746e98x%22%2C%225bb21557af7ea71be746e98b%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/eventusers"
);

let params = {
    "filtered": "[{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]",
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
    "rol_id": "60e8a7e74f9fb74ccd00dc22",
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
    `filtered` |  optional  | optional filter parameters

<!-- END_741efed688409cc5b0c2673b73da037b -->

<!-- START_a365aa3932cace4bde297c80cef75050 -->
## _show:_ consult an EventUser by assistant id

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/facere/eventusers/impedit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/facere/eventusers/impedit"
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
    "message": "No query results for model [App\\Attendee] impedit"
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

<!-- START_1a93d52037043b43040c8f63d1d0c6b7 -->
## _update_:update a specific assistant

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/autem/eventusers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"ut","name":"et","rol_id":"quas","properties":{"":"blanditiis"}}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/autem/eventusers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "ut",
    "name": "et",
    "rol_id": "quas",
    "properties": {
        "": "blanditiis"
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
`PUT api/events/{event}/eventusers/{eventuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | string required
    `eventusers` |  optional  | string required id de Attendee
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  optional  | field
        `name` | string |  optional  | field
        `rol_id` | string |  optional  | rol id this is the role user into event
        `properties.` | any |  optional  | other params  will be saved in user and eventUser.
    
<!-- END_1a93d52037043b43040c8f63d1d0c6b7 -->

<!-- START_eed9d2ac9ae0f6e3669f6613fa1d351c -->
## _createUserAndAddtoEvent_:create user and add it to an event

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/sint/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"assumenda","name":"quia","password":"quia","other_params,":{"":{"":{"":"necessitatibus"}}}}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/sint/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "assumenda",
    "name": "quia",
    "password": "quia",
    "other_params,": {
        "": {
            "": {
                "": "necessitatibus"
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

<!-- START_8229080007df704aa1e43dbfa7bf3ea8 -->
## __delete:__ remove a specific attendee from an event.

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/events/1/eventusers/necessitatibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/eventusers/necessitatibus"
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

<!-- START_57c90d35e9b8557bc5dfc7c6cedcd846 -->
## api/events/{event_id}/eventusers/{id}/unsubscribe
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/1/eventusers/1/unsubscribe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/eventusers/1/unsubscribe"
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
null
```

### HTTP Request
`GET api/events/{event_id}/eventusers/{id}/unsubscribe`


<!-- END_57c90d35e9b8557bc5dfc7c6cedcd846 -->

<!-- START_7ea69d252da861fe068b097ff9fb8ec9 -->
## _indexByUserInEvent_: list of users by events

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/me/eventusers/event/at" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/me/eventusers/event/at"
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
        "first": "http:\/\/localhost\/api\/me\/eventusers\/event\/at?page=1",
        "last": "http:\/\/localhost\/api\/me\/eventusers\/event\/at?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/me\/eventusers\/event\/at",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/me/eventusers/event/{event_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required

<!-- END_7ea69d252da861fe068b097ff9fb8ec9 -->

<!-- START_314ab10189ffcbcaaab1ed19eb9dd21f -->
## _ByUserInEvent_ : list of users by events

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/eventusers/event/eos/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/eventusers/event/eos/user/1"
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
`GET api/eventusers/event/{event_id}/user/{user_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required

<!-- END_314ab10189ffcbcaaab1ed19eb9dd21f -->

<!-- START_017b9c2694857efdd5c16863bc1aaea7 -->
## _SubscribeUserToEventAndSendEmail_: register user to an event and send confirmation email

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/officia/adduserwithemailvalidation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"quia","name":"aperiam","password":"perspiciatis","other_params,":{"":{"":{"":"ullam"}}}}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/officia/adduserwithemailvalidation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quia",
    "name": "aperiam",
    "password": "perspiciatis",
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
        `password` | string |  required  | 
        `other_params,...` | any |  optional  | other params  will be saved in user and eventUser
    
<!-- END_017b9c2694857efdd5c16863bc1aaea7 -->

<!-- START_cd20adcf5c26e47f21f72d0301544be1 -->
## _changeUserPassword_: change user password

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/est/changeUserPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"exercitationem"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/est/changeUserPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "exercitationem"
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
    `event_id` |  required  | string id of the event in which the user is registered
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | Email of the user who will change his password
    
<!-- END_cd20adcf5c26e47f21f72d0301544be1 -->

<!-- START_6b56a32b833284ebacc99706a28295f7 -->
## _transferEventuserAndEnrollToActivity_ : transfer Eventuser And Enroll To Activity

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/eventusers/1/tranfereventuser/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/eventusers/1/tranfereventuser/1"
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

<!-- START_1b30bab6e9ef7c312e1ee78d85ac2dfa -->
## _meInEvent_: user information logged into the event

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/me/events/commodi/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/me/events/commodi/eventusers"
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
`GET api/me/events/{event_id}/eventusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | 

<!-- END_1b30bab6e9ef7c312e1ee78d85ac2dfa -->

<!-- START_8a17161f57d62dcbdb0c8b18b5ccebae -->
## _metricsEventByDate_: number of registered users and checked in for day according to event start and end dates
or according specific dates.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/1/metricsbydate/eventusers?metrics_type=created_at&datetime_from=et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/metricsbydate/eventusers"
);

let params = {
    "metrics_type": "created_at",
    "datetime_from": "et",
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Event] 1"
}
```

### HTTP Request
`GET api/events/{event_id}/metricsbydate/eventusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event_id
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `metrics_type` |  required  | string With this parameter you can defined the type of metrics that you want to see, you can select created_at for see the registered users  or checkedin_at for see checked users.
    `datetime_from` |  optional  | date

<!-- END_8a17161f57d62dcbdb0c8b18b5ccebae -->

<!-- START_157d9f70e47e7a17090f6b664b5b3e5d -->
## api/events/{event_id}/hubspotRegister/eventusers
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/1/hubspotRegister/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/hubspotRegister/eventusers"
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
`GET api/events/{event_id}/hubspotRegister/eventusers`


<!-- END_157d9f70e47e7a17090f6b664b5b3e5d -->

<!-- START_268cde1684b4e9055d6507c299b96ea7 -->
## _updateRolAndSendEmail_: change the rol of an user in a event especific.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
This end point sends an email to the user to inform them of the change.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/voluptate/eventusers/esse/updaterol" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"rol_id":"repudiandae"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/voluptate/eventusers/esse/updaterol"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rol_id": "repudiandae"
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
`PUT api/events/{event}/eventusers/{eventuser}/updaterol`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | 
    `eventuser` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `rol_id` | string |  required  | 
    
<!-- END_268cde1684b4e9055d6507c299b96ea7 -->

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
    "https://apidev.evius.co/api/files/upload/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"autem"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/files/upload/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "autem"
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
    "https://apidev.evius.co/api/files/uploadbase/nisi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"iure","type":"nostrum"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/files/uploadbase/nisi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "iure",
    "type": "nostrum"
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

#Google Analytics


APIs for Google Analitycs Stats
<!-- START_259c759273915c655b1f237b29029215 -->
## Query for Google Analytics Stats

Recieve a body json to give all the stats related about pageviews, users and sessions
filtered by a pagePath consulted.

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/googleanalytics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"startDate":"2021-06-30","endDate":"2021-07-6","filtersExpression":"ga:pagePath=@\/landing\/5ea23acbd74d5c4b360ddde2;ga:pagePath!@token","metrics":"ga:pageviews, ga:users, ga:sessions","dimensions":"ga:pagePath","fieldName":"ga:pagePath","sortOrder":"DESCENDING"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/googleanalytics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "startDate": "2021-06-30",
    "endDate": "2021-07-6",
    "filtersExpression": "ga:pagePath=@\/landing\/5ea23acbd74d5c4b360ddde2;ga:pagePath!@token",
    "metrics": "ga:pageviews, ga:users, ga:sessions",
    "dimensions": "ga:pagePath",
    "fieldName": "ga:pagePath",
    "sortOrder": "DESCENDING"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "containsSampledData": false,
    "dataLastRefreshed": null,
    "id": "https:\/\/www.googleapis.com\/analytics\/v3\/data\/ga?ids=ga:114494173&dimensions=ga:pagePath&metrics=ga:pageviews,ga:users,ga:sessions&sort=-ga:pagePath&filters=ga:pagePath%3D@\/landing\/5ea23acbd74d5c4b360ddde2;ga:pagePath!@token&start-date=2021-06-30&end-date=2021-07-30",
    "itemsPerPage": 1000,
    "kind": "analytics#gaData",
    "nextLink": null,
    "previousLink": null,
    "rows": [
        [
            "\/landing\/5ea23acbd74d5c4b360ddde2\/partners",
            "1",
            "1",
            "0"
        ],
        [
            "\/landing\/5ea23acbd74d5c4b360ddde2\/evento\/activity\/602d88f5fc22ba3f453a0dc3",
            "2",
            "1",
            "0"
        ]
    ],
    "sampleSize": null,
    "sampleSpace": null,
    "selfLink": "https:\/\/www.googleapis.com\/analytics\/v3\/data\/ga?ids=ga:114494173&dimensions=ga:pagePath&metrics=ga:pageviews,ga:users,ga:sessions&sort=-ga:pagePath&filters=ga:pagePath%3D@\/landing\/5ea23acbd74d5c4b360ddde2;ga:pagePath!@token&start-date=2021-06-30&end-date=2021-07-30",
    "totalResults": 9,
    "totalsForAllResults": {
        "ga:pageviews": "620",
        "ga:users": "23",
        "ga:sessions": "38"
    },
    "query": {
        "dimensions": "ga:pagePath",
        "endDate": "2021-07-30",
        "filters": "ga:pagePath=@\/landing\/5ea23acbd74d5c4b360ddde2;ga:pagePath!@token",
        "ids": "ga:114494173",
        "maxResults": 1000,
        "metrics": [
            "ga:pageviews",
            "ga:users",
            "ga:sessions"
        ],
        "samplingLevel": null,
        "segment": null,
        "sort": [
            "-ga:pagePath"
        ],
        "startDate": "2021-06-30",
        "startIndex": 1
    },
    "profileInfo": {
        "accountId": "72179148",
        "internalWebPropertyId": "109811365",
        "profileId": "114494173",
        "profileName": "All Web Site Data",
        "tableId": "ga:114494173",
        "webPropertyId": "UA-72179148-1"
    },
    "columnHeaders": [
        {
            "columnType": "DIMENSION",
            "dataType": "STRING",
            "name": "ga:pagePath"
        },
        {
            "columnType": "METRIC",
            "dataType": "INTEGER",
            "name": "ga:pageviews"
        },
        {
            "columnType": "METRIC",
            "dataType": "INTEGER",
            "name": "ga:users"
        },
        {
            "columnType": "METRIC",
            "dataType": "INTEGER",
            "name": "ga:sessions"
        }
    ]
}
```

### HTTP Request
`POST api/googleanalytics`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `startDate` | string |  required  | 
        `endDate` | string |  required  | 
        `filtersExpression` | string |  optional  | 
        `metrics` | string |  optional  | 
        `dimensions` | string |  optional  | 
        `fieldName` | string |  optional  | 
        `sortOrder` | string |  optional  | 
    
<!-- END_259c759273915c655b1f237b29029215 -->

#Host(Speakers)


The host or conferences are in charge of carrying out the activities
<!-- START_077192157db94670b0aec4f8c3ab858f -->
## _index_: list all host

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/sed/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/sed/host"
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
    "https://apidev.evius.co/api/events/dolores/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"dolorem","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/dolores/host"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "dolorem",
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
    -G "https://apidev.evius.co/api/events/occaecati/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/occaecati/host/1"
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
    "https://apidev.evius.co/api/events/deserunt/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"perferendis","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/deserunt/host/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "perferendis",
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
    "https://apidev.evius.co/api/events/minima/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/minima/host/1"
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

#News Feed


<!-- START_70a22f864b8b2e72e32ac85821bf707e -->
## _index_: list of news of the event.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed"
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
`GET api/events/{event}/newsfeed`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id event

<!-- END_70a22f864b8b2e72e32ac85821bf707e -->

<!-- START_1acb96ce1b68eb8a3c8a1a08a36a1020 -->
## _show_:  view information for a specific news

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed/6107fe65ff324f482d1c7569" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed/6107fe65ff324f482d1c7569"
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
`GET api/events/{event}/newsfeed/{newsfeed}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id event.
    `newsfeed` |  required  | id news.

<!-- END_1acb96ce1b68eb8a3c8a1a08a36a1020 -->

<!-- START_2b5183f2566ebb92311d3d276dbfa1f2 -->
## _store_: create news in an event

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"Los mejores eventos est\u00e1n en Evius","description_complete":"Los eventos en evius son interactivos porque tiene multiples opciones...","description_short":"Los eventos en Evius son los m\u00e1s interactivos y los mejores.","linkYoutube":"https:\/\/www.youtube.com\/watch?v=m1YUmZRfgqU&ab_channel=MG1010","image":"https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/IdKxqboMxU0pvgY3AbRkig4ZptQcUNE4CUvysJIn.png","time":"2021-08-02"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Los mejores eventos est\u00e1n en Evius",
    "description_complete": "Los eventos en evius son interactivos porque tiene multiples opciones...",
    "description_short": "Los eventos en Evius son los m\u00e1s interactivos y los mejores.",
    "linkYoutube": "https:\/\/www.youtube.com\/watch?v=m1YUmZRfgqU&ab_channel=MG1010",
    "image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/IdKxqboMxU0pvgY3AbRkig4ZptQcUNE4CUvysJIn.png",
    "time": "2021-08-02"
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
`POST api/events/{event}/newsfeed`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id event.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | news title.
        `description_complete` | news |  optional  | complete   string.
        `description_short` | string |  optional  | news description short
        `linkYoutube` | string |  optional  | news video
        `image` | string |  optional  | news image.
        `time` | string |  optional  | news date.
    
<!-- END_2b5183f2566ebb92311d3d276dbfa1f2 -->

<!-- START_ebee4149bc53997cd5f982e1177082da -->
## _update_: create news in an event

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"Los mejores eventos est\u00e1n en Evius","description_complete":"Los eventos en evius son interactivos porque tiene multiples opciones...","description_short":"Los eventos en Evius son los m\u00e1s interactivos y los mejores.","linkYoutube":"https:\/\/www.youtube.com\/watch?v=m1YUmZRfgqU&ab_channel=MG1010","image":"https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/IdKxqboMxU0pvgY3AbRkig4ZptQcUNE4CUvysJIn.png","time":"2021-08-02"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Los mejores eventos est\u00e1n en Evius",
    "description_complete": "Los eventos en evius son interactivos porque tiene multiples opciones...",
    "description_short": "Los eventos en Evius son los m\u00e1s interactivos y los mejores.",
    "linkYoutube": "https:\/\/www.youtube.com\/watch?v=m1YUmZRfgqU&ab_channel=MG1010",
    "image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/IdKxqboMxU0pvgY3AbRkig4ZptQcUNE4CUvysJIn.png",
    "time": "2021-08-02"
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
`PUT api/events/{event}/newsfeed/{newsfeed}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id event.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  optional  | news title.
        `description_complete` | news |  optional  | complete   string.
        `description_short` | string |  optional  | news description short
        `linkYoutube` | string |  optional  | news video
        `image` | string |  optional  | news image.
        `time` | string |  optional  | news date.
    
<!-- END_ebee4149bc53997cd5f982e1177082da -->

<!-- START_322b2e85d6ca0584c316bb1b662b654a -->
## _destroy_:  delete a specific news

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed/6107fe65ff324f482d1c7569" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/newsfeed/6107fe65ff324f482d1c7569"
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
`DELETE api/events/{event}/newsfeed/{newsfeed}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id event.
    `newsfeed` |  required  | id news.

<!-- END_322b2e85d6ca0584c316bb1b662b654a -->

#Orders


The purpose of this end point is to store all the information of a user's payment orders
<!-- START_f9301c03a9281c0847565f96e6f723de -->
## _index_: list of all orders

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/orders"
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
            "_id": "5c5209c9f33bd41d17312774",
            "_token": "Iac0K5a4SOBSZGSZfQUFH3kAJhZGMpC8eeT7mAok",
            "payment_gateway_id": "3",
            "first_name": "Larissa",
            "last_name": "Wiley",
            "email": "felipe.martinez+100@mocionsoft.com",
            "order_status_id": "5c4a291e5c93dc0eb1992149",
            "amount": 100000,
            "booking_fee": 0,
            "organiser_booking_fee": 0,
            "discount": 0,
            "account_id": "5c51df3f342254001128a122",
            "event_id": "5c51e165342254001a3b1982",
            "is_payment_received": 1,
            "session_id": 171953,
            "order_reference": "ticket_order_1548880329",
            "taxamt": "0.00",
            "url": "https:\/\/test.placetopay.com\/redirection\/session\/171953\/918bed652065302921a260c87320b2b3",
            "updated_at": "2019-02-21 00:33:59",
            "created_at": "2019-01-30 20:32:09",
            "tickets": [],
            "order_status": {
                "_id": "5c4a291e5c93dc0eb1992149",
                "id": "6",
                "name": "Rechazado"
            }
        },
        {
            "_id": "5c52104df33bd41d187dc7a3",
            "_token": "Iac0K5a4SOBSZGSZfQUFH3kAJhZGMpC8eeT7mAok",
            "payment_gateway_id": "3",
            "first_name": "Larissa",
            "last_name": "Wiley",
            "email": "felipe.martinez+100@mocionsoft.com",
            "order_status_id": "5c4a291e5c93dc0eb1992149",
            "amount": 100000,
            "booking_fee": 0,
            "organiser_booking_fee": 0,
            "discount": 0,
            "account_id": "5c51df3f342254001128a122",
            "event_id": "5c51e165342254001a3b1982",
            "is_payment_received": 1,
            "session_id": 171957,
            "order_reference": "ticket_order_1548881997",
            "taxamt": "0.00",
            "url": "https:\/\/test.placetopay.com\/redirection\/session\/171957\/8081ccf8aa0bb8d0eadb223854bdae8e",
            "updated_at": "2019-02-21 00:34:02",
            "created_at": "2019-01-30 20:59:57",
            "tickets": [],
            "order_status": {
                "_id": "5c4a291e5c93dc0eb1992149",
                "id": "6",
                "name": "Rechazado"
            }
        }
    ]
}
```

### HTTP Request
`GET api/orders`


<!-- END_f9301c03a9281c0847565f96e6f723de -->

<!-- START_285c87403b6cfdebe26bc357f22e870f -->
## _store_: create new order

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"items":"[\"5ea23acbd74d5c4b360ddde2\"]","account_id":"5f450fb3d4267837bb128102","amount":10000,"item_type":"discountCode","discount_codes":[],"properties":"{\"person_type\" : \"Natural\",\"document_type\" : \"CC\", \"email\" : \"correo@correo.com\" , document_number\" : \"1014305626\",\"telephone\" : \"30058744512\",\"date_birth\" : \"2021-01-13\",\"adress\" : \"Calle falsa 123\", \"user_first_name\" : \"Pepe\" ,\"user_last_name\" : \"Lepu\"}"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "items": "[\"5ea23acbd74d5c4b360ddde2\"]",
    "account_id": "5f450fb3d4267837bb128102",
    "amount": 10000,
    "item_type": "discountCode",
    "discount_codes": [],
    "properties": "{\"person_type\" : \"Natural\",\"document_type\" : \"CC\", \"email\" : \"correo@correo.com\" , document_number\" : \"1014305626\",\"telephone\" : \"30058744512\",\"date_birth\" : \"2021-01-13\",\"adress\" : \"Calle falsa 123\", \"user_first_name\" : \"Pepe\" ,\"user_last_name\" : \"Lepu\"}"
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
`POST api/orders`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `items` | array |  required  | the items are the id of the event in case of buying a course or the id of the discount code template in case of buying a code
        `account_id` | string |  required  | id of the user making the purchase
        `amount` | integer |  required  | total order value
        `item_type` | string |  required  | item type discountCode or event
        `discount_codes` | array |  optional  | disount code
        `properties` | object |  optional  | the properties are the additional data required for billing such as: **person_type, document_type, email, document_number, telephone, date_birth, adress**
    
<!-- END_285c87403b6cfdebe26bc357f22e870f -->

<!-- START_7e6be1b9dd04564a7b1298dd260f3183 -->
## _show_: view order-specific information

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/orders/5fbd84e345611e292f04ab92" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/orders/5fbd84e345611e292f04ab92"
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
    "message": "No query results for model [App\\Order] 5fbd84e345611e292f04ab92"
}
```

### HTTP Request
`GET api/orders/{order}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `order` |  required  | order id

<!-- END_7e6be1b9dd04564a7b1298dd260f3183 -->

<!-- START_37f7b8cec13991c44b134bb2186e9d1e -->
## _update_: update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"items":"[\"5ea23acbd74d5c4b360ddde2\"]","account_id":"5f450fb3d4267837bb128102","amount":10000}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "items": "[\"5ea23acbd74d5c4b360ddde2\"]",
    "account_id": "5f450fb3d4267837bb128102",
    "amount": 10000
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
`PUT api/orders/{order}`

`PATCH api/orders/{order}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `items` | array |  optional  | id of the event from which the purchase is made
        `account_id` | string |  optional  | id of the user making the purchase
        `amount` | integer |  optional  | total order value
    
<!-- END_37f7b8cec13991c44b134bb2186e9d1e -->

<!-- START_c280b55cf267ef09fc12c6b09ac78ede -->
## _destroy_: remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/orders/1"
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
`DELETE api/orders/{order}`


<!-- END_c280b55cf267ef09fc12c6b09ac78ede -->

<!-- START_6cc158194854b1566a980ee31d9d889e -->
## _indexByEvent_: display all the orders of an event

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/orders/ordersevent?filtered=%5B%7B%22field%22%3A%22items%22%2C%22value%22%3A%226116b372396b8f5e864f033a%22%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/orders/ordersevent"
);

let params = {
    "filtered": "[{"field":"items","value":"6116b372396b8f5e864f033a"}]",
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
    "data": [
        {
            "_id": "61267f8384bbc0098951d63a",
            "first_name": "Juliana Geraldine",
            "last_name": "",
            "email": "geraldine.garcia+1@mocionsoft.com",
            "items": [
                "6116b372396b8f5e864f033a"
            ],
            "order_status_id": "5c4232c1477041612349941e",
            "amount": 400000,
            "item_type": "auction",
            "account_id": "6026b57a11dbd7582d770e5a",
            "event_id": "5ea23acbd74d5c4b360ddde2",
            "updated_at": "2021-08-25 17:36:03",
            "created_at": "2021-08-25 17:36:03",
            "tickets": [],
            "order_status": {
                "_id": "5c4232c1477041612349941e",
                "id": "5",
                "name": "Esperando Pago"
            }
        },
        {
            "_id": "612922581bf30548566d58a2",
            "updated_at": "2021-09-02 16:50:11",
            "created_at": "2021-08-27 17:35:20",
            "account_id": "611e7345c4076910c41fb132",
            "amount": "100000",
            "email": "geraldine.garcia+2@mocionsoft.com",
            "event_id": "5ea23acbd74d5c4b360ddde2",
            "first_name": "TEST",
            "item_type": "auction",
            "items": [
                "6116b372396b8f5e864f033a"
            ],
            "last_name": "",
            "order_status_id": "5c4232c1477041612349941e",
            "tickets": [],
            "order_status": {
                "_id": "5c4232c1477041612349941e",
                "id": "5",
                "name": "Esperando Pago"
            }
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/events\/5ea23acbd74d5c4b360ddde2\/orders\/ordersevent?page=1",
        "last": "http:\/\/localhost\/api\/events\/5ea23acbd74d5c4b360ddde2\/orders\/ordersevent?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/5ea23acbd74d5c4b360ddde2\/orders\/ordersevent",
        "per_page": 2500,
        "to": 2,
        "total": 2
    }
}
```

### HTTP Request
`GET api/events/{event}/orders/ordersevent`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | event_id required
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filtered` |  optional  | optional filter parameters

<!-- END_6cc158194854b1566a980ee31d9d889e -->

<!-- START_9b8c5a2dde67602a8bbc27b096c1a18c -->
## _index_: display all the Orders of an user

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/users/5f450fb3d4267837bb128102/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/5f450fb3d4267837bb128102/orders"
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
    "message": "No query results for model [App\\User] 5f450fb3d4267837bb128102"
}
```

### HTTP Request
`GET api/users/{user_id}/orders`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user_id` |  required  | 

<!-- END_9b8c5a2dde67602a8bbc27b096c1a18c -->

<!-- START_ce55e3d34b596a57ed26ef1545458299 -->
## _index:_ display all the Orders of an user logueado

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/me/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/me/orders"
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
`GET api/me/orders`


<!-- END_ce55e3d34b596a57ed26ef1545458299 -->

<!-- START_bf072e9c55bd3ec9ea0f7fe31d44b304 -->
## _indexByOrganization_: display all the Orders of an organization

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/orders/ut/orderOrganization" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/orders/ut/orderOrganization"
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
[]
```

### HTTP Request
`GET api/orders/{organization_id}/orderOrganization`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  required  | 

<!-- END_bf072e9c55bd3ec9ea0f7fe31d44b304 -->

#Organization


<!-- START_7d1f86cd2d17ff6e8f7bce97aeabc7f3 -->
## _show_: Display the specified organization.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/organizations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1"
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
    "message": "No query results for model [App\\Organization] 1"
}
```

### HTTP Request
`GET api/organizations/{organization}`


<!-- END_7d1f86cd2d17ff6e8f7bce97aeabc7f3 -->

<!-- START_cb3506455fabe04c9180cc356331fa00 -->
## _contactbyemail_: send email to the admin users of an organization

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/organizations/1/contactbyemail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"message":"et","subject":"doloribus","name":"consectetur","email_user":"et"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/contactbyemail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "message": "et",
    "subject": "doloribus",
    "name": "consectetur",
    "email_user": "et"
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
`POST api/organizations/{id}/contactbyemail`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `message` | string |  required  | 
        `subject` | string |  required  | 
        `name` | string |  required  | user name
        `email_user` | string |  required  | 
    
<!-- END_cb3506455fabe04c9180cc356331fa00 -->

<!-- START_4bd6801ee9e0381bf5b2c4b09ffaad81 -->
## _indexByEventUserInOrganization_: list of users who have paid for events and successfully registered

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/organizations/5f7e33ba3abc2119442e83e8/eventUsers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/5f7e33ba3abc2119442e83e8/eventUsers"
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
        "Tipo de documento": null,
        "Número de documento": null,
        "Tipo de persona": null,
        "Nombre del usuario ": "Juliana García",
        "Correo": "geraldine.garcia+1@mocionsoft.com",
        "Teléfono": null,
        "Dirección": null,
        "Fecha de nacimiento": null,
        "Curso": "¿Cómo aprovechar las oportunidades de la Industria Musical?",
        "Valor del curso": "58000",
        "Total pagado": 1308000,
        "Total descuento": -1250000,
        "Fecha y hora de la compra ": "11\/01\/2021 19:18:02",
        "Referencia de pago": "5ff8cef27ca1764a4f648984"
    },
    {
        "Tipo de documento": "Cedula",
        "Número de documento": "1223123",
        "Tipo de persona": "persona_natural",
        "Nombre del usuario ": "Pedro el escamoso",
        "Correo": "pedroescamoso@gmail.com",
        "Teléfono": null,
        "Dirección": "Diagonal 20 b 25 A 25",
        "Fecha de nacimiento": "2021-01-30",
        "Curso": "¿Cómo aprovechar las oportunidades de la Industria Musical?",
        "Valor del curso": "58000",
        "Total pagado": 58000,
        "Total descuento": 0,
        "Fecha y hora de la compra ": "15\/01\/2021 20:45:15",
        "Referencia de pago": "6001fedbd2cb5903dc60f3d8"
    }
]
```

### HTTP Request
`GET api/organizations/{id}/eventUsers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | id of the organization from which you want to obtain the users registered to the events

<!-- END_4bd6801ee9e0381bf5b2c4b09ffaad81 -->

<!-- START_a2e8f10578923d83fc45f053026f09d8 -->
## _ChangeUserPasswordOrganization_: change user password registered in a organization

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/organizations/enim/changeUserPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"molestias"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/enim/changeUserPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "molestias"
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
`PUT api/organizations/{organization_id}/changeUserPassword`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  required  | string id of the organization in which the user is registered
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | Email of the user who will change his password
    
<!-- END_a2e8f10578923d83fc45f053026f09d8 -->

<!-- START_e6c758d4cc6e3b90231537145573cfd8 -->
## _update_: Update the specified resource in organization.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/organizations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1"
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
    `update_events_itemsMenu` |  optional  | if you want to update the items menu of all events of the organization, send this parameter equal true
    `update_events_user_properties` |  optional  | if you want to update the user_properties of all events of the organization, send this parameter equal true

<!-- END_e6c758d4cc6e3b90231537145573cfd8 -->

<!-- START_b9047b90f047db47c77810fd8de29af9 -->
## _destroy_: Remove the specified organization from storage.

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/organizations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1"
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

<!-- START_fb6e9dbe7a1124499a62eb259b0fbc18 -->
## _ordersUsersPoints_: list all information about all orders pending with the information complete about codes and total products

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/organization/provident/ordersUsersPoints?status=pendiente&date_from=sint&date_to=eaque&type_report=csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organization/provident/ordersUsersPoints"
);

let params = {
    "status": "pendiente",
    "date_from": "sint",
    "date_to": "eaque",
    "type_report": "csv",
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/organization/{organization}/ordersUsersPoints`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization_id
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `status` |  optional  | this paramether has two options: pendiente or despachado. The default value is pendiente.
    `date_from` |  optional  | Format: DD-MM-YYYY If you want to filtered for date this is the initial date.
    `date_to` |  optional  | Format: DD-MM-YYYY If you want to filtered for date this is the finish date.
    `type_report` |  optional  | This parameter allows return format json or csv,

<!-- END_fb6e9dbe7a1124499a62eb259b0fbc18 -->

#Organization User

This model is the
<!-- START_df43e77b8e54b4ebc43bfa2c1b1be609 -->
## _index_: List all user of a organization

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/organizations/1/organizationusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/organizationusers"
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
`GET api/organizations/{organization}/organizationusers`


<!-- END_df43e77b8e54b4ebc43bfa2c1b1be609 -->

<!-- START_a93750b0b379e68b8ec6868184a38740 -->
## _update_: update a register user in organization.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/organizations/voluptates/organizationusers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/voluptates/organizationusers/1"
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
`PUT api/organizations/{organization}/organizationusers/{organizationuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization id
    `user` |  required  | organization id

<!-- END_a93750b0b379e68b8ec6868184a38740 -->

<!-- START_1120b508785531237669def22c99aa6e -->
## _destroy_: delete a sapcific user in the organization

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/organizations/alias/organizationusers/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/alias/organizationusers/et"
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
`DELETE api/organizations/{organization}/organizationusers/{organizationuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization id
    `organizationuser` |  required  | organization user id

<!-- END_1120b508785531237669def22c99aa6e -->

<!-- START_b503be95f61a64248d1c224d6ca8afc5 -->
## _store_: create a new user in a organization

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/organizations/expedita/addorganizationuser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"test+11@mocionsoft.com","names":"test"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/expedita/addorganizationuser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "test+11@mocionsoft.com",
    "names": "test"
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
`POST api/organizations/{organization}/addorganizationuser`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization_id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | user email
        `names` | string |  required  | user names
    
<!-- END_b503be95f61a64248d1c224d6ca8afc5 -->

#Organization User Properties


<!-- START_fde293a40d72b8e03e61bb63ad3a64f6 -->
## _index_: list of user properties of a specific event.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/organizations/1/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/userproperties"
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
`GET api/organizations/{organization}/userproperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  optional  | required.

<!-- END_fde293a40d72b8e03e61bb63ad3a64f6 -->

<!-- START_167f478ffea3087e2d42f6b4df749db6 -->
## _store_: a newly created resource in UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/organizations/1/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/userproperties"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "celular",
    "mandatory": true,
    "visibleByContacts": true,
    "visibleByAdmin": true,
    "label": "Celular",
    "description": "N\u00famero de contacto",
    "type": "number",
    "justonebyattendee": true,
    "order_weight": 1
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
`POST api/organizations/{organization}/userproperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  optional  | required.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | strign |  required  | name of user's property.
        `mandatory` | boolean |  required  | This field indicates that the field in the form cannot be null if it is set to true or false if it can be null.
        `visibleByContacts` | boolean |  required  | visible by contacts if its value is true.
        `visibleByAdmin` | boolean |  required  | visible by admin if its value is true.
        `label` | string |  required  | label that will be visible in the registration form.
        `description` | string |  required  | description.
        `type` | string |  required  | type of character the field accepts in the form,
        `justonebyattendee` | boolean |  required  | 
        `order_weight` | number |  required  | order of fields in the form.
    
<!-- END_167f478ffea3087e2d42f6b4df749db6 -->

<!-- START_8e4161194c0ae11e8741dddf0bd358a8 -->
## _show_: view the specific user propertie.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/organizations/1/userproperties/rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/userproperties/rerum"
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
`GET api/organizations/{organization}/userproperties/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  required  | 
    `id` |  required  | id UserProperties

<!-- END_8e4161194c0ae11e8741dddf0bd358a8 -->

<!-- START_6358afd13bef612f324ae42b40a6078a -->
## _update_: update the specified resource in UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/organizations/1/userproperties/veritatis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/userproperties/veritatis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "celular",
    "mandatory": true,
    "visibleByContacts": true,
    "visibleByAdmin": true,
    "label": "Celular",
    "description": "N\u00famero de contacto",
    "type": "number",
    "justonebyattendee": true,
    "order_weight": 1
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
`PUT api/organizations/{organization}/userproperties/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  required  | 
    `id` |  required  | id UserProperties
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | strign |  optional  | name of user's property.
        `mandatory` | boolean |  optional  | This field indicates that the field in the form cannot be null if it is set to true or false if it can be null.
        `visibleByContacts` | boolean |  optional  | visible by contacts if its value is true.
        `visibleByAdmin` | boolean |  optional  | visible by admin if its value is true.
        `label` | string |  optional  | label that will be visible in the registration form.
        `description` | string |  optional  | description.
        `type` | string |  optional  | type of character the field accepts in the form,
        `justonebyattendee` | boolean |  optional  | 
        `order_weight` | number |  optional  | order of fields in the form.
    
<!-- END_6358afd13bef612f324ae42b40a6078a -->

<!-- START_396b41c70d12c1109e1377fd56016011 -->
## _destroy_: remove the specified resource from UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/organizations/1/userproperties/accusamus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/userproperties/accusamus"
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
`DELETE api/organizations/{organization}/userproperties/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  required  | 
    `id` |  required  | id UserProperties

<!-- END_396b41c70d12c1109e1377fd56016011 -->

#Product

Endpoint that manages event products.
<!-- START_0358a380fb4889756d2a2c7b2af024c6 -->
## _store_: create new register for product.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/aliquid/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Arbol","description":"Esta pintura es de un arbol.","image":"https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/87Pxr9PYNfBEDMbX19CeTU8wwTFHpb2XB3n2bnak.jpg","price":10000,"by":"Evius","short_description":"Pintura de arbol 1x2m","position":11111}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/aliquid/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Arbol",
    "description": "Esta pintura es de un arbol.",
    "image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/87Pxr9PYNfBEDMbX19CeTU8wwTFHpb2XB3n2bnak.jpg",
    "price": 10000,
    "by": "Evius",
    "short_description": "Pintura de arbol 1x2m",
    "position": 11111
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
`POST api/events/{event}/products`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name of image.
        `description` | string |  optional  | description of image.
        `image` | string |  required  | route of image.
        `price` | number |  optional  | 
        `by` | string |  optional  | author or brands of the product.
        `short_description` | string |  optional  | 
        `position` | number |  optional  | position of the product to order them.
    
<!-- END_0358a380fb4889756d2a2c7b2af024c6 -->

<!-- START_1f13f3f69bf70a5e166cb499d630ef85 -->
## _update_: update image of product specific.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/aut/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Arbol","description":"Esta pintura es de un arbol.","image":"https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/87Pxr9PYNfBEDMbX19CeTU8wwTFHpb2XB3n2bnak.jpg","price":10000,"by":"Evius","short_description":"Pintura de arbol 1x2m"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/aut/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Arbol",
    "description": "Esta pintura es de un arbol.",
    "image": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/87Pxr9PYNfBEDMbX19CeTU8wwTFHpb2XB3n2bnak.jpg",
    "price": 10000,
    "by": "Evius",
    "short_description": "Pintura de arbol 1x2m"
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
`PUT api/events/{event}/products/{product}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | name of image.
        `description` | string |  optional  | description of image.
        `image` | string |  optional  | route of image.
        `price` | number |  optional  | 
        `by` | string |  optional  | author or brands of the product.
        `short_description` | string |  optional  | 
    
<!-- END_1f13f3f69bf70a5e166cb499d630ef85 -->

<!-- START_c94f6ea83daf742543be8a079783e5c3 -->
## _destroy_: delete image in the product.

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/illum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/illum"
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
`DELETE api/events/{event}/products/{product}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | 
    `product` |  required  | id of the event to be eliminated

<!-- END_c94f6ea83daf742543be8a079783e5c3 -->

<!-- START_512598b30e73f747a1366ca186b265b8 -->
## _createSilentAuction_: create a silent bid

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/60e8cd558c421b004f2ff082/silentauctionmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"valueOffered":"100000"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/60e8cd558c421b004f2ff082/silentauctionmail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "valueOffered": "100000"
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
`POST api/events/{event}/products/{product}/silentauctionmail`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
    `product` |  required  | product id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `valueOffered` | requires |  optional  | number value offered for an item
    
<!-- END_512598b30e73f747a1366ca186b265b8 -->

<!-- START_2380c7a6b714870fd5872b1a019e807a -->
## _minimumAuctionValue_: valor minimun for auction

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/60e8cd558c421b004f2ff082/minimumauctionvalue" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/60e8cd558c421b004f2ff082/minimumauctionvalue"
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
`GET api/events/{event}/products/{product}/minimumauctionvalue`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
    `product` |  required  | product id

<!-- END_2380c7a6b714870fd5872b1a019e807a -->

<!-- START_bcbfb75febf28221590e61636f620566 -->
## _index_: list product by event.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/ipsam/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/ipsam/products"
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
        "first": "http:\/\/localhost\/api\/events\/ipsam\/products?page=1",
        "last": "http:\/\/localhost\/api\/events\/ipsam\/products?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/ipsam\/products",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/events/{event}/products`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | 

<!-- END_bcbfb75febf28221590e61636f620566 -->

<!-- START_4bef507777cd70c6558f89fe041edc82 -->
## _show_: consult information on a specific product

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/5bb25243b6312771e92c8693/products/voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5bb25243b6312771e92c8693/products/voluptatem"
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
[]
```

### HTTP Request
`GET api/events/{event}/products/{product}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event
    `product` |  required  | product

<!-- END_4bef507777cd70c6558f89fe041edc82 -->

#RSVP

Handle RSVP(invitations for events)
<!-- START_6b8165cc7da505120fbe6aa7aba5356e -->
## _createAndSendRSVP_: send RSVP to users in an event, taking eventUsersIds[] in request to filter which users the RSVP is going to be send to

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/rsvp/sendeventrsvp/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"subject":"nisi","image_header":"at","content_header":"Has sido invitado a el evento","message":"alias","image":"inventore","image_footer":"sunt","eventUsersIds":{"":"\"eventUsersIds\": [\"5f8734c81730821f216b6202\"]"},"include_ical_calendar":false,"include_login_button":true}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rsvp/sendeventrsvp/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "subject": "nisi",
    "image_header": "at",
    "content_header": "Has sido invitado a el evento",
    "message": "alias",
    "image": "inventore",
    "image_footer": "sunt",
    "eventUsersIds": {
        "": "\"eventUsersIds\": [\"5f8734c81730821f216b6202\"]"
    },
    "include_ical_calendar": false,
    "include_login_button": true
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
    `subject` | string |  required  | mail subject Evento virtual Ucronio
        `image_header` | string |  optional  | imagen header
        `content_header` | string |  optional  | 
        `message` | string |  optional  | message that will go in the body of the mail
        `image` | string |  optional  | image that will go in the body of the mail
        `image_footer` | string |  optional  | image footer
        `eventUsersIds[]` | array |  required  | id of users to whom the mail will be sent
        `include_ical_calendar` | boolean |  optional  | field used to show(true) or not(false) the top calendar in the mailing
        `include_login_button` | boolean |  optional  | field used to show (true) or not (false) the event entry button Example : false
    
<!-- END_6b8165cc7da505120fbe6aa7aba5356e -->

#Rol


<!-- START_7fc3643705ffb59eed1a17830c3ca58a -->
## _index_: list Roles.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/rols" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rols"
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
        "_id": "5c1a59b2f33bd40bb67f2322",
        "name": "Administrador",
        "guard_name": "web",
        "updated_at": "2021-07-02 20:58:53",
        "created_at": "2018-12-19 14:46:10",
        "permission_ids": [
            "5c09261df33bd415e22dcdb2",
            "5c092624f33bd415e22dcdb3",
            "5c192400f33bd41b9070cb34",
            "5c192408f33bd41b9070cb35",
            "5c192410f33bd41b9070cb36",
            "5c192428f33bd46c102ec974",
            "5c19242ff33bd46c102ec975",
            "5c19244af33bd450a6022e35",
            "5c192450f33bd450a6022e36",
            "5c192474f33bd41b8f75c275",
            "5c1924bbf33bd46bf33f68f4",
            "5c192513f33bd41b9070cb39",
            "60a5256e5f7827f40e29ff6a",
            "60da094e0aec4f04c21efc28",
            "60da0a3b0aec4f04c21efc29",
            "60da0a4d0aec4f04c21efc2a",
            "60da0a540aec4f04c21efc2b",
            "60da0a7a0aec4f04c21efc2c",
            "60da0a850aec4f04c21efc2d",
            "60da0a8e0aec4f04c21efc2e",
            "60da19790aec4f04c21efc36",
            "60da19850aec4f04c21efc37",
            "60da19920aec4f04c21efc38",
            "60da1f720aec4f04c21efc39",
            "60da359b9e98e826a87fbd22",
            "60da35a29e98e826a87fbd23",
            "60da35a99e98e826a87fbd24",
            "60dba183eb87975d74779482",
            "60dba193ec36591d2368c462",
            "60dba19dc1f76f48b770d5e2",
            "60dba442eb87975d74779483",
            "60dba446ec36591d2368c463",
            "60dba451c1f76f48b770d5e3",
            "60dba4cfeb87975d74779484",
            "60dba4d4ec36591d2368c464",
            "60dba4dbc1f76f48b770d5e4",
            "60dba567eb87975d74779485",
            "60dba56eec36591d2368c465",
            "60dba575c1f76f48b770d5e5",
            "60dba63deb87975d74779486",
            "60dba765ec36591d2368c466",
            "60dba76cc1f76f48b770d5e6",
            "60dba772eb87975d74779487",
            "60de1acbeb87975d74779488",
            "60de1ad1ec36591d2368c467",
            "60de1adbc1f76f48b770d5e7",
            "60de1d39eb87975d74779489",
            "60de1d40ec36591d2368c468",
            "60de1d47c1f76f48b770d5e8",
            "60de1e2fec36591d2368c469",
            "60de1e36c1f76f48b770d5e9",
            "60de1e3ceb87975d7477948a",
            "60df726ac1f76f48b770d5ed",
            "60df7270eb87975d7477948b",
            "60df7279ec36591d2368c46c",
            "60df7dc9c1f76f48b770d5f0",
            "60df7e0d6f08352de91852d2"
        ]
    },
    {
        "_id": "5c1a59dbf33bd43eda347072",
        "name": "Colaborator",
        "guard_name": "web",
        "updated_at": "2018-12-19 14:46:51",
        "created_at": "2018-12-19 14:46:51",
        "permission_ids": [
            "5c092624f33bd415e22dcdb3",
            "5c192474f33bd41b8f75c275",
            "5c1924bbf33bd46bf33f68f4",
            "5c192513f33bd41b9070cb39"
        ]
    },
    {
        "_id": "5c1a5a24f33bd4327b2fe7e2",
        "name": "Checking de creación",
        "guard_name": "web",
        "updated_at": "2018-12-19 14:48:04",
        "created_at": "2018-12-19 14:48:04",
        "permission_ids": [
            "5c192408f33bd41b9070cb35",
            "5c192410f33bd41b9070cb36",
            "5c19242ff33bd46c102ec975",
            "5c19244af33bd450a6022e35"
        ]
    },
    {
        "_id": "5c1a5a45f33bd420173f7a22",
        "name": "Checking de asistentes",
        "guard_name": "web",
        "updated_at": "2018-12-19 14:48:37",
        "created_at": "2018-12-19 14:48:37",
        "permission_ids": [
            "5c19242ff33bd46c102ec975",
            "5c19244af33bd450a6022e35"
        ]
    },
    {
        "_id": "5cdd8e4f1c9d440000924c98",
        "name": "Caja",
        "guard_name": "web",
        "updated_at": "2018-12-19 14:48:37",
        "created_at": "2018-12-19 14:48:37",
        "permission_ids": [
            "5cdd8e051c9d440000ecba74"
        ]
    },
    {
        "_id": "60a81124cbb7314f9b789c92",
        "name": "Administrator",
        "guard_name": "web",
        "updated_at": "2021-05-21 19:59:32",
        "created_at": "2021-05-21 19:59:32",
        "permission_id": [
            "60a81135f0e01f404d789c93"
        ]
    },
    {
        "_id": "60d0b1df47c69f1efb5b7882",
        "name": "AdministratorPrueba1",
        "guard_name": "web",
        "updated_at": "2021-06-21 15:35:59",
        "created_at": "2021-06-21 15:35:59",
        "permission_id": [
            "60a81135f0e01f404d789c93"
        ]
    },
    {
        "_id": "60dca467b38c630f83537e62",
        "name": "Moredator",
        "updated_at": "2021-07-01 20:04:51",
        "created_at": "2021-06-30 17:05:43",
        "permission_ids": [
            "60da0a3b0aec4f04c21efc29",
            "60da0a7a0aec4f04c21efc2c",
            "60da19790aec4f04c21efc36",
            "60da359b9e98e826a87fbd22",
            "60dba183eb87975d74779482",
            "60dba446ec36591d2368c463",
            "60dba4d4ec36591d2368c464",
            "60dba56eec36591d2368c465",
            "60dba76cc1f76f48b770d5e6",
            "60da094e0aec4f04c21efc28",
            "60da0a4d0aec4f04c21efc2a",
            "60da0a850aec4f04c21efc2d",
            "60da19850aec4f04c21efc37",
            "60da35a29e98e826a87fbd23",
            "60dba193ec36591d2368c462",
            "60dba442eb87975d74779483",
            "60dba4cfeb87975d74779484",
            "60dba567eb87975d74779485",
            "60dba765ec36591d2368c466",
            "60de1ad1ec36591d2368c467",
            "60de1acbeb87975d74779488",
            "60de1d40ec36591d2368c468",
            "60de1e36c1f76f48b770d5e9",
            "60de1d39eb87975d74779489",
            "60de1e2fec36591d2368c469"
        ],
        "guard_name": "web"
    },
    {
        "_id": "60e8a7e74f9fb74ccd00dc22",
        "name": "Attendee",
        "guard_name": "web",
        "updated_at": "2021-08-06 19:04:06",
        "created_at": "2021-07-09 19:47:51"
    },
    {
        "_id": "60e8a8b7f6817c280300dc23",
        "name": "Asistente Pago",
        "guard_name": "web",
        "updated_at": "2021-07-09 19:51:19",
        "created_at": "2021-07-09 19:51:19"
    },
    {
        "_id": "619d0c9161162b7bd16fcb82",
        "name": "Universo",
        "event_id": "61816f5a039c0f2db65384a2",
        "updated_at": "2021-11-23 15:45:21",
        "created_at": "2021-11-23 15:45:21"
    },
    {
        "_id": "619d0c8a4c361c44e83f4312",
        "name": "SuperHeroe",
        "event_id": "61816f5a039c0f2db65384a2",
        "updated_at": "2021-11-23 15:45:14",
        "created_at": "2021-11-23 15:45:14"
    },
    {
        "_id": "619d0c819c77b938ad2d9b32",
        "name": "Heroe",
        "event_id": "61816f5a039c0f2db65384a2",
        "updated_at": "2021-11-23 15:45:05",
        "created_at": "2021-11-23 15:45:05"
    }
]
```

### HTTP Request
`GET api/rols`


<!-- END_7fc3643705ffb59eed1a17830c3ca58a -->

<!-- START_fdab2329814b6d25ffefed9f48da5eb1 -->
## _store_: create a new rol

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/rols" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"omnis"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rols"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "omnis"
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
`POST api/rols`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 
    
<!-- END_fdab2329814b6d25ffefed9f48da5eb1 -->

<!-- START_2202681f0ff5cd69c6890b76947e2572 -->
## _update_: update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/rols/aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"illo","event_id":"enim"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rols/aut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "illo",
    "event_id": "enim"
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
`PUT api/rols/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | id rol
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 
        `event_id` | string |  required  | 
    
<!-- END_2202681f0ff5cd69c6890b76947e2572 -->

<!-- START_ce58397abd1351cce023b6c134b472a5 -->
## _show_: information from a specific role

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/rols/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rols/1"
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
    "message": "No query results for model [App\\Rol] 1"
}
```

### HTTP Request
`GET api/rols/{id}`


<!-- END_ce58397abd1351cce023b6c134b472a5 -->

#RoleAttendee


<!-- START_c326d3af496947220548e32f2e10ba93 -->
## _index_: list of the roles of the attendees of an event

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees"
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
    },
    {
        "_id": "5fe0f8a132ccda186f3a9594",
        "name": "Coordinador",
        "event_id": "5ea23acbd74d5c4b360ddde2",
        "updated_at": "2020-12-21 19:33:53",
        "created_at": "2020-12-21 19:33:53"
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
    "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Profesor","event_id":"5fa423eee086ea2d1163343e"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5fa423eee086ea2d1163343e/rolesattendees"
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
    -G "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees/5faefba6b68d6316213f7cc2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees/5faefba6b68d6316213f7cc2"
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
    "https://apidev.evius.co/api/events/1/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/rolesattendees/1"
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
    "https://apidev.evius.co/api/events/1/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/rolesattendees/1"
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
    -G "https://apidev.evius.co/api/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rolesattendees"
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
    -G "https://apidev.evius.co/api/rolesattendees/5faefba6b68d6316213f7cc2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rolesattendees/5faefba6b68d6316213f7cc2"
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
    "https://apidev.evius.co/api/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Profesor","event_id":"5fa423eee086ea2d1163343e"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rolesattendees"
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
    "https://apidev.evius.co/api/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rolesattendees/1"
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
    "https://apidev.evius.co/api/rolesattendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rolesattendees/1"
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
    "https://apidev.evius.co/api/rolesattendees/vero" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/rolesattendees/vero"
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

#Surveys


<!-- START_197591256de6497289ad668a16ae1d87 -->
## _index_: list of surveys of an event

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys"
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
            "_id": "608c5f5f63201e0f5147a086",
            "survey": "Encuesta 1",
            "show_horizontal_bar": false,
            "allow_vote_value_per_user": "false",
            "event_id": "605241e68b276356801236e4",
            "activity_id": null,
            "points": 1,
            "initialMessage": null,
            "time_limit": 0,
            "win_Message": null,
            "neutral_Message": null,
            "lose_Message": null,
            "allow_anonymous_answers": "false",
            "allow_gradable_survey": "false",
            "hasMinimumScore": false,
            "isGlobal": false,
            "freezeGame": false,
            "open": "false",
            "publish": "false",
            "minimumScore": 0,
            "updated_at": "2021-04-30 19:49:51",
            "created_at": "2021-04-30 19:49:51"
        },
        {
            "_id": "60f83b6a4707fd6db001a4f6",
            "survey": "Nombre de encuesta",
            "graphyType": false,
            "allow_vote_value_per_user": false,
            "points": 1,
            "initialMessage": "voluptas",
            "time_limit": 0,
            "allow_anonymous_answers": false,
            "allow_gradable_survey": false,
            "hasMinimumScore": false,
            "isGlobal": false,
            "freezeGame": false,
            "open": false,
            "publish": false,
            "minimumScore": 2313.90005653,
            "event_id": "605241e68b276356801236e4",
            "updated_at": "2021-07-21 15:21:14",
            "created_at": "2021-07-21 15:21:14"
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/events\/605241e68b276356801236e4\/surveys?page=1",
        "last": "http:\/\/localhost\/api\/events\/605241e68b276356801236e4\/surveys?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/605241e68b276356801236e4\/surveys",
        "per_page": 2500,
        "to": 2,
        "total": 2
    }
}
```

### HTTP Request
`GET api/events/{id}/surveys`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string  required event id

<!-- END_197591256de6497289ad668a16ae1d87 -->

<!-- START_23038058c2ee32777d8f8d6893825b70 -->
## _store_: create a new survey

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"survey":"Nombre de encuesta","show_horizontal_bar":false,"allow_vote_value_per_user":false,"activity_id":"et","points":1,"initialMessage":"dignissimos","time_limit":0,"allow_anonymous_answers":false,"allow_gradable_survey":false,"hasMinimumScore":false,"isGlobal":false,"freezeGame":false,"open":false,"publish":false,"minimumScore":121.4673444}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "survey": "Nombre de encuesta",
    "show_horizontal_bar": false,
    "allow_vote_value_per_user": false,
    "activity_id": "et",
    "points": 1,
    "initialMessage": "dignissimos",
    "time_limit": 0,
    "allow_anonymous_answers": false,
    "allow_gradable_survey": false,
    "hasMinimumScore": false,
    "isGlobal": false,
    "freezeGame": false,
    "open": false,
    "publish": false,
    "minimumScore": 121.4673444
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "survey": "Encuesta 1",
    "show_horizontal_bar": false,
    "allow_vote_value_per_user": "false",
    "event_id": "605241e68b276356801236e4",
    "activity_id": "",
    "points": 1,
    "initialMessage": null,
    "time_limit": 0,
    "win_Message": null,
    "neutral_Message": null,
    "lose_Message": null,
    "allow_anonymous_answers": "false",
    "allow_gradable_survey": "false",
    "hasMinimumScore": false,
    "isGlobal": false,
    "freezeGame": false,
    "open": "false",
    "publish": "false",
    "minimumScore": 0
}
```

### HTTP Request
`POST api/events/{id}/surveys`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string  required event id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `survey` | string |  required  | name of survey
        `show_horizontal_bar` | boolean |  optional  | 
        `allow_vote_value_per_user` | boolean |  optional  | 
        `activity_id` |   |  optional  | string
        `points` | number |  optional  | 
        `initialMessage` |   |  optional  | string
        `time_limit` | number |  optional  | 
        `allow_anonymous_answers` | boolean |  optional  | 
        `allow_gradable_survey` | boolean |  optional  | 
        `hasMinimumScore` | boolean |  optional  | 
        `isGlobal` | boolean |  optional  | 
        `freezeGame` | boolean |  optional  | 
        `open` | boolean |  optional  | 
        `publish` | boolean |  optional  | 
        `minimumScore` | number |  optional  | Exmaple: 0
    
<!-- END_23038058c2ee32777d8f8d6893825b70 -->

<!-- START_38bbb52ea61cf253c98556f7aa9fde12 -->
## _show_ : view the information of a specific survey

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086"
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
    "_id": "608c5f5f63201e0f5147a086",
    "survey": "Encuesta 1",
    "show_horizontal_bar": false,
    "allow_vote_value_per_user": "false",
    "event_id": "605241e68b276356801236e4",
    "activity_id": null,
    "points": 1,
    "initialMessage": null,
    "time_limit": 0,
    "win_Message": null,
    "neutral_Message": null,
    "lose_Message": null,
    "allow_anonymous_answers": "false",
    "allow_gradable_survey": "false",
    "hasMinimumScore": false,
    "isGlobal": false,
    "freezeGame": false,
    "open": "false",
    "publish": "false",
    "minimumScore": 0,
    "updated_at": "2021-04-30 19:49:51",
    "created_at": "2021-04-30 19:49:51"
}
```

### HTTP Request
`GET api/events/{id}/surveys/{survey}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string      required event id
    `survey` |  optional  | string  required survey id

<!-- END_38bbb52ea61cf253c98556f7aa9fde12 -->

<!-- START_b13bb17427337f15a17a8eb791626ca6 -->
## _update_: update a specific survey

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"survey":"eligendi","show_horizontal_bar":"ipsa","allow_vote_value_per_user":"sed","activity_id":"repudiandae","points":"cupiditate","initialMessage":"quod","time_limit":"cum","allow_anonymous_answers":"nulla","allow_gradable_survey":"ratione","hasMinimumScore":"voluptatem","isGlobal":"veniam","freezeGame":"repellendus","open":"ut","publish":"facilis","minimumScore":"voluptas"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "survey": "eligendi",
    "show_horizontal_bar": "ipsa",
    "allow_vote_value_per_user": "sed",
    "activity_id": "repudiandae",
    "points": "cupiditate",
    "initialMessage": "quod",
    "time_limit": "cum",
    "allow_anonymous_answers": "nulla",
    "allow_gradable_survey": "ratione",
    "hasMinimumScore": "voluptatem",
    "isGlobal": "veniam",
    "freezeGame": "repellendus",
    "open": "ut",
    "publish": "facilis",
    "minimumScore": "voluptas"
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
`PUT api/events/{id}/surveys/{survey}`

`PATCH api/events/{id}/surveys/{survey}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string      required event id
    `survey` |  optional  | string  required survey id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `survey` | string |  optional  | name of survey
        `show_horizontal_bar` |   |  optional  | boolean
        `allow_vote_value_per_user` |   |  optional  | boolean
        `activity_id` |   |  optional  | string
        `points` |   |  optional  | number
        `initialMessage` |   |  optional  | string
        `time_limit` |   |  optional  | number
        `allow_anonymous_answers` |   |  optional  | boolean
        `allow_gradable_survey` |   |  optional  | boolean
        `hasMinimumScore` |   |  optional  | boolean
        `isGlobal` |   |  optional  | boolean
        `freezeGame` |   |  optional  | boolean
        `open` |   |  optional  | boolean
        `publish` |   |  optional  | boolean
        `minimumScore` |   |  optional  | number
    
<!-- END_b13bb17427337f15a17a8eb791626ca6 -->

<!-- START_ac5a48ef106fc4209e4e5cfbd04e06bc -->
## _destroy_: delete a specific survey

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string      required event id
    `survey` |  optional  | string  required survey id

<!-- END_ac5a48ef106fc4209e4e5cfbd04e06bc -->

#Template Properties Organization


<!-- START_b89bfa5f4fe07e6b363301f36e17d8bc -->
## _index_:list all templates by organization

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/organizations/1/templateproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/templateproperties"
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
`GET api/organizations/{organizaton}/templateproperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization_id

<!-- END_b89bfa5f4fe07e6b363301f36e17d8bc -->

<!-- START_3ddd3733864e17148c51e38a53ba9b3b -->
## _store_: create a new template for organization

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/organizations/1/templateproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Template 1","user_properties":"excepturi"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/templateproperties"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Template 1",
    "user_properties": "excepturi"
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
`POST api/organizations/{organizaton}/templateproperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization_id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | strign |  required  | name temlate.
        `user_properties` | array, |  optional  | if you want to make this structure, see User Properties and User Properties Organization
    
<!-- END_3ddd3733864e17148c51e38a53ba9b3b -->

<!-- START_aa26be3eae817963403348bb963b81a4 -->
## _update_: update the specified template propertie.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/organizations/1/templateproperties/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/templateproperties/qui"
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
`PUT api/organizations/{organizaton}/templateproperties/{templatepropertie}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization_id
    `templatepropertie` |  required  | template id

<!-- END_aa26be3eae817963403348bb963b81a4 -->

<!-- START_7fd1c6c9523bd85bbf4701c560253f99 -->
## _destry_: delete a template specific

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/organizations/1/templateproperties/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organizations/1/templateproperties/1"
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
`DELETE api/organizations/{organizaton}/templateproperties/{templatepropertie}`


<!-- END_7fd1c6c9523bd85bbf4701c560253f99 -->

<!-- START_239f959da521a75bb133a94e90fce443 -->
## _addtemplateevent_: this metho allow add template to an event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/et/templateproperties/1/addtemplateporperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/et/templateproperties/1/addtemplateporperties"
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
`PUT api/events/{event}/templateproperties/{templatepropertie}/addtemplateporperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event_id

<!-- END_239f959da521a75bb133a94e90fce443 -->

#User


Manage users, the users info are stored in the backend and the user auth info (password, email, sms login) is stored in firebase auth. firebaseauth user and backend user are connected thought the uid field generated in firebaseauth.

El manejo de la sessión (si un usuario ingreso al sistema) se maneja usando tokens JWT generados por firebase se maneja un token en la url que se vence cada media hora y un refresh_token almacenado en el usuario para refrescar el token que se pasa por la URL.

Del token en la url se extrae la información del usuario se pasa de esta manera ?token=xxxxxxxxxxxxxxxxx
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## _index_: It&#039;s not posible to query all users in the platform.

Doesn't make sense to query all users. Users main function is to assits to an event
thus make sense to query users going to an event.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users"
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
    "https://apidev.evius.co/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","names":"quos","picture":"http:\/\/www.gravatar.com\/avatar","password":"nesciunt"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "evius@evius.co",
    "names": "quos",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "password": "nesciunt"
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
        `picture` | string |  optional  | 
        `password` | string |  required  | 
    
<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
## _show_: registered User

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/users/5e9caaa1d74d5c2f6a02a3c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/5e9caaa1d74d5c2f6a02a3c2"
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
    "uid": "T9ip4vN0jCV7zzW0WfTGL0QlgD32",
    "email": "juanLopez@gmail.com",
    "emailVerified": false,
    "displayName": "Juan López",
    "disabled": false,
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
    "updated_at": "2021-11-26 18:15:38",
    "created_at": "2020-04-19 19:46:41",
    "names": "New User",
    "refresh_token": "AFxQ4_rdUvw8JWFLi99103lsSgfAXZ5DzgLqoUDF9wZOV_o3tIjxhDbyHf2pY25yagn6auaXbODEW-wv_yxo_sLvruk1m28RNBp4-7BU5NouBBaiyJ81CyNp1lB_UpIch7I0TWmtZkHNuBKmEvxMTRhnAhkr9lRY061DZQPJAhRxkUhmhT1OwbvjbRQvlnFKnTc1ioEpVCKbAG6lm3M4trWa46emq8YfSA",
    "ticket_id": "5efb3da70787930c06043c32",
    "name": "Jhon Smith",
    "others_properties": [],
    "id": "1019140079",
    "tratamientodedatospersonales": true,
    "wanttostayinformed": true,
    "aceptoterminosycondicionesdehabeasdata": true,
    "location": "Colombia",
    "network": {
        "facebook": null,
        "twitter": null,
        "instagram": null,
        "linkedIn": null
    },
    "picture": "https:\/\/cdn-icons.flaticon.com\/png\/512\/2202\/premium\/2202112.png?token=exp=1637267865~hmac=4c8763dd5b9fd19fc334b4f3e3b9e7d6",
    "califications_average": 3.375,
    "pesovoto": "534343e34341",
    "apellido": "bbbb",
    "casa": "casa1",
    "birth_date": "2021-07-02 12:39:30",
    "company": "Testing",
    "dni_number": "123456789",
    "phoneNumber": "571234567891",
    "autorizoeltratamientodemisdatosconrelacionalasfinalidadesinformadas": true,
    "canaldeyoutube": null,
    "ciudad": "Cartagena",
    "codigoCiiuPersona": [
        {
            "label": "112 - Cultivo de arroz",
            "value": "112 - Cultivo de arroz"
        }
    ],
    "cualestuinterescv": "Comprar",
    "departamento": "Departamento",
    "documentodeidentificacion": "12345678",
    "edad": "33",
    "facebook": "facebook1",
    "hacecuantotiempoempezotuemprendimiento": "2019",
    "instagram": null,
    "linkedin": null,
    "niveleducativoseleccionaropcion": null,
    "nivelsocioeconomico": "Estrato 3",
    "nodecelular": "3003002541",
    "nowhatsapp": "3003002541",
    "pais": "Colombia",
    "participascomo": "Persona",
    "pertenecesaalgunodeestosgrupospoblacionales": "Ninguno",
    "pinterest": null,
    "queproductooserviciodeseascomprarpuedesseleccionarvariasopciones": "Teatro",
    "rut": "12345678",
    "seleccionalaactividadserviciooproductoalcualpertenecesdentrodelasindustriascreativasyculturales": "Festivales",
    "sexo": "Masculino",
    "teencuentrasinscritoenelregistrounicodevictimas": "NO",
    "tiktok": null,
    "twitter": null,
    "age": "3434434343434",
    "celular": "3344434",
    "telefono": "132132564",
    "codigodearea": "320320320",
    "fechadenacimiento": "2021-08-18",
    "typeRegister": "pay",
    "datosoloparacontactos": "solo contacto",
    "datovisibleparatodos": "datos visible",
    "politicadeprivacidadterminosycondiciones": null,
    "aceptoquesoyunprofesionaldelasalud": "Sí",
    "cedulaoid": "123456789",
    "contrasena": "mocion2040",
    "especialidad": null,
    "heleidoyaceptolapoliticadeprotecciondedatosterminosycondiciones": "Sí",
    "ingresecelularconcodigodearea": "3333333",
    "perfil": null,
    "code": 57,
    "termino": true,
    "apellidos": "Apellido prueba",
    "aceptalosterminosycondiciones": true,
    "aceptaciondeterminosycondiciones": true,
    "direccion": "Direccion Prueba",
    "cualestuinteres": "Vender",
    "numerodecedula": "343434333",
    "ofreceproductosserviciosoambos": "ObjetoNegocioServicio",
    "selecciondetipodeobjeto": "Describe laddfdf actividad, servicio o producto que prestas",
    "textodeautorizacionparaimplementarenelmeetupfenalcoycolsubsidio": true,
    "imagen": null,
    "actividadeconomica": "Actividad Económica",
    "celularconcodigodearea": "4434343",
    "descripcionemprendimiento": "Descripción emprendimiento",
    "imagendeperfil": "C:\\fakepath\\Jaime.jpeg",
    "interes": "Comprar y Vender",
    "correo": "jaimedaniel.bm91@gmail.com",
    "nombre": "Jaime Daniel",
    "aceptatratamientodedatos": true,
    "cualestuprincipalmotivacionparaparticiparenterritoriosdeoportunidadN": "a. Acceder a conocimiento",
    "deseasregistrartecomo": "Inversionista",
    "nitdelaempresaonumerodeidentificacion": "1203245977",
    "nombrecompletodelaempresauorganizacion": "Prueba",
    "quisierasparticiparenlaruedadenegociosypoderconectarteconotrosnegociosaliadosexpertoseinversionistasN": "No",
    "brevedescripciondelfondodeinversion": "descripcion",
    "cualessontusprincipalesobjetivosalparticiparenestaruedadenegocios": "a. Conectarme con posibles aliados",
    "cualestuprincipalmotivacionparaparticiparenterritoriosdeoportunidad": "f. otra",
    "encualesdelossiguientessectoresinviertestuotufondo": "b. Turismo",
    "enlafundaciongrupobancolombiaqueremosimpulsarlasoportunidadesdeempleabilidaddenuestrosbecariosquisierasapoyaresteproceso": "b. No",
    "fotracual": "otra",
    "inviertescomoempresaopersonanatural": "a. Empresa",
    "nombrecompletodelinversionistaofondodeinversion": "PruebaInversionistaMocion",
    "numerodeidentificaciondelinversionistaofondodeinversion": "3535535",
    "quisierasparticiparenlaruedadenegociosypoderconectarteconotrosnegociosaliadosexpertoseinversionistas": "Sí",
    "tesisdeinversionyetapaenlaqueinviertes": "tesis",
    "initial_token": "eyJhbGciOiJSUzI1NiIsImtpZCI6ImY1NWUyOTRlZWRjMTY3Y2Q5N2JiNWE4MTliYmY3OTA2MzZmMTIzN2UiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiSnVhbiBMw7NwZXoiLCJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vZXZpdXNhdXRoIiwiYXVkIjoiZXZpdXNhdXRoIiwiYXV0aF90aW1lIjoxNjM3MjcxNzA0LCJ1c2VyX2lkIjoiVDlpcDR2TjBqQ1Y3enpXMFdmVEdMMFFsZ0QzMiIsInN1YiI6IlQ5aXA0dk4wakNWN3p6VzBXZlRHTDBRbGdEMzIiLCJpYXQiOjE2MzcyNzE3MDQsImV4cCI6MTYzNzI3NTMwNCwiZW1haWwiOiJqdWFubG9wZXpAZ21haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJmaXJlYmFzZSI6eyJpZGVudGl0aWVzIjp7ImVtYWlsIjpbImp1YW5sb3BlekBnbWFpbC5jb20iXX0sInNpZ25faW5fcHJvdmlkZXIiOiJwYXNzd29yZCJ9fQ.OXfpqMfEDckK92ABpy6QdndH51PIgfUnPz2We6EuwRkmrZNieug2U_sa53kF_N0qDZFC8lV_eyxhfItR2OQMr9ooQ7qZ6Dx0dJTbl9Atxe-tO24I8xrY9vcgj0HN_dAvIiUUNTt9OFGwLrXfunOC7vaaO4OoHIMFiTFrp9L_U6VZVnxGL6e1LajSLQYijaizUHDBzkHR8P2vwqnKsN8bkeHOo3pWZJBwt8MNBiLsq2Jod5uoJ_0803LXuKAyOGPuifQ_qIwKuS4E3SDX7fMJ_hO7zTJjd9eOfgaPbvpzlRoE7Glq9j7TPw_sNqN15T9mrFg3Ba909S3MmZqfD__7iA",
    "cualestuprincipalmotivacionparaparticiparenterritoriosdeoportunidadn": "a. Acceder a conocimiento",
    "quisierasparticiparenlaruedadenegociosypoderconectarteconotrosnegociosaliadosexpertoseinversionistasn": "No",
    "checkedin_at": null,
    "codigo": null,
    "department": "Bolívar",
    "institucionoempresa": "Mocion",
    "profesion": "Analista de pruebas",
    "city": "Medellin",
    "country": "Colombia",
    "organization_ids": "repellat"
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
    -G "https://apidev.evius.co/api/users/loginorcreatefromtoken" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/loginorcreatefromtoken"
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
    "https://apidev.evius.co/api/users/5e9caaa1d74d5c2f6a02a3c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","names":"evius lopez","city":"id","country":"est","picture":"http:\/\/www.gravatar.com\/avatar","organization_ids":"vel","others_properties":"[]"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/5e9caaa1d74d5c2f6a02a3c2"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "evius@evius.co",
    "names": "evius lopez",
    "city": "id",
    "country": "est",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "organization_ids": "vel",
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
        `city` | string |  optional  | 
        `country` | string |  optional  | 
        `picture` | string |  optional  | optional.
        `organization_ids` | string. |  optional  | 
        `others_properties` | array |  optional  | optional dynamic properties of the user you want to place.
    
<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## _delete_: dele a registered user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/1"
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
    -G "https://apidev.evius.co/api/users/currentUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/currentUser"
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

<!-- START_16f3abe301f4f23d3903a26415684533 -->
## _findByEmail_: search for specific user by mail

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/users/findByEmail/evius@evius.co" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/findByEmail/evius@evius.co"
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
[]
```

### HTTP Request
`GET api/users/findByEmail/{email}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `email` |  required  | email del usuario buscado.

<!-- END_16f3abe301f4f23d3903a26415684533 -->

<!-- START_d6882a451eb8c13630c884c87b217994 -->
## _userOrganization_: user lists all the users that belong to an organization, besides this you can filter all the users by **any of the properties** that have

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/organization/1/users?filtered=%5B%7B%22field%22%3A%22others_properties.role%22%2C%22value%22%3A%5B%22admin%22%5D%7D%5D&orderBy=%5B%7B%22field%22%3A%22status%22%2C%22order%22%3A%22desc%22%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/organization/1/users"
);

let params = {
    "filtered": "[{"field":"others_properties.role","value":["admin"]}]",
    "orderBy": "[{"field":"status","order":"desc"}]",
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/organization/{organzation_id}/users`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization_id` |  required  | organization to which the users belong
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filtered` |  optional  | optional filter parameters
    `orderBy` |  optional  | filter parameters

<!-- END_d6882a451eb8c13630c884c87b217994 -->

<!-- START_5382494c391bf1f288b8a7f745638217 -->
## _changeStatusUser_: approve or reject the rol the users teacher ,and send mail of the change of status of the user to the user who created it

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/users/modi/changeStatusUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"status":"approved"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/modi/changeStatusUser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "approved"
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
`PUT api/users/{user_id}/changeStatusUser`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user_id` |  required  | id of the user to be rejected or approved
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `status` | string |  required  | the status update allows for two possible statuses **approved** or **rejected**
    
<!-- END_5382494c391bf1f288b8a7f745638217 -->

<!-- START_eb2ff3ef2cdbbd1f25eccfdb8637e9e5 -->
## _signInWithEmailAndPassword_: login a user

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/users/signInWithEmailAndPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","password":"evius.2040"}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/users/signInWithEmailAndPassword"
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

<!-- START_5e4932deed25f060742369cf403ee20c -->
## _getAccessLink_; get and sent link acces to email to user.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/getloginlink" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/getloginlink"
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
`GET api/getloginlink`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `email` |  optional  | email required user email
    `event_id` |  optional  | event id to redirect user

<!-- END_5e4932deed25f060742369cf403ee20c -->

<!-- START_dae265a702afa4764e8b5bc8f0be7fbc -->
## _signInWithEmailLink_: this end point start the login when the user does click in the link

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/singinwithemaillink" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/singinwithemaillink"
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
`GET api/singinwithemaillink`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `email` |  optional  | email required user email
    `event_id` |  optional  | event id to redirect user

<!-- END_dae265a702afa4764e8b5bc8f0be7fbc -->

#User Properties


<!-- START_80e4098ecf7c46e19bc2ae66dee69b0a -->
## _index_: list of user properties of a specific event.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/5fadbc9c8bc34c4c890c5ee4/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/5fadbc9c8bc34c4c890c5ee4/userproperties"
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
        "name": "email",
        "label": "Correo",
        "unique": false,
        "mandatory": false,
        "type": "email",
        "updated_at": "2021-05-07 16:44:26",
        "created_at": "2020-11-12 22:52:12",
        "_id": "5fadbc9c8bc34c4c890c5ee6",
        "visibleByContacts": "public",
        "author": null,
        "categories": [],
        "event_type": null,
        "organiser": null,
        "organizer": null,
        "currency": {
            "_id": "5c23936fe37db02c715b2a02",
            "id": 1,
            "title": "U.S. Dollar",
            "symbol_left": "$",
            "symbol_right": "",
            "code": "USD",
            "decimal_place": 2,
            "value": 1,
            "decimal_point": ".",
            "thousand_point": ",",
            "status": 1,
            "created_at": "2013-11-29 19=>51=>38",
            "updated_at": "2013-11-29 19=>51=>38"
        },
        "tickets": []
    },
    {
        "name": "names",
        "label": "Nombres Y Apellidos",
        "unique": false,
        "mandatory": false,
        "type": "text",
        "updated_at": "2021-05-07 16:44:26",
        "created_at": "2020-11-12 22:52:12",
        "_id": "5fadbc9c8bc34c4c890c5ee7",
        "visibleByContacts": "public",
        "author": null,
        "categories": [],
        "event_type": null,
        "organiser": null,
        "organizer": null,
        "currency": {
            "_id": "5c23936fe37db02c715b2a02",
            "id": 1,
            "title": "U.S. Dollar",
            "symbol_left": "$",
            "symbol_right": "",
            "code": "USD",
            "decimal_place": 2,
            "value": 1,
            "decimal_point": ".",
            "thousand_point": ",",
            "status": 1,
            "created_at": "2013-11-29 19=>51=>38",
            "updated_at": "2013-11-29 19=>51=>38"
        },
        "tickets": []
    },
    {
        "name": "telefono",
        "mandatory": false,
        "visibleByContacts": "only_for_my_contacts",
        "visibleByAdmin": true,
        "label": "telefono",
        "description": "Descripcion de prueba",
        "type": "text",
        "justonebyattendee": false,
        "order_weight": "2",
        "updated_at": "2021-05-11 15:21:30",
        "created_at": "2021-05-06 22:27:17",
        "_id": "60946d45695acb59ae67cc22",
        "author": null,
        "categories": [],
        "currency": {
            "_id": "5c23936fe37db02c715b2a02",
            "id": 1,
            "title": "U.S. Dollar",
            "symbol_left": "$",
            "symbol_right": "",
            "code": "USD",
            "decimal_place": 2,
            "value": 1,
            "decimal_point": ".",
            "thousand_point": ",",
            "status": 1,
            "created_at": "2013-11-29 19=>51=>38",
            "updated_at": "2013-11-29 19=>51=>38"
        },
        "event_type": null,
        "organiser": null,
        "organizer": null,
        "tickets": []
    },
    {
        "name": "celular",
        "mandatory": true,
        "visibleByContacts": true,
        "visibleByAdmin": true,
        "label": "Celular",
        "description": null,
        "type": "number",
        "justonebyattendee": false,
        "order_weight": "1",
        "updated_at": "2021-05-19 15:04:50",
        "created_at": "2021-05-19 15:04:50",
        "_id": "60a529122eb76a3d787ba477",
        "author": null,
        "categories": [],
        "event_type": null,
        "organiser": null,
        "organizer": null,
        "currency": {
            "_id": "5c23936fe37db02c715b2a02",
            "id": 1,
            "title": "U.S. Dollar",
            "symbol_left": "$",
            "symbol_right": "",
            "code": "USD",
            "decimal_place": 2,
            "value": 1,
            "decimal_point": ".",
            "thousand_point": ",",
            "status": 1,
            "created_at": "2013-11-29 19=>51=>38",
            "updated_at": "2013-11-29 19=>51=>38"
        },
        "tickets": []
    },
    {
        "name": "picture",
        "mandatory": false,
        "visibleByContacts": false,
        "visibleByAdmin": false,
        "label": "picture",
        "description": null,
        "type": "file",
        "justonebyattendee": false,
        "updated_at": "2021-07-09 14:43:30",
        "created_at": "2021-07-09 14:43:30",
        "_id": "60e86092f5925c17670745e8",
        "author": null,
        "categories": [],
        "event_type": null,
        "organiser": null,
        "organizer": null,
        "currency": {
            "_id": "5c23936fe37db02c715b2a02",
            "id": 1,
            "title": "U.S. Dollar",
            "symbol_left": "$",
            "symbol_right": "",
            "code": "USD",
            "decimal_place": 2,
            "value": 1,
            "decimal_point": ".",
            "thousand_point": ",",
            "status": 1,
            "created_at": "2013-11-29 19=>51=>38",
            "updated_at": "2013-11-29 19=>51=>38"
        },
        "tickets": []
    }
]
```

### HTTP Request
`GET api/events/{event_id}/userproperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | required.

<!-- END_80e4098ecf7c46e19bc2ae66dee69b0a -->

<!-- START_ebb5857491760d6d919fb2ee88948798 -->
## _store_: a newly created resource in UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/events/itaque/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/itaque/userproperties"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "celular",
    "mandatory": true,
    "visibleByContacts": true,
    "visibleByAdmin": true,
    "label": "Celular",
    "description": "N\u00famero de contacto",
    "type": "number",
    "justonebyattendee": true,
    "order_weight": 1
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | required.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | strign |  required  | name of user's property.
        `mandatory` | boolean |  required  | This field indicates that the field in the form cannot be null if it is set to true or false if it can be null.
        `visibleByContacts` | boolean |  required  | visible by contacts if its value is true.
        `visibleByAdmin` | boolean |  required  | visible by admin if its value is true.
        `label` | string |  required  | label that will be visible in the registration form.
        `description` | string |  required  | description.
        `type` | string |  required  | type of character the field accepts in the form,
        `justonebyattendee` | boolean |  required  | 
        `order_weight` | number |  required  | order of fields in the form.
    
<!-- END_ebb5857491760d6d919fb2ee88948798 -->

<!-- START_fe05ac86d035509adf2f42088dba696d -->
## _show_: view the specific user propertie.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/sit/userproperties/facilis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/sit/userproperties/facilis"
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
`GET api/events/{event_id}/userproperties/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | id UserProperties

<!-- END_fe05ac86d035509adf2f42088dba696d -->

<!-- START_ed027bf50129713419477bccfbfba928 -->
## _update_: update the specified resource in UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/beatae/userproperties/repellat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/beatae/userproperties/repellat"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "celular",
    "mandatory": true,
    "visibleByContacts": true,
    "visibleByAdmin": true,
    "label": "Celular",
    "description": "N\u00famero de contacto",
    "type": "number",
    "justonebyattendee": true,
    "order_weight": 1
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
    `name` | strign |  optional  | name of user's property.
        `mandatory` | boolean |  optional  | This field indicates that the field in the form cannot be null if it is set to true or false if it can be null.
        `visibleByContacts` | boolean |  optional  | visible by contacts if its value is true.
        `visibleByAdmin` | boolean |  optional  | visible by admin if its value is true.
        `label` | string |  optional  | label that will be visible in the registration form.
        `description` | string |  optional  | description.
        `type` | string |  optional  | type of character the field accepts in the form,
        `justonebyattendee` | boolean |  optional  | 
        `order_weight` | number |  optional  | order of fields in the form.
    
<!-- END_ed027bf50129713419477bccfbfba928 -->

<!-- START_b5b9d1947a929c233745578decd173d6 -->
## _RegisterListFieldOptionTaken_: bloquea un elemento que un asistente ya escogio de un campo tipo lista de elementos con inventario cuando se registra a un evento.

Toca hacerlo asi porque con la concurrencia se nos estaban cruzando dos peticiones simultaneas y solo quedaba con los valores de la última

> Example request:

```bash
curl -X PUT \
    "https://apidev.evius.co/api/events/1/userproperties/1/RegisterListFieldOptionTaken" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/userproperties/1/RegisterListFieldOptionTaken"
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
`PUT api/events/{event_id}/userproperties/{id}/RegisterListFieldOptionTaken`


<!-- END_b5b9d1947a929c233745578decd173d6 -->

<!-- START_c9fea00fc5c42be6bb3201c8cb649333 -->
## _destroy_: remove the specified resource from UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X DELETE \
    "https://apidev.evius.co/api/events/dolor/userproperties/repudiandae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/dolor/userproperties/repudiandae"
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


<!-- START_689c210ebe174946aebc5f5e948631fe -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/test/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/test/auth"
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

<!-- START_33830f7d0c3c97eb68e98898c2d22ae2 -->
## api/eventusers/{event_id}/makeTicketIdaProperty/{ticket_id}
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/eventusers/1/makeTicketIdaProperty/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/eventusers/1/makeTicketIdaProperty/1"
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
0
```

### HTTP Request
`GET api/eventusers/{event_id}/makeTicketIdaProperty/{ticket_id}`


<!-- END_33830f7d0c3c97eb68e98898c2d22ae2 -->

<!-- START_e3cf9cc35163eea18b0500dea24447d3 -->
## api/events/{event_id}/users/{user_id}/asignticketstouser
> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/events/1/users/1/asignticketstouser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/events/1/users/1/asignticketstouser"
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
`GET api/events/{event_id}/users/{user_id}/asignticketstouser`


<!-- END_e3cf9cc35163eea18b0500dea24447d3 -->

<!-- START_739442a2495f200cd4de63da705ac98e -->
## Create model_has_role
role_id
model_id (user_id)
event_id

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/me/contributors/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/me/contributors/events"
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

<!-- START_5935dd03adb1c114810f33ec2303a839 -->
## Display a listing of the contributors of an event resource.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/api/contributors/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/contributors/events/1"
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
`GET api/contributors/events/{event_id}`


<!-- END_5935dd03adb1c114810f33ec2303a839 -->

<!-- START_e2472f0dc8400d5818ee0a4fb92cf7ce -->
## _validateFreeorder_: validates the order in case the purchase value is 0

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/orders/ut/validateFreeorder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/orders/ut/validateFreeorder"
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
`POST api/orders/{order_id}/validateFreeorder`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `order_id` |  required  | 

<!-- END_e2472f0dc8400d5818ee0a4fb92cf7ce -->

<!-- START_17a9af1431c78e54a7d156397fba2c28 -->
## _validatePointOrder_ :validate orders of type points

> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/orders/qui/validatePointOrder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/orders/qui/validatePointOrder"
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
`POST api/orders/{order_id}/validatePointOrder`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `order_id` |  optional  | 

<!-- END_17a9af1431c78e54a7d156397fba2c28 -->

<!-- START_3e560035745c03dfe7c6d4b9bf634a60 -->
## api/orders/{order_id}/validatePointOrderTest
> Example request:

```bash
curl -X POST \
    "https://apidev.evius.co/api/orders/1/validatePointOrderTest" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/api/orders/1/validatePointOrderTest"
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
`POST api/orders/{order_id}/validatePointOrderTest`


<!-- END_3e560035745c03dfe7c6d4b9bf634a60 -->

<!-- START_66df3678904adde969490f2278b8f47f -->
## Authenticate the request for channel access.

> Example request:

```bash
curl -X GET \
    -G "https://apidev.evius.co/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://apidev.evius.co/broadcasting/auth"
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


