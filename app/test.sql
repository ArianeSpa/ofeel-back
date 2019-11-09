UPDATE `user`
LEFT JOIN `activity`
ON `user.activity_id` = `activity.id`
SET `gender` = 'femme',
    `age` = 32,
    `height` = 167,
    `weight` = 67,
    `basal_metabolic_rate` = 890,
    `energy_expenditure` = 1300,
    `updated_at` = CURRENT_TIMESTAMP,
    `activity_id` = `activity.id`
WHERE `username` = 'ariane' AND `activity.activity_type` = 'Actif';

UPDATE user AS u, activity AS a
SET u.gender = 'femme',
    u.age = 32,
    u.height = 175,
    u.weight = 77,
    u.basal_metabolic_rate = 990,
    u.energy_expenditure = 1600,
    u.updated_at = CURRENT_TIMESTAMP,
    u.activity_id = a.id
WHERE u.username = 'user2' 
AND a.activity_type = 'Sédentaire';



UPDATE user, activity
SET user.activity_id=activity.id
WHERE activity.activity_type LIKE 'Actif'
AND user.username ='ariane';



DELETE FROM user_choose_diet
WHERE user_id IN
(
    SELECT user.id
    FROM user
    WHERE user.username = 'ariane'
);
INSERT INTO user_choose_diet (user_id, diet_id)
    SELECT user.id, diet.id
    FROM user, diet
    WHERE user.username = 'ariane' AND diet.diet_type = 'Vegan';