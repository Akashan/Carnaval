<?php

namespace Carnaval\WebsiteBundle\Controller;

use Carnaval\WebsiteBundle\Entity\Message;
use Carnaval\WebsiteBundle\Entity\Evenement;
use Carnaval\WebsiteBundle\Entity\EvenementRepository;
use Carnaval\WebsiteBundle\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebsiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('CarnavalWebsiteBundle:Website:index.html.twig', array());
    }
	public function presentationAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:presentation.html.twig', array());	
	}
	public function referencesAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:references.html.twig', array());
    }
	public function catalogueAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:catalogue.html.twig', array());
	}
	public function calendrierAction()
	{
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('CarnavalWebsiteBundle:Evenement');

        $listEvents = $repository->getAllEventsFromDate(new \DateTime());

        $firstEventDate = clone $listEvents[0]->getEventDate();
        $lastEventDate = clone end($listEvents)->getEventDate();

        $startDate = $firstEventDate->modify('first day of this month');
        $endDate = $lastEventDate->modify('last day of this month')->modify('+1 day');

        $newListEvents = array();

        while(true){
            $dateString = $startDate->format('Y-m-d');

            $newListEvents[$dateString] = array();
            $startDate->modify('+1 month');

            if($startDate == $endDate){
                break;
            }
        }

        foreach($newListEvents as $key => $value){
            $date = new \DateTime($key);
            $nextDate = clone $date;
            $nextDate->modify('+1 month');
            foreach($listEvents as $event){
                if($event->getEventDate() < $nextDate && $event->getEventDate() > $date){
                    $newListEvents[$key][] = $event;
                }
            }
            $date->modify('+1 month');
        }

        return $this->render('CarnavalWebsiteBundle:Website:calendrier.html.twig', array('events' => $newListEvents));
	}
	public function galeriesAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:galeries.html.twig', array());
	}
	public function voirGaleriesAction($id)
	{
        return $this->render('CarnavalWebsiteBundle:Website:voirGalerie.html.twig', array());
	}
	public function videosAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:videos.html.twig', array());
	}
	public function voirVideosAction($id)
	{
        return $this->render('CarnavalWebsiteBundle:Website:voirVideo.html.twig', array());
	}
	public function contactsAction()
	{
        $message = new Message();

        // On crée le formulaire grâce à l'ArticleType
        $form = $this->createForm(new MessageType(), $message);

        // On récupère la requête
        $request = $this->getRequest();

        if( $request->get('cancel') == 'Cancel' )
            return $this->redirect($this->generateUrl('carnaval_website_contacts'));

        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            $form->bind($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {

                $message->setReceiveDate(new \DateTime());
                $message->setIsDeleted(false);
                $message->setIsArchived(false);
                $message->setIsRead(false);

                // On enregistre notre objet $article dans la base de données
                $em = $this->getDoctrine()->getManager();

                $em->persist($message);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Message envoyé');

                $message = new Message();

                // On crée le formulaire grâce à l'ArticleType
                $form = $this->createForm(new MessageType(), $message);

                // On redirige vers la page de visualisation de l'article nouvellement créé
                return $this->render('CarnavalWebsiteBundle:Website:contacts.html.twig', array(
                    'form' => $form->createView(),
                    'formName' => "AJOUTMESSAGE"
                ));
            }
        }

        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau

        return $this->render('CarnavalWebsiteBundle:Website:contacts.html.twig', array(
            'form' => $form->createView(),
            'formName' => "AJOUTMESSAGE"
        ));
	}
	public function liensAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:liens.html.twig', array());
	}


}
