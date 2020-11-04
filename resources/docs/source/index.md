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
[Get Postman Collection](http://localhost:8000/docs/collection.json)

<!-- END_INFO -->

#Activity


The activities within an event are **sessions, talks, lessons or conferences** in which specific topics are discussed.

Each activity has its **date , time and duration**.

These activities, according to the organizer, can be carried out either in person or virtually.
<!-- START_4b74c69334a9fda83ca783df8b478e89 -->
## _index_: List of activities

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/events/5e9cae6bd74d5c2f5f0c61f2/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/events/5e9cae6bd74d5c2f5f0c61f2/activities"
);

let headers = {
    "Content-Type": "application/json",
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
        "_id": "5dbc99bad74d5c5822693842",
        "name": "Panel de apertura",
        "datetime_start": "2019-11-13 08:30",
        "datetime_end": "2019-11-13 09:30",
        "space_id": "5db7105f3b77506ff24b486a",
        "image": null,
        "description": "<p>Moderador: Jacobo Alvarez<\/p>",
        "survey_ids": [
            "",
            "5dbc99bad74d5c5822693842",
            "5dbc99bad74d5c5822693842",
            "5dbc99bad74d5c5822693842"
        ],
        "capacity": 320,
        "activity_categories_ids": [
            "5dc17823d74d5c5d2946b054"
        ],
        "host_ids": [
            "5dc34c15d74d5c64d03b4b14"
        ],
        "type_id": "5dbc9969d74d5c582b687122",
        "updated_at": "2020-03-30 18:32:46",
        "created_at": "2019-11-01 20:46:50",
        "access_restriction_rol_ids": [
            "5dbc943e3b77502205180ba4",
            "5dc08abed74d5c5c54111b44",
            "5dc08adcd74d5c5c54111b46",
            "5dc2f32ad74d5c6215757bf4",
            "5dc337e8d74d5c6414372f53",
            "5dc337f3d74d5c641728bf08",
            "5dc33854d74d5c63ff2ad878",
            "5dc44079d74d5c68c21aa5c7",
            "5dc440a5d74d5c68ca1019b5",
            "5dc440c1d74d5c68ca1019b6",
            "5dc444b2d74d5c68ca1019b9",
            "5dc5da61cdb0ad0c78db1782"
        ],
        "access_restriction_type": "SUGGESTED",
        "role_attendee_ids": [
            "5dbc94313b77502205180ba3",
            "5dbc943e3b77502205180ba4",
            "5dc08abed74d5c5c54111b44",
            "5dc08adcd74d5c5c54111b46",
            "5dc2f32ad74d5c6215757bf4",
            "5dc337e8d74d5c6414372f53",
            "5dc337f3d74d5c641728bf08",
            "5dc33854d74d5c63ff2ad878",
            "5dc44079d74d5c68c21aa5c7",
            "5dc440a5d74d5c68ca1019b5",
            "5dc440c1d74d5c68ca1019b6",
            "5dc444b2d74d5c68ca1019b9",
            "5dc5da61cdb0ad0c78db1782"
        ],
        "remaining_capacity": 151,
        "subtitle": "Apuestas institucionales para la economía creativa.",
        "access_restriction_types_available": null,
        "activity_categories": [
            {
                "_id": "5dc17823d74d5c5d2946b054",
                "name": "Powercamp",
                "color": "#f39208",
                "updated_at": "2019-11-06 18:38:51",
                "created_at": "2019-11-05 13:24:51",
                "activities_ids": [
                    "5dc18213d74d5c5d6d678242",
                    "5dbcbd3fd74d5c593042c314",
                    "5dbcaaadd74d5c58a72ac0d2",
                    "5dbcca25d74d5c5992036516",
                    "5dbcb159d74d5c5904212902",
                    "5dc31aa1d74d5c621e3c69c9",
                    "5dbcc773d74d5c5984427425",
                    "5dbca445d74d5c58675c9637",
                    "5dbcc8bed74d5c598928ca25",
                    "5dbca29fd74d5c586a2db2b5",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dc33b75d74d5c644e6e4175",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcc637d74d5c5984427423",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dc34428d74d5c64a55b63a4",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dc3434bd74d5c64a55b63a2",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dc33f05d74d5c64675f0594",
                    "5dc3455cd74d5c649d2066f3",
                    "5dc34687d74d5c649d2066f5",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dc342cdd74d5c649d2066f2",
                    "5dc34a2dd74d5c64a55b63ac",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dc34ae2d74d5c64bd49a634",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dbcbd6ed74d5c5945364603",
                    "5dc33c38d74d5c64440c20b4",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            }
        ],
        "space": {
            "_id": "5db7105f3b77506ff24b486a",
            "name": "Casa Merced",
            "event_id": "5db215419567225895c8d296",
            "updated_at": "2019-10-28 15:59:23",
            "created_at": "2019-10-28 15:59:23",
            "5db7105f3b77506ff24b486a": [
                null
            ]
        },
        "hosts": [
            {
                "_id": "5dc34c15d74d5c64d03b4b14",
                "name": "Deninson Mendoza",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/22QTbYj6MpEh7KZmNEYDnQDBzdm9QiZqXwoNdoOr.jpeg",
                "description": null,
                "profession": "Secretario de Desarrollo Económico y Competitividad",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-08 20:22:16",
                "created_at": "2019-11-06 22:41:25",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5dc34c22d74d5c64ac2e56d6",
                "name": "Adriana Gonzalez",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/yy4q4SVM6vWscGiRiuprUCtktGeKSuItdlQYNIsz.jpeg",
                "description": "<p><span style=\"color: rgba(0, 0, 0, 0.9);\">Adriana es productora de cine y televisión y guionista audiovisual. También es gestora cultural y publica, legislaciones comparadas y gestiona temas de audiovisual al igual que selectora musical.  <\/span><\/p>",
                "profession": "Coordinadora de Emprendimiento Cultural del Ministerio de Cultura",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-08 23:42:06",
                "created_at": "2019-11-06 22:41:38",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5dc34c36d74d5c64d03b4b15",
                "name": "Esteban Piedrahita",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/PSEV3zE64BvviPLPmrDXMGfA99JGAanW82kgIJsI.jpeg",
                "description": null,
                "profession": "Presidente Cámara de Comercio de Cali",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-08 23:44:49",
                "created_at": "2019-11-06 22:41:58",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5dc5bea4d74d5c716d1cf7a2",
                "name": "Manuel Madriñán",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/cOTKlYr8tejmQHdY6Zz8ajtFExwJLXKbPEx7xrsr.jpeg",
                "description": null,
                "profession": "Director de Servicios Sociales de Comfandi",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-09 00:00:11",
                "created_at": "2019-11-08 19:14:44",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5dc612dad74d5c75b7385c64",
                "name": "Angelica Mayolo",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6NwnEhVj3gOBs59jR2dD9cBhTjhr9IJCssiz3JkZ.jpeg",
                "description": null,
                "profession": "Secretaria de Desarrollo Económico",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-09 01:14:02",
                "created_at": "2019-11-09 01:14:02",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5e7cb65cc62d0c3352779731",
                "name": "Adriana Gonzalez",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/yy4q4SVM6vWscGiRiuprUCtktGeKSuItdlQYNIsz.jpeg",
                "description": "<p><span style=\"color: rgba(0, 0, 0, 0.9);\">Adriana es productora de cine y televisión y guionista audiovisual. También es gestora cultural y publica, legislaciones comparadas y gestiona temas de audiovisual al igual que selectora musical.  <\/span><\/p>",
                "profession": "Coordinadora de Emprendimiento Cultural del Ministerio de Cultura",
                "event_id": "5e7bd077d74d5c581c1a3d92",
                "updated_at": "2019-11-08 23:42:06",
                "created_at": "2019-11-06 22:41:38",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            }
        ],
        "type": {
            "_id": "5dbc9969d74d5c582b687122",
            "name": "Conferencia",
            "updated_at": "2019-11-01 20:45:29",
            "created_at": "2019-11-01 20:45:29",
            "5dbc9969d74d5c582b687122": [],
            "0": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null
            ]
        },
        "access_restriction_roles": [
            {
                "_id": "5dbc943e3b77502205180ba4",
                "name": "Compradores",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-04 20:31:39",
                "created_at": "2019-11-01 20:23:26",
                "activities_ids": [
                    "5dc18213d74d5c5d6d678242",
                    "5dbcb159d74d5c5904212902",
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dc33f05d74d5c64675f0594",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc33c38d74d5c64440c20b4",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc08abed74d5c5c54111b44",
                "name": "Etapa Emergente",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-08 16:12:10",
                "created_at": "2019-11-04 20:31:58",
                "activities_ids": [
                    "5dbcbd3fd74d5c593042c314",
                    "5dbcaaadd74d5c58a72ac0d2",
                    "5dbcca25d74d5c5992036516",
                    "5dbca29fd74d5c586a2db2b5",
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcc637d74d5c5984427423",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc08adcd74d5c5c54111b46",
                "name": "Empresas en etapa Expansión",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-04 20:32:28",
                "created_at": "2019-11-04 20:32:28",
                "activities_ids": [
                    "5dbcbd3fd74d5c593042c314",
                    "5dbcca25d74d5c5992036516",
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dbcbd6ed74d5c5945364603",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc2f32ad74d5c6215757bf4",
                "name": "Corporativo",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-06 16:22:02",
                "created_at": "2019-11-06 16:22:02",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dc3007bd74d5c622e766bbd",
                    "5dc34428d74d5c64a55b63a4",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dc3455cd74d5c649d2066f3",
                    "5dc34687d74d5c649d2066f5",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dc34a2dd74d5c64a55b63ac",
                    "5dc62966d74d5c76ad539983",
                    "5dc34ae2d74d5c64bd49a634",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbcc89bd74d5c5992036515",
                    "5dbcc66ad74d5c598928ca23",
                    "5dc33941d74d5c63ff2ad879",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc337e8d74d5c6414372f53",
                "name": "ValleE",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-06 21:15:20",
                "created_at": "2019-11-06 21:15:20",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dc33b75d74d5c644e6e4175",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dc3434bd74d5c64a55b63a2",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427",
                    "5ebace1598f29373b069c713"
                ]
            },
            {
                "_id": "5dc337f3d74d5c641728bf08",
                "name": "Comfandi",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-06 21:15:31",
                "created_at": "2019-11-06 21:15:31",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc33854d74d5c63ff2ad878",
                "name": "Aliados Secretaria de Desarrollo Económico",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-06 21:17:08",
                "created_at": "2019-11-06 21:17:08",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dc342cdd74d5c649d2066f2",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc44079d74d5c68c21aa5c7",
                "name": "Medio de comunicación",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-07 16:04:44",
                "created_at": "2019-11-07 16:04:09",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc440a5d74d5c68ca1019b5",
                "name": "Inversionista",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-07 16:04:53",
                "created_at": "2019-11-07 16:04:53",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca814d74d5c588b53b882",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcc89bd74d5c5992036515",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc440c1d74d5c68ca1019b6",
                "name": "Estudiante",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-07 16:05:21",
                "created_at": "2019-11-07 16:05:21",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcc5b1d74d5c5984427422",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc444b2d74d5c68ca1019b9",
                "name": "Freelance",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-07 16:22:10",
                "created_at": "2019-11-07 16:22:10",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dbcbd6ed74d5c5945364603",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc5da61cdb0ad0c78db1782",
                "name": "Asistente",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-04 20:32:28",
                "created_at": "2019-11-04 20:32:28",
                "activities_ids": [
                    "5dbcbd3fd74d5c593042c314",
                    "5dbcca25d74d5c5992036516",
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            }
        ]
    },
    {
        "_id": "5dbc99bad74d5c5822693842",
        "name": "Panel de apertura",
        "datetime_start": "2019-11-13 08:30",
        "datetime_end": "2019-11-13 09:30",
        "space_id": "5db7105f3b77506ff24b486a",
        "image": null,
        "description": "<p>Moderador: Jacobo Alvarez<\/p>",
        "survey_ids": [
            "",
            "5dbc99bad74d5c5822693842",
            "5dbc99bad74d5c5822693842",
            "5dbc99bad74d5c5822693842"
        ],
        "capacity": 320,
        "activity_categories_ids": [
            "5dc17823d74d5c5d2946b054"
        ],
        "host_ids": [
            "5dc34c15d74d5c64d03b4b14"
        ],
        "type_id": "5dbc9969d74d5c582b687122",
        "updated_at": "2020-03-30 18:32:46",
        "created_at": "2019-11-01 20:46:50",
        "access_restriction_rol_ids": [
            "5dbc943e3b77502205180ba4",
            "5dc08abed74d5c5c54111b44",
            "5dc08adcd74d5c5c54111b46",
            "5dc2f32ad74d5c6215757bf4",
            "5dc337e8d74d5c6414372f53",
            "5dc337f3d74d5c641728bf08",
            "5dc33854d74d5c63ff2ad878",
            "5dc44079d74d5c68c21aa5c7",
            "5dc440a5d74d5c68ca1019b5",
            "5dc440c1d74d5c68ca1019b6",
            "5dc444b2d74d5c68ca1019b9",
            "5dc5da61cdb0ad0c78db1782"
        ],
        "access_restriction_type": "SUGGESTED",
        "role_attendee_ids": [
            "5dbc94313b77502205180ba3",
            "5dbc943e3b77502205180ba4",
            "5dc08abed74d5c5c54111b44",
            "5dc08adcd74d5c5c54111b46",
            "5dc2f32ad74d5c6215757bf4",
            "5dc337e8d74d5c6414372f53",
            "5dc337f3d74d5c641728bf08",
            "5dc33854d74d5c63ff2ad878",
            "5dc44079d74d5c68c21aa5c7",
            "5dc440a5d74d5c68ca1019b5",
            "5dc440c1d74d5c68ca1019b6",
            "5dc444b2d74d5c68ca1019b9",
            "5dc5da61cdb0ad0c78db1782"
        ],
        "remaining_capacity": 151,
        "subtitle": "Apuestas institucionales para la economía creativa.",
        "access_restriction_types_available": null,
        "activity_categories": [
            {
                "_id": "5dc17823d74d5c5d2946b054",
                "name": "Powercamp",
                "color": "#f39208",
                "updated_at": "2019-11-06 18:38:51",
                "created_at": "2019-11-05 13:24:51",
                "activities_ids": [
                    "5dc18213d74d5c5d6d678242",
                    "5dbcbd3fd74d5c593042c314",
                    "5dbcaaadd74d5c58a72ac0d2",
                    "5dbcca25d74d5c5992036516",
                    "5dbcb159d74d5c5904212902",
                    "5dc31aa1d74d5c621e3c69c9",
                    "5dbcc773d74d5c5984427425",
                    "5dbca445d74d5c58675c9637",
                    "5dbcc8bed74d5c598928ca25",
                    "5dbca29fd74d5c586a2db2b5",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dc33b75d74d5c644e6e4175",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcc637d74d5c5984427423",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dc34428d74d5c64a55b63a4",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dc3434bd74d5c64a55b63a2",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dc33f05d74d5c64675f0594",
                    "5dc3455cd74d5c649d2066f3",
                    "5dc34687d74d5c649d2066f5",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dc342cdd74d5c649d2066f2",
                    "5dc34a2dd74d5c64a55b63ac",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dc34ae2d74d5c64bd49a634",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dbcbd6ed74d5c5945364603",
                    "5dc33c38d74d5c64440c20b4",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            }
        ],
        "space": {
            "_id": "5db7105f3b77506ff24b486a",
            "name": "Casa Merced",
            "event_id": "5db215419567225895c8d296",
            "updated_at": "2019-10-28 15:59:23",
            "created_at": "2019-10-28 15:59:23",
            "5db7105f3b77506ff24b486a": [
                null
            ]
        },
        "hosts": [
            {
                "_id": "5dc34c15d74d5c64d03b4b14",
                "name": "Deninson Mendoza",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/22QTbYj6MpEh7KZmNEYDnQDBzdm9QiZqXwoNdoOr.jpeg",
                "description": null,
                "profession": "Secretario de Desarrollo Económico y Competitividad",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-08 20:22:16",
                "created_at": "2019-11-06 22:41:25",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5dc34c22d74d5c64ac2e56d6",
                "name": "Adriana Gonzalez",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/yy4q4SVM6vWscGiRiuprUCtktGeKSuItdlQYNIsz.jpeg",
                "description": "<p><span style=\"color: rgba(0, 0, 0, 0.9);\">Adriana es productora de cine y televisión y guionista audiovisual. También es gestora cultural y publica, legislaciones comparadas y gestiona temas de audiovisual al igual que selectora musical.  <\/span><\/p>",
                "profession": "Coordinadora de Emprendimiento Cultural del Ministerio de Cultura",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-08 23:42:06",
                "created_at": "2019-11-06 22:41:38",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5dc34c36d74d5c64d03b4b15",
                "name": "Esteban Piedrahita",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/PSEV3zE64BvviPLPmrDXMGfA99JGAanW82kgIJsI.jpeg",
                "description": null,
                "profession": "Presidente Cámara de Comercio de Cali",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-08 23:44:49",
                "created_at": "2019-11-06 22:41:58",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5dc5bea4d74d5c716d1cf7a2",
                "name": "Manuel Madriñán",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/cOTKlYr8tejmQHdY6Zz8ajtFExwJLXKbPEx7xrsr.jpeg",
                "description": null,
                "profession": "Director de Servicios Sociales de Comfandi",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-09 00:00:11",
                "created_at": "2019-11-08 19:14:44",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5dc612dad74d5c75b7385c64",
                "name": "Angelica Mayolo",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/6NwnEhVj3gOBs59jR2dD9cBhTjhr9IJCssiz3JkZ.jpeg",
                "description": null,
                "profession": "Secretaria de Desarrollo Económico",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-09 01:14:02",
                "created_at": "2019-11-09 01:14:02",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            },
            {
                "_id": "5e7cb65cc62d0c3352779731",
                "name": "Adriana Gonzalez",
                "image": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/yy4q4SVM6vWscGiRiuprUCtktGeKSuItdlQYNIsz.jpeg",
                "description": "<p><span style=\"color: rgba(0, 0, 0, 0.9);\">Adriana es productora de cine y televisión y guionista audiovisual. También es gestora cultural y publica, legislaciones comparadas y gestiona temas de audiovisual al igual que selectora musical.  <\/span><\/p>",
                "profession": "Coordinadora de Emprendimiento Cultural del Ministerio de Cultura",
                "event_id": "5e7bd077d74d5c581c1a3d92",
                "updated_at": "2019-11-08 23:42:06",
                "created_at": "2019-11-06 22:41:38",
                "activities_ids": [
                    "5dbc99bad74d5c5822693842"
                ]
            }
        ],
        "type": {
            "_id": "5dbc9969d74d5c582b687122",
            "name": "Conferencia",
            "updated_at": "2019-11-01 20:45:29",
            "created_at": "2019-11-01 20:45:29",
            "5dbc9969d74d5c582b687122": [],
            "0": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null
            ]
        },
        "access_restriction_roles": [
            {
                "_id": "5dbc943e3b77502205180ba4",
                "name": "Compradores",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-04 20:31:39",
                "created_at": "2019-11-01 20:23:26",
                "activities_ids": [
                    "5dc18213d74d5c5d6d678242",
                    "5dbcb159d74d5c5904212902",
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dc33f05d74d5c64675f0594",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc33c38d74d5c64440c20b4",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc08abed74d5c5c54111b44",
                "name": "Etapa Emergente",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-08 16:12:10",
                "created_at": "2019-11-04 20:31:58",
                "activities_ids": [
                    "5dbcbd3fd74d5c593042c314",
                    "5dbcaaadd74d5c58a72ac0d2",
                    "5dbcca25d74d5c5992036516",
                    "5dbca29fd74d5c586a2db2b5",
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcc637d74d5c5984427423",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc08adcd74d5c5c54111b46",
                "name": "Empresas en etapa Expansión",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-04 20:32:28",
                "created_at": "2019-11-04 20:32:28",
                "activities_ids": [
                    "5dbcbd3fd74d5c593042c314",
                    "5dbcca25d74d5c5992036516",
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dbcbd6ed74d5c5945364603",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc2f32ad74d5c6215757bf4",
                "name": "Corporativo",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-06 16:22:02",
                "created_at": "2019-11-06 16:22:02",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dc3007bd74d5c622e766bbd",
                    "5dc34428d74d5c64a55b63a4",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dc3455cd74d5c649d2066f3",
                    "5dc34687d74d5c649d2066f5",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dc34a2dd74d5c64a55b63ac",
                    "5dc62966d74d5c76ad539983",
                    "5dc34ae2d74d5c64bd49a634",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbcc89bd74d5c5992036515",
                    "5dbcc66ad74d5c598928ca23",
                    "5dc33941d74d5c63ff2ad879",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc337e8d74d5c6414372f53",
                "name": "ValleE",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-06 21:15:20",
                "created_at": "2019-11-06 21:15:20",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dc33b75d74d5c644e6e4175",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dc3434bd74d5c64a55b63a2",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427",
                    "5ebace1598f29373b069c713"
                ]
            },
            {
                "_id": "5dc337f3d74d5c641728bf08",
                "name": "Comfandi",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-06 21:15:31",
                "created_at": "2019-11-06 21:15:31",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc33854d74d5c63ff2ad878",
                "name": "Aliados Secretaria de Desarrollo Económico",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-06 21:17:08",
                "created_at": "2019-11-06 21:17:08",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dc342cdd74d5c649d2066f2",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc44079d74d5c68c21aa5c7",
                "name": "Medio de comunicación",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-07 16:04:44",
                "created_at": "2019-11-07 16:04:09",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcb225d74d5c5904212904",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc440a5d74d5c68ca1019b5",
                "name": "Inversionista",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-07 16:04:53",
                "created_at": "2019-11-07 16:04:53",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca814d74d5c588b53b882",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbcc89bd74d5c5992036515",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc440c1d74d5c68ca1019b6",
                "name": "Estudiante",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-07 16:05:21",
                "created_at": "2019-11-07 16:05:21",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcc5b1d74d5c5984427422",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc444b2d74d5c68ca1019b9",
                "name": "Freelance",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-07 16:22:10",
                "created_at": "2019-11-07 16:22:10",
                "activities_ids": [
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca2efd74d5c58792a75ef",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcbf60d74d5c595a5ddaa2",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc612d74d5c5992036512",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcabd6d74d5c58ba68a202",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcac11d74d5c58b04f8152",
                    "5dbca36dd74d5c586a2db2b6",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dbcbd6ed74d5c5945364603",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbc9f56d74d5c58675c9632",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbca886d74d5c5895033482",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            },
            {
                "_id": "5dc5da61cdb0ad0c78db1782",
                "name": "Asistente",
                "event_id": "5db215419567225895c8d296",
                "updated_at": "2019-11-04 20:32:28",
                "created_at": "2019-11-04 20:32:28",
                "activities_ids": [
                    "5dbcbd3fd74d5c593042c314",
                    "5dbcca25d74d5c5992036516",
                    "5dc6f312d74d5c7aba68a913",
                    "5dc6ef30d74d5c7a6f661e22",
                    "5dc6f88dd74d5c7aef7a3d52",
                    "5dbc99bad74d5c5822693842",
                    "5dbc9d25d74d5c584a0256a4",
                    "5dbca3d5d74d5c586a2db2b7",
                    "5dbca411d74d5c58792a75f0",
                    "5dbca740d74d5c58946361d2",
                    "5dbca814d74d5c588b53b882",
                    "5dbca999d74d5c5895033483",
                    "5dbcaa29d74d5c58a07018c2",
                    "5dbcac40d74d5c58a72ac0d6",
                    "5dc3007bd74d5c622e766bbd",
                    "5dbcada6d74d5c58ba68a204",
                    "5dbcac70d74d5c58b04f8153",
                    "5dbcb1afd74d5c5904212903",
                    "5dbcb1f8d74d5c58ff3928b3",
                    "5dbcbfafd74d5c596603c4c2",
                    "5dbcbc8ad74d5c593042c313",
                    "5dbcc5b1d74d5c5984427422",
                    "5dbcc5ddd74d5c598928ca22",
                    "5dbcc6d6d74d5c5992036513",
                    "5dbcc821d74d5c5992036514",
                    "5dbcc847d74d5c598928ca24",
                    "5dbcc86fd74d5c5984427426",
                    "5dc62966d74d5c76ad539983",
                    "5dbcab9cd74d5c58a72ac0d5",
                    "5dbcb301d74d5c58ff3928b4",
                    "5dc6f308d74d5c7aba68a912",
                    "5dc61d2ed74d5c766b4e4842",
                    "5dc6f82bd74d5c7aee3909d2",
                    "5dc615fdd74d5c75fc40b294",
                    "5dc61ec3d74d5c766b4e4847",
                    "5dbca233d74d5c58792a75ee",
                    "5dbcc89bd74d5c5992036515",
                    "5dbcc66ad74d5c598928ca23",
                    "5dbc9c65d74d5c58532d6c92",
                    "5dc33941d74d5c63ff2ad879",
                    "5dc566dcd74d5c6ef21e8992",
                    "5dbcc9a3d74d5c5984427427"
                ]
            }
        ]
    }
]
```

### HTTP Request
`GET api/events/{event_id}/activities`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `event_id` |  required  | id of the event to which the activities belong

<!-- END_4b74c69334a9fda83ca783df8b478e89 -->

<!-- START_6828bf55010cf5e51d8e53e912e57eef -->
## _store_: Create a new activity

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/events/dolor/activities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"saepe","subtitle":"nihil","space_id":"praesentium","image":"sed","description":"ut","capacity":13}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/events/dolor/activities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "saepe",
    "subtitle": "nihil",
    "space_id": "praesentium",
    "image": "sed",
    "description": "ut",
    "capacity": 13
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
    `name` | string |  required  | 
        `subtitle` | string |  required  | 
        `space_id` | string |  required  | 
        `image` | string |  optional  | 
        `description` | string |  required  | 
        `capacity` | integer |  required  | 
    
<!-- END_6828bf55010cf5e51d8e53e912e57eef -->

<!-- START_7b617dbab4e1f0b404e75ddfd19c8fe7 -->
## _show_: View information on a specific activity

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/events/1/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/events/1/activities/1"
);

let headers = {
    "Content-Type": "application/json",
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
    "http://localhost:8000/api/events/et/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/events/et/activities/1"
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
    "http://localhost:8000/api/events/voluptas/activities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/events/voluptas/activities/1"
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

#ActivityAssistant


<!-- START_eca15b751105fbb8f3ff752e6f4428a7 -->
## _index_: List of the activity_assitans

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/events/dicta/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"activity_id":"animi","user_id":"ipsa"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/events/dicta/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_id": "animi",
    "user_id": "ipsa"
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
{
    "_id": "5f6250852399da563131d375",
    "user_id": "5b89bf37c065864f7b5bf80e",
    "activity_id": "5f613dc32bda9a05204b63b6",
    "event_id": "5ea23acbd74d5c4b360ddde2",
    "updated_at": "2020-09-16 17:51:01",
    "created_at": "2020-09-16 17:51:01",
    "user": {
        "_id": "5b89bf37c065864f7b5bf80e",
        "email": "correo@mocionsoft.com",
        "name": "User Name"
    }
}
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
    "http://localhost:8000/api/events/magni/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"omnis","activity_id":"et"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/events/magni/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "omnis",
    "activity_id": "et"
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

<!-- START_515690ef29735a9f74bb254e7af30f8b -->
## _meIndex_: list of registered activities of the logged-in user

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/me/events/corrupti/activities_attendees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/me/events/corrupti/activities_attendees"
);

let headers = {
    "Content-Type": "application/json",
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

#Event


<!-- START_742a1cbd4a274c7269f0db99a704ff41 -->
## _index:_ Listing of all events

This method allows dynamic querying of any property through the URL using FilterQuery services for example : Exmaple: [{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/events?filteredBy=%5B%7B%22id%22%3A%22event_type_id%22%2C%22value%22%3A%5B%225ea6df83cf57da4a52065562%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/events"
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
    "_id": "5e9cae6bd74d5c2f5f0c61f2",
    "name": "Edificio Izarra 3",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "https:\/\/storage.googleapis.com\/herba-images\/evius\/events\/TdFX2bAdJenUnFoF9EwyH2LQYq8Fnk3yqUhwgQVQ.jpeg",
    "venue": "Bogotá",
    "location": [],
    "visibility": "PUBLIC",
    "user_properties": [
        {
            "name": "nombredeempresa",
            "mandatory": true,
            "visibleByContacts": false,
            "visibleByAdmin": false,
            "label": "Nombre de empresa",
            "description": null,
            "order_weight": "12"
        }
    ],
    "author_id": "5e9caaa1d74d5c2f6a02a3c2",
    "organizer_id": "5e9caaa1d74d5c2f6a02a3c3",
    "event_type_id": "5bf47226754e2317e4300b6a",
    "updated_at": "2020-10-21 14:06:19",
    "created_at": "2020-04-19 20:02:51"
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
    "http://localhost:8000/api/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\"Programming course\"","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"laborum","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\"Programming course\"",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "laborum",
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
    -G "http://localhost:8000/api/me/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/me/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
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
    "http://localhost:8000/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\"Programming course\"","datetime_from":"2020-10-16 18:00:00","datetime_to":"2020-10-16 21:00:00","picture":"aut","visibility":"PUBLIC","user_properties":[],"author_id":"5e9caaa1d74d5c2f6a02a3c3","event_type_id":"5bf47226754e2317e4300b6a"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/user/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\"Programming course\"",
    "datetime_from": "2020-10-16 18:00:00",
    "datetime_to": "2020-10-16 21:00:00",
    "picture": "aut",
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
    -G "http://localhost:8000/api/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/user/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
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
    -G "http://localhost:8000/api/users/qui/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/qui/events"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/users\/qui\/events?page=1",
        "last": "http:\/\/localhost\/api\/users\/qui\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/users\/qui\/events",
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
    -G "http://localhost:8000/api/organizations/praesentium/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/organizations/praesentium/events"
);

let headers = {
    "Content-Type": "application/json",
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
        "first": "http:\/\/localhost\/api\/organizations\/praesentium\/events?page=1",
        "last": "http:\/\/localhost\/api\/organizations\/praesentium\/events?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": null,
        "last_page": 1,
        "path": "http:\/\/localhost\/api\/organizations\/praesentium\/events",
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
    -G "http://localhost:8000/api/events/1/eventusers?filteredBy=%5B%7B%22id%22%3A%22event_type_id%22%2C%22value%22%3A%5B%225bb21557af7ea71be746e98x%22%2C%225bb21557af7ea71be746e98b%22%5D%7D%5D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/events/1/eventusers"
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

<!-- START_eed9d2ac9ae0f6e3669f6613fa1d351c -->
## _createUserAndAddtoEvent_:create user and add it to an event

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/events/ullam/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"modi","name":"consectetur","password":"facere","other_params,":{"":{"":{"":"voluptates"}}}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/events/ullam/eventusers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "modi",
    "name": "consectetur",
    "password": "facere",
    "other_params,": {
        "": {
            "": {
                "": "voluptates"
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

<!-- START_1b30bab6e9ef7c312e1ee78d85ac2dfa -->
## _meInEvent_: user information logged into the event

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/me/events/repudiandae/eventusers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/me/events/repudiandae/eventusers"
);

let headers = {
    "Content-Type": "application/json",
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

#User


<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## _index_: list of registered users

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users"
);

let headers = {
    "Content-Type": "application/json",
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
    "_id": "5b98395ec06586792153148b",
    "email": "otro@gmail.com",
    "name": "otro",
    "lastname": "usuario",
    "departamente": "titirib",
    "uid": "otro@gmail.com",
    "updated_at": "2018-09-11 21:53:34",
    "created_at": "2018-09-11 21:53:34"
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## _store_: Create new user.

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"repellat","name":"odit"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "repellat",
    "name": "odit"
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
        `name` | string |  required  | 
    
<!-- END_12e37982cc5398c7100e59625ebb5514 -->

#general


<!-- START_5311daf9c1595e9d9e1570e62c42f532 -->
## Display a listing of the resource.

muestra los usuarios de una organización

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/organizations/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/organizations/1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
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
    "http://localhost:8000/api/organizations/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/organizations/1/users"
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

<!-- START_739442a2495f200cd4de63da705ac98e -->
## Create model_has_role
role_id
model_id (user_id)
event_id

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/me/contributors/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/me/contributors/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
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

<!-- START_3f1753b7a14e74ef0bc952ba0be6a52a -->
## Show the organiser events page

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/organiser/1/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/organiser/1/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
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


