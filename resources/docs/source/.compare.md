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
[Get Postman Collection](http://devapi.evius.co/docs/collection.json)

<!-- END_INFO -->

#Activity


The activities within an event are **sessions, talks, lessons or conferences** in which specific topics are discussed.

Each activity has its **date , time and duration**.

These activities, according to the organizer, can be carried out either in person or virtually.
<!-- START_0c4bcd062bf8533da02e9afdd3e9e075 -->
## _duplicate_: endpoint destined to the duplication of an activity to english language

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1/duplicateactivitie/rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/duplicateactivitie/rerum"
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
`POST api/events/{event}/duplicateactivitie/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event to which the activities belong.
    `id` |  required  | id of the activity you want to see.

<!-- END_0c4bcd062bf8533da02e9afdd3e9e075 -->

<!-- START_a4a55c62b61aebf221a7b56f081e0350 -->
## _createMeeting_: assing meeting to activitie.

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1/createmeeting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"activity_datetime_start":"2020-10-14 14:11","activity_name":"pariatur","activity_description":"commodi"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/createmeeting/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_datetime_start": "2020-10-14 14:11",
    "activity_name": "pariatur",
    "activity_description": "commodi"
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
`POST api/events/{event}/createmeeting/{id}`

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
    
<!-- END_a4a55c62b61aebf221a7b56f081e0350 -->

<!-- START_62fbfe55bb9fd87ce0fd3fec5bd1b034 -->
## _hostAvailability_: end point que controla las disponibilidad de los host al crear una reunión

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/activities/et/hostAvailability" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"host_ids":"[\"KthHMroFQK24I97YoqxBZw\" , \"FIRVnSoZR7WMDajgtzf5Uw\" , \"15DKHS_6TqWIFpwShasM4w\" , \"2m-YaXq_TW2f791cVpP8og\", \"mSkbi8PmSSqQEWsm6FQiAA\"]","host_id":"KthHMroFQK24I97YoqxBZw","date_start_zoom":"2021-02-08T07:30:00","date_end_zoom":"2021-02-08T09:30:00"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities/et/hostAvailability"
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
`PUT api/events/{event}/activities/{id}/hostAvailability`

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
    
<!-- END_62fbfe55bb9fd87ce0fd3fec5bd1b034 -->

<!-- START_2b49ae79d301c06028af57bf277dc0fc -->
## _registerAndCheckInActivity_: status indicating that the user entered the activity

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1/activities/enim/register_and_checkin_to_activity" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities/enim/register_and_checkin_to_activity"
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
`POST api/events/{event}/activities/{id}/register_and_checkin_to_activity`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `id` |  optional  | id of activity

<!-- END_2b49ae79d301c06028af57bf277dc0fc -->

<!-- START_9e0ca3bf8a5715074f04da99706d1d75 -->
## _deleteVirtualSpaceZoom_:

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/activities/mettings_zoom/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities/mettings_zoom/1"
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
`PUT api/events/{event}/activities/mettings_zoom/{meeting_id}`


<!-- END_9e0ca3bf8a5715074f04da99706d1d75 -->

<!-- START_55725aeeef530f59dcf513702eb76be1 -->
## _index:_ Listing of all activities

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/activities`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | require

<!-- END_55725aeeef530f59dcf513702eb76be1 -->

<!-- START_d5b44a1e8243972f42d95b117397a87f -->
## _show_: View information on a specific activity

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities/1"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/activities/{activitie}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event the activity.
    `activity` |  required  | id of the activity you want to see.

<!-- END_d5b44a1e8243972f42d95b117397a87f -->

<!-- START_abb60f527b9773a27ca95b03f895e392 -->
## _checkInByAdmin_: admin can check-in a specific user on a specific activity

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/voluptatum/activities/nihil/checkinbyadmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"dicta"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/voluptatum/activities/nihil/checkinbyadmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "dicta"
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

<!-- START_9a0403e87bbf04f98ccec81595fdc574 -->
## _store_: create a new activity

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/5fa423eee086ea2d1163343e/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"PRIMERA ACTIVIDAD","subtitle":"Subtitulo primera actividad","image":"https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg","description":"Primera actividad del evento","capacity":50,"event_id":"5fa423eee086ea2d1163343e","datetime_end":"2020-10-14 14:11","datetime_start":"2020-10-14 14:50"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/5fa423eee086ea2d1163343e/activities"
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
`POST api/events/{event}/activities`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | id of the event in which a new activity is to be created
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
    
<!-- END_9a0403e87bbf04f98ccec81595fdc574 -->

<!-- START_628bde723158349a4cffd9f00e940c0c -->
## _update_:update an activity specific.

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"PRIMERA ACTIVIDAD","subtitle":"Subtitulo primera actividad","image":"https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg","description":"Primera actividad del evento","capacity":50,"event_id":"5fa423eee086ea2d1163343e","datetime_end":"2020-10-14 14:11","datetime_start":"2020-10-14 14:50"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities/1"
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
`PUT api/events/{event}/activities/{activitie}`

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
    
<!-- END_628bde723158349a4cffd9f00e940c0c -->

<!-- START_522081942cb50f0ea0ee8326d75dce66 -->
## _destroy_: Remove the specified activity

> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/1/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities/1"
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
`DELETE api/events/{event}/activities/{activitie}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event to which the activities belong
    `id` |  required  | id of the activity you want to destroy

<!-- END_522081942cb50f0ea0ee8326d75dce66 -->

#ActivityAssistant


<!-- START_e0ccb05959e639de7d4e4dd3c68556d1 -->
## _index_: List of the activity_assitans

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/events\/1\/activities_attendees?page=1",
        "last": "http:\/\/localhost\/api\/events\/1\/activities_attendees?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/1\/activities_attendees",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/events/{event}/activities_attendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 

<!-- END_e0ccb05959e639de7d4e4dd3c68556d1 -->

<!-- START_c86adc4487e15d69d7c0252fe860928f -->
## _store_: create new record activity_assitant

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"5e9caaa1d74d5c2f6a02a3c2","activity_id":"5fa44f6ba8bf7449e65dae32"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities_attendees"
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
`POST api/events/{event}/activities_attendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | required |  optional  | id of the user who signs up for the activity
        `activity_id` | id |  optional  | of the activity to which the user subscribes
    
<!-- END_c86adc4487e15d69d7c0252fe860928f -->

<!-- START_b608a1e67ff8f31d596f3cefd3aa9700 -->
## _show_: view the specific information of an activity_assitant record

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/activities_attendees/5ed66ce2a6929562725bd7c2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities_attendees/5ed66ce2a6929562725bd7c2"
);

let headers = {
    "Content-Type": "application/json",
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
    "message": "No query results for model [App\\ActivityAssistant] 5ed66ce2a6929562725bd7c2"
}
```

### HTTP Request
`GET api/events/{event}/activities_attendees/{activities_attendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `activities_attendee` |  optional  | id de activity_assitant

<!-- END_b608a1e67ff8f31d596f3cefd3aa9700 -->

<!-- START_72909086e39c55cc7be2f2c3d6718343 -->
## _update_:Update the specific information of an activity_assitant record

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities_attendees/1"
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
`PUT api/events/{event}/activities_attendees/{activities_attendee}`

`PATCH api/events/{event}/activities_attendees/{activities_attendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `id` |  optional  | id de activity_assitant

<!-- END_72909086e39c55cc7be2f2c3d6718343 -->

<!-- START_dcd50abfb0c53308b4c8f8faf5280a8e -->
## _destroy_:Remove the specific register of an activity_assitant record

> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/1/activities_attendees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities_attendees/1"
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
`DELETE api/events/{event}/activities_attendees/{activities_attendee}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `id` |  optional  | id of activity_assitant to remove

<!-- END_dcd50abfb0c53308b4c8f8faf5280a8e -->

<!-- START_5d7f38e360b7e302ecc8b12d1b42754b -->
## _meIndex_: list of registered activities of the logged-in user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/me/events/1/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/me/events/1/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/me/events/{event}/activities_attendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs

<!-- END_5d7f38e360b7e302ecc8b12d1b42754b -->

<!-- START_502d45645ea8a6d7fa50895c044bd950 -->
## _checkIn_: status indicating that the user entered the activity

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/activities_attendees/quisquam/check_in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/activities_attendees/quisquam/check_in"
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
`PUT api/events/{event}/activities_attendees/{id}/check_in`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | event to which the activity belongs
    `id` |  optional  | id of activity_assitant

<!-- END_502d45645ea8a6d7fa50895c044bd950 -->

#Category


The categories are a facility for classification of events
<!-- START_a3f47d4a0050ce677364d4f73eba41eb -->
## _indexByOrganization_ : list categories by organization

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/categories/organizations/5f7e33ba3abc2119442e83e8" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/categories/organizations/5f7e33ba3abc2119442e83e8"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_109013899e0bc43247b0f00b67f889cf -->
## _index_: List of categories

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/categories"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "https://devapi.evius.co/api/categories/5bb25243b6312771e92c8693" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/categories/5bb25243b6312771e92c8693"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Animales","image":"https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/gato-atigrado-triste-redes.jpg?alt=media&token=2cd2161b-43f7-42a8-87e6-cf571e83e660","organization_ids":"[5f7e33ba3abc2119442e83e8]"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/categories"
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
    "https://devapi.evius.co/api/categories/5bb25243b6312771e92c8693" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"ex"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/categories/5bb25243b6312771e92c8693"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ex"
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
    "https://devapi.evius.co/api/categories/5fb6e8d76dbaeb3738258092" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/categories/5fb6e8d76dbaeb3738258092"
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


<!-- START_11437bb938648370779cd0883f18af2b -->
## _indexByOrganization_: list comments

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/comments/organizations/illum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/comments/organizations/illum"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_6c560cb463cae69ddba197afa896608b -->
## _store_: create new coment

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"organization_id":"recusandae","comment":"et","image":"et"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/comments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "organization_id": "recusandae",
    "comment": "et",
    "image": "et"
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
    "https://devapi.evius.co/api/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/comments/1"
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
    "https://devapi.evius.co/api/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/comments/1"
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
    -G "https://devapi.evius.co/api/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/comments"
);

let headers = {
    "Content-Type": "application/json",
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

#DiscountCode


<!-- START_a5713fe21a364fcdf05d44f3e7a88ade -->
## _index_: list of discount codes by template

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quantity":2}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code"
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
    -G "https://devapi.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code/5fcbf67721bfcb1393450fc3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/5fc80b2a31be4a3ca2419dc4/code/5fcbf67721bfcb1393450fc3"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/discountcodetemplate/1/code/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/1/code/1"
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
    "https://devapi.evius.co/api/discountcodetemplate/nam/code/in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/nam/code/in"
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
    "https://devapi.evius.co/api/code/validatecode" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"Nyd0jOpQ","event_id":"5ea23acbd74d5c4b360ddde2","organization_id":"perspiciatis"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/code/validatecode"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "Nyd0jOpQ",
    "event_id": "5ea23acbd74d5c4b360ddde2",
    "organization_id": "perspiciatis"
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
    "https://devapi.evius.co/api/code/redeem_point_code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"aut"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/code/redeem_point_code"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "aut"
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
    -G "https://devapi.evius.co/api/code/codesByUser?organization=omnis&email=autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/code/codesByUser"
);

let params = {
    "organization": "omnis",
    "email": "autem",
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
    -G "https://devapi.evius.co/api/discountcodetemplate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/discountcodetemplate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Curso de regalo","use_limit":1,"discount":100,"event_id":"5ea23acbd74d5c4b360ddde2","organization_id":"5e9caaa1d74d5c2f6a02a3c3","discount_type":"neque"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate"
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
    "discount_type": "neque"
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
    -G "https://devapi.evius.co/api/discountcodetemplate/5fcee46a27b131731965ba7f" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/5fcee46a27b131731965ba7f"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/discountcodetemplate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Curso de regalo","use_limit":1,"discount":100}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/1"
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
    "https://devapi.evius.co/api/discountcodetemplate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/1"
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
    "https://devapi.evius.co/api/discountcodetemplate/1/importCodes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"":{"json":"{\"codes\":[{\"code\":\"160792352\"},{\"code\":\"204692331\"}]}"}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/1/importCodes"
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
    -G "https://devapi.evius.co/api/discountcodetemplate/findByOrganization/5e9caaa1d74d5c2f6a02a3c3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/discountcodetemplate/findByOrganization/5e9caaa1d74d5c2f6a02a3c3"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "https://devapi.evius.co/api/events/modi/documentusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/modi/documentusers"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "https://devapi.evius.co/api/events/qui/documentusers/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/qui/documentusers/et"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/events/enim/documentusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"sapiente","url":"voluptas","assign":false}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/enim/documentusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "sapiente",
    "url": "voluptas",
    "assign": false
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
    "https://devapi.evius.co/api/events/recusandae/documentusers/voluptates" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/recusandae/documentusers/voluptates"
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
    "https://devapi.evius.co/api/events/libero/documentusers/nam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/libero/documentusers/nam"
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
    -G "https://devapi.evius.co/api/events/ut/me/documentusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/ut/me/documentusers"
);

