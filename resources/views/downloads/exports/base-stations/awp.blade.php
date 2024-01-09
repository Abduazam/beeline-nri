<table class="fs-sm">
    <tr class="text-center">
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">ID проекта</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->id }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Номер</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ implode(',', $baseStationApplication->diapasons->pluck('number')->toArray()) }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Телеком. стандарт</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->diapasons->pluck('diapason.technology.name')->unique()->implode(',') }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Номер позиции</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStation->position->number }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">ГФК</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Наименование</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStation->position->name }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Адрес</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStation->position->address }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Регион</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStation->position->region?->translations?->first()?->name }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Привязка к местности</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStation->position->area?->translations?->first()?->name }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Контроллер</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->diapasons->pluck('controller.name')->unique()->implode('/') }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Система координат</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStation->position->coordinate->name }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Широта</td>
        @php
            $degree = (new \App\Helpers\Helper())->decimalToDegree($baseStationApplication->baseStation->position->latitude)
        @endphp
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStation->position->latitude . " ($degree)" }} </td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Долгота</td>
        @php
            $degree = (new \App\Helpers\Helper())->decimalToDegree($baseStationApplication->baseStation->position->longitude)
        @endphp
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStation->position->longitude . " ($degree)" }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип помещ.</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationDiapasonInfo->room_type?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Место размещ. аппарат-й</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationDiapasonInfo->hardware_room?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Совместная аппаратная, владелец</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationDiapasonInfo->hardware_owner?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Место размещ. антенны</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationDiapasonInfo->location_antenna?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Высота объекта размещ. АФУ, м</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationDiapasonInfo->height_afu }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Ген. подрядчик</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationDiapasonInfo->general_contractor?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Наличие договор аренды</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationARS->rentalAgreement?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Наличие ТУ на эл/эн.</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationARS->electricitySpecification?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Наличие ТУ на размещение</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationARS->placementSpecification?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Финанс. категория позиции</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationARS->financialCategoryPosition?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Категория электропитания</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationARS->powerCategory?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Резерв-е питания</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Осветит. огни</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Волн. сопр-е</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationARS->vehicleCable?->title }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Доп. информация</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationARS->additional_information }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип оборудования</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Количество радио-шкафов</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->baseStationARS->cabinets_number }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Проектировщик</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->user->name }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Дата создания проекта</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ date('Y-m-d', strtotime($baseStationApplication->created_at)) }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Статус проекта</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 700px;">{{ $baseStationApplication->status->translations?->first()?->name }}</td>
    </tr>
</table>

<table>
    <tr>
        <th colspan="6" style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 1200px;">Шкафы</th>
    </tr>
    <tr>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип BTS</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Номер BTS</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">BSNameNMS</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Кол-во трансиверов</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Кол-во потоков E1</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Mb</th>
    </tr>
    @foreach($baseStationApplication->baseStationCabinets as $cabinet)
    <tr>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $cabinet->btsType?->model }}</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $cabinet->bts_number }}</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $cabinet->bs_name_nms }}</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $cabinet->transceivers_number }}</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $cabinet->e1_threads_number }}</td>
        <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $cabinet->mb }}</td>
    </tr>
    @endforeach
</table>

<table>
    <tr>
        <td colspan="5" style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 1000px;">Модули управления распределенной БС (MU)</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип MU</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Номер MU</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Расположение MU</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Номер BTS</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">BSNameNMS</th>
    </tr>
    @foreach($baseStationApplication->baseStationControlModules as $module)
        <tr>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $module->muType?->model }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $module->mu_number }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $module->roomType?->title }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $module->cabinet_id }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $module->bs_name_nms }}</td>
        </tr>
    @endforeach
</table>

<table>
    <tr>
        <td colspan="2" style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 400px;">eNodeB_id</td>
    </tr>
    <tr>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">eNodeB_id</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Диапазон LTE</th>
    </tr>
    @foreach($baseStationApplication->baseStationENodes as $node)
        <tr>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $node->e_node_b_id }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $node->diapason->technology->name . ' ' . $node->diapason->band }}</td>
        </tr>
    @endforeach
</table>

