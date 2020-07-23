<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Entity\Joboffer;
use App\Form\CandidateType;
use App\Repository\JobofferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




    /**
     * @Route("/admin", name="admin_")
     */

class AdminController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     */
    public function dashboard()
    {
        return $this->render('admin/dashboard.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * @Route("/joboffer", name="joboffer_index", methods={"GET"})
     */
    public function index(JobofferRepository $jobofferRepository): Response
    {
        return $this->render('joboffer/index.html.twig', [
            'joboffers' => $jobofferRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="joboffer_show", methods={"GET"})
     */
    public function show(Joboffer $joboffer): Response
    {  
        return $this->render('joboffer/show.html.twig', [
            'joboffer' => $joboffer,
        ]);
    }
    /**
     * @Route("/{id}/edit", name="candidate_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Candidate $candidate): Response
    {
       
            $form = $this->createForm(CandidateType::class, $candidate);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('candidate_index');
            }
           ;
            return $this->render('candidate/edit.html.twig', [
                'candidate' => $candidate,
                'form' => $form->createView(),

            ]);
        }

    }



