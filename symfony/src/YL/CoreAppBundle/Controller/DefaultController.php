<?php

namespace YL\CoreAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use YL\UserBundle\Form\ChauffeurType;
use YL\UserBundle\Entity\Chauffeur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YLCoreAppBundle:Default:index.html.twig');
    }

    public function myHomeAction()
    {
        return $this->render('YLCoreAppBundle:Default:myHome.html.twig');
    }

    public function myRegisterChoiceAction()
    {
        return $this->render('YLCoreAppBundle:Default:myRegisterChoice.html.twig');
    }

    public function myRegisterAction(Request $request)
    {
        $user = new Chauffeur();
        $form = $this->createForm(ChauffeurType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('yl_core_app_editProfile');
        }

        return $this->render(
            'YLCoreAppBundle:Default:myRegister.html.twig',
            array('form' => $form->createView())
        );
    }

    public function myLoginAction(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('YLCoreAppBundle:Default:myLogin.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    //return $this->render('YLCoreAppBundle:Default:myLogin.html.twig');
    }

    public function forgotPasswordAction()
    {
        return $this->render('YLCoreAppBundle:Default:forgotPassword.html.twig');
    }

    public function ourDriversAction()
    {
        return $this->render('YLCoreAppBundle:Default:ourDrivers.html.twig');
    }

    public function myProfileChauffeurAction()
    {
        return $this->render('YLCoreAppBundle:Default:myProfileChauffeur.html.twig');
    }

    public function myProfilePreteurAction()
    {
        return $this->render('YLCoreAppBundle:Default:myProfilePreteur.html.twig');
    }

    public function editProfileAction()
    {
        return $this->render('YLCoreAppBundle:Default:editProfile.html.twig');
    }
}
