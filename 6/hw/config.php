<?php
/**
 * Админ сайта: admin admin
 * 
 * БД:
 */
const DB_DRIVER = 'mysql';
const DB_SERVER = 'localhost';
const DB_NAME = '6_hw';
const DB_USER = 'root';
const DB_PASSWORD = '';

/**
 * Таблицы:
 */
const GOODS = 'ITEMS'; // Таблица товаров.
    const ITEM_NAME = 'name';
const USERS = 'USERS'; // Таблица пользователей.
    const USER_ID = 'user_id'; // Столец с id пользователя.
    const USER_LOGIN = 'login';
    const USER_NAME = 'name'; // Название столбца "Имя пользвоателя".
    const USER_PASSWORD = 'password';
    const USER_IS_ADMIN = 'is_admin';
const BASKETS = 'BASKETS';
const ITEMS = 'ITEMS'; // Таблица с описанием позиций.
    const ITEM_ID = 'item_id';
const TITLE_OPTIONS = 'Вариант:'; // Титл "Выбрать вариант позиции"
const OPTIONS = 'ITEM_OPTIONS'; // Таблица опций товаров.

/**
 * Константы изображений:
 */
const IMAGE_DIR = './assets/img/';
const MIN_IMAGE_DIR = './assets/img/min/';

/**
 * Константы опций позиции:
 */
const VALUE_OPTION_A = 0;
const VALUE_OPTION_B = 1;
const NAME_OPTION_A = "Кобель";
const NAME_OPTION_B = "Сука";

/**
 * Константы кнопок:
 */
const BUY = "Зарезервировать"; // Кнопка "Купить" на карточке товара.