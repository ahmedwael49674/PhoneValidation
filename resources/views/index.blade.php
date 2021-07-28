<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-2">
        <div id="app">

            <h1>Phone numbers</h1>

            <div class="mt-3 row">
                <div class="col">

                    <select class="custom-select" id="country" onchange="filter()">
                        <option value="null" selected>Select Country</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Uganda">Uganda</option>
                    </select>
                </div>

                <div class="col">
                    <select class="custom-select" id="isVaild" onchange="filter()">
                        <option value="null" selected>Vlidate Phone number</option>
                        <option value="1">Valid</option>
                        <option value="0">Not valid</option>
                    </select>
                </div>

                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Country</th>
                            <th scope="col">State</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone num.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->country}}</td>
                            <td>{{$customer->state ? "OK" : "NOK"}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->phone}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
{{--{{$customers->links()}}--}}

</body>
<script>
    function filter(){
        let country = document.getElementById('country').value;
        let isVaild = document.getElementById('isVaild').value;
        
    }

</script>

</html>