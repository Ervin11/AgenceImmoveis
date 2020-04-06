<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class BackOfficeController extends AbstractController
{

    /**
     * @Route("/admin/register", name="admin_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, EntityManagerInterface $em)
    {
      $user = new User();

      $user->setEmail($request->request->get('email'))
           ->setPassword($encoder->encodePassword($user, $request->request->get('password')));

      $em->persist($user);
      $em->flush();

      return $this->redirectToRoute('app_login');
    }
}
