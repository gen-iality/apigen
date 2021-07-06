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

#Activity


The activities within an event are **sessions, talks, lessons or conferences** in which specific topics are discussed.

Each activity has its **date , time and duration**.

These activities, according to the organizer, can be carried out either in person or virtually.
<!-- START_7def06aea83f3af8d7df3d68a7c1776e -->
## _duplicate_: endpoint destined to the duplication of an activity to english language

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/iure/duplicateactivitie/doloremque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/iure/duplicateactivitie/doloremque"
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
    -G "http://localhost/api/events/605241e68b276356801236e4/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/605241e68b276356801236e4/activities"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/5fa423eee086ea2d1163343e/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"PRIMERA ACTIVIDAD","subtitle":"Subtitulo primera actividad","image":"https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg","description":"Primera actividad del evento","capacity":50,"event_id":"5fa423eee086ea2d1163343e","datetime_end":"2020-10-14 14:11","datetime_start":"2020-10-14 14:50"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/5fa423eee086ea2d1163343e/activities"
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
    -G "http://localhost/api/events/5fa423eee086ea2d1163343e/activities/60804c6e6b7150714f20d122" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/5fa423eee086ea2d1163343e/activities/60804c6e6b7150714f20d122"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/5fa423eee086ea2d1163343e/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"PRIMERA ACTIVIDAD","subtitle":"Subtitulo primera actividad","image":"https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg","description":"Primera actividad del evento","capacity":50,"event_id":"5fa423eee086ea2d1163343e","datetime_end":"2020-10-14 14:11","datetime_start":"2020-10-14 14:50"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/5fa423eee086ea2d1163343e/activities/1"
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
    "http://localhost/api/events/5dbc9c65d74d5c5853222222/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/5dbc9c65d74d5c5853222222/activities/1"
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
    "http://localhost/api/events/5fa423eee086ea2d1163343e/createmeeting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"activity_datetime_start":"2020-10-14 14:11","activity_name":"qui","activity_description":"laborum"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/5fa423eee086ea2d1163343e/createmeeting/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_datetime_start": "2020-10-14 14:11",
    "activity_name": "qui",
    "activity_description": "laborum"
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
    "http://localhost/api/events/veritatis/activities/et/hostAvailability" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"host_ids":"[\"KthHMroFQK24I97YoqxBZw\" , \"FIRVnSoZR7WMDajgtzf5Uw\" , \"15DKHS_6TqWIFpwShasM4w\" , \"2m-YaXq_TW2f791cVpP8og\", \"mSkbi8PmSSqQEWsm6FQiAA\"]","host_id":"KthHMroFQK24I97YoqxBZw","date_start_zoom":"2021-02-08T07:30:00","date_end_zoom":"2021-02-08T09:30:00"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/veritatis/activities/et/hostAvailability"
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
    "http://localhost/api/events/velit/activities/a/register_and_checkin_to_activity" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/velit/activities/a/register_and_checkin_to_activity"
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
    "http://localhost/api/events/1/activities/mettings_zoom/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/activities/mettings_zoom/1"
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
    -G "http://localhost/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/quis/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"5e9caaa1d74d5c2f6a02a3c2","activity_id":"5fa44f6ba8bf7449e65dae32"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/quis/activities_attendees"
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
    -G "http://localhost/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees/5ed66ce2a6929562725bd7c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/5ed3ff9f6ba39d1c634fe3f2/activities_attendees/5ed66ce2a6929562725bd7c2"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/delectus/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/delectus/activities_attendees/1"
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
    "http://localhost/api/events/dolorem/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/dolorem/activities_attendees/1"
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
    -G "http://localhost/api/me/events/necessitatibus/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/events/necessitatibus/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/quae/activities_attendees/aut/check_in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/quae/activities_attendees/aut/check_in"
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
    -G "http://localhost/api/categories/5bb25243b6312771e92c8693" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/5bb25243b6312771e92c8693"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "http://localhost/api/categories/organizations/5f7e33ba3abc2119442e83e8" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/organizations/5f7e33ba3abc2119442e83e8"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Animales","image":"https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/gato-atigrado-triste-redes.jpg?alt=media&token=2cd2161b-43f7-42a8-87e6-cf571e83e660","organization_ids":"[5f7e33ba3abc2119442e83e8]"}'

```

```javascript
const url = new URL(
    "http://localhost/api/categories"
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
    "http://localhost/api/categories/5bb25243b6312771e92c8693" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"et"}'

```

```javascript
const url = new URL(
    "http://localhost/api/categories/5bb25243b6312771e92c8693"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "et"
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
    "http://localhost/api/categories/5fb6e8d76dbaeb3738258092" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/5fb6e8d76dbaeb3738258092"
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
    -G "http://localhost/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quantity":2}'

```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code"
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
    -G "http://localhost/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code/5fcbf67721bfcb1393450fc3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code/5fcbf67721bfcb1393450fc3"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/discountcodetemplate/1/code/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/1/code/1"
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
    "http://localhost/api/discountcodetemplate/maxime/code/quasi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/maxime/code/quasi"
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
    "http://localhost/api/code/validatecode" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"Nyd0jOpQ","event_id":"5ea23acbd74d5c4b360ddde2","organization_id":"cumque"}'

```

```javascript
const url = new URL(
    "http://localhost/api/code/validatecode"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "Nyd0jOpQ",
    "event_id": "5ea23acbd74d5c4b360ddde2",
    "organization_id": "cumque"
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
    "http://localhost/api/code/redeem_point_code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"ullam"}'

```

```javascript
const url = new URL(
    "http://localhost/api/code/redeem_point_code"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "ullam"
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
    -G "http://localhost/api/discountcodetemplate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/discountcodetemplate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Curso de regalo","use_limit":1,"discount":100,"event_id":"5ea23acbd74d5c4b360ddde2","organization_id":"5e9caaa1d74d5c2f6a02a3c3","discount_type":"itaque"}'

```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate"
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
    "discount_type": "itaque"
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
    -G "http://localhost/api/discountcodetemplate/5fcee46a27b131731965ba7f" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/5fcee46a27b131731965ba7f"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/discountcodetemplate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Curso de regalo","use_limit":1,"discount":100}'

```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/1"
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
    "http://localhost/api/discountcodetemplate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/1"
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
    "http://localhost/api/discountcodetemplate/1/importCodes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"":{"json":"{\"codes\":[{\"code\":\"160792352\"},{\"code\":\"204692331\"}]}"}}'

```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/1/importCodes"
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
    -G "http://localhost/api/discountcodetemplate/findByOrganization/5e9caaa1d74d5c2f6a02a3c3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/discountcodetemplate/findByOrganization/5e9caaa1d74d5c2f6a02a3c3"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "http://localhost/api/events?filtered=%5B%7B%22field%22%3A%22name%22%2C%22value%22%3A%5B%22SUBASTA+DE+ARTE%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events"
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
    "http://localhost/api/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Programming course","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"sequi","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category":[],"location":"voluptatem","extra_config":{},"status":"ipsa"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Programming course",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "sequi",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category": [],
    "location": "voluptatem",
    "extra_config": {},
    "status": "ipsa"
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
    "http://localhost/api/events/eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\"Programming course\"","description":"a","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"voluptate","visibility":"PUBLIC","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","author_id":"5e9caaa1d74d5c2f6a02a3c2","event_type_id":"5bf47203754e2317e4300b68"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/eum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\"Programming course\"",
    "description": "a",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "voluptate",
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
    "http://localhost/api/events/cumque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/cumque"
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
    "http://localhost/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Programming course","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"perferendis","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category":[],"location":"nulla","extra_config":{},"status":"officia"}'

