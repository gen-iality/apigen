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
    "https://api.evius.co/api/events/eum/duplicateactivitie/voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/eum/duplicateactivitie/voluptatem"
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
    -G "https://api.evius.co/api/events/605241e68b276356801236e4/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/605241e68b276356801236e4/activities"
);

let headers = {
    "Content-Type": "application/json",
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
        "to": 1,
        "total": 1
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
    -G "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/activities/60804c6e6b7150714f20d122" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/activities/60804c6e6b7150714f20d122"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"PRIMERA ACTIVIDAD","subtitle":"Subtitulo primera actividad","image":"https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg","description":"Primera actividad del evento","capacity":50,"event_id":"5fa423eee086ea2d1163343e","datetime_end":"2020-10-14 14:11","datetime_start":"2020-10-14 14:50"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/activities/1"
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
    "https://api.evius.co/api/events/5dbc9c65d74d5c5853222222/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5dbc9c65d74d5c5853222222/activities/1"
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
    "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/createmeeting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"activity_datetime_start":"2020-10-14 14:11","activity_name":"non","activity_description":"dolores"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5fa423eee086ea2d1163343e/createmeeting/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_datetime_start": "2020-10-14 14:11",
    "activity_name": "non",
    "activity_description": "dolores"
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
    "https://api.evius.co/api/events/cumque/activities/neque/hostAvailability" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"host_ids":"[\"KthHMroFQK24I97YoqxBZw\" , \"FIRVnSoZR7WMDajgtzf5Uw\" , \"15DKHS_6TqWIFpwShasM4w\" , \"2m-YaXq_TW2f791cVpP8og\", \"mSkbi8PmSSqQEWsm6FQiAA\"]","host_id":"KthHMroFQK24I97YoqxBZw","date_start_zoom":"2021-02-08T07:30:00","date_end_zoom":"2021-02-08T09:30:00"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/cumque/activities/neque/hostAvailability"
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
    "https://api.evius.co/api/events/eos/activities/quia/register_and_checkin_to_activity" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/eos/activities/quia/register_and_checkin_to_activity"
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
    "https://api.evius.co/api/events/1/activities/mettings_zoom/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/activities/mettings_zoom/1"
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

#ActivityAssistant


<!-- START_eca15b751105fbb8f3ff752e6f4428a7 -->
## _index_: List of the activity_assitans

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/events/suscipit/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"5e9caaa1d74d5c2f6a02a3c2","activity_id":"5fa44f6ba8bf7449e65dae32"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/suscipit/activities_attendees"
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
    -G "https://api.evius.co/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees/5ed66ce2a6929562725bd7c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees/5ed66ce2a6929562725bd7c2"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/events/dolores/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/dolores/activities_attendees/1"
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
    "https://api.evius.co/api/events/ad/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/ad/activities_attendees/1"
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
    -G "https://api.evius.co/api/me/events/rerum/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/me/events/rerum/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/events/ipsam/activities_attendees/eum/check_in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/ipsam/activities_attendees/eum/check_in"
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
    -G "https://api.evius.co/api/categories/5bb25243b6312771e92c8693" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/categories/5bb25243b6312771e92c8693"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "https://api.evius.co/api/categories/organizations/5f7e33ba3abc2119442e83e8" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/categories/organizations/5f7e33ba3abc2119442e83e8"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Animales","image":"https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/gato-atigrado-triste-redes.jpg?alt=media&token=2cd2161b-43f7-42a8-87e6-cf571e83e660","organization_ids":"[5f7e33ba3abc2119442e83e8]"}'

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
    "https://api.evius.co/api/categories/5bb25243b6312771e92c8693" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"sint"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/categories/5bb25243b6312771e92c8693"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "sint"
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

#DiscountCode


<!-- START_a5713fe21a364fcdf05d44f3e7a88ade -->
## _index_: list of discount codes by template

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quantity":2}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code"
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
    -G "https://api.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code/5fcbf67721bfcb1393450fc3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code/5fcbf67721bfcb1393450fc3"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/discountcodetemplate/1/code/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/1/code/1"
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
    "https://api.evius.co/api/discountcodetemplate/incidunt/code/libero" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/incidunt/code/libero"
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
    "https://api.evius.co/api/code/validatecode" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"Nyd0jOpQ","event_id":"5ea23acbd74d5c4b360ddde2","organization_id":"quod"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/code/validatecode"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "Nyd0jOpQ",
    "event_id": "5ea23acbd74d5c4b360ddde2",
    "organization_id": "quod"
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
    "https://api.evius.co/api/code/redeem_point_code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"ad"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/code/redeem_point_code"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "ad"
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

#DiscountCodeTemplate


The discount template is used to generate the discount codes, along with their percentage and the limit of uses for each code.
<!-- START_201aa1c9edd47d2be21f4e3fc581bd0d -->
## _index_: list all Discount Code Templates

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/discountcodetemplate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/discountcodetemplate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Curso de regalo","use_limit":1,"discount":100,"event_id":"5ea23acbd74d5c4b360ddde2","organization_id":"5e9caaa1d74d5c2f6a02a3c3","discount_type":"maiores"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate"
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
    "discount_type": "maiores"
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
    -G "https://api.evius.co/api/discountcodetemplate/5fcee46a27b131731965ba7f" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/5fcee46a27b131731965ba7f"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/discountcodetemplate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Curso de regalo","use_limit":1,"discount":100}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/1"
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
    "https://api.evius.co/api/discountcodetemplate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/1"
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
    "https://api.evius.co/api/discountcodetemplate/1/importCodes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"":{"json":"{\"codes\":[{\"code\":\"160792352\"},{\"code\":\"204692331\"}]}"}}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/1/importCodes"
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
    -G "https://api.evius.co/api/discountcodetemplate/findByOrganization/5e9caaa1d74d5c2f6a02a3c3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/discountcodetemplate/findByOrganization/5e9caaa1d74d5c2f6a02a3c3"
);

