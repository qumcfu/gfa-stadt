<?php

namespace App\Traits;

trait MembershipCountTrait
{
    public function getActiveMembershipCount(): int
    {
        $membershipCount = 0;
        foreach($this['memberships'] as $membership)
        {
            if($membership['active']) $membershipCount++;
        }
        return $membershipCount;
    }

    public function getInactiveMembershipCount(): int
    {
        $membershipCount = 0;
        foreach($this['memberships'] as $membership)
        {
            if(!$membership['active']) $membershipCount++;
        }
        return $membershipCount;
    }
}
