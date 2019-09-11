<html>
    <!--    Keep this page lean as possible.-->
    <head>
        <title>
            Ticket(s)
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
<style>

</style>
        <style>
body{

    background-size:cover;
    height:100%;
    width:100%;
    margin:0;
    padding:0;
    /*font-family: "Verdana", "Geneva","Sans serif","Open Sans", "Titillium","Oswald";*/
   /*font-family:Arial, Helvetica, sans-serif;*/
    }

.imagen{
    width:100%;
    height:700px;
    position:absolute;
    top:0px;
    bottom:0px; 


}

/*
.containing-table {
    display: table;
    width: 100%;
    height: 100%; 
    border: 1px dotted blue;
}
.centre-align {
    padding: 10px;
    border: 1px dashed black;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
    width:60%;
    font-size:4em;
}
.content {
    width: 60%;
    height: 70%;
    background-color: blue;
    display: inline-block;
    vertical-align: middle;
}*/

        </style>


 

    </head>
    <body style="background-color: #FFFFFF; font-family: Arial, Helvetica, sans-serif;">
        
       
    <img class="imagen" src="{{$image}}" />        

<div class="containing-table">

    <div class="centre-align">{{ $content }}
    </div>
</div>
    </body>
</html>

