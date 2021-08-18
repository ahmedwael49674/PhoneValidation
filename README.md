
## PHP Task:
1. Create a single page application that uses the database provided (SQLite 3) to list and categorize country phone numbers.
2. Phone numbers should be categorized by country, state (valid or not valid), country code and number.
3. The page should render a list of all phone numbers available in the DB. It should be possible to filter by country and state.
4. provided with task `database.sqlite` db has one table customers.

```
 customers: id, name, phone
```

4. country codes stored with the phone ex.  .

```
 (212) 6007989253
```

5. provided with task the valid regex for each country code ex 

```
Cameroon | Country code = +237 | regex = \(237\)\ ?[2368]\d{7,8} $
````


## Live version
https://serverlivetest49674.000webhostapp.com/

## Description
* First Validate given parameters using `FormValidation` then `CustomersController` passes the request to `CustomerService` which responsable to handle customers business logic.

* Retriving the customers using `customerRepository` which responsable for database layer and return all customers and apply country filter over the database layer if country code query parameter provided.

* Now for unfiltered customers the state and country sould be added to the cutomer objcet and for the filtered ones it already has the country but the state still needed this can be acheived by appling the provided regex to each customer seperatly.

* Using abstract factory design pattern each customer could have the country and state to achive this all the countries was created sepereted over classess and use `CountryFactory` to create an country object passed on phone number.

* Now each customer has the state and country attributes and the coutry filter appiled the last step is to filter customers by state if state query parameter provided.

* Replacing the database never been easier by depending on one interface and bind the right repository, using this approch replacing sqlite with mysql for example is easy need only to crate new repository `MysqlCustomerRepository` for example which impelemnts `CustomerInterface` and ask `AppServiceProvided` to bind 
`MysqlCustomerRepository` instead of `SqliteCustomerRepository`. 

## How to run
1. Clone the project.
2. Run `composer install`.
3. Set up .env (copy .env.example file to .env)
4. Run `php -S localhost:8000 -t public`

## API's
1. GET `/api/customers/` : index all customers in database with computed attribute state.
* Could filter by country by adding query param country={countryCode} .
* Could filter by state by adding query param state={true} .

## Used technologies
1. Lumen 7
2. Vue.js 

