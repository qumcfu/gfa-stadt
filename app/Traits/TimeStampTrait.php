<?php

namespace App\Traits;

trait TimeStampTrait
{
    public function getCreatedAtTimestamp($includeAuthor = true, $html = true): string
    {
        $created = __('on :date', ['date' => $this['created_at']->format('d.m.Y')]) . ' ' . __('at :time', ['time' => $this['created_at']->format('H:i')]);
        return $includeAuthor ? (__('Created by :author', ['author' => $this['author']['username'] ?? __('Unknown User')]) . ($html ? '<br>' : '') . $created) : (__('Created') . ' ' . $created . '.');
    }

    public function getUpdatedAtTimestamp($includeEditor = true, $html = true): string
    {
        if($this['updated_at'] == null) return '';

        $updated = __('on :date', ['date' => $this['updated_at']->format('d.m.Y')]) . ' ' . __('at :time', ['time' => $this['updated_at']->format('H:i')]);
        return $includeEditor ? (__('Last changed by :editor', ['editor' => $this['editor']['username'] ?? __('Unknown User')]) . ($html ? '<br>' : '') . $updated) : (__('Last updated') . ' ' . $updated . '.');
    }
}
