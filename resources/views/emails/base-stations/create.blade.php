<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ \App\Models\Widget\TextName::getTextTranslation('base-station') }}</title>
</head>
<body>
<p>Новая заявка на БС успешно создана.</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_stations', 'id') }}</b>: {{ $application->baseStation->id }}</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'name') }}</b>: {{ $application->baseStation->position->name }}</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_stations', 'application_type_id') }}</b>: {{ $application->application_type->translations[0]->name }}</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_stations', 'user_id') }}</b>: {{ $application->user->name }}</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_stations', 'comment') }}</b>: {{ $application->comment }}</p>
</body>
</html>
