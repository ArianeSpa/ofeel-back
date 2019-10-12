# DICTIONNAIRE DE DONNES DE L'API

## USER
| Champ | Type | Spécificités | Commentaire | Entité |
|--|--|--|--|--|
| id | INT | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | identifiant de l'utilisateur | User |
| username| VARCHAR(64) | NOT NULL, UNIQUE | pseudo de l'utilisateur créé à la création de compte utilisé pour connexion | User |
| email | VARCHAR(64) | NOT NULL, UNIQUE | email de l'utilisateur utilisé pour inscription | User |
| password | VARCHAR(64) | NOT NULL | mot de passe de l'utilisateur créé à la création de compte utilisé pour la connexion | User |
| age | TINYINT | NULL, UNSIGNED | age de l'utilisateur défini par l'utilisateur dans son dashboard MyFeeling | User |
| height | TINYINT | NULL, UNSIGNED | taille défini par l'utilisateur dans son dashboard MyFeeling | User |
| weight | TINYINT | NULL, UNSIGNED | poids défini par l'utilisateur dans son dashboard MyFeeling | User |
| gender | VARCHAR(5) | NULL | sexe défini par l'utilisateur dans son dashboard MyFeeling | User |
| goal_id | entity | NULL | objectif défini par l'utilisateur dans son dashboard Goal | Goal |
| activity_id | entity | NULL | activité défini par l'utilisateur dans son dashboard MyFeeling | Activity |
| diet_id | entity | NULL | régime alimentaire défini par l'utilisateur dans son dashboard Goal | Diet |
| basal_metabolic_rate | SMALLINT | NULL, UNSIGNED | metabolisme de base de l'utilisateur calculé en fonction des données enregistrées | User |
| energy_expenditure  | SMALLINT | NULL, UNSIGNED | dépense calorique journalière calculé en fonction des données utilisateur | User |
| daily_calories | SMALLINT | NULL, UNSIGNED | objectif calorique journaleir calculé en fonction des données utilisateur | User |
| breakfast_dinner_calories | SMALLINT | NULL, UNSIGNED | objectif calorique du petit dejeuner et diner calculé en fonction des données utilisateur | User |
| lunch_calories | SMALLINT | NULL, UNSIGNED | objectif calorique au déjeuner calculé en fonction des données utilisateur | User |
| breakfast_dinner_carbo_quantity | SMALLINT | NULL, UNSIGNED | quantité de glucides au petit dejeuner et diner calculé en fonction des données utilisateur | User |
| lunch_carbo_quantity | SMALLINT | NULL, UNSIGNED | quantité de glucides au déjeuner calculé en fonction des données utilisateur | User |
| breakfast_dinner_prot_quantity | SMALLINT | NULL, UNSIGNED | quantité de proteines au petit dejeuner et diner calculé en fonction des données utilisateur | User |
| lunch_prot_quantity | SMALLINT | NULL, UNSIGNED | quantité de proteines au déjeunercalculé en fonction des données utilisateur | User |
| breakfast_dinner_fat_quantity | SMALLINT | NULL, UNSIGNED | quantité de lipides au petit dejeuner et diner calculé en fonction des données utilisateur | User |
| lunch_fat_quantity | SMALLINT | NULL, UNSIGNED | quantité de lipides au déjeuner calculé en fonction des données utilisateur | User |
| token | VARCHAR(64) | NULL | token de l'utilisateur à la connexion. Voir avec jwt, unique à chaque connexion | User |
| created_at | DATETIME | NOT NULL, DEFAULT CURRENT_TIMESTAMP | La date de création du profil | User
| updated_at | DATETIME | NULL | La date de la dernière mise à jour du profil | User

## GOAL
| Champ | Type | Spécificités | Commentaire | Entité |
|--|--|--|--|--|
| id | INT | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | identifiant de l'objectif | Goal |
| goal_type | VARCHAR(64) | NOT NULL | objectif visé par l'utilisateur | Goal |
| carbohydrate_proportion | FLOAT(4,3) | NOT NULL, UNSIGNED | proportion de glucides liée à l'objectif à appliquer pour définir les Quantité de glucides pour les repas | Goal |
| protein_proportion | FLOAT(4,3) | NOT NULL, UNSIGNED| Proportion de proteines liée à l'objectif à appliquer pour définir les Quantité de glucides pour les repas | Goal |
| fat_proportion | FLOAT(4,3) | NOT NULL, UNSIGNED | Proportion de lipides liée à l'objectif à appliquer pour définir les Quantité de glucides pour les repas | Goal |
| created_at | DATETIME | NOT NULL, DEFAULT CURRENT_TIMESTAMP | La date de création de l'objectif | Goal
| updated_at | DATETIME | NULL | La date de la dernière mise à jour de l'objectif | Goal

## ACTIVITY
| Nom | Type | Spécificités | Commentaire | Entité |
|--|--|--|--|--|
| id | TINYINT | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | identifiant de l'activité | Activity |
| activity_type | VARCHAR(42) | NOT NULL | type de l'activité | Activity |
| factor | FLOAT(4,3) | NOT NULL, UNSIGNED | à appliquer au metabo de base pour calculer la dépense énergétique journalière | Activity |
| created_at | DATETIME | NOT NULL, DEFAULT CURRENT_TIMESTAMP | La date de création de l'activité | Activity
| updated_at | DATETIME | NULL | La date de la dernière mise à jour de l'activité | Activity

## DIET
| Nom | Type | Spécificités | Commentaire | Entité |
|--|--|--|--|--|
| id | TINYINT | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | identifiant du régime alimentaire | Diet |
| diet_type | VARCHAR(15) | NOT NULL | Type de régime : vegan, sans lactose ou sans gluten | Diet |
| created_at | DATETIME | NOT NULL, DEFAULT CURRENT_TIMESTAMP | La date de création du régime | Diet
| updated_at | DATETIME | NULL | La date de la dernière mise à jour du régime | Diet

## FOOD
| Nom | Type | Spécificités | Commentaire | Entité |
|--|--|--|--|--|
| id | INT | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | identifiant du régime alimentaire | Food |
| food_name | VARCHAR(64) | NO NULL | nom de l'aliment | Food |
| food_energy | SMALLINT | NOT NULL, UNSIGNED | Nombre de calories pour 100g | Food |
| food_fat | FLOAT(4,1) | NOT NULL, UNSIGNED | Quantité de lipides pour 100g | Food |
| food_carbo | FLOAT(4,1) | NOT NULL, UNSIGNED | Quantité de glucides pour 100g | Food |
| food_prot | FLOAT(4,1) | NOT NULL, UNSIGNED | Quantité de protéines pour 100g | Food |
| food_category | VARCHAR(8) | NOT NULL | Catégorie d'aliment : glucide lipide ou proteine | Food |
| food_diet | entity | NULL | régime alimentaire adapté : vegan, sans lactose, sans gluten | Diet |
| created_at | DATETIME | NOT NULL, DEFAULT CURRENT_TIMESTAMP | La date de création de l'aliment | Food
| updated_at | DATETIME | NULL | La date de la dernière mise à jour de l'aliment | Food
