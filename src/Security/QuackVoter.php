<?php
namespace App\Security;

use App\Entity\Quack;
use App\Entity\Duck;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class QuackVoter extends Voter
{
    // these strings are just invented: you can use anything
    const SHOW = 'quack_show';
    const EDIT = 'quack_edit';
    const DELETE = 'quack_delete';

    protected function supports(string $attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, [self::SHOW, self::EDIT, self::DELETE])) {
            return false;
        }

        // only vote on `Quack` objects
        if (!$subject instanceof Quack) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token)
    {
        $duck = $token->getUser();

        if (!$duck instanceof Duck) {
            // the duck must be logged in; if not, deny access
            return false;
        }

        // you know $subject is a Quack object, thanks to `supports()`
        /** @var Quack $quack */
        $quack = $subject;

        switch ($attribute) {
            case self::SHOW:
                return $this->canView($quack, $duck);
            case self::EDIT:
                return $this->canEdit($quack, $duck);
            case self::DELETE:
                return $this->canDelete($quack, $duck);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canView(Quack $quack, Duck $duck)
    {
        if ($this->canEdit($quack, $duck)) {
            return true;
        }

        return false;
    }

    private function canEdit(Quack $quack, Duck $duck)
    {
        // this assumes that the Post object has a `getOwner()` method
        return $duck === $quack->getDuck();
    }

    private function canDelete(Quack $quack, Duck $duck)
    {

        if($duck->getId() === $quack->getDuck()->getId()) {
            return true;
        }

        return false;
    }
}