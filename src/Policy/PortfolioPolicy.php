<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Portfolio;
use Authorization\IdentityInterface;

/**
 * Portfolio policy
 */
class PortfolioPolicy
{
    /**
     * Check if $user can add Portfolio
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Portfolio $portfolio
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Portfolio $portfolio)
    {
        //Todos los usuarios logueados pueden crear
        return true;
    }

    /**
     * Check if $user can edit Portfolio
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Portfolio $portfolio
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Portfolio $portfolio)
    {
        return $this->isAuthor($user, $portfolio);
    }

    /**
     * Check if $user can delete Portfolio
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Portfolio $portfolio
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Portfolio $portfolio)
    {
        return $this->isAuthor($user, $portfolio);
    }

    /**
     * Check if $user can view Portfolio
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Portfolio $portfolio
     * @return bool
     */
    /*public function canView(IdentityInterface $user, Portfolio $portfolio)
    {
        return true;
    }*/

    protected function isAuthor(IdentityInterface $user, Portfolio $portfolio)
    {
        return $portfolio->user_id === $user->getIdentifier();
    }
}
