cp .env.example .env

composer install

composer require filament/filament:"^3.2" -W

php artisan filament:install --panels

php artisan migrate

php artisan make:filament-user

php artisan shield:install --fresh


php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
//that is defined in migration table

INSERT INTO `users` (id,name,email, email_verified_at,password,remember_token,created_at,updated_at)
 VALUES 
(1, 'Admin', 'adminccis@carsu.edu.ph', NULL, '$2y$12$nBNZh1fF.PrOo2HaD.grm.dX5VhycO1Fmyob5QA3W8mYGNft5AZ4y', NULL, '2024-07-19 16:04:31', '2024-07-19 16:04:31'),
(2, 'Elbert Moyon', 'elbertmoyon@carsu.edu.ph', NULL, '$2y$12$WUDmiSYw2Mbt7dF9IJhKKOmrgYJLAX21Gz6SmPDHyDffeTEFZuQiO', NULL, '2024-07-19 16:04:31', '2024-07-19 16:04:31'),
(3, 'Claire Nakila', 'clairenakila@carsu.edu.ph', NULL, '$2y$12$6GDtTjmL2we0tvMPMXTqMu1.i.LoV6fBXi4t5VT4xBfTSzSWKzCHC', NULL, '2024-07-19 16:04:31', '2024-07-19 16:04:31'),
(4, 'Shane Nardo', 'shanenardo@carsu.edu.ph', NULL, '$2y$12$LVjpeSMYrq16.bLRmpGfL.xcGKCK7jUPWigN2CMRAoC90Ou5zGdnK', NULL, '2024-07-19 16:04:31', '2024-07-19 16:04:31');

insert into `categories`(id, description)
values
(1,'Mouse'),
(2,'Monitor'),
(3,'System Unit'),
(4,'Keyboard');

INSERT INTO `roles` (
    `id`,
    `name`,
    `guard_name`,
    `created_at`,
    `updated_at`
) VALUES
    (3, 'Admin', 'web', '2024-07-31 14:42:18', '2024-07-31 14:42:18'),
    (4, 'Staff', 'web', '2024-07-31 14:42:18', '2024-07-31 14:42:18');


INSERT INTO `facilities` (
    `id`,
    `name`,
    `connection_type`,
    `facility_type`,
    `cooling_tools`,
    `floor_level`,
    `building`,
    `remarks`,
    `facility_img`,
    `created_at`,
    `updated_at`
) VALUES
    (1, 'CL1', 'Ethernet', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51'),
    (2, 'CL', 'Ethernet', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51'),
    (3, 'CL3', 'Ethernet', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51'),
    (4, 'CL4', 'WIFI', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51'),
    (5, 'CL5', 'Ethernet', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51'),
    (6, 'CL6', 'WIFI', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51'),
    (7, 'CL10', 'Ethernet', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51'),
    (8, 'NETLAB', 'Ethernet', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51'),
    (9, 'MSIT', 'WIFI', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51'),
    (10, 'MULTIMEDIA', 'WIFI', 'Computer Laboratory', 'Standing Aircon', '2', 'HIRAYA', NULL, 'facility/01J44GGSJ40ASXCHCZF4BEPHPA.jfif', '2024-07-31 13:43:51', '2024-07-31 13:43:51');

*************************************