let headers = {
    "Content-Type": "application/json",
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
            "name": "evius co",
            "updated_at": "2020-04-19 19:46:41",
            "created_at": "2020-04-19 19:46:41",
            "footer_image_email": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/marinella-73b50.appspot.com\/o\/organizacion%2FfooterMarinela1.png?alt=media&token=b6e908f5-222b-4f72-9c16-f5cae2e5deda"
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
            "name": "evius co",
            "updated_at": "2020-04-19 19:46:41",
            "created_at": "2020-04-19 19:46:41",
            "footer_image_email": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/marinella-73b50.appspot.com\/o\/organizacion%2FfooterMarinela1.png?alt=media&token=b6e908f5-222b-4f72-9c16-f5cae2e5deda"
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
    -d '{"name":"Programming course","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"adipisci","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category":[],"location":"et","extra_config":{},"status":"debitis"}'

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
    "picture": "adipisci",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category": [],
    "location": "et",
    "extra_config": {},
    "status": "debitis"
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
    -d '{"name":"Programming course","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"illo","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category":[],"location":"quos","extra_config":{},"status":"ea"}'

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
    "picture": "illo",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category": [],
    "location": "quos",
    "extra_config": {},
    "status": "ea"
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

<!-- START_738ca5bedb446a3c28429c4257c4a4af -->
## _changeStatusEvent_: approve or reject the courses **&#039;draft&#039;**, and send mail of the change of status of the event to the user who created it

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/omnis/changeStatusEvent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"status":"approved"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/omnis/changeStatusEvent"
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

<!-- START_08180c1785ee9a816b6fa5cdf32ece34 -->
## _EventbyUsers_: search of events by user organizer.

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/users/incidunt/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/incidunt/events"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/users\/incidunt\/events?page=1",
        "last": "http:\/\/localhost\/api\/users\/incidunt\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/users\/incidunt\/events",
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
    -G "https://api.evius.co/api/organizations/deserunt/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/organizations/deserunt/events"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/organizations\/deserunt\/events?page=1",
        "last": "http:\/\/localhost\/api\/organizations\/deserunt\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/organizations\/deserunt\/events",
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
    -d '{"name":"iste"}'

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
    "name": "iste"
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
    -G "https://api.evius.co/api/events/1/eventusers?filtered=%5B%7B%22id%22%3A%22event_type_id%22%2C%22value%22%3A%5B%225bb21557af7ea71be746e98x%22%2C%225bb21557af7ea71be746e98b%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/eventusers"
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
    `filtered` |  optional  | optional filter parameters

<!-- END_741efed688409cc5b0c2673b73da037b -->

<!-- START_a365aa3932cace4bde297c80cef75050 -->
## _show:_ consult an EventUser by assistant id

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/qui/eventusers/inventore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/qui/eventusers/inventore"
);

