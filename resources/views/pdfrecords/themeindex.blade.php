<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titles</title>
    <style>
        #doc{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #doc td, #emp th{
            border: 1px solid #ddd;
            padding: 8px;
        }
        #doc tr:nth-child(even){
            background-color: aquamarine;
        }
        #doc th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ddd;
        }
        .pdf-btn{
        margin-top:30px;
        text-align: center;

    }
    .btn-primary{
            color: black;
            background-color: white;
            border-color: aquamarine;
            }
            .btn-primary:hover{
            color:white;
            background-color: aquamarine;
            border-color: white;
            }
    </style>
</head>
<body>
    <table id = "doc">
        <thead>
            <tr>
                        <th>ID</th>
                        <th>Research Theme</th>
                        <th>Description</th>



            </tr>
        </thead>
        <tbody>
            @foreach ($themes as $theme)
        <tr>
            <td>{{ $theme->id }}</td>
            <td>{{ $theme->theme }}</td>
            <td>{{ $theme->description }}</td>


        </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