<table>
    <tr>
        <th colspan="7" style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 1400px;">Радиомодули распределенной БС (RRU)</th>
    </tr>
    <tr>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px; height: 50px;">Номер RRU</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px; height: 50px;">Тип RRU</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px; height: 50px;">Сектора</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px; height: 50px;">Номер MU</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px; height: 50px;">Трансиверы</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px; height: 50px;">Тип оптического кабеля</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px; height: 50px;">Количество <br> оптических <br> кабелей</th>
    </tr>
    @foreach($baseStationApplication->baseStationRadioModules as $rmodule)
        <tr>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rmodule->rru_number }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rmodule->rruType?->model }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rmodule->sectors }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rmodule->control_module_id }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rmodule->transceivers }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rmodule->opticalCable?->title }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rmodule->optical_cable_number }}</td>
        </tr>
    @endforeach
</table>

<table>
    <tr>
        <th colspan="17" style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 3400px;">Сектора</th>
    </tr>
    <tr>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Полный номер сектора</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">CellId</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Диапазон сектора</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Наименование</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">ENodeB</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Трансиверы</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Трансиверов DRate (HR)</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Номер BTS</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Номер RRU</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Кол-во антенн в секторе</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Азимут сектора</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">В метро</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Наличие МШУ</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип МШУ</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Количество МШУ</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип дуплексного фильтра</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Количество фильтров</th>
    </tr>
    @foreach($baseStationApplication->baseStationSectors as $sector)
        <tr>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->sector_number }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->cell_id }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->diapason->technology->name . ' ' . $sector->diapason->band }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->title }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->e_node_b_id }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->transceivers }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->drate_transceivers }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->bts_id }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->rru_id }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->antenna_number }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->azimuth }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->metro ? "Да" : "Нет" }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->lna_availability }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->lna_type }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->lna_number }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->duplex_filter?->title }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->duplex_filter_id }}</td>
        </tr>
    @endforeach
</table>

<table>
    <tr>
        <th colspan="21" style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 4200px;">Антенно-фидерное оборудование</th>
    </tr>
    <tr>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Сектора</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Номер в сект.</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип антенны</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Мета-артикул</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Топ-антенна</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Азимут</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Высота подвеса</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Диапазон</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Диаграмма направл</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Диаграмма направл 2</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">КУ антенны</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Бисекторная</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Наклон антенн (электр.)</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Наклон антенн (механ.)</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Наклон антенн сумм.</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Прием</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Передача</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип фидера</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Длина фидера</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Широта</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Долгота</th>
    </tr>
    @foreach($baseStationApplication->baseStationAntennas as $antenna)
        <tr>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->sectors }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->sector_number }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->antenna_type?->model }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->meta_article }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->top_antenna }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->azimuth }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->suspension_height }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->diapasons }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->direction_diagram }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->direction_diagram_2 }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $antenna->ku_antennas }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->bisector ? "Да" : "Нет" }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->electrical_tilt }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->mechanical_tilt }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->sum_tilts }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->antenna_reception?->title }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->antenna_transmission?->title }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->feeder?->title }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->feeder_length }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->latitude }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $sector->longitude }}</td>
        </tr>
    @endforeach
</table>

<table>
    <tr>
        <th colspan="8" style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 1600px;">Блоки управления углами наклона антенны (RCU)</th>
    </tr>
    <tr>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Антенны</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип антенны</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Сектора</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Номер MCU/RRU</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип MCU/RRU</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип мотора</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип кабеля (I)</th>
        <th style="border: 1px solid black; text-align: center; font-weight: bold; font-size: 9px; width: 200px;">Тип кабеля (O)</th>
    </tr>
    @foreach($baseStationApplication->baseStationAntennaUnits as $rcu)
        <tr>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rcu->antenna_id }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rcu->antenna_type }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rcu->sectors }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rcu->number_mcu_rru }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rcu->type_mcu_rru }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rcu->motor?->title }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rcu->i_cable?->model }}</td>
            <td style="border: 1px solid black; text-align: left; font-size: 9px; width: 200px;">{{ $rcu->o_cable?->model }}</td>
        </tr>
    @endforeach
</table>
