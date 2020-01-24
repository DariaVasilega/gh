<?php

namespace AppBundle\Security;

use App\Entity\Post;
use App\Entity\Users;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class PostVoter extends Voter
{
    const VIEW = 'VIEW';
    const EDIT = 'EDIT';

    protected function supports($attribute, $subject)
    {
        // если это не один из поддерживаемых атрибутов, возвращается false
        if (!in_array($attribute, array(self::VIEW, self::EDIT))) {
            return false;
        }

        if (!$subject instanceof Post) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof Users) {
            return false;
        }

        /** @var Post $post */
        $post = $subject;

        switch ($attribute) {
            case self::VIEW:
                return $this->canView($post, $user);
            case self::EDIT:
                return $this->canEdit($post, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canView(Post $post, Users $user)
    {
        // если они могут просматривать, то они могут редактировать
        if ($this->canEdit($post, $user)) {
            return true;
        }

        return !$post->isPrivate();
    }

    private function canEdit(Post $post, Users $user)
    {
        return $user === $post->getOwner();
    }
}