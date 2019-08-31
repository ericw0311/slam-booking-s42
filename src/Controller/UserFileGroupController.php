<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use App\Entity\UserFileGroup;
use App\Entity\UserParameter;
use App\Entity\UserContext;
use App\Entity\ListContext;
use App\Entity\UserParameterNLC;
use App\Entity\Booking;

use App\Form\UserFileGroupType;
use App\Form\UserParameterNLCType;

class UserFileGroupController extends AbstractController
{
    /**
     * @Route("/user_file_group/{page}", name="user_file_group", requirements={"page"="\d+"})
     */
    public function index($page)
    {
        $connectedUser = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $userContext = new UserContext($em, $connectedUser); // contexte utilisateur
        $lRepository = $em->getRepository(UserFileGroup::class);
        $numberRecords = $lRepository->getUserFileGroupsCount($userContext->getCurrentFile());
        $listContext = new ListContext($em, $connectedUser, 'userFileGroup', 'userFileGroup', $page, $numberRecords);
        $listUserFileGroups = $lRepository->getDisplayedUserFileGroups($userContext->getCurrentFile(), $listContext->getFirstRecordIndex(), $listContext->getMaxRecords());

        return $this->render('user_file_group/index.html.twig', array('userContext' => $userContext, 'listContext' => $listContext, 'listUserFileGroups' => $listUserFileGroups));
    }

    // Ajout d'un groupe d'utilisateurs
    /**
     * @Route("/user_file_group/add", name="user_file_group_add")
     */
    public function add(Request $request)
    {
        $connectedUser = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $userContext = new UserContext($em, $connectedUser); // contexte utilisateur
        $userFileGroup = new UserFileGroup($connectedUser, $userContext->getCurrentFile(), "MANUAL");
        $form = $this->createForm(UserFileGroupType::class, $userFileGroup);
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($userFileGroup);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'userFileGroup.created.ok');
                return $this->redirectToRoute('user_file_group', array('page' => 1));
            }
        }
        return $this->render('user_file_group/add.html.twig', array('userContext' => $userContext, 'form' => $form->createView()));
    }

    // Edition du detail d'un groupe d'utilisateurs
    /**
     * @Route("/user_file_group/edit/{userFileGroupID}", name="user_file_group_edit")
     * @ParamConverter("userFileGroup", options={"mapping": {"userFileGroupID": "id"}})
     */
    public function edit(Request $request, UserFileGroup $userFileGroup)
    {
        $connectedUser = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $userContext = new UserContext($em, $connectedUser); // contexte utilisateur
        $bRepository = $em->getRepository(Booking::class);
        return $this->render('user_file_group/edit.html.twig', array('userContext' => $userContext, 'userFileGroup' => $userFileGroup));
    }

    // Modification d'un groupe d'utilisateurs
    /**
       * @Route("/user_file_group/modify/{userFileGroupID}", name="user_file_group_modify")
       * @ParamConverter("userFileGroup", options={"mapping": {"userFileGroupID": "id"}})
       */
    public function modify(Request $request, UserFileGroup $userFileGroup)
    {
        $connectedUser = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $userContext = new UserContext($em, $connectedUser); // contexte utilisateur
        $form = $this->createForm(UserFileGroupType::class, $userFileGroup);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'userFileGroup.updated.ok');
                return $this->redirectToRoute('user_file_group_edit', array('userFileGroupID' => $userFileGroup->getId()));
            }
        }
        return $this->render('user_file_group/modify.html.twig', array('userContext' => $userContext, 'userFileGroup' => $userFileGroup, 'form' => $form->createView()));
    }

    // Suppression d'un groupe d'utilisateurs
    /**
       * @Route("/user_file_group/delete/{userFileGroupID}", name="user_file_group_delete")
       * @ParamConverter("userFileGroup", options={"mapping": {"userFileGroupID": "id"}})
       */
    public function delete(Request $request, UserFileGroup $userFileGroup)
    {
        $connectedUser = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $userContext = new UserContext($em, $connectedUser); // contexte utilisateur
        $em->remove($userFileGroup);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'userFileGroup.deleted.ok');
        return $this->redirectToRoute('user_file_group', array('page' => 1));
    }
}
