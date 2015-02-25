<?php


namespace CrudBundle\Controller;

use CrudBundle\Entity\classroom;
use CrudBundle\Entity\student;
use CrudBundle\Form\classroomType;
use CrudBundle\Form\studentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CrudController extends Controller{

    public function ListClassroomAction (){
        $classroom = $this->getDoctrine()
            ->getRepository('CrudBundle:classroom')
            ->findAll();

        return $this->render('CrudBundle:classroom:listClassroom.html.twig', array("classroom" => $classroom));
    }

    public function ListClassroomByIdAction($id){
        $classroom = $this->getDoctrine()
            ->getRepository('CrudBundle:classroom')
            ->find($id);

        return $this->render('CrudBundle:classroom:classroom.html.twig', array("class" => $classroom));
    }

    public function CreateClassroomAction(Request $request){
        $classroom = new classroom();
        $classroomForm = $this->createForm(new classroomType(), $classroom);

        if ($request->getMethod() == 'POST')
        {
            $classroomForm->handleRequest($request);
            if ($classroomForm->isValid())
            {
                $data = $classroomForm->getData();
                $em = $this->getDoctrine()->getManager();
                $classroom->setNombre($data->getNombre());
                $em->persist($classroom);
                $em->flush();

                return $this->redirect($this->generateUrl('_listClassroom'), 301);
            }
        }

        return $this->render('CrudBundle:classroom:classroomCreate.html.twig', array(
            'form' => $classroomForm->createView(),
        ));
    }

    public function updateClassroomAction($id, Request $request){

        $em = $this->getDoctrine()->getEntityManager();
        $classroom = $em->getRepository('CrudBundle:classroom')->find($id);
        if (!$classroom){
            throw $this->createNotFoundException('No se encuentra la clase con id = '.$id);
        }

        $classroomForm = $this->createForm(new classroomType(), $classroom);

        if ($request->getMethod() == 'POST')
        {
            $classroomForm->handleRequest($request);
            if ($classroomForm->isValid())
            {
                $data = $classroomForm->getData();
                $em = $this->getDoctrine()->getManager();
                $classroom->setNombre($data->getNombre());
                $em->persist($classroom);
                $em->flush();

                return $this->redirect($this->generateUrl('_listClassroom'), 301);
            }
        }

        return $this->render('CrudBundle:classroom:classroomUpdate.html.twig', array(
            'form' => $classroomForm->createView(),
            'id' => $classroom->getId(),
        ));
    }

    public function ListStudentsAction(){
        $student = $this->getDoctrine()
            ->getRepository('CrudBundle:student')
            ->findAll();

        return $this->render('CrudBundle:student:listStudents.html.twig', array("students" => $student));

    }

    public function ListStudentsByIdAction($id){
        $student = $this->getDoctrine()
            ->getRepository('CrudBundle:student')
            ->find($id);

        return $this->render('CrudBundle:student:student.html.twig', array("student" => $student));

    }

    public function CreateStudentAction(Request $request){
        $student = new student();
        $studentForm = $this->createForm(new studentType(), $student);

        if ($request->getMethod() == 'POST')
        {
            $studentForm->handleRequest($request);
            if ($studentForm->isValid())
            {
                $data = $studentForm->getData();
                $em = $this->getDoctrine()->getManager();
                $student->setName($data->getName());
                $student->setSurname($data->getSurname());
                $student->setClassroom($data->getClassroom());
                $em->persist($student);
                $em->flush();

                return $this->redirect($this->generateUrl('_listStudents'), 301);
            }
        }

        return $this->render('CrudBundle:student:studentCreate.html.twig', array(
            'form' => $studentForm->createView(),
        ));
    }

    public function updateStudentAction($id, Request $request){

        $em = $this->getDoctrine()->getEntityManager();
        $student = $em->getRepository('CrudBundle:student')->find($id);
        if (!$student){
            throw $this->createNotFoundException('No se encuentra el studiante con id = '.$id);
        }

        $studentForm = $this->createForm(new studentType(), $student);

        if ($request->getMethod() == 'POST')
        {
            $studentForm->handleRequest($request);
            if ($studentForm->isValid())
            {
                $data = $studentForm->getData();
                $em = $this->getDoctrine()->getManager();
                $student->setName($data->getName());
                $student->setSurname($data->getSurname());
                $student->setClassroom($data->getClassroom());
                $em->persist($student);
                $em->flush();

                return $this->redirect($this->generateUrl('_listStudents'), 301);
            }
        }

        return $this->render('CrudBundle:student:studentUpdate.html.twig', array(
            'form' => $studentForm->createView(),
            'id' => $student->getId(),
        ));
    }
}

