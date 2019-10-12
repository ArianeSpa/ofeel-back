-- Afficher tous les aliments sans gluten
SELECT *, diet.id as 'diet_id'
FROM food
LEFT JOIN food_match_diet
ON food.id = food_match_diet.food_id
LEFT JOIN diet
ON food_match_diet.diet_id = diet.id
WHERE
diet_id = '1';

-- Afficher tous les aliments sans lactose
SELECT *, diet.id as 'diet_id'
FROM food
LEFT JOIN food_match_diet
ON food.id = food_match_diet.food_id
LEFT JOIN diet
ON food_match_diet.diet_id = diet.id
WHERE
diet_id = '2';

-- Afficher tous les aliments vegan
SELECT *, diet.id as 'diet_id'
FROM food
LEFT JOIN food_match_diet
ON food.id = food_match_diet.food_id
LEFT JOIN diet
ON food_match_diet.diet_id = diet.id
WHERE
diet_id = '3';

-- -- Afficher les régimes alimentaires de l'utilisateur
-- -- Affiche autant de lignes par utilisateur qu'il ne possède de diet
-- SELECT *
-- FROM user
-- INNER JOIN user_choose_diet
-- ON user.id = user_choose_diet.user_id
-- INNER JOIN diet
-- ON user_choose_diet.diet_id = diet.id
-- WHERE
-- user.username = 'user1';

-- Afficher les infos de l'utilisateur
-- Affiche une seule ligne par utilisateur et une entrée "diet" qui reprend la liste complète avec séparateur
SELECT
    user.id,
    user.username,
    user.email,
    user.password,
    user.age,
    user.weight,
    user.height,
    user.gender,
    user.basal_metabolic_rate,
    user.energy_expenditure,
    user.daily_calories,
    user.breakfast_dinner_calories,
    user.lunch_calories,
    user.breakfast_dinner_carbo_quantity,
    user.lunch_carbo_quantity,
    user.breakfast_dinner_prot_quantity,
    user.lunch_prot_quantity,
    user.breakfast_dinner_fat_quantity,
    user.lunch_fat_quantity,
    GROUP_CONCAT(`diet_type` SEPARATOR ", ") AS diet,
    goal.goal_type AS goal, 
    activity.activity_type AS activity
FROM user
LEFT JOIN user_choose_diet
ON user.id = user_choose_diet.user_id
LEFT JOIN diet
ON user_choose_diet.diet_id = diet.id
LEFT JOIN goal
ON user.goal_id = goal.id
LEFT JOIN activity
ON user.activity_id = activity.id
GROUP BY user.id