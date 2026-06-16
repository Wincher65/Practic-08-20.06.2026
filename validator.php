<?php

$data = [
    'email' => "ivan2019@gmail.com",
    'password' => "07072008galy",
    'repit_password' => "07072008galy",
    'phone_number' => "88005553535",
    'name' => "Ivan",
    'came_from' => "others",
    'date_birth' => "2008-07-07",  // 16 лет (2008-2024 = 16)
];
function validateUserData($data) 
{
$errors=[];

if (empty($data['email'])) {
    $errors[] = "Email обязателен для заполнения";
} elseif (strpos($data['email'], '@') === false) {
    $errors['email'] = 'Email должен содержать символ "@"';
} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Неверный формат email";
}  elseif (strlen($data['email']) < 5) {
        $errors['email'] = "Email должен быть длиннее 5 символов";
}
    
if (empty($data['password'])) {
    $errors[] = "Пароль обязателен для заполнения";
} elseif (strlen($data['password']) < 8) {
    $errors[] = "Пароль должен содержать длиннее 8 символов";
} elseif (!preg_match('/[a-zA-Z]/', $data['password'])) {
        $errors['password'] = "Пароль должен содержать хотя бы одну букву";
} elseif (!preg_match('/[0-9]/', $data['password'])) {
        $errors['password'] = "Пароль должен содержать хотя бы одну цифру";
}

if (empty($data['repit_password'])) {
    $errors[] = "Повтор пароля обязателен для заполнения";
} elseif ($data['password'] !== $data['repit_password']) {
    $errors[] = "Пароли не совпадают";
}
    

if (empty($data['phone_number'])) {
    $errors['phone_number'] = "Номер телефона обязателен для заполнения";
} elseif (strlen($data['phone_number']) <= 5) {
    $errors['phone_number'] = "Номер телефона должен быть длиннее 5 символов";
} elseif (!preg_match('/^[0-9]+$/', $data['phone_number'])) {
    $errors['phone_number'] = "Номер телефона должен содержать только цифры";
} elseif (strlen($data['phone_number']) < 10 || strlen($data['phone_number']) > 15) {
    $errors['phone_number'] = "Номер телефона должен содержать от 10 до 15 цифр";
}

if (empty($data['name'])) {
    $errors['name'] = "Имя обязательно для заполнения";
} elseif (!preg_match('/^[a-zA-Zа-яА-ЯёЁ]+$/u', $data['name'])) {
    $errors['name'] = "Имя должно содержать только буквы";
}  

$allowed_sources = ["site", "city", "tv", "others"];
if (empty($data['came_from'])) {
    $errors[] = "Поле 'откуда пришел' обязательно для заполнения";
} elseif (!in_array($data['came_from'], $allowed_sources)) {
    $errors[] = "Неверное значение для поля 'откуда пришел'. Допустимые значения: " . implode(', ', $allowed_sources);
}

if (empty($data['date_birth'])) {
    $errors[] = "Дата рождения обязательна для заполнения";
} else {
$date = DateTime::createFromFormat('Y-m-d', $data['date_birth']);
if (!$date || $date->format('Y-m-d') !== $data['date_birth']) {
$errors[] = "Неверный формат даты. Используйте YYYY-MM-DD";
    } else {
    $today = new DateTime();
    $age = $today->diff($date)->y;
    if ($age < 15) {
    $errors[] = "Вам должно быть не менее 15 лет";
        }
    if ($age > 67) {
    $errors[] = "Вам должно быть не больше 67 лет";
        }
    }
}

return $errors;
}
$result = validateUserData($data) ;

if (empty($result)) {

  $response["status"] = True;
  $response["message"] = "Регистрация прошла успешно!";
  echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);  //для того, чтобы ответ функции был таким, каким был в задании
}
elseif (!empty($result)) {
    
  $response["status"] = False;
  $response["message"] = $result;
  echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
?>
