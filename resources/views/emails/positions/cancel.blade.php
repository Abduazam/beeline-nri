<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<p>Ваша заявка на позицию была отменена.</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'id') }}</b>: {{ $application->position->id }}</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'name') }}</b>: {{ $application->position->name }}</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'application_type_id') }}</b>: {{ $application->application_type->translations[0]->name }}</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_workflows', 'title') }}</b>: {{ $workflow }}</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_acceptors', 'user_id') }}</b>: {{ $acceptor }}</p>
<p><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_acceptors', 'comment') }}</b>: {{ $comment }}</p>
</body>
</html>
