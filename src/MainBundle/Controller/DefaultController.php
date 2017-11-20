<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MainBundle\Entity\Obra;
use MainBundle\Entity\Image;

class DefaultController extends Controller {

    public function listAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $obra_repo = $em->getRepository("MainBundle:Obra");
//        $image_repo = $em->getRepository("MainBundle:Image");

        $obras = $obra_repo->findAll();
//        $obras=$obra_repo->getAllObras();

        return $this->render("MainBundle:Obra:list.html.twig", array(
                    "obras" => $obras
        ));
    }

//    public function showAction($Id) {
//        $obra = $this->getDoctrine()
//                ->getRepository(Obra::class)
//                ->find($Id);
//
//        if (!$obra) {
//            throw $this->createNotFoundException(
//                    'No se encontraron obras con el id ' . $Id
//            );
//        }
//
//        return $this->render("MainBundle:Obra:show.html.twig", array(
//                    "obras" => $obra
//        ));
//    }

    public function viewAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MainBundle:Obra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Obra entity.');
        }

        return $this->render("MainBundle:Obra:view.html.twig", array(
                    "obras" => $entity
        ));
    }
    
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MainBundle:Obra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TariffMc entity.');
        }

        return $this->render("MainBundle:Obra:show.html.twig", array(
                    "obras" => $entity
        ));
    }

    public function indexAction() {
        return $this->render('MainBundle:Default:index.html.twig');
    }

    public function nosotrosAction() {
        return $this->render('MainBundle:Default:nosotros.html.twig');
    }

    public function objetivoAction() {
        return $this->render('MainBundle:Default:objetivo.html.twig');
    }

    public function miviAction() {
        return $this->render('MainBundle:Default:mivi.html.twig');
    }

    public function obrasAction() {
        return $this->render('MainBundle:Default:obras.html.twig');
    }

}
