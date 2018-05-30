<?php

namespace App\Controller;

use App\Entity\ClienteDireccion;
use App\Form\ClienteDireccionType;
use App\Repository\ClienteDireccionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cliente/direccion")
 */
class ClienteDireccionController extends Controller
{
    /**
     * @Route("/", name="cliente_direccion_index", methods="GET")
     */
    public function index(ClienteDireccionRepository $clienteDireccionRepository): Response
    {
        return $this->render('cliente_direccion/index.html.twig', ['cliente_direccions' => $clienteDireccionRepository->findAll()]);
    }

    /**
     * @Route("/new", name="cliente_direccion_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $clienteDireccion = new ClienteDireccion();
        $form = $this->createForm(ClienteDireccionType::class, $clienteDireccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clienteDireccion);
            $em->flush();

            return $this->redirectToRoute('cliente_direccion_index');
        }

        return $this->render('cliente_direccion/new.html.twig', [
            'cliente_direccion' => $clienteDireccion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cliente_direccion_show", methods="GET")
     */
    public function show(ClienteDireccion $clienteDireccion): Response
    {
        return $this->render('cliente_direccion/show.html.twig', ['cliente_direccion' => $clienteDireccion]);
    }

    /**
     * @Route("/{id}/edit", name="cliente_direccion_edit", methods="GET|POST")
     */
    public function edit(Request $request, ClienteDireccion $clienteDireccion): Response
    {
        $form = $this->createForm(ClienteDireccionType::class, $clienteDireccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cliente_direccion_edit', ['id' => $clienteDireccion->getId()]);
        }

        return $this->render('cliente_direccion/edit.html.twig', [
            'cliente_direccion' => $clienteDireccion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cliente_direccion_delete", methods="DELETE")
     */
    public function delete(Request $request, ClienteDireccion $clienteDireccion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clienteDireccion->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clienteDireccion);
            $em->flush();
        }

        return $this->redirectToRoute('cliente_direccion_index');
    }
}
