<?php

namespace App\Policies;

use App\Facades\Identity;
use App\Traits\AdminPolicyTrait;
use App\User;
use App\Models\Campaign;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampaignPolicy
{
    use HandlesAuthorization;
    use AdminPolicyTrait;

    /**
     * Determine whether the user can view the campaign.
     *
     * @param  User  $user
     * @param  Campaign  $campaign
     * @return mixed
     */
    public function view(User $user, Campaign $campaign)
    {
        return $user->campaign->id == $campaign->id;
    }

    /**
     * Determine whether the user can access the campaign
     *
     * @param User $user
     * @param Campaign $campaign
     * @return bool
     */
    public function access(User $user, Campaign $campaign)
    {
        if ($campaign->visibility == 'public') {
            return true;
        }
        return $campaign->user();
    }

    /**
     * Determine whether the user can create campaigns.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return !Identity::isImpersonating();
    }

    /**
     * Determine whether the user can update the campaign.
     *
     * @param  User  $user
     * @param  Campaign  $campaign
     * @return mixed
     */
    public function update(User $user, Campaign $campaign)
    {
        return
            $user->campaign->id == $campaign->id && $this->isAdmin($user);
    }

    /**
     * Determine whether the user can delete the campaign.
     *
     * @param  User  $user
     * @param  Campaign  $campaign
     * @return mixed
     */
    public function delete(User $user, Campaign $campaign)
    {
        return
            $user->campaign->id == $campaign->id && $this->isAdmin($user) && $campaign->members()->count() == 1;
    }

    /**
     * @param User $user
     * @param Campaign $campaign
     * @return bool
     */
    public function invite(User $user, Campaign $campaign)
    {
        return $user->campaign->id == $campaign->id && $this->isAdmin($user);
    }

    /**
     * @param User $user
     * @param Campaign $campaign
     * @return bool
     */
    public function setting(User $user, Campaign $campaign)
    {
        return $user->campaign->id == $campaign->id && $this->isAdmin($user);
    }

    /**
     * @param User $user
     * @param Campaign $campaign
     * @return bool
     */
    public function dashboard(User $user, Campaign $campaign)
    {
        return $user->campaign->id == $campaign->id && $this->isAdmin($user);
    }

    /**
     * Determine whether the user can leave the campaign
     *
     * @param User $user
     * @param Campaign $campaign
     * @return bool
     */
    public function leave(User $user, Campaign $campaign)
    {
        return $user->campaign->id == $campaign->id &&
            // If we are not the owner, or that we are an owner but there are other owners
            $campaign->user() && (!$this->isAdmin($user) || count($campaign->admins()) > 1) &&
            // We also can't leave a campaign if we are not the real user
            !Identity::isImpersonating();
    }
}
