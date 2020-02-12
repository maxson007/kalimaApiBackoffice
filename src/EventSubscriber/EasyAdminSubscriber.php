<?php


namespace App\EventSubscriber;

use App\Entity\Exercise;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    /**
     *
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getSubscribedEvents()
    {
        return array(
            'easy_admin.pre_persist' => array('encodePassword'),
             EasyAdminEvents::PRE_UPDATE => [array('encodePassword',2), array('updateExercice')],
        );
    }

    public function encodePassword(GenericEvent $event)
    {
        $user = $event->getSubject();

        if (!($user instanceof User)) {
            return;
        }

        // Encode the password (you could also do this via Doctrine listener)
        $password = $this->passwordEncoder->encodePassword($user, $user->getPlainPassword());
        $user->setPassword($password);

        $event['entity'] = $user;
    }

    public function updateExercice(GenericEvent $event)
    {
        $exercise = $event->getSubject();

        if (!($exercise instanceof Exercise)) {
            return;
        }

        $exercise->setListeMotComorien(array_values($exercise->getListeMotComorien()));
        $exercise->setListeMotFrancais(array_values($exercise->getListeMotFrancais()));
        $exercise->setListeProposition(array_values($exercise->getListeProposition()));

        $event['entity'] = $exercise;
    }
}