let headers = {
    "Content-Type": "application/json",
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

#Documents

The documents are file that you can downloads from event.
<!-- START_ac7c4e2e7ba17649bbd99e23de766cee -->
## _index_ : list documents by event

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/earum/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/earum/documents"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/events\/earum\/documents?page=1",
        "last": "http:\/\/localhost\/api\/events\/earum\/documents?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/earum\/documents",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/events/{event}/documents`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event_id

<!-- END_ac7c4e2e7ba17649bbd99e23de766cee -->

<!-- START_90eb8a785fe9d0335f98ad8905d3a0ed -->
## _store_: create documents in the event

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/voluptatibus/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"gato.jpg","title":"gato.jpg","format":"jpg","type":"file","file":"https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/documents%2F61a65a6c47430f7aae79cca4%2F1639168484513-gato4.jpg?alt=media&token=1455a85f-6381-4a92-a00e-47c916ed236c"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/voluptatibus/documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "gato.jpg",
    "title": "gato.jpg",
    "format": "jpg",
    "type": "file",
    "file": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/documents%2F61a65a6c47430f7aae79cca4%2F1639168484513-gato4.jpg?alt=media&token=1455a85f-6381-4a92-a00e-47c916ed236c"
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
`POST api/events/{event}/documents`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | required |  optional  | name
        `title` | required |  optional  | title
        `format` | required |  optional  | name
        `type` | required |  optional  | type
        `file` | required |  optional  | url document
    
<!-- END_90eb8a785fe9d0335f98ad8905d3a0ed -->

<!-- START_eced5d59e8bfbfcb2d3e52c9f1ffd318 -->
## _show_: information from a specific document

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/sed/documents/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/sed/documents/qui"
);

let headers = {
    "Content-Type": "application/json",
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
    "message": "No query results for model [App\\Documents] qui"
}
```

### HTTP Request
`GET api/events/{event}/documents/{document}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
    `document` |  required  | evdocdocumentumentent id

<!-- END_eced5d59e8bfbfcb2d3e52c9f1ffd318 -->

<!-- START_79359dc7a323d27f72b9b0c0f55930c5 -->
## _store_: create documents in the event

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/corrupti/documents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"gato.jpg","title":"gato.jpg","format":"jpg","type":"file","file":"https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/documents%2F61a65a6c47430f7aae79cca4%2F1639168484513-gato4.jpg?alt=media&token=1455a85f-6381-4a92-a00e-47c916ed236c"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/corrupti/documents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "gato.jpg",
    "title": "gato.jpg",
    "format": "jpg",
    "type": "file",
    "file": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/documents%2F61a65a6c47430f7aae79cca4%2F1639168484513-gato4.jpg?alt=media&token=1455a85f-6381-4a92-a00e-47c916ed236c"
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
`PUT api/events/{event}/documents/{document}`

`PATCH api/events/{event}/documents/{document}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | required |  optional  | name
        `title` | required |  optional  | title
        `format` | required |  optional  | name
        `type` | required |  optional  | type
        `file` | required |  optional  | url document
    
<!-- END_79359dc7a323d27f72b9b0c0f55930c5 -->

<!-- START_dd680f9966c666d6385239c68c07f2cb -->
## _destroy_: delete a specific document

> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/aut/documents/nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/aut/documents/nihil"
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
`DELETE api/events/{event}/documents/{document}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
    `document` |  required  | evdocdocumentumentent id

<!-- END_dd680f9966c666d6385239c68c07f2cb -->

#Event


<!-- START_3cb2d4356d9cbfc3731f111cf37179eb -->
## _EventbyOrganizations_: search of events by user organizer.

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/organizations/1/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1/events"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/organizations\/1\/events?page=1",
        "last": "http:\/\/localhost\/api\/organizations\/1\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/organizations\/1\/events",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/organizations/{organization}/events`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | organizer_id

<!-- END_3cb2d4356d9cbfc3731f111cf37179eb -->

<!-- START_de725938ba779adbbb84d8bf81220ce7 -->
## _eventsstadistics_:

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/organizations/eos/eventsstadistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/eos/eventsstadistics"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/organizations/{organization}/eventsstadistics`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  optional  | organization id

<!-- END_de725938ba779adbbb84d8bf81220ce7 -->

<!-- START_742a1cbd4a274c7269f0db99a704ff41 -->
## _index:_ Listing of all events

This method allows dynamic querying of any property through the URL using FilterQuery services for example : Exmaple: [{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events?filtered=%5B%7B%22field%22%3A%22name%22%2C%22value%22%3A%5B%22Demo%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events"
);

let params = {
    "filtered": "[{"field":"name","value":["Demo"]}]",
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
    "_id": "61a687713bbf847b3f59d117",
    "name": "Demo",
    "address": null,
    "type_event": "onlineEvent",
    "datetime_from": "2021-11-30 15:18:00",
    "datetime_to": "2021-11-30 16:18:00",
    "picture": null,
    "venue": null,
    "location": null,
    "visibility": "PUBLIC",
    "description": null,
    "allow_register": true,
    "styles": {
        "buttonColor": "#FFF",
        "banner_color": "#FFF",
        "menu_color": "#FFF",
        "event_image": null,
        "banner_image": null,
        "menu_image": null,
        "banner_image_email": null,
        "footer_image_email": "",
        "brandPrimary": "#FFFFFF",
        "brandSuccess": "#FFFFFF",
        "brandInfo": "#FFFFFF",
        "brandDanger": "#FFFFFF",
        "containerBgColor": "#ffffff",
        "brandWarning": "#FFFFFF",
        "toolbarDefaultBg": "#FFFFFF",
        "brandDark": "#FFFFFF",
        "brandLight": "#FFFFFF",
        "textMenu": "#555352",
        "activeText": "#FFFFFF",
        "bgButtonsEvent": "#FFFFFF",
        "BackgroundImage": null,
        "FooterImage": null,
        "banner_footer": null,
        "mobile_banner": null,
        "banner_footer_email": null,
        "show_banner": "true",
        "show_card_banner": false,
        "show_inscription": false,
        "hideDatesAgenda": true,
        "hideDatesAgendaItem": false,
        "hideHoursAgenda": false,
        "hideBtnDetailAgenda": true,
        "loader_page": "no",
        "data_loader_page": null
    },
    "author_id": "61a685292e66fd61921378f2",
    "organizer_id": "61a687203bbf847b3f59d113",
    "event_type_id": "5bf47203754e2317e4300b68",
    "updated_at": "2021-11-30 20:20:03",
    "created_at": "2021-11-30 20:20:01",
    "user_properties": [
        {
            "name": "email",
            "label": "Correo",
            "unique": false,
            "mandatory": false,
            "type": "email",
            "updated_at": {
                "$date": {
                    "$numberLong": "1638303602342"
                }
            }
        }
    ]
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

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Demo","adress":"Avenida siempre viva","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","type_event":"dolorem","picture":"voluptas","venue":"Venue B","location":{"Latitude":4.668184,"Longitude":-74.051968,"number":"#123","street":"Avenida siempre viva","city":"Bogot\u00e1","state":"Bogot\u00e1 D.C","FormattedAddress":"Av. Siempre viva #123, Bogot\u00e1, Colombia"},"visibility":"PUBLIC","user_properties":[],"description":"Evento para mostrel funcionamiento de la plataforma.","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category_ids":[],"styles":{"buttonColor":"#FFF","banner_color":"#FFF","menu_color":"#FFF","brandPrimary":"#FFFFFF","brandSuccess":"#FFFFFF","brandInfo":"#FFFFFF","brandDanger":"#FFFFFF","containerBgColor":"#FFFFFF","brandWarning":"#FFFFFF","brandDark":"#FFFFFF","brandLight":"#FFFFFF","textMenu":"#555352","activeText":"#FFFFFF","bgButtonsEvent":"#FFFFFF"}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Demo",
    "adress": "Avenida siempre viva",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "type_event": "dolorem",
    "picture": "voluptas",
    "venue": "Venue B",
    "location": {
        "Latitude": 4.668184,
        "Longitude": -74.051968,
        "number": "#123",
        "street": "Avenida siempre viva",
        "city": "Bogot\u00e1",
        "state": "Bogot\u00e1 D.C",
        "FormattedAddress": "Av. Siempre viva #123, Bogot\u00e1, Colombia"
    },
    "visibility": "PUBLIC",
    "user_properties": [],
    "description": "Evento para mostrel funcionamiento de la plataforma.",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category_ids": [],
    "styles": {
        "buttonColor": "#FFF",
        "banner_color": "#FFF",
        "menu_color": "#FFF",
        "brandPrimary": "#FFFFFF",
        "brandSuccess": "#FFFFFF",
        "brandInfo": "#FFFFFF",
        "brandDanger": "#FFFFFF",
        "containerBgColor": "#FFFFFF",
        "brandWarning": "#FFFFFF",
        "brandDark": "#FFFFFF",
        "brandLight": "#FFFFFF",
        "textMenu": "#555352",
        "activeText": "#FFFFFF",
        "bgButtonsEvent": "#FFFFFF"
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
`POST api/events`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name to event
        `adress` | string |  optional  | adress when is the event.
        `datetime_from` | datetime |  required  | date and time of start of the event
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `type_event` | string |  required  | This parameter has two options: onlineEvent or PhysicalEvent, when onlineEvent the event emails will have the link to log in to the event page and physialEvent will send a QR code to enter the event at the physical point.
        `picture` | string |  optional  | image of the event
        `venue` | string |  optional  | Event venue.
        `location` | object |  optional  | This parameter specific all information of event location.
        `location.Latitude` | float |  optional  | Latitude coordinates
        `location.Longitude` | float |  optional  | Longitude coordinates
        `location.number` | string |  optional  | Number build
        `location.street` | string |  optional  | Event street
        `location.city` | string |  optional  | Event city
        `location.state` | string |  optional  | Event state
        `location.FormattedAddress` | string |  optional  | Epecific complete adress
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties.
        `description` | string |  optional  | Explanation about  event.
        `event_type_id` | string |  required  | App\EventType This a event
        `organizer_id` | string |  required  | Id Event's organization
        `category_ids` | array |  optional  | App\Category
        `styles` | object |  required  | This is the event's appearance
        `styles.buttonColor` | string |  required  | 
        `styles.banner_color` | string |  required  | 
        `styles.menu_color` | string |  required  | 
        `styles.brandPrimary` | string |  required  | 
        `styles.brandSuccess` | string |  required  | 
        `styles.brandInfo` | string |  required  | 
        `styles.brandDanger` | string |  required  | 
        `styles.containerBgColor` | string |  required  | 
        `styles.brandWarning` | string |  required  | 
        `styles.brandDark` | string |  required  | 
        `styles.brandLight` | string |  required  | 
        `styles.textMenu` | string |  required  | 
        `styles.activeText` | string |  required  | 
        `styles.bgButtonsEvent` | string |  required  | 
    
<!-- END_de3413bf02c9bb71627fa96e1c1c409f -->

<!-- START_379a3beb17bbb91528d80d8507f69655 -->
## _show_: display information about a specific event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/61a687713bbf847b3f59d117" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/61a687713bbf847b3f59d117"
);

let headers = {
    "Content-Type": "application/json",
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
    "_id": "61a687713bbf847b3f59d117",
    "name": "Demo",
    "address": null,
    "type_event": "onlineEvent",
    "datetime_from": "2021-11-30 15:18:00",
    "datetime_to": "2021-11-30 16:18:00",
    "picture": null,
    "venue": null,
    "location": null,
    "visibility": "PUBLIC",
    "description": null,
    "allow_register": true,
    "styles": {
        "buttonColor": "#FFF",
        "banner_color": "#FFF",
        "menu_color": "#FFF",
        "event_image": null,
        "banner_image": null,
        "menu_image": null,
        "banner_image_email": null,
        "footer_image_email": "",
        "brandPrimary": "#FFFFFF",
        "brandSuccess": "#FFFFFF",
        "brandInfo": "#FFFFFF",
        "brandDanger": "#FFFFFF",
        "containerBgColor": "#ffffff",
        "brandWarning": "#FFFFFF",
        "toolbarDefaultBg": "#FFFFFF",
        "brandDark": "#FFFFFF",
        "brandLight": "#FFFFFF",
        "textMenu": "#555352",
        "activeText": "#FFFFFF",
        "bgButtonsEvent": "#FFFFFF",
        "BackgroundImage": null,
        "FooterImage": null,
        "banner_footer": null,
        "mobile_banner": null,
        "banner_footer_email": null,
        "show_banner": "true",
        "show_card_banner": false,
        "show_inscription": false,
        "hideDatesAgenda": true,
        "hideDatesAgendaItem": false,
        "hideHoursAgenda": false,
        "hideBtnDetailAgenda": true,
        "loader_page": "no",
        "data_loader_page": null
    },
    "author_id": "61a685292e66fd61921378f2",
    "organizer_id": "61a687203bbf847b3f59d113",
    "event_type_id": "5bf47203754e2317e4300b68",
    "updated_at": "2021-11-30 20:20:03",
    "created_at": "2021-11-30 20:20:01",
    "user_properties": [
        {
            "name": "email",
            "label": "Correo",
            "unique": false,
            "mandatory": false,
            "type": "email",
            "updated_at": {
                "$date": {
                    "$numberLong": "1638303602342"
                }
            }
        }
    ]
}
```

### HTTP Request
`GET api/events/{event}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id of the event you want to consult.

<!-- END_379a3beb17bbb91528d80d8507f69655 -->

<!-- START_d16967fd1d3d935666f7e8112a1a4451 -->
## _update_: update information on a specific event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/neque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Demo","adress":"Avenida siempre viva","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","type_event":"officia","picture":"harum","venue":"Venue B","location":{},"visibility":"PUBLIC","user_properties":[],"description":"Evento para mostrel funcionamiento de la plataforma.","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category_ids":[],"styles":{}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/neque"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Demo",
    "adress": "Avenida siempre viva",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "type_event": "officia",
    "picture": "harum",
    "venue": "Venue B",
    "location": {},
    "visibility": "PUBLIC",
    "user_properties": [],
    "description": "Evento para mostrel funcionamiento de la plataforma.",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category_ids": [],
    "styles": {}
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
    `name` | string |  required  | name to event
        `adress` | string |  optional  | adress when is the event.
        `datetime_from` | datetime |  required  | date and time of start of the event
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `type_event` | string |  required  | This parameter has two options: onlineEvent or PhysicalEvent, when onlineEvent the event emails will have the link to log in to the event page and physialEvent will send a QR code to enter the event at the physical point.
        `picture` | string |  optional  | image of the event
        `venue` | string |  optional  | Event venue.
        `location` | object |  optional  | This parameter specific all information of event location.
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties.
        `description` | string |  optional  | Explanation about  event.
        `event_type_id` | string |  required  | App\EventType This a event
        `organizer_id` | string |  required  | Id Event's organization
        `category_ids` | array |  optional  | App\Category
        `styles` | object |  required  | This is the event's appearance
    
<!-- END_d16967fd1d3d935666f7e8112a1a4451 -->

<!-- START_379a30feb2949828b5f95efbfd7649c3 -->
## _destroy_: delete event and related data.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/laudantium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/laudantium"
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

<!-- START_66dbd029b818c574790a13910308d53a -->
## _store_: Create new event of the organizer.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Demo","adress":"Avenida siempre viva","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","type_event":"ut","picture":"aut","venue":"Venue B","location":{"Latitude":4.668184,"Longitude":-74.051968,"number":"#123","street":"Avenida siempre viva","city":"Bogot\u00e1","state":"Bogot\u00e1 D.C","FormattedAddress":"Av. Siempre viva #123, Bogot\u00e1, Colombia"},"visibility":"PUBLIC","user_properties":[],"description":"Evento para mostrel funcionamiento de la plataforma.","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category_ids":[],"styles":{"buttonColor":"#FFF","banner_color":"#FFF","menu_color":"#FFF","brandPrimary":"#FFFFFF","brandSuccess":"#FFFFFF","brandInfo":"#FFFFFF","brandDanger":"#FFFFFF","containerBgColor":"#FFFFFF","brandWarning":"#FFFFFF","brandDark":"#FFFFFF","brandLight":"#FFFFFF","textMenu":"#555352","activeText":"#FFFFFF","bgButtonsEvent":"#FFFFFF"}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Demo",
    "adress": "Avenida siempre viva",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "type_event": "ut",
    "picture": "aut",
    "venue": "Venue B",
    "location": {
        "Latitude": 4.668184,
        "Longitude": -74.051968,
        "number": "#123",
        "street": "Avenida siempre viva",
        "city": "Bogot\u00e1",
        "state": "Bogot\u00e1 D.C",
        "FormattedAddress": "Av. Siempre viva #123, Bogot\u00e1, Colombia"
    },
    "visibility": "PUBLIC",
    "user_properties": [],
    "description": "Evento para mostrel funcionamiento de la plataforma.",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category_ids": [],
    "styles": {
        "buttonColor": "#FFF",
        "banner_color": "#FFF",
        "menu_color": "#FFF",
        "brandPrimary": "#FFFFFF",
        "brandSuccess": "#FFFFFF",
        "brandInfo": "#FFFFFF",
        "brandDanger": "#FFFFFF",
        "containerBgColor": "#FFFFFF",
        "brandWarning": "#FFFFFF",
        "brandDark": "#FFFFFF",
        "brandLight": "#FFFFFF",
        "textMenu": "#555352",
        "activeText": "#FFFFFF",
        "bgButtonsEvent": "#FFFFFF"
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
`POST api/events/{event}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name to event
        `adress` | string |  optional  | adress when is the event.
        `datetime_from` | datetime |  required  | date and time of start of the event
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `type_event` | string |  required  | This parameter has two options: onlineEvent or PhysicalEvent, when onlineEvent the event emails will have the link to log in to the event page and physialEvent will send a QR code to enter the event at the physical point.
        `picture` | string |  optional  | image of the event
        `venue` | string |  optional  | Event venue.
        `location` | object |  optional  | This parameter specific all information of event location.
        `location.Latitude` | float |  optional  | Latitude coordinates
        `location.Longitude` | float |  optional  | Longitude coordinates
        `location.number` | string |  optional  | Number build
        `location.street` | string |  optional  | Event street
        `location.city` | string |  optional  | Event city
        `location.state` | string |  optional  | Event state
        `location.FormattedAddress` | string |  optional  | Epecific complete adress
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties.
        `description` | string |  optional  | Explanation about  event.
        `event_type_id` | string |  required  | App\EventType This a event
        `organizer_id` | string |  required  | Id Event's organization
        `category_ids` | array |  optional  | App\Category
        `styles` | object |  required  | This is the event's appearance
        `styles.buttonColor` | string |  required  | 
        `styles.banner_color` | string |  required  | 
        `styles.menu_color` | string |  required  | 
        `styles.brandPrimary` | string |  required  | 
        `styles.brandSuccess` | string |  required  | 
        `styles.brandInfo` | string |  required  | 
        `styles.brandDanger` | string |  required  | 
        `styles.containerBgColor` | string |  required  | 
        `styles.brandWarning` | string |  required  | 
        `styles.brandDark` | string |  required  | 
        `styles.brandLight` | string |  required  | 
        `styles.textMenu` | string |  required  | 
        `styles.activeText` | string |  required  | 
        `styles.bgButtonsEvent` | string |  required  | 
    
<!-- END_66dbd029b818c574790a13910308d53a -->

<!-- START_388e610b5754b1df34564c1c6c66a126 -->
## _update_: update information on a specific event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/dolorum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Demo","adress":"Avenida siempre viva","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","type_event":"aut","picture":"amet","venue":"Venue B","location":{},"visibility":"PUBLIC","user_properties":[],"description":"Evento para mostrel funcionamiento de la plataforma.","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category_ids":[],"styles":{}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/dolorum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Demo",
    "adress": "Avenida siempre viva",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "type_event": "aut",
    "picture": "amet",
    "venue": "Venue B",
    "location": {},
    "visibility": "PUBLIC",
    "user_properties": [],
    "description": "Evento para mostrel funcionamiento de la plataforma.",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category_ids": [],
    "styles": {}
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | id of the event to be updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name to event
        `adress` | string |  optional  | adress when is the event.
        `datetime_from` | datetime |  required  | date and time of start of the event
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `type_event` | string |  required  | This parameter has two options: onlineEvent or PhysicalEvent, when onlineEvent the event emails will have the link to log in to the event page and physialEvent will send a QR code to enter the event at the physical point.
        `picture` | string |  optional  | image of the event
        `venue` | string |  optional  | Event venue.
        `location` | object |  optional  | This parameter specific all information of event location.
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties.
        `description` | string |  optional  | Explanation about  event.
        `event_type_id` | string |  required  | App\EventType This a event
        `organizer_id` | string |  required  | Id Event's organization
        `category_ids` | array |  optional  | App\Category
        `styles` | object |  required  | This is the event's appearance
    
<!-- END_388e610b5754b1df34564c1c6c66a126 -->

<!-- START_aec83efbad5ec636ec1b29352c041932 -->
## _currentUserindex_: list of events of the organizer who is logged in

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/me/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/me/events"
);

let headers = {
    "Content-Type": "application/json",
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

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Demo","adress":"Avenida siempre viva","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","type_event":"veniam","picture":"voluptate","venue":"Venue B","location":{"Latitude":4.668184,"Longitude":-74.051968,"number":"#123","street":"Avenida siempre viva","city":"Bogot\u00e1","state":"Bogot\u00e1 D.C","FormattedAddress":"Av. Siempre viva #123, Bogot\u00e1, Colombia"},"visibility":"PUBLIC","user_properties":[],"description":"Evento para mostrel funcionamiento de la plataforma.","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category_ids":[],"styles":{"buttonColor":"#FFF","banner_color":"#FFF","menu_color":"#FFF","brandPrimary":"#FFFFFF","brandSuccess":"#FFFFFF","brandInfo":"#FFFFFF","brandDanger":"#FFFFFF","containerBgColor":"#FFFFFF","brandWarning":"#FFFFFF","brandDark":"#FFFFFF","brandLight":"#FFFFFF","textMenu":"#555352","activeText":"#FFFFFF","bgButtonsEvent":"#FFFFFF"}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/user/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Demo",
    "adress": "Avenida siempre viva",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "type_event": "veniam",
    "picture": "voluptate",
    "venue": "Venue B",
    "location": {
        "Latitude": 4.668184,
        "Longitude": -74.051968,
        "number": "#123",
        "street": "Avenida siempre viva",
        "city": "Bogot\u00e1",
        "state": "Bogot\u00e1 D.C",
        "FormattedAddress": "Av. Siempre viva #123, Bogot\u00e1, Colombia"
    },
    "visibility": "PUBLIC",
    "user_properties": [],
    "description": "Evento para mostrel funcionamiento de la plataforma.",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category_ids": [],
    "styles": {
        "buttonColor": "#FFF",
        "banner_color": "#FFF",
        "menu_color": "#FFF",
        "brandPrimary": "#FFFFFF",
        "brandSuccess": "#FFFFFF",
        "brandInfo": "#FFFFFF",
        "brandDanger": "#FFFFFF",
        "containerBgColor": "#FFFFFF",
        "brandWarning": "#FFFFFF",
        "brandDark": "#FFFFFF",
        "brandLight": "#FFFFFF",
        "textMenu": "#555352",
        "activeText": "#FFFFFF",
        "bgButtonsEvent": "#FFFFFF"
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
`POST api/user/events`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name to event
        `adress` | string |  optional  | adress when is the event.
        `datetime_from` | datetime |  required  | date and time of start of the event
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `type_event` | string |  required  | This parameter has two options: onlineEvent or PhysicalEvent, when onlineEvent the event emails will have the link to log in to the event page and physialEvent will send a QR code to enter the event at the physical point.
        `picture` | string |  optional  | image of the event
        `venue` | string |  optional  | Event venue.
        `location` | object |  optional  | This parameter specific all information of event location.
        `location.Latitude` | float |  optional  | Latitude coordinates
        `location.Longitude` | float |  optional  | Longitude coordinates
        `location.number` | string |  optional  | Number build
        `location.street` | string |  optional  | Event street
        `location.city` | string |  optional  | Event city
        `location.state` | string |  optional  | Event state
        `location.FormattedAddress` | string |  optional  | Epecific complete adress
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties.
        `description` | string |  optional  | Explanation about  event.
        `event_type_id` | string |  required  | App\EventType This a event
        `organizer_id` | string |  required  | Id Event's organization
        `category_ids` | array |  optional  | App\Category
        `styles` | object |  required  | This is the event's appearance
        `styles.buttonColor` | string |  required  | 
        `styles.banner_color` | string |  required  | 
        `styles.menu_color` | string |  required  | 
        `styles.brandPrimary` | string |  required  | 
        `styles.brandSuccess` | string |  required  | 
        `styles.brandInfo` | string |  required  | 
        `styles.brandDanger` | string |  required  | 
        `styles.containerBgColor` | string |  required  | 
        `styles.brandWarning` | string |  required  | 
        `styles.brandDark` | string |  required  | 
        `styles.brandLight` | string |  required  | 
        `styles.textMenu` | string |  required  | 
        `styles.activeText` | string |  required  | 
        `styles.bgButtonsEvent` | string |  required  | 
    
<!-- END_2478aef777186232e8bca32fdf09efe3 -->

<!-- START_26fd0ed6db820ca28bb674ba1d761a2e -->
## _update_: update information on a specific event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/user/events/dolor" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Demo","adress":"Avenida siempre viva","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","type_event":"similique","picture":"qui","venue":"Venue B","location":{},"visibility":"PUBLIC","user_properties":[],"description":"Evento para mostrel funcionamiento de la plataforma.","event_type_id":"5bf47226754e2317e4300b6a","organizer_id":"5e9caaa1d74d5c2f6a02a3c3","category_ids":[],"styles":{}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/user/events/dolor"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Demo",
    "adress": "Avenida siempre viva",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "type_event": "similique",
    "picture": "qui",
    "venue": "Venue B",
    "location": {},
    "visibility": "PUBLIC",
    "user_properties": [],
    "description": "Evento para mostrel funcionamiento de la plataforma.",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "category_ids": [],
    "styles": {}
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
    `name` | string |  required  | name to event
        `adress` | string |  optional  | adress when is the event.
        `datetime_from` | datetime |  required  | date and time of start of the event
        `datetime_to` | datetime |  optional  | date and time of the end of the event
        `type_event` | string |  required  | This parameter has two options: onlineEvent or PhysicalEvent, when onlineEvent the event emails will have the link to log in to the event page and physialEvent will send a QR code to enter the event at the physical point.
        `picture` | string |  optional  | image of the event
        `venue` | string |  optional  | Event venue.
        `location` | object |  optional  | This parameter specific all information of event location.
        `visibility` | string |  required  | restricts access for registered users or any unregistered user
        `user_properties` | array |  optional  | user registration properties.
        `description` | string |  optional  | Explanation about  event.
        `event_type_id` | string |  required  | App\EventType This a event
        `organizer_id` | string |  required  | Id Event's organization
        `category_ids` | array |  optional  | App\Category
        `styles` | object |  required  | This is the event's appearance
    
<!-- END_26fd0ed6db820ca28bb674ba1d761a2e -->

<!-- START_ed1c02a70ed814c85d464077d0854e00 -->
## _destroy_: delete event and related data.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/user/events/harum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/user/events/harum"
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
## _currentUserindex_: list of events of the organizer who is logged in

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/user/events"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_95f9995526c97a3d36e393d3083e53c9 -->
## _changeStatusEvent_: approve or reject the events **&#039;draft&#039;**, and send mail of the change of status of the event to the user who created it

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/changeStatusEvent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"status":"approved"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/changeStatusEvent"
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
`PUT api/events/{event}/changeStatusEvent`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event to be rejected or approved Example:
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `status` | string |  required  | the status update allows for two possible statuses **approved** or **rejected**
    
<!-- END_95f9995526c97a3d36e393d3083e53c9 -->

<!-- START_7488288e859ba4fe861385339c81371a -->
## _beforeToday:_ list finished events
This method allows dynamic querying of any property through the URL using FilterQuery services for example : Exmaple: [{&quot;id&quot;:&quot;event_type_id&quot;,&quot;value&quot;:[&quot;5bb21557af7ea71be746e98x&quot;,&quot;5bb21557af7ea71be746e98b&quot;]}]

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/eventsbeforetoday?filtered=%5B%7B%22field%22%3A%22name%22%2C%22value%22%3A%5B%22Demo%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventsbeforetoday"
);

let params = {
    "filtered": "[{"field":"name","value":["Demo"]}]",
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
            "_id": "624373504b0b113f9e660ce8",
            "name": "Demo",
            "address": null,
            "type_event": "onlineEvent",
            "datetime_from": "2022-03-29 15:59:00",
            "datetime_to": "2022-03-29 16:59:00",
            "picture": null,
            "venue": null,
            "location": null,
            "visibility": "PUBLIC",
            "description": null,
            "allow_register": true,
            "styles": {
                "buttonColor": "#FFF",
                "banner_color": "#FFF",
                "menu_color": "#FFF",
                "event_image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2FLogoEvius.jpeg?alt=media&token=8633227f-74d2-4798-ae48-3f1b74d38d9c",
                "banner_image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2Fbanner.jpg?alt=media&token=8642d0ed-61e2-4fed-97fa-1cdd5687aeaf",
                "menu_image": null,
                "banner_image_email": null,
                "footer_image_email": "",
                "brandPrimary": "#FFFFFF",
                "brandSuccess": "#FFFFFF",
                "brandInfo": "#FFFFFF",
                "brandDanger": "#FFFFFF",
                "containerBgColor": "#ffffff",
                "brandWarning": "#FFFFFF",
                "toolbarDefaultBg": "#FFFFFF",
                "brandDark": "#FFFFFF",
                "brandLight": "#FFFFFF",
                "textMenu": "#555352",
                "activeText": "#FFFFFF",
                "bgButtonsEvent": "#FFFFFF",
                "BackgroundImage": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2FBackgroud.jpg?alt=media&token=cae37ed9-9817-4300-87e9-e9cac7106b05",
                "FooterImage": null,
                "banner_footer": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2Ffooter.png?alt=media&token=363b3aab-b149-43f1-9173-622d0b8128f9",
                "mobile_banner": null,
                "banner_footer_email": null,
                "show_banner": "true",
                "show_card_banner": false,
                "show_inscription": false,
                "hideDatesAgenda": true,
                "hideDatesAgendaItem": false,
                "hideHoursAgenda": false,
                "hideBtnDetailAgenda": true,
                "loader_page": "no",
                "data_loader_page": null,
                "show_title": true
            },
            "author_id": "624372c533e51d570818c1b8",
            "organizer_id": "624373494b0b113f9e660cc2",
            "updated_at": "2022-03-29 21:00:02",
            "created_at": "2022-03-29 21:00:00",
            "user_properties": [
                {
                    "name": "email",
                    "label": "Correo",
                    "unique": false,
                    "mandatory": false,
                    "type": "email",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1648587601358"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1648587601358"
                        }
                    },
                    "_id": {
                        "$oid": "624373514b0b113f9e660ceb"
                    }
                },
                {
                    "name": "names",
                    "label": "Nombres Y Apellidos",
                    "unique": false,
                    "mandatory": false,
                    "type": "text",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1648587601440"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1648587601440"
                        }
                    },
                    "_id": {
                        "$oid": "624373514b0b113f9e660cec"
                    }
                },
                {
                    "label": "password",
                    "name": "password",
                    "type": "text",
                    "visibleByAdmin": true,
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1649089643026"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1649089643026"
                        }
                    },
                    "_id": {
                        "$oid": "624b1c6b25079f65db493f76"
                    }
                }
            ],
            "itemsMenu": {
                "evento": {
                    "name": "evento",
                    "position": 1,
                    "section": "evento",
                    "icon": "CalendarOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "agenda": {
                    "name": "Mi agenda",
                    "position": null,
                    "section": "agenda",
                    "icon": "ReadOutlined",
                    "checked": true,
                    "permissions": "public"
                }
            },
            "author": {
                "_id": "624372c533e51d570818c1b8",
                "picture": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauthdev.appspot.com\/o\/images%2F1649274770172.png?alt=media&token=55b43a62-5895-4d88-8d7b-dcc24eb83e67",
                "email": "geraldine.garcia@mocionsoft.com",
                "names": "Juliana",
                "confirmation_code": "JGmmS6IVxAnihg69",
                "uid": "LV3AVsD6TAXSTPJvUXlz6sv9pIF3",
                "updated_at": "2022-04-06 19:52:54",
                "created_at": "2022-03-29 20:57:41"
            },
            "categories": [],
            "event_type": null,
            "organiser": {
                "_id": "624373494b0b113f9e660cc2",
                "name": "Demo",
                "styles": {
                    "buttonColor": "#FFF",
                    "banner_color": "#FFF",
                    "menu_color": "#FFF",
                    "event_image": null,
                    "banner_image": null,
                    "menu_image": null,
                    "banner_image_email": null,
                    "footer_image_email": "",
                    "brandPrimary": "#FFFFFF",
                    "brandSuccess": "#FFFFFF",
                    "brandInfo": "#FFFFFF",
                    "brandDanger": "#FFFFFF",
                    "containerBgColor": "#ffffff",
                    "brandWarning": "#FFFFFF",
                    "toolbarDefaultBg": "#FFFFFF",
                    "brandDark": "#FFFFFF",
                    "brandLight": "#FFFFFF",
                    "textMenu": "#555352",
                    "activeText": "#FFFFFF",
                    "bgButtonsEvent": "#FFFFFF",
                    "BackgroundImage": null,
                    "FooterImage": null,
                    "banner_footer": null,
                    "mobile_banner": null,
                    "banner_footer_email": null,
                    "show_banner": "true",
                    "show_card_banner": false,
                    "show_inscription": false,
                    "hideDatesAgenda": true,
                    "hideDatesAgendaItem": false,
                    "hideHoursAgenda": false,
                    "hideBtnDetailAgenda": true,
                    "loader_page": "no",
                    "data_loader_page": null
                },
                "author": "624372c533e51d570818c1b8",
                "updated_at": "2022-03-29 20:59:53",
                "created_at": "2022-03-29 20:59:53",
                "user_properties": [
                    {
                        "name": "email",
                        "label": "Correo",
                        "unique": false,
                        "mandatory": false,
                        "type": "email",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648587593791"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648587593791"
                            }
                        },
                        "_id": {
                            "$oid": "624373494b0b113f9e660cc4"
                        }
                    },
                    {
                        "name": "names",
                        "label": "Nombres Y Apellidos",
                        "unique": false,
                        "mandatory": false,
                        "type": "text",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648587593804"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648587593804"
                            }
                        },
                        "_id": {
                            "$oid": "624373494b0b113f9e660cc5"
                        }
                    }
                ],
                "template_properties": [
                    {
                        "name": "Template properties",
                        "user_properties": [
                            {
                                "name": "email",
                                "label": "Correo",
                                "unique": false,
                                "mandatory": false,
                                "justonebyattendee": false,
                                "type": "email",
                                "description": null,
                                "visibleByAdmin": false,
                                "visibleByContacts": false,
                                "index": 0,
                                "order_weight": 1
                            },
                            {
                                "name": "names",
                                "label": "Nombre completo",
                                "unique": false,
                                "mandatory": false,
                                "justonebyattendee": false,
                                "type": "text",
                                "description": null,
                                "visibleByAdmin": false,
                                "visibleByContacts": false,
                                "index": 1,
                                "order_weight": 2
                            },
                            {
                                "label": "celular",
                                "name": "celular",
                                "type": "number",
                                "mandatory": true,
                                "order_weight": 3
                            }
                        ],
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1649252829315"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1649252491223"
                            }
                        },
                        "_id": {
                            "$oid": "624d988b7b535937e462e3d2"
                        }
                    },
                    {
                        "name": "Segundo template",
                        "user_properties": [
                            {
                                "name": "email",
                                "label": "Correo",
                                "unique": false,
                                "mandatory": false,
                                "justonebyattendee": false,
                                "type": "email",
                                "description": null,
                                "visibleByAdmin": false,
                                "visibleByContacts": false,
                                "index": 0,
                                "order_weight": 1
                            },
                            {
                                "name": "names",
                                "label": "Nombre completo",
                                "unique": false,
                                "mandatory": false,
                                "justonebyattendee": false,
                                "type": "text",
                                "description": null,
                                "visibleByAdmin": false,
                                "visibleByContacts": false,
                                "index": 1,
                                "order_weight": 2
                            },
                            {
                                "label": "celular",
                                "name": "celular",
                                "type": "number",
                                "mandatory": true,
                                "visibleByContacts": true,
                                "visibleByAdmin": true
                            }
                        ],
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1649252688713"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1649252517720"
                            }
                        },
                        "_id": {
                            "$oid": "624d98a536d792388c235f24"
                        }
                    }
                ]
            },
            "organizer": {
                "_id": "624373494b0b113f9e660cc2",
                "name": "Demo",
                "styles": {
                    "buttonColor": "#FFF",
                    "banner_color": "#FFF",
                    "menu_color": "#FFF",
                    "event_image": null,
                    "banner_image": null,
                    "menu_image": null,
                    "banner_image_email": null,
                    "footer_image_email": "",
                    "brandPrimary": "#FFFFFF",
                    "brandSuccess": "#FFFFFF",
                    "brandInfo": "#FFFFFF",
                    "brandDanger": "#FFFFFF",
                    "containerBgColor": "#ffffff",
                    "brandWarning": "#FFFFFF",
                    "toolbarDefaultBg": "#FFFFFF",
                    "brandDark": "#FFFFFF",
                    "brandLight": "#FFFFFF",
                    "textMenu": "#555352",
                    "activeText": "#FFFFFF",
                    "bgButtonsEvent": "#FFFFFF",
                    "BackgroundImage": null,
                    "FooterImage": null,
                    "banner_footer": null,
                    "mobile_banner": null,
                    "banner_footer_email": null,
                    "show_banner": "true",
                    "show_card_banner": false,
                    "show_inscription": false,
                    "hideDatesAgenda": true,
                    "hideDatesAgendaItem": false,
                    "hideHoursAgenda": false,
                    "hideBtnDetailAgenda": true,
                    "loader_page": "no",
                    "data_loader_page": null
                },
                "author": "624372c533e51d570818c1b8",
                "updated_at": "2022-03-29 20:59:53",
                "created_at": "2022-03-29 20:59:53",
                "user_properties": [
                    {
                        "name": "email",
                        "label": "Correo",
                        "unique": false,
                        "mandatory": false,
                        "type": "email",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648587593791"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648587593791"
                            }
                        },
                        "_id": {
                            "$oid": "624373494b0b113f9e660cc4"
                        }
                    },
                    {
                        "name": "names",
                        "label": "Nombres Y Apellidos",
                        "unique": false,
                        "mandatory": false,
                        "type": "text",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648587593804"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648587593804"
                            }
                        },
                        "_id": {
                            "$oid": "624373494b0b113f9e660cc5"
                        }
                    }
                ],
                "template_properties": [
                    {
                        "name": "Template properties",
                        "user_properties": [
                            {
                                "name": "email",
                                "label": "Correo",
                                "unique": false,
                                "mandatory": false,
                                "justonebyattendee": false,
                                "type": "email",
                                "description": null,
                                "visibleByAdmin": false,
                                "visibleByContacts": false,
                                "index": 0,
                                "order_weight": 1
                            },
                            {
                                "name": "names",
                                "label": "Nombre completo",
                                "unique": false,
                                "mandatory": false,
                                "justonebyattendee": false,
                                "type": "text",
                                "description": null,
                                "visibleByAdmin": false,
                                "visibleByContacts": false,
                                "index": 1,
                                "order_weight": 2
                            },
                            {
                                "label": "celular",
                                "name": "celular",
                                "type": "number",
                                "mandatory": true,
                                "order_weight": 3
                            }
                        ],
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1649252829315"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1649252491223"
                            }
                        },
                        "_id": {
                            "$oid": "624d988b7b535937e462e3d2"
                        }
                    },
                    {
                        "name": "Segundo template",
                        "user_properties": [
                            {
                                "name": "email",
                                "label": "Correo",
                                "unique": false,
                                "mandatory": false,
                                "justonebyattendee": false,
                                "type": "email",
                                "description": null,
                                "visibleByAdmin": false,
                                "visibleByContacts": false,
                                "index": 0,
                                "order_weight": 1
                            },
                            {
                                "name": "names",
                                "label": "Nombre completo",
                                "unique": false,
                                "mandatory": false,
                                "justonebyattendee": false,
                                "type": "text",
                                "description": null,
                                "visibleByAdmin": false,
                                "visibleByContacts": false,
                                "index": 1,
                                "order_weight": 2
                            },
                            {
                                "label": "celular",
                                "name": "celular",
                                "type": "number",
                                "mandatory": true,
                                "visibleByContacts": true,
                                "visibleByAdmin": true
                            }
                        ],
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1649252688713"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1649252517720"
                            }
                        },
                        "_id": {
                            "$oid": "624d98a536d792388c235f24"
                        }
                    }
                ]
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
        },
        {
            "_id": "624372d533e51d570818c1cf",
            "name": "Demo",
            "address": null,
            "type_event": "onlineEvent",
            "datetime_from": "2022-03-29 15:57:00",
            "datetime_to": "2022-03-29 16:57:00",
            "picture": null,
            "venue": null,
            "location": null,
            "visibility": "PUBLIC",
            "description": null,
            "allow_register": true,
            "styles": {
                "buttonColor": "#FFF",
                "banner_color": "#FFF",
                "menu_color": "#FFF",
                "event_image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2FLogoEvius.jpeg?alt=media&token=8633227f-74d2-4798-ae48-3f1b74d38d9c",
                "banner_image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2Fbanner.jpg?alt=media&token=8642d0ed-61e2-4fed-97fa-1cdd5687aeaf",
                "menu_image": null,
                "banner_image_email": null,
                "footer_image_email": "",
                "brandPrimary": "#FFFFFF",
                "brandSuccess": "#FFFFFF",
                "brandInfo": "#FFFFFF",
                "brandDanger": "#FFFFFF",
                "containerBgColor": "#ffffff",
                "brandWarning": "#FFFFFF",
                "toolbarDefaultBg": "#FFFFFF",
                "brandDark": "#FFFFFF",
                "brandLight": "#FFFFFF",
                "textMenu": "#555352",
                "activeText": "#FFFFFF",
                "bgButtonsEvent": "#FFFFFF",
                "BackgroundImage": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2FBackgroud.jpg?alt=media&token=cae37ed9-9817-4300-87e9-e9cac7106b05",
                "FooterImage": null,
                "banner_footer": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2Ffooter.png?alt=media&token=363b3aab-b149-43f1-9173-622d0b8128f9",
                "mobile_banner": null,
                "banner_footer_email": null,
                "show_banner": "true",
                "show_card_banner": false,
                "show_inscription": false,
                "hideDatesAgenda": true,
                "hideDatesAgendaItem": false,
                "hideHoursAgenda": false,
                "hideBtnDetailAgenda": true,
                "loader_page": "no",
                "data_loader_page": null,
                "show_title": true
            },
            "author_id": "624372c533e51d570818c1b8",
            "organizer_id": "624372ce4b0b113f9e660b80",
            "updated_at": "2022-03-29 20:57:58",
            "created_at": "2022-03-29 20:57:57",
            "user_properties": [
                {
                    "name": "email",
                    "label": "Correo",
                    "unique": false,
                    "mandatory": false,
                    "type": "email",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1648587477623"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1648587477623"
                        }
                    },
                    "_id": {
                        "$oid": "624372d533e51d570818c1d2"
                    }
                },
                {
                    "name": "names",
                    "label": "Nombres Y Apellidos",
                    "unique": false,
                    "mandatory": false,
                    "type": "text",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1648587477696"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1648587477696"
                        }
                    },
                    "_id": {
                        "$oid": "624372d533e51d570818c1d3"
                    }
                }
            ],
            "itemsMenu": {
                "evento": {
                    "name": "evento",
                    "position": 1,
                    "section": "evento",
                    "icon": "CalendarOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "agenda": {
                    "name": "Mi agenda",
                    "position": null,
                    "section": "agenda",
                    "icon": "ReadOutlined",
                    "checked": true,
                    "permissions": "public"
                }
            },
            "author": {
                "_id": "624372c533e51d570818c1b8",
                "picture": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauthdev.appspot.com\/o\/images%2F1649274770172.png?alt=media&token=55b43a62-5895-4d88-8d7b-dcc24eb83e67",
                "email": "geraldine.garcia@mocionsoft.com",
                "names": "Juliana",
                "confirmation_code": "JGmmS6IVxAnihg69",
                "uid": "LV3AVsD6TAXSTPJvUXlz6sv9pIF3",
                "updated_at": "2022-04-06 19:52:54",
                "created_at": "2022-03-29 20:57:41"
            },
            "categories": [],
            "event_type": null,
            "organiser": {
                "_id": "624372ce4b0b113f9e660b80",
                "name": "Juliana",
                "styles": {
                    "buttonColor": "#FFF",
                    "banner_color": "#FFF",
                    "menu_color": "#FFF",
                    "event_image": null,
                    "banner_image": "#FFF",
                    "menu_image": "#FFF",
                    "banner_image_email": "",
                    "footer_image_email": ""
                },
                "author": "624372c533e51d570818c1b8",
                "updated_at": "2022-03-29 20:57:50",
                "created_at": "2022-03-29 20:57:50",
                "user_properties": [
                    {
                        "name": "email",
                        "label": "Correo",
                        "unique": false,
                        "mandatory": false,
                        "type": "email",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648587470735"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648587470735"
                            }
                        },
                        "_id": {
                            "$oid": "624372ce4b0b113f9e660b82"
                        }
                    },
                    {
                        "name": "names",
                        "label": "Nombres Y Apellidos",
                        "unique": false,
                        "mandatory": false,
                        "type": "text",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648587470749"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648587470749"
                            }
                        },
                        "_id": {
                            "$oid": "624372ce4b0b113f9e660b83"
                        }
                    }
                ]
            },
            "organizer": {
                "_id": "624372ce4b0b113f9e660b80",
                "name": "Juliana",
                "styles": {
                    "buttonColor": "#FFF",
                    "banner_color": "#FFF",
                    "menu_color": "#FFF",
                    "event_image": null,
                    "banner_image": "#FFF",
                    "menu_image": "#FFF",
                    "banner_image_email": "",
                    "footer_image_email": ""
                },
                "author": "624372c533e51d570818c1b8",
                "updated_at": "2022-03-29 20:57:50",
                "created_at": "2022-03-29 20:57:50",
                "user_properties": [
                    {
                        "name": "email",
                        "label": "Correo",
                        "unique": false,
                        "mandatory": false,
                        "type": "email",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648587470735"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648587470735"
                            }
                        },
                        "_id": {
                            "$oid": "624372ce4b0b113f9e660b82"
                        }
                    },
                    {
                        "name": "names",
                        "label": "Nombres Y Apellidos",
                        "unique": false,
                        "mandatory": false,
                        "type": "text",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648587470749"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648587470749"
                            }
                        },
                        "_id": {
                            "$oid": "624372ce4b0b113f9e660b83"
                        }
                    }
                ]
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
        },
        {
            "_id": "6243718861a2df33076dcefd",
            "name": "Demo",
            "address": null,
            "type_event": "onlineEvent",
            "datetime_from": "2022-03-29 15:51:00",
            "datetime_to": "2022-03-29 16:51:00",
            "picture": null,
            "venue": null,
            "location": null,
            "visibility": "PUBLIC",
            "description": null,
            "allow_register": true,
            "styles": {
                "buttonColor": "#FFF",
                "banner_color": "#FFF",
                "menu_color": "#FFF",
                "event_image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2FLogoEvius.jpeg?alt=media&token=8633227f-74d2-4798-ae48-3f1b74d38d9c",
                "banner_image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2Fbanner.jpg?alt=media&token=8642d0ed-61e2-4fed-97fa-1cdd5687aeaf",
                "menu_image": null,
                "banner_image_email": null,
                "footer_image_email": "",
                "brandPrimary": "#FFFFFF",
                "brandSuccess": "#FFFFFF",
                "brandInfo": "#FFFFFF",
                "brandDanger": "#FFFFFF",
                "containerBgColor": "#ffffff",
                "brandWarning": "#FFFFFF",
                "toolbarDefaultBg": "#FFFFFF",
                "brandDark": "#FFFFFF",
                "brandLight": "#FFFFFF",
                "textMenu": "#555352",
                "activeText": "#FFFFFF",
                "bgButtonsEvent": "#FFFFFF",
                "BackgroundImage": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2FBackgroud.jpg?alt=media&token=cae37ed9-9817-4300-87e9-e9cac7106b05",
                "FooterImage": null,
                "banner_footer": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauth.appspot.com\/o\/template%2Ffooter.png?alt=media&token=363b3aab-b149-43f1-9173-622d0b8128f9",
                "mobile_banner": null,
                "banner_footer_email": null,
                "show_banner": "true",
                "show_card_banner": false,
                "show_inscription": false,
                "hideDatesAgenda": true,
                "hideDatesAgendaItem": false,
                "hideHoursAgenda": false,
                "hideBtnDetailAgenda": true,
                "loader_page": "no",
                "data_loader_page": null,
                "show_title": true
            },
            "author_id": "62436cda0ace786515639be2",
            "organizer_id": "6243703cb3cbe346534263bd",
            "updated_at": "2022-03-29 20:52:25",
            "created_at": "2022-03-29 20:52:24",
            "user_properties": [
                {
                    "name": "email",
                    "label": "Correo",
                    "unique": false,
                    "mandatory": false,
                    "type": "email",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1648587144880"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1648587144880"
                        }
                    },
                    "_id": {
                        "$oid": "6243718861a2df33076dcf00"
                    }
                },
                {
                    "name": "names",
                    "label": "Nombres Y Apellidos",
                    "unique": false,
                    "mandatory": false,
                    "type": "text",
                    "updated_at": {
                        "$date": {
                            "$numberLong": "1648587144956"
                        }
                    },
                    "created_at": {
                        "$date": {
                            "$numberLong": "1648587144956"
                        }
                    },
                    "_id": {
                        "$oid": "6243718861a2df33076dcf01"
                    }
                }
            ],
            "itemsMenu": {
                "evento": {
                    "name": "evento",
                    "position": 1,
                    "section": "evento",
                    "icon": "CalendarOutlined",
                    "checked": true,
                    "permissions": "public"
                },
                "agenda": {
                    "name": "Mi agenda",
                    "position": null,
                    "section": "agenda",
                    "icon": "ReadOutlined",
                    "checked": true,
                    "permissions": "public"
                }
            },
            "author": {
                "_id": "62436cda0ace786515639be2",
                "picture": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauthdev.appspot.com\/o\/images%2F1648586598816.png?alt=media&token=7909f976-e121-406d-af4b-9a158cd4fd3b",
                "email": "geraldine.garcia+1@mocionsoft.com",
                "names": "Juliana",
                "confirmation_code": "FYzGHOXBxYreqfOI",
                "uid": "LZKEay3r3EbvgaSwUAJuN1k1svO2",
                "updated_at": "2022-03-29 20:43:37",
                "created_at": "2022-03-29 20:32:26"
            },
            "categories": [],
            "event_type": null,
            "organiser": {
                "_id": "6243703cb3cbe346534263bd",
                "name": "Demo",
                "styles": {
                    "buttonColor": "#FFF",
                    "banner_color": "#FFF",
                    "menu_color": "#FFF",
                    "event_image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauthdev.appspot.com\/o\/images%2F1648586795195.png?alt=media&token=f0e51186-85dc-481a-95f4-602cfe633cbe",
                    "banner_image": null,
                    "menu_image": null,
                    "banner_image_email": null,
                    "footer_image_email": "",
                    "brandPrimary": "#FFFFFF",
                    "brandSuccess": "#FFFFFF",
                    "brandInfo": "#FFFFFF",
                    "brandDanger": "#FFFFFF",
                    "containerBgColor": "#ffffff",
                    "brandWarning": "#FFFFFF",
                    "toolbarDefaultBg": "#FFFFFF",
                    "brandDark": "#FFFFFF",
                    "brandLight": "#FFFFFF",
                    "textMenu": "#555352",
                    "activeText": "#FFFFFF",
                    "bgButtonsEvent": "#FFFFFF",
                    "BackgroundImage": null,
                    "FooterImage": null,
                    "banner_footer": null,
                    "mobile_banner": null,
                    "banner_footer_email": null,
                    "show_banner": "true",
                    "show_card_banner": false,
                    "show_inscription": false,
                    "hideDatesAgenda": true,
                    "hideDatesAgendaItem": false,
                    "hideHoursAgenda": false,
                    "hideBtnDetailAgenda": true,
                    "loader_page": "no",
                    "data_loader_page": null
                },
                "author": "62436cda0ace786515639be2",
                "updated_at": "2022-03-29 20:46:52",
                "created_at": "2022-03-29 20:46:52",
                "user_properties": [
                    {
                        "name": "email",
                        "label": "Correo",
                        "unique": false,
                        "mandatory": false,
                        "type": "email",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648586812967"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648586812967"
                            }
                        },
                        "_id": {
                            "$oid": "6243703cb3cbe346534263bf"
                        }
                    },
                    {
                        "name": "names",
                        "label": "Nombres Y Apellidos",
                        "unique": false,
                        "mandatory": false,
                        "type": "text",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648586812983"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648586812983"
                            }
                        },
                        "_id": {
                            "$oid": "6243703cb3cbe346534263c0"
                        }
                    }
                ]
            },
            "organizer": {
                "_id": "6243703cb3cbe346534263bd",
                "name": "Demo",
                "styles": {
                    "buttonColor": "#FFF",
                    "banner_color": "#FFF",
                    "menu_color": "#FFF",
                    "event_image": "https:\/\/firebasestorage.googleapis.com\/v0\/b\/eviusauthdev.appspot.com\/o\/images%2F1648586795195.png?alt=media&token=f0e51186-85dc-481a-95f4-602cfe633cbe",
                    "banner_image": null,
                    "menu_image": null,
                    "banner_image_email": null,
                    "footer_image_email": "",
                    "brandPrimary": "#FFFFFF",
                    "brandSuccess": "#FFFFFF",
                    "brandInfo": "#FFFFFF",
                    "brandDanger": "#FFFFFF",
                    "containerBgColor": "#ffffff",
                    "brandWarning": "#FFFFFF",
                    "toolbarDefaultBg": "#FFFFFF",
                    "brandDark": "#FFFFFF",
                    "brandLight": "#FFFFFF",
                    "textMenu": "#555352",
                    "activeText": "#FFFFFF",
                    "bgButtonsEvent": "#FFFFFF",
                    "BackgroundImage": null,
                    "FooterImage": null,
                    "banner_footer": null,
                    "mobile_banner": null,
                    "banner_footer_email": null,
                    "show_banner": "true",
                    "show_card_banner": false,
                    "show_inscription": false,
                    "hideDatesAgenda": true,
                    "hideDatesAgendaItem": false,
                    "hideHoursAgenda": false,
                    "hideBtnDetailAgenda": true,
                    "loader_page": "no",
                    "data_loader_page": null
                },
                "author": "62436cda0ace786515639be2",
                "updated_at": "2022-03-29 20:46:52",
                "created_at": "2022-03-29 20:46:52",
                "user_properties": [
                    {
                        "name": "email",
                        "label": "Correo",
                        "unique": false,
                        "mandatory": false,
                        "type": "email",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648586812967"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648586812967"
                            }
                        },
                        "_id": {
                            "$oid": "6243703cb3cbe346534263bf"
                        }
                    },
                    {
                        "name": "names",
                        "label": "Nombres Y Apellidos",
                        "unique": false,
                        "mandatory": false,
                        "type": "text",
                        "updated_at": {
                            "$date": {
                                "$numberLong": "1648586812983"
                            }
                        },
                        "created_at": {
                            "$date": {
                                "$numberLong": "1648586812983"
                            }
                        },
                        "_id": {
                            "$oid": "6243703cb3cbe346534263c0"
                        }
                    }
                ]
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
        "to": 3,
        "total": 3
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
This method allows dynamic querying of any property through the URL using FilterQuery services for example : Exmaple: [{&quot;id&quot;:&quot;event_type_id&quot;,&quot;value&quot;:[&quot;5bb21557af7ea71be746e98x&quot;,&quot;5bb21557af7ea71be746e98b&quot;]}]

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/eventsaftertoday?filtered=%5B%7B%22field%22%3A%22name%22%2C%22value%22%3A%5B%22Demo%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventsaftertoday"
);

let params = {
    "filtered": "[{"field":"name","value":["Demo"]}]",
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

<!-- START_1f26b5805c3db4083ddb592b9023cc0f -->
## _EventbyUsers_: search of events by user organizer.

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/users/et/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/et/events"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/users\/et\/events?page=1",
        "last": "http:\/\/localhost\/api\/users\/et\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/users\/et\/events",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/users/{user}/events`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | organiser_id

<!-- END_1f26b5805c3db4083ddb592b9023cc0f -->

<!-- START_48ec4d386efb8ba88bf13409d75a9572 -->
## api/events/{event}/surveys/{id}/coursefinished
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1/surveys/1/coursefinished" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/surveys/1/coursefinished"
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
`POST api/events/{event}/surveys/{id}/coursefinished`


<!-- END_48ec4d386efb8ba88bf13409d75a9572 -->

<!-- START_fee8ef1fe728ff1db6ba4c577c3fd10c -->
## _addDocumentUserToEvent_: adds the default settings to events that have user documents.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/dicta/adddocumentuser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quantity":5476955,"auto_assign":true}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/dicta/adddocumentuser"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "quantity": 5476955,
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
    -G "https://devapi.evius.co/api/eventTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventTypes"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/eventTypes?page=1",
        "last": "http:\/\/localhost\/api\/eventTypes?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/eventTypes",
        "per_page": 2500,
        "to": null,
        "total": 0
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
    "https://devapi.evius.co/api/eventTypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"amet"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventTypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "amet"
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
Attendee has one user though account_id
<br> and one event though event_id
<br> This relation has states that represent the booking status of the user into the event
</p>
<!-- START_6d734e2380b448480b231a52bc627249 -->
## _store:_ Store a newly Attendee  in storage.

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/adipisci/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"properties":{"email":{},"names":{},"others_properties":{}}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/adipisci/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "properties": {
        "email": {},
        "names": {},
        "others_properties": {}
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
`POST api/events/{event}/eventusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `properties.email` | object |  optional  | other params  will be saved in user and eventUser each event can require aditional properties for registration.
        `properties.names` | object |  optional  | other params  will be saved in user and eventUser each event can require aditional properties for registration.
        `properties.others_properties` | object |  optional  | other params  will be saved in user and eventUser each event can require aditional properties for registration.
    
<!-- END_6d734e2380b448480b231a52bc627249 -->

<!-- START_91cdeb75b076b7622e0d97e5b95538b4 -->
## api/events/{event}/eventusers/{eventuser}/unsubscribe
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/eventusers/1/unsubscribe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/eventusers/1/unsubscribe"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/eventusers/{eventuser}/unsubscribe`


<!-- END_91cdeb75b076b7622e0d97e5b95538b4 -->

<!-- START_d8c597db91ecae06a8314266fe9173f6 -->
## _SubscribeUserToEventAndSendEmail_: register user to an event and send confirmation email

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/adduserwithemailvalidation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"properties":{"email":"evius@evius.co","name":"Evius","password":"*******"}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/adduserwithemailvalidation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "properties": {
        "email": "evius@evius.co",
        "name": "Evius",
        "password": "*******"
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
`POST api/events/{event}/adduserwithemailvalidation`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | string required event id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `properties.email` | email |  required  | email event user
        `properties.name` | string |  required  | 
        `properties.password` | string |  optional  | 
    
<!-- END_d8c597db91ecae06a8314266fe9173f6 -->

<!-- START_ae3699df3bb574732c28c9b539afa6cf -->
## _transferEventuserAndEnrollToActivity_ : transfer Eventuser And Enroll To Activity

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/eventusers/1/tranfereventuser/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventusers/1/tranfereventuser/1"
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
`POST api/eventusers/{event}/tranfereventuser/{event_user}`


<!-- END_ae3699df3bb574732c28c9b539afa6cf -->

<!-- START_62f0c5655d8d2562857a8516c1822886 -->
## _updateWithStatus_: update With Status

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/eventUsers/1/withStatus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventUsers/1/withStatus"
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required

<!-- END_62f0c5655d8d2562857a8516c1822886 -->

<!-- START_4689c377b6415c181d64a5ee269eebce -->
## _checkIn_: checks In an existent Attendee to the related event

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/eventUsers/et/checkin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventUsers/et/checkin"
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
`PUT api/eventUsers/{eventuser}/checkin`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `eventuser` |  optional  | string required id Attendee to checkin into the event

<!-- END_4689c377b6415c181d64a5ee269eebce -->

<!-- START_1f6f0b29c5980f049d843c6ca988db76 -->
## _Uncheck_: uncheck an existing Attendee to related event

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/eventUsers/eveniet/uncheck" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventUsers/eveniet/uncheck"
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
`PUT api/eventUsers/{eventuser}/uncheck`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `eventuser` |  optional  | string required id Attendee to checkin into the event

<!-- END_1f6f0b29c5980f049d843c6ca988db76 -->

<!-- START_f25c21b9dd2179852d16eac76d3bca80 -->
## _createUserAndAddtoEvent_: import  user and add it to an event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
When you import a user to an event, if the user does not exist, the user will be created and the record will be created in the event and
if the user exists, the user will not be updated, it will only create the record in the event.

![Screenshot](https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/evius%2Fdocumentation%2FcreateUserAndAddtoEvent.png?alt=media&token=ee03b215-85e6-49cc-9340-43ae3a00dd60)

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/eventUsers/createUserAndAddtoEvent/61ccd3551c821b765a312864?allow_edit_password=true" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"example@evius.co","name":"Evius","password":"*******","other_params":{"city":"vero"}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventUsers/createUserAndAddtoEvent/61ccd3551c821b765a312864"
);

let params = {
    "allow_edit_password": "true",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "example@evius.co",
    "name": "Evius",
    "password": "*******",
    "other_params": {
        "city": "vero"
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
`POST api/eventUsers/createUserAndAddtoEvent/{event}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | string required event id
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `allow_edit_password` |  optional  | Allow change user password even if the user already register. If you don't send this parameter the password of user registered in the system dond't change.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | email event user
        `name` | string |  required  | 
        `password` | string |  optional  | if the password is not added, the password will be the user's email.
        `other_params.city` | any |  optional  | other params  will be saved in eventUser
    
<!-- END_f25c21b9dd2179852d16eac76d3bca80 -->

<!-- START_8584edbef5108e01985db1d291b64c2e -->
## _bookEventUsers_: when an event is pay the attendees can do book without having to pay.

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/eventUsers/bookEventUsers/61ccd3551c821b765a312864" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"eventUsersIds":[]}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventUsers/bookEventUsers/61ccd3551c821b765a312864"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "eventUsersIds": []
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
`POST api/eventUsers/bookEventUsers/{event}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | string required event id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `eventUsersIds` | array |  required  | Attendees list who book in an event
    
<!-- END_8584edbef5108e01985db1d291b64c2e -->

<!-- START_c8437aa309bc9307e85279e92b05876e -->
## _index_ display all the EventUsers of an event

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventusers"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/events\/61ccd3551c821b765a312864\/eventusers?page=1",
        "last": "http:\/\/localhost\/api\/events\/61ccd3551c821b765a312864\/eventusers?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/61ccd3551c821b765a312864\/eventusers",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/events/{event}/eventusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | string required event id

<!-- END_c8437aa309bc9307e85279e92b05876e -->

<!-- START_05a678eb2a1e19035815cb6dcaa3d3e4 -->
## _index_ display all the EventUsers of an event

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventUsers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventUsers"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/events\/61ccd3551c821b765a312864\/eventUsers?page=1",
        "last": "http:\/\/localhost\/api\/events\/61ccd3551c821b765a312864\/eventUsers?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/61ccd3551c821b765a312864\/eventUsers",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/events/{event}/eventUsers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | string required event id

<!-- END_05a678eb2a1e19035815cb6dcaa3d3e4 -->

<!-- START_141b31e9c5a7037e89acadf43efa649d -->
## _show:_ consult an EventUser by assistant id

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventusers/61ccd3551c821b765a312866" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventusers/61ccd3551c821b765a312866"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/eventusers/{eventuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | string required
    `eventuser` |  optional  | string required id Attendee

<!-- END_141b31e9c5a7037e89acadf43efa649d -->

<!-- START_1a93d52037043b43040c8f63d1d0c6b7 -->
## _update_:update a specific assistant

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventusers/61ccd3551c821b765a312866" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"rol_id":"dolor","properties":{"other_properties":"enim"}}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventusers/61ccd3551c821b765a312866"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rol_id": "dolor",
    "properties": {
        "other_properties": "enim"
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
    `eventuser` |  optional  | string required id Attendee
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `rol_id` | string |  optional  | rol id this is the role user into event
        `properties.other_properties` | any |  optional  | other params  will be saved in user and eventUser
    
<!-- END_1a93d52037043b43040c8f63d1d0c6b7 -->

<!-- START_f70f7831fab4378970f6e432c9e25736 -->
## __delete:__ remove a specific attendee from an event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventusers/61ccd3333821b765a312866" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/61ccd3551c821b765a312864/eventusers/61ccd3333821b765a312866"
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
`DELETE api/events/{event}/eventusers/{eventuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | string required
    `eventuser` |  optional  | string required id Attendee

<!-- END_f70f7831fab4378970f6e432c9e25736 -->

<!-- START_84d74839b57eed0df8c1697071eeeaa6 -->
## _indexByUserInEvent_: list of users by events

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/me/eventusers/event/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/me/eventusers/event/1"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/me/eventusers/event/{event}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required

<!-- END_84d74839b57eed0df8c1697071eeeaa6 -->

<!-- START_4bd3b40485e104bf4de0c264138d1029 -->
## _ByUserInEvent_ : list of users by events

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/eventusers/event/1/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventusers/event/1/user/1"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/eventusers/event/{event}/user/{user_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | string required

<!-- END_4bd3b40485e104bf4de0c264138d1029 -->

<!-- START_60d316aa60b8b526ece5acd538b7d419 -->
## _meInEvent_: user information logged into the event

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/me/events/61ccd3551c821b765a312864/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/me/events/61ccd3551c821b765a312864/eventusers"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/me/events/{event}/eventusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | string required event id

<!-- END_60d316aa60b8b526ece5acd538b7d419 -->

<!-- START_b11ff93318cdb6da2eb89990c0f8793c -->
## _metricsEventByDate_: number of registered users and checked in for day according to event start and end dates  * or according specific dates.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/nulla/metricsbydate/eventusers?metrics_type=created_at&datetime_from=nihil&datetime_to=atque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/nulla/metricsbydate/eventusers"
);

let params = {
    "metrics_type": "created_at",
    "datetime_from": "nihil",
    "datetime_to": "atque",
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
`GET api/events/{event}/metricsbydate/eventusers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | event_id
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `metrics_type` |  required  | string With this parameter you can defined the type of metrics that you want to see, you can select created_at for see the registered users  or checkedin_at for see checked users.
    `datetime_from` |  optional  | date format dd-mm-yyyy
    `datetime_to` |  optional  | date format dd-mm-yyyy

<!-- END_b11ff93318cdb6da2eb89990c0f8793c -->

<!-- START_268cde1684b4e9055d6507c299b96ea7 -->
## _updateRolAndSendEmail_: change the rol of an user in a event especific.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
This end point sends an email to the user to inform them of the change.

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/at/eventusers/quasi/updaterol" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"rol_id":"reprehenderit"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/at/eventusers/quasi/updaterol"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rol_id": "reprehenderit"
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

<!-- START_b517d383c710e2dea5f2e97ab7bb8b43 -->
## _meEvents:_ list of registered events of the logged in user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/me/eventUsers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/me/eventUsers"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/me/eventUsers`


<!-- END_b517d383c710e2dea5f2e97ab7bb8b43 -->

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
    "https://devapi.evius.co/api/files/upload/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"doloribus"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/files/upload/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "doloribus"
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
    "https://devapi.evius.co/api/files/uploadbase/placeat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"sequi","type":"quia"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/files/uploadbase/placeat"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "sequi",
    "type": "quia"
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
    "https://devapi.evius.co/api/googleanalytics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"startDate":"2021-06-30","endDate":"2021-07-6","filtersExpression":"ga:pagePath=@\/landing\/5ea23acbd74d5c4b360ddde2;ga:pagePath!@token","metrics":"ga:pageviews, ga:users, ga:sessions","dimensions":"ga:pagePath","fieldName":"ga:pagePath","sortOrder":"DESCENDING"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/googleanalytics"
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
<!-- START_918a74c64a832dc34e51b48a1e52471e -->
## _index_: list all host

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/host"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/host`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 

<!-- END_918a74c64a832dc34e51b48a1e52471e -->

<!-- START_fa42a1d1fa3809228cee6ca7b1135be8 -->
## _show_: view information for a specific host

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/host/1"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/host/{host}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | host id to be removed

<!-- END_fa42a1d1fa3809228cee6ca7b1135be8 -->

<!-- START_4086c0e3b680a2dd566cb3574341f389 -->
## _store_: create new host

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1/host" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"sit","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/host"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "sit",
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
`POST api/events/{event}/host`

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
    
<!-- END_4086c0e3b680a2dd566cb3574341f389 -->

<!-- START_ce1c2797d70ec4af9be56d0ee7084b2d -->
## _update_: update the specified host.

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"<p>Es todo un profesional<\/p>","description_activity":"true","image":"nihil","name":"Primer conferencista","order":1,"profession":"Ingeniero"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/host/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "<p>Es todo un profesional<\/p>",
    "description_activity": "true",
    "image": "nihil",
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
`PUT api/events/{event}/host/{host}`

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
    
<!-- END_ce1c2797d70ec4af9be56d0ee7084b2d -->

<!-- START_fc812c3ac5933927f6f5dd638d5e3990 -->
## _destroy_ : Remove the specified speaker.

> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/1/host/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/host/1"
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
`DELETE api/events/{event}/host/{host}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | host id to be removed

<!-- END_fc812c3ac5933927f6f5dd638d5e3990 -->

#News Feed


<!-- START_2b5183f2566ebb92311d3d276dbfa1f2 -->
## _store_: create news in an event

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"Los mejores eventos est\u00e1n en Evius","description_complete":"Los eventos en evius son interactivos porque tiene multiples opciones...","description_short":"Los eventos en Evius son los m\u00e1s interactivos y los mejores.","linkYoutube":"https:\/\/www.youtube.com\/watch?v=m1YUmZRfgqU&ab_channel=MG1010","image":"https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/IdKxqboMxU0pvgY3AbRkig4ZptQcUNE4CUvysJIn.png","time":"2021-08-02"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed"
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
    "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"Los mejores eventos est\u00e1n en Evius","description_complete":"Los eventos en evius son interactivos porque tiene multiples opciones...","description_short":"Los eventos en Evius son los m\u00e1s interactivos y los mejores.","linkYoutube":"https:\/\/www.youtube.com\/watch?v=m1YUmZRfgqU&ab_channel=MG1010","image":"https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/IdKxqboMxU0pvgY3AbRkig4ZptQcUNE4CUvysJIn.png","time":"2021-08-02"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed/1"
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
    "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed/6107fe65ff324f482d1c7569" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed/6107fe65ff324f482d1c7569"
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

<!-- START_70a22f864b8b2e72e32ac85821bf707e -->
## _index_: list of news of the event.

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/events\/605241e68b276356801236e4\/newsfeed?page=1",
        "last": "http:\/\/localhost\/api\/events\/605241e68b276356801236e4\/newsfeed?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/605241e68b276356801236e4\/newsfeed",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
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
    -G "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed/6107fe65ff324f482d1c7569" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/605241e68b276356801236e4/newsfeed/6107fe65ff324f482d1c7569"
);

let headers = {
    "Content-Type": "application/json",
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
    "message": "No query results for model [App\\Newsfeed] 6107fe65ff324f482d1c7569"
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

#Orders


The purpose of this end point is to store all the information of a user's payment orders
<!-- START_f9301c03a9281c0847565f96e6f723de -->
## _index_: list of all orders

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/orders"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"items":"[\"5ea23acbd74d5c4b360ddde2\"]","account_id":"5f450fb3d4267837bb128102","amount":10000,"item_type":"discountCode","discount_codes":[],"properties":"{\"person_type\" : \"Natural\",\"document_type\" : \"CC\", \"email\" : \"correo@correo.com\" , document_number\" : \"1014305626\",\"telephone\" : \"30058744512\",\"date_birth\" : \"2021-01-13\",\"adress\" : \"Calle falsa 123\", \"user_first_name\" : \"Pepe\" ,\"user_last_name\" : \"Lepu\"}"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/orders"
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
    -G "https://devapi.evius.co/api/orders/5fbd84e345611e292f04ab92" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/orders/5fbd84e345611e292f04ab92"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"items":"[\"5ea23acbd74d5c4b360ddde2\"]","account_id":"5f450fb3d4267837bb128102","amount":10000}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/orders/1"
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
    "https://devapi.evius.co/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/orders/1"
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
    -G "https://devapi.evius.co/api/events/5ea23acbd74d5c4b360ddde2/orders/ordersevent?filtered=%5B%7B%22field%22%3A%22items%22%2C%22value%22%3A%226116b372396b8f5e864f033a%22%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/5ea23acbd74d5c4b360ddde2/orders/ordersevent"
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
    "data": [],
    "links": {
        "first": "http:\/\/localhost\/api\/events\/5ea23acbd74d5c4b360ddde2\/orders\/ordersevent?page=1",
        "last": "http:\/\/localhost\/api\/events\/5ea23acbd74d5c4b360ddde2\/orders\/ordersevent?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/5ea23acbd74d5c4b360ddde2\/orders\/ordersevent",
        "per_page": 2500,
        "to": null,
        "total": 0
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
    -G "https://devapi.evius.co/api/users/5f450fb3d4267837bb128102/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/5f450fb3d4267837bb128102/orders"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "https://devapi.evius.co/api/me/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/me/orders"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "https://devapi.evius.co/api/orders/inventore/orderOrganization" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/orders/inventore/orderOrganization"
);

let headers = {
    "Content-Type": "application/json",
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


<!-- START_434c81a9abb0283f205ef7cb7378688e -->
## _index_:Display a listing of the organizations.

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/organizations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations"
);

let headers = {
    "Content-Type": "application/json",
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
    "_id": "5bb53ffac06586065d58cf7c",
    "name": "empresa",
    "nit": "123213213",
    "phone": "123123213",
    "author": "5ba434b0c065861ef00d1d0d",
    "updated_at": "2018-10-03 22:17:30",
    "created_at": "2018-10-03 22:17:30"
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
    -G "https://devapi.evius.co/api/organizations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_a3d4660c575d6fd59c9718ff69a12cc7 -->
## _store_:Store a newly created resource in organizations.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/organizations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"minima","styles":[],"user_properties":[]}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "minima",
    "styles": [],
    "user_properties": []
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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | required |  optional  | 
        `styles` | array |  required  | 
        `user_properties` | array |  required  | 
    
<!-- END_a3d4660c575d6fd59c9718ff69a12cc7 -->

<!-- START_830597a84ecd460e286f39b9ea7ef5ac -->
## _update_: Update the specified resource in organization.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/organizations/cupiditate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"sequi","styles":[],"user_properties":[]}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/cupiditate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "sequi",
    "styles": [],
    "user_properties": []
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
`PUT api/organizations/{organization}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | required |  optional  | 
        `styles` | array |  required  | 
        `user_properties` | array |  required  | 
    
<!-- END_830597a84ecd460e286f39b9ea7ef5ac -->

<!-- START_b9047b90f047db47c77810fd8de29af9 -->
## _destroy_: Remove the specified organization from storage.

> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/organizations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1"
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
    -G "https://devapi.evius.co/api/organization/ad/ordersUsersPoints?status=pendiente&date_from=rerum&date_to=expedita&type_report=csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organization/ad/ordersUsersPoints"
);

let params = {
    "status": "pendiente",
    "date_from": "rerum",
    "date_to": "expedita",
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
    -G "https://devapi.evius.co/api/organizations/1/organizationusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1/organizationusers"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_27849da1b2004e898106c0e7154c6c49 -->
## _show_: view a specific organization user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/organizations/sit/organizationusers/eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/sit/organizationusers/eos"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/organizations/{organization}/organizationusers/{organizationuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  optional  | The id of the organization
    `organizationuser` |  optional  | The id of the organization

<!-- END_27849da1b2004e898106c0e7154c6c49 -->

<!-- START_a93750b0b379e68b8ec6868184a38740 -->
## _update_: update a register user in organization.

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/organizations/voluptas/organizationusers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/voluptas/organizationusers/1"
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
    "https://devapi.evius.co/api/organizations/magni/organizationusers/dolorem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/magni/organizationusers/dolorem"
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

<!-- START_4c6145b46f1c2242e8bb6de5f5447d52 -->
## _meOrganizations_: list user&#039;s organizations.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
These organizations

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/me/organizations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/me/organizations"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/me/organizations`


<!-- END_4c6145b46f1c2242e8bb6de5f5447d52 -->

<!-- START_58b0ca87cd1aefd4ad8a9943ca352bc4 -->
## _meInOrganization_: view the information an user specific into an organization

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/me/organizations/vero" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/me/organizations/vero"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/me/organizations/{organization}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  optional  | The id of the organization

<!-- END_58b0ca87cd1aefd4ad8a9943ca352bc4 -->

<!-- START_b503be95f61a64248d1c224d6ca8afc5 -->
## _store_: create a new user in a organization

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/organizations/possimus/addorganizationuser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"test+11@mocionsoft.com","names":"test"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/possimus/addorganizationuser"
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
    -G "https://devapi.evius.co/api/organizations/1/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1/userproperties"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_8e4161194c0ae11e8741dddf0bd358a8 -->
## _show_: view the specific user propertie.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/organizations/1/userproperties/asperiores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1/userproperties/asperiores"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_167f478ffea3087e2d42f6b4df749db6 -->
## _store_: a newly created resource in UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/organizations/1/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1/userproperties"
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

<!-- START_6358afd13bef612f324ae42b40a6078a -->
## _update_: update the specified resource in UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/organizations/1/userproperties/explicabo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1/userproperties/explicabo"
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
    "https://devapi.evius.co/api/organizations/1/userproperties/quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1/userproperties/quia"
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

#Permissions


These endpoints allow you to view all permissions enabled by the system.
<!-- START_42db014707f615cd5cafb5ad1b6d0675 -->
## _index_: list all permissions that you can add to the roles.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/permissions"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/permissions`


<!-- END_42db014707f615cd5cafb5ad1b6d0675 -->

#Product

Endpoint that manages event products.
<!-- START_0358a380fb4889756d2a2c7b2af024c6 -->
## _store_: create new register for product.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/nulla/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Arbol","description":"Esta pintura es de un arbol.","image":"https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/87Pxr9PYNfBEDMbX19CeTU8wwTFHpb2XB3n2bnak.jpg","price":10000,"by":"Evius","short_description":"Pintura de arbol 1x2m","position":11111}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/nulla/products"
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
    "https://devapi.evius.co/api/events/est/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Arbol","description":"Esta pintura es de un arbol.","image":"https:\/\/storage.googleapis.com\/eviusauth.appspot.com\/evius\/events\/87Pxr9PYNfBEDMbX19CeTU8wwTFHpb2XB3n2bnak.jpg","price":10000,"by":"Evius","short_description":"Pintura de arbol 1x2m"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/est/products/1"
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
    "https://devapi.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/recusandae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/recusandae"
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
    "https://devapi.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/60e8cd558c421b004f2ff082/silentauctionmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"valueOffered":"100000"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/5ea23acbd74d5c4b360ddde2/products/60e8cd558c421b004f2ff082/silentauctionmail"
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

<!-- START_bcbfb75febf28221590e61636f620566 -->
## _index_: list product by event.

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/enim/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/enim/products"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/events\/enim\/products?page=1",
        "last": "http:\/\/localhost\/api\/events\/enim\/products?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/enim\/products",
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
    -G "https://devapi.evius.co/api/events/5bb25243b6312771e92c8693/products/accusamus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/5bb25243b6312771e92c8693/products/accusamus"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/rsvp/sendeventrsvp/voluptas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"subject":"non","image_header":"rerum","content_header":"Has sido invitado a el evento","message":"magni","image":"quia","image_footer":"consectetur","eventUsersIds":{"":"\"eventUsersIds\": [\"5f8734c81730821f216b6202\"]"},"include_ical_calendar":false,"include_login_button":false}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/rsvp/sendeventrsvp/voluptas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "subject": "non",
    "image_header": "rerum",
    "content_header": "Has sido invitado a el evento",
    "message": "magni",
    "image": "quia",
    "image_footer": "consectetur",
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

<!-- START_2b2c42e811c82fe1668961513937f683 -->
## updateStatusMessageUser_: update the stadistics about the emails send

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/vitae/updateStatusMessageUser/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/vitae/updateStatusMessageUser/1"
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
`PUT api/events/{event}/updateStatusMessageUser/{message_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | The ID of the event
    `message` |  optional  | The ID of the message

<!-- END_2b2c42e811c82fe1668961513937f683 -->

#RolEvent


<!-- START_75cf5c3a8f2699c0187f655ac1a80839 -->
## _index_: list all roles by event and the system default roles that can use in every events.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/organizations/1/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1/roles"
);

let headers = {
    "Content-Type": "application/json",
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
        "_id": "60e8a7e74f9fb74ccd00dc22",
        "name": "Attendee",
        "guard_name": "web",
        "updated_at": "2021-08-06 19:04:06",
        "created_at": "2021-07-09 19:47:51",
        "type": "attendee",
        "module": "system"
    },
    {
        "_id": "5c1a59b2f33bd40bb67f2322",
        "name": "Administrator",
        "guard_name": "web",
        "updated_at": "2021-07-02 20:58:53",
        "created_at": "2018-12-19 14:46:10",
        "type": "admin",
        "module": "system"
    }
]
```

### HTTP Request
`GET api/organizations/{organization}/roles`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organizaton` |  required  | organization id

<!-- END_75cf5c3a8f2699c0187f655ac1a80839 -->

<!-- START_5fde156c85cd0549ec53e979b40db35a -->
## _store_: create a new rol

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/organizations/est/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolore","type":"et","module":"porro"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/est/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolore",
    "type": "et",
    "module": "porro"
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
`POST api/organizations/{organization}/roles`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | name of the role
        `type` | string |  required  | 
        `module` | required |  optional  | string This indicate management in to organization  organization defaul value.
    
<!-- END_5fde156c85cd0549ec53e979b40db35a -->

<!-- START_96609e7c119b00852e46e170c74929d9 -->
## _show_: information from a specific role in an event

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/organizations/id/roles/ipsum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/id/roles/ipsum"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/organizations/{organization}/roles/{rol}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization id
    `rol` |  required  | organization rol

<!-- END_96609e7c119b00852e46e170c74929d9 -->

<!-- START_0e404f1982b18a1657efeb53eb13234d -->
## _update_: update the specified resource in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/organizations/minus/roles/tempora" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"doloremque","model":"sunt"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/minus/roles/tempora"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "doloremque",
    "model": "sunt"
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
`PUT api/organizations/{organization}/roles/{rol}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization id
    `rol` |  required  | organization rol
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 
        `model` | string |  required  | 
    
<!-- END_0e404f1982b18a1657efeb53eb13234d -->

<!-- START_ea81c8d9d17ea50df012601c683bba01 -->
## _destroy_:Remove the specified resource from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/organizations/voluptas/roles/ipsum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/voluptas/roles/ipsum"
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
`DELETE api/organizations/{organization}/roles/{rol}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization id
    `rol` |  required  | organization rol

<!-- END_ea81c8d9d17ea50df012601c683bba01 -->

#Rol Events


These enpoints help you to manage the roles of attendes 
and aministrators in a event.

You can create all roles that yo want. 

For view and manage this endpoints you have to be administrator in the event.
<!-- START_daebd65ec706c058340d05a863cd1d6a -->
## _index_: list roles by event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
In this list you can see the two roles default of the system: Attendee and Administrator.
Also you can see all roles created for you in you event.
When you create an event, you are assigned the Administrator role.

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/quis/rolesattendees?filtered=%5B%7B%22field%22%3A%22type%22%2C%22value%22%3A%22attendee%22%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/quis/rolesattendees"
);

let params = {
    "filtered": "[{"field":"type","value":"attendee"}]",
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
[
    {
        "_id": "60e8a7e74f9fb74ccd00dc22",
        "name": "Attendee",
        "guard_name": "web",
        "updated_at": "2021-08-06 19:04:06",
        "created_at": "2021-07-09 19:47:51",
        "type": "attendee",
        "module": "system"
    },
    {
        "_id": "5c1a59b2f33bd40bb67f2322",
        "name": "Administrator",
        "guard_name": "web",
        "updated_at": "2021-07-02 20:58:53",
        "created_at": "2018-12-19 14:46:10",
        "type": "admin",
        "module": "system"
    }
]
```

### HTTP Request
`GET api/events/{event}/rolesattendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | The ID of the event
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filtered` |  optional  | optional filter parameters

<!-- END_daebd65ec706c058340d05a863cd1d6a -->

<!-- START_11bc1f15101545b12589241813acaff2 -->
## _store_: create a new rol

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/voluptas/rolesattendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"RolName","type":"attendee"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/voluptas/rolesattendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "RolName",
    "type": "attendee"
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
`POST api/events/{event}/rolesattendees`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | The ID of the event
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | unique Rol name, the name of the role have to be unique, you can't create two or more roles with the same name.
        `type` | string |  required  | The type can be attendee or admin. The user with role type attendee can have access to event’s landing and can consult only the functions get, thist ype of rol doesn’t  access to CMS.
    
<!-- END_11bc1f15101545b12589241813acaff2 -->

<!-- START_5055a96905ed88d1904fd00ac2112535 -->
## _show_: information from a specific role

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/quia/rolesattendees/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/quia/rolesattendees/et"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/rolesattendees/{rolevent}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | The ID of the event
    `rolevent` |  required  | rol id

<!-- END_5055a96905ed88d1904fd00ac2112535 -->

<!-- START_2bbb24201a513674052246142b773598 -->
## _update_: update the specified rol in the event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/ullam/rolesattendees/voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"pariatur","type":"non"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/ullam/rolesattendees/voluptatem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "pariatur",
    "type": "non"
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
`PUT api/events/{event}/rolesattendees/{rolevent}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | The ID of the event
    `rolevent` |  required  | rol id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | Rol name
        `type` | string |  optional  | The type can be attendee or admin
    
<!-- END_2bbb24201a513674052246142b773598 -->

<!-- START_c4944fda5c5ef68fc14b4664b719a484 -->
## _destroy_: if the roll is not used for none user you can remove them.

> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/facilis/rolesattendees/dolore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/facilis/rolesattendees/dolore"
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
`DELETE api/events/{event}/rolesattendees/{rolevent}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  required  | The ID of the event
    `rolevent` |  required  | rol id

<!-- END_c4944fda5c5ef68fc14b4664b719a484 -->

#Roles Permissions

These endpoint allow you manage the relationship between roles and permissions.
Here you can see the which permissions have the roles and also you can add permissions
to the roles.
<!-- START_8d3e90084c3b726d3fbd482738591c60 -->
## _index_: list all roles and their permissions

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/sit/rolespermissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/sit/rolespermissions"
);

let headers = {
    "Content-Type": "application/json",
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
        "_id": "62265556a2634aabe418619e",
        "rol_id": "60e8a7e74f9fb74ccd00dc22",
        "permission_id": "6220f361b472fe2eb78b6d7b",
        "updated_at": "2021-08-06 19:48:01",
        "created_at": "2021-08-06 19:48:01",
        "rol": {
            "_id": "60e8a7e74f9fb74ccd00dc22",
            "name": "Attendee",
            "guard_name": "web",
            "updated_at": "2021-08-06 19:04:06",
            "created_at": "2021-07-09 19:47:51",
            "type": "attendee",
            "module": "system"
        },
        "permission": {
            "_id": "6220f361b472fe2eb78b6d7b",
            "name": "list_activities"
        }
    }
]
```

### HTTP Request
`GET api/events/{event}/rolespermissions`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event` |  optional  | requires event id.

<!-- END_8d3e90084c3b726d3fbd482738591c60 -->

<!-- START_434e2e708f44439618f042917956910f -->
## _show_: information from a specific relationship between role and permiision

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/rolespermissions/omnis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/rolespermissions/omnis"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/rolespermissions/{rolpermission}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `rolpermission` |  required  | rolpermission_id

<!-- END_434e2e708f44439618f042917956910f -->

<!-- START_5da5502bb097af8a8781a32754c4e353 -->
## _store_: create new rolespermissions

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1/rolespermissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"rol_id":"eum","permission_id":"sequi"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/rolespermissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rol_id": "eum",
    "permission_id": "sequi"
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
`POST api/events/{event}/rolespermissions`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `rol_id` | string |  required  | 
        `permission_id` | string |  required  | 
    
<!-- END_5da5502bb097af8a8781a32754c4e353 -->

<!-- START_0908f0b7db5612c90ca0e8b822176a6c -->
## _update_: update a specific rolepermission

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/rolespermissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"rol_id":"voluptates","permission_id":"sed"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/rolespermissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rol_id": "voluptates",
    "permission_id": "sed"
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
`PUT api/events/{event}/rolespermissions/{rolpermission}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `rol_id` | string |  required  | 
        `permission_id` | string |  required  | 
    
<!-- END_0908f0b7db5612c90ca0e8b822176a6c -->

<!-- START_ccb7b798dcf1cc2f91466db6b637e3c5 -->
## _update_: update a specific rolepermission

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/1/rolespermissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"rol_id":"voluptas","permission_id":"saepe"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/rolespermissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rol_id": "voluptas",
    "permission_id": "saepe"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event}/rolespermissions/{rolpermission}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `rol_id` | string |  required  | 
        `permission_id` | string |  required  | 
    
<!-- END_ccb7b798dcf1cc2f91466db6b637e3c5 -->

#Surveys


<!-- START_7525b8a38df41d7ddc341cd4c293b84c -->
## _show_ : view the information of a specific survey

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/surveys/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/surveys/1"
);

let headers = {
    "Content-Type": "application/json",
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
    "message": "No query results for model [App\\Survey] 1"
}
```

### HTTP Request
`GET api/events/{event}/surveys/{surveys}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string      required event id
    `survey` |  optional  | string  required survey id

<!-- END_7525b8a38df41d7ddc341cd4c293b84c -->

<!-- START_6060d494641740ac2660bc7cd4cbe1d2 -->
## _index_: list of surveys of an event

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/surveys"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/events\/1\/surveys?page=1",
        "last": "http:\/\/localhost\/api\/events\/1\/surveys?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/events\/1\/surveys",
        "per_page": 2500,
        "to": null,
        "total": 0
    }
}
```

### HTTP Request
`GET api/events/{event}/surveys`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string  required event id

<!-- END_6060d494641740ac2660bc7cd4cbe1d2 -->

<!-- START_1f9326dacbb23c27cb5ebe3274269cb9 -->
## _store_: create a new survey

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1/surveys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"survey":"Nombre de encuesta","show_horizontal_bar":false,"allow_vote_value_per_user":false,"activity_id":"eaque","points":1,"initialMessage":"voluptatem","time_limit":0,"allow_anonymous_answers":false,"allow_gradable_survey":false,"hasMinimumScore":false,"isGlobal":false,"freezeGame":false,"open":false,"publish":false,"minimumScore":7.578}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/surveys"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "survey": "Nombre de encuesta",
    "show_horizontal_bar": false,
    "allow_vote_value_per_user": false,
    "activity_id": "eaque",
    "points": 1,
    "initialMessage": "voluptatem",
    "time_limit": 0,
    "allow_anonymous_answers": false,
    "allow_gradable_survey": false,
    "hasMinimumScore": false,
    "isGlobal": false,
    "freezeGame": false,
    "open": false,
    "publish": false,
    "minimumScore": 7.578
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
`POST api/events/{event}/surveys`

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
    
<!-- END_1f9326dacbb23c27cb5ebe3274269cb9 -->

<!-- START_288a60e8a896009f5dbf97d933605b4a -->
## _update_: update a specific survey

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/surveys/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"survey":"mollitia","show_horizontal_bar":"et","allow_vote_value_per_user":"quia","activity_id":"dolor","points":"nesciunt","initialMessage":"incidunt","time_limit":"eaque","allow_anonymous_answers":"molestiae","allow_gradable_survey":"aliquam","hasMinimumScore":"rem","isGlobal":"omnis","freezeGame":"sit","open":"velit","publish":"rem","minimumScore":"delectus"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/surveys/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "survey": "mollitia",
    "show_horizontal_bar": "et",
    "allow_vote_value_per_user": "quia",
    "activity_id": "dolor",
    "points": "nesciunt",
    "initialMessage": "incidunt",
    "time_limit": "eaque",
    "allow_anonymous_answers": "molestiae",
    "allow_gradable_survey": "aliquam",
    "hasMinimumScore": "rem",
    "isGlobal": "omnis",
    "freezeGame": "sit",
    "open": "velit",
    "publish": "rem",
    "minimumScore": "delectus"
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
`PUT api/events/{event}/surveys/{surveys}`

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
    
<!-- END_288a60e8a896009f5dbf97d933605b4a -->

<!-- START_610f5bf40dcb396bf4887fd59387ae95 -->
## _destroy_: delete a specific survey

> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/1/surveys/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/surveys/1"
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
`DELETE api/events/{event}/surveys/{surveys}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | string      required event id
    `survey` |  optional  | string  required survey id

<!-- END_610f5bf40dcb396bf4887fd59387ae95 -->

#Template Properties Organization


<!-- START_86088a56e9074ccaabe74dbdf9a1f3f4 -->
## _index_:list all templates by organization

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/organizations/sed/templateproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/sed/templateproperties"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/organizations/{organization}/templateproperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization_id

<!-- END_86088a56e9074ccaabe74dbdf9a1f3f4 -->

<!-- START_2c8677d519f9cef5320ab334c917c67f -->
## _store_: create a new template for organization

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/organizations/quia/templateproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Template 1","user_properties":"temporibus"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/quia/templateproperties"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Template 1",
    "user_properties": "temporibus"
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
`POST api/organizations/{organization}/templateproperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization_id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | strign |  required  | name temlate.
        `user_properties` | array, |  optional  | if you want to make this structure, see User Properties and User Properties Organization
    
<!-- END_2c8677d519f9cef5320ab334c917c67f -->

<!-- START_ade25c3455463e7a3f1adb4db6090581 -->
## _update_: update the specified template propertie.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/organizations/tempora/templateproperties/officia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/tempora/templateproperties/officia"
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
`PUT api/organizations/{organization}/templateproperties/{templatepropertie}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization_id
    `templatepropertie` |  required  | template id

<!-- END_ade25c3455463e7a3f1adb4db6090581 -->

<!-- START_053b1e05dd045fddad02fe8adb0f1ed6 -->
## _destry_: delete a template specific

> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/organizations/1/templateproperties/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organizations/1/templateproperties/1"
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
`DELETE api/organizations/{organization}/templateproperties/{templatepropertie}`


<!-- END_053b1e05dd045fddad02fe8adb0f1ed6 -->

<!-- START_239f959da521a75bb133a94e90fce443 -->
## _addtemplateevent_: this metho allow add template to an event.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/et/templateproperties/1/addtemplateporperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/et/templateproperties/1/addtemplateporperties"
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


Manage users, the users info are stored in the backend and the user auth info (password, email).
There are two data base for the users: **firebase** and **mongodb**, the users are related by the field **uid** this id is genereated from  firebase.

Firebase manage the sessions user using tokens JTW.

The tokens are send in the url this way **?token=xxxxxxxxxxxxxxxxx**  for validate the athuentication of user.

If you want to work in development environment or production enviroment is necesary connect to proyect correspondent.

|                    | Prodcution    | Dev
|--------------      |-------------  | -------------
|**ID project**      |eviusauth      | eviusauthdev
|**Name project**    |eviusAuth      | eviusAuthDev
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## _index_: It&#039;s not posible to query all users in the platform.

Doesn't make sense to query all users. Users main function is to assits to an event
thus make sense to query users going to an event.

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users"
);

let headers = {
    "Content-Type": "application/json",
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
## _store_: create new user and send confirmation email

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"example@evius.co","names":"Evius","picture":"http:\/\/www.gravatar.com\/avatar","password":"*******"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "example@evius.co",
    "names": "Evius",
    "picture": "http:\/\/www.gravatar.com\/avatar",
    "password": "*******"
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
## _show_: view a specific registered user

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/users/603d6af041e6f468091c95d5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/603d6af041e6f468091c95d5"
);

let headers = {
    "Content-Type": "application/json",
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
    "message": "No query results for model [App\\Account] 603d6af041e6f468091c95d5"
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
    -G "https://devapi.evius.co/api/users/loginorcreatefromtoken" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/loginorcreatefromtoken"
);

let headers = {
    "Content-Type": "application/json",
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
    "https://devapi.evius.co/api/users/603d6af041e6f468091c95d5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"names":"Evius Demo","password":"******","picture":"http:\/\/www.gravatar.com\/avatar"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/603d6af041e6f468091c95d5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "names": "Evius Demo",
    "password": "******",
    "picture": "http:\/\/www.gravatar.com\/avatar"
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
    `names` | string |  optional  | optional.
        `password` | string. |  optional  | 
        `picture` | string |  optional  | optional.
    
<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## _delete_: delete a registered user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/users/603d6af041e6f555591c95d5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/603d6af041e6f555591c95d5"
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
    `user` |  required  | id user

<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->

<!-- START_897105c2d6a4eba5dea882c31f100668 -->
## getCurrentUser: returns current user information using valid token send with the request.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
returns current user information using valid token send with the request.
Token is processed  by middleware

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/users/currentUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/currentUser"
);

let headers = {
    "Content-Type": "application/json",
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
    -G "https://devapi.evius.co/api/users/findByEmail/correo@evius.co" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/findByEmail/correo@evius.co"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_a34c0500a6de41f9c818a3e32dad6141 -->
## _userOrganization_: user lists all the users that belong to an organization, besides this you can filter all the users by **any of the properties** that have

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/organization/61ccd2cc81e73549a63dd5ce/users?filtered=%5B%7B%22field%22%3Anames%22%2C%22Evius%22%7D%5D&orderBy=%5B%7B%22field%22%3A%22_id%22%2C%22order%22%3A%22desc%22%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/organization/61ccd2cc81e73549a63dd5ce/users"
);

let params = {
    "filtered": "[{"field":names","Evius"}]",
    "orderBy": "[{"field":"_id","order":"desc"}]",
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
`GET api/organization/{organization}/users`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `organization` |  required  | organization to which the users belong.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filtered` |  optional  | optional filter parameters
    `orderBy` |  optional  | filter parameters

<!-- END_a34c0500a6de41f9c818a3e32dad6141 -->

<!-- START_5382494c391bf1f288b8a7f745638217 -->
## _changeStatusUser_: approve or reject the rol the users teacher ,and send mail of the change of status of the user to the user who created it

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/users/architecto/changeStatusUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"status":"approved"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/architecto/changeStatusUser"
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
## _signInWithEmailAndPassword_: login a user, you can see this [diagram](https://app.diagrams.net/#G1qSNi58JI6usiyqU7n7SsmyTrJW5oITAZ)

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/users/signInWithEmailAndPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"correo@evius.co","password":"*********"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/users/signInWithEmailAndPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "correo@evius.co",
    "password": "*********"
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

<!-- START_e57bdb918239f0f65c7591c94c0ef2fc -->
## _getAccessLink_: get and sent link acces to email to user.

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/getloginlink" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"refreshlink":"sunt","event":"61ccd3551c821b765a312864","email":"correo@evius.co"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/getloginlink"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "refreshlink": "sunt",
    "event": "61ccd3551c821b765a312864",
    "email": "correo@evius.co"
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
`POST api/getloginlink`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `refreshlink` | This |  optional  | parameter return the login link but not send email.
        `event` | string |  optional  | event id to redirect user, if this parameter not send, the link redirect to principal page.
        `email` | email |  required  | user email
    
<!-- END_e57bdb918239f0f65c7591c94c0ef2fc -->

<!-- START_dae265a702afa4764e8b5bc8f0be7fbc -->
## _signInWithEmailLink_: this end point start the login when the user does click in the link

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/singinwithemaillink" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"event_id":"61ccd3551c821b765a312864","email":"correo@evius.co"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/singinwithemaillink"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "event_id": "61ccd3551c821b765a312864",
    "email": "correo@evius.co"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
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

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `event_id` | string |  optional  | event id to redirect user, if this parameter not send, the link redirect to principal page.
        `email` | email |  required  | user email
    
<!-- END_dae265a702afa4764e8b5bc8f0be7fbc -->

<!-- START_a658293e8e100b2384bed5b8ebc735f6 -->
## _changeUserPassword_: send to email to user whit  link to change user password.

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/changeuserpassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"event_id":"61ccd3551c821b765a312864","email":"correo@evius.co"}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/changeuserpassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "event_id": "61ccd3551c821b765a312864",
    "email": "correo@evius.co"
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
`PUT api/changeuserpassword`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `event_id` | string |  optional  | event id to redirect user, if this parameter not send, the link redirect to principal page.
        `email` | email |  required  | user email
    
<!-- END_a658293e8e100b2384bed5b8ebc735f6 -->

#User Properties


<!-- START_68d285999cbfafa88d4198cbf41d0b56 -->
## _store_: a newly created resource in UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/events/1/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/userproperties"
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
`POST api/events/{event}/userproperties`

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
    
<!-- END_68d285999cbfafa88d4198cbf41d0b56 -->

<!-- START_d47dfbb08915a820fc67249882766595 -->
## _destroy_: remove the specified resource from UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X DELETE \
    "https://devapi.evius.co/api/events/1/userproperties/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/userproperties/1"
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
`DELETE api/events/{event}/userproperties/{userpropertie}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | id UserProperties

<!-- END_d47dfbb08915a820fc67249882766595 -->

<!-- START_2463d7da5944ffc58dc186ede13e61d9 -->
## _update_: update the specified resource in UserProperties.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/userproperties/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"celular","mandatory":true,"visibleByContacts":true,"visibleByAdmin":true,"label":"Celular","description":"N\u00famero de contacto","type":"number","justonebyattendee":true,"order_weight":1}'

```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/userproperties/1"
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
`PUT api/events/{event}/userproperties/{userpropertie}`

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
    
<!-- END_2463d7da5944ffc58dc186ede13e61d9 -->

<!-- START_d7bee26085b2859ff52e30a635f692d6 -->
## _index_: list of user properties of a specific event.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/userproperties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/userproperties"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/userproperties`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  optional  | required.

<!-- END_d7bee26085b2859ff52e30a635f692d6 -->

<!-- START_8f812971c8ea60dcbbf597e9ce9066dc -->
## _show_: view the specific user propertie.

| Url Params   |
| -------------|

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/userproperties/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/userproperties/1"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/userproperties/{userpropertie}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | 
    `id` |  required  | id UserProperties

<!-- END_8f812971c8ea60dcbbf597e9ce9066dc -->

<!-- START_4a8c578c70536fb0ccabd2246574206d -->
## _RegisterListFieldOptionTaken_: bloquea un elemento que un asistente ya escogio de un campo tipo lista de elementos con inventario cuando se registra a un evento.

Toca hacerlo asi porque con la concurrencia se nos estaban cruzando dos peticiones simultaneas y solo quedaba con los valores de la última

> Example request:

```bash
curl -X PUT \
    "https://devapi.evius.co/api/events/1/userproperties/1/RegisterListFieldOptionTaken" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/userproperties/1/RegisterListFieldOptionTaken"
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
`PUT api/events/{event}/userproperties/{userpropertie}/RegisterListFieldOptionTaken`


<!-- END_4a8c578c70536fb0ccabd2246574206d -->

#general


<!-- START_d9b62494c6aeb80a34684d6c82c603e4 -->
## api/eventusers/{event}/makeTicketIdaProperty/{ticket_id}
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/eventusers/1/makeTicketIdaProperty/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/eventusers/1/makeTicketIdaProperty/1"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/eventusers/{event}/makeTicketIdaProperty/{ticket_id}`


<!-- END_d9b62494c6aeb80a34684d6c82c603e4 -->

<!-- START_710a166934ebcbb3ee90ea0211f87e7b -->
## api/events/{event}/users/{user_id}/asignticketstouser
> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/events/1/users/1/asignticketstouser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/events/1/users/1/asignticketstouser"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/events/{event}/users/{user_id}/asignticketstouser`


<!-- END_710a166934ebcbb3ee90ea0211f87e7b -->

<!-- START_739442a2495f200cd4de63da705ac98e -->
## Create model_has_role
role_id
model_id (user_id)
event_id

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/me/contributors/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/me/contributors/events"
);

let headers = {
    "Content-Type": "application/json",
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

<!-- START_50361dad34e65e623afe3a82b2191784 -->
## Display a listing of the contributors of an event resource.

> Example request:

```bash
curl -X GET \
    -G "https://devapi.evius.co/api/contributors/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/contributors/events/1"
);

let headers = {
    "Content-Type": "application/json",
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
`GET api/contributors/events/{event}`


<!-- END_50361dad34e65e623afe3a82b2191784 -->

<!-- START_e2472f0dc8400d5818ee0a4fb92cf7ce -->
## _validateFreeorder_: validates the order in case the purchase value is 0

> Example request:

```bash
curl -X POST \
    "https://devapi.evius.co/api/orders/officia/validateFreeorder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/orders/officia/validateFreeorder"
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
    "https://devapi.evius.co/api/orders/sit/validatePointOrder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/orders/sit/validatePointOrder"
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
    "https://devapi.evius.co/api/orders/1/validatePointOrderTest" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/api/orders/1/validatePointOrderTest"
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
    -G "https://devapi.evius.co/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://devapi.evius.co/broadcasting/auth"
);

let headers = {
    "Content-Type": "application/json",
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


