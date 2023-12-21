<?php

date_default_timezone_set('Europe/Moscow');

$connectCRM = new PDO('pgsql:host=127.0.0.1;dbname=crm', 'root', 'root');
$stmt = $connectCRM->prepare("SELECT nextval('lead_id_seq');");
$stmt->execute();
$lastId = $stmt->fetch()['nextval'];

$statement = $connectCRM->prepare('INSERT INTO lead (id,name,email,phone,funnel_id,utm_source,utm_medium,utm_campaign,client_id,created_at,updated_at)
                                  VALUES (:id,:name,:email,:phone,:funnel_id,:utm_source,:utm_medium,:utm_campaign,:client_id,:created_at,:updated_at)');
$statement->bindValue(':id', $lastId);
$statement->bindValue(':name', $_POST['name']);
$statement->bindValue(':email', $_POST['email']);
$statement->bindValue(':phone', $_POST['phone']);
$statement->bindValue(':funnel_id', 4);
$statement->bindValue(':utm_source', $_POST['utm_source']);
$statement->bindValue(':utm_medium', $_POST['utm_medium']);
$statement->bindValue(':utm_campaign', $_POST['utm_campaign']);
$statement->bindValue(':client_id', $_POST['client_id']);
$statement->bindValue(':created_at', date('Y-m-d H:i:s'), time());
$statement->bindValue(':updated_at', date('Y-m-d H:i:s'), time());
$result = $statement->execute();
file_put_contents(__DIR__.'/test.log', json_encode($statement->errorInfo()), FILE_APPEND);

header('Location: https://audit.modernerp.ru/thx/');
