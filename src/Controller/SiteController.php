<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Entity\OfferSearch;
use App\Form\OfferSearchType;
use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Mime\Email;


class SiteController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
      return $this->redirectToRoute('home');
    }

    /**
     * @Route("/home", name="home")
     */
    public function home(Request $request, OfferRepository $offerRepository)
    {
        $offers = $offerRepository->findLastSix();

        return $this->render('site/home.html.twig', [
            'offers' => $offers
        ]);
    }

    /**
     * @Route("/offers", name="offers")
     */
    public function offers(Request $request, PaginatorInterface $paginator, OfferRepository $offerRepository)
    {

      $search = new OfferSearch();
      $form = $this->createForm(OfferSearchType::class, $search);
      $form->handleRequest($request);

      $data = $offerRepository->findAllVisibleQuery($search);

      dump($data);

      $offers = $paginator->paginate($data, $request->query->getInt('page', 1), 9);

      return $this->render('site/offers.html.twig', [
        'offers' => $offers,
        'form' => $form->createView()
      ]);
    }

    /**
     * @Route("/offer/{id}", name="show", methods={"GET"})
     */
    public function show(Offer $offer): Response
    {
      return $this->render('site/show.html.twig', [
        'offer' => $offer,
      ]);
    }

    /**
     * @Route("/email", name="email")
     */
    public function sendEmail(MailerInterface $mailer, Request $request)
    {
      $email = (new Email())
        ->from($request->request->get('email'))
        ->to('yop@yopmail.com')
        ->replyTo($request->request->get('email'))
        ->subject("Demande d'information")
        ->text($request->request->get('message'));

      $mailer->send($email);

      return new Response(true);
    }
}