```

```javascript
const url = new URL(
    "http://localhost/api/user/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Programming course",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "perferendis",
    "visibility": "PUBLIC",
    "user_properties": [],
    "author_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category": [],
    "location": "nulla",
    "extra_config": {},
    "status": "officia"
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
    "http://localhost/api/user/events/sint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\"Programming course\"","description":"error","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"magnam","visibility":"PUBLIC","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","author_id":"5e9caaa1d74d5c2f6a02a3c2","event_type_id":"5bf47203754e2317e4300b68"}'

```

```javascript
const url = new URL(
    "http://localhost/api/user/events/sint"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\"Programming course\"",
    "description": "error",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "magnam",
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
    "http://localhost/api/user/events/quo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/events/quo"
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
    "http://localhost/api/events/quae/changeStatusEvent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"status":"approved"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/quae/changeStatusEvent"
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
    -G "http://localhost/api/users/ex/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/ex/events"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/users\/ex\/events?page=1",
        "last": "http:\/\/localhost\/api\/users\/ex\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/users\/ex\/events",
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
    -G "http://localhost/api/organizations/qui/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/qui/events"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/organizations\/qui\/events?page=1",
        "last": "http:\/\/localhost\/api\/organizations\/qui\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/organizations\/qui\/events",
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
    "http://localhost/api/eventTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"animi"}'

```

```javascript
const url = new URL(
    "http://localhost/api/eventTypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "animi"
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
    -G "http://localhost/api/events/1/eventusers?filtered=%5B%7B%22id%22%3A%22event_type_id%22%2C%22value%22%3A%5B%225bb21557af7ea71be746e98x%22%2C%225bb21557af7ea71be746e98b%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/eventusers"
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
    -G "http://localhost/api/events/atque/eventusers/rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/atque/eventusers/rerum"
);

let headers = {
    "Content-Type": "application/json",
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
    "message": "No query results for model [App\\Attendee] rerum"
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
    "http://localhost/api/events/reiciendis/eventusers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"numquam","name":"libero","other_params,":{"":{"":{"":"dolorum"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/reiciendis/eventusers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "numquam",
    "name": "libero",
    "other_params,": {
        "": {
            "": {
                "": "dolorum"
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
## _createUserAndAddtoEvent_:create user and add it to an event

> Example request:

```bash
curl -X POST \
    "http://localhost/api/events/voluptas/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"ex","name":"reprehenderit","password":"dolores","other_params,":{"":{"":{"":"doloremque"}}}}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/voluptas/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "ex",
    "name": "reprehenderit",
    "password": "dolores",
    "other_params,": {
        "": {
            "": {
                "": "doloremque"
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
    "http://localhost/api/events/1/eventusers/ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/eventusers/ut"
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
    -G "http://localhost/api/events/1/eventusers/1/unsubscribe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/eventusers/1/unsubscribe"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_7ea69d252da861fe068b097ff9fb8ec9 -->
## _indexByUserInEvent_: list of users by events

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/eventusers/event/asperiores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/eventusers/event/asperiores"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/me\/eventusers\/event\/asperiores?page=1",
        "last": "http:\/\/localhost\/api\/me\/eventusers\/event\/asperiores?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/me\/eventusers\/event\/asperiores",
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
    -G "http://localhost/api/eventusers/event/architecto/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/eventusers/event/architecto/user/1"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_cd20adcf5c26e47f21f72d0301544be1 -->
## _changeUserPassword_: change user password

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/events/iusto/changeUserPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"quis"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/iusto/changeUserPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quis"
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

<!-- START_1b30bab6e9ef7c312e1ee78d85ac2dfa -->
## _meInEvent_: user information logged into the event

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me/events/rerum/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me/events/rerum/eventusers"
);

let headers = {
    "Content-Type": "application/json",
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
## _metricsEventByDate_: number of registered users per day according to event start and end dates

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/metricsbydate/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/metricsbydate/eventusers"
);

let headers = {
    "Content-Type": "application/json",
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


<!-- END_8a17161f57d62dcbdb0c8b18b5ccebae -->

<!-- START_157d9f70e47e7a17090f6b664b5b3e5d -->
## api/events/{event_id}/hubspotRegister/eventusers
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/1/hubspotRegister/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/hubspotRegister/eventusers"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/files/upload/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"harum"}'

```

```javascript
const url = new URL(
    "http://localhost/api/files/upload/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "harum"
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
    "http://localhost/api/files/uploadbase/distinctio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"veritatis","type":"dignissimos"}'

```

```javascript
const url = new URL(
    "http://localhost/api/files/uploadbase/distinctio"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "veritatis",
    "type": "dignissimos"
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

#Google Analitycs


APIs for Google Analitycs Stats
<!-- START_8eff85d72c7dd1a965e3957aff777574 -->
## Consulting Query for Google Analitycs Stats:
Recieve a body json to give all the stats related about pageviews, users and sessions
filtered by a pagePath consulted.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/googleanalitycs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"startDate":"2021-06-30","endDate":"2021-07-6","filtersExpression":"ga:pagePath=@\/landing\/5ea23acbd74d5c4b360ddde2;ga:pagePath!@token","metrics":"ga:pageviews, ga:users, ga:sessions","dimensions":"ga:pagePath","fieldName":"ga:pagePath","sortOrder":"DESCENDING"}'

```

```javascript
const url = new URL(
    "http://localhost/api/googleanalitycs"
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
`POST api/googleanalitycs`

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
    
<!-- END_8eff85d72c7dd1a965e3957aff777574 -->

#Host(Speakers)


The host or conferences are in charge of carrying out the activities
<!-- START_077192157db94670b0aec4f8c3ab858f -->
## _index_: list all host

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/quisquam/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/quisquam/host"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/ut/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"distinctio","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/ut/host"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "distinctio",
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
    -G "http://localhost/api/events/repellendus/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/repellendus/host/1"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/ut/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"nulla","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/ut/host/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "nulla",
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
    "http://localhost/api/events/vel/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/vel/host/1"
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
    -G "http://localhost/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"items":"[\"5ea23acbd74d5c4b360ddde2\"]","account_id":"5f450fb3d4267837bb128102","amount":10000,"item_type":"discountCode","discount_codes":[],"properties":"{\"person_type\" : \"Natural\",\"document_type\" : \"CC\", \"email\" : \"correo@correo.com\" , document_number\" : \"1014305626\",\"telephone\" : \"30058744512\",\"date_birth\" : \"2021-01-13\",\"adress\" : \"Calle falsa 123\", \"user_first_name\" : \"Pepe\" ,\"user_last_name\" : \"Lepu\"}"}'

```

```javascript
const url = new URL(
    "http://localhost/api/orders"
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
    -G "http://localhost/api/orders/5fbd84e345611e292f04ab92" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders/5fbd84e345611e292f04ab92"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"items":"[\"5ea23acbd74d5c4b360ddde2\"]","account_id":"5f450fb3d4267837bb128102","amount":10000}'

```

```javascript
const url = new URL(
    "http://localhost/api/orders/1"
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
    "http://localhost/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders/1"
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
    -G "http://localhost/api/users/5f450fb3d4267837bb128102/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/5f450fb3d4267837bb128102/orders"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "http://localhost/api/orders/rerum/orderOrganization" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders/rerum/orderOrganization"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/organizations/1/contactbyemail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"message":"id","subject":"veritatis","name":"laborum","email_user":"et"}'

```

```javascript
const url = new URL(
    "http://localhost/api/organizations/1/contactbyemail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "message": "id",
    "subject": "veritatis",
    "name": "laborum",
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
    -G "http://localhost/api/organizations/5f7e33ba3abc2119442e83e8/eventUsers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organizations/5f7e33ba3abc2119442e83e8/eventUsers"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/organizations/eum/changeUserPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"laudantium"}'

```

```javascript
const url = new URL(
    "http://localhost/api/organizations/eum/changeUserPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "laudantium"
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
    "http://localhost/api/rsvp/sendeventrsvp/numquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"subject":"dolorem","image_header":"numquam","content_header":"Has sido invitado a el evento","message":"ad","image":"voluptatem","image_footer":"aliquam","eventUsersIds":{"":"\"eventUsersIds\": [\"5f8734c81730821f216b6202\"]"},"include_ical_calendar":false,"include_login_button":false}'

```

```javascript
const url = new URL(
    "http://localhost/api/rsvp/sendeventrsvp/numquam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "subject": "dolorem",
    "image_header": "numquam",
    "content_header": "Has sido invitado a el evento",
    "message": "ad",
    "image": "voluptatem",
    "image_footer": "aliquam",
    "eventUsersIds": {
        "": "\"eventUsersIds\": [\"5f8734c81730821f216b6202\"]"
    },
    "include_ical_calendar": false,
    "include_login_button": false
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


> Example response (200):

```json
[
    {
        "_id": "5af21f366ccde22b0776929d",
        "name": "administrator",
        "organization_id": "5af491690d4ed45dc255658c"
    },
    {
        "_id": "5afaf644500a7104f77189cd",
        "name": "Attendee",
        "level": 0,
        "organization_id": "5af491690d4ed45dc255658c"
    },
    {
        "_id": "5afaf657500a7104f77189ce",
        "name": "checki-in",
        "organization_id": "5af491690d4ed45dc255658c"
    },
    {
        "_id": "5afb0efc500a7104f77189cf",
        "name": "Super Admin",
        "level": -1,
        "organization_id": "5af491690d4ed45dc255658c"
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
    "http://localhost/api/rols" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"reprehenderit","event_id":"omnis"}'

```

```javascript
const url = new URL(
    "http://localhost/api/rols"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "reprehenderit",
    "event_id": "omnis"
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
        `event_id` | string |  required  | 
    
<!-- END_fdab2329814b6d25ffefed9f48da5eb1 -->

<!-- START_2202681f0ff5cd69c6890b76947e2572 -->
## _update_: update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/rols/aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolor","event_id":"et"}'

```

```javascript
const url = new URL(
    "http://localhost/api/rols/aut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolor",
    "event_id": "et"
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
    -G "http://localhost/api/rols/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rols/1"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "http://localhost/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/5fa423eee086ea2d1163343e/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Profesor","event_id":"5fa423eee086ea2d1163343e"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/5fa423eee086ea2d1163343e/rolesattendees"
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
    -G "http://localhost/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees/5faefba6b68d6316213f7cc2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/5ea23acbd74d5c4b360ddde2/rolesattendees/5faefba6b68d6316213f7cc2"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "http://localhost/api/rolesattendees/5faefba6b68d6316213f7cc2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rolesattendees/5faefba6b68d6316213f7cc2"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Profesor","event_id":"5fa423eee086ea2d1163343e"}'

```

```javascript
const url = new URL(
    "http://localhost/api/rolesattendees"
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
    "http://localhost/api/rolesattendees/quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rolesattendees/quia"
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
    -G "http://localhost/api/events/605241e68b276356801236e4/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/605241e68b276356801236e4/surveys"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/605241e68b276356801236e4/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"survey":"Nombre de encuesta","show_horizontal_bar":false,"allow_vote_value_per_user":false,"activity_id":"commodi","points":1,"initialMessage":"dolor","time_limit":0,"allow_anonymous_answers":false,"allow_gradable_survey":false,"hasMinimumScore":false,"isGlobal":false,"freezeGame":false,"open":false,"publish":false,"minimumScore":318.28890232}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/605241e68b276356801236e4/surveys"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "survey": "Nombre de encuesta",
    "show_horizontal_bar": false,
    "allow_vote_value_per_user": false,
    "activity_id": "commodi",
    "points": 1,
    "initialMessage": "dolor",
    "time_limit": 0,
    "allow_anonymous_answers": false,
    "allow_gradable_survey": false,
    "hasMinimumScore": false,
    "isGlobal": false,
    "freezeGame": false,
    "open": false,
    "publish": false,
    "minimumScore": 318.28890232
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
    -G "http://localhost/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"survey":"deleniti","show_horizontal_bar":"et","allow_vote_value_per_user":"laboriosam","activity_id":"explicabo","points":"sed","initialMessage":"perspiciatis","time_limit":"magnam","allow_anonymous_answers":"expedita","allow_gradable_survey":"dolore","hasMinimumScore":"eveniet","isGlobal":"voluptas","freezeGame":"quia","open":"aut","publish":"error","minimumScore":"aut"}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "survey": "deleniti",
    "show_horizontal_bar": "et",
    "allow_vote_value_per_user": "laboriosam",
    "activity_id": "explicabo",
    "points": "sed",
    "initialMessage": "perspiciatis",
    "time_limit": "magnam",
    "allow_anonymous_answers": "expedita",
    "allow_gradable_survey": "dolore",
    "hasMinimumScore": "eveniet",
    "isGlobal": "voluptas",
    "freezeGame": "quia",
    "open": "aut",
    "publish": "error",
    "minimumScore": "aut"
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
    "http://localhost/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/605241e68b276356801236e4/surveys/608c5f5f63201e0f5147a086"
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
    "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","names":"optio","city":"tenetur","country":"placeat","picture":"http:\/\/www.gravatar.com\/avatar","password":"ad","others_properties":"[]","organization_ids":"[\"5f7e33ba3abc2119442e83e8\" , \"5e9caaa1d74d5c2f6a02a3c3\"][\"5f7e33ba3abc2119442e83e8\" , \"5e9caaa1d74d5c2f6a02a3c3\"]"}'

```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "evius@evius.co",
    "names": "optio",
    "city": "tenetur",
    "country": "placeat",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "password": "ad",
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
    -G "http://localhost/api/users/5e9caaa1d74d5c2f6a02a3c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/5e9caaa1d74d5c2f6a02a3c2"
);

let headers = {
    "Content-Type": "application/json",
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
    "updated_at": "2021-07-06 16:28:33",
    "created_at": "2020-04-19 19:46:41",
    "names": "Evius",
    "refresh_token": "AGEhc0DkgAD5JCNIFeQHxY_IqFlQpRJiARpevP4LF_4oX57ai3DqXzxkqrPkf0P-o6HcAaPwH2MPxP5qAYpaIiUVy8wakIW44obNCy3SOh3yUR9QHaBFcdR5HLEF652uHHXrHuJmh8CEUPu2VD_5qBs0tfvwAEAgG86GpLielnAVC4yHXoTT2OhFJ_s3oAls0QmC6ySeW-yCg_8uYTc3V0eXWaZeXAulrQ",
    "ticket_id": "5efb3da70787930c06043c32",
    "name": "Evius",
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
    "picture": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/RA6gQqHTxmZrMqPtWHBT0eTWs7VIij53GN6Og7cU.png",
    "foto": {
        "file": {
            "uid": "rc-upload-1623877937073-3",
            "lastModified": 1622837545128,
            "lastModifiedDate": "2021-06-04T20:12:25.128Z",
            "name": "doge.jpg",
            "size": 107585,
            "type": "image\/jpeg",
            "percent": 100,
            "originFileObj": {
                "uid": "rc-upload-1623877937073-3"
            },
            "status": "removed",
            "thumbUrl": "data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAgAElEQVR4Xuy9Wcxl53Ults58zp3\/uYa\/RhaLlMiiRIqULFI0ZVuyO221LNsyPCAd2E4QoB+cxEAjeQyQvAVIHhqOETgJ2m50OujEDSNBkHSQIA463bEsW5ZEkZTEoUjWXP945zOfE6y9v3PvLdqdh3qt+xMFVt3\/Tuc7e3977bXX3p+F9c96BdYr8K9dAWu9NusVWK\/Av34F1g6yto71Cvz\/rMDaQdbmsV6BtYOsbWC9Ao+3AusI8njrtn7VE7ICawd5Qm70+jIfbwXWDvJ467Z+1ROyAmsHeUJu9PoyH28F1g7yeOu2ftUTsgJrB3lCbvT6Mh9vBdYO8njrtn7VE7ICawd5Qm70+jIfbwXWDvJ467Z+1ROyAmsHeUJu9PoyH28F1g7yeOu2ftUTsgJrB3lCbvT6Mh9vBdYO8njrtn7VE7ICawd5Qm70+jIfbwXWDvJ467Z+1ROyAmsHeUJu9PoyH28F1g7yeOu2ftUTsgJrB3lCbvT6Mh9vBdYO8njrtn7VE7ICawd5Qm70+jIfbwXWDvJ467Z+1ROyAmsHeUJu9PoyH28F1g7yeOu2ftUTsgJrB3lCbvT6Mh9vBdYO8njrtn7VE7ICawd5Qm70+jIfbwXWDvJ467Z+1ROyAmsHeUJu9PoyH28F1g7yeOu2ftUTsgJrB3lCbvT6Mh9vBdYO8njrtn7VE7ICawd5Qm70+jIfbwXWDvJ467Z+1ROyAmsHeUJu9PoyH28F1g7yeOu2ftUTsgJrB3lCbvT6Mh9vBdYO8njrtn7VE7ICawd5Qm70+jIfbwXWDvJ467Z+1ROyAta\/\/7s\/W\/\/Fd++ghIM8LZGNJ7h8YQvnBj0EbojTWYJvv\/MBvKiNopyjyACrtrCxFeDcmS1MJqd48blzCLwSf\/pnNzEd2fD8Gntnu+j2Orj98ATtAHjxGR\/XzvfRawVo2S6CXg\/t9gBh1IXnt2DZDmwUgJUDsOE4HmwbsC0HlmXBRo0aQFWWqGChriF\/bNuW37t1KrfMti35N6waVWWjdH04dQ63rFHYgFWVAH9fy1PkPSpb3xdljqrMUZQxymKOqixg87PtEL7fhhX0YQcbsIsMZXaAKjkGqgp1XQLgZ\/pwbP6pMMtcDEcp8iqC57YQhj0g8OHaLizbhe24cFstRNEmXD8ELF4hv3tjefwLr5j\/X93Hmsd5Gc3jJWzLR1WXukYWYPMvdS3P0VdU+sZ1AMsqUMmnVfIR8ilcEv5F\/qU\/zfvr4\/pj85WVC1gl6ubja1te13xGXdfgH8viveES8bOA2uKd03vH9+ZzPnltVaXfUy9Nf988T97Xpi3wTWtUdaUv5\/\/lOnivbHl+XfH76PUX\/L9tyWO6Jjbsmq+vUcsH6fd1akvf09iEfPrv\/Hs\/W\/\/45jGKykZR2JhPZrDcEslohKqw4AY+JjMaVQXbKeFaARy7xvn9TZRViaPDQ1y+sIF+L8D7tyY4OqRhWXCcGu1eCJrzoGfjlU\/1cHbDQeDb2Op30d\/aQbezBT+I4Dk+bFnMBJalF+C5wcLY9SbXenN4YXSXqkLFO2QMwK7SxU3mIulF2ygcB3adwyoqMZG6ylZsQKxIb21VoixS1MUcdZWjrBI4NHg3FAf23DacoI\/KjlCmp6iSA9T5FFVdoDaWwrW2HRu+5SKvezgelUhKD64boRX0UQcuXNuDZfmwHQde2ELQ3oTnR2oRYhRqdY3BLg1Xf6f\/1hsvhtC8rLZR0+ON\/+hfl+\/FG8+1hRizMT7z3BX7X\/7OOEjjHAtflAdohHQxfk\/zd\/lOS+euqgK2zc1t+XtxjOUlGsNfPiBvLW+q30gdwzhLBXFqecRcu8XPtB3ZEWo6Pa\/RdsQRbBo7apTiRJZsdE4FcAuhkzliP0Ap+486hlPSvvgdbZSWfpr1zW++UseVq+ZXAqenp5hORui1LMxTC5NJBhsh6sqG7ZbwPQ\/t0EOajVBUDkajDGFoIQpcZOCXLVEVDtIkRhh6aLVtXNgf4DPXOmiHJVynRrcXYntjA1vb5xBGHTh0irqGbQGO68K2XLiuLQ7C\/2tA0Ivmf5VN4+fF8MJo9BWsihHE7Dh8UDcZiRooS9RlJgtnIZNF152qkh0H4KKWavBlqjfBteC5HbheG44XwrVD1I4PuBHq2SHy6UeoMJPoYVcBPNuV7yTO7LiorG2M5w5mmQXbDdGhc3kOXMeXm8hrcv0ugo46CB3GmMVyu1bz+MS\/m92VW0YtN9iudFet3WYtHn2d2SMXRucYS6ZzrTqA7uxLI9c11qi8NNhF2GBIWFqv8czm\/eggshaWY+7V0sEXUcW8VeMIdDz9qSTqND+CCrirV5UYvCAIogYTIfg9GcObV9BGuCalZRxKXBqwyxo5V43XzRAr4ZZ330TZBgnUdJBSHe4zr5yv+\/1ddLoDjIZDHB0doe1l+Prf\/jLe+vEt\/Nm3fgjH7sgnuK4Lx7FQ5HPYdo3JdAbH5u5Xw3IqRGGAIGgjz3OkaYoo8NHu+Lh43sGz5ztoBwX80EOv5WJrawMbe\/uIog7qOodTJPD9jsADfm9CIjvy0WsRfqjh27WYgTyHaysmzoUrSnEQDe0aossqh0XsBAslL5xRoUzg03EAgjm9gRKSXVhFibKaobZS0NIc14Hvd8VB6ByEREVVIrccFLP7KGe3gJrv58O2aZmO3CIJ5Y4DONuYJz6mSQ3L66PDazMOIs+3AC\/owm9taARxNJY1O7zCm5VoYq6b99U8KjdaoBKNeGFaCrEIg4PKQiFYa2n0zd\/ENoyR0KhpbEso1XyuRil1GrN\/mwj0N0e4JrqtOB43XkI\/bnC29YjhO9xIqnIRLZfOyuepyS8e4\/twI6Sz8p6L85qoKO7BDcpCaXOrV4hJRyqqCp6JlHwsM\/Cz2cwEqjOCgBDLQD46CGMN1\/Hsfr\/udrfg+i4mpxMk8wT75zv48pdewve+9x7efvc2YAX6ibIj1PAcF0EQYB4PYSGQ6ON6uuP7gYuiKFDkOaIoRBQ6uHA2wjPnI2x0HGxst+E7OTY3B+htn0UQtlAVGepkAsu14DBklhXc2kK714UbtuB5jmB0q1KoVZnkQXMRXUyrNBFEsCX3CeYTBg5wAUvuaJXBnFwxzW10H3Yl\/FZIUIMO4sB2AoFGjuNLPsTXVhmzJAvp7APU8W24jgPX62oeYjA439GpQ7jBHmorxCypkKED2+2idG34DtfSkcjlBR34ArG4CajX83p05xXQvtihBX1oarWIKbyxAgPoIObvklmY53mlhYK4fwXXLPC\/yUv4HrLjmmihCGbpnOpQutU+mjMssXuTJ9Dompxw8VzzpRnllxFS7wthNZ1n6fJ6vbKWJZ3BxBOJJo9GUn2\/xvl1c+IfGrZcj2ZYKKuK+EBzGa4v4RbTDLOR8nH5ZlwHcUr9HWG8PLa51atlQWp+WU2mPNfG5laEySRFWeouzAupygplWcHzbUQRYUGFUnbeUhJP8W4+tyjg0qA9F6Fb46UXLuLyDtAJK+yd6cEPanTabXQ39xC2OkCRo06nKOpc3o\/pOp3C83z4vgfXD2C7PhhUZWexcwkdpUQIFyC4qwswrKPOF9fBHKS2PNh1CosJuEPD47Lxe\/J1XIRCDMwhhBJjIUmgYZgY2rZCOLK\/JkgzupWPfP4B6vwAdtCW5zjMb2SH5JoybxkARRtpPEVW5LDCs6iZg3g+PKctzm673FRaSwfhxrCSpK\/Cnb8poW3ykGYnp2EW3PWIs3h7TbK5dA6ulWRhC2PhhkOs7XG3XTjRX484ArMkBVYM3ziRGhl3+cZ4V6GY7v5LyMancqN71NmEfpE8YZlXETY6BW+Kgh9GDtpfs51JLsXoIBuDLRFjGXH0dw2tI+skkYawSXEH4foq8bDIdQwVJKRLk99ubgzqJQYkC2CZ5LSG7VgCLXiDNIktURR0kkyeR0cJQsIRej4jh354XjDXcMTgAivH51+4got7wNaGjZ3dLoLQQxiF6A\/OIOr2xKjrMkYyn6PK5iBGprG7ru4MhG1B2JWdnCZa1gXsKkNZ03B9oJ7DYiIuC2eSNRq4FcGyQnEgPkdYFNmouXxM+S1xbkeYrza5MwCzpRM5AWOjwrN0gqK24bgd5MkDeHYOPwpNDsL8yYZNOOb2UKKFbJwjHx9gMryP2uqje\/4p5P4GLCdUGGY7iII23PZASACydcsMtmGBVg1vibCbfKCJNNw3LXgoJL55uieSPBCooSyfbuS88bpn6kYB5MTypbfM3ZX8+kQuIvuviSVLB2m+h+zIJvkVVlB2d2WsaJjqmHyPwLyH5n\/qYA2cU6OV3ZtwvqhRSX6o0VShmDJU+lqF1xKxmm9mmKtF5DVQbCVrWkQODQrK7q1CO70mEzfpXFsbm3VDrdHo+YH8XsTgkhwJXpZvKA6S53SSQv7w4TCyBQoFgQfPc2GVNbK6RJEzMU6xEVp47uktXDjjYXsrQLfnI2pF6Pb6aHc34UUBLFK3RYw4TeBWCaoilR2jSaDpKGHUFqrVtdsokMCrE+S1B9Q+6noO2yJFrMvd0I2W5cKxWma9EnOjdEENOFlQgwDfKwWquTyPUK92It1J8imK+SmCzlnA7aMspwh9Xi8\/K5fNwKMz+R2gbiOOKySjGUaHH2N6chdZXGP30lOwN55C7ZLSBirHRztsw4568LyWRKLG4Jaw5lFYsQqVHqFAee11gNLOJcIpgiZ\/CLiSt9mG5JggTaaYj47h5HMk+Ryd7T1EnasobN9EhqWBaKTQb7OkfNV5G8NVo9Y8RTdShTqas5A0oA2Z9V4EpybSKI2v0LKJbmSWKnglCQhDfRsaViNVE7WW36txaMlRFt\/hE2tnIpFGqiWUZbTQ3HXlOuuGWkbjIJoQOY6z+EPDcL1QeWXSZk4piXdZqoNIRCm5O9VwAwv9QRuDjRCdVgdZmSKdZ6iLHJe2fVy\/1MX2Njn\/Gt3QQ7ffgxX5CIIQruejLBK4dL4qg1M1VG8tcE6d1kHUakskcZ02aisWRkJZClu5beSGFjbIlLug3BjmEZ7cLKdOheKTfEJ2UxIMhFiMdmQtYlhlrNfktKSuwWQf2QR1msJunYcdbsLzciEk7HIu+Y4bhfC8SIzfh4vxsYV0NMX4+CamR3cRnybwtnaw88xLqJ2eUtq+uZ52X\/Icxd7NTVruYGqcBn41eYMYZPNsXmSptQlGENZDbDJrDSRRCGLlU5zcfwvF5BBFMsFsMkExSxB1t7H\/8lfhtDZQg+u0Co1Mdiu7Kql7ZwFlpLZhYJlAEonYZKyW9Ky5GsNi8YYwwtFm+F1JLjIqLA1ZNrZF7Ya5pOYBzDd062u+T5OTqDOKw0q0WIWHZjFN7BIqn\/ayuA7NqYQ8WMnr+B4KNw2Js9HvSwSRqMHiFZkqiR6MJJpICZ1IqrSqhaHi35swKgUW14HnW+j2XDz33EVJ6EenCewix9UtH5fPDhC0+BygHZLeZCHQQRB5cAPudwV8wQAu7FJ3estiBGF6RUd14XoBolCN3XJoAMxByJ4Rp2pxR+\/XcjcjDKOR104gzuIJFNFCITMdZbmYz+TmxQXsMtfk0eH1h0IPV3Rgy0XQvYba68OyY3huDbucyg13O11YbkQLgVvVmM0CzE7GmA9v4\/TOTSQnMyEbtj\/1HPz+BYFzcLuIOi3NY+ggZrtu8o3GbgT\/m11WjbJhgzQb4HdVyEGj42OuOIjDCCwMElAXMaYH7+Hw5vcxO32I2vGQpxnyyZwvwaVXXsf+819CVftm31+JGBLWmtoDP6\/ZbVehVsMePhoF9VqaN5ALXCbbhFImUW7yqIYpU9pANz\/JfCRHEZrPMH3qIBWZSkMoNFFMo9YCIy0cl\/Sw1Ika\/EDnMLUWzXT4XTWXVPrbXN9Gv1crDncE87suoQOxvvEgpVMkdDJqFIU6B\/\/k8jogDFhQJH2b4Zd++afgWSW+84PbKNMY17e7OLfbQWZXsIsU7YCfUSmN2maxzBOal4kiawn8LNvK4DrcXXiz+ZgliXro+4Zq1lCqHL3mSMTXTbJHClrXTS+cuFwpkRqubV4rsJErQdaKEIW+pZVZ1mLAiMA1KnM43I29HoLOOZPM02H4eCxR1mptwJECYCG73WzqYHYyxfz4YwwP7iEZTYRRa+\/uYefSZ2F1dlH5XYSdLjxPk3amwWoWalB0BM0tfMNoNcBrWWle5o56r2pGQr7aLuDIpsG1nSM+vI3Rw\/cxOryP8XCo9YQkw2w4BooKg\/2LeO0XfgOFwygCkJdxyYyvoBRJcIUB0jxO7aeBO1qrWhb29HrI2ShL1UREhWzN8x6FNupATe3lkzSyJtiLd9J7X+UmX2Lk0mggFDujkESdRyPK8nPJF5hCq1yIRmhHmLwmxzEOsjno1UVpHMRzEZAxMvINTQL1jejtlGMoxFLcRsfy\/QqX9\/vY2utjPjzGr\/3qG0CV4Ttv3cV0OMH1MwPsbHUxSROksxlajoUgcOEFDvzQQuC7YtyOVcGxyIaRGKjgcocW1kmNmzCDUcrzHXhCCnDBeBNomPw\/cxBWN9QBJGkWeMvfcwG09sDUXEMNqWRyu7ksaM1FYpHS9eF6kWwUAgNqMnIWLHcbbjgwICSDVaewrRJOGKHyWuLgVh2jLGvMpsDkYIx09ACH9++gjjOkidLevYtPo7N\/A3a0iVZ3ADBpVxBkWMClEegNbihMdXVGSK0pKPQ1m7tcs5ginZ21AFaOixrTo1uYHb2H8fgIp5MZyjhDlSaYHJwiHsao8wKd3Q289o1fQWvvOkoydrJOJnk2u6zWp7gRLSvmakwSxxbsWJMbLSr95vmNQzU0swmZhgEzm1uTbpuo80jeYzbqJXNGdspkk6uwbhF6jbRmAcuauKRFSBI2Te1KrMFALZWnLF3R2hj0askxbAN7gkB290dkCoYdUAfR6EHnYHLa69j4mdev4ez5Hj56\/yZe+fx1uHaJmx+PcHo0woWzfWx1+xjOZ5iPpwhQIAx9uIGDwKsR8rNkw8nAAE8HsdwaJKw8TxkYTQjpOJbs7p0g0L3WKgHXg+16UiOBRUjFBFujiu1wEenwLiCRCHDJIBlakawVb7JGzhZsVsxFA2bB8ci4cLEosfFQWgNUtYsAMRwnh2WMsHJClLYHu0iAakrGGmniYnIwQjp+iMP795AMJwIXfQfwNrawdeUVtHcvw+9soWathRS7wYgNjF5Wr5fSEnEk4yBLddpSf1YSeuY0Yi5oisnRe5gf38fpg5uIcyC3PXhVhmQ8xeHH95BNcgS2A68X4fkvvY4Ln3kDBes0ih8eMZQm51jCfN1haTerVe9VaLiMKE3S2xhtU9bkO3ADIONm2CQx+iYPWibLjIYKsJg7atVJi32rEWklyKzGG1Fp0Ja07iKkFG2n0nuthUz9bqu1HgmaWxuDWnU6FnxPIYzSq+pGEjkMOyA7FqMJHaSUWjSunA3xy197HpvbNmajMYJ+F25V4vBwjtHpDL1+gF6\/hfmkwPx0JDtwGPhwAkuiD3fnwHXg2EyyKeKj8TEhJKzSJJ0XRiijJIItchVGGI8x3HVQ1QFxESyH+h+NHg53WLgqk2D0YcFPHlf6kZopy6PzUGulNRHLDuFa\/IxCaiakuFmTYRJfoIUqK1BbI3gMRo5SzOTspY7CYmc2Q13aiDMX45OJOMjRrTtIh1MEzGkCF7XvoLV7CTvP\/iSi7h4QdExV+NGbu0yAl6I\/3ZVXaUmFOo1AM2VU5EZX5Jg+\/BDZ9C4e3ruJyXCM0mJNqQ3brZGeHKOcJJhPYsRTFkdL7D79ND7\/C39XoKVuujTIxqBXv5tS\/rKuRvBZ\/LUCoXExY7zLotyqYywj5ScdrIFey\/qP5seN\/THTWla+G1ZNRZHi2qbQqra6misZGnnBtKmDL6He8r2UBRaaV+sgUtn1NP+gk8iLNCuSH6V1LZOgm3KRleL5a5v45tefR39Qo8oyFHmBMqkxHCWYDnMRJ0YdH3lmIZnNYRUFfM9ByFzEK+G4thg6FcCCA13mHmTUWGlWmOUGIWw\/lOq95EdVJkm8x93XYwLOegV3CJEai3OIkzhM6m0xZibC1DvRSaS+Y\/MzXOHmtcAnPJ4k\/Q1Uk01FoiZLcJHoU2wnhu87UsewLFLUtBIqXOeo0hRW7WM8TTE+GaGYjTF9eISTeweIuLaBL9DS7gSIzt3AmetfAKI+KqnlCIDRIucCTjSGpkydIKzmd6tIbDVfLAif3kVyeksixZ27D2ATxjoOphPq0WhoMaw0RzqbSqKepwnOXNnHq9\/8LVgd5iFULQTC7K3+aCKs2irzNXQ3X\/yj+b5Nci57sqlhKCRuooNG51VaWKPWMnqYPEcEiaqYEIe0KR1SCpmbq5BFBsYJTGpEnCbUreY5y89uIsVqjrL8bL0KhY\/W9uaWOIhEEJ9aK6V6xXuNg+iXWOpjuIMwsrhBji+\/vI+vvHEVQVjBzgskWYJ0XmN8kmB4MhfWKWwxzwCKNENd5mizitwKJILQORwiIMeSugLzD4u\/l9qHYbBYK6CD+AFczxM1MX9E8euEwh41sEKcw8BFx2MIpbPQQTxxEIZWCbdM5OWWKMXaLAmvWpQBZSrOnqcp81jYTlckMJaTwfcpQPSMsTHBJ2OUAbaHMncwPDhCMT1GlWZIx1OcHk+QT0vJiYKogtdyUflb2Lv2OYR7V+G2NmC5hI0EmUYS\/okEs2FfBEnTSEyhj6I8rZipnGZy\/8eYPvwA88kxHj44Rs16jdsWJ59NYlS5sl1ZlgFZCi+LURcFvEGAn\/j5X0N\/\/1PIGDnLJd25ajDGBUxCvVy1Bp4s8XsD5Je08WrNRCOhRsfmZ5HvClvX1EqWgklNeRQS8UdYToFLdFIbJR2kkYsISbHKoi0payUDTDJOKxfB70rtwxA6Im7d2WocRI1S\/5jqOS+i0d2bREil4fzSOTphiW989Vm8+JkdWC4jR45sHmM+rXB6HOP0dC4L0G2Fho4spIjlu5bALEIon\/DKpXMCUg7wCad8+IGHILTgU\/fFngnWTCgl932RoYgMRKr8RizIfc\/O4bKHRLROxtGZpHO3d4zOh0RAQyMK\/lQGTFWPhJM58jwzvSHMiehgISr0RALPRLyqEqmgMyHPMq0NEXa1ok2kqY1sfILs+CHyZIoimSOvasRzhiMHjm\/BlbzGR2ewA2\/rIvz2Ntx2D07Y16q6S9kLncXcuKYSLRiaj6na1BGZt5KjTjLC8O77OHrwDrLJDPfvPpDvtXHuHNK4RhpnyONaipZUsrKMGLkVImrWkjkyt8Jnv\/ILuPjcF5GS1GBeurrDi\/5NP3uVPVPHeJSdejTqNPvPkjUSAnHR99FU2xXSyOML1f7SuZrPXWXAlkatRS9JFUzhTyHBSo1F5DTaD+IYIeOj+rImgnyij4URRHZSgVgrhUKhn5c5RxNNmhzEsgts9kr86s+\/gMuXWN0uUM5TFPMCw9MYk1GO+TSWRSbGp2HTeF2HxlGL0pewyuEO5zsIwhq+R1JHYZT8CWoR97XCLTieDafRZ3l0IkaERjrOnIWOkIF+0FC\/peBkQjB6jVl1KaARFWm9XdSwrNwX2jClRVDmWIZRs4myLMSpr8x8FSNJRqhS5hsl0pyOwlzIRhBswHN68MoJTj+8idH4FL1uC+2NPryA0NATKrni7i84mdiOOZSDivCVOi4SBX4XfncTlUU4VMF3LHHakE4UtAVasgbkkzxwtG4+vvUeTu68g3nKImCMgwcT9PpdtNqRVPYn0wRZAoxO5gCFpBs9dNqBbHLFbCiEyPVXv4pzN15DTum+8H5EDTR3XSnF9iwWNuzVqnMovl9GhGWivUCDi0S4gWKaN6hiQgRVanPyzyaCNJXvZVVfN+hPYMxGQyF0Gze2R9XJIn4x7KXHW72Ac6tFyE9GxIoQa0OckjsuHYTRQxJYqWCaaNGU+k00kdBjF3jqfIRf+JnL2NkkywPkcYpknGE8KjCbpohj5hikcmnwtYggSfE6nhYB2x0XQcsTJbDnewh9Jsyal\/DzXcdFFPbQarcR+CEspxZnEmejeHHRaKUOogJn5iFkxrRoJSG5Yg+JkUdT9yVMry\/9L2VBapbsE4WSrIkwKjDHyVCVnvx9HhfIax9WHSLPZ8hnE0nKCXMIrgAftU2a2sXu7hnY8QzD2x+Lo505twOnxZ6SADV7JMocaZXKbmZRKcAbzc82qJcsGOlmwkeJFFmhTT9CmND7STwwIralXkE+X\/6bjTGajTAeJTg5msrGsL2zgbiaYj4B8tQGtZxpXCEuMnSiFko7w8bAQYAEyWSM5974Oi68+JOo6ZjC3jaFv6Y+oM6iu\/gqNFrKUxrWcbWn49G6iYAjA5GW8nd5Drs6pcnJdIUuWCU13KUcpPk8LciIkHFBCHyy2m6KkxJpC2U7FxBrGetWGbcGLoqbbg76ouYlNeoaB2loXq19NDeHNQPToSX4L8eXbuziJ1\/eQL9DJWmBOquQTHMMhzlORxmyjPmFjcBzxfCjyEarHSIICedctDqMHB4cKU764hCOy+JPJQm0H4TotDdEOUxZCn1AknZJuomltbaheFQXSZEAc42mLZcUHhdG8WqZJ8hLylro0QVK6qyKKco8R8WcQ\/7kiCsLybxCmlAnxkYdD3BDkZawLddhQi8wr5JajBRMfR\/9fgCvmMPNcvjtnlxnRjk9cxYqjgnJkplATYofmU8URQq7LgXesiehMj0lTuXAg4OUMSLPyZQog+SQWrUwmydwahelAyRJhbxwcO\/eKU6Gc+zubiFq8xpqjMcVpnGNyTwDAyVVAh3HQScqsbnpoGPnSIocT\/\/Ez+HiS3QQfld1EDW8pYMIzSrV7aWDNDL35a7Om9LQps39aXLYZXQwccRI\/QitjJaqCVDm3jbvu4R2yk5pP8mK8FG0eKZvZFHM1A2EUVtE7KKeMJeweONH5TFLhwasQa8vSTpvjkQQw2ItSu9Gc5NXrKLdXfMAACAASURBVK5WyJGLBqrnpvjaTz2DG8\/68B0aNBV4PrIsF4h1ehIjS2r4TK5DRqYSnbaPdr8Fj1HEBvwASi3zM9lbQQxmESbZiPwO3KiLsMUmLE3OpQ4ilJNKLBoZgpT5pEXSAGKpbwBZbcEuYtmZ2BfAXvMqjZFmGXLuzEUl3zfP2INeochKZEWNLKe7E3G5JLHgWJrTkLuTzYOyHKm1GGEniQ3bQjtwsdn24bs2wiBCVbnITc0op0q\/TKVjsSrmQBKLsJ5FWlZBWPy0XVbCtR5l28ytWOSkAxXKvrG6kc6R5RkYuyaHc0xOZ2h1+8hsC7NZgQf3JuKM5y5sCqy8f+8Yx0cVHgwzTFNLXtuJIpzdDrF\/poVeq0IxHsNv+Xjqi1\/Bhc+8joLXWjAqNwVAhU6SZEuUViNrco9GXbuERUsItcpMmZD+iWjQMFsrCmZDza6kEAaBNbhqhY5VpaP+Xsga7UdX5mtZVC3ZSkE1Nnt9LAv5CkNH2ZLwUUsPN6GlhtXvdGvSY1wM0pdB0DJtrpqMiQYLNch1O1TyGhx3YafG3\/3mT2D\/LFEMFa0BQm8HRW0hSTJMRnOUKWXx0kEumifiXD9iUq5fhrbOFl7fD+B7zD1Upu07FDK24PotBAHhF1tdlbolXuU3aqQmpJi0hmwkMFK30XBMw8rTiYkMGVLWKZIUWU7H4I7L59TICuYZ\/GyVwDdFMokMUsln3mT63xcaNXUK6nsizxXn6LVDtARCRqxIoKxokEbcye+YpcgyDr6YwMliUT0zKrDjjSRC7TmoS0ebxALK4j3kRYbAjxRG1Uz2OSugQFEnSIcpTu4P4Tgh0hK4f3+CtLKxs9fF1pkusqzEyfEMBw9L3Dqa4+GYjFstTnxlv4uL5yKEdopiPEe738bTb\/xtbF39rBQ+mzVoquULB1nQ0Irdle3U3GERzsV7VMOnZNQqPDKSELHpZY\/9qm0KSGrKDE3PveRDq7Rso\/8yLagmKnCduBk2bJpEGuaRZF6pmzOt0dJLZ8gFbQ\/gA7Qjlcnod65h9Tpdyb9pAHQQFpOEDRW8YrT91F2xB4NQQ7omUrzxyjl88xsvYqvvif7F9lpoR\/uA09NEl01QUkzMJNEriplqeaSpilqZVESG0qNndujaInZmUkoRI5W+NgIpXJpmLIZJJtmPFCwJyRLJFaShK2eirbWLPCmQZlNkWS10bVXUKElQ0S6pCGAZkJS21H0YFQh59LOkVkI6mFShDGPQVgD+QxgyaQXI5fttdnrodjsCAxnVZFiE7aMueYX8DgmydC61h4yQLp0D8VS+W9vxJBpIrSYKqW2B096Q\/nfGDF5HFAXSPiDEez7HfDaRgQ9uUWF0MsbdW0c4PsjhUIHctrF5pgfH46ZFCjzCBx9M8O7dMe4cjkVec3ajjWuXN7G\/F8Kpx3DKAmGnhStf+jvoXXhG8rOmnrBE6cs8o6kRqIHTmAhjNbdYwhOto0mkXxkyoe\/H+7gqoVc742ubhJ0b1uJzxGQezR1Wadplm7JxrBU\/kvekC0vtRKX\/OnBitedGHZnwWTrd2dhlHNTqddq14jlqnWz4HFLg6HSOJuzQKHPWPZjskqa1c\/xbv\/QcXn\/tKiIm2U4APxggaF+C5fZEmEcjYQKqC52LU3ICSPND2YpiW2UcBH\/W7MVYNsE4hG6kZU0hqiozFKxY54wCGfIiQZ7NUCZjTCZjQOBSgTSvpRe5TG0UmSblTPxEcsKaiwgztUbCfIbqazJdQuk2OjQRNVIGz+q7FvFYjWceQzhEFi7wPGz02FZM0WGAPNctqeDiuqHg\/SYKp9kYZRxL4xUI6aZjTMdDkdyEZLgC5jeu6LXGGeCHbenKLIsccTaXWobnsS00gc\/Izk6UPIPnMO84xDt\/cRftqIfO7gBhV2tIdeVhlhT48C7w1oeHuHv\/CJfP72Cj6+Lpy7s4s0UnHEmSjqiHGz\/1q3A3zrHCpKODlGxTOKXGsKhSCxvHXg86AEcsmULnAuWaET\/6WnGlRSGwcRAlh4zLiNJdlcqrDNViEIashRnZZIxoORhCtWxNtNPXN16yrMc0cE8jkUrrddySka2I7GX5Wvn1Zr8lGz2NgzkAeXjpL29eaJgskRNI8ajE1gD4rW\/ewCsvXUUUcSQO5QkdeK0LcCoX0+kIWTqTJJaO57rac02MzYKdRgwtiKkWRyUlwlObLyh1Vxqm6VnWG6SerzQspcnsFMyQzk5x6+bbOLp9B1XMcKVLQQZNAqHnS2FPIoSnHZCEeUJOSATR6CB0sJEpcCfh72gl3CvY5bgRtdCKQoSEfS6hIalfUrEqVdHBQkBJha\/fVfkLDXw2wTw+kp6SPB5idnoEJHN5hd9uwQpDEUkm84ICNGQ1Nys2UVkopVg5RMT+9cARFs1jUddxECdUE7uyER18fA9HB3NMUw9hp41210ORWzga5\/j+zRne+uAuep0uzmxEOHemhacubmCzWyBg70gew9nYx2d\/5tdQBx0hOQhBRJG3SJSXPeCMqpZ0cyr8VuGfPrGBvk0hVo11CVtlw5DWaPN87sMr0WRZIFytdquLKXRenbTS0L3LegfNpJHRL7\/PauGxyV\/U1jSvUvVFA831cRNhfvnVvfpoVGCSVJjFBVLeNov9CWKi4odMJDn2hx9s1xle+PQ2\/t1ffwmXr5yRBUnTGrbbR7v\/lITOex++g8OPPkI1zxFYHjy25doR7JYLt816RaAFQZmSwh5uDkbgJBDVgYmOyhgvk3NuMzLAjXeLtKaRdTfSkensGHc++B4e3vwxktNY9FSsLPO9bFfFhlJVlySfFKktgkgpNErVXRN\/0QIKc8O2Yx1CwY9kMXO708bG1rbAKIF5ZKBIIcvQuQpZynFB3HJ8+K2eEAxVxZoB6e4xJuMjWIRHw0PEkyHKZI5OuwW33UfC\/Md2UZWu9E3zT+iGcHwHcybQoYfIs1Cy119qeASHupuScaMAM7QcHN47xu27I1EXB5GP6czGX\/7gNt6+fYow7EjBdrtv49r1M7h6YYCuN4edzERq8tQrP4vtp78o7QWqdFJx5ypk0kVaCg5XWaVVCnaZiyzzBIVi+u9lHwi3SFUrNz3lskktOvpWi3eNgyzrIlLNaMiDprfEdAeK\/EVerrmSQjdl0lYpXSpEmsi1yHH4mGkJtv6X\/+QL9TQGDsYpDoYxTkcVTucVTicpDodzDOcpkoJlfDIy7DFP8Ys\/9xx+5RsvIOq3kM3nmE5idLoX0d++jrwocO+Hb+Lj7\/wAow8fwM1KakKEhYq2I7TO9uC125IMKyOk\/dm8E5oH0zlo4HQaF7avuzrhTMi2Voc1Agd2GKK9uQc\/jDCbneL+3R\/h9Na7mB0O4RksbDES0u\/oVHwvOoNdopZyO51TH5PAIc\/hGipjRazq2TaoY9zod7HRJ4QcyGLSKFXmoNCiyhIUaSI3Pmj14bWp\/OWaSUohQyNGJw+Rzw4xGx4jmY5lfljYYWdlF5Wl15Uy8vHzyeoZ1iybzeETWhWx0pVVjiBkjkCKmnmHA9cnk+iKiuH+3QNMEgd5GeHP\/vIjvHf7GPPCwUbbw3Y\/xNOXt3HxqR1sd2241RTZZC7w8\/Nf+3VY\/ctakRZD5uag\/TmavDYQyQyMM5BG7JD3zOSFC6daFOJ0p15EFnlvSpWaqZjKjq3WTQyMWIFauqNLnDCklRi5RC7+TkWcDRRXhdRKPYQ1JzMBR\/MVfmkO\/NNPWlbkNRKxTVh6cfi6b\/3ei7VVe4KbyeZkmYNZnGE2s3AyznE8yXA0IgsyxZ2DEaoqwy\/\/8sv46pdvIOOsj\/EEaZZja+dZ9LeeQh5nePjOm\/jwL97C6c2HoM5aahodH3vPncfgqX24vbYZ+6njXUTbRQqZoZdXx8c4soJMVEVpRyU6rmpeoRolKOoMm1cv4trnvgi\/28dkeoKj+x9gfO89zEYnWjSnepZSd8mnSPsZ4aNlo5ARRYRcrowwKth\/ItQaE2\/mJipYjFwX\/W6AXYkcPVH4ktVjJCszRtVK+6bTuVDFLGYyIsSlOh2dkNVwp0wwPL6L+fAekvEI09EI29tboMAfASc2tiQqOmEPaclmMhc1cyfbQsv1MZk+hFeTmubQO9aTSJ27KGPqxFjxZ7HVh8\/vlYxw78EYP\/rRIb7\/ziHmdgvDcYLzmyGuXdnC+b0u2oMA7aBCnZUYPjyB1wnx6td\/HfbgojqFyQO00t9Q502SrIyPqGAbQZ8M9TJzXA2ZpTKZ1cTeGKOBys0QIE3sl\/KVpfJ3pUpv+l4a+K25i9FkLSDco8beQCR1gOb9VyZSrlTiNaKswDQhEYxy4Nu\/\/1nDPxBCqWpSVZYUzZL9AdLMwSiucZxYmOcpLl7dxfb+LpI4wXg8Ecx67uLLGOw9hXwyxr0ffBd3vvsOTj8+hF\/aUoeIdkJcfOUGBk9fhRf1ZUSN4HY6QkPfWTo+VFdWHYcsjpUl0kM9e3iK0Qd3MDw4wcXPv4gbP\/2zsDpdmRxyePBjTO59LJ8v\/drclaVeQeUtZ8GZKYrCUBHGLf+QXtWahpkDLPmIh15oY2fAsaqbKB1H+tPJkDHZ9y0bWTZRLVZeaKOZF2LGanXtoR1wiJmPJCsQlOzN+Bjp5Ah5zDZdOlYAy2vDbnPKSwdh1BLmy7UjJHTCqsRsNkE6oZ4tQeSyWJhJHsK8I09jtMJIGL2MjA8Nu5qhzRbmysLJ\/WPcPyjxzoeHOD4ucP3yWfQ22fVpYzydSKS49dEDDFoWrj5zGc998cton3kGttNC6UawOTxDpDraM7OYTLJUIyqNuyIJ0fR2qQCXfXzRdsvfmoTDqHGlmGveoxkdtIBtsutLtdLs9EuqWJyDjKWoCDhrQPfVRVpuNbR98wgRgdToTd7xKF2s35r1k2Ue1eQh1rd+74Va+5rNwC4WrWoLuWmM0i\/si6y7hIe0jGXCCA2GY37mrDQHA5x9+nW0t64iPj3Cwx98H6dvvY\/53WMQN1C6EOx1cOEnfwLtq1dg8SaYvhJGC7FkkTVr+NWboUmB9KYXCWajU6QPD3D\/u+9gejLGU69\/AddefR11K8BkeBeHDz7C5N5HKOdTTcyZ50j\/NjEWq8fNWFAyV6zFUAKuFXmhdQltFpCLRdMAGy1GkDb8sINUkrHctCa70qqaJmPESY6gRZjkI6scHJxOEXYitBxGrBBZkaCenWB2egfF7BQ1dV9wkdu+RpxOH1vbZ2DbEQrLRWkHSDmyp4hF\/lHNKYacwSljFFkqchtOkGlHEQrK8OsagSiBydDZQgP7hJHpFJPTMQ4OExwNa7Q7EbyOhYiCUAB37k4xiTM89\/RZNrPgmRuvwu5fhN\/bRO31YLPqL8oElR41jUaSB5qfJX1rHliJNrqDN6NdG0cwOznzAAPNlqLFZpdfTnPUIQ6Pft4q\/KLqW76DGUqtZQStpD+q11KIuBQ8PhrdtL2ZtRyl1PQSzUDCv\/gHL0rFTmamN4yFFM0MQ2A+jA4iMmspmmhYZIaaVS7c7jlsXHkVbmcf0+FDHLz1JmZvf4jy\/kiajIgVw8vncO7VL8DZ5sRBW6d0M0xzl2qGMzhmVMxiUai3IpFEBxkivnsH9\/7ld5DNpnj6Z7+Esy+9jMKlg9zHycHHmD78GFVKB9GEnnBBCnBETEZfxkVtlMCSvLMbUYgBDl3wTBXblk677a6DKOLoIAepJNw5Wi4nvdBXYoxmMd796Ai3DlNSZdjZ20XLZ+W\/wN4GxwAFKOYzpJMDxKMHMj4oT3PkJXMoH612D73dC+j0tkV2kuU58qKCH5AkUZVtOj3BaHgKK2fdSPO2qk6FPZTGMsIrh9Mtiei0PsM6FeeM0akmoxlm0wqzWWr2Ib4\/CQFP54pZMSy7wvUbL8PvX4U\/OIOKk+xl4TVRX+7Nf52yVexPBUCzjRsc3yS5pt+70Uoti4NG3Njs+2b6unT9GaVvk5voyNLGUZa7f5M7SE4jTJjS9JqIm3gmzHujsjDfzUC0BS1swo9GsSZSmd7\/v\/gHn6thc7fQgfiiZWEDBGGWsFdmrqoUbrgTMKnW4EelEEdbB4NLGFx9DZa\/h+HxPRy++X2k795C9XAKO6XrVfDObaH11BUkdAY2X4UB\/LAFpxWIgtcWgR4TZ+pPlFmizJzzFvjdyixHeu8eHv7p\/wuUCa5+9Q30n3seiW1jNnyAk8MPMTm8A57PoM6hxiQhnPULI3n32JkohsQGKrYXu7B8OkZLciWKHnXOVYmBqw1fUrLyWrKByAyVlDKaKd6+NcPv\/cP\/GePEwYOHx9jd28DXv\/oqnr22javnuyio+5qNkc1OJUdxqgzxnGJKF27gyuA8f+MsnFZPxxdVOZIJGadIiqx2NUcx55CFHKPTCdKcE+fJBAfi+IRarLKnmUr4nSBAuxXJNHubQyUYjcsCyXyK4RGFjISEpTBc8ajE8CRGu8s5ZS6ufeYZtHauwe2fh9veQc2io0hdJHQaWc+qYneZBIu6gcpPA9bVqWS2uo54NW21WjdZzjloUukmWZEjKCTvMW3RBrI9WrRcacNdDHnQzZwOYkxcNuXF8RYLh1iyYg2jJlNwhLFrujXVQRb1l\/\/7P3u5pk5Kag6mSMYGIHqX9OoK4qHytOGgOTmiQYcucuqmNq+id\/U1ON4uhg9v4\/gHbyJ97xbK06lKjFnzCDzEtoNpmaPOE1TcdUqp0Ak0kLyHcpegh6Dto9XxEYUDuC0ffpdq3gDV0TEOv\/NXoox95mt\/C\/7VpzFHidnwLsanDzA5uiuTNKR1l5CJBTiZtk6nYMuuC1u0X65MWXfYiUhH9Ml2hdKoxR1ZConlGB0MtXkrGOgERLeDskwRjx\/g6P4h\/tGffAtXn\/0i7h+d4n\/95\/8cz3\/2BsrpQ\/zcq5fx\/NM7yOKZOBOpWe7sM\/aJlLVIaAiVNjbPoPS3UFqMBpwPnGI6H0u9wspjoJyiiodSM6I2ajQdiaN5TqQpR1nA9yPJAUWN3WpJYTGk9s2co8HBEnyvdDLB6ckJ4pgyFSA9LTA+zaR4298Arj1\/FcHmRfnjdc\/CjrZQc72aDj1T7GsS2kcLeloPUTi0nHBSy6THRlTKmlWTTywhjqIWUuaEOMpuMdo3UWRRADSMVUPrLtW7pl6xOhFmpUTRSEia+sqC6m3gm0hiVGBkKiNLxo0w8J\/8zqfrKHKESmTo9bmgAVkR7gCsQpdw8xp5pdP5uAZFMxKSvuN6iLaeQe\/yq6idNob3bmL8\/Tcxe\/c2PMdDdGkTdqjtvNzFc0YTq4RfApNxinRaIJ8nQhfzIlgdFhk6R0nnqQ5v8AN0uz1xLGeUour38dzf+RrcC1cQ1wnmwyPEc87OHcn8Kjl8x2mMPZT6iszCpaJWelI86TKUmgeFFYGn1WBGMLhwWYBMpoicIbyog6B3DnZrGyWvuxyiGI3wwYdHuH+S4\/d\/7w9kOsnh8SlavQ6S4\/v43b\/3t3BxgzQvdbwWWgGH6U2RpKmIIW2\/hRbHzDOyeVvI7UjaRzl6VdbbtZHFMXw7gV1ORGsWBR7yjHTxKeLZXJyBhUohHBwPKbSvhgfp+CxkinHbUj8BW6GTIWaTQ4yPTjCeV5hPHcxHmQxs3txxsXtxE50z5xH2LqK7dx12sItc2HetS+j4ee7ulFgqHa35osHrhFqGMWoq1nQQnRzCjZAOsswvGtaIBVgFZ6taK9M41RBo5jMWLFZTBV+R3C9pXkMJm3GoCnVWGKrFgLnGofn9aG2ZGdtqBC5NofA\/\/Mana88tRXAXBQ46fo02NVABsSpVvkDIaXQ+qwtMrmhIUtqRyFL7ATp7N9C9+HmUVoiTux9g+uYPkNy8h2i7i\/DaFuqOGierxWxK6HCCosvCJGdIFUiOZ0iPRhi0A7h+SSUGRD0cJAhaCvWYBzB3EZGhFeHCT\/w8grP7mOYZsnGCjNQjjcHmAT9U2uouJWN\/GCVkkfQMEpmcIlNJlKGhUQmnzoko\/K9O4Zcz+E4Gt3MGTncf8HtwEKNIjxBPxvhXf\/YeLl\/\/NP7+7\/wHCKIeDo8mmMQzfP75Pfz2L72McwO2dViS4HN00TyOkXFcksdRqY40XLFOk5WRzPQlgk2yHON5ie+\/+S4eHBzh7JktdELgqf1NhNUJWgEbzQKtrlOz5oeSpAvk4kAGh\/UI5nY6msmTnhlXS351jDobIRmeipD0wf05Pr55DK\/ycG6\/hSvXNtHe20Zr4yl4m\/uw2rtwwg3jAE1xUOnQJTNl8gEprJkcxLBaKmKkgxD2uMYAlSpufmQem0wbUei+cDZGEkOzLp5sBhF98iiFVZ3XagFQ3q3pgl2ZfLJ8vwZGNdFslWpeEVf+m199Qc9ski8LeHWKlm+j7dcIvAqtyEGXQ6p9Fy3OU\/M4bYSFvxouWaJ2G+39F9DbfwlF6eDw1o8x\/8HbyG89RLDbRnB1A3Wf3YM0DPL0MwTTKWAlwuRQ+pgNJ2C1ctDtyElBaelhVuRoRRk6AyaL+WKINrvi4qqPzWtfRbi1j2mRIJ2k8MNQKshSDTdj2PgXYehMFVeCOc85MMUhnTOlJJrShdqmaRcTeNUcPsejDi7Dae3qGRLFGNXkAabzOb79vZuA1cU\/+6f\/IyrLw92H95HPpvi3v\/kKPv\/pTfRadMwIJceelpkU8ayIxyBQAsJe9WOUjot5zpO9XCSZg1sPRvjz772HeR7iaDjFBx++Dw85fvonX8QXrm9hf6sSmpYYubRyhH5PuhFrOqLM96UrpBIVWI2XoRKGTWK3JgoKJqciBRoexbj93ilmoxzbux4uPn0Gvb0NtPqXEG5cgrN9UWcNNxIDiR6sfJkGLbOmOlRaDw+ShjXJBWQ8tkktjKDLHHmmjCn\/aEW9kc4LcylJA+1EdXrCLq1IWCSzMd2ETZ\/KIpoZNXfDsi3rICvRwxRANV9pZCoLcnhlIvxKgv+bv\/i5ejxi+HNQ8IiAgkPRKBIs0AlcbHR9FPOpVKO7vote5KDXdhFRX8fzLnoRzj7\/GvoXbgg8Orz5Q6Rv\/wjFwyOE53pwLrThdCjfDoQWzqYj2MNT+DytqtORhqmKu+ssERUwd\/ra76AguV2eYDBgtZ2TDXUsZlGTBj2D\/vnXEXT2MMtipDEP5okAYntJuhZc3WJXkqRNlJ1NN1uz42lE4aN68hLHh3L6yhyt3ga87j5svy+TVIrkCPXoLqZJjHdv3sOb79zBB7eOcHDvAJsbPl589jxeu7GNjYiBskJG+YzLiS65dAhSBUo5fzw5kb71uKjBpb9\/VODHN4d48907ePnVn8bVazfwvbfexlvvvI33fvgjGUr94pUdfO21S7h2JkC\/H4mC2gt7sBglbG1sY+cmm6+qnFRyKcVNTpFRooIQZg63jJGlCWbHM4wfZDg+HMELK5y9vI3uXg+t3jlE288g3LkGiIMoHSN\/rAy2zDnSM0gkT+X5G9I3YsSGJsI0qL5R6dJpqJ9rVOIKx7Tupk7WGCpBaTO7SqGXzvPV9lx1RON8C5m9cThp31Wx4yOq4ua4OPmWj\/bULwuTyyxE8xT9PtZ\/\/p\/+G\/W3\/uX7SGMtMMnUxKJC1AIu7w9kIvtwmOG9929hELRwZrOF7U0P3TBCwf5Qt8bzX\/wKNvefRZ7McfzeW8h\/9D6K8Qjda7uwzkWwPOqvbJniXs5GcLM5tjoRrFBn0tJxpsxHZnPYbgGXHD9rF+kI3RZbcEsZ+5Nyh\/Q2UPnnEA5eQuAPMEtnhNjwowjgLmqSOTPTWqlrgZvs\/OMmZaQknAJidEU0LpGvmKKTQ0Pygc5gH3XUE0gkzU6zAySH72M8HWOe5bh7f4abH99COc3xyovXceEMj6qboWKVnbfVD0TWIgyTx\/XKJHGPx0eYnBxgNM1x98TC9947xfd\/dICzVy\/iN3\/zt\/Cdv3oH\/8f\/9S8wHs8Qz1O4EddtjNc+fQZffmEXFy+zeNkBAh4JwaYujmrl0Qy2VNstmTVMZitQpbI0f7GVMJOp+Gkeo56lmDyc4vhoglY3QHszQnurjbBLZu0Z9M4+B4QtQ3vyHZizcQql6vMWpKtYoxF2yDkiZoSqlLZWGpsWHZ4qY29615Ux0kKkqLq5WoLeDTUrzJRuXMtJKKZbVIbIaQ6k0cXotEzDVJOQEyGIwZuOw9WJlOrYJrtZ5FTmzBK+8x\/\/0W\/U77x9F+\/9+BgP73NGEht3UnzuM2fx9KVNXNg7j15nH3fuHOH\/\/H\/+FFuDEBf2BtgcDNDvDmC7Abb2r8AfbKFMJrj\/9veADz5GFScYPHsW2GXBzgEHKLCPG8kQLbdCO3KQMKcptShHBSsTdWSc2JFjno8QWDP0vBIV23JDSj1C5IhQenuINl9E4HcwJVNUc5RpS5SwOqndJGqGUtQV0JZcET3K\/FZtuZYdkALgspDjG5hnOdUUYStEd+saCg6\/ZvS3Y1STI0xuvYnZfIJ5FqNDoWGeo2t7aDGfyMfIS1bVSS+TvqaKWZk6qpJ5bmOVZ0jiER7cu4sfvv0h7hx5+PaPZ\/j4ZI7f\/Hd+A5fO7+CP\/\/h\/x3d\/+D7mcY5zZ85KgxVztxtXu\/ja65dw+WwLgTBh3DACGYbB5J5zjkWOUpOdYtLpo6hYK7Fk7jF7b2xuKPVU6irzkxmmk5k2rHUpX2mhs3kB0c7TaO1cR8khcrqParItDqJV6WbD1xLbcsCcGv4S1miOoO8hx+ItekjMeCVh4Jppl43EgxckmNBM4Vco3OipGLEo+RGVhekhaYZJLAuPC539o3O5VoZWa2+SEU+uHHmg4dBMV\/mnf\/iN+uR4grt3Z3j3nUMMj9ljAPz8T38Gz1+4hDO9c+gOdnB\/eIhv\/+DPcXb3LHa3dtDpduBzm7VCZL6LIrAxHx\/h9g+\/i\/qj23CSHL2ru7C2SZu6claeU8zQrmK0HB4+EyGpa6QJk82WHI45jQuM7k9R5ZzaPcXOIEEY1CijtgyIpvFNswxB5xJ6O5+DZXeQ5jlqeEVe9gAAIABJREFUK0AQteTAFaEBzU3lIlIxrEurDUdNtdVwFTocwsxmFQbJrhC6OTpbu4C7pYV+EabPgPl9TD56U4ZyVzx5yrURhWTE2Dk4R5FQK+XAiZhbUaVMmhmI45lELxkrVGbI0ylOjg5w8PAYtw4t\/IvvHeLd+zN86Y3XcGmng299+wf46P4RTk4pSwG2d7fxqWd28Moze3jl+X34FofXMUFX3ZY2pHGEkh52yQnsJSfbg7lNLGvANmM6EvkuToBkDw0p4STOVOlM\/a4foDU4h2jnOsKta7B5fqQYizljxDYFOeMCphYnY4SafK6pfD\/ak2F2aDPzS+tpJhdc9GDQObRfSOsZnjlKz7TDLmQtjRSqOaRnGUGaaKSR5FGpfhM9NKqsjixdOojZDYx\/mOr7H\/5XX6nTpMbpKMXhUY6TOxnsrMKvfOV17AYd9Pwuujt9qXdM8li6\/XySoVKhFrETsiDCBAXuHdzEzR\/+JaoHh+hVNjYvnYG9oWdOyJkbxRxdJ4Hr5tLok1uBHGvGm0u172xe4PjWTA6fGfQr7J63EVKD1PJR+21RnVZ5D92NZ+C392GFPTm1NCEEiniaVNOfqYmgKkA1PAtPItm74lWerNv8kBiQHYjMDzIMBl34vV2UxHnCxFAYN0Mdn6A+uoN4egzLC0U\/xTnaKR1GjpAw2JUaITaXcYypOCwPBapkcDSlJ+xLHx7ew2Q6RVJ38c6dDG9+MMKDo2M8fYXYv41bt++K4cfJFC88fx3PXB7glRv7aDmUvFPxzL4mtkd7KBmZ6wpJlkqXIaMgJykKcGGzmOQh3BE5HnWCOpvCq2KUlN\/HrLDrLs7\/B+0tRLvPoH3+07A9MnBcx8bYBKw9wlg1g7ebSKOzcxXra5hZ4Bc9TbjxqmY+GVuaGxl8A5EW5wc2qmIDrxaCq2Vi3VTDlQlTJa4mIeLZ5r2bpKQZNGEqHobAaPKaVQdp6i\/Wf\/tf\/kydZzaGswxx5qCYOrg0uIDPnb0CL83R63XlTyXjNl0R240PHsDhXKaWj2iwjaLTw2GZ4ObBTbz55p\/Bm0+x7fvY3tsSFS+VsTzHz6sLdNnpZiXa1+BQT2TG7FQ15kmO6UGJ4b0Ruj0LZ86Qnk3RGrThRBG84Cza\/qfg1i1kliewDq02TtjnHfB9VaauMUFl0A1bYbgXncIomJlMCbvudEKL6LJEdVZie3Nb8H1OCQP5cfIF7GQs5\/DnY5TZSBJ71mvi+VRhGqllmqawLGwuq2BzWrWcrcITs7gGtbTfFikHeR9LPkKpTO7t4c5RiYOjsURRRqfJbI6NjT4unNnC7laE3a1QWg044Z6nU7k8EYrUs+0jK2JzeA5g83iKPJN4SXVCmescMolexRz57EQcxK5msMpEoiE79XzPll4QKgpau5xA\/zzsYNNM12+GxhkxohH36cajG85CEbvAXs1m1fSMP5I5L0SNejSFJgJNblOTLRPbFm7R3EtVei8dTB2h+ffSQczMsUeq7A29rDWP5vP+prxm6SRmgNx\/\/fuv11nsy1iYOcf0lCFuXLyO6+19RA7H9EQiOEysKUKvg2I2wvDhXTliuAoC9PbOI++1cGc2xg\/vvYsfvf8OOnaJnm1LXUMGVVP\/VFQIIxetlgM3jxG1eSAIBzebKRQU\/+XA8MEYJwfHCL0Kbd+C5afodLtwoz42tj+Nje51IGEFv0abeU8rwFE1QszElEyWxAsenUZHoQI3kf4NwkHutirD5g1fHgQkpylwdpfjgLzBxmAbaZpLMc5ySMtyDGkOn+MTEw6ZShBTyTwaI0k5XpV5FBW2Mx0JZAGBrTPAKFuRKSQVizslkmSuwouEhcNEBr\/ZQQ9xQfVxhCSd6ST2nDSuh\/2dniTdSToRgSK8EKXXg+O34LXYe+6gTPX8SGltzlIkyVhyQ21EY1RLUIvjpLCyGdkPIOPwu7HALRYgA99HLKdn+ujsXkPn\/HMI23sy3Jt99YJO6QrSSttAJvbwUKNmzgERIkSV0ZJviOGv5CRCoJjKtwhU9W41wkZlp7SJqmmsUqpXkx71I3WkBlgJs2Uii7Ji3CRlzIi0fetjq2eULCed8D1U9qWu2ZAACyk\/qeY\/+oM36umYECuXSnieV7i+dQ2f2Xkam\/2OiAU5lGyc83DNCiHPFGf3HA\/qJA7uDzC1S\/zo\/sf48OQ2Pjq8h7aVo2f7GHRDmSzI\/bzlswbAae4JymSIzX4LuSSRrHizQOkgmZcYcxojk0ru6HmCMhtjxp74KsLe3rO4sHkNbR6DFvgorBrjMsO92UNUATv5NpSN5MRFDnpzXLDbkJL6VovHt5GVMbSWxYM553rcMKFQYCPguYEtD9FgIH3Z83mMVqeHkkbvWIgLB8cHR\/irb30HR4dHUnNohT6iIMK57U3ZqQMnRXfQRTfQQdiOo2lsmSSoE80pqMpNUx41p8cUk3zgsQMxcxgO7SakK1N0I+YXHOk6hcMe+FYPFavu0RY8ynB8T8aaEkxJ8bAqMB0e6IgkOedEe154apcoXDlMo5yhzCYIOckspghygiSeiWCTZzKSbfQ7O+iceQn9wR4yRiqppsuh2zJmQ5PuJURtpoA0B21qjqF9M6tHtWkbxZLqVbtWrK9tt7oeTZehFnsJbzVhXkDiRT6i0Wt5lFsDocxwDwO7FGbrLK1lYXFJJCze1wy\/5tMXz\/2TP\/zF+r0fHeHkJEbqAt1eB1c3zuEL555HhzJ3jvtslRjPjzEeH6DntRG6be1ktGukQYTEcnF3eooPj29jOp9isxNiEPbRDllBPRThX5CSzWJXYgwbcxmneTLJkWSclxVgqxtgGs9RBWfR6e9qvwYxczXDpKowzkgtb+Jq\/xK6TiCQJ89jzIs5jpMTJLaHoM0h0JwoEqCsCZaIq5Wa5IQPwhEaOhep4ERFDm6WcxA5\/9dDK2qh2wngtXjqU42CSmQ6MA\/JqTr4H\/7kf8LR4RQnp3NkCSNbIC2D89lUevDPndnAp66dx\/n9TbScSoqqbbbVcjhcPodbs3dE6xBiGuwlqTgtUjssmTSP52P0GQkL1oUyUQ9QvFix4Oh34AQ9Pecw5PWQmnalIYKU+2w0QjYfIQhJWrTF8Bjdal6nGBlbozkgjyOIJrCLGar4FFkyh+\/W4qjy4wTo7DyHzs5TqEigcB2NPels4KZmYEBRU3RbTERsxIYNbGraXxt2cdlhyF1efwh91Ih18og5ZeuRZiZDAxvZeVOraGTxTVuvbAYcFtiIFz957LMoKnTo3KqmS6KSee8FdPsv\/uM36ls3J4gnORDU6Hda+KnPfh5nqxDlhPOSuuhubyDBEHcOP5SJJx23K8f0zuM5Uo4L2t6Dv7EHtHgMgYWW7cOrPczTUxwcfAdpPEQ482SmVu1bcELi8gTzOctZ7G1w0HNzTOMEzsYVtHp7oAiLcpSyGmJWuBgnPiK3g0vhACxfVQmpTL6+RsqRoVQDU7LhWpjlwBGT1ZC7cowHB\/eF\/mSD0c72Jtqtthy2ycSZDkvEFYYhOr0eer22Tph0fN11KWr0uvjv\/vv\/Df\/4n\/wzLfp5nECi8v9Oq41et4Mpi5++ha2tNl5++Xl84cVPYWuDE2LI3iUyO0whDQfWzeW12YzVdc4E4xHU7O3XZJ\/dg8lsJv3uLH7KKFWej8HjHPwOLK8rSmgZWSQDvFU2gSLFeDJWwSZvlCStJQKRrlMvzFOKZyiLGi4PIM2GIsF3q1SmwRScsO8EMpCiDnbQOXsdTuuMkedoWzSLfTL8QqxJtXnL3tgl+FqtlSzijeR8GonkO3PaZeMf8m2bo6HNWy7eu3FIYVkWuciqjF3mckm0oUBS10NydX7XBsopSDRTTJoOK0MmyHNWZ\/4aZ\/6P\/t6X63TKsyJSeIGFrW4Lb7zwEjqzHLPDI2zvbqG\/u4u5M8Htow+R1zHsGKgP5iK+s3lAzpVL2HvqeXR3L4qEnGe91qmF0egObt3+V5jNjhFxciYHqbk1LI+FLCZivBncYXM4bD7ilPStK\/A4uJmDtC1GmFPpiZ\/mLVipjV3Pxabrw6M+y+0gCrdgp3MkoxNUhQW\/t4EsjHCfRexuF9Npirfe\/S5uvv8WPLvCuTPbuHL5ErYGF+A7PdR2KufuUQLf7vTR7XXNsDtS8RG8aBt56eG3f\/t38e67HyEvckRBKNMXycMLVOKcYTpd4GF3q4Pt7R6++pVX8fnP3RCYRINnsbOaj1DGc+klYe++SEYcG0HUlRyJuxqpW6vmMdu5OGHG88\/ZcqBKMmkVVpk+54ZRfGnJoTnSBMY+FRlPWiudTHar4qE6LoqSR1znsDguqU4QEJfnMarsFEjHSCk14rA+Wiy1UE4f\/f1n4VJJwLnCbB9gP36l88N0QLRJ2hdykCUSWiTcDWvVZA3S3tlUzsnwNR2LdDgtIi6M+5FuxBV9lPFDyS2MzJ2jpoRjMzlSU3mXhjnhf5nzL\/MdHcqg0UrElNLBZcgB4YR5fypYf\/93vl53PRez00MZBEDUcOPpT6NfOHDTGN12gKDXxqiY4PT0odCj9ajE\/NZI8HLrXB\/u2QG6F\/exdeEzaPe3EZJ1nFFScYwHBz\/ESXIAzrhigsBZVnV8irKeSU7AqSZukcoExKzVkeMAnKiNmtND8hnSGRkjdrRFqGIHYZ7ICbcoYmx1zuBM7zyy0REe3vkAVVJi++wVuDtnMex3kEcRbEQ4PPoQP3znz3Fw5yYsK8e5\/Q3sn7uObvucjEvloFEmZju7Z9HpbmAeDzGfTNHdPoeNnYsYzlL8o3\/4J\/iD\/+aPxBAHvT7iJJFhbuPTicj1O8y1PA9bnJPVjvCNX\/w5\/PQbX0QrBALqy5KxOIpbEfuPZFcmvKLmLGS1Xs4b0fMWOYuYDBuLlwnVDVksCgcafxjy+OhQXhs2R9GZNmKR6ojRFigy9sXYQi5IDz1zmf+vvTeLtW3PzrvGXH2729Pcc89ty+WqAjcYIYVOggdAQgHylBcQPAACJCCRCAghRARCthQpoIhINOLFIgI7dhoIJMh27NiushPsxG2V27Kr7LrV3Obcc3az9mrnmgv9vm\/819q3jHg4r2dtu3TvPWevZs75H903vvGN9V20iGBEEyDhFiqPzzXH3tnuojVkBwqI3Txa\/dMYnLwZ48efi6o\/lvo8gD0LLHw+s7D1BFEZw0vFkr0c4r3B8hwchemqicJcU\/1H1ilQp3hZU+m231eT5+\/4ZJ4DtaV\/Dx20XMgjozECtYeASwTZ88e8Wu8w3psLivYDwJ53V6T79\/+df273+vl5rOYfi6vDDjv2Wjwan8bj0Yn2mjftOlbI+9zM4tHJedTzbSyv5jGEfDfpxKyzjNbFON799B+L05Mn0dv2orXexWJ2FTc378fd+nlsBoipbaJZz2NzfaX8ezhmFwaiBwuF\/ury9WhdPJbHQoNtNZvFanUXk8EoTvpncRKXMd71YtPM4tn8gxi1JnHSnajLvJovtCyzNx7HsjuID1CLP38kdfhmN49nH34lvvQrn5eqyPSsFw8fvh6XpHODh9EbTWLUb8Xl60+jP5nGZnbrxSz9Yexa0\/jGhzfxc1\/4B\/HjP\/az8dWvYmRNbNaNmm8vrm91cKfTcUzGwxiN2\/Hw\/HH8K3\/iX4h\/4o99b4yHregphWFsdhWMqKByUm02aE7Gto0mlo1jMD7TKgOiE5ECTWIizWpJlPJDRFwbNA4v3m6TMln2VRFGeTd5\/0Zi3bqEXkuvR1ISsAGRcAawGP9tljdRr55Hq56r2wxbgVGAJjCeaXSnj6Nz+U5MJo80G7IfOT3Uy3s+FVYjpkhRLZQN5Ux6UT5RpXVICct6v0JgvK9M4vogJ1eFNhnmNZvXWgOFm1UkfQSH7BUZ3bspu9MPJMYs\/HNq0V+zzLN4L06BkxVh\/vcf\/s93dy9exDe\/8ftRVas4H3Vj3ezipNuPRyfTGA0GsUP+szuJQdWLQX8kj1Evl7GcL2K128Zs8yIQmD1\/8FaM2pPobbvqe9y8eB7L1VUsOwvRvOEHEeqXL+6ihjU87ke3tYtmCeS6icHlZcTppacKMTLKos5IYsudJqK3aUd3tYv2qBfXcS350Ong0odi21Lefrt6Hs+31\/Gc6bTxZVyeP43J+FHUzTKunv1BvP\/N3\/ZM9\/hMyvHdtvlM6OpevvYk+pOT2Mxvo2o6se3049nVJr7xwcfxgz\/4Q9rYdHNzE9c3NxoBJW+HpXyl1crQZqoYTwbxj37fd8e\/\/C\/98\/Gpd96M6Wmf0iz6nUrTgS0kq7fLaMEWaNVqliIwUXVHsWJJ6KAnyFbjwNKSbUdDH4NCs\/biIoQijBCxpgFv2vNBwHsKJkWFkN4IQg9AwOTltUWb63XUq0W0tncRmyuPKNdL9Uw6\/YlFLsAXu6fRG51G\/\/Ld6I0v1ZRssug92IdjSfHWSVl0fLnHw8q5Ax1ujRb4qO81q9KW9h79QH70J9kQvBqhFOTUWDKGpKCUzzRDuPzcm2+\/RzEpSNYB3Sp9kgNlxu9QRfXNL\/+NHXk1osj8r7PdirLRWi\/F4qehZqnOfrSrQfRRKVRa10jvdsUGJUQFpFDe1cPRfsBmJ1o3nP+1oHADehJzXtwpMlCoN6utRlO18qBHPjJUfj3snsdr0zc1dLWKWt+LCcX1x9fRn55E66IfDdOBu16sXjwX52nZ3cZ7t+\/F167ej1WHTnYvLi+exltvflcMe9PYLq5jQc6d9BHnrw7R52dn8eDha7HmSlZ3sVo30Rqdxe1sE3\/43vvx+c\/\/Yvz03\/m8fv\/FLUNMNAYrUV0Q4C6cozffeDM+\/e7r8c\/8s\/9kPLg4jX6fg7yKIXuihSatot\/eRrdZeia\/d6LFOVVvJDV41uCJIqOhL4piC0VorFVq9IvYNiuJaltL2GLdmsMPBLnd39FhFbS7sqySFo8Ajixy\/fUi6ruPop7fqJBvD0diBnAo6AfR\/8Cp9cavxeTBu9EanVo7ILvdhyTrUFD7mP1RrZ9Sj3iPh5cGicEF+0BcNXphLt71\/wUyK3W0eFJFtjbFRZIl8ckeSHbIXXBkBHLxbWTrMHVyYPX+0aWoYilzLri\/73\/5b+1Ic+jQi\/y1Yzkibe46mg1d1pUhOMl94qk3ymW164KVATS7yG0pJ+HkMCtNwwjTEiEQFihyn6wwQBgh+f4qIoFaa0UV6f+u+DNoFMyeTFVjSMigamLcGsTmBuDguUh5\/XNE18ZRz5bx7He+KKhz99qD+I1nX4s\/uPogBqcDDYB1Oyfxzjv\/SJyfPJHX3rDfQ\/q+26gR0M7BqvPz85ienGllQrNcaZ5ise3E3d02Pn5+F1\/60u\/Fz3z+J+Pq+W1cX4NCednpUt+51pz30ycP45133opPvfVafPYz32l6TWcXg0ErRkPUD\/Gam+gyKcginnVEd3wuWnnTIk1qayAKlUbQGB4U3hTVkmRaKhpgNDx08nCckRVHYGGv1ZSU2j2NQYSw26x18Jgz47diBJCfb2bRrF4IFubI9ZmnYQdepxeTvvsn0DY6GMjlp6J78jB2PWROi7fNEanM7xMd3RuI6UUuVQoYxbBdKZbtoXmx2QZECM6MDmdy5gp2lf+ZsKzjlEmJ2TTMNc9+x0PDT+aaKxFw1HzaXlI3afMl8nwCjMu5EcnRvv\/lv6ZLcB6XM8OiY3jpiIfK8U6oaYCwrO2V6NpStq3JbRe60TSgJEWzILe90++xVQqn0ar6MaTA7LnbvRWNA08on5Uyp0hAQPRjjpzPo4CvgtF1EKdqPYjNbC7j5BCtGh\/0F199D8XPuD2ZxG89+1pcr27j5Kwf\/Q4SOWfx9tvfF+Pp69GRCgsC2Cyu5CBh0O1YLpdxeor8zsPoj6exW9WCc6\/m6\/jWRy\/iD772QXzrm8\/jw\/e\/Gb\/9m1+Jj6\/vYglEvF6LrDidTuPx4weKrN\/zPd8brz8+VdR9+82nqgFOzxBWuI4hDqRBdf5jyZBuNy2tWuuOUGLEcdBsv5dro\/C3ixgO0QD2qgjdO61+m+1F9xCfxAPvWAJErt7QX5Hgsppu1Ck8LxamKhOrZ7GeX0W9vPEQVRUx7PWiPZjkfIcj1gD4efQgBqdPo3vyKHaDXnSj7FE3KlTSpb2wwj0aFB5Y0ePevo9MkvZ6WnspHrcgdR2fTHQORuCaxNdQBKjNBM5Q49G\/vcGVyIVdirGRfQ5pHoN6ZcNT6pjfNsGIrKwM81u\/+9f3PUodTHPCD9z6HFNlqYp3jluHSKFUA0DQDSygjHdjhx8pxRq5Gzq01Uo7MCjYF8u7WC5v6Z\/LA9JA7Ob7OtXpB\/uYRKnWerW+EDjPmJ94vmGDZ9zEcjaLm1vmq9fRbUbqNH+zfhHPly\/i8ZM3VHvUm1m8eHETk9PXY3D6RORBejtMQ9Kp5rvf3d3FeDqO0+E4Hj99qt\/hYK2Xy7i+nsWzq0V85Wvvxz\/4xV+P2+vrWK2a+PpHz2OxyvwfWol2eezis5\/9jhhPxvE9n\/tsvPOpp5rsu7l9EafDfnz84lvx+HwUbXo39YsYInpNx78\/jc5gqsjqgSIOlaNHHyp7uxPPr5\/HeETt50pYDqfVisX8LrqsZUAyaLnSrnnWK8C\/4ve0eo6+Spfi08t5RGGJ21jffhyr+ZXAEQrrwXgUZ2dnsVksNcZbVQOJyI2nD6J79jhGF0+i6l+mmHj6\/\/urOdTYyMKcv9b+cU8Ylh8d\/CQwunOeVYtSLW3pOLRUUnTOtZVjhTx6RgjttMldH4ompvJ6d0x+YOGHFXE6HfqMbJp\/LIW6lunwekutap00k6UY5Pu\/+cM7aRFtLeejueb84tmg18dRLCqSwO1haEYwGnybMrNq9iiDSVpNpiF\/7gcaik206o1CPTl0haoJWP+Szu+NUgai02azjO52KU0nFmoSTTZAo0CM3AykQnVM3OyZz2Yxv2O\/3yAWbRQDF9LQfePJp+Ns+lj9gtvZbdyyM6QzFPiw3vKdadZhIF77wB19cHoeFw8fRoNG7pLoEjG7uY333vtWfPmrX48P37+Oq9lVzG5ZMXcnGjzi2NtWO66ur+P0bBqj0SCePn09TsejOL8wmNFrNfHma+fa0djazKIrDYS1dIbRwtp1htHRZCCe2RBqhT4YEVo9Bwvf4XyAbqkX5KegVWrl8Tb6Xa9J4PADYwM\/I0Uau4E0BYz81BLkYOIQyaJ6\/iLqFVGI+1BLzI89JBUcNXon3VFMqPUQHe+fxeTynehOnugM7bvNet7ZS8h8SLWE8vd7nr0c2DQQvb4olWaHP927GSX73OpgXOWQl9TM9YSjhYSvSyqXNPfSCS\/DUELUCuWkFOxZ86jQt5jn4ZtSw\/B\/3\/jSX5aBmASWq38LaSwLWAkbKJ9D6M1hzuQuMyMVXiXbeY+nA4ktt6WW7icpTVskQlTR18LedyzakeL3zrXI8lp08nrlhZqrxW20G9RV1lIl5KCwCK5Njt3UuUJtE8tmG7fzJi5Pn8Tjh+\/Gae81zTegjn61vIsG+LfTi7rVmMLR1Ln3gzmrXozHkzi\/vFBHHpp7u9XEs2cfxe3NXfzhV78RX\/ydP4yr5zexrNuxvKvj6vZGy0VREKEnwj1hCelbbz2J7\/yOt6Pf3wp94+8ZEGOEGYJie7fRoQWFEdLedEU8ZGKSNIsGld0oqBNfB1CkJQV2RT1N9lkMnKcAwLXZzOV4tO9ES1g9g8N7c3jYFkztWN\/NpNK4uKODfueaZb4IRDvGZxc61CsiSLPT\/ej2J9pPPxg\/iuHlW9EawnC4t0pAe0HMZftkDn9vZiojSOFUJe5lR3Dfi2dFYvd\/kBu9H38Oh94O0pytZBEkmkatrL4Zh1+Zjnvn\/r2CnqW5mYKQO2qsR7A3qHxN9Ye\/+pd2GuxJhewCQjic5frkNC0eKpHDU2FlKN8f7v92WBIqwRdK1fZG3pFdH\/aRpiZLKk0eiH\/jiwnVARzAy6fFw11iGg99KRAXeEzNbqneCVubvIv8Lm5nN\/Hi9iomvZN4fPZmnA7eFCw6m82ihp81ncSqB5yKZCpGiSd2HkqxO5mcxenZWXQHnoDkvW9vb2O1WsWzD17EL\/7Kb8UXv\/QH8bVvfhxX14u4mt3FaDSKs9NRfOe7n7LqercdFyejePrGZVycDWI6ZYVcFd3dVkNoNOCGCOa1QvwtqDesPEBSaXJyHv3+kC8jZwXDmD46wAkzOHd3Mw1gsUOdCN2RqBuGziavZMmyKhtVF2389by3nc9Ku0lKtKCBW9UzLRTFcBhT7o8msQZswYtqdz3zLmNNGfbHj6N78iS6k9e0+ev+oVTykxlHyW1KANDCUR14u+id8n5v7NLhLVGn9Ev4TSkjurIx9eMeaLuvGbzyLc\/3PuRY7dOvlcaEokolJoLhYMPPXr9g9c09HJ0CH4UdLAPm9V\/5pR\/cSbRAurgu6gRZKs\/lS1g7qlig9gRC+75n\/SXkFiPZQ0Opn5U73bzWQMYUGnOVhJAU8MrccZOypJ28OFu9jBXPIDkY55nt3VJizqwe2K2WcSsjeSbx6u3tXXQQr452zJcrLYVpTU6keoIIG409Le1h94fkPpoYj84VQWAJUwugRlh+VvNt\/K2f+Jn4e3\/\/N+I5u1RuV\/HBx1exRtm7141pD1G6Rszl73znafzDn3k9nlyM49HjU9VgHM7p9FR73HmI6xWbcoHTO3F7s9Yi09GEAzkQx4p0iVRpq7VxwN\/eY9JBFRKhOO4JgMMG3pWn\/KDKtKCKtIfJIwPuBfFKCsV2KdVJiYKvbmI9+0BsZpwFxf9oOI2bu48s1cr7VaMYsH67P4xW7yJGl2\/F6OxpVDmGWyYCdS6SdStvfHD5eYhJYTOfAkgov1+K+Ty0ZZ6jRJBihOJT3WMFm\/5e1pOXgw6SlymUjEHaTgkbs5k5v1SGuU9swyppVtpxKfhti7uofv8X\/id9Vcn\/41F3\/di2gV0tPMy2VUUMBJH9m1YjTA1VrS1LbVZ3Kz3ZJSFbe0ZuAAAgAElEQVTTxJKFkOmvUiQ7Vx3b8VAQWWtkr1gBOqY8hMiSC0+UwnGjmTvPEAv\/CIpELp0Ru299E5vb5zocjMBez2dxvVjEso7owwLerZWmcQroIwgqbbV0gC8uLpW6QHDkCoCY6fuwkPwXfvmL8ZM\/\/Xfja99ie1bEqqmkdcXGrcViHos5UCrXs45\/6h\/\/TPzT\/9h3xZtPH0qZ\/bQP2ICSZBNX17P48PlNNNtW\/Nqv\/1a88cbr8ejhJN54cuZNuWNWraG0WOv3+a4s+yTVams9nnsuiFsLwQlSReZR2Ao8knFr7kVRhRrIMDDEUfhZ\/R1SpFdx8+F70YqFUjQ9e3WyIGdSl7Gpl61cGNwoxicPNWHZHj6MFkznct4Kq3bvne9Zx\/5fD7CspjjL5J9Ss08wFfeFtkSz5YH3+VnW\/6VIcAbiPsr9KcFDRDgwe8tuk4ws+ZaFhuKveU8OtVxLCmJXv\/f\/\/I8ye68f47D1ITu4yFIYY6aBRTOu7qVugQfPkc5Sjzik+8\/1Z6Rb6SXsHbLoUQw3i7f0INSA0s0+CJRpvlzAgHd1Ez0kRh29aNrGtDXCmREYTcSd1oLZYOwJgNYoTNl7viRZjwZeE0X7hvTEq9y0uanTUYHfGzAGvBIYwT2hO79ZNvHR1V38\/Bf+bvzBex\/Fhx\/dxvObO0HamwWz3B1xlNC9rZnS29bx9LWzuDyfxOf+oTfjZDCIX\/3Sb8fN1U1c3TLAFXHCIFq1jSevPYzv\/dxb8e5bFzEYdNUzkSRqek1tGW4PostAF+lNbo+lR8Xz8ZIhVkajb7yTwQN2cIM4POvFXIcNwYZoFrG4\/kjaATQrEXbgjgoGzkYaEazAs6RZMA6Qa+1OLmJ09nZ0e1NRgbYpl+KSIavcVA6575RdT+QMiHaZGPotf3aYH\/d5M16VQ033yIoH1nBmM\/xO0lH4CtYGNtKV5UemaaVmKhT80l1PCMqq15khHQp5n\/0qqi\/\/\/H+vSsabnoxIVaxWzprCIJUPvYxKMKhFve57ABdMRi+EvJREVLmdufeOJL4JBc+WIZUIk8hBqeDUPVbk8SMuihkABeljMpTyEBIjlwcwNVsFmxxE2bbKJ1s6Ew8r1ijvXHvABro4EHWh0fMAVrN51BD9mk58\/Zvvx3tfeT9+7Td\/P7710VVsttu4enGrYp0ut2bd2+1Y1XUsF\/DLNjFihcJwJBlVELjFahOvPX0cr51N4uHFOKZnw3j69FFcnAzFxqUekKtY1yrGW+NhdNGnUg6PATqiajtXJtbIuhaKiLrmdMale8SOw41+d7m8FgCCumI9p7ZiAeoiBihqDvqxhH7CsFS3GxvzxKPXH0cP3ld3GP3xw+hM34rh6WVUqEWWBl9xSPlEymM33JqEw6R\/gI456iVHSg73kHbbp1GRFsmfsjYhEeQ0QLNwS22SYtNJlUd6VnVEImU6bik96jVvjhh7Pd4UtNuXEWndJVmsfufn\/qKdsA6pDyGwqgsZ+2k3EX1QS3PIxXhSC\/b\/TAPLV6rIl2pINhkTFdP7pthYGaWUx8t0Tu+b0WfbJqckDeppyeeeWsB3SlzcxuK9hhYLSGPNm+H386rnHe+Xv29pl6LuR7RhZnvmDVcwYvHWgk8X6pijUYVK+u\/+\/nvx1fc+VE9kU69UQ9ALmq\/m6jnMl+u4enEXd\/O7GA6G8cbr59Fr1THkOjpVDKY0MVtxfjKJy4fnmvkfMUvTsq4Vqw8E57Z70e1PhSRJ5oaIxwHSYtRewr61Ltk0n8MshBmxEevtWhR3hsPoMWEkECdphLoZxoiwN+bm09R9pLPeHfVjt65iPJxEe\/Iwxg8+o8YmohKHlQd2rh50Sqgoz89e8CHrPaK12ggFbs3d6vtmX0nL0hBkJgkruelnozhMJTqK+GgmBUWe301vp2he12EtrEzXsz4xqlVoKf7w8md6X87Nb3\/+LwjmFatW0RJFDh\/+kv97RjeRqrIbZF+4l7TKlrnNPNOX4oPacRWX3tyG1+533c3UwKjp5uX3VcRzO\/TdiyR+keK3l5Gx8l0ypRORLuFopu9825K8JwFlQ3igQ1kQeT6gjODozmy0qgCmLWbTtPuipayXt7FcM57bjevbm\/jog4\/jG1\/\/MOYzDjErIuxIqF\/Yl848+ze+\/oFGcs90+KuYjAexvpmpodgZMK\/ej7PLC3XhtaRUDVMoPui0YCAuLulDODpU0ekMBVDYvwIdt039YN6kDVqTpEZqlnbLM+9bGqkU6KtYzJ5rOEqEcW3w8tJ43ZIle0tqjd7K8TD2PD6JcWcsfhhcseH5d8To0dsR\/Ym4Ynn8Mi3K8+H8KbQVWXUqESF7Yoj1KV8uaJLTYR\/6gzP22mXOt+ORgkA6aZ49jsJPsaxt9o5z\/W4iYgUN8DvcW\/WcGZElTA9rE0qJkF9HabIM5Lc+\/9\/KQEzuylxME2mHxYzcLA\/IuCCXEXGARDLLDmd55\/QCpVm0D7OJVujCcP6pZmHxrvuD9Pk9tNUItKqEamamubH0CuCH8TK12d1mUQrmPe40FPeFl2\/\/PmWEX1Q8jPRjGe2VZwE520QN+XJxI7gXlu0cSvjdjdKbxYLqrBG1\/r0\/\/Fp88P6LaIHf8nAbRCn6MRqPRJ2fzxm+qeMEL7xt4u72hQQWRpOhRK01KDZkxzrUG2\/xJY+GwMkh4sDA0uW56BtKnb4npXp1eit6HG7KiqC+YvUc9UuB2VWtxXJxG83qVn2dxeyFOGAQT4mRa2j4pFYAAQsAiZGiH7Pug5NJ9KC\/d8ko2BLWjZOH3xlnr30q2kgiwQIQiOLRVntftiAfyIrueuPIoBbthFyWrEQwq\/aKuP4pbsuppDWvhDlrBdyhOVlSOH+ez6FRrZRYNVLiTF5LSMmGshUh1RmTHnELmqFXklPSNRsu0VrvwTn\/zZ\/9bxItLjwXj5LuQeq0bqf9plL7X50pln6IWZqHMJgnOP\/+sFLYobCMXRpWLkWS1y5nIzK\/A+IQpV\/Bwkwt1dGcOV+irTSB19X8Xdm6rvqIL4Mxgcx5NNRGy3YlCn7ry\/LZiNqJV4ZXXtNQYy8IxS5o0Z1EFmZ3cz3c9XYbo0475ne38ezZTTyfzeLs9NTju6tVnEyZSETeZy4vhNAFJMzhAKZuLgpCVKHqawcgXpZIWlKc4slKW5d0ig22Uj9hmrDDscej9jRYJTLnmjqjiTYi2QIgELBeib2M0rtGwlYosSxieQc1v1YPh4ErGAv1chU3MxRZ8IwdjSrv+t0YdLvS++11qFPG0R1exOD8zZi+\/m7showJJ81eh91FsG7lvSJcTNqMAu5t7bMm\/6KmCPOngFblPXRwHX1Uqyp1w5l6a9knNLCKWorCkz8Evl\/R6nVkuScpiv3loh5Fk3t1cUFTFQh+42f+vAzkEw3APQTnb+qaLanK8KRknkz+uOiSQJTSgKxX+LJqCpXGkC3UEcjeptQY+1QpPUoxuH0RnrfXCZrFzSTQJjzdzUoX\/GaFMsyE14FFbImfe1CiImE+jDQOgRN2IzKYDhN1C+R8YDI3qkFIU2DJCnyQljC5PrvRqU2Q07Rj8BRaJdJgvUXqx8qOMsY2TGlEI5yaMPNhNQ5HakfBnVQOlVqyEzINedfaSq+K60VJhrRLzUK24fJ\/WyQ6ofDQ5yBrWsoQlFq1a0UN+jocXiE\/yVzg0GyWsHxpkSCCQZrYiQ6EUlRiuloeES0UVYas7z6PycnjGD\/5TFSjSUD8YcDLu0K429Y7LrdY6Gj+H1eX0+CO6HtQJdMcefnCtSqWoieeEaQ0+Ar+4l31umv74acDwnU\/0vgMF26LTxbf2y+2YRu1Lava\/Ll6rl\/8O3\/OKdY9OUhpGxWrzvDDTVUtkpFCJEWFWOezhmTxck6XrGebVl8tFSl0u8uBTR0xh2kfcvGi7v18olufnB\/VSyYjZQd3X7p5hXF+cSFB2dmX30okTgqKJeSWuYNSY7HHEPtazmIxZ6rQRSAGAXxb1\/6OSm3SGUD2Ey0GT0xhnTMThHJL+zhF0OFQeif3kM1KqCQoshsBc3\/LUC29F6JFq2cOml7LFCHiFL2hRgc098EhR4wO2HdrAQrWLcCz6uxYmb2MLZR2SyzKGDbUOQhso26yZSpxLbKkxmq7XGNH6R9EyGZTRzUcxmhyEYOTSwlqjB69ExXr8xR1RbjbQ7emynCNmTXsO+ESP7IRaC7dkUNn3C56r2ay92GZkRTSoZ5b7jxXzcKiI5UHPr9yTmW5TiJirmHK1qskNdpF72klBdHy93NE8HeMqH79p\/78zqmNCz+jXOnxs58gCkl6Ayk7KpsqomHe61BqCVn83mskaa1xEa4BFEC8e6G2wH46cBTcKfvFl7SH9E+BlcWwLKOUibq5EORw9g1iJUeIbjPLcxDOJrVydzVx+L0hgQj4KWnRDiEd8ba7672HZ64CliwrGth2Rc+DbbIq\/eBu0Q\/ZLD0aC1Cx9cA\/NBUhc\/rcMmrqh6AohKYvs+FSUfHqNzR++e1hbxLd4ViKlrGD\/mJmLhfPZinN52gG3fUhsqmI00EI3WKYLPrsbGOJisniJlYIg6trTrrUi9nHdNNXgo2l8Yshs2J6QJTqRm9CP4Thx030J6cxGJxGb3wWo+mjmD75VFTUThUOj8+3SqWN3HhT8VR7KjremSLdwxV5OA+opzlRB55X8fqlPtClC4QBi\/KWXAMNrseUicjRJrKVaZb+USYhNZWYoAAN5nTwRH59vugduZY82R3Vr\/zED+ws8IzV8DAw27Skklfqn64\/MAaGeNxV9z\/5ymW\/w170K1GHgtXv1wffM7pi9Wm0IuppTZou1OmYrLv0ZLIQt5t0tX\/AwzNPzW22LvwONU2OtchT+vn5lZptlrPAUOwItotZrGZX+idNsfXWobzeQt8fiRu2Xt1Gi3qlg1zPSoeJ99L33raFCM2Xy+iw9Yo5+pyahMVMzYFBdLPeQmh6w7q5VicGIyqGnrLW9mCsHgveGNEGI0c0NxlWg6U4iw28NdLOdjv6vSqW17ei0zCLAyFxsbqOTrsJiDcbZJqWi6i2TSzullFtdlI8MYpZRQwY7wVsoPfCc6DvAl0eJAvayUkMTh9H++RBnD5+XWJ37FXctayv6zTTLo1dK0aKDK8qy0gdXqOLdn5FAsIOwDP1gC+0GQ41h3l8xhwTx9tRi2UDkg8Uo4IM57C+rfwuYxI+ME7n1Gth9IEU9h5bg5XjBj5It+Syo\/riT\/05NwpL9SRLLk23rP451E7oM8\/PHE1Fj622FFukFO5mlrALb78ormc45SwSHRIHt7HjPWzhbjS6J6PpuDQMwaD6KTQFG4BDcK5WS6o1N5zURZFLuLEPeZmI41Cp4Uhj01D4XkuqWdzGavZxrNGx5fc6fTIRFcq7pi8otoHqAa4PmAs7GGV1DiEHeYfMzjbmrDto6hgOp7FeL\/V7TPQNekMvq8waRHXT3vN2okb+8+RCrFreFSE4+YNeLxoG1BBy2FJ8b6LS0qOl+Fs7DGi1kYG06Zxv5rGZwxmbmxzYMEKwi5sX18EmT8adJUgC3WbQjWrUic4A6DhiOBjYG2s56Kl4YHTRh8PTGFw8ieHZ49hCfyFdky7xobyzs816QOeJg5iph1Ie1y3FPPz4DnPnko1V7yINbD8qy\/tqXjqaLTNDOQDG5+UtBFn1e5VzSURwAJArL\/UKDn+\/bKfsMcnFPT4pPpO\/9pM\/YLAsi8XS1S7t\/n1uV0YUlRfm4dW3OkBketusUVwkuNun9ExGkn+GN9lTUlwoGQenGE1Ua1+jUASj3H6v+54Fv74H6VOajSPG4X\/SmCoGk3CgjaxAydmfSYOW6TGaubmJer7U0poaRq0Gc3pO1QI2ay2ipLxRvYjlkhUDNrjdrgtbTSnUWoUvUaQj1GlZ8d6raEHjJc9vUz8ga0oaZhn+FvPt3bFoJdrsu8U7Qwsp6a9TA+qdZnkrg2PbreqWLJKRGB322rFdXFmwGumfZhvzO\/bWL2IHOgcbJdOaptsywjbqxoCGpU6E96ew3ZftXhyYYf8shsOz6J4+it4Jf54qIIJiuddZV+i8pzMrhz+rhAOdkTqO1Kj0Ipyiucy4Nzil0ePc1ZFdeBufR7q\/vRgvR8Hddv8URnDp6xlJdd3r5eeZ9itlcy1IL0j\/\/qt\/+\/t3ZY9fGXYpL1Z6WWqPHGyxJ8gDlhQOvaPcQElpLJnvhJMvUDx+Kc6c75eLc93hH9UYcvapxyrqBWzWrItknIXP7\/6B89RS7SXelZ1VpVL34GfVIkK7CoHSRakKM1qWrCfA88Kknd\/GesvcOu\/fibXIjRiIJ\/M0CwEpkhHeXaOooT2BjW+uhsBYqiivZ1gXkbctXj6XippeTTvHhTtFeW9wKs\/NeDJkQXS7RLCkeYhIt1Awjz6rTyJkj7QLUTrQMsTi0Ou9tXNiUGq5yLXUc83xg5IxN9K0q9h0UGM5lQyTxOeguRDJ0RWjXyOd3340VSeG45M4ffRWVD1WUSfooihu6VAdcxW5jAlnZE9+1Z58qHBPMY\/h3UuTShSSUdhxGjXJ0e80kHuFaf5enp4s4h2PDllM+X0Z2r4xmbKjTggdLST\/k0hsAp7VL\/\/4f73zATG95H7TpPy7hQHcAXeWVXKyQ6pTDrfxZH\/FAwR7D2XIGUz7AIe5\/U+mdk7X7I0KzcVQbkHOnDbZUHxzOJguLdw11YFPG7gf5Wwg\/im8MVH6NaeMnlQj\/hKd82bNOjUEKuxnarFHOYzAm6gghrZitbvuptPo415BPzFIo91fgogzUZSnxxFJz6rn1XRAvtR9mgjs9mM0vIxefxp1wzzIWmJxECy1VThVF7ebZSyRUx2daUPXtpnFbrWNLo3LHXP3cMqoQ2iqrqJZrDQCjTI9qiVFgbHmULGgdXwZo8k0lhhHx0jdeHKmiElUx7DZrDs9B816JNi3NGTLcSCC8FzcaDvA68YWzIwoBkR\/hmhbzkmpO6Gj8PgM3riOlENWFP0knd5VwWHNmxLyZiWD9ojMgfhY2L33wQNLCRk\/U\/Qu6DJthOLwf\/XHf2AnQ5B8TMG0D7WHH0rplutYpZ2nsIMOosOpvH+mKcL0oS3Ik9tAvKkpOS5ZN4hSb0va1xLlU1xIZ98llfD8XWAXpxpeSfFKhz8NUFExv9f9uWibRkY2iurkc1mLyQWecvwVjb55xJJJPpAeoFRPPjol6gn1qJde3QZjWEIUui5EH+os9NhI4O70Dv6TZnqcW9Nv4DAVUQXQKXp1g8F57KperMXK9RYp7myv8sEGFBiMWPFQiWmLPi89j3XjsdsRu1w2TAp24ubqI9VSSCst53eqm9o9s4BX6230OoMYnT2I8fA8tswDp8F2hlOxCwBw6N10qBs6g2gPRjE4udB3pyNfDpxz\/LJc5+DzfLtJUVXC+7kpatLs7QoYod9kZ8Y9M+1GRqaUNmvMVCUpz9SfcEBd9+lictDoGWk4m\/fJJmNhKIipm4tPUaehTtT4tEbTk8ZU+m+\/8mPf7ywRKUgTYNOzG051PvhJ5m4hlykcaRYkQSUV2EXwgS\/hGsEGwnvRlCth93ATFUMKqzcjyyf\/1tHAhb8p+DainGpUvmxvJFMs4soykHsNon06lvB5afHt6xSLDCDjs14hDrGUGiJzFNtmbpmiLQRF5mdGSrPJFEzWo1mXI6i6+QhD2IvRSYdmQnQCxcLzw8D1w3FUghwp5UNFMxMzF\/N5DEcjMY\/5fYiMDWrz7Y7UVzhI8JXU4EQNXisHWp4cREWedXXtJlZpINriCxxM5EOEmwbg+CTag9OoN6i7tyQU0WMXezXQWelrgIypw3b0JmcxGdEwPBHFptRzB6eZZEBn+CVOy8npXGVEd\/ENYuUd9gc1RCJxNv8OeVTpDGZ6VIp\/p0hel3Bvc20ZqBIJ1al\/6lrnxGpBMIHn0Yh2ZmQ4Ot+7dNVJGX\/5x79\/58ZXxr9MU1z5r\/QG3Jw9ICePnW+aNJFPdKvTQzsoWLdJJcq3FWlq8+ctLPi3a6FD77V0OMsDyMzNGV6Bke9BwBkb9qmb0zPPHNsGs4AXbCdL8ueV\/xFmMQ60Xjcb5fmV5IFQmV9Gs8ZDrwXh6mBmIQg0LdQjmaZeOKPuoNIwlCNBOI3WWfxNXlKpRDtgTnihKJHK3p0foF9+2kghQSZVKoxR7WLAvhON50K5qKOZL6T5hVI86ia7Zqm13miBUZ9wDYjHaQtuhU6ZRbCpdVrtYay3O000CvZmR0lv6h3su6VUbLiX\/d40xqdn0R2fSomRpqbvbUGJnArtm4AG0v2UlXhknZhMWXl9IaSlNrB0qEa7ExRyal2K9pwhz6Yqb2o4v4DFFp1T1DgoMGSjsABEBntY52fk0C0N3gfO20HpJGvZX\/qxH9hBxNOMh49THlKadn6xGyo+YDqE5cP3MizJw9LhTn6WS093kqWUncMs+ybkIZyV993jUdpnTq5uVYLSPNynSlm3FHDB3+oel6zwrtSdT0GKRNT0m\/eQNkcbvls2KRtSJR9ifQGSWcZj0dNiLkSoEcbDOoNFbBK0gJruLjrF+kpkTEmAarlNYegWKJRosY3Nduf5C+oLCTgUyokfPAfcCDVefRztPkuAPFHYHvSjhT6WVCoX6qkMR2PPQjTLaLdqjQSrASgdMQpzCv0mhpOJpxZTF5g+wWpHVCN1hKKDyklH3Xytb0Cfiy58dxgnlw9kIKLzQD9SppsK7S4KSqs3raI4QuUbuT3WjTmlPBnFRTiUlKh3kRSgiN9zbUea5hrEztynAihcsHB6z6w6nK2UrnrWffn13K\/5BICQzqtMMBbPzWf90o\/9Vztx+UscKjX4PoXJY1soJ\/cl5GUXRRUimaQolMtjlEad483eCPaCxAd1bXXqdVDTc4COpSFZXijTsgLruRpPblQW7Np7bk\/AzTRK5ffdNykPNnkPjAAocJNJSiBaTg+9hFoEpqmVJbXpCbkiHmKzs8BbvYzVmlSG1QImQOpBw50CmiaHRr1kuw10jJV2oXc1cEPxdnan1IkfUh4iEbMlUgFk9cGmjv4A2Z1B9FieAzig9cdbpV5tdePdYyCysRab9Jd9LNm4inU90\/DW7OZGhwl6\/dmDR9HrjAWzrqR+aV0vHbkdnfpE+lo5GLeBVb3SirvB5DL6E8aDfdgNwZrisz9XOYTkSOAU1wzkrF8TpVJmUWHwCQ+nFpUlSp1CgwwSEQTCJFlRRpikV4cnp0e6gkyx\/N\/ZGU8nqR5kAgZoIfCcuQ6yAT7nEAzy\/cms\/v7\/\/V9minVYc4XauD3BYTwR9AU1c4\/UqqBIbpE6XntvgSct3BnqF37wbiIwSwYyI66KKGGCDrPSocuaIb1KCaGCcjnoiVHD6vV3KKmWi\/l98b1PpTzZeICCD4iZgeJ70bFlnStIjnSttS5AMp94O+DUhuJESNaaLraK+TvtBFzV81guZ6aaVHTRN9HhtiiN6cRyuRKxkV4DjcReH6SJ5Zsr1TLlwZe00fWJ1ozGdPIg5nUTk\/Ekod5K\/RHqjUGLuRWPm3JbUZ3s9iiqK61bm8\/udE+5hpOTkwj2uU\/YDubFqQLGlG4NotYMCXJCFsgALm51KaojurtW1IvbGJ2exeWjd2LXHagPw\/tq9Dqh6r2HTkNwbXpIpTWIl5KhLpiT3CmnfI9U6iNi6nlScoq6\/f0UyJMxOETU8f1pGhtg6lLNSB4\/u02SMZxNS723aiL3P4oDLp\/pVCqbjb\/wN\/+smYWZgriLnUaQF35Ij5IVuad\/JH7sCtpXJeThMCqp\/yq7G9S4LpyZbEblvIAL\/vJ3VhpR+C43Xw3HLMiKIeljjYC5TrLh2gzuUefv1R\/Fy\/FZLnKzmYghs7QHwQN5FApi8fsEteLlgG9JlyjaKXZJMRBpqyW9eheLxY0o5RxSeh1ED+6HnCh7QeptrGsOFVGtF1XHulhMA1L08nnd7lBGhQDDEO3huhX90VAcK4iJmudnhr7fkbLLAtUWPCGLRNsdw8foHzNL0WJFtcmDFN4s6tFedQajhEC7KIa2Ds1ERwD+lZaONvyRNZpRkQS67rTj9OKN6E\/R0PKB3keG9Pg6cHpmZcNT0a7KrEClwD3SoDx+jnMXh5Xj2TromYoVIGffyNuTa838sJxUKdrTgYtjBes8Gb9FA0uW4++vHZFlHPwQA5OS0kT1i\/\/XnzWxKUOTjq3ycZuZ5zV4s3u8fR1eokH2HDIn9IsOnsDDhS7CdCA18pqTi+K7uFA+dMnT5yjdSTRDp8sXHBXQIBN2Nor9PEop0zISFSBaubpIiiZTJtDoyFO66aJF+HtysHttOuZ41NyCS4jPbnUNrQLdXpYASfmR3YOWBxL8ul6I64RV6bPQ4W0QV8jNUfqzMqiTsxdtd9k7\/b6USSS5CpqE3E4XYzV4U5QVYQgzy0G0Y868XbG9N9OPXAfAi1x7NVJdIZ1i2jHag2iqTfTUK8reru6zSZ6IUHgjE3Bro7qjYpkOB61GyGIXvemDGJ08jbakn0AwTf\/Yz1Ok0ZSmYOYJNgqJbSdHS3KhbITyoh9DwXmxWecydlyY5uZqZSqWEapkI7qWdBLUjyoZRBs89OlktKWPwucUaVRRWtLxp2SQzpVELyobiNEie2shOsxScKgLVFcOaIa+8g9PIpph6XlxN+qKgvZ+eCZ\/b98Y1PkuwysetilI1X0wQHEgjc41BTvLYbb6LxQNMmsqZklPxrCrYb5CnVHhRzGZTOT7l6JBHjR2B+T6g6grpgDd09g026hZ+kNPQgW7HYf0h5ECXV4lzI0ypHdxoHTIXg4VkTvv8gC6Jcqt1xSWtXpEu24r6vVOUaM7mES\/P45a47ce\/uqxQps10ouN+iyz22sxeVkMqoZaxTx5V8YgsIH0Amp+XWvvuSlt0HSysO8Oo9PjVAIygMSRYvEcyiyNxS+IMHxv1rGBiLWIpkvWVaxjePk4Jhes2ksDAfkr3XPNFdwJZrcAACAASURBVJUs44A8FfSx1GPW3koG7V7cIdsFpWZJHtaeFpLwfSnTFb2yMZsJg+pDkw+TtpN5uPcXHp74oZmZ6u+JhnkENyHqzKiqX\/g\/\/wtpHZjyW6Dm5PInrcP9kRT4deZeksT8Lwwks537h1IsgUbw5B4hy1DoFMiRoaRHvjfkvaXPUSykqKgQvhmFdV\/GUkV54Skps++RpJHsyYoq5NDaMlJXNLzc61G41DZZKQwKgaJQNxVcOwXXq2hrzwa5N3q2\/vvVAi\/OAienJfZSPoDwrHTY2EdYNTEcDlT8bzZQO6bRUPMERjBgUkmHf8skI+lUotCkTOxaUSqg7UkYMisSNpIIYqGRCsxE7qgj7M+cTDKAxd6RTdOIutJqN9FCshVKiiYG2UsCSHDrtW8b14KtNvwtph3n0AVit7rRpt6TB2\/F+PLtaFK4XABLqqd7Q0nqVWk\/u1NiRQ2EMKhV0etghFjgAGkdqaq5a9+eyu+75AJksl44FDp7JKykX5qPSdZHqZ\/NgjByqUG7hOYP+9UTAEpjclrn9FDKMX\/vb\/xn6YgTwt3DtDYEvWnKpUhOJjH6ZEN9W0zZV+CORHl6PWRkj+y9E9lEVG7DjSGsJ3sykafSG3GPIrO8JKnt\/w5NKMGjjfJ5Ex7LKgenUfknmmOXWjwPDnG1VqY9QmMQ5WYsdhyD\/iQ2lYeHlDqxrJOeSLNAIkTEREQmKIK1xHO7ina9kKatJU111oVYmUcPXAvNfK3UiW80GE6kCwby3h9MYw32XzGS243hdOrOPTsG6e7vIu7onA+H+nPSKdKlm+cfC\/HaseMEOnv\/1EsqYC9kbxRQAGBEBMqeBcXrmvURXreMdjFwqFjIEB6l60saBKV+EdvFWsgdYnzbzVXs6MRPHsXkyec02QiqRjRQA7SwZNMx8d8aXUigRy5IfCf7NDX4UmpKbYQEBjxTf5juOzj+rHmyw110w+zaEklV9EpVdudYuhekjoaLM9XX+jrAi5xxBHDh++psJ5Asreg6qp\/\/6\/\/pzvm+m2eHsFUOmn+xjMpqq1FJb\/bwXHJksPSS3+opObcvtJAi+Vi8v43I24aEQJQJxfySxTOUCUK9X84c6LX3qSSS+3eVaWj3kML52ugp5CyITN8zFL65XP4yeu1+9PujaI9O1bDj\/YBfabBZ39Z1iblWGInV0tk5yJuQclFPrdYenFIPQu8xi\/liGcMBSoWD2IjuMZZoAtq8k5NToVvc+95wJOiXXR4rVhowkz48saq+cvKQ8uO4x4zJJm6uP2b4N3rdaQxHk+ybtL2sSDUfkkBDRTDWP69WMzk9orQ1mVNvTE7IE6DMtDN8VTGyC1LFsqPFi2gWd9E\/ez3Gjz9jinuONhQ3JOGE7McdFA99roqzNAzvGpJDKfJ71k57AdpMs7JfkM42Ryb0nEuRn049U2Sl1qn\/yxmTMgkmmswKfU6y9w69sMxyck6kNChLZlJ94a\/+JyYrqjjP8Hiv1VMu1MUYPdN7xbMmxBw1KL5BhLo5yO81Wv4fOzE+kfMTcnNJj1OismuuUEMKhIsTsEdxPZLRYo8DOMLlV8iOeKG+fHI6rRTl6nVk8WaBCKModIzVbBtC+55KIG9btwIyH14URXiKb1FH1qjMW\/sW4+Hf0ZaCusAGW5XopTYiNUDrd0Xzjl3uUFSAVvknzTH+jE453pjn4AIfYyN1o5GIiiHookXjiCJtoWil\/+FJxojOAGnSlsSuGdcVdJ7sZV5DlJA3lVdnoxMHlJqNiUYUNGEhbzRm22yJNNtoN0tNT7LCmqg5On8zho8+baJiy+1Qdqog+FC16RuZqLhHFbNWMNCZPa2E4cuyHEc0Q777jFmFtKNb6aHJzMoEpcabLSvkdD1TukypeKMSMUrqfmh0mwx5\/+9FVkz9LP5d6R7n42f\/yp\/ZOazZtijoRCnc76JLKoaYj\/YyewJjEZBIZWyKWHn1fdOovPYQKEueiYGUQ3+\/6HezzTp2LlwScs5f8uvviYM5dhvqIyXJAl7Qb0FqdGOLgSWdXt+xFS3JxLSju1tFF5XzcT9ieGoMftuVhhQHhsjhDnot2VK8mCIGBEXUS9JQa6DeFQxgjwzz4LW+uTvwgBYOgdSwPYpun3mPKlrkuqlW0uu1ldYtGZEVGsYoKOmAozhLQzEow7Uml6pMRuytN4jV\/EarEiATdocnkhiSIbM+gry6PUxq\/VrbrmDuwoeCJSnSJBFRdcQ8OnjmGunV26i2iM0tYnT+bkxf+y7NiOC70DxTtNVIwmGRjY3QzlP1bXLoZAJ7YcKkxu8Pt5Gj\/VSfHKIjgClL7nF4wMxAj8TolLU4dWb8lzRT0WnfnCxNiPwdnFCKC+L1y\/RpEb8roJFM72d\/9M\/saCxJrEyni9zS6VGpM3gDbaPlIGLVhLhEvDRYktGli3wNo6elc6mFO6QZSVZMtyo9pIJ6JQThwtlWwYXznfQNKKyTau98s6jOe+bEBsU3KAsiu0rzikkKj1ekc3fd048mUBKdWHvNfnhEnbnGzrATNTykdi\/qGgPhWh3kiBB0zY1wkad7OWYBMOQ8lrOYsY5O3V+o7NZhGvcnsWQ2H1KlDnw31njk4cj3vdcTakXqw6rnCppHy4xoQALl0NIQZjajqzUOe7Jgy9KjQGxf\/+qXVZugsTs8fSia+j51regcD\/bTn2JFp0OCIi8woV65w7CjCYpSyjya5UxNUZC80fRJTJ98n7rqoDtMY4pDptl7I4efUDvM3oPTrEOh7VrbZ8ppc26jysadBNLlYEqfytmFgRB7S4Q0fGZMhbJedDKGC5WF38\/x6zIzRGZJf4iaA0TRJYA78ea2eaxXrYGf\/dH\/aIf3Y8FL01CggYKUjaIlLII4ZOVXID3dWCjJVjrpkuett4GqYeHFuMj38ND9nE8X2Tn0SzTUI5Dp8Gd+4GX8V7em1E8OuXowOVLL929SPQ8DJfCrRwNRz2qPkggKhLl30W9hUC1RuLtsjI1lAOujAYVq4KY7iGo3iIW65jBgc2iHQyReVs7w4CS0V\/BO0QQPxtw68qWsm6OW6PUnUv1jRbRZrESMXvRPH8agNxE7YVVvtGyHe8SYLhHdD96ICocLushiOY\/p6UWMx5dCmTAkZk0k6i3Dog+zlAYwK9UwOOZKgK+ZanTqvpMDEWWlNOzkDEkBW9HeblRjrWEuL26itb6L7ewqdrCZ15voTZ7E+PXvju7o3Kox2ilY0EQfLDs5qfz5JEP+ZKVDkluV2CUNRUazR\/+cajkttIPMEjyzDddLJRVS2pipLhw11xgGdJyy2XCkDY0guyKQz5EJptTX1ljDQAvPTe1YEVKbqL7wV\/5jYUPp4\/0m8qqlAMpDKzp8znvcC50udA31EW5rMUfLSG7RyD2kWIX5K3JEydPLIM1+e1Xe1xJddJ8zR9zPpnxyfoQVCkrtiHSKErvobgtlw3tH4B4BRw9Ip1rr6KOXy1ZeDuRwHLvOQAINdcuLRtkBzyECUVKjSfI8RstIfbfK1UFAWJfgVGbDjsDVUjcfbhQboRjiWaPYqJXRg+hwYMfnStW0D52Ce0nzcauNT5OTqQSwcRIgUURXqSpyX9sQMAexhuayq2LKmrR212ACyFTHKipaNET60W0pJZNsKURMZh9ydQWpHRR4jLDd2WrP4Xa1iB2DYltvLq5nL2KHMgqqLattjE7fiOnT742qP\/GCJFIeQcueKTdMz\/NPXl1pKxTPvx9zzVGF3Oqk3rtSQdAvrqGguNYHIytROiX2w6G+dMFvMXJH1KKMeKhNGHBDyd4qoCCqbhp6p3qmwoLzLeJgapLRr+rnfuRPC7k3nGqOk5ZJZlG8L67FZznoVgntSBgN4yj9hiJJr45xCiFY2rNwvczwLUp8zEeU4knyLd\/+uQUeLFVv\/v0+iiRVRLAd4bGQtDDTPdpGhLQ9cg9HsYxBiz2B7AhsR38yjWpwFvWOQnYbm2qshy1qu4wgF94kjKslPook9DRAfIi4zGGQgt3GerFy07GP6LQ\/F+GE2e2d6CPAvAsAjU4r+hqvbUW1NcWevfM8B0iK9FngXW3bSJVaCKKINlTdVozH55Iz4l4AtFCXSBGkYY0anhE6S9mB0lNKAS1G48TqPAtw9Ux73meVcaxwWDyP+fJFtNhWvJ7pd9arJsYXb8bw8XdHC4V3DEO5TUKwai67Niho1b77fUBSXHyLfoMY96FZ54U\/TfSTi1a6\/Y6iyajIaFWiSKlzDLw45ab+EG1\/LyhX6gyu2eMCMgClv6VRneee80\/9WHTUvvAjf8oThYkE7JszOTLrngN3jyIR4peOsOFAyXpalIFfuneGHc6TW4N0qMuINEKODHvNxdsxC7YYaNq9DMUFeUGp\/BD2hpi56r65VOR+hECUkdxsDHEYadR1quh1tjGoNjFA4gd6en8Y7dG5lnwyRsv71VBD1NDz6KqWjGqHvCMGnghEyMxaooaLPjhnwKN4b1Ah0h7pNsFMEHrmlFGHWYeA8VwLNbR3eHPPdq9ZeMp37noXe71m7VxI5R2LYwU23l\/7C7veNNxFYQTN3WYXy+VcqUOf9Krv9\/DzMWWIWkEkQBwXDTxGfrUHEiXJlbV8WRW9fqGV0qsFO9U32p578fTT0b34TFRaPOr11Bbl87kQ9JE6w6WOTRzFzAwV6LmMKceo3Yi20yEVLBWkxfZMF6GLX+ZuDk40QQBxv2xAZZiviFyU+qs0\/\/ZoV0YejbsLEXNa6JqW6ELTsYrqCz\/yH+4NpCAP1iNKKnPKqMDHYU1zIXlxoTXLNAlJxbh1APwg5DA0jmuBYyFlOWKsC0w6S0HIlRdnL6QQJ0s31AlgHvp9+V1QtxRBzk6yD6G9mGsYtixtY9ytYtKrpO7eYTsvnKd+LzZ90KTT2LYHShWNVpHPI6qGQbjXgSGzRJP5cfSCqRsK2mK8jMGnOpZLC10XtRX6hXTI11v3Xbh\/3iViUWdyaIiH9GDUvFRa1ZMBck+oKdq7So1CNTkbK5Dw2RgCUaBI6AAVK9LAC5NUqgEXaiuQYXHDNEBlijlzH9wPo32MFANTzwTrdmhuzq+jru+0Qg6yJN\/59NF3RPv0U9GdXqjelOFl9973Hi9tCtL9gpoDTAdd8GtuDXMW4OfE7xI9ROTMRh6TnTgjDBwn5brlgH66L3SvBZCplz4XJHZbap1U4+TP8rNxdG5gJ0Gz9n2xEza9QsHhCz\/yp3W8D4p4kkxy0yirUa36TbhNjaCcMCtdSw+0GAOjf1CiTtGm5e8lMs2jSKKh547LuEyKH2fiWcImSMa2NhbOg2APoPNGqxSaGOU6x15ljw3r79fMXrTqmPZbcTaCC7WKXqurVKXdH0bdHcZOS2IGsW2xno3UoJIHX2vdAdXbVuxWqSQy1or6OgNEBkP36ot8J5A0TSICn0p5hHlc\/hwIdWUJnWjpvbjn05OxvstKDF+QKBua9YJ5A0O3iM\/xms26idFouj94wxG0c6NoUmWk+96qVOf4c3exWM2iAgVLA+Qzur0EAYhUIEEouUCfkXPwNuHN3fNoNUsTM0k1Z0vVZJdPPh3jB5+N7eA8tp2+oHXXBn4GZZ5cZWDO3+fT0RnYp1wl4CiqFACoMnzNM+eP2we6e2nwlU5JiQT7s5JDfeoRCUlzX85RnjENHAvjw96bwvdAFA8whKhl9AplmTTEhAeqQ4p1gM9UfPFYcxRXmE+mURYlyCJJvYcsxsr2HtKWkm+qi+kRSDeBcpV0HmZHCF2OU6okupVayOHR+b01sJJSUJTyZJROYxwxdVe9CyiF6E4GVZyMutFRQ4luess6T\/Q6BifR9Eaa7apBOmg70w9grwbq6Al7coOXC8+ns3mWLjrLMUuk8sNKsqJqE6di1qrqKY0KhqgGY9UkooNExOJupaA6mkxkVBzoXtVxk5ACuts3reT2Ki7OL+Pubh6dTktjsyBU8qZqPnq23d4XZwOB0bAx4trsaieiIOcjYmMFUgSKt1Njc7e+ifndxznjwjw7K7rXsa3gmzFqvBaLua6qePD6p6N78k40g4uI\/sgOLwfVzG4wtG1Ghfx4PndCx6HvURgMjgAHR+MUmg6\/oXtB5eqvFWbGoXFowyyMCVucU6lkChAh1KU3bd5NRaftBQF1x8IplhuZ5m6RNqMuWX3+L\/8H5mLtUQM+puwZdMPQESHrlMSs+SBCpnK\/5Ntz03UWUrK0GAq0Y6El+qBcqpKjqnpxjnoRbX3Yc8Jwr3RSEImE7XKazVSTvFilWHjfTgxJWejoUMj23LxEfZCPFD+IjUmj89gOKcxRyam1rXYXPeXZu9VMelhESlYls51JzTZNFEJUNNpiqy6de65rKzRpLTpHV1pS\/D0ERRqjkCGJsKU2gb9VlF+oQ2gccvhVo7AbHfmh5TIGA4p9KCtzqbC7d1FrRrwPnDtg2jA74fRzOlZ\/96xGztdLeMHOagsVhtEBEC2khVa3samRDaIOoZM+k45v4TipUdpwXRGXT96NzsmbEcPzaHVPrISSvQo\/76xDiiDTfiLUWYIOu4vaTKl6Ag5k4CmDWhqsur38j+I\/OXScF0cJyrHDHo9yRosR+OG4OVyaz0orC2Ndx9l9mQInU+jh8GWa2p9TRfVzP\/qnNFHoQqqIUCeGXUKfJhpLE+jwoc5sDA9ZVj8V1WUgGRVy51xhCgvnyH3p0mzV+9prbBPR8sUePIUjgwK4G2aZ5\/p5OL1jbBR9qHFvGINuFQOabJo14PfpOq+jC3u2148YX0RgHL2xs7TVJmo1prqxXtbRgnyIltWW3BvRgq16ANv13NOFKsw5QJwxlDG8u8OehxRrJZ5TxYYq9T9yG1ZSOiStQweda0S4DY\/b6Qr5ArmSF94ryHs8l4e7QRiOvslyFbSMtE61asdgciqqPJGfmoSDpjURakiyEsFGUqH6jmQqAEqLxuAqOkC\/awpyR0j20m+WV54UqzNHp8agT7ZtxejsSQwu3o4YnEXVmURDevKJneXJy\/MWE9c31AQZKezlfXjlSOXBHT2hp5Bi4Wj3vKm9YIPn1csIA+9RDMRVlM8w0XtPnVKm4zMjI8ma1Oc9dZ+leYDBIfin3VtpUC3DvhTphaBV0ATvRneDRwdfF2VIzMVyvsk95q3mhjVam51M1+jJ4CxUeu84JBeFyAc2bQPxhtpGCzbLMpb7HCu\/lw4UITXHMA3\/kb9XMRycxGSSu\/6Qf96tohbqBL5uhqoGiyD+TR\/EpjtW97dLr5NI0euIRFivt1Gt5rEC1lzfSU9Kk3z8zoadIXPt\/0DlhK46RTDUELRrue2wfdcbZsbHol\/Qs+gh7LbLrnpSemjKjkZjXQ\/deiN6TfS6IxXuwM2wezVeS52CdBCwLAgaDbteL+rljaSBeB7j0Wl0xyMfohaQr4tf0gbJinJImk3c3T13lNwtot3U4p8hzMBnNuxFmT8P6DJiIS8wqDoqVN9ZwxZ9rT\/onhJBzqKJQTSwi9FZ3h9kgyTa9LVrK41TCqrz4FSnwMBE80IvN2oEMucGXvr\/A6rUoClG7eRRDKdMbtoq4xH96NBYPvTNYJ\/kVmRFk0RPi1BiDuYx+oweqwU0yDSI\/lVUP\/PD\/16mWC6GzYMqyAJWbYKc\/FVOWRVFCKMh2eNIIhnjqiWsGTFooiNWqxuNe+guiWHFsm3+1AgFCizSFmZg6qY0eEg+s6z98jw8aM3p9CQuLy+jB21mc6c9g+sAbmVnOEhbEwF2PzqLmFxGwI0iH1xtY9elsz9Srg0hD4G3Td4sPC8GWdc3sVtzXzwxCKqjrjlEwbxnYtSgObUx0Y4UizFXZlhMx29isVjGul7HZHweg8lIzFx1t6klQLuAiLUDpC\/Da7eQ5IHmUUcPsTZSN9gK7TTG9V2slrcxprnWGcRkcik6EJHGyODGu+DVTHPPRhKby1uTF3lfTRtCeL6Lev4iFrOPY7dcax22c3pGfOFw9WN4chG907djN7yIqj2JDYhV09bYsNIecb7ct9ASODw6teO2rXkQw6mH\/3Ht6oZDowHiTfEO9+Mymsr5+jWmhWTGIkqToxCBAkJpQbVktOrDsePEmREOrXTiaZ7CQlCm46ZfcvoSMy1KPj\/9Q\/\/uYcWJTWXfMFS4kQKFDUT1WP5OIYs5XPlDRBrLlQSls5pJWI61Ouczc9JEtNJ38Y2xCp7NwcUus9tGrpI2LQJbSb8AAdyxPj85i+kJW4\/w9HdRcdNz2Yp8DN3kyaNonVzGtnuifkS9vondchHd0SDWfA5qiBD2yLl37n9o3wYoTj2LqiYK3Kkh6JXMc3ORmA1Rk9KRdYvn1CwENRlLaSZiBRNluRbGVbvtoSIHh4I6Q3UHOXhmt5pT1\/hr19I2ErWoZEBEFugq\/L44X7GJ5x98EMMpEWesvgTsACDfzXIu5yQ+YuHG1Qx\/bcQw9oxJO6r+2LXI\/EUsr78VzexW69yYc+dLUYPA4D29fCPakyfRmlxEqwc83pHipMsKK8QUeF1iCnKSzGPA\/rVrLeOxFkwg30vaUgU1H5gaaDfRqD10W1Y4HxQ8IVm6hPDWEM3YJ9PCY7d+D7IHp\/wu1Pm3MnciCdZ8jeZhxL4G2s\/+3E\/\/0L+9u486+Q09omkEjjdnYUkCbPrChFsMKWHX+13u8JJJ52Fm+Ul\/WFNdXsVsT2NR6GLxpcjykJPxD3657Fj3p\/9RBQqw7NHwJC7PLmIwbEUHegiC0WJsOvRLBGF8GtXk9ajGDEQNtQu+Wb2INoxciuN2n5dEA9oDtFsj5zMXzUTUdjXWiDB0s5njIILMpRnFoZeWVH53moKkIxTgFnLuW\/QtN7dSgGuCjiVmPW\/kRTCCeRV6BDQCZQTsJGxxANlB6NSCPgwCb3t0SNT4hebhQZ8gP2oBax58lnRaiaalDrHqGXhRrHNTd95RgnVqOkCbm5hffyO2N89jtbwTfUhHiwbpcBgnF0+jGlzEbnAZdXcqmou3XxX4PYXexIOjs4\/Ht0K7V1inZGxC87CMmXjUJoqC0ucUYknp7bQdTSQKlz9FMMJERb8Yh+3+i8GAkhEVGJpIrL\/b0\/t9ICUcroE2Rylv\/SLF+t\/+LRfp9w75niWaW4O8QEwVkJuC+ytJLaisS1y2FHiviFhjJ7kJKIWjC\/u25JnOKbPWuSfsZiZnrgh2QXOYSszmJF9l1B\/Go\/PLADQiiWupwVeLJs5PdzCOzvT1aE2fxo794ng0DhRrkbmy\/iCaNjq5FNlg\/571YPouiCCMzyIGB7WdRiHFXMOcOIaYG6XUic77ocEjkCSr0jPzgbQr0ZUUFAoKngy5nU6vJ9jZlBUvHFUqSoOz7TRrtriJEY1COt6kbmzg1ZAcKvkYjuswtkhxKJhp0R4NPfhNdJg3CfhNztnnSPpIqZ6cPiMb8qadVmzXt7G4ei\/q24+Mdm22IiUSVTtTb5mqBg+jNUwDQSZ1z7bw4VJWUFla1HsRATLMDffobJkPIr3iWbnvpkhWdnbIURtNVU8u0xc8u\/s+QNs2dDtz66QVA9m3IhSxPIwnGrxg+NRQgFLC6EGRCsrmpmsqbnU3qp\/+X\/9NRZDiwQ9TfXymYTu9YapGlPpJFyJt06Qbp3cnJOsG5BdXhMgeiQhsZVFiog7uvJeZ90Oz78CjOQjM2WCy+wo6BTmk1Y5xpx+X52fR6+2iRWjMRucGwmJvEN3Jw+idvR670SNfCx6U9cjzj0Ji6P0TMnXxgkQrYbPShgbTXAgX+OamvhWEnYHM\/CpxmpxzS793a4UOKX7sutoFSB9jveIBwexlhQARx2ls3ZhIqA1ROXaq2X7tRO+adwWaRE9EG6LQ+K2iM+xp34fQo11b9HY17GIrvhe1xogdgx1GbbsyeHvNfnQ607CM8U7be6X6mOuQpUsGKfHuWcw++po4WNxPCu56tYnu9Dx6qCr2HkVr+DBqgAmNEdjVlRRFOl14fFjVUFkaFFE4R\/dhV3t5t4r94x5IUbQxIOSZ9YIs2SmYLkPq6frKnKrc96gZmny\/1ARjAF5pOk1UlhBBa8kMRVSg3GXp93HnXpG2aUf1U3\/p35CrL91OSXCmKgSphTRYkx7NG2mpfdYh2hxUlBaTmLirM68UbEeqhgfwB8toklKwlxHNiylhzwCBVgjJ+wljF03dtRA3iMMjGgLRIZtBpyfTuJyy8WittiLeotMdqRHYu3wSMX0tdr1xdJpO7JbXsZ1dR7X8yFj48DSaDqvVaBLCu3LqCM0CI9iBXEFE3NzlQcbrOH0ST4rRVEHPTg+JQruGB8EsCsbgISc1XDttNfy4pwg3bIFStYEJ59GLbt\/PAoMidSLV4ppJrbQObTSI7eomlQZb0ZfCeharwYguEYUUwePBGOvey6Ks0iIFI6UjtbO0DzWU9g22ttHCQSyuY\/3svahXHwqwmM1nQlGnD59EdzSKTetB1N3z2PWG0e7kaG\/SewRxK6pQMHMP1rGL1ANQduBimO+p3lLWx4oU1Lk5OUkqJdVJ1Q+OOHbeHCVELdAXcINR6VEywb373Hy3MpdS1GYkqqf0lyZrIylZkWUz76fedTSySAjgT\/WT\/8u\/rgji5lNBCcoqKhc0LnYM31mgy7maefcu0r1BynC0PX2pF1R93IPuDsP796HBfOm+ISl2XpIZtXKa9CA3AKnoFnsXdCSVPnrduBh3YtJn5NRkQPak98+fRPvB21ENL6NhySe9gNmHsZt9KCgYeLnmobCxNbev8gzJVTewWvm\/lTlBgAgc1EKTxlNSH+gQqEC0tyMfXi4cynt48u7I9JKqEoeLh0c01Wo1Fs2A5GzZ9cGqtnkqvZQBL4\/D8rn0Smgkzl58KOgWKJktTyI4blZSOCn8IneKgWfpSmNybMvlK1gVRsNSqcElSgYpJ5w5GoWLZ7F5\/l7MFh9rD+NmSc3VRGd6JopONXgSu+GjqDlACOBxoAq6tF+ZZyEKZmEkzIE3zlADgFCyFgAIyU5s\/gAADE5JREFUDqsWuOYMf1FRdBZCU9YKjqWnwSFjtp+6r2QVFsxwsU+U8FkuyqA0XRktsPQOjVQjV5Zgwhh5vl0oR8p2clchEfAnfvBfs4Fw4DWTTNe7KEGobMsdgzQC+y5Dc+SxiAbbarNjqeWHDokeZ0SnNgXmUv6l5IeHdCubSaW7rptm+M4NJClMZVf\/oF0kQ810Fhj1dLAT74qBqKo3idH0QfQfvhXts3ei6p4qBWKlQXP7Yezmz6JikGmzjQ2GhtI5KVbj+RaGrSArlqEwIhbpAvfKe9L9s02BOaFXkq6xIrtaVw1EfyYDCz\/NSBxNSOnhUqB2htHr8NmsGmARTi2CIj900A2DF81h+lM7DU\/hMAx7oufL6wtPLUU1SFXaKKWwV91pC49eEkE7U+OtbWUABQoLKVeLpZyLFzH\/8Mvab4i6yeZurTqpe3oZ7RjEuncRMXocVXuq78FOE\/Ms8rmjJKJeFX\/gtNgExDIIlUJzAh1oA6Bcn72u3CKllD\/fr0xn6lxl+o7zw3hMRbGooJZ1Vkioco59dqgXod1Y2SSJiKnfZcg4SZX6qjQqeS3PMalEP\/GD\/+qhBsFMyNdSjb3MiYhWohw5OTKEPRmOpwdL0VVQHDX0RMGwNE7R3LXHd2SQdWcBVR6SMXe17V1kO2R5JJPUzabnLjM3oupKNIDibsh+PRbf0zCq76I7nMTkwTsxfPjZaE0eRE1RB9K0mkf94ptRra4U5ZS6kJ\/SR4CwKAne\/OykM5CvKt0r\/Q6USnLQgybjXiKTRBDmL4anIrwfbSjqaiAu9XsyAqm2E2VuotOjWUjKRqFeq4D3\/bYEDfeOw6YUTaLajmL0G9jdgbeESCqWLvCxeFk4pLb2f0i8gbkVpVGm\/1s8gvkQGpjpvaGBUJsxSTh\/EauPvxKr2beiXixju97Frt+P3vRhtHb92PQuoho\/iGhBnbETPTR4E\/bfw6lA164BpNmVcLdRJsu6kpIJbBBQaSi2SB59kjd1mBjEOVtkwqeCNLXT9ko3nSdpCmz1Ptphcw8YUDf\/EzSUnBdholZjEAKCTYv58f\/5T+7KrLnwcrrJWRQ5EiTNfAdTtJ8iaP4AoQxFq95nN+G1FKXO3M75JdwAaB+WDFW+nrIvLt5MF9gLdyl14oG6gJXnK7pGW7SntjHsdmLMxiPSmEE\/O82bWC9uom514vLJ52Ly+LuiGtDV5oKXUa1von7xrQj6GZpia+KOfgAHB0GEnmnvq3Xp+KYSIfBvhg2RBOGcMbm3XUuPl4dVOsoIB2haEAQgawI+i8NNz6DXAT3xTsIt21o7PYV3OaRWK2a3oFbj6HZbGt1Fq4tbaWi4UV2ChI\/oIZ1KKJ7ybXk\/7m43BoOp3mvJ1l3QoUxvDLuQZgAh91UT8YMot9DK9TwqkKyPfi\/mt+\/H9mom2JspyPbgQgzopv8woncaQd0mlMnRtDAu+G+RFXN7hAVQHGNkGPKRniQzyNFVRDvwpow6mbflyFJEuO1sHS2tZpoARzovRw2jporkQsBcu8jJZc8OAxOsK5TRLQX+3Q1PI5Niof\/N\/+FPZAvFw0\/ODU2flgPPsOj1uzYMOqN8MLKZsvQMAfbxXhnGmxfUwoW2RY1BcITSQNEolBHo4MhlCgEz14oDyIHCCK0c2JKyoeZPOhGTfsTpZKAVy1oThhdi3JYFOJtZ7LrDOH382eiefiraI3aNV9p93q7n0dy8r1XJ9AO2CEgDVG3utPlpvkAhvRdD6CiCtWGEQrnY6CBLkVBz1K7Jti1WMNfRwvsgGq1Z+XXST1jTloxSvgG7\/qCi7zZxdfVBTCfn\/l4rTy6yyg3oFzav0is9qDuRHMn1Z3dXcgLQInqsRcDrb+ZRp35Wf8z6AxfppB2eP0GqlQhTq1mKijufoaqkBUGS+5YcN0WQZaxnz+Lmw9+NWFzF5vYmNnhrIhNQOAJ1g4dRwWXTJ0F5d0+FyKaxh70GQKbOufCm9LTo+ZgqYodIL4hMYUvHWyiW0z7Du55v6WhMgoiDkXFOACRMEC2ok9LcjNJWanRD2uvArQxTeiPUQWW\/vDZo4UxWNIeZ4gTM8EqJ6v\/4i3\/cA1PpYZLkmF1ufcts\/yfkm+kWrylNm\/sUAFCBkjKpA5y0MOWU6l1kN7mCAlI4MibnFcFj6xVZT0o8Gx4qm652u+h12tEbtGLSa0ev39HhkVqjQjTeKRdUtkcxffR29M7ejegPo+EmsU98\/mG0V89VFKOESbSk27xe3aWEXRGS60cliNTaUfC0WB9AKlAMF2NYI+O5WseAvR77IRyE5OxcMBAMSlEGfJ16TF6enDnrDiJrNsDa7CNXU7CK+d0dYLLqA+R6eA1DUifTB1ZCUUoCG3et368BBSBjqn+AMZJWetZEjAScDLUHyJdAEK\/EozaQkBzgxOImNvOPY3P9tVhefxCrq+ugwdSwxpqhst55RO8i2tpy69SwUIE8KJWgTSrbJCFPx4vDLhZFjjWUqODIWUW3bQgWgyuNu9JmELVQ\/RboRhYW2c+9Z\/wq8qQmd9rRK0LUpLsp8C2jxOBc9JNNQevn70mDnaLuotNte53FX\/vv\/kWdYmsLucgSX6eMaKqnYFmUUm+UcClr1HBQYtcygKKNBOXCSoBKSWxfhpCTY+OL8KCK65GiZcT4qgeOukDFHJLWLnj2o06oaUbawMFxM6kt4TqlewIRqmjaJ9G7eDP6p29Fqz+RR+3Wd7G9\/Wa0Nrf+OqSTFL1LBBBSBjW2sVoyTLPUTV5r1LatYprij8gEIsRgFRT+dVJNurrhbjChpOimFL0HuuUTHdTSxFqzaZZoUWaot2zCxRN6rkMRMXlrnoXAM+Pp3XuB9QuPjPdIcUnxjFgRB4eLTr5FHrADVBfZDSKLRfg0F1ZSrMMX4753hHa1SHfqjWqPxYdfjfXi49jMFtEISu7GHZGH1Kp\/Hm32mii9OShwuoOTxXqqVnKuiu6udh9KDskzmIZn3WfzSjgzgzlulibNqVCPkZUjtJ\/lKLSSAmPLIWR6ZRp79k\/ScSkQJIIm6gyGoPzPyCzPpbQxMBQMpvqrf+GP663cFDShsKBLhPi9aPC+qDlsl9UUbQ5DuX+hRyJjcJZUhmUOsF7BnD3S6+48D0rTXSrQxWvQNGNP6uJ4PYhszHd0YtB24aXhoE6qZ2gJD\/noQP\/cYiiDs+hffCr6Z29pvBZD7q5mgjBbGAo3XesSCNnO3cHwoYPzwNj1oUbg2tSTtVKtRtuVWIe2UW3klMokNb6r16lZC8wcLoTZ2u1JLBljxYvlNl3gWlE3gY8pxNk7CIRKDwN1eGRImXbs9kRv9zxEDoihyqJolN46ZTYZzdUhqfDsHXGpWh2K17EHrATFg3hRqPO9zKjW9iZSng1idZto7p7F\/NlXYzF7gaZRLHed2NTtqPvnUfWnseVhoCoPE6BrYxTamAOjpFqqQ7RD0WiaRLj38qkW0TCAg\/F5BLuMWDvjcz1m2VtL2rqlUChH1uAr2Yth+GwkZjNW17nXaNMBTiaxG8yAM7yf5k+A2jfUkoxGWB1GZMk81cd\/HO\/A8Q78f9yBo4Ecj8XxDvz\/3IGjgRyPx\/EOHA3keAaOd+Dl7sAxgrzcfTu+6hW5A0cDeUUe9PEyX+4OHA3k5e7b8VWvyB04Gsgr8qCPl\/lyd+BoIC93346vekXuwNFAXpEHfbzMl7sDRwN5uft2fNUrcgeOBvKKPOjjZb7cHTgayMvdt+OrXpE7cDSQV+RBHy\/z5e7A0UBe7r4dX\/WK3IGjgbwiD\/p4mS93B44G8nL37fiqV+QOHA3kFXnQx8t8uTtwNJCXu2\/HV70id+BoIK\/Igz5e5svdgaOBvNx9O77qFbkDRwN5RR708TJf7g4cDeTl7tvxVa\/IHTgayCvyoI+X+XJ34GggL3ffjq96Re7A0UBekQd9vMyXuwNHA3m5+3Z81StyB44G8oo86ONlvtwdOBrIy92346tekTtwNJBX5EEfL\/Pl7sDRQF7uvh1f9YrcgaOBvCIP+niZL3cHjgbycvft+KpX5A4cDeQVedDHy3y5O3A0kJe7b8dXvSJ34Gggr8iDPl7my92Bo4G83H07vuoVuQNHA3lFHvTxMl\/uDhwN5OXu2\/FVr8gdOBrIK\/Kgj5f5cnfgaCAvd9+Or3pF7sDRQF6RB328zJe7A0cDebn7dnzVK3IHjgbyijzo42W+3B34fwHJN33MX2Bj\/wAAAABJRU5ErkJggg==",
            "response": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/FwM6i2aCEkx30x4EYrqUb9nq02eUvupPXGrWhIPN.jpg",
            "xhr": [],
            "url": "https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/FwM6i2aCEkx30x4EYrqUb9nq02eUvupPXGrWhIPN.jpg"
        },
        "fileList": []
    },
    "califications_average": 3.375,
    "pesovoto": "15",
    "apellido": "García",
    "casa": "casa1",
    "birth_date": "2021-07-02 12:39:30",
    "company": "Testing",
    "dni_number": "123456789",
    "phoneNumber": "571234567891"
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
    -G "http://localhost/api/users/loginorcreatefromtoken" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/loginorcreatefromtoken"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/users/5e9caaa1d74d5c2f6a02a3c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","names":"evius lopez","city":"aliquam","country":"rem","picture":"http:\/\/www.gravatar.com\/avatar","organization_ids":"cumque","others_properties":"[]"}'

```

```javascript
const url = new URL(
    "http://localhost/api/users/5e9caaa1d74d5c2f6a02a3c2"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "evius@evius.co",
    "names": "evius lopez",
    "city": "aliquam",
    "country": "rem",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "organization_ids": "cumque",
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
    -G "http://localhost/api/users/currentUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/currentUser"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "http://localhost/api/users/findByEmail/evius@evius.co" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/findByEmail/evius@evius.co"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "http://localhost/api/organization/1/users?filtered=%5B%7B%22field%22%3A%22others_properties.role%22%2C%22value%22%3A%5B%22admin%22%5D%7D%5D&orderBy=%5B%7B%22field%22%3A%22status%22%2C%22order%22%3A%22desc%22%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/organization/1/users"
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
    "http://localhost/api/users/id/changeStatusUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"status":"approved"}'

```

```javascript
const url = new URL(
    "http://localhost/api/users/id/changeStatusUser"
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
    "http://localhost/api/users/signInWithEmailAndPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"evius@evius.co","password":"evius.2040"}'

```

```javascript
const url = new URL(
    "http://localhost/api/users/signInWithEmailAndPassword"
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

#User Properties


<!-- START_80e4098ecf7c46e19bc2ae66dee69b0a -->
## _index_: list of user properties of a specific event.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/events/5fadbc9c8bc34c4c890c5ee4/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/5fadbc9c8bc34c4c890c5ee4/userproperties"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/ut/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/ut/userproperties"
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
    -G "http://localhost/api/events/eaque/userproperties/tenetur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/eaque/userproperties/tenetur"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost/api/events/dolorem/userproperties/dolorem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "http://localhost/api/events/dolorem/userproperties/dolorem"
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
    "http://localhost/api/events/1/userproperties/1/RegisterListFieldOptionTaken" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/1/userproperties/1/RegisterListFieldOptionTaken"
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
    "http://localhost/api/events/exercitationem/userproperties/corrupti" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/events/exercitationem/userproperties/corrupti"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/events/{event_id}/users/{user_id}/asignticketstouser`


<!-- END_e3cf9cc35163eea18b0500dea24447d3 -->

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
    "http://localhost/api/orders/ex/validateFreeorder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders/ex/validateFreeorder"
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
    "http://localhost/api/orders/et/validatePointOrder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders/et/validatePointOrder"
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



### HTTP Request
`GET broadcasting/auth`

`POST broadcasting/auth`


<!-- END_66df3678904adde969490f2278b8f47f -->


