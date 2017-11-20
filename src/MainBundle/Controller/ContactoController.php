<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactoController extends Controller {

    public function contactoAction(Request $request) {
        // Create the form according to the FormType created previously.
        // And give the proper parameters
        $form = $this->createForm('MainBundle\Form\ContactoType', null, array(
            // To set the action use $this->generateUrl('route_identifier')
            'action' => $this->generateUrl('contacto'),
            'method' => 'POST'
        ));

        if ($request->isMethod('POST')) {
            // Refill the fields in case the form is not valid.
            $form->handleRequest($request);

            if ($form->isValid()) {

                // Send mail
                if ($this->sendEmail($form->getData())) {

                    $this->addFlash(
                            'notice', 'Tu consulta se envio correctamente!'
                    );

                    // Everything OK, redirect to wherever you want ! :

                    return $this->redirectToRoute('contacto');
                } else {
                    // An error ocurred, handle
                    var_dump("Errooooor :(");
                }
            }
        }

        return $this->render('MainBundle:Contacto:contacto.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    private function sendEmail($data) {
        $myappContactMail = 'max@flcingenieria.cl';
        $myappContactPassword = 'Tomy4111';

        // In this case we'll use the ZOHO mail services.
        // If your service is another, then read the following article to know which smpt code to use and which port
        // http://ourcodeworld.com/articles/read/14/swiftmailer-send-mails-from-php-easily-and-effortlessly
//        $transport = \Swift_SmtpTransport::newInstance('smtp.zoho.com', 465,'ssl')
//            ->setUsername($myappContactMail)
//            ->setPassword($myappContactPassword);
//
//        $mailer = \Swift_Mailer::newInstance($transport);
//        
//        $message = \Swift_Message::newInstance("Our Code World Contact Form ". $data["subject"])
//        ->setFrom(array($myappContactMail => "Message by ".$data["name"]))
//        ->setTo(array(
//            $myappContactMail => $myappContactMail
//        ))
//        ->setBody($data["message"]."<br>ContactMail :".$data["email"]);
        $transport = \Swift_SmtpTransport::newInstance('mail.flcingenieria.cl', 587)
                ->setUsername($myappContactMail)
                ->setPassword($myappContactPassword);

        $mailer = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance($data["motivo"])
                ->setFrom(array($data["email"] => $data["nombre"]))
                ->setTo(array(
                    $myappContactMail => $myappContactMail
                ))
                ->setBody('<div>'.'<p width="100px">' .$data["mensaje"].'</p>'.'</div>'. "\n\nEmail de contacto: " . $data["email"] . "\n\nTelefono del contacto: " . $data["fono"], 'text/html');

//                ->setBody($this->renderView('default/sendemail.html.twig',array('nombre' => $data["nombre"], 'mensaje' => $data["mensaje"])),'text/plain');
//                ->setBody($data["mensaje"] . "\n\nEmail de contacto: " . $data["email"] . "\n\nTelefono del contacto: " . $data["fono"]);
//        $result = $mailer->send($message);
        return $mailer->send($message);
    }

}
