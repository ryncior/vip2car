
1.- git clone del proyecto

2.- composer install

3.- php artisan key:generate

4.- php artisan migrate

5.- crea base de datos vip2car e ejecutar los siguientes inserts de la encuesta basica;

create database vip2car;
use vip2car;

INSERT INTO questions (survey_id, question_text, type, created_at, updated_at)
VALUES
(1, '¿Cómo calificaría la calidad del servicio recibido?', 'multiple_choice', NOW(), NOW()),
(1, '¿El tiempo de entrega de su vehículo fue adecuado?', 'multiple_choice', NOW(), NOW()),
(1, '¿Recomendaría nuestro taller a otras personas?', 'multiple_choice', NOW(), NOW()),
(1, '¿Qué aspectos considera que podríamos mejorar?', 'text', NOW(), NOW());

-- Opciones para pregunta 1 (id 1)
INSERT INTO choices (question_id, choice_text, created_at, updated_at)
VALUES
(1, 'Excelente', NOW(), NOW()),
(1, 'Bueno', NOW(), NOW()),
(1, 'Regular', NOW(), NOW()),
(1, 'Malo', NOW(), NOW());

-- Opciones para pregunta 2 (id 2)
INSERT INTO choices (question_id, choice_text, created_at, updated_at)
VALUES
(2, 'Sí, fue rápido', NOW(), NOW()),
(2, 'Aceptable', NOW(), NOW()),
(2, 'Tardó más de lo esperado', NOW(), NOW());

-- Opciones para pregunta 3 (id 3)
INSERT INTO choices (question_id, choice_text, created_at, updated_at)
VALUES
(3, 'Definitivamente sí', NOW(), NOW()),
(3, 'Tal vez', NOW(), NOW()),
(3, 'No lo recomendaría', NOW(), NOW());

INSERT INTO responses (survey_id, submitted_at)
VALUES (1, NOW());

-- Para respuesta_id 1 (asociado a la respuesta creada arriba)
-- Contestando las preguntas de opción múltiple
INSERT INTO answers (response_id, question_id, choice_id, answer_text, created_at, updated_at)
VALUES
(1, 1, 1, NULL, NOW(), NOW()), -- Excelente en calidad del servicio
(1, 2, 2, NULL, NOW(), NOW()), -- Aceptable en tiempo de entrega
(1, 3, 1, NULL, NOW(), NOW()); -- Definitivamente sí recomendaría