let headers = {
    "Content-Type": "application/json",
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
    "message": "No query results for model [App\\Attendee] inventore"
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

<!-- START_eed9d2ac9ae0f6e3669f6613fa1d351c -->
## _createUserAndAddtoEvent_:create user and add it to an event

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events/debitis/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"ut","name":"incidunt","password":"exercitationem","other_params,":{"":{"":{"":"sit"}}}}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/debitis/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "ut",
    "name": "incidunt",
    "password": "exercitationem",
    "other_params,": {
        "": {
            "": {
                "": "sit"
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

<!-- START_882953c7fc55a0465ff69cdc398811be -->
## _update_:update a specific assistant

> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/blanditiis/eventusers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"officia","name":"neque","other_params,":{"":{"":{"":"laudantium"}}}}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/blanditiis/eventusers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "officia",
    "name": "neque",
    "other_params,": {
        "": {
            "": {
                "": "laudantium"
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
## __delete:__ remove a specific attendee from an event.

> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/events/1/eventusers/commodi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/eventusers/commodi"
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

<!-- START_7ea69d252da861fe068b097ff9fb8ec9 -->
## _indexByUserInEvent_: list of users by events

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/me/eventusers/event/velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/me/eventusers/event/velit"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/me\/eventusers\/event\/velit?page=1",
        "last": "http:\/\/localhost\/api\/me\/eventusers\/event\/velit?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/me\/eventusers\/event\/velit",
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

<!-- START_1b30bab6e9ef7c312e1ee78d85ac2dfa -->
## _meInEvent_: user information logged into the event

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/me/events/qui/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/me/events/qui/eventusers"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_314ab10189ffcbcaaab1ed19eb9dd21f -->
## _ByUserInEvent_ : list of users by events

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/eventusers/event/vel/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/eventusers/event/vel/user/1"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_57c90d35e9b8557bc5dfc7c6cedcd846 -->
## api/events/{event_id}/eventusers/{id}/unsubscribe
> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/1/eventusers/1/unsubscribe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/eventusers/1/unsubscribe"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event_id}/eventusers/{id}/unsubscribe`


<!-- END_57c90d35e9b8557bc5dfc7c6cedcd846 -->

<!-- START_6b56a32b833284ebacc99706a28295f7 -->
## _transferEventuserAndEnrollToActivity_ : transfer Eventuser And Enroll To Activity

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/eventusers/1/tranfereventuser/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/eventusers/1/tranfereventuser/1"
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

<!-- START_cd20adcf5c26e47f21f72d0301544be1 -->
## _changeUserPassword_: change user password

> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/veniam/changeUserPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"labore"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/veniam/changeUserPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "labore"
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
    -d '{"file":"sit"}'

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
    "file": "sit"
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
    "https://api.evius.co/api/files/uploadbase/ex" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"distinctio","type":"explicabo"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/files/uploadbase/ex"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "distinctio",
    "type": "explicabo"
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
    -G "https://api.evius.co/api/events/in/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/in/host"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/events/consequatur/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"facere","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/consequatur/host"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "facere",
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
    -G "https://api.evius.co/api/events/dolorum/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/dolorum/host/1"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/events/sit/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"omnis","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/sit/host/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "omnis",
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
    "https://api.evius.co/api/events/minima/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/minima/host/1"
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

#Orders


The purpose of this end point is to store all the information of a user's payment orders
<!-- START_f9301c03a9281c0847565f96e6f723de -->
## _index_: list of all orders

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/orders"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"items":"[\"5ea23acbd74d5c4b360ddde2\"]","account_id":"5f450fb3d4267837bb128102","amount":10000,"item_type":"discountCode","discount_codes":[],"properties":"{\"person_type\" : \"Natural\",\"document_type\" : \"CC\", \"email\" : \"correo@correo.com\" , document_number\" : \"1014305626\",\"telephone\" : \"30058744512\",\"date_birth\" : \"2021-01-13\",\"adress\" : \"Calle falsa 123\", \"user_first_name\" : \"Pepe\" ,\"user_last_name\" : \"Lepu\"}"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/orders"
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
    -G "https://api.evius.co/api/orders/5fbd84e345611e292f04ab92" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/orders/5fbd84e345611e292f04ab92"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"items":"[\"5ea23acbd74d5c4b360ddde2\"]","account_id":"5f450fb3d4267837bb128102","amount":10000}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/orders/1"
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
    "https://api.evius.co/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/orders/1"
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

<!-- START_9b8c5a2dde67602a8bbc27b096c1a18c -->
## _index_: display all the Orders of an user

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/users/5f450fb3d4267837bb128102/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/5f450fb3d4267837bb128102/orders"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "https://api.evius.co/api/me/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/me/orders"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "https://api.evius.co/api/orders/hic/orderOrganization" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/orders/hic/orderOrganization"
);

let headers = {
    "Content-Type": "application/json",
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


<!-- START_cb3506455fabe04c9180cc356331fa00 -->
## _contactbyemail_: send email to the admin users of an organization

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/organizations/1/contactbyemail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"message":"qui","subject":"cum","name":"impedit","email_user":"beatae"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/organizations/1/contactbyemail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "message": "qui",
    "subject": "cum",
    "name": "impedit",
    "email_user": "beatae"
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
    -G "https://api.evius.co/api/organizations/5f7e33ba3abc2119442e83e8/eventUsers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/organizations/5f7e33ba3abc2119442e83e8/eventUsers"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/organizations/officiis/changeUserPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"ipsam"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/organizations/officiis/changeUserPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "ipsam"
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

#RSVP

Handle RSVP(invitations for events)
<!-- START_6b8165cc7da505120fbe6aa7aba5356e -->
## _createAndSendRSVP_: send RSVP to users in an event, taking eventUsersIds[] in request to filter which users the RSVP is going to be send to

> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/rsvp/sendeventrsvp/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"subject":"occaecati","image_header":"illo","content_header":"Has sido invitado a el evento","message":"aliquid","image":"velit","image_footer":"quaerat","eventUsersIds":{"":"\"eventUsersIds\": [\"5f8734c81730821f216b6202\"]"},"include_ical_calendar":false,"include_login_button":true}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/rsvp/sendeventrsvp/qui"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "subject": "occaecati",
    "image_header": "illo",
    "content_header": "Has sido invitado a el evento",
    "message": "aliquid",
    "image": "velit",
    "image_footer": "quaerat",
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

#RegistrationMetrics


The categories are a facility for classification of events
<!-- START_fcdb136073394fe0495a34733a2a3537 -->
## _index_: List of registration metrics of event specific
Format filters dinamic: **filtered=[{&quot;field&quot;:&quot;date&quot;,&quot;value&quot;:[&quot;2021-01-01&quot;]}]**

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/vel/registrationmetrics?filtered=%5B%7B%22field%22%3A%22date%22%2C%22value%22%3A%5B%222021-01-01%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/vel/registrationmetrics"
);

let params = {
    "filtered": "[{"field":"date","value":["2021-01-01"]}]",
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
            "_id": "609167e40a57106dc62abf42",
            "quantity": 2,
            "event_id": "60254f049619c7059a0fc03a",
            "date": "2021-05-04",
            "updated_at": "2021-05-04 15:28:04",
            "created_at": "2021-05-04 15:27:32"
        }
    ],
    "links": {
        "first": "https:\/\/api.evius.co\/api\/events\/60254f049619c7059a0fc03a\/registrationmetrics?page=1",
        "last": "https:\/\/api.evius.co\/api\/events\/60254f049619c7059a0fc03a\/registrationmetrics?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "https:\/\/api.evius.co\/api\/events\/60254f049619c7059a0fc03a\/registrationmetrics",
        "per_page": 2500,
        "to": 1,
        "total": 1
    }
}
```

### HTTP Request
`GET api/events/{event_id}/registrationmetrics`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filtered` |  optional  | optional filter parameters

<!-- END_fcdb136073394fe0495a34733a2a3537 -->

<!-- START_7ec6376374a3e4cfcd7787b464a3b52f -->
## _store_: create new metrics

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://api.evius.co/api/events/et/registrationmetrics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quantity":1,"date":"2021-01-01"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/et/registrationmetrics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "quantity": 1,
    "date": "2021-01-01"
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
    "_id": "609167e40a57106dc62abf42",
    "quantity": 2,
    "event_id": "60254f049619c7059a0fc03a",
    "date": "2021-05-04",
    "updated_at": "2021-05-04 15:28:04",
    "created_at": "2021-05-04 15:27:32"
}
```

### HTTP Request
`POST api/events/{event_id}/registrationmetrics`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `quantity` | number |  required  | 
        `date` | string |  required  | 
    
<!-- END_7ec6376374a3e4cfcd7787b464a3b52f -->

<!-- START_3c26525fdeb2a75180024d04c50a4d4f -->
## _show_: consult information on a specific registration metrics

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/1/registrationmetrics/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/registrationmetrics/1"
);

let headers = {
    "Content-Type": "application/json",
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
    "_id": "609167e40a57106dc62abf42",
    "quantity": 2,
    "event_id": "60254f049619c7059a0fc03a",
    "date": "2021-05-04",
    "updated_at": "2021-05-04 15:28:04",
    "created_at": "2021-05-04 15:27:32"
}
```

### HTTP Request
`GET api/events/{event_id}/registrationmetrics/{registrationmetric}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | registration metrics id required

<!-- END_3c26525fdeb2a75180024d04c50a4d4f -->

<!-- START_3e2a29ccad577612483cb6a04e1e8919 -->
## _update_: update registration metrics

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://api.evius.co/api/events/1/registrationmetrics/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quantity":1,"date":"2021-01-01"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/registrationmetrics/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "quantity": 1,
    "date": "2021-01-01"
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
    "_id": "609167e40a57106dc62abf42",
    "quantity": 2,
    "event_id": "60254f049619c7059a0fc03a",
    "date": "2021-05-04",
    "updated_at": "2021-05-04 15:28:04",
    "created_at": "2021-05-04 15:27:32"
}
```

### HTTP Request
`PUT api/events/{event_id}/registrationmetrics/{registrationmetric}`

`PATCH api/events/{event_id}/registrationmetrics/{registrationmetric}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | registration metrics id required
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `quantity` | number |  optional  | 
        `date` | string |  optional  | 
    
<!-- END_3e2a29ccad577612483cb6a04e1e8919 -->

<!-- START_7c7fb10ea4830ce845521ebed49057e5 -->
## _destroy_: Remove the specified resource from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://api.evius.co/api/events/1/registrationmetrics/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/registrationmetrics/1"
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
`DELETE api/events/{event_id}/registrationmetrics/{registrationmetric}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | registration metrics id required

<!-- END_7c7fb10ea4830ce845521ebed49057e5 -->

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
    "https://api.evius.co/api/rolesattendees/occaecati" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/rolesattendees/occaecati"
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
    -G "https://api.evius.co/api/events/605241e68b276356801236e4/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/605241e68b276356801236e4/surveys"
);

