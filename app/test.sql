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

UPDATE user
LEFT JOIN activity
ON user.activity_id = activity.id
SET `gender` = 'femme',
    `age` = 32,
    `height` = 167,
    `weight` = 67,
    `basal_metabolic_rate` = 890,
    `energy_expenditure` = 1300,
    user.updated_at = CURRENT_TIMESTAMP,
    activity_id = activity.id
WHERE `username` = 'ariane' AND activity.activity_type = 'Actif';

UPDATE user
LEFT JOIN activity
ON user.activity_id = activity.id
SET `gender` = 'femme',
    `age` = 33,
    user.updated_at = CURRENT_TIMESTAMP,
    activity.id = user.activity_id,
WHERE `username` = 'ariane' AND activity.activitytype='Actif';