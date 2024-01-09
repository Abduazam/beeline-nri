<?php

namespace Database\Seeders\Data\Texts;

use App\Models\Widget\TextName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppTextsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $texts = [
            [
                'key' => 'imports',
                'translation' => "Импорт"
            ],
            [
                'key' => 'app-name',
                'translation' => "BeelineNRI"
            ],
            [
                'key' => 'home',
                'translation' => "Дом"
            ],
            [
                'key' => 'user',
                'translation' => "Пользователь"
            ],
            [
                'key' => 'widget',
                'translation' => "Виджет"
            ],
            [
                'key' => 'area-section',
                'translation' => "Зоны"
            ],
            [
                'key' => 'data',
                'translation' => "Данные"
            ],
            [
                'key' => 'type',
                'translation' => "Типы"
            ],
            [
                'key' => 'statuses',
                'translation' => "Статусы"
            ],
            [
                'key' => 'status',
                'translation' => "Статус"
            ],
            [
                'key' => 'states',
                'translation' => "Состояние"
            ],
            [
                'key' => 'state',
                'translation' => "Состояние"
            ],
            [
                'key' => 'positions',
                'translation' => "Позиции"
            ],
            [
                'key' => 'position',
                'translation' => "Позиция"
            ],
            [
                'key' => 'base-stations',
                'translation' => "Базовые станции"
            ],
            [
                'key' => 'base-station',
                'translation' => "Базовая станция"
            ],
            [
                'key' => 'search',
                'translation' => "Поиск"
            ],
            [
                'key' => 'settings',
                'translation' => "Настройки"
            ],
            [
                'key' => 'sign-out',
                'translation' => "Выход"
            ],
            [
                'key' => 'sign-in',
                'translation' => "Войти"
            ],
            [
                'key' => 'roles',
                'translation' => "Роли"
            ],
            [
                'key' => 'role',
                'translation' => "Роль"
            ],
            [
                'key' => 'users',
                'translation' => "Пользователи"
            ],
            [
                'key' => 'permissions',
                'translation' => "Разрешения"
            ],
            [
                'key' => 'permission',
                'translation' => "Разрешение"
            ],
            [
                'key' => 'actives',
                'translation' => "Активные"
            ],
            [
                'key' => 'inactives',
                'translation' => "Неактивные"
            ],
            [
                'key' => 'add-new',
                'translation' => "Добавить новое"
            ],
            [
                'key' => 'create',
                'translation' => "Создавать"
            ],
            [
                'key' => 'actions',
                'translation' => "Действие"
            ],
            [
                'key' => 'all',
                'translation' => "Все"
            ],
            [
                'key' => 'back',
                'translation' => "Назад"
            ],
            [
                'key' => 'info',
                'translation' => "Инфо"
            ],
            [
                'key' => 'enter-value',
                'translation' => "Введите значение"
            ],
            [
                'key' => 'choose-value',
                'translation' => "Выберите значение"
            ],
            [
                'key' => 'application',
                'translation' => "Заявка"
            ],
            [
                'key' => 'acceptor',
                'translation' => "Заявка"
            ],
            [
                'key' => 'applications',
                'translation' => "Заявки"
            ],
            [
                'key' => 'cancel',
                'translation' => "Отмена"
            ],
            [
                'key' => 'cancelling',
                'translation' => "Отменить"
            ],
            [
                'key' => 'cancelled',
                'translation' => "Отменено"
            ],
            [
                'key' => 'cancelling-succeed',
                'translation' => "Отмена прошла успешно",
            ],
            [
                'key' => 'save',
                'translation' => "Сохранять"
            ],
            [
                'key' => 'delete',
                'translation' => "Удалить"
            ],
            [
                'key' => 'deleting-failed',
                'translation' => "Не удалось удалить"
            ],
            [
                'key' => 'deleting-succeed',
                'translation' => "Удаление успешно",
            ],
            [
                'key' => 'restore',
                'translation' => "Восстановить"
            ],
            [
                'key' => 'restoring-failed',
                'translation' => "Не удалось восстановить"
            ],
            [
                'key' => 'restoring-succeed',
                'translation' => "Восстановление успешно",
            ],
            [
                'key' => 'confirm-password',
                'translation' => "Пароль подтверждения",
            ],
            [
                'key' => 'branches',
                'translation' => "Филиалы",
            ],
            [
                'key' => 'branch',
                'translation' => "Филиал",
            ],
            [
                'key' => 'regions',
                'translation' => "Регионы",
            ],
            [
                'key' => 'region',
                'translation' => "Регион",
            ],
            [
                'key' => 'areas',
                'translation' => "Области",
            ],
            [
                'key' => 'area',
                'translation' => "Область",
            ],
            [
                'key' => 'edit',
                'translation' => "Изменить",
            ],
            [
                'key' => 'editing-failed',
                'translation' => "Не удалось изменить"
            ],
            [
                'key' => 'editing-succeed',
                'translation' => "Изменение успешно",
            ],
            [
                'key' => 'creating-failed',
                'translation' => "Не удалось создать"
            ],
            [
                'key' => 'creating-succeed',
                'translation' => "Создание успешно",
            ],
            [
                'key' => 'languages',
                'translation' => "Языки",
            ],
            [
                'key' => 'language',
                'translation' => "Язык",
            ],
            [
                'key' => 'table-columns',
                'translation' => "Таблицы",
            ],
            [
                'key' => 'column-type',
                'translation' => "Тип столбца",
            ],
            [
                'key' => 'text-names',
                'translation' => "Тексты",
            ],
            [
                'key' => 'error',
                'translation' => "Ошибка",
            ],
            [
                'key' => 'place-types',
                'translation' => "Размещенные типы",
            ],
            [
                'key' => 'place-type',
                'translation' => "Размещенные тип",
            ],
            [
                'key' => 'place-type-groups',
                'translation' => "Размещенные группы типов",
            ],
            [
                'key' => 'place-type-group',
                'translation' => "Размещенные группа типов",
            ],
            [
                'key' => 'purposes',
                'translation' => "Назначение",
            ],
            [
                'key' => 'purpose',
                'translation' => "Назначение",
            ],
            [
                'key' => 'coordinate-type',
                'translation' => "Тип координат",
            ],
            [
                'key' => 'coordinate-types',
                'translation' => "Типы координат",
            ],
            [
                'key' => 'coordinate-system',
                'translation' => "Система координат",
            ],
            [
                'key' => 'companies',
                'translation' => "Компании",
            ],
            [
                'key' => 'company',
                'translation' => "Компания",
            ],
            [
                'key' => 'application-types',
                'translation' => "Типы заявок",
            ],
            [
                'key' => 'application-type',
                'translation' => "Тип заявок",
            ],
            [
                'key' => 'base-station-application-types',
                'translation' => "Типы заявок базовой станции",
            ],
            [
                'key' => 'base-station-application-type',
                'translation' => "Тип заявок базовой станции",
            ],
            [
                'key' => 'application-statuses',
                'translation' => "Статусы заявок",
            ],
            [
                'key' => 'application-status',
                'translation' => "Статус заявок",
            ],
            [
                'key' => 'workflow',
                'translation' => "Воркфлов",
            ],
            [
                'key' => 'workflows',
                'translation' => "Воркфлов",
            ],
            [
                'key' => 'position-workflows',
                'translation' => "Воркфлов позиции",
            ],
            [
                'key' => 'position-workflow',
                'translation' => "Воркфлов этап",
            ],
            [
                'key' => 'base-station-workflows',
                'translation' => "Воркфлов БС",
            ],
            [
                'key' => 'base-station-workflow',
                'translation' => "Воркфлов БС этап",
            ],
            [
                'key' => 'workflow-users',
                'translation' => "Воркфлов пользователи",
            ],
            [
                'key' => 'position-workflow-users',
                'translation' => "Воркфлов пользователи",
            ],
            [
                'key' => 'position-workflow-user',
                'translation' => "Воркфлов пользователь",
            ],
            [
                'key' => 'base-station-workflow-users',
                'translation' => "Воркфлов БС пользователи",
            ],
            [
                'key' => 'base-station-workflow-user',
                'translation' => "Воркфлов БС пользователь",
            ],
            [
                'key' => 'add',
                'translation' => "Добавлять",
            ],
            [
                'key' => 'no-image',
                'translation' => "Нет фото",
            ],
            [
                'key' => 'active',
                'translation' => "Активный",
            ],
            [
                'key' => 'inactive',
                'translation' => "Неактивный",
            ],
            [
                'key' => 'per-page',
                'translation' => "На страницу",
            ],
            [
                'key' => 'application-for',
                'translation' => "Заявка на",
            ],
            [
                'key' => 'street',
                'translation' => "Улица",
            ],
            [
                'key' => 'additional-info',
                'translation' => "Дополнительная информация",
            ],
            [
                'key' => 'degree',
                'translation' => "Градус",
            ],
            [
                'key' => 'decimal',
                'translation' => "Десятичный",
            ],
            [
                'key' => 'position-closing',
                'translation' => "Закрытие позиции",
            ],
            [
                'key' => 'short-name',
                'translation' => "Короткое назв.",
            ],
            [
                'key' => 'send',
                'translation' => "Отправить",
            ],
            [
                'key' => 'sending-succeed',
                'translation' => "Отправка прошла успешно",
            ],
            [
                'key' => 'accept',
                'translation' => "Принять",
            ],
            [
                'key' => 'accepted',
                'translation' => "Принята",
            ],
            [
                'key' => 'accepting-succeed',
                'translation' => "Принять прошла успешно",
            ],
            [
                'key' => 'response',
                'translation' => "Ответ",
            ],
            [
                'key' => 'not-responded',
                'translation' => "Не ответил",
            ],
            [
                'key' => 'technologies',
                'translation' => "Технологии",
            ],
            [
                'key' => 'technology',
                'translation' => "Технология",
            ],
            [
                'key' => 'diapasons',
                'translation' => "Диапазоны",
            ],
            [
                'key' => 'diapason',
                'translation' => "Диапазон",
            ],
            [
                'key' => 'room-types',
                'translation' => "Тип помещения",
            ],
            [
                'key' => 'room-type',
                'translation' => "Тип помещения",
            ],
            [
                'key' => 'hardware-rooms',
                'translation' => "Место размещения аппаратной",
            ],
            [
                'key' => 'hardware-room',
                'translation' => "Место размещения аппаратной",
            ],
            [
                'key' => 'hardware-owners',
                'translation' => "Совместная аппаратная владелец",
            ],
            [
                'key' => 'hardware-owner',
                'translation' => "Совместная аппаратная владелец",
            ],
            [
                'key' => 'location-antennas',
                'translation' => "Место размещ. антенн",
            ],
            [
                'key' => 'location-antenna',
                'translation' => "Место размещ. антенн",
            ],
            [
                'key' => 'general-contractors',
                'translation' => "Генеральный подрядчик",
            ],
            [
                'key' => 'general-contractor',
                'translation' => "Генеральный подрядчик",
            ],
            [
                'key' => 'k-as',
                'translation' => "К/А",
            ],
            [
                'key' => 'k-a',
                'translation' => "К/А",
            ],
            [
                'key' => 'only-archived',
                'translation' => "Только архивые",
            ],
            [
                'key' => 'choose-position',
                'translation' => "Выбрать позицию",
            ],
            [
                'key' => 'select',
                'translation' => "Выбрать",
            ],
            [
                'key' => 'controller',
                'translation' => "Контроллер",
            ],
            [
                'key' => 'controllers',
                'translation' => "Контролеры",
            ],
            [
                'key' => 'base-station-position-info',
                'translation' => "БС позиции инфо"
            ],
            [
                'key' => 'base-station-name',
                'translation' => "Наименование БС"
            ],
            [
                'key' => 'choose',
                'translation' => "Выбирать"
            ],
        ];

        foreach ($texts as $text) {
            $text = array_merge(['locale' => app()->getLocale()], $text);
            TextName::create($text);
        }
    }
}
