<?php

namespace GlobeSoft\DamOSansaViitoruluiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContentController extends Controller {

    public function homeAction() {
        return $this->render('@DamOSansa/Content/home.html.twig', array(
            'pageTitle' => 'Asociația Dăm o Șansă Viitorului'
        ));
    }

    public function partnersAction() {
        return $this->render('@DamOSansa/Content/partners.html.twig', array(
            'pageTitle' => 'Parteneri'
        ));
    }

    public function contactAction() {
        return $this->render('@DamOSansa/Content/contact.html.twig', array(
            'pageTitle' => 'Contact'
        ));
    }

    /**
     * List all types of available therapy or provide more information about a single one.
     * @param string $type The therapy type that more information should be provided on.
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function therapyAction($type = 'all') {
        if ($type == 'all') {
            return $this->render('@DamOSansa/Therapy/list.html.twig', array(
                'pageTitle' => 'Terapie'
            ));
        } else {
            $type = ucfirst(str_replace('-',' ', $type));

            return $this->render('@DamOSansa/Therapy/item.html.twig', array(
                'type' => $type,
                'pageTitle' => 'Terapie ' . $type
            ));
        }
    }

    /**
     * List all types of dissabilities that the centre manages or provides more information about a particular type.
     * @param string $type The dissability type that more information should be provided on.
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dissabilityAction($type = 'all') {
        if ($type == 'all') {
            return $this->render('@DamOSansa/Dissability/list.html.twig', array(
                'pageTitle' => 'Dizabilități'
            ));
        } else {
            $type = ucfirst(str_replace('-',' ', $type));

            return $this->render('@DamOSansa/Dissability/item.html.twig', array(
                'type' => $type,
                'pageTitle' => $type
            ));
        }
    }
}