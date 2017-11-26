<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/mailer", name="mailer")
     *
     *  @Method({"GET", "POST"})
     */

    public function MailerAction(Request $request, \Swift_Mailer $mailer)
    {
      $nom = $_POST['nom'];
      $mail = $_POST['mail'];
      $tel = $_POST['tel'];
      $text = $_POST['text'];

      $body = '<h2>Nouveau contact provenant du site Mecagreen :</h2><hr>
                 Nom : <b>'.$nom.'</b><br><br>
                 Mail : <b>'.$mail.'</b><br><br>
                 Telephone : <b>'.$tel.'</b><br><br>
                 Message : <b><br>'.$text.'</b>';

      $message = (new \Swift_Message ($_POST['mail']))

                     ->setFrom('contact.mecagreen@gmail.com')

                     ->setTo('derot7@gmail.com')

                     ->setBody($body, 'text/html');

     $mailer = $this->get('mailer')->send($message);



     return $this->render('default/index.html.twig');


    }
}
