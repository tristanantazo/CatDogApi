# CatDogApi
for test


# Docker setup
  1. Clone the repository.
  2. Run the docker application.
  3. In the Makefile, you will see the shortcut for the docker commands.
  4. Run "make build" - this will build the docker container.
  5. Access the laravel in http://localhost/


# Run
    1. After the docker setup, "make buid"
    2. Run "make bash"
    3. inside the docker terminal, run:
        "composer install"
        "npm install"
        "npm run dev"

    4. Access the site in http://localhost/
  
 
# API documentation
Note that you can test the api in postman

    1. GET http://localhost/api/v1/cats-and-dogs
```
- this api will return a json that consist of cats and dog

parameters: 
    page - page that want to retrieve
    limit - limit of that data per page

http://localhost/api/v1/cats-and-dogs?page=1&limit=20

result: 

{
  "page": 1,
  "limit": 20,
  "total_page_count": 12,
  "results": [
    {
      "weight": {
        "imperial": "7  -  10",
        "metric": "3 - 5"
      },
      "id": "abys",
      "name": "Abyssinian",
      "cfa_url": "http://cfa.org/Breeds/BreedsAB/Abyssinian.aspx",
      "vetstreet_url": "http://www.vetstreet.com/cats/abyssinian",
      "vcahospitals_url": "https://vcahospitals.com/know-your-pet/cat-breeds/abyssinian",
      "temperament": "Active, Energetic, Independent, Intelligent, Gentle",
      "origin": "Egypt",
        ....
}
```
    2. GET http://localhost/api/v1/dog/breeds/{breed?}
```
- this api will be return the json data for dogs

parameters:
    breed - id
    page - page that want to retrieve
    limit - limit of that data per page

sample call: 
    http://localhost/api/v1/dog/breeds/2
    http://localhost/api/v1/dog/breeds?page=1&limit=20
```
    3. GET http://localhost/api/v1/dog/images/{image_id}
```
- this api will be return the json data for dogs

parameters:
    image_id - reference_image_id

sample call: 
    http://localhost/api/v1/cat/images/0XYvRd7oD
```
    4. GET http://localhost/api/v1/cat/breeds/{breed?}
```
- this api will be return the json data for cats

parameters:
    breed - id
    page - page that want to retrieve
    limit - limit of that data per page

sample call: 
    http://localhost/api/v1/cat/breeds/abys
    http://localhost/api/v1/cat/breeds?page=1&limit=20
```
    5. GET http://localhost/api/v1/cat/images/{image_id}
```
- this api will be return the json data for cats

parameters:
    image_id - reference_image_id

sample call: 
    http://localhost/api/v1/cat/images/0XYvRd7oD
```
