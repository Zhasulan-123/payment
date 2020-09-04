# payment

У Вас должен docker docker-compose установлено

1) git clone https://github.com/Zhasulan-123/payment.git

2) docker-compose up -d

3) docker exec -it container_id bash

4) composer update

5) php yii migrate (Если ошибка то права доступа sudo chmod 777 -R ./vendor)

6) Добавить пользователь (Администратор)

php yii app/add-user admin@mail.ru 123 Жасулан Молдакулов
   
    admin@mail.ru - (Логин)
    123 - (Пороль)
    Жасулан - (Имя)
    Молдакулов - (Фамилия)
    
7) Сайт localhost:8012

8) phpmyadmin localhost:8000
    login: root
    password: test
