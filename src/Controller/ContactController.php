<?php

namespace App\Controller;

use App\Class\Mail;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/nous-contacter', name: 'contact')]
    public function index(Request $request): Response
    {

        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('notice', 'Merci de nous avoir contacteé. Notre équipe va vous répondre dans les meilleurs délais');

            $contactForm = $form->getData();

            // Mail pour La Boutique Française qui réceptionne le message envoyé depuis la page contact
            $content = 'Vous avez reçu un nouveau message d\'un client depuis le site La Boutique Française<br/>';
            $content .= 'Email du client: ' . $contactForm['email'] . '<br/>';
            $content .= 'Prénom & nom du client: ' . $contactForm['firstname'] . ' ' . $contactForm['lastname'] .'<br/>';
            $content .= 'Message: <br>' . $contactForm['content'];
            $mail =new Mail();
            $mail->send('mathieubouthors@hotmail.com', 'La Boutique Française', 'Contact Client', $content);


            // On pourrait aussi créer un autre mail pour le client pour lui confirmer la bonne prise en compte de son message
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
