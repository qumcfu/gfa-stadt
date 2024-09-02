<?php

namespace App\Traits;

trait StageCountTrait
{
    public function getActiveStageCount(): int
    {
        $stageCount = 0;
        foreach($this['memberships'] as $membership)
        {
            foreach($membership['stages'] as $stage)
            {
                if($membership['active'] && $stage['active']) $stageCount++;
            }
        }
        return $stageCount;
    }

    public function getInactiveStageCount(): int
    {
        $stageCount = 0;
        foreach($this['memberships'] as $membership)
        {
            foreach($membership['stages'] as $stage)
            {
                if(!$membership['active'] || !$stage['active']) $stageCount++;
            }
        }
        return $stageCount;
    }
}
