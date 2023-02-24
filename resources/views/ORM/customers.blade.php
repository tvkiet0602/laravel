<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Customers</title>
    <style>
        svg {
            font-size: 20px;
            width: 40px;
            height: 40px;

        }
    </style>
</head>
<body>
<h2>Customers</h2>
<a href="{{route('customers.add')}}" type="button" class="btn btn-primary">Add Customer</a>
<table class="table table-bordered">

    <tr style="text-align: left">
        <th style="width: 5%">STT</th>
        <th style="width: 15%">Full_Name</th>
        <th style="width: 5%">Gender</th>
        <th style="width: 15%">Username</th>
        <th style="width: 20%">Address</th>
        <th style="width: 20%">Email</th>
        <th style="width: 10%">Creat_at</th>
        <th></th>
    </tr>
    @foreach($cus as $key => $item)
        {{--        @foreach($types as $default)--}}
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->gender}}</td>
            <td>{{$item->username}}</td>

            <td>
                @foreach ($item->address as $address)
                    {{$address->number . ', ' . $address->street . ', ' . $address->district . ', ' . $address->city}}
                @endforeach
            </td>

            <td>{{$item->email}}</td>
            <td></td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('customers.edit', ['id'=>$item->id])}}">Edit</a>
                        <a onclick="return confirm('Are you want to delete this user?')" class="dropdown-item"
                           href="{{route('delete', ['id'=>$item->id])}}">Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        {{--        @endforeach--}}
    @endforeach
</table>
{!! $cus->links() !!}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>
</html>
