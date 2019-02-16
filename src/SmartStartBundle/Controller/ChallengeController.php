<?php

namespace SmartStartBundle\Controller;


use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use SmartStartBundle\Entity\Challenge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcher;

class ChallengeController extends Controller
{
    public function createAction(Request $request)
    {
        //$user = $this->container->get('security.token_storage')->getToken()->getUser();
       $challenge = new Challenge();
        $form = $this->createFormBuilder($challenge)
            ->add('nom',TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('description', TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('date',DateType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('email', TextType::class, array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
//            ->add('image', FileType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('phone', TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('specialite',TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('save',SubmitType::class, array('label'=>'save', 'attr'=>array('class'=>'btn btn-primary', 'style'=>'margin-bottom:15px')))
            ->getForm();
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $name = $form['nom']->getData();
            $description = $form['description']->getData();
            $date = $form['date']->getData();
            $email = $form['email']->getData();
            $phone = $form['phone']->getData();
            $specialite = $form['specialite']->getData();


            $challenge->setNom($name);
            $challenge->setDescription($description);
            $challenge->setDate($date);
            $challenge->setEmail($email);
            $challenge->setPhone($phone);
            $challenge->setSpecialite($specialite);
            //$challenge->setUser($user);


            $sn = $this->getDoctrine()->getManager();
            $sn->persist($challenge);
            $sn->flush();




         return $this->redirectToRoute('read');
        }

        return $this->render('@SmartStart/Challenge/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function readAction()
    { $challenges=$this->getDoctrine()->getRepository(Challenge::class)->findAll();

        return $this->render('@SmartStart/Challenge/read.html.twig', array(
            'challenges' => $challenges
        ));
    }

    public function updateAction(Request $request,$id)
    {

        $challenge = $this->getDoctrine()->getRepository(Challenge::class)->find($id);

        $challenge->setNom($challenge->getNom());
        $challenge->setDescription($challenge->getDescription());
        $challenge->setDate($challenge->getDate());
        $challenge->setEmail($challenge->getEmail());
        $challenge->setPhone($challenge->getPhone());
        $challenge->setSpecialite($challenge->getSpecialite());

        $form = $this->createFormBuilder($challenge)
            ->add('nom',TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('description', TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('date',DateType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('email', TextType::class, array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
//            ->add('image', FileType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('phone', TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('specialite',TextType::class, array('attr' => array('class'=>'form-control', 'style'=>'margin-bottom:15px')))
            ->add('save',SubmitType::class, array('label'=>'save', 'attr'=>array('class'=>'btn btn-primary', 'style'=>'margin-bottom:15px')))
            ->getForm();

        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $name = $form['nom']->getData();
            $description = $form['description']->getData();
            $date = $form['date']->getData();
            $email = $form['email']->getData();
            $phone = $form['phone']->getData();
            $specialite = $form['specialite']->getData();


            $sn = $this->getDoctrine()->getManager();
            $challenge=$sn->getRepository(Challenge::class)->find($id);
            $challenge->setNom($name);
            $challenge->setDescription($description);
            $challenge->setDate($date);
            $challenge->setEmail($email);
            $challenge->setPhone($phone);
            $challenge->setSpecialite($specialite);
            //$challenge->setUser($user);
            $sn->flush();





           return $this->redirectToRoute('read');
        }

        return $this->render('@SmartStart/Challenge/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $challenge=$sn->getRepository(Challenge::class)->find($id);
        $sn->remove($challenge);
        $sn->flush();
        return $this->redirectToRoute('read');
    }

}
