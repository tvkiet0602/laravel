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

        #submit {
            background-color: #718096;
            color: #ffffff;
        }

        #cancel {
            text-align: center;
            text-decoration: none;
            background-color: beige;
        }
        label{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="container">
    <h1>Edit Customers</h1>
    <form method="POST">
        <table>
            {{--            @foreach($editCustomers as $key => $item)--}}
            <tr>
                <td>
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{$editCustomers['name']}}">
                </td>

                <td>
                    <label>Gender</label>
                    <select class="form-control" name="gender" value="{{$editCustomers['gender']}}">
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{$editCustomers['email']}}">
                </td>

                <td>
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="{{$editCustomers['username']}}">
                </td>
            </tr>
            @foreach ($editAddress as $key => $address)
                <tr>
                    <td>
                        @if($address->typeAddress_id == 1)
                            <label>Default Address</label>
                            <a href="{{route('customers.address', ['id'=>$id])}}" type="button" class="btn-link btn-lg">+</a>
{{--                        @elseif($address->typeAddress_id == 2)--}}
{{--                            <label>Permanent Address</label>--}}
{{--                        @elseif($address->typeAddress_id == 3)--}}
{{--                            <label>Company Address</label>--}}
{{--                        @elseif($address->typeAddress_id == 4)--}}
{{--                            <label>Business Address</label>--}}

                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        <input type="text" class="form-control" name="number" placeholder="Input number address"
                               value="{{$address->number}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="street" placeholder="Input street address"
                               value="{{$address->street}}">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" class="form-control" name="district" placeholder="Input district address"
                               value="{{$address->district}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="city" placeholder="Input city address"
                               value="{{$address->city}}">

                    </td>
                </tr>
                @else
                @endif
            @endforeach
            <tr>
                <?php echo csrf_field(); ?>
                <td>
                    <br><a href="{{route('customers.index')}}" class="form-control" id="cancel">Cancel</a>
                </td>
                <td>
                    <br><input type="submit" class="form-control" id="submit" value="Update">
                </td>
            </tr>
            {{--            @endforeach--}}
        </table>
    </form>
</div>
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
