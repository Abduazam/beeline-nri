<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ \App\Models\Widget\TextName::getTextTranslation('position') }}</title>
</head>
<body>
    <p>Новая заявка на позиция успешно создана.</p>
    <p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'id') }}</b>: {{ $application->position->id }}</p>
    <p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'name') }}</b>: {{ $application->position->name }}</p>
    <p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'application_type_id') }}</b>: {{ $application->application_type->translations[0]->name }}</p>
    <p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'user_id') }}</b>: {{ $application->user->name }}</p>
    <p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'comment') }}</b>: {{ $application->comment }}</p>
</body>
</html>