let headers = {
    "Content-Type": "application/json",
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
        "to": 1,
        "total": 1
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
    "https://api.evius.co/api/events/605241e68b276356801236e4/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"survey":"Nombre de encuesta","show_horizontal_bar":false,"allow_vote_value_per_user":false,"activity_id":"nisi","points":1,"initialMessage":"veniam","time_limit":0,"allow_anonymous_answers":false,"allow_gradable_survey":false,"hasMinimumScore":false,"isGlobal":false,"freezeGame":false,"open":false,"publish":false,"minimumScore":260.4}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/605241e68b276356801236e4/surveys"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "survey": "Nombre de encuesta",
    "show_horizontal_bar": false,
    "allow_vote_value_per_user": false,
    "activity_id": "nisi",
    "points": 1,
    "initialMessage": "veniam",
    "time_limit": 0,
    "allow_anonymous_answers": false,
    "allow_gradable_survey": false,
    "hasMinimumScore": false,
    "isGlobal": false,
    "freezeGame": false,
    "open": false,
    "publish": false,
    "minimumScore": 260.4
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
    -G "https://api.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"survey":"fugit","show_horizontal_bar":"non","allow_vote_value_per_user":"reiciendis","activity_id":"odit","points":"ea","initialMessage":"et","time_limit":"dolorem","allow_anonymous_answers":"rerum","allow_gradable_survey":"exercitationem","hasMinimumScore":"quam","isGlobal":"quam","freezeGame":"incidunt","open":"facere","publish":"sequi","minimumScore":"est"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "survey": "fugit",
    "show_horizontal_bar": "non",
    "allow_vote_value_per_user": "reiciendis",
    "activity_id": "odit",
    "points": "ea",
    "initialMessage": "et",
    "time_limit": "dolorem",
    "allow_anonymous_answers": "rerum",
    "allow_gradable_survey": "exercitationem",
    "hasMinimumScore": "quam",
    "isGlobal": "quam",
    "freezeGame": "incidunt",
    "open": "facere",
    "publish": "sequi",
    "minimumScore": "est"
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
    "https://api.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086"
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
    -d '{"email":"evius@evius.co","names":"dignissimos","city":"est","country":"sit","picture":"http:\/\/www.gravatar.com\/avatar","password":"amet","others_properties":"[]","organization_ids":"[\"5f7e33ba3abc2119442e83e8\" , \"5e9caaa1d74d5c2f6a02a3c3\"][\"5f7e33ba3abc2119442e83e8\" , \"5e9caaa1d74d5c2f6a02a3c3\"]"}'

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
    "names": "dignissimos",
    "city": "est",
    "country": "sit",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "password": "amet",
    "others_properties": "[]",
    "organization_ids": "[\"5f7e33ba3abc2119442e83e8\" , \"5e9caaa1d74d5c2f6a02a3c3\"][\"5f7e33ba3abc2119442e83e8\" , \"5e9caaa1d74d5c2f6a02a3c3\"]"
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
        `city` | string |  optional  | 
        `country` | string |  optional  | 
        `picture` | string |  optional  | optional.
        `password` | string |  optional  | optional if not provided a default evius.2040 password is assigned
        `others_properties` | array |  optional  | dynamic properties of the user you want to place
        `organization_ids` | array |  optional  | organizations to which the user belongs, in order to access their events
    
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
    "displayName": "Evius",
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
    "updated_at": "2021-05-03 15:36:29",
    "created_at": "2020-04-19 19:46:41",
    "names": "Evius",
    "refresh_token": "AGEhc0A6VLkj3h6J93u8lTGaWIVa8O8vFmSZnJeL7olKR23Jc451SQdULRoNnHeYOMe1s1IEco_lzSBGhhzNoFkyrbOLFJXlifw4jcynHlnOv4-rdCoO4HvTLX0LNftCunWEZjYnSaznFFSupHs_7smyvTqhC2WY-qXh5ahxw3dS7BdSPwf5ECaFkNOTNXhhb2HBcGM_5AB3YlUkVvB2Xc5euMvkgMuY9A",
    "ticket_id": "5efb3da70787930c06043c32",
    "name": "Evius",
    "others_properties": [],
    "participacomo": "Persona",
    "password2": "fantasma2040",
    "aceptaterminosycondiciones": "TRUE",
    "aceptoterminosycondiciones": true,
    "id": "1019140079",
    "casa": null,
    "peso": "1",
    "estaesunadescripciondelformulario": "1122334455AAAAAa",
    "company": "Evius",
    "lastname": "López",
    "pais": "Colombia",
    "tratamientodedatospersonales": true,
    "wanttostayinformed": true,
    "test": "c",
    "age": "26",
    "cargo": "Tecnologia",
    "celular": "3134859670",
    "ciudad": "Valledupar",
    "oficina": "Soporte evius",
    "aceptoterminosycondicionesdehabeasdata": true,
    "cedula": "1234567890",
    "cargalistadepreciosenpdf": null,
    "cargaunpdfconlasfotosdelosproductosotuportafoliootupresentacion": null,
    "cualestuinteres": "Comprar",
    "departamento": "Amazonas",
    "escribeunadescripciondetuproductooservicio": "Mochilas",
    "facebook": null,
    "instagram": null,
    "nivelsocioeconomico": "Estrato 2",
    "nodecelular": "1050123456",
    "nowhatsapp": "3200000000",
    "apellidos": "Manuel",
    "esmiembrodelareddejovenesatrevete": "Si",
    "politicadetratamientospersonales": true
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
    -d '{"email":"evius@evius.co","names":"evius lopez","city":"fugit","country":"dolor","picture":"http:\/\/www.gravatar.com\/avatar","organization_ids":"sed","others_properties":"[]"}'

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
    "city": "fugit",
    "country": "dolor",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "organization_ids": "sed",
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
        "displayName": "Evius",
        "names": "Evius",
        "name": "Evius",
        "id": "1019140079"
    },
    {
        "_id": "5fd8acedef1a2c4aff16aed5",
        "email": "evius@evius.co",
        "names": "evius"
    },
    {
        "_id": "5fd8ad83ae5762445257daa6",
        "email": "evius@evius.co",
        "names": "evius"
    },
    {
        "_id": "605759ea2a23c701322d7e49",
        "email": "evius@evius.co",
        "names": "asdf",
        "displayName": "asdf",
        "name": "Soporte"
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

<!-- START_d6882a451eb8c13630c884c87b217994 -->
## _userOrganization_: user lists all the users that belong to an organization, besides this you can filter all the users by **any of the properties** that have

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/organization/1/users?filtered=%5B%7B%22field%22%3A%22others_properties.role%22%2C%22value%22%3A%5B%22admin%22%5D%7D%5D&orderBy=%5B%7B%22field%22%3A%22status%22%2C%22order%22%3A%22desc%22%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/organization/1/users"
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
    "https://api.evius.co/api/users/odit/changeStatusUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"status":"approved"}'

```

```javascript
const url = new URL(
    "https://api.evius.co/api/users/odit/changeStatusUser"
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

<!-- START_e3cf9cc35163eea18b0500dea24447d3 -->
## api/events/{event_id}/users/{user_id}/asignticketstouser
> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/events/1/users/1/asignticketstouser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/events/1/users/1/asignticketstouser"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_33830f7d0c3c97eb68e98898c2d22ae2 -->
## api/eventusers/{event_id}/makeTicketIdaProperty/{ticket_id}
> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/eventusers/1/makeTicketIdaProperty/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/eventusers/1/makeTicketIdaProperty/1"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_5935dd03adb1c114810f33ec2303a839 -->
## Display a listing of the contributors of an event resource.

> Example request:

```bash
curl -X GET \
    -G "https://api.evius.co/api/contributors/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/contributors/events/1"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://api.evius.co/api/orders/ut/validateFreeorder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/orders/ut/validateFreeorder"
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
    "https://api.evius.co/api/orders/et/validatePointOrder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.evius.co/api/orders/et/validatePointOrder"
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


