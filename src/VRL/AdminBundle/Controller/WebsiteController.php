<?php

namespace VRL\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use VRL\AdminBundle\Entity\website;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class WebsiteController extends Controller
{


    public function AddWebsiteAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();

		$website = new website();
		$website->setdateJoin(new \DateTime('today'));
		// $website->setdateJoin('jjjk');


		$form = $this->createFormBuilder($website)
		->add('name', TextType::class)
		->add('link', TextType::class)
		->add('email', TextType::class)
		->add('facebook', TextType::class)
		->add('youtube', TextType::class)

		->add('file')

		->add('save', SubmitType::class, array('label' => 'Save Deal','attr' => ['class' => 'btn btn-primary']))
		->getForm();
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			$website->upload();
			$em->persist($website);       
			$em->flush(); 
			return $this->redirectToRoute('Listwebsite');

		}


        return $this->render('AdminBundle:website:add.html.twig',array('form'=>$form->createView()));

    }



    public function ListWebsiteAction()
    {
       
        $em=$this->getDoctrine()->getManager();
        // $etab=$this->get_identity()->getetab();
        $websites=$em->getRepository('AdminBundle:website')->findAll();

        return $this->render('AdminBundle:website:list.html.twig',array('websites'=>$websites));

    }



    public function EditWebsiteAction($id,Request $request)
    {

        $em=$this->getDoctrine()->getManager();

        $website = $em->getRepository('AdminBundle:website')->find($id);

		$form = $this->createFormBuilder($website)
		->add('name', TextType::class)
		->add('link', TextType::class)
		->add('email', TextType::class)
		->add('facebook', TextType::class)
		->add('youtube', TextType::class)

		->add('file')

		->add('save', SubmitType::class, array('label' => 'Save Deal','attr' => ['class' => 'btn btn-primary']))
		->getForm();
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			$website->upload();
			$em->persist($website);       
			$em->flush(); 
			return $this->redirectToRoute('ListWebsite');

		}


        return $this->render('AdminBundle:website:add.html.twig',array('form'=>$form->createView()));

    }


}
