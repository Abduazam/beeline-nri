<?php

namespace App\Traits\Livewire;

use App\Enums\DispatchEnum;
use App\Models\Widget\TextName;
use Illuminate\Validation\ValidationException;

trait WithDispatching
{
    protected function dispatchError(ValidationException $e): void
    {
        $content = '';
        foreach ($e->validator->errors()->all() as $error) {
            $content .= $error . "<br>";
        }

        $this->dispatchBrowserEvent('dispatch-event', [
            'icon' => 'fa fa-circle-exclamation text-danger',
            'title' => TextName::getTextTranslation('error'),
            'content' => $content,
        ]);
    }

    protected function dispatchSuccess(string $icon, string $title, string $content): void
    {
        $icon = $this->getIcon($icon);
        $title = $this->getTitle($title);
        $content = $content === "Импорт завершен" ? "Импорт завершен" : $this->getContent($content);

        $this->dispatchBrowserEvent('dispatch-event', [
            'icon' => $icon,
            'title' => $title,
            'content' => $content,
        ]);
    }

    private function parseUrl(): string
    {
        $url = basename(url()->current());
        $urlData = explode('.', $url);
        if (!in_array($urlData[1], ['settings', 'foo'])) {
            if (in_array($urlData[1], ['branches', 'statuses'])) {
                return mb_substr($urlData[1], 0, -2);
            }

            if ($urlData[1] == 'technologies') {
                return str_replace('ies', 'y', $urlData[1]);
            }

            if (count($urlData) > 3) {
                return $urlData[2];
            }

            if (in_array($urlData[1], ['send', 'response'])) {
                return mb_substr($urlData[0], 0, -1);
            }

            return mb_substr($urlData[1], 0, -1);
        }

        return $urlData[1];
    }

    private function getIcon($icon): DispatchEnum
    {
        return match ($icon) {
            'create' => DispatchEnum::CREATE,
            'edit' => DispatchEnum::EDIT,
            'delete' => DispatchEnum::DELETE,
            'restore' => DispatchEnum::RESTORE,
        };
    }

    private function getTitle($title)
    {
        return TextName::getTextTranslation($title);
    }

    private function getContent($content): string
    {
        $model = $this->parseUrl();
        return TextName::getTextTranslation($model) . ": <b>" . $content . "</b>";
    }
}
