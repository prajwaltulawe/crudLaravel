<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>ViewData</title>
</head>
<style>
    #myTable, html {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #myTable td,
    #myTable th,
    input {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 1rem;
    }

    #myTable tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #myTable tr:hover {
        background-color: #ddd;
    }

    #myTable th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #1d332ab7;
        color: white;
    }

    button, a{
        background-color: rgb(255, 255, 255);
        border: none;
        font-family: Arial, Helvetica, sans-serif;
        padding: 2% 10%;
        margin: 0 0 0 1%;
        cursor: pointer;
        font-size: 1rem;
        text-decoration: none;
    }
    
    a{
        color: black;
    }
    
    #name-btn{
        padding: 1% 1%;
    }

    .add{
        margin: 3% 0 0 0;
    }
</style>

<body style="width: 70%; margin: 5% auto">
    <table id="myTable" class="display nowrap dataTable dtr-column">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Inserted At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todoArr as $data)
            <tr>
                <td>
                    <form action="update" method="post" id="update{{$data->id}}"> @csrf
                        <input type="text" name="id" id="{{$data->id}}" value="{{$data->id}}" readonly="true" size="1">
                </td>
                <td>    <input type="text" name="name" value="{{$data->name}}"></td>
                <td>    {{$data->created_at}}</td>
                <td>    {{$data->updated_at}}</td>
                <td>
                        <a href="delete/{{$data->id}}">Delete</a>
                        <button type="submit" form="update{{$data->id}}"> Update</button>
                    </form>               
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="add" method="post" class="add">
        @csrf
        <table id="myTable" class="display nowrap dataTable dtr-column">
            <thead>
                <tr>
                    <th>Name : </th>
                    <th><input type="text" name="name" id="name" length="200"> <button type="submit" id="name-btn">Add Record</button></th>
                </tr>
            </thead>
        </table>
    </form>
</body>

<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
<script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js'></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>