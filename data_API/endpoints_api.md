# Documentation de l'API

| Endpoint | Méthode HTTP | Donnée(s) | Description |
|--|--|--|--|
| `/food` | GET | - | Récupération des données des aliments |
| `/diet` | GET | - | Récupération des données des régimes alimentaires |
| `/goal` | GET | - | Récupération des données des objectifs |
| `/activity` | GET | - | Récupération des données des activités |
| `/user/add` | POST | username, email, password | Ajouter un nouvel utilisateur |
| `/user/[id]` | GET | - | Récupération des données de l'utilisateur dont l'id est fourni |
| `/user/[id]/update` | POST | goal, activity, diet, ... | Modification des données de l'utilisateur dont l'id est fourni |


# URL

## Partie static

- http://ofeel.local

## Partie API

- /api

## Exemple d'url complete avec endpoint

- http://ofeel.local/api/food
