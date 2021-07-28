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

            <div class="mt-5 row">
                <div class="col">

                    <select class="custom-select" v-model="countryList">
                        <option value="null" selected>Select Country</option>
                        <option v-for="country in countries" v-bind:value="country.id">
                            @{{country.name}}
                        </option>
                    </select>
                </div>

                <div class="col">
                    <select class="custom-select" v-model="validatetyList">
                        <option value="null" selected>Vlidate Phone number</option>
                        <option value="1">Valid</option>
                        <option value="0">Not valid</option>
                    </select>
                </div>
                
                <table class="table mt-5" v-if="customers">
                    <thead>
                        <tr>
                            <th scope="col">Country</th>
                            <th scope="col">State</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone num.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="customer in customers">
                            <td>@{{customer.country}}</td>
                            <td>@{{customer.state ? "OK" : "NOK"}}</td>
                            <td>@{{customer.name}}</td>
                            <td>@{{customer.phone}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.7/vue.min.js"></script>
<script>
    const countries = [{
            id: 1,
            name: "Cameroon"
        }, {
            id: 2,
            name: "Ethiopia"
        }, {
            id: 3,
            name: "Morocco"
        }, {
            id: 3,
            name: "Mozambique"
        },
        {
            id: 3,
            name: "Uganda"
        }
    ];

    Vue.config.devtools = true
    var vm = new Vue({
        el: '#app',
        data: {
            countryList: null,
            validatetyList: null,
            customers: [],
        },
        methods: {
            fetchData(){
                fetch('{{url("api/customers")}}').then(response => response.json()).then(data => (this.customers = data));
            }
        },
        created() {
            this.fetchData();
        }
    });
</script>

</html>